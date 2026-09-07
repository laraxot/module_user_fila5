<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
<<<<<<< HEAD
// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use InvalidArgumentException;
use RuntimeException;
use ReflectionClass;
use ReflectionException;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class RetrieveSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(string $provider, SocialiteUserContract $user): null|SocialiteUser
    {
        if (empty($provider)) {
            throw new InvalidArgumentException('Il provider non può essere vuoto');
        }

        $providerId = $user->getId();
        if (!is_string($providerId) && !is_int($providerId)) {
            throw new RuntimeException('L\'ID del provider deve essere una stringa o un intero');
=======
=======
>>>>>>> f589f9b2 (.)
    public function execute(string $provider, SocialiteUserContract $user): ?SocialiteUser
    {
        if (empty($provider)) {
            throw new \InvalidArgumentException('Il provider non può essere vuoto');
        }

        $providerId = $user->getId();
        if (! is_string($providerId) && ! is_int($providerId)) {
            throw new \RuntimeException('L\'ID del provider deve essere una stringa o un intero');
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        }

        $res = SocialiteUser::query()
            ->with(['user'])
            ->where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();

<<<<<<< HEAD
<<<<<<< HEAD
        if ($res === null) {
=======
        if (null === $res) {
>>>>>>> 2024e2e7 (.)
=======
        if (null === $res) {
>>>>>>> f589f9b2 (.)
            return null;
        }

        // Accesso sicuro alla proprietà token in modo type-safe
        $token = '';

        // Utilizzo ReflectionClass per accedere in modo sicuro alle proprietà/metodi
        try {
<<<<<<< HEAD
<<<<<<< HEAD
            $reflection = new ReflectionClass($user);
=======
            $reflection = new \ReflectionClass($user);
>>>>>>> 2024e2e7 (.)
=======
            $reflection = new \ReflectionClass($user);
>>>>>>> f589f9b2 (.)

            // Prova prima i metodi standard
            if ($reflection->hasMethod('getToken')) {
                $method = $reflection->getMethod('getToken');
                $method->setAccessible(true);
                $tokenValue = $method->invoke($user);
                if (is_string($tokenValue)) {
                    $token = $tokenValue;
                }
            } elseif ($reflection->hasMethod('token')) {
                $method = $reflection->getMethod('token');
                $method->setAccessible(true);
                $tokenValue = $method->invoke($user);
                if (is_string($tokenValue)) {
                    $token = $tokenValue;
                }
            } elseif ($reflection->hasProperty('token')) { // Prova poi ad accedere alla proprietà
                $property = $reflection->getProperty('token');
                $property->setAccessible(true);
                $tokenValue = $property->getValue($user);
                if (is_string($tokenValue)) {
                    $token = $tokenValue;
                }
            } elseif (isset($user->token) && is_string($user->token)) { // Fallback su accesso diretto con var_export
                $token = $user->token;
            }
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (ReflectionException $e) {
=======
        } catch (\ReflectionException $e) {
>>>>>>> 2024e2e7 (.)
=======
        } catch (\ReflectionException $e) {
>>>>>>> f589f9b2 (.)
            // Fallback silenzioso
        }

        if (empty($token)) {
            // Se non riusciamo a ottenere un token valido, utilizziamo un valore predefinito
<<<<<<< HEAD
<<<<<<< HEAD
            $token = 'no_token_' . time();
=======
            $token = 'no_token_'.time();
>>>>>>> 2024e2e7 (.)
=======
            $token = 'no_token_'.time();
>>>>>>> f589f9b2 (.)
        }

        $res->update([
            'token' => $token,
        ]);

        return $res;
    }
}
