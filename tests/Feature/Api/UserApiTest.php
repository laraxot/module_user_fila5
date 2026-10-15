<?php

declare(strict_types=1);

namespace Tests\Feature\Modules\User\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Tests\Support\Traits\ModuleTestTrait;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use ModuleTestTrait, RefreshDatabase, WithFaker;

    protected User $user;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpModuleTest();
        $this->user = $this->createAuthenticatedUser();
        $this->adminUser = $this->createUserWithRole('admin');
    }

    /** @test */
    public function it_can_list_users(): void
    {
        User::factory()->count(3)->create();

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

        $this->assertCount(5, $response->json('data')); // 3 + 2 dal setUp
    }

    /** @test */
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

    /** @test */
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
        $user = User::where('email', 'test@example.com')->first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /** @test */
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

    /** @test */
    public function it_can_delete_user(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'id' => $this->user->id,
        ]);
    }

    /** @test */
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

    /** @test */
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

    /** @test */
    public function it_validates_email_uniqueness(): void
    {
        User::factory()->create(['email' => 'existing@example.com']);

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

    /** @test */
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

    /** @test */
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

    /** @test */
    public function it_can_filter_users_by_name(): void
    {
        User::factory()->create(['name' => 'John Doe']);
        User::factory()->create(['name' => 'Jane Smith']);
        User::factory()->create(['name' => 'Bob Johnson']);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?name=John');

        $response->assertStatus(200);
        $data = $response->json('data');

        foreach ($data as $user) {
            $this->assertStringContainsString('John', $user['name']);
        }
    }

    /** @test */
    public function it_can_filter_users_by_email(): void
    {
        User::factory()->create(['email' => 'john@example.com']);
        User::factory()->create(['email' => 'jane@example.com']);
        User::factory()->create(['email' => 'bob@example.com']);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?email=john');

        $response->assertStatus(200);
        $data = $response->json('data');

        foreach ($data as $user) {
            $this->assertStringContainsString('john', $user['email']);
        }
    }

    /** @test */
    public function it_can_filter_users_by_role(): void
    {
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'web']);

        $adminUser = User::factory()->create();
        $adminUser->assignRole($adminRole);

        $regularUser = User::factory()->create();
        $regularUser->assignRole($userRole);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?role=admin');

        $response->assertStatus(200);
        $data = $response->json('data');

        $this->assertCount(2, $data); // adminUser + adminUser dal setUp
    }

    /** @test */
    public function it_can_sort_users_by_name(): void
    {
        $userA = User::factory()->create(['name' => 'Alice']);
        $userB = User::factory()->create(['name' => 'Bob']);
        $userC = User::factory()->create(['name' => 'Charlie']);

        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users?sort=name&order=asc');

        $response->assertStatus(200);
        $data = $response->json('data');

        $this->assertEquals($userA->id, $data[0]['id']);
        $this->assertEquals($userB->id, $data[1]['id']);
        $this->assertEquals($userC->id, $data[2]['id']);
    }

    /** @test */
    public function it_can_paginate_users(): void
    {
        User::factory()->count(25)->create();

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

        $meta = $response->json('meta');
        $this->assertEquals(2, $meta['current_page']);
        $this->assertEquals(10, $meta['per_page']);
        $this->assertEquals(27, $meta['total']); // 25 + 2 dal setUp
    }

    /** @test */
    public function it_returns_404_for_nonexistent_user(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/99999');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_user_on_update(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->putJson('/api/users/99999', ['name' => 'Updated']);

        $response->assertStatus(404);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_user_on_delete(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->deleteJson('/api/users/99999');

        $response->assertStatus(404);
    }

    /** @test */
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

    /** @test */
    public function it_requires_admin_permission(): void
    {
        $regularUser = User::factory()->create();

        $response = $this->actingAs($regularUser)
            ->getJson('/api/users');

        $response->assertStatus(403);
    }

    /** @test */
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

    /** @test */
    public function it_can_remove_role_from_user(): void
    {
        $role = Role::create(['name' => 'editor', 'guard_name' => 'web']);
        $this->user->assignRole($role);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}/roles/{$role->id}");

        $response->assertStatus(200);

        $this->assertFalse($this->user->hasRole('editor'));
    }

    /** @test */
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

    /** @test */
    public function it_can_remove_permission_from_user(): void
    {
        $permission = Permission::create(['name' => 'edit-posts', 'guard_name' => 'web']);
        $this->user->givePermissionTo($permission);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}/permissions/{$permission->id}");

        $response->assertStatus(200);

        $this->assertFalse($this->user->hasPermissionTo('edit-posts'));
    }

    /** @test */
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

    /** @test */
    public function it_can_remove_user_from_team(): void
    {
        $team = Team::create(['name' => 'Test Team']);
        $this->user->teams()->attach($team->id);

        $response = $this->actingAs($this->adminUser)
            ->deleteJson("/api/users/{$this->user->id}/teams/{$team->id}");

        $response->assertStatus(200);

        $this->assertFalse($this->user->belongsToTeam($team));
    }

    /** @test */
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

        $data = $response->json('data');
        $this->assertCount(2, $data);
    }

    /** @test */
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

        $data = $response->json('data');
        $this->assertCount(2, $data);
    }

    /** @test */
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

        $data = $response->json('data');
        $this->assertCount(2, $data);
    }

    /** @test */
    public function it_can_verify_user_email(): void
    {
        $unverifiedUser = User::factory()->create(['email_verified_at' => null]);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/api/users/{$unverifiedUser->id}/verify-email");

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $unverifiedUser->id,
            'email_verified_at' => now(),
        ]);
    }

    /** @test */
    public function it_can_send_verification_email(): void
    {
        $unverifiedUser = User::factory()->create(['email_verified_at' => null]);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/api/users/{$unverifiedUser->id}/send-verification");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_user_statistics(): void
    {
        User::factory()->count(5)->create(['email_verified_at' => now()]);
        User::factory()->count(3)->create(['email_verified_at' => null]);

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

        $data = $response->json('data');
        $this->assertEquals(10, $data['total_users']); // 5 + 3 + 2 dal setUp
        $this->assertEquals(7, $data['verified_users']); // 5 + 2 dal setUp
        $this->assertEquals(3, $data['unverified_users']);
    }

    /** @test */
    public function it_can_bulk_update_users(): void
    {
        $users = User::factory()->count(3)->create(['email_verified_at' => null]);
        $userIds = $users->pluck('id')->toArray();

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

    /** @test */
    public function it_can_bulk_delete_users(): void
    {
        $users = User::factory()->count(3)->create();
        $userIds = $users->pluck('id')->toArray();

        $response = $this->actingAs($this->adminUser)
            ->deleteJson('/api/users/bulk-delete', ['ids' => $userIds]);

        $response->assertStatus(204);

        foreach ($userIds as $id) {
            $this->assertDatabaseMissing('users', ['id' => $id]);
        }
    }

    /** @test */
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

    /** @test */
    public function it_can_export_users(): void
    {
        User::factory()->count(5)->create();

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

    /** @test */
    public function it_validates_export_format(): void
    {
        $response = $this->actingAs($this->adminUser)
            ->getJson('/api/users/export?format=invalid');

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['format']);
    }
}
