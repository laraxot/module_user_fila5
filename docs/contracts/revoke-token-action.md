---
title: "RevokeTokenAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Passport\\RevokeTokenAction"
qmd: "RevokeTokenAction revoca access token OAuth2 Passport e refresh token associato revoke"
---

# RevokeTokenAction

Revoca un access token Passport e, se presente, il suo refresh token. Codice: `app/Actions/Passport/RevokeTokenAction.php`.

## Input

- `OauthToken|string $token`: istanza o id.

## Output

- `bool`: `true` se il token è stato trovato; `false` se l'id non esiste.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PASSPORT-REVOKE-TOKEN-INV-1 | L'access token è revocato tramite `OauthToken::revoke()`. Prova nel codice: `execute()`. Test esistente senza group: riferimento in `tests/Unit/Actions/AdditionalActionsTest.php:76-79` (solo istanziazione). | — (non dimostrato) |
| PASSPORT-REVOKE-TOKEN-INV-2 | Se la relazione `refreshToken` esiste, anche il refresh token è revocato tramite `revoke()`. Prova nel codice: `execute()`, ramo `if ($token->refreshToken)`. | — (non dimostrato) |
| PASSPORT-REVOKE-TOKEN-INV-3 | Id inesistente: `false`, nessuna scrittura. Prova nel codice: `execute()`. | — (non dimostrato) |

## Effetti collaterali

Ordine: `revoke()` sull'access token, poi `revoke()` sul refresh token se presente. Due scritture separate, senza transazione: se la seconda fallisce, la prima resta.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non revoca altri token dell'utente o del client.
- Il comportamento interno di `OauthToken::revoke()` e `OauthRefreshToken::revoke()` non è stato riletto in questo contract: da verificare nei modelli.
