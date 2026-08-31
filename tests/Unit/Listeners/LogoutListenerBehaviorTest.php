<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
<<<<<<< HEAD
use Mockery;
=======
>>>>>>> laraxot/dev
use Mockery\MockInterface;
use Modules\User\Listeners\LogoutListener;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;
=======
>>>>>>> laraxot/dev

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
<<<<<<< HEAD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> laraxot/dev
});

/**
 * Logout con user tipizzato; null via reflection perché il PHPDoc del costruttore
 * non ammette null anche se handle() lo gestisce a runtime.
 */
function logoutEvent(?Authenticatable $user): Logout
{
    /** @var Authenticatable&MockInterface $placeholder */
<<<<<<< HEAD
    $placeholder = Mockery::mock(Authenticatable::class);
    $event = new Logout('web', $placeholder);
    if ($user === null) {
        $prop = (new ReflectionClass($event))->getProperty('user');
=======
    $placeholder = \Mockery::mock(Authenticatable::class);
    $event = new Logout('web', $placeholder);
    if (null === $user) {
        $prop = (new \ReflectionClass($event))->getProperty('user');
>>>>>>> laraxot/dev
        $prop->setAccessible(true);
        $prop->setValue($event, null);
    } else {
        $event->user = $user;
    }

    return $event;
}

describe('LogoutListener behavior', function (): void {
    test('handle returns early when user is null', function (): void {
        Log::shouldReceive('warning')->once()->with('Tentativo di logout per un utente non autenticato');

        $listener = new LogoutListener(Request::create('/logout', 'POST'));
        $listener->handle(logoutEvent(null));

        Assert::assertInstanceOf(LogoutListener::class, $listener);
    });

    test('forgetRememberTokens no-ops for non BaseUser', function (): void {
        /** @var Authenticatable&MockInterface $guest */
<<<<<<< HEAD
        $guest = Mockery::mock(Authenticatable::class);
=======
        $guest = \Mockery::mock(Authenticatable::class);
>>>>>>> laraxot/dev
        $listener = new LogoutListener(Request::create('/'));
        $listener->forgetRememberTokens(logoutEvent($guest));

        Assert::assertFalse($guest instanceof BaseUser);
    });

    test('forgetRememberTokens catches errors for BaseUser without DB', function (): void {
        Log::shouldReceive('error')->atLeast()->once();

        $user = new TestBaseUser();
        $user->forceFill(['id' => 'logout-user-1']);

        $listener = new LogoutListener(Request::create('/'));
        $listener->forgetRememberTokens(logoutEvent($user));

        Assert::assertSame('logout-user-1', $user->id);
    });
});
