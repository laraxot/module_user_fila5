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
use Webmozart\Assert\Assert;

/**
 * Modules\User\Models\RoleHasPermission.
 *
<<<<<<< HEAD
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|RoleHasPermission newModelQuery()
 * @method static Builder<static>|RoleHasPermission newQuery()
 * @method static Builder<static>|RoleHasPermission query()
 *
 * @property string $id
 * @property int $permission_id
 * @property int $role_id
=======
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
 *
 * @method static Builder|RoleHasPermission newModelQuery()
 * @method static Builder|RoleHasPermission newQuery()
 * @method static Builder|RoleHasPermission query()
 * @method static Builder|RoleHasPermission whereId($value)
 * @method static Builder|RoleHasPermission wherePermissionId($value)
 * @method static Builder|RoleHasPermission whereRoleId($value)
 *
>>>>>>> laraxot/dev
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
<<<<<<< HEAD
 * @method static Builder<static>|RoleHasPermission whereCreatedAt($value)
 * @method static Builder<static>|RoleHasPermission whereCreatedBy($value)
 * @method static Builder<static>|RoleHasPermission whereId($value)
 * @method static Builder<static>|RoleHasPermission wherePermissionId($value)
 * @method static Builder<static>|RoleHasPermission whereRoleId($value)
 * @method static Builder<static>|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder<static>|RoleHasPermission whereUpdatedBy($value)
=======
 * @method static Builder|RoleHasPermission whereCreatedAt($value)
 * @method static Builder|RoleHasPermission whereCreatedBy($value)
 * @method static Builder|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder|RoleHasPermission whereUpdatedBy($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
>>>>>>> laraxot/dev
 *
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
}
