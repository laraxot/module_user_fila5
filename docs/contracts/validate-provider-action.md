---
title: "ValidateProviderAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\ValidateProviderAction"
qmd: "ValidateProviderAction valida provider OAuth configurato eccezione ProviderNotConfigured client_id secret redirect"
---

# ValidateProviderAction

Si assicura che il provider OAuth sia configurato, altrimenti lancia `ProviderNotConfigured`. Codice: `app/Actions/Socialite/ValidateProviderAction.php`.

## Input

- `string $provider`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-VALIDATE-PROVIDER-INV-1 | Con variabili mancanti o segnaposto: `ProviderNotConfigured` con provider e elenco. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:93`. | — (non dimostrato) |
| SOCIALITE-VALIDATE-PROVIDER-INV-2 | Provider configurato: nessuna eccezione. Prova nel codice: `execute()`. Test esistente senza group: `SocialiteUtilityActionsTest.php:88`. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `Modules\User\Exceptions\ProviderNotConfigured`.

## Non fa

- Non verifica le credenziali presso il provider: solo la presenza e la forma dei valori.
- Chiamanti in produzione: `ProcessCallbackAction` e `app/Http/Controllers/Socialite/RedirectToProviderController.php`.
