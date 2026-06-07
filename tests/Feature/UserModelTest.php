<?php

declare(strict_types=1);

use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;
});

describe('User Model Creation', function () {
    it('can be created with valid data', function () {
        $userData = [
            'name' => 'Test User',
            'first_name' => 'Test',
            'last_name' => 'User',
            'password' => bcrypt('password'),
            'lang' => 'it',
            'is_active' => true,
        ];

        $user = User::factory()->create($userData);

        expect($user)
            ->toBeInstanceOf(User::class)
            ->name->toBe('Test User')
            ->first_name->toBe('Test')
            ->last_name->toBe('User')
            ->lang->toBe('it')
            ->is_active->toBe(true);
    });

    it('generates uuid for id', function () {
    });

    it('has factory', function () {
        $users = User::factory()->count(3)->create();

        expect($users)->toHaveCount(3);
        $users->each(function ($user) {
            expect($user)->toBeInstanceOf(User::class);
        });
    });
});

describe('User Model Attributes', function () {
    it('has full name accessor', function () {
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        expect($user->full_name)->toBe('John Doe');
    });

    it('can have password expiration', function () {
        $user = User::factory()->create([
            'password_expires_at' => now()->addDays(30),
        ]);

        expect($user->password_expires_at)->not->toBeNull();
    });

    it('can be active or inactive', function () {
        $activeUser = User::factory()->create(['is_active' => true]);
        $inactiveUser = User::factory()->create(['is_active' => false]);

        expect($activeUser->is_active)->toBe(true);
        expect($inactiveUser->is_active)->toBe(false);
    });

    it('can have otp enabled', function () {
        $user = User::factory()->create(['is_otp' => true]);

        expect($user->is_otp)->toBe(true);
    });

    it('can have profile photo path', function () {
        $user = User::factory()->create([
            'profile_photo_path' => 'photos/user.jpg',
        ]);

        expect($user->profile_photo_path)->toBe('photos/user.jpg');
    });
});

describe('User Authentication Features', function () {
    it('can verify email', function () {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        expect($user->email_verified_at)->toBeNull();

        $user->update(['email_verified_at' => now()]);

        expect($user->fresh()->email_verified_at)->not->toBeNull();
    });

    it('can store remember token', function () {
        $token = Str::random(60);
        $user = User::factory()->create([
            'remember_token' => $token,
        ]);

        expect($user->remember_token)->toBe($token);
    });

    it('can access socialite feature', function () {
    });
});

describe('User Relationships', function () {
    it('can have teams', function () {
            ->toBeInstanceOf(BelongsToMany::class);
    });

    it('can have profile', function () {
    });
});

describe('User Team Management', function () {
    it('can join a team', function () {
        $team = Team::factory()->create();

    });

    it('can leave a team', function () {
        $team = Team::factory()->create();
    });
});

describe('User Permission System', function () {
    it('can have roles assigned', function () {
    });
});

describe('User Media Management', function () {
    it('implements HasMedia interface', function () {
    });
});

describe('User Scopes and Queries', function () {
    it('can filter by active users', function () {
        User::factory()->create(['is_active' => true]);
        User::factory()->create(['is_active' => false]);

        $activeUsers = User::where('is_active', true)->get();
        $inactiveUsers = User::where('is_active', false)->get();

        expect($activeUsers->every(fn ($user) => $user->is_active))->toBe(true);
        expect($inactiveUsers->every(fn ($user) => ! $user->is_active))->toBe(true);
    });

    it('can filter by email verified', function () {
        User::factory()->create(['email_verified_at' => now()]);
        User::factory()->create(['email_verified_at' => null]);

        $verifiedUsers = User::whereNotNull('email_verified_at')->get();
        $unverifiedUsers = User::whereNull('email_verified_at')->get();

        expect($verifiedUsers->every(fn ($user) => null !== $user->email_verified_at))->toBe(true);
        expect($unverifiedUsers->every(fn ($user) => null === $user->email_verified_at))->toBe(true);
    });

    it('can filter by language', function () {
        User::factory()->create(['lang' => 'it']);
        User::factory()->create(['lang' => 'en']);

        $italianUsers = User::where('lang', 'it')->get();
        $englishUsers = User::where('lang', 'en')->get();

        expect($italianUsers->every(fn ($user) => 'it' === $user->lang))->toBe(true);
        expect($englishUsers->every(fn ($user) => 'en' === $user->lang))->toBe(true);
    });
});
