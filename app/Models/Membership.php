<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
=======
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
>>>>>>> f548be94 (.)

/**
 * Modules\User\Models\Membership.
 *
 * @property string $role
 * @method static Builder|Membership newModelQuery()
 * @method static Builder|Membership newQuery()
 * @method static Builder|Membership query()
<<<<<<< HEAD
 * @property int         $id
=======
 * @property int $id
 * @property string $uuid
>>>>>>> f548be94 (.)
 * @property string|null $team_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
 * @method static Builder|Membership whereCreatedAt($value)
 * @method static Builder|Membership whereCreatedBy($value)
 * @method static Builder|Membership whereCustomerId($value)
<<<<<<< HEAD
=======
 * @method static Builder|Membership whereId($value)
>>>>>>> f548be94 (.)
 * @method static Builder|Membership whereRole($value)
 * @method static Builder|Membership whereTeamId($value)
 * @method static Builder|Membership whereUpdatedAt($value)
 * @method static Builder|Membership whereUpdatedBy($value)
 * @method static Builder|Membership whereUserId($value)
<<<<<<< HEAD
=======
 * @method static Builder|Membership whereUuid($value)
>>>>>>> f548be94 (.)
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|Membership whereDeletedAt($value)
 * @method static Builder|Membership whereDeletedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 * @method static Builder<static>|Membership whereId($value)
 * @property array<array-key, mixed>|null $permissions
 * @property string|null                  $joined_at
 * @method static Builder<static>|Membership whereJoinedAt($value)
 * @method static Builder<static>|Membership wherePermissions($value)
 * @property string $uuid
 * @method static Builder<static>|Membership whereUuid($value)
=======
 * @mixin IdeHelperMembership
>>>>>>> f548be94 (.)
 * @mixin \Eloquent
 */
class Membership extends BasePivot
{
<<<<<<< HEAD
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
=======
    use HasFactory;

    /** @var bool */
    public $incrementing = true;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $table = 'team_user';
>>>>>>> f548be94 (.)
}
