---
title: "User"
type: readme
status: active
created: 2026-11-26
updated: 2026-11-26
---

<div align="center">

# 👤 User

**Identità, autenticazione, autorizzazione, ruoli, team, tenant e OAuth per applicazioni Laravel.**

[![CI](https://img.shields.io/github/actions/workflow/status/laraxot/module_user_fila5/ci.yml?branch=dev&label=CI)](https://github.com/laraxot/module_user_fila5/actions)
[![PHP](https://img.shields.io/badge/PHP-%3E%3D8.4-777BB4?logo=php&logoColor=white)](https://www.php.net/)<br>
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)<br>
[![License](https://img.shields.io/badge/license-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PRs welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](https://github.com/laraxot/module_user_fila5/pulls)

<img src="https://raw.githubusercontent.com/laraxot/module_user_fila5/dev/docs/manuals/assets/user-admin-dashboard.webp" alt="Dashboard del pannello User" width="880">

</div>

User è un modulo Laravel **standalone e riusabile**: nessuna dipendenza da un
progetto specifico. L'applicazione ospitante decide branding, tenant, ruoli,
permessi, provider OAuth e percorso del pannello.

## ✨ Cosa fa

- **Autenticazione** web e API: login, registrazione, verifica email, recupero e reset password.
- **Autorizzazione**: ruoli e permessi (Shield) con policy configurabili.
- **Organizzazione**: team, appartenenze e tenant multi-tenant.
- **Integrazioni**: OAuth/Passport per le API, Socialite per i provider social.
- **Sicurezza e audit**: log di autenticazione, dispositivi collegati, template email di reset.
- **Back office**: pannello Filament completo per la gestione utenti.

## 📖 Manuali per figura

| Figura | Guida |
| --- | --- |
| Utente finale | [Accesso e profilo](docs/manuals/manuale-utente-frontoffice.md) |
| Amministratore | [Gestione del pannello](docs/manuals/manuale-admin.md) |
| Super amministratore | [OAuth, provider e configurazione](docs/manuals/manuale-super-admin.md) |
| Operatore / altre figure | [Viste e permessi](docs/manuals/manuale-altre-figure.md) |
| Riferimento completo | [Manuale utente — `/user/admin`](docs/manuals/manuale-utente.md) · [Indice](docs/manuals/README.md) |

## 🗂 Documentazione

- **[Indice docs](docs/index.md)** — mappa di tutta la documentazione del modulo
- **[ADR](docs/adr/)** — decisioni architetturali e il perché
- **[Contratti](docs/contracts/)** — cosa promettono le Action pubbliche
- **[Stories](docs/stories/)** — lavoro tracciato

## 🛠 Sviluppo

- Repository autonomo (`laraxot/module_user_fila5`), branch di lavoro `dev`.
- Conventional Commits; ogni commit cita la sua issue `(#N)`.
- Test e analisi statica girano nel contesto dell'applicazione Laravel host
  (Pest/PHPUnit, PHPStan, Pint): nessun `vendor/` nel repository.
- `docs/` resta sotto **100 file `.md`**.

## 🤝 Contribuire

Issue e pull request benvenute: descrivi il problema o la proposta, collega
l'issue nel PR. Per segnalazioni di sicurezza usa la scheda
**[Security](https://github.com/laraxot/module_user_fila5/security)**.
Mappa delle superfici GitHub: [`.github/README.md`](.github/README.md).

---
<sub>Maintained in <a href="https://github.com/laraxot/module_user_fila5">laraxot/module_user_fila5</a> · MIT License</sub>
