<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthLogout extends Component
{
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function mount(): void
    {
        Auth::logout();
    }

<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::livewire.auth.logout';

        return view($viewName);
    }
}
