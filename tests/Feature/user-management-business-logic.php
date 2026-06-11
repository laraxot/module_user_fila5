<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use PHPUnit\Framework\Assert;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\User;

it('can create user with profile', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
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

    // Act
    $user = User::create($userData);
    $createdProfile = $user->profile()->create($profileData);
    Assert::assertInstanceOf(Profile::class, $createdProfile);
    $profile = $createdProfile;

    // Assert
    Assert::assertTrue(DB::table('users')->where([
        'id' => $user->id,
        'name' => 'Mario Rossi',
        'email' => 'mario.rossi@example.com',
    ])->exists());
    Assert::assertTrue(DB::table('profiles')->where([
        'id' => $profile->id,
        'user_id' => $user->id,
        'phone' => '+39 123 456 7890',
        'address' => 'Via Roma 123, Milano',
    ])->exists());
    Assert::assertInstanceOf(Profile::class, $user->profile);
    Assert::assertSame($user->id, $profile->user_id);
});

it('can assign role to user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role = RoleFactory::new()->createOne(['name' => 'doctor']);

    // Act
    $user->assignRole($role);

    // Assert
    Assert::assertTrue($user->hasRole('doctor'));
    Assert::assertTrue($user->hasRole($role));
    Assert::assertContains($role->name, $user->getRoleNames()->toArray());
});

it('can assign multiple roles to user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
    $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

    // Act
    $user->assignRole([$role1, $role2]);

    // Assert
    Assert::assertTrue($user->hasRole('doctor'));
    Assert::assertTrue($user->hasRole('admin'));
    Assert::assertTrue($user->hasRole($role1));
    Assert::assertTrue($user->hasRole($role2));
    Assert::assertCount(2, $user->getRoleNames());
});

it('can remove role from user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role = RoleFactory::new()->createOne(['name' => 'doctor']);
    $user->assignRole($role);

    // Act
    $user->removeRole($role);

    // Assert
    Assert::assertFalse($user->hasRole('doctor'));
    Assert::assertFalse($user->hasRole($role));
    Assert::assertCount(0, $user->getRoleNames());
});

it('can sync user roles', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
    $role2 = RoleFactory::new()->createOne(['name' => 'admin']);
    $role3 = RoleFactory::new()->createOne(['name' => 'nurse']);

    $user->assignRole([$role1, $role2]);

    // Act
    $user->syncRoles([$role2, $role3]);

    // Assert
    Assert::assertFalse($user->hasRole('doctor'));
    Assert::assertTrue($user->hasRole('admin'));
    Assert::assertTrue($user->hasRole('nurse'));
    Assert::assertCount(2, $user->getRoleNames());
});

it('can check user permissions', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role = RoleFactory::new()->createOne(['name' => 'doctor']);
    $permission = PermissionFactory::new()->createOne(['name' => 'patients.read']);

    $role->givePermissionTo($permission);
    $user->assignRole($role);

    // Act & Assert
    Assert::assertTrue($user->hasPermissionTo('patients.read'));
    Assert::assertTrue($user->hasPermissionTo($permission));
    Assert::assertTrue($user->can('patients.read'));
});

it('can assign direct permission to user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $permission = PermissionFactory::new()->createOne(['name' => 'special.permission']);

    // Act
    $user->givePermissionTo($permission);

    // Assert
    Assert::assertTrue($user->hasPermissionTo('special.permission'));
    Assert::assertTrue($user->hasPermissionTo($permission));
    Assert::assertTrue($user->can('special.permission'));
});

it('can revoke direct permission from user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $permission = PermissionFactory::new()->createOne(['name' => 'special.permission']);
    $user->givePermissionTo($permission);

    // Act
    $user->revokePermissionTo($permission);

    // Assert
    Assert::assertFalse($user->hasPermissionTo('special.permission'));
    Assert::assertFalse($user->hasPermissionTo($permission));
    Assert::assertFalse($user->can('special.permission'));
});

it('can check user has any role', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
    $role2 = RoleFactory::new()->createOne(['name' => 'nurse']);

    $user->assignRole($role1);

    // Act & Assert
    Assert::assertTrue($user->hasAnyRole(['doctor', 'nurse']));
    Assert::assertFalse($user->hasAnyRole(['nurse', 'admin']));
    Assert::assertFalse($user->hasAnyRole(['admin', 'super-admin']));
});

it('can check user has all roles', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
    $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

    $user->assignRole([$role1, $role2]);

    // Act & Assert
    Assert::assertTrue($user->hasAllRoles(['doctor', 'admin']));
    Assert::assertFalse($user->hasAllRoles(['doctor', 'nurse']));
});

it('can get user permissions', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role = RoleFactory::new()->createOne(['name' => 'doctor']);
    $permission1 = PermissionFactory::new()->createOne(['name' => 'patients.read']);
    $permission2 = PermissionFactory::new()->createOne(['name' => 'patients.write']);

    $role->givePermissionTo([$permission1, $permission2]);
    $user->assignRole($role);

    // Act
    $permissions = $user->getAllPermissions();

    // Assert
    Assert::assertCount(2, $permissions);
    Assert::assertTrue($permissions->contains($permission1));
    Assert::assertTrue($permissions->contains($permission2));
});

it('can get user roles', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
    $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

    $user->assignRole([$role1, $role2]);

    // Act
    $roles = $user->getRoleNames();

    // Assert
    Assert::assertCount(2, $roles);
    Assert::assertStringContainsString((string) 'doctor', (string) $roles);
    Assert::assertStringContainsString((string) 'admin', (string) $roles);
});

it('can check user is super admin', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $superAdminRole = RoleFactory::new()->createOne(['name' => 'super-admin']);

    $user->assignRole($superAdminRole);

    // Act & Assert
    Assert::assertTrue($user->hasRole('super-admin'));
    Assert::assertTrue($user->isSuperAdmin());
});

it('can update user profile', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $createdProfile = $user->profile()->create([
        'phone' => '+39 123 456 7890',
        'address' => 'Via Roma 123, Milano',
    ]);
    Assert::assertInstanceOf(Profile::class, $createdProfile);
    $profile = $createdProfile;

    $updatedData = [
        'phone' => '+39 987 654 3210',
        'address' => 'Via Milano 456, Roma',
        'birth_date' => '1985-10-20',
    ];

    // Act
    $profile->update($updatedData);

    // Assert
    Assert::assertTrue(DB::table('profiles')->where([
        'id' => $profile->id,
        'phone' => '+39 987 654 3210',
        'address' => 'Via Milano 456, Roma',
        'birth_date' => '1985-10-20',
    ])->exists());
});

it('can delete user with profile', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $createdProfile = $user->profile()->create([
        'phone' => '+39 123 456 7890',
    ]);
    Assert::assertInstanceOf(Profile::class, $createdProfile);
    $profile = $createdProfile;

    // Act
    $profile->forceDelete();
    $user->forceDelete();

    // Assert
    Assert::assertFalse(DB::table('users')->where(['id' => $user->id])->exists());
    Assert::assertFalse(DB::table('profiles')->where(['id' => $profile->id])->exists());
});

it('can soft delete user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('User model does not use SoftDeletes.');
});

it('can restore soft deleted user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('User model does not use SoftDeletes.');
});

it('can force delete user', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $createdProfile = $user->profile()->create([
        'phone' => '+39 123 456 7890',
    ]);
    Assert::assertInstanceOf(Profile::class, $createdProfile);
    $profile = $createdProfile;

    // Act
    $profile->forceDelete();
    $user->forceDelete();

    // Assert
    Assert::assertFalse(DB::table('users')->where(['id' => $user->id])->exists());
    Assert::assertFalse(DB::table('profiles')->where(['id' => $profile->id])->exists());
});

it('can search users by name', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user1 = UserFactory::new()->createOne(['name' => 'Mario Rossi']);
    $user2 = UserFactory::new()->createOne(['name' => 'Giulia Bianchi']);
    $user3 = UserFactory::new()->createOne(['name' => 'Marco Rossi']);

    // Act
    $results = User::where('name', 'like', '%Rossi%')->get();

    // Assert
    Assert::assertCount(2, $results);
    Assert::assertTrue($results->contains($user1));
    Assert::assertTrue($results->contains($user3));
    Assert::assertFalse($results->contains($user2));
});

it('can search users by email', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user1 = UserFactory::new()->createOne(['email' => 'mario@example.com']);
    $user2 = UserFactory::new()->createOne(['email' => 'giulia@test.com']);
    $user3 = UserFactory::new()->createOne(['email' => 'marco@example.org']);

    // Act
    $results = User::where('email', 'like', '%@example%')->get();

    // Assert
    Assert::assertCount(2, $results);
    Assert::assertTrue($results->contains($user1));
    Assert::assertTrue($results->contains($user3));
    Assert::assertFalse($results->contains($user2));
});

it('can filter users by role', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $doctorRole = RoleFactory::new()->createOne(['name' => 'doctor']);
    $nurseRole = RoleFactory::new()->createOne(['name' => 'nurse']);

    $user1 = UserFactory::new()->createOne();
    $user2 = UserFactory::new()->createOne();
    $user3 = UserFactory::new()->createOne();

    $user1->assignRole($doctorRole);
    $user2->assignRole($nurseRole);
    $user3->assignRole($doctorRole);

    // Act
    $doctors = User::role('doctor')->get();

    // Assert
    Assert::assertCount(2, $doctors);
    Assert::assertTrue($doctors->contains($user1));
    Assert::assertTrue($doctors->contains($user3));
    Assert::assertFalse($doctors->contains($user2));
});

it('can filter users by permission', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $role = RoleFactory::new()->createOne(['name' => 'doctor']);
    $permission = PermissionFactory::new()->createOne(['name' => 'patients.read']);

    $role->givePermissionTo($permission);

    $user1 = UserFactory::new()->createOne();
    $user2 = UserFactory::new()->createOne();

    $user1->assignRole($role);

    // Act
    $usersWithPermission = User::permission('patients.read')->get();

    // Assert
    Assert::assertCount(1, $usersWithPermission);
    Assert::assertTrue($usersWithPermission->contains($user1));
    Assert::assertFalse($usersWithPermission->contains($user2));
});

it('can get users with roles and permissions', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $role = RoleFactory::new()->createOne(['name' => 'doctor']);
    $permission = PermissionFactory::new()->createOne(['name' => 'patients.read']);

    $role->givePermissionTo($permission);

    $user = UserFactory::new()->createOne();
    $user->assignRole($role);

    // Act
    $userWithRelations = User::with(['roles', 'permissions'])->find($user->id);

    // Assert
    Assert::assertNotNull($userWithRelations);
    Assert::assertTrue($userWithRelations->relationLoaded('roles'));
    Assert::assertTrue($userWithRelations->relationLoaded('permissions'));
    Assert::assertCount(1, $userWithRelations->roles);
    Assert::assertCount(1, $userWithRelations->getAllPermissions());
});

it('can validate user email uniqueness', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    UserFactory::new()->createOne(['email' => 'test@example.com']);

    // Act & Assert
    try {
        User::create([
            'name' => 'Another User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);
        Assert::fail('Expected QueryException was not thrown');
    } catch (QueryException $exception) {
        Assert::assertInstanceOf(QueryException::class, $exception);
    }
});

it('can handle user email verification', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne(['email_verified_at' => null]);

    // Act
    $user->markEmailAsVerified();

    // Assert
    Assert::assertNotNull($user->email_verified_at);
    Assert::assertTrue($user->hasVerifiedEmail());
});

it('can handle user status changes', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne(['is_active' => true]);

    // Act - Deactivate user
    $user->update(['is_active' => false]);

    // Assert
    $freshModel2 = $user->fresh();
    Assert::assertNotNull($freshModel2);
    Assert::assertFalse($freshModel2->is_active);
    // Act - Activate user
    $user->update(['is_active' => true]);

    // Assert
    $freshModel3 = $user->fresh();
    Assert::assertNotNull($freshModel3);
    Assert::assertTrue($freshModel3->is_active);
});

it('can handle user info', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    // Arrange
    $user = UserFactory::new()->createOne();
    $lastLogin = now();

    // Act
    $user->update(['lang' => 'it']);

    // Assert
    Assert::assertTrue(DB::table('users')->where([
        'id' => $user->id,
        'lang' => 'it',
    ])->exists());
});
