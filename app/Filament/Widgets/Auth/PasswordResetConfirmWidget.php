<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Notifications\Notification;
<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
>>>>>>> 350420cb (Check & fix styling)
use Filament\Schemas\Schema;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
=======
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * PasswordResetConfirmWidget — conferma reset con token via URL.
 *
 * Schema da `Schemas\UserForm::getPasswordResetConfirmFormSchema()` — SSoT.
=======
 * PasswordResetConfirm FO — schema SSoT in `Resources\UserResource\Schemas\UserForm::getPasswordResetConfirmFormSchema()`.
>>>>>>> 350420cb (Check & fix styling)
 *
 * @property Schema $form
 */
class PasswordResetConfirmWidget extends XotBaseSchemaWidget
{
<<<<<<< HEAD
    public ?array $data = [];

=======
>>>>>>> 350420cb (Check & fix styling)
    public ?string $token = null;

    public ?string $email = null;

<<<<<<< HEAD
    public string $currentState = 'form';
=======
    public string $currentState = 'form'; // form, success, error, expired
>>>>>>> 350420cb (Check & fix styling)

    public ?string $errorMessage = null;

    /**
<<<<<<< HEAD
     * @return class-string<UserForm>
     */
=======
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';

>>>>>>> 350420cb (Check & fix styling)
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getPasswordResetConfirmFormSchema';
    }

<<<<<<< HEAD
    public function mount(?string $token = null, ?string $email = null): void
    {
        parent::mount();
        $this->token = $token;
        $this->email = $email;

        if ($this->email) {
            $this->form->fill(['email' => $this->email]);
        }
    }

=======
    /**
     * Mount the widget with token and optional email.
     */
    public function mount(?string $token = null, ?string $email = null): void
    {
        $this->token = $token;
        $this->email = $email;

        $fill = [];
        if (null !== $email && '' !== $email) {
            $fill['email'] = $email;
        }

        $this->form->fill($fill);
    }

    public function form(Schema $schema): Schema
    {
        /** @var array<int|string, Component> $components */
        $components = self::resourceFormSchema(UserForm::class, 'getPasswordResetConfirmFormSchema');

        $disabled = fn (): bool => 'form' !== $this->currentState;
        foreach ($components as $key => $component) {
            $components[$key] = $component->disabled($disabled);
        }

        return $schema->components($components)->statePath('data');
    }

    /**
     * Handle the password reset confirmation.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function confirmPasswordReset(): void
    {
        if ($this->currentState !== 'form') {
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
                static function (Authenticatable $user, string $password): void {
<<<<<<< HEAD
                    /* @var Model&Authenticatable $user */
=======
                    // Use setAttribute to set password safely
                    /* @var Model&Authenticatable $user */
                    // PHPStan: instanceof always true since UserContract extends Authenticatable
>>>>>>> 350420cb (Check & fix styling)
                    $user->setAttribute('password', Hash::make($password));
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
                },
            );

            if ($response === Password::PASSWORD_RESET) {
                $this->currentState = 'success';

                Notification::make()
                    ->title(__('user::auth.password_reset.success.title'))
                    ->body(__('user::auth.password_reset.success.message'))
                    ->success()
                    ->duration(8000)
                    ->send();

<<<<<<< HEAD
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                $user = XotData::make()->getUserByEmail($email);
                Assert::isInstanceOf($user, UserContract::class);
                Auth::guard()->login($user);

                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
            } else {
                $this->handleResetError(is_string($response) ? $response : 'passwords.generic_error');
=======
                // Auto-login the user after successful password reset
                // $user = \Modules\Xot\Datas\XotData::make()->getUserClass()::where('email', $data['email'])->first();
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                /** @var UserContract $user */
                $user = XotData::make()->getUserByEmail($email);
                Assert::isInstanceOf($user, Authenticatable::class);
                Auth::guard()->login($user);

                // Redirect after a short delay to show success message
                $this->js('setTimeout(() => { window.location.href = "'.route('login').'"; }, 3000);');
            } else {
                /* @phpstan-ignore argument.type */
                $this->handleResetError($response);
>>>>>>> 350420cb (Check & fix styling)
            }
        } catch (\Exception $e) {
            $this->handleResetError('passwords.generic_error');
        }
    }

<<<<<<< HEAD
=======
    /**
     * Reset the widget to allow another attempt.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function resetForm(): void
    {
        $this->currentState = 'form';
        $this->errorMessage = null;
        $this->form->fill(['email' => $this->email ?? '']);
    }

<<<<<<< HEAD
=======
    /**
     * Get the current state for the view.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function getCurrentState(): string
    {
        return $this->currentState;
    }

<<<<<<< HEAD
=======
    /**
     * Get the error message if any.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

<<<<<<< HEAD
=======
    /**
     * Check if the form should be shown.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function shouldShowForm(): bool
    {
        return \in_array($this->currentState, ['form', 'loading'], strict: true);
    }

<<<<<<< HEAD
=======
    /**
     * Check if the widget is in loading state.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function isLoading(): bool
    {
        return $this->currentState === 'loading';
    }

<<<<<<< HEAD
=======
    /**
     * Check if the password reset was successful.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function isSuccess(): bool
    {
        return $this->currentState === 'success';
    }

<<<<<<< HEAD
=======
    /**
     * Check if there was an error.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function hasError(): bool
    {
        return $this->currentState === 'error';
    }

<<<<<<< HEAD
=======
    /**
     * Handle password reset errors.
     */
>>>>>>> 350420cb (Check & fix styling)
    protected function handleResetError(string $response): void
    {
        $this->currentState = 'error';

<<<<<<< HEAD
=======
        // Map Laravel password reset responses to user-friendly messages
>>>>>>> 350420cb (Check & fix styling)
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
}
