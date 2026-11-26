---
title: "GetPermissionModelAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\GetPermissionModelAction"
qmd: "GetPermissionModelAction modello permessi spatie permission config classe esistente"
---

# GetPermissionModelAction

Restituisce il nome della classe modello dei permessi, da config, con default Spatie. Codice: `app/Actions/GetPermissionModelAction.php:11-24`.

## Input

- Nessuno: legge `permission.models.permission`.

## Output

- `class-string`: il valore configurato o `Spatie\Permission\Models\Permission` (righe 20-23).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| PERM-MODEL-INV-1 | Senza config il risultato è `Spatie\Permission\Models\Permission`. Prova nel codice: riga 20. Test esistente senza group: Test: nessuno. | — (non dimostrato) |
| PERM-MODEL-INV-2 | Il valore deve essere una stringa e una classe esistente, altrimenti eccezione Webmozart. Prova nel codice: righe 20-21. Test esistente senza group: Test: nessuno. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `InvalidArgumentException` (Webmozart Assert) se il valore non è stringa o la classe non esiste.

## Non fa

- Non verifica che la classe estenda `Permission`.
