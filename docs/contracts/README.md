---
title: "Contratti — User"
type: index
owner: User
updated: 2026-11-24
qmd: "User contract comportamentali autenticazione ruoli permessi SPID CIE invarianti USER-INV"
---

# Contratti — User

Un contract descrive una singola operazione del modulo User che muove dati personali, permessi o accessi: input, output, invarianti, effetti collaterali, errori e confini. Documenta il comportamento **implementato**, non quello desiderato. Standard: [contract-authoring-standard](../../../Xot/docs/contracts/contract-authoring-standard.md); governance: [ADR 0012](../../../Xot/docs/adr/0012-behavioral-contract-governance.md).

## Formato

Frontmatter `type: contract` e `action: "Modules\\User\\Actions\\..."`; sezioni nell'ordine `## Input`, `## Output`, `## Invarianti`, `## Effetti collaterali`, `## Errori`, `## Non fa`. Ogni invariante ha ID `USER-<AREA>-INV-<N>` e un test Pest con `->group('<ID>')`. Il registro operativo con copertura e comandi è [INDEX.md](INDEX.md).

## File presenti

Contract nel formato a sei sezioni:

- [has-verified-identity-action](has-verified-identity-action.md) (invariante in prosa, senza ID: da portare a `USER-IDV-INV-N`)
- [build-active-user-provider-action](build-active-user-provider-action.md)
- [revoke-user-access-action](revoke-user-access-action.md)
- [upsert-user-from-digital-identity-action](upsert-user-from-digital-identity-action.md)
- [set-default-roles-by-socialite-user-action](set-default-roles-by-socialite-user-action.md)

Documenti `type: concept` sulle interfacce (non sono contract formali, nessun ID): [hasteamsandusercontract](hasteamsandusercontract.md), [teamcontract](teamcontract.md). Template: [_template](_template.md). I file `*.md.bak` sono copie di lavoro, non contratti.
