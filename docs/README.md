---
title: "User Module Documentation"
type: documentation
tags: [module, documentation, authentication]
created: 2026-07-14
updated: 2026-07-14
---

# Modulo User

## Overview

Il modulo **User** gestisce l'autenticazione, l'autorizzazione e la gestione utenti completa nel sistema Laraxot. Fornisce classi base, servizi e risorse Filament per gestire utenti, team, ruoli e permessi.

## Scopo

- Autenticazione multi-tenant sicura
- Gestione RBAC (Role-Based Access Control) via Spatie Permission
- Isolamento dati per team e tenant
- Integrazione Filament per amministrazione utenti

## Funzionalità Principali

- **Autenticazione**: Login multi-tenant, gestione sessioni sicure, two-factor authentication (opzionale)
- **Autorizzazione**: RBAC via Spatie Permission, Teams e Tenant isolation
- **Profili Utente**: Estensione dati utente con UUID e metadata
- **Filament Resources**: UI amministrativa completa per gestione utenti
- **Trait Ecosystem**: Trait per estendere funzionalità (HasTeams, HasTenants, HasAuthenticationLog)

## Struttura del Modulo

```
Modules/User/
├── app/
│   ├── Models/
│   │   ├── User.php              # User model base
│   │   ├── Team.php              # Team management
│   │   └── Profile.php           # User profile extension
│   ├── Services/
│   │   ├── AuthenticationService.php
│   │   └── UserService.php
│   ├── Actions/
│   │   ├── CreateUserAction.php
│   │   └── UpdateUserAction.php
│   ├── Filament/
│   │   └── Resources/
│   │       └── UserResource.php
│   └── Traits/
│       ├── HasTeams.php
│       ├── HasTenants.php
│       └── HasAuthenticationLog.php
├── database/
│   ├── migrations/
│   │   ├── *_create_users_table.php
│   │   ├── *_create_profiles_table.php
│   │   └── *_create_teams_table.php
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── views/
│   └── lang/
├── tests/
│   ├── Unit/
│   └── Feature/
├── docs/
│   └── README.md
├── module.json
└── composer.json
```

## Componenti Principali

| Classe | Scopo | Extends |
|--------|-------|---------|
| `User` | Modello utente principale | `XotBaseModel` |
| `Team` | Gestione team multipli | `XotBaseModel` |
| `Profile` | Estensione dati utente | `XotBaseModel` |
| `UserResource` | Amministrazione Filament | `XotBaseResource` |
| `AuthenticationService` | Logica autenticazione | - |

## Trait Disponibili

| Trait | Scopo | Requisiti |
|-------|-------|-----------|
| `HasTeams` | Gestione team multipli | `HasRoles` |
| `HasTenants` | Multi-tenancy Filament | `HasRoles` |
| `HasAuthenticationLogTrait` | Logging autenticazioni | - |

**Utilizzo**:
```php
use Modules\User\Traits\HasTeams;

class CustomUser extends Model
{
    use HasTeams;
}
```

## Configurazione

### Database Schema

Il modulo User richiede le seguenti tabelle:

- `users` - Tabella principale utenti
- `profiles` - Estensione profilo (uuid + metadata)
- `teams` - Gestione team
- `team_user` - Relazione many-to-many

Tutte le migrazioni sono in `database/migrations/`.

### Spatie Permission

Configurare in `laravel/config/permission.php`:

```php
'guard_names' => [
    'web',
    'api',
],

'permission_models' => [
    'permission' => \Spatie\Permission\Models\Permission::class,
    'role' => \Spatie\Permission\Models\Role::class,
],
```

## Utilizzo Comune

### Scenario 1: Creare un Utente

```php
use Modules\User\Actions\CreateUserAction;

$user = CreateUserAction::execute([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => bcrypt('secret'),
]);
```

### Scenario 2: Assegnare Ruoli

```php
// Using Spatie Permission
$user->assignRole('admin');
$user->givePermissionTo('edit-articles');

// Verificare permessi
if ($user->hasPermissionTo('edit-articles')) {
    // ...
}
```

### Scenario 3: Team Management

```php
// Aggiungere utente a team
$team->addMember($user);

// Verificare team
$teams = $user->teams();
```

## Testing

```bash
# Run User module tests
./vendor/bin/pest Modules/User/tests

# Run specific test file
./vendor/bin/pest Modules/User/tests/Feature/UserCreationTest.php

# With coverage
./vendor/bin/pest Modules/User/tests --coverage
```

## Quality Standards

- **PHPStan**: Level 10 (zero baseline)
- **Test Coverage**: Minimum 80%
- **Code Style**: PSR-12 via Pint

Run locally:
```bash
php -d memory_limit=-1 ./vendor/bin/phpstan analyse --level=max Modules/User
./vendor/bin/pest Modules/User/tests --coverage
./vendor/bin/pint Modules/User
```

## Architectural Rules

### Module Directory Structure
In compliance with [Global Rule](../../../docs/wiki/rules/module-root-php-folders-forbidden.md), all capitalized root directories have been moved into `app/` or renamed to lowercase:
- ✅ `app/` - All PHP code (PSR-4 mapped)
- ✅ `database/` - Strictly lowercase
- ❌ Never: `Actions/`, `Models/`, `Database/` at root level

### PHPStan Memory Management
Per evitare crash dei parallel workers su analisi massive:
```bash
php -d memory_limit=-1 ./vendor/bin/phpstan analyse [target] --memory-limit=-1
```

### Profiles Table Governance
- La tabella `profiles` deve avere sia `id` sia `uuid`
- Il modulo User usa **una sola migrazione autorevole** per `profiles`
- Se manca una colonna, si corregge quella migrazione (non si crea `add_* migration`)

### No Log Calls in Production Code
`Log::info()`, `Log::debug()`, `Log::error()` sono vietati in Actions, Models, Services, and Widgets. Laravel registra le eccezioni non gestite automaticamente.

## Dipendenze / Moduli Correlati

- [Xot - Framework Base](../Xot/docs/README.md) — Always dependency
- [Tenant - Multi-tenancy](../Tenant/docs/README.md) — For tenant isolation
- [Lang - Translations](../Lang/docs/README.md) — For user-facing strings
- [Notify - Notifications](../Notify/docs/README.md) — For auth emails

## Documenti Correlati

- [Authentication Best Practices](../../../docs/wiki/standards/authentication.md)
- [RBAC Patterns](../../../docs/wiki/standards/rbac-patterns.md)
- [PHPStan Configuration](../../../phpstan.neon)
- [Spatie Permission Docs](https://spatie.be/docs/laravel-permission/)

## Regole Critiche

1. **Always extend Xot base classes** — Never extend Laravel/Filament directly
2. **Use namespace `Modules\User`** — Never `app\User`
3. **Strict typing** — `declare(strict_types=1);` in all files
4. **No Log statements** — Let Laravel handle exceptions
5. **Passwords always hashed** — Never store plain text
6. **RLS on user data** — Implement Row Level Security policies

## Standard Rules & Workflow

- [[BMAD Method](../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../docs/wiki/concepts/llm-wiki-governance.md)]

---

**Status**: ✅ Production  
**Last Updated**: 2026-07-14  
**Requirements**: PHP 8.3+, Laravel 12, Spatie Permission  
**PHPStan Level**: 10 (Compliant)
