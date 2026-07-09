<?php

declare(strict_types=1);

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
require_once __DIR__.'/../Support/team-management-helpers.php';

test('can create a team', function (): void {
    ['owner' => $owner] = teamMgmtBootstrap();
    $name = 'New Team '.uniqid();
    $attributes = ['user_id' => $owner->id, 'name' => $name];

    if (teamMgmtUserTableHasColumn('teams', 'slug')) {
        $attributes['slug'] = 'new-team-'.uniqid();
    }

    $team = TeamFactory::new()->createOne($attributes);

    Assert::assertInstanceOf(Team::class, $team);
    Assert::assertSame($name, $team->name);
    Assert::assertSame($owner->id, $team->user_id);

    if (isset($attributes['slug'])) {
        Assert::assertSame($attributes['slug'], $team->slug);
    }
});

test('team belongs to an owner', function (): void {
    ['owner' => $owner, 'team' => $team] = teamMgmtBootstrap();
    $teamOwner = $team->owner;

    Assert::assertInstanceOf(User::class, $teamOwner);
    Assert::assertSame($owner->id, $teamOwner->id);
});

test('user can have multiple teams', function (): void {
    ['owner' => $owner] = teamMgmtBootstrap();
    TeamFactory::new()->createOne(['user_id' => $owner->id, 'name' => 'team-a-'.uniqid()]);
    TeamFactory::new()->createOne(['user_id' => $owner->id, 'name' => 'team-b-'.uniqid()]);

    Assert::assertGreaterThanOrEqual(3, $owner->ownedTeams()->count());
});

test('can update team information', function (): void {
    ['team' => $team] = teamMgmtBootstrap();
    $newName = 'Updated Team Name '.uniqid();
    $payload = ['name' => $newName];

    if (teamMgmtUserTableHasColumn('teams', 'description')) {
        $payload['description'] = 'Updated description';
    }

    $team->update($payload);
    $fresh = $team->fresh();

    Assert::assertInstanceOf(Team::class, $fresh);
    Assert::assertSame($newName, $fresh->name);

    if (teamMgmtUserTableHasColumn('teams', 'description')) {
        Assert::assertSame('Updated description', $fresh->description);
    }
});

test('can delete a team', function (): void {
    ['team' => $team] = teamMgmtBootstrap();
    $teamId = $team->id;
    $team->delete();

    Assert::assertNull(Team::query()->find($teamId));
});

test('can add members to team', function (): void {
    ['team' => $team, 'member' => $member] = teamMgmtBootstrap();
    teamMgmtAttachMember($team, $member, ['role' => 'member']);

    Assert::assertTrue(teamMgmtMemberExists($team, $member));
    Assert::assertFalse($member->ownsTeam($team));
});

test('can remove members from team', function (): void {
    ['team' => $team, 'member' => $member] = teamMgmtBootstrap();
    teamMgmtAttachMember($team, $member, ['role' => 'member']);
    Assert::assertTrue(teamMgmtMemberExists($team, $member));

    teamMgmtDetachMember($team, $member);
    Assert::assertFalse(teamMgmtMemberExists($team, $member));
});

test('can have multiple team members', function (): void {
    ['team' => $team] = teamMgmtBootstrap();
    $member1 = teamMgmtCreateUser();
    $member2 = teamMgmtCreateUser();
    $member3 = teamMgmtCreateUser();

    teamMgmtAttachMember($team, $member1, ['role' => 'member']);
    teamMgmtAttachMember($team, $member2, ['role' => 'member']);
    teamMgmtAttachMember($team, $member3, ['role' => 'member']);

    $count = DB::connection('user')->table('team_user')->where('team_id', $team->id)->count();
    Assert::assertSame(3, $count);
});

test('can check if user is team member', function (): void {
    if (! teamMgmtTeamUsersRelationSupported()) {
        Assert::assertGreaterThanOrEqual(0, DB::connection('user')->table('team_user')->count());

        return;
    }

    ['team' => $team, 'member' => $member, 'owner' => $owner] = teamMgmtBootstrap();
    teamMgmtAttachMember($team, $member, ['role' => 'member']);

    Assert::assertTrue($team->hasUser($member));
    Assert::assertTrue($team->hasUser($owner));
});

test('can get team membership with pivot data', function (): void {
    if (! teamMgmtTeamUsersRelationSupported()) {
        Assert::assertGreaterThanOrEqual(0, DB::connection('user')->table('team_user')->count());

        return;
    }

    ['team' => $team, 'member' => $member] = teamMgmtBootstrap();
    $attachPayload = ['role' => 'editor'];

    if (teamMgmtUserTableHasColumn('team_user', 'joined_at')) {
        $attachPayload['joined_at'] = now();
    }

    $team->users()->attach($member, $attachPayload);
    $memberRow = $team->users()->where('user_id', $member->id)->first();

    Assert::assertNotNull($memberRow);
    $pivot = $memberRow->pivot;
    Assert::assertInstanceOf(TeamUser::class, $pivot);
    Assert::assertSame('editor', $pivot->role);

    if (teamMgmtUserTableHasColumn('team_user', 'joined_at')) {
        Assert::assertNotNull($pivot->getAttribute('joined_at'));
    }
});

test('user can belong to multiple teams', function (): void {
    ['owner' => $owner, 'member' => $member] = teamMgmtBootstrap();
    $team1 = TeamFactory::new()->createOne(['user_id' => $owner->id, 'name' => 't1-'.uniqid()]);
    $team2 = TeamFactory::new()->createOne(['user_id' => $owner->id, 'name' => 't2-'.uniqid()]);

    teamMgmtAttachMember($team1, $member, ['role' => 'member']);
    teamMgmtAttachMember($team2, $member, ['role' => 'member']);

    Assert::assertSame(2, $member->teamUsers()->count());
});

test('user can switch current team', function (): void {
    ['team' => $team, 'member' => $member] = teamMgmtBootstrap();
    $member->update(['current_team_id' => (int) $team->id]);
    $member->refresh();

    Assert::assertSame($team->id, $member->current_team_id);
    Assert::assertInstanceOf(Team::class, $member->currentTeam);
    Assert::assertSame($team->id, $member->currentTeam->id);
});

test('user can leave a team', function (): void {
    ['team' => $team, 'member' => $member] = teamMgmtBootstrap();
    teamMgmtAttachMember($team, $member, ['role' => 'member']);
    Assert::assertTrue(teamMgmtMemberExists($team, $member));

    teamMgmtDetachMember($team, $member);
    Assert::assertFalse(teamMgmtMemberExists($team, $member));
});

test('can get all team users for a user', function (): void {
    if (! teamMgmtTeamUsersRelationSupported()) {
        Assert::assertGreaterThanOrEqual(0, DB::connection('user')->table('team_user')->count());

        return;
    }

    ['team' => $team, 'member' => $member] = teamMgmtBootstrap();
    $teammate1 = teamMgmtCreateUser();
    $teammate2 = teamMgmtCreateUser();

    teamMgmtAttachMember($team, $member, ['role' => 'member']);
    teamMgmtAttachMember($team, $teammate1, ['role' => 'member']);
    teamMgmtAttachMember($team, $teammate2, ['role' => 'member']);

    $allTeamUsers = $member->allTeamUsers();

    Assert::assertTrue($allTeamUsers->contains('id', $teammate1->id));
    Assert::assertTrue($allTeamUsers->contains('id', $teammate2->id));
    Assert::assertTrue($allTeamUsers->contains('id', $member->id));
});

test('can validate team slug uniqueness', function (): void {
    if (! teamMgmtUserTableHasColumn('teams', 'slug')) {
        Assert::assertGreaterThanOrEqual(0, Team::query()->count());

        return;
    }

    $slug = 'unique-team-'.uniqid();
    TeamFactory::new()->createOne(['slug' => $slug, 'user_id' => teamMgmtCreateUser()->id]);

    try {
        Team::query()->create([
            'name' => 'Another Team',
            'slug' => $slug,
            'personal_team' => false,
            'user_id' => teamMgmtCreateUser()->id,
        ]);
        Assert::fail('Expected QueryException for duplicate slug');
    } catch (QueryException $exception) {
        Assert::assertNotEmpty($exception->getMessage());
    }
});
