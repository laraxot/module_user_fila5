---
title: "Audit BMAD — User"
type: audit
status: review
updated: 2026-11-16
module: User
qmd: "audit BMAD User sintesi finding P0 P1 PHPStan Pest"
---

# Audit BMAD — User

SSoT dettagliata: [audits/user-audit.md](./audits/user-audit.md) · scopo: [purpose.md](./purpose.md)

**In una frase:** chi è chi e cosa può fare: utenti, ruoli, permessi, team, OAuth, accesso ai pannelli.

## Inventario misurato (2026-11-16)

| Voce | N |
|---|---:|
| PHP `app/` | 713 |
| Test PHP | 233 |
| Models | 123 |
| Policy | 39 |
| Resource | 37 |
| Widget | 31 |
| Actions | 90 |
| Services | 0 |
| Migration | 83 |
| Lang IT | 264 |
| `->label('..')` letterali | 24 |
| `@phpstan-ignore` | 1 |

## Top finding

- **P0-U1** `user::admin` scavalca `RolePolicy/PermissionPolicy/TeamPolicy` (before → true, verificato a runtime): escalation — `Xot/app/Models/Policies/XotBasePolicy.php:21; User/app/Models/Policies/RolePolicy.php`
- **P0-U2** `PermissionPolicy` view/create/update/delete = true (solo `viewAny` false) — `User/app/Models/Policies/PermissionPolicy.php:25,33,41,50`
- **P1-U3** 18 policy scrivono su DB durante l'autorizzazione (`hasPermissionToOrCreate`) — `User/app/Models/Traits/HasSpatiePermission.php:14`
- **P1-U4** `restaurant::admin` cablato nel core HR (`canAccessPanel`, `ADMIN_ROLES`) — `User/app/Models/BaseUser.php:~298,~318`

## Gate

- PHPStan `Modules/User`: **0 errori** (17:08).
- Pest: skip documentato: DB di test `10.100.200.53:3306` irraggiungibile (TCP chiuso) e `Xot/tests/Support/TestDatabaseGuard.php:63` rifiuta DB non `*_test`; i test con DB restano appesi al connect MySQL (timeout 150 s osservato). Nessun test contro il MySQL locale (dati sacri).

## Seguito

[epics.md](./epics.md) · [decision-log.md](./decision-log.md) · [story](./stories/module-bmad-audit.story.md) · [ECC](../ecc/user-ecc-audit.md)
