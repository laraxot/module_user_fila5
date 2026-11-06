---
title: "User, correzioni PHPStan di gennaio 2025"
type: concept
status: stale
created: "2025-01"
updated: 2026-11-06
module: User
story: collision-rewrite-complete-files
tags: [phpstan, fixes, user, widgets, archive]
qmd: "user module correzioni phpstan gennaio 2025 BaseListUsers getTableActions view-string PasswordResetConfirmWidget mixed string cast UserTypeRegistrationsChartWidget TrendValue falso positivo"
related:
  - ../phpstan-fixes.md
  - ./phpstan-fixes-gennaio-complete.md
  - ./phpstan-fixes-roadmap.md
  - ./phpstan-fixes-passport.md
  - ../../quality-roadmap.md
  - ../../../../Xot/docs/stories/collision-rewrite-complete-files.story.md
---

# User, correzioni PHPStan di gennaio 2025

Registro dei quattro errori PHPStan emersi nel modulo User a gennaio 2025: per ognuno che cosa diceva PHPStan, che cosa si e' deciso e che cosa ne e' rimasto. Serve a chi incontra di nuovo uno di questi messaggi e vuole sapere se e' un difetto del codice o un limite dell'analisi.

E' storia: i quattro punti sono oggi risolti o non esistono piu' nella forma descritta (colonna "Oggi").

## Esito in sintesi

| # | Dove | Errore | Esito allora | Oggi (verificato il 2026-11-06) |
|---|------|--------|--------------|---------------------------------|
| 1 | `BaseListUsers::getTableActions()` | tipo di ritorno incompatibile col padre | falso positivo, codice lasciato | `BaseListUsers` estende `XotBaseListRecords` e non dichiara piu' `getTableActions()` |
| 2 | `PasswordResetConfirmWidget::$view` | `view-string` non accetta il valore di default | corretto con `@var view-string` | il widget estende `XotBaseSchemaWidget` e non ha piu' la proprieta' `$view` |
| 3 | `RegisterWidget`, `ResetPasswordWidget`, `PasswordExpiredWidget`, `UpdateUserAction` | cast da `mixed` a `string` | corretto con controllo di tipo | il controllo `is_string` e' ancora in `RegisterWidget` e `ResetPasswordWidget`; `PasswordExpiredWidget` e `UpdateUserAction` sono stati riscritti e non lo usano piu' |
| 4 | `UserTypeRegistrationsChartWidget` | callback di `Collection::map()` con tipo piu' stretto | falso positivo, codice lasciato | il callback accetta `mixed` e restringe con `instanceof TrendValue`: l'errore non si presenta piu' |

## Dettaglio

### 1. `BaseListUsers`, compatibilita' del tipo di ritorno

```text
Method BaseListUsers::getTableActions() should return array<string, Action|ActionGroup> but returns non-empty-array<string, ActionGroup|ChangePasswordAction|Action>.
```

Il metodo restituiva un array associativo con chiavi stringa e includeva `ChangePasswordAction`, che estende correttamente `Action`. L'errore riguardava solo la tipizzazione fine delle azioni. Decisione: analizzato, codice corretto, probabile falso positivo.

### 2. `PasswordResetConfirmWidget`, proprieta' `view-string`

```text
Static property PasswordResetConfirmWidget::$view (view-string) does not accept default value of type string.
```

Soluzione: PHPDoc esplicito `view-string`, valore stringa invariato.

```php
/** @var view-string */
protected static string $view = 'pub_theme::filament.widgets.auth.password.reset-confirm';
```

### 3. Cast da `mixed` a `string` nei widget di autenticazione

File coinvolti: `RegisterWidget.php`, `ResetPasswordWidget.php`, `PasswordExpiredWidget.php`, `UpdateUserAction.php`. Soluzione: non convertire mai un valore non tipizzato, controllarne il tipo prima.

```php
$value = config('some.config.key');
$stringValue = is_string($value) ? $value : '';
```

### 4. `UserTypeRegistrationsChartWidget`, callback della collezione

```text
Parameter #1 $callback of method Collection::map() expects callable(mixed, int|string): non-falsy-string, Closure(TrendValue): non-falsy-string given.
```

Il parametro del callback (`TrendValue`) e' piu' specifico di quello atteso (`mixed`): tecnicamente corretto e sicuro. Decisione: analizzato, falso positivo. La forma attuale evita comunque il messaggio, senza soppressioni:

```php
$data->map(fn (mixed $value) => $value instanceof TrendValue ? $value->aggregate : 0)
```

## Pattern che ne sono usciti

1. **Valori di configurazione**: `config('chiave')` restituisce `mixed`; si controlla con `is_string` e si da' un valore di riserva esplicito.
2. **Proprieta' vista**: dove una proprieta' contiene il nome di una vista, `@var view-string`. Dove si puo', la proprieta' non serve e la vista la decide la classe base XotBase.
3. **Proprieta' di widget tipizzate**: `public ?string $token = null;`, `public string $currentState = 'default';`.
4. **Callback di collezione**: accettare `mixed` e restringere dentro la funzione, invece di dichiarare il tipo specifico nel parametro.

## Conformita' Laraxot

- Tutti i widget estendono le classi base XotBase, mai Filament direttamente.
- Gli stati dei widget di autenticazione restano un sistema di stati esplicito, non flag sparsi.
- Le azioni personalizzate estendono le classi base appropriate; i metodi Filament restituiscono array associativi.

## Raccomandazioni di allora

1. Tipizzare sempre le proprieta' di stato dei widget e validare i valori di configurazione prima del cast.
2. Verificare la compatibilita' con le classi padre quando si ridefinisce un metodo Filament.
3. Provare a mano i widget di autenticazione dopo ogni modifica di tipo.
4. Per i falsi positivi confermati, allora si proponeva `@phpstan-ignore-next-line`.

La raccomandazione 4 e' **superata**: la regola del progetto vieta `@phpstan-ignore` e `@phpstan-ignore-next-line` (vedi `docs/wiki/rules/phpstan-l10-compliance.md`). Un falso positivo si risolve sulla causa, come e' successo per il punto 4 qui sopra, oppure resta nel report senza soppressione.

## Altre cronache PHPStan del modulo

- [../phpstan-fixes.md](../phpstan-fixes.md): sessione del 1 ottobre 2025 (codice orfano in `BaseUser`, 95 errori rimasti).
- [phpstan-fixes-gennaio-complete.md](./phpstan-fixes-gennaio-complete.md): chiusura di gennaio 2025 a zero errori.
- [phpstan-fixes-roadmap.md](./phpstan-fixes-roadmap.md): piano per il livello 10.
- [phpstan-fixes-passport.md](./phpstan-fixes-passport.md): decisioni per Passport e Socialite.
- Copie dello stesso testo di questo documento, da ritirare quando si decide: `phpstan-fixes-2025.md`, `phpstan-fixes-conflict.md`, `phpstan-fixes-conflict-2e.md` in questa cartella e `../phpstan_fixes_2025.md`.

## Cronologia del documento

Prima di questa riscrittura il nome `phpstan-fixes.md` era un rinvio ("identico al canonico") alla sessione di ottobre 2025, che pero' e' un altro documento. Il testo di gennaio 2025 stava in `phpstan-fixes-2.md` (senza front matter) e `phpstan-fixes-3.md` (con front matter e `related` verso file mai esistiti, piu' un riferimento a un issue di un altro repository, tolti). I due corpi erano identici riga per riga; qui sono unificati, collegati al codice di oggi e privati della raccomandazione superata. Gli originali sono ritirati come `.md.old` in questa cartella.
