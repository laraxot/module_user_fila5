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
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.view.any');
=======
        return $user->hasPermissionTo('oauth-device-code.view.any');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-device-code.view') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.create');
=======
        return $user->hasPermissionTo('oauth-device-code.create');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-device-code.update') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-device-code.delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-device-code.restore') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, OauthDeviceCode $_oauthDeviceCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-device-code.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-device-code.force-delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }
}
