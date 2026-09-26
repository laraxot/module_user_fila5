<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Modules\User\Models\Permission;
<<<<<<< HEAD
use Spatie\Permission\Traits\HasRoles;

trait HasSpatiePermission
{
=======
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

/**
 * Spatie Permission — standard rigido: {@see HasRoles::teams()} resta pubblico come da package.
 */
trait HasSpatiePermission
{
    use HasPermissions;
>>>>>>> laraxot/dev
    use HasRoles;

    public function hasPermissionToOrCreate(
        string $permission,
        ?string $guardName = null,
    ): bool {
        $guardName ??= $this->getDefaultGuardName();

        Permission::findOrCreate($permission, $guardName);

        return $this->hasPermissionTo($permission, $guardName);
    }
}
