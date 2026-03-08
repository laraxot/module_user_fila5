<?php

declare(strict_types=1);

?>
<x-filament-panels::page>
    <form wire:submit="updateProfile">
        {{ // @var mixed editProfileForm }}

        <x-filament::actions :actions="// @var mixed getUpdateProfileFormActions(
    </form>

    <form wire:submit="updatePassword">
        {{ // @var mixed editPasswordForm }}

        <x-filament::actions :actions="// @var mixed getUpdatePasswordFormActions(
    </form>
</x-filament-panels::page>
