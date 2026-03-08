<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
    /*
        public function roles(): BelongsToMany
        {
            return // @var mixed belongsToManyX(Role::class;
        }

        public function permissions(): BelongsToMany
        {
            return // @var mixed belongsToManyX(Permission::class;
        }
        */
}
