<<<<<<< .merge_file_hDho4r
---
title: "PHPStan Compliance — User Module"
type: concept
tags: [phpstan, fixes]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan-fixes phpstan compliance — user module"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index-1.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
---

# PHPStan Compliance — User Module

**Last Updated**: 2026-07-07  
**Status**: ✅ Zero Errors (residual: unmatched global ignore pattern, see below)  
**PHPStan Level**: max

## Issues Resolved

### 0. Batch Fix — 24 Errors (2026-07-07)

| File | Errors | Fix |
|---|---|---|
| `app/Models/OauthAccessToken.php` | 6 | `@method` PHPDoc: `array` → `array<string, mixed>` (create/firstOrCreate/updateOrCreate), `array<int, string>` (existsIn) |
| `app/Models/Passport/Client.php` | 1 | `@method existsIn(array $haystack)` → `array<int, string>` |
| `app/Models/Permission.php` | 4 | Same array generics on firstOrCreate/updateOrCreate |
| `app/Models/Role.php` | 4 | Same array generics on firstOrCreate/updateOrCreate |
| `app/Models/Team.php` | 5 | Same array generics on create/firstOrCreate/updateOrCreate |
| `app/Traits/PasswordValidationRules.php` | 1 | `@return array<int, Password\|array\|string>` → `array<int, Password\|string>` (no nested array ever returned) |
| `routes/web.php` | 1 | `$xotData->register_pub_theme ?? false` → `$xotData->register_pub_theme` (property is non-nullable `bool`, `??` was flagged as dead) |
| `app/Models/Traits/HasTeams.php` | 1 | `teams()` return generic: `BelongsToMany<Model&TeamContract, Model, Pivot, 'pivot'>` → `BelongsToMany<Model&TeamContract, $this, Pivot, 'pivot'>`. `BaseUser` aliases `HasTeams::teams as membershipTeams`, and `Xot\Contracts\UserContract::membershipTeams()` requires the declaring-model generic to be `$this`, not a generic `Model`. Removed the now-unneeded `@phpstan-ignore return.type`. |

**Residual (not fixable within constraints)**: running PHPStan scoped to `Modules/User` alone reports:
```
Ignored error pattern larastan.noEnvCallsOutsideOfConfig was not matched in reported errors.
```
This is a global `ignoreErrors` pattern in `phpstan.neon` (untouchable) written for whole-project analysis; no file inside `Modules/User` triggers an `env()`-outside-config call, so the pattern is legitimately unmatched when the module is analyzed in isolation. Not a Modules/User defect — reproduces identically on a pristine checkout scoped the same way.

## Issues Resolved (earlier sessions)

### 1. Pest Closure Scope Type Hints

**File**: `tests/Feature/DemoUserSeederTest.pest.php`

**Issue**: 
```
Cannot call method markTestSkipped() on mixed
Undefined variable: $this
```

**Root Cause**: Pest closure doesn't automatically provide `$this` type to PHPStan

**Fix**: Added docblock type hint inside closure:

```php
it('creates deterministic demo users idempotently', function (): void {
    /** @var TestCase $this */  // ← Type hint for Pest scope
    if (! Schema::connection('user')->hasTable('permissions')
        || ! Schema::connection('user')->hasTable('roles')) {
        $this->markTestSkipped('User RBAC migrations required on connection user');
    }
    // ...
});
```

**Impact**: PHPStan now recognizes TestCase methods available in closure

### 2. Missing Facade Import

**File**: `tests/Feature/DemoUserSeederTest.pest.php`

**Issue**: Undefined class `Artisan` in test

**Fix**: Added import at top of file:

```php
use Illuminate\Support\Facades\Artisan;

// Later in test
Artisan::call('db:seed', ['--class' => UserSeeder::class, '--no-interaction' => true]);
```

## Test Files (Pest Format)

- `tests/Feature/DemoUserSeederTest.pest.php` — Feature test with Pest DSL

## Pattern: Pest with TestCase Context

When Pest test closures need TestCase methods:

```php
it('test name', function (): void {
    /** @var TestCase $this */
    // Now $this is properly typed for PHPStan
    $this->markTestSkipped('reason');
});
```

## Validation

```bash
./vendor/bin/phpstan analyse Modules/User
# Result: [OK] No errors
```

## Related Documentation

- [Pest Scope Type Hints](../../docs/wiki/skills/pest-scope-type-hints.md)
- [PHPStan Sacred Configuration](../../docs/wiki/rules/phpstan-neon-sacred.md)
=======
<<<<<<< .merge_file_y7GrLQ
---
title: "User Module - PHPStan Fixes Session 2025-10-01"
type: note
status: draft
updated: 2026-10-27
tags: [docs, user, archive]
qmd: "user module - phpstan fixes session 2025-10-01 user"
---
# User Module - PHPStan Fixes Session 2025-10-01

## ⚠️ Stato: IN PROGRESS - 95 errori rimanenti

**Data correzione**: 1 Ottobre 2025  
**Analizzati**: ~400 file  
**Errori iniziali**: ~100+ (bloccavano analisi)  
**Errori attuali**: 95  
**Errori critici risolti**: 7 (syntax errors)

---

## 🛠️ Correzioni Implementate

### 1. BaseUser.php - Rimozione Codice Orfano (CRITICO)

**File**: `app/Models/BaseUser.php`  
**Linee**: 377-419  
**Problema**: Blocchi di codice senza dichiarazione di metodo che causavano 7 errori di sintassi e bloccavano l'intera analisi PHPStan

**Codice rimosso**:
```php
// Linee 377-381: Blocco orfano #1
{
    if ($value !== null) {
        return $value;
    }
{
    if ($value !== null) {
        return $value;
    }
    if ($this->getKey() === null) {
        return $this->email ?? 'User';
    }
    // ... altro codice orfano ...
}
```

**Impatto**: 
- ✅ Eliminati 7 errori di sintassi
- ✅ Sbloccata l'analisi PHPStan su TUTTI i moduli
- ✅ Permesso il proseguimento delle correzioni

### 2. BaseUser.php - Aggiunta Metodi Teams e Tenants

**Data**: 1 Ottobre 2025 (sera)  
**Autore**: Utente  

Aggiunti metodi per gestione Teams e Tenants:

```php
/**
 * Get all of the teams the user belongs to.
 *
 * @return BelongsToMany<Team, static>
 */
public function teams(): BelongsToMany
{
    return $this->belongsToMany(Team::class, 'team_user')
        ->withPivot('role')
        ->withTimestamps();
}

/**
 * Get the current team of the user's context.
 */
public function currentTeam(): BelongsTo
{
    return $this->belongsTo(Team::class, 'current_team_id');
}

/**
 * Determine if the given team is the current team.
 */
public function isCurrentTeam(\Modules\User\Contracts\TeamContract $teamContract): bool
{
    $current = $this->getAttribute('current_team_id');
    return (string) $current === (string) $teamContract->getKey();
}

/**
 * Get all of the tenants the user belongs to.
 *
 * @return BelongsToMany<Tenant, static>
 */
public function tenants(): BelongsToMany
{
    return $this->belongsToMany(Tenant::class, 'tenant_user')
        ->withPivot('role')
        ->withTimestamps();
}

/**
 * Filament: return the tenants available to this user for the given Panel.
 *
 * @return \Illuminate\Support\Collection<int, Tenant>
 */
public function getTenants(Panel $panel): \Illuminate\Support\Collection
{
    return $this->tenants()->get();
}

/**
 * Filament: determine if the user can access the given tenant.
 */
public function canAccessTenant(\Illuminate\Database\Eloquent\Model $tenant): bool
{
    if ($tenant instanceof Tenant) {
        return $this->tenants()->whereKey($tenant->getKey())->exists();
    }
    return false;
}
```

**Implementato contratto**: `HasTeamsContract`

---

## 📋 Errori Rimanenti (95)

### Categorie Principali

1. **Property Access Issues** (~50 errori)
   - Accesso a proprietà non definite su Model generico
   - Necessario: type hints più specifici

2. **Type Safety** (~30 errori)
   - Return types non precisi
   - Mixed types da stringere

3. **Method Calls** (~15 errori)
   - Chiamate a metodi non garantiti

### Piano di Risoluzione

**Priorità ALTA**:
- [ ] Correggere BaseUser property access
- [ ] Migliorare type hints nei trait
- [ ] Stringere return types nei service provider

**Priorità MEDIA**:
- [ ] Correggere seeders
- [ ] Migliorare factories
- [ ] Sistemare helper functions

**Priorità BASSA**:
- [ ] Test type hints
- [ ] Migration type safety

---

## 🎯 Architettura User Module

### Models
- **BaseUser** ⚠️ - In progress (95 errori rimanenti)
- **User** - Estende BaseUser
- **Team** - Gestione team
- **Tenant** - Gestione tenant/organization

### Traits
- **HasTeams** - Gestione appartenenza team
- **HasTenants** - Gestione multi-tenancy
- **HasPermissions** - Integrazione Spatie permissions

### Contracts
- **UserContract** - Interfaccia base utente
- **HasTeamsContract** ✅ - Implementato in BaseUser
- **HasTenants** - Multi-tenancy support

### Resources Filament
- UserResource
- TeamResource
- RoleResource
- PermissionResource

---

## 📊 Progressione

| Fase | Errori | Status |
|------|--------|--------|
| **Inizio sessione** | 100+ (bloccato) | ❌ Analisi impossibile |
| **Dopo fix sintassi** | 95 | ✅ Analisi possibile |
| **Dopo aggiunta Teams/Tenants** | 95 | ⏳ Pronto per correzioni |
| **Target finale** | 0 | 🎯 Obiettivo domani |

---

## 🔧 Best Practices Applicate

### ✅ FATTO
1. Rimosso codice orfano
2. Aggiunti PHPDoc completi per relazioni
3. Type hints espliciti per BelongsToMany
4. Implementato contratto HasTeamsContract

### ⏳ DA FARE
1. Correggere property access su Model generico
2. Migliorare type hints nei metodi legacy
3. Stringere return types
4. Aggiungere assertions PHPStan dove necessario

---

## 🔗 Collegamenti

- [← User Module README](./README.md)
- [← PHPStan Session Report](../../../../../docs/phpstan/filament-v4-fixes-session.md)
- [← Final Report](../../../../docs/phpstan/final-report-session-2025-10-01.md)
- [← Root Documentation](../../index.md)

---

## 📝 Note per Domani

### Prossimi Step
1. **Analizzare i 95 errori sistematicamente** - Creare categorizzazione dettagliata
2. **Correggere property access** - Aggiungere type hints specifici
3. **Migliorare type safety** - Usare union types e PHPStan assertions
4. **Test di regressione** - Verificare che tutte le funzionalità funzionino

### Strategie
- Analizzare errori per file (non per tipo)
- Correggere i file più critici prima (Models, Providers)
- Lasciare seeders e test per ultimi

=======
---
title: "phpstan-fixes"
type: alias
status: superseded
canonical: "archive/phpstan-fixes.md"
qmd: "phpstan-fixes alias superseded"
>>>>>>> .merge_file_lIGJKx
---

# phpstan-fixes

Documento identico al canonico: [phpstan-fixes.md](../phpstan-fixes.md).

Canonico: `laravel/Modules/User/docs/archive/phpstan-fixes.md`. Qui non ci sono istruzioni: seguire il file collegato.
>>>>>>> .merge_file_10ipDz
