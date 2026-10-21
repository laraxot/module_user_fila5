<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
                ->title(__('user::login.actions.login.success'))
                ->success()
                ->send();

            // Chi e' stato mandato al login da una pagina protetta (es. "Segnala disservizio") torna a quella pagina:
            // Laravel salva l'URL richiesto in `url.intended`. Senza, si va alla dashboard del progetto o alla home nella lingua corrente.
            /**
             * Livewire submits to `/livewire-*`, so the locale middleware that
             * handled `/it/auth/login` is not guaranteed to run again. Keep the
             * locale explicit, but pass it in the second position required by
             * `localizeURL($url, $locale)`.
             */
            $locale = trim((string) app()->getLocale(), '/');
            $supportedLocales = LaravelLocalization::getSupportedLanguagesKeys();
            if (! in_array($locale, $supportedLocales, true)) {
                $locale = Config::string('app.locale', 'it');
            }

            $defaultRedirectUrl = Route::has('dashboard')
                ? LaravelLocalization::localizeURL(route('dashboard'), $locale)
                : LaravelLocalization::localizeURL('/', $locale);

            $this->redirectIntended($defaultRedirectUrl);

            return;
        }

        RateLimiter::hit($throttleKey, self::DECAY_SECONDS);
        $this->addError('data.email', __('user::login.actions.login.error'));
    }

    /**
     * Footer actions: link di registrazione e password dimenticata (BMAD + Second Brain).
     *
     * Analisi: pagina login `/it/auth/login` manca i link registration e password recovery.
     * Il widget Filament esegue login schema, senza template Blade con i link.
     * Soluzione: aggiungi footer actions link registrazione e recupero password.
     *
     * @return list<Action>
     */
    public function getFooterActions(): array
    {
        $actions = [
            Action::make('registration')
                ->url(route('register'))
                ->label(__('user::auth.login.create_account.text')),
            Action::make('password_recovery')
                ->url(route('password.request'))
                ->label(__('user::auth.login.forgot_password.text')),
        ];

        // Route `oauth.redirect` definita in Modules/User/routes/socialite.php.
        // Il URL va LOCALIZZATO: la pagina login e' `/it/auth/login`, quindi il
        // redirect al provider deve essere `/it/auth/login/google`. Senza il prefisso
        // locale il flusso OAuth perde il contesto della lingua e la callback
        // (`/it/auth/login/google/callback`) non combacia con GOOGLE_REDIRECT_URI.
        $locale = $this->resolveLocale();
        $actions[] = Action::make('google')
            ->url(route('oauth.redirect', ['provider' => 'google', 'lang' => $locale]))
            ->label(__('user::auth.login.google.button.text'))
            ->icon('heroicon-o-google')
            ->color('gray');

        return $actions;
    }

    /**
     * Locale corrente per localizzare URL OAuth (coerenza con /it/auth/login).
     */
    private function resolveLocale(): string
    {
        $locale = app()->getLocale();
        if (! is_string($locale)) {
            $locale = config('app.locale', 'it');
        }
        if (! is_string($locale)) {
            $locale = 'it';
        }
        $locale = trim($locale, '/');
        $supported = LaravelLocalization::getSupportedLanguagesKeys();
        if (! in_array($locale, $supported, true)) {
            $fallback = config('app.locale', 'it');
            $locale = is_string($fallback) ? $fallback : 'it';
        }

        return $locale;
    }

    /**
     * Compat: il template tema usa `wire:submit.prevent="save"`.
     */
    public function save(): void
    {
        $this->login();
    }
}
