<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
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
use PHPUnit\Framework\Assert;

// Using mock for contracts since they are interfaces
test('RecoveryCodesGenerated event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->makeOne();
    $event = new RecoveryCodesGenerated($user);

    Assert::assertInstanceOf(RecoveryCodesGenerated::class, $event);
    Assert::assertSame($user, $event->userContract);
});

test('TeamMemberAdded event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $team = typedMock(TeamContract::class);
    $user = UserFactory::new()->makeOne();
    $event = new TeamMemberAdded($team, $user);

    Assert::assertInstanceOf(TeamMemberAdded::class, $event);
});

test('TeamMemberRemoved event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $team = typedMock(TeamContract::class);
    $user = UserFactory::new()->makeOne();
    $event = new TeamMemberRemoved($team, $user);

    Assert::assertInstanceOf(TeamMemberRemoved::class, $event);
});

test('TwoFactorAuthenticationEnabled event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->makeOne();
    $event = new TwoFactorAuthenticationEnabled($user);

    Assert::assertInstanceOf(TwoFactorAuthenticationEnabled::class, $event);
    Assert::assertSame($user, $event->userContract);
});

test('TwoFactorAuthenticationDisabled event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->makeOne();
    $event = new TwoFactorAuthenticationDisabled($user);

    Assert::assertInstanceOf(TwoFactorAuthenticationDisabled::class, $event);
    Assert::assertSame($user, $event->userContract);
});

test('RecoveryCodeReplaced event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->makeOne();
    $event = new RecoveryCodeReplaced($user, 'test_code');

    Assert::assertInstanceOf(RecoveryCodeReplaced::class, $event);
    Assert::assertSame($user, $event->user);
    Assert::assertSame('test_code', $event->code);
});

test('TeamMemberUpdated event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $team = typedMock(TeamContract::class);
    $user = UserFactory::new()->makeOne();
    $event = new TeamMemberUpdated($team, $user);

    Assert::assertInstanceOf(TeamMemberUpdated::class, $event);
});

test('AddingTeam event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->makeOne();
    $event = new AddingTeam($user);

    Assert::assertInstanceOf(AddingTeam::class, $event);
    Assert::assertSame($user, $event->owner);
});

test('AddingTeamMember event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $team = typedMock(TeamContract::class);
    $user = UserFactory::new()->makeOne();
    $event = new AddingTeamMember($team, $user);

    Assert::assertInstanceOf(AddingTeamMember::class, $event);
});

test('TeamSwitched event can be instantiated', function () {
    /** @var Modules\User\Tests\TestCase $this */
    $team = typedMock(TeamContract::class);
    $user = UserFactory::new()->makeOne();
    $event = new TeamSwitched($team, $user);

    Assert::assertInstanceOf(TeamSwitched::class, $event);
});
