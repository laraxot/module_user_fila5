---
title: "User — BMAD Method Integration"
description: "BMAD workflow documentation per il modulo User"
module: "User"
alias: "user"
documentation_date: "2026-05-27"
bmad_version: "6.2.0"
bmad_track: "core-identity"
---

# User — BMAD Method Integration

<<<<<<< .merge_file_zx0hEV
<<<<<<< HEAD
<<<<<<< .merge_file_rOLFEH
=======
<<<<<<< .merge_file_tBfhVW
=======
<<<<<<< .merge_file_7XZKq3
=======
=======
>>>>>>> .merge_file_o2U3de
## Campagna vigente — solo Filament widget

**Chrome convertito (2026-09-21): i 3 hook del provider sono FQCN; restano Cluster C (10.4) e residui.** GitHub: [issue #100](https://github.com/laraxot/module_user_fila5/issues/100) · [discussion #101](https://github.com/laraxot/module_user_fila5/discussions/101).

Inventario + perché/urgenza (canone dopo riconciliazione agenti): [livewire-inventory.md](./livewire-inventory.md).
Mappa hook provider: [livewire-widget-admin-panel-provider.md](./livewire-widget-admin-panel-provider.md).

Stub/puntatori (non SSoT): `livewire-widget-{conversion,decision-log,epics}.md`, `advantages-filament-widgets-over-livewire.md`, `livewire-widget-consolidation-*.md`, story `10.1.socialite-buttons-widget`, `11.1.team-change-widget`.

### Pacchetto campagna (14 Livewire)

| Artefatto | Path |
|-----------|------|
| Costituzione campagna | [livewire-widget-project-context.md](./livewire-widget-project-context.md) |
| Brief campagna | [livewire-widget-product-brief.md](./livewire-widget-product-brief.md) |
| PRD campagna | [livewire-widget-prd.md](./livewire-widget-prd.md) |
| Architecture campagna | [livewire-widget-architecture.md](./livewire-widget-architecture.md) |
| Tech spec campagna | [livewire-widget-tech-spec.md](./livewire-widget-tech-spec.md) |
| UX campagna | [livewire-widget-ux.md](./livewire-widget-ux.md) |
| Brainstorm campagna | [livewire-widget-brainstorming.md](./livewire-widget-brainstorming.md) |
| Inventario | [livewire-inventory.md](./livewire-inventory.md) |
| Mappa hook provider | [livewire-widget-admin-panel-provider.md](./livewire-widget-admin-panel-provider.md) |
| Vantaggi widget-only (modulo) | [advantages-filament-only.md](./advantages-filament-only.md) |
| Decisioni | [decision-log.md](./decision-log.md) |
| Mappa epic | [epics.md](./epics.md) |

### Epic 9 — SuperAdmin (sottoinsieme, Quick Flow)

| Artefatto | Path |
|-----------|------|
| Costituzione slice | [project-context.md](./project-context.md) |
| Brief / PRD / arch / UX / spec | [product-brief.md](./product-brief.md) · [prd.md](./prd.md) · [architecture.md](./architecture.md) · [ux-design.md](./ux-design.md) · [tech-spec.md](./tech-spec.md) |
| 9.1–9.4 | [9.1](../stories/9.1.super-admin-widget.story.md) · [9.2](../stories/9.2.admin-panel-provider-hook.story.md) · [9.3](../stories/9.3.remove-livewire-superadmin.story.md) · [9.4](../stories/9.4.super-admin-widget-tests.story.md) |

Handoff SuperAdmin: 9.1 → 9.2 → 9.3; 9.4 dopo 9.2.

### Epic 10 — resto inventario

| Story | Path |
|-------|------|
| 10.1 team | [10.1.team-change-widget.story.md](../stories/10.1.team-change-widget.story.md) |
| 10.2 social | [10.2.socialite-buttons-widget.story.md](../stories/10.2.socialite-buttons-widget.story.md) |
| 10.3 auth HTTP | [10.3.retire-auth-livewire-twins.story.md](../stories/10.3.retire-auth-livewire-twins.story.md) |
| 10.4 profilo/Gdpr | [10.4.retire-gdpr-profile-livewire.story.md](../stories/10.4.retire-gdpr-profile-livewire.story.md) |

Handoff provider: 9.2 → 10.1 → 10.2. 10.3 può parallellizzare sui file auth.

## Campagna aggiuntiva — module-excellence (Epic 12-14)

**Scope whole-module (non solo widget)**: documentazione, qualità codice/test,
completezza dominio (permessi, team/tenant, OAuth). Additiva alla campagna
sopra — nessuna story qui tocca `AdminPanelProvider` o i widget Epic 9/10.
Aperta 2026-09-22, sola documentazione (nessuna implementazione).

| Artefatto | Path |
|-----------|------|
| Brief campagna | [module-excellence-product-brief.md](./module-excellence-product-brief.md) |
| PRD campagna | [module-excellence-prd.md](./module-excellence-prd.md) |
| Architecture campagna | [module-excellence-architecture.md](./module-excellence-architecture.md) |
| Brainstorm campagna (5 fork paralleli) | [module-excellence-brainstorming.md](./module-excellence-brainstorming.md) |
| Epic 12 Docs hygiene, 13 Code quality/test, 14 Completezza dominio | [epics.md](./epics.md) (sezione in coda) |
| Decisioni | [decision-log.md](./decision-log.md) (entry 2026-09-22) |

| Epic | Story | Path |
|------|-------|------|
| 12 Docs hygiene | 12.1–12.7 | [docs/stories/](../stories/) prefisso `12.` |
| 13 Code quality/test | 13.1–13.9 | [docs/stories/](../stories/) prefisso `13.` |
| 14 Completezza dominio | 14.1–14.8 | [docs/stories/](../stories/) prefisso `14.` |

## Campagna gemella — perfection (Epic 11, 15-19)

**Stesso scope whole-module**, prodotta in parallelo (fork/sessione
concorrente non coordinata con la campagna sopra — vedi
[decision-log.md](./decision-log.md) entry "Riconciliazione numerazione con
campagna module-excellence" e
[perfection-decision-log.md](./perfection-decision-log.md) sul lato
`perfection`). Numerazione riconciliata: Epic 12-14 restano di
`module-excellence` (sopra); `perfection` usa Epic 11 (sicurezza, priorità
massima, unica con story file individuali già scritte) e 15-19 (qualità
codice/architettura, performance, test, schema/migrazioni, bonifica docs).

| Artefatto | Path |
|-----------|------|
| Brainstorm/PRD/architecture/decision-log | prefisso `perfection-*` in questa cartella |
| Epic 11, 15-19 | [perfection-epics.md](./perfection-epics.md) |
| Story Epic 11 (complete) | [docs/stories/](../stories/) prefisso `11.` (dash-separated) |


<<<<<<< .merge_file_zx0hEV
>>>>>>> .merge_file_43na22
>>>>>>> .merge_file_5hmd18
>>>>>>> .merge_file_Ew1px6
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_o2U3de
## Scopo BMAD per User

User è il **modulo identità** che garantisce autenticazione, autorizzazione e multi-tenancy. In BMAD, questo modulo rappresenta il **core della sicurezza** su cui tutti gli altri moduli fanno affidamento.

## Religione BMAD per User

User segue i principi BMAD di:

1. **`project-context.md`** è costituzione — non sviluppare senza comprenderlo
2. **Separazione database** è politica — connessione `user` per identità, connessione applicativa per business
3. **Actions, non Services** — tutta la logica utente passa per Actions
4. **PHPStan Level 10** — sicurezza tipografica non negoziabile
5. **Ruoli per team** — permessi contestuali al team
6. **Token scade, log resta** — persistente identità

## Workflow BMAD Consigliati per User

### Phase 1: Analysis (Essenziale per User)
```bash
bmad-domain-research      # Studio dominio identità, autenticazione
bmad-technical-research   # Valutazione architettura multi-tenant
```

### Phase 2: Planning
```bash
bmad-create-prd           # PRD modulo User: provider auth, provider social
bmad-create-architecture  # Architettura database separate (user vs app)
```

### Phase 3: Solutioning
```bash
bmad-create-epics-and-stories  # Epic: User management, OAuth2, SSO
bmad-check-implementation-readiness  # Quality gate prima dello sprint
```

### Phase 4: Implementation
```bash
bmad-sprint-planning      # Sprint iniziale per feature utente
bmad-create-story         # Story: login, registro, profilo
bmad-dev-story            # Implementazione
bmad-code-review          # Review con focus su sicurezza
```

## Quick Flow per User

Per task rapidi su User:
```bash
bmad-quick-dev "Aggiungi social provider X"
bmad-quick-spec "Specifica per OTP 2FA"
```

## Agenti Specializzati per User

| Agente | Ruolo | Quando Usare |
|--------|-------|--------------|
| Mary 📊 | Analyst | Ricerca provider auth, analisi dominio |
| John 📋 | PM | PRD auth, roadmap social |
| Winston 🏗️ | Architect | Architettura database separati, multi-tenant |
| Amelia 💻 | Developer | Implementazione login, OTP, social |
| Quinn 🧪 | QA | Test sicurezza, impersonation, OAuth2 |

## Configurazione

```bash
# Verifica config User
php artisan config:show user

# Test provider
php artisan user:passport:install

# Esegui seeding
php artisan db:seed --class=RoleSeeder

# Verifica PHPStan
./vendor/bin/phpstan analyse Modules/User --memory-limit=-1
```

## Struttura Output BMAD

```
_bmad-output/
├── planning-artifacts/
│   ├── PRD.md              # Requisiti modulo User
│   ├── architecture.md     # Architettura DB separata
│   └── epics/
│       ├── epic-001-user-auth.md
│       ├── epic-002-oauth2.md
│       └── epic-003-ss.md
└── implementation-artifacts/
    ├── sprint-status.yaml
    └── story-001-login-implementation.md
```

## Vedi Anche

- [quick-reference](quick-reference.md)
- [setup-guide](setup-guide.md)
- [BMAD Workflow Catalog](../bmad-workflow-catalog.md)
<<<<<<< .merge_file_zx0hEV
<<<<<<< HEAD
<<<<<<< .merge_file_rOLFEH

---

*User · BMAD Method · data 2026-05-27*
=======
<<<<<<< .merge_file_tBfhVW

---

*User · BMAD Method · data 2026-05-27*
=======
<<<<<<< .merge_file_7XZKq3

---

*User · BMAD Method · data 2026-05-27*
=======
=======
>>>>>>> .merge_file_o2U3de
- [livewire-to-filament-widget-migration.md](../livewire-to-filament-widget-migration.md)
- [filament_errors.md](../filament_errors.md)

---

*User · BMAD Method · data 2026-05-27*
<<<<<<< .merge_file_zx0hEV
>>>>>>> .merge_file_43na22
>>>>>>> .merge_file_5hmd18
>>>>>>> .merge_file_Ew1px6
=======

---

*User · BMAD Method · data 2026-05-27*
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_o2U3de
