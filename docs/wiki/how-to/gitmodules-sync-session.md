---
title: "Gitmodules sync session — note modulo/tema"
type: how-to
tags: [git, gitmodules, sync, quality-gates, merge-conflict]
created: 2026-07-21
updated: 2026-07-21
qmd: "gitmodules sync session module theme note story-003"
issues:
  - "https://github.com/provtv/base_ptv_fila5/issues/201"
discussions: []
related:
  - "../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md"
  - "../../../../../../bashscripts/ai/wiki/memories/git-sync-fleet-remotes.md#gitmodules-sync"
---

# Gitmodules sync session

Sessione orchestrata dal prompt `bashscripts/tools/prompts/02-gitmodules-sync.md` (v5.1) e da **STORY-003**.

User (e ogni altro path in `gitmodules.ini`) è una **repository Git autonoma**,
non un submodule. Lo status si legge con `git -C laravel/Modules/User`, mai
dalla root e mai tramite Shell `working_directory`. Verificare
`rev-parse --show-toplevel`. Canon: [git-sync-fleet-remotes.md#no-git-submodules-module-repos](../../../../../../bashscripts/ai/wiki/memories/git-sync-fleet-remotes.md#no-git-submodules-module-repos).

## Cosa fare su questo owner

1. `git -C . remote -v` — remote reale del modulo (`laraxot/module_user_fila5`), non la root.
2. Quality gates da `laravel/`: phpstan → phpmd → phpinsights (`--composer=composer.lock`).
3. Marker Git: risoluzione manuale forward-only (no `git restore`).

## Canon

- Story: [../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md](../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md)
- Report: [../../../../../../bashscripts/ai/wiki/memories/git-sync-fleet-remotes.md#gitmodules-sync](../../../../../../bashscripts/ai/wiki/memories/git-sync-fleet-remotes.md#gitmodules-sync)
- Issue base: https://github.com/provtv/base_ptv_fila5/issues/201
