<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Datas\SocialiteUserAttributesData;
use Spatie\QueueableAction\QueueableAction;

class GetUserModelAttributesFromSocialiteAction
{
    use QueueableAction;

    public function __construct(
        private readonly ResolveUserNameFieldsFromSocialiteAction $resolveUserNameFieldsFromSocialiteAction,
    ) {
    }

    public function execute(string $provider, SocialiteUserContract $oauthUser): SocialiteUserAttributesData
    {
        if ('' === $provider) {
            throw new \InvalidArgumentException('Il provider non può essere vuoto');
        }

        $nameFields = $this->resolveUserNameFieldsFromSocialiteAction->execute($oauthUser);

        $email = $oauthUser->getEmail();
        if (! is_string($email) || '' === $email) {
            throw new \RuntimeException('L\'email deve essere una stringa non vuota');
        }

        return new SocialiteUserAttributesData(
            name: $nameFields->name,
            firstName: $nameFields->firstName,
            lastName: $nameFields->lastName,
            email: $email,
            provider: $provider,
        );
    }
}
