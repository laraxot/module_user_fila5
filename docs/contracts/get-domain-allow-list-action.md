---
title: "GetDomainAllowListAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\GetDomainAllowListAction"
qmd: "GetDomainAllowListAction allowlist domini socialite config domain_allowlist login SSO"
---

# GetDomainAllowListAction

Restituisce la lista dei domini ammessi al login SSO da `config('socialite.domain_allowlist')`, normalizzata. Codice: `app/Actions/Socialite/GetDomainAllowListAction.php`.

## Input

- Nessuno. Riceve per iniezione `Illuminate\Support\Arr`, usato per `wrap()`.

## Output

- `array<int, string>`: lista indicizzata. Vuota se la config è assente o di tipo non gestito.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-ALLOW-INV-1 | Una stringa diventa lista di un elemento. Prova nel codice: `execute()`, ramo `is_string`. Test esistente senza group: `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:31`. | — (non dimostrato) |
| SOCIALITE-ALLOW-INV-2 | Elementi non scalari né `Stringable` sono scartati; resta una lista indicizzata. Prova nel codice: `execute()`, `array_filter`. Test esistente senza group: `SocialiteUtilityActionsTest.php:39,47`. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non normalizza maiuscole né spazi: `IsUserAllowedAction` confronta con un `in_array` sensibile al case.
- Chiamante in produzione: `IsUserAllowedAction`.
