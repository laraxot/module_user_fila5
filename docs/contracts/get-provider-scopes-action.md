---
title: "GetProviderScopesAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\GetProviderScopesAction"
qmd: "GetProviderScopesAction scope OAuth provider config services scopes normalizzazione"
---

# GetProviderScopesAction

Restituisce gli scope OAuth configurati per un provider in `config('services.<provider>.scopes')`. Codice: `app/Actions/Socialite/GetProviderScopesAction.php`.

## Input

- `string $provider`.

## Output

- `array<int, string>`: lista indicizzata; vuota se mancante o non array.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-SCOPES-INV-1 | Scalari e `Stringable` sono convertiti in stringa; `null` e altri tipi sono scartati. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:71,79`. | — (non dimostrato) |
| SOCIALITE-SCOPES-INV-2 | Scope mancanti: `[]`. Prova nel codice: `execute()`. Test esistente senza group: stesso file. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione.

## Non fa

- Non applica scope di default per provider.
- Nessun chiamante in produzione nel perimetro cercato.
