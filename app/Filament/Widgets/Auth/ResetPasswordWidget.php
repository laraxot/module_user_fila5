<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ResetPassword FO — schema SSoT in `Resources\UserResource\Schemas\UserForm::getResetPasswordFormSchema()`.
 *
 * `Password::reset()` riceve password in chiaro da `getState()`; hash nel callback broker.
 */
class ResetPasswordWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::widgets.auth.reset-password-widget';

    public ?string $token = null;

    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getResetPasswordFormSchema';
    }

    public function mount(?string $token = null, ?string $email = null): void
    {
        $this->token = $token;

        $fill = [];
        if (null !== $email && '' !== $email) {
            $fill['email'] = $email;
        }

        $this->form->fill($fill);
    }

    /**
     * @return RedirectResponse|void
     */
    public function resetPassword()
    {
        $data = $this->form->getState();

        $status = Password::reset(
            [
                'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
                'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
                'password_confirmation' => is_string($data['password_confirmation'] ?? null) ? $data['password_confirmation'] : '',
                'token' => $this->token ?? '',
            ],
            function (Authenticatable $user, string $password): void {
                /** @var Model&Authenticatable $user */
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            },
        );

        if (Password::PASSWORD_RESET === $status) {
            session()->flash('status', __($status));

            return redirect()->route('login');
        }
        /* @phpstan-ignore-next-line */
        $this->addError('data.email', __($status));
    }
}
