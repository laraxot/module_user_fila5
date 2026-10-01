---
type: concept
module: User
confidence: high
updated: 2026-10-01
related:
  - "./ai-harness-user-discipline.md"
  - "./baseuser-hierarchy.md"
  - "./code-redundancy-user.md"
  - "./context-mode-user-discipline.md"
  - "./context-overflow-prevention.md"
  - "./filament-langserviceprovider-governance.md"
  - "./filament-widget-linear-crud-model-create.md"
  - "./filament-widget-resource-form-delegation.md"
---

# Profile Migration UUID Contract

## Regola (runtime User)

`BaseProfile` genera `uuid` in `creating`. Il contratto richiede colonna `uuid` nella tabella `profiles` del DB usato dal modello concreto.

## Owner schema (User — connessione `user`)

**Owner migrazione = modulo User** (`main_module`):

- `laravel/Modules/User/database/migrations/2026_10_01_150108_create_profiles_table.php`

La migrazione converte anche gli ID UUID legacy in bigint auto-increment e aggiorna
`profile_team.profile_id` preservando l'associazione. Il timestamp viene incrementato
per far rieseguire il repair sulle installazioni gia' migrate.

Vedi [profile-id-bigint-uuid-fix](./profile-id-bigint-uuid-fix.md) per errore 1364 `id` senza default.

## Regola id + uuid

| Colonna | Tipo | Note |
|---------|------|------|
| `id` | bigint unsigned AI | PK interna |
| `uuid` | char(36) unique | API, `byUuid()` |

`tableUpdate()` chiama `convertIdFromUuidToBigintIfNeeded()` per DB legacy con `id` char(36).

## Fix 2026-04-20

- errore osservato: `table profiles has no column named uuid`
- causa: installazione con tabella `profiles` senza colonna `uuid`, mentre `BaseProfile::booted()` la valorizza in create
- correzione:
  - mantenuta una sola migrazione `create_profiles_table`
  - confermata colonna `uuid` in `tableCreate()`
  - confermata aggiunta idempotente in `tableUpdate()` con `if (! $this->hasColumn('uuid'))`
  - aggiornato timestamp del file migrazione per riesecuzione controllata

## Fix 2026-04-28 (MariaDB syntax)

- errore osservato: `SQLSTATE[42000] ... near 'after id'` durante `CREATE TABLE profiles`
- causa: uso di `->after('id')` nel blocco `tableCreate()`
- dettaglio tecnico: `after()` e' un posizionamento colonna valido per `ALTER TABLE`,
  non per la definizione colonna nel `CREATE TABLE` generato da Laravel su MariaDB
- correzione:
  - rimosso `->after('id')` da `tableCreate()` per `uuid`
  - mantenuto `->after(...)` solo nel blocco `tableUpdate()` (additive alter, idempotente)

## Implicazione pratica

Quando compare un bug schema su `profiles`, la prima domanda non e':
"serve una nuova migrazione?"

La prima domanda corretta e':
"la migrazione canonica `create_profiles_table` e' completa e ha timestamp coerente per essere rieseguita?"

## Riferimenti

- `laravel/Modules/User/app/Models/BaseProfile.php`
- `laravel/Modules/User/database/migrations/2026_10_01_150108_create_profiles_table.php`
- [profile-id-bigint-uuid-fix](./profile-id-bigint-uuid-fix.md)
- [architecture-one-migration-per-model](../../../../../docs/wiki/bmad/architecture-one-migration-per-model.md)
- `laravel/Modules/Xot/docs/database/migration-base-rules.md`
