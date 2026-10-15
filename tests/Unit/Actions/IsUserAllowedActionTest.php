<?php

declare(strict_types=1);
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use PHPUnit\Framework\Assert;
use Tests\Modules\User\TestCase;

uses(TestCase::class);

describe('IsUserAllowedAction', function (): void {
    beforeEach(function (): void {
        /* @var \Tests\Modules\User\TestCase $this */
        config(['filament-socialite.domain_allowlist' => []]);
    });

    $getMockUser = function (string $email = 'user@example.com'): SocialiteUserContract {
        return configureMock(SocialiteUserContract::class, function (MockInterface $mock) use ($email): void {
            $mock->allows([
                'getEmail' => $email,
                'getId' => 'oauth-id',
                'getName' => 'Test User',
            ]);
        });
    };

    test('returns true for allowed email domain', function () use ($getMockUser): void {
        $action = app(IsUserAllowedAction::class);
        $oauthUser = $getMockUser('user@example.com');

        Assert::assertTrue($action->execute($oauthUser));
    });

    test('can be resolved from container', function (): void {
        $action = app(IsUserAllowedAction::class);

        Assert::assertInstanceOf(IsUserAllowedAction::class, $action);
    });
});
