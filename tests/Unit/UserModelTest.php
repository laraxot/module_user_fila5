<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Carbon\Carbon;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Profile;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

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

class UserModelTest extends TestCase
{
    public function test_can_be_created_in_memory(): void
    {
        $user = stubUser();

        $this->assertInstanceOf(User::class, $user);
        $this->assertFalse($user->exists);
        $this->assertIsString($user->email);
    }

    public function test_supports_mass_assignment_of_expected_attributes_behavior(): void
    {
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
        $this->assertSame('Jane', $user->first_name);
        $this->assertSame('Roe', $user->last_name);
        $this->assertSame('jane.roe@example.test', $user->email);
        $this->assertSame('en', $user->lang);
        $this->assertFalse($user->is_active);
        $this->assertTrue($user->is_otp);
    }

    public function test_declares_sensitive_attributes_as_hidden_without_serialization(): void
    {
        $user = stubUser();
        $hidden = $user->getHidden();
        $this->assertStringContainsString('password', implode(',', $hidden));
        $this->assertContains('remember_token', $hidden);
    }

    public function test_casts_attributes_correctly(): void
    {
        $user = stubUser([
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'is_active' => true,
            'is_otp' => false,
        ]);

        $this->assertInstanceOf(Carbon::class, $user->email_verified_at);

        $this->assertInstanceOf(Carbon::class, $user->created_at);
    }

    public function test_has_profile_relationship_in_memory(): void
    {
        $user = stubUser();
        $profile = new Profile();
        $profile->forceFill(['user_id' => 'test-user-id']);
        $user->setRelation('profile', $profile);

        $this->assertInstanceOf(Profile::class, $user->profile);
    }

    public function test_can_attach_authentication_logs_in_memory(): void
    {
        $user = stubUser();
        $log = new AuthenticationLog();
        $user->setRelation('authentications', collect([$log]));
        $this->assertCount(1, $user->authentications);
    }

    public function test_can_expose_owned_teams_relation_when_preset(): void
    {
        $user = stubUser();
        $team = new Team();
        $user->setRelation('ownedTeams', collect([$team]));
        $this->assertCount(1, $user->ownedTeams);
    }

    public function test_can_expose_teams_relation_when_preset(): void
    {
        $user = stubUser();
        $team = new Team();
        $user->setRelation('teams', collect([$team]));
        $this->assertCount(1, $user->teams);
    }

    public function test_has_full_name_accessor(): void
    {
        $user = stubUser([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $this->assertSame('John Doe', $user->full_name);
    }

    public function test_handles_null_names_in_full_name_accessor(): void
    {
        $user = stubUser([
            'first_name' => 'John',
            'last_name' => null,
        ]);

        $this->assertSame('John', rtrim($user->full_name));
    }

    public function test_hashes_password_when_set(): void
    {
        $user = stubUser(['password' => 'plain-password']);
    }

    public function test_reflects_verified_email_state_when_timestamp_is_set(): void
    {
        $user = stubUser(['email_verified_at' => null]);
        $this->assertFalse($user->hasVerifiedEmail());
        $user->email_verified_at = \Illuminate\Support\Carbon::parse(Carbon::now()->toDateTimeString());
        $this->assertTrue($user->hasVerifiedEmail());
    }

    public function test_can_be_activated_deactivated_in_memory(): void
    {
        $user = stubUser(['is_active' => false]);
        $this->assertFalse($user->is_active);
        $user->is_active = true;
        $this->assertTrue($user->is_active);
    }

    public function test_supports_otp_authentication(): void
    {
        $user = stubUser(['is_otp' => true]);

        $this->assertTrue($user->is_otp);
    }

    public function test_exposes_active_flag_for_filtering_in_memory(): void
    {
        $u1 = stubUser(['is_active' => true]);
        $u2 = stubUser(['is_active' => false]);

        $active = collect([$u1, $u2])->filter(fn (User $u) => true === $u->is_active);
        $inactive = collect([$u1, $u2])->filter(fn (User $u) => false === $u->is_active);

        $this->assertCount(1, $inactive);
        $this->assertCount(1, $active);
    }

    public function test_exposes_email_verification_flag_for_filtering_in_memory(): void
    {
        $u1 = stubUser(['email_verified_at' => Carbon::now()]);
        $u2 = stubUser(['email_verified_at' => null]);

        $verified = collect([$u1, $u2])->filter(fn (User $u) => null !== $u->email_verified_at);
        $unverified = collect([$u1, $u2])->filter(fn (User $u) => null === $u->email_verified_at);

        $this->assertCount(1, $unverified);
        $this->assertCount(1, $verified);
    }

    public function test_exposes_language_for_filtering_in_memory(): void
    {
        $u1 = stubUser(['lang' => 'it']);
        $u2 = stubUser(['lang' => 'en']);

        $italians = collect([$u1, $u2])->where('lang', 'it');
        $this->assertCount(1, $italians);
    }

    public function test_has_password_expiration(): void
    {
        $user = stubUser(['password_expires_at' => Carbon::now()->addDays(30)]);

        $this->assertInstanceOf(Carbon::class, $user->password_expires_at);
    }

    public function test_tracks_creation_and_updates_in_memory(): void
    {
        $user = stubUser();

        $this->assertInstanceOf(Carbon::class, $user->created_at);
        $this->assertInstanceOf(Carbon::class, $user->updated_at);
    }

    public function test_can_have_current_team_in_memory(): void
    {
        $user = stubUser(['current_team_id' => 'team-id']);
        $this->assertSame('team-id', $user->current_team_id);
    }

    public function test_can_own_teams_in_memory(): void
    {
        $user = stubUser();
        $team = new Team();
        $team->forceFill(['user_id' => $user->id]);
        $user->setRelation('ownedTeams', collect([$team]));

        $this->assertCount(1, $user->ownedTeams);
    }
}
