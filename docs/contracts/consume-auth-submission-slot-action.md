---
title: "Contratto — ConsumeAuthSubmissionSlotAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\ConsumeAuthSubmissionSlotAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, throttle, registrazione, recupero-password, sec-012]
---

# ConsumeAuthSubmissionSlotAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Perché è fatta così: [ADR 0001](../adr/0001-auth-submission-throttle-before-validation.md).
Sorgente: `app/Actions/Auth/ConsumeAuthSubmissionSlotAction.php`, costanti in `app/Enums/AuthThrottleScope.php`.
Chiamanti: `RegisterWidget::submit()` (`app/Filament/Widgets/Auth/RegisterWidget.php:78`) e `ForgotPasswordWidget::sendResetLink()`
(`app/Filament/Widgets/Auth/ForgotPasswordWidget.php:51`). Protegge due moduli aperti agli anonimi: uno crea utenti, l'altro manda email.

## Input

- `AuthThrottleScope $scope`: `Register` (5 invii per email) o `ForgotPassword` (3 invii per email); `MAX_PER_IP` = 10 per entrambi.
- `string $email`: come digitata (anche vuota o non valida).
- `?string $ip`: IP del chiamante; `null` vale `unknown`.

## Output

- `int`: secondi da attendere; `0` = invio consentito **e già conteggiato**; `>= 1` = bloccato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-AUTH-THROTTLE-INV-1 | Ogni chiamata consentita conta in entrambe le finestre (IP ed email, se l'email non è vuota) e ritorna `0`; il limite per email scatta anche cambiando IP (righe 28-45). | `USER-AUTH-THROTTLE-INV-1` |
| USER-AUTH-THROTTLE-INV-2 | Oltre `maxPerEmail()` per email o `MAX_PER_IP` per IP ritorna almeno 1 secondo; quando blocca ritorna subito, senza contare l'invio bloccato (righe 36-38). | `USER-AUTH-THROTTLE-INV-2` |
| USER-AUTH-THROTTLE-INV-3 | L'email è normalizzata (`trim` + minuscolo) e i due scope sono separati: `Mario@Example.org` e `mario@example.org` condividono il contatore, `register` e `forgot-password` no (righe 28-31, 50). | `USER-AUTH-THROTTLE-INV-3` |
| USER-AUTH-THROTTLE-INV-4 | Le chiavi del rate limiter contengono solo l'hash `sha256` di IP ed email (`auth-submit:<scope>:<ip\|email>:<hash>`): in cache non restano dati personali in chiaro (riga 50). | `USER-AUTH-THROTTLE-INV-4` |

Test: `tests/Unit/Actions/Auth/ConsumeAuthSubmissionSlotActionTest.php` (store `array`, nessun database).
(Il vecchio ID `AUTH-SUBMIT-INV-*` di una bozza precedente non è mai stato usato in un test: vale `USER-AUTH-THROTTLE-INV-*`, già nei test.)

## Effetti collaterali

1. Lettura dei contatori (`RateLimiter::tooManyAttempts`, `availableIn`) per la chiave IP e, se c'è un'email, per la chiave email.
2. Se nessuna finestra è piena: `RateLimiter::hit` su ogni chiave per `AuthThrottleScope::DECAY_SECONDS` (600 s).

Solo cache (store di default). Nessun database, nessuna coda, nessuna email, nessuna chiamata esterna.

## Errori

- Nessuna eccezione propria: un invio bloccato è un valore di ritorno (`>= 1`), non un errore. Un errore dello store di cache risale al chiamante.

## Non fa

- Non valida l'email né il resto del modulo, non scrive utenti, non invia posta.
- Non frena il login: ha il suo conteggio dei tentativi errati in `LoginWidget`.
- Non risponde con un messaggio: il widget traduce i secondi con `user::throttle.auth_form.retry.message`.
- Non distingue invii validi e non validi (INV-1: contano tutti).

## Limiti noti

- Limite noto: l'ordine «prima il controllo, poi `getState()`» è un dovere dei chiamanti e non ha test. Oggi vale: `RegisterWidget.php:78` precede `getState()` (riga 86),
  `ForgotPasswordWidget.php:51` precede `getState()` (riga 59). Un widget nuovo che dimentica la chiamata resta aperto ai bot.
- Dietro un proxy che non propaga l'IP reale, `request()->ip()` è quello del proxy e `MAX_PER_IP` colpisce tutti insieme.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Auth/ConsumeAuthSubmissionSlotAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
