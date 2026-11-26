---
title: "GetUserModelAttributesFromSocialiteAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\GetUserModelAttributesFromSocialiteAction"
qmd: "GetUserModelAttributesFromSocialiteAction attributi utente da identità socialite nome cognome email validazione"
---

# GetUserModelAttributesFromSocialiteAction

Traduce l'identità OAuth in un DTO di attributi per il modello utente, con validazioni esplicite. Codice: `app/Actions/Socialite/GetUserModelAttributesFromSocialiteAction.php`.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`.

## Output

- `SocialiteUserAttributesData`: `name`, `firstName`, `lastName`, `email`, `provider`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-USER-ATTR-INV-1 | `provider` vuoto: `InvalidArgumentException`. Prova nel codice: `execute()`. Test esistente senza group: `tests/Unit/Actions/Socialite/SocialiteCoreActionsCoverageTest.php:44`. | — (non dimostrato) |
| SOCIALITE-USER-ATTR-INV-2 | Nome o cognome non stringa: `RuntimeException`. Prova nel codice: `execute()`. Test esistente senza group: `SocialiteCoreActionsCoverageTest.php:58`. | — (non dimostrato) |
| SOCIALITE-USER-ATTR-INV-3 | Email non stringa o vuota: `RuntimeException`. Prova nel codice: `execute()`. Test esistente senza group: `SocialiteCoreActionsCoverageTest.php:58`. | — (non dimostrato) |
| SOCIALITE-USER-ATTR-INV-4 | `firstName` coincide con `name` (nome completo), non con il primo nome. Prova nel codice: `execute()`. Test esistente senza group: `SocialiteCoreActionsCoverageTest.php:28` (riferimento). | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- `InvalidArgumentException` e `RuntimeException` come indicato sopra.

## Non fa

- Il controllo `if ($nameFieldsResolver === null)` non può essere vero: `app()` non restituisce null. È codice morto.
- Risolve i nomi con `Utils/UserNameFieldsResolver`, che duplica la logica di `GetUserNameFieldsFromSocialiteAction`.
