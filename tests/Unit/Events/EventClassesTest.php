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
    public function testRecoveryCodesGeneratedEventCanBeInstantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new RecoveryCodesGenerated($user);

        $this->assertInstanceOf(RecoveryCodesGenerated::class, $event);
        $this->assertSame($user, $event->userContract);
    }

    public function testTeamMemberAddedEventCanBeInstantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamMemberAdded($team, $user);

        $this->assertInstanceOf(TeamMemberAdded::class, $event);
    }

    public function testTeamMemberRemovedEventCanBeInstantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamMemberRemoved($team, $user);

        $this->assertInstanceOf(TeamMemberRemoved::class, $event);
    }

    public function testTwoFactorAuthenticationEnabledEventCanBeInstantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new TwoFactorAuthenticationEnabled($user);

        $this->assertInstanceOf(TwoFactorAuthenticationEnabled::class, $event);
        $this->assertSame($user, $event->userContract);
    }

    public function testTwoFactorAuthenticationDisabledEventCanBeInstantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new TwoFactorAuthenticationDisabled($user);

        $this->assertInstanceOf(TwoFactorAuthenticationDisabled::class, $event);
        $this->assertSame($user, $event->userContract);
    }

    public function testRecoveryCodeReplacedEventCanBeInstantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new RecoveryCodeReplaced($user, 'test_code');

        $this->assertInstanceOf(RecoveryCodeReplaced::class, $event);
        $this->assertSame($user, $event->user);
        $this->assertSame('test_code', $event->code);
    }

    public function testTeamMemberUpdatedEventCanBeInstantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamMemberUpdated($team, $user);

        $this->assertInstanceOf(TeamMemberUpdated::class, $event);
    }

    public function testAddingTeamEventCanBeInstantiated(): void
    {
        $user = UserFactory::new()->makeOne();
        $event = new AddingTeam($user);

        $this->assertInstanceOf(AddingTeam::class, $event);
        $this->assertSame($user, $event->owner);
    }

    public function testAddingTeamMemberEventCanBeInstantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new AddingTeamMember($team, $user);

        $this->assertInstanceOf(AddingTeamMember::class, $event);
    }

    public function testTeamSwitchedEventCanBeInstantiated(): void
    {
        $team = typedMock(TeamContract::class);
        $user = UserFactory::new()->makeOne();
        $event = new TeamSwitched($team, $user);

        $this->assertInstanceOf(TeamSwitched::class, $event);
    }
}
