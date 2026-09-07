<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;

/**
 * @phpstan-require-extends Model
 */
interface CreatesTeams
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
    public function create(UserContract $userContract, array $input): TeamContract;
}
