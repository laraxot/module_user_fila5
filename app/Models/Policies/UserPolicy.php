<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> 2024e2e7 (.)
use Modules\Xot\Contracts\UserContract as Post;

class UserPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
<<<<<<< HEAD
    public function viewAny(UserContract $user): bool
=======
    public function viewAny(Post $user): bool
>>>>>>> 2024e2e7 (.)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
    public function view(UserContract $_user, Post $_post): bool
=======
    public function view(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
    public function create(UserContract $_user): bool
=======
    public function create(Post $_user): bool
>>>>>>> 2024e2e7 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
    public function update(UserContract $_user, Post $_post): bool
=======
    public function update(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function delete(UserContract $_user, Post $_post): bool
=======
    public function delete(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
    {
        // return $user->ownsTeam($team);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
    public function superadmin(UserContract $_user, Post $_post): bool
=======
    public function superadmin(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
    {
        // return $user->ownsTeam($team);
        return false;
    }
}
