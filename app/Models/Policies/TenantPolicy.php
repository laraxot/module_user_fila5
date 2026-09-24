<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\Tenant;
use Modules\Xot\Contracts\UserContract;

class TenantPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        // return $user->hasPermissionToOrCreate('tenant.view.any');
=======
        // return $user->hasPermissionTo('tenant.view.any');
>>>>>>> 350420cb (Check & fix styling)
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, Tenant $tenant): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('tenant.view')
=======
        return $user->hasPermissionTo('tenant.view')
>>>>>>> 350420cb (Check & fix styling)
            || $user->tenants->contains($tenant->id)
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('tenant.create');
=======
        return $user->hasPermissionTo('tenant.create');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, Tenant $_tenant): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('tenant.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('tenant.update') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, Tenant $_tenant): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('tenant.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('tenant.delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, Tenant $_tenant): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('tenant.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('tenant.restore') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, Tenant $tenant): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('tenant.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('tenant.force-delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }
}
