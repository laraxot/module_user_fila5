---
id: phpstan-user-fix
slug: phpstan-user
scope: [module:User, project:base_workorder_fila5]
status: Superseded
priority: High
created: 2026-09-06
<<<<<<< HEAD
superseded_by: 01.User-phpstan-fix.story.md
=======
superseded_by: 01.user-phpstan-fix.story.md
>>>>>>> laraxot/dev
qmd: "phpstan user fix"
---

> Superseded 2026-09-07: stesso obiettivo (PHPStan zero su Modules/User)
<<<<<<< HEAD
> tracciato e chiuso in `01.User-phpstan-fix.story.md`. Non duplicare il
=======
> tracciato e chiuso in `01.user-phpstan-fix.story.md`. Non duplicare il
>>>>>>> laraxot/dev
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
