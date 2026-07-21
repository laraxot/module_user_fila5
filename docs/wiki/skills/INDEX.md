---
title: "Skills Index"
type: index
tags: [index, skills, user, wiki]
created: 2026-05-11
updated: 2026-07-20
qmd: "Skills Index index index skills user wiki user module documentation"
issues:
  - "https://github.com/laraxot/module_user_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/module_user_fila5/discussions/24"
related:
  - filament-translation-audit.md
  - ../AGENTS.md
  - ../README.md
  - ../SCHEMA.md
  - ../agents.md
  - ../architecture.md
---

# Skills Index

Le Skills progettuali vivono qui, nel wiki del Module **User**, e vengono caricate **on-demand**.

> Vedi anche → [Trigger Map](../rules/00-TRIGGER_MAP.md)

## Regola

1. individua il trigger del task
2. consulta `../rules/00-TRIGGER_MAP.md`
3. se serve, esegui `qmd search "<topic>"`
4. leggi solo la Skills wiki pertinente

## Pattern di caricamento

| Pattern | Comando |
|---------|---------|
| Carica Skills specifica | `Read ../skills/<name>.md` |
| Ricerca semantica | `qmd search "<topic>"` |
| Via trigger map | Consulta `../rules/00-TRIGGER_MAP.md` |

## Note

- La sorgente di verita' per le Skills e' sempre il wiki locale
- Non embeddare Skills nei prompt di avvio
- Per Skills globali, consulta il [wiki root](../../docs/wiki/skills/INDEX.md)

## Aggiungere una Nuova SKILLS

1. Crea `../skills/<nome>.md` con contenuto completo
2. Aggiungi la voce in `../rules/00-TRIGGER_MAP.md`
3. Aggiorna questo indice se la Skills e' ricorrente
4. Committa: `docs: add skills <nome>`

