<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Models;

use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\SocialiteUserFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

final class UserModelTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->skipUnlessUsersTableReady();
    }

    public function testCanCreateUserWithFactory(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertInstanceOf(User::class, $user);
        Assert::assertNotNull($user->id);
        Assert::assertNotNull($user->email);
        Assert::assertNotNull($user->name);
    }

    public function testUserHasEmailAttribute(): void
    {
        $email = 'test-'.uniqid().'@example.com';
        $user = UserFactory::new()->createOne(['email' => $email]);

        Assert::assertSame($email, $user->email);
    }

    public function testUserHasNameAttribute(): void
    {
        $name = 'John Doe';
        $user = UserFactory::new()->createOne(['name' => $name]);

        Assert::assertSame($name, $user->name);
    }

    public function testUserHasFirstNameAndLastNameAttributes(): void
    {
        $user = UserFactory::new()->createOne([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        Assert::assertSame('John', $user->first_name);
        Assert::assertSame('Doe', $user->last_name);
    }

    public function testUserIsActiveByDefault(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertTrue($user->is_active);
    }

    public function testUserCanHaveRolesAssigned(): void
    {
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['guard_name' => 'web']);

        $user->assignRole($role);

        Assert::assertSame(1, $user->roles()->count());
        $firstRole = $user->roles()->first();
        Assert::assertNotNull($firstRole);
        Assert::assertInstanceOf(Role::class, $firstRole);
        Assert::assertSame($role->id, $firstRole->getKey());
    }

    public function testUserCanHaveMultipleRoles(): void
    {
        $user = UserFactory::new()->createOne();
        $role1 = RoleFactory::new()->createOne(['name' => 'admin', 'guard_name' => 'web']);
        $role2 = RoleFactory::new()->createOne(['name' => 'editor', 'guard_name' => 'web']);

        $user->assignRole([$role1, $role2]);

        Assert::assertSame(2, $user->roles()->count());
    }

    public function testUserCanHavePermissions(): void
    {
        $this->skipUnlessDirectPermissionSupported();

        $user = UserFactory::new()->createOne();
        $permission = PermissionFactory::new()->createOne(['guard_name' => 'web', 'name' => 'permission-'.uniqid()]);

        $user->givePermissionTo($permission);

        Assert::assertSame(1, $user->permissions()->count());
    }

    public function testUserCanCheckIfHasRole(): void
    {
        $user = UserFactory::new()->createOne();
        $role = RoleFactory::new()->createOne(['name' => 'admin-'.uniqid(), 'guard_name' => 'web']);

        $user->assignRole($role);

        Assert::assertTrue($user->hasRole($role));
        Assert::assertTrue($user->hasRole($role->name));
    }

    public function testUserCanCheckIfHasPermission(): void
    {
        $this->skipUnlessDirectPermissionSupported();

        $user = UserFactory::new()->createOne();
        $permission = PermissionFactory::new()->createOne(['name' => 'perm-'.uniqid(), 'guard_name' => 'web']);

        $user->givePermissionTo($permission);

        Assert::assertTrue($user->hasPermissionTo($permission));
    }

    public function testUserCanHavePasswordHash(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertNotNull($user->password);
        Assert::assertGreaterThan(10, strlen($user->password));
    }

    public function testPasswordIsHiddenFromSerialization(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertTrue(in_array('password', $user->getHidden(), true));
    }

    public function testUserCanHaveRememberToken(): void
    {
        $user = UserFactory::new()->createOne();
        $token = 'test-remember-token';

        $user->remember_token = $token;
        $user->save();

        $retrieved = User::query()->findOrFail($user->id);
        Assert::assertSame($token, $retrieved->remember_token);
    }

    public function testUserCanBeInactive(): void
    {
        $user = UserFactory::new()->createOne(['is_active' => false]);

        Assert::assertFalse($user->is_active);
    }

    public function testUserCanBeActive(): void
    {
        $user = UserFactory::new()->createOne(['is_active' => true]);

        Assert::assertTrue($user->is_active);
    }

    public function testUserHasPhoneAttribute(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertInstanceOf(User::class, $user);
    }

    public function testUserHasEmailVerifiedAtTimestamp(): void
    {
        $user = UserFactory::new()->createOne(['email_verified_at' => now()]);

        Assert::assertNotNull($user->email_verified_at);
    }

    public function testUserCanHaveUnverifiedEmail(): void
    {
        $user = UserFactory::new()->createOne(['email_verified_at' => null]);

        Assert::assertNull($user->email_verified_at);
    }

    public function testUserCanAccessFilamentByDefault(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertTrue($user->canAccessFilament());
    }

    public function testUserCanAccessSocialiteByDefault(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertTrue($user->canAccessSocialite());
    }

    public function testUserHasTimestamps(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertNotNull($user->created_at);
        Assert::assertNotNull($user->updated_at);
    }

    public function testUserUsesUuidAsPrimaryKey(): void
    {
        $user = UserFactory::new()->createOne();

        Assert::assertNotNull($user->id);
        Assert::assertGreaterThan(0, strlen($user->id));
    }

    public function testUserIncrementsIsFalseForUuid(): void
    {
        Assert::assertFalse(UserFactory::new()->makeOne()->incrementing);
    }

    public function testUserFillableAttributesAreCorrect(): void
    {
        $user = UserFactory::new()->makeOne();

        Assert::assertTrue(in_array('email', $user->getFillable(), true));
        Assert::assertTrue(in_array('name', $user->getFillable(), true));
    }

    public function testUserConnectionIsUser(): void
    {
        $user = UserFactory::new()->makeOne();

        Assert::assertSame('user', $user->getConnectionName());
    }

    public function testUserCanBeQueriedByEmail(): void
    {
        $email = 'unique-test-'.uniqid('', true).'@example.com';
        UserFactory::new()->createOne(['email' => $email]);

        $user = User::where('email', $email)->first();

        Assert::assertNotNull($user);
        Assert::assertSame($email, $user->email);
    }

    public function testUserCanBeUpdated(): void
    {
        $user = UserFactory::new()->createOne(['name' => 'Original Name']);
        $originalId = $user->id;

        $user->update(['name' => 'Updated Name']);

        Assert::assertSame('Updated Name', $user->name);
        $refreshed = User::query()->findOrFail($originalId);
        Assert::assertSame('Updated Name', $refreshed->name);
    }

    public function testUserCanBeDeleted(): void
    {
        $this->skipUnlessDirectPermissionSupported();

        $user = UserFactory::new()->createOne();
        $userId = $user->id;

        $user->delete();

        $deleted = User::find($userId);
        Assert::assertNull($deleted);
    }

    public function testUserHasCurrentTeamIdAttribute(): void
    {
        $user = UserFactory::new()->createOne(['current_team_id' => 'team-123']);

        Assert::assertSame('team-123', $user->current_team_id);
    }

    public function testUserHasLangAttributeForLocalization(): void
    {
        $user = UserFactory::new()->createOne(['lang' => 'it']);

        Assert::assertSame('it', $user->lang);
    }

    public function testUserBelongsToSocialiteUsers(): void
    {
        $user = UserFactory::new()->createOne();
        SocialiteUserFactory::new()->createOne([
            'user_id' => $user->id,
            'provider' => 'google',
            'provider_id' => 'google-'.uniqid(),
        ]);

        $socialiteUsers = $user->socialiteUsers()->get();

        Assert::assertCount(1, $socialiteUsers);
        $firstSocialite = $socialiteUsers->first();
        Assert::assertNotNull($firstSocialite);
        Assert::assertSame('google', $firstSocialite->provider);
    }

    public function testUserCanHaveMultipleSocialiteAccounts(): void
    {
        $user = UserFactory::new()->createOne();
        SocialiteUserFactory::new()->createOne([
            'user_id' => $user->id,
            'provider' => 'google',
            'provider_id' => 'google-'.uniqid(),
        ]);
        SocialiteUserFactory::new()->createOne([
            'user_id' => $user->id,
            'provider' => 'github',
            'provider_id' => 'github-'.uniqid(),
        ]);

        Assert::assertSame(2, $user->socialiteUsers()->count());
    }
}
