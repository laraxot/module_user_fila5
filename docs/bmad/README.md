---
title: "User — BMAD Documentation Index"
type: note
tags: [bmad, user, identity, index]
created: 2026-09-26
updated: 2026-09-28
qmd: "User bmad indice documentazione identita auth passport socialite team tenant"
module: User
related:
  - ./architecture.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./quick-reference.md
  - ./setup-guide.md
  - ../../../Xot/docs/bmad-method.md
---

# User — BMAD Method Integration

<<<<<<< .merge_file_H9JAK5
<<<<<<< .merge_file_BZEUvl
> **SUMMARY**: indice dei documenti BMAD del modulo User (identità: autenticazione, ruoli Spatie, team, tenant, Passport OAuth2, Socialite/SSO, widget Filament), con l'inventario reale di `app/` (679 file PHP) e `tests/` (187 file PHP) verificato sul repository.
=======
=======
>>>>>>> .merge_file_l4u4Kz
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

<<<<<<< .merge_file_H9JAK5
>>>>>>> .merge_file_ZoAy3E
=======
>>>>>>> .merge_file_l4u4Kz

## Scopo BMAD per User

`module.json` dichiara: *"Gestione utenti, autenticazione, autorizzazioni e ruoli del sistema"* (alias `user`, keyword `auth`, `users`, `roles`, `permissions`, `authentication`). È il modulo identità da cui dipendono Activity, Notify, Tenant, Lang, Performance e UI.

## Indice documenti BMAD

### Canonici

- [architecture.md](architecture.md) — mappa reale del modulo e indice degli shard
- [brainstorming.md](brainstorming.md) — decisioni e indice degli shard
- [epics/module-roadmap.md](epics/module-roadmap.md) — roadmap epic A–D
- [epics/epic-1-identity-core.md](epics/epic-1-identity-core.md) — Epic 1: superficie pubblica, social auth, Passport
- [quick-reference.md](quick-reference.md) — comandi rapidi del workflow
- [setup-guide.md](setup-guide.md) — setup e verifica minima

### Planning

- [product-brief.md](product-brief.md) · [prd.md](prd.md) · [project-context.md](project-context.md) · [tech-spec.md](tech-spec.md) · [ux-design.md](ux-design.md) · [decision-log.md](decision-log.md)

### Shard

- [architecture/module-boundary.md](architecture/module-boundary.md) — confini e gate
- [brainstorming/module-opportunities.md](brainstorming/module-opportunities.md) — domande ad alto valore e rischi
- [deep-recon-user.md](deep-recon-user.md) · [user-architecture-gap-analysis.md](user-architecture-gap-analysis.md)
- [filament-ux-architecture.md](filament-ux-architecture.md) · [filament-ux-brainstorming.md](filament-ux-brainstorming.md)
- [module-excellence-architecture.md](module-excellence-architecture.md) · [module-excellence-brainstorming.md](module-excellence-brainstorming.md) · [module-excellence-prd.md](module-excellence-prd.md) · [module-excellence-product-brief.md](module-excellence-product-brief.md)
- [perfection-architecture.md](perfection-architecture.md) · [perfection-brainstorming.md](perfection-brainstorming.md) · [perfection-decision-log.md](perfection-decision-log.md) · [perfection-epics.md](perfection-epics.md) · [perfection-plan.md](perfection-plan.md) · [perfection-prd.md](perfection-prd.md)
- [advantages-filament-only.md](advantages-filament-only.md) · [advantages-filament-widgets-over-livewire.md](advantages-filament-widgets-over-livewire.md)
- [phpstan-user-contract-fix.md](phpstan-user-contract-fix.md)
- [epics.md](epics.md)

### Conversione widget Livewire → Filament

- [livewire-widget-product-brief.md](livewire-widget-product-brief.md) · [livewire-widget-project-context.md](livewire-widget-project-context.md) · [livewire-widget-prd.md](livewire-widget-prd.md) · [livewire-widget-ux.md](livewire-widget-ux.md) · [livewire-widget-architecture.md](livewire-widget-architecture.md) · [livewire-widget-conversion.md](livewire-widget-conversion.md) · [livewire-widget-decision-log.md](livewire-widget-decision-log.md) · [livewire-widget-epics.md](livewire-widget-epics.md) · [livewire-widget-tech-spec.md](livewire-widget-tech-spec.md) · [livewire-widget-brainstorming.md](livewire-widget-brainstorming.md) · [livewire-inventory.md](livewire-inventory.md)
- Consolidamento: [livewire-widget-consolidation-brief.md](livewire-widget-consolidation-brief.md) · [livewire-widget-consolidation-prd.md](livewire-widget-consolidation-prd.md) · [livewire-widget-consolidation-architecture.md](livewire-widget-consolidation-architecture.md) · [livewire-widget-consolidation-inventory.md](livewire-widget-consolidation-inventory.md) · [livewire-widget-consolidation-benefits.md](livewire-widget-consolidation-benefits.md) · [livewire-widget-consolidation-decision-log.md](livewire-widget-consolidation-decision-log.md) · [livewire-widget-consolidation-epics.md](livewire-widget-consolidation-epics.md) · [livewire-widget-consolidation-sprint-plan.md](livewire-widget-consolidation-sprint-plan.md) · [livewire-widget-consolidation-readiness.md](livewire-widget-consolidation-readiness.md) · [livewire-widget-consolidation-story-superadmin.md](livewire-widget-consolidation-story-superadmin.md)
- SuperAdmin: [tech-spec-superadmin-widget.md](tech-spec-superadmin-widget.md)
- Admin panel: [livewire-widget-admin-panel-provider.md](livewire-widget-admin-panel-provider.md)

### Correzioni e note operative

- [english-login-translation-parity.md](english-login-translation-parity.md) · [guest-login-italian-translation.md](guest-login-italian-translation.md) · [register-mobile-form-width.md](register-mobile-form-width.md)

### Stories

- [stories/module-bmad-audit-20260928.story.md](stories/module-bmad-audit-20260928.story.md)
- [stories/livewire-residual-conversion-cluster-c.story.md](stories/livewire-residual-conversion-cluster-c.story.md)
- [stories/uppercase-application-dir.story.md](stories/uppercase-application-dir.story.md)
- [stories/continuazione-domani.story.md](stories/continuazione-domani.story.md)

## Inventario verificato

| Area | Path | Contenuto |
|------|------|-----------|
| Provider | `app/Providers/` | `UserServiceProvider`, `RouteServiceProvider`, `EventServiceProvider`, `PassportServiceProvider`, `SocialiteServiceProvider`, `Filament/AdminPanelProvider`, `Traits/HasPassportConfiguration` |
| Modelli | `app/Models/` | 50 file `.php` (User, Profile, Team, TeamUser, Tenant, TenantUser, Role, Permission, Device, Extra, Feature, SocialiteUser, SocialProvider, SsoProvider, Oauth*, …) + `Models/Traits/` con 14 trait |
| Resource Filament | `app/Filament/Resources/` | 26 Resource (`UserResource`, `TeamResource`, `RoleResource`, `PermissionResource`, `TenantResource`, `ProfileResource`, `DeviceResource`, `ClientResource`, `Oauth*Resource`, `SocialProviderResource`, `SsoProviderResource`, …) |
| Cluster | `app/Filament/Clusters/` | `Appearance`, `Passport`, `Socialite` |
| Widget | `app/Filament/Widgets/` | `Auth/*` (Login, Register, ResetPassword, …), `Profile/SuperAdminWidget`, `Profile/DeleteAccountWidget`, `Team/TeamChangeWidget`, `RecentLoginsWidget`, `UsersChartWidget`, `NotificationsCenterWidget` |
| Action | `app/Actions/` | 59 Action in `Socialite/` (22), `Passport/` (9), `User/` (4), `Shield/` (8), `Otp/` (5), più `Team/`, `Notification/`, `Activity/`, `Authentication/` |
| Contratti | `app/Contracts/` | 24 contratti attivi (`UserContract`, `TeamContract`, `TenantContract`, `HasTeamsContract`, `TwoFactorAuthenticatableContract`, `HasShieldPermissions`, …) |
| Eventi | `app/Events/` | 27 eventi (Login, Registered, Team*, TwoFactor*, SocialiteUserConnected, …) |
| HTTP | `app/Http/` | controller `Api/`, `Auth/`, `Socialite/`, Livewire `Auth/`, `Profile/`, `Socialite/`, `Team/`, middleware ruolo/tipo/password |
| Console | `app/Console/Commands/` | 16 comandi (AssignRole, AssignTeam, AssignTenant, SuperAdmin, ChangeType, PassportInstall, …) |
| Config | `config/` | `config.php`, `passport.php`, `password.php`, `services.php`, `socialite.php`, `social-providers.php` |
| Traduzioni | `resources/lang/{it,en,es,fr,hi,zh}/` | 16 file per lingua (auth, profile, registration, password-data, tenant, device, client, …) |
| Database | `database/` | `migrations/` (+ `_bak`, `_legacy`), `factories/`, 43 seeder |
| Test | `tests/` | 187 file PHP (Unit, Feature, Fixtures, Support, Traits) |

## Workflow BMAD (fasi)

1. **Analysis** — `project-context.md`, `deep-recon-user.md`, `user-architecture-gap-analysis.md`.
2. **Planning** — `prd.md`, `product-brief.md`, `quick-reference.md`.
3. **Solutioning** — `architecture.md` (mappa reale), `tech-spec.md`, `epics/module-roadmap.md`, `epics/epic-1-identity-core.md`.
4. **Implementation** — ogni story in `stories/`, con lock su `bashscripts/lock/lock.sh` ed esito in `docs/sprint-status.yaml`.

## Vedi Anche

- [Metodo BMAD in Laraxot](../../../Xot/docs/bmad-method.md)
- [quick-reference](quick-reference.md)
- [setup-guide](setup-guide.md)
<<<<<<< .merge_file_BZEUvl
=======
- [BMAD Workflow Catalog](../bmad-workflow-catalog.md)
- [livewire-to-filament-widget-migration.md](../livewire-to-filament-widget-migration.md)
- [filament_errors.md](../filament_errors.md)

---

*User · BMAD Method · data 2026-05-27*
<<<<<<< .merge_file_H9JAK5
>>>>>>> .merge_file_ZoAy3E
=======
>>>>>>> .merge_file_l4u4Kz
