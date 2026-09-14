<<<<<<< HEAD
# 👤 User — chi sei, cosa puoi fare, per conto di chi

<<<<<<< HEAD
=======
<<<<<<< .merge_file_2p2dHQ
>>>>>>> laraxot/dev
[![Dominio](https://img.shields.io/badge/dominio-identit%C3%A0%20%26%20autorizzazione-1565C0.svg)](#)
[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](../../composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-%5E13.0-FF2D20.svg)](../../composer.json)
[![Filament](https://img.shields.io/badge/Filament-%5E5.0-ffab00.svg)](../../composer.json)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max%2C%200%20errori-brightgreen.svg)](../../phpstan.neon)
[![strict_types](https://img.shields.io/badge/declare-strict__types%3D1-informational.svg)](#)
<<<<<<< HEAD
[![Domain-Auth](https://img.shields.io/badge/Domain-Auth%20%26%20Teams-1565C0.svg)](#)
[![Laravel 13](https://img.shields.io/badge/Laravel-13-red.svg)](https://laravel.com/)
=======
=======
[![Domain-Auth](https://img.shields.io/badge/Domain-Auth%20%26%20Teams-1565C0.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
>>>>>>> laraxot/dev
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
<<<<<<< HEAD
[![<nome progetto> Platform](https://img.shields.io/badge/Platform-<nome progetto>-008758.svg)](#)
=======
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)
>>>>>>> .merge_file_feUxsu
>>>>>>> laraxot/dev

> Badge **misurati il 2026-09-02**, non dichiarati. PHPStan verificato con
> `cd laravel && ./vendor/bin/phpstan analyse Modules/User` → `[OK] No errors`.
> Le versioni vengono da `composer.json`, non dalla memoria. Il livello e' quello
> di `phpstan.neon` (`level: max`): il progetto **vieta** di passare `--level`.

---

## Perché

Tre domande, e non una di più: **chi sei**, **cosa puoi fare**, **per conto di chi**.
Tutto il resto che si sa di una persona — matricola, categoria, struttura, storia di
servizio — non appartiene a User: appartiene al dominio.

È la distinzione che regge l'intero progetto, e confonderla è l'errore più costoso:

| Concetto | Cos'è | Dove vive |
|---|---|---|
| **User** | credenziali e permessi | qui |
| **Profile** | la persona come utente della piattaforma | qui |
| **Dipendente** | la persona nell'organico, con matricola | `Modules/Sigma` |

Un utente può non essere un dipendente (un revisore esterno). Un dipendente può non
avere un utente. Il collegamento è una relazione, **non** un'identità.

## Scopo e confini

User risponde a tre domande e a nessun'altra: **chi sei, cosa ti è permesso, per
conto di quale organizzazione.** Le 34 migrazioni non contengono un solo concetto di
dominio del cliente — utenti, profili, ruoli, permessi, team, tenant, OAuth — e
girano su una connection dedicata (`app/Models/BaseModel.php:15` → `'user'`, mappata
<<<<<<< HEAD
al database utenti del progetto in `config/local/<tenant>/database.php`). È anche la radice STI del
=======
a `ptv_user` in `config/local/ptvx/database.php:44`). È anche la radice STI del
>>>>>>> laraxot/dev
progetto: `BaseUser` e `BaseProfile` usano `Parental\HasChildren`, e `Ptv\Models\User`
e `Ptv\Models\Profile` sono i loro figli concreti.

Il confine è quasi tenuto: 489 dei 666 file di `app/` estendono o tipizzano su Xot,
zero `app/Services`, zero estensioni dirette di `Filament\`. Restano una riga verso
il portale (`app/Models/OauthPersonalAccessClient.php:9`, `use Modules\Ptv\Models\Profile`)
e tre contratti che duplicano quelli di Xot, due dei quali con **0** referenze.

Scopo esteso, misure e mosse: [docs/scopo.md](docs/scopo.md).

## Certificazioni

## Logica

- **Autenticazione** — login Filament e front-office, log degli accessi
  (`AuthenticationLog`), dispositivi riconosciuti (`Device`).
- **Autorizzazione** — ruoli e permessi Spatie, Policy per modulo.
- **Accesso programmatico** — OAuth completo via Passport (`OauthClient`,
  `OauthAccessToken`, `OauthRefreshToken`, `OauthAuthCode`).
- **Organizzazione** — team e inviti.
- **Attivazione graduale** — feature flag via Pennant (`Feature`).
- **Estensione** — `BaseUser` e `BaseProfile` sono punti di estensione previsti,
  non classi da copiare.

<<<<<<< HEAD
## Filosofia
Security-minded dev? Qui si definisce **chi è autorizzato** su <nome progetto>.
=======
<<<<<<< .merge_file_2p2dHQ
## Filosofia
=======
Security-minded dev? Qui si definisce **chi è autorizzato** su FixCity.
>>>>>>> .merge_file_feUxsu
>>>>>>> laraxot/dev

**Un permesso che non esiste nega in silenzio.** `can('scheda.approva')` con un
permesso mai registrato restituisce `false`: sembra una scelta di sicurezza, è un
bug — e si manifesta come "l'utente dice che non vede il pulsante".

Da qui due regole di questo modulo:

1. I permessi sono un **contratto documentato**, non un effetto collaterale del seeder.
2. Nei PHPDoc, creatore e aggiornatore si tipizzano su
   `Modules\Xot\Contracts\ProfileContract` — **mai** sulla classe concreta di un modulo
   verticale. Tipizzare sul concreto inverte la dipendenza e lega il framework al
   dominio.

## Confini

Non appartengono a User: i dati di servizio del dipendente (→ `Sigma`), le valutazioni
(→ moduli di dominio), l'infrastruttura Filament (→ `Xot`), l'invio delle notifiche
(→ `Notify`). User decide **chi** può ricevere una comunicazione, non **come** si
spedisce.

## Documentazione

| Documento | Cosa contiene |
|---|---|
| [`docs/purpose.md`](./docs/purpose.md) | scopo, come raggiungerlo meglio, confini |
| [`docs/`](./docs/) | wiki tecnica del modulo |

## Stato verificato il 2026-09-02

| Verifica | Comando | Esito |
|---|---|---|
| Analisi statica | `./vendor/bin/phpstan analyse Modules/User` | `[OK] No errors` |
| Versioni | `composer.json` | PHP `^8.3`, Laravel `^13.0`, Filament `^5.0` |

<<<<<<< HEAD
Voci **non** ancora verificate in questa revisione: copertura dei test, PHPMD,
PHPInsights. Finché non sono misurate, non compaiono come badge.
**Modulo** `user` · **Laraxot** · **<nome progetto> Platform** · PHPStan 10 · Filament 5
=======
<<<<<<< .merge_file_2p2dHQ
Voci **non** ancora verificate in questa revisione: copertura dei test, PHPMD,
PHPInsights. Finché non sono misurate, non compaiono come badge.
=======
**Modulo** `user` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
>>>>>>> .merge_file_feUxsu
>>>>>>> laraxot/dev
=======
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
>>>>>>> laraxot/dev
