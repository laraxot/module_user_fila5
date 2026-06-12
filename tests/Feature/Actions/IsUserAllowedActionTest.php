<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Actions;

use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Tests\TestCase;
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

    /* @phpstan-ignore-next-line */
    return new IsUserAllowedAction($assert, new Str());
}

class IsUserAllowedActionTest extends TestCase
{
    public function testAllowsUserWithWhitelistedEmailDomain(): void
    {
        $user = fakeSocialiteUser('user@allowed-company.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
    }

    public function testDeniesUserWithNonWhitelistedEmailDomain(): void
    {
        $user = fakeSocialiteUser('user@unknown-domain.com');
        config(['filament-socialite.domain_allowlist' => ['allowed-company.com']]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertFalse($result);
    }

    public function testAllowsUserWhenWhitelistIsEmpty(): void
    {
        $user = fakeSocialiteUser('user@any-domain.com');
        config(['filament-socialite.domain_allowlist' => []]);

        $result = makeIsUserAllowedAction()->execute($user);

        PHPUnitAssert::assertTrue($result);
    }
}
