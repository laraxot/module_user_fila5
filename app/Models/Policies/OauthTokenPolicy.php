<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\OauthToken;
use Modules\Xot\Contracts\UserContract;

class OauthTokenPolicy extends UserBasePolicy
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
    public function view(UserContract $user, OauthToken $oauthToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.view')
=======
        return $user->hasPermissionTo('oauth-access-token.view')
>>>>>>> 350420cb (Check & fix styling)
            || $user->id === $oauthToken->user_id
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
    public function update(UserContract $user, OauthToken $_oauthToken): bool
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
    public function delete(UserContract $user, OauthToken $oauthToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.delete')
=======
        return $user->hasPermissionTo('oauth-access-token.delete')
>>>>>>> 350420cb (Check & fix styling)
            || $user->id === $oauthToken->user_id
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, OauthToken $_oauthToken): bool
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
    public function forceDelete(UserContract $user, OauthToken $oauthToken): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-access-token.force-delete')
=======
        return $user->hasPermissionTo('oauth-access-token.force-delete')
>>>>>>> 350420cb (Check & fix styling)
            || $user->id === $oauthToken->user_id
            || $user->hasRole('super-admin');
    }
}
