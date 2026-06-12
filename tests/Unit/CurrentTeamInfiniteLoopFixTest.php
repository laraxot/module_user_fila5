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
function currentTeamFixCreateUser(array $attributes = []): User
{
    return createTestUser(array_merge([
        'name' => 'Test User',
        'current_team_id' => null,
    ], $attributes));
}

/**
 * @param array<string, mixed> $attributes
 */
function currentTeamFixCreateTeam(User $user, array $attributes = []): Team
{
    return TeamFactory::new()->createOne(array_merge([
        'user_id' => $user->id,
        'name' => 'Team-'.uniqid(),
        'personal_team' => true,
    ], $attributes));
}

class CurrentTeamInfiniteLoopFixTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->skipUnlessUsersTableReady();
    }

    public function testCurrentTeamGetterDoesNotCrashWhenUserHasNoTeams(): void
    {
        $user = currentTeamFixCreateUser();

        $this->assertInstanceOf(BelongsTo::class, $user->currentTeam());
        $this->assertNull($user->currentTeam);
    }

    public function testCurrentTeamGetterIsSideEffectFree(): void
    {
        $user = currentTeamFixCreateUser(['current_team_id' => null]);
        $originalTeamId = $user->current_team_id;

        $this->assertNull($user->currentTeam);
        $this->assertNull($user->currentTeam);
        $this->assertInstanceOf(BelongsTo::class, $user->currentTeam());

        $user->refresh();
        $this->assertSame($originalTeamId, $user->current_team_id);
    }

    public function testCurrentTeamGetterDoesNotTriggerSaveOperations(): void
    {
        $user = currentTeamFixCreateUser();
        $updatedAtBefore = $user->updated_at;

        $this->assertNull($user->currentTeam);

        $user->refresh();
        $this->assertNotNull($user->updated_at);
        $this->assertNotNull($updatedAtBefore);
        $this->assertTrue($user->updated_at->equalTo($updatedAtBefore));
    }

    public function testInitializeCurrentTeamSetsPersonalTeamCorrectly(): void
    {
        $user = currentTeamFixCreateUser(['current_team_id' => null]);
        $personalTeam = currentTeamFixCreateTeam($user, [
            'name' => 'Personal Team',
            'personal_team' => true,
        ]);

        $user->initializeCurrentTeam();
        $user->refresh();

        $this->assertSame($personalTeam->id, $user->current_team_id);
    }

    public function testInitializeCurrentTeamDoesNotOverrideExistingCurrentTeamId(): void
    {
        $user = currentTeamFixCreateUser();
        $team1 = currentTeamFixCreateTeam($user, ['name' => 'Team 1', 'personal_team' => false]);
        currentTeamFixCreateTeam($user, ['name' => 'Team 2', 'personal_team' => true]);

        $user->current_team_id = (int) $team1->id;
        $user->save();

        $user->initializeCurrentTeam();
        $user->refresh();

        $this->assertSame($team1->id, $user->current_team_id);
    }

    public function testInitializeCurrentTeamSetsFirstAvailableTeamIfNoPersonalTeam(): void
    {
        $user = currentTeamFixCreateUser(['current_team_id' => null]);
        $team = currentTeamFixCreateTeam($user, [
            'name' => 'Regular Team',
            'personal_team' => false,
        ]);

        $user->initializeCurrentTeam();
        $user->refresh();

        $this->assertSame($team->id, $user->current_team_id);
    }

    public function testInitializeCurrentTeamHandlesUserWithoutTeamsGracefully(): void
    {
        $user = currentTeamFixCreateUser(['current_team_id' => null]);

        $user->initializeCurrentTeam();
        $user->refresh();

        $this->assertNull($user->current_team_id);
    }

    public function testCurrentTeamGetterDoesNotCauseErrorsOnRepeatedAccess(): void
    {
        $user = currentTeamFixCreateUser();
        $team = currentTeamFixCreateTeam($user, ['name' => 'Test Team', 'personal_team' => true]);

        $user->current_team_id = (int) $team->id;
        $user->save();
        $user->refresh();

        $this->assertInstanceOf(Team::class, $user->currentTeam);
        $this->assertSame($team->id, $user->currentTeam->id);
        $this->assertInstanceOf(BelongsTo::class, $user->currentTeam());
    }

    public function testCurrentTeamGetterWorksCorrectlyWithExistingTeam(): void
    {
        $user = currentTeamFixCreateUser();
        $team = currentTeamFixCreateTeam($user, ['name' => 'Test Team', 'personal_team' => true]);

        $user->current_team_id = (int) $team->id;
        $user->save();

        $currentTeam = $user->currentTeam()->first();

        $this->assertInstanceOf(Team::class, $currentTeam);
        $this->assertSame($team->id, $currentTeam->id);
        $this->assertSame('Test Team', $currentTeam->name);
    }

    public function testUserCreationDoesNotTriggerInfiniteLoop(): void
    {
        $user = currentTeamFixCreateUser(['name' => 'New User']);

        $this->assertInstanceOf(User::class, $user);
        $this->assertNotNull($user->id);
        $this->assertSame('New User', $user->name);
        $this->assertNull($user->currentTeam);
        $this->assertInstanceOf(BelongsTo::class, $user->currentTeam());
    }

    public function testMultipleUsersCanBeCreatedWithoutIssues(): void
    {
        $users = [];

        for ($i = 1; $i <= 5; ++$i) {
            $users[] = currentTeamFixCreateUser([
                'name' => "User {$i}",
                'email' => "user-{$i}-".uniqid('', true).'@example.com',
            ]);
        }

        $this->assertCount(5, $users);

        foreach ($users as $user) {
            $this->assertInstanceOf(User::class, $user);
            $this->assertNotNull($user->id);
            $this->assertNull($user->currentTeam);
            $this->assertInstanceOf(BelongsTo::class, $user->currentTeam());
        }
    }
}
