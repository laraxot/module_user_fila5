<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Schemas\Schema;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
// use Filament\Forms\Components\TextInput as FormsTextInput;
use Illuminate\Support\Facades\Password;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * @property Schema $form
 */
class ForgotPasswordWidget extends XotBaseWidget
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Facades\Password;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ForgotPasswordWidget — invio link reset via email.
 *
 * Schema da `Schemas\UserForm::getForgotPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class ForgotPasswordWidget extends XotBaseSchemaWidget
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    protected string $view = 'user::widgets.auth.forgot-password-widget';

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get the form schema for this widget.
     *
     * @return array<string, Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
        ];
=======
=======
>>>>>>> f589f9b2 (.)
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getForgotPasswordFormSchema';
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    public function sendResetLink(): void
    {
        $data = $this->form->getState();

        $status = Password::sendResetLink(['email' => $data['email']]);

<<<<<<< HEAD
<<<<<<< HEAD
        if ($status === Password::RESET_LINK_SENT) {
=======
        if (Password::RESET_LINK_SENT === $status) {
>>>>>>> 2024e2e7 (.)
=======
        if (Password::RESET_LINK_SENT === $status) {
>>>>>>> f589f9b2 (.)
            session()->flash('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }
}
