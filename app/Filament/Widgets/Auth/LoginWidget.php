<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

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
class LoginWidget extends XotBaseSchemaWidget
{
    /**
     * @return class-string<UserForm>
     */
=======
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Login FO — schema SSoT in `Resources\UserResource\Schemas\UserForm::getLoginFormSchema()`.
 *
 * Estende {@see XotBaseSchemaWidget} — eredita `public array $data` da {@see XotBaseWidget}
 * per `statePath('data')` e `wire:model="data.*"`.
 *
 * Vista: `pub_theme::filament.widgets.auth.login` via {@see XotBaseWidget::resolveView()}.
 */
class LoginWidget extends XotBaseSchemaWidget
{
>>>>>>> 350420cb (Check & fix styling)
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getLoginFormSchema';
    }

<<<<<<< HEAD
=======
    public static function canView(): bool
    {
        return ! Auth::check();
    }

    public function save(): void
    {
        $this->login();
    }

>>>>>>> 350420cb (Check & fix styling)
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
            $redirectUrl = Route::has('dashboard')
                ? route('dashboard')
                : url('/'.app()->getLocale());
            $this->redirect($redirectUrl);
        }

        $this->addError('data.email', __('user::login.actions.login.error'));
    }

    /**
     * Compat: il template tema usa `wire:submit.prevent="save"`.
     */
    public function save(): void
    {
        $this->login();
=======

            $redirectUrl = LaravelLocalization::localizeURL('/');

            $this->redirect($redirectUrl);

            return;
        }

        $this->addError('data.email', __('auth.failed'));
>>>>>>> 350420cb (Check & fix styling)
    }
}
