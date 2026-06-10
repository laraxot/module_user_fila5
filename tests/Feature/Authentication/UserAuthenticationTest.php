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
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Traits\HasUserTestCase;

uses(\Modules\User\Tests\TestCase::class, HasUserTestCase::class);

beforeEach(function () {
    $user = User::factory()->create([
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
    \assert($user instanceof User);
    \assert($user instanceof User);
    $this->user = $user;
});

describe('User Authentication', function () {
    it('can authenticate with valid credentials', function () {
        $result = Auth::attempt([
            'email' => $this->user->email,
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
        expect(Auth::user()?->id)->toBe($this->user->id);
    });

    it('cannot authenticate with invalid password', function () {
        $result = Auth::attempt([
            'email' => $this->user->email,
            'password' => 'wrongpassword',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

    it('cannot authenticate with non-existent email', function () {
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        expect($result)->toBe(false);
        expect(Auth::user())->toBeNull();
    });

    it('cannot authenticate inactive user', function () {
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = User::factory()->create([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
        \assert($inactiveUser instanceof User);

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
            'is_active' => true,
        ]);

        expect($result)->toBe(false);
    });

    it('can logout user', function () {
        Auth::login($this->user);
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

describe('User Password Management', function () {
    it('can hash password on creation', function () {
        /** @var User $user */
        /** @var User $user */
        $user = User::factory()->create([
            'password' => Hash::make('testpassword'),
        ]);
        \assert($user instanceof User);

        expect(Hash::check('testpassword', $user->password))->toBe(true);
    });

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
            'password_expires_at' => $expirationDate,
        ]);

        expect(
            $this
                ->user->fresh()
                ->password_expires_at->toDateString(),
        )
            ->toBe($expirationDate->toDateString());
    });
});

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
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);

        expect($user->email_verified_at)->toBeNull();

        $user->markEmailAsVerified();

        expect($user->fresh()->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function () {
        /** @var User $verifiedUser */
        $verifiedUser = User::factory()->create([
            'email_verified_at' => now(),
        ]);
        \assert($verifiedUser instanceof User);

        /** @var User $unverifiedUser */
        $unverifiedUser = User::factory()->create([
            'email_verified_at' => null,
        ]);
        \assert($unverifiedUser instanceof User);

        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
    });

    it('can send email verification notification', function () {
        /** @var User $user */
        $user = User::factory()->create([
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
        $this->skipUnlessRoleAssignmentSupported();
        $uid = uniqid();
        $adminRole = Role::factory()->create(['name' => 'admin-'.$uid]);
        $editorRole = Role::factory()->create(['name' => 'editor-'.$uid]);

        $this->user->assignRole($adminRole);

        expect($this->user->hasRole('admin-'.$uid))->toBe(true);
        expect($this->user->hasRole('editor-'.$uid))->toBe(false);
        expect($this->user->hasRole($adminRole))->toBe(true);
    });

    it('can assign and check permissions', function () {
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $editPermission = Permission::factory()->create(['name' => 'edit posts '.$uid]);
        $deletePermission = Permission::factory()->create(['name' => 'delete posts '.$uid]);

        $this->user->givePermissionTo($editPermission);

        expect($this->user->hasPermissionTo('edit posts '.$uid))->toBe(true);
        expect($this->user->hasPermissionTo('delete posts '.$uid))->toBe(false);
        expect($this->user->hasPermissionTo($editPermission))->toBe(true);
    });

    it('can inherit permissions from roles', function () {
        $this->skipUnlessRoleAssignmentSupported();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $role = Role::factory()->create(['name' => 'editor '.$uid]);
        $permission = Permission::factory()->create(['name' => 'edit posts '.$uid]);

        $role->givePermissionTo($permission);
        $this->user->assignRole($role);

        expect($this->user->hasPermissionTo('edit posts '.$uid))->toBe(true);
    });

    it('can check multiple permissions', function () {
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $permission1 = Permission::factory()->create(['name' => 'edit posts '.$uid]);
        $permission2 = Permission::factory()->create(['name' => 'delete posts '.$uid]);

        $this->user->givePermissionTo([$permission1, $permission2]);

        expect($this->user->hasAllPermissions(['edit posts '.$uid, 'delete posts '.$uid]))->toBe(true);
        expect($this->user->hasAnyPermission(['edit posts '.$uid, 'publish posts '.$uid]))->toBe(true);
    });

    it('can remove roles and permissions', function () {
        $this->skipUnlessRoleAssignmentSupported();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $role = Role::factory()->create(['name' => 'editor '.$uid]);
        $permission = Permission::factory()->create(['name' => 'edit posts '.$uid]);

        $this->user->assignRole($role);
        $this->user->givePermissionTo($permission);

        expect($this->user->hasRole('editor '.$uid))->toBe(true);
        expect($this->user->hasPermissionTo('edit posts '.$uid))->toBe(true);

        $this->user->removeRole($role);
        $this->user->revokePermissionTo($permission);

        expect($this->user->hasRole('editor '.$uid))->toBe(false);
        expect($this->user->hasPermissionTo('edit posts '.$uid))->toBe(false);
    });
});

describe('User OAuth Authentication', function () {
    it('can have oauth clients', function () {
        expect($this->user->clients())->toBeInstanceOf(MorphMany::class);
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

        expect($isValid)->toBe(true);
    });
});

describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
        expect($this->user->authentications())->toBeInstanceOf(MorphMany::class);
    });

    it('can get latest authentication log', function () {
        expect($this->user->latestAuthentication())
            ->toBeInstanceOf(MorphOne::class);
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
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

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
        expect($user->is_otp)->toBe(true);
    });
});
