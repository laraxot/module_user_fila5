{{--
    View: user::filament.widgets.auth.login
    Solo form email/password/accedi — i pulsanti social sono responsabilità di SocialLoginWidget.
    Ref: STORY-479 — "LoginWidget non ha ownership sul layout social"
--}}
<div class="filament-widget-login space-y-6">
    <!-- Login Form -->
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="filament-form-container">
            {{ $this->form }}
        </div>

        @if (Route::has('password.request'))
            <div class="flex justify-end">
                <a href="{{ route('password.request') }}" class="text-sm font-medium transition-colors duration-200" style="color: #1E5A96;">
                    {{ __('user::auth.password_reset.back_to_login') }}
                </a>
            </div>
        @endif

        <!-- Submit Button - Colori espliciti per visibilità (WCAG AA) -->
        <button
            type="submit"
            wire:loading.attr="disabled"
            class="w-full py-3 px-4 rounded-xl font-semibold text-white disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 ease-in-out shadow-sm hover:shadow-md transform hover:scale-[1.01] active:scale-[0.99] flex justify-center items-center gap-2 group focus:outline-none focus:ring-4 focus:ring-[#1E5A96]/30"
            style="background: linear-gradient(135deg, #1E5A96 0%, #2D8659 100%);"
            onmouseover="this.style.background='linear-gradient(135deg, #174a7a 0%, #246b48 100%)'"
            onmouseout="this.style.background='linear-gradient(135deg, #1E5A96 0%, #2D8659 100%)'"
        >
            <span wire:loading wire:target="save" class="flex items-center gap-2 italic">
                <x-filament::icon icon="heroicon-o-arrow-path" class="animate-spin h-5 w-5" aria-hidden="true" />
                {{ __('user::auth.social.title') }}
            </span>

            <div wire:loading.remove wire:target="save" class="flex items-center gap-2">
                <span>{{ __('user::login_widget.ui.login_button') }}</span>
                <x-filament::icon icon="heroicon-o-arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" />
            </div>
        </button>
    </form>
</div>
