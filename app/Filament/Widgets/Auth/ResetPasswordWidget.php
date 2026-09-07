<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Schemas\Schema;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Component;
use Filament\Forms\Components\TextInput;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Override;

/**
 * Reset password widget for user password reset functionality.
 *
 * Handles password reset functionality with token validation,
 * proper security measures, and user feedback. Follows Laraxot
 * architectural patterns and security best practices.
 *
 * @property Schema $form Form container from XotBaseWidget
 */
class ResetPasswordWidget extends XotBaseWidget
{
    /**
     * The view for this widget.
     *
     * @var view-string
     */
    protected string $view = 'user::widgets.auth.reset-password-widget';

    /**
     * Get the form schema for password reset.
     *
     * Uses string keys for Filament form compatibility and follows
     * the pattern established in widget documentation.
     *
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->minLength(8)
                ->same('password_confirmation')
                ->autocomplete('new-password'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->autocomplete('new-password'),
        ];
    }

    /**
     * Mount the widget and initialize the form.
     */
=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ResetPasswordWidget — token + nuova password (click sul link email).
 *
 * Schema da `Schemas\UserForm::getResetPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class ResetPasswordWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::widgets.auth.reset-password-widget';

    /**
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getResetPasswordFormSchema';
    }

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Configure the form for this widget.
     */

    /**
     * Handle password reset with proper security and error handling.
     *
     * Implements Laravel's password reset functionality with explicit
     * type casting for security and proper error feedback.
     *
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     * @return RedirectResponse|void
     */
    public function resetPassword()
    {
        $data = $this->form->getState();

        $reset_data = Arr::only($data, ['email', 'password', 'password_confirmation', 'token']);
        $status = Password::reset($reset_data, function (Authenticatable $user, string $password): void {
<<<<<<< HEAD
<<<<<<< HEAD
            /** @var Model&Authenticatable $user */
=======
=======
>>>>>>> f589f9b2 (.)
            if (! $user instanceof Model) {
                return;
            }

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();
        });

<<<<<<< HEAD
<<<<<<< HEAD
        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', __($status));

            return redirect()->route('login');
        } else {
            /** @phpstan-ignore-next-line */
            $this->addError('email', __($status));
        }
=======
=======
>>>>>>> f589f9b2 (.)
        if (Password::PASSWORD_RESET === $status) {
            session()->flash('status', __($status));

            return redirect()->route('login');
        }
        $this->addError('email', __(is_string($status) ? $status : 'passwords.generic_error'));
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
