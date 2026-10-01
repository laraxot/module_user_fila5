---
<<<<<<< HEAD
title: "Brainstorming — SuperAdmin widget"
type: brainstorming
module: User
status: done
related:
  - ./decision-log.md
  - ./architecture.md
  - ./prd.md
  - ./livewire-widget-brainstorming.md
---

# Brainstorming: dove vive il toggle SuperAdmin

## Idea

Il toggle non è una pagina e non è un form. È un **privilegio visibile** nel chrome del panel. Tre contenitori possibili:

1. **Livewire HTTP** (oggi) — generico, alias stringa, già rotto con `filament-jet`.
2. **Badge Blade statico** (`user::badges.super-admin`, commentato nel provider) — niente click, viola il bisogno.
3. **Filament widget** (`XotBaseWidget`) montato sull’hook user-menu — chrome Filament, stesso Livewire sotto il cofano.

## Scelta

(3). Il widget Filament *è* un componente Livewire, ma nel namespace e nella discovery del panel.

## Scartato

- `userMenuItems()` MenuItem URL: non inverte un ruolo, naviga.
- Pagina Filament “Super admin”: troppa UI per un bit.
- Action nuova che wrappa `toggleSuperAdmin()`: il trait è già SSoT.
- Convertire anche `team.change` nello stesso slice: scope creep.
=======
title: "User — Brainstorming"
type: note
tags: [bmad, user, brainstorming, decisioni]
created: 2026-09-28
updated: 2026-09-28
qmd: "User brainstorming duplicazioni widget super admin logout login action socialite"
module: User
related:
  - ./brainstorming/module-opportunities.md
  - ./architecture.md
  - ./decision-log.md
  - ./prd.md
  - ./livewire-widget-brainstorming.md
  - ./livewire-widget-consolidation-decision-log.md
  - ./epics/epic-1-identity-core.md
---

# Brainstorming — User

> **SUMMARY**: il file radice raccoglie la decisione già presa sul toggle SuperAdmin (chrome Filament, non pagina né form) e le decisioni ancora aperte, ancorate ai duplicati reali trovati in `app/`: tre implementazioni di login, tre di logout, tre `CreateUserAction`, due `GetPermissionModelAction`, quattro directory di migrazione.

## Shard

- [brainstorming/module-opportunities.md](brainstorming/module-opportunities.md) — domande ad alto valore, ipotesi e rischi
- [filament-ux-brainstorming.md](filament-ux-brainstorming.md) · [module-excellence-brainstorming.md](module-excellence-brainstorming.md) · [perfection-brainstorming.md](perfection-brainstorming.md) · [livewire-widget-brainstorming.md](livewire-widget-brainstorming.md) · [livewire-widget-consolidation-decision-log.md](livewire-widget-consolidation-decision-log.md)

## Decisione chiusa — dove vive il toggle SuperAdmin

### Idea

Il toggle non è una pagina e non è un form. È un **privilegio visibile** nel chrome del panel. Tre contenitori possibili:

1. **Livewire HTTP** (prima) — generico, alias stringa, già rotto con `filament-jet`.
2. **Badge Blade statico** (`user::badges.super-admin`, commentato nel provider) — niente click, viola il bisogno.
3. **Filament widget** (`XotBaseWidget`) montato sull'hook user-menu — chrome Filament, stesso Livewire sotto il cofano.

### Scelta

(3). Il widget Filament *è* un componente Livewire, ma nel namespace e nella discovery del panel. Implementazione: `app/Filament/Widgets/Profile/SuperAdminWidget.php`; specifiche in [tech-spec-superadmin-widget.md](tech-spec-superadmin-widget.md) e [livewire-widget-consolidation-story-superadmin.md](livewire-widget-consolidation-story-superadmin.md).

### Scartato

- `userMenuItems()` MenuItem URL: non inverte un ruolo, naviga.
- Pagina Filament "Super admin": troppa UI per un bit.
- Action nuova che wrappa `toggleSuperAdmin()`: il trait è già SSoT.
- Convertire anche `team.change` nello stesso slice: scope creep.

## Decisioni aperte (evidenza sui file)

### A1 — Tre implementazioni di login

`app/Http/Livewire/Auth/Login.php`, `app/Filament/Pages/Auth/Login.php`, `app/Filament/Widgets/Auth/LoginWidget.php` e `app/Filament/Widgets/LoginWidget.php`.
**Domanda**: quale è il punto d'ingresso per l'utente nel pannello? Le traduzioni sono già allineate ([english-login-translation-parity.md](english-login-translation-parity.md)), la duplicazione no.

### A2 — Tre implementazioni di logout

`app/Http/Livewire/Auth/Logout.php`, `app/Http/Livewire/Auth/AuthLogout.php`, `app/Filament/Widgets/LogoutWidget.php` (più `LogoutWidget.php.corrected` congelato) e `app/Filament/Widgets/Auth/AuthLogoutWidget.php`.
**Domanda**: un solo contratto di logout e gli adattatori delegano?

### A3 — Tre `CreateUserAction`

`app/Actions/CreateUserAction.php`, `app/Actions/User/CreateUserAction.php`, `app/Actions/Socialite/CreateUserAction.php`.
**Domanda**: `User/CreateUserAction` è il SSoT e le altre due sono varianti (password vs social) o wrapper? Test esistenti: `tests/Unit/Actions/User/CreateUserActionTest.php` e `tests/Unit/Actions/RegisterOauthUserActionTest.php`.

### A4 — Due `GetPermissionModelAction`

`app/Actions/GetPermissionModelAction.php` e `app/Actions/Shield/GetPermissionModelAction.php`, entrambe usate dal gruppo `Shield/` (`ShieldUtilsAction`, `ResolvePermissionsConfigurationAction`).
**Domanda**: unificare sotto `Shield/` o sotto root?

### A5 — Quattro directory di migrazione

`database/migrations/`, `database/Database/Migrations/`, `database/migrations/_bak/`, `database/migrations/_legacy/`.
**Domanda**: quale è la sorgente dei tipi richiesti dal provider (test `tests/Feature/MigrateDbTest.php`, `tests/Feature/Database/migrations/UserMigrationSyntaxTest.php`)? Le copie in `_bak`/`_legacy` non devono essere applicate due volte.

### A6 — Modelli congelati accanto ai vivi

`Team.Jetstream`, `Membership.Jetstream`, `TeamInvitation.Jetstream`, `OauthAccessToken.php.old`, `BaseModel.php.backup-20251015-092511`, `HasRelations.php.old`, `app/Support/Utils.php.bak`.
**Domanda**: sono l'unico riferimento per una classe attesa da un test, o pesi morti? Stessa domanda dei contratti `CanComment.php.old`, `UserContract.php.to_xot`, `PassportHasApiTokensContract.php.old`.

### A7 — Provider Filament duplicati

`app/Providers/FilamentServiceProvider.fila2` e `app/Providers/UserPanelProvider.boh` restano accanto a `app/Providers/Filament/AdminPanelProvider.php`.
**Domanda**: congelati da archiviare o usati come base per una migrazione?

## Prossime mosse

1. Portare A1–A7 in [epics/epic-1-identity-core.md](epics/epic-1-identity-core.md) con AC verificabili.
2. Aggiornare [architecture.md](architecture.md) quando una duplicazione viene sciolta.
3. Aggiornare [decision-log.md](decision-log.md) per ogni scelta chiusa.
>>>>>>> laraxot/dev
