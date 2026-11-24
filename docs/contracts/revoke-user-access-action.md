---
title: "Contratto — RevokeUserAccessAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\RevokeUserAccessAction"
owner: User
status: accepted
updated: 2026-11-24
qmd: "RevokeUserAccessAction revoca token Passport refresh token remember token account cancellato SEC-05"
---

# RevokeUserAccessAction

Chiude ogni accesso già concesso a un utente (SEC-05). Codice: `app/Actions/Auth/RevokeUserAccessAction.php:21-57`.

## Input

- `BaseUser $user`: l'utente di cui chiudere gli accessi (`execute`, riga 28).

## Output

- `int`: numero di access token Passport che erano attivi e sono stati revocati (riga 56).

## Invarianti

| ID | Regola | Prova nel codice | Test esistente (senza group) |
|---|---|---|---|
| `USER-REVOKE-INV-1` | Sono revocati solo gli access token dell'utente con `revoked = false`; il ritorno è il loro numero. | righe 30-34, 43-47, 56 | `tests/Feature/Auth/DeletedAccountAccessTest.php:99` |
| `USER-REVOKE-INV-2` | Sono revocati i refresh token di tutti i token dell'utente, anche di quelli già revocati. | righe 38-41 | `tests/Feature/Auth/DeletedAccountAccessTest.php:99` |
| `USER-REVOKE-INV-3` | Il remember token è ruotato (stringa casuale di 60 caratteri) solo se non è vuoto; se è vuoto l'utente non è salvato. | righe 51-54 | `tests/Feature/Auth/DeletedAccountAccessTest.php:99,145` |

## Effetti collaterali

Ordine di esecuzione: lettura degli id dei token attivi, update dei refresh token, update degli access token (solo se ce n'è almeno uno), eventuale `save()` dell'utente per il remember token. Nessuna transazione esplicita, nessun evento dispatchato dall'Action (gli eventi Eloquent del `save()` restano quelli del modello), nessuna coda, nessun servizio esterno.

## Errori

- L'Action non lancia eccezioni proprie; gli errori del database si propagano.

## Non fa

- Non valorizza né azzera `deleted_at` e non cancella l'utente (il blocco dell'account è del provider, vedi [build-active-user-provider-action](build-active-user-provider-action.md)).
- Non invalida le sessioni web: cadono alla richiesta successiva perché il provider non trova più l'utente (docblock, righe 16-19).
- Marker `@contract` e `@see` presenti nel docblock della classe.
