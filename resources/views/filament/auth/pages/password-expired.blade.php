<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
    
<<<<<<< HEAD
<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="resetPassword">
=======
    <form wire:submit="resetPassword">
>>>>>>> 2024e2e7 (.)
=======
    <form wire:submit="resetPassword">
>>>>>>> f589f9b2 (.)
        {{ $this->form }}

        <x-filament::actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
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
