<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\PermissionRole;
use Modules\Xot\Contracts\UserContract;

class PermissionRolePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.view.any');
=======
        return $user->hasPermissionTo('permission-role.view.any');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, PermissionRole $_permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('permission-role.view') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.create');
=======
        return $user->hasPermissionTo('permission-role.create');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, PermissionRole $_permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('permission-role.update') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, PermissionRole $_permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('permission-role.delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, PermissionRole $_permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('permission-role.restore') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, PermissionRole $permissionRole): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('permission-role.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('permission-role.force-delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }
}
