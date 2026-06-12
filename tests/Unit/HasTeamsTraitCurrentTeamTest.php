<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

/**
 * @param array<string, mixed> $attributes
 */
function hasTeamsCurrentCreateUser(array $attributes = []): User
{
    return createTestUser(array_merge([
        'name' => 'Test User',
        'current_team_id' => null,
    ], $attributes));
}

/**
 * @param array<string, mixed> $attributes
 */
function hasTeamsCurrentCreateTeam(User $user, array $attributes = []): Team
{
    return TeamFactory::new()->createOne(array_merge([
        'user_id' => $user->id,
        'name' => 'Team-'.uniqid(),
        'personal_team' => true,
    ], $attributes));
}

class HasTeamsTraitCurrentTeamTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->skipUnlessUsersTableReady();
    }

    public function testHasTeamsCurrentTeamDoesNotCrashWhenUserHasNoTeams(): void
    {
        $user = hasTeamsCurrentCreateUser();

        $this->assertNull($user->currentTeam);
        $this->assertInstanceOf(BelongsTo::class, $user->currentTeam());
    }

    public function testHasTeamsCurrentTeamIsSideEffectFree(): void
    {
        $user = hasTeamsCurrentCreateUser(['current_team_id' => null]);

        $this->assertNull($user->currentTeam);
        $this->assertNull($user->currentTeam);

        $user->refresh();
        $this->assertNull($user->current_team_id);
    }

    public function testHasTeamsCurrentTeamCanAccessPersonalTeamWhenAvailable(): void
    {
        $user = hasTeamsCurrentCreateUser();
        $personalTeam = hasTeamsCurrentCreateTeam($user, [
            'name' => 'Personal Team',
            'personal_team' => true,
        ]);

        $user->current_team_id = (int) $personalTeam->id;
        $user->save();
        $user->refresh();

        $this->assertInstanceOf(Team::class, $user->currentTeam);
        $this->assertSame($personalTeam->id, $user->currentTeam->id);
    }

    public function testHasTeamsCurrentTeamDoesNotOverrideExistingCurrentTeamId(): void
    {
        $user = hasTeamsCurrentCreateUser();
        $team1 = hasTeamsCurrentCreateTeam($user, ['name' => 'Team 1', 'personal_team' => false]);
        hasTeamsCurrentCreateTeam($user, ['name' => 'Team 2', 'personal_team' => true]);

        $user->current_team_id = (int) $team1->id;
        $user->save();

        $this->assertInstanceOf(Team::class, $user->currentTeam);

        $user->refresh();
        $this->assertSame($team1->id, $user->current_team_id);
    }

    public function testHasTeamsSwitchTeamCanChangeCurrentTeam(): void
    {
        $user = hasTeamsCurrentCreateUser();
        $team1 = hasTeamsCurrentCreateTeam($user, ['name' => 'Team 1', 'personal_team' => false]);
        $team2 = hasTeamsCurrentCreateTeam($user, ['name' => 'Team 2', 'personal_team' => true]);

        $this->attachTeamMember($team1, $user);
        $this->attachTeamMember($team2, $user);

        $result = $user->switchTeam($team1);

        $this->assertTrue($result);
        $user->refresh();
        $this->assertSame($team1->id, $user->current_team_id);
    }

    public function testHasTeamsCurrentTeamSupportsRepeatedAccess(): void
    {
        $user = hasTeamsCurrentCreateUser();
        $team = hasTeamsCurrentCreateTeam($user, ['name' => 'Test Team', 'personal_team' => true]);

        $user->current_team_id = (int) $team->id;
        $user->save();
        $user->refresh();

        $currentTeam1 = $user->currentTeam;
        $currentTeam2 = $user->currentTeam;

        $this->assertInstanceOf(Team::class, $currentTeam1);
        $this->assertInstanceOf(Team::class, $currentTeam2);
        $this->assertSame($team->id, $currentTeam1->id);
        $this->assertSame($team->id, $currentTeam2->id);
    }
}
