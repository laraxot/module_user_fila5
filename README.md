---
id: module-user-readme
title: "User — Identità, Autorizzazione e Team"
type: module-readme
category: module-documentation
module: User
status: active
tags: [user, identity, authentication, authorization, teams]
created: 2026-09-14
updated: 2026-09-14
qmd: "user identity authentication roles teams module documentation"
issues:
  - "https://github.com/laraxot/module_user_fila5/issues/93"
discussions:
  - "https://github.com/laraxot/module_user_fila5/discussions/94"
related:
  - "./docs/"
sources: []
---

# 👤 User

> **Identità, autorizzazione e team.**

Utenti, profili, ruoli, permessi e appartenenza organizzativa.

## Cosa offre

- **Autenticazione** – login e sessioni
- **RBAC/policy** – controllo accessi granulare
- **Team/tenant** – organizzazione multi-tenancy
- **OAuth/Filament** – integrazione social e admin

## Confini architetturali

This module publishes contracts usable by other modules. Logic lives in `Actions`; admin UI follows Laraxot/XotBase.

## Integrazione rapida

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/User
```

See local docs for integration patterns.

## Documentazione

The technical map is in [docs/README.md](./docs/README.md).

- [Story BMAD del modulo](./docs/stories/)
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Keep `declare(strict_types=1);` in PHP, respect project PHPStan config, and update docs when contracts evolve.

---

**Modulo** `user` · **Laraxot ecosystem** · **Project-agnostic**
