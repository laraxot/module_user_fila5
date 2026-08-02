<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Webmozart\Assert\Assert;

class Permission extends SpatiePermission
{/**
 * @phpstan-use HasXotFactory<\Modules\User\Database\Factories\PermissionFactory, Permission>
 */
    use HasXotFactory;

    use RelationX;
    use Updater;

    protected $connection = 'user';

    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.permissions'));

        return $table;
    }

    /** @var list<string> */
    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
        'created_by',
        'updated_by',
    ];
}
