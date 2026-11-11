---
title: "Pulse login metric: fix schema key_hash e backfill authentication_logs"
type: story
module: User
epic: authentication-observability
story_id: pulse-login-backfill-key-hash
slug: pulse-login-backfill-key-hash
status: in-progress
repository: laraxot/module_user_fila5
created: 2026-11-11
updated: 2026-11-11
qmd: "pulse user_login backfill authentication_logs key_hash generated column schema drift"
context:
  - ../../../../Xot/database/migrations/2024_09_24_111828_create_pulse_aggregates_table.php
  - ../../../../Xot/database/migrations/2024_09_24_111828_create_pulse_entries_table.php
  - ../../../app/Console/Commands/BackfillLoginPulseCommand.php
  - ../../../app/Actions/Login/RecordLoginPulseAction.php
  - ../../../app/Filament/Widgets/Pulse/LoginWidget.php
related:
  - ../../../../Xot/docs/bmad/stories/phpstan-modules-remediation.story.md
---

# Pulse login metric: fix schema key_hash e backfill

## Obiettivo (cosa voleva fare l'utente)

- `LoginWidget` (Filament ChartWidget) disegna `user_login` da
  `Pulse::graph(['user_login'], 'count', ...)`; `LoginCard` usa
  `GetLoginStatsAction` su `authentication_logs`.
- `RecordLoginPulseAction` esiste ma non ha call site. `LoginListener` scrive
  `AuthenticationLog` dei login riusciti, senza registrare la metrica Pulse.
- `user:pulse-backfill-logins` ricostruisce la metrica da
  `authentication_logs` (connessione `user`, DB `ptv_user`).
- Goal utente: **importare in Pulse tutto `authentication_logs`** (169 righe
  nel periodo, non solo 7 giorni).

## Root cause del fallimento

`BackfillLoginPulseCommand` (e OGNI scrittura Pulse, live inclusa) fallisce con:

```
SQLSTATE[HY000]: 1364 Field 'key_hash' doesn't have a default value
insert into pulse_aggregates (aggregate,bucket,key,period,type,value) ...
```

**Schema drift**: le migration Xot `2024_09_24_111828_create_pulse_{entries,aggregates}_table`
creano `key_hash` come `string` normale NOT NULL. Da Pulse ~1.x il campo è una
**colonna generata**: `binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL`
(la migration ufficiale `pulse_values` del progetto è già corretta — solo
entries/aggregates sono sbagliate). `DatabaseStorage` non invia `key_hash`
negli insert: si affida al DB. Le tabelle sono vuote (0 righe) → la scrittura
Pulse è rotta globalmente, non solo il backfill.

Il tentativo `--days=500` conferma anche un secondo comportamento: il comando
calcola esplicitamente `effectiveSince = max(requestedSince, now - 7 giorni)`.
Conta 169 righe nel periodo richiesto, ma una sola riga importabile negli ultimi
7 giorni; l'errore SQL annulla la transazione. La query non filtra
`login_successful`, quindi conta anche gli accessi falliti.

## Vincolo architetturale scoperto

Laravel Pulse `v1.10.0` **ritiene solo 7 giorni**: `trim()` cancella `pulse_entries` con
`timestamp <= now-7g` e `pulse_aggregates` con `bucket <= now-period`
(period max 10080 min = 7g); anche `preaggregate()` scarta record più vecchi.
Alzare `PULSE_STORAGE_KEEP` non rimuove il limite hardcoded. `AuthenticationLog`
è invece prunable dopo 365 giorni per `created_at`; quindi i 500 giorni
richiesti non equivalgono a 500 giorni ancora disponibili.

Il requisito "tutto in Pulse" è ambiguo tra persistenza nelle tabelle native
Pulse (richiede storage/retention custom) e visualizzazione nel dashboard Pulse
leggendo `AuthenticationLog` (fonte autorevole, senza duplicare lo storico).
Scegliere prima di implementare la storia completa. La metrica nativa Pulse può
restare limitata alla finestra recente.

## Decisione richiesta

- **Consigliato:** metrica nativa Pulse per gli ultimi 7 giorni; lo storico
  completo ancora presente in `AuthenticationLog` è mostrato nel dashboard con
  una query dedicata, senza copiarlo nelle tabelle Pulse.
- **Alternativa:** storage Pulse personalizzato che mantenga e aggreghi lo
  storico oltre i 7 giorni; più invasivo e non compatibile con il trim/graph
  standard del pacchetto.
- Il comando attuale conta tutte le righe con `login_at`, inclusi i fallimenti.
  La richiesta parla di "tutto AuthenticationLog"; default proposto: mantenerli
  tutti nel grafico storico.

## Fix

1. Migration Xot `fix_pulse_key_hash_generated_columns` (mysql/mariadb,
   guard `hasTable`+driver, no-op altrove): `ALTER TABLE ... MODIFY key_hash
   binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL` su
   `pulse_entries` e `pulse_aggregates`.
2. Rieseguire `user:pulse-backfill-logins --days=7 --force` → 0 errori,
   verifica aggregati OK.
3. Documentare nel comando/story il cap dei 7 giorni (già presente come warn).

## Esito

In corso.
