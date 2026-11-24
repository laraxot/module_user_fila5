---
title: "Contratto — UpsertUserFromDigitalIdentityAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\UpsertUserFromDigitalIdentityAction"
owner: User
status: accepted
updated: 2026-11-24
qmd: "UpsertUserFromDigitalIdentityAction SPID CIE codice fiscale email verificata noemail.local"
---

# UpsertUserFromDigitalIdentityAction

Trova o crea l'utente che ha fatto accesso con SPID o CIE e ne aggiorna i dati d'identità. Dati personali: codice fiscale, nome, cognome, email. Codice: `app/Actions/Auth/UpsertUserFromDigitalIdentityAction.php:81-168`.

## Input

- `string $authMethod`: solo `spid` o `cie` (`HasVerifiedIdentityAction::TRUSTED_IDENTITY_METHODS`).
- `array $attributes`: chiavi usate `fiscal_code`, `name`, `surname`, `email`.
- `bool $emailVerified`: se l'IdP ha verificato l'email.
- `?string $identityProvider`: se assente vale il metodo.

## Output

- Un modello utente (`UserContract&Model`), creato o aggiornato e salvato.

## Invarianti

| ID | Regola | Prova nel codice | Test esistente (senza group) |
|---|---|---|---|
| `USER-IDENT-INV-1` | Metodi diversi da `spid`/`cie` sono rifiutati. | riga 91 | `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php:94` |
| `USER-IDENT-INV-2` | Il codice fiscale è normalizzato (trim, maiuscolo, prefisso `TINIT-` tolto) e deve rispettare `^[A-Z0-9]{11,16}$`. | righe 148-157 | `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php:86` |
| `USER-IDENT-INV-3` | L'utente si cerca per `fiscal_code`; solo se assente, per email **verificata** dall'IdP. Un'email non verificata non collega mai un account esistente. | righe 97-105 | `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php:66,75` |
| `USER-IDENT-INV-4` | Senza email verificata un nuovo utente riceve `<metodo>.<cf minuscolo>@noemail.local` con `email_verified_at` null; con email verificata `email_verified_at` è valorizzato. | righe 132-135 | `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php:36,53` |
| `USER-IDENT-INV-5` | Su un utente esistente l'email cambia solo se l'IdP ne fornisce una verificata diversa dall'attuale o se l'attuale non risulta verificata. | righe 124-130 | `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php:75` |

## Effetti collaterali

Un solo `forceFill(...)->save()` sulla tabella utenti (riga 131 o 137), con `auth_method`, `identity_provider`, `fiscal_code`, `last_login_at = now()` e, se presenti, `first_name`, `last_name`, `name`. Nessuna transazione esplicita; gli eventi Eloquent e gli observer del modello utente scattano come per ogni `save()` (non verificato quali). Nessuna coda, nessuna email.

## Errori

- `InvalidArgumentException` (Webmozart Assert) per metodo non ammesso, codice fiscale assente o malformato (righe 91, 150, 155).

## Non fa

- Non assegna ruoli o permessi.
- Non rende "verificata" l'email segnaposto: l'identità è garantita da `HasVerifiedIdentityAction`, non da `email_verified_at`.
- Non conserva dati oltre quelli elencati (docblock, riga 79).
- Marker `@contract` e `@see` presenti nel docblock della classe.
- Dubbio da verificare: la riga 51 scrive sempre `fiscal_code` anche quando l'utente è stato trovato per email verificata; un account esistente con un altro codice fiscale verrebbe riassegnato.
