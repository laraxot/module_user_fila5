<?php

declare(strict_types=1);

?>
<x-filament-panels::page>

<<<<<<< HEAD
<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="updateData">
=======
    <form wire:submit="updateData">
>>>>>>> 2024e2e7 (.)
=======
    <form wire:submit="updateData">
>>>>>>> f589f9b2 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getUpdateFormActions()"
        />

<<<<<<< HEAD
<<<<<<< HEAD
    </x-filament-schemas::form>
=======
    </form>
>>>>>>> 2024e2e7 (.)
=======
    </form>
>>>>>>> f589f9b2 (.)

</x-filament-panels::page>
