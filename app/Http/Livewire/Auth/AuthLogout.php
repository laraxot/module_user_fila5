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
<<<<<<< Updated upstream
        $view = 'livewire.auth.logout';
        if (! view()->exists($view)) {
            throw new \Exception("View {$view} not found");
        }
        $view_params = [];

        return view($view, $view_params);
=======
        return view('livewire.auth.logout');
>>>>>>> Stashed changes
    }
}
