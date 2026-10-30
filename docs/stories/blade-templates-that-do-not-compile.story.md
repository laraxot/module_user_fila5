---
title: "Quattro Blade che non compilano gia' in HEAD (User, Cms, Notify)"
type: story
status: review
module: User
epic: blade-health
updated: 2026-10-30
tags: [blade, compile, user, cms, notify, defects]
related:
  - ../../../Cms/docs/stories/blade-i18n-no-hardcoded-text.story.md
---

# Blade che non compilano

**Story ID:** blade-health.non-compiling-templates
**Status:** review   <!-- backlog -> ready-for-dev -> in-progress -> review -> done -->

## Story

Come **sviluppatore**, voglio che ogni Blade dei moduli compili, cosi' che un controllo automatico di compilazione possa essere eseguito su tutto il repository e un errore nuovo non si confonda con uno vecchio.

## Acceptance Criteria

<!-- LOCKED. -->

1. Per ciascuno dei quattro file elencati si e' deciso se e' codice vivo o morto (chi lo richiama) e la decisione e' scritta nel Dev Agent Record.
2. I file vivi compilano: `Blade::compileString` seguito da `php -l` sul risultato non da' errori.
3. I file morti restano dove sono (nessuna cancellazione) con la decisione documentata; se sono prototipi si segnalano al proprietario.
4. La correzione non cambia l'output degli altri template del modulo.
5. Il difetto era presente in HEAD: la correzione non va confusa con le modifiche della campagna sui testi fissi.

## Tasks / Subtasks

- [x] Cercare i chiamanti di ciascun file (`@include`, `<x-...>`, nome vista, JSON dei blocchi) (AC: #1)
- [x] `User/resources/views/components/blocks/hero.blade.php`: la causa non era `isset()` ma le prop con il trattino (`$cta-text` e simili, che PHP legge come sottrazione); rinominate in camelCase (AC: #2)
- [x] `Cms/resources/views/livewire/menu/partials/builder_body_a.blade.php` e `builder_body_b.blade.php`: sono le due metà di una copia troncata (la `a` finisce a metà tag, la `b` ha `@endif` e `@endforeach` in più) e nessuno le richiama: dichiarate morte, lasciate dove sono (AC: #1, #3)
- [x] `Notify/resources/views/filament/tables/columns/contact-column.blade.php`: la causa era una coda di 28 righe della versione precedente rimasta dopo la riscrittura; tolta (AC: #2)
- [x] Rieseguire la compilazione sui quattro file (AC: #2): `php bashscripts/tools/blade-compile-check.php <file|cartella>`

## Dev Notes

<!-- LOCKED. -->

- **Errori misurati il 2026-10-30** compilando il template e passando il PHP risultante a `php -l`:

| File | Errore |
|---|---|
| `Modules/User/resources/views/components/blocks/hero.blade.php` | `Cannot use isset() on the result of an expression` (riga 66 del compilato) |
| `Modules/Cms/resources/views/livewire/menu/partials/builder_body_a.blade.php` | `unexpected end of file` (riga 261) |
| `Modules/Cms/resources/views/livewire/menu/partials/builder_body_b.blade.php` | `unexpected token "endforeach"` (riga 175) |
| `Modules/Notify/resources/views/filament/tables/columns/contact-column.blade.php` | `unexpected token "else"` (riga 120) |

- Verificato confrontando `git show HEAD:<file>` compilato con il file di lavoro: stessi errori in HEAD e nell'albero di lavoro, quindi non vengono dalla campagna sui testi fissi. Al momento della verifica nessun file di codice richiamava i quattro template (solo documenti): da riconfermare con `grep` prima di decidere vivo o morto.
- Non cancellare, non spostare, non rinominare: si corregge la sintassi dopo aver capito lo scopo del file.
- I due file di Cms hanno l'ultimo commit del 2026-10-30; `contact-column` del 2026-10-15; `hero` del 2026-09-24.

## Testing

<!-- LOCKED. -->

- **Approccio:** compilazione statica, nessun rendering.
- **Per AC:** #2 -> `php artisan tinker --execute` con `app('blade.compiler')->compileString(file_get_contents($p))` e `php -l` sul risultato; #4 -> compilazione degli altri template della stessa cartella prima e dopo.
- **Casi limite:** template che usano `@volt`, slot e componenti anonimi (la compilazione isolata puo' non risolvere `<x-...>` del modulo: distinguere questo errore da un errore di sintassi).

## Dependency Maps

- **Blocked by:** nessuna.
- **Blocks:** un controllo di compilazione su tutte le Blade (non esiste ancora).
- **External:** nessuna.

## Owned File/Module Scope

- `laravel/Modules/User/resources/views/components/blocks/hero.blade.php`
- `laravel/Modules/Cms/resources/views/livewire/menu/partials/builder_body_a.blade.php`
- `laravel/Modules/Cms/resources/views/livewire/menu/partials/builder_body_b.blade.php`
- `laravel/Modules/Notify/resources/views/filament/tables/columns/contact-column.blade.php`
- Condiviso con la campagna sui testi fissi: lock `bash bashscripts/lock/check.sh <file>` prima di ogni modifica.

## Learnings from Previous Stories

- Per distinguere un errore preesistente da uno nuovo serve compilare la versione di HEAD (`git show HEAD:<file>`, sola lettura) accanto a quella di lavoro.

## GitHub (tracciamento)

| Tipo | Repo | # | URL |
|------|------|---|-----|
| Issue (coordinamento) | laraxot/base_techplanner_fila5 | 18 | https://github.com/laraxot/base_techplanner_fila5/issues/18 |
| **Discussion** (canon) | laraxot/base_techplanner_fila5 | 54 | https://github.com/laraxot/base_techplanner_fila5/discussions/54 |

Non ho cercato issue dedicate nei repo dei tre moduli; nessun commento e' stato pubblicato.

## Dev Agent Record

**Sessione 97f16a39, 2026-10-30.** Misura di partenza: 4 file non compilano. Esito con `php bashscripts/tools/blade-compile-check.php`:

| File | Chiamanti | Decisione | Esito |
|---|---|---|---|
| `User/.../components/blocks/hero.blade.php` | nessuno (solo le sue chiavi `user::blocks.hero.*`) | prototipo non montato; prop rinominate `ctaText`, `ctaLink`, `backgroundColor`, `textColor`, `ctaColor` | compila |
| `Cms/.../menu/partials/builder_body_a.blade.php` | nessuno | morto: copia troncata (20.104 byte, finisce a metà `<span ...>`) | lasciato, non compila |
| `Cms/.../menu/partials/builder_body_b.blade.php` | nessuno | morto: seconda metà della stessa copia (20.032 byte) | lasciato, non compila |
| `Notify/.../columns/contact-column.blade.php` | nessuno (`ContactColumn` rende `notify::filament.tables.columns.contact`) | variante non montata; tolte le righe 91-118 (coda della versione precedente) | compila |

- Gli altri 3 file della cartella `Cms/.../livewire/menu` (5 in tutto) compilano, quindi `builder.blade.php` vivo non e' toccato dal difetto delle due partials.
- Copia del file Notify prima della modifica: scratchpad della sessione (`contact-column.blade.php.prima`); la coda tolta e' recuperabile anche da `git show HEAD:<file>`.
- **Non verificato:** resa a video di `hero` (nessuna pagina lo monta) e di `contact-column`; prima di montarli va controllato che `Modules\Notify\Enums\ContactTypeEnum` abbia `getIcon()`, `getColor()` e `getLabel()` usati dal template.
- **Aperto per il proprietario di Cms:** le due partials morte restano nel repo e faranno risultare rosso ogni controllo di compilazione su tutte le Blade; decidere se portarle in un archivio del modulo.
- Prima di questa story non esisteva un controllo di compilazione per le Blade: ora c'e' `bashscripts/tools/blade-compile-check.php` (repo privato `bashscripts/`).
