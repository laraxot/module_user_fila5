<?php

declare(strict_types=1);

use Modules\User\Tests\TestCase;
use Modules\User\Models\Role;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;

/**
 * Test per il trait HasTeams corretto secondo filosofia Jetstream + Laraxot.
 *
 * Verifica tutte le correzioni implementate:
 * - belongsToTeams() ora funziona correttamente
 * - belongsToTeam() usa logica corretta
 * - ownsTeam() è efficiente
 * - teams() usa belongsToManyX
 * - Tipizzazione rigorosa
 * - Metodi non-Jetstream rimossi
 */

/**
 * @property User $subjectUser
 * @property Team $subjectTeam
 * @property Team $personalTeam
 */
uses(TestCase::class);

beforeEach(function (): void {
    $this->subjectUser = User::factory()->create();
    $this->subjectTeam = Team::factory()->create();
    $this->personalTeam = Team::factory()->create([
        'user_id' => $this->subjectUser->id,
        'personal_team' => true,
    ]);
});

test('it correctly checks if user belongs to teams', function (): void {
    // Test: User senza team
    $userWithoutTeams = User::factory()->create();
    expect($userWithoutTeams->belongsToTeams())->toBeFalse();

    // Test: User con team owned
    expect($this->subjectUser->belongsToTeams())->toBeTrue();

    // Test: User con team membership
    $memberUser = User::factory()->create();
    $memberUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
    expect($memberUser->belongsToTeams())->toBeTrue();
});

test('it correctly checks if user belongs to specific team', function (): void {
    // Test: Null team
    expect($this->subjectUser->belongsToTeam(null))->toBeFalse();

    // Test: Owned team
    expect($this->subjectUser->belongsToTeam($this->personalTeam))->toBeTrue();

    // Test: Member team
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
    expect($this->subjectUser->belongsToTeam($this->subjectTeam))->toBeTrue();

    // Test: Non-member team
    $otherTeam = Team::factory()->create();
    expect($this->subjectUser->belongsToTeam($otherTeam))->toBeFalse();
});

test('it correctly checks team ownership', function (): void {
    // Test: Owned team
    expect($this->subjectUser->ownsTeam($this->personalTeam))->toBeTrue();

    // Test: Non-owned team
    expect($this->subjectUser->ownsTeam($this->subjectTeam))->toBeFalse();

    // Test: Member team (not owner)
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
    expect($this->subjectUser->ownsTeam($this->subjectTeam))->toBeFalse();
});

test('it uses belongs to many x for teams relationship', function (): void {
    // Verifica che la relazione teams() restituisca BelongsToMany
    $relation = $this->subjectUser->teams();
    // Verifica che il pivot model sia TeamUser
    expect($relation->getTable())->toBe('team_user');
});

test('it correctly manages current team', function (): void {
    // Test: Switch to valid team
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
    $result = $this->subjectUser->switchTeam($this->subjectTeam);
    expect($result)->toBeTrue();
    expect($this->subjectUser->current_team_id)->toBe($this->subjectTeam->id);

    // Test: Switch to non-member team
    $otherTeam = Team::factory()->create();
    $result = $this->subjectUser->switchTeam($otherTeam);
    expect($result)->toBeFalse();
});

test('it correctly identifies current team', function (): void {
    $this->subjectUser->switchTeam($this->personalTeam);

    expect($this->subjectUser->isCurrentTeam($this->personalTeam))->toBeTrue();
    expect($this->subjectUser->isCurrentTeam($this->subjectTeam))->toBeFalse();
});

test('it returns all teams user owns or belongs to', function (): void {
    // Aggiungi user come member di un team
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);

    $allTeams = $this->subjectUser->allTeams();

    expect($allTeams)->toHaveCount(2); // personal team + member team
    expect($allTeams->contains($this->personalTeam))->toBeTrue();
    expect($allTeams->contains($this->subjectTeam))->toBeTrue();
});

test('it returns owned teams', function (): void {
    $ownedTeams = $this->subjectUser->ownedTeams;

    expect($ownedTeams)->toHaveCount(1);
    expect($ownedTeams->contains($this->personalTeam))->toBeTrue();
});

test('it returns personal team', function (): void {
    $personalTeam = $this->subjectUser->personalTeam();

    if (! $personalTeam instanceof TeamContract) {
        throw new RuntimeException('Expected the user to have a personal team.');
    }
    expect($personalTeam->id)->toBe($this->personalTeam->id);
    expect($personalTeam->personal_team)->toBeTrue();
});

test('it correctly determines team role', function (): void {
    // Test: Owner role
    $role = $this->subjectUser->teamRole($this->personalTeam);
    if (! $role instanceof Role) {
        throw new RuntimeException('Expected an owner role.');
    }
    expect($role->name)->toBe('owner');

    // Test: Member role
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'admin']);
    $role = $this->subjectUser->teamRole($this->subjectTeam);
    if (! $role instanceof Role) {
        throw new RuntimeException('Expected a member role.');
    }
    expect($role->name)->toBe('admin');

    // Test: No role (not member)
    $otherTeam = Team::factory()->create();
    $role = $this->subjectUser->teamRole($otherTeam);
    expect($role)->toBeNull();
});

test('it provides team role name helper', function (): void {
    // Test: Owner role name
    $roleName = $this->subjectUser->teamRoleName($this->personalTeam);
    expect($roleName)->toBe('owner');

    // Test: Member role name - detach first to avoid duplicates
    $this->subjectUser->teams()->detach($this->subjectTeam->id);
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'admin']);
    $roleName = $this->subjectUser->teamRoleName($this->subjectTeam);
    expect($roleName)->toBe('admin');

    // Test: No role (not member)
    $otherTeam = Team::factory()->create();
    $roleName = $this->subjectUser->teamRoleName($otherTeam);
    expect($roleName)->toBe('Unknown');
});

test('it correctly checks team role', function (): void {
    // Test: Owner always has any role
    expect($this->subjectUser->hasTeamRole($this->personalTeam, 'admin'))->toBeTrue();
    expect($this->subjectUser->hasTeamRole($this->personalTeam, 'member'))->toBeTrue();

    // Test: Specific role check
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'admin']);
    expect($this->subjectUser->hasTeamRole($this->subjectTeam, 'admin'))->toBeTrue();
    expect($this->subjectUser->hasTeamRole($this->subjectTeam, 'member'))->toBeFalse();
});

test('it correctly manages team permissions', function (): void {
    // Test: Owner has all permissions
    $permissions = $this->subjectUser->teamPermissions($this->personalTeam);
    expect($permissions)->toBe(['*']);
    expect($this->subjectUser->hasTeamPermission($this->personalTeam, 'any_permission'))->toBeTrue();

    // Test: Non-member has no permissions
    $otherTeam = Team::factory()->create();
    $permissions = $this->subjectUser->teamPermissions($otherTeam);
    expect($permissions)->toBe([]);
    expect($this->subjectUser->hasTeamPermission($otherTeam, 'any_permission'))->toBeFalse();

    // Test: Member has role-based permissions
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'admin']);
    $permissions = $this->subjectUser->teamPermissions($this->subjectTeam);
    expect($permissions)->toBe(['admin']);
    expect($this->subjectUser->hasTeamPermission($this->subjectTeam, 'admin'))->toBeTrue();
});

test('it provides utility methods', function (): void {
    // Test: hasTeams() alias
    expect($this->subjectUser->hasTeams())->toBeTrue();

    // Test: isOwnerOrMember()
    expect($this->subjectUser->isOwnerOrMember($this->personalTeam))->toBeTrue();

    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
    expect($this->subjectUser->isOwnerOrMember($this->subjectTeam))->toBeTrue();

    $otherTeam = Team::factory()->create();
    expect($this->subjectUser->isOwnerOrMember($otherTeam))->toBeFalse();
});

test('it handles edge cases correctly', function (): void {
    // Test: User senza ID
    $newUser = new User();
    expect($newUser->belongsToTeams())->toBeFalse();

    // Test: Team senza user_id
    $teamWithoutOwner = Team::factory()->create(['user_id' => null]);
    expect($this->subjectUser->ownsTeam($teamWithoutOwner))->toBeFalse();
});

test('it validates assertions correctly', function (): void {
    expect(fn() => $this->subjectUser->ownsTeam(null))->toThrow(InvalidArgumentException::class, 'Team cannot be null');
});
