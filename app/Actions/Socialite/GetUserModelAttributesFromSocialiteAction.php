<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;
<<<<<<< HEAD
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Datas\SocialiteUserAttributesData;
use Spatie\QueueableAction\QueueableAction;

class GetUserModelAttributesFromSocialiteAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(string $provider, SocialiteUserContract $oauthUser): SocialiteUserAttributesData
    {
        if (empty($provider)) {
            throw new \InvalidArgumentException('Il provider non può essere vuoto');
        }

        $nameFieldsResolver = app(UserNameFieldsResolver::class, ['user' => $oauthUser]);
        if ($nameFieldsResolver === null) {
            throw new \RuntimeException('Impossibile istanziare UserNameFieldsResolver');
        }

        if (! is_string($nameFieldsResolver->name)) {
            throw new \RuntimeException('Il nome deve essere una stringa');
        }
        if (! is_string($nameFieldsResolver->lastName)) {
            throw new \RuntimeException('Il cognome deve essere una stringa');
        }

        $email = $oauthUser->getEmail();
        if (! is_string($email) || empty($email)) {
=======
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
>>>>>>> 350420cb (Check & fix styling)
            throw new \RuntimeException('L\'email deve essere una stringa non vuota');
        }

        return new SocialiteUserAttributesData(
<<<<<<< HEAD
            name: $nameFieldsResolver->name,
            firstName: $nameFieldsResolver->name,
            lastName: $nameFieldsResolver->lastName,
=======
            name: $nameFields->name,
            firstName: $nameFields->firstName,
            lastName: $nameFields->lastName,
>>>>>>> 350420cb (Check & fix styling)
            email: $email,
            provider: $provider,
        );
    }
}
