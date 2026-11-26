---
title: "ADR — <problema risolto e soluzione scelta>"
type: decision
status: proposed            # proposed | accepted | deprecated | superseded (con superseded_by)
created: YYYY-MM-DD
updated: YYYY-MM-DD
module: User
decision-makers:
qmd: "0000 template adr MADR NNNN-slug"
---

<!-- File: docs/adr/NNNN-titolo-con-trattini.md · formato MADR in italiano.
     Il basename DEVE iniziare con NNNN- (es. 0001-...). Eccezioni: README.md, INDEX.md/index.md, 0000-template.md
     e i puntatori con `status: superseded`. Nessuna data nel nome del file (la data sta nella frontmatter).
     Scrivi un ADR solo se la decisione è difficile da invertire, sorprendente e frutto di un trade-off reale.
     Sezioni `##` in quest'ordine: Contesto, Driver della decisione, Alternative scartate, Decisione, Conseguenze, Conferma.
     Se il codice di oggi contraddice l'ADR, aggiungi in fondo `## Stato attuale` con file e riga. -->

# <!-- Titolo: il problema risolto e la soluzione scelta -->

## Contesto

<!-- 2-3 frasi. Chiudi con la domanda a cui la decisione risponde. -->

## Driver della decisione

- <!-- forza o vincolo che pesa sulla scelta -->

## Alternative scartate

- <!-- alternativa seria e motivo per cui è stata scartata -->

## Decisione

<!-- Cosa si fa e dove sta nel codice. -->

## Conseguenze

- Buono: <!-- … -->
- Cattivo: <!-- … -->

## Conferma

<!-- Come si controlla che il codice rispetti la decisione: un test con percorso che esiste, un comando eseguibile da `laravel/`
     o una regola di revisione. Se non c'è nulla di automatico: «Nessuna conferma automatica oggi; proposta: …». -->
