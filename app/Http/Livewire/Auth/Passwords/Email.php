<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

use Illuminate\Contracts\Auth\PasswordBroker;
<<<<<<< HEAD
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;
=======
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Modules\Xot\Actions\File\ViewCopyAction;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
>>>>>>> f548be94 (.)

class Email extends Component
{
    public string $email = '';

<<<<<<< HEAD
    public ?string $emailSentMessage = null;
=======
    public null|string $emailSentMessage = null;
>>>>>>> f548be94 (.)

    /**
     * Invia il link per il reset della password.
     */
    public function sendResetPasswordLink(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $broker = $this->broker();
        $response = $broker->sendResetLink(['email' => $this->email]);

<<<<<<< HEAD
        if (Password::RESET_LINK_SENT === $response) {
            $this->emailSentMessage = trans('user::'.$response);

            return;
        }

        $this->addError('email', trans('user::'.$response));
=======
        if ($response === Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans('user::' . $response);
            return;
        }

        $this->addError('email', trans('user::' . $response));
>>>>>>> f548be94 (.)
    }

    /**
     * Get the broker to be used during password reset.
     */
    public function broker(): PasswordBroker
    {
        return Password::broker();
    }

    public function render(): View|Factory
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.email', 'pub_theme::livewire.auth.passwords.email');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.email';

        return view($view, [
            'layout' => 'pub_theme::layouts.auth',
        ]);
    }
}
