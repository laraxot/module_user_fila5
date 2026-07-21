<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\Xot\Contracts\UserContract as Post;

class UserPolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    /**
     * @return bool
     */
    public function viewAny(Post $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    /**
     * @return bool
     */
    public function view(Post $_user, Post $_post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    /**
     * @return bool
     */
    public function create(Post $_user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    /**
     * @return bool
     */
    public function update(Post $_user, Post $_post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    /**
     * @return mixed
     */
    public function delete(Post $_user, Post $_post): bool
    {
        // return $user->ownsTeam($team);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    /**
     * @return mixed
     */
    public function superadmin(Post $_user, Post $_post): bool
    {
        // return $user->ownsTeam($team);
        return false;
    }
}
