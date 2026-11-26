---
title: "INDEX ADR — User"
type: index
module: User
owner: User
updated: 2026-11-26
qmd: "User ADR INDEX stato decisioni"
---

# INDEX ADR — User

| ADR | Stato | Sintesi |
|---|---|---|
| [0001](0001-auth-submission-throttle-before-validation.md) | accepted | Registrazione e recupero password si frenano per IP ed email prima di validare |
| [0002](0002-authentication-log-never-breaks-login.md) | accepted | Il registro degli accessi sta sulla connessione `user` e non rompe mai il login |
| [0003](0003-deleted-account-blocked-in-user-provider.md) | superseded (da 0004) | L'account cancellato si blocca nel provider utenti, non con SoftDeletes |
| [0004](0004-deleted-accounts-are-filtered-by-auth-provider.md) | accepted | Gli account cancellati si escludono nel provider di autenticazione |
| [0005](0005-digital-identity-upsert-by-fiscal-code.md) | accepted | L'utente SPID/CIE si riconosce dal codice fiscale, poi dall'email verificata |
| [0006](0006-frontoffice-login-page-ownership.md) | accepted | La pagina login del front office segue il tema (contraddetto dal codice: vedi Stato attuale) |
| [0007](0007-user-owns-identity-and-roles.md) | accepted | User possiede identità, ruoli e team |

Formato, copertura e decisioni aperte: [README](README.md).
