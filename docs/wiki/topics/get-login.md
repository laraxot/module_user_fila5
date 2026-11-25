---
title: "Topic get-login"
type: digest
status: active
qmd: "digest ceiling 100 get-login"
---

# Topic get-login

Sintesi automatica di 3 documenti (chiave `get-login`).

## GetLoginHistoryAction

_Fonte: `contracts/get-login-history-action.md`_

# GetLoginHistoryAction

Serie storica degli accessi, bucket per giorno o per mese, letta da `authentication_logs`. Codice: `app/Actions/Login/GetLoginHistoryAction.php:23-113`.

## Input

- `?CarbonImmutable $since`: inizio della serie; se nullo parte dal giorno del primo log (righe 46-55).
- `string $granularity`: `day` o `month` (riga 36).

## Output

- `array{labels: list<string>, data: list<int>}`: un bucket per giorno o mese fino a ora, con zeri dove non ci sono accessi (righe 90-110).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `LOGIN-HIST-INV-1` | Granularità diverse da `day` e `month` sono rifiutate con `InvalidArgumentException`. | righe 36-40 | `tests/Feature/Actions/GetLoginHistoryActionTest.php` (riferimento alla classe) |
| `LOGIN-HIST-INV-2` | Sono contate tutte le righe con timestamp valorizzato, anche con `login_successful` false. | righe 61-71, docblock righe 17-19 | come sopra |
| `LOGIN-HIST-INV-3` | I bucket sono continui: ogni giorno o mese tra inizio e ora compare, anche se vuoto. | righe 90-110 | come sopra |
| `LOGIN-HIST-INV-4` | Oltre 5000 bucket l'Action lancia `InvalidArgumentException` (il messaggio cita solo il giorno, ma il limite vale per entrambe le granularità). | righe 91-96 | come sopra |

## Effetti collaterali

Sola lettura: un `min()` (se `since` manca) e un `pluck()` sul timestamp. Nessuna scrittura.

## Errori

- `InvalidArgumentException` per granularità non valida, configurazione non valida (eredita

## GetLoginRedirectRouteAction

_Fonte: `contracts/get-login-redirect-route-action.md`_

# GetLoginRedirectRouteAction

Restituisce il nome di rotta verso cui reindirizzare dopo il login SSO. Codice: `app/Actions/Socialite/GetLoginRedirectRouteAction.php`.

## Input

- Nessuno.

## Output

- `string`: sempre `'filament.admin.pages.dashboard'`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-LOGIN-ROUTE-INV-1` | Il valore è costante. | `execute()` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:108` |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione.

## Non fa

- Ignora la configurazione `filament-socialite.login_redirect_route` (riga commentata).

## GetLoginStatsAction

_Fonte: `contracts/get-login-stats-action.md`_

# GetLoginStatsAction

Statistiche di accesso per il widget di monitoraggio: totale, oggi, ieri, ultimi 7 e 30 giorni, variazione e trend a 7 giorni. Codice: `app/Actions/Login/GetLoginStatsAction.php:10-126`.

## Input

- Nessuno: legge la config `user.login-monitoring` (modello, colonna, fuso) tramite `ResolvesLoginLogQuery`.

## Output

- `array` con `total`, `today`, `yesterday`, `last_7_days`, `last_30_days`, `previous_7_days`, `change_percentage` (float), `trend` (7 interi), `labels` (7 stringhe `d/m`) (righe 98-125).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `LOGIN-STATS-INV-1` | Ogni conteggio è un numero di righe del modello configurato con colonna non nulla. | righe 59, 65-68, 99 | Test: nessuno. |
| `LOGIN-STATS-INV-2` | Se entrambi i periodi valgono 0 la variazione è `0.0`; se il periodo precedente è 0 è `100.0`; altrimenti variazione arrotondata a due decimali. | righe 89-96 | Test: nessuno. |
| `LOGIN-STATS-INV-3` | Le finestre sono calcolate sui giorni locali del fuso configurato e convertite in UTC per il confronto. | righe 38-52 | Test: nessuno. |
| `LOGIN-STATS-INV-4` | Nessuna cache: scelta esplicita per evitare fughe fra tenant (righe 54-58). | righe 54-58 | Test: nessuno. |

## Effetti collaterali

Sola lettura: 13 query di conteggio (7 per il trend, più last 7, previous 7, totale, oggi, ieri, ultimi 30).

## Errori

- Nessuna gestione esplicita; eccezioni della configurazione (ereditate da `ResolvesLoginLogQuery`) e de
