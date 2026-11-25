---
title: "Docs consolidate redundant md — User"
status: in_progress
module: User
epic: documentation
track: quick-flow
qmd: "docs consolidate redundant exact-dup user superseded stub wave"
related:
  - ../../../../../Xot/docs/bmad/stories/docs-consolidate-redundant-md.story.md
  - ../../git-conflicts-resolution.md
---
# Docs consolidate redundant md — User

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

## Scopo

Comprimere exact-dup e near-dup già covered in `Modules/User/docs` senza delete:
copie → stub `status: superseded` + `superseded_by` verso canone kebab.

## Diario 2026-11-25 (wave exact + cluster)

- Lock: `bashscripts/lock/docs-consolidate-User.lock`
- Inventario sha256: **28 gruppi exact** (skip stub `<600B` con `superseded_by`)
- **Residuo exact dopo wave: 0 gruppi**
- Stub `<600B` presenti: **38**
- Canoni principali: `stories/oauth-access-token-permission-self-heal.story.md`,
  `stories/cache-store-env-var-test-infra.story.md`, `stories/continuation.story.md`,
  login stories senza suffisso, `stories/01.user-phpstan-fix.story.md` (lowercase),
  `git-conflicts-resolution.md`, `outputs/README.md`
- Fix canone: invertito stub errato `01.user`→`01.User`; canone = lowercase
- Near covered stubbati: `continuation-11`, `login-*-07`, `13-dcp-138/144`,
  `git-conflicts-resolution-4` / `.deprecated`
- **Residui topic** (near-dup testo diverso, non collassati): cluster
  `git-conflicts-resolution{,-2,-27,-conflict*,-summary,-local-swarm-backup}` +
  copie in `_archive/` / `archive/` / `bugfixes/`; file dedicati tipo
  `git-conflicts-models-phpdoc.md`

## Diario 2026-11-25 (cluster git-conflicts near-dup)

- Lock: `bashscripts/lock/docs-consolidate-User-neardup.lock`
- Canone: `docs/git-conflicts-resolution.md` — sezione **Storico path alias** (≤40r);
  rimossa coda self-alias corrotta
- Before cluster: **21** file / stub **15** / active **6** (incl. canone)
- After: **21** / stub **19** / canone **1** / residuo **1**
- Stub nuovi (questa lane, 4): `git-conflict-resolution-{1,2}.md`,
  `_archive/git-conflict-resolution.md`, `bugfixes/git-conflicts-resolution.md.bak`
- Stub già presenti (peer): varianti `-2/-27/-conflict*/-summary/-4/.deprecated` +
  `archive/**` + `bugfixes/git-conflicts-resolution.md`
- **Residuo**: `git-conflict-resolution.md` (249r howto generale Git ≠ diario User)
- Fuori scope cluster: `git-conflicts-models-phpdoc.md`, `wiki/.../git-merge-conflict-*`

## Acceptance (questa wave)

- [x] Exact-dup actionable → stub
- [x] Nessun delete / nessun PHP
- [x] Cluster git-conflicts: near-dup → Storico path alias + stub; residuo howto documentato
- [ ] Altri near-dup User fuori cluster git-conflicts


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
