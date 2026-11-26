---
title: "Contratti — modulo User"
type: index
module: User
tags: [contracts, actions, user, autenticazione]
created: 2026-11-18
updated: 2026-11-26
owner: User
qmd: "User contract comportamentali autenticazione ruoli permessi SPID CIE invarianti pest group copertura backlog"
---

# Contratti del modulo User

Un contratto descrive cosa **promette** un'Action (input, output, invarianti con ID stabile, effetti collaterali, errori, cosa non fa) e distingue il
**promesso** dal **dimostrato**: la colonna `Group Pest` contiene l'ID solo se esiste un test con `->group('<ID>')`
(`cd laravel && vendor/bin/pest --group=<ID>`), altrimenti «— (non dimostrato)». Regola e formato:
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md), ADR [0012](../../../Xot/docs/adr/0012-behavioral-contract-governance.md).
Un file per Action, nome in kebab-case della classe, sei sezioni nell'ordine `Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`;
il docblock della classe contiene `@see` e `@contract docs/contracts/<file>.md`. Scheletro: [_template](_template.md). Perché le scelte di User sono quelle:
[ADR del modulo](../adr/README.md).

## Stato di copertura (misurato il 2026-11-26)

| Misura | Valore |
|---|---|
| Contratti con `action:` valido e classe esistente | 78 (84 file `.php` in `app/Actions`; i 6 senza contratto sono elencati nel backlog) |
| Invarianti con ID | 208 |
| Invarianti dimostrate (group Pest) | 36 (17%) |
| Invarianti non dimostrate | 172 |
| Contratti riscritti e verificati contro il codice il 2026-11-26 | 15 (sezione «Contratti sensibili»): 36/59 invarianti dimostrate |
| Bozze ereditate dal merge con `laraxot/dev` | 63: 0/149 invarianti dimostrate; sei sezioni e tabella portate al formato, controllate a campione (`create-client`, `revoke-token`), non rilette una per una |

I group sono stati aggiunti il 2026-11-26 ai test che provano davvero l'invariante (solo l'annotazione `->group()`, nessun test nuovo). Un gruppo non garantisce che il test sia verde:
i test con database richiedono un database di test migrato e non sono stati eseguiti in questo passaggio (nessuna esecuzione Pest, per non scrivere sul database di sviluppo).

## Contratti sensibili (verificati)

Autenticazione, registrazione, OAuth, identità SPID/CIE, token, ruoli: chi può fare cosa. Ogni riga è stata riletta contro il sorgente e i test.

| Contratto | Scopo | Invarianti dimostrate |
|---|---|---|
| [UpsertUserFromDigitalIdentityAction](upsert-user-from-digital-identity-action.md) | Trova o crea l'utente SPID/CIE per codice fiscale; collega per email solo se verificata. | 5/6 |
| [ProcessCallbackAction](process-callback-action.md) | Ritorno OAuth: decide chi entra e chi viene registrato dopo il consenso del provider. | 2/7 |
| [LoginUserAction](login-user-action.md) | Apre la sessione per l'utente collegato al provider; rifiuta l'account cancellato. | 3/4 |
| [RegisterOauthUserAction](register-oauth-user-action.md) | Crea in transazione un nuovo utente e il collegamento OAuth per un cittadino sconosciuto. | 2/3 |
| [RegisterSocialiteUserAction](register-socialite-user-action.md) | Collega un provider OAuth a un utente locale già esistente (stessa email). | 0/3 |
| [SetDefaultRolesBySocialiteUserAction](set-default-roles-by-socialite-user-action.md) | Assegna ruoli di default in base al dominio dell'email del provider. | 2/3 |
| [IsUserAllowedAction](is-user-allowed-action.md) | Allowlist dei domini email ammessi al login OAuth. | 1/3 |
| [HasVerifiedIdentityAction](has-verified-identity-action.md) | Cancello «identità verificata»: email verificata oppure accesso `spid`/`cie`. | 3/5 |
| [BuildActiveUserProviderAction](build-active-user-provider-action.md) | Provider utenti che esclude gli account cancellati (`deleted_at`). | 4/4 |
| [RevokeUserAccessAction](revoke-user-access-action.md) | Revoca token Passport, refresh token e cookie «ricordami» alla cancellazione dell'account. | 3/4 |
| [RevokeAllUserTokensAction](revoke-all-user-tokens-action.md) | Revoca in blocco gli access token Passport di un utente (admin Filament). | 2/2 |
| [DeleteUserAction](delete-user-action.md) | Cancellazione fisica dell'account con conferma password (percorso legacy del modulo User). | 1/4 |
| [SendOtpByUserAction](send-otp-by-user-action.md) | Sostituisce la password con un OTP hashato e lo manda per email. | 2/3 |
| [ConsumeAuthSubmissionSlotAction](consume-auth-submission-slot-action.md) | Conta un invio di registrazione/recupero password per IP ed email (freno anti-bot). | 4/4 |
| [RecordAuthenticationLogAction](record-authentication-log-action.md) | Scrive il registro degli accessi senza mai rompere il login. | 2/4 |

## Altri contratti (bozze ereditate)

| Contratto | Scopo | Invarianti dimostrate |
|---|---|---|
| [AnalyzeSocialiteEmailDomainAction](analyze-socialite-email-domain-action.md) | Dice se la email di un utente SSO appartiene al dominio di primo livello (`first_party`) o a quello cliente (`client`) configurati per il provider. Co | 0/3 |
| [AuthenticationLogQueryAction](authentication-log-query-action.md) | Costruisce la query dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Activity/AuthenticationLogQueryAction.php:15-25`. | 0/2 |
| [BuildApiLoginLimitAction](build-api-login-limit-action.md) | Costruisce il limite di frequenza del `POST /api/user/login` (D-08, DCP-282), registrato come limiter `user-login` in `UserServiceProvider`. Codice: ` | 0/3 |
| [BuildPasswordResetUrlAction](build-password-reset-url-action.md) | Costruisce l'URL assoluto del link di reset password inserito nell'email (SEC-007). Codice: `app/Actions/Auth/BuildPasswordResetUrlAction.php:16-42`. | 0/4 |
| [CreateClientAction](create-client-action.md) | Crea e salva un client OAuth2 Passport (`oauth_clients`). Codice: `app/Actions/Passport/CreateClientAction.php`. | 0/3 |
| [CreateGenericClientAction](create-generic-client-action.md) | Crea e salva un client OAuth2 Passport con i flag di tipo passati dal chiamante. È la base usata da `CreatePasswordClientAction` e `CreatePersonalAcce | 0/2 |
| [CreatePasswordClientAction](create-password-client-action.md) | Crea un client OAuth2 di tipo *password grant* delegando a `CreateGenericClientAction` con `password: true` e `personalAccess: false`. Codice: `app/Ac | 0/2 |
| [CreatePersonalAccessClientAction](create-personal-access-client-action.md) | Crea un client OAuth2 di tipo *personal access* delegando a `CreateGenericClientAction` con `personalAccess: true` e `password: false`. Codice: `app/A | 0/1 |
| [CreateSocialiteUserAction](create-socialite-user-action.md) | Crea il record `SocialiteUser` che collega un utente locale a un'identità del provider OAuth. Codice: `app/Actions/Socialite/CreateSocialiteUserAction | 0/2 |
| [CreateUserAction](create-user-action.md) | Crea un nuovo utente con nome, email e password hashata; include due passi che oggi sono solo log. Codice: `app/Actions/CreateUserAction.php` (namespa | 0/3 |
| [EnsureResetPasswordMailTemplateAction](ensure-reset-password-mail-template-action.md) | Garantisce il template `reset-password` della mail di reimpostazione password, in tutte le lingue del sito (DCP-285, D-05). Codice: `app/Actions/Auth/ | 0/4 |
| [GetAuthenticationLogQueryAction](get-authentication-log-query-action.md) | Restituisce il query builder dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Auth/GetAuthenticationLogQueryAction.php:15-2 | 0/1 |
| [GetAuthenticationLogQueryForAuthenticatableAction](get-authentication-log-query-for-authenticatable-action.md) | Restituisce il query builder dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Authentication/GetAuthenticationLogQueryForAu | 0/1 |
| [GetCurrentDeviceAction](get-current-device-action.md) | Trova o crea la riga `Device` del dispositivo che sta facendo la richiesta, e ne aggiorna browser e versione. Codice: `app/Actions/GetCurrentDeviceAct | 0/3 |
| [GetDomainAllowListAction](get-domain-allow-list-action.md) | Restituisce la lista dei domini ammessi al login SSO da `config('socialite.domain_allowlist')`, normalizzata. Codice: `app/Actions/Socialite/GetDomain | 0/2 |
| [GetGuardAction](get-guard-action.md) | Restituisce il guard di autenticazione indicato da `config('filament.auth.guard')`. Codice: `app/Actions/Socialite/GetGuardAction.php`. | 0/1 |
| [GetLoginHistoryAction](get-login-history-action.md) | Serie storica degli accessi, bucket per giorno o per mese, letta da `authentication_logs`. Codice: `app/Actions/Login/GetLoginHistoryAction.php:23-113 | 0/4 |
| [GetLoginRedirectRouteAction](get-login-redirect-route-action.md) | Restituisce il nome di rotta verso cui reindirizzare dopo il login SSO. Codice: `app/Actions/Socialite/GetLoginRedirectRouteAction.php`. | 0/1 |
| [GetLoginStatsAction](get-login-stats-action.md) | Statistiche di accesso per il widget di monitoraggio: totale, oggi, ieri, ultimi 7 e 30 giorni, variazione e trend a 7 giorni. Codice: `app/Actions/Lo | 0/4 |
| [GetMissingProviderSettingsAction](get-missing-provider-settings-action.md) | Elenca le variabili d'ambiente che mancano, o sono segnaposto, perché un provider OAuth sia utilizzabile. Codice: `app/Actions/Socialite/GetMissingPro | 0/2 |
| [GetNewPasswordAction](get-new-password-action.md) | Genera una nuova password temporanea pronunciabile, ne salva l'hash sull'utente e restituisce il valore in chiaro da comunicare una sola volta. Codice | 0/3 |
| [GetPermissionModelAction](get-permission-model-action.md) | Restituisce il nome della classe modello dei permessi, da config, con default Spatie. Codice: `app/Actions/GetPermissionModelAction.php:11-24`. | 0/2 |
| [GetPostLoginUrlAction](get-post-login-url-action.md) | Restituisce la pagina d'arrivo dopo login e registrazione quando nessuna pagina l'ha richiesta: l'area personale localizzata. Codice: `app/Actions/Aut | 0/2 |
| [GetProviderButtonsAction](get-provider-buttons-action.md) | Dovrebbe restituire i pulsanti di login per i provider. Oggi restituisce sempre una lista vuota. Codice: `app/Actions/Socialite/GetProviderButtonsActi | 0/1 |
| [GetProviderRedirectUriAction](get-provider-redirect-uri-action.md) | Restituisce l'URI di callback da registrare presso il provider, costruito nella lingua predefinita e non in quella della pagina. Codice: `app/Actions/ | 0/2 |
| [GetProviderScopesAction](get-provider-scopes-action.md) | Restituisce gli scope OAuth configurati per un provider in `config('services.<provider>.scopes')`. Codice: `app/Actions/Socialite/GetProviderScopesAct | 0/2 |
| [GetProviderSetupGuideAction](get-provider-setup-guide-action.md) | Prepara i segnaposto del testo di guida `user::auth.provider-setup-guide`: nome del provider, variabili mancanti, console per creare le credenziali, U | 0/3 |
| [GetUserModelAttributesFromSocialiteAction](get-user-model-attributes-from-socialite-action.md) | Traduce l'identità OAuth in un DTO di attributi per il modello utente, con validazioni esplicite. Codice: `app/Actions/Socialite/GetUserModelAttribute | 0/4 |
| [GetUserTeamsOptionAction](get-user-teams-option-action.md) | Costruisce le opzioni di una Select con i team dell'utente corrente. Codice: `app/Actions/Team/GetUserTeamsOptionAction.php:10-31`. | 0/3 |
| [HashOtpValueAction](hash-otp-value-action.md) | Calcola l'hash di un valore OTP con l'hasher Illuminate. Codice: `app/Actions/Otp/HashOtpValueAction.php:10-21`. | 0/1 |
| [IsNotificationSchemaReadableAction](is-notification-schema-readable-action.md) | Verifica che la tabella `notifications` esista sulla connessione del modello prima di interrogarla dal front office. Codice: `app/Actions/Notification | 0/2 |
| [IsProviderConfiguredAction](is-provider-configured-action.md) | Dice se un provider OAuth ha tutte le impostazioni reali. Codice: `app/Actions/Socialite/IsProviderConfiguredAction.php`. | 0/1 |
| [IsRegistrationEnabledAction](is-registration-enabled-action.md) | Dice se la registrazione di nuovi utenti via SSO è abilitata. Codice: `app/Actions/Socialite/IsRegistrationEnabledAction.php`. | 0/1 |
| [IsUserDatabaseConfiguredAction](is-user-database-configured-action.md) | Dice se la connessione `user` ha un database configurato, senza aprirla. Codice: `app/Actions/Database/IsUserDatabaseConfiguredAction.php:23-33`. | 0/2 |
| [LogRegistrationAction](log-registration-action.md) | Scrive nel log di attività la registrazione di un nuovo utente. Codice: `app/Actions/Activity/LogRegistrationAction.php:10-28`. | 0/2 |
| [LogoutUserAction](logout-user-action.md) | Chiude l'accesso di un utente: revoca il suo access token Passport e i refresh token collegati, e marca il logout sui dispositivi. Codice: `app/Action | 0/3 |
| [OtpHashNeedsRehashAction](otp-hash-needs-rehash-action.md) | Dice se un hash OTP va ricalcolato con l'algoritmo corrente. Codice: `app/Actions/Otp/OtpHashNeedsRehashAction.php:10-21`. | 0/1 |
| [RecordLoginPulseAction](record-login-pulse-action.md) | Registra un accesso nel contatore aggregato di Laravel Pulse. Codice: `app/Actions/Login/RecordLoginPulseAction.php:10-22`. | 0/2 |
| [RedirectToLoginAction](redirect-to-login-action.md) | Riporta l'utente alla pagina di login FO con un messaggio di errore, mostrato sia come notifica Filament sia come errore sul campo `email`. Codice: `a | 0/3 |
| [RegenerateClientSecretAction](regenerate-client-secret-action.md) | Sostituisce il `secret` di un client OAuth2 con uno nuovo casuale e lo restituisce in chiaro. Codice: `app/Actions/Passport/RegenerateClientSecretActi | 0/2 |
| [RememberLoginReturnUrlAction](remember-login-return-url-action.md) | Ricorda la pagina che ha mandato l'utente al login, così che `redirectIntended()` lo riporti indietro. Codice: `app/Actions/Auth/RememberLoginReturnUr | 0/4 |
| [ResendEmailVerificationAction](resend-email-verification-action.md) | Reinvia la mail di verifica dell'indirizzo, senza verificare nulla (DCP-285, D-04). Codice: `app/Actions/Auth/ResendEmailVerificationAction.php:16-33` | 0/2 |
| [GetExclusionsConfigurationAction](resolve-exclusions-configuration-action.md) | Legge da `config/filament-shield.php` la configurazione delle esclusioni (generale, risorse, pagine, widget) e la normalizza. Codice: `app/Actions/Shi | 0/2 |
| [GetFilamentUserConfigurationAction](resolve-filament-user-configuration-action.md) | Riassume la configurazione del ruolo "filament user" di Shield, leggendola da `FilamentShieldData`. Codice: `app/Actions/Shield/GetFilamentUserConfigu | 0/2 |
| [GetNotifiableEmailAction](resolve-notifiable-email-action.md) | Risolve l'indirizzo a cui spedire le email di autenticazione (reset password, verifica email). Codice: `app/Actions/Auth/GetNotifiableEmailAction.php: | 0/3 |
| [GetPermissionsConfigurationAction](resolve-permissions-configuration-action.md) | Raccoglie in un array la configurazione di permessi ed entità di Filament Shield (prefissi, flag di entità, modelli Role/Permission) e fornisce due he | 0/2 |
| [GetShieldAuthenticationConfigurationAction](resolve-shield-authentication-configuration-action.md) | Riassume guard e modello di autenticazione usati da Filament Shield. Codice: `app/Actions/Shield/GetShieldAuthenticationConfigurationAction.php`. | 0/3 |
| [GetShieldResourceConfigurationAction](resolve-shield-resource-configuration-action.md) | Riassume la configurazione della risorsa Shield (slug, navigazione, ricerca globale) e verifica se la RoleResource è pubblicata. Codice: `app/Actions/ | 0/3 |
| [GetSuperAdminConfigurationAction](resolve-super-admin-configuration-action.md) | Riassume la configurazione del super admin di Filament Shield (abilitazione, nome, definizione via gate, stato di intercettazione del gate). Codice: ` | 0/1 |
| [GetUserNameFieldsFromSocialiteAction](resolve-user-name-fields-from-socialite-action.md) | Ricava nome e cognome da un'identità OAuth, con tre fonti in ordine: attributo `name`, campo `name` dei dati grezzi, parte locale dell'email. Codice:  | 0/3 |
| [RetrieveOauthUserAction](retrieve-oauth-user-action.md) | Completa lo scambio OAuth con il provider e restituisce l'utente. Su `InvalidStateException` dispatcha `InvalidState` e ritorna `null`. Codice: `app/A | 0/2 |
| [RetrieveSocialiteUserAction](retrieve-socialite-user-action.md) | Cerca il collegamento SSO per provider e id esterno e ne aggiorna il campo `token` con il token ricevuto dal provider. Codice: `app/Actions/Socialite/ | 0/3 |
| [RevokeClientAction](revoke-client-action.md) | Marca un client OAuth2 come revocato e, se richiesto, revoca in blocco i suoi access token. Codice: `app/Actions/Passport/RevokeClientAction.php`. | 0/3 |
| [RevokeRefreshTokenAction](revoke-refresh-token-action.md) | Revoca un singolo refresh token Passport. Codice: `app/Actions/Passport/RevokeRefreshTokenAction.php`. | 0/2 |
| [RevokeTokenAction](revoke-token-action.md) | Revoca un access token Passport e, se presente, il suo refresh token. Codice: `app/Actions/Passport/RevokeTokenAction.php`. | 0/3 |
| [GetPermissionModelAction](shield-get-permission-model-action.md) | Restituisce il FQCN del modello Permission da usare, letto da `config('permission.models.permission')` con default `Spatie\Permission\Models\Permissio | 0/2 |
| [ShieldUtilsAction](shield-utils-action.md) | Contenitore legacy di una cinquantina di metodi statici che leggono la configurazione di Filament Shield. Il `execute()` d'istanza non fa nulla. Il do | 0/3 |
| [CreateUserAction](socialite-create-user-action.md) | Crea un utente locale a partire dagli attributi dell'identità OAuth, gli assegna i ruoli di default e restituisce l'istanza aggiornata. Codice: `app/A | 0/3 |
| [StoreIntendedUrlAction](store-intended-url-action.md) | Ricorda la pagina a cui tornare dopo il login, per gli ospiti che non passano dal middleware `auth` (CMT-022). Codice: `app/Actions/Auth/StoreIntended | 0/3 |
| [UpdateUserAction](update-user-action.md) | Aggiorna un utente dentro una transazione: esclude i campi di sistema, gestisce password ed email, valida l'unicità dell'email e rilegge il modello. C | 0/4 |
| [CreateUserAction](user-create-user-action.md) | Crea un utente dal form di registrazione, riempiendo il campo `name` quando manca (NOT NULL senza default). Codice: `app/Actions/User/CreateUserAction | 0/3 |
| [ValidateProviderAction](validate-provider-action.md) | Si assicura che il provider OAuth sia configurato, altrimenti lancia `ProviderNotConfigured`. Codice: `app/Actions/Socialite/ValidateProviderAction.ph | 0/2 |
| [VerifyOtpHashAction](verify-otp-hash-action.md) | Verifica che un valore OTP in chiaro corrisponda all'hash salvato. Codice: `app/Actions/Otp/VerifyOtpHashAction.php:10-21`. | 0/1 |

I file `resolve-*-action.md` documentano le Action rinominate `Get*Action` (ADR Xot [0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md)): il nome
del file resta quello citato dal docblock `@contract`, il campo `action:` punta alla classe attuale.

## Backlog contract

Action in `app/Actions` senza contratto (nessuna scrive dati o chiama servizi esterni):

| File | Motivo |
|---|---|
| `Filament/NormalizeFormSchemaAction.php` | normalizza uno schema di form in memoria; nessun effetto esterno |
| `Login/Concerns/ResolvesLoginLogQuery.php` | trait di supporto, non è un'Action |
| `Otp/Hasher.php` | adattatore di hashing senza stato |
| `Socialite/ProcessCallbackSession.php` | contiene la chiave di sessione `KEY` (coperta da [process-callback-action](process-callback-action.md)) |
| `Socialite/Utils/EmailDomainAnalyzer.php` | riconoscimento del dominio che decide i ruoli di default: coperto indirettamente da [set-default-roles-by-socialite-user-action](set-default-roles-by-socialite-user-action.md); un contratto proprio è utile se la configurazione `email_domains` viene attivata |
| `Socialite/Utils/UserNameFieldsResolver.php` | ricava nome e cognome dai dati del provider; coperta da [resolve-user-name-fields-from-socialite-action](resolve-user-name-fields-from-socialite-action.md) |

Da rileggere contro il codice per prime, tra le bozze ereditate (scrivono dati personali o credenziali): `create-client-action`, `create-generic-client-action`,
`create-password-client-action`, `create-personal-access-client-action`, `regenerate-client-secret-action`, `revoke-client-action`, `revoke-token-action`,
`revoke-refresh-token-action` (client e token Passport); `logout-user-action`, `update-user-action`, `create-user-action`, `user-create-user-action`,
`socialite-create-user-action`, `get-new-password-action` (utenti e password); `resend-email-verification-action`, `ensure-reset-password-mail-template-action` (posta).

## Backlog test

Invarianti non dimostrate dei contratti sensibili (ognuna ha bisogno di un test nuovo o di un'annotazione su un test che oggi non esiste):

| Contratto | Invarianti senza group |
|---|---|
| [UpsertUserFromDigitalIdentityAction](upsert-user-from-digital-identity-action.md) | USER-SPID-UPSERT-INV-6 |
| [ProcessCallbackAction](process-callback-action.md) | USER-SOCIAL-CALLBACK-INV-2, USER-SOCIAL-CALLBACK-INV-4, USER-SOCIAL-CALLBACK-INV-5, USER-SOCIAL-CALLBACK-INV-6, USER-SOCIAL-CALLBACK-INV-7 |
| [LoginUserAction](login-user-action.md) | SOCIALITE-LOGIN-INV-2 |
| [RegisterOauthUserAction](register-oauth-user-action.md) | SOCIALITE-REGISTER-OAUTH-INV-3 |
| [RegisterSocialiteUserAction](register-socialite-user-action.md) | SOCIALITE-REGISTER-SU-INV-1, SOCIALITE-REGISTER-SU-INV-2, SOCIALITE-REGISTER-SU-INV-3 |
| [SetDefaultRolesBySocialiteUserAction](set-default-roles-by-socialite-user-action.md) | SOCIALITE-DEFAULT-ROLES-INV-3 |
| [IsUserAllowedAction](is-user-allowed-action.md) | SOCIALITE-ALLOWED-INV-2, SOCIALITE-ALLOWED-INV-3 |
| [HasVerifiedIdentityAction](has-verified-identity-action.md) | USER-VERIFIED-INV-4, USER-VERIFIED-INV-5 |
| [RevokeUserAccessAction](revoke-user-access-action.md) | USER-REVOKE-INV-4 |
| [DeleteUserAction](delete-user-action.md) | DELETE-USER-INV-2, DELETE-USER-INV-3, DELETE-USER-INV-4 |
| [SendOtpByUserAction](send-otp-by-user-action.md) | USER-OTP-SEND-INV-3 |
| [RecordAuthenticationLogAction](record-authentication-log-action.md) | USER-AUTHLOG-INV-2, USER-AUTHLOG-INV-4 |

Casi particolari:

- `login-user-action` (SOCIALITE-LOGIN-INV-2): esistono due test («throws when related user is not authenticatable») ma sono rossi, perché confrontano il messaggio
  `User instance must implement Authenticatable.` mentre il codice lancia `User instance must implement Authenticatable and UserContract.`
  (`LoginUserAction.php:44`). Va allineato il test, poi si può annotare.
- `set-default-roles-by-socialite-user-action` (INV-3): il test «assigns default roles for first party domain» chiude con `assertGreaterThanOrEqual(0, ...)`, sempre vero.
- `record-authentication-log-action` (INV-1, INV-3): i due group sono su test source-level che leggono il sorgente, non eseguono l'Action.
- `process-callback-action` (INV-1, INV-3): il test prova lettura/consumo della lingua e il redirect 302 senza `code`, non il ripiego su `$lang` né la chiave del messaggio.

Per le bozze ereditate, gli ID senza group sono elencati nella tabella `Invarianti` di ciascun file.

## Difetti di codice emersi (non corretti: solo documentazione)

- `UpsertUserFromDigitalIdentityAction.php:77`: un utente trovato per email verificata con un `fiscal_code` diverso viene sovrascritto col nuovo codice fiscale.
- `ProcessCallbackAction.php:54-57` con `canAccessSocialite()` sempre vero (`app/Models/User.php:169-173`): un provider che accetta email non verificate può agganciarsi a un account locale con la stessa email.
- `SetDefaultRolesBySocialiteUserAction.php:57-64`: con `role_names_search` vuoto su un dominio riconosciuto si assegnano tutti i ruoli della guard.
- `config/socialite.php:11,14`: allowlist vuota e registrazione abilitata di serie.
- `DeleteUserAction.php:43`: cancellazione fisica senza revoca dei token; `DeleteAccountWidget.php:52` scarta il risultato.

## Altri file della cartella

- [INDEX](../../archive/docs-legacy/contracts/INDEX.md): elenco alfabetico dei file di contratto. [index](index.md): registro dei contratti sensibili con i comandi per i group.
- `hasteamsandusercontract.md` e `teamcontract.md` (con le copie `.bak`): appunti sulle interfacce `HasTeamsAndUserContract` e `TeamContract`, `type: concept` e senza invarianti: non sono contratti di Action e l'audit li segnala. Proposta: spostarli in `docs/models/` (non spostati in questo passaggio).
