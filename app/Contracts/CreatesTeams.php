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
    /**
     * @param array<string, mixed> $input
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function create(UserContract $userContract, array $input): TeamContract;
}
