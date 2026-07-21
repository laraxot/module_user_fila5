<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\BaseUser as Model;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class BaseUserPolicy extends XotBasePolicy
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
        return $user->hasRole(['super-admin', 'admin', 'hr-manager']);
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
    public function view(UserContract $user, Model $model): bool
    {
        return $user->hasRole(['super-admin', 'admin', 'hr-manager'])
            || $user->id === $model->id;
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
        return $user->hasRole(['super-admin', 'admin', 'hr-manager']);
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
    public function update(UserContract $user, Model $model): bool
    {
        return $user->hasRole(['super-admin', 'admin', 'hr-manager'])
            || $user->id === $model->id;
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
    public function delete(UserContract $user, Model $model): bool
    {
        return $user->hasRole(['super-admin', 'admin'])
            && $user->id !== $model->id; // Cannot delete self
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
    public function restore(UserContract $user, Model $model): bool
    {
        return $user->hasRole('super-admin');
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
    public function forceDelete(UserContract $user, Model $model): bool
    {
        return $user->hasRole('super-admin')
            && $user->id !== $model->id; // Cannot delete self
    }
}
