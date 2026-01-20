<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Modules\Xot\Contracts\UserContract;

/**
 * ---.
 */
interface UpdatesUserProfileInformation
{
<<<<<<< HEAD
    /**
     * @param array<string, mixed> $input
     */
=======
>>>>>>> f548be94 (.)
    public function update(UserContract $userContract, array $input): void;
}
