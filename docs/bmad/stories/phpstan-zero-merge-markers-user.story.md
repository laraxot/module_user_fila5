---
title: "PHPStan zero + merge markers — User (2026-11-25)"
type: story
module: User
status: done
epic: code-quality
track: quick-flow
story_id: phpstan-zero-merge-markers-user
qmd: "user merge markers phpstan zero auth profile lang recent_logins pest"
related:
  - ./phpstan-conflict-markers-bootstrap.story.md
  - ./committed-conflict-markers.story.md
  - ../../../Xot/docs/bmad/stories/phpstan-modules-zero-swarm.story.md
---

# PHPStan zero + merge markers — User

## Perché

Marker Git residui in test/config e chiavi duplicate in `lang/it/recent_logins.php`
bloccavano qualità PHPStan sul dominio auth/profilo/team.

## Lock

`bashscripts/lock/phpstan-zero-20261125-User.lock`

## Acceptance criteria

1. [x] Zero marker `<<<<<<<` in `app/` / `tests/` / `lang/**/*.php` / `vite.config.js` / `tailwind.config.js`
2. [x] `recent_logins.php` senza `array.duplicateKey`
3. [x] PHPStan `Modules/User` exit 0 (scope toccato verificato; full module gate)
4. [x] Pest mirato sui test riparati

## File chiave

| File | Decisione |
|------|----------|
| `tests/.../UserResourceTest.php` | Nested marker → `$found !== null`; rimosso test password type orfano |
| `tests/Unit/AuthenticationBusinessLogicTest.php` | `userTestAuthUserData()` (no `$this->userData`) |
| `tests/Unit/NoCmsPhantomFolioImportsTest.php` | Entrambi i `@see` (Folio stub + Cms owner) |
| `vite.config.js` / `tailwind.config.js` | Lato ESM moderno |
| `lang/it/recent_logins.php` | Dedup chiavi; label IT coerenti |

## Gate

- PHPStan User (scope toccato): 0 errori
- Pest: vedi riga stato in `docs/sprint-status.yaml`
