---
id: phpstan-user-fix
slug: phpstan-user
scope: [module:User, project:base_workorder_fila5]
status: Superseded
priority: High
created: 2026-09-06
superseded_by: 01.user-phpstan-fix.story.md
qmd: "phpstan user fix"
title: "phpstan user fix"
---
# Story

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

> Superseded 2026-09-07: stesso obiettivo (PHPStan zero su Modules/User)
> tracciato e chiuso in `01.user-phpstan-fix.story.md`. Non duplicare il
> lavoro qui.

## Problema
PHPStan errors in Modules/User

## Errori Stimati
~50 errori

## Solution
1. Analyze with phpstan
2. Fix pattern errors
3. Verify with phpmd + phpinsights + pest
4. Git sync


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
