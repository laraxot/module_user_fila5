<?php

declare(strict_types=1);

namespace Modules\User\Application\UseCases\Owners;

use Illuminate\Support\Collection;
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> laraxot/dev

interface GetAllOwnersRelationshipUseCaseContract
{
    /**
     * Execute the use case to get all owners for relationship.
     *
<<<<<<< HEAD
     * @return Collection<int, User>
=======
     * @return Collection<int, mixed>
>>>>>>> laraxot/dev
     */
    public function execute(): Collection;
}
