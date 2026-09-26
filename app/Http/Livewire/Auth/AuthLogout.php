<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Illuminate\Contracts\View\View;
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
        /** @var view-string $viewName */
<<<<<<< HEAD
        $viewName = 'user::livewire.auth.logout';
=======
        $viewName = 'filament-jet::livewire.auth-logout';
>>>>>>> laraxot/dev

        return view($viewName);
    }
}
