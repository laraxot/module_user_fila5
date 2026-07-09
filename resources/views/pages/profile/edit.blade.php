<?php

declare(strict_types=1);

use Modules\User\View\Pages\ProfileEditVoltComponent;

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use function Livewire\Volt\layout;

name('profile.edit');
layout('x-layouts.app');
middleware(['auth', 'verified']);

new ProfileEditVoltComponent();

?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    @volt('profile.edit')
        <div class="pb-5">
            <div class="mx-auto space-y-6">

                {{-- Update Profile Section --}}
                <section class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>

                        <form wire:submit="updateProfile" class="mt-6 space-y-6">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <x-ui.input 
                                    :label="__('First Name')" 
                                    type="text" 
                                    id="first_name" 
                                    name="first_name" 
                                    wire:model="first_name"
                                    required 
                                    autofocus
                                    minlength="2"
                                    maxlength="100"
                                    autocomplete="given-name"
                                />
                                <x-ui.input 
                                    :label="__('Last Name')" 
                                    type="text" 
                                    id="last_name" 
                                    name="last_name" 
                                    wire:model="last_name"
                                    required 
                                    minlength="2"
                                    maxlength="100"
                                    autocomplete="family-name"
                                />
                            </div>
                            
                            <x-ui.input 
                                label="Email address" 
                                type="email" 
                                id="email" 
                                name="email"
                                wire:model="email" 
                                required
                                maxlength="255"
                            />
                            
                            <div class="flex items-start">
                                <x-ui.button type="primary" submit="true">
                                    {{ __('Update Profile') }}
                                </x-ui.button>
                            </div>
                        </form>
                    </div>
                </section>

                {{-- Update Password Section --}}
                <section class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Update Password') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Ensure your account is using a long, random password to stay secure.') }}
                            </p>
                        </header>

                        <form wire:submit="updatePassword" class="mt-6 space-y-6">
                            <x-ui.input 
                                label="Current Password" 
                                type="password" 
                                id="current_password"
                                name="current_password" 
                                wire:model="current_password"
                                required
                                autocomplete="current-password"
                            />
                            
                            <x-ui.input 
                                label="New Password" 
                                type="password" 
                                id="password" 
                                name="password"
                                wire:model="password"
                                required
                                minlength="8"
                                autocomplete="new-password"
                            />
                            
                            <x-ui.input 
                                label="Confirm New Password" 
                                type="password" 
                                id="password_confirmation"
                                name="password_confirmation" 
                                wire:model="password_confirmation"
                                required
                                minlength="8"
                                autocomplete="new-password"
                            />

                            <div class="flex items-start">
                                <x-ui.button type="primary" submit="true">
                                    {{ __('Update Password') }}
                                </x-ui.button>
                            </div>
                        </form>
                    </div>
                </section>

                {{-- Delete Account Section --}}
                <section class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg dark:bg-gray-900/50 dark:border dark:border-gray-200/10">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Delete Account') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                            </p>
                        </header>

                        <div class="flex items-start justify-start w-auto mt-6 text-left">
                            <x-ui.button 
                                type="danger" 
                                x-data
                                @click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            >
                                {{ __('Delete Account') }}
                            </x-ui.button>
                        </div>

                        {{-- Delete Account Confirmation Modal --}}
                        <x-ui.modal name="confirm-user-deletion" maxWidth="lg" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form wire:submit="deleteAccount" class="p-6">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>
                                
                                <p class="mt-1 mb-6 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <x-ui.input 
                                    label="Password" 
                                    type="password" 
                                    id="delete_password"
                                    name="delete_password" 
                                    wire:model="delete_password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="{{ __('Enter your password to confirm deletion') }}"
                                />

                                <div class="flex justify-end mt-6 space-x-3">
                                    <x-ui.button type="secondary" x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-ui.button>

                                    <x-ui.button type="danger" submit="true">
                                        {{ __('Delete Account') }}
                                    </x-ui.button>
                                </div>
                            </form>
                        </x-ui.modal>
                    </section>
                </div>
            </div>
        </div>
    @endvolt
</x-layouts.app>
