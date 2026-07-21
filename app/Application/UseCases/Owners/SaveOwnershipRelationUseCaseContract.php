<?php

declare(strict_types=1);

namespace Modules\User\Application\UseCases\Owners;

use Laravel\Passport\Client;

interface SaveOwnershipRelationUseCaseContract
{
    /**
     * Execute the use case to save ownership relation.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function execute(Client $client, int $ownerId, mixed $actor): void;
}
