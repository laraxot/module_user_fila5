<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth\Passwords;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Modules\Xot\Actions\File\ViewCopyAction;

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
    public function render(): \Illuminate\Contracts\View\View
=======
    public function render(): View
>>>>>>> a6d956d (Refactor code style for consistency and clarity across multiple files, including parameter annotations and conditional checks. Adjusted formatting in various actions, migrations, and console commands to enhance readability and maintainability.)
    {
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.passwords.confirm', 'pub_theme::livewire.auth.passwords.confirm');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /** @var view-string */
        $view = 'pub_theme::livewire.auth.passwords.confirm';

<<<<<<< HEAD
<<<<<<< Updated upstream
        /* @var View $result */
        return view($view)->extends('pub_theme::layouts.auth');
=======
        /** @var \Illuminate\Contracts\View\View $res */
=======
        /** @var View $res */
>>>>>>> a6d956d (Refactor code style for consistency and clarity across multiple files, including parameter annotations and conditional checks. Adjusted formatting in various actions, migrations, and console commands to enhance readability and maintainability.)
        $res = view($view);
        // @phpstan-ignore-next-line
        $res->extends('pub_theme::layouts.auth');

        return $res;
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> a6d956d (Refactor code style for consistency and clarity across multiple files, including parameter annotations and conditional checks. Adjusted formatting in various actions, migrations, and console commands to enhance readability and maintainability.)
    }
}
