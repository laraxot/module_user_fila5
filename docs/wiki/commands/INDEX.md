---
<<<<<<< .merge_file_zlsRA9
title: "Commands Index"
type: index
created: 2026-05-11
updated: 2026-05-11
tags: [commands, index, on-demand]
related:
  - ../rules/00-TRIGGER_MAP.md
  - ../rules/on-demand-pattern.md
---

# Commands Index

Le Commands progettuali vivono qui, nel wiki del Module **User**, e vengono caricate **on-demand**.

> Vedi anche → [Trigger Map](../rules/00-TRIGGER_MAP.md)

## Regola

1. individua il trigger del task
2. consulta `../rules/00-TRIGGER_MAP.md`
3. se serve, esegui `qmd search "<topic>"`
4. leggi solo la Commands wiki pertinente

## Pattern di caricamento

| Pattern | Comando |
|---------|---------|
| Carica Commands specifica | `Read ../commands/<name>.md` |
| Ricerca semantica | `qmd search "<topic>"` |
| Via trigger map | Consulta `../rules/00-TRIGGER_MAP.md` |

## Note

- La sorgente di verita' per le Commands e' sempre il wiki locale
- Non embeddare Commands nei prompt di avvio
- Per Commands globali, consulta il [wiki root](../../docs/wiki/commands/index.md)

- Per Commands globali, consulta il [wiki root](../../docs/wiki/commands/INDEX.md)

## Aggiungere una Nuova COMMANDS

1. Crea `../commands/<nome>.md` con contenuto completo
2. Aggiungi la voce in `../rules/00-TRIGGER_MAP.md`
3. Aggiorna questo indice se la Commands e' ricorrente
4. Committa: `docs: add commands <nome>`


## Console User (2026-06-10)

- [user-super-admin.md](user-super-admin.md) — `--email`, argomento, interattivo; no Prompts WSL
=======
title: "User — alias wiki/commands/INDEX (UPPERCASE)"
type: alias
module: User
status: superseded
superseded_by: index.md
canonical: ./index.md
updated: 2026-10-20
qmd: "alias wiki commands INDEX uppercase verso index"
---

<!-- gateguard: convert existing UPPERCASE INDEX twin to stub. Canonical lowercase index.md. Linked from wiki tree. User: "Fix UPPERCASE md except README in those trees if easy" -->

# Alias — commands INDEX

Canonico: [index.md](./index.md).
>>>>>>> .merge_file_Uz8PGg
