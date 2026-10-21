# User Module — Docs Index (BMAD Canonical)

## Struttura canonica (solo queste cartelle)

- `bmad/` — storie (`stories/`), architettura (`architecture.md`), epici (`epics/`), status (`status.md`), brainstorming (`brainstorming.md`) — fonte verità
- `wiki/` — regole (`rules/`), conoscenza tecnica (`concepts/`, `sources/`), riferimenti
- `architecture/` — documentazione architettura del modulo (design, contratti, schemi)
- `stories/` — storie di work (in bmad/stories/ preferibilmente, mantenuto anche qui per compatibilità)
- `epics/` — epici di progetto
- `INDEX.md` — questo file

## Stato documentazione (2026-10-21)

- File totali in `docs/`: ~3.283 .md (troppi — duplicati, varianti, file temporanei)
- Root `.md` (non in sottocartelle): ~1.761 — indicatore di disordine
- Top-level dirs: 62 (troppi — solo 5-7 necessari)
- Duplicati rilevati: `phpstan-fixes` (16 varianti), `git-conflicts-resolution` (10), `widget-*` (8+)
- Pulizia consigliata: consolidare duplicati in `bmad/` o `wiki/`, archiviare in `_archive/`

## Dipendenza Comment — chiarita (2026-10-21)

- User può vivere senza Comment (documentato in `stories/user-module-standalone-without-comment.story.md`)
- `composer.json`: `../Comment` rimosso dai `repositories` — non più residuo
- `app/`: 0 riferimenti a `Modules\Comment`
- Test `NoCommentModuleDependencyTest.php`: passato (3 passaggi)
- Regola: `docs/wiki/rules/can-comment-retired-wrong-placement.md` — `CanComment` ritirato, merge conflict risolto

## Link chiave

- Story: `bmad/stories/user-module-independent-of-comment.story.md`
- Story esistente: `stories/user-module-standalone-without-comment.story.md`
- Rule: `wiki/rules/can-comment-retired-wrong-placement.md`
- Test: `tests/Unit/NoCommentModuleDependencyTest.php`
- Filament blueprint: `docs/bmad/filament-blueprint-user.md` (se creato)