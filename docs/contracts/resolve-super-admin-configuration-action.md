---
title: "GetSuperAdminConfigurationAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Shield\\GetSuperAdminConfigurationAction"
qmd: "GetSuperAdminConfigurationAction super admin Filament Shield gate intercept_gate define_via_gate"
---

# GetSuperAdminConfigurationAction

Nome file storico: la classe si chiamava `ResolveSuperAdminConfigurationAction` e il docblock di `GetSuperAdminConfigurationAction` cita ancora `docs/contracts/resolve-super-admin-configuration-action.md`.

Riassume la configurazione del super admin di Filament Shield (abilitazione, nome, definizione via gate, stato di intercettazione del gate). Codice: `app/Actions/Shield/GetSuperAdminConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{enabled: bool, name: string, defined_via_gate: bool, gate_interception_status: string}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SHIELD-SUPER-ADMIN-INV-1 | I valori mancanti valgono: `enabled` e `defined_via_gate` `false`, `name` `'Super Admin'`, `gate_interception_status` `'block'`. Prova nel codice: `execute()`, operatori `??`. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- `gate_interception_status` è una stringa libera: non è validata contro un insieme di valori ammessi.
- I metodi `toBoolean()` e `toString()` sono identità con tipo.
- Nessun chiamante in produzione trovato nel perimetro cercato.
