---
title: "Organizzazione Documentazione PHPStan User - Eliminazione Duplicati"
type: concept
updated: 2026-10-20
language: it
tags: [docs, organization, duplicates, user]
status: draft
qmd: "organizzazione documentazione phpstan modulo user user"
---

# Organizzazione Documentazione PHPStan Modulo User

## Stato
- **File totali** nella directory `Modules/User/docs/`: ~1270 file `.md`
- **Duplicati per nomenclatura** (`_` vs `-` vs maiuscolo): 189 gruppi
- **File con contenuto identico (md5)**: 96 coppie/gruppi
- **Strategia applicata**: mantenere canoni `-dash`, rimuovere copie identiche `_underscore` in sub-cartelle (archive, _integration, wiki/integrations), mantenere `.deprecated.md` per storia.

## Documentazione PHPStan Mantenuta (storico preservato)
Tutti i file `phpstan-*.md` nella root di `docs/` sono mantenuti come storia della correzione. Non sono stati cancellati — solo raggruppati per tema nell'indice `phpstan-report-analisi-completa.md`.

### Gruppi tematici mantenuti
1. **Relationship / Type Hints**: `phpstan-relationship-fix.md`, `phpstan-relationship-fix-correzione-type-hints.md`
2. **Fix Session / Module Sessione**: `phpstan-fixes-user-module-session.md`
3. **Errori / Roadmap**: `phpstan-errors-roadmap.md`, `phpstan-error-roadmap.md`
4. **Correzioni Generali**: `phpstan-corrections.md`, `phpstan-corrections-oauth-resources.md`
5. **Plan / Analysis**: `phpstan_fix_plan.md`, `phpstan-level10-fixes.md`, `phpstan-analysis-user.md`
6. **Deprecated / Storia**: `phpstan-fixes-.deprecated.md`, `phpstan-dry-kiss-improvements-.deprecated.md`, `phpstan-dry-kiss-improvements-deprecated.md`
7. **Wiki / Memories**: `docs/wiki/memories/phpstan-belongstomany-covariance.md` (mantenuto, non cancellato con `deprecated.md` parallelo)

## File Rimossi / Merged (duplicati esatti, conservati nei log git)
- `archive/phpstan-fixes-gennaio-complete.md` ↔ `archive/old_tasks/phpstan-fixes-gennaio-complete.md` — contenuto identico, mantenuto il primo con data più recente
- `archive/phpstan-dry-kiss-improvements.md` ↔ `archive/old_tasks/phpstan-dry-kiss-improvements.md` — idem
- `wiki/integrations/BUSINESS_LOGIC_DEEP_DIVE.md` ↔ `BUSINESS_LOGIC_DEEP_DIVE.md` — copia identica in integrazione, mantenuta root

## Regole applicate per la storia
- Nessun file `.deprecated.md` cancellato (contiene note storiche su correzioni passate)
- Nessun file `archive/` con data utile cancellato
- Tutti i riferimenti bidirezionali (`phpstan-relationship-fix.md` → `00-index.md`) preservati

## Note per mantenere la documentazione
Per evitare nuovi duplicati in sessioni future:
- Usare sempre naming `-dash` (es. `phpstan-fix-plan-user.md`)
- Evitare copia in `archive/` senza modifiche
- Aggiornare `phpstan-report-analisi-completa.md` anziché creare nuovi file per ogni errore minore
