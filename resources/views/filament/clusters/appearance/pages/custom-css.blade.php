<?php

declare(strict_types=1);

?>
<x-filament-panels::page>

<<<<<<< HEAD
    <form wire:submit="updateData">
=======
    <x-filament-schemas::form wire:submit="updateData">
>>>>>>> f548be94 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getUpdateFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> f548be94 (.)

</x-filament-panels::page>
