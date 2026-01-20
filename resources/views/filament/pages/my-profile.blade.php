<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
<<<<<<< HEAD
    <form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament::actions :actions="$this->getUpdateProfileFormActions()" />
    </form>

    <form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament::actions :actions="$this->getUpdatePasswordFormActions()" />
    </form>
=======
    <x-filament-schemas::form wire:submit="updateProfile">
        {{ $this->editProfileForm }}

        <x-filament::actions :actions="$this->getUpdateProfileFormActions()" />
    </x-filament-schemas::form>

    <x-filament-schemas::form wire:submit="updatePassword">
        {{ $this->editPasswordForm }}

        <x-filament::actions :actions="$this->getUpdatePasswordFormActions()" />
    </x-filament-schemas::form>
>>>>>>> f548be94 (.)
</x-filament-panels::page>
