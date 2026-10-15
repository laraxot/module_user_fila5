<?php

declare(strict_types=1);

namespace Tests\Modules\User\Feature\Actions;

use Tests\Modules\User\TestCase;
use PHPUnit\Framework\Assert as PHPUnitAssert;

uses(TestCase::class);

describe('Is User Allowed Action', function (): void {
    test('allows user with whitelisted email domain', function (): void {
        $user = fakeSocialiteUser('user@allowed-company.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
    });

    test('denies user with non whitelisted email domain', function (): void {
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
