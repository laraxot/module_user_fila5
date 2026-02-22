<?php

declare(strict_types=1);

namespace Modules\User\Application\UseCases\Owners;

use Illuminate\Support\Collection;

interface GetAllOwnersRelationshipUseCaseContract
{
    /**
     * Execute the use case to get all owners for relationship.
<<<<<<< HEAD
     *
     * @return Collection<int, mixed>
=======
>>>>>>> 60a2c9a9 (.)
     */
    public function execute(): Collection;
}
