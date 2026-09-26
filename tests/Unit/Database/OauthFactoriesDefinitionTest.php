<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\User\Tests\TestCase::class);
=======
>>>>>>> laraxot/dev
use Modules\User\Database\Factories\OauthAccessTokenFactory;
use Modules\User\Database\Factories\OauthAuthCodeFactory;
use Modules\User\Database\Factories\OauthClientFactory;
use Modules\User\Database\Factories\OauthRefreshTokenFactory;
<<<<<<< HEAD
=======
use Modules\User\Tests\TestCase;

uses(TestCase::class);
>>>>>>> laraxot/dev

it('oauth factories expose the expected definition keys', function (): void {
    $clientDefinition = (new OauthClientFactory())->definition();
    $accessTokenDefinition = (new OauthAccessTokenFactory())->definition();
    $authCodeDefinition = (new OauthAuthCodeFactory())->definition();
    $refreshTokenDefinition = (new OauthRefreshTokenFactory())->definition();
});
