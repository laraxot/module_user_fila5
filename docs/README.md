---
title: "User Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-09-17
---

# Modulo User - Documentazione Completa

## Overview

Il modulo **User** gestisce l'autenticazione, l'autorizzazione e la gestione utenti completa nell'ecosistema Laraxot. Copre login multi-tenant, team e tenant isolation, RBAC via Spatie Permission, OAuth/Passport (client, token, dashboard Filament dedicata), Socialite/SSO, two-factor authentication, device tracking e log delle autenticazioni.

## Funzionalità Principali

### Autenticazione
- Login multi-tenant
- Gestione sessioni sicure
- Two-factor authentication (opzionale)

### Autorizzazione
- RBAC (Role-Based Access Control) via Spatie Permission
- Teams e Tenant isolation
- Policy Filament integrate

### Modelli

```php
// User base model
Modules\User\Models\User extends BaseModel

// Team management
Modules\User\Models\Team

// Tenant isolation
Modules\User\Models\Tenant
```

## Trait Disponibili

| Trait | Scopo | Requisiti |
|-------|-------|-----------|
| `HasTeams` | Gestione team multipli | `HasRoles` |
| `HasTenants` | Multi-tenancy Filament | `HasRoles` |
| `HasAuthenticationLogTrait` | Logging autenticazioni | - |

## Collegamenti

- [Regole Trait](./traits.md)
- [Filament Resources](./filament/)

## Backlinks

- [Xot Base](../../Xot/docs/)
- [Tenant Module](../../Tenant/docs/)
- [UI Components](../../UI/docs/)

## Architectural Rules — Violations Fixed

### Module Directory Structure Standard
In compliance with the [Global Rule](../../../docs/wiki/rules/module-root-php-folders-forbidden.md), all root-level capitalized directories (`Actions/`, `Application/`, `Database/`, `Events/`, `Listeners/`) have been moved into `app/` or renamed to lowercase `database/`.
- **app/**: Home for all PHP functional code (mapped via PSR-4).
- **database/**: Strictly lowercase for migrations/factories/seeders.

### PHPStan Memory Management
Per evitare crash dei parallel workers su analisi massive, usare sempre:
`php -d memory_limit=-1 ./vendor/bin/phpstan analyse [target] --memory-limit=-1`

### Profiles migration governance

- [wiki/concepts/profile-migration-uuid-contract.md](./wiki/concepts/profile-migration-uuid-contract.md)
- Duplicati User archiviati in `database/migrations/_bak/*.merged`

**Nota di accuratezza**: la nota "owner schema" citata in
`profile-migration-uuid-contract.md` assegna la migrazione `create_profiles_table`
a un modulo `WorkOrder` che **non esiste in questo checkout**
(`Modules/WorkOrder` è assente). Il contenuto risulta condiviso con un altro
progetto della famiglia Laraxot (i riferimenti issue/discussion in diversi file
di `docs/` puntano a `provtv/base_ptv_fila5`, non a questo repo) e non è stato
adattato. In questo repo la migrazione canonica di `profiles` vive sotto
`Modules/User/database/migrations/`; verificare quale sia quella attiva prima di
crearne una nuova.

### Spatie Permission — `table_names` intoccabile

- `laravel/config/permission.php` → nomi pivot **singolari** (`model_has_role`, …)
- Vietato modificare `table_names` o hardcodare nomi tabella in migrazioni/modelli
- [wiki/concepts/spatie-permission-table-names.md](./wiki/concepts/spatie-permission-table-names.md)
- [wiki/concepts/spatie-permission-migration-no-table-name.md](./wiki/concepts/spatie-permission-migration-no-table-name.md)

### No Log calls in production code
`Log::info()`, `Log::debug()`, `Log::error()` are forbidden in Actions, Models, Services, and Widgets.
Found and removed from `RegisterWidget`. Laravel logs unhandled exceptions automatically.
See: [no-log-in-production.md](./no-log-in-production.md)

### Git merge conflicts in migrations
46 migration files in `database/migrations/` had unresolved conflict markers .
These break PHP syntax and halt PHPStan entirely. All were resolved.
Rule: never commit files with conflict markers. Fix immediately when found.

## Requisiti

- PHP 8.3+
- Laravel 11/12
- Spatie Laravel Permission
- Filament v5


## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]

## Documentation

- [On-Demand Pattern](./on-demand-pattern.md) — Pattern per caricamento efficiente
- [QMD Setup](./qmd-setup.md) — Configurazione ricerca locale
- [Performance](./performance-optimization.md) — Metriche e best practice
- [Project Structure](./project-structure.md) — Directory layout