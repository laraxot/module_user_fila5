<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 *
 * @phpstan-require-extends Model
 */
interface RemovesTeamMembers
{
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function remove(UserContract $user, TeamContract $teamContract, UserContract $teamMember): void;
}
