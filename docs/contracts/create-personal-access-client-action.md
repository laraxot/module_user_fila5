---
title: "CreatePersonalAccessClientAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Passport\\CreatePersonalAccessClientAction"
qmd: "CreatePersonalAccessClientAction client OAuth2 personal access delega CreateGenericClientAction"
---

# CreatePersonalAccessClientAction

Crea un client OAuth2 di tipo *personal access* delegando a `CreateGenericClientAction` con `personalAccess: true` e `password: false`. Codice: `app/Actions/Passport/CreatePersonalAccessClientAction.php`.

## Input

- `string $name`, `string $redirect`, `?UserContract $user = null`, `?string $provider = null`.

## Output

- `OauthClient`: il valore restituito da `CreateGenericClientAction::execute()`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PASSPORT-PAT-CLIENT-INV-1 | Il client restituito ha `personal_access_client = true` e `password_client = false`. Prova nel codice: `execute()`, argomenti fissi. Test esistente senza group: `tests/Unit/Actions/Passport/CreateSpecificClientActionsTest.php:45`. | — (non dimostrato) |

## Effetti collaterali

Quelli di `CreateGenericClientAction`: un INSERT su `oauth_clients`.

## Errori

- Nessuna eccezione propria.

## Non fa

- Il docblock della classe cita ancora `CreateClientAction` e `app(CreateClientAction::class)`: è un residuo di copia; il codice invoca `CreateGenericClientAction`.
