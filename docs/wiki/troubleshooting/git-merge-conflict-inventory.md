---
title: "Git — inventario conflitti merge (User)"
type: troubleshooting
module: User
tags: [git, merge, conflict, user]
created: 2026-04-28
updated: 2026-09-22
qmd: "git merge conflict markers User docs inventory rebase"
related:
  - "./filament-user-creation-pty-error.md"
  - "./git-merge-conflict-inventory-1.md"
  - "./git-push-lfs-missing-objects.md"
  - "./phpstan-module-analysis-memory.md"
  - "./phpstan-widget-property-types-1.md"
  - "./phpstan-widget-property-types.md"
  - "./spatie-permission-team-model-not-configured.md"
---

# Git — inventario conflitti merge (User)

## Stato 2026-09-22

- **Riapparso su scala molto più ampia**: 866 file `.md`/`.mdc` in `docs/` con marker
  residui, non 5. Causa: il check dello stato 2026-07-08 cercava solo
  `^<<<<<<<`, cieco alla corruzione reale — commit `.` (rif. `87273113`,
  `2024e2e7`, `60a2c9a9`, `f548be94`, `laraxot/dev`) che avevano già perso
  l'`<<<<<<<` di apertura, lasciando `=======`/`>>>>>>> ... (.)` orfani a
  livello di riga grezza (anche dentro fence di codice).
- Confermato committato, non un merge locale in corso: `git show
  laraxot/dev:<path>` mostra gli stessi marker sul tip del branch remoto.
- 10 conflitti erano genuini a 3 vie (con contenuto reale su entrambi i lati);
  856 erano rumore orfano puro o cluster "riga duplicata attorno al
  divisore" a fine documento — risolti con script deterministico
  (rimuove `^<<<<<<< `/`^>>>>>>> `; rimuove `=======` solo se adiacente a un
  marker; collassa la riga duplicata risultante solo se una riga è stata
  rimossa fra le due occorrenze identiche).
- **Il comando di rigenerazione qui sotto va sostituito**: cercava solo
  `<<<<<<<` e per questo l'inventario del 2026-07-08 ("0 marker") non ha
  visto la corruzione da `>>>>>>> `/`=======` orfani.

## Stato 2026-07-08

- **Rebase abortito** su `dev` (328 pick, 623 file `AA`) — causa: tentativo rebase sopra `laraxot/dev` con storico LFS corrotto.
- Dopo `git rebase --abort`: **0** marker `<<<<<<<` nei `.md` tracciati (`git grep`).
- Push risolto con squash → [git-push-lfs-missing-objects](./git-push-lfs-missing-objects.md).

## Inventario storico (2026-04-28)

File con marker (da risolvere forward-only se riappaiono):

- `docs/archive/historical/volt-folio-logout-error.md`
- `docs/archive/historical/volt-folio-logout.md`
- `docs/phpstan-fixes-roadmap.md`
- `docs/volt-folio-logout-error.md`
- `docs/wiki/README.md`

## Note operative

- Rigenerare lista (copre tutti e 3 i pattern, non solo l'apertura):
  `grep -rlE '^<<<<<<< |^=======$|^>>>>>>> ' -- docs/`
  (`^<<<<<<<` da solo è insufficiente: manca l'orfano `>>>>>>> ` senza
  apertura, la causa reale della recidiva 2026-09-22).
- Non risolvere in parallelo senza lock; preferire wiki canonico `docs/wiki/` rispetto a duplicati root `docs/*.md`.
- Task dedicato marker doc: `docs/tasks/fix-doc-merge-markers.md`
