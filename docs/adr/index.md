---
title: "Indice degli ADR — User"
type: index
module: User
status: active
updated: 2026-11-27
---

# Indice degli ADR — User

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-auth-submission-throttle-before-validation](0001-auth-submission-throttle-before-validation.md) | accepted | Registrazione e recupero password contano ogni invio per IP ed email, prima di validare; chiavi hashate. | Sì: `--group=USER-AUTH-THROTTLE-INV-1..4`; l'ordine nei widget è solo revisione |
| [0002-authentication-log-never-breaks-login](0002-authentication-log-never-breaks-login.md) | accepted | Il registro degli accessi sta sulla connessione `user`; tabella o connessione assenti sono un warning, mai un 500. | Parziale: test source-level, group `USER-AUTHLOG-INV-1`, `-3`; il runtime non è provato |
| [0003-deleted-account-blocked-in-user-provider](0003-deleted-account-blocked-in-user-provider.md) | superseded da 0004 | Stessa decisione di 0004 (duplicato storico). | Rinvia a 0004 |
| [0004-deleted-accounts-are-filtered-by-auth-provider](0004-deleted-accounts-are-filtered-by-auth-provider.md) | accepted | Filtro `deleted_at IS NULL` in un `EloquentUserProvider` dedicato; revoca di token e remember token alla cancellazione. | Sì: `--group=USER-PROVIDER-INV-1..4`, `USER-REVOKE-INV-1..3` (database di test) |
| [0005-digital-identity-upsert-by-fiscal-code](0005-digital-identity-upsert-by-fiscal-code.md) | accepted | L'utente SPID/CIE si riconosce dal codice fiscale; l'email solo se verificata; segnaposto `@noemail.local`. | Sì: `--group=USER-SPID-UPSERT-INV-1..5` |
| [0006-frontoffice-login-page-ownership](0006-frontoffice-login-page-ownership.md) | accepted (contraddetto dal codice) | La logica di login resta nel `LoginWidget`; la resa della pagina segue il tema; il fallback del modulo monta lo stesso widget. | `rg 'wire:submit="authenticate"'` oggi trova 1 occorrenza: fallisce |
| [0007-user-owns-identity-and-roles](0007-user-owns-identity-and-roles.md) | accepted | User possiede identità, autenticazione, ruoli, permessi e team; gli altri moduli usano policy e contratti User. | Revisione; nessun controllo automatico |

Formato e regole: [README](README.md).
