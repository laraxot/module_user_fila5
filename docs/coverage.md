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

## 2026-09-03 — bug reale in ProfileEditVoltComponent.php, non solo phpstan

`phpstan analyse` (root, tutto il monorepo) segnalava 4 errori mixed-type in
`app/View/Pages/ProfileEditVoltComponent.php` (righe 142/348/353/362).
Investigando la causa reale (`\PHPStan\dumpType()`, non assunta): il file
importava `Modules\User\Models\User` e faceva
`Assert::isInstanceOf($user, User::class, ...)` su `Auth::user()` — ma
`config/auth.php` configura **`Modules\Quaeris\Models\User`** come modello di
autenticazione reale (`Modules\User\Models\User` e' commentato sopra). Le due
classi sono **sibling**, entrambe estendono `Modules\User\Models\BaseUser`,
non l'una l'altra: l'`instanceof` era sempre falso a runtime
(`\PHPStan\dumpType($user)` dopo il narrowing confermava `*NEVER*`).

**Impatto reale**: `mount()`, `updateProfile()` e `updatePassword()` avevano
lo stesso pattern ma erano "silenziati" da un `/** @var User $user */` inline
prima della chiamata — esattamente la pratica che le istruzioni di PHPStan
vietano esplicitamente ("Do not use inline @var PHPDoc tag to override
PHPStan's inferred type"), motivo per cui PHPStan non li segnalava. A runtime
pero' l'`Assert::isInstanceOf` falliva comunque: ogni tentativo reale di
aggiornare profilo, password o cancellare l'account finiva nel blocco
`catch`, con un messaggio d'errore generico all'utente. Componente
verosimilmente non funzionante in produzione per nessun utente autenticato,
non solo un difetto di tipo.

**Fix**: sostituito il controllo con `instanceof BaseUser` (l'antenato comune
reale) in tutti e 4 i metodi, rimossi gli `@var` che mascheravano il problema,
sostituita la query statica `User::where(...)` con `$user::where(...)` (late
static binding sull'istanza narrowed, non piu' legata a una sottoclasse
concreta hardcoded). Aggiunta `@property string $id` mancante su `BaseUser`
(presente solo sulla sottoclasse `Modules\User\Models\User`, non
sull'antenato) e corrette 5 annotazioni `@property \DateTime|null` →
`Carbon|null` (Eloquent castava gia' a `Carbon` a runtime; il docblock era
disallineato, causava `Call to an undefined method DateTime::toDateTimeString()`
su un campo che in realta' e' sempre un `Carbon`). Per `$user->password`
(`string|null` dopo il fix, `Hash::check()` vuole `string`):
`Assert::stringNotEmpty()` **non narrowa per PHPStan** in questo progetto
(webmozart/assert dichiara solo `@psalm-assert`, non `@phpstan-assert`, e non
c'e' il bridge `phpstan/phpstan-webmozart-assert` installato — verificato in
`vendor/webmozart/assert/src/Assert.php` e `composer.json`) — usato invece un
narrowing reale, `if (null === $hashedPassword) { throw new RuntimeException(...); }`,
in `updatePassword()` e `deleteAccount()`.

**Verifica incompleta — bloccata da lavoro concorrente non mio**:
`Modules/User/app/Models/User.php` e' modificato e non committato da
un'altra sessione in questo momento, con `protected $childTypes` senza tipo
mentre `BaseUser::$childTypes` e' tipizzato `array` — PHP lo rifiuta con un
fatal (`Type of ... must be array (as in class BaseUser)`) che impedisce il
bootstrap dell'app, quindi ogni `phpstan analyse`/Pest su questo modulo in
questo momento fallisce per una causa esterna a questo fix (non ho toccato
`User.php`, segnalato in `docs/chat/xot-blade-component-bootstrap-crash-wip.md`).
Verificato invece: `php -l` pulito su entrambi i file; la diagnosi del bug
originale (`\PHPStan\dumpType($user)` → `*NEVER*` dopo il narrowing errato)
era stata fatta PRIMA che questo blocco comparisse, quindi resta valida.
`tools/phpinsights.sh` non eseguibile (assente dal progetto). Da ri-verificare
con `phpstan analyse` (root) appena l'altra sessione chiude o annulla il suo
lavoro su `User.php`.
