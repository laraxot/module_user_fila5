<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Client;
use Laravel\Passport\DeviceCode;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthDeviceCode;
use Modules\User\Models\OauthRefreshToken;
use Modules\User\Models\OauthToken;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
<<<<<<< HEAD
 * @param class-string $wrapperClass
=======
<<<<<<< HEAD
 * @param  class-string  $wrapperClass
=======
 * @param class-string $wrapperClass
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
 */
function passportWrapperConnectionName(string $wrapperClass): ?string
{
    config(['passport.connection' => 'user']);

    $reflection = new ReflectionClass($wrapperClass);

    if ($reflection->hasProperty('connection')) {
        $property = $reflection->getProperty('connection');
        $property->setAccessible(true);
        $connection = $property->getValue($reflection->newInstanceWithoutConstructor());

<<<<<<< HEAD
        if (is_string($connection) && '' !== $connection) {
=======
<<<<<<< HEAD
        if (is_string($connection) && $connection !== '') {
=======
        if (is_string($connection) && '' !== $connection) {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
            return $connection;
        }
    }

<<<<<<< HEAD
    $instance = new $wrapperClass();
=======
<<<<<<< HEAD
    $instance = new $wrapperClass;
=======
    $instance = new $wrapperClass();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

    if (! $instance instanceof Model) {
        return null;
    }

    /* @var \Illuminate\Database\Eloquent\Model $instance */
    return $instance->getConnectionName();
}

beforeEach(function () {
    /* @var \Modules\User\Tests\TestCase $this */
    config(['passport.connection' => 'user']);
});

test('passport eloquent models have oauth wrappers in user module', function (): void {
    $expectedWrappers = [
        AuthCode::class => OauthAuthCode::class,
        Client::class => OauthClient::class,
        DeviceCode::class => OauthDeviceCode::class,
        RefreshToken::class => OauthRefreshToken::class,
        Token::class => OauthToken::class,
    ];

    foreach ($expectedWrappers as $passportClass => $wrapperClass) {
        Assert::assertSame('user', passportWrapperConnectionName($wrapperClass));
    }
});
