---
title: "Decision log — SuperAdmin widget"
type: decision-log
module: User
status: active
related:
  - ./project-context.md
  - ./livewire-widget-project-context.md
  - ./brainstorming.md
  - ./livewire-widget-brainstorming.md
  - ./architecture.md
  - ./livewire-inventory.md
  - ./epics.md
---

# Decision log — SuperAdmin Livewire → Filament widget

## [2026-09-21] Superman / Clark Kent, gli altri SVG restano

**Decision:** il toggle usa `user-superman` (`superman.svg`) e `user-clark-kent` (`clark-kent.svg`). Non si cancellano `superadmin.svg`, `negate-superadmin.svg`, `user-super-admin.svg`, `user-negate-super-admin.svg`, `user-superman.svg`, `user-clark-kent.svg`.

**Rationale:** super-admin è l’identità svelata; negate-super-admin è lo stesso privilegio sotto mentite spoglie. Occhiali vs cappa si leggono a 16px. Filename con `user-` nel modulo `user` diventano `user-user-*` e non si usano nel `icon=`. Nessuno scudo/logo registrato: outline originale.

## [2026-09-21] Vista convenzionale, niente pin `$view`

**Decision:** una sola blade `super-admin.blade.php`. `XotBaseWidget::resolveView()` + `GetViewByClassAction` la trovano da sole. Rimossa `super-admin-toggle`.

**Rationale:** DRY. Il pin esisteva solo perché la vista convenzionale aveva perso il prefisso `user-`. Sistemata quella, il secondo file era rumore. Test: asserire il path dello scudo (`M12 3l7 3v5c0…`), non un generico `<svg>` (il loading indicator di `icon-button` è già un SVG).

## [2026-09-21] Icone Filament = set auto-registrato `user-`

**Decision:** `x-filament::icon-button` con `user-superadmin` / `user-negate-superadmin`. I nomi senza prefisso (`super-admin`) cercano il set default: `blade-icons.fallback` è `''`, quindi bottone vuoto senza errore.

**Rationale:** [Filament 5 icons](https://filamentphp.com/docs/5.x/styling/icons) + [icon-button](https://filamentphp.com/docs/5.x/components/icon-button). Custom SVG = `{prefix}-{filename}`. Qui prefix = `user`. Stroke `currentColor` sul root, come Heroicon: il panel non ha `viteTheme()`, solo classi `fi-*`.

## [2026-09-21] Emblema hero outline, non corona ruotata

**Decision:** il toggle SuperAdmin usa due SVG originali outline (`user-super-admin` / `user-negate-super-admin`): scudo a goccia, anello-nucleo, fulmine. Attivo = nucleo acceso + flare; negato = stesso scudo spento + barra. Animazione CSS dentro la SVG, spenta con `prefers-reduced-motion`. Vista `super-admin-hero` perché i nomi `@svg('user::svg…')` non esistono nel set Blade Icons (`prefix-filename`).

**Rationale:** privilegio elevato = emblema da supereroe, non un pezzo degli scacchi né un logo registrato. Outline + `currentColor` resta chrome Filament. Il moto è ambientale (respiro), non un loader.

## [2026-09-21] Due icone distinte, non re ruotato

**Decision:** il toggle SuperAdmin nel user menu usa due SVG di dominio già nel modulo (`user-superadmin` corona / `user-negate-superadmin` corona barrata), colori Filament `warning` / `danger`. Si abbandona `fas-chess-king` + `rotate-180`.

**Rationale:** lo stesso glifo ruotato è un rebus, non uno stato. Il re degli scacchi è un pezzo di gioco; il ruolo è privilegio elevato vs privilegio revocato. La corona è il metaforo giusto; la barra è il “no” universale. Le SVG esistevano già inutilizzate: DRY. Il marcatore di test passa da `rotate-180` a `data-super-admin-state`. FR-001 e [ux-design.md](./ux-design.md) aggiornati; trait e hook invariati.

## [2026-09-21] Track Quick Flow

**Decision:** questo slice è Quick Flow (4 story, un epic). Si producono comunque brief, PRD, architecture, UX, tech-spec perché l’utente ha chiesto il pacchetto BMAD completo, restando su scope piccolo.

**Rationale:** requisiti chiari, un modulo, nessun DB nuovo. Un PRD Enterprise sarebbe rumore.

## [2026-09-21] Widget via render hook, non dashboard

**Decision:** il widget si monta solo su `PanelsRenderHook::USER_MENU_BEFORE` (oggi `panels::user-menu.before`). Non entra in `$panel->widgets()` / griglia dashboard.

**Rationale:** è un controllo di identità nel chrome del panel, non un KPI. `discoverWidgets` su `Modules/User/app/Filament/Widgets` lo troverebbe: `static $isDiscovered = false`.

## [2026-09-21] XotBaseWidget, non XotBaseSchemaWidget

**Decision:** niente form. Un click sull’icona chiama `toggleSuperAdmin()` e redirect 303 sulla URL corrente.

**Rationale:** oggi il Livewire non ha schema. `XotBaseSchemaWidget` è per form/auth. DRY: non inventare un form per un toggle.

## [2026-09-21] Business logic resta sul profilo

**Decision:** nessuna Action nuova. Si continua a chiamare `XotData::make()->getProfileModel()->toggleSuperAdmin()`.

**Rationale:** il trait `IsProfileTrait` è già la SSoT (scambio `super-admin` ↔ `negate-super-admin`). Duplicare in una Action sarebbe teatro.

## [2026-09-21] AdminPanelProvider è l’unico punto di montaggio

**Decision:** la story 9.2 tocca **solo** `AdminPanelProvider.php`. Si sostituisce `Blade::render("@livewire('profile.super-admin')")` con il FQCN del widget. L’hook `team.change` non si tocca.

**Rationale:** due hook distinti sullo stesso `USER_MENU_BEFORE`. Mescolarli in una story crea conflitti di lock.

## [2026-09-21] GitHub issue/discussion

**Decision:** tracciamento reale su `laraxot/module_user_fila5`: issue [#100](https://github.com/laraxot/module_user_fila5/issues/100), discussion [#101](https://github.com/laraxot/module_user_fila5/discussions/101). Ogni story 9.x e 10.x punta a questi due URL.

**Rationale:** [016-github-issue-discussion-in-every-story.md](../../../../../docs/wiki/rules/016-github-issue-discussion-in-every-story.md). `gh` autenticato il 2026-09-21.

## [2026-09-21] Campagna widget-only (14 Livewire)

**Decision:** inventario completo in [livewire-inventory.md](./livewire-inventory.md). Epic 9 resta SuperAdmin; Epic 10 chiude team, social (widget esistente), gemelli auth, DeleteAccount, Privacy/Terms. Nessun PHP in questa sessione.

**Rationale:** il 500 `filament-jet` è un fallimento di **contenitore**, non di un solo componente. Due stack UI sullo stesso chrome sono un rischio di identità.

## [2026-09-21] Gemello esistente batte classe nuova

**Decision:** `SocialLoginWidget` e i widget Auth coprono Cluster B. 10.2/10.3 ritirano HTTP, non riscrivono login.

**Rationale:** ADR-C002. Un terzo login è un bug di sicurezza.

## [2026-09-21] ViewCopyAction vietata in render

**Decision:** nessun `ViewCopyAction` nei componenti UI User dopo Epic 10.

**Rationale:** mutazione disco a request. Theming = deploy, non `render()`.

## [2026-09-21] Riconciliazione analisi parallele

**Decision:** un canone [livewire-inventory.md](./livewire-inventory.md). Epic 9+10. Niente Epic 11. Niente `ButtonsWidget`. I file `conversion-inventory`, `advantages-*`, `consolidation-*` e le story `10.1.socialite` / `11.1` sono stub.

**Tenuto:** categoria chrome vs pagina; grep Notify vendor; 403 post-click vs `canView`; Buttons/Change non 500 oggi; security delete; ritiro HTTP dopo smoke; gap route FO vs panel su SocialLoginWidget.

**Scartato:** widget senza round-trip Livewire; `/admin` ancora rotto; UI/Lang in questa campagna; Socialite P3; nuova classe social 1:1; 303 team come epic proprio.

## [2026-09-21] Icone SuperAdminWidget invisibili — root cause morph map

**Sintomo:** `SuperAdminWidget` renderizzava `<div>` vuota per utenti super-admin — le icone `@svg('user-super-admin')`/`user-negate-super-admin` non apparivano mai nel chrome `USER_MENU_BEFORE`.

**Root cause (verificata, non ipotizzata):** `IsProfileTrait::isSuperAdmin()` chiama `$this->user->hasRole('super-admin')`, dove `Profile::user` risolve `Modules\Quaeris\Models\User` (la user class canonica, `XotData::getUserClass()`). La morph map registrata da `TenantServiceProvider::buildMorphMap()` leggeva `config('morph_map')` con `'user' => Modules\User\Models\User` (classe padre) — Quaeris\ServiceProvider la mappava correttamente a `Quaeris\Models\User` in `boot()`, ma il provider Tenant sovrascriveva dopo. Risultato: `Quaeris\User::getMorphClass()` = FQCN, mentre `model_has_role.model_type` contiene `'user'` → query `roles()` filtrava il morph sbagliato → ruoli invisibili → widget vuoto.

**Decision:** in `buildMorphMap()` forzare `$typedMap['user'] = XotData::make()->getUserClass()` dopo il loop config — la chiave 'user' è sempre la classe canonica dell'install, mai la voce stantia. Allineato `config/localhost/morph_map.php`.

**Data debt:** `model_has_role` contiene ancora 40 righe con `model_type='Modules\Quaeris\Models\User'` (scritte prima del fix) — richiedono `UPDATE model_has_role SET model_type='user' WHERE model_type='Modules\Quaeris\Models\User'`. Non eseguita: scrittura DB da approvare.

**Verifica:** tinker — `getMorphClass()='user'`, `isSuperAdmin()=true`, widget renderizza `data-super-admin-state` (LEN 2293).

**Rationale:** regola contract-pattern — i morph alias devono puntare alla classe canonica, non a superclassi. Il fix è nel punto singolo di costruzione della mappa, non per-callsite.
