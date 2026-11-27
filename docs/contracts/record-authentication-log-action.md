---
title: "Contratto — RecordAuthenticationLogAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\RecordAuthenticationLogAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, audit, log-accessi, dati-personali]
---

# RecordAuthenticationLogAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Perché è fatta così: [ADR 0002](../adr/0002-authentication-log-never-breaks-login.md).
Sorgente: `app/Actions/Auth/RecordAuthenticationLogAction.php`. Chiamanti: `app/Listeners/LoginListener.php:75` (accesso riuscito) e
`app/Listeners/FailedLoginListener.php:38` (accesso fallito). Scrive dati personali: IP, user agent, orario dell'accesso.

## Input

- `UserContract&HasAuthentications $user`: l'utente (identità + capacità di avere registri di accesso). Mai la classe concreta `BaseUser`.
- `array $attributes`: `ip_address`, `user_agent`, `login_at`, `login_successful` (bool), `location` (array); passati così come sono a `authentications()->create()`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-AUTHLOG-INV-1 | Se la tabella `authentication_logs` manca sulla connessione del modello (`user`) scrive un `Log::warning` e ritorna: il login non diventa mai un errore 500 per colpa dell'audit (righe 50-58). | `USER-AUTHLOG-INV-1` (source-level: il test controlla che nel sorgente compaiano `hasTable` e `Log::warning`, non esegue l'Action) |
| USER-AUTHLOG-INV-2 | Se il database utenti non è configurato (`IsUserDatabaseConfiguredAction` falso) scrive un `Log::warning` e ritorna senza toccare il database (righe 40-48). | — (non dimostrato) |
| USER-AUTHLOG-INV-3 | Il parametro è tipizzato `UserContract&HasAuthentications` e non importa `BaseUser`: i listener controllano le stesse interfacce (riga 34). | `USER-AUTHLOG-INV-3` (source-level, come INV-1) |
| USER-AUTHLOG-INV-4 | Con database e tabella presenti la riga è creata sulla relazione `authentications()` dell'utente, sulla connessione `user` (`BaseModel::$connection`, riga 61). | — (non dimostrato) |

Test: `tests/Unit/Actions/Auth/RecordAuthenticationLogActionTest.php`.
(Il vecchio ID `RECORD-AUTH-INV-*` di una bozza precedente non è mai stato usato in un test: vale `USER-AUTHLOG-INV-*`, già nei test.)

## Effetti collaterali

1. `IsUserDatabaseConfiguredAction`: lettura della configurazione della connessione `user`.
2. `Schema::connection(<connessione>)->hasTable('authentication_logs')`: lettura dello schema.
3. `INSERT INTO authentication_logs` (via `$user->authentications()->create($attributes)`) con gli eventi Eloquent del modello `AuthenticationLog`.
4. In caso di salto: una riga di log applicativo con `connection`, `table`, `user_id` (e `database` se manca la tabella). Nessuna coda, nessuna email.

## Errori

- Nessuna eccezione per configurazione o tabella mancante (INV-1/INV-2): solo `Log::warning`.
- Gli altri errori del database durante l'`INSERT` (colonna mancante, vincolo) risalgono al listener.

## Non fa

- Non decide se l'accesso riesce e non lo blocca mai.
- Non calcola la posizione né legge l'IP: `location`, `ip_address`, `user_agent` arrivano dal listener.
- Non registra il metrico Pulse (lo fa `RecordLoginPulseAction`, chiamato dai listener subito dopo).
- Non ripulisce né ruota i registri vecchi: nessuna retention in questa Action.

## Limiti noti

- Limite noto: con la tabella mancante gli accessi **non sono registrati**, senza alcun segnale all'utente: serve monitorare i warning (`authentication_logs missing on user connection`).
- I due group presenti sono test source-level: dimostrano che certe righe di codice esistono, non il comportamento a runtime. INV-2 e INV-4 sono nel backlog test.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Auth/RecordAuthenticationLogAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
