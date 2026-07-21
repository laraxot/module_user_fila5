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
    /**
     * @return mixed
     */
    public function viewAny(UserContract $user): bool
    {
        // return $user->hasPermissionTo('tenant.view.any');
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    /**
     * @return mixed
     */
    public function view(UserContract $user, Tenant $tenant): bool
    {
        return $user->hasPermissionTo('tenant.view')
            || $user->tenants->contains($tenant->id)
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    /**
     * @return mixed
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('tenant.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    /**
     * @return mixed
     */
    public function update(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    /**
     * @return mixed
     */
    public function delete(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.delete') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    /**
     * @return mixed
     */
    public function restore(UserContract $user, Tenant $_tenant): bool
    {
        return $user->hasPermissionTo('tenant.restore') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    /**
     * @return mixed
     */
    public function forceDelete(UserContract $user, Tenant $tenant): bool
    {
        return $user->hasPermissionTo('tenant.force-delete') || $user->hasRole('super-admin');
    }
}
