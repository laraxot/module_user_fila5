---
title: "GetFilamentUserConfigurationAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Shield\\GetFilamentUserConfigurationAction"
qmd: "GetFilamentUserConfigurationAction filament_user ruolo utente Filament Shield FilamentShieldData"
---

# GetFilamentUserConfigurationAction

Nome file storico: la classe si chiamava `ResolveFilamentUserConfigurationAction` e il docblock di `GetFilamentUserConfigurationAction` cita ancora `docs/contracts/resolve-filament-user-configuration-action.md`.

Riassume la configurazione del ruolo "filament user" di Shield, leggendola da `FilamentShieldData`. Codice: `app/Actions/Shield/GetFilamentUserConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{enabled: bool, name: string}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SHIELD-FILAMENT-USER-INV-1 | `enabled` è `false` se la proprietà manca o è null. Prova nel codice: `execute()`, `?? false`. | — (non dimostrato) |
| SHIELD-FILAMENT-USER-INV-2 | `name` vale `'Filament User'` se la proprietà manca. Prova nel codice: `execute()`, `?? 'Filament User'`. | — (non dimostrato) |

## Effetti collaterali

Nessuno: sola lettura del Data.

## Errori

- Nessuna eccezione propria.

## Non fa

- I metodi `toBoolean()` e `toString()` sono identità con tipo: non aggiungono controllo.
- Non è stato riletto `FilamentShieldData` (sorgente dei valori): fuori da questo contract.
- Nessun chiamante in produzione trovato nel perimetro cercato.
