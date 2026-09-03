<?php

declare(strict_types=1);

namespace Modules\User\View\Pages;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Modules\User\Models\BaseUser;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use RuntimeException;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

final class ProfileEditVoltComponent extends Component
{
    /**
     * Current user's first name.
     */
    #[Validate('required|string|max:100')]
    public string $first_name = '';

    /**
     * Current user's last name.
     */
    #[Validate('required|string|max:100')]
    public string $last_name = '';

    /**
     * Current user's email address.
     */
    #[Validate('required|email|max:255')]
    public string $email = '';

    /**
     * User ID (locked to prevent tampering).
     */
    #[Locked]
    public string $user_id = '';

    /**
     * Current password for verification.
     */
    #[Validate('required|current_password')]
    public string $current_password = '';

    /**
     * New password for password updates.
     */
    #[Validate('required|min:8|confirmed')]
    public string $password = '';

    /**
     * Password confirmation.
     */
    public string $password_confirmation = '';

    /**
     * Password for account deletion confirmation.
     */
    #[Validate('required|current_password')]
    public string $delete_password = '';

    /**
     * Mount the component and initialize user data with type safety.
     */
    public function mount(): void
    {
        try {
            $user = Auth::user();
            if (! $user instanceof BaseUser) {
                throw new RuntimeException('User must be authenticated and an instance of BaseUser model');
            }

            $this->first_name = (string) ($user->first_name ?? '');
            $this->last_name = (string) ($user->last_name ?? '');
            $this->email = (string) ($user->email ?? '');
            $this->user_id = (string) ($user->id ?? '');

            Assert::stringNotEmpty($this->first_name, 'User first name cannot be empty');
            Assert::stringNotEmpty($this->last_name, 'User last name cannot be empty');
            Assert::stringNotEmpty($this->email, 'User email cannot be empty');
            Assert::stringNotEmpty($this->user_id, 'User ID cannot be empty');
            Assert::true(false !== filter_var($this->email, FILTER_VALIDATE_EMAIL), 'User email must be valid');
        } catch (InvalidArgumentException) {
            redirect()->route('login')->with('error', 'Invalid user session. Please log in again.');
        } catch (\Exception) {
            redirect()->route('dashboard')->with('error', 'Unable to load profile data.');
        }
    }

    /**
     * Update user profile information with comprehensive validation and error handling.
     *
     * @throws ValidationException
     */
    public function updateProfile(): void
    {
        try {
            /** @var array{first_name: string, last_name: string, email: string} $validated */
            $validated = $this->validate([
                'first_name' => ['required', 'string', 'max:100'],
                'last_name' => ['required', 'string', 'max:100'],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($this->user_id),
                ],
            ]);

            $user = Auth::user();
            if (! $user instanceof BaseUser) {
                throw new RuntimeException('User must be authenticated and an instance of BaseUser model for profile update');
            }
            Assert::same($this->user_id, SafeStringCastAction::cast($user->id), 'User ID mismatch detected');

            $emailChanged = $user->email !== $validated['email'];

            if ($emailChanged) {
                // $user::where(), non User::where(): il modello di autenticazione reale e'
                // configurato in config/auth.php e puo' essere una sottoclasse concreta
                // diversa da Modules\User\Models\User (qui Modules\Quaeris\Models\User);
                // $user:: usa late static binding sull'istanza narrowed sopra.
                Assert::false(
                    $user::where('email', $validated['email'])->where('id', '!=', $this->user_id)->exists(),
                    'Email is already in use by another user',
                );
            }

            $user->fill([
                'first_name' => trim($validated['first_name']),
                'last_name' => trim($validated['last_name']),
                'email' => strtolower(trim($validated['email'])),
            ]);

            if ($emailChanged && $user->hasVerifiedEmail()) {
                $user->email_verified_at = null;
            }

            $success = $user->save();
            Assert::true($success, 'Failed to save user profile');

            activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties([
                    'changes' => $user->getChanges(),
                    'email_changed' => $emailChanged,
                    'ip_address' => request()->ip(),
                ])
                ->log('User profile updated');

            $this->reset('current_password');

            $message = $emailChanged
                ? 'Profile updated successfully. Please verify your new email address.'
                : 'Profile updated successfully.';

            session()->flash('status', $message);

            if ($emailChanged && null === $user->email_verified_at) {
                $user->sendEmailVerificationNotification();
            }
        } catch (ValidationException $e) {
            throw $e;
        } catch (InvalidArgumentException $e) {
            session()->flash('error', 'Profile update failed: '.$e->getMessage());
        } catch (\Exception) {
            session()->flash('error', 'An unexpected error occurred while updating your profile.');
        }
    }

    /**
     * Update user password with comprehensive security validation.
     */
    public function updatePassword(): void
    {
        try {
            $this->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'min:8', 'confirmed'],
                'password_confirmation' => ['required'],
            ]);

            $user = Auth::user();
            if (! $user instanceof BaseUser) {
                throw new RuntimeException('User must be authenticated and an instance of BaseUser model for password update');
            }
            Assert::same($this->user_id, (string) $user->id, 'User ID mismatch detected');

            Assert::stringNotEmpty($this->current_password, 'Current password cannot be empty');
            Assert::stringNotEmpty($this->password, 'New password cannot be empty');
            Assert::stringNotEmpty($this->password_confirmation, 'Password confirmation cannot be empty');
            Assert::same($this->password, $this->password_confirmation, 'Password confirmation does not match');
            Assert::greaterThanEq(strlen($this->password), 8, 'Password must be at least 8 characters long');

            $hashedPassword = $user->password;
            if (null === $hashedPassword) {
                throw new RuntimeException('Stored password hash is missing');
            }
            Assert::true(Hash::check($this->current_password, $hashedPassword), 'Current password is incorrect');
            Assert::false(
                Hash::check($this->password, $hashedPassword),
                'New password must be different from current password',
            );

            $user->update([
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(60),
            ]);

            event(new PasswordReset($user));

            activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties([
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ])
                ->log('User password updated');

            $this->reset(['current_password', 'password', 'password_confirmation']);

            session()->flash(
                'status',
                'Password updated successfully. You have been logged out of other devices for security.',
            );
        } catch (ValidationException $e) {
            throw $e;
        } catch (InvalidArgumentException $e) {
            $this->reset(['current_password', 'password', 'password_confirmation']);
            session()->flash('error', 'Password update failed: '.$e->getMessage());
        } catch (\Exception) {
            $this->reset(['current_password', 'password', 'password_confirmation']);
            session()->flash('error', 'An unexpected error occurred while updating your password.');
        }
    }

    /**
     * Delete user account with comprehensive security validation and cleanup.
     */
    public function deleteAccount(): RedirectResponse
    {
        try {
            $this->validate([
                'delete_password' => ['required', 'current_password'],
            ]);

            $user = Auth::user();
            if (! $user instanceof BaseUser) {
                throw new RuntimeException('User must be authenticated and an instance of BaseUser model for account deletion');
            }
            Assert::same($this->user_id, SafeStringCastAction::cast($user->id), 'User ID mismatch detected');

            Assert::stringNotEmpty($this->delete_password, 'Password cannot be empty for account deletion');
            $hashedPassword = $user->password;
            if (null === $hashedPassword) {
                throw new RuntimeException('Stored password hash is missing');
            }
            Assert::true(
                Hash::check($this->delete_password, $hashedPassword),
                'Password is incorrect for account deletion',
            );

            $createdAt = $user->created_at;

            $userData = [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'created_at' => $createdAt instanceof \DateTimeInterface
                    ? $createdAt->format('Y-m-d H:i:s')
                    : null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'deletion_timestamp' => now()->toDateTimeString(),
            ];

            activity()
                ->causedBy($user)
                ->withProperties($userData)
                ->log('User account deletion initiated');

            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            $deleted = $user->delete();
            Assert::true($deleted, 'Failed to delete user account');

            return Redirect::to('/')->with('status', 'Your account has been deleted successfully.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (InvalidArgumentException $e) {
            $this->reset('delete_password');
            session()->flash('error', 'Account deletion failed: '.$e->getMessage());

            return Redirect::back();
        } catch (\Exception) {
            $this->reset('delete_password');
            session()->flash('error', 'An unexpected error occurred while deleting your account.');

            return Redirect::back();
        }
    }

    /**
     * Clear all password fields for security.
     */
    public function clearPasswords(): void
    {
        $this->reset(['current_password', 'password', 'password_confirmation', 'delete_password']);
    }
}
