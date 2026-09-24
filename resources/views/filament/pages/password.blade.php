<?php

declare(strict_types=1);
<<<<<<< HEAD
?>
<x-filament-panels::page>

    <form wire:submit="updateData">
=======

?>
<x-filament-panels::page>

    <x-filament-schemas::form wire:submit="updateData">
>>>>>>> 350420cb (Check & fix styling)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getUpdateFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> 350420cb (Check & fix styling)

</x-filament-panels::page>
