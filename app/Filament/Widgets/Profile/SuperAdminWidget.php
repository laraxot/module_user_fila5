<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Profile;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Chrome user-menu: toggle super-admin / negate-super-admin.
 * Business logic stays on the profile model.
 */
class SuperAdminWidget extends XotBaseWidget
{
    protected static bool $isDiscovered = false;

    public string $url = '#';

    public ProfileContract $profile;

    public function mount(): void
    {
        $this->profile = XotData::make()->getProfileModel();
        $this->url = url()->current();
    }

    public function toggleSuperAdmin(): RedirectResponse|Redirector
    {
        $this->profile->toggleSuperAdmin();

        return redirect($this->url, 303);
    }

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::filament.widgets.profile.super-admin';

        return view($viewName, [
            'profile' => $this->profile,
        ]);
    }
}
