<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\Membership;
use Modules\Xot\Contracts\UserContract;

class MembershipPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.view.any');
=======
        return $user->hasPermissionTo('membership.view.any');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Membership $membership): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.view')
=======
        return $user->hasPermissionTo('membership.view')
>>>>>>> laraxot/dev
            || $user->id === $membership->user_id
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.create');
=======
        return $user->hasPermissionTo('membership.create');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Membership $_membership): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('membership.update') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Membership $_membership): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('membership.delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Membership $_membership): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('membership.restore') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Membership $membership): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('membership.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('membership.force-delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }
}
