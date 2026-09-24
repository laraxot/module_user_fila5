<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Contracts\UserContract;

class OauthAccessTokenPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate(
            'oauth-access-token.view.any'
        );
=======
        return $user->hasPermissionTo('oauth-access-token.view.any');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.view')
=======
        return $user->hasPermissionTo('oauth-access-token.view')
>>>>>>> 350420cb (Check & fix styling)
            || $user->id === $oauthAccessToken->user_id
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.create');
=======
        return $user->hasPermissionTo('oauth-access-token.create');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-access-token.update') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.delete')
=======
        return $user->hasPermissionTo('oauth-access-token.delete')
>>>>>>> 350420cb (Check & fix styling)
            || $user->id === $oauthAccessToken->user_id
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, OauthAccessToken $_oauthAccessToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-access-token.restore') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, OauthAccessToken $oauthAccessToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-access-token.force-delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }
}
