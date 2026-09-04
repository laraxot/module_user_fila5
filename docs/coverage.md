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

## Riduzione `mixed` — 2026-09-04

Contesto: convenzione di progetto "dove possibile, sostituire `mixed` con un
tipo adeguato" (`CLAUDE.md` root). Censimento iniziale: 194 file / 416
occorrenze di `mixed` in `Modules/User` sul working tree del momento (di cui
102 file già in stato non pulito per lavoro concorrente di un'altra sessione
sullo stesso repo — vedi `docs/chat/` per la mole di modifiche non committate
osservata sull'intero modulo lo stesso giorno). Per non rischiare di
sovrascrivere lavoro altrui in corso, questa sessione si è limitata
esclusivamente ai file **non** già modificati (91 file), dando priorità ai
type-hint nativi (`mixed $x`, `: mixed`) su quelli solo da docblock, e ai file
con meno occorrenze.

**File modificati (3), tutti a `mixed` zero dopo il fix**:
- `app/Actions/Shield/ResolveSuperAdminConfigurationAction.php` — i metodi
  privati `toBoolean(mixed)`/`toString(mixed)` normalizzavano un valore che
  arriva già tipizzato `bool`/`string` da `SuperAdminData` (Spatie Laravel
  Data, proprietà non nullable, hydration da `self::from()` che fallisce se il
  tipo non combacia). Wrapper rimosso, uso diretto delle proprietà.
- `app/Actions/Shield/ResolveFilamentUserConfigurationAction.php` — stesso
  pattern, stessa causa (`FilamentUserData`).
- `app/Filament/Clusters/Passport/Resources/OauthRefreshTokenResource/Pages/ViewOauthRefreshToken.php`
  — closure `->url(function (mixed $state, mixed $record) ...)`: `$state` non
  era usato (rimosso), `$record` già verificato a runtime con
  `instanceof Model` nel corpo — narrowing diretto a `?Model $record`.

**Occorrenze lasciate `mixed` con motivazione** (campione rappresentativo
esaminato, non esaustivo — ~90 file, budget speso sui più semplici):
- `array<string, mixed>` su DTO/Resource/factory/JSON column (`Profile::$preferences`,
  `SsoProvider::$settings`, `AuthenticationLog::$location`, `*Resource::toArray()`,
  tutte le `database/factories/*Factory.php`, costruttori `CreateUserAction`,
  `UserRegistered` event) — payload genuinamente eterogenei per contratto
  (JSON cast, dati di form, factory Eloquent): tipizzare oltre il generic
  richiederebbe uno schema che il progetto non definisce qui.
- Chiusure Filament `callable(string): mixed $get` (`ChangePasswordAction`,
  `ChangeProfilePasswordAction/Header`) — `Get::__invoke()` è genuinamente
  polimorfico sul valore di campo.
- `IsProfileTrait::getMobileDeviceTokens()` — `mixed $value` in
  filter/map su `pluck('token')`, già ristretto con `is_string()` a runtime:
  Collection eterogenea per contratto Eloquent.
- `RegistrationWidget::normalizeFormSchema(mixed $schema)` — riceve il
  ritorno di `$resource::getFormSchemaWidget()`, contratto dinamico
  cross-resource, già validato con `is_array()`/`instanceof Component`.
- `CheckOtpExpiredRule::validate(string, mixed $value, Closure)` — firma
  dell'interfaccia vendor `Illuminate\Contracts\Validation\ValidationRule`:
  narrowing romperebbe LSP.
- `Actions/Shield/ResolveExclusionsConfigurationAction.php`,
  `ShieldUtilsAction.php` — `array_map(static fn (mixed $item) => ...)` su
  valori letti da `config()`, già ristretti con `Assert::string()`/`is_string()`
  prima dell'uso: input genuinamente non tipizzato (config array).
- `SaveOwnershipRelationUseCaseContract::execute(..., mixed $actor)`,
  `GetAllOwnersRelationshipUseCaseContract` — contratti applicativi senza
  alcuna implementazione né call-site nel modulo: nessuna evidenza per
  restringere il tipo senza indovinare.

**PHPStan**: `./vendor/bin/phpstan analyse Modules/User --no-progress` — 0
errori prima, 0 errori dopo (livello `max`, no ignoreErrors).

**PHPMD**: `tools/phpmd.sh` sui 3 file toccati (singolarmente, per evitare il
crash noto `visitAnonymousClass` su tutto il modulo) — nessun finding.

**Pest**: `./vendor/bin/pest Modules/User/tests -c Modules/User/phpunit.xml
--no-coverage` lanciato; vedi esito registrato nella story
`7.5.mixed-type-reduction.story.md` (nessuno dei 3 file toccati ha test
dedicati con nome corrispondente nella suite).

**Nota di scope**: la maggior parenza dei 194 file con `mixed` (~103) non è
stata toccata perché già in stato non pulito nel working tree per lavoro
concorrente di un'altra sessione — vedi `docs/chat/user-profile-instanceof-two-independent-fixes.md`
per il caso analogo osservato lo stesso giorno. Riduzione ulteriore richiede
di ripartire da uno stato pulito o coordinarsi esplicitamente con quella
sessione. Story coordinatrice per il resto del lavoro type-coverage:
`docs/stories/7.4.phpstan-paramtype-coverage.story.md`.

**Fuori scope**: 15 file della lista originale non richiedevano piu' modifiche
(gia' risolti dal commit `5ec97b13` prima dell'inizio di questo lavoro).

## PHPStan (level max) — ProfileEditVoltComponent instanceof reale 2026-09-04

Vedi story completa: `docs/stories/user-profile-volt-instanceof-wrong-user-class.md`.
In sintesi: 4 errori PHPStan (`cast.string`/`argument.type`/`method.nonObject`) su
`ProfileEditVoltComponent.php` erano il sintomo di un bug reale — `instanceof`
verificato contro `Modules\User\Models\User`, sorella (non antenato) del vero
model di auth `Modules\Quaeris\Models\User` (`config/auth.php`). Fix: narrowing
contro `BaseUser` nei 4 metodi, niente piu' `@var` per zittire PHPStan.
`BaseUser.php`: aggiunta `@property string $id`, 5x `\DateTime|null` ->
`Carbon|null`. `phpstan analyse Modules/User` pulito. `phpmd` sui 2 file toccati:
solo debito preesistente (camelCase su colonne DB snake_case, complessita' gia'
sopra soglia prima di questo fix) — nessuna regressione imputabile a questo
diff. Pest non verificabile in modo significativo in questa sessione: vedi
memoria second-brain `env-sqlite-manca-suite-non-eseguibile.md` (396/813 test
falliscono gia' da soli su file mai toccati, causa non diagnosticata).
