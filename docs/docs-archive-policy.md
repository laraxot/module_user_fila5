---
title: "Docs archive policy"
type: concept
tags: [docs, archive, policy]
created: 2026-07-14
updated: 2026-07-14
qmd: "docs-archive-policy docs archive policy"
<<<<<<< .merge_file_an5IBw
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
=======
<<<<<<< HEAD
<<<<<<< HEAD
issues: ["https://github.com/provtv/<repo progetto>/issues/124"]
discussions: ["https://github.com/provtv/<repo progetto>/discussions/1"]
=======
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
>>>>>>> laraxot/dev
=======
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_9IHYJj
related:
  - "./00-index-1.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
---

# Docs archive policy

`docs/archive/` is local-only scratch/history and must not be used as a canonical documentation source.

Active module knowledge belongs in normal `docs/*.md`, `docs/wiki/**`, or a precise topical subdirectory. This keeps QMD ingestion deterministic and prevents stale duplicates from outranking current documentation.

The module `.gitignore` ignores `docs/archive/`; when a useful archived note is still valid, promote it into a live document outside `archive` and link it from the local docs index.
