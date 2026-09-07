<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> f589f9b2 (.)
use Webmozart\Assert\Assert;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static Builder|PermissionRole newModelQuery()
 * @method static Builder|PermissionRole newQuery()
 * @method static Builder|PermissionRole query()
 * @property string $id
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @method static Builder|PermissionRole newModelQuery()
 * @method static Builder|PermissionRole newQuery()
 * @method static Builder|PermissionRole query()
 *
 * @property string      $id
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @property string|null $permission_id
 * @property string|null $role_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> f589f9b2 (.)
 * @method static Builder|PermissionRole whereCreatedAt($value)
 * @method static Builder|PermissionRole whereCreatedBy($value)
 * @method static Builder|PermissionRole whereId($value)
 * @method static Builder|PermissionRole wherePermissionId($value)
 * @method static Builder|PermissionRole whereRoleId($value)
 * @method static Builder|PermissionRole whereUpdatedAt($value)
 * @method static Builder|PermissionRole whereUpdatedBy($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @mixin IdeHelperPermissionRole
=======
 *
 * @property ProfileContract|null $deleter
 *
>>>>>>> 2024e2e7 (.)
=======
 *
 * @property ProfileContract|null $deleter
 *
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
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
