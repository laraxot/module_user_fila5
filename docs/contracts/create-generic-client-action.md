---
title: "CreateGenericClientAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Passport\\CreateGenericClientAction"
qmd: "CreateGenericClientAction client OAuth2 generico personalAccess password provider uuid secret"
---

# CreateGenericClientAction

Crea e salva un client OAuth2 Passport con i flag di tipo passati dal chiamante. È la base usata da `CreatePasswordClientAction` e `CreatePersonalAccessClientAction`. Codice: `app/Actions/Passport/CreateGenericClientAction.php`.

## Input

- `string $name`, `string $redirect`.
- `bool $personalAccess`, `bool $password`: obbligatori, passati senza controlli.
- `?UserContract $user = null`, `?string $provider = null` (default `'users'`).

## Output

- `OauthClient`: modello salvato, con `id` UUID e `secret` di 40 caratteri in chiaro.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PASSPORT-GENERIC-CLIENT-INV-1 | `personal_access_client` e `password_client` riflettono esattamente i due argomenti. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Passport/PassportActionsCoverageBatch2Test.php:66`, `CreateSpecificClientActionsTest.php`. | — (non dimostrato) |
| PASSPORT-GENERIC-CLIENT-INV-2 | `id` UUID, `secret` 40 caratteri, `revoked = false`, `provider` default `'users'`. Prova nel codice: `execute()`. Test esistente senza group: nessuno sulle asserzioni specifiche. | — (non dimostrato) |

## Effetti collaterali

Un `save()` (INSERT) su `oauth_clients`. Nessuna transazione, evento, coda o servizio esterno.

## Errori

- Nessuna eccezione propria. Errori di database propagati.

## Non fa

- Non impedisce la combinazione `personalAccess = true` e `password = true`.
- Non valida `redirect`.
