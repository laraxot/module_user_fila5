# Indice documentazione — Modulo User

**Scopo del modulo:** identità (auth, RBAC Spatie, team/tenant, Passport/SSO, widget login Filament).  
**Navigazione canonica:** [README.md](./README.md) (non `readme.md` — eliminato come duplicato case).

## Lettura essenziale
1. [README.md](./README.md) — panorama identità e mappa PHPStan
2. [roadmap.md](./roadmap.md) — evoluzione prodotto
3. [philosophy.md](./philosophy.md) — “essere unici” / identità digitale

## 🏗️ **Architettura & Auth**
- 🔐 **[Authentication Flow](./authentication.md)** - Dettagli sul ciclo di vita della sessione.
- 📜 **[Permissions System](./permissions.md)** - Gestione ruoli e permessi con Spatie.
- 🎫 **[Passport & SSO](./passport-integration.md)** - Integrazione OAuth2 e Single Sign-On.
- 🧷 **[Passport Model Wrappers](./passport-model-wrappers.md)** - Mappa obbligatoria tra model vendor Passport e wrapper `Oauth*` locali.
- 🛡️ **[2FA Guide](./2fa-guide.md)** - Implementazione dell'autenticazione a due fattori.

## 🪮 **Ponytail audit**
- 📋 **[Over-engineering audit](./ponytail-audit-over-engineering.md)** - Policy stub e contracts inutilizzati.
- 🗄️ **[Archiviazione Contracts orfani e backup lang](./wiki/decisions/contracts-and-lang-backup-archival-2026-06-30.md)** - `ModelContract`, `PassportHasApiTokensContract` archiviati (`.bak`); 281 backup lang → `lang/{locale}/*.php.bak` in-place ([regola no-Legacy](../../../../docs/wiki/concepts/no-legacy-folders-code.md)).

## 👤 **Profilo & Moderazione**
- 🧑‍🎨 **[Profile Management](./profile-management.md)** - Gestione estesa dei dati utente (EAV).
- ⚖️ **[Moderation Strategy](./user-moderation-strategy.md)** - Workflow per approvazione e ban (dentisti, cliniche, utenti).
- 🧬 **[BaseUser Architecture](./baseuser.md)** - La classe base che unifica l'identità nel sistema.

## ⚙️ **Integrazioni Filament**
- 🏗️ **[Filament Resources](./filament-resources-updated.md)** - Gestione utenti, ruoli e permessi in v5.
- 🔑 **[Passport Cluster](./passport-cluster-summary.md)** - Gestione centralizzata delle chiavi API.
- ⚡ **[Auth Widgets](./login-widget-fix.md)** - Componenti di login/registrazione riutilizzabili.
- 🔐 **[Socialite + Microsoft OAuth](./socialite-microsoft-integration.md)** - Integrazione autenticazione Microsoft (NEW)

## Qualità e sviluppo (PHPStan)

| Ruolo | File |
|-------|------|
| Procedura swarm (repo) | [11-phpstan.md](../../../../bashscripts/docs/prompts/11-phpstan.md) |
| Story modulo zero errori | [stories/phpstan-zero-errors-user.story.md](./stories/phpstan-zero-errors-user.story.md) |
| Snapshot compliance | [phpstan-compliance.md](./phpstan-compliance.md) |
| Analisi storica (non SSoT) | [phpstan.md](./phpstan.md), `phpstan-fixes*.md`, `phpstan-*es.md` — **non** creare altri; aggiornare story + compliance |

Altri:
- [Testing Identity](./testing.md) — Pest auth
- [Model Inheritance](./model-inheritance-rules.md)
- PSR-4 test helpers: anonymous class / fixture sotto `tests/`

## 🧹 **Manutenzione**
- 🗑️ **[Cleanup Plan](./todo.md)** - Strategia per gestire i 550+ documenti accumulati.

## 📦 **Pacchetti Composer**
- [Riferimento completo](../../../../docs/composer-packages-reference.md) | [Inventario 312 pacchetti](../../../../docs/architecture/composer-packages-full-inventory.md)
- `laravel/passport` - OAuth2 API
- `socialiteproviders/microsoft`, `socialiteproviders/auth0` - OAuth
- `flowframe/laravel-trend` - Statistiche
- `jenssegers/agent` - User-Agent
- `spatie/laravel-personal-data-export` - Export GDPR

## 🔗 **Moduli Correlati**
- [Xot](../../Xot/docs/README.md) - Core per la gestione dei trait `HasTeams`.
- [Tenant](../../Tenant/docs/README.md) - Risoluzione del Tenant corrente per l'utente.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)
