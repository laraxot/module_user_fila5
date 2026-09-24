<?php

declare(strict_types=1);

?>
<div class="space-y-6">
    <div class="text-center">
        <h2 class="text-2xl font-bold tracking-tight">
            {{ __('user::auth.reset-password.title') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('user::auth.reset-password.subtitle') }}
        </p>
    </div>

    @php
        $resetError = $errors->first('data.email') ?: $errors->first('email');
    @endphp

    <div
        @class([
            'fo-filament-form-shell rounded-xl border border-slate-200 p-4 transition-colors',
            'border-red-300 bg-red-50/40' => (bool) $resetError,
        ])
    >
        {{ $this->form }}
    </div>

    @if ($resetError)
        <p class="text-sm text-red-700" role="alert">{{ $resetError }}</p>
    @endif

    <x-filament::button
        type="button"
        color="primary"
        class="w-full min-h-[44px]"
        wire:click="resetPassword"
        wire:loading.attr="disabled"
    >
        {{ __('user::auth.reset-password.submit') }}
    </x-filament::button>
</div>
