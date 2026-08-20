<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery;
use Modules\User\Listeners\LogoutListener;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
    Mockery::close();
});

describe('LogoutListener behavior', function (): void {
    test('handle returns early when user is null', function (): void {
        Log::shouldReceive('warning')->once()->with('Tentativo di logout per un utente non autenticato');

        $listener = new LogoutListener(Request::create('/logout', 'POST'));
        $listener->handle(new Logout('web', null));

        Assert::assertTrue(true);
    });

    test('forgetRememberTokens no-ops for non BaseUser', function (): void {
        $guest = new \stdClass;
        $listener = new LogoutListener(Request::create('/'));
        $listener->forgetRememberTokens(new Logout('web', $guest));

        Assert::assertTrue(true);
    });

    test('forgetRememberTokens catches errors for BaseUser without DB', function (): void {
        Log::shouldReceive('error')->atLeast()->once();

        $user = Mockery::mock(TestBaseUser::class)->makePartial();
        $user->forceFill(['id' => 'logout-user-1']);
        $user->shouldReceive('getAuthIdentifier')->andReturn('logout-user-1');

        $listener = new LogoutListener(Request::create('/'));
        $listener->forgetRememberTokens(new Logout('web', $user));

        Assert::assertTrue(true);
    });
});
