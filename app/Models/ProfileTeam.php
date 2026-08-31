<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * ProfileTeam Model.
 *
 * Represents the relationship between a profile and a team, including the user's role.
 *
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read User|null $user
 *
 * @method static Builder<static>|ProfileTeam childrenWith(array<string> $relations)
 * @method static Builder<static>|ProfileTeam childrenWithCount(array<string> $relations)
 * @method static Builder<static>|ProfileTeam newModelQuery()
 * @method static Builder<static>|ProfileTeam newQuery()
 * @method static Builder<static>|ProfileTeam query()
 *
 * @property int $id
 * @property string|null $profile_id
 * @property int $team_id
 * @property string|null $role
 * @property array<array-key, mixed>|null $permissions
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static Builder<static>|ProfileTeam whereId($value)
 * @method static Builder<static>|ProfileTeam wherePermissions($value)
 * @method static Builder<static>|ProfileTeam whereProfileId($value)
 * @method static Builder<static>|ProfileTeam whereRole($value)
 * @method static Builder<static>|ProfileTeam whereTeamId($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class ProfileTeam extends TeamUser
{
    /**
     * The table associated with the model.
     */
    protected $table = 'profile_team';
}
