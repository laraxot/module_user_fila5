{{--
    Fallback modulo User — il tema pubblico usa pub_theme::filament.widgets.auth.login.
    Nessun <form> esterno: Filament rende già il form; wrapper esterno = campi vuoti al submit.
--}}
<x-filament-widgets::widget>
    <div class="filament-widget-login space-y-6">
        @php
            $loginError = $errors->first('data.email') ?: $errors->first('email');
        @endphp

        @if ($loginError)
            <div class="rounded-xl border-2 border-red-300 bg-red-50 px-4 py-4 shadow-sm" role="alert" aria-live="assertive">
                <p class="text-sm font-semibold text-red-800">{{ __('user::login.actions.login.error') }}</p>
                <p class="mt-1 text-sm text-red-700">{{ $loginError }}</p>
            </div>
        @endif

        <div
            @class([
                'fo-filament-form-shell rounded-xl border border-slate-200 p-4',
                'border-red-300 bg-red-50/40' => (bool) $loginError,
            ])
        >
            {{ $this->form }}
        </div>

        <x-filament::button
            type="button"
            color="primary"
            class="w-full min-h-[44px]"
            wire:click="login"
            wire:loading.attr="disabled"
        >
            {{ __('user::login_widget.ui.login_button') }}
        </x-filament::button>
    </div>
    <x-filament-actions::modals />
</x-filament-widgets::widget>
