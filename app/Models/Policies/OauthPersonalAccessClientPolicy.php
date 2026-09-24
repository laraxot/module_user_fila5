<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\OauthPersonalAccessClient;
use Modules\Xot\Contracts\UserContract;

class OauthPersonalAccessClientPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.view.any');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.view.any');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, OauthPersonalAccessClient $_oauthPersonalAccessClient): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.view') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.view') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.create');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.create');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, OauthPersonalAccessClient $_oauthPersonalAccessClient): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.update') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.update') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, OauthPersonalAccessClient $_oauthPersonalAccessClient): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, OauthPersonalAccessClient $_oauthPersonalAccessClient): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.restore') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.restore') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, OauthPersonalAccessClient $oauthPersonalAccessClient): bool
    {
<<<<<<< HEAD
        return $user->hasPermissionToOrCreate('oauth-personal-access-client.force-delete') || $user->hasRole('super-admin');
=======
        return $user->hasPermissionTo('oauth-personal-access-client.force-delete') || $user->hasRole('super-admin');
>>>>>>> 350420cb (Check & fix styling)
    }
}
