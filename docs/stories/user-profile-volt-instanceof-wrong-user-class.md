---
id: story-user-profile-volt-instanceof-wrong-user-class
slug: story-user-profile-volt-instanceof-wrong-user-class
title: "STORY — ProfileEditVoltComponent controllava instanceof contro la classe User sbagliata"
description: "config/auth.php configura Modules\\Quaeris\\Models\\User come auth model reale, non Modules\\User\\Models\\User (commentato sopra). Le due classi sono sorelle, entrambe figlie di Modules\\User\\Models\\BaseUser, non genitore/figlio. ProfileEditVoltComponent.php controllava instanceof Modules\\User\\Models\\User in tutti e 4 i metodi: sempre falso a runtime per l'utente autenticato reale."
document_type: story
category: bmad
scope: module:User
status: review
version: 1.1.0
language: it-IT
ecosystem: Laraxot
priority: high
created_at: '2026-09-03'
updated_at: '2026-09-04'
tags: [bmad, story, user, phpstan, auth, volt, livewire, production-bug]
related:
  - ../../laravel/Modules/User/app/View/Pages/ProfileEditVoltComponent.php
  - ../../laravel/Modules/User/app/Models/BaseUser.php
  - ../../laravel/Modules/User/app/Models/User.php
  - ../../laravel/Modules/Quaeris/app/Models/User.php
github:
  repository: https://github.com/laraxot/module_user_fila5
  issues: https://github.com/laraxot/module_user_fila5/issues
---

# STORY — ProfileEditVoltComponent controllava instanceof contro la classe User sbagliata

## Contesto

Emersa due volte, in modo indipendente, in due sessioni concorrenti lo stesso
giorno (2026-09-03/04): un `phpstan analyse Modules` di routine segnalava 4
errori `cast.string` / `argument.type` / `method.nonObject` su
`ProfileEditVoltComponent.php` (mount/updateProfile/updatePassword/deleteAccount).

## Problema

`config/auth.php`:

```php
//'model' => env('AUTH_MODEL', Modules\User\Models\User::class),
'model' => Modules\Quaeris\Models\User::class,
```

Il model di auth reale e' `Modules\Quaeris\Models\User`, non
`Modules\User\Models\User`. Le due classi sono **sorelle**, entrambe
`extends Modules\User\Models\BaseUser` — non genitore/figlio.

`ProfileEditVoltComponent.php` faceva `Assert::isInstanceOf($user,
\Modules\User\Models\User::class, ...)` in tutti e 4 i metodi — **sempre
falso** per l'utente autenticato reale. In 3 metodi su 4 l'errore era
mascherato da un `/** @var User $user */` inline (pattern che le istruzioni
stesse di PHPStan vietano esplicitamente: "Do not use assert() or inline @var
PHPDoc tag to override PHPStan's inferred type") — l'assert falliva comunque
a runtime, l'override serviva solo a zittire l'analizzatore. Il quarto metodo
(`deleteAccount`) non aveva l'override ed e' quello che ha fatto emergere i
4 errori PHPStan che hanno acceso l'indagine.

**Effetto a runtime**: ogni tentativo reale di aggiornare il profilo,
cambiare password o cancellare l'account finiva nel blocco `catch`
generico — verosimilmente non funzionante per nessun utente autenticato in
produzione.

## Come e' stata risolta (due volte, riconciliata)

Una sessione ha corretto il file nella sua working tree e committato
(`module_user_fila5@d4647f7e`, versione piu' snella del file, senza i blocchi
`Log::error` estesi). Una seconda sessione (questa), partita da una working
tree che aveva gia' una riscrittura del file piu' ricca (con logging
strutturato) non derivata da quel commit, ha trovato lo stesso bug
indipendentemente (misurando `config/auth.php` da zero) e applicato lo stesso
principio di fix alla propria versione del file, preservando il logging gia'
presente:

- Narrowing contro `BaseUser` (l'antenato comune reale), non `User`, in tutti
  e 4 i metodi — con `if (! $user instanceof BaseUser) { throw new
  RuntimeException(...); }`: `instanceof` nativo narrowa per PHPStan senza
  bisogno di `@var`, a differenza di `Assert::isInstanceOf()` (nessun bridge
  `phpstan-webmozart-assert` installato in questo progetto).
- Rimossi tutti gli override `@var User $user` (compresi 2 aggiunti per
  errore da questa sessione stessa nel primo giro, prima di scoprire il fix
  gia' committato altrove — vedi Dev Agent Record).
- Query di unicita' email: da `User::where(...)` (classe concreta
  hardcoded) a `$user::where(...)` (late static binding sull'istanza gia'
  narrowata).
- `BaseUser.php`: aggiunta `@property string $id` (mancante, presente solo
  sulla sottoclasse `User`); 5 `@property \DateTime|null` corrette in
  `Carbon|null` (Eloquent castta davvero a Carbon, il docblock mentiva).
- `$user->password` e' `string|null` su `BaseUser` (giustamente, non tutti
  gli utenti hanno una password hash — es. social login): aggiunto un vero
  controllo `null === $currentHash` prima di `Hash::check()` invece di un
  altro `@var`/assert non narrowante.

## Acceptance Criteria

- AC1: nessun controllo `instanceof`/`Assert::isInstanceOf` contro
  `Modules\User\Models\User` in `ProfileEditVoltComponent.php` — solo contro
  `BaseUser` (l'antenato comune reale).
- AC2: nessun `@var User $user` (o annotazione equivalente) usato per
  aggirare il narrowing di PHPStan su questo file.
- AC3: `phpstan analyse Modules/User` pulito.
- AC4: `BaseUser.php` dichiara `@property string $id` e usa `Carbon|null`
  (non `\DateTime|null`) per i campi data.
- AC5 (non verificato in questa sessione — DB di test con nota separata,
  vedi [[env-sqlite-manca-suite-non-eseguibile]]): un test Pest end-to-end
  che autentica un utente reale (`Modules\Quaeris\Models\User`) e chiama
  `updateProfile()`/`updatePassword()`/`deleteAccount()` deve passare senza
  finire nel catch generico.

## Tasks/Subtasks

- [x] Task 1: narrowing `BaseUser` nei 4 metodi, rimosso `@var User`
- [x] Task 2: `$user::where()` al posto di `User::where()` hardcoded
- [x] Task 3: `BaseUser.php` — `@property string $id` + 5x `Carbon|null`
- [x] Task 4: null-check reale su `$user->password` prima di `Hash::check()`
- [x] Task 5: PHPStan pulito su `Modules/User` (verificato, 0 errori)
- [ ] Task 6: AC5, test Pest end-to-end — bloccato, vedi Dev Notes

## Dev Notes

- **Suite Pest non affidabile su questo modulo in questa sessione**: con
  `.env.testing` presente e DB `_test` raggiungibile, 417/813 test passano
  ma 396 falliscono con `A facade root has not been set.` /
  `Target class [config] does not exist.` **anche su file mai toccati e in
  isolamento** (verificato: `SendNotificationActionTest.php` nel modulo
  Notify, zero relazione con questo fix, stesso identico fallimento). Non
  diagnosticato in questa sessione — vedi memoria second-brain
  `env-sqlite-manca-suite-non-eseguibile.md` (aggiornata 2026-09-04). AC5
  resta aperto per questo motivo, non per un difetto del fix.
- **Collisione multi-sessione reale su questo file**: vedi commit
  `module_user_fila5@d4647f7e` (altra sessione, versione piu' snella del
  file) e questo stesso fix (versione con logging esteso). Le due versioni
  del file **non sono state riconciliate a livello di riga**: restano due
  varianti dello stesso principio di fix, applicate a due basi di codice
  locali diverse. Chi tocca ancora questo file deve rileggerlo prima di
  editare, non assumere quale delle due versioni sia "quella buona" —
  entrambe lo sono, per il proprio insieme di feature circostanti.
- Root cause reale del bug, non solo sintomo PHPStan: `config/auth.php`
  verificato riga per riga, non per sentito dire.

### References

- [Source: laravel/config/auth.php#L71-L72] — model di auth reale
- [Source: laravel/Modules/Quaeris/app/Models/User.php] — `class User
  extends BaseUser` (sorella, non figlia, di `Modules\User\Models\User`)
- [Source: module_user_fila5@d4647f7e] — fix indipendente della stessa
  sessione gemella, stessa diagnosi, versione del file piu' snella

## Dev Agent Record

### Agent Model Used

Claude Sonnet 5

### Completion Notes List

- **Errore proprio, corretto nella stessa sessione**: il primo giro di
  lavoro (partito solo da `phpstan analyse Modules`, senza controllare
  `git log`/`docs/chat` prima di editare) ha aggiunto 2 `@var User $user`
  per zittire i 4 errori PHPStan — esattamente l'anti-pattern che questa
  story esiste per rimuovere. Scoperto rileggendo `docs/implementation-
  artifacts/sprint-status.yaml` (entry gia' presente da un'altra sessione)
  e verificando `git diff HEAD` sul repo del modulo User, che ha git proprio
  (non submodule): la working tree era gia' indietro rispetto a un fix
  reale committato altrove. Rimossi i 2 `@var` propri e applicato il fix
  corretto (BaseUser, non un cast cosmetico) alla versione locale del file.
- Verificato indipendentemente `config/auth.php` da zero (non fidandosi
  della sola diagnosi altrui) prima di procedere — confermato: stessa
  conclusione.

### File List

- `laravel/Modules/User/app/View/Pages/ProfileEditVoltComponent.php` (fix)
- `laravel/Modules/User/app/Models/BaseUser.php` (fix docblock: `$id` +
  `Carbon|null`)

## Aggiornamento 2026-09-10 (subagent-quaeris-user, terza occorrenza indipendente)

Task assegnato come "4 errori PHPStan cast.string/argument.type/method.nonObject
su `ProfileEditVoltComponent.php`" (righe 142/348/353/362), senza riferimento a
questa story. Prima di editare, cercata story esistente sul tema (procedura
BMAD obbligatoria) — trovata questa. La working tree di **questa** sessione
aveva ancora il bug originale (`Assert::isInstanceOf($user,
\Modules\User\Models\User::class, ...)` sempre falso a runtime, mascherato da
`/** @var User $user */` in 3 metodi su 4, `deleteAccount()` senza override e
quindi quello che emergeva su PHPStan) — conferma che il fix descritto sopra
non era ancora arrivato in questa copia del modulo (git repo proprio per
modulo, non submodule; vedi nota "Collisione multi-sessione reale" sopra).

**Primo errore proprio**: nel primissimo giro, senza aver ancora letto questa
story, ho aggiunto `/** @var User $user */` a `updateProfile()` e
`deleteAccount()` per zittire PHPStan — esattamente l'anti-pattern che AC2 di
questa story vieta. Trovata la story cercando `phpstan` in
`Modules/User/docs/stories/` come da procedura, riletta, rimossi i 2 `@var`
propri e applicato il fix corretto.

Fix applicato (stesso principio della sezione sopra, adattato a questa
versione del file con logging esteso):

- Tutti e 4 i metodi (`mount`, `updateProfile`, `updatePassword`,
  `deleteAccount`): `Assert::isInstanceOf($user, User::class, ...)` →
  `if (! $user instanceof BaseUser) { throw new InvalidArgumentException(...); }`
  (narrowing nativo, nessun `@var` residuo). Import `Modules\User\Models\User`
  sostituito con `Modules\User\Models\BaseUser`.
- `updateProfile()`: `User::where('email', ...)` (classe hardcoded) →
  `$user::where('email', ...)` (late static binding sull'istanza narrowata).
- `updatePassword()` e `deleteAccount()`: `$user->password` su `BaseUser` è
  `string|null` (non tutti gli utenti hanno hash — social login). Aggiunto
  `$currentPasswordHash = $user->password; if (null === $currentPasswordHash) {
  throw new InvalidArgumentException(...); }` prima di ogni `Hash::check()`,
  al posto del cast/assert non narrowante.
- **Non è stato necessario** toccare `BaseUser.php`: a differenza di quanto
  registrato sopra (Task 3, "`@property string $id` mancante"), in questa
  copia del modulo `$id` risolve già a un tipo utilizzabile per PHPStan senza
  docblock aggiuntivo — verificato empiricamente (0 errori senza modificare
  `BaseUser.php`), non per assunzione.

Verifica: `cd laravel && ./vendor/bin/phpstan analyse
Modules/User/app/View/Pages/ProfileEditVoltComponent.php --no-progress
--memory-limit=-1` → `[OK] No errors` (da 4 errori). `php -l` pulito.

File toccati in questo aggiornamento: solo
`laravel/Modules/User/app/View/Pages/ProfileEditVoltComponent.php`.
<<<<<<< .merge_file_sMxPj3
=======
<<<<<<< .merge_file_oPRjn2
=======

## Aggiornamento 2026-09-21 (quarta occorrenza indipendente, modulo Cms)

Task: `sistema tutte le segnalazioni di phpstan con bmad + secondbrain` (audit
repo-wide, non un task su questo file). Trovato su
`Modules/Cms/tests/Feature/Auth/LoginTest.php:162`:

```php
use Modules\User\Models\User;   // sorella, non genitore di BaseUser

assert($authenticatedUser instanceof User);   // sempre falso, stesso bug
```

Errore PHPStan: `argument.templateType` — `Unable to resolve the template
type TValue in call to function expect` sulla riga successiva
(`expect($authenticatedUser->email)`), perche' `assert()` non narrowava a
nulla di utile (classe sorella, mai vera per l'utente reale
`Modules\Quaeris\Models\User`).

Stesso fix, stesso principio (AC1/AC2 di questa story):

```php
use Modules\User\Models\BaseUser;   // was: use Modules\User\Models\User;

assert($authenticatedUser instanceof BaseUser);   // was: instanceof User
```

Verifica: `./vendor/bin/phpstan analyse
Modules/Cms/tests/Feature/Auth/LoginTest.php --no-progress` → `[OK] No
errors` (da 1 errore). Nessun altro uso di `User` nel file (grep confermato).

Quarta occorrenza indipendente dello stesso bug (config/auth.php →
`Modules\Quaeris\Models\User` sorella di `Modules\User\Models\User`,
entrambe figlie di `BaseUser`) in quattro file/moduli diversi
(`ProfileEditVoltComponent.php` x3 sessioni, ora `LoginTest.php`). Pattern
strutturale, non un errore isolato: chi scrive `instanceof User` o
`@var User` per l'utente autenticato in questo progetto lo sbaglia quasi per
default, perche' l'IDE/autocomplete suggerisce naturalmente
`Modules\User\Models\User` (il nome "giusto" per convenzione) invece del
model reale configurato in `auth.php`. Nessuna guardia meccanica esiste
ancora per questo (vedi nota "getFormSchema static-call recidiva" in
second-brain per un pattern analogo su questo stesso codebase: 8+ occorrenze,
nessuna guardia). Da valutare in futuro: un test PHPStan custom rule o un
Pint/grep pre-commit che vieti `instanceof \Modules\User\Models\User` fuori
da `Modules/User` stesso.

File toccati in questo aggiornamento: solo
`laravel/Modules/Cms/tests/Feature/Auth/LoginTest.php`.

## Aggiornamento 2026-09-21 — quinta occorrenza indipendente, istruzione live dell'utente

Trovata durante root-cause del crash live `/user/admin` (vedi
[`lang-files-empty-stub-corruption.story.md`](lang-files-empty-stub-corruption.story.md)),
non nello stesso file delle 4 occorrenze precedenti. Grep repo-wide su
`Assert::isInstanceOf($user, User::class)` (import `Modules\User\Models\User`, la
classe sorella sbagliata) ha trovato 4 occorrenze in codice reale, oltre a un test e
tre file di documentazione con lo stesso pattern come esempio illustrativo.

**Istruzione dell'utente, verbatim, durante il turno**: "fare
Assert::isInstanceOf($user, User::class); e' sbagliato meglio confrontare con
UserContract !"

### Deviazione dichiarata dalla convenzione AC1 di questa story

AC1 prescrive `BaseUser` (classe concreta comune) come bersaglio del narrowing, non
`UserContract`. Il fix di questa occorrenza usa **`UserContract`** (interfaccia), su
istruzione esplicita e diretta dell'utente in questo turno — non e' un'interpretazione
mia della convenzione esistente, e' una deviazione voluta e dichiarata.

Entrambi gli approcci risolvono correttamente la classe di bug ("check sempre falso a
runtime contro la classe sorella sbagliata"), ma non sono la stessa convenzione:
`BaseUser` e' l'antenato comune concreto (ha tutte le property reali), `UserContract'
e' l'interfaccia che sia `User` che `Quaeris\Models\User` implementano (ha solo i
metodi dichiarati nel contratto). Nei 4 file toccati qui l'uso downstream era limitato
a `getAttribute()`, `->update()`, `hasVerifiedEmail()`,
`sendEmailVerificationNotification()` — tutti disponibili su `UserContract` (via
`@phpstan-require-extends Model` + `MustVerifyEmail`/`Authenticatable`), quindi
`UserContract` ha coperto senza errori PHPStan. Non garantito che copra ogni caso
futuro: se un prossimo fix necessita di una property/metodo specifico di `BaseUser`
non presente in `UserContract`, tornare a `BaseUser` per quel caso, non forzare
`UserContract` ovunque.

Questa story non aggiorna AC1 per renderla incoerente con se stessa: la deviazione resta
documentata qui, non silenziosamente contraddetta.

### File corretti (codice reale, non test, non doc)

- `Modules/User/app/Models/Traits/IsProfileTrait.php` — 5 occorrenze (righe 83, 113,
  143, 196, 291), rimosso `use Modules\User\Models\User;` (non piu' usato altrove nel
  file), `use Modules\Xot\Contracts\UserContract;` gia' presente
- `Modules/User/app/Filament/Resources/UserResource/Pages/BaseEditUser.php` — riga 36,
  import sostituito
- `Modules/User/app/Filament/Resources/UserResource/Pages/EditUser.php` — riga 35,
  stesso pattern
- `Modules/Cms/app/Http/Volt/VerifyComponent.php` — riga 21 (metodo `resend()`), import
  sostituito

### Deliberatamente non toccati

- `Modules/Tenant/tests/Unit/TenantModelsTest.php:72` — test, stesso pattern, lasciato
  (test non e' codice applicativo, e serve capire cosa sta testando prima di cambiarlo)
- `Modules/Xot/docs/quality-tools-philosophy.md` (+ copia `historical/`),
  `Modules/Xot/docs/wiki/integrations/quality-consolidated.md` — il pattern compare
  come esempio illustrativo in prosa, non come codice eseguito

### Verifica

`php -l` pulito sui 4 file. PHPStan mirato:
`./vendor/bin/phpstan analyse Modules/User/app/Models/Traits/IsProfileTrait.php
Modules/User/app/Filament/Resources/UserResource/Pages/BaseEditUser.php
Modules/User/app/Filament/Resources/UserResource/Pages/EditUser.php
Modules/Cms/app/Http/Volt/VerifyComponent.php --no-progress --memory-limit=2G` →
`[OK] No errors`.

### Nota per chi tocca ancora questo pattern

Questa e' la quinta occorrenza indipendente dello stesso bug strutturale in questo
codebase, ora con due convenzioni di fix diverse coesistenti (`BaseUser` nelle
occorrenze 1-4, `UserContract` qui). La proposta di una regola PHPStan
custom/pre-commit grep, gia' ipotizzata nelle occorrenze precedenti, resta non
implementata — con due convenzioni diverse in giro, una guardia meccanica dovrebbe
vietare `instanceof \Modules\User\Models\User` / `Assert::isInstanceOf(..., \Modules\User\Models\User::class)`
punto, senza prescrivere quale delle due alternative usare (dipende dal caso d'uso a
valle).
>>>>>>> .merge_file_OlQNNA
>>>>>>> .merge_file_PovLkj
