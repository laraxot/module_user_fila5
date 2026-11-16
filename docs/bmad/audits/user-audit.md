---
title: "Audit approfondito modulo User"
type: audit
status: review
updated: 2026-11-16
module: User
qmd: "audit approfondito User inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — User

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 713 |
| Test PHP | 233 |
| Models (`app/Models/*.php`) | 50 |
| Policy files (approx) | 78 |
| Resource Filament | 26 |
| Actions | 83 |
| Services | 0 |
| Migration | 74 |
| Lang IT files | 508 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 8 |
| Ratio test/app | 0.33 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **User risponde a tre domande e non ad altre: chi sei, cosa puoi fare, per conto di chi. Tutto il resto che si sa di una persona appartiene al dominio, non a User.**

## Finding preliminari (da inventario)

- Nessun finding automatico critico dall'inventario; completare review sicurezza/runtime con story dedicate.

## Finding approfonditi (codice)

- **P0** `canAccessPanel`: panel id `access` → sempre true (`BaseUser.php`).
- **P1** Coupling panel-id = role-name + ruoli `restaurant::*` in prodotto PA.
- **P1** Ruoli su User e Profile → doppia fonte di verità.
- Policy self-delete blocked: tenere come SSoT.

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/User
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/User/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/user-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
