---
title: "INDEX contratti — User"
type: index
module: User
owner: User
updated: 2026-11-26
qmd: "User contract INDEX invarianti copertura pest group USER-INV comando"
---

# INDEX contratti — User

Registro dei contratti sensibili (autenticazione, registrazione, OAuth, SPID/CIE, token): per ciascuno quanti invarianti ci sono e quali hanno un test con
`->group('<ID>')`. Tutti i comandi si eseguono da `laravel/`; un test con database richiede un database di test migrato. Elenco completo, scopo e backlog: [README](README.md).

| Classe | Contratto | Invarianti | Con group (numeri `INV-n`) | Comando di esempio |
|---|---|---|---|---|
| UpsertUserFromDigitalIdentityAction | [upsert-user-from-digital-identity-action](upsert-user-from-digital-identity-action.md) | 6 | 1, 2, 3, 4, 5 | `vendor/bin/pest --group=USER-SPID-UPSERT-INV-1` |
| ProcessCallbackAction | [process-callback-action](process-callback-action.md) | 7 | 1, 3 | `vendor/bin/pest --group=USER-SOCIAL-CALLBACK-INV-1` |
| LoginUserAction | [login-user-action](login-user-action.md) | 4 | 1, 3, 4 | `vendor/bin/pest --group=SOCIALITE-LOGIN-INV-1` |
| RegisterOauthUserAction | [register-oauth-user-action](register-oauth-user-action.md) | 3 | 1, 2 | `vendor/bin/pest --group=SOCIALITE-REGISTER-OAUTH-INV-1` |
| RegisterSocialiteUserAction | [register-socialite-user-action](register-socialite-user-action.md) | 3 | nessuno | — |
| SetDefaultRolesBySocialiteUserAction | [set-default-roles-by-socialite-user-action](set-default-roles-by-socialite-user-action.md) | 3 | 1, 2 | `vendor/bin/pest --group=SOCIALITE-DEFAULT-ROLES-INV-1` |
| IsUserAllowedAction | [is-user-allowed-action](is-user-allowed-action.md) | 3 | 1 | `vendor/bin/pest --group=SOCIALITE-ALLOWED-INV-1` |
| HasVerifiedIdentityAction | [has-verified-identity-action](has-verified-identity-action.md) | 5 | 1, 2, 3 | `vendor/bin/pest --group=USER-VERIFIED-INV-1` |
| BuildActiveUserProviderAction | [build-active-user-provider-action](build-active-user-provider-action.md) | 4 | 1, 2, 3, 4 | `vendor/bin/pest --group=USER-PROVIDER-INV-1` |
| RevokeUserAccessAction | [revoke-user-access-action](revoke-user-access-action.md) | 4 | 1, 2, 3 | `vendor/bin/pest --group=USER-REVOKE-INV-1` |
| RevokeAllUserTokensAction | [revoke-all-user-tokens-action](revoke-all-user-tokens-action.md) | 2 | 1, 2 | `vendor/bin/pest --group=PASSPORT-REVOKE-ALL-INV-1` |
| DeleteUserAction | [delete-user-action](delete-user-action.md) | 4 | 1 | `vendor/bin/pest --group=DELETE-USER-INV-1` |
| SendOtpByUserAction | [send-otp-by-user-action](send-otp-by-user-action.md) | 3 | 1, 2 | `vendor/bin/pest --group=USER-OTP-SEND-INV-1` |
| ConsumeAuthSubmissionSlotAction | [consume-auth-submission-slot-action](consume-auth-submission-slot-action.md) | 4 | 1, 2, 3, 4 | `vendor/bin/pest --group=USER-AUTH-THROTTLE-INV-1` |
| RecordAuthenticationLogAction | [record-authentication-log-action](record-authentication-log-action.md) | 4 | 1, 3 | `vendor/bin/pest --group=USER-AUTHLOG-INV-1` |

Un invariante è dimostrato solo se esiste un test con `->group('<ID>')` (`rg -n "group\('<ID>'" Modules/User/tests`); un test che prova il comportamento senza il group conta come non dimostrato.
Il prefisso dell'ID segue il contratto (`USER-<AREA>-INV-n` per i contratti nuovi; i contratti ereditati mantengono `SOCIALITE-*`, `DELETE-USER-*`, `PASSPORT-*`).
