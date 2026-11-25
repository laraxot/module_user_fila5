---
title: "Topic 00-index"
type: digest
status: active
qmd: "digest ceiling 100 00-index"
---

# Topic 00-index

Sintesi automatica di 4 documenti (chiave `00-index`).

## 📚 **Indice Documentazione Modulo User**

_Fonte: `00-index-indice-documentazione-modulo-user.md`_

# 📚 **Indice Documentazione Modulo User**

**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 2.5.0

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica completa del sistema di identità.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: Biometric Auth & AI Moderation.
3. [philosophy.md](./philosophy.md) - "Essere Unici": la gestione dell'identità digitale.

## 🏗️ **Architettura & Auth**
- 🔐 **[Authentication Flow](./authentication.md)** - Dettagli sul ciclo di vita della sessione.
- 📜 **[Permissions System](./permissions.md)** - Gestione ruoli e permessi con Spatie.
- 🎫 **[Passport & SSO](./passport-integration.md)** - Integrazione OAuth2 e Single Sign-On.
- 🧷 **[Passport Model Wrappers](./passport-model-wrappers.md)** - Mappa obbligatoria tra model vendor Passport e wrapper `Oauth*` locali.
- 🛡️ **[2FA Guide](./2fa-guide.md)** - Implementazione dell'autenticazione a due fattori.

## 🪮 **Ponytail audit**
- 📋 **[Over-engineering audit](./ponytail-audit-over-engineering.md)** - Policy stub e contracts inutilizzati.
<<<<<<< .merge_file_CkEJnT
- 🗄️ **[Archiviazione Contracts orfani e backup lang](./wiki/decisions/contracts-and-lang-backup-archival-.md.md)** - `ModelContract`, `PassportHasApiTokensContract` archiviati (`.bak`); 281 backup lang → `lang/{locale}/*.php.bak` in-place ([regola no-Legacy](../../../../docs/wiki/concepts/no-legacy-folders-code.md)).

## 👤 **Profilo & Moderazione**
- 🧑‍🎨 **[Profile Management](./profile-management.md)** - Gestione estesa dei dati utente (EA
=======
- 🗄️ **[Archiviazione Contracts orfani e backup lang](./wiki/decisions/contracts-and-lang-backup-archival-.md.md)** - `ModelContract`, `PassportHasApiTokensContract` archiviati (`.bak`); 281 backup lang → `lang/{locale}/*.php.bak` in-place ([regola no-Legacy](../../../../bashscripts/ai/wiki/concepts/modules-structure-rules.md#no-legacy-folders-code)).

## 👤 **Profilo & Moderazione**
- 🧑‍🎨 **[Profile Management](./profile-management.md)** - G
>>>>>>> .merge_file_pQm64f

## 📚 **Indice Documentazione Modulo User**

_Fonte: `00-index.md`_

# 📚 **Indice Documentazione Modulo User**

**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 2.5.0

## 🎯 **Lettura Essenziale**
1. [README.md](./readme.md) - Panoramica completa del sistema di identità.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: Biometric Auth & AI Moderation.
3. [philosophy.md](./philosophy.md) - "Essere Unici": la gestione dell'identità digitale.

## 🏗️ **Architettura & Auth**
- 🔐 **[Authentication Flow](./authentication.md)** - Dettagli sul ciclo di vita della sessione.
- 📜 **[Permissions System](./permissions.md)** - Gestione ruoli e permessi con Spatie.
- 🎫 **[Passport & SSO](./passport-integration.md)** - Integrazione OAuth2 e Single Sign-On.
- 🧷 **[Passport Model Wrappers](./passport-model-wrappers.md)** - Mappa obbligatoria tra model vendor Passport e wrapper `Oauth*` locali.
- 🛡️ **[2FA Guide](./2fa-guide.md)** - Implementazione dell'autenticazione a due fattori.

## 🪮 **Ponytail audit**
- 📋 **[Over-engineering audit](./ponytail-audit-over-engineering.md)** - Policy stub e contracts inutilizzati.
<<<<<<< .merge_file_CkEJnT
- 🗄️ **[Archiviazione Contracts orfani e backup lang](./wiki/decisions/contracts-and-lang-backup-archival-2026-06-30.md)** - `ModelContract`, `PassportHasApiTokensContract` archiviati (`.bak`); 281 backup lang → `lang/{locale}/*.php.bak` in-place ([regola no-Legacy](../../../../docs/wiki/concepts/no-legacy-folders-code.md)).

## 👤 **Profilo & Moderazione**
- 🧑‍🎨 **[Profile Management](./profile-management.md)** - Gestione estesa dei dati ute
=======
- 🗄️ **[Archiviazione Contracts orfani e backup lang](./wiki/decisions/contracts-and-lang-backup-archival-2026-06-30.md)** - `ModelContract`, `PassportHasApiTokensContract` archiviati (`.bak`); 281 backup lang → `lang/{locale}/*.php.bak` in-place ([regola no-Legacy](../../../../bashscripts/ai/wiki/concepts/modules-structure-rules.md#no-legacy-folders-code)).

## 👤 **Profilo & Moderazione**
- 🧑‍🎨 **[Profile Management](./profile-management.md
>>>>>>> .merge_file_pQm64f

## Indice BMAD — User

_Fonte: `bmad/00-index.md`_

# Indice BMAD — User

- [Purpose](./purpose.md)
- [Audit](./audit.md)
- [Audit dettagliato](./audits/user-audit.md)
- [Piano di miglioramento](./piano-miglioramento.md)
- [Epic e story](./epics.md)
- [Decision log](./decision-log.md)
- [Brainstorming](./brainstorming.md)
<<<<<<< .merge_file_CkEJnT
- [Story audit modulo](./stories/module-bmad-audit.story.md)
=======
- [Story audit modulo](stories/0014-module-bmad-audit-2.story.md)
>>>>>>> .merge_file_pQm64f
- [ECC](../ecc/00-index.md)
- [Purpose root](../purpose.md)

## Roadmap Index - User

_Fonte: `roadmap/00-index.md`_

# Roadmap Index - User

## Scope

Questo piano copre il module **User** e le sue integrazioni principali.

## Files

- [Current State](01-current-state.md)
- [Goals](02-goals.md)
- [Workstreams](03-workstreams.md)
- [Milestones](04-milestones.md)
- [Risks](05-risks.md)

## Note operative

- Tenere il piano aggiornato con cambiamenti architetturali.
- Inserire date reali e owner quando disponibili.
