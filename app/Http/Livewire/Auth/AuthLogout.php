<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Illuminate\Contracts\View\View;
<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthLogout extends Component
{
    public function mount(): void
    {
        Auth::logout();
    }

    public function render(): View
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $view = 'livewire.auth.logout';
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception("View {$view} not found");
        }
        $view_params = [];
        return view($view, $view_params);
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var view-string $viewName */
        $viewName = 'user::livewire.auth.logout';

        return view($viewName);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
