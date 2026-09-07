<?php

declare(strict_types=1);

?>
<x-filament-panels::page>

<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="updateLogo">
=======
    <form wire:submit="updateLogo">
>>>>>>> 2024e2e7 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getUpdateLogoFormActions()"
        />

<<<<<<< HEAD
    </x-filament-schemas::form>
=======
    </form>
>>>>>>> 2024e2e7 (.)

</x-filament-panels::page>
