<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

class IsRegistrationEnabledAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::boolean($res = config('filament-socialite.registration'));

        return $res;
=======
        return (bool) config('socialite.registration', true);
>>>>>>> 2024e2e7 (.)
=======
        return (bool) config('socialite.registration', true);
>>>>>>> f589f9b2 (.)
    }
}
