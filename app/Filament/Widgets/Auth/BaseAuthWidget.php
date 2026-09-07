<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

abstract class BaseAuthWidget extends Widget
{
    public null|array $data = [];
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Facades\Auth;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

abstract class BaseAuthWidget extends XotBaseWidget
{
    /** @var array<string, mixed>|null */
    public ?array $data = [];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

    public function mount(): void
    {
        if (Auth::check()) {
            redirect()->intended(route('dashboard'));
        }
    }

    /**
     * Restituisce i dati per la view.
     * In Filament v3/Xot, il form va gestito tramite getFormSchema().
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
>>>>>>> 2024e2e7 (.)
=======
     *
>>>>>>> f589f9b2 (.)
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'form' => $this->getFormSchema(),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD

    /**
     * Restituisce lo schema del form per l'autenticazione.
     * Deve essere implementato dalle classi concrete.
     *
     * @return array<mixed>
     */
    abstract protected function getFormSchema(): array;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
