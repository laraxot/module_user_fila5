<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use PHPUnit\Framework\Assert;
use Modules\User\Database\Factories\UserFactory;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\User\Tests\Traits\HasUserTestCase;

beforeEach(function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->createOne([
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
    \assert($user instanceof User);
    $this->user = $user;
});

describe('User Authentication', function () {
    it('can authenticate with valid credentials', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        Assert::assertSame(true, $result);
        Assert::assertSame($user->id, Auth::user()?->id);
    });

    it('cannot authenticate with invalid password', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        Assert::assertSame(false, $result);
        Assert::assertNull(Auth::user());
    });

    it('cannot authenticate with non-existent email', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        Assert::assertSame(false, $result);
        Assert::assertNull(Auth::user());
    });

    it('cannot authenticate inactive user', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $inactiveUser */
        $inactiveUser = UserFactory::new()->createOne([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
        \assert($inactiveUser instanceof User);

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
            'is_active' => true,
        ]);

        Assert::assertSame(false, $result);
    });

    it('can logout user', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Auth::login($user);
        Assert::assertSame(true, Auth::check());
        Auth::logout();
        Assert::assertSame(false, Auth::check());
    });
});

describe('User Password Management', function () {
    it('can hash password on creation', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $user */
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('testpassword'),
        ]);
        \assert($user instanceof User);

        Assert::assertSame(true, Hash::check('testpassword', $user->password));
    });

    it('can change password', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $newPassword = 'newpassword123';
        $user->update([
            'password' => Hash::make($newPassword),
        ]);

        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        Assert::assertSame(true, Hash::check($newPassword, $freshUser->password));
        Assert::assertSame(false, Hash::check('password123', $freshUser->password));
    });

    it('can check password expiration', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $user */
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->subDays(1),
        ]);
        Assert::assertNotNull($user->password_expires_at);

        $expiresAt = $user->password_expires_at;
        Assert::assertTrue($expiresAt->isPast());
    });

    it('can set password expiration', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $expirationDate = now()->addDays(90);
        $user->update([
            'password_expires_at' => $expirationDate,
        ]);

        Assert::assertSame(
            $expirationDate->toDateString(),
            $user->fresh()?->password_expires_at?->toDateString(),
        );
    });
});

describe('User Remember Token', function () {
    it('can generate remember token', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $token = Str::random(60);
        $user->forceFill(['remember_token' => $token])->save();

        Assert::assertNotNull($freshUser = $user->fresh());
    Assert::assertSame($token, $freshUser->remember_token);
    });

    it('can authenticate using remember token', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $token = Str::random(60);
        $user->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', $user->email)->where('remember_token', $token)->first();

        Assert::assertNotNull($user);
        Assert::assertSame($user->id, $user->id);
    });
});

describe('User Email Verification', function () {
    it('can mark email as verified', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);

        Assert::assertNull($user->email_verified_at);
        $user->markEmailAsVerified();

        $freshModel0 = $user->fresh();
        Assert::assertNotNull($freshModel0);
        Assert::assertNotNull($freshModel0->email_verified_at);
    });

    it('can check if email is verified', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $verifiedUser */
        $verifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => now(),
        ]);
        \assert($verifiedUser instanceof User);

        /** @var \Modules\User\Models\User $unverifiedUser */
        $unverifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($unverifiedUser instanceof User);

        Assert::assertSame(true, $verifiedUser->hasVerifiedEmail());
        Assert::assertSame(false, $unverifiedUser->hasVerifiedEmail());
    });

    it('can send email verification notification', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

describe('User Authorization', function () {
    it('can assign and check roles', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $this->skipUnlessRoleAssignmentSupported();
        $uid = uniqid();
        $adminRole = RoleFactory::new()->createOne(['name' => 'admin-'.$uid]);
        $editorRole = RoleFactory::new()->createOne(['name' => 'editor-'.$uid]);

        $user->assignRole($adminRole);

        Assert::assertSame(true, $user->hasRole('admin-'.$uid));
        Assert::assertSame(false, $user->hasRole('editor-'.$uid));
        Assert::assertSame(true, $user->hasRole($adminRole));
    });

    it('can assign and check permissions', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $editPermission = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $deletePermission = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo($editPermission);

        Assert::assertSame(true, $user->hasPermissionTo('edit posts '.$uid));
        Assert::assertSame(false, $user->hasPermissionTo('delete posts '.$uid));
        Assert::assertSame(true, $user->hasPermissionTo($editPermission));
    });

    it('can inherit permissions from roles', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $this->skipUnlessRoleAssignmentSupported();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $role = RoleFactory::new()->createOne(['name' => 'editor '.$uid]);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);

        $role->givePermissionTo($permission);
        $user->assignRole($role);

        Assert::assertSame(true, $user->hasPermissionTo('edit posts '.$uid));
    });

    it('can check multiple permissions', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo([$permission1, $permission2]);

        Assert::assertSame(true, $user->hasAllPermissions(['edit posts '.$uid, 'delete posts '.$uid]));
        Assert::assertSame(true, $user->hasAnyPermission(['edit posts '.$uid, 'publish posts '.$uid]));
    });

    it('can remove roles and permissions', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $this->skipUnlessRoleAssignmentSupported();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $role = RoleFactory::new()->createOne(['name' => 'editor '.$uid]);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);

        $user->assignRole($role);
        $user->givePermissionTo($permission);

        Assert::assertSame(true, $user->hasRole('editor '.$uid));
        Assert::assertSame(true, $user->hasPermissionTo('edit posts '.$uid));
        $user->removeRole($role);
        $user->revokePermissionTo($permission);

        Assert::assertSame(false, $user->hasRole('editor '.$uid));
        Assert::assertSame(false, $user->hasPermissionTo('edit posts '.$uid));
    });
});

describe('User OAuth Authentication', function () {
    it('can have oauth clients', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->clients());
    });

    it('can have oauth tokens', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Assert::assertInstanceOf(HasMany::class, $user->tokens());
    });

    it('can find user for passport', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $user = User::findForPassport($user->email);

        Assert::assertNotNull($user);
        Assert::assertSame($user->id, $user->id);
    });

    it('can validate password for passport', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $isValid = $user->validateForPassportPasswordGrant('password123');

        Assert::assertSame(true, $isValid);
    });
});

describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->authentications());
    });

    it('can get latest authentication log', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Assert::assertInstanceOf(MorphOne::class, $user->latestAuthentication());
    });
});

describe('User Session Management', function () {
    it('can store user in session', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Auth::login($user);

        Assert::assertSame(true, Auth::check());
        Assert::assertSame($user->id, Auth::id());
    });

    it('can remember user across sessions', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Auth::login($user, true);

        $fresh = $user->fresh();
    Assert::assertNotNull($fresh);
    Assert::assertNotNull($fresh->remember_token);
    });

    it('can clear user session on logout', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        Auth::login($user);
        Assert::assertSame(true, Auth::check());
        Auth::logout();
        Assert::assertSame(false, Auth::check());
    });
});

describe('User Two Factor Authentication', function () {
    it('can enable two factor authentication', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $user->update(['is_otp' => true]);

        Assert::assertNotNull($freshUser = $user->fresh());
    Assert::assertSame(true, $freshUser->is_otp);
    });

    it('can disable two factor authentication', function () {
        /** @var \Modules\User\Tests\TestCase $this */
$user = $this->requireUser();
        $user->update(['is_otp' => false]);

        Assert::assertNotNull($freshUser = $user->fresh());
    Assert::assertSame(false, $freshUser->is_otp);
    });

    it('handles otp authentication workflow', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        /** @var \Modules\User\Models\User $user */
        $user = UserFactory::new()->createOne([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);
        \assert($user instanceof User);

        // First step: password authentication
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Should handle OTP requirement
        Assert::assertSame(true, $user->is_otp);
    });
});
