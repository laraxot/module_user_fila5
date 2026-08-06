<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Traits\Fixtures;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Models\Traits\HasTeams;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Contracts\UserContract as XotUserContract;
use Modules\Xot\Models\Traits\RelationX;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

/**
 * Stub model for HasTeams trait unit tests; satisfies PHPStan in-context analysis.
 *
<<<<<<< HEAD
 * @property string $id
 * @property int|null $current_team_id
 * @property TeamContract|null $currentTeam
 * @property EloquentCollection<int, Team> $membershipTeams
 * @property EloquentCollection<int, Team> $ownedTeams
 * @property EloquentCollection<int, TeamUser> $teamUsers
 * @property XotUserContract|null $owner
 * @property int $total_members
=======
 * @property string                            $id
 * @property int|null                          $current_team_id
 * @property TeamContract|null                 $currentTeam
 * @property EloquentCollection<int, Team>     $membershipTeams
 * @property EloquentCollection<int, Team>     $ownedTeams
 * @property EloquentCollection<int, TeamUser> $teamUsers
 * @property XotUserContract|null              $owner
 * @property int                               $total_members
>>>>>>> laraxot/dev
 */
class MockUserWithTeams extends Model
{
    use HasTeams;
    use RelationX;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = 'users';

    /** @var list<string> */
    protected $fillable = ['id', 'name', 'email', 'current_team_id', 'total_members'];

    public function getKey(): string
    {
<<<<<<< HEAD
        return SafeStringCastAction::cast($this->attributes['id'] ?? 'mock-user-1');
    }

    /**
     * @param  string|int|Permission  $permission
=======
        return (string) ($this->attributes['id'] ?? 'mock-user-1');
    }

    /**
     * @param string|int|Permission $permission
>>>>>>> laraxot/dev
     */
    public function hasPermissionTo($permission, ?string $guardName = null): bool
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * @param  string|int|array<array-key, string|int>|Role|\BackedEnum  $roles
=======
     * @param string|int|array<array-key, string|int>|Role|\BackedEnum $roles
>>>>>>> laraxot/dev
     */
    public function hasRole($roles, ?string $guard = null): bool
    {
        return false;
    }

    /**
     * @return BelongsToMany<Model&TeamContract, Model, Pivot, 'pivot'>
     */
    public function membershipTeams(): BelongsToMany
    {
        /** @var BelongsToMany<Model&TeamContract, Model, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX(Team::class);

        return $relation;
    }
}
