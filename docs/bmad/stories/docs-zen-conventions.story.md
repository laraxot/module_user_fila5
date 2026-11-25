---
title: "User: bonifica docs .md (convenzioni, duplicati, stub morti)"
type: story
status: done
module: User
epic: docs-second-brain
parent: ../../../../Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md
created: 2026-11-25
updated: 2026-11-25
qmd: "user docs bonifica kebab-case frontmatter qmd duplicati md5 stub canonical shared-components morti models/models annidamento -integration _integration template product roadmap prd sprint planning"
---

# User: bonifica docs `.md` (lane B swarm docs-zen)

## Perche'

`laravel/Modules/User/docs` era la cartella docs piu' inquinata del progetto (3207 `.md`):
annidamenti generati da bug, ~480 stub "See canonical documentation" verso
`Themes/docs/shared-components/*` (percorso **mai esistito**), coppie `snake_case`/kebab,
template prodotto fabbricati, frontmatter YAML rotti. Rumore per QMD e per gli agenti.

## Prima / Dopo

| Metrica | Prima | Dopo |
|---|---:|---:|
| file `.md` | 3207 | 2108 |
| copie esatte md5 oltre la prima | 425 | 31 (*) |
| nomi con data | 1 | 0 |
| nomi non kebab | 375 | 0 |
| senza frontmatter | 379 | 0 |
| senza `qmd` | 470 | 0 |
| frontmatter YAML non valido | 42 | 0 |
| link relativi interni rotti | 8222 | 2488 |

(*) 30 coppie di `*.story.md` (es. `x-.story.md` / `x.story.md`, `13-dcp-53-...` / `dcp-53-...`):
le story non si eliminano/rinominano per policy; 1 terna di `README.md` placeholder
(`outputs/`, `raw/`, `wiki/`).

## Cosa e' stato eliminato/fuso e perche'

- **Annidamento `models/models/models/models/models/`** + `models_backup`, `models-uppercase`,
  `models.tmp_rename`, `models_superseded`... (11 file): l'unico contenuto reale (doc del
  modello `Team`, `TeamContract`) e' stato ripristinato in `models/team.md`, che era diventato
  uno stub morto.
- **`docs/docs/filament-version.md`**: template con placeholder `{ModuleOrThemeName}`, gia'
  istanziato in `filament-version.md`.
- **Stub morti** (472): corpo = solo "See canonical documentation: ../Themes/docs/shared-components/..."
  verso file inesistenti. Eliminati; dove esisteva il fratello reale (`x-1.md` -> `x.md`) i link
  sono stati reindirizzati. In 150 file con contenuto proprio e' stata tolta solo la riga/chiave
  `canonical` morta.
- **Template fabbricati** (36): `product/{prd,roadmap,strategy,launch-plan,spring-planning,user-research}/README.md`,
  `product_*`, `sprint_planning*`, `user_research*`, `confidence_guidelines*` (root e `_archive`).
  Verifica: nessuna classe/trait/metodo del modulo (`app/`) citato, solo marketing generico
  (date di lancio, "TechCorp", "StartupXYZ"). Tenuti `prd.md` e `strategy.md` (brevi, specifici PTVX).
- **`-integration/` -> `_integration/`**: cartella con nome invalido; 18 file sussunti,
  8 fusi (parti uniche accodate), 1 spostato.
- **Copie esatte/whitespace** (288): tenuta la copia fuori da `archive`/`_archive`/`historical`,
  con nome kebab e senza suffisso `-1`/`-`.
- **Rinomine kebab/data** (21 dirette + 265 collisioni): sussunzione (111), sostituzione col
  piu' completo (22), fusione con sezione `## Contenuto fuso da ...` (132).
- **Indici generati** `INDEX.md`/`index.md` (8k righe di elenchi verso file inesistenti):
  `INDEX.md` eliminato (duplicato case), `index.md` e `_archive/index.md` rigenerati sui file reali.
- **Frontmatter**: 283 aggiunti (`title`, `type`, `qmd` da titolo/heading/simboli), 88 chiavi
  aggiunte, 42 riparati (`\U` in stringhe double-quoted, `:` non quotati, righe orfane da merge).
- **Link**: 833 riscritti in `laravel/Modules/*/docs`, `laravel/Themes/*/docs`, `docs/`,
  `bashscripts/ai/wiki`; 115 voci `related:` verso file eliminati rimosse, 132 righe-lista morte rimosse.

## Casi lasciati in dubbio

- 4 file in `laravel/Themes/Zero/docs` (lock lane D attivo) referenziano file User rinominati:
  link non aggiornati. Da rifare quando il lock Zero e' libero.
- 258 menzioni testuali (non link markdown) a file eliminati, quasi tutte in
  `Notify/docs/ai-agents/project-docs-index.md` e nei report `optimization-*` di User.
- 2488 link interni rotti residui erano gia' rotti prima (link verso file mai esistiti).
- Molti doc "fratelli" non identici restano (`optimization-recommendations-1.md`,
  `-raccomandazioni-...`, `archive/historical/*` vs root): deduplica semantica = story separata.
- 30 coppie `*.story.md` identiche: decisione umana (marcare superseded).

## Gate

Solo `.md`: PHPStan/Pint/Pest non applicabili (skip documentato), PHPStan gia' 0.
Validazione: tutti i 2108 frontmatter parsati con PyYAML come mapping.
Backup pre-bonifica: scratchpad sessione `laneB/user-docs-backup.tgz`.
