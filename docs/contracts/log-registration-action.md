---
title: "LogRegistrationAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Activity\\LogRegistrationAction"
qmd: "LogRegistrationAction registrazione utente activity log ip user agent GDPR RegisterWidget"
---

# LogRegistrationAction

Scrive nel log di attività la registrazione di un nuovo utente. Codice: `app/Actions/Activity/LogRegistrationAction.php:10-28`.

## Input

- `User $user`: l'utente appena registrato (usato solo per `type`).
- `array<string, mixed> $properties`: proprietà extra (default `[]`).

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LOG-REG-INV-1 | Le proprietà registrate sono `type` dell'utente, `ip_address` e `user_agent` della richiesta, unite con `$properties`; in caso di chiave uguale vince `$properties`. Prova nel codice: righe 22-26. Test esistente senza group: `tests/Unit/Actions/Activity/LogRegistrationActionTest.php` (riferimento alla classe). | — (non dimostrato) |
| LOG-REG-INV-2 | La descrizione del log è fissa: `User registered via GDPR-compliant RegisterWidget`. Prova nel codice: riga 27. Test esistente senza group: `tests/Unit/Actions/Activity/LogRegistrationActionTest.php` (riferimento alla classe). | — (non dimostrato) |

## Effetti collaterali

Una riga nel log di attività (`activity()` di spatie/activitylog). Nessuna transazione, nessun evento, nessuna coda.

## Errori

- Nessun errore proprio. Fuori da una richiesta HTTP `request()->ip()` e `userAgent()` possono valere `null`.

## Non fa

- Non verifica che l'utente sia persistito né che la registrazione sia andata a buon fine: lo decide il chiamante.
- Registra indirizzo IP e user agent: dati personali (il nome della descrizione cita un widget specifico, accoppiamento da notare).
