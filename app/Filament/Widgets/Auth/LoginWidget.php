<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

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
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getLoginFormSchema';
    }

    public static function canView(): bool
    {
        return ! Auth::check();
    }

    public function save(): void
    {
        $this->login();
    }

    public function login(): void
    {
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();

        $credentials = [
            'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
            'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
        ];

        $remember = isset($data['remember']) && true === $data['remember'];

        if (Auth::attempt($credentials, $remember)) {
            session()->regenerate();

            $redirectUrl = LaravelLocalization::localizeURL('/');

            $this->redirect($redirectUrl);

            return;
        }

        $this->addError('data.email', __('auth.failed'));
    }
}
