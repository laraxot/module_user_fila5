---
title: "Contratto — RevokeUserAccessAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\RevokeUserAccessAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, token, passport, account-cancellato, sec-05]
---

# RevokeUserAccessAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Perché esiste: [ADR 0004](../adr/0004-deleted-accounts-are-filtered-by-auth-provider.md).
Sorgente: `app/Actions/Auth/RevokeUserAccessAction.php`. Unico chiamante nel repo: `Modules/Gdpr/app/Actions/Account/DeleteAccountAction.php:85`, dentro la
transazione di cancellazione dell'account. Chiude gli accessi già concessi: token Passport, refresh token, cookie «ricordami».

## Input

- `Modules\User\Models\BaseUser $user`: l'utente (già salvato) di cui chiudere gli accessi.

## Output

- `int`: numero di **access token** revocati ora (i refresh token non sono contati).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-REVOKE-INV-1 | Tutti gli access token non revocati dell'utente passano a `revoked = true`, i suoi refresh token pure, e i token di altri utenti restano intatti; il ritorno è il numero di access token revocati (righe 34-51). | `USER-REVOKE-INV-1` |
| USER-REVOKE-INV-2 | Se l'utente ha un remember token, questo è **ruotato** (nuova stringa casuale di 60 caratteri, `save()`), non azzerato: il vecchio cookie «ricordami» non vale più (righe 55-58). | `USER-REVOKE-INV-2` |
| USER-REVOKE-INV-3 | Un utente senza remember token (stringa vuota) non viene salvato né modificato (riga 55). | `USER-REVOKE-INV-3` |
| USER-REVOKE-INV-4 | I refresh token sono revocati per **tutti** i token dell'utente, anche per quelli già revocati: un refresh token valido rigenererebbe l'accesso (righe 42-45, sottoquery su `oauth_access_tokens`). | — (non dimostrato) |

I test (`tests/Feature/Auth/DeletedAccountAccessTest.php`) creano righe in `oauth_access_tokens` e `oauth_refresh_tokens` e richiedono un database di test migrato.

## Effetti collaterali

In quest'ordine:

1. `SELECT id FROM oauth_access_tokens WHERE user_id = ? AND revoked = 0` (elenco in memoria).
2. `UPDATE oauth_refresh_tokens SET revoked = 1` per tutti i refresh token non revocati dei token dell'utente (una sola query con sottoquery).
3. `UPDATE oauth_access_tokens SET revoked = 1` per gli id letti al punto 1 (solo se l'elenco non è vuoto).
4. `users.remember_token` ruotato con `save()` sul modello passato (solo se non vuoto): scattano gli eventi Eloquent del modello utente.

Nessuna transazione propria (la apre il chiamante), nessuna coda, nessuna email, nessuna chiamata esterna.

## Errori

- Nessuna eccezione propria. Errori del database (connessione `user`, tabelle Passport assenti) risalgono al chiamante e, in `DeleteAccountAction`, annullano la transazione.

## Non fa

- Non cancella l'utente né imposta `deleted_at`: lo fa il chiamante (`DeleteAccountAction`, modulo Gdpr).
- Non chiude le sessioni web su altri dispositivi: cadono alla richiesta successiva perché [BuildActiveUserProviderAction](build-active-user-provider-action.md) non trova più l'utente.
- Non revoca i client OAuth dell'utente né altri token (Sanctum, personal access token fuori da `oauth_access_tokens`).
- Non controlla i permessi di chi la invoca.

## Limiti noti

- Limite noto: il tipo del parametro è la classe interna `BaseUser`, non `UserContract`. Un modello utente di progetto che non estende `BaseUser` non può usarla.
- Esiste [RevokeAllUserTokensAction](revoke-all-user-tokens-action.md) (solo access token, senza refresh né remember token): non è un sostituto di questa.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Auth/RevokeUserAccessAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
