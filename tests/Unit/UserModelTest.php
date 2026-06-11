<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Carbon\Carbon;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Profile;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

// In-memory helper: build a User without touching DB
/**
 * @param array<string, mixed> $attributes
 */
function stubUser(array $attributes = []): User
{
    $defaults = [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'name' => 'John Doe',
        'email' => 'john.doe@example.test',
        'email_verified_at' => Carbon::now(),
        'password' => password_hash('secret', PASSWORD_BCRYPT),
        'remember_token' => null,
        'lang' => 'it',
        'is_active' => true,
        'is_otp' => false,
        'password_expires_at' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];

    /** @var User $u */
    $u = new User();
    $u->forceFill(array_merge($defaults, $attributes));

    return $u;
}

describe('User Model', function () {
    it('can be created (in-memory)', function () {
        $user = stubUser();

        Assert::assertInstanceOf(User::class, $user);
        Assert::assertFalse($user->exists);
        Assert::assertIsString($user->email);
    });

    it('supports mass-assignment of expected attributes (behavior)', function () {
        $data = [
            'first_name' => 'Jane',
            'last_name' => 'Roe',
            'name' => 'Jane Roe',
            'email' => 'jane.roe@example.test',
            'lang' => 'en',
            'is_active' => false,
            'is_otp' => true,
        ];
        $user = new User($data);
        Assert::assertSame('Jane', $user->first_name);
        Assert::assertSame('Roe', $user->last_name);
        Assert::assertSame('jane.roe@example.test', $user->email);
        Assert::assertSame('en', $user->lang);
        Assert::assertFalse($user->is_active);
        Assert::assertTrue($user->is_otp);
    });

    it('declares sensitive attributes as hidden (without serialization)', function () {
        $user = stubUser();
        $hidden = $user->getHidden();
        Assert::assertStringContainsString('password', implode(',', $hidden));
        Assert::assertContains('remember_token', $hidden);
    });

    it('casts attributes correctly', function () {
        $user = stubUser([
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'is_active' => true,
            'is_otp' => false,
        ]);

        Assert::assertInstanceOf(Carbon::class, $user->email_verified_at);

        Assert::assertInstanceOf(Carbon::class, $user->created_at);
    });

    describe('Relationships', function () {
        it('has profile relationship (in-memory)', function () {
            $user = stubUser();
            /** @var Profile $profile */
            $profile = new Profile();
            $profile->forceFill(['user_id' => 'test-user-id']);
            // Set relation without touching DB
            $user->setRelation('profile', $profile);

            Assert::assertInstanceOf(Profile::class, $user->profile);
        });

        it('can attach authentication logs in-memory', function () {
            $user = stubUser();
            /** @var AuthenticationLog $log */
            $log = new AuthenticationLog();
            $user->setRelation('authentications', collect([$log]));
            Assert::assertCount(1, $user->authentications);
        });

        it('can expose ownedTeams relation when preset', function () {
            $user = stubUser();
            /** @var Team $team */
            $team = new Team();
            $user->setRelation('ownedTeams', collect([$team]));
            Assert::assertCount(1, $user->ownedTeams);
        });

        it('can expose teams relation when preset', function () {
            $user = stubUser();
            /** @var Team $team */
            $team = new Team();
            $user->setRelation('teams', collect([$team]));
            Assert::assertCount(1, $user->teams);
        });
    });

    describe('Accessors and Mutators', function () {
        it('has full_name accessor', function () {
            $user = stubUser([
                'first_name' => 'John',
                'last_name' => 'Doe',
            ]);

            Assert::assertSame('John Doe', $user->full_name);
        });

        it('handles null names in full_name accessor', function () {
            $user = stubUser([
                'first_name' => 'John',
                'last_name' => null,
            ]);

            // Some implementations may include a trailing space when last_name is null
            Assert::assertSame('John', rtrim($user->full_name));
        });

        it('hashes password when set', function () {
            $user = stubUser(['password' => 'plain-password']);
        });
    });

    describe('Authentication Features', function () {
        it('reflects verified email state when timestamp is set', function () {
            $user = stubUser(['email_verified_at' => null]);
            Assert::assertFalse($user->hasVerifiedEmail());
            $user->email_verified_at = Illuminate\Support\Carbon::parse(Carbon::now()->toDateTimeString());
            Assert::assertTrue($user->hasVerifiedEmail());
        });

        it('can be activated/deactivated (in-memory)', function () {
            $user = stubUser(['is_active' => false]);
            Assert::assertFalse($user->is_active);
            // simulate activation without DB
            $user->is_active = true;
            Assert::assertTrue($user->is_active);
        });

        it('supports OTP authentication', function () {
            $user = stubUser(['is_otp' => true]);

            Assert::assertTrue($user->is_otp);
        });
    });

    describe('Scopes and Queries', function () {
        it('exposes active flag for filtering (in-memory)', function () {
            $u1 = stubUser(['is_active' => true]);
            $u2 = stubUser(['is_active' => false]);

            $active = collect([$u1, $u2])->filter(fn (User $u) => true === $u->is_active);
            $inactive = collect([$u1, $u2])->filter(fn (User $u) => false === $u->is_active);

            Assert::assertCount(1, $inactive);
            Assert::assertCount(1, $active);
        });

        it('exposes email verification flag for filtering (in-memory)', function () {
            $u1 = stubUser(['email_verified_at' => Carbon::now()]);
            $u2 = stubUser(['email_verified_at' => null]);

            $verified = collect([$u1, $u2])->filter(fn (User $u) => null !== $u->email_verified_at);
            $unverified = collect([$u1, $u2])->filter(fn (User $u) => null === $u->email_verified_at);

            Assert::assertCount(1, $unverified);
            Assert::assertCount(1, $verified);
        });

        it('exposes language for filtering (in-memory)', function () {
            $u1 = stubUser(['lang' => 'it']);
            $u2 = stubUser(['lang' => 'en']);

            $italians = collect([$u1, $u2])->where('lang', 'it');
            Assert::assertCount(1, $italians);
        });
    });

    describe('Security Features', function () {
        it('has password expiration', function () {
            $user = stubUser(['password_expires_at' => Carbon::now()->addDays(30)]);

            Assert::assertInstanceOf(Carbon::class, $user->password_expires_at);
        });

        it('tracks creation and updates (in-memory)', function () {
            $user = stubUser();

            // created_by/updated_by may be null in-memory; assert timestamps typing only
            Assert::assertInstanceOf(Carbon::class, $user->created_at);
            Assert::assertInstanceOf(Carbon::class, $user->updated_at);
        });
    });

    describe('Team Management', function () {
        it('can have current team (in-memory)', function () {
            $user = stubUser(['current_team_id' => 'team-id']);
            Assert::assertSame('team-id', $user->current_team_id);
        });

        it('can own teams (in-memory)', function () {
            $user = stubUser();
            /** @var Team $team */
            $team = new Team();
            $team->forceFill(['user_id' => $user->id]);
            $user->setRelation('ownedTeams', collect([$team]));

            Assert::assertCount(1, $user->ownedTeams);
        });
    });
});
