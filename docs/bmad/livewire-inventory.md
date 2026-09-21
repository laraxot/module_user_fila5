---
title: "Inventario piattaforma — Livewire HTTP → Filament widget"
type: inventory
module: User
status: approved
track: livewire-to-filament-widget
related:
  - ./advantages-filament-only.md
  - ./livewire-widget-project-context.md
  - ./livewire-widget-architecture.md
  - ./livewire-widget-prd.md
  - ./livewire-widget-tech-spec.md
  - ../stories/9.1.super-admin-widget.story.md
  - ../stories/9.2.admin-panel-provider-hook.story.md
  - ../stories/9.3.remove-livewire-superadmin.story.md
  - ../stories/9.4.super-admin-widget-tests.story.md
  - ../stories/10.1.team-change-widget.story.md
  - ../stories/10.2.socialite-buttons-widget.story.md
  - ../stories/10.3.retire-auth-livewire-twins.story.md
  - ../stories/10.4.retire-gdpr-profile-livewire.story.md
  - ../stories/11.1.team-change-widget.story.md
---

# Inventario piattaforma: Livewire HTTP → Filament widget

**SSoT cross-modulo.** Fonte canonica unica per la campagna di conversione Livewire HTTP → widget Filament.
Ogni modulo mantiene il proprio inventario locale in `docs/bmad/livewire-inventory.md`; questo file
coordina le decisioni di piattaforma e il verdetto per ogni componente.

**Docs only. Nessun PHP convertito, nessuna cancellazione eseguita in questa sessione.**

## Metodo

Per ogni classe in `Modules/*/app/Http/Livewire` sono stati verificati, sull’intero repository:

```bash
find Modules/<Mod>/app/Http/Livewire -name '*.php'
grep -rn "@livewire(" Modules/<Mod> --include="*.blade.php"
grep -rn "<livewire:" Modules/<Mod> --include="*.blade.php"
grep -rn "Livewire::component" Modules/<Mod>
grep -rn "Http\\Livewire\\" Modules/<Mod>
find Modules/<Mod>/routes -type f
find Modules/<Mod>/app/Filament -type f
```

Verifica di montaggio: hook Filament (`renderHook`), direttiva `@livewire`, tag `<livewire>`,
registrazione esplicita, routing, viste Blade, test. Verifica gemelli: widget Filament esistenti nello
stesso modulo.

## Religione piattaforma

Constitution: [Xot livewire-widget-project-context](../../Xot/docs/bmad/livewire-widget-project-context.md).

1. Filament 5 è il panel. Un widget Filament **è** Livewire (`XotBaseWidget`). Si elimina il guscio
   `Http\Livewire` sbagliato, non Livewire.
2. Chrome (user menu, login-after) → `XotBaseWidget`, hook FQCN, `$isDiscovered = false`.
3. KPI dashboard → widget Filament standard (discoverable).
4. Pagina FO / token / legal / profilo ≠ widget forzato. HTTP gemello di widget esistente = **ritiro**.
5. Estendere `XotBaseWidget` / `XotBaseSchemaWidget`, mai `Filament\Widgets\Widget` o
   `Livewire\Component` nudo per UI admin.
6. Non convertire `XotBaseComponent`: è la base storica HTTP, non un controllo da montare.
7. `ViewCopyAction` vietata in `render()`.
8. Documentazione nel **modulo proprietario** (`docs/bmad/`), non in User.

## Verdetto per modulo

| Modulo | Http/Livewire | Verdetto | Canone |
|--------|---------------|----------|--------|
| **User** | 14 classi, 3 hook panel | chrome 9.x/10.1–10.2; ritiro gemelli auth; legal → Gdpr | [User](./livewire-inventory.md) |
| **UI** | DarkModeSwitcher, Toast | ritiro HTTP; widget già SSoT | [UI](../../UI/docs/bmad/livewire-inventory.md) |
| **Lang** | Change, Switcher | ritiro HTTP; `LanguageSwitcherWidget` | [Lang](../../Lang/docs/bmad/livewire-inventory.md) |
| **Xot** | `XotBaseComponent` + alias orfani | **non** convertire la base; 12.1 alias | [Xot](../../Xot/docs/bmad/livewire-inventory.md) |
| **Notify** | nessuno HTTP; hook vendor | FQCN su `DatabaseNotifications`; non forkare | [Notify](../../Notify/docs/bmad/livewire-inventory.md) |
| **Job** | Status, Schedule/*, Broad (`dd`) | ritiro orfani P0 Broad | [Job](../../Job/docs/bmad/livewire-inventory.md) |
| **Quaeris** | QuestionChart + QuestionCharts (Widget in HTTP) | spostare, non clonare | [Quaeris](../../Quaeris/docs/bmad/livewire-inventory.md) |
| **Geo** | Test, FormSearchAddressCategories | FO / test ≠ widget dashboard | [Geo](../../Geo/docs/bmad/livewire-inventory.md) |
| **Cms** | Page/Show | pagina FO, non KPI | [Cms](../../Cms/docs/bmad/livewire-inventory.md) |
| **Media** | Card/Video/Clip | FO video, non KPI | [Media](../../Media/docs/bmad/livewire-inventory.md) |
| **Gdpr** | zero HTTP; accoglie legal User | no `PrivacyPolicyWidget` | [Gdpr](../../Gdpr/docs/bmad/livewire-inventory.md) |
| Chart, Setting, Tenant, Activity, AI, CloudStorage, DbForge, Limesurvey | zero classi HTTP | inventory = gate, nessun epic | `Modules/<Mod>/docs/bmad/livewire-inventory.md` |

## Cluster A — chrome. Convertire.

| Modulo | Classe | Alias / hook | Gemello | Story |
|--------|--------|--------------|---------|-------|
| User | `Profile\SuperAdmin` | `profile.super-admin` / `user-menu.before` | nessuno → `SuperAdminWidget` | **9.x** |
| User | `Team\Change` | `team.change` / `user-menu.before` | nessuno → `TeamChangeWidget` | **10.1** |
| User | `Socialite\Buttons` | `socialite.buttons` / `auth.login.form.after` | `SocialLoginWidget` (estendere, non clonare) | **10.2** |

Provider conteso: 9.2 → 10.1 → 10.2 (un blocco per story). Hook su righe diverse: merge facile.

## Cluster B — ritirare HTTP.

| Modulo | Classe | Gemello | Nota |
|--------|--------|---------|------|
| User | `Auth\Login` | `LoginWidget` | solo unit test, nessuna route |
| User | `Auth\Register` | `RegisterWidget` | `ViewCopyAction` |
| User | `Auth\Logout` / `AuthLogout` | scegliere **un** `LogoutWidget` | `AuthLogout`: bug `htmlspecialchars(): array given` |
| User | `Auth\Verify` | nessun widget | ritiro; FO/Volt è altro epic |
| User | `Passwords\Email/Reset/Confirm` | Forgot / Reset / Confirm widgets | scegliere SSoT tra i doppi reset |
| UI | `DarkModeSwitcher` | `DarkModeSwitcherWidget` | gemello morto; Filament 5 ha dark mode nativo |
| UI | `Toast` | nessuno | ritiro se grep resta solo la classe |
| Lang | `Change`, `Switcher` | `LanguageSwitcherWidget` | due HTTP identici + un widget = tre switcher |
| Job | `Broad` | nessuno | `dd('fine')` in `notifyEvent`; P0 locale |
| Job | `Job\Status` | Page `JobStatus` | contenuto di Page instradata; ritiro classe + vista |
| Job | `Schedule\Status` | nessuno | viste AdminLTE senza rotta |
| Job | `Schedule\Crud` | `ScheduleResource` | Resource Filament già SSoT per scheduling |
| Geo | `Test` | nessuno | WIP vuoto |
| Geo | `FormSearchAddressCategories` | View Component | FO indirizzi, non KPI dashboard |
| Cms | `Page/Show` | nessuno | pagina FO (slug, cache, theme) |
| Media | `Card/Video/Clip` | nessuno | FO video + modal; nessun punto di montaggio vivo |

## Cluster C — profilo / Gdpr.

| Modulo | Classe | Destinazione | Story |
|--------|--------|--------------|-------|
| User | `DeleteAccount` | widget/pagina profilo; password confirm; `DeleteUserAction` locked | **10.4** |
| User | `PrivacyPolicy` / `TermsOfService` | delete User; Gdpr | **10.4** |

## Gap verificato: Buttons vs SocialLoginWidget (10.2)

| | `Http/Livewire/Socialite/Buttons` | `Auth/SocialLoginWidget` |
|---|---|---|
| Config | `config('filament-socialite.providers')` | `config('services.{google,microsoft,github}.client_id')` |
| Route click | `socialite.oauth.redirect` | `socialite.oauth.fo.redirect` (**FO**, non panel) |
| Markup | `x-filament::button` + `user::auth.login-via` | card custom + `user::auth.login.or_continue_with` |

Montare il widget com’è oggi sul login **admin** manderebbe OAuth sul redirect FO. 10.2 deve:
(1) una SSoT config; (2) parametro `redirectRoute` (o equivalente) sul widget esistente;
(3) **zero** terza classe.

## Team/Change: rischio redirect (10.1)

`switchTeam()` fa `redirect($path, 303)` da un metodo pubblico Livewire puro. Un `XotBaseWidget` è
comunque un componente Livewire sotto il cofano, quindi il meccanismo dovrebbe restare identico — ma
nessun widget già esistente nel modulo (`RegisterWidget`, `LoginWidget`, `SocialLoginWidget`) fa un
redirect da un metodo custom. Verificare per primo, prima di scrivere il resto del widget.

## Vantaggi di avere solo widget (non anche HTTP)

| Vantaggio | Fatto nel repo |
|-----------|----------------|
| FQCN vs alias | `@livewire('team.change')` non è visibile a PHPStan; `TeamChangeWidget::class` sì |
| Un namespace vista | `user::filament.widgets…` / GetViewByClassAction. Fine `filament-jet::` |
| Discovery + `$isDiscovered` | Chrome fuori dalla dashboard; KPI dentro |
| Lang / XotBase | stesso albero dei Resource |
| Niente `ViewCopyAction` in `render()` | Register/Verify/password HTTP scrivono il tema a ogni hit |
| Un login | due implementazioni = due bug di sicurezza |
| Confine modulo | legal in Gdpr, campanelle in Notify |

Falso (scartato): “il widget evita il round-trip Livewire”. Falso: il widget *è* Livewire
(`CanBeLazy` incluso). Il guadagno è il contratto panel, non i millisecondi.

Falso (scartato, 2026-08-25): “oggi `/admin` è rotto”. Le viste chrome sono già su `user::`
([filament_errors.md](../filament_errors.md)). L’urgenza è la **classe di difetto**, non il 500 attuale.

## Perché è urgente

Onestà: Buttons e Change **non** 500-ano oggi. SuperAdmin ha già esploso. Stesso montaggio stringa,
stesso file provider.

1. Tre alias nel chrome = `/admin` single point of failure al prossimo rename/hint path.
2. `ViewCopyAction` in produzione = I/O e race, non theming.
3. `TermsOfService::testfunction()` → `dddx('wip')`.
4. Login HTTP orfano + `LoginWidget` = superficie auth doppia.
5. Costo basso ora (hook FQCN); sale a ogni Blade/test che cita l’alias.

## Successo piattaforma

- [ ] Zero alias `@livewire('…')` / `<livewire:…>` nel chrome Filament
- [ ] `app/Http/Livewire` vuoto dove il gemello widget esiste
- [ ] Zero `ViewCopyAction` / `dddx` UI User
- [ ] Un SocialLoginWidget, due route (FO vs panel) via parametro
- [ ] `/admin` 200 senza hint path
- [ ] Ogni modulo ha `docs/bmad/livewire-inventory.md` come SSoT locale
