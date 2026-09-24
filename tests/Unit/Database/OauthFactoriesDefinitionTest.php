<?php

declare(strict_types=1);
<<<<<<< .merge_file_jJ10ev

<<<<<<< HEAD
uses(Modules\User\Tests\TestCase::class);
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_rWkjSt
use Modules\User\Database\Factories\OauthAccessTokenFactory;
use Modules\User\Database\Factories\OauthAuthCodeFactory;
use Modules\User\Database\Factories\OauthClientFactory;
use Modules\User\Database\Factories\OauthRefreshTokenFactory;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
=======
uses(Modules\User\Tests\TestCase::class);

>>>>>>> 350420cb (Check & fix styling)
it('oauth factories expose the expected definition keys', function (): void {
    $clientDefinition = (new OauthClientFactory)->definition();
    $accessTokenDefinition = (new OauthAccessTokenFactory)->definition();
    $authCodeDefinition = (new OauthAuthCodeFactory)->definition();
    $refreshTokenDefinition = (new OauthRefreshTokenFactory)->definition();
});
