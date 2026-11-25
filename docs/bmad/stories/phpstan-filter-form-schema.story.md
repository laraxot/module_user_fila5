---
id: user-phpstan-filter-form-schema-20261123
title: UsersRelationManager table filter resta su form()
type: story
module: User
epic: quality/phpstan
status: done
qmd: "phpstan UsersRelationManager form schema BaseFilter table filter"
related:
  - ../../../../Xot/docs/bmad/filament-filter-schema-to-form.md
  - ../../../../Xot/docs/bmad/stories/phpstan-filterbuilder-schema.story.md
---
# Scopo

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

Verificare il residuale PHPStan su
`RoleResource/RelationManagers/UsersRelationManager` (filtro `created_at`).

## Acceptance criteria

- [x] `Filter::make(...)->form([...])` conservato (API corretta tables ≥ 5.11.2).
- [x] Nessun passaggio a `->schema()` (deprecato su `BaseFilter`).
- [x] Story collegata a Xot `phpstan-filterbuilder-schema`.

## Root cause

Report che chiede `form()` → `schema()` è invertito rispetto a
`Filament\Tables\Filters\Concerns\HasForm` su filament/tables v5.12.0.
Il call-site User era già corretto; nessuna patch applicativa.

## Gate

- `php -l` OK sul RelationManager.
- PHPStan mirato (flock, con Xot): **[OK] No errors** — `->form()` non segnalato.
- Pest: **skip** — nessuna patch applicativa User; gate DB testing remoto rifiutato
  da `TestDatabaseGuard` (vedi story Xot gemella).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
