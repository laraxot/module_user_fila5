<?php

declare(strict_types=1);

use Modules\User\Database\Factories\OauthAccessTokenFactory;
use Modules\User\Database\Factories\OauthAuthCodeFactory;
use Modules\User\Database\Factories\OauthClientFactory;
use Modules\User\Database\Factories\OauthRefreshTokenFactory;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-user-db');

it('oauth factories expose the expected definition keys', function (): void {
    $clientDefinition = (new OauthClientFactory)->definition();
    $accessTokenDefinition = (new OauthAccessTokenFactory)->definition();
    $authCodeDefinition = (new OauthAuthCodeFactory)->definition();
    $refreshTokenDefinition = (new OauthRefreshTokenFactory)->definition();

    Assert::assertIsArray($clientDefinition);
    Assert::assertIsArray($accessTokenDefinition);
    Assert::assertIsArray($authCodeDefinition);
    Assert::assertIsArray($refreshTokenDefinition);
    Assert::assertNotEmpty($clientDefinition);
});
