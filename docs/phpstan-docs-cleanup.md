---
title: "PHPStan + docs cleanup plan — User module"
type: note
status: draft
updated: 2026-10-21
qmd: "phpstan-docs-cleanup user docs merge markers"
tags: [docs, user]
---
# Cleanup minimale (scopo > sintassi — no mass edit)

## Confetti verificati (linee esatte, reviewer subagent)
- `phpstan-fix-plan-.md`: 1/2/11, 50/52/54, 59/62/65
- `testing-phpstan-progress.md`: 6/8/10, 15/24/36, 41/42/45, 63/64/78, 83/85/87, 93/98/103, 145/146/151
- `docs-health.md`: 11/13/15, 20/24/29
- `docs-location-policy.md`: 11/13/15, 20/24/29
- `00-index.md`: 1/63/78 (legacy); `00-INDEX.md`: 1/11/95, 106/108/110, 122/129/143, 148/153/158, 166/169/172 (canonical)
- Totale file con `<<<<<<<`: >180 (`grep` sottocampione sopra)

## Duplicati indice (scopo: un solo SSoT nel modulo)
- Canonical: `00-INDEX.md` (updated 2026-10-20, frontmatter, entry reali)
- Legacy: `00-index.md` (merge marker, contenuto obsoleto "2.5.0")
- Azione: eliminare `00-index.md`; aggiornare backlink in `docs-health.md`

## Piano (minimo, 4 passaggi — ordine random, nessun blocco)
1. Risolvere 4 file indicati (schiacciando ramo corretto da `00-INDEX.md`); NON aprire gli altri 180.
2. Rimuovere `00-index.md`; symlink o aggiornare `docs-health.md`.
3. Verificare `docs/phpstan-docs-cleanup.md` esiste (creato ora).
4. Non toccare `phpstan.neon`, `app/`, `phpstan-fix-plan.md` (canonico separato).

## Regole (BMAD + second brain + filament blueprint)
- No `git reset --hard`; solo commit nuovi.
- PHPStan User = 0 errori (2026-10-20); cleanup è documentazione.
- Nessun test Pest (host 10.100.200.15 / regola data-sacred no retest docs).
- Lock `worker-b` su `SushiToJson.php`: sbloccare via orchestratore prima di edit codice; docs non richiedono unlock.
