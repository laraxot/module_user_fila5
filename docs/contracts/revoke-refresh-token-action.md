---
title: "RevokeRefreshTokenAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Passport\\RevokeRefreshTokenAction"
qmd: "RevokeRefreshTokenAction revoca refresh token OAuth2 Passport revoked save"
---

# RevokeRefreshTokenAction

Revoca un singolo refresh token Passport. Codice: `app/Actions/Passport/RevokeRefreshTokenAction.php`.

## Input

- `OauthRefreshToken|string $token`: istanza o id.

## Output

- `bool`: `true` se trovato e marcato; `false` se l'id non esiste.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PASSPORT-REVOKE-REFRESH-INV-1 | Il token trovato finisce con `revoked = true` tramite `save()`. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Passport/PassportActionsCoverageBatch2Test.php:163`. | — (non dimostrato) |
| PASSPORT-REVOKE-REFRESH-INV-2 | Id inesistente: `false`, nessuna scrittura. Prova nel codice: `execute()`, controllo `instanceof`. | — (non dimostrato) |

## Effetti collaterali

Un `save()` su `oauth_refresh_tokens`. Nessuna transazione, evento o coda.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non tocca l'access token collegato.
- Su un token già revocato esegue comunque un `save()` e ritorna `true`.
