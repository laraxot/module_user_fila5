<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
use Webmozart\Assert\Assert;

/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|PermissionRole newModelQuery()
 * @method static Builder<static>|PermissionRole newQuery()
 * @method static Builder<static>|PermissionRole query()
 *
 * @property string $id
 * @property string $permission_id
 * @property string $role_id
=======
use Modules\Xot\Contracts\ProfileContract;
use Webmozart\Assert\Assert;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static Builder|PermissionRole newModelQuery()
 * @method static Builder|PermissionRole newQuery()
 * @method static Builder|PermissionRole query()
 *
 * @property string      $id
 * @property string|null $permission_id
 * @property string|null $role_id
>>>>>>> laraxot/dev
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
<<<<<<< HEAD
 * @method static Builder<static>|PermissionRole whereCreatedAt($value)
 * @method static Builder<static>|PermissionRole whereCreatedBy($value)
 * @method static Builder<static>|PermissionRole whereId($value)
 * @method static Builder<static>|PermissionRole wherePermissionId($value)
 * @method static Builder<static>|PermissionRole whereRoleId($value)
 * @method static Builder<static>|PermissionRole whereUpdatedAt($value)
 * @method static Builder<static>|PermissionRole whereUpdatedBy($value)
=======
 * @method static Builder|PermissionRole whereCreatedAt($value)
 * @method static Builder|PermissionRole whereCreatedBy($value)
 * @method static Builder|PermissionRole whereId($value)
 * @method static Builder|PermissionRole wherePermissionId($value)
 * @method static Builder|PermissionRole whereRoleId($value)
 * @method static Builder|PermissionRole whereUpdatedAt($value)
 * @method static Builder|PermissionRole whereUpdatedBy($value)
 *
 * @property ProfileContract|null $deleter
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class PermissionRole extends BasePivot
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'permission_id', 'role_id'}
     */
    protected $fillable = ['permission_id', 'role_id'];

    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.role_has_permissions'));

        return $table;
    }

    /** @return array<string, string> */
    #[\Override]
    protected function casts(): array
    {
        $parent = parent::casts();
        $up = [
            'permission_id' => 'string',
            'role_id' => 'string',
        ];

        return array_merge($parent, $up);
    }
}
