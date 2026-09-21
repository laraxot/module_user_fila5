<?php

declare(strict_types=1);

?>
<div>
    <form wire:submit="logout" class="space-y-4">
        <x-filament::button
            type="submit"
            variant="danger"
            icon="fas-sign-out-alt"
        >
            {{ __('user::auth.logout.title') }}
        </x-filament::button>
    </form>
</div>