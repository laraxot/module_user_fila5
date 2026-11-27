---
title: "ADR — modulo User"
type: index
tags: [adr, decisioni, user, autenticazione]
created: 2026-11-18
updated: 2026-11-24
---

# ADR del modulo User

Il **perché** delle scelte di autenticazione e identità: come si riconosce un utente che entra con SPID/CIE, dove si
blocca un account cancellato, come si frenano i moduli aperti agli anonimi, perché l'audit degli accessi non può
rompere il login.

Leggili prima di toccare `app/Actions/Auth/*`, i widget di login/registrazione o il provider utenti, e prima di
"semplificare" un controllo che sembra ridondante. Formato e regole: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Decisioni

- [L'utente SPID/CIE si riconosce dal codice fiscale](digital-identity-upsert-by-fiscal-code.md) — CF prima, email solo se verificata, segnaposto `@noemail.local`.
- [L'account cancellato si blocca nel provider utenti](deleted-account-blocked-in-user-provider.md) — filtro `deleted_at` nel provider, niente `SoftDeletes`, token revocati.
- [Freno per IP ed email prima di validare](auth-submission-throttle-before-validation.md) — registrazione e recupero password contano ogni invio, chiavi hashate.
- [Il registro degli accessi non rompe mai il login](authentication-log-never-breaks-login.md) — connessione `user`, tabella assente = warning.

## Decisioni precedenti (formato libero, non ancora ADR)

- [contracts-and-lang-backup-archival](../wiki/decisions/contracts-and-lang-backup-archival.md)
- [archiviazione orfani (ponytail audit)](../wiki/decisions/contracts-and-lang-backup-archival-archiviazione-orfani-ponytail-audit.md)
