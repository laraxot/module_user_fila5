---
status: done
scope: module:User
type: architecture
updated: 2026-09-01
qmd: "user form column parity UserColumn SingleRoleSelectColumn"
title: "Story: parita' Forms/Components ↔ Tables/Columns (User)"
---
# Story: parita' Forms/Components ↔ Tables/Columns (User)

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

## User story

Come sviluppatore del modulo User,
voglio `UserColumn` e `SingleRoleSelectColumn` come gemelli di `UserSection` e `SingleRoleSelect`,
allineandomi alla regola piattaforma gia' applicata in Ptv.

## Acceptance criteria

- [x] `UserColumn` raggruppa `first_name`, `last_name`, `email`
- [x] `SingleRoleSelectColumn` riusa le stesse opzioni di `SingleRoleSelect`
- [x] Test `FormColumnParityTest` verde
- [x] Documentazione [form-column-parity.md](../form-column-parity.md)

## Riferimenti

- [form-column-parity.md](../form-column-parity.md)
- [Ptv form-column-parity.md](../form-column-parity.md)


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
