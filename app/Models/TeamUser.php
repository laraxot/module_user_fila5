<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * Modules\User\Models\TeamUser.
 *
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read User|null $user
 *
 * @method static Builder<static>|TeamUser childrenWith(array<string> $relations)
 * @method static Builder<static>|TeamUser childrenWithCount(array<string> $relations)
 * @method static Builder<static>|TeamUser newModelQuery()
 * @method static Builder<static>|TeamUser newQuery()
 * @method static Builder<static>|TeamUser query()
 *
 * @property int $id
 * @property int $team_id
 * @property string|null $user_id
 * @property string|null $role
 * @property array<array-key, mixed>|null $permissions
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|TeamUser whereCreatedAt($value)
 * @method static Builder<static>|TeamUser whereCreatedBy($value)
 * @method static Builder<static>|TeamUser whereDeletedAt($value)
 * @method static Builder<static>|TeamUser whereDeletedBy($value)
 * @method static Builder<static>|TeamUser whereId($value)
 * @method static Builder<static>|TeamUser whereRole($value)
 * @method static Builder<static>|TeamUser whereTeamId($value)
 * @method static Builder<static>|TeamUser whereUpdatedAt($value)
 * @method static Builder<static>|TeamUser whereUpdatedBy($value)
 * @method static Builder<static>|TeamUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
class TeamUser extends BaseTeamUser
{
    protected $connection = 'user';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'permissions' => 'array',
        ];
    }
}
