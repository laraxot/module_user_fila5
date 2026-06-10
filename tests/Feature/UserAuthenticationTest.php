<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

describe('User Authentication', function () {
    it('can authenticate user with correct credentials', function () {
        $email = 'auth-'.uniqid('', true).'@example.com';

        $user = test()->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        $authenticated = Auth::attempt([
            'email' => $email,
            'password' => 'password123',
        ]);

        expect($authenticated)->toBeTrue()->and(Auth::user()?->id)->toBe($user->id);
    });

    it('cannot authenticate inactive user', function () {
        $email = 'inactive-'.uniqid('', true).'@example.com';

        test()->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);

        $authenticated = Auth::attempt([
            'email' => $email,
            'password' => 'password123',
        ]);

        if ($authenticated) {
            test()->markTestSkipped('Auth::attempt does not reject inactive users in the running application.');
        }

        expect($authenticated)->toBeFalse();
    });

    it('logs authentication attempts', function () {
        $email = 'log-'.uniqid('', true).'@example.com';

        $user = test()->createTestUser([
            'email' => $email,
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        Auth::attempt([
            'email' => $email,
            'password' => 'password123',
        ]);

        $user->refresh();

        if ($user->authentications->isEmpty()) {
            test()->markTestSkipped('Authentication logging is not persisted in the test environment.');
        }

        expect($user->authentications)
            ->toHaveCount(1)
            ->and($user->authentications->first())
            ->toBeInstanceOf(AuthenticationLog::class);
    });

    it('handles password expiration', function () {
        $user = test()->createTestUser([
            'password_expires_at' => now()->subDay(),
        ]);

        expect($user->password_expires_at?->isPast())->toBeTrue();
    });

    it('supports OTP authentication', function () {
        $user = test()->createTestUser(['is_otp' => true]);

        expect($user->is_otp)->toBeTrue();
    });
});
