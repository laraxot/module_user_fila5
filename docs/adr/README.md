---
title: "ADR — User"
type: index
owner: User
updated: 2026-11-24
qmd: "User ADR architecture decision record MADR formato decisioni identità ruoli"
---

# ADR — User

Un ADR del modulo User registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale su identità, autenticazione, ruoli, permessi e team. Non è un diario né una spiegazione retroattiva: ogni affermazione ha un file di prova. Template condiviso: [0000-template](../../../Xot/docs/adr/0000-template.md); standard: [Xot ADR](../../../Xot/docs/adr/README.md).

## Formato MADR

Frontmatter (`title`, `type: decision`, `status`, `created`, `updated`, `decision-makers`, `module`, `qmd`) e sezioni nell'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. Nome file in kebab-case senza data né numero. Una decisione nuova supersede la vecchia e la marca `superseded`.

## ADR presenti

Elenco con stato: [INDEX.md](INDEX.md). Presenti: [user-owns-identity-and-roles](user-owns-identity-and-roles.md), [frontoffice-login-page-ownership](frontoffice-login-page-ownership.md), [deleted-accounts-are-filtered-by-auth-provider](deleted-accounts-are-filtered-by-auth-provider.md).

Policy trasversale su dati sacri e test isolati: [0013-dati-sacri-migrazioni-e-test](../../../Xot/docs/adr/0013-dati-sacri-migrazioni-e-test.md).
