---
title: PHPStan ondata test, lane user-b (modulo User)
type: story
module: User
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
  - 7.2.phpstan-test-harness-contracts.story.md
  - ../testing-phpstan-progress.md
  - ../testing-harness.md
---

# PHPStan ondata test, lane user-b

Lane del run di coordinamento [phpstan-test-wave-regression](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md). Bucket: 33 file di test del modulo User. La lane `user-a` possiede i file di produzione con errori e il resto dei test.

## Misura

| Momento | Errori sui 33 file |
|---|---|
| Baseline 09:00 (e ri-misura prima di editare) | 1406 |
| Dopo il resolver delle factory (1 modifica in Xot) | 514 |
| Dopo il ripristino di `tests/TestCase.php` | 594 (13 file a 0, ma 7 file del lotto riportato dal pull peggiorano) |
| Dopo il ripristino delle versioni curate | 234 |
| Finale | **0** |

Comando: `cd laravel && ./vendor/bin/phpstan analyse <i 33 file> --memory-limit=2G --no-progress`. Mai lanciato `analyse Modules`.

## Cosa e' successo

Il commit di sync `f86d97fc9` (2026-10-20 09:07, 2304 file) ha sostituito nel modulo User i test e `tests/TestCase.php` con una linea di sviluppo piu' vecchia nella qualita' e piu' nuova nella data (commit remoti del 15-19 ottobre, merge `0e2e66d86`). Era gia' successo il 2026-09-24 (commit `6dfe565fa`, "regressioni ripristinate"). La versione curata che passava PHPStan a 0 errori e' nel genitore locale `42e53653c`. Il working tree coincide con `HEAD`, quindi i corpi sostituiti restano recuperabili con `git -C Modules/User show 0e2e66d86:<path>`.

## Cause corrette, per causa

Le righe sono passi in sequenza: ogni conteggio e' misurato al passo, non e' additivo.

| Causa | Errori | Scopo capito | Correzione alla sorgente |
|---|---|---|---|
| `Model::factory()` valutata `*ERROR*`, quindi `->create()` su `mixed` e a catena `property.nonObject`, `method.nonObject`, `offsetAccess` | 892 (63%) | `HasXotFactory::factory()` risolve a runtime con `GetFactoryAction`, ma Larastan guarda `Factory::resolveFactoryName()`, che per `Modules\*\Models\X` puntava a `Database\Factories\XFactory`, classe inesistente: restituiva `ErrorType` | `XotServiceProvider::registerFactoryNameResolver()` registra `Factory::guessFactoryNamesUsing()` con la convenzione di `GetFactoryAction::getFactoryClass()`; fuori da `Modules\` vale la convenzione Laravel. Una modifica per tutti i moduli. Corregge anche `Factory::factoryForModel()` e le relazioni magiche `has*`/`for*` a runtime |
| Helper di `TestCase` chiamati e non definiti (`createTestUser`, `requireUser`, `requireTenant1`, `skipUnless*`, `oauthClientTestPersistedClient`, `assertDatabaseHasRow`, `filamentSectionChildComponents`...) | 150 in 13 file, a 0 con la `TestCase` curata | La `TestCase` curata li definisce tipizzati; il merge l'ha sostituita con una di 21 righe che estende `Illuminate\Foundation\Testing\TestCase` e in `setUp()` lancia `module:migrate` | `tests/TestCase.php` riportata alla versione `6dfe565fa` (identica a `42e53653c`), senza helper nuovi |
| Test del lotto remoto non allineati alla `TestCase` curata e al prodotto (`$this->user` nullable, `shouldReceive` su un model Eloquent, `belongsToTeam(int)` mentre la firma e' `?TeamContract`, tag `namespace` prima di `<?php`) | 495 in 13 file dopo il passo precedente | Stessi soggetti e quasi stessi titoli dei test curati | Ripristinata la versione curata (sotto) |
| Specifiche fantasma (API assente) | 83 in 4 file | Vedi neutralizzati | Neutralizzati in forma `skip` |
| Mappa `Safe\file_get_contents` | 9 in 2 file | Contratti su codice sorgente (connessione `user`, firma di `RecordAuthenticationLogAction`) | `use function Safe\file_get_contents;` e tolto il cast `(string)` |

## File ripristinati alla versione curata (13)

Contenuto da `git -C Modules/User show 42e53653c:<path>`. Tutti a 0 errori; verificato che i titoli coincidono salvo maiuscole (nessun test valido perso).

- `tests/Unit/Models/Traits/HasTeamsTest.php`: i 24 test nuovi chiamavano `belongsToTeam(5)` con un intero e `shouldReceive` su un model reale; il trait ha `belongsToTeam(?TeamContract)`. La versione curata (13 test) usa `Fixtures\MockUserWithTeams`.
- `tests/Unit/ChangeTypeCommandTest.php`: i test aggiunti verificavano la presenza di funzioni dei vendor (`Laravel\Prompts\text`, `Arr::mapWithKeys`), non il comando.
- `tests/Feature/Filament/UserResourceTest.php`: la versione nuova (34 test Livewire) ha `callTableBulkAction` con argomenti sbagliati e presuppone un panel completo; la curata documenta con `skipTest` che quei flussi sono coperti da `Feature/Filament/Pages/*`.
- `tests/Feature/TeamManagementTest.php`, `UserBusinessLogicTest.php`, `UserCommandIntegrationTest.php`, `UserAuthenticationTest.php`, `Authentication/UserAuthenticationTest.php`, `Filament/Resources/UserResourceTest.php`, `Unit/RoleTest.php`, `Unit/HasTeamsTraitPestTest.php`, `Unit/UserTypeTest.php`, `Unit/UserModulePhpstanFixesTest.php`.

## File neutralizzati (4)

Forma usata dal repo (`it('...')->skip('<X> not implemented')`, intestazione che spiega, come in Notify). Corpo originale in `git -C Modules/User show 0e2e66d86:<path>`.

| File | Motivo |
|---|---|
| `tests/Feature/TeamManagementBusinessLogicTest.php` | 27 test PHPUnit con `RefreshDatabase`; su `Team` chiamano `invitations()`, `memberships()`, `roles()`, `userHasRole()`, `getUserRole()`, `hasUserWithPermission()`, `restore()`, che non esistono. Parte valida gia' in `TeamManagementTest`, `TeamManagementInvitationsTest`, `TeamManagementBusinessLogicInvitationsTest` |
| `tests/Feature/Api/UserApiTest.php` | 37 test su `api/users*` mai implementato (DCP-252; `routes/api.php` ha solo `api/user/login`, `api/v2/user`, `api/v2/logout`); usa `Tests\Support\Traits\ModuleTestTrait`, che non esiste in nessun modulo |
| `tests/Unit/Models/UserTest.php` | Duplica `Unit/UserTest.php` e `Unit/UserModelTest.php`; `RefreshDatabase`; `User::restore()` ma il model non usa `SoftDeletes` |
| `tests/Unit/Models/RoleTest.php` | Duplica `Unit/RoleTest.php`; legge `$connection`/`$keyType` protetti e `Role::ROLE_ADMINISTRATOR/OWNER/USER` che non esistono (esiste l'enum `DefaultRoleId`) |

## Test allineato al prodotto (1)

`tests/Feature/Filament/Widgets/UserOverviewTest.php` provava il vecchio widget segnaposto (`$record`, `$view` statico). `UserOverview` oggi e' un `XotBaseStatsOverviewWidget` con quattro statistiche (totali, attivi, email verificate, accessi 24h). Il test ora verifica la base, le quattro etichette e descrizioni con le chiavi `user::user.widgets.overview.*` e la percentuale di verificati. I due test con DB usano `skipUnlessUsersTableReady()`; non eseguiti qui (DB di test assente).

## File di produzione e di supporto toccati

- `Modules/Xot/app/Providers/XotServiceProvider.php`: `registerFactoryNameResolver()` (gate lock e mtime, additivo, chiamato da `register()`).
- `Modules/Xot/app/Actions/Factory/GetFactoryAction.php`: solo docblock, che diceva di ripiegare su `ModelFactory::new()`.
- `Modules/User/tests/TestCase.php`: ripristino (identico a `6dfe565fa`).

Il resolver, per un nome di factory che non e' una `Factory`, restituisce `Factory::class` (astratta) invece di una classe fantasma, per mantenere il tipo `class-string<Factory>` richiesto da `guessFactoryNamesUsing`. Effetto: un modello senza file in `database/factories/` ora ha `->create()` di tipo `Model` (prima `mixed`) e PHPStan ne segnala le proprieta'. Nel modulo User solo le classi astratte `Base*` non hanno factory.

## Verifica

- Ri-misura dei 33 file: 0 errori.
- Nessuna regressione: i 24 file di produzione che chiamano `::factory(` restano a 0; il bucket `user-a` passa da 1403 (baseline) a 251 al momento della misura con nessun file peggiore; `geo` 483 a 350 e `gdpr-lang-ai` 502 a 0 senza file peggiori (numeri influenzati anche dalle altre lane).
- Runtime: `Factory::resolveFactoryName()` restituisce `Modules\User\Database\Factories\TeamFactory`, `Database\Factories\UserFactory` per `App\Models\User` e `Team::factory()` istanzia `TeamFactory`.
- Pest non eseguito: il DB `quaeris_data_test` non esiste e la configurazione di Pest chiede `XDEBUG_MODE=coverage`; i soli test senza DB (due contratti sul sorgente) non hanno prodotto un esito leggibile.

## Docs aggiornate e duplicati segnalati

- `docs/00-INDEX.md`: nota di stato PHPStan al 2026-10-20 (la riga del 2026-10-14 non e' lo stato attuale), link a questa story e a `TESTING.md`; etichetta di `testing.md` corretta ("Testing Rules Summary").
- `docs/testing-harness.md`: sezione "Harness dei test"; sezione factory riscritta (percorso `database/factories/`, stati reali di `UserFactory`, niente `withRole()` che non esiste).
- `docs/testing-phpstan-progress.md`: il workaround `\assert($x instanceof User)` e' segnato come storico e superato.
- Non toccati, da consolidare: `testing.md` / `TESTING.md` (documenti diversi con nome quasi uguale), `testing-rules.md` / `testing_rules.md` (167 e 48 righe), `testing-strategy.md`, `testing-structure.md`; `phpstan-compliance-status.md`, `fixes-user-module-phpstan.md`, `stories/phpstan-cleanup-user.story.md` citano `Role::factory()` come `mixed` e `UserFactory::new()` come ripiego: storico vero al momento, non piu' necessario.
- Duplicato di test: `tests/Unit/Models/Traits/MockUserWithTeams.php` e `tests/Unit/Models/Traits/Fixtures/MockUserWithTeams.php` (stesso nome di classe, namespace diversi); non rimosso.

## Decisioni aperte per l'utente

1. Il sync ha riportato due volte (24 settembre e 20 ottobre) test peggiori sopra quelli curati. Conviene un controllo nel sync prima di sovrascrivere `tests/`.
2. Ripristinare 13 file alla versione curata scarta le varianti remote (recuperabili dal merge `0e2e66d86`). Se qualche variante remota contiene copertura voluta, va riscritta in Pest sulla `TestCase` curata.
3. API CRUD `api/users` (DCP-252): implementarla o archiviare la specifica.
4. `TestCase::setUp()` ha un ripiego su SQLite condivisa (`prepareSharedSqliteForTesting`), contro la regola MySQL: debito da rimuovere.
5. Le altre lane vedranno `Model` al posto di `mixed` per i modelli senza file factory: la correzione e' scrivere la factory, non un `assert`.
