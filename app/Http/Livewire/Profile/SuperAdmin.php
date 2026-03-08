<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Profile;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;

class SuperAdmin extends Component
{
    public string $url = '#';

    public ProfileContract $profile;

    public function mount(): void
    {
        // @var mixed profile = XotData::make(;
        // @var mixed url = url(;
    }

    public function toggleSuperAdmin(): RedirectResponse|Redirector
    {
        // @var mixed profile->toggleSuperAdmin(;

        return redirect(// @var mixed url, 303;
    }

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::livewire.profile.super-admin';
        $view_params = [
            'view' => $viewName,
        ];

        return view($viewName, $view_params);
    }
}
