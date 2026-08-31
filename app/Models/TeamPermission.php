<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev

/**
 * Team Permission Model.
 *
 * Represents a permission assigned to a user within a team context.
 *
<<<<<<< HEAD
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read User|null $user
=======
 * @property string         $id
 * @property string         $team_id
 * @property string         $user_id
 * @property string         $permission
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 * @property Team           $team
 * @property User           $user
>>>>>>> laraxot/dev
 *
 * @method static Builder<static>|TeamPermission newModelQuery()
 * @method static Builder<static>|TeamPermission newQuery()
 * @method static Builder<static>|TeamPermission query()
 *
<<<<<<< HEAD
 * @property int $id
 * @property int $team_id
 * @property string $permission
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|TeamPermission whereCreatedAt($value)
 * @method static Builder<static>|TeamPermission whereCreatedBy($value)
 * @method static Builder<static>|TeamPermission whereDeletedAt($value)
 * @method static Builder<static>|TeamPermission whereDeletedBy($value)
 * @method static Builder<static>|TeamPermission whereId($value)
 * @method static Builder<static>|TeamPermission whereName($value)
 * @method static Builder<static>|TeamPermission wherePermission($value)
 * @method static Builder<static>|TeamPermission whereTeamId($value)
 * @method static Builder<static>|TeamPermission whereUpdatedAt($value)
 * @method static Builder<static>|TeamPermission whereUpdatedBy($value)
=======
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @property string|null          $name
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 *
 * @method static \Modules\User\Database\Factories\TeamPermissionFactory factory($count = null, $state = [])
 * @method static Builder<static>|TeamPermission                         whereCreatedAt($value)
 * @method static Builder<static>|TeamPermission                         whereCreatedBy($value)
 * @method static Builder<static>|TeamPermission                         whereDeletedAt($value)
 * @method static Builder<static>|TeamPermission                         whereDeletedBy($value)
 * @method static Builder<static>|TeamPermission                         whereId($value)
 * @method static Builder<static>|TeamPermission                         whereName($value)
 * @method static Builder<static>|TeamPermission                         wherePermission($value)
 * @method static Builder<static>|TeamPermission                         whereTeamId($value)
 * @method static Builder<static>|TeamPermission                         whereUpdatedAt($value)
 * @method static Builder<static>|TeamPermission                         whereUpdatedBy($value)
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class TeamPermission extends BaseModel
{
    /**
     * The database connection that should be used by the model.
     */
    protected $connection = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'team_id',
        'user_id',
        'permission',
    ];

    /**
     * @return BelongsTo<Team, $this>
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
