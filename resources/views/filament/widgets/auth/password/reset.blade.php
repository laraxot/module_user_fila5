<?php

declare(strict_types=1);
<<<<<<< HEAD
?>
<div>
    @if($this->emailSent)
        {{-- Success State --}}
        <div class="text-center space-y-6">
            <div class="flex justify-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <x-filament::icon name="heroicon-o-check-circle" class="w-8 h-8 text-green-600" />
                </div>
            </div>
            
            <div>
                <h3 class="text-xl font-semibold text-[#272C4D] mb-2">
                    {{ __('user::auth.password_reset.email_sent.title') }}
                </h3>
                <p class="text-gray-600 mb-6">
=======

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
>>>>>>> 350420cb (Check & fix styling)
                    {{ __('user::auth.password_reset.email_sent.message') }}
                </p>
            </div>

            <div class="space-y-3">
<<<<<<< HEAD
                <x-filament::button 
                    wire:click="resetForm" 
                    color="gray" 
                    class="w-full">
                    {{ __('user::auth.password_reset.send_another') }}
                </x-filament::button>
                
                <a href="{{ route('login') }}" 
                   class="block text-center text-[#FF5F7E] hover:text-[#FF4A6B] font-medium">
=======
                <x-filament::button wire:click="resetForm" color="gray" class="w-full min-h-[44px]">
                    {{ __('user::auth.password_reset.send_another') }}
                </x-filament::button>

                <a
                    href="{{ url('/' . app()->getLocale() . '/auth/login') }}"
                    class="block text-center font-medium text-primary-700 hover:text-primary-800"
                >
>>>>>>> 350420cb (Check & fix styling)
                    {{ __('user::auth.password_reset.back_to_login') }}
                </a>
            </div>
        </div>
    @else
<<<<<<< HEAD
        {{-- Form State --}}
        <form wire:submit="sendResetPasswordLink" class="space-y-6">
            {{ $this->form }}

            <x-filament::button 
                type="submit" 
                class="w-full bg-[#FF5F7E] hover:bg-[#FF4A6B]">
                {{ __('user::auth.password_reset.send_button') }}
            </x-filament::button>
        </form>
        
        <div class="text-center mt-6">
            <a href="{{ route('login') }}" 
               class="text-[#FF5F7E] hover:text-[#FF4A6B] font-medium">
=======
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
>>>>>>> 350420cb (Check & fix styling)
                {{ __('user::auth.password_reset.back_to_login') }}
            </a>
        </div>
    @endif
</div>
