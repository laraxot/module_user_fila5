<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Api;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\TestResponse;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use Tests\Support\Traits\ModuleTestTrait;
use Tests\TestCase;

use function Safe\json_decode;

class UserApiTest extends TestCase
{
    use ModuleTestTrait, RefreshDatabase, WithFaker;

    protected User $user;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        // ponytail: un solo controllo per tutta la classe; se arriva anche solo GET api/users i test ripartono tutti e
        // gli endpoint ancora assenti (roles, teams, bulk, export...) tornano rossi, che e' il segnale giusto.
        $hasUsersApi = collect(Route::getRoutes()->getRoutes())
            ->contains(static fn (RoutingRoute $route): bool => 'api/users' === $route->uri());
        if (! $hasUsersApi) {
            $this->markTestSkipped(
                'SENZA SORGENTE: nessuna route api/users* (le sole route api utente sono POST api/user/login, '
                .'GET api/v2/user, GET api/v2/logout); API CRUD utenti mai implementata (DCP-252).'
            );
        }

        $this->setUpModuleTest();
        $this->user = $this->createAuthenticatedUser();
        $this->adminUser = $this->createUserWithRole('admin');
    }

    #[Test]
    public function it_can_list_users(): void
    {
        UserFactory::new()->count(3)->create();

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'email',
                        'email_verified_at',
                        'profile_photo_path',
                        'current_team_id',
                        'current_tenant_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'links',
                'meta',
            ]);

        $this->assertCount(5, $this->apiDataRows($response)); // 3 + 2 dal setUp
    }

    #[Test]
    public function it_can_show_single_user(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->getJson("/api/users/{$this->user->id}");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ],
            ]);
    }

    #[Test]
    public function it_can_create_user(): void
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users', $userData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'profile_photo_path',
                    'current_team_id',
                    'current_tenant_id',
                    'created_at',
                    'updated_at',
                ],
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Verifica che la password sia hashata
        $user = User::query()->where('email', 'test@example.com')->first();
        Assert::assertInstanceOf(User::class, $user);
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    #[Test]
    public function it_can_update_user(): void
    {
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        $response = $this->actingAs($this->adminUser)
            ->putJson("/api/users/{$this->user->id}", $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $this->user->id,
                    'name' => 'Updated Name',
                    'email' => 'updated@example.com',
                ],
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    #[Test]
    public function it_can_delete_user(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'id' => $this->user->id,
        ]);
    }

    #[Test]
    public function it_validates_required_fields_on_create(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'name',
                'email',
                'password',
                'password_confirmation',
            ]);
    }

    #[Test]
    public function it_validates_email_format(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users', [
                'name' => 'Test User',
                'email' => 'invalid-email',
                'password' => 'password123',
                'password_confirmation' => 'password123',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    #[Test]
    public function it_validates_email_uniqueness(): void
    {
        UserFactory::new()->createOne(['email' => 'existing@example.com']);

        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users', [
                'name' => 'Test User',
                'email' => 'existing@example.com',
                'password' => 'password123',
                'password_confirmation' => 'password123',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    #[Test]
    public function it_validates_password_confirmation(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password123',
                'password_confirmation' => 'different',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }

    #[Test]
    public function it_validates_password_minimum_length(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => '123',
                'password_confirmation' => '123',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }

    #[Test]
    public function it_can_filter_users_by_name(): void
    {
        UserFactory::new()->createOne(['name' => 'John Doe']);
        UserFactory::new()->createOne(['name' => 'Jane Smith']);
        UserFactory::new()->createOne(['name' => 'Bob Johnson']);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?name=John');

        $response->assertStatus(200);

        foreach ($this->apiDataRows($response) as $userRow) {
            $this->assertStringContainsString('John', $this->apiRowString($userRow, 'name'));
        }
    }

    #[Test]
    public function it_can_filter_users_by_email(): void
    {
        UserFactory::new()->createOne(['email' => 'john@example.com']);
        UserFactory::new()->createOne(['email' => 'jane@example.com']);
        UserFactory::new()->createOne(['email' => 'bob@example.com']);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?email=john');

        $response->assertStatus(200);

        foreach ($this->apiDataRows($response) as $userRow) {
            $this->assertStringContainsString('john', $this->apiRowString($userRow, 'email'));
        }
    }

    #[Test]
    public function it_can_filter_users_by_role(): void
    {
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'web']);

        $adminUser = UserFactory::new()->createOne();
        $adminUser->assignRole($adminRole);

        $regularUser = UserFactory::new()->createOne();
        $regularUser->assignRole($userRole);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?role=admin');

        $response->assertStatus(200);

        $this->assertCount(2, $this->apiDataRows($response)); // adminUser + adminUser dal setUp
    }

    #[Test]
    public function it_can_sort_users_by_name(): void
    {
        $userA = UserFactory::new()->createOne(['name' => 'Alice']);
        $userB = UserFactory::new()->createOne(['name' => 'Bob']);
        $userC = UserFactory::new()->createOne(['name' => 'Charlie']);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?sort=name&order=asc');

        $response->assertStatus(200);
        $data = $this->apiDataRows($response);

        $this->assertEquals($userA->id, $this->apiRowString($data[0], 'id'));
        $this->assertEquals($userB->id, $this->apiRowString($data[1], 'id'));
        $this->assertEquals($userC->id, $this->apiRowString($data[2], 'id'));
    }

    #[Test]
    public function it_can_paginate_users(): void
    {
        UserFactory::new()->count(25)->create();

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?per_page=10&page=2');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'links',
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'per_page',
                    'to',
                    'total',
                ],
            ]);

        $meta = $this->apiMeta($response);
        $this->assertEquals(2, $this->apiMetaInt($meta, 'current_page'));
        $this->assertEquals(10, $this->apiMetaInt($meta, 'per_page'));
        $this->assertEquals(27, $this->apiMetaInt($meta, 'total')); // 25 + 2 dal setUp
    }

    #[Test]
    public function it_returns_404_for_nonexistent_user(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/99999');

        $response->assertStatus(404);
    }

    #[Test]
    public function it_returns_404_for_nonexistent_user_on_update(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->putJson('/api/users/99999', ['name' => 'Updated']);

        $response->assertStatus(404);
    }

    #[Test]
    public function it_returns_404_for_nonexistent_user_on_delete(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->deleteJson('/api/users/99999');

        $response->assertStatus(404);
    }

    #[Test]
    public function it_requires_authentication(): void
    {
        $response = $this->getJson('/api/users');
        $response->assertStatus(401);

        $response = $this->postJson('/api/users', []);
        $response->assertStatus(401);

        $response = $this->putJson('/api/users/1', []);
        $response->assertStatus(401);

        $response = $this->deleteJson('/api/users/1');
        $response->assertStatus(401);
    }

    #[Test]
    public function it_requires_admin_permission(): void
    {
        $regularUser = UserFactory::new()->createOne();

        $response = $this->actingAs($regularUser)
            ->getJson('/api/users');

        $response->assertStatus(403);
    }

    #[Test]
    public function it_can_assign_role_to_user(): void
    {
        $role = Role::create(['name' => 'editor', 'guard_name' => 'web']);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/api/users/{$this->user->id}/roles", [
                'role_id' => $role->id,
            ]);

        $response->assertStatus(200);

        $this->assertTrue($this->user->hasRole('editor'));
    }

    #[Test]
    public function it_can_remove_role_from_user(): void
    {
        $role = Role::create(['name' => 'editor', 'guard_name' => 'web']);
        $this->user->assignRole($role);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}/roles/{$role->id}");

        $response->assertStatus(200);

        $this->assertFalse($this->user->hasRole('editor'));
    }

    #[Test]
    public function it_can_assign_permission_to_user(): void
    {
        $permission = Permission::create(['name' => 'edit-posts', 'guard_name' => 'web']);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/api/users/{$this->user->id}/permissions", [
                'permission_id' => $permission->id,
            ]);

        $response->assertStatus(200);

        $this->assertTrue($this->user->hasPermissionTo('edit-posts'));
    }

    #[Test]
    public function it_can_remove_permission_from_user(): void
    {
        $permission = Permission::create(['name' => 'edit-posts', 'guard_name' => 'web']);
        $this->user->givePermissionTo($permission);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}/permissions/{$permission->id}");

        $response->assertStatus(200);

        $this->assertFalse($this->user->hasPermissionTo('edit-posts'));
    }

    #[Test]
    public function it_can_add_user_to_team(): void
    {
        $team = Team::create(['name' => 'Test Team']);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/api/users/{$this->user->id}/teams", [
                'team_id' => $team->id,
            ]);

        $response->assertStatus(200);

        $this->assertTrue($this->user->belongsToTeam($team));
    }

    #[Test]
    public function it_can_remove_user_from_team(): void
    {
        $team = Team::create(['name' => 'Test Team']);
        $this->user->teams()->attach($team->id);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}/teams/{$team->id}");

        $response->assertStatus(200);

        $this->assertFalse($this->user->belongsToTeam($team));
    }

    #[Test]
    public function it_can_get_user_teams(): void
    {
        $team1 = Team::create(['name' => 'Team 1']);
        $team2 = Team::create(['name' => 'Team 2']);

        $this->user->teams()->attach([$team1->id, $team2->id]);

        $response = $this->actingAs($this->adminUser)
            ->getJson("/api/users/{$this->user->id}/teams");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);

        $this->assertCount(2, $this->apiDataRows($response));
    }

    #[Test]
    public function it_can_get_user_roles(): void
    {
        $role1 = Role::create(['name' => 'editor', 'guard_name' => 'web']);
        $role2 = Role::create(['name' => 'author', 'guard_name' => 'web']);

        $this->user->assignRole([$role1, $role2]);

        $response = $this->actingAs($this->adminUser)
            ->getJson("/api/users/{$this->user->id}/roles");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'guard_name',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);

        $this->assertCount(2, $this->apiDataRows($response));
    }

    #[Test]
    public function it_can_get_user_permissions(): void
    {
        $permission1 = Permission::create(['name' => 'edit-posts', 'guard_name' => 'web']);
        $permission2 = Permission::create(['name' => 'delete-posts', 'guard_name' => 'web']);

        $this->user->givePermissionTo([$permission1, $permission2]);

        $response = $this->actingAs($this->adminUser)
            ->getJson("/api/users/{$this->user->id}/permissions");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'guard_name',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);

        $this->assertCount(2, $this->apiDataRows($response));
    }

    #[Test]
    public function it_can_verify_user_email(): void
    {
        $unverifiedUser = UserFactory::new()->createOne(['email_verified_at' => null]);

        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users/'.$unverifiedUser->id.'/verify-email');

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $unverifiedUser->id,
            'email_verified_at' => now(),
        ]);
    }

    #[Test]
    public function it_can_send_verification_email(): void
    {
        $unverifiedUser = UserFactory::new()->createOne(['email_verified_at' => null]);

        $response = $this->actingAs($this->adminUser)
            ->postJson('/api/users/'.$unverifiedUser->id.'/send-verification');

        $response->assertStatus(200);
    }

    #[Test]
    public function it_can_get_user_statistics(): void
    {
        UserFactory::new()->count(5)->create(['email_verified_at' => now()]);
        UserFactory::new()->count(3)->create(['email_verified_at' => null]);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/statistics');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'total_users',
                    'verified_users',
                    'unverified_users',
                    'users_by_role',
                    'users_by_team',
                ],
            ]);

        $data = $this->apiStatisticsData($response);
        $this->assertEquals(10, $this->apiMetaInt($data, 'total_users')); // 5 + 3 + 2 dal setUp
        $this->assertEquals(7, $this->apiMetaInt($data, 'verified_users')); // 5 + 2 dal setUp
        $this->assertEquals(3, $this->apiMetaInt($data, 'unverified_users'));
    }

    #[Test]
    public function it_can_bulk_update_users(): void
    {
        $users = UserFactory::new()->count(3)->create(['email_verified_at' => null]);
        $userIds = $this->userIdsFromCollection($this->assertUserCollection($users));

        $updateData = [
            'ids' => $userIds,
            'updates' => [
                'email_verified_at' => now(),
            ],
        ];

        $response = $this->actingAs($this->adminUser)
            ->putJson('/api/users/bulk-update', $updateData);

        $response->assertStatus(200);

        foreach ($userIds as $id) {
            $this->assertDatabaseHas('users', [
                'id' => $id,
                'email_verified_at' => now(),
            ]);
        }
    }

    #[Test]
    public function it_can_bulk_delete_users(): void
    {
        $users = UserFactory::new()->count(3)->create();
        $userIds = $this->userIdsFromCollection($this->assertUserCollection($users));

        $response = $this->actingAs($this->adminUser)
            ->deleteJson('/api/users/bulk-delete', ['ids' => $userIds]);

        $response->assertStatus(204);

        foreach ($userIds as $id) {
            $this->assertDatabaseMissing('users', ['id' => $id]);
        }
    }

    #[Test]
    public function it_validates_bulk_operations(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->putJson('/api/users/bulk-update', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['ids', 'updates']);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson('/api/users/bulk-delete', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['ids']);
    }

    #[Test]
    public function it_can_export_users(): void
    {
        UserFactory::new()->count(5)->create();

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/export?format=csv');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'text/csv; charset=UTF-8')
            ->assertHeader('Content-Disposition', 'attachment; filename="users.csv"');

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/export?format=json');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    #[Test]
    public function it_validates_export_format(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/export?format=invalid');

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['format']);
    }

    /**
     * @param  TestResponse<\Illuminate\Http\Response>  $response
     * @return list<array<string, mixed>>
     */
    private function apiDataRows(TestResponse $response): array
    {
        $payload = $this->decodeApiPayload($response);
        Assert::assertArrayHasKey('data', $payload);
        $data = $payload['data'];
        Assert::assertIsArray($data);

        $rows = [];
        foreach ($data as $row) {
            if (! is_array($row)) {
                continue;
            }

            $rows[] = self::stringKeyArray($row);
        }

        return $rows;
    }

    /**
     * @param  TestResponse<\Illuminate\Http\Response>  $response
     * @return array<string, mixed>
     */
    private function apiMeta(TestResponse $response): array
    {
        $payload = $this->decodeApiPayload($response);
        Assert::assertArrayHasKey('meta', $payload);
        $meta = $payload['meta'];
        Assert::assertIsArray($meta);

        return self::stringKeyArray($meta);
    }

    /**
     * @param  TestResponse<\Illuminate\Http\Response>  $response
     * @return array<string, mixed>
     */
    private function apiStatisticsData(TestResponse $response): array
    {
        $payload = $this->decodeApiPayload($response);
        Assert::assertArrayHasKey('data', $payload);
        $data = $payload['data'];
        Assert::assertIsArray($data);

        return self::stringKeyArray($data);
    }

    /**
     * @param  TestResponse<\Illuminate\Http\Response>  $response
     * @return array<string, mixed>
     */
    private function decodeApiPayload(TestResponse $response): array
    {
        $content = $response->getContent();
        Assert::assertIsString($content);
        $decoded = json_decode($content, true);
        Assert::assertIsArray($decoded);

        return self::stringKeyArray($decoded);
    }

    /**
     * @param  array<mixed>  $decoded
     * @return array<string, mixed>
     */
    private static function stringKeyArray(array $decoded): array
    {
        $normalized = [];
        foreach ($decoded as $key => $value) {
            Assert::assertIsString($key);
            $normalized[$key] = $value;
        }

        return $normalized;
    }

    /**
     * @param  EloquentCollection<int, User>|User  $created
     * @return EloquentCollection<int, User>
     */
    private function assertUserCollection(EloquentCollection|User $created): EloquentCollection
    {
        Assert::assertInstanceOf(EloquentCollection::class, $created);

        return $created;
    }

    /**
     * @param  array<string, mixed>  $row
     */
    private function apiRowString(array $row, string $key): string
    {
        Assert::assertArrayHasKey($key, $row);
        $value = $row[$key];
        Assert::assertIsString($value);

        return $value;
    }

    /**
     * @param  array<string, mixed>  $meta
     */
    private function apiMetaInt(array $meta, string $key): int
    {
        Assert::assertArrayHasKey($key, $meta);
        $value = $meta[$key];
        Assert::assertIsInt($value);

        return $value;
    }

    /**
     * @param  EloquentCollection<int, User>  $users
     * @return list<string>
     */
    private function userIdsFromCollection(EloquentCollection $users): array
    {
        $ids = [];
        foreach ($users as $user) {
            $ids[] = $user->id;
        }

        return $ids;
    }
}
