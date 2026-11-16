---
id: User/module-bmad-audit-20260928
title: "User: baseline BMAD e analisi completa"
status: ready-for-dev
module: User
epic: module-governance
priority: P1
created: 2026-09-28
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
type: story
updated: 2026-11-16
tags: [docs, user, bmad]
qmd: "story   user: baseline bmad user"
---
# Story: User: baseline BMAD

Come manutentore del modulo User, voglio una baseline BMAD verificabile, così da poter pianificare lavoro senza confondere ipotesi, WIP e comportamento osservato.

## Acceptance criteria

- [ ] Confermare API pubblica e confini con riferimenti a codice reale.
- [ ] Inventariare i flussi critici e collegarli a test Pest.
- [ ] Misurare PHPStan/Pest nel contesto stabile del modulo.
- [ ] Registrare dipendenze, rischi e decisioni nel modulo.
- [ ] Aggiornare lo stato reale in `docs/sprint-status.yaml`.

## Task

- [ ] Revisione architettura.
- [ ] Brainstorming con stakeholder.
- [ ] Decomposizione epic in story più piccole.
- [ ] Quality gate e second-brain write-back.

## Audit 2026-11-16

Audit statico completo del modulo User (identità, auth, ruoli/permessi, Passport, Socialite). PHPStan level max: **0 errori**.

### Conteggi

- Modelli: 50 file diretti in `app/Models` (122 file PHP totali inclusi Traits/Relations/Enums); Actions: 83; Listeners: 5; Filament: 361 file (35 `*Resource.php`, ~30 Page/Widget, + Schemas/Tables/Pages/RelationManagers).
- `database/`: 172 file (migrations, factories, seeders); migrations contate: 83.
- Test: 233 file, ~1241 test Pest; config Playwright dedicata (`playwright.config.js`); 7 TestCase PHPUnit.
- Routes: `api.php`, `auth.php`, `socialite.php`, `web.php`, `web_tall.php`.
- Lang: `it` 264 file, `en` 122 file — gap EN ampio.
- `docs/bmad/`: 117 file; `docs/` root contiene `.md` datati (es. `navigation-translations-fixes-january-2026.md`).

### Findings

1. **[Code] Directory root orfane/duplicate**: `User/Database/` (6 migrazioni duplicate, es. due `create_users_table`, due `model_has_roles`), `User/Application/UseCases/` (2 contratti), `User/Listeners/AssignFreeCreditsListener.php` esistono a ROOT del modulo con namespace `Modules\User\*`, ma il PSR-4 mappa solo `app/` → sono file morti che riskiano collisioni e confusione (i gemelli vivi sono in `app/Listeners/` e `app/Application/`). Verificare e rimuovere.
2. **[Filament] Label/placeholder/helperText**: 44 `->label()`, 109 `->placeholder()` (molti `->placeholder('—')` su colonne table — innocui ma diffusi), 47 `->helperText()`. 336 classi estendono base Xot; nessun `Filament\Forms\Form` legacy; nessun merge marker.
3. **[Quality] `mixed` diffuso**: 88 file in `app/` contengono `mixed`; 1 `property_exists()` solo in commento (`UserContextData` — corretto, usa `getAttribute`); 1 `@phpstan-ignore`; 2 TODO/FIXME.
4. **[i18n] Gap EN strutturale**: 122 file `en` vs 264 `it`; intere aree (oauth_*, authentication_log*, device*, base_profile*) hanno varianti naming multiple (`authentication_log.php` vs `authentication_logs.php`, `base_profile` vs `base_profiles`) → consolidamento chiavi necessario prima di colmare EN.
5. **[Test] Copertura ampia ma da mappare**: ~1241 test Pest su 233 file; Presence di `tests/Support/helpers*.php` multipli (helpers, helpers-core, team-management-*) — verificare overlap; 1 file con `expect(true)` (assert banale).
6. **[Docs] Volume eccessivo**: 117 file in `docs/bmad/` con duplicati (`.mdc` e `.md` gemelli, es. `activitylog.mdc`/`activitylog-moderation-best-practices.mdc` vs `.md`), `coverage.md`/`coverage-clean.md`/`coverage-full.md` triplicati — consolidamento consigliato.

### Rischi

- Alto per le directory orfane: se qualche loader (es. `loadMigrationsFrom` custom o autoload files) le includesse, le migrazioni duplicate `create_users_table` romperebbero l'installazione; verificare subito.
- Medio per i18n: l'asimmetria it/en su un modulo auth-critical produce fallback o stringhe non tradotte in flussi login/oauth.

### Next steps (priorizzati)

1. **Audit e rimozione** di `User/Database/`, `User/Application/` root e `User/Listeners/` root (confermare nessun riferimento in `composer.json`, `module.json`, provider).
2. Consolidare le chiavi lang duplicate (`authentication_log(s)`, `base_profile(s)`, `auth_pages`/`auth`) e generare il set `en` mancante.
3. Sostituire `->placeholder('—')` di tabella con componente/colonna condivisa; avviare rimozione `->label()/->helperText()`.
4. Dedup documentazione bmad (`.mdc` vs `.md`, coverage triplicato) in un'unica passata.


