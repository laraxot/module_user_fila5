---
title: "GetNotifiableEmailAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Auth\\GetNotifiableEmailAction"
qmd: "GetNotifiableEmailAction indirizzo email notifica reset password verifica getEmailForPasswordReset attributo email"
---

# GetNotifiableEmailAction

Nome file storico: la classe si chiamava `ResolveNotifiableEmailAction` e il docblock di `GetNotifiableEmailAction` cita ancora `docs/contracts/resolve-notifiable-email-action.md`.

Risolve l'indirizzo a cui spedire le email di autenticazione (reset password, verifica email). Codice: `app/Actions/Auth/GetNotifiableEmailAction.php:18-40`.

## Input

- `Model $notifiable` (`execute`, riga 22).

## Output

- `?string`: l'indirizzo, oppure `null` se il modello non ne ha.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| RESOLVE-EMAIL-INV-1 | Se il modello espone `getEmailForPasswordReset()` il suo valore ha la precedenza sull'attributo `email`. Prova nel codice: righe 24-29. Test esistente senza group: `tests/Unit/Actions/Auth/GetNotifiableEmailActionTest.php` (riferimento alla classe). | — (non dimostrato) |
| RESOLVE-EMAIL-INV-2 | Un valore non stringa lancia un'eccezione (`Webmozart Assert`) e la mail non parte. Prova nel codice: righe 26, 36. Test esistente senza group: come sopra. | — (non dimostrato) |
| RESOLVE-EMAIL-INV-3 | Senza metodo e senza attributo `email` valorizzato il risultato è `null`. Prova nel codice: righe 31-33. Test esistente senza group: come sopra. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `InvalidArgumentException` (Webmozart Assert) se il valore non è stringa.

## Non fa

- Non valida il formato dell'indirizzo.
- Incoerenza: il docblock (riga 15) promette `null` quando il modello non ha un indirizzo, ma se `getEmailForPasswordReset()` esiste e restituisce `null` l'`Assert::string` lancia (riga 26). Il contratto segue il codice; la discrepanza va sistemata in un intervento dedicato.
