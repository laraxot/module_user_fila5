---
title: PHPStan ondata test, lane user-a (modulo User)
type: story
module: User
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
  - phpstan-test-wave-user-b.story.md
  - phpstan-test-wave-user.story.md
  - 7.2.phpstan-test-harness-contracts.story.md
  - ../phpstan-relationship-fix.md
---

# PHPStan ondata test, lane user-a

Lane del run di coordinamento [phpstan-test-wave-regression](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md). Bucket: 39 file del modulo User, 8 di produzione o supporto (`LoginWidget`, `routes/auth.php`, `lang/it/auth.php`, `BaseUser`, `HasAuthenticationLogTrait`, `HasTeams`, `tests/Pest.php`, `tests/Support/helpers-extended.php`) e 31 test. La lane [user-b](phpstan-test-wave-user-b.story.md) ha fatto le factory e la `TestCase`; la lane [user](phpstan-test-wave-user.story.md) ha lavorato in parallelo sugli stessi file dei permessi, di Tenant, Profile, Team e User (vedi "Sovrapposizione").

## Misura

Comando: `cd laravel && ./vendor/bin/phpstan analyse <file del bucket> --memory-limit=2G --no-progress --error-format=json` con la sola `laravel/phpstan.neon`. Mai `analyse Modules`; dopo l'avviso di OOM ogni run passa dal gate condiviso (`flock` + `nice`, al massimo 8 file).

| Momento | Errori sui 39 file |
|---|---|
| Baseline 09:00 | 1406 |
| Ri-misura prima di editare (09:20) | 1404 |
| Dopo il resolver delle factory di user-b in Xot | 705 |
| Dopo il ripristino di `tests/TestCase.php` di user-b | 289 |
| Dopo i miei file (fino a `UserContractBoundaryTest`) | 161 |
| Finale, in 5 lotti da 8 file | **0** (0 errori generali) |

Verifica di regressione: `phpstan analyse Modules/User` a modulo intero chiude a 0 (eseguito alle 09:58; le modifiche successive a `Feature/UserModelTest`, `helpers.php` e `ListUsersTest` sono verificate sui singoli file). Nessun `@phpstan-ignore` aggiunto, nessuna baseline, nessuna config alternativa. Non toccati ne' usati `Modules/User/phpstan.neon` e `phpstan-baseline.neon`.

## Cause alla sorgente

| Causa | Errori (baseline) | Scopo capito | Correzione |
|---|---|---|---|
| `Model::factory()` valutata `*ERROR*`, quindi `->create()` su `mixed` e a catena `->id`, `->fresh()`, `->assignRole()`, `->teams()` | circa 600 (262 `create()`, 114 `$id`, 25 `hasRole`, 24 `assignRole`, 21 `fresh`...) | Larastan chiede il nome della factory a `Factory::resolveFactoryName()`, che per `Modules\*\Models\X` indicava una classe inesistente; il runtime usa `GetFactoryAction` | Nessuna modifica mia: l'ha risolta user-b con `XotServiceProvider::registerFactoryNameResolver()`. Verificato con `dumpType`: `User::factory()->create()` e' `User`, `Team`, `Profile`, `Device`, `Tenant`, `Permission`, `Role` idem |
| Helper di `TestCase` chiamati e non definiti (`requireUser`, `requireGoogleNfa`, `skipUnlessUsersTableReady`, `setupFilamentAdminPanel`, `requireAction`, `skipTest`...) | circa 130 | La `TestCase` curata li definiva tipizzati; il merge del 20 ottobre l'aveva sostituita con una di 21 righe | Ripristinata da user-b. Dove il test usava helper che nemmeno la versione curata ha (`requireGoogleNfa`, `skipTest`) o prop statiche (`TestCase::$user`, `TestCase::$google2fa`): `TwoFactorServiceTest` ora usa gli helper globali di `tests/Support/helpers.php` (`createTestUser()`, `skipUnlessUserColumn()`, `new Google2FA`), `BaseUserTest` una funzione locale |
| Mock Mockery assegnato a una proprieta' tipizzata e Action costruita senza dipendenze | 110 `shouldReceive` su `Agent`, 110 `andReturn` su `mixed`, 1 `arguments.count`, 1 `assign.propertyType`, 3 `variable.unused`, 11 `pest.expectation.redundant` | `GetCurrentDeviceAction` legge solo l'`Agent` iniettato e il `Device`: il mock va passato al costruttore, altrimenti il test non lo usava | `private Agent&MockInterface $mockAgent`, creato con `typedMock()` (helper esistente) e passato a `new GetCurrentDeviceAction($agent, new Device())`; tolte le variabili Arrange mai lette e `toBeInstanceOf(Device::class)` ridondante |
| Contratti con relazione `MorphMany<X, Model>` non compatibile con i trait | 2 | `HasAuthentications` e `UserNotificationsContract` dichiarano la capacita'; le implementazioni restituiscono `MorphMany<X, $this>` | `covariant Model` nei contratti, `$this` in `BaseUser::notifications()` e `unreadNotifications()`. Doc: [phpstan-relationship-fix](../phpstan-relationship-fix.md) |
| `@property int $personal_team` con cast `boolean` | 0 diretti, causa di `toBeTrue()` impossibile su `Expectation<int>` in `HasTeamsTraitTest` | Il cast `boolean` e' in `Team::casts()` e `BaseTeam::casts()` | `@property bool` in `Team`, `BaseTeam`, `TeamContract` |
| `Pest.php` ridefiniva helper globali e le espressioni `toBeUser` ecc. valevano `Expectation<null>` | 11 | Le estensioni `toBeUser/Team/Profile` servono su qualunque valore; gli helper stanno in `tests/Support/helpers.php`, caricato da `autoload-dev` (ridefinirli darebbe `Cannot redeclare`) | Closure `function (): Expectation` con `@var Expectation<mixed> $this`; tolte le 4 funzioni duplicate |
| `Safe\` mancante | 7 | `file_get_contents`, `preg_match`, `class_uses`, `json_encode` che possono ritornare `false` | `use function Safe\...;`; in `BaseUserTest` e `UserContractBoundaryTest` ho usato `class_uses_recursive` e `Symfony\Finder` |
| `pest.expectation.redundant` e `.impossible` | circa 60 | Verificare un tipo che l'analisi prova gia' | Tolte; dove il test verificava qualcosa (relazioni) ora controlla `getRelated()` |
| `HasTeams` e `helpers-extended.php` (4 errori nel bucket) | 4 | Errori `in context of class MockUserWithTeams` e chiamata a un helper di `TestCase` | Spariti con il ripristino della fixture e della `TestCase` di user-b; non li ho modificati |
| Sintassi e riferimenti morti in produzione | 31 | `routes/auth.php` e' uno scaffold Breeze/Volt mai caricato (nessun provider, pagine `pages.auth.*` inesistenti, le rotte vive sono in `web_tall.php`); `LoginWidget` usava `Filament\Actions\Actions` (classe di Filament 3) e `config()` con cast; `lang/it/auth.php` aveva due blocchi `actions` e due `login` con la stessa chiave | `routes/auth.php` di nuovo tutto commentato, con la spiegazione (come era l'8 ottobre e come dicono `docs/00-INDEX.md` e `livewire-inventory.md`); `Filament\Actions\Action`, `Config::string()` e `@return list<Action>`; in `auth.php` tolti i due blocchi sovrascritti dal secondo e spostate nel secondo `login` le 4 chiavi che esistevano solo nel primo (`button`, `button_loading`, `forgot_password_text`, `meta_description`). Verificato con `php -r`: 53 chiavi top level, `actions.login.*` e `login.heading` invariati |

## File neutralizzati (specifiche fantasma)

Forma del repo: `->skip('<X> not implemented')` o `markTestSkipped`, con intestazione che spiega. Il corpo originale sta nel repo Modules/User, commit `0e2e66d86`.

| File | Motivo |
|---|---|
| `tests/Feature/ChangeProfilePasswordTest.php` | La route `filament.resources.profiles.change-password` non esiste; il cambio password del profilo e' `ChangeProfilePasswordAction` (modale Livewire) e non chiede la password corrente |
| `tests/Feature/Filament/Pages/ListUsersTest.php`, 8 test | `getTablePaginationPageOptions`, `getTableQuery`, `canSelectRecords`, `getTableLayout`, `getTableEmptyState*`, `getTableActionsAlignment`, `getTableRecordsPerPageSelectOptions` sono API di pagina Filament 3: in Filament 5 stanno nella `Table`. Gli altri test ora leggono `UsersTable`, perche' i `getTable*()` di `XotBaseListRecords` sono `final` e restituiscono `[]` |
| `UserManagementBusinessLogicTest`, 6 test | `User::isAdmin/isDoctor/isPatient`, `restore()` senza `SoftDeletes`, `users.preferences` (le preferenze stanno su `profiles`) |
| `Models/DeviceTest`, 2 test | Device non usa `SoftDeletes` |
| `Models/TenantTest`, 2 test di soft delete | Tenant non usa `SoftDeletes` (altri due test, `trial_ends_at` e `settings`, erano stati neutralizzati da me per errore e li ha ripristinati la lane user: le colonne esistono nella migration `2026_09_01_150110`) |

## Test riallineati al comportamento reale

- `tests/Support/helpers.php`, `verifyTwoFactorRecoveryCode()`: un codice sconosciuto o gia' usato restituiva `true`. Un codice di recupero e' monouso, quindi ora restituisce `false` se non e' tra i codici salvati. `TwoFactorServiceTest`: 3 test falliti a runtime, ora 20 su 20.
- `ListUsersTest`, `can display users`: contava `User::all()` su una connessione con altri 52 utenti, e confrontava `type` con l'enum mentre l'attributo e' la stringa. Ora conta solo gli utenti creati e confronta `UserType::MasterAdmin->value`.
- `Feature/UserModelTest`: le relazioni non si verificano piu' con `toBeInstanceOf(HasMany::class)` sul tipo di relazione sbagliato (`authentications` e `clients` erano attesi `HasMany`, ma sono `MorphMany`; `teams`, `roles` e `permissions` sono `MorphToMany`): ora `getRelated()::class`. `profile()` punta alla classe configurata in `XotData` (a runtime `Modules\Quaeris\Models\Profile`).
- `ChangePasswordActionTest`: quasi tutti i 10 test erano `toBeInstanceOf(Action::class)` su un'istanza gia' di quel tipo, con `setUp()` protetto chiamato dall'esterno. Ora verificano nome, icona, conferma richiesta, tooltip e modale tradotti, e dal sorgente schema e hashing.
- `PasswordDataTest`: reflection su `ReflectionNamedType` verificato con `Assert::assertInstanceOf`.

## Verifica a runtime

Pest sui singoli file, con la sola connessione `user` che a quest'ora risponde (la `data` no): `ChangePasswordActionTest` 6 passati; `CreateUserTest` 7 passati 1 saltato; `PasswordDataTest` 7; `LoginWidgetTest` 3 passati 2 saltati; `UserContractBoundaryTest` 1; `Feature/UserModelTest` 36 passati 3 saltati; `TwoFactorServiceTest` 20; `ListUsersTest` 11 passati 8 saltati. Fuori dal mio controllo: `Unit/Models/BaseUserTest` fallisce nel `setUp` per un indice duplicato `extras_model_id_index` nella migration di Limesurvey su `quaeris_survey_test` (stato del DB, non del test); `TeamChangeWidgetTest` (4), `Unit/TenantTest` (9), `Unit/PermissionTest` (17), `HasTeamsTraitTest` (12), `Unit/UserTest` (3), `PasswordDataLabelsTest` (1) hanno test che falliscono a runtime e che PHPStan non vede: sono nei file riscritti in parallelo dalla lane user o non toccati, non li ho modificati.

## Sovrapposizione con la lane user

Dalle 09:48 la lane `user` ha preso i lock su 7 file del mio bucket (`Unit/TenantTest`, `Unit/PermissionTest`, `Unit/UserModelTest`, `Models/{Permission,Profile,Team}Test`) mentre io ne riscrivevo altri, quindi per quelli ho trovato il gate in SKIP e non li ho toccati: le correzioni (`firstOrFail()`, tolte le asserzioni ridondanti) sono sue e le ho solo ri-misurate. Un mio tentativo su `HasTeamsTraitTest` e' fallito sul controllo preliminare (il file era gia' cambiato) e non ha scritto nulla: il file e' nella forma della lane user.

## Docs toccate

- `docs/phpstan-relationship-fix.md`: sezione sui contratti (`covariant Model`), `updated` portato al 2026-10-20.
- `docs/00-INDEX.md`: riga con il link a questa story, accanto a quelle di user-b e della lane user.

Nessun file `docs` reso falso dal resto: `routes/auth.php` torna coerente con `00-INDEX.md` e `livewire-inventory.md`, che lo dicevano "interamente commentato".

## Duplicati e doc obsolete segnalati, non toccati

- `auth-widget-rules.md`, `auth_widget_rules.md`, `best-practices/auth-widget-rules.md`: tre copie con contenuti diversi. Mostrano `LoginWidget extends XotBaseWidget` con `$view = 'pub_theme::...'`, che non e' piu' il codice (oggi estende `BaseAuthWidget`/`XotBaseSchemaWidget`).
- `phpstan-level10-fixes.md` descrive `HasAuthentications` con `@return MorphMany` senza template: storico.
- `component-verification.md`, `component_verification_rules.md`, `best-practices/component-verification-rules.md` linkano `Themes/Sixteen`, che non esiste (c'e' solo `Themes/Zero`).
- Test duplicati per soggetto: `Models/PermissionTest` e `Unit/PermissionTest`, `Models/TenantTest` e `Unit/TenantTest`, `Unit/UserModelTest`, `Unit/UserTest` e `Feature/UserModelTest`.

## Decisioni aperte

1. `Tenant` dichiara `settings` e `trial_ends_at` in migration ma non nei casts: i test sul json falliscono a runtime finche' il model non ha il cast `array` e `datetime` (scelta di prodotto).
2. `ChangeProfilePasswordAction` non verifica la password corrente: la specifica fantasma lo chiedeva. Implementarlo o archiviare.
3. `User::isAdmin/isDoctor/isPatient` (dominio sanitario) non appartengono a questo prodotto: archiviare le specifiche.
4. Sette file restano classi PHPUnit e diciannove usano `Tests\TestCase` invece di `Modules\User\Tests\TestCase`: conversione a Pest da pianificare.
5. `lang/it/auth.php`: due chiavi `login` e due `actions` convivevano da tempo, con il secondo che vinceva sul primo; se le traduzioni dei widget dipendono dalla forma `['text' => ...]` del primo blocco, va controllato il tema.
6. DB di test: la connessione `user` esiste con dati residui (`User::all()` ne restituiva 55) e quella `limesurvey` ha migration non idempotenti; la regola dice MySQL, ma serve un DB pulito per i test.
