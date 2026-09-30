---
title: "UserResource — audit clustering RelationManager, Widgets, Actions"
type: analysis
module: User
status: done
created: 2026-09-29
updated: 2026-09-29
tags: [filament, user-resource, relation-managers, widgets, actions, dry, kiss, accessibility]
related:
  - ../bmad/stories/user-clustering-widgets-actions-audit-20260929.story.md
  - ./filament-resources-coverage-analysis.md
  - ./filament-resources-updated.md
  - ../bmad/filament-ux-brainstorming.md
  - ./concepts/duplicate-method-bodies.md
---

# UserResource — audit clustering, widget, action (2026-09-29)

Scope: `app/Filament/Resources/UserResource/**` (RelationManagers, Widgets, Actions),
`app/Filament/Actions/ChangePasswordAction.php`, `app/Filament/Actions/Header/AttachRoleAction.php`.
Fuori scope (owned da altro processo in corso, PID 5418): `Widgets/Auth/**`,
`Widgets/Profile/DeleteAccountWidget.php`, `Widgets/PrivacyPolicyWidget.php` — non toccati.

## 1. Clustering RelationManager: verificato che Filament v4 supporta un raggruppamento reale

Premessa da falsificare: "probabilmente Filament v4 supporta solo tab singole, non
nested groups". **Falsa.** Verificato nel codice vendor:

- `vendor/filament/filament/src/Resources/RelationManagers/RelationGroup.php` — classe
  nativa che accetta `label` + array di RelationManager.
- `vendor/filament/filament/src/Resources/Pages/Concerns/HasRelationManagers.php:152-163`
  — quando un elemento di `getRelations()` e' un `RelationGroup`, Filament genera **una
  sola tab** con icona/badge propri e vi renderizza in sequenza (stack verticale, non
  sub-tab) tutti i RelationManager del gruppo come componenti Livewire separati.

Non e' un "nested tabs selector": e' piu' tabelle Livewire indipendenti stackate in
un'unica tab. Tradeoff accettato: meno tab nella barra (piu' scannabile), piu'
scroll dentro la tab raggruppata (ogni RelationManager mantiene la propria
paginazione/ricerca).

`BaseUserResource::hasCombinedRelationManagerTabsWithContent()` (e il default identico
in `XotBaseResource`) governa se le tab dei RelationManager condividono la pagina con
il contenuto principale — e' un meccanismo ortogonale al raggruppamento tra loro, non
lo sostituisce.

### Decisione: raggruppamento implementato

`UserResource::getRelations()` (prima: auto-discovery via glob su `XotBaseResource`,
nessun controllo su ordine/raggruppamento) ora ritorna esplicitamente:

1. **Profilo** (`ProfileRelationManager`) — tab propria, dati personali, priorita' massima.
2. **Sicurezza** (`RelationGroup`, icona `heroicon-o-shield-check`) — `AuthenticationLogsRelationManager`
   + `DevicesRelationManager` + `ClientsRelationManager` + `OauthTokensRelationManager`.
3. **Organizzazione** (`RelationGroup`, icona `heroicon-o-building-office-2`) —
   `RolesRelationManager` + `TeamsRelationManager` + `TenantsRelationManager`.
4. **Social login** (`SocialiteUsersRelationManager`) — tab propria (bassa frequenza
   d'uso, non e' "sicurezza" in senso stretto: e' collegamento provider, non audit accessi).

Da 9 tab (10 originarie − 1 duplicato rimosso, vedi §2) a 4. Segue la proposta
dell'utente (Sicurezza / Organizzazione), con la sola differenza che `SocialiteUsers`
resta separata da "Sicurezza" per non sovraccaricare la tab con 5 tabelle stackate.

**Verifica non eseguita in questa sessione**: i tool browser (Playwright MCP, browser
in-app) non si sono connessi (`CONNECTION_CLOSED`) — il rendering reale delle tab
raggruppate **non e' stato verificato visivamente**. Rischio residuo: se
`RelationGroup::make()` o gli import non fossero esattamente compatibili con la
versione Filament installata, la pagina `ViewUser` potrebbe rompersi per *tutti* gli
utenti. Raccomandazione: prima di considerare la story "done", un agente con accesso
browser deve aprire `.../admin/users/{id}` e confermare che le 4 tab si vedono e che
"Sicurezza"/"Organizzazione" mostrano le tabelle stackate senza errori Livewire.
`php -l` e' stato eseguito su tutti i file toccati (nessun errore di sintassi); PHPStan
e Pest sono demandati all'agente coordinatore per regola di progetto.

## 2. Ridondanza reale trovata e risolta: `TokensRelationManager` vs `OauthTokensRelationManager`

Entrambi dichiaravano `protected static string $relationship = 'tokens'` — **stessa
relazione** Eloquent (`User::tokens()` da Laravel Passport `HasApiTokens`, verificata
nel docblock del modello: `@property Collection<int, OauthToken> $tokens`). Due tab
diverse mostravano lo stesso set di record:

- `OauthTokensRelationManager` — colonne coerenti col modello (`client.name`, `scopes`,
  `revoked`, `expires_at` formattato), solo edit/delete.
- `TokensRelationManager` — solo colonna `name`, con `CreateAction` che chiede solo
  `name`: sui token Passport l'id e' una stringa non auto-generata e i campi
  `client_id`/`scopes` sono obbligatori a livello di dominio — la creazione manuale con
  solo `name` e' con alta probabilita' un'azione che fallisce o produce record invalidi.

Verifica history (`git log --oneline`): entrambi creati nello stesso commit di bulk
import (`19bb0197`/`48546a54`); solo `OauthTokensRelationManager` ha ricevuto un
commit di refinement successivo (`214e3194`). Nessun altro file del modulo referenzia
`TokensRelationManager` (grep su `app/`, `tests/`, `docs/` — solo doc di inventario che
lo elencano senza analisi).

**Deciso: rimosso** `RelationManagers/TokensRelationManager.php`. `OauthTokensRelationManager`
resta l'unica tab per la relazione `tokens`, ora nel gruppo "Sicurezza".

(Nota: esiste un altro file omonimo, non correlato, in
`app/Filament/Clusters/Passport/Resources/OauthClientResource/RelationManagers/TokensRelationManager.php`
— relazione diversa (token di un client OAuth, non di uno user) — non toccato.)

## 3. Widget: `UserOverview` trasformato, `UserWidget` rimosso

### `UserOverview` — era placeholder, ora e' overview reale

Verificato (git log + vista blade + contesto d'uso):
- Vista precedente: `{{ $record->name ?? 'Utente' }}` con blocco `dddx()` commentato.
- Uso reale: `ListUsers::getHeaderWidgets()` → widget in testa alla **lista** utenti,
  dove non esiste un singolo `$record` → il placeholder renderizzava sempre e solo la
  stringa statica "Utente", zero informazione, su ogni caricamento della lista.
- History: toccato solo nei commit di bulk-import iniziali, mai altro lavoro reale.

**Deciso: trasformato in vero widget di statistiche.** Ora estende
`Modules\Xot\Filament\Widgets\XotBaseStatsOverviewWidget` (base gia' usata da
`Rating\StatsOverview`, `Xot\HealthOverviewWidget` — pattern esistente riusato, non
inventato) e mostra 4 `Stat`: utenti totali, utenti attivi (`is_active`), % email
verificate, login riusciti ultime 24h (`AuthenticationLog`). Vista blade custom
(`user-overview.blade.php`, ora orfana) rimossa: `StatsOverviewWidget` ha una view
Filament propria, accessibile e a contrasto standard (niente CSS custom da validare).
Testi tradotti in `lang/it|en/user.php` → chiave `widgets.overview.*`.

### `UserWidget` — confermato dead-weight, rimosso

Verificato: docblock esplicito "Simple widget used to verify page filters behaviour";
vista mostra solo `startDate`/`endDate` in testo semplice — gli stessi due valori
gia' visibili nel form filtri sopra (`ViewUser::filtersForm()`), zero valore aggiunto.
History: solo commit di bulk-import, mai altro lavoro. Nessun altro file lo referenzia
(controllato con grep sull'intero modulo).

**Deciso: rimosso** `Widgets/UserWidget.php`, la sua vista blade, e il riferimento in
`ViewUser::getFooterWidgets()` (il metodo footer e' stato rimosso interamente, non
lasciato vuoto).

Nota collaterale (non risolta in questo task, fuori scope): con `UserWidget` rimosso,
`ViewUser::filtersForm()` (`startDate`/`endDate`) non ha piu' alcun consumer — nessun
altro widget/tabella in questa pagina legge `$this->pageFilters`. E' un candidato per
un futuro filtro reale (es. filtrare `AuthenticationLogsRelationManager` per data) o
per la rimozione, ma implementarlo va oltre l'audit odierno.

## 4. Riusabilita' cross-modulo delle 3 Action: nessuna duplicazione trovata

Grep sull'intero monorepo (`grep -rln "ChangePasswordAction\|VerifyEmailAction\|SendOtpAction" laravel/Modules/*/app`):
nessun modulo diverso da `User` referenzia queste classi; `Modules/Xot/app/Filament/Actions`
non ha alcuna astrazione preesistente per password/email-verify/otp. Le tre azioni
operano su `UserContract`/`User` in modo specifico (password hashing su record User,
`markEmailAsVerified()` da `MustVerifyEmail`, invio OTP via `SendOtpByUserAction`).

**Deciso: nessuno spostamento verso `Modules\Xot\Filament\Actions`.** Generalizzare
senza un secondo consumer reale sarebbe astrazione prematura (YAGNI); se un domani
`Profile` o `Team` avessero bisogno di un'azione "cambia password" o "verifica email"
analoga, allora vale la pena estrarre un'astrazione comune — oggi non c'e' evidenza.

### `SendOtpAction` — premessa del task falsificata: e' codice morto, non un gap di accessibilita'

Il task presumeva "non ha iconButton() esplicito né tooltip". Verificato il file: ha
gia' `->tooltip(trans('user::otp.actions.send_otp'))` nel `setUp()`. Il problema reale
e' diverso: **grep sull'intero modulo non trova nessun `SendOtpAction::make()`** — la
classe non e' invocata da nessuna tabella/pagina/RelationManager. E' una funzionalita'
implementata ma non agganciata alla UI (probabile lavoro interrotto), non un problema
di accessibilita'. Non agganciata in questo task: aggiungerla a una tabella significa
esporre agli admin un nuovo pulsante/comportamento (invio OTP a qualsiasi utente) —
decisione di prodotto che va oltre un audit di code quality, richiede conferma
esplicita. Segnalata per decisione separata.

## 5. Accessibilita': gap reali trovati e corretti (icon-only senza tooltip/aria-label)

Verificato che `XotBaseRelationManager::getTableActions()` (default in
`Modules/Xot`, **non toccato**: modulo condiviso da tutto il monorepo, fuori dallo
scope assegnato e ad alto raggio d'impatto) genera `EditAction`/`DetachAction` con
`->iconButton()` **senza** `->tooltip()` — le traduzioni (`user::user.actions.edit.tooltip`,
`...detach.tooltip`) esistevano gia' in `lang/it/user.php` ma non erano mai state
collegate. Ogni RelationManager di `UserResource` che **non** ridefinisce
`getTableActions()` eredita questo gap. Corretti (override locale con le traduzioni
gia' esistenti, stesso pattern del default Xot):

- `DevicesRelationManager` — non aveva alcun override.
- `TenantsRelationManager` — non aveva alcun override.
- `RolesRelationManager` — override solo su `getTableHeaderActions()`.
- `ClientsRelationManager` — override solo su `getTableHeaderActions()`.

`AttachRoleAction` (header action icon-only in `RolesRelationManager`): **gia' corretta
da un processo concorrente** durante questa sessione (tooltip aggiunto mentre l'audit
era in corso) — nessuna azione necessaria da parte nostra.

Non toccato (fuori scope, root cause nel modulo Xot condiviso): per fixare alla radice
bisognerebbe aggiungere `->tooltip()` ai due default in
`Modules/Xot/app/Filament/Resources/RelationManagers/XotBaseRelationManager.php:205-230`
— impatta ogni RelationManager di ogni modulo che non fa override, troppo ampio per
questo audit scoperto-a-caso. Segnalato per chi possiede quel modulo.

Badge di conteggio e icone semantiche aggiunti dove restano tab standalone (nei
`RelationGroup` l'icona/badge e' impostata sul gruppo, non sui singoli member — Filament
non la usa comunque per i member raggruppati):
- `ProfileRelationManager` — icona `heroicon-o-identification`, badge 0/1 (presenza profilo).
- `SocialiteUsersRelationManager` — icona `heroicon-o-globe-alt`, badge = numero provider collegati.
- Badge deferred (`$isBadgeDeferred = true`) per non bloccare il render iniziale con query sincrone.

## 6. `BaseUserResource` — nota collaterale (non toccata)

`BaseUserResource.php` (abstract) duplica `getWidgets()`/`hasCombinedRelationManagerTabsWithContent()`
gia' presenti identici nel parent `XotBaseResource`, e **non risulta estesa da nessuna
classe nel monorepo** (grep `extends BaseUserResource` — zero risultati). Probabile
scaffold mai collegato. Fuori scope esplicito di questo task (non elencato tra i file
da editare); segnalato per eventuale pulizia futura, non rimosso qui per evitare scope
creep non richiesto.

## File toccati

- `app/Filament/Resources/UserResource.php` — `getRelations()` con `RelationGroup`.
- `app/Filament/Resources/UserResource/RelationManagers/TokensRelationManager.php` — rimosso.
- `app/Filament/Resources/UserResource/RelationManagers/{Devices,Tenants,Roles,Clients}RelationManager.php` — tooltip edit/detach.
- `app/Filament/Resources/UserResource/RelationManagers/{Profile,SocialiteUsers}RelationManager.php` — icona + badge.
- `app/Filament/Resources/UserResource/Widgets/UserOverview.php` — riscritto (stats reali).
- `app/Filament/Resources/UserResource/Widgets/UserWidget.php` — rimosso.
- `app/Filament/Resources/UserResource/Pages/ViewUser.php` — rimosso footer widget.
- `resources/views/filament/resources/user-resource/widgets/user-overview.blade.php` — rimosso (orfano).
- `resources/views/filament/resources/user/widgets/user-widget.blade.php` — rimosso.
- `lang/it/user.php`, `lang/en/user.php` — chiavi `relation_groups.*`, `widgets.overview.*`.

## Verifica

- `php -l` su tutti i file PHP toccati: nessun errore di sintassi.
- PHPStan/Pest: demandati all'agente coordinatore per regola di progetto (non eseguiti qui).
- Verifica visiva Filament (browser): **non eseguita**, tool browser non disponibili in
  questa sessione (Playwright MCP `CONNECTION_CLOSED`) — da fare prima della chiusura
  definitiva della story.
