<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Datas\SocialiteUserAttributesData;
use Spatie\QueueableAction\QueueableAction;

class GetUserModelAttributesFromSocialiteAction
{
    use QueueableAction;

    public function execute(string $provider, SocialiteUserContract $oauthUser): SocialiteUserAttributesData
    {
        if (empty($provider)) {
            throw new \InvalidArgumentException('Il provider non può essere vuoto');
        }

        $nameFields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($oauthUser);

        if (! is_string($nameFields->name)) {
            throw new \RuntimeException('Il nome deve essere una stringa');
        }
        if (! is_string($nameFields->lastName)) {
            throw new \RuntimeException('Il cognome deve essere una stringa');
        }

        $email = $oauthUser->getEmail();
        if (! is_string($email) || empty($email)) {
            throw new \RuntimeException('L\'email deve essere una stringa non vuota');
        }

        return new SocialiteUserAttributesData(
            name: $nameFields->name,
            firstName: $nameFields->name,
            lastName: $nameFields->lastName,
            email: $email,
            provider: $provider,
        );
    }
}
