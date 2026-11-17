---
title: "Module BMAD audit — User"
<<<<<<< .merge_file_eHIIt5
status: review
updated: 2026-11-16
module: User
bmad: true
qmd: "story BMAD audit modulo User inventario gate"
---

# Story: audit BMAD del modulo User

## Acceptance

- [x] Inventario source-first (2026-11-16).
- [x] Audit + piano in `docs/bmad/`.
- [x] Pack ECC in `docs/ecc/`.
- [ ] Pest modulo eseguito in ambiente testing stabile.
- [ ] Finding P0/P1 chiusi con regressione.

## Riferimenti

- [audit](../audit.md)
- [piano](../piano-miglioramento.md)
- [ECC](../../ecc/user-ecc-audit.md)

## Esito

Baseline audit aggiornata. PHPStan tree `Modules` a 0. Pest e chiusura P0/P1 aperti.
=======
type: story
status: review
updated: 2026-11-16
module: User
qmd: "story BMAD audit modulo User inventario gate finding P0 P1"
---

# Story: audit BMAD ed ECC del modulo User

## Perché

Rendere verificabile lo stato di User: chi è chi e cosa può fare: utenti, ruoli, permessi, team, OAuth, accesso ai pannelli. Senza baseline misurata ogni fix successivo è ad hoc.

## Acceptance

- [x] Inventario source-first misurato (2026-11-16).
- [x] Audit approfondito con finding P0/P1/P2 e path: [audits/user-audit.md](../audits/user-audit.md).
- [x] Pack: [audit](../audit.md), [decision-log](../decision-log.md), [epics](../epics.md), [brainstorming](../brainstorming.md), [ECC](../../ecc/user-ecc-audit.md).
- [x] PHPStan `Modules/User`: 0 errori.
- [ ] Pest modulo eseguito su DB `*_test` raggiungibile (oggi: skip documentato).
- [ ] Finding P0-U1, P0-U2 chiusi con regressione Pest.
- [x] Finding P1 «Cms phantom imports User FO pages» chiuso (2026-11-16): niente `Modules\Cms` nelle Folio pages; rimossa `pages/pages/`; Pest `NoCmsPhantomFolioImportsTest`. Vedi [decision-log](../decision-log.md).
- [x] Finding P1 «Cms phantom imports User FO pages» chiuso (2026-11-16): niente `Modules\Cms` nelle Folio pages; rimossa `pages/pages/`; Pest `NoCmsPhantomFolioImportsTest`. Vedi [decision-log](../decision-log.md).

## Story figlie (da creare, vedi [epics](../epics.md))

- `user-policy-role-permission-super-admin-only`
- `user-permissionpolicy-deny-all`
- `user-seed-permissions-no-runtime-create`
- `user-admin-roles-config`
- `user-remove-dead-policy-and-labels`

## Esito (2026-11-16)

Baseline aggiornata, nessun codice applicativo modificato. Fix e Pest restano aperti (gate DB test).
>>>>>>> .merge_file_z8yLvy
