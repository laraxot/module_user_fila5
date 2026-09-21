<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Profile;

use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

/**
 * Chrome user-menu: toggle super-admin / negate-super-admin.
 *
 * Icone: SVG del modulo auto-registrati da XotBaseServiceProvider
 * (prefisso blade-icons `user-` + filename). Filament 5 le usa con
 * x-filament::icon-button icon="user-superadmin".
 *
 * Filament\Widgets\Widget::render() passa getViewData() alla vista.
 */
class SuperAdminWidget extends XotBaseWidget
{
    protected static bool $isDiscovered = false;

    /**
     * Vista con i nomi Blade Icons auto-registrati. La vista convenzionale
     * `super-admin` in questo momento usa icone senza prefisso `user-`, che
     * il set default non risolve.
     *
     * @var view-string
     */
    protected string $view = 'user::filament.widgets.profile.super-admin-toggle';

    public string $url = '#';

    public function mount(): void
    {
        $this->url = url()->current();
    }

    public function toggleSuperAdmin(): RedirectResponse|Redirector
    {
        XotData::make()->getProfileModel()->toggleSuperAdmin();

        return redirect($this->url, 303);
    }

    /**
     * @return array{profile: ProfileContract}
     */
    protected function getViewData(): array
    {
        return [
            'profile' => XotData::make()->getProfileModel(),
        ];
    }
}
