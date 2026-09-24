<?php

declare(strict_types=1);
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

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
