---
title: "RecordAuthenticationLogAction — contratto"
type: contract
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Auth\\RecordAuthenticationLogAction"
qmd: "RecordAuthenticationLogAction authentication_logs audit login connessione user tabella mancante skip"
---

# RecordAuthenticationLogAction

Scrive una riga in `authentication_logs` sulla connessione `user` per ogni tentativo di accesso. Codice: `app/Actions/Auth/RecordAuthenticationLogAction.php:25-58`.

## Input

- `UserContract&HasAuthentications $user`: l'utente (`execute`, riga 30).
- `array $attributes`: `ip_address`, `user_agent`, `login_at`, `login_successful`, `location` (riga 28).

## Output

- `void`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `RECORD-AUTH-INV-1` | Se la connessione user non ha database configurato la scrittura è saltata, con warning, senza eccezione. | righe 36-44 | `tests/Unit/Actions/Auth/RecordAuthenticationLogActionTest.php` (riferimento alla classe) |
| `RECORD-AUTH-INV-2` | Se la tabella `authentication_logs` non esiste sulla connessione la scrittura è saltata, con warning, senza eccezione. | righe 46-55 | come sopra |
| `RECORD-AUTH-INV-3` | Altrimenti la riga è creata tramite la relazione `authentications()` dell'utente. | riga 57 | come sopra |

## Effetti collaterali

Al massimo un INSERT in `authentication_logs` (connessione user). Log di warning in due casi di skip. Nessuna transazione, nessun evento esplicito.

## Errori

- Le eccezioni di `create()` (per esempio attributi non fillable o errori DB) non sono catturate e si propagano.

## Non fa

- Non valida `$attributes`: la forma è dichiarata solo nel docblock.
- Non legge né modifica l'utente.
