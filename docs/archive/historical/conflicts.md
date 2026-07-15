---
title: "Risoluzione Conflitti - User"
type: concept
tags: [conflicts]
created: 2026-07-14
updated: 2026-07-14
qmd: "conflicts risoluzione conflitti - user"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./actions-path-convention.md"
  - "./actions-structure-1.md"
  - "./actions-structure.md"
  - "./advanced-user-architecture.md"
  - "./analisi-metodi-duplicati.md"
  - "./analysis.md"
  - "./architecture-rules.md"
  - "./auth-blade-structure.md"
---

# Risoluzione Conflitti - User

## File modificati
- app/Filament/Widgets/Auth/LoginWidget.php

## Decisioni adottate
- Verificato e uniformato il namespace di tutti i widget Auth a `Modules\User\Filament\Widgets\Auth`, rimuovendo ogni occorrenza del segmento `App` e garantendo la conformità PSR-4.
- Confermata la presenza di una sola definizione di classe per file e la correttezza degli use/import.
- Intervento eseguito secondo le regole di progetto e la documentazione globale.

Per ulteriori dettagli sulle regole, vedi anche la documentazione globale del progetto.
