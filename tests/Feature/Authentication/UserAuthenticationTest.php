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
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< .merge_file_ADVsj4
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_34NCBY
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

<<<<<<< .merge_file_ADVsj4
=======
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
beforeEach(function () {
    $user = UserFactory::new()->createOne([
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
    authenticationUser($user);
});

describe('User Authentication', function () {
    it('can authenticate with valid credentials', function () {
        $result = Auth::attempt([
<<<<<<< .merge_file_ADVsj4
            'email' => authenticationUser()->email,
            'password' => 'password123',
        ]);

        Assert::assertTrue($result);
        Assert::assertSame(authenticationUser()->id, Auth::user()?->id);
=======
<<<<<<< HEAD
            'email' => $this->requireUser()->email,
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
        expect(Auth::user()?->id)->toBe($this->requireUser()->id);
=======
            'email' => authenticationUser()->email,
            'password' => 'password123',
        ]);

        Assert::assertTrue($result);
        Assert::assertSame(authenticationUser()->id, Auth::user()?->id);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('cannot authenticate with invalid password', function () {
        $result = Auth::attempt([
<<<<<<< .merge_file_ADVsj4
            'email' => authenticationUser()->email,
            'password' => 'wrongpassword',
        ]);

        Assert::assertFalse($result);
        Assert::assertNull(Auth::user());
=======
<<<<<<< HEAD
            'email' => $this->requireUser()->email,
            'password' => 'wrongpassword',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
=======
            'email' => authenticationUser()->email,
            'password' => 'wrongpassword',
        ]);

        Assert::assertFalse($result);
        Assert::assertNull(Auth::user());
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('cannot authenticate with non-existent email', function () {
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

<<<<<<< .merge_file_ADVsj4
        Assert::assertFalse($result);
        Assert::assertNull(Auth::user());
=======
<<<<<<< HEAD
        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
=======
        Assert::assertFalse($result);
        Assert::assertNull(Auth::user());
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('cannot authenticate inactive user', function () {
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = UserFactory::new()->createOne([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
            'is_active' => true,
        ]);

<<<<<<< .merge_file_ADVsj4
        Assert::assertFalse($result);
=======
<<<<<<< HEAD
        expect($result)->toBe(false);
>>>>>>> .merge_file_34NCBY
    });

    it('can logout user', function () {
        Auth::login(authenticationUser());
        Assert::assertTrue(Auth::check());

        Auth::logout();
<<<<<<< .merge_file_ADVsj4
        Assert::assertFalse(Auth::check());
=======
        expect(Auth::check())->toBe(false);
=======
        Assert::assertFalse($result);
    });

    it('can logout user', function () {
        Auth::login(authenticationUser());
        Assert::assertTrue(Auth::check());

        Auth::logout();
        Assert::assertFalse(Auth::check());
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });
});

describe('User Password Management', function () {
    it('can hash password on creation', function () {
        /** @var User $user */
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('testpassword'),
        ]);

<<<<<<< .merge_file_ADVsj4
        Assert::assertTrue(Hash::check('testpassword', $user->password));
=======
<<<<<<< HEAD
        expect(Hash::check('testpassword', $user->password))->toBe(true);
=======
        Assert::assertTrue(Hash::check('testpassword', $user->password));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can change password', function () {
        $newPassword = 'newpassword123';
<<<<<<< .merge_file_ADVsj4
        authenticationUser()->update([
            'password' => Hash::make($newPassword),
        ]);

        Assert::assertTrue(Hash::check($newPassword, freshAuthenticationUser()->password));
        Assert::assertFalse(Hash::check('password123', freshAuthenticationUser()->password));
=======
<<<<<<< HEAD
        $this->requireUser()->update([
            'password' => Hash::make($newPassword),
        ]);

        expect(Hash::check($newPassword, $this->requireFreshUser($this->requireUser())->password))->toBe(true);
        expect(Hash::check('password123', $this->requireFreshUser($this->requireUser())->password))->toBe(false);
=======
        authenticationUser()->update([
            'password' => Hash::make($newPassword),
        ]);

        Assert::assertTrue(Hash::check($newPassword, freshAuthenticationUser()->password));
        Assert::assertFalse(Hash::check('password123', freshAuthenticationUser()->password));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can check password expiration', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->subDays(1),
        ]);
<<<<<<< .merge_file_ADVsj4
=======
<<<<<<< HEAD
        \assert($user instanceof User);
>>>>>>> .merge_file_34NCBY
        $passwordExpiresAt = $user->password_expires_at;
        Assert::assertNotNull($passwordExpiresAt);

<<<<<<< .merge_file_ADVsj4
        Assert::assertTrue($passwordExpiresAt->isPast());
=======
        expect($passwordExpiresAt->isPast())->toBe(true);
=======
        $passwordExpiresAt = $user->password_expires_at;
        Assert::assertNotNull($passwordExpiresAt);

        Assert::assertTrue($passwordExpiresAt->isPast());
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can set password expiration', function () {
        $expirationDate = now()->addDays(90);
<<<<<<< .merge_file_ADVsj4
        authenticationUser()->update([
=======
<<<<<<< HEAD
        $this->requireUser()->update([
>>>>>>> .merge_file_34NCBY
            'password_expires_at' => $expirationDate,
        ]);

        $passwordExpiresAt = freshAuthenticationUser()->password_expires_at;
        Assert::assertNotNull($passwordExpiresAt);

        Assert::assertSame($expirationDate->toDateString(), $passwordExpiresAt->toDateString());
    });
});

describe('User Remember Token', function () {
    it('can generate remember token', function () {
        $token = Str::random(60);
        authenticationUser()->forceFill(['remember_token' => $token])->save();

        Assert::assertSame($token, freshAuthenticationUser()->remember_token);
    });

    it('can authenticate using remember token', function () {
        $token = Str::random(60);
        authenticationUser()->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', authenticationUser()->email)->where('remember_token', $token)->first();

<<<<<<< .merge_file_ADVsj4
        Assert::assertNotNull($user);
        Assert::assertSame(authenticationUser()->id, $user->id);
=======
        expect($user)->not->toBeNull();
        \assert($user instanceof User);
        expect($user->id)->toBe($this->requireUser()->id);
=======
        authenticationUser()->update([
            'password_expires_at' => $expirationDate,
        ]);

        $passwordExpiresAt = freshAuthenticationUser()->password_expires_at;
        Assert::assertNotNull($passwordExpiresAt);

        Assert::assertSame($expirationDate->toDateString(), $passwordExpiresAt->toDateString());
    });
});

describe('User Remember Token', function () {
    it('can generate remember token', function () {
        $token = Str::random(60);
        authenticationUser()->forceFill(['remember_token' => $token])->save();

        Assert::assertSame($token, freshAuthenticationUser()->remember_token);
    });

    it('can authenticate using remember token', function () {
        $token = Str::random(60);
        authenticationUser()->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', authenticationUser()->email)->where('remember_token', $token)->first();

        Assert::assertNotNull($user);
        Assert::assertSame(authenticationUser()->id, $user->id);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });
});

describe('User Email Verification', function () {
    it('can mark email as verified', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);

<<<<<<< .merge_file_ADVsj4
        Assert::assertNull($user->email_verified_at);
=======
<<<<<<< HEAD
        expect($user->email_verified_at)->toBeNull();
=======
        Assert::assertNull($user->email_verified_at);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY

        $user->markEmailAsVerified();

        $fresh = $user->fresh();
<<<<<<< .merge_file_ADVsj4
        Assert::assertNotNull($fresh);

        Assert::assertNotNull($fresh->email_verified_at);
=======
<<<<<<< HEAD
        \assert(null !== $fresh);

        expect($fresh->email_verified_at)->not->toBeNull();
=======
        Assert::assertNotNull($fresh);

        Assert::assertNotNull($fresh->email_verified_at);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can check if email is verified', function () {
        /** @var User $verifiedUser */
        $verifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => now(),
        ]);

        /** @var User $unverifiedUser */
        $unverifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);

<<<<<<< .merge_file_ADVsj4
        Assert::assertTrue($verifiedUser->hasVerifiedEmail());
        Assert::assertFalse($unverifiedUser->hasVerifiedEmail());
=======
<<<<<<< HEAD
        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
=======
        Assert::assertTrue($verifiedUser->hasVerifiedEmail());
        Assert::assertFalse($unverifiedUser->hasVerifiedEmail());
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can send email verification notification', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

describe('User Authorization', function () {
    it('can assign and check roles', function () {
        $adminRole = RoleFactory::new()->createOne(['name' => 'admin']);
        $editorRole = RoleFactory::new()->createOne(['name' => 'editor']);

<<<<<<< .merge_file_ADVsj4
        authenticationUser()->assignRole($adminRole);

        Assert::assertTrue(authenticationUser()->hasRole('admin'));
        Assert::assertFalse(authenticationUser()->hasRole('editor'));
        Assert::assertTrue(authenticationUser()->hasRole($adminRole));
=======
<<<<<<< HEAD
        $this->requireUser()->assignRole($adminRole);

        expect($this->requireUser()->hasRole('admin'))->toBe(true);
        expect($this->requireUser()->hasRole('editor'))->toBe(false);
        expect($this->requireUser()->hasRole($adminRole))->toBe(true);
=======
        authenticationUser()->assignRole($adminRole);

        Assert::assertTrue(authenticationUser()->hasRole('admin'));
        Assert::assertFalse(authenticationUser()->hasRole('editor'));
        Assert::assertTrue(authenticationUser()->hasRole($adminRole));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can assign and check permissions', function () {
        $editPermission = PermissionFactory::new()->createOne(['name' => 'edit posts']);
        $deletePermission = PermissionFactory::new()->createOne(['name' => 'delete posts']);

<<<<<<< .merge_file_ADVsj4
        authenticationUser()->givePermissionTo($editPermission);

        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));
        Assert::assertFalse(authenticationUser()->hasPermissionTo('delete posts'));
        Assert::assertTrue(authenticationUser()->hasPermissionTo($editPermission));
=======
<<<<<<< HEAD
        $this->requireUser()->givePermissionTo($editPermission);

        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(true);
        expect($this->requireUser()->hasPermissionTo('delete posts'))->toBe(false);
        expect($this->requireUser()->hasPermissionTo($editPermission))->toBe(true);
=======
        authenticationUser()->givePermissionTo($editPermission);

        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));
        Assert::assertFalse(authenticationUser()->hasPermissionTo('delete posts'));
        Assert::assertTrue(authenticationUser()->hasPermissionTo($editPermission));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can inherit permissions from roles', function () {
        $role = RoleFactory::new()->createOne(['name' => 'editor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts']);

        $role->givePermissionTo($permission);
<<<<<<< .merge_file_ADVsj4
        authenticationUser()->assignRole($role);

        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));
=======
<<<<<<< HEAD
        $this->requireUser()->assignRole($role);

        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(true);
=======
        authenticationUser()->assignRole($role);

        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can check multiple permissions', function () {
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts']);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts']);

<<<<<<< .merge_file_ADVsj4
        authenticationUser()->givePermissionTo([$permission1, $permission2]);

        Assert::assertTrue(authenticationUser()->hasAllPermissions(['edit posts', 'delete posts']));
        Assert::assertTrue(authenticationUser()->hasAnyPermission(['edit posts', 'publish posts']));
=======
<<<<<<< HEAD
        $this->requireUser()->givePermissionTo([$permission1, $permission2]);

        expect($this->requireUser()->hasAllPermissions(['edit posts', 'delete posts']))->toBe(true);
        expect($this->requireUser()->hasAnyPermission(['edit posts', 'publish posts']))->toBe(true);
=======
        authenticationUser()->givePermissionTo([$permission1, $permission2]);

        Assert::assertTrue(authenticationUser()->hasAllPermissions(['edit posts', 'delete posts']));
        Assert::assertTrue(authenticationUser()->hasAnyPermission(['edit posts', 'publish posts']));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('can remove roles and permissions', function () {
        $role = RoleFactory::new()->createOne(['name' => 'editor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts']);

<<<<<<< .merge_file_ADVsj4
        authenticationUser()->assignRole($role);
        authenticationUser()->givePermissionTo($permission);
=======
<<<<<<< HEAD
        $this->requireUser()->assignRole($role);
        $this->requireUser()->givePermissionTo($permission);
>>>>>>> .merge_file_34NCBY

        Assert::assertTrue(authenticationUser()->hasRole('editor'));
        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));

        authenticationUser()->removeRole($role);
        authenticationUser()->revokePermissionTo($permission);

<<<<<<< .merge_file_ADVsj4
        Assert::assertFalse(authenticationUser()->hasRole('editor'));
        Assert::assertFalse(authenticationUser()->hasPermissionTo('edit posts'));
=======
        expect($this->requireUser()->hasRole('editor'))->toBe(false);
        expect($this->requireUser()->hasPermissionTo('edit posts'))->toBe(false);
=======
        authenticationUser()->assignRole($role);
        authenticationUser()->givePermissionTo($permission);

        Assert::assertTrue(authenticationUser()->hasRole('editor'));
        Assert::assertTrue(authenticationUser()->hasPermissionTo('edit posts'));

        authenticationUser()->removeRole($role);
        authenticationUser()->revokePermissionTo($permission);

        Assert::assertFalse(authenticationUser()->hasRole('editor'));
        Assert::assertFalse(authenticationUser()->hasPermissionTo('edit posts'));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });
});

describe('User OAuth Authentication', function () {
    it('can have oauth clients', function () {
<<<<<<< .merge_file_ADVsj4
        Assert::assertInstanceOf(MorphMany::class, authenticationUser()->clients());
=======
<<<<<<< HEAD
        expect($this->requireUser()->clients())->toBeInstanceOf(MorphMany::class);
>>>>>>> .merge_file_34NCBY
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
    });
});

describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
        Assert::assertInstanceOf(MorphMany::class, authenticationUser()->authentications());
    });

    it('can get latest authentication log', function () {
        Assert::assertInstanceOf(MorphOne::class, authenticationUser()->latestAuthentication());
    });
});

describe('User Session Management', function () {
    it('can store user in session', function () {
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
<<<<<<< .merge_file_ADVsj4
        Assert::assertFalse(Auth::check());
=======
        expect(Auth::check())->toBe(false);
=======
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
    });
});

describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
        Assert::assertInstanceOf(MorphMany::class, authenticationUser()->authentications());
    });

    it('can get latest authentication log', function () {
        Assert::assertInstanceOf(MorphOne::class, authenticationUser()->latestAuthentication());
    });
});

describe('User Session Management', function () {
    it('can store user in session', function () {
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
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });
});

describe('User Two Factor Authentication', function () {
    it('can enable two factor authentication', function () {
<<<<<<< .merge_file_ADVsj4
        authenticationUser()->update(['is_otp' => true]);
=======
<<<<<<< HEAD
        $this->requireUser()->update(['is_otp' => true]);
>>>>>>> .merge_file_34NCBY

        Assert::assertTrue(freshAuthenticationUser()->is_otp);
    });

    it('can disable two factor authentication', function () {
        authenticationUser()->update(['is_otp' => false]);

<<<<<<< .merge_file_ADVsj4
        Assert::assertFalse(freshAuthenticationUser()->is_otp);
=======
        expect($this->requireFreshUser($this->requireUser())->is_otp)->toBe(false);
=======
        authenticationUser()->update(['is_otp' => true]);

        Assert::assertTrue(freshAuthenticationUser()->is_otp);
    });

    it('can disable two factor authentication', function () {
        authenticationUser()->update(['is_otp' => false]);

        Assert::assertFalse(freshAuthenticationUser()->is_otp);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });

    it('handles otp authentication workflow', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);

        // First step: password authentication
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Should handle OTP requirement
<<<<<<< .merge_file_ADVsj4
        Assert::assertTrue($user->is_otp);
=======
<<<<<<< HEAD
        expect($user->is_otp)->toBe(true);
=======
        Assert::assertTrue($user->is_otp);
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_34NCBY
    });
});
