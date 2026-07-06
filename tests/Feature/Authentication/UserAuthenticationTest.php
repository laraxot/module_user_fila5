<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Traits\HasUserTestCase;

uses(\Modules\User\Tests\TestCase::class, HasUserTestCase::class);

/**
 * @param array<string, bool|string|\DateTimeInterface|null> $attributes
 */
function createUser(array $attributes = []): User
{
    return UserFactory::new()->createOne($attributes);
}

/**
 * @param array<string, bool|string|\DateTimeInterface|null> $attributes
 */
function createRole(array $attributes = []): Role
{
    return RoleFactory::new()->createOne($attributes);
}

/**
 * @param array<string, bool|string|\DateTimeInterface|null> $attributes
 */
function createPermission(array $attributes = []): Permission
{
    return PermissionFactory::new()->createOne($attributes);
}

function userUnderTest(TestCase $testCase): User
{
    $user = $testCase->user;

    if (! $user instanceof User) {
        throw new \RuntimeException('Expected authenticated test user.');
    }

    return $user;
}

function freshUser(User $user): User
{
    $freshUser = $user->fresh();

    if (! $freshUser instanceof User) {
        throw new \RuntimeException('Expected fresh user model.');
    }

    return $freshUser;
}

beforeEach(function (): void {
    $user = createUser([
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
    $this->user = $user;
});

describe('User Authentication', function (): void {
    it('can authenticate with valid credentials', function (): void {
        $result = Auth::attempt([
            'email' => userUnderTest($this)->email,
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
        expect(Auth::user()?->id)->toBe(userUnderTest($this)->id);
    });

    it('cannot authenticate with invalid password', function (): void {
        $result = Auth::attempt([
            'email' => userUnderTest($this)->email,
            'password' => 'wrongpassword',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

    it('cannot authenticate with non-existent email', function (): void {
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

    it('cannot authenticate inactive user', function (): void {
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = createUser([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
        assert($inactiveUser instanceof User);

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
            'is_active' => true,
        ]);

        expect($result)->toBe(false);
    });

    it('can logout user', function (): void {
        Auth::login(userUnderTest($this));
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

describe('User Password Management', function (): void {
    it('can hash password on creation', function (): void {
        /** @var User $user */
        /** @var User $user */
        $user = createUser([
            'password' => Hash::make('testpassword'),
        ]);

        expect(Hash::check('testpassword', $user->password))->toBe(true);
    });

    it('can change password', function (): void {
        $newPassword = 'newpassword123';
        userUnderTest($this)->update([
            'password' => Hash::make($newPassword),
        ]);

        expect(Hash::check($newPassword, freshUser(userUnderTest($this))->password))->toBe(true);
        expect(Hash::check('password123', freshUser(userUnderTest($this))->password))->toBe(false);
    });

    it('can check password expiration', function (): void {
        /** @var User $user */
        /** @var User $user */
        $user = createUser([
            'password_expires_at' => now()->subDays(1),
        ]);
        $expiresAt = $user->password_expires_at;
        if ($expiresAt === null) {
            throw new \RuntimeException('Expected password expiration date.');
        }

        expect($expiresAt->isPast())->toBe(true);
    });

    it('can set password expiration', function (): void {
        $expirationDate = now()->addDays(90);
        userUnderTest($this)->update([
            'password_expires_at' => $expirationDate,
        ]);

        expect(
            freshUser(userUnderTest($this))->password_expires_at?->toDateString(),
        )
            ->toBe($expirationDate->toDateString());
    });
});

describe('User Remember Token', function (): void {
    it('can generate remember token', function (): void {
        $token = Str::random(60);
        userUnderTest($this)->forceFill(['remember_token' => $token])->save();

        expect(freshUser(userUnderTest($this))->remember_token)->toBe($token);
    });

    it('can authenticate using remember token', function (): void {
        $token = Str::random(60);
        userUnderTest($this)->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', userUnderTest($this)->email)->where('remember_token', $token)->first();

        if (! $user instanceof User) {
            throw new \RuntimeException('Expected user with remember token.');
        }

        expect($user->id)->toBe(userUnderTest($this)->id);
    });
});

describe('User Email Verification', function (): void {
    it('can mark email as verified', function (): void {
        /** @var User $user */
        $user = createUser([
            'email_verified_at' => null,
        ]);

        expect($user->email_verified_at)->toBeNull();

        $user->markEmailAsVerified();

        expect(freshUser($user)->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function (): void {
        /** @var User $verifiedUser */
        $verifiedUser = createUser([
            'email_verified_at' => now(),
        ]);
        assert($verifiedUser instanceof User);

        /** @var User $unverifiedUser */
        $unverifiedUser = createUser([
            'email_verified_at' => null,
        ]);
        assert($unverifiedUser instanceof User);

        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
    });

    it('can send email verification notification', function (): void {
        /** @var User $user */
        $user = createUser([
            'email_verified_at' => null,
        ]);

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

describe('User Authorization', function (): void {
    it('can assign and check roles', function (): void {
        $adminRole = createRole(['name' => 'admin']);

        userUnderTest($this)->assignRole($adminRole);

        expect(userUnderTest($this)->hasRole('admin'))->toBe(true);
        expect(userUnderTest($this)->hasRole('editor'))->toBe(false);
        expect(userUnderTest($this)->hasRole($adminRole))->toBe(true);
    });

    it('can assign and check permissions', function (): void {
        $editPermission = createPermission(['name' => 'edit posts']);

        userUnderTest($this)->givePermissionTo($editPermission);

        expect(userUnderTest($this)->hasPermissionTo('edit posts'))->toBe(true);
        expect(userUnderTest($this)->hasPermissionTo('delete posts'))->toBe(false);
        expect(userUnderTest($this)->hasPermissionTo($editPermission))->toBe(true);
    });

    it('can inherit permissions from roles', function (): void {
        $role = createRole(['name' => 'editor']);
        $permission = createPermission(['name' => 'edit posts']);

        $role->givePermissionTo($permission);
        userUnderTest($this)->assignRole($role);

        expect(userUnderTest($this)->hasPermissionTo('edit posts'))->toBe(true);
    });

    it('can check multiple permissions', function (): void {
        $permission1 = createPermission(['name' => 'edit posts']);
        $permission2 = createPermission(['name' => 'delete posts']);

        userUnderTest($this)->givePermissionTo([$permission1, $permission2]);

        expect(userUnderTest($this)->hasAllPermissions(['edit posts', 'delete posts']))->toBe(true);
        expect(userUnderTest($this)->hasAnyPermission(['edit posts', 'publish posts']))->toBe(true);
    });

    it('can remove roles and permissions', function (): void {
        $role = createRole(['name' => 'editor']);
        $permission = createPermission(['name' => 'edit posts']);

        userUnderTest($this)->assignRole($role);
        userUnderTest($this)->givePermissionTo($permission);

        expect(userUnderTest($this)->hasRole('editor'))->toBe(true);
        expect(userUnderTest($this)->hasPermissionTo('edit posts'))->toBe(true);

        userUnderTest($this)->removeRole($role);
        userUnderTest($this)->revokePermissionTo($permission);

        expect(userUnderTest($this)->hasRole('editor'))->toBe(false);
        expect(userUnderTest($this)->hasPermissionTo('edit posts'))->toBe(false);
    });
});

describe('User OAuth Authentication', function (): void {
    it('can have oauth clients', function (): void {
        expect(userUnderTest($this)->clients())->toBeInstanceOf(MorphMany::class);
    });

    it('can have oauth tokens', function (): void {
        expect(userUnderTest($this)->tokens())->toBeInstanceOf(HasMany::class);
    });

    it('can find user for passport', function (): void {
        $user = User::findForPassport(userUnderTest($this)->email);

        if (! $user instanceof User) {
            throw new \RuntimeException('Expected passport user.');
        }

        expect($user->id)->toBe(userUnderTest($this)->id);
    });

    it('can validate password for passport', function (): void {
        $isValid = userUnderTest($this)->validateForPassportPasswordGrant('password123');

        expect($isValid)->toBe(true);
    });
});

describe('User Authentication Logging', function (): void {
    it('can log authentication attempts', function (): void {
        expect(userUnderTest($this)->authentications())->toBeInstanceOf(MorphMany::class);
    });

    it('can get latest authentication log', function (): void {
        expect(userUnderTest($this)->latestAuthentication())
            ->toBeInstanceOf(MorphOne::class);
    });
});

describe('User Session Management', function (): void {
    it('can store user in session', function (): void {
        Auth::login(userUnderTest($this));

        expect(Auth::check())->toBe(true);
        expect(Auth::id())->toBe(userUnderTest($this)->id);
    });

    it('can remember user across sessions', function (): void {
        Auth::login(userUnderTest($this), true);

        expect(freshUser(userUnderTest($this))->remember_token)->not->toBeNull();
    });

    it('can clear user session on logout', function (): void {
        Auth::login(userUnderTest($this));
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

describe('User Two Factor Authentication', function (): void {
    it('can enable two factor authentication', function (): void {
        userUnderTest($this)->update(['is_otp' => true]);

        expect(freshUser(userUnderTest($this))->is_otp)->toBe(true);
    });

    it('can disable two factor authentication', function (): void {
        userUnderTest($this)->update(['is_otp' => false]);

        expect(freshUser(userUnderTest($this))->is_otp)->toBe(false);
    });

    it('handles otp authentication workflow', function (): void {
        /** @var User $user */
        $user = createUser([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);

        Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);
        expect($user->is_otp)->toBe(true);
    });
});
