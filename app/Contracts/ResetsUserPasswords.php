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
interface ResetsUserPasswords
{
<<<<<<< HEAD
=======
    /**
     * @param array<string, mixed> $input
     */
>>>>>>> 2024e2e7 (.)
    public function reset(UserContract $userContract, array $input): void;
}
