<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * PasswordResetWidget — schermata di invio link reset (post-login, opzionale).
 *
 * Schema da `Schemas\UserForm::getPasswordResetFormSchema()` — SSoT.
=======
use Modules\User\Filament\Resources\UserResource\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * PasswordReset FO — schema SSoT in `Resources\UserResource\Schemas\UserForm::getPasswordResetFormSchema()`.
>>>>>>> 350420cb (Check & fix styling)
 *
 * @property Schema $form
 */
class PasswordResetWidget extends XotBaseSchemaWidget
{
<<<<<<< HEAD
    public ?array $data = [];

    public bool $emailSent = false;

    /**
     * @return class-string<UserForm>
     */
=======
    public bool $emailSent = false;

    /**
     * @phpstan-ignore-next-line
     */
    protected string $view = 'pub_theme::filament.widgets.auth.password.reset';

>>>>>>> 350420cb (Check & fix styling)
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getPasswordResetFormSchema';
    }

<<<<<<< HEAD
    public function sendResetPasswordLink(): void
    {
=======
    /**
     * Handle password reset link sending.
     */
    public function sendResetPasswordLink(): void
    {
        // try {
>>>>>>> 350420cb (Check & fix styling)
        $data = $this->form->getState();
        $password_broker = Password::broker();

        $response = $password_broker->sendResetLink([
            'email' => $data['email'],
        ]);

        if (Password::RESET_LINK_SENT === $response) {
            $this->emailSent = true;

            Notification::make()
                ->title(__('user::auth.password_reset.email_sent.title'))
                ->body(__('user::auth.password_reset.email_sent.message'))
                ->success()
                ->duration(10000)
                ->send();

<<<<<<< HEAD
=======
            // Clear the form
>>>>>>> 350420cb (Check & fix styling)
            $this->form->fill();
        } else {
            Session::flash('error', trans('user::errors.'.$response.'.label'));
            Notification::make()
                ->title(__('user::auth.password_reset.email_failed.title'))
                ->body(trans($response))
                ->danger()
                ->send();
        }
<<<<<<< HEAD
    }

=======

        /*} catch (\Exception $e) {
         * Notification::make()
         * ->title(__('user::auth.password_reset.email_failed.title'))
         * ->body(__('user::auth.password_reset.email_failed.generic'))
         * ->danger()
         * ->send();
         * }
         */
    }

    /**
     * Reset the widget state to show form again.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function resetForm(): void
    {
        $this->emailSent = false;
        $this->form->fill();
    }

<<<<<<< HEAD
=======
    /**
     * Send another reset link.
     */
>>>>>>> 350420cb (Check & fix styling)
    public function sendAnotherLink(): void
    {
        $this->emailSent = false;
        $this->form->fill(['email' => '']);
    }

<<<<<<< HEAD
    public function checkEmailStatus(): void
    {
=======
    /**
     * Check email status (for compatibility with old view).
     */
    public function checkEmailStatus(): void
    {
        // This method is kept for compatibility but redirects to login
>>>>>>> 350420cb (Check & fix styling)
        $this->redirect(route('login'));
    }
}
