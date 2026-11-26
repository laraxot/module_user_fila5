---
title: "GetMissingProviderSettingsAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\GetMissingProviderSettingsAction"
qmd: "GetMissingProviderSettingsAction variabili ambiente mancanti provider OAuth client_id client_secret redirect segnaposto DCP-271"
---

# GetMissingProviderSettingsAction

Elenca le variabili d'ambiente che mancano, o sono segnaposto, perché un provider OAuth sia utilizzabile. Codice: `app/Actions/Socialite/GetMissingProviderSettingsAction.php`.

## Input

- `string $provider`: chiave di `config/services.php`.

## Output

- `list<string>`: nomi delle variabili da impostare, nell'ordine `CLIENT_ID`, `CLIENT_SECRET`, `REDIRECT_URI` con prefisso del provider in maiuscolo (es. `GOOGLE_CLIENT_ID`). Vuota se il provider è configurato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-MISSING-ENV-INV-1 | Una chiave è "reale" solo se è stringa, non vuota dopo `trim` e non corrisponde al pattern segnaposto. Prova nel codice: `isRealValue()`. Test esistente senza group: `tests/Unit/Actions/Socialite/ProviderSettingsActionsTest.php:27,34,47`. | — (non dimostrato) |
| SOCIALITE-MISSING-ENV-INV-2 | Lista vuota se e solo se tutte e tre le chiavi sono reali. Prova nel codice: `execute()`. Test esistente senza group: `ProviderSettingsActionsTest.php:47`. | — (non dimostrato) |

## Effetti collaterali

Nessuno: sola lettura di config.

## Errori

- Nessuna eccezione. Config assente: tutte le variabili risultano mancanti.

## Non fa

- Non verifica le credenziali presso il provider.
- Il pattern segnaposto (`your-`, `xxx`, `changeme`, ...) è una lista chiusa nel codice.
- Chiamanti in produzione: `ValidateProviderAction`, `IsProviderConfiguredAction`.
