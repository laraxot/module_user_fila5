<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev

/**
 * Modules\User\Models\Membership.
 *
<<<<<<< HEAD
 * @property int|string|null $user_id
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|Membership newModelQuery()
 * @method static Builder<static>|Membership newQuery()
 * @method static Builder<static>|Membership query()
 *
 * @property int $id
 * @property int $team_id
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|Membership whereCreatedAt($value)
 * @method static Builder<static>|Membership whereCreatedBy($value)
 * @method static Builder<static>|Membership whereDeletedAt($value)
 * @method static Builder<static>|Membership whereDeletedBy($value)
 * @method static Builder<static>|Membership whereId($value)
 * @method static Builder<static>|Membership whereRole($value)
 * @method static Builder<static>|Membership whereTeamId($value)
 * @method static Builder<static>|Membership whereUpdatedAt($value)
 * @method static Builder<static>|Membership whereUpdatedBy($value)
 * @method static Builder<static>|Membership whereUserId($value)
=======
 * @property string $role
 *
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
 *
 * @property int         $id
 * @property string|null $team_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
 *
 * @method static Builder|Membership whereCreatedAt($value)
 * @method static Builder|Membership whereCreatedBy($value)
 * @method static Builder|Membership whereCustomerId($value)
 * @method static Builder|Membership whereRole($value)
 * @method static Builder|Membership whereTeamId($value)
 * @method static Builder|Membership whereUpdatedAt($value)
 * @method static Builder|Membership whereUpdatedBy($value)
 * @method static Builder|Membership whereUserId($value)
 *
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder|Membership whereDeletedAt($value)
 * @method static Builder|Membership whereDeletedBy($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static Builder<static>|Membership whereId($value)
 *
 * @property array<array-key, mixed>|null $permissions
 * @property string|null                  $joined_at
 *
 * @method static Builder<static>|Membership whereJoinedAt($value)
 * @method static Builder<static>|Membership wherePermissions($value)
 *
 * @property string $uuid
 *
 * @method static Builder<static>|Membership whereUuid($value)
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class Membership extends BasePivot
{
    protected $connection = 'user';

    protected $table = 'team_user';

    /**
     * The "type" of the primary key ID.
     */
    protected $keyType = 'int';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'permissions' => 'array',
        ];
    }
}
