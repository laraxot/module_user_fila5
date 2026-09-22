<<<<<<< HEAD
# User Module PRD (Product Requirements Document)

**Status**: ✅ Finalized
**Version**: 2.5.0
**Last Update**: 2026-09-21
**Method**: BMAD PRD Creation

## 🎯 Product Vision

The User module is the **foundational identity layer** for PTVX, providing authentication, authorization, user management, team collaboration, and multi-tenancy. It must be **secure by default**, **performant**, **developer-friendly**, and **maintainable** with minimal technical debt.

## 📋 Requirements

### Functional Requirements

#### FR-1: Authentication System
- **FR-1.1**: Multi-factor authentication (credentials, OAuth, SSO, 2FA)
- **FR-1.2**: Secure password handling (bcrypt, expiration, reset flows)
- **FR-1.3**: Session management (creation, validation, expiration, device tracking)
- **FR-1.4**: Token management (Sanctum API tokens, Passport OAuth2 tokens)

#### FR-2: Authorization System
- **FR-2.1**: Role-Based Access Control (RBAC) via Spatie Permission
- **FR-2.2**: Team-based permissions with hierarchical inheritance
- **FR-2.3**: Tenant-based isolation with row-level security
- **FR-2.4**: Policy-based authorization for fine-grained control

#### FR-3: User Management
- **FR-3.1**: Complete CRUD for users with profile management
- **FR-3.2**: User lifecycle (create, activate, deactivate, delete, restore)
- **FR-3.3**: Profile management with schemaless attributes
- **FR-3.4**: Avatar and media management

#### FR-4: Team Collaboration
- **FR-4.1**: Team creation, ownership, and management
- **FR-4.2**: Member invitations with role assignment
- **FR-4.3**: Team hierarchy with permission inheritance
- **FR-4.4**: Current team switching

#### FR-5: Multi-Tenancy
- **FR-5.1**: Tenant creation and configuration
- **FR-5.2**: User-tenant associations with roles
- **FR-5.3**: Tenant isolation modes (none, soft, hard)
- **FR-5.4**: Tenant switching for multi-tenant users

#### FR-6: Admin Interface (Filament)
- **FR-6.1**: Comprehensive user administration
- **FR-6.2**: Role and permission management
- **FR-6.3**: Team and tenant administration
- **FR-6.4**: Security monitoring and audit logs

#### FR-7: Social & SSO Integration
- **FR-7.1**: Social login (Google, Facebook, GitHub, Microsoft)
- **FR-7.2**: SSO provider integration
- **FR-7.3**: Account linking and unlinking
- **FR-7.4**: Domain-based access control

### Non-Functional Requirements

#### NFR-1: Security
- **NFR-1.1**: Zero critical vulnerabilities
- **NFR-1.2**: OWASP Top 10 compliance
- **NFR-1.3**: Complete audit trail for all auth events
- **NFR-1.4**: Rate limiting and abuse prevention

#### NFR-2: Performance
- **NFR-2.1**: <100ms average authentication response
- **NFR-2.2**: <200ms user list rendering (1000+ users)
- **NFR-2.3**: <500ms tenant switching
- **NFR-2.4**: Efficient database queries (N+1 prevention)

#### NFR-3: Maintainability
- **NFR-3.1**: PHPStan Level 10 compliance
- **NFR-3.2**: >90% test coverage
- **NFR-3.3**: Comprehensive documentation (kebab-case)
- **NFR-3.4**: Zero PHPMD violations

#### NFR-4: Scalability
- **NFR-4.1**: Support 100,000+ users
- **NFR-4.2**: Support 1,000+ teams
- **NFR-4.3**: Support 100+ tenants
- **NFR-4.4**: Horizontal scaling readiness

#### NFR-5: Developer Experience
- **NFR-5.1**: Clear API contracts with type safety
- **NFR-5.2**: Comprehensive IDE support (PHPDoc)
- **NFR-5.3**: Easy extension points (traits, actions, events)
- **NFR-5.4**: Consistent patterns across module

## 👥 User Personas

| Persona | Needs | Priority |
|---------|-------|----------|
| **System Admin** | Full user/role/tenant management, security audit | P0 |
| **Tenant Admin** | Tenant user management, role assignment | P0 |
| **Team Manager** | Team member management, permissions | P1 |
| **End User** | Profile, password, 2FA, device management | P0 |
| **Security Officer** | Authentication logs, anomaly detection | P1 |
| **Developer** | Clean APIs, extensibility, documentation | P1 |

## 📊 Success Metrics

| Metric | Target | Measurement |
|--------|--------|-------------|
| Authentication Success Rate | 99.9% | Login analytics |
| Average Login Time | <500ms | Performance monitoring |
| Security Incidents | 0/year | Security audit |
| Test Coverage | 95% | Pest reports |
| PHPStan Errors | 0 | CI pipeline |
| Documentation Quality | A grade | Doc quality audit |
| Developer Onboarding Time | <2 hours | Team survey |

## 🚫 Out of Scope
- User-facing public registration flows (handled by application modules)
- Advanced workflow/BPM integration
- Third-party identity provider management UI
- Complex organizational hierarchies beyond teams

## 🔄 Dependencies

### Internal Dependencies
- **Xot Module**: BaseModel, BaseResource, core traits
- **Tenant Module**: Enhanced tenancy features
- **Activity Module**: Audit logging
- **Lang Module**: Translation management

### External Dependencies
- **Laravel 13**: Framework foundation
- **Filament 5**: Admin UI
- **Spatie Permission**: RBAC
- **Laravel Passport**: OAuth2
- **Socialiteproviders**: OAuth providers

## 📅 Roadmap Alignment

| Quarter | Focus | Deliverables |
|---------|-------|--------------|
| Q3 2026 | Documentation & Quality | Clean docs, PHPMD/PHPInsights working, 95% coverage |
| Q4 2026 | Security & Performance | Advanced auth analytics, performance tuning |
| Q1 2027 | Developer Experience | SDKs, improved APIs, better onboarding |

---

*PRD generated via BMAD methodology*  
*Next: Epics and Stories creation*
=======
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
>>>>>>> laraxot/dev
