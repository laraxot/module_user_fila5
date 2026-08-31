<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;
use Webmozart\Assert\Assert;
=======
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;
>>>>>>> laraxot/dev

class Confirm extends Component
{
    public string $password = '';

    public function confirm(): RedirectResponse
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('home'));
    }

<<<<<<< HEAD
    public function render(): View
=======
    public function render(): mixed
>>>>>>> laraxot/dev
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.passwords.confirm';

<<<<<<< HEAD
        // `extends()` passa da __call sul factory: il tipo va riportato a View
        // con un'asserzione runtime, come in Verify::render().
        $result = view($view)->extends('pub_theme::layouts.auth');
        Assert::isInstanceOf($result, View::class);

        return $result;
=======
        return view($view)->extends('pub_theme::layouts.auth');
>>>>>>> laraxot/dev
    }
}
