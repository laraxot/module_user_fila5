---
title: "INDEX — User"
type: index
status: active
created: 2026-11-23
updated: 2026-11-23
decision-makers: []
---

<!-- File: docs/contracts/INDEX.md · formato MADR breve. -->
# <!-- Titolo: indice operativo User -->

## Context and Problem Statement

Definisce i contratti per i dati utente e le relazioni team-utente. Chiudi con la domanda su come gestire gli utenti nel sistema.

## Driver della decisione

- Privacy: ogni utente deve avere un'identità verificata (`HasVerifiedIdentityAction`).
- Team membership: gestione ruoli e permessi granulari (`HasTeamsAndUserContract`).

## Alternative considerate

- Usare `UserContract` base; estendere per funzionalità aggiuntive.
- Non duplicare contratti per codici non esistenti.

## Decisione

Scelta: **UserContract + HasTeamsContract**, perché centralizza gestione utenti e team senza duplicare contratti.

### Consequenze

- Positiva: gestione completa utenti e team in un'unica interfaccia.
- Negativa/debito: richiede implementazione di metodi specifici e test associati.

### Confirmation

`vendor/bin/pest Modules/User/tests/Unit/...` e test unitari per UserContract.

| Operazione | Contract | Classe | Invarianti |
|---|---|---|---|
| Create user | hasverified-identity-action | `App\Actions\User\HasVerifiedIdentityAction` | USER-IDV-INV-1..3 |
| Add user to team | hasteamsandusercontract | `HasTeamsAndUserContract` | TEAM-USER-INV-1..4 |
| Get owner | teamcontract | `UserContract` | USER-OWNER-INV-1 |
| Remove user from team | hasteamsandusercontract | `HasTeamsContract` | TEAM-REMOVE-INV-1 |
