<?php

declare(strict_types=1);

?>
<div>
    @if($this->emailSent)
        <div class="text-center space-y-6">
            <div class="flex justify-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                    <x-filament::icon name="heroicon-o-check-circle" class="h-8 w-8 text-green-600" />
                </div>
            </div>

            <div>
                <h3 class="mb-2 text-xl font-semibold text-slate-900">
                    {{ __('user::auth.password_reset.email_sent.title') }}
                </h3>
                <p class="mb-6 text-slate-600">
                    {{ __('user::auth.password_reset.email_sent.message') }}
                </p>
            </div>

            <div class="space-y-3">
                <x-filament::button wire:click="resetForm" color="gray" class="w-full min-h-[44px]">
                    {{ __('user::auth.password_reset.send_another') }}
                </x-filament::button>

                <a
                    href="{{ url('/' . app()->getLocale() . '/auth/login') }}"
                    class="block text-center font-medium text-primary-700 hover:text-primary-800"
                >
                    {{ __('user::auth.password_reset.back_to_login') }}
                </a>
            </div>
        </div>
    @else
        <div class="space-y-6">
            {{ $this->form }}

            <x-filament::button
                type="button"
                color="primary"
                class="w-full min-h-[44px]"
                wire:click="sendResetPasswordLink"
                wire:loading.attr="disabled"
            >
                {{ __('user::auth.password_reset.send_button') }}
            </x-filament::button>
        </div>

        <div class="mt-6 text-center">
            <a
                href="{{ url('/' . app()->getLocale() . '/auth/login') }}"
                class="font-medium text-primary-700 hover:text-primary-800"
            >
                {{ __('user::auth.password_reset.back_to_login') }}
            </a>
        </div>
    @endif
</div>
