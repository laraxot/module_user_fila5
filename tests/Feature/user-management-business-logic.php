<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Profile;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class UserManagementBusinessLogicTest extends TestCase
{
    public function test_can_create_user_with_profile(): void
    {
        $userData = [
            'name' => 'Mario Rossi',
            'email' => 'mario.rossi@example.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ];

        $profileData = [
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
            'birth_date' => '1990-05-15',
            'gender' => 'M',
        ];

        $user = User::create($userData);
        $createdProfile = $user->profile()->create($profileData);
        $this->assertInstanceOf(Profile::class, $createdProfile);
        $profile = $createdProfile;

        $this->assertTrue(DB::table('users')->where([
            'id' => $user->id,
            'name' => 'Mario Rossi',
            'email' => 'mario.rossi@example.com',
        ])->exists());
        $this->assertTrue(DB::table('profiles')->where([
            'id' => $profile->id,
            'user_id' => $user->id,
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
        ])->exists());
        $this->assertInstanceOf(Profile::class, $user->profile);
        $this->assertSame($user->id, $profile->user_id);
    }

    public function test_can_assign_role_to_user(): void
    {
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);

        $user->assignRole($role);

        $this->assertTrue($user->hasRole('doctor'));
        $this->assertTrue($user->hasRole($role));
        $this->assertContains($role->name, $user->getRoleNames()->toArray());
    }

    public function test_can_assign_multiple_roles_to_user(): void
    {
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

        $user->assignRole([$role1, $role2]);

        $this->assertTrue($user->hasRole('doctor'));
        $this->assertTrue($user->hasRole('admin'));
        $this->assertTrue($user->hasRole($role1));
        $this->assertTrue($user->hasRole($role2));
        $this->assertCount(2, $user->getRoleNames());
    }

    public function test_can_remove_role_from_user(): void
    {
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);
        $user->assignRole($role);

        $user->removeRole($role);

        $this->assertFalse($user->hasRole('doctor'));
        $this->assertFalse($user->hasRole($role));
        $this->assertCount(0, $user->getRoleNames());
    }

    public function test_can_sync_user_roles(): void
    {
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'admin']);
        $role3 = RoleFactory::new()->createOne(['name' => 'nurse']);

        $user->assignRole([$role1, $role2]);

        $user->syncRoles([$role2, $role3]);

        $this->assertFalse($user->hasRole('doctor'));
        $this->assertTrue($user->hasRole('admin'));
        $this->assertTrue($user->hasRole('nurse'));
        $this->assertCount(2, $user->getRoleNames());
    }

    public function test_can_check_user_permissions(): void
    {
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'patients.read']);

        $role->givePermissionTo($permission);
        $user->assignRole($role);

        $this->assertTrue($user->hasPermissionTo('patients.read'));
        $this->assertTrue($user->hasPermissionTo($permission));
        $this->assertTrue($user->can('patients.read'));
    }

    public function test_can_assign_direct_permission_to_user(): void
    {
        $user = UserFactory::new()->createOne();
        $permission = PermissionFactory::new()->createOne(['name' => 'special.permission']);

        $user->givePermissionTo($permission);

        $this->assertTrue($user->hasPermissionTo('special.permission'));
        $this->assertTrue($user->hasPermissionTo($permission));
        $this->assertTrue($user->can('special.permission'));
    }

    public function test_can_revoke_direct_permission_from_user(): void
    {
        $user = UserFactory::new()->createOne();
        $permission = PermissionFactory::new()->createOne(['name' => 'special.permission']);
        $user->givePermissionTo($permission);

        $user->revokePermissionTo($permission);

        $this->assertFalse($user->hasPermissionTo('special.permission'));
        $this->assertFalse($user->hasPermissionTo($permission));
        $this->assertFalse($user->can('special.permission'));
    }

    public function test_can_check_user_has_any_role(): void
    {
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'nurse']);

        $user->assignRole($role1);

        $this->assertTrue($user->hasAnyRole(['doctor', 'nurse']));
        $this->assertFalse($user->hasAnyRole(['nurse', 'admin']));
        $this->assertFalse($user->hasAnyRole(['admin', 'super-admin']));
    }

    public function test_can_check_user_has_all_roles(): void
    {
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

        $user->assignRole([$role1, $role2]);

        $this->assertTrue($user->hasAllRoles(['doctor', 'admin']));
        $this->assertFalse($user->hasAllRoles(['doctor', 'nurse']));
    }

    public function test_can_get_user_permissions(): void
    {
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);
        $permission1 = PermissionFactory::new()->createOne(['name' => 'patients.read']);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'patients.write']);

        $role->givePermissionTo([$permission1, $permission2]);
        $user->assignRole($role);

        $permissions = $user->getAllPermissions();

        $this->assertCount(2, $permissions);
        $this->assertTrue($permissions->contains($permission1));
        $this->assertTrue($permissions->contains($permission2));
    }

    public function test_can_get_user_roles(): void
    {
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

        $user->assignRole([$role1, $role2]);

        $roles = $user->getRoleNames();

        $this->assertCount(2, $roles);
        $this->assertStringContainsString((string) 'doctor', (string) $roles);
        $this->assertStringContainsString((string) 'admin', (string) $roles);
    }

    public function test_can_check_user_is_super_admin(): void
    {
        $user = UserFactory::new()->createOne();
        $superAdminRole = RoleFactory::new()->createOne(['name' => 'super-admin']);

        $user->assignRole($superAdminRole);

        $this->assertTrue($user->hasRole('super-admin'));
        $this->assertTrue($user->isSuperAdmin());
    }

    public function test_can_update_user_profile(): void
    {
        $user = UserFactory::new()->createOne();
        $createdProfile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
        ]);
        $this->assertInstanceOf(Profile::class, $createdProfile);
        $profile = $createdProfile;

        $updatedData = [
            'phone' => '+39 987 654 3210',
            'address' => 'Via Milano 456, Roma',
            'birth_date' => '1985-10-20',
        ];

        $profile->update($updatedData);

        $this->assertTrue(DB::table('profiles')->where([
            'id' => $profile->id,
            'phone' => '+39 987 654 3210',
            'address' => 'Via Milano 456, Roma',
            'birth_date' => '1985-10-20',
        ])->exists());
    }

    public function test_can_delete_user_with_profile(): void
    {
        $user = UserFactory::new()->createOne();
        $createdProfile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
        ]);
        $this->assertInstanceOf(Profile::class, $createdProfile);
        $profile = $createdProfile;

        $profile->forceDelete();
        $user->forceDelete();

        $this->assertFalse(DB::table('users')->where(['id' => $user->id])->exists());
        $this->assertFalse(DB::table('profiles')->where(['id' => $profile->id])->exists());
    }

    public function test_can_soft_delete_user(): void
    {
        $this->markTestSkipped('User model does not use SoftDeletes.');
    }

    public function test_can_restore_soft_deleted_user(): void
    {
        $this->markTestSkipped('User model does not use SoftDeletes.');
    }

    public function test_can_force_delete_user(): void
    {
        $user = UserFactory::new()->createOne();
        $createdProfile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
        ]);
        $this->assertInstanceOf(Profile::class, $createdProfile);
        $profile = $createdProfile;

        $profile->forceDelete();
        $user->forceDelete();

        $this->assertFalse(DB::table('users')->where(['id' => $user->id])->exists());
        $this->assertFalse(DB::table('profiles')->where(['id' => $profile->id])->exists());
    }

    public function test_can_search_users_by_name(): void
    {
        $user1 = UserFactory::new()->createOne(['name' => 'Mario Rossi']);
        $user2 = UserFactory::new()->createOne(['name' => 'Giulia Bianchi']);
        $user3 = UserFactory::new()->createOne(['name' => 'Marco Rossi']);

        $results = User::where('name', 'like', '%Rossi%')->get();

        $this->assertCount(2, $results);
        $this->assertTrue($results->contains($user1));
        $this->assertTrue($results->contains($user3));
        $this->assertFalse($results->contains($user2));
    }

    public function test_can_search_users_by_email(): void
    {
        $user1 = UserFactory::new()->createOne(['email' => 'mario@example.com']);
        $user2 = UserFactory::new()->createOne(['email' => 'giulia@test.com']);
        $user3 = UserFactory::new()->createOne(['email' => 'marco@example.org']);

        $results = User::where('email', 'like', '%@example%')->get();

        $this->assertCount(2, $results);
        $this->assertTrue($results->contains($user1));
        $this->assertTrue($results->contains($user3));
        $this->assertFalse($results->contains($user2));
    }

    public function test_can_filter_users_by_role(): void
    {
        $doctorRole = RoleFactory::new()->createOne(['name' => 'doctor']);
        $nurseRole = RoleFactory::new()->createOne(['name' => 'nurse']);

        $user1 = UserFactory::new()->createOne();
        $user2 = UserFactory::new()->createOne();
        $user3 = UserFactory::new()->createOne();

        $user1->assignRole($doctorRole);
        $user2->assignRole($nurseRole);
        $user3->assignRole($doctorRole);

        $doctors = User::role('doctor')->get();

        $this->assertCount(2, $doctors);
        $this->assertTrue($doctors->contains($user1));
        $this->assertTrue($doctors->contains($user3));
        $this->assertFalse($doctors->contains($user2));
    }

    public function test_can_filter_users_by_permission(): void
    {
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'patients.read']);

        $role->givePermissionTo($permission);

        $user1 = UserFactory::new()->createOne();
        $user2 = UserFactory::new()->createOne();

        $user1->assignRole($role);

        $usersWithPermission = User::permission('patients.read')->get();

        $this->assertCount(1, $usersWithPermission);
        $this->assertTrue($usersWithPermission->contains($user1));
        $this->assertFalse($usersWithPermission->contains($user2));
    }

    public function test_can_get_users_with_roles_and_permissions(): void
    {
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'patients.read']);

        $role->givePermissionTo($permission);

        $user = UserFactory::new()->createOne();
        $user->assignRole($role);

        $userWithRelations = User::with(['roles', 'permissions'])->find($user->id);

        $this->assertNotNull($userWithRelations);
        $this->assertTrue($userWithRelations->relationLoaded('roles'));
        $this->assertTrue($userWithRelations->relationLoaded('permissions'));
        $this->assertCount(1, $userWithRelations->roles);
        $this->assertCount(1, $userWithRelations->getAllPermissions());
    }

    public function test_can_validate_user_email_uniqueness(): void
    {
        UserFactory::new()->createOne(['email' => 'test@example.com']);

        try {
            User::create([
                'name' => 'Another User',
                'email' => 'test@example.com',
                'password' => Hash::make('password123'),
            ]);
            $this->fail('Expected QueryException was not thrown');
        } catch (QueryException $exception) {
            $this->assertInstanceOf(QueryException::class, $exception);
        }
    }

    public function test_can_handle_user_email_verification(): void
    {
        $user = UserFactory::new()->createOne(['email_verified_at' => null]);

        $user->markEmailAsVerified();

        $this->assertNotNull($user->email_verified_at);
        $this->assertTrue($user->hasVerifiedEmail());
    }

    public function test_can_handle_user_status_changes(): void
    {
        $user = UserFactory::new()->createOne(['is_active' => true]);

        $user->update(['is_active' => false]);

        $freshModel2 = $user->fresh();
        $this->assertNotNull($freshModel2);
        $this->assertFalse($freshModel2->is_active);

        $user->update(['is_active' => true]);

        $freshModel3 = $user->fresh();
        $this->assertNotNull($freshModel3);
        $this->assertTrue($freshModel3->is_active);
    }

    public function test_can_handle_user_info(): void
    {
        $user = UserFactory::new()->createOne();

        $user->update(['lang' => 'it']);

        $this->assertTrue(DB::table('users')->where([
            'id' => $user->id,
            'lang' => 'it',
        ])->exists());
    }
}
