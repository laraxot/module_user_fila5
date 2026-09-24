<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\Extra;
use Modules\Xot\Contracts\UserContract;

class ExtraPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.view.any');
=======
        return $user->hasPermissionTo('extra.view.any');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Extra $_extra): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('extra.view') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.create');
=======
        return $user->hasPermissionTo('extra.create');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Extra $_extra): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('extra.update') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Extra $_extra): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('extra.delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Extra $_extra): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('extra.restore') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Extra $extra): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('extra.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('extra.force-delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }
}
