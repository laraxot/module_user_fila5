<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ForgotPasswordWidget — invio link reset via email.
 *
 * Schema da `Schemas\UserForm::getForgotPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
=======
use Illuminate\Support\Facades\Password;
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ForgotPassword FO — schema SSoT in `Resources\UserResource\Schemas\UserForm::getForgotPasswordFormSchema()`.
>>>>>>> 350420cb (Check & fix styling)
 */
class ForgotPasswordWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::widgets.auth.forgot-password-widget';

<<<<<<< HEAD
    /**
     * @return class-string<UserForm>
     */
=======
>>>>>>> 350420cb (Check & fix styling)
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
<<<<<<< HEAD
            $this->addError('email', __($status));
=======
            $this->addError('data.email', __($status));
>>>>>>> 350420cb (Check & fix styling)
        }
    }
}
