---
title: "Contratto — RevokeAllUserTokensAction"
type: contract
action: "Modules\\User\\Actions\\Passport\\RevokeAllUserTokensAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "RevokeAllUserTokensAction revoca tutti access token Passport utente revoked update logout forzato"
---

# RevokeAllUserTokensAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Passport/RevokeAllUserTokensAction.php`.
Revoca in blocco gli access token Passport ancora attivi di un utente. Chiamanti: l'azione di massa `revoke_all_for_user` della risorsa Filament
`Filament/Clusters/Passport/Resources/OauthAccessTokenResource.php` (righe 144 e 292), per ogni `user_id` dei token selezionati. È un'operazione di amministrazione:
chiude accessi API già concessi. Non è quella usata dalla cancellazione dell'account (quella è [RevokeUserAccessAction](revoke-user-access-action.md)).

## Input

- `UserContract|string $user`: l'istanza (usa `->id`) oppure l'id utente come stringa (`Modules\Xot\Contracts\UserContract`).

## Output

- `int`: numero di token che erano attivi e sono stati revocati; `0` se non ce n'erano.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PASSPORT-REVOKE-ALL-INV-1 | Revoca solo i token dell'utente indicato e solo quelli non già revocati: i token di altri utenti restano attivi, quelli già revocati non sono contati (righe 33-35). | `PASSPORT-REVOKE-ALL-INV-1` |
| PASSPORT-REVOKE-ALL-INV-2 | Il valore di ritorno è il numero di righe aggiornate; senza token attivi è `0` (riga 35). | `PASSPORT-REVOKE-ALL-INV-2` |

Test: `tests/Feature/Actions/Passport/RevokeAllUserTokensActionTest.php` («revokes tokens for specific user only» e «does not revoke already revoked tokens» per INV-1; «returns count of revoked tokens» e «handles user with no tokens» per INV-2),
con database di test (connessione `user`, tabelle `oauth_access_tokens` e `oauth_clients`). Esiste una copia in `tests/Feature/Actions/RevokeAllUserTokensActionTest.php` (stessi casi, nessun group).

## Effetti collaterali

- Una sola `UPDATE oauth_access_tokens SET revoked = 1 WHERE user_id = ? AND revoked = 0` sulla connessione `user` (`OauthToken::where(...)->update(...)`, modello `app/Models/OauthToken.php`).
- Aggiornamento in massa: non passa dagli eventi Eloquent dei singoli modelli. Nessuna transazione, nessun evento, nessuna coda, nessuna notifica.

## Errori

- Nessuna eccezione propria. Errori del database risalgono al chiamante.

## Non fa

- Non revoca i refresh token (`oauth_refresh_tokens`): un refresh token valido può emettere un nuovo access token. [RevokeUserAccessAction](revoke-user-access-action.md) li revoca.
- Non ruota il remember token né invalida le sessioni web.
- Non cancella i token e non controlla chi la invoca: l'autorizzazione è del chiamante (la risorsa Filament).
- Non verifica che l'utente esista.

## Limiti noti

- Limite noto: con un `user_id` letto dalla selezione di record in `OauthAccessTokenResource`, il chiamante converte in stringa (righe 144, 292); l'Action non valida il valore (una stringa vuota non corrisponde a nessun token e ritorna `0`).
- Limite noto: l'accesso API di chi ha un refresh token non si chiude con questa Action sola.
