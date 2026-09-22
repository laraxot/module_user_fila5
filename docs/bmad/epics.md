<<<<<<< HEAD
# User Module — Epics for Perfection

**Status**: ✅ Finalized
**Last Update**: 2026-09-21
**Method**: BMAD Epic Creation

## 🎯 Epic Master List

### Epic 1: Documentation Hygiene (P0 - Critical)
**Goal**: Resolve documentation bloat and establish clean documentation standards
**Priority**: P0 — Blocks all other improvements
**Effort**: 2 weeks

**Stories**:
- [ ] **1.1** Emergency cleanup: remove 48+ empty stub files
- [ ] **1.2** Rename all .md files to kebab-case (1,465 uppercase files)
- [ ] **1.3** Create consolidated index.md in docs/ directory
- [ ] **1.4** Establish BMAD documentation structure in docs/bmad/
- [ ] **1.5** Cross-reference documentation (backlinks, related docs)
- [ ] **1.6** Create docs/.gitignore to exclude generated/legacy files

**Acceptance Criteria**:
- ✅ Zero empty stub files in docs/
- ✅ 100% kebab-case naming (except README.md)
- ✅ Consolidated index.md with all categories
- ✅ BMAD structure with stories/, architecture/, brainstorming/, epics/
- ✅ All existing BMAD docs properly organized
- ✅ No duplicate/contradictory documentation

**Metrics**:
- Before: 3,376 md files, 100% uppercase
- Target: <150 md files, 0% uppercase (except README.md)

---

### Epic 2: Quality Tooling Restoration (P0 - Critical)
**Goal**: Make PHPMD, PHPInsights, and test suite fully functional
**Priority**: P0 — Required for quality gates
**Effort**: 1 week

**Stories**:
- [ ] **2.1** Fix PHPMD PDepend/Symfony conflict
- [ ] **2.2** Resolve PHPInsights plugin allowlist issues
- [ ] **2.3** Address PHPStan complexity blocking test execution
- [ ] **2.4** Implement coverage reporting for all modules
- [ ] **2.5** Create quality gates in CI pipeline

**Acceptance Criteria**:
- ✅ PHPMD runs clean on all modules
- ✅ PHPInsights score >95 on User module
- ✅ Test suite runs to completion with coverage
- ✅ CI pipeline enforces quality gates
- ✅ Zero false negatives in quality checks

**Metrics**:
- PHPMD: 0 violations on app/
- PHPInsights: >95 score
- Test coverage: >90%

---

### Epic 3: Architecture & Code Quality (P1 - High)
**Goal**: Improve code consistency and architectural patterns
**Priority**: P1 — Important for long-term maintainability
**Effort**: 2 weeks

**Stories**:
- [ ] **3.1** Audit and fix form/column parity issues across Filament
- [ ] **3.2** Remove dead code and unused traits/actions
- [ ] **3.3** Standardize Action patterns across all actions
- [ ] **3.4** Implement consistent error handling patterns
- [ ] **3.5** Add comprehensive type hints throughout module
- [ ] **3.6** Remove all @phpstan-ignore annotations (or document justification)
- [ ] **3.7** Audit migration naming and remove duplicates

**Acceptance Criteria**:
- ✅ All Filament forms match their table columns
- ✅ Zero dead code detected by PHPStan
- ✅ All actions follow consistent patterns
- ✅ No PHPStan ignores without justification
- ✅ Migration naming follows Laravel conventions

**Metrics**:
- Form/column parity: 100%
- Dead code: 0 instances
- PHPStan ignores: 0 (or all documented)

---

### Epic 4: Test Coverage Enhancement (P1 - High)
**Goal**: Achieve >95% test coverage with comprehensive test suite
**Priority**: P1 — Required for reliability
**Effort**: 3 weeks

**Stories**:
- [ ] **4.1** Identify coverage gaps (currently ~88%)
- [ ] **4.2** Write tests for Authentication actions
- [ ] **4.3** Write tests for Authorization policies
- [ ] **4.4** Write tests for User management actions
- [ ] **4.5** Write tests for Team/Tenant management
- [ ] **4.6** Write tests for Filament Resources and Widgets
- [ ] **4.7** Add integration tests for auth flows
- [ ] **4.8** Implement property-based testing for edge cases

**Acceptance Criteria**:
- ✅ >95% line coverage
- ✅ >90% branch coverage
- ✅ All critical paths covered
- ✅ No uncovered security-critical code
- ✅ Pest tests all pass (exit 0)

**Metrics**:
- Line coverage: >95%
- Branch coverage: >90%
- Critical paths: 100%

---

### Epic 5: Widget Visibility Pattern (P1 - High)
**Goal**: Fix widget visibility control to follow correct architectural pattern
**Priority**: P1 — Visibility logic belongs in widget layer
**Effort**: 2 days

**Stories**:
- [ ] **5.1** Move FirmaValutatoreWidget visibility to widget layer
- [ ] **5.2** Implement visible() method in FirmaValutatoreWidget
- [ ] **5.3** Update BaseListSchedas to not filter widgets at parent level
- [ ] **5.4** Add tests for widget visibility behavior
- [ ] **5.5** Document widget visibility pattern in BMAD docs

**Acceptance Criteria**:
- ✅ FirmaValutatoreWidget controls its own visibility via visible()
- ✅ Widget receives filters as parameter and decides visibility
- ✅ Parent page no longer filters widgets based on filter state
- ✅ Tests verify visibility based on valutatore_id filter
- ✅ Pattern documented for reuse across modules

**Metrics**:
- Widget visibility: centralized in widget
- Parent filtering: removed
- Tests: 100% coverage of visibility logic

---

### Epic 6: Security Hardening (P2 - Medium)
**Goal**: Strengthen security posture and audit capabilities
**Priority**: P2 — Important for compliance
**Effort**: 2 weeks

**Stories**:
- [ ] **6.1** Implement behavioral authentication analytics
- [ ] **6.2** Enhance session security (fingerprinting, binding)
- [ ] **6.3** Add IP-based access control options
- [ ] **6.4** Implement password history and reuse prevention
- [ ] **6.5** Enhance audit logging for sensitive operations
- [ ] **6.6** Add breach detection and alerting
- [ ] **6.7** Implement account lockout with exponential backoff

**Acceptance Criteria**:
- ✅ Behavioral analytics for auth anomalies
- ✅ Session fingerprinting and binding
- ✅ Complete audit trail for sensitive ops
- ✅ Breach detection and alerting
- ✅ OWASP Top 10 compliance verified

**Metrics**:
- Auth anomalies detected: 100%
- Session security: fingerprinted + bound
- Audit coverage: 100% of sensitive ops

---

### Epic 7: Developer Experience (P2 - Medium)
**Goal**: Improve developer onboarding and API ergonomics
**Priority**: P2 — Enhances productivity
**Effort**: 1 week

**Stories**:
- [ ] **7.1** Create comprehensive API documentation (OpenAPI/Swagger)
- [ ] **7.2** Add IDE helper annotations for all public APIs
- [ ] **7.3** Create code examples and recipes in docs/
- [ ] **7.4** Implement consistent error messages across module
- [ ] **7.5** Add debugging tools and helpers
- [ ] **7.6** Create migration guides for API changes
- [ ] **7.7** Implement health check endpoints

**Acceptance Criteria**:
- ✅ OpenAPI docs for all public APIs
- ✅ IDE helper annotations complete
- ✅ Code examples for all major use cases
- ✅ Consistent error messages with error codes
- ✅ Health check endpoints operational

**Metrics**:
- API coverage: 100% documented
- IDE issues: 0
- Examples: 100% of major workflows

---

### Epic 8: Performance Optimization (P3 - Low)
**Goal**: Optimize module for scale and speed
**Priority**: P3 — Nice-to-have optimization
**Effort**: 2 weeks

**Stories**:
- [ ] **8.1** Implement query optimization audit
- [ ] **8.2** Add caching layer for frequent lookups
- [ ] **8.3** Optimize N+1 queries in Filament resources
- [ ] **8.4** Implement lazy loading for large lists
- [ ] **8.5** Add database connection pooling
- [ ] **8.6** Implement background processing for heavy operations
- [ ] **8.7** Add performance monitoring and alerting

**Acceptance Criteria**:
- ✅ <100ms avg auth response
- ✅ <200ms user list (1000+ users)
- ✅ Zero N+1 queries in production
- ✅ Caching layer operational
- ✅ Performance monitoring active

**Metrics**:
- Auth response: <100ms
- List load: <200ms (1000+ users)
- N+1 queries: 0

---

## 🔄 Epic Dependencies

```
Epic 1 (Documentation) ─┐
Epic 2 (Tooling) ───────┤
                        ├──→ Epic 3 (Code Quality) ─┐
Epic 4 (Tests) ─────────┤                            │
                        │                            ├──→ Epic 5 (Widget Pattern)
                        │                            │
Epic 6 (Security) ───────┤                            │
                        │                            │
Epic 7 (DX) ────────────┤                            │
                        │                            │
                        └────────────────────────────┘
                                              │
                         Epic 8 (Performance) ─┘
```

**Critical Path**: Epic 1 + Epic 2 → Epic 3 → Epic 4 → Epic 5 → Epic 6 → Epic 7 → Epic 8

## 📊 Resource Allocation

| Epic | Priority | Effort | Dependencies |
|------|----------|--------|--------------|
| 1 - Documentation | P0 | 2 weeks | None |
| 2 - Tooling | P0 | 1 week | None |
| 3 - Code Quality | P1 | 2 weeks | Epic 1, 2 |
| 4 - Tests | P1 | 3 weeks | Epic 3 |
| 5 - Widget Pattern | P1 | 2 days | Epic 3 |
| 6 - Security | P2 | 2 weeks | Epic 3 |
| 7 - DX | P2 | 1 week | Epic 1, 3 |
| 8 - Performance | P3 | 2 weeks | Epic 4, 6 |

**Total Estimated Effort**: ~14 weeks
**Parallelizable**: Epics 1, 2, 6, 7 (independent)
**Sequential**: Epic 3 → 4 → 5, then 6 → 7 → 8

---

*Epics generated via BMAD methodology*
*Next: Sprint planning with story breakdown*
=======
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
>>>>>>> laraxot/dev
