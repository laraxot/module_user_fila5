<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
<<<<<<< HEAD
<<<<<<< HEAD
    <x-filament-schemas::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament::actions :actions="$this->getUpdateProfileFormActions()" />
    </x-filament-schemas::form>

    <x-filament-schemas::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament::actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-schemas::form>
=======
=======
>>>>>>> f589f9b2 (.)
    <form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament::actions :actions="$this->getUpdateProfileFormActions()" />
    </form>

    <form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament::actions :actions="$this->getUpdatePasswordFormActions()" />
    </form>
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
</x-filament-panels::page>
