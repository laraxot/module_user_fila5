{{--
    View: user::filament.widgets.auth.login
    Enhanced UX/UI with modern 2026 design trends
    Features: Social login, micro-interactions, accessibility, mobile-first
--}}
<div class="filament-widget-login space-y-6">
    <!-- Social Login Buttons (Primary) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <button
            type="button"
            class="flex items-center justify-center gap-3 py-2.5 px-4 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 hover:shadow-sm transition-all duration-200 group focus:outline-none focus:ring-2 focus:ring-primary-500/20"
        >
            <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
            <span class="font-medium text-gray-700 group-hover:text-gray-900 transition-colors">
                {{ __('user::auth.login.google') ?? 'Google' }}
            </span>
        </button>
        
        <button
            type="button"
            class="flex items-center justify-center gap-3 py-2.5 px-4 bg-[#24292F] border border-[#24292F] rounded-xl hover:bg-[#1c2126] hover:shadow-sm transition-all duration-200 group focus:outline-none focus:ring-2 focus:ring-gray-500/20"
        >
            <svg class="w-5 h-5 flex-shrink-0 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
            </svg>
            <span class="font-medium text-white transition-colors">
                {{ __('user::auth.login.github') ?? 'GitHub' }}
            </span>
        </button>
    </div>

    <!-- Divider -->
    <div class="relative py-2">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center text-sm font-medium leading-6">
            <span class="bg-white px-4 text-gray-400 font-normal italic">
                {{ __('user::auth.login.or_continue_with') ?? 'oppure continua con email' }}
            </span>
        </div>
    </div>

    <!-- Login Form -->
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="filament-form-container">
            {{ $this->form }}
        </div>

        @if (Route::has('password.request'))
            <div class="flex justify-end">
                <a href="{{ route('password.request') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors duration-200">
                    {{ __('user::auth.login.forgot_password') }}
                </a>
            </div>
        @endif

        <!-- Submit Button -->
        <button 
            type="submit" 
            wire:loading.attr="disabled"
            class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-500/20 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 ease-in-out shadow-sm hover:shadow-md transform hover:scale-[1.01] active:scale-[0.99] flex justify-center items-center gap-2 group"
        >
            <svg wire:loading wire:target="save" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            
            <div wire:loading.remove wire:target="save" class="flex items-center gap-2">
                <span>{{ __('user::auth.login.submit') }}</span>
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </div>
            
            <span wire:loading wire:target="save" class="flex items-center gap-2 italic">
                {{ __('user::auth.login.logging_in') }}
            </span>
        </button>
    </form>

    <!-- Register CTA -->
    @if (Route::has('register'))
        <div class="text-center pt-4">
            <p class="text-sm text-gray-500">
                {{ __('user::auth.login.no_account') }}
                <a href="{{ route('register') }}" class="font-semibold text-primary-600 hover:text-primary-700 transition-colors duration-200 ml-1">
                    {{ __('user::auth.login.create_account') }}
                </a>
            </p>
        </div>
    @endif
</div>
