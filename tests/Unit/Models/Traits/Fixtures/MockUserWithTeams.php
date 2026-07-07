<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Traits\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Traits\HasTeams;

<<<<<<< HEAD
=======
/**
 * Stub model for HasTeams trait unit tests — satisfies PHPStan in-context analysis.
 *
 * @property string                            $id
 * @property int|null                          $current_team_id
 * @property TeamContract|null                 $currentTeam
 * @property EloquentCollection<int, Team>     $membershipTeams
 * @property EloquentCollection<int, Team>     $ownedTeams
 * @property EloquentCollection<int, TeamUser> $teamUsers
 * @property XotUserContract|null              $owner
 * @property int                               $total_members
 */
>>>>>>> 6d3760fe (.)
class MockUserWithTeams extends Model
{
    use HasTeams;

    protected $table = 'users';

    protected $fillable = ['name', 'email'];

    public function getKey(): int
    {
<<<<<<< HEAD
        return 1;
=======
        return (string) ($this->attributes['id'] ?? 'mock-user-1');
    }

    /**
     * @param string|int|Permission $permission
     */
    public function hasPermissionTo($permission, ?string $guardName = null): bool
    {
        return false;
    }

    /**
     * @param string|int|array<int, string>|Role|\BackedEnum $roles
     */
    public function hasRole($roles, ?string $guard = null): bool
    {
        return false;
    }

    /**
     * @return BelongsToMany<Team, $this>
     */
    public function membershipTeams(): BelongsToMany
    {
        return $this->belongsToManyX(Team::class);
>>>>>>> 6d3760fe (.)
    }
}
