<?php

declare(strict_types=1);

?>
<div class="space-y-6">
    <div class="text-center">
        <h2 class="text-2xl font-bold tracking-tight">
            {{ __('user::auth.forgot-password.title') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('user::auth.forgot-password.subtitle') }}
        </p>
    </div>

    @php
        $forgotError = $errors->first('data.email') ?: $errors->first('email');
    @endphp

    <div
        @class([
            'fo-filament-form-shell rounded-xl border border-slate-200 p-4 transition-colors',
            'border-red-300 bg-red-50/40' => (bool) $forgotError,
        ])
    >
        {{ $this->form }}
    </div>

    @if ($forgotError)
        <p class="text-sm text-red-700" role="alert">{{ $forgotError }}</p>
    @endif

    <x-filament::button
        type="button"
        color="primary"
        class="w-full min-h-[44px]"
        wire:click="sendResetLink"
        wire:loading.attr="disabled"
    >
        {{ __('user::auth.forgot-password.submit') }}
    </x-filament::button>

    <div class="text-center text-sm">
        <a href="{{ url('/' . app()->getLocale() . '/auth/login') }}" class="font-medium text-primary-600 hover:text-primary-500">
            {{ __('user::auth.forgot-password.back_to_login') }}
        </a>
    </div>
</div>
