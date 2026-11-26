---
title: "GetLoginRedirectRouteAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\GetLoginRedirectRouteAction"
qmd: "GetLoginRedirectRouteAction rotta redirect dopo login socialite dashboard filament admin"
---

# GetLoginRedirectRouteAction

Restituisce il nome di rotta verso cui reindirizzare dopo il login SSO. Codice: `app/Actions/Socialite/GetLoginRedirectRouteAction.php`.

## Input

- Nessuno.

## Output

- `string`: sempre `'filament.admin.pages.dashboard'`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-LOGIN-ROUTE-INV-1 | Il valore è costante. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:108`. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione.

## Non fa

- Ignora la configurazione `filament-socialite.login_redirect_route` (riga commentata).
- Nessun chiamante in produzione nel perimetro cercato. Il redirect effettivo del login è in `LoginUserAction` (`redirect()->intended('/')`).
