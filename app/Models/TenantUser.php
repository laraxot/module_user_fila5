<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
=======
=======
>>>>>>> 87273113 (.)
use Override;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev

/**
 * Modules\User\Models\TenantUser.
 *
 * @method static Builder|TeamUser newModelQuery()
 * @method static Builder|TeamUser newQuery()
 * @method static Builder|TeamUser query()
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int         $id
=======
 * @property int $id
>>>>>>> f548be94 (.)
=======
 * @property int $id
=======
 *
 * @property int         $id
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
 *
 * @property int         $id
>>>>>>> laraxot/dev
 * @property string|null $tenant_id
 * @property string|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> laraxot/dev
 * @method static Builder|TeamUser whereCreatedAt($value)
 * @method static Builder|TeamUser whereCreatedBy($value)
 * @method static Builder|TeamUser whereCustomerId($value)
 * @method static Builder|TeamUser whereId($value)
 * @method static Builder|TeamUser whereRole($value)
 * @method static Builder|TeamUser whereTeamId($value)
 * @method static Builder|TeamUser whereUpdatedAt($value)
 * @method static Builder|TeamUser whereUpdatedBy($value)
 * @method static Builder|TeamUser whereUserId($value)
 * @method static Builder|TeamUser whereUuid($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|TenantUser whereDeletedAt($value)
 * @method static Builder|TenantUser whereDeletedBy($value)
 * @method static Builder|TenantUser whereTenantId($value)
 * @property ProfileContract|null $creator
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 * @method static \Modules\User\Database\Factories\TenantUserFactory factory($count = null, $state = [])
=======
 * @property ProfileContract|null $updater
 * @mixin IdeHelperTenantUser
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
=======
>>>>>>> laraxot/dev
 *
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder|TenantUser whereDeletedAt($value)
 * @method static Builder|TenantUser whereDeletedBy($value)
 * @method static Builder|TenantUser whereTenantId($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
 * @method static \Modules\User\Database\Factories\TenantUserFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
 * @mixin \Eloquent
 */
class TenantUser extends BasePivot
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    use HasFactory;

>>>>>>> f548be94 (.)
=======
    use HasFactory;

=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    protected $connection = 'user';

    // public $incrementing = false;

    // protected $primaryKey = 'id';

    // protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'tenant_id',
        'user_id',
    ];

    /** @return array<string, string> */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
=======
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    #[\Override]
>>>>>>> laraxot/dev
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            // 'email_verified_at' => 'datetime',
            // 'password' => 'hashed', //Call to undefined cast [hashed] on column [password] in model [Modules\User\Models\User].
            // 'is_active' => 'boolean',
            // 'roles.pivot.id' => 'string',
            // https://github.com/beitsafe/laravel-uuid-auditing
            // ALTER TABLE model_has_role CHANGE COLUMN `id` `id` CHAR(37) NOT NULL DEFAULT uuid();
        ];
    }
}
