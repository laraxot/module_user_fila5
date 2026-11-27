---
title: "STORY - PHPStan zero errori nel modulo User (test Pest tipizzati)"
type: story
module: User
status: done
created: 2026-11-26
updated: 2026-11-26
qmd: "phpstan zero remediation user PermissionTest UserResourceTest OauthLocalizedLoginFlowTest pest helper tipizzati markTestSkipped inventario stale"
tags: [phpstan, pest, test, user, remediation]
---

# PHPStan zero errori nel modulo User

## Scopo

Portare a zero gli errori di `phpstan analyse Modules` nel perimetro `laravel/Modules/User/`, correggendo la sorgente e non il messaggio: niente `@phpstan-ignore*`, niente baseline, niente `mixed` come scorciatoia, niente modifiche a `laravel/phpstan.neon`. L'inventario di partenza contava 96 errori in 7 file, di cui 91 in due test Pest (`tests/Unit/PermissionTest.php` e `tests/Feature/Filament/Resources/UserResourceTest.php`).

Ogni test deve continuare a guardare lo stesso comportamento; Pest non e' eseguibile in questo ambiente (vedi Verifica).

## Causa alla sorgente

**1. `PermissionTest.php` (61 errori, `property.nonObject`, `method.nonObject`, `offsetAccess.nonOffsetAccessible`, `argument.type`).**
Il test voleva dare a ogni caso un permesso fresco `test-permission` / `web`. Lo faceva assegnando `$this->permission` in `beforeEach()`. Dentro una closure Pest `$this` non e' la `TestCase` del modulo ma `Pest\PendingCalls\TestCall`, il cui `@mixin` e' `PHPUnit\Framework\TestCase`: la proprieta' letta era quindi `mixed`, e ogni `->name`, `->getFillable()`, `->assignRole()` su quel `mixed` produceva un errore a se'. PHPStan aveva ragione: la proprieta' non e' dichiarata da nessuna classe (proprieta' dinamica, deprecata da PHP 8.2) e il tipo reale si era perso. In piu' `Factory::create()` e' dichiarato `TModel|Collection<int, TModel>` perche' con `count()` restituisce una collezione, mentre qui serviva sempre un solo model.

**2. `UserResourceTest.php` (30 errori, `function.notFound`, `return.type`, `argument.type`, `offsetAccess.nonOffsetAccessible`).**
Il test voleva verificare la forma del form di `UserResource`. La versione in `HEAD` cercava le chiavi `section01` e `section02` e usava `$this->skipTest(...)` quando un campo mancava: ma lo schema reale (`UserResource/Schemas/UserForm.php`, risolto da `UserResource::getFormClass()`) e' una `Grid` radice con `main` (`worker`, `signin`, `access`) e `side` (`status`, `record_info`). Le chiavi non esistevano piu' e lo skip nascondeva il fatto che il test non guardava nulla. I `mixed` nascevano dall'attraversamento di `getChildComponents()` e dagli indici fissi dentro componenti annidati.

**3. `OauthLocalizedLoginFlowTest.php` (1 errore, `method.notFound`).**
`oauthSkipUnsupportedLocale()` voleva saltare il test se la lingua non e' offerta dal progetto (il modulo User e' condiviso tra progetti con locale diversi) e lo faceva con `test()->markTestSkipped(...)`. `test()` e' tipizzato `TestCall|HigherOrderTapProxy` e nessuno dei due dichiara `markTestSkipped`; a runtime il proxy inoltra la chiamata al `TestCase`, ma il tipo statico non lo dice.

**4. Voci dell'inventario che non erano errori reali.**
Quattro voci `phpstan.path` ("File ... does not exist") riguardavano `Resolve{NotifiableEmail,FilamentUserConfiguration,PermissionsConfiguration,SuperAdminConfiguration}Action.php`: file rinominati in `Get...Action.php` (i vecchi nomi risultano cancellati nel working tree), quindi spariti dal disco. Le `function.notFound` sugli helper `userResourceForm*` e `userTestPermission` erano un artefatto di concorrenza: i due test sono stati riscritti sul disco alle 17:46, l'analisi globale aveva gia' scansionato le funzioni della versione precedente e poi letto il contenuto nuovo. Con un'analisi della directory le segnalazioni non si riproducono.

## Cosa e' cambiato

- `tests/Unit/PermissionTest.php`: la proprieta' dinamica e' sostituita dalla funzione tipizzata `userTestPermission(): Permission` (`createOne()`), chiamata all'inizio di ogni test. Stesso permesso nuovo per ogni caso, tipo vero per tutti i chiamanti, nessuna proprieta' dinamica. I 18 test e le loro asserzioni sono invariati.
- `tests/Feature/Filament/Resources/UserResourceTest.php`: helper tipizzati (`userResourceFormSchema`, `userResourceFormChildren`, `userResourceFormFindByName`, `userResourceFormFieldOnPage`) che attraversano `Grid -> Grid -> Section` per nome, e asserzioni `PHPUnit\Framework\Assert::assert*()` piatte. Il test ora guarda davvero lo schema reale: struttura `main`/`side`, span di colonna 8 e 4 su griglia da 12, `name` opzionale con fallback sull'email in `CreateUser::mutateFormDataBeforeCreate()`, `password` obbligatoria solo su `CreateUser`, `email` obbligatoria con una sola regola `Unique` su `email`, `created_at` con `diffForHumans()`. I `skipTest()` che nascondevano campi mancanti sono diventati asserzioni che falliscono.
- `tests/Feature/Socialite/OauthLocalizedLoginFlowTest.php`: `Assert::markTestSkipped()` (statico, gia' importato) al posto di `test()->markTestSkipped()`. Lancia la stessa `SkippedWithMessageException`. Pint ha inoltre normalizzato `new ViewErrorBag` in `new ViewErrorBag()`.
- Nessun codice di produzione modificato. Nessun bug di comportamento scoperto: i due test riscritti combaciano con `UserForm` e `CreateUser` cosi' come sono oggi.

I due test `PermissionTest` e `UserResourceTest` risultavano gia' riscritti sul disco (modificati alle 17:46, prima dell'avvio di questa corsia, da un altro scrittore): sono stati riletti, confrontati con `HEAD` e verificati contro il codice reale, non riscritti una seconda volta.

## Verifica

Eseguito da `laravel/` (output reali):

```
./vendor/bin/phpstan analyse Modules/User --memory-limit=-1 --no-progress
 [OK] No errors
```

Prima della modifica a `OauthLocalizedLoginFlowTest.php` la stessa analisi dava `Found 1 error` (`method.notFound` alla riga 33), e basta.

- `php -l` sui tre file: `No syntax errors detected`.
- `./vendor/bin/pint Modules/User/tests/Feature/Socialite/OauthLocalizedLoginFlowTest.php`: `result: fixed` (solo `new_with_parentheses` e simili).
- Prova isolata senza DB (script PHP con bootstrap dell'app, nessuna scrittura): `UserForm` ha radice `Grid` unica, chiavi `main,side`, `main` con `worker,signin,access`, `side` con `status,record_info`, span `{"default":1,"lg":8}` e `{"default":1,"lg":4}`, `getColumns('lg') = 12`. `Permission` ha fillable `name, guard_name, display_name, description, created_by, updated_by`, tabella `permissions`, cast `id => int`, metodi `assignRole` e `roles`.
- **Pest non e' stato eseguito**: `.env.testing` ha `DB_USERNAME` vuoto e i test usano un DB reale. Il comportamento e' provato da lettura, PHPStan e dalla prova isolata sopra, non da una run della suite. Da lanciare in sviluppo: `tests/Unit/PermissionTest.php`, `tests/Feature/Filament/Resources/UserResourceTest.php`, `tests/Feature/Socialite/OauthLocalizedLoginFlowTest.php`.

## Aperto

- Pest da eseguire in un ambiente con credenziali DB di sviluppo (mai `RefreshDatabase`, mai `migrate:fresh`).
- `tests/Feature/Database/Migrations/UserMigrationSyntaxTest.php` era tenuto da un altro agente e non e' stato toccato; l'analisi di `Modules/User` non lo segnala.
- Le funzioni helper dei test Pest vivono nel namespace/globale del file: nomi unici (`userTestPermission`, `userResourceForm*`, `oauthSkipUnsupportedLocale`) verificati con `rg` sul codice.
- Un'analisi globale lanciata mentre altri processi riscrivono i file puo' riportare `function.notFound` spuri: ripetere dopo qualche minuto.

## GitHub (tracciamento)

- Issue: https://github.com/festionali/base_restaurant_fila5/issues/79
- Discussion: https://github.com/festionali/base_restaurant_fila5/discussions/80
