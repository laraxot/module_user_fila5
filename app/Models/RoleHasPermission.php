<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
=======
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Webmozart\Assert\Assert;
>>>>>>> 2024e2e7 (.)

/**
 * Modules\User\Models\RoleHasPermission.
 *
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
 * @method static Builder|RoleHasPermission newModelQuery()
 * @method static Builder|RoleHasPermission newQuery()
 * @method static Builder|RoleHasPermission query()
 * @method static Builder|RoleHasPermission whereId($value)
 * @method static Builder|RoleHasPermission wherePermissionId($value)
 * @method static Builder|RoleHasPermission whereRoleId($value)
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
 * @method static Builder|RoleHasPermission whereCreatedAt($value)
 * @method static Builder|RoleHasPermission whereCreatedBy($value)
 * @method static Builder|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder|RoleHasPermission whereUpdatedBy($value)
<<<<<<< HEAD
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperRoleHasPermission
=======
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
>>>>>>> 2024e2e7 (.)
 * @mixin \Eloquent
 */
class RoleHasPermission extends BasePivot
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'permission_id', 'role_id'}
     */
    protected $fillable = ['permission_id', 'role_id'];
<<<<<<< HEAD
=======

    /**
     * Laravel's non-morph Pivot base class singularizes the table name by
     * default (Illuminate\Database\Eloquent\Relations\Concerns\AsPivot::getTable()).
     * Read from config on every call instead — never hardcode, the value can
     * change at any time via `config('permission.table_names.role_has_permissions')`.
     */
    #[\Override]
    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.role_has_permissions'));

        return $table;
    }
>>>>>>> 2024e2e7 (.)
}
