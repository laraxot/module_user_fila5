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
        null|string $role = null,
=======
        ?string $role = null,
>>>>>>> 2024e2e7 (.)
    ): void;
}
