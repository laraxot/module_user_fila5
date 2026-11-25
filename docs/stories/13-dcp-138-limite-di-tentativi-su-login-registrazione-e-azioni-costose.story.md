---
title: "13-dcp-138-limite-di-tentativi-su-login-registrazione-e-azioni-costose.story.md (alias)"
status: superseded
superseded_by: "./dcp-138-limite-di-tentativi-su-login-registrazione-e-azioni-costose.story.md"
type: alias
updated: 2026-11-25
qmd: "13 dcp 138 alias superseded"
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

Canonico: [`./dcp-138-limite-di-tentativi-su-login-registrazione-e-azioni-costose.story.md`](./dcp-138-limite-di-tentativi-su-login-registrazione-e-azioni-costose.story.md).

Path storico; non aggiungere contenuto.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
