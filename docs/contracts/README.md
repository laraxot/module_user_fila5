---
title: "Contratti — modulo User"
type: index
tags: [contracts, actions, interfaces, user]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti del modulo User

Cosa promettono le Action di User che scrivono utenti, token, log o mandano email, e le interfacce di `app/Contracts`
documentate qui. Ogni invariante ha un ID stabile; il group Pest, se c'è, la prova
(`vendor/bin/pest Modules/User/tests --group=<ID>`), «—» è debito dichiarato.

Leggili prima di chiamare, modificare o imitare un'Action di autenticazione. Formato:
`Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Contratti di Action

- [UpsertUserFromDigitalIdentityAction](upsert-user-from-digital-identity-action.md) — trova o crea l'utente SPID/CIE per codice fiscale.
- [RevokeUserAccessAction](revoke-user-access-action.md) — revoca token Passport, refresh token e cookie "ricordami".
- [ConsumeAuthSubmissionSlotAction](consume-auth-submission-slot-action.md) — conta un invio di registrazione/recupero per IP ed email.
- [SendOtpByUserAction](send-otp-by-user-action.md) — sostituisce la password con un OTP hashato e lo manda per email.
- [RecordAuthenticationLogAction](record-authentication-log-action.md) — scrive il registro degli accessi senza mai rompere il login.

## Interfacce (`app/Contracts`)

- [HasTeamsAndUserContract](hasteamsandusercontract.md) — unione di `HasTeamsContract` e `UserContract`, con i metodi di ruolo nel team.
- [TeamContract](teamcontract.md) — cosa deve offrire un modello team (membri, permessi, inviti).
