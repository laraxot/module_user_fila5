---
title: "Manuale utente frontoffice — User"
type: user-manual
status: active
screenshot: assets/user-admin-login.webp
qmd: "manuale utente frontoffice cittadino account self-service registrazione reset password dispositivi cronologia accessi"
---

# Manuale utente frontoffice — modulo User

Guida per il **cittadino / utente finale** che usa l'account self-service
del sito (non il pannello di amministrazione; per quello vedi
[manuale-admin.md](./manuale-admin.md) e il riferimento completo
[manuale-utente.md](./manuale-utente.md)).

> **Nota di contesto.** Il modulo User fornisce le **capacità** di
> autenticazione lato server e le rotte frontoffice base, ma le pagine
> pubbliche finali (aspetto, testi, blocchi CMS) sono del tema e
> dell'applicazione ospitante. Le rotte verificate in questo modulo sono quelle
> sotto: dove una pagina non esiste o è delegata all'applicazione ospite,
> è segnalato esplicitamente.

## Rotte frontoffice verificate

Fonte: `routes/web_tall.php` e `routes/socialite.php` del modulo.
Il prefisso lingua è `{lang}` e accetta solo `it` ed `en`
(`->whereIn('lang', ['it', 'en'])`).

| Rotta | Nome | Chi può usarla | Widget/Controller |
|---|---|---|---|
| `/{lang}/register` | `register` | solo ospiti | `Widgets\Auth\RegisterWidget` |
| `/{lang}/password/reset` | `password.request` | chiunque (middleware vuoto) | `Widgets\Auth\ForgotPasswordWidget` |
| `/{lang}/password/reset/{token}` | `password.reset` | chiunque | `Widgets\Auth\ResetPasswordWidget` |
| `/{lang}/email/verify` | `verification.notice` | autenticati | redirect a `/admin` (throttle 6/1 min) |
| `/{lang}/email/verify/{id}/{hash}` | `verification.verify` | autenticati + firma | `EmailVerificationController` (signed, throttle 6/1) |
| `/{lang}/password/confirm` | `password.confirm` | autenticati | redirect a `/admin` |
| `/{lang}/logout` | `logout` | autenticati | `Http\Volt\LogoutAction` (GET+POST) |
| `/{lang}/auth/login/{provider}` | `oauth.redirect` | chiunque | `Socialite\RedirectToProviderController` |

Il provider OAuth accettati sono `google`, `microsoft` e `github`
(`->where('provider', 'google|microsoft|github')` in `routes/socialite.php`);
l'effettiva disponibilità dipende dalla configurazione dei provider
Socialite (vedi [manuale-super-admin.md](./manuale-super-admin.md)).

Un scaffold Volt alternativo in `routes/auth.php` è **commentato e non
attivo**: le pagine `pages.auth.*` non esistono in questo modulo.

## Registrazione

La rotta `/{lang}/register` è riservata agli ospiti e serve il widget
`RegisterWidget` (gruppo `Widgets\Auth`). Il comportamento di registrazione
è governato dall'Action `IsRegistrationEnabledAction`: se la registrazione
e' disabilitata lato configurazione la pagina non deve consentire la
creazione dell'account. Il modulo registra anche il log della registrazione
(`LogRegistrationAction`) e supporta l'assegnazione automatica di ruoli
di default (`SetDefaultRolesBySocialiteUserAction`).

## Accesso

Le pagine di login del frontoffice finale appartengono al tema ospitante;
il modulo fornisce il widget `Widgets\Auth\LoginWidget` e
`SocialLoginWidget` (login con i provider Socialite configurati) più le
rotte OAuth qui sopra. Il rate limiting degli accessi API esiste
(`build-api-login-limit-action`), mentre sul pannello admin il login è
`/user/admin/login` (vedi [manuale-utente.md](./manuale-utente.md), sezione
«Accesso»).

## Recupero password

Flusso in due passaggi, tutto lato modulo:

1. **Richiesta** — `/{lang}/password/reset` (`ForgotPasswordWidget`).
   L'Action `BuildPasswordResetUrlAction`
   ([contratto](../contracts/build-password-reset-url-action.md)) costruisce
   il link assoluto inserito nell'email: radice da `config('app.url')` (mai
   dall'header `Host`), prefisso di lingua della richiesta e `?email=` di
   precompilazione quando presente.
2. **Reset** — `/{lang}/password/reset/{token}` (`ResetPasswordWidget` /
   `PasswordResetConfirmWidget`).

Il modello della mail di reset è garantito da
`EnsureResetPasswordMailTemplateAction`
([contratto](../contracts/ensure-reset-password-mail-template-action.md)):
le variabili e il testo predefiniti sono quelli descritti nel contratto; il
super admin può sovrascriverli (vedi
[manuale-super-admin.md](./manuale-super-admin.md)).

Sul pannello admin esiste anche la voce **Reset Password**
(`PasswordResetResource`) per l'amministratore.

## Verifica email e conferma password

- `/{lang}/email/verify/{id}/{hash}` verifica l'email con URL firmato e
  firma temporanea (`signed` + `throttle:6,1`).
- `/{lang}/password/confirm` richiede la riconferma della password per le
  aree sensibili; la rotta attuale è un redirect a `/admin`
  (implementazione minima, non una schermata di conferma).
- Esistono inoltre le Action `ResendEmailVerificationAction` e
  `HasVerifiedIdentityAction` a supporto del flusso.

## Profilo, dispositivi e cronologia accessi

Le capacità esistono nel modulo, ma **non c'è una pagina FO «area
personale» completa dedicata all'utente finale** in `routes/`: il
self-service visibile è quello del pannello admin **«Il mio profilo»**
(`/user/admin/my-profile-page`, screenshot
`assets/user-admin-my-profile.webp`), che ogni utente autenticato del
pannello può usare per modificare nome, email e password.

Capacità lato dati (usate dal pannello e disponibili alle Action):

- **Dispositivi** — `GetCurrentDeviceAction`
  ([contratto](../contracts/get-current-device-action.md)) trova o crea la
  riga `Device` del browser/app che fa la richiesta (user agent, versione,
  `mobile_id` per le app mobile) e la riscrive a ogni chiamata. In
  amministrazione la gestione è in `DeviceResource`
  («Dispositivi», contatore in sidebar); l'utente vede i propri dati solo
  attraverso le sezioni Filament permesse (vedi
  [manuale-altre-figure.md](./manuale-altre-figure.md)).
- **Cronologia accessi** — ogni login è registrato in
  `authentication_logs` (`RecordAuthenticationLogAction`,
  `GetAuthenticationLogQueryForAuthenticatableAction`,
  [contratto authentication-log-query](../contracts/authentication-log-query-action.md)).
  L'utente può consultare i propri accessi dove il tema/risorsa lo espone;
  la consultazione completa è in `AuthenticationLogResource`
  («Authentication Logs», sidebar, contatore).
- **Storico aggregato** — `GetLoginHistoryAction`
  ([contratto](../contracts/get-login-history-action.md)) produce la serie
  bucket-per-giorno/mese usata dal widget dashboard «Accessi utenti».

> **Onestà documentale:** non esiste nel modulo una pagina FO
> «i miei dispositivi» / «i miei accessi» separata dal pannello. Se il sito
> ospitante la fornisce, vive nel tema o nell'applicazione ospitante, non qui.

## Social login (SSO)

Con i provider configurati l'utente può entrare con Google, Microsoft o
GitHub tramite `/{lang}/auth/login/{provider}`. Il callback crea o
aggancia l'utente (`CreateSocialiteUserAction`,
`RegisterSocialiteUserAction`) e applica i ruoli di default se previsti.
L'ammissione per dominio è controllata da `GetDomainAllowListAction` +
`IsUserAllowedAction` (vedi
[manuale-super-admin.md](./manuale-super-admin.md)).

## Errori comuni

| Sintomo | Causa probabile |
|---|---|
| `/{lang}/...` risponde 404 | lingua diversa da `it`/`en`, oppure pagina del tema non attiva in questo deploy |
| Login social non appare | provider non configurato: vedi [manuale-super-admin.md](./manuale-super-admin.md) |
| Link reset non apre la pagina | link costruito su `config('app.url')`: se l'URL pubblico non corrisponde, il reset va rifatto dopo la correzione |

## Fonti verificabili

- `routes/web_tall.php`, `routes/socialite.php`, `routes/auth.php` (blocco commentato).
- Contratti: `build-password-reset-url-action.md`, `get-current-device-action.md`,
  `get-login-history-action.md`, `ensure-reset-password-mail-template-action.md`,
  `authentication-log-query-action.md` in `docs/contracts/`.
- Widget: `app/Filament/Widgets/Auth/` (`RegisterWidget`, `LoginWidget`,
  `ForgotPasswordWidget`, `ResetPasswordWidget`, `SocialLoginWidget`).
