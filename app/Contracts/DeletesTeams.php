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
    /**
     * @return mixed
     */
    public function delete(TeamContract $teamContract): void;
}
