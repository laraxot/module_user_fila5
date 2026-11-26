---
title: "ADR — L'utente SPID/CIE si riconosce dal codice fiscale, poi dall'email verificata"
type: decision
module: User
decision-makers: [User module owner]
status: accepted
created: 2026-11-24
updated: 2026-11-26
related:
  - ../../app/Actions/Auth/UpsertUserFromDigitalIdentityAction.php
  - ../../app/Actions/Auth/HasVerifiedIdentityAction.php
  - ../contracts/upsert-user-from-digital-identity-action.md
qmd: "digital identity upsert by fiscal code"
---

# ADR: l'utente SPID/CIE si riconosce dal codice fiscale, poi dall'email verificata

## Contesto

- Le PA che chiedono identificazione informatica usano SPID e CIE (CAD art. 64 c. 2-quater e 3-bis, citati nella story
  `dcp-144`). Il modulo convive con la registrazione email + password: la stessa persona può avere già un account.
- La colonna `users.email` è unica. Un IdP SPID non sempre restituisce l'email, e CIE spesso non la verifica.
- Il codice fiscale arriva in formati diversi: SPID `TINIT-RSSMRA80A01H501U`, CIE senza prefisso.
- Domanda: con quale chiave si ritrova l'utente al secondo accesso, senza duplicati e senza consegnare l'account di altri?

## Driver della decisione

- Identita': il codice fiscale e' l'unico identificativo stabile e verificato che SPID e CIE condividono.
- Unicita': `users.email` e' unica e non nulla; gli IdP non sempre restituiscono un'email verificata.
- Sicurezza: un account non va consegnato a chi presenta un'email non verificata.

## Alternative scartate

- Riconoscere per email (anche non verificata): chiunque presenti un'email altrui all'IdP prenderebbe quell'account.
- Account separato per ogni metodo di accesso: la stessa persona avrebbe due profili e la regola di unicità dell'email
  farebbe fallire l'insert quando l'email coincide.
- Lasciare `email` null per chi non la fornisce: la colonna è unica e non nulla nella migrazione owner `create_users_table`.

## Decisione

`Modules/User/app/Actions/Auth/UpsertUserFromDigitalIdentityAction.php`:
- chiave primaria di riconoscimento = codice fiscale normalizzato (`normalizeFiscalCode()`: maiuscolo, senza `TINIT-`,
  `^[A-Z0-9]{11,16}$`, altrimenti eccezione);
- se il CF non c'è, si collega un account esistente **solo** tramite email che l'IdP dichiara verificata;
- senza email verificata il nuovo utente riceve `<metodo>.<cf>@noemail.local` con `email_verified_at` null;
- metodi ammessi solo `HasVerifiedIdentityAction::TRUSTED_IDENTITY_METHODS` (`spid`, `cie`).

## Conseguenze

- Pro: un CF = un utente; chi passa da password a SPID ritrova il proprio account.
- Contro: l'indirizzo `@noemail.local` non riceve posta: le notifiche email a questi utenti non partono finché non
  aggiungono un indirizzo vero.
- Un agente non deve "semplificare" cercando prima per email: invertirebbe la garanzia.

## Conferma

- Test Pest: `cd laravel && vendor/bin/pest Modules/User/tests/Feature/Auth/DigitalIdentityUserUpsertTest.php` (6 test); per invariante
  `--group=USER-SPID-UPSERT-INV-1` … `-INV-5` ([contratto](../contracts/upsert-user-from-digital-identity-action.md)).
- INV-1 e INV-2 non scrivono sul database; INV-3, INV-4 e INV-5 scrivono su `users` e richiedono un database di test migrato con le colonne
  `fiscal_code`, `auth_method`, `identity_provider`.
- Non dimostrato oggi: che un'email non verificata non colleghi mai un account (INV-6) e il caso del codice fiscale già diverso (vedi Stato attuale).

## Stato attuale

Verificato il 2026-11-26. Il codice rispetta la decisione con un'eccezione sulla garanzia «senza consegnare l'account di altri»: quando l'utente è
trovato per email verificata (`UpsertUserFromDigitalIdentityAction.php:49-51`) e ha già un `fiscal_code` diverso, `forceFill` (riga 77) lo sovrascrive con
il nuovo codice fiscale. Un secondo cittadino che l'IdP dichiara con la stessa email verificata prende così l'account del primo. Nessun test copre il caso.
Decisione aperta, da prendere con un umano: rifiutare il collegamento quando `fiscal_code` è già valorizzato e diverso. Non è stato corretto il codice in
questo passaggio (solo documentazione).
