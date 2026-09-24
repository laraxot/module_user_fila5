<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\Feature;
use Modules\Xot\Contracts\UserContract;

class FeaturePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        // return $user->hasPermissionToOrCreate('feature.view.any');
=======
        // return $user->hasPermissionTo('feature.view.any');
>>>>>>> laraxot/dev
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Feature $_feature): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('feature.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('feature.view') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('feature.create');
=======
        return $user->hasPermissionTo('feature.create');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Feature $_feature): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('feature.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('feature.update') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Feature $_feature): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('feature.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('feature.delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Feature $_feature): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('feature.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('feature.restore') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Feature $feature): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('feature.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('feature.force-delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }
}
