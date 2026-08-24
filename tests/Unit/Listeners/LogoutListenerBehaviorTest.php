<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
<<<<<<< .merge_file_tlNXas
use Mockery;
=======
>>>>>>> .merge_file_Ye57tq
use Mockery\MockInterface;
use Modules\User\Listeners\LogoutListener;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_tlNXas
use ReflectionClass;
=======
>>>>>>> .merge_file_Ye57tq

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
<<<<<<< .merge_file_tlNXas
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> .merge_file_Ye57tq
});

/**
 * Logout con user tipizzato; null via reflection perché il PHPDoc del costruttore
 * non ammette null anche se handle() lo gestisce a runtime.
 */
function logoutEvent(?Authenticatable $user): Logout
{
    /** @var Authenticatable&MockInterface $placeholder */
<<<<<<< .merge_file_tlNXas
    $placeholder = Mockery::mock(Authenticatable::class);
    $event = new Logout('web', $placeholder);
    if ($user === null) {
        $prop = (new ReflectionClass($event))->getProperty('user');
=======
    $placeholder = \Mockery::mock(Authenticatable::class);
    $event = new Logout('web', $placeholder);
    if (null === $user) {
        $prop = (new \ReflectionClass($event))->getProperty('user');
>>>>>>> .merge_file_Ye57tq
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
<<<<<<< .merge_file_tlNXas
        $guest = Mockery::mock(Authenticatable::class);
=======
        $guest = \Mockery::mock(Authenticatable::class);
>>>>>>> .merge_file_Ye57tq
        $listener = new LogoutListener(Request::create('/'));
        $listener->forgetRememberTokens(logoutEvent($guest));

        Assert::assertFalse($guest instanceof BaseUser);
    });

    test('forgetRememberTokens catches errors for BaseUser without DB', function (): void {
        Log::shouldReceive('error')->atLeast()->once();

<<<<<<< .merge_file_tlNXas
        $user = new TestBaseUser;
=======
        $user = new TestBaseUser();
>>>>>>> .merge_file_Ye57tq
        $user->forceFill(['id' => 'logout-user-1']);

        $listener = new LogoutListener(Request::create('/'));
        $listener->forgetRememberTokens(logoutEvent($user));

        Assert::assertSame('logout-user-1', $user->id);
    });
});
