<?php

declare(strict_types=1);
<<<<<<< HEAD
?>
<x-filament-panels::page>
    
    <form wire:submit="resetPassword">
=======

?>
<x-filament-panels::page>
    
    <x-filament-schemas::form wire:submit="resetPassword">
>>>>>>> 350420cb (Check & fix styling)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> 350420cb (Check & fix styling)
    
</x-filament-panels::page>
