---
title: "Contratto — HasVerifiedIdentityAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\HasVerifiedIdentityAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, autorizzazione, identita, spid, cie]
---

# HasVerifiedIdentityAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Auth/HasVerifiedIdentityAction.php`.
Decide se un utente ha «identità verificata»: è il cancello che il middleware `app/Http/Middleware/EnsureVerifiedIdentity.php`
e i widget Fixcity (`CreateTicketWidget`, `CreateTicketWizardWidget`) usano per far inviare una segnalazione. Sbagliare qui significa far passare
(o bloccare) chi non dovrebbe: è un punto di autorizzazione. (Il vecchio ID `HAS-VERIFIED-INV-*` non è mai stato usato in un test: qui diventa `USER-VERIFIED-INV-*`.)

## Input

- `?Authenticatable $user`: l'utente corrente, anche `null`.

## Output

- `bool`: `true` se l'identità è verificata, `false` altrimenti. Nessuna eccezione propria.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-VERIFIED-INV-1 | Senza utente (`null`, ospite) risponde sempre `false` (riga 34). | `USER-VERIFIED-INV-1` |
| USER-VERIFIED-INV-2 | Un utente con email verificata è verificato; un utente con email non verificata e senza `auth_method` fidato (`spid`/`cie`) non lo è (righe 38-45). | `USER-VERIFIED-INV-2` |
| USER-VERIFIED-INV-3 | Un utente che ha fatto accesso con `spid` o `cie` è verificato anche con `email_verified_at` null, e `hasVerifiedEmail()` resta falso: l'email segnaposto `@noemail.local` non diventa mai «verificata» (righe 44-45). | `USER-VERIFIED-INV-3` |
| USER-VERIFIED-INV-4 | Un utente il cui modello non implementa `MustVerifyEmail` è considerato verificato (riga 38). | — (non dimostrato) |
| USER-VERIFIED-INV-5 | `auth_method` si legge dagli attributi grezzi (`getAttributes()`), mai con `getAttribute()`: su un database non migrato non scatta `preventAccessingMissingAttributes()` (riga 45). | — (non dimostrato) |

Test: `tests/Unit/Actions/Auth/HasVerifiedIdentityActionTest.php` (modelli non salvati, nessun database).

## Effetti collaterali

- Nessuno: non scrive, non chiama servizi, non usa cache. Chiama `hasVerifiedEmail()` del modello (lettura di un attributo già caricato).

## Errori

- Nessuno proprio. Il valore fidato di `auth_method` è la costante `TRUSTED_IDENTITY_METHODS = ['spid', 'cie']`: un altro valore non verifica l'utente.

## Non fa

- Non verifica l'email né invia link di verifica.
- Non controlla ruoli, permessi o `deleted_at`: un account cancellato è bloccato dal provider utenti ([BuildActiveUserProviderAction](build-active-user-provider-action.md)).
- Non controlla che `auth_method` sia stato scritto da un flusso SPID/CIE reale: si fida della colonna (la scrive [UpsertUserFromDigitalIdentityAction](upsert-user-from-digital-identity-action.md)).

## Limiti noti

- Limite noto: INV-4 apre il cancello a ogni `Authenticatable` senza `MustVerifyEmail` (per esempio un modello utente legacy). Con il modello di progetto
  (`BaseUser`) non succede; chi introduce un altro modello autenticabile deve saperlo.
- Una modifica a `users.auth_method` da qualunque altro percorso (admin Filament, import) rende l'utente verificato senza passare dall'IdP.
