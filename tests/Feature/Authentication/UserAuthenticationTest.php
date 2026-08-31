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
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function authenticationUser(?User $newUser = null): User
{
    static $user;

    if ($newUser instanceof User) {
        $user = $newUser;
    }

    if (! $user instanceof User) {
        throw new \LogicException('Authentication test user is not initialized.');
    }

    return $user;
}

function freshAuthenticationUser(): User
{
    $user = authenticationUser()->fresh();
    Assert::assertNotNull($user);

    return $user;
}

=======

uses(TestCase::class);

>>>>>>> laraxot/dev
beforeEach(function () {
    $user = UserFactory::new()->createOne([
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
<<<<<<< HEAD
    authenticationUser($user);
=======
    \assert($user instanceof User);
    $this->user = $user;
>>>>>>> laraxot/dev
});

describe('User Authentication', function () {
    it('can authenticate with valid credentials', function () {
        $result = Auth::attempt([
<<<<<<< HEAD
            'email' => authenticationUser()->email,
            'password' => 'password123',
        ]);

        Assert::assertTrue($result);
        Assert::assertSame(authenticationUser()->id, Auth::user()?->id);
=======
            'email' => $this->requireUser()->email,
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
        expect(Auth::user()?->id)->toBe($this->requireUser()->id);
>>>>>>> laraxot/dev
    });

    it('cannot authenticate with invalid password', function () {
        $result = Auth::attempt([
<<<<<<< HEAD
            'email' => authenticationUser()->email,
            'password' => 'wrongpassword',
        ]);

        Assert::assertFalse($result);
        Assert::assertNull(Auth::user());
=======
            'email' => $this->requireUser()->email,
            'password' => 'wrongpassword',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
>>>>>>> laraxot/dev
    });

    it('cannot authenticate with non-existent email', function () {
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

<<<<<<< HEAD
        Assert::assertFalse($result);
        Assert::assertNull(Auth::user());
=======
        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
>>>>>>> laraxot/dev
    });

    it('cannot authenticate inactive user', function () {
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = UserFactory::new()->createOne([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
<<<<<<< HEAD
=======
        \assert($inactiveUser instanceof User);
>>>>>>> laraxot/dev

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
            'is_active' => true,
        ]);

<<<<<<< HEAD
        Assert::assertFalse($result);
    });

    it('can logout user', function () {
        Auth::login(authenticationUser());
        Assert::assertTrue(Auth::check());

        Auth::logout();
        Assert::assertFalse(Auth::check());
=======
        expect($result)->toBe(false);
    });

    it('can logout user', function () {
        Auth::login($this->requireUser());
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
>>>>>>> laraxot/dev
    });
});

describe('User Password Management', function () {
    it('can hash password on creation', function () {
        /** @var User $user */
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('testpassword'),
        ]);
<<<<<<< HEAD

        Assert::assertTrue(Hash::check('testpassword', $user->password));
=======
        \assert($user instanceof User);

        expect(Hash::check('testpassword', $user->password))->toBe(true);
>>>>>>> laraxot/dev
    });

    it('can change password', function () {
        $newPassword = 'newpassword123';
<<<<<<< HEAD
        authenticationUser()->update([
            'password' => Hash::make($newPassword),
        ]);

        Assert::assertTrue(Hash::check($newPassword, freshAuthenticationUser()->password));
        Assert::assertFalse(Hash::check('password123', freshAuthenticationUser()->password));
=======
        $this->requireUser()->update([
            'password' => Hash::make($newPassword),
        ]);

        expect(Hash::check($newPassword, $this->requireFreshUser($this->requireUser())->password))->toBe(true);
        expect(Hash::check('password123', $this->requireFreshUser($this->requireUser())->password))->toBe(false);
>>>>>>> laraxot/dev
    });

    it('can check password expiration', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->subDays(1),
        ]);
<<<<<<< HEAD
        $passwordExpiresAt = $user->password_expires_at;
        Assert::assertNotNull($passwordExpiresAt);

        Assert::assertTrue($passwordExpiresAt->isPast());
=======
        \assert($user instanceof User);
        $passwordExpiresAt = $user->password_expires_at;
        \assert(null !== $passwordExpiresAt);

        expect($passwordExpiresAt->isPast())->toBe(true);
>>>>>>> laraxot/dev
    });

    it('can set password expiration', function () {
        $expirationDate = now()->addDays(90);
<<<<<<< HEAD
        authenticationUser()->update([
            'password_expires_at' => $expirationDate,
        ]);

        $passwordExpiresAt = freshAuthenticationUser()->password_expires_at;
        Assert::assertNotNull($passwordExpiresAt);

        Assert::assertSame($expirationDate->toDateString(), $passwordExpiresAt->toDateString());
=======
        $this->requireUser()->update([
            'password_expires_at' => $expirationDate,
        ]);

        $passwordExpiresAt = $this->requireFreshUser($this->requireUser())->password_expires_at;
        \assert(null !== $passwordExpiresAt);

        expect($passwordExpiresAt->toDateString())
            ->toBe($expirationDate->toDateString());
>>>>>>> laraxot/dev
    });
});

describe('User Remember Token', function () {
    it('can generate remember token', function () {
        $token = Str::random(60);
<<<<<<< HEAD
        authenticationUser()->forceFill(['remember_token' => $token])->save();

        Assert::assertSame($token, freshAuthenticationUser()->remember_token);
=======
        $this->requireUser()->forceFill(['remember_token' => $token])->save();

        expect($this->requireFreshUser($this->requireUser())->remember_token)->toBe($token);
>>>>>>> laraxot/dev
    });

    it('can authenticate using remember token', function () {
        $token = Str::random(60);
<<<<<<< HEAD
        authenticationUser()->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', authenticationUser()->email)->where('remember_token', $token)->first();

        Assert::assertNotNull($user);
        Assert::assertSame(authenticationUser()->id, $user->id);
=======
        $this->requireUser()->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', $this->requireUser()->email)->where('remember_token', $token)->first();

        expect($user)->not->toBeNull();
        \assert($user instanceof User);
        expect($user->id)->toBe($this->requireUser()->id);
>>>>>>> laraxot/dev
    });
});

describe('User Email Verification', function () {
    it('can mark email as verified', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
<<<<<<< HEAD

        Assert::assertNull($user->email_verified_at);
=======
        \assert($user instanceof User);

        expect($user->email_verified_at)->toBeNull();
>>>>>>> laraxot/dev

        $user->markEmailAsVerified();

        $fresh = $user->fresh();
<<<<<<< HEAD
        Assert::assertNotNull($fresh);

        Assert::assertNotNull($fresh->email_verified_at);
=======
        \assert(null !== $fresh);

        expect($fresh->email_verified_at)->not->toBeNull();
>>>>>>> laraxot/dev
    });

    it('can check if email is verified', function () {
        /** @var User $verifiedUser */
        $verifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => now(),
        ]);
<<<<<<< HEAD
=======
        \assert($verifiedUser instanceof User);
>>>>>>> laraxot/dev

        /** @var User $unverifiedUser */
        $unverifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
<<<<<<< HEAD

        Assert::assertTrue($verifiedUser->hasVerifiedEmail());
        Assert::assertFalse($unverifiedUser->hasVerifiedEmail());
=======
        \assert($unverifiedUser instanceof User);

        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
>>>>>>> laraxot/dev
    });

    it('can send email verification notification', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
<<<<<<< HEAD
=======
        \assert($user instanceof User);
>>>>>>> laraxot/dev

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

describe('User Authorization', function () {
    it('can assign and check roles', function () {
        $adminRole = RoleFactory::new()->createOne(['name' => 'admin']);
        $editorRole = RoleFactory::new()->createOne(['name' => 'editor']);

<<<<<<< HEAD
        authenticationUser()->assignRole($adminRole);

        Assert::assertTrue(authenticationUser()->hasRole('admin'));
        Assert::assertFalse(authenticationUser()->hasRole('editor'));
        Assert::assertTrue(authenticationUser()->hasRole($adminRole));
=======
        $this->requireUser()->assignRole($adminRole);

        expect($this->requireUser()->hasRole('admin'))->toBe(true);
        expect($this->requireUser()->hasRole('editor'))->toBe(false);
        expect($this->requireUser()->hasRole($adminRole))->toBe(true);
>>>>>>> laraxot/dev
    });

    it('can assign and check permissions', function () {
        $editPermission = PermissionFactory::new()->createOne(['name' => 'edit posts']);
        $deletePermission = PermissionFactory::new()->createOne(['name' => 'delete posts']);

<<<<<<< HEAD
        authenticationUser()->givePermissionTo($editPermission);

        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));
        Assert::assertFalse(authenticationUser()->hasPermissionTo('delete posts'));
        Assert::assertTrue(authenticationUser()->hasPermissionTo($editPermission));
=======
        $this->requireUser()->givePermissionTo($editPermission);

        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(true);
        expect($this->requireUser()->hasPermissionTo('delete posts'))->toBe(false);
        expect($this->requireUser()->hasPermissionTo($editPermission))->toBe(true);
>>>>>>> laraxot/dev
    });

    it('can inherit permissions from roles', function () {
        $role = RoleFactory::new()->createOne(['name' => 'editor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts']);

        $role->givePermissionTo($permission);
<<<<<<< HEAD
        authenticationUser()->assignRole($role);

        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));
=======
        $this->requireUser()->assignRole($role);

        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(true);
>>>>>>> laraxot/dev
    });

    it('can check multiple permissions', function () {
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts']);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts']);

<<<<<<< HEAD
        authenticationUser()->givePermissionTo([$permission1, $permission2]);

        Assert::assertTrue(authenticationUser()->hasAllPermissions(['edit posts', 'delete posts']));
        Assert::assertTrue(authenticationUser()->hasAnyPermission(['edit posts', 'publish posts']));
=======
        $this->requireUser()->givePermissionTo([$permission1, $permission2]);

        expect($this->requireUser()->hasAllPermissions(['edit posts', 'delete posts']))->toBe(true);
        expect($this->requireUser()->hasAnyPermission(['edit posts', 'publish posts']))->toBe(true);
>>>>>>> laraxot/dev
    });

    it('can remove roles and permissions', function () {
        $role = RoleFactory::new()->createOne(['name' => 'editor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts']);

<<<<<<< HEAD
        authenticationUser()->assignRole($role);
        authenticationUser()->givePermissionTo($permission);

        Assert::assertTrue(authenticationUser()->hasRole('editor'));
        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));

        authenticationUser()->removeRole($role);
        authenticationUser()->revokePermissionTo($permission);

        Assert::assertFalse(authenticationUser()->hasRole('editor'));
        Assert::assertFalse(authenticationUser()->hasPermissionTo('edit posts'));
=======
        $this->requireUser()->assignRole($role);
        $this->requireUser()->givePermissionTo($permission);

        expect($this->requireUser()->hasRole('editor'))->toBe(true);
        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(true);

        $this->requireUser()->removeRole($role);
        $this->requireUser()->revokePermissionTo($permission);

        expect($this->requireUser()->hasRole('editor'))->toBe(false);
        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(false);
>>>>>>> laraxot/dev
    });
});

describe('User OAuth Authentication', function () {
    it('can have oauth clients', function () {
<<<<<<< HEAD
        Assert::assertInstanceOf(MorphMany::class, authenticationUser()->clients());
    });

    it('can have oauth tokens', function () {
        Assert::assertInstanceOf(HasMany::class, authenticationUser()->tokens());
    });

    it('can find user for passport', function () {
        $user = User::findForPassport(authenticationUser()->email);

        Assert::assertNotNull($user);
        Assert::assertSame(authenticationUser()->id, $user->id);
    });

    it('can validate password for passport', function () {
        $isValid = authenticationUser()->validateForPassportPasswordGrant('password123');

        Assert::assertTrue($isValid);
=======
        expect($this->requireUser()->clients())->toBeInstanceOf(MorphMany::class);
    });

    it('can have oauth tokens', function () {
        expect($this->requireUser()->tokens())->toBeInstanceOf(HasMany::class);
    });

    it('can find user for passport', function () {
        $user = User::findForPassport($this->requireUser()->email);

        expect($user)->not->toBeNull();
        \assert($user instanceof User);
        expect($user->id)->toBe($this->requireUser()->id);
    });

    it('can validate password for passport', function () {
        $isValid = $this->requireUser()->validateForPassportPasswordGrant('password123');

        expect($isValid)->toBe(true);
>>>>>>> laraxot/dev
    });
});

describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
<<<<<<< HEAD
        Assert::assertInstanceOf(MorphMany::class, authenticationUser()->authentications());
    });

    it('can get latest authentication log', function () {
        Assert::assertInstanceOf(MorphOne::class, authenticationUser()->latestAuthentication());
=======
        expect($this->requireUser()->authentications())->toBeInstanceOf(MorphMany::class);
    });

    it('can get latest authentication log', function () {
        expect($this->requireUser()->latestAuthentication())
            ->toBeInstanceOf(MorphOne::class);
>>>>>>> laraxot/dev
    });
});

describe('User Session Management', function () {
    it('can store user in session', function () {
<<<<<<< HEAD
        Auth::login(authenticationUser());

        Assert::assertTrue(Auth::check());
        Assert::assertSame(authenticationUser()->id, Auth::id());
    });

    it('can remember user across sessions', function () {
        Auth::login(authenticationUser(), true);

        Assert::assertNotNull(freshAuthenticationUser()->remember_token);
    });

    it('can clear user session on logout', function () {
        Auth::login(authenticationUser());
        Assert::assertTrue(Auth::check());

        Auth::logout();
        Assert::assertFalse(Auth::check());
=======
        Auth::login($this->requireUser());

        expect(Auth::check())->toBe(true);
        expect(Auth::id())->toBe($this->requireUser()->id);
    });

    it('can remember user across sessions', function () {
        Auth::login($this->requireUser(), true);

        expect($this->requireFreshUser($this->requireUser())->remember_token)->not->toBeNull();
    });

    it('can clear user session on logout', function () {
        Auth::login($this->requireUser());
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
>>>>>>> laraxot/dev
    });
});

describe('User Two Factor Authentication', function () {
    it('can enable two factor authentication', function () {
<<<<<<< HEAD
        authenticationUser()->update(['is_otp' => true]);

        Assert::assertTrue(freshAuthenticationUser()->is_otp);
    });

    it('can disable two factor authentication', function () {
        authenticationUser()->update(['is_otp' => false]);

        Assert::assertFalse(freshAuthenticationUser()->is_otp);
=======
        $this->requireUser()->update(['is_otp' => true]);

        expect($this->requireFreshUser($this->requireUser())->is_otp)->toBe(true);
    });

    it('can disable two factor authentication', function () {
        $this->requireUser()->update(['is_otp' => false]);

        expect($this->requireFreshUser($this->requireUser())->is_otp)->toBe(false);
>>>>>>> laraxot/dev
    });

    it('handles otp authentication workflow', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);
<<<<<<< HEAD
=======
        \assert($user instanceof User);
>>>>>>> laraxot/dev

        // First step: password authentication
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Should handle OTP requirement
<<<<<<< HEAD
        Assert::assertTrue($user->is_otp);
=======
        expect($user->is_otp)->toBe(true);
>>>>>>> laraxot/dev
    });
});
