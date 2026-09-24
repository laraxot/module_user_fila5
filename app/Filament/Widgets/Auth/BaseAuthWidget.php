<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Illuminate\Support\Facades\Auth;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

abstract class BaseAuthWidget extends XotBaseWidget
{
<<<<<<< HEAD
    /** @var array<string, mixed>|null */
    public ?array $data = [];

=======
>>>>>>> 350420cb (Check & fix styling)
    public function mount(): void
    {
        if (Auth::check()) {
            redirect()->intended(route('dashboard'));
        }
    }

    /**
<<<<<<< HEAD
=======
     * Restituisce lo schema del form per l'autenticazione.
     * Deve essere implementato dalle classi concrete.
     *
     * @return array<int|string, mixed>
     */
    abstract public function getFormSchema(): array;

    /**
>>>>>>> 350420cb (Check & fix styling)
     * Restituisce i dati per la view.
     * In Filament v3/Xot, il form va gestito tramite getFormSchema().
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'form' => $this->getFormSchema(),
        ];
    }
}
