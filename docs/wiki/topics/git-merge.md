---
title: "Topic git-merge"
type: digest
status: active
qmd: "digest ceiling 100 git-merge"
---

# Topic git-merge

Sintesi automatica di 4 documenti (chiave `git-merge`).

## git-merge-conflict-inventory-1

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory-1.md`_

> Questo file è stato rinominato in [git-merge-conflict-inventory-1.md](git-merge-conflict-inventory-1.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Git Conflict Inventory

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory-28.md`_

# Git Conflict Inventory

- Date: 2026-04-28
- Owner: Modules/User
- Files with conflict markers: 5

## Files

- docs/archive/historical/volt-folio-logout-error.md
- docs/archive/historical/volt-folio-logout.md
- docs/phpstan-fixes-roadmap.md
- docs/volt-folio-logout-error.md
- docs/wiki/README.md

## Notes

- Inventory generated from `rg -l "^(<<<<<<<|=======|>>>>>>>)"`.
- Use this list as a volatile coordination map; re-open each file before editing because other agents may resolve items in parallel.

## git-merge-conflict-inventory.deprecated

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory.deprecated.md`_

> Questo file è stato rinominato in [git-merge-conflict-inventory-.deprecated.md](git-merge-conflict-inventory.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Git — inventario conflitti merge (User)

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory.md`_

# Git — inventario conflitti merge (User)

## Stato 2026-11-24 (post merge_remote_repo_2)

- `module.json` valido (providers User+AdminPanel+Passport+Socialite, requires Xot+UI).
- `app/**/*.php`: **0** marker `<<<<<<<` (incl. `HasTeams.php`).
- Lang: dedup `array.duplicateKey` su overview widgets, oauth PAC, password_resets, base_profile(s); parse mashup `attach_role`/`user_section`/`passport_stats` ripuliti.
- Verify: `php artisan about --only=environment` OK; `phpstan analyse Modules/User` → `errors=0`, `file_errors=0`.
- Restano marker in `docs/` e `tests/` (fuori scope boot/PHPStan: tests esclusi da `phpstan.neon`).

## Stato 2026-11-16

- Marker PHP User risolti (bootstrap `UserServiceProvider` + BaseUser/BaseTenant/Socialite/UserForm):
  [phpstan-conflict-markers-bootstrap](../../bmad/stories/0020-phpstan-conflict-markers-bootstrap.story.md).
- Scan marker su `*.php` / `*.blade.php` → **NONE**.
- Aggiorna (non sostituisce) lo storico 2026-07; link da story BMAD e `git-conflicts-resolution.md`.

## Stato 2026-07-08

- **Rebase abortito** su `dev` (328 pick, 623 file `AA`) — causa: tentativo rebase sopra `laraxot/dev` con storico LFS corrotto.
- Dopo `git rebase --abort`: **0** marker `<<<<<<<` nei `.md` tracciati (`git grep`).
- Push risolto con squash → [git-push-lfs-missing-objects](./git-push-lfs-missing-objects.md).

## Inventario storico (2026-04-28)

File con marker (da risolvere forward-only se riappaiono):

- `docs/archive/historical/volt-folio-logout-error.md`
