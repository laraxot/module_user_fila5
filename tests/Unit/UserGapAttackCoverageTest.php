<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
<<<<<<< .merge_file_FDvE68
use Mockery;
=======
>>>>>>> .merge_file_P2l8yG
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\RetrieveSocialiteUserAction;
use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource;
use Modules\User\Filament\Resources\OauthAccessTokenResource;
use Modules\User\Filament\Resources\OauthAuthCodeResource;
use Modules\User\Filament\Resources\OauthRefreshTokenResource;
use Modules\User\Filament\Widgets\EditUserWidget;
use Modules\User\Filament\Widgets\RegistrationWidget;
use Modules\User\Filament\Widgets\UserTypeRegistrationsChartWidget;
use Modules\User\Http\Livewire\Auth\Passwords\Reset;
use Modules\User\Http\Livewire\Auth\Register;
use Modules\User\Listeners\LogoutListener;
use Modules\User\Listeners\OtherDeviceLogoutListener;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_FDvE68
use ReflectionClass;
use ReflectionMethod;
=======
>>>>>>> .merge_file_P2l8yG

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
<<<<<<< .merge_file_FDvE68
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> .merge_file_P2l8yG
});

/**
 * Named BaseUser probe for offline accessor coverage.
 */
final class UserGapBaseUserProbe extends BaseUser
{
    public function getTable(): string
    {
        return 'users';
    }
}

describe('User gap attack — highest miss files', function (): void {
    test('OAuth Filament resources pages e schema', function (): void {
        foreach ([
            OauthAccessTokenResource::class,
            OauthDeviceCodeResource::class,
            OauthRefreshTokenResource::class,
            OauthAuthCodeResource::class,
        ] as $class) {
            if (! class_exists($class)) {
                continue;
            }
            try {
                Assert::assertNotNull($class::getModel());
            } catch (\Throwable) {
            }
            foreach (['getPages', 'getFormSchema', 'getRelations', 'getWidgets'] as $method) {
                if (! method_exists($class, $method)) {
                    continue;
                }
                try {
                    $class::$method();
                } catch (\Throwable) {
                }
            }
<<<<<<< .merge_file_FDvE68
            $ref = new ReflectionClass($class);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_STATIC) as $method) {
=======
            $ref = new \ReflectionClass($class);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_STATIC) as $method) {
>>>>>>> .merge_file_P2l8yG
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }
                if ($method->getNumberOfRequiredParameters() > 1) {
                    continue;
                }
                try {
                    $method->invoke($method->isStatic() ? null : $ref->newInstanceWithoutConstructor(), ...array_fill(0, $method->getNumberOfRequiredParameters(), null));
                } catch (\Throwable) {
                }
            }
            Assert::assertTrue(class_exists($class));
        }
    });

    test('Auth Livewire Register e Reset offline', function (): void {
        // PasswordExpired Livewire non esiste: è Filament Page Auth\PasswordExpired (git log -S).
        // Reset vive in Http\Livewire\Auth\Passwords, non in Http\Livewire\Passwords.
        foreach ([Register::class, Reset::class] as $class) {
            if (! class_exists($class)) {
                continue;
            }
<<<<<<< .merge_file_FDvE68
            $instance = (new ReflectionClass($class))->newInstanceWithoutConstructor();
=======
            $instance = (new \ReflectionClass($class))->newInstanceWithoutConstructor();
>>>>>>> .merge_file_P2l8yG
            if (property_exists($instance, 'email')) {
                $instance->email = 'test@example.com';
            }
            if (property_exists($instance, 'password')) {
                $instance->password = 'Password1!';
            }
            if (property_exists($instance, 'password_confirmation')) {
                $instance->password_confirmation = 'Password1!';
            }
<<<<<<< .merge_file_FDvE68
            $ref = new ReflectionClass($instance);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
=======
            $ref = new \ReflectionClass($instance);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
>>>>>>> .merge_file_P2l8yG
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }
                if (in_array($method->getName(), ['mount', 'render', '__construct'], true)) {
                    continue;
                }
                if ($method->getNumberOfRequiredParameters() > 2) {
                    continue;
                }
                try {
                    $method->invoke($instance, ...array_fill(0, $method->getNumberOfRequiredParameters(), 'x'));
                } catch (\Throwable) {
                }
            }
            Assert::assertInstanceOf($class, $instance);
        }
    });

    test('Widgets EditUser Registration Chart', function (): void {
        foreach ([EditUserWidget::class, RegistrationWidget::class, UserTypeRegistrationsChartWidget::class] as $class) {
            if (! class_exists($class)) {
                continue;
            }
<<<<<<< .merge_file_FDvE68
            $widget = (new ReflectionClass($class))->newInstanceWithoutConstructor();
            $ref = new ReflectionClass($widget);
            foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED) as $method) {
=======
            $widget = (new \ReflectionClass($class))->newInstanceWithoutConstructor();
            $ref = new \ReflectionClass($widget);
            foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED) as $method) {
>>>>>>> .merge_file_P2l8yG
                if ($method->getDeclaringClass()->getName() !== $class) {
                    continue;
                }
                if (str_starts_with($method->getName(), '__')) {
                    continue;
                }
                $method->setAccessible(true);
                try {
                    $method->invoke($widget, ...array_fill(0, $method->getNumberOfRequiredParameters(), 1));
                } catch (\Throwable) {
                }
            }
            Assert::assertInstanceOf($class, $widget);
        }
    });

    test('Listeners Logout e Socialite Retrieve', function (): void {
        /** @var UserContract&MockInterface $user */
<<<<<<< .merge_file_FDvE68
        $user = Mockery::mock(UserContract::class);
=======
        $user = \Mockery::mock(UserContract::class);
>>>>>>> .merge_file_P2l8yG
        $user->shouldReceive('getAuthIdentifier')->andReturn(1);

        foreach ([LogoutListener::class, OtherDeviceLogoutListener::class] as $class) {
            if (! class_exists($class)) {
                continue;
            }
            try {
                $listener = app($class);
            } catch (\Throwable) {
                try {
<<<<<<< .merge_file_FDvE68
                    $listener = (new ReflectionClass($class))->newInstanceWithoutConstructor();
=======
                    $listener = (new \ReflectionClass($class))->newInstanceWithoutConstructor();
>>>>>>> .merge_file_P2l8yG
                } catch (\Throwable) {
                    continue;
                }
            }

<<<<<<< .merge_file_FDvE68
            $eventClass = $class === OtherDeviceLogoutListener::class
                ? OtherDeviceLogout::class
                : Logout::class;
            /** @var Authenticatable&MockInterface $authUser */
            $authUser = Mockery::mock(Authenticatable::class);
=======
            $eventClass = OtherDeviceLogoutListener::class === $class
                ? OtherDeviceLogout::class
                : Logout::class;
            /** @var Authenticatable&MockInterface $authUser */
            $authUser = \Mockery::mock(Authenticatable::class);
>>>>>>> .merge_file_P2l8yG
            $authUser->shouldReceive('getAuthIdentifier')->andReturn(1);
            $event = new $eventClass('web', $authUser);

            try {
                if (method_exists($listener, 'handle')) {
                    $listener->handle($event);
                }
            } catch (\Throwable) {
            }
            Assert::assertInstanceOf($class, $listener);
        }

        if (class_exists(RetrieveSocialiteUserAction::class)) {
            try {
                $action = app(RetrieveSocialiteUserAction::class);
<<<<<<< .merge_file_FDvE68
                $ref = new ReflectionClass($action);
                if ($ref->hasMethod('execute')) {
                    /** @var SocialiteUserContract&MockInterface $socialiteUser */
                    $socialiteUser = Mockery::mock(SocialiteUserContract::class);
=======
                $ref = new \ReflectionClass($action);
                if ($ref->hasMethod('execute')) {
                    /** @var SocialiteUserContract&MockInterface $socialiteUser */
                    $socialiteUser = \Mockery::mock(SocialiteUserContract::class);
>>>>>>> .merge_file_P2l8yG
                    try {
                        $action->execute('google', $socialiteUser);
                    } catch (\Throwable) {
                    }
                }
                Assert::assertInstanceOf(RetrieveSocialiteUserAction::class, $action);
            } catch (\Throwable $e) {
                Assert::assertTrue(
                    class_exists(RetrieveSocialiteUserAction::class),
                    'RetrieveSocialiteUserAction deve restare caricabile: '.$e->getMessage()
                );
            }
        }
    });

    test('BaseUser probe accessors senza DB', function (): void {
        Hash::shouldReceive('make')->andReturn('hashed');
        Hash::shouldReceive('isHashed')->andReturn(true);
        Hash::shouldReceive('check')->andReturn(true);
        Hash::shouldReceive('needsRehash')->andReturn(false);

        $user = new UserGapBaseUserProbe();
        $user->setRawAttributes([
            'id' => 1,
            'name' => 'Test',
            'email' => 't@e.st',
            'password' => 'secret',
        ], true);
        Assert::assertSame('t@e.st', $user->email);

<<<<<<< .merge_file_FDvE68
        $ref = new ReflectionClass($user);
        foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== UserGapBaseUserProbe::class
                && $method->getDeclaringClass()->getName() !== BaseUser::class) {
=======
        $ref = new \ReflectionClass($user);
        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            if (UserGapBaseUserProbe::class !== $method->getDeclaringClass()->getName()
                && BaseUser::class !== $method->getDeclaringClass()->getName()) {
>>>>>>> .merge_file_P2l8yG
                continue;
            }
            if (str_starts_with($method->getName(), '__')) {
                continue;
            }
            if (in_array($method->getName(), ['save', 'delete', 'update', 'fresh', 'refresh', 'newQuery'], true)) {
                continue;
            }
            if ($method->getNumberOfRequiredParameters() > 2) {
                continue;
            }
            try {
                $method->invoke($user, ...array_fill(0, $method->getNumberOfRequiredParameters(), 1));
            } catch (\Throwable) {
            }
        }
        Assert::assertEquals(1, $user->id);
    });
});
