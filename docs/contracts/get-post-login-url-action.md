---
title: "GetPostLoginUrlAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Auth\\GetPostLoginUrlAction"
qmd: "GetPostLoginUrlAction pagina dopo login area-personale post_login_path locale localizeURL tenant"
---

# GetPostLoginUrlAction

Restituisce la pagina d'arrivo dopo login e registrazione quando nessuna pagina l'ha richiesta: l'area personale localizzata. Codice: `app/Actions/Auth/GetPostLoginUrlAction.php:21-39`.

## Input

- Nessuno: legge la lingua corrente e la config.

## Output

- `string`: URL localizzato con `LaravelLocalization::localizeURL` (riga 37).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| POST-LOGIN-INV-1 | Se la lingua corrente non è tra quelle supportate si usa `app.locale` (default `it`). Prova nel codice: righe 28-31. Test esistente senza group: `tests/Feature/Auth/AuthFlowRedirectsTest.php` e `tests/Unit/Filament/Widgets/Auth/LoginWidgetLocalizationTest.php` (riferimento alla classe). | — (non dimostrato) |
| POST-LOGIN-INV-2 | Il percorso è letto da `auth.post_login_path`, con default `/area-personale`. Prova nel codice: righe 35-37. Test esistente senza group: come sopra. | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non verifica che la pagina di arrivo esista né che l'utente sia autenticato.
- Incoerenza da correggere: il docblock (riga 18) cita la chiave `xra.post_login_path`, mentre il codice legge `auth.post_login_path` (riga 35). Il contratto segue il codice.
