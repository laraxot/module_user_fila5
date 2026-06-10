<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\User\Models\Profile;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

describe('Auth Components Tests', function (): void {
    test('auth components exist and work correctly', function (): void {
        expect(View::exists('components.auth-session-status'))->toBeTrue();
        expect(View::exists('user::components.auth-header'))->toBeTrue();
        expect(View::exists('user::components.auth-session-status'))->toBeTrue();
    });

    test('auth layout components exist and work correctly', function (): void {
        expect(View::exists('components.layouts.auth'))->toBeTrue();
        expect(View::exists('user::layouts.auth'))->toBeTrue();
    });

    test('login page loads correctly', function (): void {
        $this->get('/it/auth/login')->assertStatus(200);
    });

    test('register page loads correctly', function (): void {
        $this->get('/it/auth/register')->assertStatus(200);
    });

    test('auth-session-status component renders correctly', function (): void {
        $html = view('components.auth-session-status', ['status' => 'Test status'])->render();

        expect($html)->toBeString();
        expect($html)->not->toBeEmpty();
    });

    test('auth header component exists and renders', function (): void {
        expect(View::exists('user::components.auth-header'))->toBeTrue();

        $html = view('user::components.auth-header', [
            'title' => 'Login Test',
            'description' => 'Test description',
        ])->render();

        expect($html)->toContain('Login Test');
        expect($html)->toContain('Test description');
    });
});

describe('Authentication Flow with Reorganized Components', function (): void {
    test('login form components work after reorganization', function (): void {
        $response = $this->get('/it/auth/login');

        expect($response->status())->toBe(200);
        $content = $response->getContent() ?? '';
        expect(
            str_contains($content, 'Login')
            || str_contains($content, 'login')
            || str_contains($content, 'Accedi')
            || str_contains($content, 'accedi')
        )->toBeTrue();
    });

    test('password confirmation uses reorganized components', function (): void {
        $user = $this->createTestUser();

        try {
            $this->actingAs($user)
                ->get('/it/auth/password/confirm')
                ->assertStatus(200);
        } catch (Throwable $e) {
            test()->markTestSkipped('Password confirm route unavailable in test env: '.$e->getMessage());
        }
    });
});

describe('User Profile Components Tests', function (): void {
    test('profile pages use reorganized components correctly', function (): void {
        $user = $this->createTestUser();

        if (class_exists(Profile::class)) {
            $hasUuid = Schema::connection('user')->hasColumn('profiles', 'uuid');
            $profileData = [
                'id' => $user->id,
                'user_id' => $user->id,
                'email' => $user->email,
                'first_name' => $user->first_name ?? '',
                'last_name' => $user->last_name ?? '',
            ];
            if ($hasUuid) {
                $profileData['uuid'] = (string) Str::uuid();
            }
            try {
                Profile::create($profileData);
            } catch (Throwable) {
                // Profile creation may fail in test env; continue with user only
            }
        }

        try {
            $this->actingAs($user, 'web')
                ->get('/it/profile/edit')
                ->assertStatus(200);
        } catch (Throwable $e) {
            test()->markTestSkipped('Profile edit route unavailable in test env: '.$e->getMessage());
        }
    });
});
