# Archive — documentazione legacy del modulo User

Contenuto spostato da `docs/` durante la bonifica del 2026-11-26
(tracking: [issue #117](https://github.com/laraxot/module_user_fila5/issues/117);
contribuisce a #105-#110).

## Cosa e' successo in docs/

- **~922 file stale eliminati**: `*.md.old`, `*.md.bak`, `*.mdc`, `*.bak`, zero-byte
  e simili (cluster PHPStan corrotto di #105, suffissi di #107).
- **`docs/index.md` riscritto** come mappa curata a sei voci (#108): prima elencava
  ~3000 link, il 30% rotti.
- **`docs/README.md`** aggiornato: la tabella degli indici punta alle aree correnti.
- **Cartella `docs/docs/`** rimossa (solo `.gitkeep`, duplicato).

## Cosa contiene questo archivio

| Percorso | Provenienza | Note |
|---|---|---|
| `bmad/` | `docs/bmad/` | Dossier BMAD e `bmad/stories/` conclusi |
| `wiki/` | `docs/wiki/` | LLM Wiki generata (concepts, rules, integrations, product) |
| `llm-wiki/` | `docs/llm-wiki/` | Wiki locale generata |
| `stories/` | `docs/stories/` | Story BMAD concluse (phpstan, audit, frontend) |
| `contracts/INDEX.md` | `docs/contracts/` | Indice duplicato del registro contratti |
| `architecture/` | `docs/architecture/` | Doc generiche 2026-07 con link morti |
| `digests/` | `docs/digests/` | Digest di bonifiche precedenti |
| `product/` | `docs/product/` | PRD/roadmap/strategy BMAD |
| `bug-fixes/`, `bugfix/`, `fixes/`, `filament/legacy/` | `docs/` | Fix e legacy con convenzioni duplicate (#107) |
| `console_commands/`, `console-commands/`, `commands/` | `docs/` | Tre copie della stessa doc comandi |
| `models/`, `oauth/`, `outputs/`, `roadmap/`, `prompts/`, `html2pdf/`, `manuals/` (altre), `readme.md`, `migration-consolidation.md`, `form-column-parity.md`, `sync-marker-repair-php-lang-tests.md` | `docs/` | Doc minori/superate |

I link interni dei documenti mantenuti in `docs/` sono stati ripuntati qui
dove il target esisteva; i link a file mai esistiti o eliminati come stale
restano rotti in `docs/README.md` (lunga coda di link morti pre-esistenti).
La storia git conserva tutto il contenuto.
