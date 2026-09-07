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
<<<<<<< HEAD
=======
    /**
     * @param array<string, mixed> $input
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @param array<string, mixed> $input
     */
>>>>>>> f589f9b2 (.)
    public function update(UserContract $userContract, array $input): void;
}
