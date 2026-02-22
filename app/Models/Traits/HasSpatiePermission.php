<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

<<<<<<< HEAD
/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
=======
>>>>>>> 60a2c9a9 (.)
trait HasSpatiePermission
{
    use HasPermissions;
    use HasRoles;
<<<<<<< HEAD
=======
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
>>>>>>> 60a2c9a9 (.)
}
