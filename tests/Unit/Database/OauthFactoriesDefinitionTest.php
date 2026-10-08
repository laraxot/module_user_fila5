<?php

declare(strict_types=1);

use Modules\User\Database\Factories\OauthAccessTokenFactory;
use Modules\User\Database\Factories\OauthAuthCodeFactory;
use Modules\User\Database\Factories\OauthClientFactory;
use Modules\User\Database\Factories\OauthRefreshTokenFactory;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('oauth factories expose the expected definition keys', function (): void {
    (new OauthClientFactory())->definition();    (new OauthAccessTokenFactory())->definition();    (new OauthAuthCodeFactory())->definition();    (new OauthRefreshTokenFactory())->definition();});
