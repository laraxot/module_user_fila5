---
module: theme
topic: livewire-to-filament-widget-migration
canonical: ./bmad/livewire-inventory.md
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

See canonical documentation: ./bmad/livewire-inventory.md

Nota 2026-09-29 (subagent User/lw2fw-02): il puntatore precedente puntava a
`../../../Themes/docs/shared-components/livewire-to-filament-widget-migration.md`,
un link morto — quella directory (`Themes/docs/`) non esiste affatto nel repo, non
solo il file. Nessun altro modulo referenzia quel path (verificato con grep
fleet-wide su `laravel/Modules/*/docs`), quindi non e' un problema di link condiviso
rotto altrove. Ripuntato qui alla fonte viva e verificata per questo modulo
(`./bmad/livewire-inventory.md`), che copre esattamente questo argomento (audit
Livewire→Filament Widget per Cluster A/B/C).

Se in futuro serve davvero un doc cross-modulo condiviso a livello Themes per questo
pattern (utile visto che altri moduli — Job, Lang, Media, Ptv, UI — hanno swarm agent
paralleli sulla stessa conversione), va deciso e creato come lavoro a se', non come
fix di un link morto: creare `Themes/docs/` da zero solo per questo file avrebbe
allargato lo scope di questo task oltre i 4 widget assegnati. Flag lasciato qui
apposta, non risolto silenziosamente.
