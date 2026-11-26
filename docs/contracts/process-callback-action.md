---
title: "Contratto — ProcessCallbackAction (callback OAuth)"
type: contract
action: "Modules\\User\\Actions\\Socialite\\ProcessCallbackAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, oauth, socialite, login, registrazione, autorizzazione]
---

# ProcessCallbackAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Socialite/ProcessCallbackAction.php`.
È la pagina Folio di ritorno da Google/Microsoft/Auth0 (`/{lang}/auth/login/{provider}/callback`, test `tests/Feature/Socialite/OauthCallbackFolioPageTest.php`):
decide **chi entra e chi viene registrato** dopo il consenso OAuth. Orchestra altre Action (`ValidateProviderAction`, `RetrieveOauthUserAction`,
[IsUserAllowedAction](is-user-allowed-action.md), `RetrieveSocialiteUserAction`, [LoginUserAction](login-user-action.md),
`IsRegistrationEnabledAction`, [RegisterSocialiteUserAction](register-socialite-user-action.md), [RegisterOauthUserAction](register-oauth-user-action.md)).

## Input

- `string $lang`: lingua dell'URL di ritorno.
- `string $provider`: nome del provider (`google`, `auth0`, …).
- Dalla sessione: `ProcessCallbackSession::KEY`, la lingua d'ingresso salvata alla partenza (letta e consumata con `session()->pull`).

## Output

- Sempre un `Illuminate\Http\RedirectResponse`: verso il login localizzato con un errore, oppure (da `LoginUserAction`) verso `intended('/')` con l'utente autenticato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-SOCIAL-CALLBACK-INV-1 | La lingua d'ingresso è letta e **consumata** dalla sessione e usata solo se è tra le lingue supportate; altrimenti vale `$lang` (righe 27-29). | `USER-SOCIAL-CALLBACK-INV-1` |
| USER-SOCIAL-CALLBACK-INV-2 | Un provider senza `client_id`, `client_secret` o `redirect` validi lancia `ProviderNotConfigured` prima di leggere l'utente OAuth (riga 31). | — (non dimostrato) |
| USER-SOCIAL-CALLBACK-INV-3 | Se il provider non restituisce un utente (stato non valido, consenso negato, `code` assente) il cittadino torna al login localizzato con `auth.login-failed`: nessun utente letto o creato (righe 32-35). | `USER-SOCIAL-CALLBACK-INV-3` |
| USER-SOCIAL-CALLBACK-INV-4 | Se `IsUserAllowedAction` rifiuta (dominio fuori allowlist), parte l'evento `UserNotAllowed` e si torna al login con `auth.user-not-allowed`: nessun login, nessuna creazione (righe 36-40). | — (non dimostrato) |
| USER-SOCIAL-CALLBACK-INV-5 | Un collegamento già esistente (`provider` + `provider_id`) porta direttamente al login, senza creare né cercare utenti per email (righe 42-45). | — (non dimostrato) |
| USER-SOCIAL-CALLBACK-INV-6 | Con `socialite.registration` falso e nessun collegamento, parte `RegistrationNotEnabled` e si torna al login con `auth.registration-not-enabled`: nessuna creazione (righe 46-50). | — (non dimostrato) |
| USER-SOCIAL-CALLBACK-INV-7 | Se esiste già un utente con la stessa email (`firstWhere(['email' => ...])`) il nuovo collegamento si aggancia a quell'utente; altrimenti si crea un utente nuovo (righe 52-57). | — (non dimostrato) |

## Effetti collaterali

In quest'ordine (ogni passo può terminare il flusso con un redirect):

1. Sessione: `pull(ProcessCallbackSession::KEY)` e `app()->setLocale()`.
2. Chiamata esterna al provider OAuth: `Socialite::driver($provider)->user()` (scambio del `code`), dentro `RetrieveOauthUserAction`.
3. Eventi `UserNotAllowed`, `RegistrationNotEnabled`, `InvalidState` (dispatch, non in coda per definizione di questa Action).
4. `RetrieveSocialiteUserAction`: `UPDATE socialite_users SET token` sul collegamento esistente.
5. Creazione: `INSERT users` + `INSERT socialite_users` in transazione ([RegisterOauthUserAction](register-oauth-user-action.md)) oppure solo `INSERT socialite_users` ([RegisterSocialiteUserAction](register-socialite-user-action.md)), con ruoli di default ([SetDefaultRolesBySocialiteUserAction](set-default-roles-by-socialite-user-action.md)).
6. Login: guard Filament `login($user)` ed evento `SocialiteUserConnected` ([LoginUserAction](login-user-action.md)); notifica Filament persistente per gli errori (`RedirectToLoginAction`).

## Errori

- `Modules\User\Exceptions\ProviderNotConfigured` (INV-2): non è catturata qui, risale alla pagina (la cattura il gestore eccezioni).
- `UnexpectedValueException`/`RuntimeException` di Action interne (email vuota nei dati OAuth in `GetUserModelAttributesFromSocialiteAction`) risalgono; durante la registrazione nuova annullano la transazione.
- Gli esiti «attesi» (INV-3, INV-4, INV-6) sono redirect, non eccezioni.

## Non fa

- Non verifica che l'email restituita dal provider sia **verificata** dal provider: si fida di `getEmail()`.
- Non assegna `email_verified_at` e non invia mail di verifica.
- Non sostituisce il login con password né applica il freno del login (`LoginWidget`).
- Non gestisce SPID/CIE: hanno controller propri nel tema ([UpsertUserFromDigitalIdentityAction](upsert-user-from-digital-identity-action.md)).

## Limiti noti

- Limite noto (rischio di presa di un account): INV-7 collega il provider a un utente locale con la stessa email **senza** che il provider abbia dichiarato l'email verificata e senza
  chiedere la password locale (`ProcessCallbackAction.php:54-57`). Con un provider che accetta email non verificate, chi la registra lì entra nell'account locale. Il controllo
  `canAccessSocialite()` che segue (righe 58-66) non protegge: i modelli di progetto lo implementano come `return true` (`app/Models/User.php:169-173`, `app/Models/Traits/HasSocialite.php:32-35`).
  Difetto da decidere con un umano.
- La stessa email in maiuscolo/minuscolo diversa dal record locale dipende dalla collation di `users.email`: nessuna normalizzazione qui.
- Le righe 58-66 (`canAccessSocialite`) sono oggi codice che non respinge mai nessuno con i modelli di progetto.
