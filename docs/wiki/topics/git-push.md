---
title: "Topic git-push"
type: digest
status: active
qmd: "digest ceiling 100 git-push"
---

# Topic git-push

Sintesi automatica di 4 documenti (chiave `git-push`).

## User Module — Git Push & LFS Issue (2026-07-28)

_Fonte: `git-push-lfs-issue-28.md`_

# User Module — Git Push & LFS Issue (2026-07-28)

## Problem

Push to `provtv/module_user_fila5` fails with LFS (Git Large File Storage) error:

```
remote: error: GH008: Your push referenced at least 11 unknown Git LFS objects:
  e400cd031a594c8b3ea19d7711c0394f1315eeabb182f13351602aaf935cde53
  d82a070ef9ee39f25805bce168450feaeabef237ff9b9177afdb77ed88860b26
  5375e5ef35f8c770fd8d39c1702e6c90f715fd6752c8fec51c9d0f9b410f4f48
  (8 more...)
```

## Root Cause

Latest commit `45470612` references 11 image files tracked as LFS pointers:
- docs/img/{create_user.jpg, create-user.jpg, roles_list.jpg, roles-list.jpg, set_password.jpg, set-password.jpg}
- docs/screenshots/event-detail-page.png
- resources/img/{favicon.png, screenshots/event-detail-page.png, screenshots/simple.png}
- resources/favicon.png

**Status:** All are LFS pointers (text files containing SHA-256 hash), but the server remotes (provtv, laraxot) do not have the corresponding LFS objects in their storage.

## Forward-Only Options (No Reset/Revert/Checkout)

### Option A: Create Repair Commit (Recommended)

Remove the problematic image files from Git tracking and commit this as a forward fix:

## User Module — Git Push & LFS Issue (2026-07-28)

_Fonte: `git-push-lfs-issue.md`_

# User Module — Git Push & LFS Issue (2026-07-28)

## Problem

Push to `provtv/module_user_fila5` fails with LFS (Git Large File Storage) error:

```
remote: error: GH008: Your push referenced at least 11 unknown Git LFS objects:
  e400cd031a594c8b3ea19d7711c0394f1315eeabb182f13351602aaf935cde53
  d82a070ef9ee39f25805bce168450feaeabef237ff9b9177afdb77ed88860b26
  5375e5ef35f8c770fd8d39c1702e6c90f715fd6752c8fec51c9d0f9b410f4f48
  (8 more...)
```

## Root Cause

Latest commit `45470612` references 11 image files tracked as LFS pointers:
- docs/img/{create_user.jpg, create-user.jpg, roles_list.jpg, roles-list.jpg, set_password.jpg, set-password.jpg}
- docs/screenshots/event-detail-page.png
- resources/img/{favicon.png, screenshots/event-detail-page.png, screenshots/simple.png}
- resources/favicon.png

**Status:** All are LFS pointers (text files containing SHA-256 hash), but the server remotes (provtv, laraxot) do not have the corresponding LFS objects in their storage.

## Forward-Only Options (No Reset/Revert/Checkout)

### Option A: Create Repair Commit (Recommended)

Remove the problematic image files from Git tracking and commit this as a forward fix:

## Git push User — history unrelated (laraxot ↔ provtv)

_Fonte: `wiki/troubleshooting/git-push-dual-remote-unrelated.md`_

# Git push User — history unrelated (laraxot ↔ provtv)

## Perché

`Modules/User` ha due remote:

- `laraxot` → `laraxot/module_user_fila5`
- `provtv` → `provtv/module_user_fila5`

Scopo: tip `dev` allineati senza force. Se i root commit divergono (`git merge-base` vuoto), un merge/rebase cieco produce centinaia di conflitti add/add — **vietato** in automatico.

## Come è stato sistemato (2026-07-23)

| Remote | Stato | Azione |
|--------|-------|--------|
| `laraxot/dev` | tip `3ea7273a` · **0 0** | `git push --no-thin` → **Everything up-to-date** |
| `provtv/dev` | tip `d2b107e0` · ahead 3 / behind 57 | **STOP** — `merge-base` vuoto (unrelated); push non-FF rifiutato |

### Diagnosi

```bash
cd laravel/Modules/User
git fetch laraxot dev && git fetch provtv dev
git rev-list --left-right --count HEAD...laraxot/dev   # 0 0
git rev-list --left-right --count HEAD...provtv/dev    # 3 57
git merge-base HEAD provtv/dev                         # exit 1 = unrelated
git rev-list --max-parents=0 HEAD
git rev-list --max-parents=0 provtv/dev                # root diversi
```

## Git push — oggetti LFS mancanti

_Fonte: `wiki/troubleshooting/git-push-lfs-missing-objects.md`_

# Git push — oggetti LFS mancanti

## Sintomo

Da `laravel/Modules/User`:

```bash
git push -u laraxot dev
```

Errore tipico:

```text
Git LFS upload failed:
  (missing) docs/img/roles-list.jpg (5375e5e...)
  (missing) resources/svg/user-animated.svg (40b6bdc...)
  ...
hint: Your push was rejected due to missing or corrupt local objects.
error: failed to push some refs to 'github.com:laraxot/module_user_fila5.git'
```

Spesso **41+** file (`svg`, `png`, `jpg`) risultano missing in `.git/lfs/objects/` mentre il working tree ha blob reali.

## Perché succede

1. Commit storici (centinaia di messaggi `.`) contengono **puntatori LFS** non più presenti sul remote.
2. `git lfs push laraxot dev` segnala oggetti missing anche se i file su disco esistono (OID diverso).
3. Un **rebase** su `laraxot/dev` con 328 commit può lasciare il repo in `(no branch, rebasing dev)` con centinaia di conflitti `AA` — **non** proseguire il rebase; abortire e usare squash.
