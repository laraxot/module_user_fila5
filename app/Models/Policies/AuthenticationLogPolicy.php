<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\AuthenticationLog;
<<<<<<< HEAD
=======
use Modules\User\Models\Permission;
>>>>>>> laraxot/dev
use Modules\Xot\Contracts\UserContract;

class AuthenticationLogPolicy extends UserBasePolicy
{
<<<<<<< HEAD
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionToOrCreate(
            'authentication-log.view.any'
        );
    }

    public function view(UserContract $user, AuthenticationLog $authenticationLog): bool
    {
        return $user->hasPermissionToOrCreate('authentication-log.view')
=======
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(UserContract $user): bool
    {
        return $this->hasPermission($user, 'authentication-log.view.any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(UserContract $user, AuthenticationLog $authenticationLog): bool
    {
        return $this->hasPermission($user, 'authentication-log.view')
>>>>>>> laraxot/dev
            || $user->id === $authenticationLog->authenticatable_id
            || $user->hasRole('super-admin');
    }

<<<<<<< HEAD
    public function create(UserContract $user): bool
    {
        return $user->hasPermissionToOrCreate('authentication-log.create');
    }

    public function update(UserContract $user, AuthenticationLog $_authenticationLog): bool
    {
        return $user->hasPermissionToOrCreate('authentication-log.update') || $user->hasRole('super-admin');
    }

    public function delete(UserContract $user, AuthenticationLog $_authenticationLog): bool
    {
        return $user->hasPermissionToOrCreate('authentication-log.delete') || $user->hasRole('super-admin');
    }

    public function restore(UserContract $user, AuthenticationLog $_authenticationLog): bool
    {
        return $user->hasPermissionToOrCreate('authentication-log.restore') || $user->hasRole('super-admin');
    }

    public function forceDelete(UserContract $user, AuthenticationLog $authenticationLog): bool
    {
        return $user->hasPermissionToOrCreate('authentication-log.force-delete') || $user->hasRole('super-admin');
=======
    /**
     * Determine whether the user can create models.
     */
    public function create(UserContract $user): bool
    {
        return $this->hasPermission($user, 'authentication-log.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(UserContract $user, AuthenticationLog $_authenticationLog): bool
    {
        return $this->hasPermission($user, 'authentication-log.update') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(UserContract $user, AuthenticationLog $_authenticationLog): bool
    {
        return $this->hasPermission($user, 'authentication-log.delete') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(UserContract $user, AuthenticationLog $_authenticationLog): bool
    {
        return $this->hasPermission($user, 'authentication-log.restore') || $user->hasRole('super-admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(UserContract $user, AuthenticationLog $authenticationLog): bool
    {
        return $this->hasPermission($user, 'authentication-log.force-delete') || $user->hasRole('super-admin');
    }

    protected function hasPermission(UserContract $user, string $permission): bool
    {
        $exists = Permission::query()
            ->where('name', $permission)
            ->where('guard_name', 'web')
            ->exists();

        if (! $exists) {
            return false;
        }

        try {
            return $user->hasPermissionTo($permission);
        } catch (\Throwable) {
            return false;
        }
>>>>>>> laraxot/dev
    }
}
