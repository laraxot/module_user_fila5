---
title: "User migration owner convention"
type: story
bmad: true
status: complete
owner: module:User
tags: [user, migration, convention, schema]
qmd: "users migration owner convention story user"
---
# User migration owner convention

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

The `User` model has one canonical owner migration:
`2026_11_12_120000_create_users_table.php`.

When the owner schema needs a column correction, update that migration and refresh
its timestamp. Do not add a parallel `repair_*`, `add_*`, or `update_*` migration
for the same model/table. This preserves the module rule:

> one model → one migration → one seeder → one factory

The migration remains forward-only and idempotent through `XotBaseMigration`,
`tableCreate()`, `tableUpdate()`, `hasColumn()` and `updateTimestamps()` guards.
The `deleted_at` repair is therefore part of the User owner migration, not a
second migration.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
