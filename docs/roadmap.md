<<<<<<< HEAD
# User Module Roadmap

"Proteggere l'identità: il fondamento della fiducia."

## 🎯 Visione
Diventare un identity provider completo (IdP) che supporta standard moderni come Passkeys (WebAuthn), garantendo un'esperienza di login fluida e sicura, integrata con modelli di moderazione proattiva basati su AI.

## 🏗️ Fasi di Sviluppo

### Fase 1: Stability & Security (In Progress)
- [x] PHPStan Level 10 Compliance.
- [ ] Rimozione definitiva dei 550+ file obsoleti.
- [ ] Implementazione del **Security Cluster** in Filament v5.
- [ ] Supporto completo per **Laravel 12 Authentication Features**.

### Fase 2: Modern Identity (Planned)
- [ ] Integrazione **WebAuthn** per login biometrici (TouchID, FaceID).
- [ ] Socialite Cluster: aggiunta facile di nuovi provider OAuth (Google, Apple, etc.).
- [ ] Sistema di "Impersonation" sicuro per il supporto tecnico (SuperAdmin).

### Fase 3: AI Moderation (Future)
- [ ] **AI Identity Verification**: Verifica automatica dei documenti caricati (es. tesserini medici).
- [ ] **Anomaly Detection**: Rilevamento di tentativi di login sospetti basati su pattern comportamentali.
- [ ] **Dynamic Permissions**: L'AI suggerisce i permessi minimi necessari in base all'uso effettivo dell'utente.

## ✅ Checklist Qualità
- [x] PHPStan Level 10.
- [ ] 100% test coverage sui flussi critici di Auth.
- [ ] Auditing delle chiavi segrete e dei token (Passport/Sanctum).

---

**Ultimo aggiornamento**: 31 Gennaio 2026
**Versione**: 1.0.0
**Maintainer**: User Module Team
**Status**: 🚧 In Development (70% completo)
=======
---
title: "Product Roadmap - User Module"
type: concept
tags: [roadmap]
created: 2026-07-14
updated: 2026-07-14
qmd: "roadmap product roadmap - user module"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index-1.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
---

# Product Roadmap - User Module

## 🎯 Vision & Strategy
Provide a secure, highly-scalable authentication and authorization system for the Laraxot ecosystem using Spatie Permissions and Laravel Fortify.

## 🗓️ Timeline
### Q1 2026: Foundation (Current)
- **Role/Permission Mapping** - *Status: Shipped*
- **Profile Management** - *Status: In Progress*
- **Socialite Integration** - *Status: Planned*

## 🚦 Status Overview
| Feature | Status | Owner | Target Date |
| :--- | :--- | :--- | :--- |
| Core Auth | ✅ Stable | @CoreTeam | Jan 2026 |
| Multi-factor Auth | 🏗️ In Dev | @CoreTeam | Apr 2026 |

## 📂 Backlog / Future Ideas
- Passkey (WebAuthn) support.
- Centralized Auth across multiple Laraxot instances.
>>>>>>> 2024e2e7 (.)
