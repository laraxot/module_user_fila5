<?php

declare(strict_types=1);
<<<<<<< HEAD
?>
<x-filament-panels::page>

    <form wire:submit="updateLogo">
=======

?>
<x-filament-panels::page>

    <x-filament-schemas::form wire:submit="updateLogo">
>>>>>>> 350420cb (Check & fix styling)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getUpdateLogoFormActions()"
        />

<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> 350420cb (Check & fix styling)

</x-filament-panels::page>
