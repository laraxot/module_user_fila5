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
     */
=======
     */
    /** @return Collection<int, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    public function execute(): Collection;
}
