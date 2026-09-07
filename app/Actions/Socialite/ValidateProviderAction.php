<?php

<<<<<<< HEAD
<<<<<<< HEAD
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\User\Exceptions\ProviderNotConfigured;
use Spatie\QueueableAction\QueueableAction;

class ValidateProviderAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Execute the action.
     */
    public function execute(string $provider): void
    {
        $res = config()->has('services.' . $provider);
        if (!$res) {
            throw ProviderNotConfigured::make($provider);
=======
=======
>>>>>>> f589f9b2 (.)
    public function execute(string $provider): void
    {
        $hasConfig = config()->has('services.'.$provider);
        if (! $hasConfig) {
            $ex = new ProviderNotConfigured();
            throw $ex->make($provider);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        }
    }
}
