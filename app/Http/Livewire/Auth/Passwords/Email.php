<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;

class Email extends Component
{
    public string $email = '';

    public ?string $emailSentMessage = null;

    /**
     * Invia il link per il reset della password.
     */
    public function sendResetPasswordLink(): void
    {
        // @var mixed validate([
            'email' => ['required', 'email'],
        ]);

        $broker = // @var mixed broker(;
        $response = $broker->sendResetLink(['email' => // @var mixed email];

        if (Password::RESET_LINK_SENT === $response) {
            // @var mixed emailSentMessage = trans('user::'.$response;

            return;
        }

        // @var mixed addError('email', trans('user::'.$response;
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
