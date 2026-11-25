---
status: done
scope: module:User
type: docs
updated: 2026-09-03
qmd: "user docs index audit duplicati storico"
title: "Story: audit indice documentazione (Modules/User/docs)"
---
# Story: audit indice documentazione (Modules/User/docs)

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

Come manutentore del modulo User, voglio un `docs/index.md` organizzato per argomento su tutti i ~3238 file `.md` presenti, cosi' da poter trovare la documentazione corrente senza scorrere manualmente le cartelle `archive/`, `legacy/`, `wiki-archive/` e le decine di varianti duplicate (`-1`, `_underscore`, `.deprecated`, snapshot datati).

## Acceptance criteria

- [x] `docs/index.md` creato/aggiornato con 26 sezioni tematiche e link relativi a 1170 file attivi (root + sottocartelle)
- [x] Nessun file `.md` esistente rinominato, spostato o cancellato
- [x] Duplicati e contenuto storico raggruppati sotto "Storico / da consolidare" (cartelle di archivio in blocco con conteggio, varianti root/sottocartella per cluster, nomi anomali, snapshot datati/deprecati)
- [x] Tutti i link verificati puntare a file realmente esistenti (0 link rotti su 1170 univoci)

## Riferimenti

- [../index.md](../index.md)


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
