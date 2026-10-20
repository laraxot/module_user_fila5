---
title: "User - indice canonico della documentazione"
type: index
status: active
updated: 2026-10-20
module: User
tags: [docs, user, index]
qmd: "user modulo indice canonico docs identita contenuto reale directory ingressi duplicati link rotti"
---
# 📚 **Indice Documentazione Modulo User**

Questo e' l'ingresso canonico della cartella `docs/` del modulo (contratto: `bmad-output/docs-architecture/module-theme-docs-contract.md`). Gli altri file con nome simile sono copie o elenchi generati: vedi "Ingressi duplicati" piu' sotto.

**Status PHPStan (verificato 2026-10-14, storico: superato dalla misura del 2026-10-20 qui sotto)**: `cd laravel && ./vendor/bin/phpstan analyse Modules/User` (livello `max` da `laravel/phpstan.neon`) segnala 3 errori, tutti `argument.type` alla riga 8 di `lang/de/validation.php`, `lang/en/validation.php`, `lang/es/validation.php` (`array_replace_recursive` riceve `mixed`). In `app/` gli errori sono 0. La dicitura precedente "Level 10 Compliant" era quindi vera solo per `app/`.
**Aggiornamento PHPStan 2026-10-20**: il pull del 2026-10-20 ha riportato in `tests/` un lotto di test non allineato al codice (sull'intero `Modules` circa 9800 errori, quasi tutti nei test; nel modulo User 2812 prima delle correzioni). La lane `user-b` ha riportato a 0 errori 33 file di test (causa: factory non tipizzata, `TestCase` impoverita dal merge, test fantasma): cosa e' stato corretto e cosa neutralizzato sta in [stories/phpstan-test-wave-user-b.story.md](./stories/phpstan-test-wave-user-b.story.md). Il conteggio dell'intero modulo spetta al run di coordinamento ([Xot](../../Xot/docs/stories/phpstan-test-wave-regression.story.md)); la riga del 2026-10-14 qui sopra non va letta come stato attuale. I 14 file di test rimasti (182 errori) sono nella story [stories/phpstan-test-wave-user.story.md](./stories/phpstan-test-wave-user.story.md). Misura del 2026-10-20 ore 10:07: `cd laravel && ./vendor/bin/phpstan analyse Modules/User --memory-limit=2G --no-progress --error-format=raw` esce con codice 0 e nessun errore (compresi i tre `lang/*/validation.php` della riga storica); la soglia `typeCoverage.*` si prova solo con `analyse Modules` intero.
**Gate config:** un solo neon — `laravel/phpstan.neon` (solo l'umano lo modifica; agenti: `analyse` senza `-c` / `--level` / `.neon` nuovi). Eventuali `Modules/*/phpstan*.neon*` = legacy, non gate. SSoT: [Xot — phpstan single neon](../../Xot/docs/wiki/memories/phpstan-single-neon-config.md). Hub Modules a zero: [phpstan-modules-zero-wave3](../../Xot/docs/stories/phpstan-modules-zero-wave3.story.md); evidenza modulo: [phpstan-user-zero](./stories/phpstan-user-zero.story.md).
**Versione modulo**: non verificata. Ne `module.json` ne `composer.json` dichiarano una versione; l'ultima voce di `CHANGELOG.md` e' `[1.0.0] - 2024-03-XX`. La dicitura precedente "2.5.0" non ha una fonte nel codice.

## 🧭 **Identita' e contenuto reale del modulo (verificato 2026-10-14)**

Modulo `Modules\User` (`module.json`: alias `user`, priorita' 0). Provider dichiarati in `module.json`: `UserServiceProvider`, `Filament\AdminPanelProvider`, `PassportServiceProvider`, `SocialiteServiceProvider`; in `app/Providers/` esistono anche `RouteServiceProvider` (estende `Xot\XotBaseRouteServiceProvider`) ed `EventServiceProvider`, non elencati in `module.json`. Stack da `laravel/composer.lock`: Laravel 13.35, Filament 5.10, Livewire 4.4, Passport 13.9, Socialite 5.31, spatie/laravel-permission 8.3, Pest 5.3 (`laravel/composer.json` richiede PHP `^8.4`).

| Area | Cosa c'e' davvero | Percorso |
|---|---|---|
| Modelli | 50 file (`BaseUser`, `User`, `Profile`, `Team`, `Tenant`, `Role`, `Permission`, `Device`, `Oauth*`, `SocialProvider`, `SsoProvider`...), 39 policy in `Policies/`, 14 trait in `Traits/` (`HasTeams`, `HasTenants`, `HasRoles`, `HasSocialite`...) | `app/Models/` |
| Actions | 59 file in 10 sottocartelle: `Socialite/` (24), `Passport/` (9), `Shield/` (8), `Otp/` (5), `User/` (4), `Activity/` (2), `Team/`, `Auth/`, `Authentication/`, `Notification/` (1 ciascuna), piu' 3 file nella radice (`CreateUserAction`, `GetCurrentDeviceAction`, `GetPermissionModelAction`) | `app/Actions/` |
| Filament | 232 file in `Resources/` (26 risorse tra cui `UserResource`, `RoleResource`, `PermissionResource`, `TeamResource`, `TenantResource`, `ProfileResource`, `SocialProviderResource`), cluster `Passport`, `Socialite`, `Appearance`, 12 pagine, 26 file in `Widgets/` (login, registrazione, reset password, logout, profilo) | `app/Filament/` |
| Livewire/Volt | 14 file in `Http/Livewire/` (`Auth/Login`, `Auth/Register`, `Profile/DeleteAccount`, `Team/Change`...), 1 in `app/Livewire/`, 1 Volt `Http/Volt/LogoutAction` | `app/Http/`, `app/Livewire/` |
| Console | 16 comandi: `AssignRoleCommand`, `AssignTeamCommand`, `AssignTenantCommand`, `ChangePasswordCommand`, `CreateTeamCommand`, `CreateTenantCommand`, `PassportInstallCommand`, `SuperAdminCommand`, `ShowUserListCommand`... | `app/Console/Commands/` |
| Rotte | Caricate (`php artisan route:list --json` da `laravel/`, 2026-10-14, 461 rotte totali): `POST /logout` (`routes/web.php`), `POST /api/user/login`, `GET /api/v2/user`, `GET /api/v2/logout` (`routes/api.php`) e il pannello Filament `user::admin` sotto `/user/admin` (111 rotte). NON caricate: `routes/web_tall.php` (`{lang}/register`, `password/reset`, `email/verify`) e `routes/socialite.php` (`/admin/login/{provider}`, `/sso/{provider}/callback`) non compaiono nell'elenco; `routes/auth.php` e' interamente commentato | `routes/` |
| Config | `config.php` (solo `name`, `description`, `icon`, `navigation`), `passport.php`, `password.php`, `services.php`, `socialite.php` (`domain_allowlist`, `registration`, `providers`, `login_page_route`, `remember_login`), `social-providers.php` | `config/` |
| Migrazioni | 102 file: 79 nella radice di `database/migrations/` (74 `.php`, gli altri sono `.fortify`, `.boh` e simili), 15 in `_bak/`, 8 in `_legacy/`; 6 file `create_profiles_table` sono ancora attivi nella radice | `database/migrations/` |
| Lingue | 32 cartelle locale | `lang/` |
| Test | 185 file `.php` su 316 file (Feature: Actions, Auth, Authentication, Filament, Models, Passport; Unit: Actions, Models, Traits, Filament, Passport...) | `tests/` |

Quick start (da `laravel/`, eseguito il 2026-10-14 solo per PHPStan): `./vendor/bin/phpstan analyse Modules/User`. Per i test usare solo `bash bashscripts/tools/pest-scratch-db.sh <file di test>` con `DB_DATABASE_LIMESURVEY= APP_CONFIG_CACHE=/nonexistent/config.php`, perche' con la config cache i test colpiscono il database di sviluppo (nota di memoria `pest-scratch-db-needs-config-cache-bypass`); i test non sono stati rieseguiti in questa sessione.

Limiti noti (verificati 2026-10-14): (1) 35 chiamate `Log::debug|info|warning|error` in 9 file di `app/` (`ProfileEditVoltComponent` 16, `LogoutListener` 6, `Widgets/LogoutWidget` 3, `Widgets/Auth/LogoutWidget` 2, `Http/Livewire/Auth/Logout` 2, `UserObserver` 2, `CreateUserAction` 2, `UserServiceProvider` 1, `EditUserWidget` 1), mentre `README.md` dichiara i `Log::` vietati in Actions, Models, Services e Widget; (2) la proprieta' dello schema `profiles` non e' stabilita: `README.md` indica il modulo WorkOrder, che non esiste in `laravel/Modules/`, mentre `wiki/log.md` indica Fixcity e User ha ancora 6 migrazioni `create_profiles_table` attive (dettagli nella story `stories/docs-user-studio-e-ingressi.story.md`); (3) `README.md` dichiara "PHP 8.3+, Laravel 11/12", ma `laravel/composer.json` richiede PHP `^8.4` e `laravel/framework ^13.0`.

## 🗂️ **Mappa delle directory di `docs/`**

| Classe | Directory (file `.md`) | Uso |
|---|---|---|
| Canonico | `00-INDEX.md` (questo), `README.md`, `decision-log.md`, `wiki/` (227: `concepts` 67, `integrations` 81, `troubleshooting` 16, `rules` 11), `stories/` (112 file), `bmad/` (104) | Leggere e aggiornare qui |
| Evidence | `investigation/` (1), `quality-analysis/` (2), `outputs/` (1), `raw/` (19, immutabile), `screenshots/`, `bug-fixes/`, `bugfix/`, `bugs/`, `bug-tracking/`, `fixes/` | Diagnosi e prove, non regole |
| Legacy | `archive/` (711), `_archive/` (244), `-integration/` (33), `_integration/` (36), `root-md-files/`, `root-txt-files/`, `console_commands/` e `console-commands/` (doppione di nome), i 1538 `.md` sparsi nella radice di `docs/` | Non usare come fonte; la riorganizzazione richiede la migration map DOC-004/DOC-006 |

Directory senza `.md` attivi (vuote o con soli `.bak`): `logs/`, `schema/`, `tasks/`, `_docs/`, `root-code-workspace-files/`.

## ⚠️ **Ingressi duplicati**

- `00-index.md`: stub di redirect verso questo file (ex copia byte-per-byte / collisione maiuscole).
- `00-index-indice-documentazione-modulo-user.md`: variante con link a nomi di file senza data e front matter diverso, non canonica.
- `INDEX.md` (6915 righe, 6277 link) e `index.md` (3419 righe, 3133 link): elenchi generati dell'albero `docs/`, senza front matter al 2026-10-14; 1778 e 887 dei loro link non si risolvono. `archive/index.md` e `_archive/INDEX.md` sono copie dello stesso elenco, con parte dei percorsi riscritta (3133 link ciascuna, 2108 e 2106 non risolti; la prima ha in testa "Contenuto assorbito da `INDEX.md`"). `wiki/integrations/_da-riconciliare/INDEX.md` e `index.md` sono elenchi di quella cartella con 442 link non risolti ciascuno. Non usarli per navigare.
- `README.md` (2352 righe): il corpo di `readme.md` e' stato incollato dopo la riga 131 (commento "Merged from readme.md"; il suo front matter e' ora un blocco di codice) e lo stesso corpo e' ripetuto due volte (righe 155-1253 e 1257-2352, uguali al 99,8% prima delle note). Il testo e' in gran parte non verificato: stack, struttura di cartelle, Services e Quick Start erano falsi e sono smentiti con 11 note marcate "Nota 2026-10-14". Leggere le righe 1-129 e la prima copia, con quelle note.

## 🔗 **Link non risolti: cause misurate (2026-10-14)**

Misura con `docs-organizer.py links --by-name --busy-minutes 0` (dry-run): 14194 eventi in 1740 file. Con il filtro di default (salta i file toccati da meno di 10 minuti) lo stesso comando ne mostrava 11. Campione casuale di 200 eventi (seed 20261014), classificato controllando il disco e `git log`:

| Causa | Campione | Popolazione |
|---|---|---|
| Il bersaglio esiste ma in 2 o piu' copie (`archive/`, `_archive/`, `_integration/`, `wiki/`, radice): il tool non sceglie | 139 (69,5%) | 10022 (70,6%) |
| Mai esistito: nessuna traccia in `git log` ne' un file con quel nome | 14 (7%) | 1011 (7,1%) |
| File non `.md` assente (codice PHP, json, immagini) | 11 (5,5%) | 761 (5,4%) |
| Verso altri moduli, temi o `docs/` della radice con profondita' sbagliata, nome in minuscolo o modulo assente (`SaluteOra`, `Patient`, `Chart`, `Dental`; `Predict` mai citato) | 33 (16,5%) | circa 2217 (15,6%) |
| Esisteva in git, poi spostato, rinominato (anche senza data nel nome) o cancellato | 3 (1,5%) | 164 (1,2%) |
| Link a una cartella inesistente | 0 | 19 (0,1%) |

Concentrazione: 7763 eventi (54,7%) stanno in 6 elenchi generati (`archive/index.md` 2108, `_archive/INDEX.md` 2106, `INDEX.md` 1778, `index.md` 887, `wiki/integrations/_da-riconciliare/INDEX.md` e `index.md` 442 ciascuno). Senza di essi restano 6431 eventi. La causa dominante non e' un percorso sbagliato ma la duplicazione dei documenti: risolverla richiede la migration map DOC-004/DOC-006, non altri `--fix`.

## 🎯 **Lettura Essenziale**
1. [scopo.md](./scopo.md) - Perche' User esiste (identita', permessi, organizzazione) e confini.
2. [README.md](./README.md) - Panoramica del sistema di identità (leggere con le avvertenze di "Ingressi duplicati").
3. [roadmap.md](./roadmap.md) - Evoluzione 2026: Biometric Auth & AI Moderation.
4. [philosophy.md](./philosophy.md) - "Essere Unici": la gestione dell'identità digitale.
5. [stories/phpstan-test-wave-user-b.story.md](./stories/phpstan-test-wave-user-b.story.md) - Ondata test: tipizzazione team/factory (scopo prima dell'errore).
6. [stories/phpstan-wave-coord.story.md](./stories/phpstan-wave-coord.story.md) - Wave PHPStan (TSV `.cursor-scratch/phpstan-wave/User.tsv`).

## 👥 **Team e contratti**
- 📜 **[TeamContract](./contracts/teamcontract.md)** — API + nullability (`personalTeam()`, `belongsToTeam(?TeamContract)`).
- 🧠 **[Perché TeamContract](./team-contract-usage-reasoning.md)** — DIP, STI, perché i test tipizzano.
- 🔗 **[HasTeamsAndUserContract](./contracts/hasteamsandusercontract.md)** — Contratto composto utente+team.

## 🏗️ **Architettura & Auth**
- 🔐 **[Authentication Flow](./authentication.md)** - Dettagli sul ciclo di vita della sessione.
- 📜 **[Permissions System](./permissions.md)** - Gestione ruoli e permessi con Spatie.
- 🎫 **[Passport & SSO](./passport-integration.md)** - Integrazione OAuth2 e Single Sign-On.
- 🧷 **[Passport Model Wrappers](./passport-model-wrappers.md)** - Mappa obbligatoria tra model vendor Passport e wrapper `Oauth*` locali.
- 🛡️ **[2FA Guide](./2fa-guide.md)** - Implementazione dell'autenticazione a due fattori.

## 🪮 **Ponytail audit**
- 📋 **[Over-engineering audit](./ponytail-audit-over-engineering.md)** - Policy stub e contracts inutilizzati.
- 🗄️ **[Archiviazione Contracts orfani e backup lang](./wiki/decisions/contracts-and-lang-backup-archival.md)** (file rinominato, oggi e' solo uno stub deprecato che rinvia a se stesso: il testo originale e' nella cronologia git) - `ModelContract`, `PassportHasApiTokensContract` archiviati (`.bak`); 281 backup lang → `lang/{locale}/*.php.bak` in-place ([regola no-Legacy](../../../../docs/wiki/concepts/no-legacy-folders-code.md)).

## 👤 **Profilo & Moderazione**
- 🧑‍🎨 **[Profile Management](./profile-management.md)** - Gestione estesa dei dati utente (EAV).
- ⚖️ **[Moderation Strategy](./user-moderation-strategy.md)** - Workflow per approvazione e ban (dentisti, cliniche, utenti).
- 🧬 **[BaseUser Architecture](./baseuser.md)** - La classe base che unifica l'identità nel sistema.

## ⚙️ **Integrazioni Filament**
- 🏗️ **[Filament Resources](./filament-resources-updated.md)** - Gestione utenti, ruoli e permessi in v5.
- 🔑 **[Passport Cluster](./passport-cluster-summary.md)** - Gestione centralizzata delle chiavi API.
- ⚡ **[Auth Widgets](./login-widget-fix.md)** - Componenti di login/registrazione riutilizzabili.
- 🔐 **[Socialite + Microsoft OAuth](./socialite-microsoft-integration.md)** - Integrazione autenticazione Microsoft (NEW)
- 📋 **[Livewire → Filament planning](./bmad/livewire-to-filament-planning.md)** - Matrice MIGRATE|REUSE|KEEP|RETIRE. **W0 ✓ (2026-10-20):** legal panel `REUSE` widget — HTTP `TermsOfService`/`PrivacyPolicy` ritirati; alias `_components.json` solo `profile.delete-account`. [Inventario Xot](../../Xot/docs/bmad/livewire-to-filament-widgets-inventory.md) · [fleet story](../../Xot/docs/bmad/stories/livewire-to-filament-widgets-fleet.story.md) · [livewire-inventory](./bmad/livewire-inventory.md).

## 🧪 **Qualità e Sviluppo**
- ✅ **[PHPStan Analysis](./phpstan-level10-user-fixes.md)** - Report di conformità Level 10.
- 🚨 **[PHPStan Syntax Blockers](./phpstan-syntax-blockers.md)** - Stato al 2026-07-08: cluster di syntax error da merge conflict e factory corrotte, segnato come risolto (file rinominato senza la data nel nome).
- 🧭 **[IDE Helper Models Wave](./ide-helper-models-wave.md)** - Distinzione tra errori sandbox e reali durante `php artisan ide-helper:models -W` (file rinominato senza la data nel nome).
- 🔬 **[Testing Rules Summary](./testing.md)** - Regole di test del modulo (Pest); non e' la stessa cosa di [testing-harness.md](./testing-harness.md).
- 🧪 **[Harness dei test e factory](./testing-harness.md)** - `Modules\User\Tests\TestCase` (FQCN), helper `require*`/`skipUnless*`, factory tipizzate dal resolver di `XotServiceProvider`. Stub UPPERCASE: `TESTING.md`.
- 🌊 **[PHPStan, ondata test 2026-10-20 (user-b)](./stories/phpstan-test-wave-user-b.story.md)** - Cause alla sorgente, file neutralizzati, decisioni aperte.
- 🌊 **[PHPStan swarm wave User](./stories/phpstan-user-swarm-wave.story.md)** - Bucket `.cursor-scratch/phpstan-wave/User`: 99 errori owned → 0; Feature/UserModelTest locked fuori scope.
- **[PHPStan, ondata test 2026-10-20 (lane user, 14 file rimasti)](./stories/phpstan-test-wave-user.story.md)** - Cause per famiglia, contratti dei permessi allineati, cosa resta (Tenant, Pest, harness).
- **[PHPStan, ondata test 2026-10-20 (user-a, 39 file)](./stories/phpstan-test-wave-user-a.story.md)** - Produzione (`LoginWidget`, contratti, `routes/auth.php`, `lang/it/auth.php`), helper 2FA, specifiche fantasma neutralizzate, decisioni aperte.
- 🧬 **[Model Inheritance](./model-inheritance-rules.md)** - Regole per estendere il modello User.
- 🧪 **PSR-4 Test Helpers** - Nei test trait/helper preferire anonymous classes o fixture dedicate sotto `tests/` con percorso coerente PSR-4.

## 🧹 **Manutenzione**
- 🗑️ **[Cleanup Plan](./todo.md)** - Stub di 22 righe (`module: theme`) il cui `canonical` `Themes/docs/shared-components/todo.md` non esiste. Stato reale al 2026-10-14: 3360 file `.md` in `docs/` (1538 nella radice), di cui 602 stub con `canonical:` verso `Themes/docs/shared-components/` (0 bersagli esistenti). Piano di riordino: `bmad-output/stories/docs-organization/` (DOC-004, DOC-006 richiedono una migration map approvata).

## 📦 **Pacchetti Composer**
- [Riferimento](../../../../docs/wiki/rules/composer-packages-reference.md) (la pagina a sua volta rinvia a `laravel/docs/composer-packages-reference.md`, che non esiste) | Inventario 312 pacchetti (`docs/architecture/composer-packages-full-inventory.md`) _(target mancante, verificato 2026-10-14)_
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
