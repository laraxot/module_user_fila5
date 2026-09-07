<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Contracts\UserContract as Post;

class PermissionPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function viewAny(UserContract $user): bool
=======
    public function viewAny(Post $user): bool
>>>>>>> 2024e2e7 (.)
=======
    public function viewAny(Post $user): bool
>>>>>>> f589f9b2 (.)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function view(UserContract $_user, Post $_post): bool
=======
    public function view(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
=======
    public function view(Post $_user, Post $_post): bool
>>>>>>> f589f9b2 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function create(UserContract $_user): bool
=======
    public function create(Post $_user): bool
>>>>>>> 2024e2e7 (.)
=======
    public function create(Post $_user): bool
>>>>>>> f589f9b2 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function update(UserContract $_user, Post $_post): bool
=======
    public function update(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
=======
    public function update(Post $_user, Post $_post): bool
>>>>>>> f589f9b2 (.)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function delete(UserContract $_user, Post $_post): bool
=======
    public function delete(Post $_user, Post $_post): bool
>>>>>>> 2024e2e7 (.)
=======
    public function delete(Post $_user, Post $_post): bool
>>>>>>> f589f9b2 (.)
    {
        // return $user->ownsTeam($team);
        return true;
    }
}
