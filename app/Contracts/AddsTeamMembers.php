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
interface AddsTeamMembers
{
    public function add(
        UserContract $userContract,
        TeamContract $teamContract,
        string $email,
<<<<<<< HEAD
        ?string $role = null,
=======
        null|string $role = null,
>>>>>>> f548be94 (.)
    ): void;
}
