<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Actions;

<<<<<<< HEAD
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert as PHPUnitAssert;

uses(TestCase::class);

describe('Is User Allowed Action', function (): void {
=======
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

function fakeSocialiteUser(string $email): SocialiteUserContract
{
    $user = Mockery::mock(SocialiteUserContract::class);
    $user->shouldReceive('getEmail')->andReturn($email);

    return $user;
}

describe('IsUserAllowedAction', function (): void {
>>>>>>> 350420cb (Check & fix styling)
    test('allows user with whitelisted email domain', function (): void {
        $user = fakeSocialiteUser('user@allowed-company.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

<<<<<<< HEAD
        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
    });

    test('denies user with non whitelisted email domain', function (): void {
        $user = fakeSocialiteUser('user@unknown-domain.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertFalse($result);
=======
        $result = app(IsUserAllowedAction::class)->execute($user);

        expect($result)->toBeTrue();
    });

    test('denies user with non-whitelisted email domain', function (): void {
        $user = fakeSocialiteUser('user@unknown-domain.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = app(IsUserAllowedAction::class)->execute($user);

        expect($result)->toBeFalse();
>>>>>>> 350420cb (Check & fix styling)
    });

    test('allows user when whitelist is empty', function (): void {
        $user = fakeSocialiteUser('user@any-domain.com');
        config(['filament-socialite.domain_allowlist' => []]);

<<<<<<< HEAD
        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
=======
        $result = app(IsUserAllowedAction::class)->execute($user);

        expect($result)->toBeTrue();
>>>>>>> 350420cb (Check & fix styling)
    });
});
