---
title: "GetPermissionsConfigurationAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Shield\\GetPermissionsConfigurationAction"
qmd: "GetPermissionsConfigurationAction prefissi permessi entità resource page widget custom_permissions HasShieldPermissions"
---

# GetPermissionsConfigurationAction

Nome file storico: la classe si chiamava `ResolvePermissionsConfigurationAction` e il docblock di `GetPermissionsConfigurationAction` cita ancora `docs/contracts/resolve-permissions-configuration-action.md`.

Raccoglie in un array la configurazione di permessi ed entità di Filament Shield (prefissi, flag di entità, modelli Role/Permission) e fornisce due helper per i permessi delle singole risorse. Codice: `app/Actions/Shield/GetPermissionsConfigurationAction.php`.

## Input

- `execute()`: nessuno.
- `doesResourceHaveCustomPermissions(string $resourceClass)`, `getResourcePermissionPrefixes(string $resourceFQCN)`: FQCN di una risorsa Filament.

## Output

- `execute()`: array con 13 chiavi (prefissi `list<string>`, prefissi page/widget `string`, flag entità `bool`, `generator_option`, `role_policy_registered`, `role_model`, `permission_model`, `role_resource_exists`).
- `doesResourceHaveCustomPermissions()`: `bool`; `false` se la classe non esiste.
- `getResourcePermissionPrefixes()`: `list<string>`: prefissi della risorsa se implementa `HasShieldPermissions`, altrimenti quelli generali.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SHIELD-PERM-CFG-INV-1 | Ogni flag di entità non booleano ricade sul default (`true`, tranne `custom_permissions` che vale `false`). Prova nel codice: metodi `is*EntityEnabled()`. | — (non dimostrato) |
| SHIELD-PERM-CFG-INV-2 | Una risorsa senza `HasShieldPermissions` usa i prefissi generali. Prova nel codice: `getResourcePermissionPrefixes()`. | — (non dimostrato) |

## Effetti collaterali

Nessuno: letture di configurazione e un controllo di esistenza file (`role_resource_exists`).

## Errori

- Nessuna eccezione propria. Le classi in `class_implements` sono protette da `class_exists`.

## Non fa

- `role_resource_exists` cerca il file in `base_path('Modules/User/app/Filament/Resources/RoleResource.php')`: percorso diverso da quello usato in `GetShieldResourceConfigurationAction` (`app_path(...)`). Da verificare quale sia quello reale.
- `doesResourceHaveCustomPermissions()` duplica la logica di `ShieldUtilsAction`.
- Nessun chiamante in produzione trovato nel perimetro cercato.
