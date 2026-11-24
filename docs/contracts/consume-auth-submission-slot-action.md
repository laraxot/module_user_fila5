---
title: "ConsumeAuthSubmissionSlotAction — contratto"
type: contract
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Auth\\ConsumeAuthSubmissionSlotAction"
qmd: "ConsumeAuthSubmissionSlotAction freno invio registrazione recupero password SEC-012 rate limiter IP email"
---

# ConsumeAuthSubmissionSlotAction

Freno agli invii dei moduli di registrazione e recupero password (SEC-012): una finestra per IP e una per email. Codice: `app/Actions/Auth/ConsumeAuthSubmissionSlotAction.php:17-48`.

## Input

- `AuthThrottleScope $scope`: ambito del modulo (fornisce il massimo per email e la durata).
- `string $email`: normalizzata con `trim` e minuscolo; se vuota la finestra email non si applica.
- `?string $ip`: se nullo la chiave IP usa il valore `unknown`.

## Output

- `int`: 0 se l'invio è consentito (e conteggiato); altrimenti i secondi da attendere, almeno 1 (righe 31-41).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `AUTH-SUBMIT-INV-1` | Se una finestra è già esaurita nessuna finestra viene incrementata: il tentativo non conta. | righe 31-35 prima di 37-39 | Test: nessuno. |
| `AUTH-SUBMIT-INV-2` | Se l'invio è consentito tutte le finestre (IP ed email) sono incrementate di un'unità con durata `DECAY_SECONDS`. | righe 37-41 | Test: nessuno. |
| `AUTH-SUBMIT-INV-3` | Le chiavi contengono l'hash SHA-256 di IP ed email, non il dato in chiaro. | righe 44-46 | Test: nessuno. |
| `AUTH-SUBMIT-INV-4` | Tutti i ip nulli condividono la stessa finestra (`unknown`). | riga 24 | Test: nessuno. |

## Effetti collaterali

Scrive solo nel `RateLimiter` (cache), nessun database, nessun evento. Il controllo avviene prima della validazione e della scrittura del chiamante, come richiesto dal docblock.

## Errori

- Nessuna eccezione. Il caso bloccato è un intero positivo, non un'eccezione.

## Non fa

- Non valida il modulo né invia email.
- Non distingue il successo dal fallimento del tentativo: ogni invio conta.
