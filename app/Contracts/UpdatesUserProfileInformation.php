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
=======
    /**
     * @param array<string, mixed> $input
     */
>>>>>>> 2024e2e7 (.)
    public function update(UserContract $userContract, array $input): void;
}
