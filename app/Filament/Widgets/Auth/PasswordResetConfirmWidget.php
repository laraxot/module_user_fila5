<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
=======
=======
>>>>>>> 87273113 (.)
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
>>>>>>> laraxot/dev
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

/**
 * PasswordResetConfirmWidget — conferma reset con token via URL.
 *
 * Schema da `Schemas\UserForm::getPasswordResetConfirmFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseSchemaWidget
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Override;
use Webmozart\Assert\Assert;

/**
 * Password Reset Confirmation Widget .
 *
 * Handles the password reset confirmation flow using a token
 * from the password reset email link.
 *
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseWidget
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

/**
 * PasswordResetConfirmWidget — conferma reset con token via URL.
 *
 * Schema da `Schemas\UserForm::getPasswordResetConfirmFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseSchemaWidget
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
{
    public ?array $data = [];

    public ?string $token = null;

    public ?string $email = null;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public string $currentState = 'form';
=======
    public string $currentState = 'form'; // form, success, error, expired
>>>>>>> f548be94 (.)
=======
    public string $currentState = 'form'; // form, success, error, expired
=======
    public string $currentState = 'form';
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    public string $currentState = 'form';
>>>>>>> laraxot/dev

    public ?string $errorMessage = null;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getPasswordResetConfirmFormSchema';
    }

    public function mount(?string $token = null, ?string $email = null): void
    {
        parent::mount();
        $this->token = $token;
        $this->email = $email;

<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';

    /**
     * Mount the widget with token and optional email.
     */
    public function mount(?string $token = null, ?string $email = null): void
    {
        $this->token = $token;
        $this->email = $email;

        // Pre-fill the form if email is provided
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getPasswordResetConfirmFormSchema';
    }

    public function mount(?string $token = null, ?string $email = null): void
    {
        parent::mount();
        $this->token = $token;
        $this->email = $email;

>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        if ($this->email) {
            $this->form->fill(['email' => $this->email]);
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function confirmPasswordReset(): void
    {
        if ('form' !== $this->currentState) {
=======
=======
>>>>>>> 87273113 (.)
    /**
     * Get the form schema for password reset confirmation.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
                ->disabled($this->currentState !== 'form')
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-envelope'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
                ->disabled($this->currentState !== 'form')
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password')
                ->disabled($this->currentState !== 'form')
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
        ];
    }

    /**
     * Handle the password reset confirmation.
     */
    public function confirmPasswordReset(): void
    {
        if ($this->currentState !== 'form') {
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
    public function confirmPasswordReset(): void
    {
        if ('form' !== $this->currentState) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    public function confirmPasswordReset(): void
    {
        if ('form' !== $this->currentState) {
>>>>>>> laraxot/dev
            return;
        }

        $this->currentState = 'loading';

        try {
            $data = $this->form->getState();

            $response = Password::broker()->reset(
                [
                    'token' => $this->token,
                    'email' => $data['email'],
                    'password' => $data['password'],
                ],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                static function (Authenticatable $user, string $password): void {
                    /* @var Model&Authenticatable $user */
=======
                function (Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /** @var Model&Authenticatable $user */
>>>>>>> f548be94 (.)
=======
                function (Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /** @var Model&Authenticatable $user */
=======
                static function (Authenticatable $user, string $password): void {
                    /* @var Model&Authenticatable $user */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
                static function (Authenticatable $user, string $password): void {
                    /* @var Model&Authenticatable $user */
>>>>>>> laraxot/dev
                    $user->setAttribute('password', Hash::make($password));
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
                },
            );

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            if (Password::PASSWORD_RESET === $response) {
=======
            if ($response === Password::PASSWORD_RESET) {
>>>>>>> f548be94 (.)
=======
            if ($response === Password::PASSWORD_RESET) {
=======
            if (Password::PASSWORD_RESET === $response) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
            if (Password::PASSWORD_RESET === $response) {
>>>>>>> laraxot/dev
                $this->currentState = 'success';

                Notification::make()
                    ->title(__('user::auth.password_reset.success.title'))
                    ->body(__('user::auth.password_reset.success.message'))
                    ->success()
                    ->duration(8000)
                    ->send();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                /** @var UserContract $user */
                $user = XotData::make()->getUserByEmail($email);
                Assert::isInstanceOf($user, Authenticatable::class);
                Auth::guard()->login($user);

                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
            } else {
                $this->handleResetError(is_string($response) ? $response : 'passwords.generic_error');
            }
        } catch (\Exception $e) {
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
                // Auto-login the user after successful password reset
                // $user = \Modules\Xot\Datas\XotData::make()->getUserClass()::where('email', $data['email'])->first();
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(__CLASS__));
                $user = XotData::make()->getUserByEmail($email);
                // if ($user) {
                Auth::guard()->login($user);
                // }

                // Redirect after a short delay to show success message
                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
            } else {
                /* @phpstan-ignore argument.type */
                $this->handleResetError($response);
            }
        } catch (Exception $e) {
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                /** @var UserContract $user */
                $user = XotData::make()->getUserByEmail($email);
                Assert::isInstanceOf($user, Authenticatable::class);
                Auth::guard()->login($user);

                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
            } else {
                $this->handleResetError(is_string($response) ? $response : 'passwords.generic_error');
            }
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
            $this->handleResetError('passwords.generic_error');
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    public function resetForm(): void
    {
        $this->currentState = 'form';
        $this->errorMessage = null;
        $this->form->fill(['email' => $this->email ?? '']);
    }

    public function getCurrentState(): string
    {
        return $this->currentState;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function shouldShowForm(): bool
    {
        return \in_array($this->currentState, ['form', 'loading'], strict: true);
    }

    public function isLoading(): bool
    {
        return 'loading' === $this->currentState;
    }

    public function isSuccess(): bool
    {
        return 'success' === $this->currentState;
    }

    public function hasError(): bool
    {
        return 'error' === $this->currentState;
    }

<<<<<<< HEAD
=======
    /**
     * Handle password reset errors.
     */
>>>>>>> f548be94 (.)
=======
    /**
     * Handle password reset errors.
     */
=======
    public function resetForm(): void
    {
        $this->currentState = 'form';
        $this->errorMessage = null;
        $this->form->fill(['email' => $this->email ?? '']);
    }

    public function getCurrentState(): string
    {
        return $this->currentState;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function shouldShowForm(): bool
    {
        return \in_array($this->currentState, ['form', 'loading'], strict: true);
    }

    public function isLoading(): bool
    {
        return 'loading' === $this->currentState;
    }

    public function isSuccess(): bool
    {
        return 'success' === $this->currentState;
    }

    public function hasError(): bool
    {
        return 'error' === $this->currentState;
    }

>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    protected function handleResetError(string $response): void
    {
        $this->currentState = 'error';

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        // Map Laravel password reset responses to user-friendly messages
>>>>>>> f548be94 (.)
=======
        // Map Laravel password reset responses to user-friendly messages
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        $errorMessages = [
            Password::INVALID_TOKEN => __('user::auth.password_reset.errors.invalid_token'),
            Password::INVALID_USER => __('user::auth.password_reset.errors.invalid_user'),
            'passwords.generic_error' => __('user::auth.password_reset.errors.generic'),
        ];

        $this->errorMessage = $errorMessages[$response] ?? trans($response);

        Notification::make()
            ->title(__('user::auth.password_reset.errors.title'))
            ->body($this->errorMessage)
            ->danger()
            ->duration(10000)
            ->send();
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)

    /**
     * Reset the widget to allow another attempt.
     */
    public function resetForm(): void
    {
        $this->currentState = 'form';
        $this->errorMessage = null;
        $this->form->fill(['email' => $this->email ?? '']);
    }

    /**
     * Get the current state for the view.
     */
    public function getCurrentState(): string
    {
        return $this->currentState;
    }

    /**
     * Get the error message if any.
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * Check if the form should be shown.
     */
    public function shouldShowForm(): bool
    {
        return in_array($this->currentState, ['form', 'loading'], strict: true);
    }

    /**
     * Check if the widget is in loading state.
     */
    public function isLoading(): bool
    {
        return $this->currentState === 'loading';
    }

    /**
     * Check if the password reset was successful.
     */
    public function isSuccess(): bool
    {
        return $this->currentState === 'success';
    }

    /**
     * Check if there was an error.
     */
    public function hasError(): bool
    {
        return $this->currentState === 'error';
    }
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
