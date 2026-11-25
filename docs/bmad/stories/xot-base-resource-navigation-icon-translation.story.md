---
title: "Resource User con navigazione tradotta"
status: ready-for-dev
epic: code-quality
related:
  - ../../../../Xot/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
  - ../../../../Ptv/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
  - ../../../../IndennitaResponsabilita/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md
qmd: "xot base resource navigation icon translation"
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

Come utente del modulo User, voglio che le Resource basate su `XotBaseResource` usino la navigazione centralizzata e tradotta, senza dichiarazioni statiche `navigationIcon` ridondanti.

## Acceptance criteria

- [ ] Censire le Resource del modulo che estendono direttamente o indirettamente `XotBaseResource` e verificare ogni `navigationIcon` rispetto alla configurazione tradotta.
- [ ] Rimuovere solo le dichiarazioni ridondanti, preservando le voci e il comportamento della navigazione.
- [ ] Validare il modulo con PHPStan e test mirati; aggiornare la documentazione tematica con l’esito.

## Dipendenza

La regola comune e il censimento fleet sono definiti in `laravel/Modules/Xot/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md`.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
