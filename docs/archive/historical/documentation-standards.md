---
title: "Standard di Documentazione"
type: rule
tags: [documentation, standards]
created: 2026-07-14
updated: 2026-07-14
qmd: "documentation-standards standard di documentazione"
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

# Standard di Documentazione

## Convenzioni di Naming
- Tutti i file e le cartelle nella documentazione devono essere in minuscolo
- L'unica eccezione è il file `README.md`
- Utilizzare lo script [fix_docs_case](../../../../../bashscripts/docs/docs/fix_docs_case.md) per la standardizzazione automatica

## Organizzazione
- Ogni modulo ha la sua cartella `docs`
- La documentazione specifica va nel modulo pertinente
- Collegamenti bidirezionali tra documenti correlati
- Evitare duplicazione della documentazione

## Manutenzione
- Aggiornare la documentazione contestualmente alle modifiche del codice
- Verificare regolarmente i collegamenti
- Mantenere la coerenza dello stile e del formato
- Eseguire periodicamente gli script di manutenzione automatica
