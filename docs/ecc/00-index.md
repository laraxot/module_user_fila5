---
title: "ECC — indice operativo User"
type: index
status: in-progress
updated: 2026-11-16
module: User
<<<<<<< .merge_file_iCgYDi
qmd: "ECC indice User verification gates"
=======
qmd: "ECC indice User verification gates esito"
>>>>>>> .merge_file_3gISC3
---

# ECC — modulo User

Collega le verifiche ECC al workflow PTVX (BMAD → lock → fix → PHPStan/Pest → docs).

| Controllo | Stato | Evidenza |
|---|---|---|
<<<<<<< .merge_file_iCgYDi
| Inventario statico | verificato | ../bmad/audits/user-audit.md |
| PHPStan | 0 su tree Modules (2026-11-16) | comando in audit |
| Pest | pending | ambiente testing |
| Security review | pending | story figlie P0/P1 |
| Docs pack | aggiornato | questo indice + audit ECC |
=======
| Inventario statico | verificato (2026-11-16) | [audit](../bmad/audits/user-audit.md) |
| PHPStan `Modules/User` | 0 errori | `phpstan analyse Modules/User` (17:08) |
| Pest | skip documentato | DB test `10.100.200.53` irraggiungibile + `TestDatabaseGuard` |
| Security review | P0 aperti | P0-U1/P0-U2 verificati a runtime (script mock): escalation `user::admin` |
| Docs pack | aggiornato | audit, epics, decision-log, brainstorming, story |
>>>>>>> .merge_file_3gISC3

Dettaglio: [user-ecc-audit.md](./user-ecc-audit.md)
