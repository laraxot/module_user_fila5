<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use function Safe\json_decode;

use function Safe\json_encode;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

class UserManagementBusinessLogicTest extends TestCase
{
    /** @test */
    public function itCanCreateUserWithProfile(): void
    {
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
        Assert::assertInstanceOf(Profile::class, $profile);

        // Assert
        $this->assertDatabaseHasRow('users', [
            'id' => $user->id,
            'name' => 'Mario Rossi',
            'email' => 'mario.rossi@example.com',
        ]);

        $this->assertDatabaseHasRow('profiles', [
            'id' => $profile->id,
            'user_id' => $user->id,
            'phone' => '+39 123 456 7890',
            'address' => 'Via Roma 123, Milano',
        ]);

        Assert::assertInstanceOf(Profile::class, $user->profile);
        Assert::assertEquals($user->id, $profile->user_id);
    }

    /** @test */
    public function itCanAssignRoleToUser(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['name' => 'doctor']);

        // Act
        $user->assignRole($role);

        // Assert
        Assert::assertTrue($user->hasRole('doctor'));
        Assert::assertTrue($user->hasRole($role));
        Assert::assertContains($role->name, $user->getRoleNames()->toArray());
    }

    /** @test */
    public function itCanAssignMultipleRolesToUser(): void
    {
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
    }

    /** @test */
    public function itCanRemoveRoleFromUser(): void
    {
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
    }

    /** @test */
    public function itCanSyncUserRoles(): void
    {
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
    }

    /** @test */
    public function itCanCheckUserPermissions(): void
    {
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
    }

    /** @test */
    public function itCanAssignDirectPermissionToUser(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $permission = PermissionFactory::new()->createOne(['name' => 'special.permission']);

        // Act
        $user->givePermissionTo($permission);

        // Assert
        Assert::assertTrue($user->hasPermissionTo('special.permission'));
        Assert::assertTrue($user->hasPermissionTo($permission));
        Assert::assertTrue($user->can('special.permission'));
    }

    /** @test */
    public function itCanRevokeDirectPermissionFromUser(): void
    {
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
    }

    /** @test */
    public function itCanCheckUserHasAnyRole(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'nurse']);

        $user->assignRole($role1);

        // Act & Assert
        Assert::assertTrue($user->hasAnyRole(['doctor', 'nurse']));
        Assert::assertTrue($user->hasAnyRole(['nurse', 'admin']));
        Assert::assertFalse($user->hasAnyRole(['nurse', 'admin']));
    }

    /** @test */
    public function itCanCheckUserHasAllRoles(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

        $user->assignRole([$role1, $role2]);

        // Act & Assert
        Assert::assertTrue($user->hasAllRoles(['doctor', 'admin']));
        Assert::assertFalse($user->hasAllRoles(['doctor', 'nurse']));
    }

    /** @test */
    public function itCanGetUserPermissions(): void
    {
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
    }

    /** @test */
    public function itCanGetUserRoles(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'doctor']);
        $role2 = RoleFactory::new()->createOne(['name' => 'admin']);

        $user->assignRole([$role1, $role2]);

        // Act
        $roles = $user->getRoleNames();

        // Assert
        Assert::assertCount(2, $roles);
        Assert::assertContains('doctor', $roles);
        Assert::assertContains('admin', $roles);
    }

    /** @test */
    public function itCanCheckUserIsSuperAdmin(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $superAdminRole = RoleFactory::new()->createOne(['name' => 'super-admin']);

        $user->assignRole($superAdminRole);

        // Act & Assert
        Assert::assertTrue($user->hasRole('super-admin'));
        Assert::assertTrue($user->isSuperAdmin());
    }

    /** @test */
    public function itCanCheckUserIsAdmin(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $adminRole = RoleFactory::new()->createOne(['name' => 'admin']);

        $user->assignRole($adminRole);

        // Act & Assert
        Assert::assertTrue($user->hasRole('admin'));
    }

    /** @test */
    public function itCanCheckUserIsDoctor(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $doctorRole = RoleFactory::new()->createOne(['name' => 'doctor']);

        $user->assignRole($doctorRole);

        // Act & Assert
        Assert::assertTrue($user->hasRole('doctor'));
    }

    /** @test */
    public function itCanCheckUserIsPatient(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $patientRole = RoleFactory::new()->createOne(['name' => 'patient']);

        $user->assignRole($patientRole);

        // Act & Assert
        Assert::assertTrue($user->hasRole('patient'));
    }

    /** @test */
    public function itCanUpdateUserProfile(): void
    {
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
        $this->assertDatabaseHasRow('profiles', [
            'id' => $profile->id,
            'phone' => '+39 987 654 3210',
            'address' => 'Via Milano 456, Roma',
            'birth_date' => '1985-10-20',
        ]);
    }

    /** @test */
    public function itCanDeleteUserWithProfile(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $createdProfile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
        ]);
        Assert::assertInstanceOf(Profile::class, $createdProfile);
        $profile = $createdProfile;

        // Act
        $user->delete();

        // Assert
        $this->assertDatabaseMissingRow('users', ['id' => $user->id]);
        $this->assertDatabaseMissingRow('profiles', ['id' => $profile->id]);
    }

    /** @test */
    public function itCanSoftDeleteUser(): void
    {
        $this->markTestSkipped('User model does not use SoftDeletes.');
    }

    /** @test */
    public function itCanRestoreSoftDeletedUser(): void
    {
        $this->markTestSkipped('User model does not use SoftDeletes.');
    }

    /** @test */
    public function itCanForceDeleteUser(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $createdProfile = $user->profile()->create([
            'phone' => '+39 123 456 7890',
        ]);
        Assert::assertInstanceOf(Profile::class, $createdProfile);
        $profile = $createdProfile;

        // Act
        $user->forceDelete();

        // Assert
        $this->assertDatabaseMissingRow('users', ['id' => $user->id]);
        $this->assertDatabaseMissingRow('profiles', ['id' => $profile->id]);
    }

    /** @test */
    public function itCanSearchUsersByName(): void
    {
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
    }

    /** @test */
    public function itCanSearchUsersByEmail(): void
    {
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
    }

    /** @test */
    public function itCanFilterUsersByRole(): void
    {
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
    }

    /** @test */
    public function itCanFilterUsersByPermission(): void
    {
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
    }

    /** @test */
    public function itCanGetUsersWithRolesAndPermissions(): void
    {
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
        Assert::assertCount(1, $userWithRelations->permissions);
    }

    /** @test */
    public function itCanValidateUserEmailUniqueness(): void
    {
        // Arrange
        UserFactory::new()->createOne(['email' => 'test@example.com']);

        // Act & Assert
        $this->expectException(QueryException::class);

        User::create([
            'name' => 'Another User',
            'email' => 'test@example.com', // Same email
            'password' => Hash::make('password123'),
        ]);
    }

    /** @test */
    public function itCanValidateUserPasswordStrength(): void
    {
        // Arrange
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'weak', // Weak password
        ];

        // Act & Assert
        $this->expectException(ValidationException::class);

        $this->post('/register', $userData);
    }

    /** @test */
    public function itCanHandleUserPasswordReset(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $token = 'reset-token-123';

        // Act
        $user->update(['password_reset_token' => $token]);

        // Assert
        $this->assertDatabaseHasRow('users', [
            'id' => $user->id,
            'password_reset_token' => $token,
        ]);
    }

    /** @test */
    public function itCanHandleUserEmailVerification(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne(['email_verified_at' => null]);

        // Act
        $user->markEmailAsVerified();

        // Assert
        Assert::assertNotNull($user->email_verified_at);
        Assert::assertTrue($user->hasVerifiedEmail());
    }

    /** @test */
    public function itCanHandleUserLastLogin(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne();
        $lastLogin = now();

        // Act
        $user->update(['last_login_at' => $lastLogin]);

        // Assert
        $this->assertDatabaseHasRow('users', [
            'id' => $user->id,
            'last_login_at' => $lastLogin,
        ]);
    }

    /** @test */
    public function itCanHandleUserStatusChanges(): void
    {
        // Arrange
        $user = UserFactory::new()->createOne(['status' => 'active']);

        // Act - Deactivate user
        $user->update(['status' => 'inactive']);

        // Assert
        $freshUser0 = $user->fresh();
        Assert::assertNotNull($freshUser0);
        Assert::assertEquals('inactive', $freshUser0->status);

        // Act - Activate user
        $user->update(['status' => 'active']);

        // Assert
        $freshUser1 = $user->fresh();
        Assert::assertNotNull($freshUser1);
        Assert::assertEquals('active', $freshUser1->status);
    }

    /** @test */
    public function itCanHandleUserPreferences(): void
    {
        $this->skipUnlessUserColumn('users', 'preferences', 'preferences column missing on users table.');

        $user = UserFactory::new()->createOne();
        $preferences = [
            'language' => 'it',
            'timezone' => 'Europe/Rome',
            'notifications' => true,
            'theme' => 'dark',
        ];

        // Act
        $user->update(['preferences' => $preferences]);

        // Assert
        $this->assertDatabaseHasRow('users', [
            'id' => $user->id,
            'preferences' => json_encode($preferences),
        ]);

        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        /** @var array{language: string, timezone: string, notifications: bool, theme: string} $storedPreferences */
        $storedPreferences = is_array($freshUser->getAttribute('preferences'))
            ? $freshUser->getAttribute('preferences')
            : json_decode((string) $freshUser->getAttribute('preferences'), true);
        Assert::assertEquals('it', $storedPreferences['language']);
        Assert::assertEquals('Europe/Rome', $storedPreferences['timezone']);
        Assert::assertTrue($storedPreferences['notifications']);
        Assert::assertEquals('dark', $storedPreferences['theme']);
    }
}
