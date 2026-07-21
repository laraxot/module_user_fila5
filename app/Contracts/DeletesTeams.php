<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * ---.
 *
 * @phpstan-require-extends Model
 */
interface DeletesTeams
{
    /**
     * ---.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function delete(TeamContract $teamContract): void;
}
