<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Illuminate\Support\Facades\Password;
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ForgotPassword FO — schema SSoT in `Resources\UserResource\Schemas\UserForm::getForgotPasswordFormSchema()`.
 */
class ForgotPasswordWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::widgets.auth.forgot-password-widget';

    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getForgotPasswordFormSchema';
    }

    public function sendResetLink(): void
    {
        $data = $this->form->getState();

        $status = Password::sendResetLink(['email' => $data['email']]);

        if (Password::RESET_LINK_SENT === $status) {
            session()->flash('status', __($status));
        } else {
            $this->addError('data.email', __($status));
        }
    }
}
