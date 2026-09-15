---
title: "Code Coverage: User"
type: concept
tags: [coverage]
created: 2026-07-14
updated: 2026-07-14
qmd: "coverage code coverage: user"
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

# Code Coverage: User

**Lines Coverage:** N/A
**Methods Coverage:** N/A
**Classes Coverage:** N/A
**Functions Coverage:** N/A
**Test Status:** ⚠️  OTHER ERROR

## Summary

This module contains User functionality for the application.

## Coverage Reflections

- ⚠️  **Low Coverage**: The module has low test coverage, indicating potential risks in production
- Tests are not fully executed
- 🏗️  **Foundation Module**: User module is critical as it provides base functionality for all other modules
- 📋 **Module Size**: Medium complexity with multiple components

- 🔍 **Recommendations**: Focus on integration tests for complex workflows
- 🔐 **Security Critical**: User management module requires comprehensive testing
- 📋 **Module Size**: Medium complexity with multiple components

- 🔍 **Recommendations**: Focus on integration tests for complex workflows

## PHPStan (level max) — swarm fix 2026-09-02

Contesto: `phpstan analyse Modules` (livello max) segnalava 212 errori nel modulo
User su un totale di 542 nell'intero albero `Modules/` (claim:
`docs/chat/claim-phpstan-542-swarm-2026-09-02.md`). Lista errori sorgente:
`errors2-User.txt` (237 righe, 212 errori distinti), generata da una run
full-tree con `--error-format=json`.

**Esito**: `phpstan analyse -c <isolato> Modules/User` ora torna **0 errori**
(tmpDir dedicato per evitare inquinamento da cache condivisa fra sessioni
concorrenti). Commit `fcb5bca5` — 69 file toccati (su 84 elencati; i restanti 15
erano gia' stati corretti da un commit precedente nella stessa giornata,
`5ec97b13`, prima che questo lavoro iniziasse).

Per identifier:
- `cast.string` / `cast.int` (mixed non narrowed): sostituito il cast cieco con
  `is_scalar()`/`is_numeric()`/`is_int()` reali, o con la proprieta' tipizzata
  del model (`->name` al posto di `->getAttribute('name')`) dove esisteva un
  `@property` nel docblock della classe.
- `typeCoverage.paramTypeCoverage` / `typeCoverage.constantTypeCoverage`: tipi
  nativi espliciti su parametri di closure/metodi, inferiti dal contesto reale
  (firma del metodo Filament/Eloquent chiamante, `@property` del model
  collegato) o `mixed` solo dove il framework stesso lo dichiara cosi'
  (es. `Filament\Actions\*::toMailUsing(Closure(mixed, string): ...)`).
  Costanti tipizzate PHP 8.3 (`private const string|int NOME = ...`).
- Deprecazioni Filament v5: `Placeholder::make()->content()` ->
  `TextEntry::make()->state()`; `bulkActions()` -> `toolbarActions()`;
  `actions()` -> `recordActions()`; `form()` -> `schema()`;
  `modalSubheading()` -> `modalDescription()`; `modalButton()` ->
  `modalSubmitActionLabel()`; `MetatagData::getLogoHeader()` ->
  `getBrandLogo()`.
- `class.notFound` (`BaseUser::canAccessPanel()`): rimosso un riferimento morto
  a `App\Support\AccountFeatures` — classe mai esistita dal commit iniziale del
  modulo (`git log -S` conferma), causava un `Error` fatale a runtime su ogni
  pannello diverso da `admin`. Non un problema di sola analisi statica: un bug
  reale mai eseguito con successo in produzione su quel path.

**Gate**: `tools/phpmd.sh` e `tools/phpinsights.sh` sul modulo intero non
mostrano regressioni riconducibili a questi 69 file (i finding residui sono
debito preesistente su file non toccati). Suite Pest non eseguibile in modo
significativo: DB di test `10.100.200.53` irraggiungibile da questo ambiente
(condizione nota, vedi memoria second-brain "test-db-unreachable-drives-skips").

**Fuori scope**: 15 file della lista originale non richiedevano piu' modifiche
(gia' risolti dal commit `5ec97b13` prima dell'inizio di questo lavoro).

## Follow-up audit `$model`/colonne — swarm 2026-09-11

Chiusura delle 2 story follow-up dell'epic
`xotbaseresourcetable-model-property-and-column-audit`:
`xotbaseresourcetable-suspect-columns-user-module-followup.story.md` (Task A/C/D)
e la parte User di `xotbaseresourcetable-dead-code-duplicate-table-classes-followup.story.md`
(Task B, in root).

**PHPStan** (`vendor/bin/phpstan analyse Modules/User --no-progress`): **0 errori**
dopo tutte le modifiche (fix model + 6 cancellazioni dead-code + 1 model fix).

**PHPMD** (`tools/phpmd.sh Modules/User/app/Filament/Resources|Models text
../docs/phpmd.ruleset.xml`): nessun nuovo finding sui file toccati
(`OauthClientResource.php`, `OauthClientResource/Tables/OauthClientsTable.php`,
`OauthDeviceCode.php`); i finding residui sono debito preesistente su file non
toccati da questo giro (`UserBasePolicy` NumberOfChildren, `OauthAccessTokenResource`
CouplingBetweenObjects, ecc.).

**Pest**: suite completa (171 file test) **non completabile in questo ambiente**
per due cause distinte, entrambe pre-esistenti e non introdotte da questo lavoro:

1. `PHP Fatal error: Allowed memory size of 536870912 bytes exhausted` durante
   l'esecuzione della suite intera in singolo processo (confermato anche con
   `php -d memory_limit=2G`, che non elimina il crash — il limite effettivo
   sembra reimposto da un ini/subprocesso, non dal flag CLI). Crash avvenuto
   due volte in punti diversi della suite (~1300 e ~1400 righe di output su
   ~171 file), coerente con un leak cumulativo cross-test (Mockery/Filament),
   non con un singolo test rotto.
2. `SQLSTATE[42S02]: Base table or view not found: 1146 Table
   'quaeris_data_test.cache' doesn't exist` — la tabella `cache` manca nel DB
   di test `quaeris_data_test` (connessione mysql, 127.0.0.1:3306). Causa la
   maggioranza dei ~51 FAIL osservati nella run piu' lunga (`PermissionTest`,
   `TeamManagementBusinessLogicTest`, `ClientCredentialsTest`, ecc.) —
   verificato isolando `PermissionTest.php` da solo: stesso errore su ogni
   test che tocca lo spatie/permission cache. Nessuna relazione con i file
   toccati in questo giro.

**Verifica mirata eseguita con successo** (file singoli/gruppi piccoli, per
restare sotto il limite di memoria ed evitare la tabella `cache` mancante dove
possibile):

- `Modules/User/tests/Unit/Models/PassportModelWrappersTest.php` — PASS
- `Modules/User/tests/Unit/Passport/PassportModelWrappersTest.php` — PASS
- `Modules/User/tests/Unit/Models/PassportWrapperConventionTest.php` — PASS
  (verifica strutturale: ogni model Passport vendor ha un wrapper locale —
  copre indirettamente `OauthDeviceCode`)
- `Modules/User/tests/Unit/Models/AdditionalModelsTest.php` — PASS, tutti i 6
  model Oauth* (incluso `OauthDeviceCode`) si istanziano correttamente dopo il
  fix Task D
- `Modules/User/tests/Feature/Filament/TenantUserTableColumnsTest.php` — PASS
- `Modules/User/tests/Unit/Models/OauthClientTest.php` — 6/7 PASS; l'unico FAIL
  (`oauth client user relation uses xot data`) e' `Class "customer_user" not
  found` in `tightenco/parental` sulla relazione `user()` (single-table
  inheritance) — pre-esistente, non tocca la connessione/model risolti da
  Task A (le due asserzioni su instanziazione e connessione `user` PASSano)
- `Modules/User/tests/Unit/UserGapAttackCoverageTest.php` — 4/5 PASS; l'unico
  FAIL e' `Call to undefined function
  Modules\User\Tests\Unit\mockeryExpect()` — helper mai definito nel modulo,
  pre-esistente (vedi second-brain "pest-plugin-laravel-missing" gia' noto)

Nessuno dei fallimenti osservati (ambiente/memoria, tabella `cache` mancante,
helper Mockery mancante, dato `customer_user` STI) e' riconducibile ai file
toccati in questo giro (`OauthClientResource.php`,
`OauthClientResource/Tables/OauthClientsTable.php`,
`Models/OauthDeviceCode.php`, le 6 cancellazioni dead-code). Regressione: **no**
(verificato per confronto diretto degli stack trace, non per assunzione).
