---
title: "Index — modulo User"
type: index
module: User
status: active
updated: '2026-11-26'
qmd: "user indice documentazione autenticazione contratti ADR"
---

# Indice della documentazione — modulo User

Mappa curata della documentazione corrente. Il README ([README.md](./README.md))
e' la porta d'ingresso del modulo; l'archivio storico sta in
[archive/docs-legacy/](../archive/docs-legacy/) (ex `docs/bmad`, `docs/wiki`,
`docs/stories` concluse, analisi una tantum e i ~900 file stale `.old`/`.bak`/`.mdc`
eliminati il 2026-11-26 — vedi issue #117 e #105-#110).

## Le sei voci

| # | Area | Dove |
|---|------|------|
| 1 | **Entrata e visione** | [README.md](./README.md) — identita', ownership, stato del modulo |
| 2 | **Decisioni (ADR)** | [adr/](./adr/) — [indice e metodo](./adr/README.md); 0001-0007 |
| 3 | **Contratti delle Action** | [contracts/](./contracts/) — [registro e copertura](./contracts/README.md) |
| 4 | **Story attive** | [stories/](./stories/) — solo le story non concluse; quelle finite sono in `archive/docs-legacy/stories/` |
| 5 | **Manuali utente** | [manuals/README.md](./manuals/README.md) — indice per figura: [frontoffice](./manuals/manuale-utente-frontoffice.md), [admin](./manuals/manuale-admin.md), [super admin](./manuals/manuale-super-admin.md), [altre figure](./manuals/manuale-altre-figure.md), [riferimento pannello](./manuals/manuale-utente.md) |
| 6 | **Archivio legacy** | [archive/docs-legacy/](../archive/docs-legacy/) — BMAD, wiki, contratti/storie superati, report |

## Regole

- Nomi file: kebab-case, **nessuna data nel nome** (la data va nel frontmatter).
- Ogni Action con effetti ha il suo contratto in `docs/contracts/`.
- I link ai documenti archiviati puntano a `archive/docs-legacy/`.
