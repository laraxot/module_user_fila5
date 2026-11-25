---
title: "register-logout-verify-email-.story.md (alias)"
status: superseded
superseded_by: "./register-logout-verify-email.story.md"
type: alias
updated: 2026-11-25
qmd: "register-logout-verify-email-.story.md alias superseded consolidate"
---
# Alias (superseded)

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

Canonico: [`./register-logout-verify-email.story.md`](./register-logout-verify-email.story.md).

Questo path resta solo per link storici; non aggiungere contenuto qui.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
