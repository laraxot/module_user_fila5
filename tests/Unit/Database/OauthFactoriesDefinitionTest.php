<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\User\Tests\TestCase::class);
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Database\Factories\OauthAccessTokenFactory;
use Modules\User\Database\Factories\OauthAuthCodeFactory;
use Modules\User\Database\Factories\OauthClientFactory;
use Modules\User\Database\Factories\OauthRefreshTokenFactory;

<<<<<<< HEAD
=======
uses(Modules\User\Tests\TestCase::class);

>>>>>>> 350420cb (Check & fix styling)
it('oauth factories expose the expected definition keys', function (): void {
    $clientDefinition = (new OauthClientFactory())->definition();
    $accessTokenDefinition = (new OauthAccessTokenFactory())->definition();
    $authCodeDefinition = (new OauthAuthCodeFactory())->definition();
    $refreshTokenDefinition = (new OauthRefreshTokenFactory())->definition();
});
