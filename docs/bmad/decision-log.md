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

## [2026-09-21] Icone Filament = set auto-registrato `user-`

**Decision:** `x-filament::icon-button` con `user-superadmin` / `user-negate-superadmin`. I nomi senza prefisso (`super-admin`) cercano il set default e non esistono. Vista `super-admin-toggle`.

**Rationale:** [Filament 5 icons](https://filamentphp.com/docs/5.x/styling/icons) + [icon-button](https://filamentphp.com/docs/5.x/components/icon-button). Il modulo già registra `resources/svg` con prefisso `user`.

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
