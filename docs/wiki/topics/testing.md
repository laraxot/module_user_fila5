---
title: "Topic testing"
type: digest
status: active
qmd: "digest ceiling 100 testing"
---

# Topic testing

Sintesi automatica di 6 documenti (chiave `testing`).

## testing

_Fonte: `best-practices/testing.md`_

See canonical documentation: ../../../../Themes/docs/shared-components/testing-rules.md

## Testing del Bug Fix: Infinite Loop in make:filament-user

_Fonte: `bugs/testing.md`_

# Testing del Bug Fix: Infinite Loop in make:filament-user

## Overview

Questo documento descrive i test implementati per verificare la correzione del bug che causava loop infiniti durante la creazione di utenti con `make:filament-user`.

## Test Files

### 1. Test Pest (Raccomandato)

**File**: `Modules/User/tests/Unit/CurrentTeamInfiniteLoopFixTest.php`

Test suite completa in Pest che verifica tutti gli aspetti della correzione.

#### Test Implementati

1. **currentTeam getter does not crash when user has no teams**
   - Verifica che il getter non crashi quando l'utente non ha team
   - Assicura che la relazione esista ma il team sia null

2. **currentTeam getter is side-effect-free**
   - Verifica che accedere al getter non modifichi `current_team_id`
   - Accede al getter più volte e verifica che il valore rimanga invariato

3. **currentTeam getter does not trigger save operations**
   - Verifica che il getter non modifichi `updated_at`
   - Assicura che non vengano eseguite operazioni di save

4. **initializeCurrentTeam sets personal team correctly**
   - Verifica che il metodo imposti correttamente il personal team

## Testing e TDD - User Module

_Fonte: `roadmap/testing.md`_

# Testing e TDD - User Module

## Principi TDD

- **Red-Green-Refactor**: Test che fallisce → Codice minimo → Refactor
- **AAA Pattern**: Arrange → Act → Assert
- **Test Coverage**: Minimo 80%, 100% per flussi Auth

## Struttura Test

```
Modules/User/tests/
├── Unit/
│   ├── Actions/
│   ├── Models/
│   │   └── UserTest.php
│   └── Services/
├── Feature/
│   ├── Authentication/
│   │   ├── LoginTest.php
│   │   ├── RegisterTest.php
│   │   └── LogoutTest.php
│   ├── Filament/
│   │   └── UserResourceTest.php
│   └── Pages/
├── Browser/
│   └── AuthenticationTest.php
├── Pest.php
└── TestCase.php

## Testing Rules Summary

_Fonte: `testing.md`_

# Testing Rules Summary

## Regole Fondamentali dei Test

### 1. **Pest Testing Mandatory**
- **MAI** usare PHPUnit class-based (`class Test extends TestCase`)
- **SEMPRE** usare Pest functional syntax (`test()`, `it()`)
- I test devono essere scritti in formato Pest, non PHPUnit

### 2. **NO RefreshDatabase - MAI**
- **MAI** usare `use RefreshDatabase` nei test
- **MAI** usare `RefreshDatabase` trait
- Utilizzare `.env.testing` con SQLite in-memory
- Usare `DatabaseTransactions` se necessario (raro)

### 3. **Configurazione Testing**
- Tutti i test devono leggere `.env.testing`
- PHPStan usa configurazione da `phpstan.neon` (non passare livello come parametro)
- Script di conversione vanno in `bashscripts/`, non nella root di Laravel

### 4. **XotBase/LangBase Extension**
- **MAI** estendere classi Filament direttamente
- **SEMPRE** estendere `XotBase*` o `LangBase*` a seconda del modulo
- Controllare se il modulo è multilingue prima di scegliere

### 5. **property_exists() Prohibition**
- **MAI** usare `property_exists()` con modelli Eloquent
- Usare `isset()` per proprietà magiche

## Testing in User

_Fonte: `wiki/concepts/testing.md`_

# Testing in User

Il modulo User resta **Pest-first**. PHPStan L10 sul modulo intero:

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/User
```

## Regole

- `uses(\Modules\User\Tests\TestCase::class)` — sempre FQCN, mai `uses(TestCase::class)`.
- Nei test namespaced importare esplicitamente facades, modelli ed eccezioni (`Schema`, `Str`, `Throwable`, `Profile`); non usare FQCN non importati nel corpo del test.
- Per `BelongsToMany` dichiarato da trait riusabili su piu model, non usare `$this` nel template `TDeclaringModel` se il contratto richiede `Model`: il template non e covariante e PHPStan segnala `return.type`.
- `membershipTeams()` resta API concreta di `BaseUser`/`HasTeams`: non inserirla in `Modules\Xot\Contracts\UserContract`; nei command/service che partono dal contratto usare `Assert::isInstanceOf($user, BaseUser::class)` prima della chiamata.
- Assertion: `PHPUnit\Framework\Assert::assert*` nelle closure (no `expect()->…` se segnalato `method.internalClass`).
- Eccezioni attese: `try/catch` + `Assert::fail()` / `Assert::assertSame()` sul messaggio (no catena `test()->throws()`).
- Skip senza `$this` in closure: helper globali in `tests/Support/helpers.php`:
  - `skipUserTest(string $message): never` → `Assert::markTestSkipped()`
  - `skipLegacyRedirectPersistenceCheck(): void` — Passport Create*ClientAction
- Seeders: `$this->seed(RolesSeeder::class)` con `@var TestCase $this` quando serve DB assertion; evitare `$this->app` protected.
- Helper tipizz

## User Module — Testing

_Fonte: `wiki/integrations/_da-riconciliare/testing.md`_

# User Module — Testing

## Unit Tests

```php
test('user creation stores email hash', function () {
    $user = User::create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
        'name' => 'Test User',
    ]);

    expect($user->email)->toBe('test@example.com');
    expect(Hash::check('password123', $user->password))->toBeTrue();
});

test('user can assign role', function () {
    $user = User::factory()->create();
    $user->assignRole('admin');

    expect($user->hasRole('admin'))->toBeTrue();
});
```

## Feature Tests

```php
test('user can login with valid credentials', function () {
    $user = User::factory()->create([
