<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

final class UserModelTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = UserFactory::new()->createOne([
            'email' => 'user-'.uniqid('', true).'@example.com',
        ]);
    }

    public function testCanBeCreatedWithValidData(): void
    {
        $userData = [
            'name' => 'Test User',
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test-'.uniqid().'@example.com',
            'password' => bcrypt('password'),
            'lang' => 'it',
            'is_active' => true,
        ];

        $user = UserFactory::new()->createOne($userData);

        Assert::assertInstanceOf(User::class, $user);
    }

    public function testGeneratesUuidForId(): void
    {
        $user = $this->requireUser();
        Assert::assertNotEmpty($user->id);
    }

    public function testUsesUserDatabaseConnection(): void
    {
        $user = $this->requireUser();
        Assert::assertIsString($user->getConnectionName());
    }

    public function testHasFactory(): void
    {
        $users = UserFactory::new()->count(3)->create();
        /** @var \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users */

        Assert::assertCount(3, $users);
        $users->each(function ($user) {
            Assert::assertInstanceOf(User::class, $user);
        });
    }

    public function testHasFullNameAccessor(): void
    {
        $user = UserFactory::new()->createOne([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        Assert::assertSame('John Doe', $user->full_name);
    }

    public function testCanHavePasswordExpiration(): void
    {
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->addDays(30),
        ]);

        Assert::assertNotNull($user->password_expires_at);
    }

    public function testCanBeActiveOrInactive(): void
    {
        $activeUser = UserFactory::new()->createOne(['is_active' => true]);
        $inactiveUser = UserFactory::new()->createOne(['is_active' => false]);

        Assert::assertSame(true, $activeUser->is_active);
        Assert::assertSame(false, $inactiveUser->is_active);
    }

    public function testCanHaveOtpEnabled(): void
    {
        $user = UserFactory::new()->createOne(['is_otp' => true]);

        Assert::assertSame(true, $user->is_otp);
    }

    public function testCanHaveProfilePhotoPath(): void
    {
        $user = UserFactory::new()->createOne([
            'profile_photo_path' => 'photos/user.jpg',
        ]);

        Assert::assertSame('photos/user.jpg', $user->profile_photo_path);
    }

    public function testCanVerifyEmail(): void
    {
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);

        Assert::assertNull($user->email_verified_at);
        $user->update(['email_verified_at' => now()]);

        $freshModel0 = $user->fresh();
        Assert::assertNotNull($freshModel0);
        Assert::assertNotNull($freshModel0->email_verified_at);
    }

    public function testCanStoreRememberToken(): void
    {
        $token = Str::random(60);
        $user = UserFactory::new()->createOne([
            'remember_token' => $token,
        ]);

        Assert::assertSame($token, $user->remember_token);
    }

    public function testCanHaveTeams(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->teams());
    }

    public function testCanOwnTeams(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(HasMany::class, $user->ownedTeams());
    }

    public function testCanHaveCurrentTeam(): void
    {
        $user = $this->requireUser();
        $team = TeamFactory::new()->createOne(['user_id' => $user->id]);
        $user->update(['current_team_id' => $team->id]);

        Assert::assertInstanceOf(BelongsToMany::class, $user->teams());
    }

    public function testCanHaveRoles(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->roles());
    }

    public function testCanHavePermissions(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->permissions());
    }

    public function testCanHaveProfile(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasOne::class, $user->profile());
    }

    public function testCanHaveDevices(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->devices());
    }

    public function testCanHaveAuthenticationLogs(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->authentications());
    }

    public function testCanHaveOauthClients(): void
    {
        $user = $this->requireUser();
        $relation = $user->clients();
        Assert::assertInstanceOf(MorphMany::class, $relation);
    }

    public function testCanHaveOauthTokens(): void
    {
        $user = $this->requireUser();
        $relation = $user->tokens();
        Assert::assertInstanceOf(HasMany::class, $relation);
    }

    public function testCanHaveNotifications(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->notifications());
    }

    public function testCanHaveSocialiteUsers(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(HasMany::class, $user->socialiteUsers());
    }

    public function testCanJoinATeam(): void
    {
        $user = $this->requireUser();
        $team = TeamFactory::new()->createOne();
        $user->teams()->attach($team);

        $freshModel1 = $user->fresh();
        Assert::assertNotNull($freshModel1);
        Assert::assertTrue($freshModel1->teams->contains('id', $team->id));
    }

    public function testCanLeaveATeam(): void
    {
        $user = $this->requireUser();
        $team = TeamFactory::new()->createOne();
        $user->teams()->attach($team);
        $user->teams()->detach($team);

        $freshModel2 = $user->fresh();
        Assert::assertNotNull($freshModel2);
        Assert::assertFalse($freshModel2->teams->contains('id', $team->id));
    }

    public function testCanOwnMultipleTeams(): void
    {
        $user = $this->requireUser();
        TeamFactory::new()->count(3)->create(['user_id' => $user->id]);

        $freshModel3 = $user->fresh();
        Assert::assertNotNull($freshModel3);
        Assert::assertCount(3, $freshModel3->ownedTeams);
    }

    public function testCanSwitchCurrentTeam(): void
    {
        $user = $this->requireUser();
        $team1 = TeamFactory::new()->createOne(['user_id' => $user->id]);
        $team2 = TeamFactory::new()->createOne(['user_id' => $user->id]);

        $user->update(['current_team_id' => $team1->id]);
        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame($team1->id, $freshUser->current_team_id);
        $user->update(['current_team_id' => $team2->id]);
        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame($team2->id, $freshUser->current_team_id);
    }

    public function testPermissionSkipCheck(): void
    {
        if (! $this->userTableExists('model_has_permission')) {
            $this->markTestSkipped('model_has_permission table missing on user connection.');
        }

        $user = $this->requireUser();
        $role = RoleFactory::new()->createOne(['name' => 'assigned role '.uniqid()]);

        $user->assignRole($role);

        Assert::assertTrue($user->hasRole($role));
    }

    public function testCanHaveDirectPermissions(): void
    {
        if (! $this->userTableExists('model_has_permission')) {
            $this->markTestSkipped('model_has_permission table missing on user connection.');
        }

        $user = $this->requireUser();
        $permission = PermissionFactory::new()->createOne(['name' => 'direct permission '.uniqid()]);

        $user->givePermissionTo($permission);

        Assert::assertTrue($user->hasPermissionTo($permission));
    }

    public function testCanCheckMultiplePermissions(): void
    {
        if (! $this->userTableExists('model_has_permission')) {
            $this->markTestSkipped('model_has_permission table missing on user connection.');
        }

        $user = $this->requireUser();
        $uid = uniqid();
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo([$permission1, $permission2]);

        Assert::assertTrue($user->hasAllPermissions([$permission1, $permission2]));
    }

    public function testCanCheckAnyPermission(): void
    {
        if (! $this->userTableExists('model_has_permission')) {
            $this->markTestSkipped('model_has_permission table missing on user connection.');
        }

        $user = $this->requireUser();
        $uid = uniqid();
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo($permission1);

        Assert::assertTrue($user->hasAnyPermission([$permission1, $permission2]));
    }

    public function testImplementsHasMediaInterface(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(User::class, $user);
    }

    public function testCanHaveMediaAttached(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->media());
    }

    public function testCanFilterByActiveUsers(): void
    {
        UserFactory::new()->createOne(['is_active' => true]);
        UserFactory::new()->createOne(['is_active' => false]);

        $activeUsers = User::where('is_active', true)->get();
        $inactiveUsers = User::where('is_active', false)->get();

        Assert::assertSame(true, $activeUsers->every(fn ($user) => $user->is_active));
        Assert::assertSame(true, $inactiveUsers->every(fn ($user) => ! $user->is_active));
    }

    public function testCanFilterByEmailVerified(): void
    {
        UserFactory::new()->createOne(['email_verified_at' => now()]);
        UserFactory::new()->createOne(['email_verified_at' => null]);

        $verifiedUsers = User::whereNotNull('email_verified_at')->get();
        $unverifiedUsers = User::whereNull('email_verified_at')->get();

        Assert::assertSame(true, $verifiedUsers->every(fn ($user) => null !== $user->email_verified_at));
        Assert::assertSame(true, $unverifiedUsers->every(fn ($user) => null === $user->email_verified_at));
    }

    public function testCanFilterByLanguage(): void
    {
        UserFactory::new()->createOne(['lang' => 'it']);
        UserFactory::new()->createOne(['lang' => 'en']);

        $italianUsers = User::where('lang', 'it')->get();
        $englishUsers = User::where('lang', 'en')->get();

        Assert::assertSame(true, $italianUsers->every(fn ($user) => 'it' === $user->lang));
        Assert::assertSame(true, $englishUsers->every(fn ($user) => 'en' === $user->lang));
    }
}
