---
type: bmad-initiative
status: active
created: 2026-10-17
updated: 2026-10-20
initiative_id: kp-google-auth-login
related:
  - module: User
  - module: Fixcity
  - ./filament-blueprint.md
  - ./decision-log.md
  - ../../../Themes/Sixteen/docs/bmad/plans/oauth-login-locale-fix.md
summary: |
  Login Google sul FO pubblico: stesso prefisso lingua della pagina login.
  Entry `/it/auth/login/google`, callback `/it/auth/login/google/callback`.
references:
  - laravel/Modules/User/app/Filament/Widgets/Auth/LoginWidget.php
  - laravel/Modules/User/routes/socialite.php
  - laravel/Themes/Sixteen/resources/views/components/utilities/google-button.blade.php
---

# Google auth login — senso e contratto

## Perché

Il cittadino apre `/it/auth/login`. «Accedi con Google» deve restare in italiano
nel path (`/it/auth/login/google`). Google Cloud Console ha
`GOOGLE_REDIRECT_URI=…/it/auth/login/google/callback`. Entry e callback senza
`lang` spezzano il contesto lingua e falliscono la verifica redirect URI.

## SSoT

| Pezzo | Dove |
|-------|------|
| Route named | `oauth.redirect` / `oauth.callback` in `routes/socialite.php` → `{lang}/auth/login/{provider}` |
| Redirect / callback | `RedirectToProviderController` / `ProcessCallbackController` |
| Bottone FO Sixteen | `components/utilities/google-button.blade.php` → `route(..., ['lang' => $locale])` |
| Widget dominio | `LoginWidget` / `SocialLoginWidget::getRedirectUrl()` |

**Nessuna pagina Folio** serve questi URL (story [DCP-269](./stories/dcp-269-login-google-localizzato-e-rientro-nella-lingua.story.md)):
un `abort()` al livello superiore di una vista Folio scatta quando Folio scorre le pagine per risolvere `route('login')` e rompe
ogni redirect a un nome di rotta. La rotta nominata vince comunque.

## Vincoli di rotta

`{lang}` = lingue di `laravellocalization.supportedLocales`; `{provider}` = `google|microsoft|github` (quelli di `SocialLoginWidget`).
Un valore inventato è un 404 a tema, non un 500 né una lingua fantasma.

## La lingua attraversa Google

`GOOGLE_REDIRECT_URI` è uno solo (`/it/…/callback`). `RedirectToProviderController` salva la lingua d'ingresso in sessione
(`ProcessCallbackController::SESSION_LANG_KEY`), il callback la ripristina (validata) e `RedirectToLoginAction` rimanda a
`/{lang}/auth/login` con l'errore. Il blocco d'errore lo stampa il widget (`filament/widgets/auth/login.blade.php`).

## Fuori dal codice

Il `client_id` visto sul pubblico (2026-10-20) è il segnaposto `google-client-id.apps.googleusercontent.com`: serve la coppia reale in
`GOOGLE_CLIENT_ID`/`GOOGLE_CLIENT_SECRET` di produzione e `https://fixcity.eu/it/auth/login/google/callback` registrato in Google Cloud Console.

## Binding `{lang}` + `{provider}`

I controller Socialite devono dichiarare **entrambi** i parametri di rotta:

```php
public function __invoke(Request $request, string $lang, string $provider): RedirectResponse
```

Con solo `$provider`, Laravel legava il segmento `it` a `$provider` →
`ProviderNotConfigured("it")`. Usare `Illuminate\Http\Request`, non la Facade.

## Non fare

- `route('oauth.redirect', ['provider' => 'google'])` senza `lang`
- Aprire OAuth in un nuovo tab (rompe state/session)
- Nuovi controller o duplicare la logica Socialite nel tema
- Tipizzare la Facade `Request` nel `__invoke` OAuth

