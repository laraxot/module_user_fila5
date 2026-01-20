<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 * EX XotBasePolicy.
 */

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Modules\Xot\Models\Policies\XotBasePolicy;

abstract class UserBasePolicy extends XotBasePolicy
{
=======
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

// use Modules\Xot\Datas\XotData;

abstract class UserBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $_ability): null|bool
    {
        $xotData = XotData::make();
        if ($user->hasRole('super-admin')) {
            return true;
        }

        return null;
    }
>>>>>>> f548be94 (.)
}
