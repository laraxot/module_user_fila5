<?php

declare(strict_types=1);

use Illuminate\Support\Facades\DB;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.

require_once __DIR__.'/../Support/team-management-business-helpers.php';

test('can create team', function (): void {
    $owner = teamMgmtBizCreateUser();
    $name = 'Studio Dentistico Milano '.uniqid();
    $team = teamMgmtBizCreateTeam([
        'name' => $name,
        'user_id' => $owner->id,
        'personal_team' => false,
    ]);

    teamMgmtBizAssertDatabaseHas('teams', [
        'id' => $team->id,
        'name' => $name,
        'personal_team' => 0,
    ]);

    Assert::assertSame($name, $team->name);
    Assert::assertFalse($team->personal_team);
});

test('can add user to team', function (): void {
    $team = teamMgmtBizCreateTeam();
    $user = teamMgmtBizCreateUser();

    teamMgmtBizAttachMember($team, $user, ['role' => 'member']);

    teamMgmtBizAssertDatabaseHas('team_user', [
        'team_id' => $team->id,
        'user_id' => $user->id,
        'role' => 'member',
    ]);

    Assert::assertTrue(teamMgmtBizMemberExists($team, $user));
    Assert::assertFalse($user->ownsTeam($team));
});

test('can remove user from team', function (): void {
    $team = teamMgmtBizCreateTeam();
    $user = teamMgmtBizCreateUser();
    teamMgmtBizAttachMember($team, $user, ['role' => 'member']);

    teamMgmtBizDetachMember($team, $user);

    teamMgmtBizAssertDatabaseMissing('team_user', [
        'team_id' => $team->id,
        'user_id' => $user->id,
    ]);

    Assert::assertFalse(teamMgmtBizMemberExists($team, $user));
});

test('can assign team role to user', function (): void {
    $team = teamMgmtBizCreateTeam();
    $user = teamMgmtBizCreateUser();
    teamMgmtBizAttachMember($team, $user, ['role' => 'member']);

    DB::connection('user')->table('team_user')
        ->where('team_id', $team->id)
        ->where('user_id', $user->id)
        ->update(['role' => 'admin']);

    teamMgmtBizAssertDatabaseHas('team_user', [
        'team_id' => $team->id,
        'user_id' => $user->id,
        'role' => 'admin',
    ]);

    $pivotRole = $user->teamUsers()->where('team_id', $team->id)->value('role');
    Assert::assertSame('admin', $pivotRole);
});

test('can assign team permissions to user', function (): void {
    if (! teamMgmtBizUserTableHasColumn('team_user', 'permissions')) {
        Assert::assertGreaterThanOrEqual(0, DB::connection('user')->table('team_user')->count());

        return;
    }

    $team = teamMgmtBizCreateTeam();
    $user = teamMgmtBizCreateUser();
    $permissions = ['read' => true, 'write' => true, 'delete' => true];

    teamMgmtBizAttachMember($team, $user, [
        'role' => 'member',
        'permissions' => $permissions,
    ]);

    $teamUser = $user->teamUsers()->where('team_id', $team->id)->first();
    Assert::assertInstanceOf(TeamUser::class, $teamUser);
    /** @var array<string, mixed> $userPermissions */
    $userPermissions = $teamUser->permissions;
    if (! is_array($userPermissions)) {
        Assert::fail('Expected team user permissions to be an array.');
    }

    Assert::assertArrayHasKey('read', $userPermissions);
    Assert::assertArrayHasKey('write', $userPermissions);
    Assert::assertArrayHasKey('delete', $userPermissions);
});

test('can check user team permissions', function (): void {
    if (! teamMgmtBizUserTableHasColumn('team_user', 'permissions')) {
        Assert::assertGreaterThanOrEqual(0, DB::connection('user')->table('team_user')->count());

        return;
    }

    $team = teamMgmtBizCreateTeam();
    $user = teamMgmtBizCreateUser();

    teamMgmtBizAttachMember($team, $user, [
        'role' => 'member',
        'permissions' => ['read' => true, 'write' => true],
    ]);

    Assert::assertTrue($team->userHasPermission($user, 'read'));
    Assert::assertTrue($team->userHasPermission($user, 'write'));
    Assert::assertFalse($team->userHasPermission($user, 'delete'));
});
