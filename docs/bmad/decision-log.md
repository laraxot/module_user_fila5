---
title: "Decision log — SuperAdmin widget"
type: decision-log
module: User
status: active
related:
  - ./project-context.md
  - ./brainstorming.md
  - ./architecture.md
  - ./epics.md
---

# Decision log — SuperAdmin Livewire → Filament widget

## [2026-09-21] Track Quick Flow

**Decision:** questo slice è Quick Flow (4 story, un epic). Si producono comunque brief, PRD, architecture, UX, tech-spec perché l’utente ha chiesto il pacchetto BMAD completo, restando su scope piccolo.

**Rationale:** requisiti chiari, un modulo, nessun DB nuovo. Un PRD Enterprise sarebbe rumore.

## [2026-09-21] Widget via render hook, non dashboard

**Decision:** il widget si monta solo su `PanelsRenderHook::USER_MENU_BEFORE` (oggi `panels::user-menu.before`). Non entra in `$panel->widgets()` / griglia dashboard.

**Rationale:** è un controllo di identità nel chrome del panel, non un KPI. `discoverWidgets` su `Modules/User/app/Filament/Widgets` lo troverebbe: `static $isDiscovered = false`.

## [2026-09-21] XotBaseWidget, non XotBaseSchemaWidget

**Decision:** niente form. Un click sull’icona chiama `toggleSuperAdmin()` e redirect 303 sulla URL corrente.

**Rationale:** oggi il Livewire non ha schema. `XotBaseSchemaWidget` è per form/auth. DRY: non inventare un form per un toggle.

## [2026-09-21] Business logic resta sul profilo

**Decision:** nessuna Action nuova. Si continua a chiamare `XotData::make()->getProfileModel()->toggleSuperAdmin()`.

**Rationale:** il trait `IsProfileTrait` è già la SSoT (scambio `super-admin` ↔ `negate-super-admin`). Duplicare in una Action sarebbe teatro.

## [2026-09-21] AdminPanelProvider è l’unico punto di montaggio

**Decision:** la story 9.2 tocca **solo** `AdminPanelProvider.php`. Si sostituisce `Blade::render("@livewire('profile.super-admin')")` con il FQCN del widget. L’hook `team.change` non si tocca.

**Rationale:** due hook distinti sullo stesso `USER_MENU_BEFORE`. Mescolarli in una story crea conflitti di lock.

## [2026-09-21] GitHub issue/discussion

**Decision:** `gh` non autenticato su questa macchina. Nelle story: `DA CREARE` + comandi `--repo laraxot/module_user_fila5`. Nessun numero inventato.

**Rationale:** [016-github-issue-discussion-in-every-story.md](../../../../../docs/wiki/rules/016-github-issue-discussion-in-every-story.md).
