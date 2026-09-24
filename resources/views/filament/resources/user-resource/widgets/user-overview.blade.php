<?php

declare(strict_types=1);

?>
<x-filament::widget>
    <x-filament::card>
        {{-- Widget content --}}
                {{ $record->name ?? 'Utente' }}
    </x-filament::card>
</x-filament::widget>
