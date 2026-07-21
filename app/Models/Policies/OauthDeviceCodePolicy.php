<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\OauthDeviceCode;
use Modules\Xot\Contracts\UserContract;

class OauthDeviceCodePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    /**
     * @return mixed
     */
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-device-code.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    /**
     * @return mixed
     */
    public function view(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
        return $user->hasPermissionTo('oauth-device-code.view') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    /**
     * @return mixed
     */
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-device-code.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    /**
     * @return mixed
     */
    public function update(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
        return $user->hasPermissionTo('oauth-device-code.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    /**
     * @return mixed
     */
    public function delete(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
        return $user->hasPermissionTo('oauth-device-code.delete') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    /**
     * @return mixed
     */
    public function restore(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
        return $user->hasPermissionTo('oauth-device-code.restore') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    /**
     * @return mixed
     */
    public function forceDelete(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
        return $user->hasPermissionTo('oauth-device-code.force-delete') || $user->hasRole('super-admin');
    }
}
