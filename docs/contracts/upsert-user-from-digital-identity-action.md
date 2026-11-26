---
title: "Contratto — UpsertUserFromDigitalIdentityAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\UpsertUserFromDigitalIdentityAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, spid, cie, identita-digitale, dati-personali]
---

# UpsertUserFromDigitalIdentityAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Perché è fatta così: [ADR 0005](../adr/0005-digital-identity-upsert-by-fiscal-code.md).
Sorgente: `app/Actions/Auth/UpsertUserFromDigitalIdentityAction.php`. Chiamanti: `Themes/Sixteen/app/Http/Controllers/SpidAuthController.php`
e `CieAuthController.php` (e le copie in `Themes/Civic`). Dati personali: codice fiscale, nome, cognome, email.

## Input

- `string $authMethod`: solo `spid` o `cie` (`HasVerifiedIdentityAction::TRUSTED_IDENTITY_METHODS`).
- `array $attributes`: chiavi usate `fiscal_code` (obbligatoria), `name`, `surname`, `email`; le altre si ignorano.
- `bool $emailVerified`: l'IdP garantisce l'email.
- `?string $identityProvider`: nome dell'IdP; se assente vale `$authMethod`.

## Output

- Il modello utente di progetto (`XotData::make()->getUserClass()`, `UserContract&Model`), creato o aggiornato e salvato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-SPID-UPSERT-INV-1 | Un metodo diverso da `spid`/`cie` è rifiutato prima di ogni lettura o scrittura (riga 37). | `USER-SPID-UPSERT-INV-1` |
| USER-SPID-UPSERT-INV-2 | Il codice fiscale è normalizzato (trim, maiuscolo, prefisso `TINIT-` tolto) e deve rispettare `^[A-Z0-9]{11,16}$`; altrimenti eccezione prima di ogni scrittura (righe 39, 92-104). | `USER-SPID-UPSERT-INV-2` |
| USER-SPID-UPSERT-INV-3 | Lo stesso codice fiscale ritrova sempre lo stesso utente: mai un secondo record (ricerca per `fiscal_code`, riga 48; la colonna è `unique`, migrazione `2026_11_11_000001`). | `USER-SPID-UPSERT-INV-3` |
| USER-SPID-UPSERT-INV-4 | Senza utente per codice fiscale, un account esistente si collega per email quando l'IdP dichiara quell'email verificata (righe 49-51); l'email diventa verificata (righe 72-76). | `USER-SPID-UPSERT-INV-4` |
| USER-SPID-UPSERT-INV-5 | Un'email non verificata non viene mai salvata: il nuovo utente riceve `<metodo>.<cf minuscolo>@noemail.local` con `email_verified_at` null (righe 80-81). | `USER-SPID-UPSERT-INV-5` |
| USER-SPID-UPSERT-INV-6 | Un'email non verificata non collega mai un account esistente (la ricerca per email avviene solo se `$verifiedEmail !== null`, riga 49). | — (non dimostrato: nessun test copre il ramo negativo) |

I casi che scrivono su `users` (INV-3, INV-4, INV-5) stanno in `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php` e richiedono un database di
test migrato con le colonne `fiscal_code`, `auth_method`, `identity_provider`; INV-1 e INV-2 non scrivono e girano senza colonne.

## Effetti collaterali

1. Letture su `users`: per `fiscal_code`, poi (solo con email verificata) per `email`.
2. Una sola scrittura: `forceFill($data)->save()` (riga 77 se l'utente esiste, 83 se è nuovo) con `fiscal_code`, `auth_method`, `identity_provider`,
   `last_login_at = now()` e, se presenti, `first_name`, `last_name`, `name`; `email`/`email_verified_at` solo come da INV-4/INV-5.
3. Nessuna transazione esplicita, nessuna coda, nessuna email. Gli eventi Eloquent e gli observer del modello utente scattano come per ogni `save()`.

## Errori

- `Webmozart\Assert\InvalidArgumentException`: metodo non ammesso (INV-1), codice fiscale assente o malformato (INV-2).
- Errori del database (vincolo `unique` su `fiscal_code` o `email`, colonne mancanti) risalgono al chiamante.

## Non fa

- Non autentica l'utente né apre la sessione: lo fa il controller del tema che la chiama.
- Non assegna ruoli né team.
- Non salva altri attributi SAML/OIDC (data di nascita, indirizzo, telefono): minimizzazione dei dati personali.
- Non verifica la firma della risposta dell'IdP: i dati arrivano già validati dal controller.
- Non rende «verificata» l'email segnaposto: l'identità è garantita da [HasVerifiedIdentityAction](has-verified-identity-action.md), non da `email_verified_at`.

## Limiti noti

- Limite noto: se l'utente è trovato per email verificata (INV-4) e ha già un `fiscal_code` diverso, `forceFill` (riga 77) lo sovrascrive col nuovo
  codice fiscale: un secondo cittadino che l'IdP dichiara con la stessa email verificata prende l'account del primo. Nessun test copre il caso.
  Difetto da decidere con un umano (rifiutare il collegamento se `fiscal_code` è già valorizzato e diverso).
- Il legacy non è modello per codice nuovo (ADR 0012 di Xot).
