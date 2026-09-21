---
title: "Epics — SuperAdmin widget"
type: epics
module: User
status: approved
track: quick-flow
related:
  - ./prd.md
  - ./architecture.md
  - ./tech-spec.md
  - ../stories/9.1.super-admin-widget.story.md
  - ../stories/9.2.admin-panel-provider-hook.story.md
  - ../stories/9.3.remove-livewire-superadmin.story.md
  - ../stories/9.4.super-admin-widget-tests.story.md
---

# Epics — SuperAdmin Livewire → Filament widget

**Track:** Quick Flow  
**Sources:** [prd.md](./prd.md), [architecture.md](./architecture.md), [ux-design.md](./ux-design.md), [tech-spec.md](./tech-spec.md)

---

## Epic 9: SuperAdmin nel user menu come widget

**Goal:** l’operatore continua a invertire `super-admin` / `negate-super-admin` dal menu Filament; l’UI è un `XotBaseWidget` montato dal provider, non un Livewire HTTP.

**In scope (cited):**
- FR-001 visibilità icona [Source: prd.md#fr-001]
- FR-002 toggle + redirect 303 [Source: prd.md#fr-002]
- FR-003 hook solo in AdminPanelProvider [Source: prd.md#fr-003]
- FR-004 ritiro Livewire [Source: prd.md#fr-004]
- FR-005 lang [Source: prd.md#fr-005]
- FR-006 non in dashboard [Source: prd.md#fr-006]
- NFR-SEC-001 solo profilo corrente [Source: prd.md#nfr-sec-001]

**Architecture:** widget + hook; trait invariato [Source: architecture.md#adr-001] [Source: architecture.md#adr-002]

**Out of scope:** `team.change`, Socialite, Gdpr, Notify, seed ruoli.

**Stories (ordered):**

| ID | Slug | Intent | Status |
|----|------|--------|--------|
| 9.1 | super-admin-widget | Classe widget, vista, lang; provider intatto | ready-for-dev |
| 9.2 | admin-panel-provider-hook | Switch hook SuperAdmin al FQCN widget | ready-for-dev |
| 9.3 | remove-livewire-superadmin | Eliminare Livewire HTTP e vista vecchia | ready-for-dev |
| 9.4 | super-admin-widget-tests | Pest visibilità + toggle + no dashboard | ready-for-dev |

**Cross-epic:** nessuno. Sequenza interna 9.1 → 9.2 → 9.3; 9.4 dopo 9.2 (può partire in parallelo a 9.3 sui soli file test).

---

## Delivery tracking (count)

- Total: 4
- Done: 0
- Remaining: 4

## Note

Implementazione **non** in questa sessione. Handoff: story `ready-for-dev`.

## GitHub (tracciamento)

`gh` non autenticato. Non inventare numeri.

```bash
gh -R laraxot/module_user_fila5 issue create --title "Epic 9: SuperAdmin Livewire → XotBaseWidget nel user menu" --body "Vedi laravel/Modules/User/docs/bmad/epics.md e stories 9.1–9.4."
gh -R laraxot/module_user_fila5 api repos/laraxot/module_user_fila5/discussions --method POST --input - <<'EOF'
{"title":"Epic 9 SuperAdmin widget vs Livewire HTTP","body":"Discussione architetturale: hook USER_MENU_BEFORE + isDiscovered false. Canon: docs/bmad/architecture.md"}
EOF
```
