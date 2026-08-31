<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Webmozart\Assert\Assert;

/**
 * Modules\User\Models\RoleHasPermission.
 *
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|RoleHasPermission whereCreatedAt($value)
 * @method static Builder<static>|RoleHasPermission whereCreatedBy($value)
 * @method static Builder<static>|RoleHasPermission whereId($value)
 * @method static Builder<static>|RoleHasPermission wherePermissionId($value)
 * @method static Builder<static>|RoleHasPermission whereRoleId($value)
 * @method static Builder<static>|RoleHasPermission whereUpdatedAt($value)
 * @method static Builder<static>|RoleHasPermission whereUpdatedBy($value)
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
