<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use PHPUnit\Framework\Assert as PHPUnitAssert;
use Webmozart\Assert\Assert as WebmozartAssert;

function fakeSocialiteUser(string $email): SocialiteUserContract
{
    return configureMock(SocialiteUserContract::class, function (MockInterface $mock) use ($email): void {
        $mock->allows(['getEmail' => $email]);
    });
}

function makeIsUserAllowedAction(): IsUserAllowedAction
{
    $assert = configureMock(WebmozartAssert::class, function (MockInterface $mock): void {
        $mock->allows([
            'notNull' => static fn (mixed $value, ?string $message = null): mixed => $value,
        ]);
    });

    return new IsUserAllowedAction($assert, new Str());
}

describe('IsUserAllowedAction', function (): void {
    test('allows user with whitelisted email domain', function (): void {
        $user = fakeSocialiteUser('user@allowed-company.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
    });

    test('denies user with non-whitelisted email domain', function (): void {
        $user = fakeSocialiteUser('user@unknown-domain.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertFalse($result);
    });

    test('allows user when whitelist is empty', function (): void {
        $user = fakeSocialiteUser('user@any-domain.com');
        config(['filament-socialite.domain_allowlist' => []]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
    });
});
