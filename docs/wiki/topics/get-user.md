---
title: "Topic get-user"
type: digest
status: active
qmd: "digest ceiling 100 get-user"
---

# Topic get-user

Sintesi automatica di 3 documenti (chiave `get-user`).

## GetUserModelAttributesFromSocialiteAction

_Fonte: `contracts/get-user-model-attributes-from-socialite-action.md`_

# GetUserModelAttributesFromSocialiteAction

Traduce l'identità OAuth in un DTO di attributi per il modello utente, con validazioni esplicite. Codice: `app/Actions/Socialite/GetUserModelAttributesFromSocialiteAction.php`.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`.

## Output

- `SocialiteUserAttributesData`: `name`, `firstName`, `lastName`, `email`, `provider`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-USER-ATTR-INV-1` | `provider` vuoto: `InvalidArgumentException`. | `execute()` | `tests/Unit/Actions/Socialite/SocialiteCoreActionsCoverageTest.php:44` |
| `SOCIALITE-USER-ATTR-INV-2` | Nome o cognome non stringa: `RuntimeException`. | `execute()` | `SocialiteCoreActionsCoverageTest.php:58` |
| `SOCIALITE-USER-ATTR-INV-3` | Email non stringa o vuota: `RuntimeException`. | `execute()` | `SocialiteCoreActionsCoverageTest.php:58` |
| `SOCIALITE-USER-ATTR-INV-4` | `firstName` coincide con `name` (nome completo), non con il primo nome. | `execute()` | `SocialiteCoreActionsCoverageTest.php:28` (riferimento) |

## Effetti collaterali

Nessuno.

## Errori

- `InvalidArgumentException` e `RuntimeException` come indicato sopra.

## GetUserNameFieldsFromSocialiteAction

_Fonte: `contracts/get-user-name-fields-from-socialite-action.md`_

# GetUserNameFieldsFromSocialiteAction

Ricava nome e cognome da un'identità OAuth, con tre fonti in ordine: attributo `name`, campo `name` dei dati grezzi, parte locale dell'email. Codice: `app/Actions/Socialite/GetUserNameFieldsFromSocialiteAction.php`.

## Input

- `Laravel\Socialite\Contracts\User $oauthUser`.

## Output

- `SocialiteNameFieldsData`: `name`, `firstName` (uguale a `name`), `lastName`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-NAME-FIELDS-INV-1` | Il nome viene dall'attributo `name` se produce un risultato non vuoto. | `determineNameField()` | `tests/Unit/Actions/Socialite/GetUserNameFieldsFromSocialiteActionTest.php:24,32,40` |
| `SOCIALITE-NAME-FIELDS-INV-2` | Il campo grezzo `name` è scartato se sembra un'email. | `determineNameField()`, `FILTER_VALIDATE_EMAIL` | stesso file |
| `SOCIALITE-NAME-FIELDS-INV-3` | Senza altre fonti, si usa la parte locale dell'email in formato titolo. | `analyzeEmailForNameSection()` | stesso file |

## Effetti collaterali

Nessuno. Legge i dati grezzi con reflection (`getRaw()` o proprietà `user`).

## Errori

- Nessuna eccezione propria. Gli errori di reflection non sono catturati in questa classe.

## Non fa

## GetUserTeamsOptionAction

_Fonte: `contracts/get-user-teams-option-action.md`_

# GetUserTeamsOptionAction

Costruisce le opzioni di una Select con i team dell'utente corrente. Codice: `app/Actions/Team/GetUserTeamsOptionAction.php:10-31`.

## Input

- Nessuno: usa l'utente della richiesta tramite `authId()` (riga 19).

## Output

- `array<int|string, string>`: placeholder `'' => '--- Select ---'` seguito da `id team => nome team` (righe 22-29).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `TEAMS-OPT-INV-1` | Il placeholder è sempre la prima voce. | riga 22 | `tests/Unit/Actions/Team/GetUserTeamsOptionActionTest.php` (riferimento alla classe) |
| `TEAMS-OPT-INV-2` | Compaiono solo i team collegati tramite `team_user` all'utente corrente. | riga 19 | come sopra |
| `TEAMS-OPT-INV-3` | Le righe orfane (team cancellato) sono saltate. | riga 24 | come sopra; anche `tests/Unit/QuickWins/UserQuickWinsCoverageTest.php` (riferimento) |

## Effetti collaterali

Sola lettura (eager load di `team`).

## Errori

- Nessuna gestione esplicita.

## Non fa
