---
title: "Architecture — SuperAdmin user-menu widget"
type: architecture
module: User
status: approved
track: quick-flow
source_prd: ./prd.md
related:
  - ./tech-spec.md
  - ./decision-log.md
  - ./ux-design.md
---

# Architecture: SuperAdmin widget

**Track:** Quick Flow  
**PRD:** [prd.md](./prd.md)

## 1. Overview

Slice UI: spostare il toggle SuperAdmin dal namespace `Http\Livewire` al namespace `Filament\Widgets`, senza cambiare persistenza ruoli.

**In:** widget, vista, hook provider, ritiro Livewire.  
**Out:** RBAC seed, team switcher, auth FO.

**Driver:** NFR-SEC-001 (solo profilo corrente), FR-003 (un montaggio).

## 2. Pattern

Modular monolith Laraxot. UI admin = Filament. Widget = Livewire specializzato.

**Scartato:** MenuItem Filament (no toggle); badge statico (no FR-002).

## 3. ADR

### ADR-001 — Hook, non dashboard

`discoverWidgets` include ogni classe sotto `Filament/Widgets`. Il SuperAdmin non è un widget di pagina: `$isDiscovered = false` + montaggio esplicito su `USER_MENU_BEFORE`.

### ADR-002 — Nessuna Action nuova

`IsProfileTrait::toggleSuperAdmin()` resta SSoT. Il widget è adattatore UI.

### ADR-003 — Vista modulo, non pub_theme

Chrome panel ≠ login tema. Path: `user::filament.widgets.profile.super-admin`.

### ADR-004 — Provider tocca un blocco

`AdminPanelProvider` ha più hook. Solo il blocco SuperAdmin cambia FQCN. `team.change` invariato.

## 4. Componenti

```
AdminPanelProvider.panel()
    └─ FilamentView::registerRenderHook(USER_MENU_BEFORE)
           └─ @livewire(SuperAdminWidget::class)
                  ├─ XotData::getProfileModel()
                  ├─ ProfileContract::isSuperAdmin / isNegateSuperAdmin
                  └─ ProfileContract::toggleSuperAdmin()  → Spatie roles
```

| Pezzo | Path | Ruolo |
|-------|------|--------|
| Provider | `app/Providers/Filament/AdminPanelProvider.php` | montaggio |
| Widget | `app/Filament/Widgets/Profile/SuperAdminWidget.php` | UI + click |
| Vista | `resources/views/filament/widgets/profile/super-admin.blade.php` | icon-button |
| Trait | `app/Models/Traits/IsProfileTrait.php` | **non modificare** |
| Livewire old | `app/Http/Livewire/Profile/SuperAdmin.php` | da eliminare in 9.3 |

## 5. Data model

Nessuna tabella nuova. Ruoli esistenti `roles` / `model_has_role` (nome singolare del progetto).

## 6. API

Nessuna. Solo Livewire method `toggleSuperAdmin` sul widget.

## 7. FR coverage

| FR | Dove |
|----|------|
| FR-001 | vista + getViewData |
| FR-002 | metodo widget → trait |
| FR-003 | AdminPanelProvider |
| FR-004 | delete Livewire |
| FR-005 | lang |
| FR-006 | `$isDiscovered = false` |

## 8. Stack

Laravel 12/13 panel, Filament 5, Livewire 4, Spatie permission, XotBaseWidget.

## 9. Trade-off

Widget scoperto vs hook: discovery è comoda per i KPI, dannosa qui. Costo: una proprietà statica. Beneficio: dashboard pulita.

## 10. Deploy

Nessuna migrazione. `view:clear` dopo lo switch. Nessun env nuovo.

## 11. Future

Stesso pattern per `team.change` (altro epic). Non accoppiarlo a questo.
