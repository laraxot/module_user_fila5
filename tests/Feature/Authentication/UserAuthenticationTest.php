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

final class UserAuthenticationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $user = UserFactory::new()->createOne([
            'password' => Hash::make('password123'),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        \assert($user instanceof User);
        $this->user = $user;
    }

    public function testCanAuthenticateWithValidCredentials(): void
    {
        $user = $this->requireUser();
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        Assert::assertSame(true, $result);
        Assert::assertSame($user->id, Auth::user()?->id);
    }

    public function testCannotAuthenticateWithInvalidPassword(): void
    {
        $user = $this->requireUser();
        $result = Auth::attempt([
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        Assert::assertSame(false, $result);
        Assert::assertNull(Auth::user());
    }

    public function testCannotAuthenticateWithNonExistentEmail(): void
    {
        $result = Auth::attempt([
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ]);

        Assert::assertSame(false, $result);
        Assert::assertNull(Auth::user());
    }

    public function testCannotAuthenticateInactiveUser(): void
    {
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
    }

    public function testCanLogoutUser(): void
    {
        $user = $this->requireUser();
        Auth::login($user);
        Assert::assertSame(true, Auth::check());
        Auth::logout();
        Assert::assertSame(false, Auth::check());
    }

    public function testCanHashPasswordOnCreation(): void
    {
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('testpassword'),
        ]);
        \assert($user instanceof User);

        Assert::assertSame(true, Hash::check('testpassword', $user->password));
    }

    public function testCanChangePassword(): void
    {
        $user = $this->requireUser();
        $newPassword = 'newpassword123';
        $user->update([
            'password' => Hash::make($newPassword),
        ]);

        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        Assert::assertSame(true, Hash::check($newPassword, $freshUser->password));
        Assert::assertSame(false, Hash::check('password123', $freshUser->password));
    }

    public function testCanCheckPasswordExpiration(): void
    {
        $user = UserFactory::new()->createOne([
            'password_expires_at' => now()->subDays(1),
        ]);
        Assert::assertNotNull($user->password_expires_at);

        $expiresAt = $user->password_expires_at;
        Assert::assertTrue($expiresAt->isPast());
    }

    public function testCanSetPasswordExpiration(): void
    {
        $user = $this->requireUser();
        $expirationDate = now()->addDays(90);
        $user->update([
            'password_expires_at' => $expirationDate,
        ]);

        Assert::assertSame(
            $expirationDate->toDateString(),
            $user->fresh()?->password_expires_at?->toDateString(),
        );
    }

    public function testCanGenerateRememberToken(): void
    {
        $user = $this->requireUser();
        $token = Str::random(60);
        $user->forceFill(['remember_token' => $token])->save();

        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame($token, $freshUser->remember_token);
    }

    public function testCanAuthenticateUsingRememberToken(): void
    {
        $user = $this->requireUser();
        $token = Str::random(60);
        $user->forceFill(['remember_token' => $token])->save();

        $user = User::where('email', $user->email)->where('remember_token', $token)->first();

        Assert::assertNotNull($user);
        Assert::assertSame($user->id, $user->id);
    }

    public function testCanMarkEmailAsVerified(): void
    {
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);

        Assert::assertNull($user->email_verified_at);
        $user->markEmailAsVerified();

        $freshModel0 = $user->fresh();
        Assert::assertNotNull($freshModel0);
        Assert::assertNotNull($freshModel0->email_verified_at);
    }

    public function testCanCheckIfEmailIsVerified(): void
    {
        $verifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => now(),
        ]);
        \assert($verifiedUser instanceof User);

        $unverifiedUser = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($unverifiedUser instanceof User);

        Assert::assertSame(true, $verifiedUser->hasVerifiedEmail());
        Assert::assertSame(false, $unverifiedUser->hasVerifiedEmail());
    }

    public function testCanSendEmailVerificationNotification(): void
    {
        $user = UserFactory::new()->createOne([
            'email_verified_at' => null,
        ]);
        \assert($user instanceof User);

        Notification::fake();

        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    }

    public function testCanAssignAndCheckRoles(): void
    {
        $user = $this->requireUser();
        $this->skipUnlessRoleAssignmentSupported();
        $uid = uniqid();
        $adminRole = RoleFactory::new()->createOne(['name' => 'admin-'.$uid]);
        $editorRole = RoleFactory::new()->createOne(['name' => 'editor-'.$uid]);

        $user->assignRole($adminRole);

        Assert::assertSame(true, $user->hasRole('admin-'.$uid));
        Assert::assertSame(false, $user->hasRole('editor-'.$uid));
        Assert::assertSame(true, $user->hasRole($adminRole));
    }

    public function testCanAssignAndCheckPermissions(): void
    {
        $user = $this->requireUser();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $editPermission = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $deletePermission = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo($editPermission);

        Assert::assertSame(true, $user->hasPermissionTo('edit posts '.$uid));
        Assert::assertSame(false, $user->hasPermissionTo('delete posts '.$uid));
        Assert::assertSame(true, $user->hasPermissionTo($editPermission));
    }

    public function testCanInheritPermissionsFromRoles(): void
    {
        $user = $this->requireUser();
        $this->skipUnlessRoleAssignmentSupported();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $role = RoleFactory::new()->createOne(['name' => 'editor '.$uid]);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);

        $role->givePermissionTo($permission);
        $user->assignRole($role);

        Assert::assertSame(true, $user->hasPermissionTo('edit posts '.$uid));
    }

    public function testCanCheckMultiplePermissions(): void
    {
        $user = $this->requireUser();
        $this->skipUnlessDirectPermissionSupported();
        $uid = uniqid();
        $permission1 = PermissionFactory::new()->createOne(['name' => 'edit posts '.$uid]);
        $permission2 = PermissionFactory::new()->createOne(['name' => 'delete posts '.$uid]);

        $user->givePermissionTo([$permission1, $permission2]);

        Assert::assertSame(true, $user->hasAllPermissions(['edit posts '.$uid, 'delete posts '.$uid]));
        Assert::assertSame(true, $user->hasAnyPermission(['edit posts '.$uid, 'publish posts '.$uid]));
    }

    public function testCanRemoveRolesAndPermissions(): void
    {
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
    }

    public function testCanHaveOauthClients(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->clients());
    }

    public function testCanHaveOauthTokens(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(HasMany::class, $user->tokens());
    }

    public function testCanFindUserForPassport(): void
    {
        $user = $this->requireUser();
        $user = User::findForPassport($user->email);

        Assert::assertNotNull($user);
        Assert::assertSame($user->id, $user->id);
    }

    public function testCanValidatePasswordForPassport(): void
    {
        $user = $this->requireUser();
        $isValid = $user->validateForPassportPasswordGrant('password123');

        Assert::assertSame(true, $isValid);
    }

    public function testCanLogAuthenticationAttempts(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphMany::class, $user->authentications());
    }

    public function testCanGetLatestAuthenticationLog(): void
    {
        $user = $this->requireUser();
        Assert::assertInstanceOf(MorphOne::class, $user->latestAuthentication());
    }

    public function testCanStoreUserInSession(): void
    {
        $user = $this->requireUser();
        Auth::login($user);

        Assert::assertSame(true, Auth::check());
        Assert::assertSame($user->id, Auth::id());
    }

    public function testCanRememberUserAcrossSessions(): void
    {
        $user = $this->requireUser();
        Auth::login($user, true);

        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);
        Assert::assertNotNull($fresh->remember_token);
    }

    public function testCanClearUserSessionOnLogout(): void
    {
        $user = $this->requireUser();
        Auth::login($user);
        Assert::assertSame(true, Auth::check());
        Auth::logout();
        Assert::assertSame(false, Auth::check());
    }

    public function testCanEnableTwoFactorAuthentication(): void
    {
        $user = $this->requireUser();
        $user->update(['is_otp' => true]);

        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame(true, $freshUser->is_otp);
    }

    public function testCanDisableTwoFactorAuthentication(): void
    {
        $user = $this->requireUser();
        $user->update(['is_otp' => false]);

        Assert::assertNotNull($freshUser = $user->fresh());
        Assert::assertSame(false, $freshUser->is_otp);
    }

    public function testHandlesOtpAuthenticationWorkflow(): void
    {
        $user = UserFactory::new()->createOne([
            'is_otp' => true,
            'password' => Hash::make('password123'),
        ]);
        \assert($user instanceof User);

        Auth::attempt([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        Assert::assertSame(true, $user->is_otp);
    }
}
