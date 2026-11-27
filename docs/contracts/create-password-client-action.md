---
title: "CreatePasswordClientAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Passport\\CreatePasswordClientAction"
qmd: "CreatePasswordClientAction client OAuth2 password grant delega CreateGenericClientAction"
---

# CreatePasswordClientAction

Crea un client OAuth2 di tipo *password grant* delegando a `CreateGenericClientAction` con `password: true` e `personalAccess: false`. Codice: `app/Actions/Passport/CreatePasswordClientAction.php`.

## Input

- `string $name`, `string $redirect`, `?UserContract $user = null`, `?string $provider = null`.

## Output

- `OauthClient`: il valore restituito da `CreateGenericClientAction::execute()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PASSPORT-PWD-CLIENT-INV-1 | Il client restituito ha `password_client = true` e `personal_access_client = false`. Prova nel codice: `execute()`, argomenti fissi. Test esistente senza group: `tests/Unit/Actions/Passport/CreateSpecificClientActionsTest.php:29`. | — (non dimostrato) |
| PASSPORT-PWD-CLIENT-INV-2 | Nessun comportamento proprio: tutto il resto è delegato. Prova nel codice: `execute()`. Test esistente senza group: stesso file. | — (non dimostrato) |

## Effetti collaterali

Quelli di `CreateGenericClientAction`: un INSERT su `oauth_clients`. Nessuna transazione o evento propri.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non risolve l'istanza tramite iniezione nel costruttore: usa `app(...)` a ogni chiamata.
