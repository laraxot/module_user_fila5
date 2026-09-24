<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ResetPasswordWidget — token + nuova password (click sul link email).
 *
 * Schema da `Schemas\UserForm::getResetPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
=======
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
>>>>>>> 350420cb (Check & fix styling)
 */
class ResetPasswordWidget extends XotBaseSchemaWidget
{
    /** @var view-string */
    protected string $view;

<<<<<<< HEAD
    /**
     * @return class-string<UserForm>
     */
=======
    public ?string $token = null;

>>>>>>> 350420cb (Check & fix styling)
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getResetPasswordFormSchema';
    }

<<<<<<< HEAD
    public function mount(): void
    {
        $this->form->fill();
=======
    public function mount(?string $token = null, ?string $email = null): void
    {
        $this->token = $token;

        $fill = [];
        if (null !== $email && '' !== $email) {
            $fill['email'] = $email;
        }

        $this->form->fill($fill);
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * @return RedirectResponse|void
     */
    public function resetPassword()
    {
        $data = $this->form->getState();

<<<<<<< HEAD
        $reset_data = Arr::only($data, ['email', 'password', 'password_confirmation', 'token']);
        $status = Password::reset($reset_data, function (Authenticatable $user, string $password): void {
            if (! $user instanceof Model) {
                return;
            }

            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();
        });
=======
        $status = Password::reset(
            [
                'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
                'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
                'password_confirmation' => is_string($data['password_confirmation'] ?? null) ? $data['password_confirmation'] : '',
                'token' => $this->token ?? '',
            ],
            function (Authenticatable $user, string $password): void {
                /* @var Model&Authenticatable $user */
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            },
        );
>>>>>>> 350420cb (Check & fix styling)

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', __($status));

            return redirect()->route('login');
        }
<<<<<<< HEAD
        $this->addError('email', __(is_string($status) ? $status : 'passwords.generic_error'));
=======
        /* @phpstan-ignore-next-line */
        $this->addError('data.email', __($status));
>>>>>>> 350420cb (Check & fix styling)
    }
}
