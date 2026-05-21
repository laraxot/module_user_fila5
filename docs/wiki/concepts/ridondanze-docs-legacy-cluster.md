---
title: "Cluster documentazione legacy duplicata (User)"
type: concept
tags: [documentation, redundancy, user-module]
created: "2026-05-21"
updated: "2026-05-21"
related:
  - ../../../../Xot/docs/wiki/concepts/ridondanze-cross-cutting-codebase.md
  - ../../../legacy/historical/redundancy-fixes-january.md
---

# Ridondanza documentazione `Modules/User/docs`

## Scopo

Il modulo User accumula anni di note agent/PHPStan; molte sono **near-duplicate** o differiscono solo per **`_`/`-`/maiuscole** nel nome file. Qui non si ricopia il contenuto: si lista **cosa collide** così gli editor possono gradualmente **fusionare/archiviare** senza perdere storicità nei path `legacy/`.

## File “redundancy / dry-kiss phpstan” noti ridondanti

Stesso scaffolding editoriale ripetuto in più percorsi (testo quasi uguale, link a **`laravel/Modules/Xot/docs/filament/redundancy-rules.md`** ecc.):

- `docs/redundancy-fixes.md`
- `docs/redundancy-fixes-january.md`
- `docs/redundancy-fixes-january-1.md`
- `docs/redundancy-fixes-january-2026.md`
- `docs/redundancyes.md` (nome con typo storico da evitare in nuovi file)
- `docs/legacy/historical/redundancy-fixes.md`
- `docs/legacy/historical/redundancy-fixes-january.md`
- `docs/legacy/historical/redundancy-fixes-january-2026.md`

Cluster **phpstan dry kiss improvements** quasi identici nel corpo (`docs/legacy/phpstan-dry-kiss-improvements*.md` + variant con suffissi **`-.md`** / **`2025-10-17`).

## Azione suggerita (incrementale)

1. Scegliere **un solo** file “canonical” dentro `legacy/historical/` o trasferire in wiki Xot/User.
2. Convertire gli altri in stub con link nella prima riga usando la forma Markdown `canonical: [titolo](./file-canonical.md)`
3. Rinunciare gradualmente ai nomi con typo (`redundancyes.md`).
4. Coordinamento incrociato globale moduli → **[ridondanze-cross-cutting-codebase.md](../../../../Xot/docs/wiki/concepts/ridondanze-cross-cutting-codebase.md)**.

## Modulo tecnico locale

Specifiche comportamento dominio Utente continuano nei path non duplicati (policies Filament Login, Volt, ecc.); non sono candidate merge solo perché tema simile nei titoli — valutare diff reale prima di fondere.
