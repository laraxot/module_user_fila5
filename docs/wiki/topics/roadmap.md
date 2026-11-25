---
title: "Topic roadmap"
type: digest
status: active
qmd: "digest ceiling 100 roadmap"
---

# Topic roadmap

Sintesi automatica di 3 documenti (chiave `roadmap`).

## Policy globale (puntatore)

_Fonte: `development/roadmap.md`_

# Policy globale (puntatore)

Contenuto in wiki di progetto — non duplicare nei moduli ([#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [docs/wiki/rules/00-TRIGGER_MAP.md](../../../../../docs/wiki/rules/00-TRIGGER_MAP.md)

## User Module Roadmap (2025 Q4)

_Fonte: `roadmap/roadmap.md`_

# User Module Roadmap (2025 Q4)

## Vision & Scope
- Ensure `Modules/User/` is the canonical identity, auth, roles/permissions, teams, and profile layer.
- Full compliance with Laraxot rules (Xot base classes, Filament 4 patterns, translations, strict types).

## Key Outcomes
- PHPStan 0 errors for `Modules/User/`.
- Filament v4 stable migration completed (no deprecated APIs).
- Contracts alignment with `Modules\Xot\Contracts\*` and consistent relations.

## References
- Filament v4: https://filamentphp.com/docs/4.x/upgrade-guide
- What’s new in v4: https://filamentphp.com/content/leandrocfe-whats-new-in-filament-v4
- Stable: https://filamentphp.com/content/alexandersix-filament-v4-is-stable
- Examples: https://filamentexamples.com/tutorial/filament-v3-v4-upgrade
- Forms v4: https://filamentphp.com/docs/4.x/forms/overview

## Milestones
- [ ] Normalize `BaseUser.php` (remove merge artifacts, implement contracts: HasTenants, HasTeamsContract, UserContract)
- [ ] Audit and fix `Notification.php`, `Profile.php`, team contracts
- [ ] Review all Filament pages/resources: use Xot base wrappers, `getFormSchema()`, list pages methods
- [ ] Translations expanded structure (fields/actions) and remove all ->label()
- [ ] Factories: ensure `newFactory()` via `GetFactoryAction` where required
- [ ] Tests: unit + feature coverage for auth, roles, teams, profiles

## Acceptance Criteria
- `./vendor/bin/phpstan analyse Modules --memory-limit=-1` returns 0 errors
- All resources adhere to pro

## User Module - Complete Roadmap 2026

_Fonte: `roadmap.md`_

# User Module - Complete Roadmap 2026

**Generated**: 2026-01-02
**Status**: Authentication & Authorization Foundation
**Methodology**: Super Mucca (DRY + KISS + Deep Understanding)
**PHPStan Level**: 10 ✅ (0 errors)

---

## 🎯 **MODULE IDENTITY**

### **Domain**: Authentication & Authorization
### **Purpose**: Enterprise-grade security and user management foundation
### **Philosophy**: "Security is not a feature - it's the foundation"

**Core Mission**: Provide bulletproof authentication, granular authorization, and seamless multi-tenant user management that scales from startup to enterprise while maintaining zero-compromise security.

---

## 🧠 **DEEP UNDERSTANDING - The Security Paradigm**

### **The User Trinity**

**User** (from Latin "uti" = to use) embodies the **THREE PILLARS OF DIGITAL IDENTITY**:

```
IDENTITY ←→ AUTHORIZATION ←→ CONTEXT

Who you are    What you can do    Where you operate
