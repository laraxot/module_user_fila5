<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
=======
>>>>>>> 60a2c9a9 (.)
=======
=======
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
>>>>>>> laraxot/dev
trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
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
<<<<<<< HEAD
>>>>>>> 60a2c9a9 (.)
=======
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
