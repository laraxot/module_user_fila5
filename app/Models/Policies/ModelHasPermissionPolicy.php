<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\ModelHasPermission;
use Modules\Xot\Contracts\UserContract;

class ModelHasPermissionPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.view.any');
=======
        return $user->hasPermissionTo('model-has-permission.view.any');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, ModelHasPermission $_modelHasPermission): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('model-has-permission.view') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.create');
=======
        return $user->hasPermissionTo('model-has-permission.create');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, ModelHasPermission $_modelHasPermission): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('model-has-permission.update') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, ModelHasPermission $_modelHasPermission): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('model-has-permission.delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, ModelHasPermission $_modelHasPermission): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('model-has-permission.restore') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, ModelHasPermission $modelHasPermission): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('model-has-permission.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('model-has-permission.force-delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }
}
