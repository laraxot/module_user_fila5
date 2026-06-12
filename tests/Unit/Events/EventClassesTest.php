<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Events;

use Modules\User\Contracts\TeamContract;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Events\AddingTeam;
use Modules\User\Events\AddingTeamMember;
use Modules\User\Events\RecoveryCodeReplaced;
use Modules\User\Events\RecoveryCodesGenerated;
use Modules\User\Events\TeamMemberAdded;
use Modules\User\Events\TeamMemberRemoved;
use Modules\User\Events\TeamMemberUpdated;
use Modules\User\Events\TeamSwitched;
use Modules\User\Events\TwoFactorAuthenticationDisabled;
use Modules\User\Events\TwoFactorAuthenticationEnabled;
use Modules\User\Tests\TestCase;

class EventClassesTest extends TestCase
{
    public function test_recovery_codes_generated_event_can_be_instantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new RecoveryCodesGenerated($user);

        $this->assertInstanceOf(RecoveryCodesGenerated::class, $event);
        $this->assertSame($user, $event->userContract);
    }

    public function test_team_member_added_event_can_be_instantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamMemberAdded($team, $user);

        $this->assertInstanceOf(TeamMemberAdded::class, $event);
    }

    public function test_team_member_removed_event_can_be_instantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamMemberRemoved($team, $user);

        $this->assertInstanceOf(TeamMemberRemoved::class, $event);
    }

    public function test_two_factor_authentication_enabled_event_can_be_instantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new TwoFactorAuthenticationEnabled($user);

        $this->assertInstanceOf(TwoFactorAuthenticationEnabled::class, $event);
        $this->assertSame($user, $event->userContract);
    }

    public function test_two_factor_authentication_disabled_event_can_be_instantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new TwoFactorAuthenticationDisabled($user);

        $this->assertInstanceOf(TwoFactorAuthenticationDisabled::class, $event);
        $this->assertSame($user, $event->userContract);
    }

    public function test_recovery_code_replaced_event_can_be_instantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new RecoveryCodeReplaced($user, 'test_code');

        $this->assertInstanceOf(RecoveryCodeReplaced::class, $event);
        $this->assertSame($user, $event->user);
        $this->assertSame('test_code', $event->code);
    }

    public function test_team_member_updated_event_can_be_instantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamMemberUpdated($team, $user);

        $this->assertInstanceOf(TeamMemberUpdated::class, $event);
    }

    public function test_adding_team_event_can_be_instantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new AddingTeam($user);

        $this->assertInstanceOf(AddingTeam::class, $event);
        $this->assertSame($user, $event->owner);
    }

    public function test_adding_team_member_event_can_be_instantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new AddingTeamMember($team, $user);

        $this->assertInstanceOf(AddingTeamMember::class, $event);
    }

    public function test_team_switched_event_can_be_instantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamSwitched($team, $user);

        $this->assertInstanceOf(TeamSwitched::class, $event);
    }
}
