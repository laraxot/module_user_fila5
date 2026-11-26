---
title: "GetShieldResourceConfigurationAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Shield\\GetShieldResourceConfigurationAction"
qmd: "GetShieldResourceConfigurationAction shield_resource slug navigazione sort badge gruppo ricerca globale"
---

# GetShieldResourceConfigurationAction

Nome file storico: la classe si chiamava `ResolveShieldResourceConfigurationAction` e il docblock di `GetShieldResourceConfigurationAction` cita ancora `docs/contracts/resolve-shield-resource-configuration-action.md`.

Riassume la configurazione della risorsa Shield (slug, navigazione, ricerca globale) e verifica se la RoleResource è pubblicata. Codice: `app/Actions/Shield/GetShieldResourceConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{slug: string, published: bool, navigation_registered: bool, navigation_sort: int, navigation_badge: bool, navigation_group: bool, globally_searchable: bool}`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SHIELD-RES-CFG-INV-1 | `slug` vale `'shield'` se la configurazione non è stringa. Prova nel codice: `execute()`. | — (non dimostrato) |
| SHIELD-RES-CFG-INV-2 | `published` è vero se il file `app/Filament/Resources/Shield/RoleResource.php` esiste. Prova nel codice: `isResourcePublished()`. | — (non dimostrato) |
| SHIELD-RES-CFG-INV-3 | `navigation_registered` non booleano vale `true`. Prova nel codice: `execute()`. | — (non dimostrato) |

## Effetti collaterali

Nessuno: letture e controllo di esistenza file.

## Errori

- Nessuna eccezione propria.

## Non fa

- Il controllo di pubblicazione usa `app_path` e non `base_path` (confronta `GetPermissionsConfigurationAction`): da verificare il percorso reale.
- `isResourcePublished()` è duplicato in `ShieldUtilsAction`.
- Nessun chiamante in produzione trovato nel perimetro cercato.
