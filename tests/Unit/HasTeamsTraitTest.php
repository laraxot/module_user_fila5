<?php

declare(strict_types=1);

<<<<<<< .merge_file_I3vb5g
use Modules\User\Tests\TestCase;
=======
use Modules\User\Contracts\TeamContract;
>>>>>>> .merge_file_NvaroL
use Modules\User\Models\Role;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
<<<<<<< .merge_file_I3vb5g
=======
use Modules\User\Tests\TestCase;
>>>>>>> .merge_file_NvaroL

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
<<<<<<< .merge_file_I3vb5g

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
=======
uses(TestCase::class);

/**
 * Fixture tipizzata: le proprieta' dinamiche del TestCase sono nullable,
 * quindi ogni test lavora su variabili locali non nulle.
 *
 * @return array{user: User, team: Team, personalTeam: Team}
 */
function hasTeamsTraitTestFixture(): array
{
    $user = User::factory()->create();
    $team = Team::factory()->create();
    $personalTeam = Team::factory()->create([
        'user_id' => $user->id,
        'personal_team' => true,
    ]);

    return [
        'user' => $user,
        'team' => $team,
        'personalTeam' => $personalTeam,
    ];
}

test('it correctly checks if user belongs to teams', function (): void {
    ['user' => $user, 'team' => $team] = hasTeamsTraitTestFixture();

>>>>>>> .merge_file_NvaroL
    // Test: User senza team
    $userWithoutTeams = User::factory()->create();
    expect($userWithoutTeams->belongsToTeams())->toBeFalse();

    // Test: User con team owned
<<<<<<< .merge_file_I3vb5g
    expect($this->subjectUser->belongsToTeams())->toBeTrue();

    // Test: User con team membership
    $memberUser = User::factory()->create();
    $memberUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
=======
    expect($user->belongsToTeams())->toBeTrue();

    // Test: User con team membership
    $memberUser = User::factory()->create();
    $memberUser->membershipTeams()->attach($team->id, ['role' => 'member']);
>>>>>>> .merge_file_NvaroL
    expect($memberUser->belongsToTeams())->toBeTrue();
});

test('it correctly checks if user belongs to specific team', function (): void {
<<<<<<< .merge_file_I3vb5g
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
=======
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: Null team
    expect($user->belongsToTeam(null))->toBeFalse();

    // Test: Owned team
    expect($user->belongsToTeam($personalTeam))->toBeTrue();

    // Test: Member team
    $user->membershipTeams()->attach($team->id, ['role' => 'member']);
    expect($user->belongsToTeam($team))->toBeTrue();

    // Test: Non-member team
    $otherTeam = Team::factory()->create();
    expect($user->belongsToTeam($otherTeam))->toBeFalse();
});

test('it correctly checks team ownership', function (): void {
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: Owned team
    expect($user->ownsTeam($personalTeam))->toBeTrue();

    // Test: Non-owned team
    expect($user->ownsTeam($team))->toBeFalse();

    // Test: Member team (not owner)
    $user->membershipTeams()->attach($team->id, ['role' => 'member']);
    expect($user->ownsTeam($team))->toBeFalse();
});

test('it uses belongs to many x for teams relationship', function (): void {
    ['user' => $user] = hasTeamsTraitTestFixture();

    // Su BaseUser teams() e' la relazione Spatie (model_has_role): l'appartenenza
    // Jetstream-style costruita con belongsToManyX e' esposta come membershipTeams().
    $relation = $user->membershipTeams();
>>>>>>> .merge_file_NvaroL
    // Verifica che il pivot model sia TeamUser
    expect($relation->getTable())->toBe('team_user');
});

test('it correctly manages current team', function (): void {
<<<<<<< .merge_file_I3vb5g
    // Test: Switch to valid team
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
    $result = $this->subjectUser->switchTeam($this->subjectTeam);
    expect($result)->toBeTrue();
    expect($this->subjectUser->current_team_id)->toBe($this->subjectTeam->id);

    // Test: Switch to non-member team
    $otherTeam = Team::factory()->create();
    $result = $this->subjectUser->switchTeam($otherTeam);
=======
    ['user' => $user, 'team' => $team] = hasTeamsTraitTestFixture();

    // Test: Switch to valid team
    $user->membershipTeams()->attach($team->id, ['role' => 'member']);
    $result = $user->switchTeam($team);
    expect($result)->toBeTrue();
    expect($user->current_team_id)->toBe($team->id);

    // Test: Switch to non-member team
    $otherTeam = Team::factory()->create();
    $result = $user->switchTeam($otherTeam);
>>>>>>> .merge_file_NvaroL
    expect($result)->toBeFalse();
});

test('it correctly identifies current team', function (): void {
<<<<<<< .merge_file_I3vb5g
    $this->subjectUser->switchTeam($this->personalTeam);

    expect($this->subjectUser->isCurrentTeam($this->personalTeam))->toBeTrue();
    expect($this->subjectUser->isCurrentTeam($this->subjectTeam))->toBeFalse();
});

test('it returns all teams user owns or belongs to', function (): void {
    // Aggiungi user come member di un team
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'member']);
=======
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    $user->switchTeam($personalTeam);

    expect($user->isCurrentTeam($personalTeam))->toBeTrue();
    expect($user->isCurrentTeam($team))->toBeFalse();
});

test('it returns all teams user owns or belongs to', function (): void {
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Aggiungi user come member di un team
    $user->membershipTeams()->attach($team->id, ['role' => 'member']);
>>>>>>> .merge_file_NvaroL

    $allTeams = $this->subjectUser->allTeams();

    expect($allTeams)->toHaveCount(2); // personal team + member team
<<<<<<< .merge_file_I3vb5g
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
=======
    expect($allTeams->contains($personalTeam))->toBeTrue();
    expect($allTeams->contains($team))->toBeTrue();
});

test('it returns owned teams', function (): void {
    ['user' => $user, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    $ownedTeams = $user->ownedTeams;

    expect($ownedTeams)->toHaveCount(1);
    expect($ownedTeams->contains($personalTeam))->toBeTrue();
});

test('it returns personal team', function (): void {
    ['user' => $user, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    $resolvedPersonalTeam = $user->personalTeam();

    if (! $resolvedPersonalTeam instanceof TeamContract) {
        throw new RuntimeException('Expected the user to have a personal team.');
    }
    expect($resolvedPersonalTeam->id)->toBe($personalTeam->id);
    expect($resolvedPersonalTeam->personal_team)->toBeTrue();
});

test('it correctly determines team role', function (): void {
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: Owner role
    $role = $user->teamRole($personalTeam);
>>>>>>> .merge_file_NvaroL
    if (! $role instanceof Role) {
        throw new RuntimeException('Expected an owner role.');
    }
    expect($role->name)->toBe('owner');

    // Test: Member role
<<<<<<< .merge_file_I3vb5g
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'admin']);
    $role = $this->subjectUser->teamRole($this->subjectTeam);
=======
    $user->membershipTeams()->attach($team->id, ['role' => 'admin']);
    $role = $user->teamRole($team);
>>>>>>> .merge_file_NvaroL
    if (! $role instanceof Role) {
        throw new RuntimeException('Expected a member role.');
    }
    expect($role->name)->toBe('admin');

    // Test: No role (not member)
    $otherTeam = Team::factory()->create();
<<<<<<< .merge_file_I3vb5g
    $role = $this->subjectUser->teamRole($otherTeam);
=======
    $role = $user->teamRole($otherTeam);
>>>>>>> .merge_file_NvaroL
    expect($role)->toBeNull();
});

test('it provides team role name helper', function (): void {
<<<<<<< .merge_file_I3vb5g
    // Test: Owner role name
    $roleName = $this->subjectUser->teamRoleName($this->personalTeam);
    expect($roleName)->toBe('owner');

    // Test: Member role name - detach first to avoid duplicates
    $this->subjectUser->teams()->detach($this->subjectTeam->id);
    $this->subjectUser->teams()->attach($this->subjectTeam->id, ['role' => 'admin']);
    $roleName = $this->subjectUser->teamRoleName($this->subjectTeam);
=======
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: Owner role name
    $roleName = $user->teamRoleName($personalTeam);
    expect($roleName)->toBe('owner');

    // Test: Member role name - detach first to avoid duplicates
    $user->membershipTeams()->detach($team->id);
    $user->membershipTeams()->attach($team->id, ['role' => 'admin']);
    $roleName = $user->teamRoleName($team);
>>>>>>> .merge_file_NvaroL
    expect($roleName)->toBe('admin');

    // Test: No role (not member)
    $otherTeam = Team::factory()->create();
<<<<<<< .merge_file_I3vb5g
    $roleName = $this->subjectUser->teamRoleName($otherTeam);
=======
    $roleName = $user->teamRoleName($otherTeam);
>>>>>>> .merge_file_NvaroL
    expect($roleName)->toBe('Unknown');
});

test('it correctly checks team role', function (): void {
<<<<<<< .merge_file_I3vb5g
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
=======
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: Owner always has any role
    expect($user->hasTeamRole($personalTeam, 'admin'))->toBeTrue();
    expect($user->hasTeamRole($personalTeam, 'member'))->toBeTrue();

    // Test: Specific role check
    $user->membershipTeams()->attach($team->id, ['role' => 'admin']);
    expect($user->hasTeamRole($team, 'admin'))->toBeTrue();
    expect($user->hasTeamRole($team, 'member'))->toBeFalse();
});

test('it correctly manages team permissions', function (): void {
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: Owner has all permissions
    $permissions = $user->teamPermissions($personalTeam);
    expect($permissions)->toBe(['*']);
    expect($user->hasTeamPermission($personalTeam, 'any_permission'))->toBeTrue();

    // Test: Non-member has no permissions
    $otherTeam = Team::factory()->create();
    $permissions = $user->teamPermissions($otherTeam);
    expect($permissions)->toBe([]);
    expect($user->hasTeamPermission($otherTeam, 'any_permission'))->toBeFalse();

    // Test: Member has the permissions granted on the team_user pivot
    $user->membershipTeams()->attach($team->id, [
        'role' => 'admin',
        // Array, non JSON: il pivot TeamUser casta `permissions` ad array e una stringa
        // JSON verrebbe codificata due volte.
        'permissions' => ['admin' => true, 'delete' => false],
    ]);
    $permissions = $user->teamPermissions($team);
    expect($permissions)->toBe(['admin']);
    expect($user->hasTeamPermission($team, 'admin'))->toBeTrue();
});

test('it provides utility methods', function (): void {
    ['user' => $user, 'team' => $team, 'personalTeam' => $personalTeam] = hasTeamsTraitTestFixture();

    // Test: hasTeams() alias
    expect($user->hasTeams())->toBeTrue();

    // Test: isOwnerOrMember()
    expect($user->isOwnerOrMember($personalTeam))->toBeTrue();

    $user->membershipTeams()->attach($team->id, ['role' => 'member']);
    expect($user->isOwnerOrMember($team))->toBeTrue();

    $otherTeam = Team::factory()->create();
    expect($user->isOwnerOrMember($otherTeam))->toBeFalse();
});

test('it handles edge cases correctly', function (): void {
    ['user' => $user] = hasTeamsTraitTestFixture();

    // Test: User senza ID
    $newUser = new User;
    expect($newUser->belongsToTeams())->toBeFalse();

    // Test: Team senza user_id
    $teamWithoutOwner = Team::factory()->create(['user_id' => null]);
    expect($user->ownsTeam($teamWithoutOwner))->toBeFalse();
});

test('it validates assertions correctly', function (): void {
    ['user' => $user] = hasTeamsTraitTestFixture();

    // ownsTeam() accetta ?TeamContract: un team assente non e' posseduto, nessuna eccezione.
    expect($user->ownsTeam(null))->toBeFalse();
>>>>>>> .merge_file_NvaroL
});
