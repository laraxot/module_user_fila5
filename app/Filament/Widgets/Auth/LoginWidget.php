<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
=======
use Filament\Notifications\Notification;
>>>>>>> laraxot/dev
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
>>>>>>> laraxot/dev

/**
 * LoginWidget: widget login con form Filament e "vestito" demandato al template tema.
 *
 * Religione Schema!=Widget: schema da `UserForm::getLoginFormSchema()` (SSoT).
 * Submit: `$this->form->getState()` — no `validateForm()`.
 * il widget resta "thin": solo orchestrazione submit + Auth::attempt.
 *
 * MAI: ->label(), ->placeholder(), ->helperText() — traduzioni automatiche
 * da LangServiceProvider tramite `user::login_widget` (lang/it/login_widget.php).
 *
 * @property Schema $form
 */
<<<<<<< HEAD
class LoginWidget extends XotBaseSchemaWidget
=======
class LoginWidget extends BaseAuthWidget
>>>>>>> laraxot/dev
{
    /**
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getLoginFormSchema';
    }

    public function login(): void
    {
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();

        $credentials = [
            'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
            'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
        ];

        $remember = isset($data['remember']) && $data['remember'] === true;

        if (Auth::attempt($credentials, $remember)) {
            session()->regenerate();
<<<<<<< HEAD
=======

            Notification::make()
                ->title(__('user::auth.actions.login.success'))
                ->success()
                ->send();

>>>>>>> laraxot/dev
            $redirectUrl = Route::has('dashboard')
                ? route('dashboard')
                : url('/'.app()->getLocale());
            $this->redirect($redirectUrl);
<<<<<<< HEAD
        }

        $this->addError('data.email', __('user::login.actions.login.error'));
=======

            return;
        }

        $this->addError('email', __('user::auth.messages.failed'));
>>>>>>> laraxot/dev
    }

    /**
     * Compat: il template tema usa `wire:submit.prevent="save"`.
     */
    public function save(): void
    {
        $this->login();
    }
}
