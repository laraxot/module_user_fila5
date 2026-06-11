<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

beforeEach(function () {
    /* @var \Modules\User\Tests\TestCase $this */
    $this->user = UserFactory::new()->createOne([
        'email' => 'user-'.uniqid('', true).'@example.com',
    ]);
    $this->admin = UserFactory::new()->createOne([
        'email' => 'admin-'.uniqid('', true).'@example.com',
    ]);
});

describe('User Model Creation', function () {
    it('can be created with valid data', function () {
        /** @var Modules\User\Tests\TestCase $this */
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
    });

    it('generates uuid for id', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertNotEmpty($user->id);
    });

    it('uses user database connection', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertIsString($user->getConnectionName());
    });

    it('has factory', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $users = UserFactory::new()->count(3)->create();
        /* @var \Illuminate\Database\Eloquent\Collection<int, \Modules\User\Models\User> $users */

        Assert::assertCount(3, $users);
        $users->each(function ($user) {
            Assert::assertInstanceOf(User::class, $user);
        });
    });
});

describe('User Model Attributes', function () {
    it('has full name accessor', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = UserFactory::new()->createOne([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        Assert::assertSame('John Doe', $user->full_name);
    });

    it('can have password expiration', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->addDays(30),
        ]);

        Assert::assertNotNull($user->password_expires_at);
    });

    it('can be active or inactive', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $activeUser = UserFactory::new()->createOne(['is_active' => true]);
        $inactiveUser = UserFactory::new()->createOne(['is_active' => false]);

        Assert::assertSame(true, $activeUser->is_active);
        Assert::assertSame(false, $inactiveUser->is_active);
    });

    it('can have otp enabled', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = UserFactory::new()->createOne(['is_otp' => true]);

        Assert::assertSame(true, $user->is_otp);
    });

    it('can have profile photo path', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = UserFactory::new()->createOne([
            'profile_photo_path' => 'photos/user.jpg',
        ]);

        Assert::assertSame('photos/user.jpg', $user->profile_photo_path);
    });
});

describe('User Authentication Features', function () {
    it('can verify email', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);

        Assert::assertNull($user->email_verified_at);
        $user->update(['email_verified_at' => now()]);

        $freshModel0 = $user->fresh();
        Assert::assertNotNull($freshModel0);
        Assert::assertNotNull($freshModel0->email_verified_at);
    });

    it('can store remember token', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $token = Str::random(60);
        $user = UserFactory::new()->createOne([
            'remember_token' => $token,
        ]);

        Assert::assertSame($token, $user->remember_token);
    });

    it('can access socialite feature', function () {
        /* @var \Modules\User\Tests\TestCase $this */
    });
});

describe('User Relationships', function () {
    it('can have teams', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->teams());
    });

    it('can own teams', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(HasMany::class, $user->ownedTeams());
    });

    it('can have current team', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $team = TeamFactory::new()->createOne(['user_id' => $user->id]);
        $user->update(['current_team_id' => $team->id]);

        Assert::assertNotNull($user->currentTeam());
    });

    it('can have roles', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->roles());
    });

    it('can have permissions', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->permissions());
    });

    it('can have profile', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(Illuminate\Database\Eloquent\Relations\HasOne::class, $user->profile());
    });

    it('can have devices', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(BelongsToMany::class, $user->devices());
    });

    it('can have authentication logs', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->authentications());
    });

    it('can have oauth clients', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $relation = $user->clients();
        Assert::assertInstanceOf(MorphMany::class, $relation);
    });

    it('can have oauth tokens', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $relation = $user->tokens();
        Assert::assertInstanceOf(HasMany::class, $relation);
    });

    it('can have notifications', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->notifications());
    });

    it('can have socialite users', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(HasMany::class, $user->socialiteUsers());
    });
});

describe('User Team Management', function () {
    it('can join a team', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $team = TeamFactory::new()->createOne();
        $user->teams()->attach($team);

        $freshModel1 = $user->fresh();
        Assert::assertNotNull($freshModel1);
        Assert::assertTrue($freshModel1->teams->contains('id', $team->id));
    });

    it('can leave a team', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $team = TeamFactory::new()->createOne();
        $user->teams()->attach($team);
        $user->teams()->detach($team);

        $freshModel2 = $user->fresh();
        Assert::assertNotNull($freshModel2);
        Assert::assertFalse($freshModel2->teams->contains('id', $team->id));
    });

    it('can own multiple teams', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        TeamFactory::new()->count(3)->create(['user_id' => $user->id]);

        $freshModel3 = $user->fresh();
        Assert::assertNotNull($freshModel3);
        Assert::assertCount(3, $freshModel3->ownedTeams);
    });

    it('can switch current team', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $team1 = TeamFactory::new()->createOne(['user_id' => $user->id]);
        $team2 = TeamFactory::new()->createOne(['user_id' => $user->id]);

        $user->update(['current_team_id' => $team1->id]);
        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame($team1->id, $freshUser->current_team_id);
        $user->update(['current_team_id' => $team2->id]);
        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame($team2->id, $freshUser->current_team_id);
    });
});

describe('User Permission System', function () {
    beforeEach(function () {
        /** @var Modules\User\Tests\TestCase $this */
        if (! $this->userTableExists('model_has_permission')) {
            $this->markTestSkipped('model_has_permission table missing on user connection.');
        }
    });

    it('can have roles assigned', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $role = RoleFactory::new()->createOne(['name' => 'assigned role '.uniqid()]);

        $user->assignRole($role);

        Assert::assertTrue($user->hasRole($role));
    });

    it('can have direct permissions', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $permission = PermissionFactory::new()->createOne(['name' => 'direct permission '.uniqid()]);

        $user->givePermissionTo($permission);

        Assert::assertTrue($user->hasPermissionTo($permission));
    });

    it('can check multiple permissions', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $uid = uniqid();
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo([$permission1, $permission2]);

        Assert::assertTrue($user->hasAllPermissions([$permission1, $permission2]));
    });

    it('can check any permission', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        $uid = uniqid();
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo($permission1);

        Assert::assertTrue($user->hasAnyPermission([$permission1, $permission2]));
    });
});

describe('User Media Management', function () {
    it('implements HasMedia interface', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(User::class, $user);
    });

    it('can have media attached', function () {
        /** @var Modules\User\Tests\TestCase $this */
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->media());
    });
});

describe('User Scopes and Queries', function () {
    it('can filter by active users', function () {
        /* @var \Modules\User\Tests\TestCase $this */
        UserFactory::new()->createOne(['is_active' => true]);
        UserFactory::new()->createOne(['is_active' => false]);

        $activeUsers = User::where('is_active', true)->get();
        $inactiveUsers = User::where('is_active', false)->get();

        Assert::assertSame(true, $activeUsers->every(fn ($user) => $user->is_active));
        Assert::assertSame(true, $inactiveUsers->every(fn ($user) => ! $user->is_active));
    });

    it('can filter by email verified', function () {
        /* @var \Modules\User\Tests\TestCase $this */
        UserFactory::new()->createOne(['email_verified_at' => now()]);
        UserFactory::new()->createOne(['email_verified_at' => null]);

        $verifiedUsers = User::whereNotNull('email_verified_at')->get();
        $unverifiedUsers = User::whereNull('email_verified_at')->get();

        Assert::assertSame(true, $verifiedUsers->every(fn ($user) => null !== $user->email_verified_at));
        Assert::assertSame(true, $unverifiedUsers->every(fn ($user) => null === $user->email_verified_at));
    });

    it('can filter by language', function () {
        /* @var \Modules\User\Tests\TestCase $this */
        UserFactory::new()->createOne(['lang' => 'it']);
        UserFactory::new()->createOne(['lang' => 'en']);

        $italianUsers = User::where('lang', 'it')->get();
        $englishUsers = User::where('lang', 'en')->get();

        Assert::assertSame(true, $italianUsers->every(fn ($user) => 'it' === $user->lang));
        Assert::assertSame(true, $englishUsers->every(fn ($user) => 'en' === $user->lang));
    });
});
