<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\UserFactory;
>>>>>>> 6d3760fe (.)
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Traits\HasUserTestCase;

<<<<<<< HEAD
uses(TestCase::class, HasUserTestCase::class);

beforeEach(function () {
    $user = User::factory()->create([
=======
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
>>>>>>> 6d3760fe (.)
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
<<<<<<< HEAD
    \assert($user instanceof User);
    \assert($user instanceof User);
    $this->user = $user;
});

describe('User Authentication', function () {
    it('can authenticate with valid credentials', function () {
        $result = Auth::attempt([
            'email' => $this->user->email,
=======
    $this->user = $user;
});

describe('User Authentication', function (): void {
    it('can authenticate with valid credentials', function (): void {
        $result = Auth::attempt([
            'email' => userUnderTest($this)->email,
>>>>>>> 6d3760fe (.)
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
<<<<<<< HEAD
        expect(Auth::user()?->id)->toBe($this->user->id);
    });

    it('cannot authenticate with invalid password', function () {
        $result = Auth::attempt([
            'email' => $this->user->email,
=======
        expect(Auth::user()?->id)->toBe(userUnderTest($this)->id);
    });

    it('cannot authenticate with invalid password', function (): void {
        $result = Auth::attempt([
            'email' => userUnderTest($this)->email,
>>>>>>> 6d3760fe (.)
            'password' => 'wrongpassword',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

<<<<<<< HEAD
    it('cannot authenticate with non-existent email', function () {
=======
    it('cannot authenticate with non-existent email', function (): void {
>>>>>>> 6d3760fe (.)
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

<<<<<<< HEAD
    it('cannot authenticate inactive user', function () {
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = User::factory()->create([
=======
    it('cannot authenticate inactive user', function (): void {
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = createUser([
>>>>>>> 6d3760fe (.)
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

<<<<<<< HEAD
    it('can logout user', function () {
        Auth::login($this->user);
=======
    it('can logout user', function (): void {
        Auth::login(userUnderTest($this));
>>>>>>> 6d3760fe (.)
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

<<<<<<< HEAD
describe('User Password Management', function () {
    it('can hash password on creation', function () {
        /** @var User $user */
        /** @var User $user */
        $user = User::factory()->create([
=======
describe('User Password Management', function (): void {
    it('can hash password on creation', function (): void {
        /** @var User $user */
        /** @var User $user */
        $user = createUser([
>>>>>>> 6d3760fe (.)
            'password' => Hash::make('testpassword'),
        ]);

        expect(Hash::check('testpassword', $user->password))->toBe(true);
    });

<<<<<<< HEAD
    it('can change password', function () {
        $newPassword = 'newpassword123';
        $this->user->update([
            'password' => Hash::make($newPassword),
        ]);

        expect(Hash::check($newPassword, $this->user->fresh()->password))->toBe(true);
        expect(Hash::check('password123', $this->user->fresh()->password))->toBe(false);
    });

    it('can check password expiration', function () {
        /** @var User $user */
        /** @var User $user */
        $user = User::factory()->create([
            'password_expires_at' => now()->subDays(1),
        ]);
        \assert($user instanceof User);

        expect($user->password_expires_at->isPast())->toBe(true);
    });

    it('can set password expiration', function () {
        $expirationDate = now()->addDays(90);
        $this->user->update([
=======
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
>>>>>>> 6d3760fe (.)
            'password_expires_at' => $expirationDate,
        ]);

        expect(
<<<<<<< HEAD
            $this
                ->user->fresh()
                ->password_expires_at->toDateString(),
=======
            freshUser(userUnderTest($this))->password_expires_at?->toDateString(),
>>>>>>> 6d3760fe (.)
        )
            ->toBe($expirationDate->toDateString());
    });
});

<<<<<<< HEAD
describe('User Remember Token', function () {
    it('can generate remember token', function () {
        $token = Str::random(60);
        $this->user->forceFill(['remember_token' => $token])->save();

        expect($this->user->fresh()->remember_token)->toBe($token);
    });

    it('can authenticate using remember token', function () {
        $token = Str::random(60);
        $this->user->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', $this->user->email)->where('remember_token', $token)->first();

        expect($user)->not->toBeNull();
        expect($user->id)->toBe($this->user->id);
    });
});

describe('User Email Verification', function () {
    it('can mark email as verified', function () {
        /** @var User $user */
        $user = User::factory()->create([
=======
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
>>>>>>> 6d3760fe (.)
            'email_verified_at' => null,
        ]);

        expect($user->email_verified_at)->toBeNull();

        $user->markEmailAsVerified();

<<<<<<< HEAD
        expect($user->fresh()->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function () {
        /** @var User $verifiedUser */
        $verifiedUser = User::factory()->create([
=======
        expect(freshUser($user)->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function (): void {
        /** @var User $verifiedUser */
        $verifiedUser = createUser([
>>>>>>> 6d3760fe (.)
            'email_verified_at' => now(),
        ]);
        assert($verifiedUser instanceof User);

        /** @var User $unverifiedUser */
<<<<<<< HEAD
        $unverifiedUser = User::factory()->create([
=======
        $unverifiedUser = createUser([
>>>>>>> 6d3760fe (.)
            'email_verified_at' => null,
        ]);
        assert($unverifiedUser instanceof User);

        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
    });

<<<<<<< HEAD
    it('can send email verification notification', function () {
        /** @var User $user */
        $user = User::factory()->create([
=======
    it('can send email verification notification', function (): void {
        /** @var User $user */
        $user = createUser([
>>>>>>> 6d3760fe (.)
            'email_verified_at' => null,
        ]);

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

<<<<<<< HEAD
describe('User Authorization', function () {
    it('can assign and check roles', function () {
        $adminRole = Role::factory()->create(['name' => 'admin']);
        $editorRole = Role::factory()->create(['name' => 'editor']);

        $this->user->assignRole($adminRole);

        expect($this->user->hasRole('admin'))->toBe(true);
        expect($this->user->hasRole('editor'))->toBe(false);
        expect($this->user->hasRole($adminRole))->toBe(true);
    });

    it('can assign and check permissions', function () {
        $editPermission = Permission::factory()->create(['name' => 'edit posts']);
        $deletePermission = Permission::factory()->create(['name' => 'delete posts']);

        $this->user->givePermissionTo($editPermission);

        expect($this->user->hasPermissionTo('edit posts'))->toBe(true);
        expect($this->user->hasPermissionTo('delete posts'))->toBe(false);
        expect($this->user->hasPermissionTo($editPermission))->toBe(true);
    });

    it('can inherit permissions from roles', function () {
        $role = Role::factory()->create(['name' => 'editor']);
        $permission = Permission::factory()->create(['name' => 'edit posts']);

        $role->givePermissionTo($permission);
        $this->user->assignRole($role);

        expect($this->user->hasPermissionTo('edit posts'))->toBe(true);
    });

    it('can check multiple permissions', function () {
        $permission1 = Permission::factory()->create(['name' => 'edit posts']);
        $permission2 = Permission::factory()->create(['name' => 'delete posts']);

        $this->user->givePermissionTo([$permission1, $permission2]);

        expect($this->user->hasAllPermissions(['edit posts', 'delete posts']))->toBe(true);
        expect($this->user->hasAnyPermission(['edit posts', 'publish posts']))->toBe(true);
    });

    it('can remove roles and permissions', function () {
        $role = Role::factory()->create(['name' => 'editor']);
        $permission = Permission::factory()->create(['name' => 'edit posts']);

        $this->user->assignRole($role);
        $this->user->givePermissionTo($permission);

        expect($this->user->hasRole('editor'))->toBe(true);
        expect($this->user->hasPermissionTo('edit posts'))->toBe(true);

        $this->user->removeRole($role);
        $this->user->revokePermissionTo($permission);

        expect($this->user->hasRole('editor'))->toBe(false);
        expect($this->user->hasPermissionTo('edit posts'))->toBe(false);
    });
});

describe('User OAuth Authentication', function () {
    it('can have oauth clients', function () {
        expect($this->user->clients())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\MorphMany::class);
    });

    it('can have oauth tokens', function () {
        expect($this->user->tokens())->toBeInstanceOf(HasMany::class);
    });

    it('can find user for passport', function () {
        $user = User::findForPassport($this->user->email);

        expect($user)->not->toBeNull();
        expect($user->id)->toBe($this->user->id);
    });

    it('can validate password for passport', function () {
        $isValid = $this->user->validateForPassportPasswordGrant('password123');
=======
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
>>>>>>> 6d3760fe (.)

        expect($isValid)->toBe(true);
    });
});

<<<<<<< HEAD
describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
        expect($this->user->authentications())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\MorphMany::class);
    });

    it('can get latest authentication log', function () {
        expect($this->user->latestAuthentication())
            ->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\MorphOne::class);
    });
});

describe('User Session Management', function () {
    it('can store user in session', function () {
        Auth::login($this->user);

        expect(Auth::check())->toBe(true);
        expect(Auth::id())->toBe($this->user->id);
    });

    it('can remember user across sessions', function () {
        Auth::login($this->user, true);

        expect($this->user->fresh()->remember_token)->not->toBeNull();
    });

    it('can clear user session on logout', function () {
        Auth::login($this->user);
=======
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
>>>>>>> 6d3760fe (.)
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

<<<<<<< HEAD
describe('User Two Factor Authentication', function () {
    it('can enable two factor authentication', function () {
        $this->user->update(['is_otp' => true]);

        expect($this->user->fresh()->is_otp)->toBe(true);
    });

    it('can disable two factor authentication', function () {
        $this->user->update(['is_otp' => false]);

        expect($this->user->fresh()->is_otp)->toBe(false);
    });

    it('handles otp authentication workflow', function () {
        /** @var User $user */
        $user = User::factory()->create([
=======
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
>>>>>>> 6d3760fe (.)
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);

        // First step: password authentication
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);
<<<<<<< HEAD

        // Should handle OTP requirement
=======
>>>>>>> 6d3760fe (.)
        expect($user->is_otp)->toBe(true);
    });
});
