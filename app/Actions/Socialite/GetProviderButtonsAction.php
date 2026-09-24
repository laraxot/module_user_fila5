<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
namespace Modules\User\Actions\Socialite;

use Spatie\QueueableAction\QueueableAction;

class GetProviderButtonsAction
{
    use QueueableAction;

    /**
     * Execute the action.
<<<<<<< HEAD
     *
     * @return array<int, never>
     */
=======
     */
    /** @return array<int, array<string, mixed>> */
>>>>>>> 350420cb (Check & fix styling)
    public function execute(): array
    {
        return [];
    }
}
