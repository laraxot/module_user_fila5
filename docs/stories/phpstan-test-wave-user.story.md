---
title: PHPStan ondata test, lane user (modulo User)
type: story
module: User
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
  - phpstan-test-wave-user-b.story.md
  - 7.2.phpstan-test-harness-contracts.story.md
  - ../testing-harness.md
---

# PHPStan ondata test, lane user

Lane del run di coordinamento [phpstan-test-wave-regression](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md), parte finale del modulo User. La lane [user-b](phpstan-test-wave-user-b.story.md) ha chiuso 33 file e la causa delle factory; questa story copre i 14 file di test rimasti.

## Misura

| Momento | Errori |
|---|---|
| Baseline 2026-10-20 09:41 (`Modules/User`, 14 file di test) | 182 |
| Rimisura mirata dei 14 file, 10:05 | 0 (exit 0) |
| `phpstan analyse Modules/User --memory-limit=2G --no-progress --error-format=raw`, 10:07 | 0 (exit 0, output vuoto) |
| Dopo i miei ritocchi ai test dei permessi e di Tenant, mirata sui 3 file | 0 (exit 0) |

Il run a modulo intero non prova le soglie `typeCoverage.*`: quelle valgono solo con `analyse Modules` intero, a carico del coordinatore.

## Cosa e' successo

Quando ho preso i file (gate con lock, 09:48:50) i 14 file avevano ancora gli errori del baseline. Tra le 09:50 e le 09:56 un'altra sessione (la stessa lane in parallelo, scratchpad `ua`) ha riscritto quasi tutti quei file senza rispettare i lock: gli mtime vanno da 09:50:07 a 09:54:48. Le correzioni coincidono con quelle che avrei fatto io, quindi non le ho rifatte: ho rilasciato i miei lock, rimisurato, riletto ogni diff contro lo scopo del test e corretto cio' che PHPStan non puo' vedere.

## Famiglie di errori, per causa

Conteggi per identificatore sul baseline (182 in totale). Lo scopo e' ricostruito dal codice, dalle migration e da un controllo a runtime (`php artisan tinker`, senza DB). Le righe non sono disgiunte: gli errori del widget di login ricadono anche negli identificatori delle righe sopra.

| Causa | Errori | Scopo capito | Correzione alla sorgente del test |
|---|---|---|---|
| Dereferenza di un valore nullable: `first()`, `Model::find()`, `$this->user` del `TestCase` (`User\|null`) | 91 (`property.nonObject` 48, `method.nonObject` 43) piu' 5 `offsetAccess` | Il test voleva leggere il record trovato; se manca, deve fallire | `firstOrFail()` / `findOrFail()` al posto del cast o di `assert()`; per le relazioni, `new User()` (costruire la relazione non tocca il DB) |
| Asserzioni gia' garantite dai tipi: `toBeInstanceOf`, `toBeString`, `toBeBool` su valori tipizzati | 32 `pest.expectation.redundant`, 5 `impossible` | Verificare il tipo, che ora e' provato dall'analisi statica | Tolte; dove il test verificava davvero qualcosa si controlla il contenuto (`getRelated()` e' `User`, `slugField` e' `slug`, valore del cast) |
| SUT assente | 8 `method.notFound`, 4 `deadCode.unreachable`, 1 `property.notFound` | Specifiche di API mai scritte: `User::isAdmin/isDoctor/isPatient`, `restore()` e `deleted_at` su User, Team, Tenant, Device | `markTestSkipped('<X> not implemented')` con motivo. Verificato a runtime: nessuno dei cinque modelli usa `SoftDeletes` (le casts hanno `deleted_at`, il trait manca); `users.preferences` non esiste (le preferenze stanno su `profiles`) |
| `Safe\` mancante | 3 | `json_encode`, `file_get_contents`, `preg_match` che ritornano `false` | `use function Safe\...;` |
| Closure non tipizzate e argomenti nullable (`every(fn ($x) => ...)`, `str_contains($m->attr, ...)`) | 15 `argument.type` | Il predicato lavora su un `Device`/`Tenant`/`Profile` | Parametro tipizzato (`fn (Device $d): bool`); `(string)` sugli attributi `string\|null` dove il test cerca una sottostringa |
| Widget di login: test di un widget che non esiste piu' (`getFormSchema()`, `Component::getName()`) | 14 nel file, di cui 6 `argument.unresolvableType` e `function.unresolvableReturnType` solo qui | `Widgets\LoginWidget` e' l'alias di `Widgets\Auth\LoginWidget`; i campi stanno in `UserForm::getLoginFormSchema()` | Test riscritto sul contratto reale (vista `user::filament.widgets.login`, chiavi `email, password, remember`, errore su `data.email`) |
| Accesso a proprieta' `protected` (`$connection`, `$keyType`) e `method_exists` su classi note | 2 `property.protected`, 4 tra `function.alreadyNarrowedType`, `function.impossibleType` e `staticMethod.impossibleType` | Contratti del model `Permission` | `getConnectionName()`, `getKeyType()`, `getTable()`, `Permission::factory()` |
| Varie (`variable.unused` 3, `missingType.iterableValue`, `assign.propertyType`, `argument.templateType`) | 6 | Helper di test e valori di fixture | `@param array<string, mixed>`, `Illuminate\Support\Carbon`, variabile non usata tolta |

## Cosa ho corretto io

La riscrittura fatta per zittire PHPStan ha lasciato asserzioni che il prodotto non rispetta e un'omissione falsa, che PHPStan non puo' vedere. Lette contro migration, model e runtime:

- `tests/Unit/Models/PermissionTest.php`: la chiave e' intera (migration `2026_09_01_150112_create_permissions_table`: `bigIncrements('id')`; a runtime `getKeyType()` vale `int`), non `string`; `$fillable` del model e' `name, guard_name, display_name, description, created_by, updated_by` (non contiene `id`, `created_at`, `updated_at`); i casts sono solo `['id' => 'int']`. Le tre asserzioni ora dicono questo.
- `tests/Unit/PermissionTest.php`: stesse correzioni su `fillable` e casts (la versione curata `42e53653c` le aveva gia' cosi').

- `tests/Unit/Models/TenantTest.php`: i test `test_can_find_tenants_by_trial_status` e `test_can_find_tenants_by_settings_value` erano stati neutralizzati con "column not implemented", ma `2026_09_01_150110_create_tenants_table.php` crea `trial_ends_at` (dateTime) e `settings` (json) e `TenantsTable`/`TenantInfolist` mostrano `trial_ends_at`. Ripristinati sulle colonne reali: il primo cerca per `trial_ends_at` e confronta l'id; il secondo scrive il json con `Safe\json_encode` (il model non ha il cast `array`) e cerca con `whereJsonContains('settings->theme', 'dark')`.

Verifica: mirata sui tre file, exit 0.

## Cosa resta

1. **Decisione di prodotto sul model `Tenant`.** `trial_ends_at` e `settings` esistono in migration ma il model non li dichiara in `$fillable` ne' nei casts (`@property string|null $settings`). `test_can_create_tenant_with_all_fields` passa `settings` come array e lo confronta con un array: a runtime fallirebbe finche' non c'e' il cast `array` (e `datetime` per `trial_ends_at`). PHPStan non lo vede. Non ho cambiato il model: aggiungere i casts e' una scelta di prodotto (nessun chiamante di produzione legge `settings`).
2. **Test mai eseguiti.** Il DB `quaeris_data_test` non esiste e la regola e' MySQL: la verifica e' PHPStan e `php -l`. Gli errori di runtime che PHPStan non vede (come i tre contratti dei permessi) vanno cercati lanciando i test su MySQL.
3. **Pest resta Pest.** Sette file sono ancora classi PHPUnit (`UserManagementBusinessLogicTest`, `GetCurrentDeviceActionTest`, `Models/DeviceTest`, `Models/PermissionTest`, `Models/ProfileTest`, `Models/TeamTest`, `Models/TenantTest`) e diciannove usano `Tests\TestCase` della radice invece di `Modules\User\Tests\TestCase`, quindi senza gli helper `skipUnless*`. Non erano errori PHPStan: conversione da pianificare (regola `phpstan-pest-tests-stay-pest`).
4. **Duplicati.** `Models/PermissionTest` e `Unit/PermissionTest`, `Models/TenantTest` e `Unit/TenantTest`, `Unit/UserModelTest` e `Feature/UserModelTest` coprono gli stessi soggetti. Nessuno e' stato rimosso: sono cronologia del sync.
5. **Sync e `tests/`.** I 14 file erano tornati nella forma peggiore con il commit di sync `f86d97fc9` (gia' segnalato da user-b). Le versioni a 3 righe di `Models/{Permission,Team,Profile,Device}Test` erano vuote gia' a `42e53653c`: il contenuto attuale arriva dal remoto, non da un lavoro locale.

## Docs toccate

- `docs/00-INDEX.md`: link a questa story e stato PHPStan aggiornato con la misura di questo run (la riga del 2026-10-14 con 3 errori in `lang/de` non era piu' vera).
