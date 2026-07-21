<?php

declare(strict_types=1);

namespace Modules\User\Models\Policies;

use Modules\User\Models\Role as Post;
use Modules\Xot\Contracts\UserContract;

class RolePolicy extends UserBasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    /**
     * @return bool
     */
    public function viewAny(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    /**
     * @return bool
     */
    public function view(UserContract $_user, Post $_post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    /**
     * @return bool
     */
    public function create(UserContract $_user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    /**
     * @return bool
     */
    public function update(UserContract $_user, Post $_post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can add team members.
     */
    /**
     * @return bool
     */
    public function addTeamMember(UserContract $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update team member permissions.
     */
    /**
     * @return bool
     */
    public function updateTeamMember(UserContract $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can remove team members.
     */
    /**
     * @return bool
     */
    public function removeTeamMember(UserContract $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    /**
     * @return bool
     */
    public function delete(UserContract $_user, Post $_post): bool
    {
        return true;
    }
}
