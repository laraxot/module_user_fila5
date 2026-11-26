---
title: "ADR — Il registro degli accessi sta sulla connessione user e non rompe mai il login"
type: decision
module: User
decision-makers: [User module owner]
status: accepted
created: 2026-11-24
updated: 2026-11-26
related:
  - ../../app/Actions/Auth/RecordAuthenticationLogAction.php
  - ../../app/Models/BaseModel.php
  - ../contracts/record-authentication-log-action.md
qmd: "authentication log never breaks login registro"
---

# ADR: il registro degli accessi sta sulla connessione `user` e non rompe mai il login

## Contesto

- `authentication_logs` appartiene agli utenti: i modelli del modulo estendono `Modules/User/app/Models/BaseModel.php`,
  che dichiara `protected $connection = 'user'`, e nelle installazioni con database separato la tabella vive accanto a `users`.
- I listener `LoginListener` e `FailedLoginListener` scrivono il log a ogni tentativo. Un deploy con la connessione
  `user` non configurata o senza la tabella trasformava ogni login in un errore 500.
- Domanda: il registro è più importante dell'accesso?

## Driver della decisione

- Disponibilità: l'audit e' un accessorio del login, non il servizio; un difetto di audit non deve diventare un 500.
- Coerenza dei dati: `authentication_logs` vive sulla connessione `user`, dove sta `users`.
- Semplicità per chi configura: il controllo deve funzionare anche con installazioni parziali (connessione o tabella
  mancanti) senza richiedere interventi sul tenant.

## Alternative scartate

- Lasciare propagare l'eccezione: l'audit fermerebbe l'autenticazione, cioè il servizio.
- Scrivere sulla connessione di default: il log finirebbe lontano dalla tabella `users` a cui si riferisce.

## Decisione

- `RecordAuthenticationLogAction` controlla prima `IsUserDatabaseConfiguredAction` e `Schema::hasTable()` sulla
  connessione del modello; se manca qualcosa scrive un `Log::warning` e ritorna, senza eccezione.
- Il parametro è `UserContract&HasAuthentications`, mai la classe concreta `BaseUser`: i listener controllano le stesse
  interfacce.

## Conseguenze

- Pro: login sempre disponibile; il problema di configurazione resta visibile nei log.
- Contro: con la tabella mancante gli accessi non sono registrati; serve un monitoraggio dei warning.

## Conferma

- Test Pest source-level: `Modules/User/tests/Unit/Actions/Auth/RecordAuthenticationLogActionTest.php` (5 test che leggono il sorgente
  dell'Action; groups `USER-AUTHLOG-INV-1` e `USER-AUTHLOG-INV-3`): `cd laravel && vendor/bin/pest --group=USER-AUTHLOG-INV-1`.
- Il comportamento a runtime (tabella mancante, solo `Log::warning`, nessuna eccezione) non ha un test oggi: gli invarianti 2 e 4 del
  [contratto](../contracts/record-authentication-log-action.md) non sono dimostrati. Nessuna conferma automatica oggi; proposta: un test
  che esegua l'Action con una connessione senza `authentication_logs` e asserisca assenza di eccezione e presenza del warning.
