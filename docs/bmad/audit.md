---
title: "Audit BMAD — User"
type: audit
status: review
updated: 2026-11-16
module: User
qmd: "audit BMAD User source-first qualità"
---

# Audit BMAD — User

SSoT dettagliata: [audits/user-audit.md](./audits/user-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 713 |
| Test | 233 |
| Resources | 26 |
| Actions | 83 |
| Services | 0 |
| Policy `return true` | 8 |
| Marker | 0 |

## Lo scopo in una frase **User risponde a tre domande e non ad altre: chi sei, cosa puoi fare, per conto di chi. Tutto il resto che si sa di una persona appartiene al dominio, non a User.**

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
