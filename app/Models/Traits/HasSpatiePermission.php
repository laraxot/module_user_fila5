<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

<<<<<<< HEAD
<<<<<<< HEAD
=======
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
>>>>>>> 2024e2e7 (.)
=======
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
>>>>>>> f589f9b2 (.)
trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
<<<<<<< HEAD
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
=======
>>>>>>> f589f9b2 (.)
}
