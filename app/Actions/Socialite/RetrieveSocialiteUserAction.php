<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use InvalidArgumentException;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Models\SocialiteUser;
use RuntimeException;
use Spatie\QueueableAction\QueueableAction;

class RetrieveSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $user): ?SocialiteUser
    {
        if (empty($provider)) {
            throw new InvalidArgumentException('Il provider non può essere vuoto');
        }

        $providerId = $user->getId();
        if (! is_string($providerId) && ! is_int($providerId)) {
            throw new RuntimeException('L\'ID del provider deve essere una stringa o un intero');
        }

        $res = SocialiteUser::query()
            ->with(['user'])
            ->where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();

        if (null === $res) {
            return null;
        }

        $token = $this->resolveOAuthToken($user);

        if ($token === '') {
            throw new RuntimeException('Impossibile recuperare il token OAuth dal provider '.$provider);
        }

        $res->update([
            'token' => $token,
        ]);

        return $res;
    }

    private function resolveOAuthToken(SocialiteUserContract $user): string
    {
        if (isset($user->token) && is_string($user->token) && $user->token !== '') {
            return $user->token;
        }

        if (method_exists($user, 'getToken')) {
            $tokenValue = $user->getToken();
            if (is_string($tokenValue) && $tokenValue !== '') {
                return $tokenValue;
            }
        }

        return '';
    }
}
