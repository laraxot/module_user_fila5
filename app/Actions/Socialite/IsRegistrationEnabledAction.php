<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
>>>>>>> f548be94 (.)

class IsRegistrationEnabledAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(): bool
    {
<<<<<<< HEAD
        return (bool) config('socialite.registration', true);
=======
        Assert::boolean($res = config('filament-socialite.registration'));

        return $res;
>>>>>>> f548be94 (.)
    }
}
