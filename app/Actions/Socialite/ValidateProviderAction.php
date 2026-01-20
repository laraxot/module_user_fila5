<?php

<<<<<<< HEAD
=======
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

>>>>>>> f548be94 (.)
declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\User\Exceptions\ProviderNotConfigured;
use Spatie\QueueableAction\QueueableAction;

class ValidateProviderAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(string $provider): void
    {
        $hasConfig = config()->has('services.'.$provider);
        if (! $hasConfig) {
            $ex = new ProviderNotConfigured();
            throw $ex->make($provider);
=======
    /**
     * Execute the action.
     */
    public function execute(string $provider): void
    {
        $res = config()->has('services.' . $provider);
        if (!$res) {
            throw ProviderNotConfigured::make($provider);
>>>>>>> f548be94 (.)
        }
    }
}
