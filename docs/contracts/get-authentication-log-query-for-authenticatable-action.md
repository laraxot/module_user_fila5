---
title: "GetAuthenticationLogQueryForAuthenticatableAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Authentication\\GetAuthenticationLogQueryForAuthenticatableAction"
qmd: "GetAuthenticationLogQueryForAuthenticatableAction query log autenticazione authenticatable namespace Authentication"
---

# GetAuthenticationLogQueryForAuthenticatableAction

Restituisce il query builder dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Authentication/GetAuthenticationLogQueryForAuthenticatableAction.php:12-25`.

## Input

- `Model $authenticatable` (`execute`, riga 19).

## Output

- `Builder<AuthenticationLog>` non eseguito, filtrato su morph class e chiave (righe 21-23).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| GET-AUTH-LOG-FOR-AUTH-INV-1 | Il filtro è esattamente morph class e chiave del modello. Prova nel codice: righe 21-23. Test esistente senza group: Test: nessuno (nessun riferimento alla classe in `tests/`). | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Corpo identico a [authentication-log-query-action](authentication-log-query-action.md) e a [get-authentication-log-query-action](get-authentication-log-query-action.md): tre copie, da consolidare in un intervento dedicato (non fatto qui).
