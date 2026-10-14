<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;

/**
 * LoginWidget: widget login con form Filament e "vestito" demandato al template tema.
 *
 * Religione Schema!=Widget: schema da `UserForm::getLoginFormSchema()` (SSoT).
 * Submit: `$this->form->getState()` — no `validateForm()`.
 * il widget resta "thin": solo orchestrazione submit + Auth::attempt.
 *
 * MAI: ->label(), ->placeholder(), ->helperText() — traduzioni automatiche
 * da LangServiceProvider tramite `user::login_widget` (lang/it/login_widget.php).
 *
 * @property Schema $form
 */
class LoginWidget extends BaseAuthWidget
{
    /** Tentativi errati consentiti per email e IP prima del blocco (G-07, DCP-54). */
    private const int MAX_ATTEMPTS = 5;

    /** Durata del blocco e della finestra di conteggio, in secondi. */
    private const int DECAY_SECONDS = 60;

    /**
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getLoginFormSchema';
    }

    public function login(): void
    {
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();

        $credentials = [
            'email' => is_string($data['email'] ?? null) ? $data['email'] : '',
            'password' => is_string($data['password'] ?? null) ? $data['password'] : '',
        ];

        $remember = isset($data['remember']) && $data['remember'] === true;

        // Limite ai tentativi per email e IP: senza, una password si puo' provare all'infinito. Il controllo viene PRIMA di `Auth::attempt`,
        // cosi' anche la password giusta e' rifiutata durante il blocco, e il messaggio dice quanto aspettare.
        $throttleKey = Str::transliterate(Str::lower($credentials['email']).'|'.request()->ip());
        if (RateLimiter::tooManyAttempts($throttleKey, self::MAX_ATTEMPTS)) {
            $this->addError('data.email', __('user::login.actions.login.throttle', ['seconds' => RateLimiter::availableIn($throttleKey)]));

            return;
        }

        if (Auth::attempt($credentials, $remember)) {
            RateLimiter::clear($throttleKey);
            session()->regenerate();

            Notification::make()
                ->title(__('user::auth.actions.login.success'))
                ->success()
                ->send();

            // Chi e' stato mandato al login da una pagina protetta (es. "Segnala disservizio") torna a quella pagina:
            // Laravel salva l'URL richiesto in `url.intended`. Senza, si va alla dashboard del progetto o alla home nella lingua corrente.
            $this->redirectIntended(default: Route::has('dashboard')
                ? route('dashboard')
                : url('/'.app()->getLocale()));

            return;
        }

        RateLimiter::hit($throttleKey, self::DECAY_SECONDS);
        $this->addError('data.email', __('user::login.actions.login.error'));
    }

    /**
     * Compat: il template tema usa `wire:submit.prevent="save"`.
     */
    public function save(): void
    {
        $this->login();
    }
}
