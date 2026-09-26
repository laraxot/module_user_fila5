<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\OauthAuthCode;
use Modules\Xot\Contracts\UserContract;

class OauthAuthCodePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.view.any');
=======
        return $user->hasPermissionTo('oauth-auth-code.view.any');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-auth-code.view') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.create');
=======
        return $user->hasPermissionTo('oauth-auth-code.create');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-auth-code.update') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-auth-code.delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, OauthAuthCode $_oauthAuthCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-auth-code.restore') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, OauthAuthCode $oauthAuthCode): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-auth-code.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-auth-code.force-delete') || $user->hasRole('super-admin');
>>>>>>> laraxot/dev
    }
}
