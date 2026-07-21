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
interface UpdatesTeamNames
{
    /**
     * @param array<string, mixed> $input
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function update(UserContract $userContract, TeamContract $teamContract, array $input): void;
}
