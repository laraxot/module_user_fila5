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
     * <<<<<<< HEAD.
     *
     * @param array<string, mixed> $input
     *                                    =======
     * @param array<string, mixed> $input
     *                                    >>>>>>> laraxot/dev
     */
    public function update(UserContract $userContract, array $input): void;
}
