<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> 350420cb (Check & fix styling)
/**
 * ----------------------------------------------------------------.
 * EX XotBasePolicy.
 */

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Models\Policies\XotBasePolicy;

<<<<<<< .merge_file_WLp1Uk
abstract class UserBasePolicy extends XotBasePolicy
{
=======
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;

abstract class UserBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $_ability): ?bool
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }
>>>>>>> 350420cb (Check & fix styling)
}
=======
abstract class UserBasePolicy extends XotBasePolicy {}
>>>>>>> .merge_file_cNY7Nx
