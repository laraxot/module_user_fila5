<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Two\InvalidStateException;
use Modules\User\Contracts\TeamContract;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Events\AddingTeam;
use Modules\User\Events\AddingTeamMember;
use Modules\User\Events\InvalidState;
use Modules\User\Events\InvitingTeamMember;
use Modules\User\Events\Login;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Events\RecoveryCodeReplaced;
use Modules\User\Events\RecoveryCodesGenerated;
use Modules\User\Events\Registered;
use Modules\User\Events\RegistrationNotEnabled;
use Modules\User\Events\RemovingTeamMember;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Events\TeamCreated;
use Modules\User\Events\TeamDeleted;
use Modules\User\Events\TeamMemberAdded;
use Modules\User\Events\TeamMemberRemoved;
use Modules\User\Events\TeamMemberUpdated;
use Modules\User\Events\TeamSwitched;
use Modules\User\Events\TeamUpdated;
use Modules\User\Events\TwoFactorAuthenticationChallenged;
use Modules\User\Events\TwoFactorAuthenticationConfirmed;
use Modules\User\Events\TwoFactorAuthenticationDisabled;
use Modules\User\Events\TwoFactorAuthenticationEnabled;
use Modules\User\Events\UserNotAllowed;
use Modules\User\Events\UserRegistered;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class UserEventsCoverageTest extends TestCase
{
    public function test_instantiates_team_and_membership_events(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();

        $this->assertInstanceOf(AddingTeam::class, new AddingTeam($user));
        $this->assertInstanceOf(AddingTeamMember::class, new AddingTeamMember($team, $user));
        $this->assertInstanceOf(InvitingTeamMember::class, new InvitingTeamMember($team, 'member@example.com', 'editor'));
        $this->assertInstanceOf(RemovingTeamMember::class, new RemovingTeamMember($team, $user));
        $this->assertInstanceOf(TeamMemberAdded::class, new TeamMemberAdded($team, $user));
        $this->assertInstanceOf(TeamMemberRemoved::class, new TeamMemberRemoved($team, $user));
        $this->assertInstanceOf(TeamMemberUpdated::class, new TeamMemberUpdated($team, $user));
        $this->assertInstanceOf(TeamSwitched::class, new TeamSwitched($team, $user));
        $this->assertInstanceOf(TeamCreated::class, new TeamCreated($team));
        $this->assertInstanceOf(TeamUpdated::class, new TeamUpdated($team));
        $this->assertInstanceOf(TeamDeleted::class, new TeamDeleted($team));
    }

    public function test_instantiates_socialite_and_auth_events(): void
    {
        $socialiteUser = new SocialiteUser([
            'provider' => 'github',
            'provider_id' => 'provider-'.uniqid(),
            'email' => 'oauth-'.uniqid().'@example.com',
        ]);
        $oauthUser = typedMock(SocialiteUserContract::class);

        $this->assertInstanceOf(Login::class, new Login($socialiteUser));
        $this->assertInstanceOf(Registered::class, new Registered($socialiteUser));
        $this->assertInstanceOf(SocialiteUserConnected::class, new SocialiteUserConnected($socialiteUser));
        $this->assertInstanceOf(RegistrationNotEnabled::class, new RegistrationNotEnabled('github', $oauthUser));
        $this->assertInstanceOf(UserNotAllowed::class, new UserNotAllowed($oauthUser));
    }

    public function test_instantiates_recovery_and_invalid_state_events(): void
    {
        /** @var Authenticatable $auth */
        $auth = UserFactory::new()->makeOne();
        $exception = new InvalidStateException('state invalid');

        $this->assertInstanceOf(RecoveryCodeReplaced::class, new RecoveryCodeReplaced($auth, '123456'));
        $this->assertInstanceOf(InvalidState::class, new InvalidState($exception));
    }

    public function test_instantiates_two_factor_events(): void
    {
        $user = UserFactory::new()->makeOne();

        $this->assertInstanceOf(TwoFactorAuthenticationEnabled::class, new TwoFactorAuthenticationEnabled($user));
        $this->assertInstanceOf(TwoFactorAuthenticationDisabled::class, new TwoFactorAuthenticationDisabled($user));
        $this->assertInstanceOf(TwoFactorAuthenticationConfirmed::class, new TwoFactorAuthenticationConfirmed($user));
        $this->assertInstanceOf(TwoFactorAuthenticationChallenged::class, new TwoFactorAuthenticationChallenged($user));
    }

    public function test_exposes_broadcast_channel_for_new_password_set_event(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new NewPasswordSet($user);

        $channels = $event->broadcastOn();

        $this->assertCount(1, $channels);
        $this->assertInstanceOf(PrivateChannel::class, $channels[0]);
    }

    public function test_instantiates_recovery_generated_and_user_registered_events(): void
    {
        $userContract = UserFactory::new()->makeOne();
        $user = new User();

        $generated = new RecoveryCodesGenerated($userContract);
        $registered = new UserRegistered($user, ['source' => 'test'], '127.0.0.1', 'Pest');

        $this->assertInstanceOf(RecoveryCodesGenerated::class, $generated);
        $this->assertInstanceOf(UserRegistered::class, $registered);
        $this->assertSame(['source' => 'test'], $registered->formData);
        $this->assertSame('127.0.0.1', $registered->ipAddress);
    }
}
