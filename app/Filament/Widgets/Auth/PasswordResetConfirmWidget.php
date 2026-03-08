<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
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
{
    public ?array $data = [];

    public ?string $token = null;

    public ?string $email = null;

    public string $currentState = 'form'; // form, success, error, expired

    public ?string $errorMessage = null;

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';

    /**
     * Mount the widget with token and optional email.
     */
    public function mount(?string $token = null, ?string $email = null): void
    {
        // @var mixed token = $token;
        // @var mixed email = $email;

        // Pre-fill the form if email is provided
        if (// @var mixed email
            // @var mixed form->fill(['email' => $this->email];
        }
    }

    /**
     * Get the form schema for password reset confirmation.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
                ->disabled('form' !== // @var mixed currentState
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-envelope'),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
                ->disabled('form' !== // @var mixed currentState
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password')
                ->disabled('form' !== // @var mixed currentState
                ->extraInputAttributes(['class' => 'text-center'])
                ->suffixIcon('heroicon-o-key'),
        ];
    }

    /**
     * Handle the password reset confirmation.
     */
    public function confirmPasswordReset(): void
    {
        if ('form' !== // @var mixed currentState
            return;
        }

        // @var mixed currentState = 'loading';

        try {
            $data = // @var mixed form->getState(;

            $response = Password::broker()->reset(
                [
                    'token' => // @var mixed token,
                    'email' => $data['email'],
                    'password' => $data['password'],
                ],
                static function (Authenticatable $user, string $password): void {
                    // Use setAttribute to set password safely
                    /* @var Model&Authenticatable $user */
                    // PHPStan: instanceof always true since UserContract extends Authenticatable
                    $user->setAttribute('password', Hash::make($password));
                    $user->setRememberToken(Str::random(60));
                    $user->save();

                    event(new PasswordReset($user));
                },
            );

            if (Password::PASSWORD_RESET === $response) {
                // @var mixed currentState = 'success';

                Notification::make()
                    ->title(__('user::auth.password_reset.success.title'))
                    ->body(__('user::auth.password_reset.success.message'))
                    ->success()
                    ->duration(8000)
                    ->send();

                // Auto-login the user after successful password reset
                // $user = \Modules\Xot\Datas\XotData::make()->getUserClass()::where('email', $data['email'])->first();
                Assert::string($email = $data['email'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
                /** @var UserContract $user */
                $user = XotData::make()->getUserByEmail($email);
                Assert::isInstanceOf($user, Authenticatable::class);
                Auth::guard()->login($user);

                // Redirect after a short delay to show success message
                // @var mixed js('setTimeout((; }, 3000);');
            } else {
                /* @phpstan-ignore argument.type */
                // @var mixed handleResetError($response;
            }
        } catch (\Exception $e) {
            // @var mixed handleResetError('passwords.generic_error';
        }
    }

    /**
     * Reset the widget to allow another attempt.
     */
    public function resetForm(): void
    {
        // @var mixed currentState = 'form';
        // @var mixed errorMessage = null;
        // @var mixed form->fill(['email' => $this->email ?? ''];
    }

    /**
     * Get the current state for the view.
     */
    public function getCurrentState(): string
    {
        return // @var mixed currentState;
    }

    /**
     * Get the error message if any.
     */
    public function getErrorMessage(): ?string
    {
        return // @var mixed errorMessage;
    }

    /**
     * Check if the form should be shown.
     */
    public function shouldShowForm(): bool
    {
        return \in_array(// @var mixed currentState, ['form', 'loading'], strict: true;
    }

    /**
     * Check if the widget is in loading state.
     */
    public function isLoading(): bool
    {
        return 'loading' === // @var mixed currentState;
    }

    /**
     * Check if the password reset was successful.
     */
    public function isSuccess(): bool
    {
        return 'success' === // @var mixed currentState;
    }

    /**
     * Check if there was an error.
     */
    public function hasError(): bool
    {
        return 'error' === // @var mixed currentState;
    }

    /**
     * Handle password reset errors.
     */
    protected function handleResetError(string $response): void
    {
        // @var mixed currentState = 'error';

        // Map Laravel password reset responses to user-friendly messages
        $errorMessages = [
            Password::INVALID_TOKEN => __('user::auth.password_reset.errors.invalid_token'),
            Password::INVALID_USER => __('user::auth.password_reset.errors.invalid_user'),
            'passwords.generic_error' => __('user::auth.password_reset.errors.generic'),
        ];

        // @var mixed errorMessage = $errorMessages[$response] ?? trans($response;

        Notification::make()
            ->title(__('user::auth.password_reset.errors.title'))
            ->body(// @var mixed errorMessage
            ->danger()
            ->duration(10000)
            ->send();
    }
}
