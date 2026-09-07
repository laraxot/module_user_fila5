<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

<<<<<<< HEAD
=======
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
>>>>>>> 2024e2e7 (.)
trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
<<<<<<< HEAD
    /*
        public function roles(): BelongsToMany
        {
            return $this->belongsToManyX(Role::class)->using(ModelHasRole::class);
        }

        public function permissions(): BelongsToMany
        {
            return $this->belongsToManyX(Permission::class);
        }
        */
=======
>>>>>>> 2024e2e7 (.)
}
