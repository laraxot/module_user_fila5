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
    /**
     * @return mixed
     */
    public function viewAny(UserContract $user): bool
    {
        // return $user->hasPermissionTo('feature.view.any');
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    /**
     * @return mixed
     */
    public function view(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.view') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    /**
     * @return mixed
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('feature.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    /**
     * @return mixed
     */
    public function update(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    /**
     * @return mixed
     */
    public function delete(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.delete') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    /**
     * @return mixed
     */
    public function restore(UserContract $user, Feature $_feature): bool
    {
        return $user->hasPermissionTo('feature.restore') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    /**
     * @return mixed
     */
    public function forceDelete(UserContract $user, Feature $feature): bool
    {
        return $user->hasPermissionTo('feature.force-delete') || $user->hasRole('super-admin');
    }
}
