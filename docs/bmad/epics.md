---
title: "Epics — SuperAdmin widget + campagna widget-only"
type: epics
module: User
status: approved
track: campaign
related:
  - ./prd.md
  - ./livewire-widget-prd.md
  - ./livewire-inventory.md
  - ./architecture.md
  - ./tech-spec.md
  - ../stories/9.1.super-admin-widget.story.md
  - ../stories/9.2.admin-panel-provider-hook.story.md
  - ../stories/9.3.remove-livewire-superadmin.story.md
  - ../stories/9.4.super-admin-widget-tests.story.md
  - ../stories/10.1.team-change-widget.story.md
  - ../stories/10.2.socialite-buttons-widget.story.md
  - ../stories/10.3.retire-auth-livewire-twins.story.md
  - ../stories/10.4.retire-gdpr-profile-livewire.story.md
---

# Epics — Http/Livewire → Filament widget

**Track:** campagna (Epic 9 Quick Flow + Epic 10).  
**Sources:** [livewire-inventory.md](./livewire-inventory.md), [livewire-widget-prd.md](./livewire-widget-prd.md), [prd.md](./prd.md)

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

**Cross-epic:** Epic 10 aspetta 9.2 sul file `AdminPanelProvider`. Sequenza interna 9.1 → 9.2 → 9.3; 9.4 dopo 9.2 (può partire in parallelo a 9.3 sui soli file test).

---

## Epic 10: chiudere `Http/Livewire` (13 classi restanti)

**Goal:** dopo SuperAdmin, il modulo identità non monta più alias Livewire HTTP nel panel e non tiene gemelli auth / leftover Gdpr.

**In scope (cited):**
- FR-C001 chrome FQCN [Source: livewire-widget-prd.md#fr-c001]
- FR-C002 team widget [Source: livewire-widget-prd.md#fr-c002]
- FR-C003 SocialLoginWidget esistente [Source: livewire-widget-prd.md#fr-c003]
- FR-C004–C005 ritiro auth + ViewCopyAction [Source: livewire-widget-prd.md#fr-c004]
- FR-C006 DeleteAccount Filament [Source: livewire-widget-prd.md#fr-c006]
- FR-C007 Privacy/Terms → Gdpr [Source: livewire-widget-prd.md#fr-c007]

**Architecture:** ADR-C001…C006 [Source: livewire-widget-architecture.md]

**Out of scope:** Notify vendor (hook attivo nel modulo Notify, non in User), Volt FO, implementazione in questa sessione docs, Epic 11 (non esiste: team = 10.1).

**Stories (ordered):**

| ID | Slug | Intent | Status |
|----|------|--------|--------|
| 10.1 | team-change-widget | TeamChangeWidget + hook team + ritiro HTTP team | ready-for-dev |
| 10.2 | socialite-buttons-widget | Hook login-after su SocialLoginWidget, delete Buttons | ready-for-dev |
| 10.3 | retire-auth-livewire-twins | Delete 8 auth HTTP; SSoT logout/reset | ready-for-dev |
| 10.4 | retire-gdpr-profile-livewire | DeleteAccount widget; Privacy/Terms fuori User | ready-for-dev |

**Cross-epic:** 10.1 blocked-by 9.2 (stesso provider). 10.2 blocked-by 10.1. 10.3 parallelo sui file auth. 10.4 chiude la cartella HTTP.

---

## Delivery tracking (count)

- Total: 8 (4 Epic 9 + 4 Epic 10)
- Done: 0
- Remaining: 8

## Note

Implementazione **non** in questa sessione. Handoff: story `ready-for-dev`.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [issue #100](https://github.com/laraxot/module_user_fila5/issues/100) | Campagna padre |
| [discussion #101](https://github.com/laraxot/module_user_fila5/discussions/101) | Perché solo widget |
