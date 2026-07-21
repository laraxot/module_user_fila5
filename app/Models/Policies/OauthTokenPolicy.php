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
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-access-token.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function view(UserContract $user, OauthToken $oauthToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.view')
            || $user->id === $oauthToken->user_id
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('oauth-access-token.create');
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function update(UserContract $user, OauthToken $_oauthToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function delete(UserContract $user, OauthToken $oauthToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.delete')
            || $user->id === $oauthToken->user_id
            || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function restore(UserContract $user, OauthToken $_oauthToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.restore') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function forceDelete(UserContract $user, OauthToken $oauthToken): bool
    {
        return $user->hasPermissionTo('oauth-access-token.force-delete')
            || $user->id === $oauthToken->user_id
            || $user->hasRole('super-admin');
    }
}
