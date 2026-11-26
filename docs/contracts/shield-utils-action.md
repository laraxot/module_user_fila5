---
title: "ShieldUtilsAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Shield\\ShieldUtilsAction"
qmd: "ShieldUtilsAction utility legacy Filament Shield metodi statici config permessi exclude super admin"
---

# ShieldUtilsAction

Contenitore legacy di una cinquantina di metodi statici che leggono la configurazione di Filament Shield. Il `execute()` d'istanza non fa nulla. Il docblock annuncia la suddivisione in Action granulari (quelle `Resolve*` del modulo). Codice: `app/Actions/Shield/ShieldUtilsAction.php`.

## Input

- Metodi statici con parametri solo per: `doesResourceHaveCustomPermissions(string)`, `getResourcePermissionPrefixes(string)`, `showModelPath(string)`.

## Output

- Valori scalari, array `list<string>` o `void` (gli `enable*`/`disable*`), secondo il metodo.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SHIELD-UTILS-INV-1 | Gli accessi a configurazione usano `Assert::*`: un tipo errato solleva eccezione. Prova nel codice: metodi `get*`/`is*` con `Assert`. Test esistente senza group: `tests/Unit/UserExecuteCoverage50Test.php:404-406` (solo alcuni metodi). | — (non dimostrato) |
| SHIELD-UTILS-INV-2 | `showModelPath()` ritorna `''` se `show_model_path` è disattivo, altrimenti il modello verificato con `classExists`. Prova nel codice: `showModelPath()`. | — (non dimostrato) |
| SHIELD-UTILS-INV-3 | `getResourcePermissionPrefixes()` usa i prefissi della risorsa se implementa `HasShieldPermissions`. Prova nel codice: `getResourcePermissionPrefixes()`. | — (non dimostrato) |

## Effetti collaterali

- `enableGeneralExclude()` / `disableGeneralExclude()`: modificano in memoria la configurazione per la richiesta.
- Nessuna scrittura su disco o database.

## Errori

- `Assert` solleva `InvalidArgumentException` su tipi errati nei metodi che lo usano.

## Non fa

- Non ha logica propria oltre ai metodi statici: è un wrapper di transizione.
- `getExcludedResouces()` contiene un refuso nel nome: è pubblico, usato solo dal test `UserExecuteCoverage50Test.php:419`. Rinominarlo è una modifica da fare a parte.
- `isResourcePublished()` e `roleResourceExists()` duplicano logica delle `Resolve*`.
- Nessun chiamante in produzione trovato nel perimetro cercato.
