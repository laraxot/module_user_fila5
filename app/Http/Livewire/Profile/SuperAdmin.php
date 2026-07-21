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

    /**
     * @return mixed
     */
    public function mount(): void
    {
        $this->profile = XotData::make()->getProfileModel();
        $this->url = url()->current();
    }

    /**
     * @return mixed
     */
    public function toggleSuperAdmin(): RedirectResponse|Redirector
    {
        $this->profile->toggleSuperAdmin();

        return redirect($this->url, 303);
    }

    /**
     * @return mixed
     */
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
