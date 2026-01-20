<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
    
<<<<<<< HEAD
    <form wire:submit="resetPassword">
=======
    <x-filament-schemas::form wire:submit="resetPassword">
>>>>>>> f548be94 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
<<<<<<< HEAD
    </form>
=======
    </x-filament-schemas::form>
>>>>>>> f548be94 (.)
    
</x-filament-panels::page>
