<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Modules\User\Actions\Team\GetUserTeamsOptionAction;
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('user-db');

it('returns only the placeholder when the authenticated user has no teams', function (): void {
    $user = TestCase::createTestUser();
    Auth::login($user);

    $options = app(GetUserTeamsOptionAction::class)->execute();

    Assert::assertSame(['' => '--- Select ---'], $options);
});

it('returns the teams the authenticated user belongs to, keyed by team id', function (): void {
    $user = TestCase::createTestUser();

    $team = new Team();
    $team->forceFill(['user_id' => $user->getKey(), 'name' => 'Engineering']);
    $team->save();

    $teamUser = new TeamUser();
    $teamUser->forceFill([
        'team_id' => $team->getKey(),
        'user_id' => $user->getKey(),
    ]);
    $teamUser->save();

    Auth::login($user);

    $options = app(GetUserTeamsOptionAction::class)->execute();

    $teamKey = (string) XotBasePest::assertModelKey($team->getKey());

    Assert::assertArrayHasKey($teamKey, $options);
    Assert::assertSame('Engineering', $options[$teamKey]);
    Assert::assertArrayHasKey('', $options);
});

it('skips team_user rows whose team no longer exists', function (): void {
    $user = TestCase::createTestUser();

    $teamUser = new TeamUser();
    $teamUser->forceFill([
        'team_id' => 999999,
        'user_id' => $user->getKey(),
    ]);
    $teamUser->save();

    Auth::login($user);

    $options = app(GetUserTeamsOptionAction::class)->execute();

    Assert::assertSame(['' => '--- Select ---'], $options);
});
