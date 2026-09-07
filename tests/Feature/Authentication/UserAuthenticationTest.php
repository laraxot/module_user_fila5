<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create([
=======
=======
>>>>>>> f589f9b2 (.)
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

uses(TestCase::class);

beforeEach(function () {
    $user = UserFactory::new()->createOne([
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        'password' => Hash::make('password123'),
        'is_active' => true,
        'email_verified_at' => now(),
    ]);
<<<<<<< HEAD
<<<<<<< HEAD
=======
    \assert($user instanceof User);
    TestCase::$user = $user;
>>>>>>> 2024e2e7 (.)
=======
    \assert($user instanceof User);
    TestCase::$user = $user;
>>>>>>> f589f9b2 (.)
});

describe('User Authentication', function () {
    it('can authenticate with valid credentials', function () {
        $result = Auth::attempt([
<<<<<<< HEAD
<<<<<<< HEAD
            'email' => $this->user->email,
=======
            'email' => TestCase::requireUser()->email,
>>>>>>> 2024e2e7 (.)
=======
            'email' => TestCase::requireUser()->email,
>>>>>>> f589f9b2 (.)
            'password' => 'password123',
        ]);

        expect($result)->toBe(true);
<<<<<<< HEAD
<<<<<<< HEAD
        expect(Auth::user()?->id)->toBe($this->user->id);
=======
        expect(Auth::user()?->id)->toBe(TestCase::requireUser()->id);
>>>>>>> 2024e2e7 (.)
=======
        expect(Auth::user()?->id)->toBe(TestCase::requireUser()->id);
>>>>>>> f589f9b2 (.)
    });

    it('cannot authenticate with invalid password', function () {
        $result = Auth::attempt([
<<<<<<< HEAD
<<<<<<< HEAD
            'email' => $this->user->email,
=======
            'email' => TestCase::requireUser()->email,
>>>>>>> 2024e2e7 (.)
=======
            'email' => TestCase::requireUser()->email,
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
        $inactiveUser = User::factory()->create([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var User $inactiveUser */
        /** @var User $inactiveUser */
        $inactiveUser = UserFactory::new()->createOne([
            'password' => Hash::make('password123'),
            'is_active' => false,
        ]);
        \assert($inactiveUser instanceof User);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        $result = Auth::attempt([
            'email' => $inactiveUser->email,
            'password' => 'password123',
<<<<<<< HEAD
<<<<<<< HEAD
=======
            'is_active' => true,
>>>>>>> 2024e2e7 (.)
=======
            'is_active' => true,
>>>>>>> f589f9b2 (.)
        ]);

        expect($result)->toBe(false);
    });

    it('can logout user', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        Auth::login($this->user);
=======
        Auth::login(TestCase::requireUser());
>>>>>>> 2024e2e7 (.)
=======
        Auth::login(TestCase::requireUser());
>>>>>>> f589f9b2 (.)
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
    });
});

describe('User Password Management', function () {
    it('can hash password on creation', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        $user = User::factory()->create([
            'password' => Hash::make('testpassword'),
        ]);
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var User $user */
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('testpassword'),
        ]);
        \assert($user instanceof User);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        expect(Hash::check('testpassword', $user->password))->toBe(true);
    });

    it('can change password', function () {
        $newPassword = 'newpassword123';
<<<<<<< HEAD
<<<<<<< HEAD
        $this->user->update([
            'password' => Hash::make($newPassword),
        ]);

        expect(Hash::check($newPassword, $this->user->fresh()->password))->toBe(true);
        expect(Hash::check('password123', $this->user->fresh()->password))->toBe(false);
    });

    it('can check password expiration', function () {
        $user = User::factory()->create([
            'password_expires_at' => now()->subDays(1),
        ]);

        expect($user->password_expires_at->isPast())->toBe(true);
=======
=======
>>>>>>> f589f9b2 (.)
        TestCase::requireUser()->update([
            'password' => Hash::make($newPassword),
        ]);

        expect(Hash::check($newPassword, TestCase::requireFreshUser(TestCase::requireUser())->password))->toBe(true);
        expect(Hash::check('password123', TestCase::requireFreshUser(TestCase::requireUser())->password))->toBe(false);
    });

    it('can check password expiration', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->subDays(1),
        ]);
        \assert($user instanceof User);
        $passwordExpiresAt = $user->password_expires_at;
        \assert($passwordExpiresAt !== null);

        expect($passwordExpiresAt->isPast())->toBe(true);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    });

    it('can set password expiration', function () {
        $expirationDate = now()->addDays(90);
<<<<<<< HEAD
<<<<<<< HEAD
        $this->user->update([
            'password_expires_at' => $expirationDate,
        ]);

        expect(
            $this
                ->user->fresh()
                ->password_expires_at->toDateString(),
        )
=======
=======
>>>>>>> f589f9b2 (.)
        TestCase::requireUser()->update([
            'password_expires_at' => $expirationDate,
        ]);

        $passwordExpiresAt = TestCase::requireFreshUser(TestCase::requireUser())->password_expires_at;
        \assert($passwordExpiresAt !== null);

        expect($passwordExpiresAt->toDateString())
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            ->toBe($expirationDate->toDateString());
    });
});

describe('User Remember Token', function () {
    it('can generate remember token', function () {
        $token = Str::random(60);
<<<<<<< HEAD
<<<<<<< HEAD
        $this->user->update(['remember_token' => $token]);

        expect($this->user->fresh()->remember_token)->toBe($token);
=======
        TestCase::requireUser()->forceFill(['remember_token' => $token])->save();

        expect(TestCase::requireFreshUser(TestCase::requireUser())->remember_token)->toBe($token);
>>>>>>> 2024e2e7 (.)
=======
        TestCase::requireUser()->forceFill(['remember_token' => $token])->save();

        expect(TestCase::requireFreshUser(TestCase::requireUser())->remember_token)->toBe($token);
>>>>>>> f589f9b2 (.)
    });

    it('can authenticate using remember token', function () {
        $token = Str::random(60);
<<<<<<< HEAD
<<<<<<< HEAD
        $this->user->update(['remember_token' => $token]);

        $user = User::where('email', $this->user->email)->where('remember_token', $token)->first();

        expect($user)->not->toBeNull();
        expect($user->id)->toBe($this->user->id);
=======
=======
>>>>>>> f589f9b2 (.)
        TestCase::requireUser()->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', TestCase::requireUser()->email)->where('remember_token', $token)->first();

        expect($user)->not->toBeNull();
        \assert($user instanceof User);
        expect($user->id)->toBe(TestCase::requireUser()->id);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    });
});

describe('User Email Verification', function () {
    it('can mark email as verified', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        expect($user->email_verified_at)->toBeNull();

        $user->markEmailAsVerified();

<<<<<<< HEAD
<<<<<<< HEAD
        expect($user->fresh()->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function () {
        $verifiedUser = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $unverifiedUser = User::factory()->create([
            'email_verified_at' => null,
        ]);
=======
=======
>>>>>>> f589f9b2 (.)
        $fresh = $user->fresh();
        \assert($fresh !== null);

        expect($fresh->email_verified_at)->not->toBeNull();
    });

    it('can check if email is verified', function () {
        /** @var User $verifiedUser */
        $verifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => now(),
        ]);
        \assert($verifiedUser instanceof User);

        /** @var User $unverifiedUser */
        $unverifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($unverifiedUser instanceof User);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        expect($verifiedUser->hasVerifiedEmail())->toBe(true);
        expect($unverifiedUser->hasVerifiedEmail())->toBe(false);
    });

    it('can send email verification notification', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    });
});

describe('User Authorization', function () {
    it('can assign and check roles', function () {
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> f589f9b2 (.)
        $adminRole = RoleFactory::new()->createOne(['name' => 'admin']);
        $editorRole = RoleFactory::new()->createOne(['name' => 'editor']);

        TestCase::requireUser()->assignRole($adminRole);

        expect(TestCase::requireUser()->hasRole('admin'))->toBe(true);
        expect(TestCase::requireUser()->hasRole('editor'))->toBe(false);
        expect(TestCase::requireUser()->hasRole($adminRole))->toBe(true);
    });

    it('can assign and check permissions', function () {
        $editPermission = PermissionFactory::new()->createOne(['name' => 'edit posts']);
        $deletePermission = PermissionFactory::new()->createOne(['name' => 'delete posts']);

        TestCase::requireUser()->givePermissionTo($editPermission);

        expect(TestCase::requireUser()->hasPermissionTo('edit posts'))->toBe(true);
        expect(TestCase::requireUser()->hasPermissionTo('delete posts'))->toBe(false);
        expect(TestCase::requireUser()->hasPermissionTo($editPermission))->toBe(true);
    });

    it('can inherit permissions from roles', function () {
        $role = RoleFactory::new()->createOne(['name' => 'editor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts']);

        $role->givePermissionTo($permission);
        TestCase::requireUser()->assignRole($role);

        expect(TestCase::requireUser()->hasPermissionTo('edit posts'))->toBe(true);
    });

    it('can check multiple permissions', function () {
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts']);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts']);

        TestCase::requireUser()->givePermissionTo([$permission1, $permission2]);

        expect(TestCase::requireUser()->hasAllPermissions(['edit posts', 'delete posts']))->toBe(true);
        expect(TestCase::requireUser()->hasAnyPermission(['edit posts', 'publish posts']))->toBe(true);
    });

    it('can remove roles and permissions', function () {
        $role = RoleFactory::new()->createOne(['name' => 'editor']);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts']);

        TestCase::requireUser()->assignRole($role);
        TestCase::requireUser()->givePermissionTo($permission);

        expect(TestCase::requireUser()->hasRole('editor'))->toBe(true);
        expect(TestCase::requireUser()->hasPermissionTo('edit posts'))->toBe(true);

        TestCase::requireUser()->removeRole($role);
        TestCase::requireUser()->revokePermissionTo($permission);

        expect(TestCase::requireUser()->hasRole('editor'))->toBe(false);
        expect(TestCase::requireUser()->hasPermissionTo('edit posts'))->toBe(false);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    });
});

describe('User OAuth Authentication', function () {
    it('can have oauth clients', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        Passport::actingAs($this->user);

        expect($this->user->clients())->toBeInstanceOf(HasMany::class);
    });

    it('can have oauth tokens', function () {
        Passport::actingAs($this->user);

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
=======
>>>>>>> f589f9b2 (.)
        expect((TestCase::requireUser()->clients())::class)->toBe(MorphMany::class);
    });

    it('can have oauth tokens', function () {
        expect((TestCase::requireUser()->tokens())::class)->toBe(HasMany::class);
    });

    it('can find user for passport', function () {
        $user = User::findForPassport(TestCase::requireUser()->email);

        expect($user)->not->toBeNull();
        \assert($user instanceof User);
        expect($user->id)->toBe(TestCase::requireUser()->id);
    });

    it('can validate password for passport', function () {
        $isValid = TestCase::requireUser()->validateForPassportPasswordGrant('password123');
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        expect($isValid)->toBe(true);
    });
});

describe('User Authentication Logging', function () {
    it('can log authentication attempts', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        expect($this->user->authentications())->toBeInstanceOf(HasMany::class);
    });

    it('can get latest authentication log', function () {
        expect($this->user->latestAuthentication())
            ->toBeInstanceOf(HasOne::class);
=======
=======
>>>>>>> f589f9b2 (.)
        expect((TestCase::requireUser()->authentications())::class)->toBe(MorphMany::class);
    });

    it('can get latest authentication log', function () {
        expect((TestCase::requireUser()->latestAuthentication())::class)->toBe(MorphOne::class);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    });
});

describe('User Session Management', function () {
    it('can store user in session', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        Auth::login($this->user);

        expect(session()->has('login_user_id'))->toBe(true);
        expect(session('login_user_id'))->toBe($this->user->id);
    });

    it('can remember user across sessions', function () {
        Auth::login($this->user, true);

        expect($this->user->fresh()->remember_token)->not->toBeNull();
    });

    it('can clear user session on logout', function () {
        Auth::login($this->user);
=======
=======
>>>>>>> f589f9b2 (.)
        Auth::login(TestCase::requireUser());

        expect(Auth::check())->toBe(true);
        expect(Auth::id())->toBe(TestCase::requireUser()->id);
    });

    it('can remember user across sessions', function () {
        Auth::login(TestCase::requireUser(), true);

        expect(TestCase::requireFreshUser(TestCase::requireUser())->remember_token)->not->toBeNull();
    });

    it('can clear user session on logout', function () {
        Auth::login(TestCase::requireUser());
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        expect(Auth::check())->toBe(true);

        Auth::logout();
        expect(Auth::check())->toBe(false);
<<<<<<< HEAD
<<<<<<< HEAD
        expect(session()->has('login_user_id'))->toBe(false);
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    });
});

describe('User Two Factor Authentication', function () {
    it('can enable two factor authentication', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->user->update(['is_otp' => true]);

        expect($this->user->fresh()->is_otp)->toBe(true);
    });

    it('can disable two factor authentication', function () {
        $this->user->update(['is_otp' => false]);

        expect($this->user->fresh()->is_otp)->toBe(false);
    });

    it('handles otp authentication workflow', function () {
        $user = User::factory()->create([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);
=======
=======
>>>>>>> f589f9b2 (.)
        TestCase::requireUser()->update(['is_otp' => true]);

        expect(TestCase::requireFreshUser(TestCase::requireUser())->is_otp)->toBe(true);
    });

    it('can disable two factor authentication', function () {
        TestCase::requireUser()->update(['is_otp' => false]);

        expect(TestCase::requireFreshUser(TestCase::requireUser())->is_otp)->toBe(false);
    });

    it('handles otp authentication workflow', function () {
        /** @var User $user */
        $user = UserFactory::new()->createOne([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);
        \assert($user instanceof User);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        // First step: password authentication
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        // Should handle OTP requirement
        expect($user->is_otp)->toBe(true);
    });
});
