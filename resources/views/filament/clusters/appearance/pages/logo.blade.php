<?php

declare(strict_types=1);

?>
<x-filament-panels::page>

<<<<<<< HEAD
    <form wire:submit="updateLogo">
=======
    <x-filament-schemas::form wire:submit="updateLogo">
>>>>>>> f548be94 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getUpdateLogoFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> f548be94 (.)

</x-filament-panels::page>
