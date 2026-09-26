<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
namespace Modules\User\Actions\Socialite;

use Spatie\QueueableAction\QueueableAction;

class IsProviderConfiguredAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider): bool
    {
        return config()->has('services.'.$provider);
    }
}
