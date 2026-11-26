---
title: "AnalyzeSocialiteEmailDomainAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\AnalyzeSocialiteEmailDomainAction"
qmd: "AnalyzeSocialiteEmailDomainAction analisi dominio email SSO first_party client services tld"
---

# AnalyzeSocialiteEmailDomainAction

Dice se la email di un utente SSO appartiene al dominio di primo livello (`first_party`) o a quello cliente (`client`) configurati per il provider. Codice: `app/Actions/Socialite/AnalyzeSocialiteEmailDomainAction.php`.

## Input

- `SocialiteUserContract $oauthUser`: utente restituito dal provider.
- `string $provider`: chiave in `config/services.php`; non può essere vuota.

## Output

- `SocialiteEmailDomainAnalysisData`: `hasFirstPartyDomain` e `hasClientDomain`, entrambi `bool`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-DOMAIN-INV-1 | Provider vuoto: `InvalidArgumentException`. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Socialite/AnalyzeSocialiteEmailDomainActionTest.php:30`. | — (non dimostrato) |
| SOCIALITE-DOMAIN-INV-2 | Il confronto è sulla parte dopo `@` di email e di `services.<provider>.email_domains.<kind>.tld`, con `===` (sensibile alle maiuscole). Prova nel codice: `matchesConfiguredDomain()`. Test esistente senza group: `AnalyzeSocialiteEmailDomainActionTest.php:39`. | — (non dimostrato) |
| SOCIALITE-DOMAIN-INV-3 | Email o configurazione mancanti/vuote: `false`, senza eccezione. Prova nel codice: `matchesConfiguredDomain()`. | — (non dimostrato) |

## Effetti collaterali

Nessuno: sola lettura di config e dell'utente SSO.

## Errori

- `InvalidArgumentException` se `$provider` è vuoto.

## Non fa

- Non assegna ruoli (lo fa `SetDefaultRolesBySocialiteUserAction`).
- Duplica la logica di confronto di `Utils/EmailDomainAnalyzer`.
- Nessun chiamante in produzione nel perimetro cercato (solo test).
