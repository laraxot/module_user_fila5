---
title: "PRD — SuperAdmin Filament widget"
type: prd
module: User
status: approved
track: quick-flow
version: "1.0"
related:
  - ./product-brief.md
  - ./tech-spec.md
  - ./architecture.md
  - ./ux-design.md
  - ./epics.md
  - ./livewire-widget-prd.md
  - ./livewire-inventory.md
---

# PRD: SuperAdmin nel user menu Filament

**Track:** Quick Flow  
**Source of truth per il *cosa* e il *perché*.** Il *come* è in [architecture.md](./architecture.md) e [tech-spec.md](./tech-spec.md).

## Executive summary

**Problema:** il toggle SuperAdmin è un Livewire HTTP agganciato al chrome Filament.  
**Soluzione:** stesso toggle come `XotBaseWidget`, montato da `AdminPanelProvider` sullo stesso hook.  
**Valore:** panel che non dipende da alias Livewire `profile.super-admin`; UI allineata al resto dei widget User.  
**Esito:** comportamento identico, codice nel namespace Filament.

## Current → desired

- **Current:** `Modules\User\Http\Livewire\Profile\SuperAdmin` + hook `Blade::render("@livewire('profile.super-admin')")`.
- **Desired:** `Modules\User\Filament\Widgets\Profile\SuperAdminWidget` + hook sul FQCN del widget; Livewire HTTP rimosso.

## Stakeholders

| Stakeholder | Interesse |
|-------------|-----------|
| Operatore panel | Toggle visibile e funzionante |
| Maintainer User | Un solo stile UI Filament, niente Jet |
| Altri moduli | Nessun cambio di API profilo |

## Goals

1. Stesso contratto di ruolo (`super-admin` ↔ `negate-super-admin`) senza toccare il trait.
2. Montaggio esplicito nel provider, non discovery dashboard.
3. Testi da lang `user::`, niente stringhe in Blade.

## Functional requirements

### FR-001: Toggle visibile — [MUST]

**Description:** Chi ha `super-admin` o `negate-super-admin` vede l’emblema hero nel user menu (prima del menu account).  
**AC:**
- Super-admin: icona `user-super-admin` (scudo outline + fulmine animato), tooltip dalla lang.
- Negate-super-admin: icona `user-negate-super-admin` (scudo + barra, fulmine spento), tooltip dalla lang. Glifo distinto.
- Nessuno dei due ruoli: nessun controllo (menu invariato).  
**Epic:** 9

### FR-002: Un click inverte il ruolo — [MUST]

**Description:** Il click chiama la logica esistente sul profilo e ricarica la pagina corrente.  
**AC:**
- Super-admin → `negate-super-admin` (e rimozione di `super-admin`).
- Inverso simmetrico.
- Redirect 303 sulla URL attuale (come oggi).
- Nessun nuovo endpoint HTTP.  
**Epic:** 9

### FR-003: Hook solo nel provider — [MUST]

**Description:** `AdminPanelProvider` è l’unico montaggio.  
**AC:**
- Lo hook `user-menu.before` del SuperAdmin punta al widget, non a `profile.super-admin`.
- Lo hook `team.change` resta identico.
- Il widget non compare nella dashboard.  
**Epic:** 9

### FR-004: Livewire HTTP ritirato — [MUST]

**Description:** Dopo lo switch, `Http/Livewire/Profile/SuperAdmin` e la vista `user::livewire.profile.super-admin` non restano come seconda UI.  
**AC:**
- Nessun `livewire('profile.super-admin')` nel modulo.
- Vista Livewire rimossa o ridotta a un commento di puntatore (preferibile rimozione).  
**Epic:** 9

### FR-005: Lang — [MUST]

**Description:** Tooltip e (se servono) label da `Modules/User/lang/{locale}/`.  
**AC:** nessuna stringa utente hardcoded in Blade/PHP.  
**Epic:** 9

### FR-006: Dashboard pulita — [SHOULD]

Il widget non è un KPI: `canView()` della dashboard non lo mostra. Vedi NFR-SEC.

## Non-functional

### NFR-SEC-001

Solo il profilo autenticato corrente. Nessun parametro user-id. `toggleSuperAdmin()` già lancia se manca l’user.

### NFR-PERF-001

Il widget è un icon-button. Nessuna query extra oltre `getProfileModel()` già usata dal panel.

### NFR-A11Y-001

Il controllo resta un `icon-button` Filament con tooltip (sostituisce il title nativo). Non è un form.

## Out of scope

- Convertire `team.change`, Socialite, logout: Epic 10, [livewire-inventory.md](./livewire-inventory.md).
- Cambiare regole Spatie o nomi ruolo.
- Impersonation.
- Resource/pagina “diventa super-admin”.

## Success

- [ ] FR-001…005 accettati
- [ ] Story 9.1–9.4 `done`
- [ ] `/admin` non 500 sul user menu
