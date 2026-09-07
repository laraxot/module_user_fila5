<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 2024e2e7 (.)

class IsRegistrationEnabledAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): bool
    {
<<<<<<< HEAD
        Assert::boolean($res = config('filament-socialite.registration'));

        return $res;
=======
        return (bool) config('socialite.registration', true);
>>>>>>> 2024e2e7 (.)
    }
}
