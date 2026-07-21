<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 */
interface UpdatesUserProfileInformation
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
    public function update(UserContract $userContract, array $input): void;
}
