---
module: User
topic: todo
---

# Cleanup plan — accumulated documentation

**Nota di accuratezza (2026-09-17)**: questo file puntava a
`../../../Themes/docs/shared-components/todo.md` come "canonical", ma quel file
non esiste in questo repo ed è un target scollegato dal tema di questa nota
(era probabilmente uno stub generato in blocco e mai verificato). `00-INDEX.md`
lo referenzia come "Strategia per gestire i 550+ documenti accumulati", ma quel
contenuto non è mai stato scritto qui.

Stato reale ad oggi: `Modules/User/docs/` contiene circa 3500 file, con estesa
duplicazione (varianti `-1`/`-2`/`-3`, `snake_case` vs `kebab-case`, maiuscolo
vs minuscolo, cartelle `_archive/`, `archive/`, `wiki-archive/`) e diversi file
con contenuto generico/non adattato a questo progetto (vedi frontmatter con
riferimenti a `provtv/base_ptv_fila5`, un repo diverso da
`festionali/base_restaurant_fila5`). Serve un intervento dedicato di bonifica,
non risolvibile con edit puntuali: vedi il finding corrispondente nel report
dell'ultima revisione della documentazione di questo modulo.
