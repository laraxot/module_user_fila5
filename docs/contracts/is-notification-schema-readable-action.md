---
title: "IsNotificationSchemaReadableAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Notification\\IsNotificationSchemaReadableAction"
qmd: "IsNotificationSchemaReadableAction tabella notifications connessione User verifica schema front office"
---

# IsNotificationSchemaReadableAction

Verifica che la tabella `notifications` esista sulla connessione del modello prima di interrogarla dal front office. Codice: `app/Actions/Notification/IsNotificationSchemaReadableAction.php:14-30`.

## Input

- Nessuno.

## Output

- `bool`: `hasTable` della tabella del modello `Notification` (riga 28).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NOTIF-SCHEMA-INV-1 | Se il modello non dichiara connessione si usa la connessione di default (`mysql` se la config non è una stringa). Prova nel codice: righe 22-26. Test esistente senza group: `tests/Unit/UserExecuteCoverage50Test.php` (riferimento alla classe). | — (non dimostrato) |
| NOTIF-SCHEMA-INV-2 | Restituisce solo l'esistenza della tabella, non le colonne. Prova nel codice: riga 28. Test esistente senza group: come sopra. | — (non dimostrato) |

## Effetti collaterali

Interrogazione dello schema (information_schema). Nessuna scrittura.

## Errori

- Nessuna gestione esplicita: un errore di connessione si propaga.

## Non fa

- Non verifica le colonne né i permessi.
