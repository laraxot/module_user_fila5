---
title: "Overflow history (ceiling 100)"
type: digest
status: active
qmd: "digest ceiling 100 overflow-history"
---

# Overflow history (ceiling 100)

Overflow force-cap: 1158 file oltre target 100.

### `-integration/eav.md` — eav


# eav

<!-- Contenuto migrato da _docs/eav.txt -->

https://laraveldaily.com/post/laravel-custom-fields-json-eav-model-same-table 


https://github.com/yemenpoint/filament-custom-fields

https://github.com/tanthammar/filament-extras

https://blog.moonguard.dev/setting-page-with-filament

https://github.com/rinvex/laravel-attributes

https://github.com/spatie/laravel-schemaless-attributes


//---- >getEmailFormComponent,getPasswordFormComponent 

### `-integration/filament.md` — filament


# filament

<!-- Contenuto migrato da _docs/filament.txt -->

https://github.com/Althinect/filament-spatie-roles-permissions
https://github.com/ryangjchandler/filament-profile

https://github.com/andrewdwallo/filament-companies



### `-integration/gdpr.md` — gdpr


# gdpr

<!-- Contenuto migrato da _docs/gdpr.txt -->

Laravel Cookies Consent Plugin - Make your Laravel app compliant with the EU GDPR cookie law
https://github.com/scify/laravel-cookies-consent

https://codebrisk.com/blog/make-your-laravel-app-compliant-with-the-eu-gdpr-cookie-law


pagine di esempio
https://forge.laravel.com/data-processing-agreement


//------------ COOKIE LAW   
https://github.com/spatie/laravel-cookie-consent
https://github.com/statikbe/laravel-cookie-consent



### `-integration/json.md` — json


# json

<!-- Contenuto migrato da _docs/json.txt -->

https://medium.com/@prevailexcellent/how-to-handle-json-data-in-laravel-with-eloquent-and-json-columns-complete-guide-2023-480741120059


### `-integration/links.md` — links


# links

<!-- Contenuto migrato da _docs/links.txt -->

https://packagist.org/packages/althinect/filament-spatie-roles-permissions


https://github.com/chiiya/filament-access-control


use Filament\Facades\Filament;
return Filament::auth()->user()->can(static::getPermissionName());


https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource.php


Easily Add Face Authentication to Your Laravel Applications
https://codebrisk.com/blog/easily-add-face-authentication-to-your-laravel-applications

### `-integration/payment.md` — payment


# payment

<!-- Contenuto migrato da _docs/payment.txt -->

https://bunhere.medium.com/whats-a-laravel-saas-boilerplate-bd05fe616433


### `-integration/phpstan.md` — phpstan


# phpstan

<!-- Contenuto migrato da _docs/phpstan.txt -->

https://staabm.github.io/2024/01/15/phpstan-require-extends-implements.html


### `-integration/profile.md` — profile


# profile

<!-- Contenuto migrato da _docs/profile.txt -->

https://learn.userfrosting.com/recipes/extending-the-user-model

### `-integration/sso.md` — sso


# sso

<!-- Contenuto migrato da _docs/sso.txt -->

https://fusionauth.io/blog/single-sign-on-laravel-fusionauth

### `-integration/stats.md` — stats


# stats

<!-- Contenuto migrato da _docs/stats.txt -->

https://github.com/spatie/filament-simple-stats/blob/main/src/SimpleStat.php


### `-integration/tailwind.md` — tailwind


# tailwind

<!-- Contenuto migrato da _docs/tailwind.txt -->

https://tailwindflex.com/@sophia-baker/responsive-registration-form


### `-integration/tips.md` — tips


# tips

<!-- Contenuto migrato da _docs/tips.txt -->


https://medium.com/@prevailexcellent/deep-dive-into-eloquent-40-rarely-used-eloquent-orm-methods-every-laravel-developer-must-know-9c75b58f456b

### `01-teams-migration-laraxot-compliance.md` — Teams Migration - Laraxot Compliance Fix

# Teams Migration - Laraxot Compliance Fix

## Data
2025-12-01

## Problema Segnalato dall'Utente

> "./laravel/Modules/User/database/migrations/2025_05_16_221811_add_owner_id_to_teams_table.php non rispetta la politica, filosofia, religione laraxot !!"

## File Coinvolti

1. `/Modules/User/database/migrations/2025_05_16_221811_create_teams_table.php`
2. `/Modules/User/database/migrations/2023_01_01_000006_create_teams_table.php`

## Violazioni della Filosofia Laraxot

### ❌ Problemi Trovati

#### 1. Proprietà Mancanti/Errate


### `2fa-guide.md` — 🔐 TWO-FACTOR AUTHENTICATION (2FA) - GUIDA IMPLEMENTAZIONE


# 🔐 TWO-FACTOR AUTHENTICATION (2FA) - GUIDA IMPLEMENTAZIONE

**Versione**: 1.0  
**Status**: 🚧 60% Implementato  
**Data**: 2025-10-01  

---

## 🎯 OVERVIEW

Implementazione completa del sistema di autenticazione a due fattori (2FA) per FixCity utilizzando TOTP (Time-based One-Time Password) con supporto per recovery codes.

---

## 🏗️ ARCHITETTURA

### Componenti Principali

```

### `2fa.md` — 🔐 TWO-FACTOR AUTHENTICATION (2FA) - GUIDA IMPLEMENTAZIONE


# 🔐 TWO-FACTOR AUTHENTICATION (2FA) - GUIDA IMPLEMENTAZIONE

**Versione**: 1.0  
**Status**: 🚧 60% Implementato  

---

## 🎯 OVERVIEW

Implementazione completa del sistema di autenticazione a due fattori (2FA) per FixCity utilizzando TOTP (Time-based One-Time Password) con supporto per recovery codes.

---

## 🏗️ ARCHITETTURA

### Componenti Principali

```
User 2FA System

### `accessor-delegation-pattern.md` — Accessor Delegation Pattern (SACRO)


# Accessor Delegation Pattern (SACRO)

Questo documento descrive il pattern di delegazione per gli accessor Eloquent con auto-persistenza, utilizzato per garantire performance e pulizia nei modelli del modulo User (es. BaseUser).

## Descrizione

Il pattern separa l'orchestrazione dell'accessor dalla logica di calcolo pura. Questo garantisce testabilità, performance e pulizia del codice.

### Struttura

1.  **Accessor (`getSomeValueAttribute`)**: Gestisce il controllo della cache (DB), l'orchestrazione e la persistenza silenziosa.
2.  **Metodo Puro (`getSomeValue`)**: Contiene la logica di calcolo complessa, senza dipendenze dal DB o effetti collaterali. Deve essere posizionato **vicino** all'accessor per facilità di lettura.

## Esempio

```php
protected function getSomeValueAttribute(?f

### `actions-path-convention-convenzione-percorsi.md` — Convenzione dei Percorsi per le Actions


# Convenzione dei Percorsi per le Actions

## Regola Fondamentale
, tutte le Actions devono essere collocate nella directory `app/Actions/` del modulo, seguendo la struttura PSR-4 per l'autoloading.

## Esempi di Percorsi Corretti vs Errati

### ✅ Percorsi Corretti
```
laravel/Modules/User/app/Actions/User/DeleteUserAction.php
laravel/Modules/User/app/Actions/Auth/LoginAction.php
laravel/Modules/User/app/Actions/Profile/UpdateProfileAction.php
```

### ❌ Percorsi Errati
```
laravel/Modules/User/Actions/User/DeleteUserAction.php
laravel/Modules/User/Actions/DeleteUserAction.php
```

### `actions-path-convention.md` — Convenzione dei Percorsi per le Actions


# Convenzione dei Percorsi per le Actions

## Regola Fondamentale
, tutte le Actions devono essere collocate nella directory `app/Actions/` del modulo, seguendo la struttura PSR-4 per l'autoloading.

## Esempi di Percorsi Corretti vs Errati

### ✅ Percorsi Corretti
```
laravel/Modules/User/app/Actions/User/DeleteUserAction.php
laravel/Modules/User/app/Actions/Auth/LoginAction.php
laravel/Modules/User/app/Actions/Profile/UpdateProfileAction.php
```

### ❌ Percorsi Errati
```
laravel/Modules/User/Actions/User/DeleteUserAction.php
laravel/Modules/User/Actions/DeleteUserAction.php
```

### `actions-refactoring-completion.md` — User Module: Support → QueueableActions Refactoring


# User Module: Support → QueueableActions Refactoring

## Summary

Completed decomposition of legacy `Support\Utils` into 6 granular QueueableActions following Spatie pattern.

**Status**: ✅ COMPLETE  
**Actions Created**: 6  
**Files Deleted**: 2 (ShieldUtilsAction.php, Support.bak/)  
**Quality Gate**: PHPStan L10 (28 remaining errors related to external FilamentShieldData discovery)  
**Workflow**: 8-step standard conversion (steps 1-8 complete)

---

## Architecture: Shield Actions

### Action Groups (by actor/context)

1. **ResolveShieldResourceConfigurationAction**

### `actions.md` — Linee guida per l'uso di Spatie Queueable Action

# Linee guida per l'uso di Spatie Queueable Action

## Introduzione
Utilizzare sempre [spatie/laravel-queueable-action](mdc:https:/github.com/spatie/laravel-queueable-action) per la business logic asincrona e sincrona nei moduli. Non utilizzare mai Service custom.

## Vantaggi
- Uniformità architetturale
- Supporto nativo a queue, chaining, tagging, middleware, backoff
- Costruttore con dependency injection
- Maggiore testabilità e riusabilità

## Esempio base
```php
use Spatie\QueueableAction\QueueableAction;

class ApproveUserAction
{
    use QueueableAction;
    public function execute(User $user): void
    {

### `activitylog-moderation-best-practices.md` — Best Practice: ActivityLog per la Moderazione Utenti

# Best Practice: ActivityLog per la Moderazione Utenti

## Introduzione
Per tracciare tutte le attività di moderazione (approvazione, rifiuto, richiesta integrazione, cambio stato, commenti, ecc.) si utilizza esclusivamente [spatie/laravel-activitylog](mdc:https:/spatie.be/docs/laravel-activitylog/v4/introduction). Questo garantisce audit trail, query avanzate, riuso cross-modulo e coerenza.

## Pattern Consigliati
- Usare sempre `activity()` per loggare ogni azione rilevante sulla moderazione.
- Associare sempre l'utente che causa l'azione (`causedBy`).
- Usare `performedOn` per collegare l'azione all'entità moderata.
- Aggiungere proprietà custom per motivazioni, note, dettagli.
- Loggare anche i tentativi falliti o le richieste di integrazione.

## Esempio di Action Moderazione
```php
u

### `activitylog.md` — Linee guida per l'uso di Spatie Activitylog

# Linee guida per l'uso di Spatie Activitylog

## Introduzione
Utilizzare sempre [spatie/laravel-activitylog](mdc:https:/spatie.be/docs/laravel-activitylog/v4/introduction) per tracciare eventi, audit trail e cambi di stato nei moduli. Non creare mai tabelle custom come ModerationLog.

## Vantaggi
- Standardizzazione dell'audit trail
- Query avanzate e filtraggio
- Integrazione con dashboard, notifiche, Filament
- Supporto a metadati, causer, soggetto, ecc.

## Esempio base
```php
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['state', 'type'];
    protected static $logName = 'user_moderation';

### `admin/socialite-configuration.md` — socialite-configuration


---
name: socialite-configuration-guide
description: **Guide**: Configure social authentication credentials via Filament BackOffice
**Applies to**: laravel/Modules/User
**Enforced by**: Security best practices and modular architecture

**Step-by-Step Tutorial**:

1. **Access BackOffice**
   ```bash
   php artisan filament:admin
   ```
   Navigate to User module settings

2. **Social Providers Management**
   - Go to Settings > Social Authentication
   - Click "Add Provider"
   - Select provider type (Google, Facebook, etc.)


### `advanced-user-architecture.md` — Architettura Utente Avanzata basata sui Principi Filament


# Architettura Utente Avanzata basata sui Principi Filament

## Introduzione

Basandoci sui principi architetturali osservati nel pacchetto `filament-spatie-laravel-database-mail-templates`, questo documento illustra come applicare questi concetti al modulo User per creare un sistema di gestione utenti più avanzato e user-friendly.

## Sistema di Template per Comunicazioni Utente

### Template di Email Predefiniti

Come nel pacchetto studiato, possiamo implementare un sistema avanzato per i template di email degli utenti:

```php
<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MailTemplates\Models\MailTemplate as SpatieMailTemplate;

### `agent-edit-discipline.md` — agent-edit-discipline


See canonical documentation: ../../../Themes/docs/shared-components/agent-edit-discipline-Modules.md

### `ai-methodologies.md` — ai-methodologies


See canonical documentation: ../../../Themes/docs/shared-components/ai-methodologies.md

### `analisi-metodi-duplicati.md` — Analisi Metodi Duplicati - Modulo User


# Analisi Metodi Duplicati - Modulo User

## Riferimento Principale

📚 **Documento Completo:** [../../../../docs/analisi-metodi-duplicati.md](../../../../docs/analisi-metodi-duplicati.md)

## Stato del Modulo User

### Metodi Duplicati Identificati

| Categoria | Metodo/Proprietà | Duplicazione | Azione Raccomandata |
|-----------|------------------|--------------|---------------------|
| **BaseModel** | Proprietà comuni | 100% | ✅ Rimuovere, usare da Xot |
| **BaseModel** | `casts()` | 100% | ✅ Rimuovere, usare da Xot |
| **ServiceProvider** | `boot()` struttura | 100% | ✅ Solo parent::boot() + specifici |
| **ServiceProvider** | `register()` struttura | 100% | ✅ Solo parent::register() + specifici |

### BaseModel del Modulo


### `analisi-metodiuplicati.md` — Analisi Metodi Duplicati - Modulo User


# Analisi Metodi Duplicati - Modulo User

## Riferimento Principale

📚 **Documento Completo:** [../../../../docs/analisi-metodi-duplicati.md](../../../../docs/analisi-metodi-duplicati.md)

## Stato del Modulo User

### Metodi Duplicati Identificati

| Categoria | Metodo/Proprietà | Duplicazione | Azione Raccomandata |
|-----------|------------------|--------------|---------------------|
| **BaseModel** | Proprietà comuni | 100% | ✅ Rimuovere, usare da Xot |
| **BaseModel** | `casts()` | 100% | ✅ Rimuovere, usare da Xot |
| **ServiceProvider** | `boot()` struttura | 100% | ✅ Solo parent::boot() + specifici |
| **ServiceProvider** | `register()` struttura | 100% | ✅ Solo parent::register() + specifici |

### BaseModel del Modulo


### `analisi-modulo-completa.md` — Analisi Completa del Modulo User

# Analisi Completa del Modulo User

## Filosofia e Religione del Modulo

User incarna la filosofia della **sovranità digitale dell'identità**. Il suo dogma centrale è che "l'identità non è solo un username, ma un complesso ecosistema di ruoli, permessi, team e tenant". La sua religione è il **principio del minimo privilegio**: ogni utente deve avere esattamente i permessi necessari per svolgere il proprio ruolo, né più né meno.

Il suo "zen" risiede nella sicurezza invisibile: quando funziona bene, gli utenti non si accorgono nemmeno della complessità sottostante. È la porta blindata del sistema che tutti attraversano senza pensare.

## Scopo e Perchè

**Scopo primario**: Gestire l'intero ciclo di vita dell'identità digitale degli utenti, dall'autenticazione (come entri) all'autorizzazione

### `analysis.md` — User Module Analysis


# User Module Analysis

## Overview
The User module is a core component of the application that handles user authentication, authorization, and profile management.
## Directory Structure
```
Modules/User/
├── app/
│   ├── Models/
│   ├── Http/
│   └── Providers/
├── config/
├── database/
├── resources/
└── routes/
## Key Components
### Models
- `User`: Core user model with authentication capabilities
- `DeviceProfile`: Handles device-specific user profiles

### `architecture/auth-blade-structure.md` — Struttura delle Blade di Autenticazione con Volt


# Struttura delle Blade di Autenticazione con Volt

## Introduzione

Le blade di autenticazione nel tema One devono seguire un pattern specifico che combina Volt, Folio e Livewire per garantire una gestione efficiente e sicura dell'autenticazione.

## Struttura Directory

```
laravel/Themes/One/resources/views/pages/auth/
├── login.blade.php
├── register.blade.php
├── logout.blade.php
├── verify.blade.php
├── password/
│   ├── reset.blade.php
│   ├── confirm.blade.php
│   └── email.blade.php
└── [type]/

### `architecture/component-registration.md` — Registrazione dei Componenti Blade nel Modulo User


# Registrazione dei Componenti Blade nel Modulo User

> **NOTA IMPORTANTE**: Questo documento è un riferimento specifico per il modulo User.
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/docs/architecture/component-registration.md).
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/project_docs/architecture/component-registration.md).
## Implementazione Corretta nel Modulo User
Nel modulo User, tutti i componenti Blade devono seguire la struttura standard:
```
Modules/
└── User/
    └── View/
        └── Components/
            └── Profile/
                ├── Dropdown.php
                └── DropdownLink.php
Il `UserServiceProvider` **non deve** registrare manualmente i componenti Blade, poiché questo avviene automaticamente t

### `architecture/structure.md` — Modulo User


# Modulo User

Data: 2025-04-23 19:09:56

## Informazioni generali

- **Namespace principale**: Modules\\User
Modules\\User\\Database\\Factories
Modules\\User\\Database\\Seeders
- **Pacchetto Composer**: laraxot/module_user_fila5
Marco Sottana
- **Dipendenze**: flowframe/laravel-trend * jenssegers/agent * laravel/passport * socialiteproviders/auth0 * spatie/laravel-personal-data-export * repositories type path url ../Xot type path url ../Tenant type path url ../UI 
- **Totale file PHP**: 673
- **Totale classi/interfacce**: 300

## Struttura delle directory

```


### `architecture/testing-structure.md` — Struttura dei Tests del Modulo User


# Struttura dei Tests del Modulo User

## Panoramica
Questo documento descrive la struttura dei tests per il modulo User, seguendo le best practice Laraxot e le convenzioni di testing moderne.

## Architettura dei Tests

### Separazione per Responsabilità
- **LoginTest.php**: Testa SOLO la pagina `/it/auth/login` (rendering, layout, middleware, localizzazione)
- **LoginVoltTest.php**: Testa SOLO il componente Volt `auth.login` (state management, validation, authentication)
- **LoginWidgetTest.php**: Testa SOLO il widget Filament (form logic, validation)

### Pattern Implementato
```php
// LoginTest.php - Test della pagina
class LoginTest extends TestCase
{
    public function test_login_page_renders_correctly()
    {

### `architecture/user-gdpr-decoupling.md` — Decoupling User-GDPR via Event/Listener Pattern


# Decoupling User-GDPR via Event/Listener Pattern

## Overview

The dependency between User and GDPR modules has been inverted using the Laravel Event/Listener pattern. Previously, the core `User` module had a direct dependency on the optional `Gdpr` module, violating architectural principles. Now the dependency flows correctly: `Gdpr` depends on `User` (the optional module extends the core).

## Problem Statement

The original implementation had these issues:
- `Modules\User\Filament\Widgets\Auth\RegisterWidget` directly imported `Modules\Gdpr\Models\Consent` and `Modules\Gdpr\Models\Treatment`
- Core `User` module depended on optional `Gdpr` module (inverted dependency)
- `User` module would break if `Gdpr` was disabled
- Violated SOLID principles (Dependency Inversion)

## Solution Arc

### `architecture/user-gdpr-oupling.md` — user-gdpr-oupling


See canonical documentation: ../../../../Themes/docs/shared-components/user-gdpr-decoupling.md

### `auth-blade-structure.md` — Struttura delle Blade di Autenticazione con Volt


# Struttura delle Blade di Autenticazione con Volt

## Introduzione

Le blade di autenticazione nel tema One devono seguire un pattern specifico che combina Volt, Folio e Livewire per garantire una gestione efficiente e sicura dell'autenticazione.

## Struttura Directory

```
laravel/Themes/One/resources/views/pages/auth/
├── login.blade.php
├── register.blade.php
├── logout.blade.php
├── verify.blade.php
├── password/
│   ├── reset.blade.php
│   ├── confirm.blade.php
│   └── email.blade.php
└── [type]/

### `auth-header-button.md` — Header Navigation - Sistema di Autenticazione


# Header Navigation - Sistema di Autenticazione

## Panoramica

Il sistema di autenticazione nella header navigation del tema Two è implementato tramite un componente Blade riutilizzabile che mostra automaticamente:
- **Ospiti (guest)**: Pulsante di login
- **Utenti autenticati**: Menu dropdown con profilo, dashboard e logout

## Struttura

### Componente Auth Button

**File**: `Modules/User/resources/views/components/ui/app/auth-button.blade.php`

```blade
@auth
    {{-- Utente autenticato: mostra dropdown con opzioni --}}
    <div class="it-header-slim-right-zone">
        <div class="nav-item dropdown">

### `auth-register-email.md` — Registrazione cittadino e posta di verifica


# Registrazione cittadino e posta di verifica

## Decisione

Il modulo User resta proprietario dell'identità e del flusso di registrazione.
La pagina pubblica resta di Sixteen; la consegna passa dal Postfix locale già
installato sul server. Laravel usa il transport `sendmail`, senza credenziali
SMTP nel repository.

## Configurazione effettiva

```dotenv
MAIL_MAILER=sendmail
MAIL_SENDMAIL_PATH="/usr/sbin/sendmail -bs -i"
MAIL_HOST=127.0.0.1
MAIL_PORT=25
MAIL_EHLO_DOMAIN=fixcity.local
MAIL_FROM_ADDRESS=noreply@fixcity.local
AUTH_MUST_VERIFY_EMAIL=true

### `auth-social-login-translations.md` — Traduzioni Auth Social Login - Filosofia Laraxot


# Traduzioni Auth Social Login - Filosofia Laraxot

## Scopo

Definisce la struttura corretta delle traduzioni per i pulsanti di login social (Google, GitHub, Microsoft) nel modulo User, in linea con la filosofia Laraxot.

## Chiavi Corrette

### Struttura in `user::auth`

Le traduzioni per i provider social **devono** usare la chiave `auth.social.*`:

```php
// Modules/User/lang/it/auth.php
'social' => [
    'title' => 'Accedi con',
    'google' => 'Google',
    'github' => 'GitHub',
    'microsoft' => 'Microsoft',

### `auth-widget.md` — Regole per Widget di Autenticazione


# Regole per Widget di Autenticazione

## ERRORE CRITICO DA NON RIPETERE MAI

**NON usare mai componenti Blade senza verificarne l'esistenza nella documentazione ufficiale!**

### Componenti Filament NON Disponibili

❌ **NON USARE MAI**:
- `x-filament::layouts.card`
- `x-filament::section`
- `x-filament::input.wrapper`
- `x-filament::input`
- `x-filament::button`
- `x-filament::link`

### Componenti Disponibili nel Progetto

✅ **USA QUESTI**:

### `auth-widgets-view-namespaces-widget-autenticazione-namespace.md` — Widget di Autenticazione: Namespace delle View


# Widget di Autenticazione: Namespace delle View

## ⚠️ **Regola Critica**

I widget di autenticazione **DEVONO** usare il namespace `pub_theme::` per le loro view, NON il namespace del modulo `user::`.

## Motivazione

I widget di autenticazione sono parte dell'**interfaccia utente del tema** e devono essere personalizzabili per ogni tema, mantenendo la logica centralizzata nel modulo User.

## Pattern Corretto vs Errato

### ✅ **CORRETTO**
```php
namespace Modules\User\Filament\Widgets\Auth;

class PasswordResetWidget extends XotBaseWidget
{
    // View nel tema - personalizzabile con struttura gerarchica

### `auth-widgets-view-namespaces.md` — Widget di Autenticazione: Namespace delle View


# Widget di Autenticazione: Namespace delle View

## ⚠️ **Regola Critica**
I widget di autenticazione **DEVONO** usare il namespace `pub_theme::` per le loro view, NON il namespace del modulo `user::`.
## Motivazione
I widget di autenticazione sono parte dell'**interfaccia utente del tema** e devono essere personalizzabili per ogni tema, mantenendo la logica centralizzata nel modulo User.
## Pattern Corretto vs Errato
### ✅ **CORRETTO**
```php
namespace Modules\User\Filament\Widgets\Auth;
class PasswordResetWidget extends XotBaseWidget
{
    // View nel tema - personalizzabile con struttura gerarchica
    protected static string $view = 'pub_theme::filament.widgets.auth.password.reset';

    // Logica centralizzata nel modulo User
    public function getFormSchema(): array
    {
        r

### `authentication-troubleshooting.md` — Debug Autenticazione - Login Widget


# Debug Autenticazione - Login Widget

## Introduzione
Questo documento serve come guida per il troubleshooting dei problemi di login, specialmente quando si usano i widget Filament invece delle pagine standard.

## Discrepanza tra Login Page e Login Widget

Nel sistema Laraxot, esistono due modi per gestire l'autenticazione:
1.  **Standard Page**: `Modules\User\Http\Livewire\Auth\Login.php`
2.  **Themed Widget**: `Modules\User\Filament\Widgets\Auth\LoginWidget.php`

Mentre la pagina standard è usata nelle rotte amministrative o in layout semplici, il **Widget** è la scelta preferita per i temi (come Sixteen) dove il login è integrato in una pagina Folio.

## Problemi Comuni

### 1. Form non popolato / Validazione fallita
**Sintomo**: L'utente inserisce email e password, ma il sistema res

### `authentication.md` — Autenticazione in <nome progetto>


# Autenticazione in <nome progetto>

## Panoramica
Il sistema di autenticazione in <nome progetto> è basato su Laravel Volt e supporta sia l'autenticazione tradizionale che quella sociale.

## Configurazione

### Route
```php
// Route con prefisso lingua
Route::prefix('{lang}')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'Login')->name('login');
        Route::get('register', 'Register')->name('register');
    });
});

// Route di fallback
Route::middleware('guest')->group(function () {

### `baseuser-dry-violation-analysis.md` — BaseUser - Analisi Violazione Principio DRY


# BaseUser - Analisi Violazione Principio DRY

**Data**: 15 Ottobre 2025  
**File**: `Modules/User/app/Models/BaseUser.php`  
**Problema**: Metodi duplicati già presenti in `Spatie\Permission\Traits\HasRoles`

## Problema Identificato

Il modello `BaseUser` utilizza il trait `HasRoles` di Spatie Permission ma **ridefinisce metodi che il trait già fornisce**, violando il principio **DRY (Don't Repeat Yourself)**.

```php
// BaseUser.php - Linea 17
use Spatie\Permission\Traits\HasRoles;

// Ma poi ridefinisce metodi del trait:
public function hasRole(...) { /* 26 linee */ }         // DUPLICATO
public function assignRoleOLD(...) { /* 26 linee */ }   // VECCHIA VERSIONE
public function hasPermission(...) { /* 7 linee */ }    // PARZIALMENTE DUPLICATO
```

### `baseuser-refactoringd.md` — BaseUser Refactoring - Completato


# BaseUser Refactoring - Completato

**File**: `Modules/User/app/Models/BaseUser.php`  
**Stato**: ✅ COMPLETATO

## Refactoring Eseguito

Il refactoring del modello `BaseUser` è stato completato con successo, rimuovendo tutti i metodi duplicati che erano già forniti dal trait `Spatie\Permission\Traits\HasRoles`.

### Risultati

| Metrica | Prima | Dopo | Delta |
|---------|-------|------|-------|
| **Righe totali** | 406 | 231 | **-175 righe (-43%)** |
| **Metodi duplicati** | 12 | 0 | **-12 metodi** |
| **Codice pulito** | No | Sì | ✅ |
| **DRY compliant** | No | Sì | ✅ |

## Metodi Rimossi

### `baseuser-spatie-duplicates-analysis.md` — Analisi Metodi Duplicati in BaseUser.php


# Analisi Metodi Duplicati in BaseUser.php

## Data Analisi
2025-10-15

## Problema
Il file `Modules/User/app/Models/BaseUser.php` contiene metodi che sono già forniti dai trait Spatie Permission:
- `Spatie\Permission\Traits\HasRoles`
- `Spatie\Permission\Traits\HasPermissions`

## Metodi Forniti dai Trait Spatie

### HasRoles Trait
```php
// Metodi pubblici principali:
- getRoleClass(): string
- roles(): BelongsToMany
- scopeRole()
- scopeWithoutRole()

### `baseuser-spatieuplicates.md` — Analisi Metodi Duplicati in BaseUser.php


# Analisi Metodi Duplicati in BaseUser.php

## Data Analisi
[DATE]

## Problema
Il file `Modules/User/app/Models/BaseUser.php` contiene metodi che sono già forniti dai trait Spatie Permission:
- `Spatie\Permission\Traits\HasRoles`
- `Spatie\Permission\Traits\HasPermissions`

## Metodi Forniti dai Trait Spatie

### HasRoles Trait
```php
// Metodi pubblici principali:
- getRoleClass(): string
- roles(): BelongsToMany
- scopeRole()
- scopeWithoutRole()

### `baseuser.md` — BaseUser Model in Laravel Modules


# BaseUser Model in Laravel Modules

## Overview
This document outlines the structure and usage of the `BaseUser` model within a Laravel module, serving as the foundation for user-related functionality.

## Key Principles
1. **Inheritance**: `BaseUser` provides common attributes and methods for all user types, allowing for easy extension.
2. **Modularity**: Designed to be reusable across projects without modification.
3. **Customization**: Can be extended to include specific user types like admin or customer.

## Implementation Guidelines
### 1. Model Structure
- The `BaseUser` model includes essential fields like `id`, `name`, `email`, and authentication-related attributes.
  ```php
  namespace Modules\User\Models;

  use Illuminate\Foundation\Auth\User as Authenticatable;

  class BaseU

### `baseuserry-violation.md` — BaseUser - Analisi Violazione Principio DRY


# BaseUser - Analisi Violazione Principio DRY

**File**: `Modules/User/app/Models/BaseUser.php`  
**Problema**: Metodi duplicati già presenti in `Spatie\Permission\Traits\HasRoles`

## Problema Identificato

Il modello `BaseUser` utilizza il trait `HasRoles` di Spatie Permission ma **ridefinisce metodi che il trait già fornisce**, violando il principio **DRY (Don't Repeat Yourself)**.

```php
// BaseUser.php - Linea 17
use Spatie\Permission\Traits\HasRoles;

// Ma poi ridefinisce metodi del trait:
public function hasRole(...) { /* 26 linee */ }         // DUPLICATO
public function assignRoleOLD(...) { /* 26 linee */ }   // VECCHIA VERSIONE
public function hasPermission(...) { /* 7 linee */ }    // PARZIALMENTE DUPLICATO
```


### `baseusers.md` — Risoluzione Conflitti in BaseUser.php


# Risoluzione Conflitti in BaseUser.php

## Analisi dei Conflitti

Dopo un'analisi approfondita del file `BaseUser.php` e dei file correlati, è stato determinato che non ci sono conflitti da risolvere. Il file è già correttamente implementato con:

1. Tipizzazione stretta per tutti i metodi
2. Annotazioni PHPStan appropriate
3. Implementazione corretta delle relazioni
4. Gestione appropriata delle autorizzazioni

## File di Lingua

I file di lingua (`auth.php`, `registration.php`, `change_password.php`, `password.php`, `user.php`) non presentano conflitti ma richiedono alcune traduzioni mancanti. Le chiavi ancora in inglese dovrebbero essere tradotte per mantenere la coerenza del progetto.

### Chiavi da Tradurre

#### auth.php
- Duplicazione della chiave 'failed' con lo stesso valore

### `best-practices/eloquent-properties-best-practices.md` — 🛡️ Best Practices per Proprietà Eloquent


# 🛡️ Best Practices per Proprietà Eloquent

## ⚠️ Regola Critica: property_exists() VIETATO

**Nel modulo User, MAI utilizzare `property_exists()` con modelli Eloquent o oggetti che implementano `__get()`/`__set()`.**

## ❌ Codice Problematico

```php
// ❌ SBAGLIATO - property_exists non funziona con proprietà magiche
if (property_exists($user, 'full_name') && $user->full_name) {
    // Questo può restituire false anche se la proprietà esiste
}

if (property_exists($user, 'first_name') && $user->first_name) {
    // Falso negativo per accessors
}

if (property_exists($user, 'name') && $user->name) {

### `best-practices/filament-best-practices.md` — Best Practices per Risorse Filament nel Modulo User


# Best Practices per Risorse Filament nel Modulo User

Questo documento descrive le best practices da seguire quando si creano o modificano risorse Filament nel modulo User.

## Rimozione del metodo `getPages()`

Quando una risorsa estende `XotBaseResource`, il metodo `getPages()` può essere completamente rimosso se:
- Definisce solo le tre pagine standard (index, create, edit)
- Utilizza gli stessi pattern di route standard ('/', '/create', '/{record}/edit')

### Motivazione

La classe base `XotBaseResource` fornisce già un'implementazione predefinita del metodo `getPages()` che definisce queste tre pagine con le stesse route. Rimuovere il metodo nelle classi figlie:
- Riduce la ridondanza del codice
- Semplifica la manutenzione
- Migliora la coerenza del codice
- Segue il principio DRY 

### `best-practices/filament-components.md` — Best Practices per Componenti Filament


# Best Practices per Componenti Filament

## Verifica delle Dipendenze

### 1. Controllo Versione
```bash

# Verifica versione Filament
composer show filament/filament

# Verifica versione pacchetti correlati
composer show filament/spatie-laravel-media-library-plugin
```

### 2. Componenti Disponibili
```php
// ❌ ERRATO - Componente non disponibile
<x-filament::empty-state />


### `best-practices/filament-widgets.md` — Best Practices per Widget Filament


# Best Practices per Widget Filament

## Struttura Corretta dei File e Namespace
### Posizionamento dei File
I widget Filament **DEVONO** essere posizionati nella seguente directory:
```
Modules/User/app/Filament/Widgets/  # Widget Filament
### Namespace Corretti
Il namespace corretto è `Modules\User\Filament\Widgets` (senza il segmento `app`):
```php
// ✅ CORRETTO
namespace Modules\User\Filament\Widgets;
// ❌ ERRATO
namespace Modules\User\App\Filament\Widgets;
### Estensione di XotBaseWidget
Tutti i widget Filament devono estendere `XotBaseWidget`:
use Modules\Xot\Filament\Widgets\XotBaseWidget;
class UserStatsWidget extends XotBaseWidget
{

### `best-practices/folio-volt-best-practices.md` — folio-volt-best-practices


See canonical documentation: ../../../../Themes/docs/shared-components/folio-volt-best-practices-Modules.md

### `best-practices/migration-best-practices.md` — MIGRATION_BEST_PRACTICES - Modulo User


# MIGRATION_BEST_PRACTICES - Modulo User

## Scopo

Definire le regole Laraxot per **tutte le migrazioni del modulo User**, in particolare per tabelle come `users`, `teams`, `team_user`, SSO, permessi, ecc.

Questo documento specializza gli standard generali di `Modules/Xot/docs/migration-standards.md` per la connessione `user`.

## Regole fondamentali

- **Usare sempre `XotBaseMigration`**
  - Tutte le migration devono `return new class extends XotBaseMigration { ... }`.
- **Impostare esplicitamente le proprietà chiave**
  - `protected string $table = 'nome_tabella';`
  - `protected ?string $connection = 'user';`
  - `protected ?string $model_class = Model::class;` (es. `Team::class`, `User::class`)
- **Usare i metodi helper di `XotBaseMigration`**
  - `tableCreate()` per creare tabelle


### `best-practices/nestedset-migration-best-practices.md` — NestedSet Migration Best Practices - User Module


# NestedSet Migration Best Practices - User Module

## Overview

Questo documento descrive le best practices per implementare migrazioni con strutture ad albero (nested sets) nel modulo User utilizzando il pacchetto `kalnoy/laravel-nestedset`.

## Pattern per Ruoli Utente

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = \Modules\User\Models\Role::class;


### `best-practices/queueable-actions.md` — Queueable Actions Best Practices


# Queueable Actions Best Practices

## Why Queueable Actions?

We use `spatie/laravel-queueable-action` instead of traditional Service classes for several reasons:

1.  **Single Responsibility**: Each Action does one thing.
2.  **Testability**: Actions are easy to mock and test in isolation.
3.  **Scalability**: Actions can be easily moved to a background queue without changing the caller logic.
4.  **Consistency**: A unified pattern across all Laraxot modules.

## Rules

### 1. Location & Naming

-   **Path**: `Modules/{Module}/app/Actions/{SubDir}/{ActionName}Action.php`
-   **Suffix**: Always end the class name with `Action`.

### 2. Implementation

### `best-practices/testing-rules.md` — Testing Rules Summary


# Testing Rules Summary

## Regole Fondamentali dei Test

### 1. **Pest Testing Mandatory**
- **MAI** usare PHPUnit class-based (`class Test extends TestCase`)
- **SEMPRE** usare Pest functional syntax (`test()`, `it()`)
- I test devono essere scritti in formato Pest, non PHPUnit

### 2. **NO RefreshDatabase - MAI**
- **MAI** usare `use RefreshDatabase` nei test
- **MAI** usare `RefreshDatabase` trait
- Utilizzare `.env.testing` con SQLite in-memory
- Usare `DatabaseTransactions` se necessario (raro)

### 3. **Configurazione Testing**
- Tutti i test devono leggere `.env.testing`
- PHPStan usa configurazione da `phpstan.neon` (non passare livello come parametro)
- Script di conversione vanno in `bashscripts/`, non nella root di Laravel

### `best-practices.md` — Best Practices Migrazioni XotBaseMigration

# Best Practices Migrazioni XotBaseMigration

## Uso corretto di hasColumn
- Usare SEMPRE `$this->hasColumn('nome_colonna')` nelle migrazioni che estendono XotBaseMigration.
- NON usare mai `Schema::hasColumn`.

### Esempio
```php
if (! $this->hasColumn('state')) {
    $this->tableUpdate(function (Blueprint $table) {
        $table->string('state')->nullable();
    });
}
```

### Motivazione
- Garantisce compatibilità multi-db e coerenza tra i moduli.
- Evita errori dovuti a differenze tra i driver o override custom.

### Checklist

### `binary-assets.md` — Asset binari


# Asset binari

Gli asset binari sono file normali del repository.

Regole:
- non aggiungere filtri o backend di storage esterno in `.gitattributes`;
- non committare file pointer al posto del contenuto reale;
- se un asset manca, recuperare il binario originale e committarlo direttamente;
- prima del push verificare che immagini, font, archivi e PDF siano contenuti reali.

### `blade/using-filament-components.md` — Utilizzo dei componenti Blade di Filament


# Utilizzo dei componenti Blade di Filament

> **NOTA IMPORTANTE**: Questo documento è un riferimento specifico per il modulo User.
> La documentazione completa sui componenti Blade si trova nel [modulo UI](../../../ui/docs/blade/component-registration.md).
## Regola fondamentale: utilizzare i componenti Filament
Nel progetto , **abbiamo l'obbligo di utilizzare i componenti Blade forniti da Filament quando disponibili**, invece di creare componenti personalizzati che duplicano funzionalità già esistenti.
> La documentazione completa sui componenti Blade si trova nel [modulo UI](../../../ui/project_docs/blade/component-registration.md).
Nel progetto <nome progetto>, **abbiamo l'obbligo di utilizzare i componenti Blade forniti da Filament quando disponibili**, invece di creare componenti pe

### `bmad/advantages-filament-only.md` — Vantaggi di avere SOLO Filament widget nel chrome del panel


# Vantaggi di avere SOLO Filament widget nel chrome del panel

> **Nota di canone:** il documento di piattaforma sui vantaggi widget-only è
> [Xot/docs/bmad/livewire-widget-advantages.md](../../Xot/docs/bmad/livewire-widget-advantages.md).

> [Xot/docs/bmad/livewire-widget-advantages.md](../../../Xot/docs/bmad/livewire-widget-advantages.md).
> Questo file resta la vista **specifica del modulo User** (chrome `/admin`, auth, legal).
> **Stato al 2026-09-21:** i tre hook di `AdminPanelProvider` montano già FQCN widget
> (`AdminPanelProvider.php:25-38`); questo documento descrive il razionale della scelta, ormai
> verificato in codice, e i residui ancora aperti (Cluster C, `app/Livewire/Logout`, cache alias).

## Executive Summary

L'architettura pre-campagna manteneva due stack UI paralleli 

### `bmad/advantages-filament-widgets-over-livewire.md` — advantages-filament-widgets-over-livewire


Canon modulo: [advantages-filament-only.md](./advantages-filament-only.md) (+ sezioni
vantaggi/urgenza in [livewire-inventory.md](./livewire-inventory.md)).
Canon piattaforma: [Xot/docs/bmad/livewire-widget-advantages.md](../../Xot/docs/bmad/livewire-widget-advantages.md).

Canon piattaforma: [Xot/docs/bmad/livewire-widget-advantages.md](../../../Xot/docs/bmad/livewire-widget-advantages.md).

Errori di questa bozza (2026-08-25): `/admin` già patchato su `user::`; il widget **è** Livewire (non elimina il round-trip); UI/Lang fuori campagna User; esempio mount via `view()` invece di `@livewire(FQCN)`.

### `bmad/architecture/module-boundary.md` — User — architettura

# User — architettura

## Scopo osservato

Gestione utenti, autenticazione, autorizzazioni e ruoli. Scheda derivata da `module.json`, struttura `app/` e conteggi del repository; non sostituisce decisioni architetturali non ancora approvate.

## Inventario verificato

- PHP in `app/`: 679 file.
- Test PHP in `tests/`: 187 file.
- Aree applicative: `Enums`, `Http`, `Filament`, `Support`, `Events`, `Exceptions`, `Contracts`, `Models`, `Policies`, `Observers`, `Console`, `Actions`, `Traits`, `Mail`, `Providers`, `Listeners`, `View`, `Rules`, `Datas`, `Application`, `Livewire`, `Adapters`, `Notifications`, `Facades`.
- Persistenza: `database/factories`, `database/migrations`, `database/seeders` presenti.

## Confini

Il modulo espone risorse, azioni e contratti verso i consumatori; la logica di

### `bmad/audit.md` — Audit BMAD — User


# Audit BMAD — User

SSoT dettagliata: [audits/user-audit.md](./audits/user-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 713 |
| Test | 233 |
| Resources | 26 |
| Actions | 83 |
| Services | 0 |
| Policy `return true` | 8 |
| Marker | 0 |

## Lo scopo in una frase **User risponde a tre domande e non ad altre: chi sei, cosa puoi fare, per conto di chi. Tutto il resto che si sa di una persona appartiene al dominio, non a User.**

## Gate

### `bmad/audits/user-audit.md` — Audit approfondito — User


# Audit approfondito — User

## Scopo (il perché)

User è l'unico punto in cui si decide **chi è chi e cosa può fare**: utenti, ruoli
Spatie, permessi, team, OAuth/Passport, accesso ai pannelli Filament. Ogni altro
modulo delega a `BaseUser::canAccessPanel()` e alle policy `XotBasePolicy`.
Un errore qui non è un bug di modulo: è un buco di sicurezza di tutto PTVX (HR,
indennità, performance). Business logic: [purpose.md](../purpose.md).

## Metodo

Source-first, 2026-11-16. Inventario con `find`/`grep` sul filesystem, lettura di
`BaseUser`, `XotBasePolicy`, `UserBasePolicy`, tutte le policy con `return true`,
riproduzione runtime del `before()` con utente mock (script fuori repo, nessun DB).
Nessuna UI inventata, nessuna scrittura su DB.

## Inventario misurato


### `bmad/auth-front-office-parity.md` — Contratto


# Contratto

User possiede middleware, nomi Folio, Volt e azioni di autenticazione. Il tema
Sixteen può sostituire la view per applicare Design Comuni, ma non deve cambiare
throttle, redirect, validazione o notifiche.

La notice `/{locale}/auth/verify` richiede utente autenticato non verificato,
mantiene `verification.notice`, `throttle:6,1` e invia nuovamente la mail tramite
`ResendEmailVerificationAction`. Un utente già verificato deve essere rediretto
come previsto dal test di modulo.

La pagina deve sempre avere una direttiva `@volt` quando contiene una classe Volt
anonima o azioni `wire:*`. Senza `@volt`, l'errore appare solo a runtime durante
la compilazione Folio.

## Matrice minima delle view

Le pagine User restano il trasporto del comportamento; il tema attivo fornisce il
framme

### `bmad/bmad-dossier.md` — User — BMAD dossier

# User — BMAD dossier
## Product brief / PRD
Identity and authorization let citizens and PA staff act safely in their tenant.
## Architecture / UX / security
UserContract/policies are the boundary; Folio/Volt/Filament handle auth surfaces without new controllers.
## Epics and stories
Authentication/recovery; RBAC/tenant membership; profile/privacy.
## Gaps / release
Candidate two-user isolation, recovery/verification, role matrix and OAuth failures need full evidence.

### `bmad/brainstorming/module-opportunities.md` — User — brainstorming

# User — brainstorming

## Punto di partenza

Gestione utenti, autenticazione, autorizzazioni e ruoli. L'inventario corrente misura 679 file applicativi e 187 file di test.

## Domande ad alto valore

- Quale problema utente risolve il modulo e quale comportamento è vincolante?
- Quali dati sono autorevoli e quali sono proiezioni o cache?
- Quali ruoli possono leggere, creare, modificare o approvare?
- Quale errore deve essere osservabile senza esporre dati sensibili?
- Quale parte è riusabile e quale è specifica del dominio PTVX?

## Ipotesi da validare

- Le Action sono il punto di orchestrazione del caso d'uso.
- Le Resource Filament sono adattatori, non il luogo della regola di business.
- I test esistenti sono evidenza parziale e vanno confrontati con i flussi esposti.


### `bmad/brainstorming.md` — Brainstorming: dove vive il toggle SuperAdmin


# Brainstorming: dove vive il toggle SuperAdmin

## Idea

Il toggle non è una pagina e non è un form. È un **privilegio visibile** nel chrome del panel. Tre contenitori possibili:

1. **Livewire HTTP** (oggi) — generico, alias stringa, già rotto con `filament-jet`.
2. **Badge Blade statico** (`user::badges.super-admin`, commentato nel provider) — niente click, viola il bisogno.
3. **Filament widget** (`XotBaseWidget`) montato sull’hook user-menu — chrome Filament, stesso Livewire sotto il cofano.

1. **Livewire HTTP** (oggi): generico, alias stringa, già rotto con `filament-jet`.
2. **Badge Blade statico** (`user::badges.super-admin`, commentato nel provider): niente click, viola il bisogno.
3. **Filament widget** (`XotBaseWidget`) montato sull’hook user-menu: chrome Filament, stesso Live

### `bmad/citizen-auth-flow-contract-07.md` — Contratto auth cittadino


# Contratto auth cittadino

## Flusso

`register -> consenso/validazione -> verifica email -> login -> intended URL -> area personale`.

Il modulo User possiede identità e autenticazione. Sixteen possiede la composizione
visuale delle pagine; Gdpr possiede i dati di consenso; Notify possiede la consegna.

## Evidenze

- Widget runtime: `Modules/User/Filament/Widgets/Auth/RegisterWidget.php` e `LoginWidget.php`.
- View pubbliche attive: `Themes/Sixteen/resources/views/pages/auth/register.blade.php`,
  `login.blade.php`, `verify.blade.php`.
- Test: `Modules/User/tests/Feature/UserAuthenticationTest.php`,
  `AuthComponentsTest.php`, `LoginTranslationParityTest.php` e route CMS.
- Redirect guest locale: `Modules/Fixcity/tests/Feature/Pages/TicketGuestLocaleRedirectTest.php`.

## Gap runtime

### `bmad/coverage-full.md` — 0 /var/www/_bases/base_app_fila5_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/Vit



   FAIL  Modules\User\tests\Feature\AuthComponentsTest
  ⨯ Auth Components Tests → auth components exist and work correctly     0.41s  
  ⨯ Auth Components Tests → auth layout components exist and work corre… 0.23s  
  ⨯ Auth Components Tests → login page loads correctly                   1.14s  
  ⨯ Auth Components Tests → register page loads correctly                0.73s  
  ⨯ Auth Components Tests → auth-session-status component renders corre… 0.23s  
  ⨯ Auth Components Tests → auth header component exists and renders     0.23s  
  ⨯ Authentication Flow with Reorganized Components → login form compon… 0.75s  
  ⨯ Authentication Flow with Reorganized Components → password confirma… 0.50s  
  ⨯ User Profile Components Tests → profile pages use reorganized compo… 0.81s  

   FAIL  Modu

### `bmad/coverage.md` — Coverage — User


# Coverage — User

Stato onesto (2026-09-22), campagna git-hygiene/marker-cleanup.

- PHPStan `analyse Modules/User`: 1678 file, **0 errori** (level max, config repo).
- PHPMD (`tools/phpmd.phar Modules/User`): **crash pre-esistente**, fatal error
  `Call to a member function getParent() on null` in
  `PHPMD/Rule/AbstractLocalVariable.php:297` (bug noto phpmd.phar su costrutti del
  modulo, non introdotto da questa sessione — memoria second brain
  `feedback-phpmd-phar-dies-on-dnf-types.md`). Nessun conteggio finding producibile.
- PHPInsights: non eseguito in questa sessione (scope git-hygiene, non code-quality;
  nessun file `.php` di produzione modificato — solo rimozione marker/file morti).
- Pest: **bloccato**, DB `10.100.200.53:3306` irraggiungibile (`nc -z -w3` fallito).
  Blocco i

### `bmad/decision-log.md` — Decision log — SuperAdmin Livewire → Filament widget


# Decision log — SuperAdmin Livewire → Filament widget

  - ./filament-blueprint.md
updated: 2026-10-26
tags: [docs, user, bmad]
qmd: "decision log   superadmin livewire → filament widget user"

# Decision log: User

**Scopo:** User e' il confine di identita' del cittadino e dell'operatore (auth, OAuth localizzato, profilo, RBAC/tenant): i temi vestono le pagine, Fixcity/Gdpr possiedono dominio e consensi, User possiede login/registrazione e i contratti Filament/Socialite.

## Hub (solo link)

- Standing PHPStan: [phpstan-modules-zero-standing-order](../../../Xot/docs/wiki/memories/phpstan-modules-zero-standing-order.md)
- `graphify-out/`: [graphify-out-gitignore](../../../Xot/docs/bmad/graphify-out-gitignore.md)
- UI admin/FO auth: [filament-blueprint.md](./filament-blueprint.md)

## [20

### `bmad/deep-recon-user.md` — User Module: Deep Recon (BMAD Deep Dive)


# User Module: Deep Recon (BMAD Deep Dive)

**Status**: ⏳ In Progress
**Date**: 2026-09-21
**Scope**: Comprehensive architecture, quality, and documentation analysis for User module perfection

## 📊 Executive Summary

The User module is a **critical foundation** for the entire PTVX ecosystem, providing core authentication, authorization, multi-tenancy, and user management. While technically stable and meeting PHPStan Level 10 standards, it faces **significant documentation and quality gaps** that impact maintainability and onboarding.

### Key Strengths
✅ PHPStan Level 10 compliance (0 errors)  
✅ Solid architecture with layered patterns (Models → Actions → Traits → Filament Resources)  
✅ Comprehensive testing coverage (~88%, improving)  
✅ Advanced features (OAuth, SSO, 2FA, device mana

### `bmad/english-login-translation-parity.md` — Problema


# Problema

La view owner Sixteen chiama `user::login.no_account`, `register_now`,
`forgot_password_text` e `reset_it`. In italiano questi testi erano presenti,
mentre il catalogo `Modules/User/lang/en/login.php` non li definiva: il guest
inglese vedeva chiavi tecniche al posto dei link per registrazione e recupero.

# Criteri e verifica

- [x] Aggiungere i quattro testi inglesi nel catalogo owner User.
- [x] Test Feature `/en/auth/login` verifica i testi e l'assenza delle chiavi grezze.
- [x] Chromium responsive EN 320/768/1440: copy localizzato, nessuna chiave
  grezza, overflow o errore JS. I CTA sono renderizzati con le route owner.

La pagina si trova nel tema Sixteen, ma le traduzioni `user::login.*` appartengono
a `Modules/User`; mantenere questa ownership e riusare la pagina temat

### `bmad/epics/epic-1-identity-core.md` — Epic 1 — Superficie pubblica di identità


# Epic 1 — Superficie pubblica di identità

> **SUMMARY**: epic che porta a una sola sorgente i punti d'ingresso autenticazione e creazione utente del modulo User (login, logout, `CreateUserAction`, `GetPermissionModelAction`), allinea le Resource OAuth2 del cluster `Passport` alle Action esistenti e rende unica la sorgente delle migrazioni. Scope limitato a `Modules/User`.

## Numero e nome

Epic 1 — "User public surface: un solo login, un solo logout, una sola creazione utente".

## Perché ora

L'epic nasce dalle duplicazioni elencate in [../brainstorming.md](../brainstorming.md) (A1–A5): ogni entry point duplicato moltiplica traduzioni da allineare, test da mantenere e superficie esposta ad altri moduli. Il modulo ha già 187 file di test: aggiungere un quinto percorso di login non è so

### `bmad/epics/module-roadmap.md` — User — epic roadmap

# User — epic roadmap

## Epic A — Contratto e architettura

Documentare API pubbliche, dipendenze, confini e invarianti del modulo.

## Epic B — Qualità verificabile

Ridurre finding PHPStan, mantenere test Pest eseguibili e registrare evidence ripetibile.

## Epic C — UX e integrazione

Verificare parità Form/Table, traduzioni, autorizzazioni, error handling e integrazioni dichiarate.

## Epic D — Documentazione viva

Collegare ogni decisione a story BMAD, mantenere il second brain e chiudere i duplicati senza cancellare storia.

## Definition of Done


### `bmad/epics.md` — User Module — Epics for Perfection

# User Module — Epics for Perfection

---
title: "Epic BMAD — User"
type: epics
status: active
updated: 2026-11-16
qmd: "epic BMAD User audit policy ruoli permessi"
---

# User Module — Epics for Perfection

---
title: "User Module: Epics for Perfection"
type: note
status: draft
updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "user module   epics for perfection user"
---

### `bmad/filament-blueprint.md` — Scopo


# Scopo

Contratto Filament del modulo **User**: chrome BO e/o widget FO senza violare
i confini di dominio.

## Regole non negoziabili

1. Estendere solo `XotBaseResource` / `XotBaseWidget` / basi Xot: mai classi Filament dirette.
2. Nessun `->label()` hardcoded: chiavi in `lang/<locale>/` del modulo.
3. Business logic nelle Actions del modulo, non nei form hooks grassi.
4. FO: widget montati esplicitamente; non abusare `discoverWidgets` per chrome.
5. `resources/views/pages/auth/register.blade.php` tiene solo il nome rotta `register`
   e include il componente civico del tema. Il guscio visuale e il widget consensi
   non sono di User.
6. Il nome `@volt` di una pagina FO è univoco. Il fragment è `md5(nome)` ed è
   condiviso da ogni blade che lo ripete: un prototipo non può chiamarsi
  

### `bmad/filament-ux-architecture.md` — Architecture: epic 12 — gap UI/Filament modulo User


# Architecture: epic 12 — gap UI/Filament modulo User

tags: [docs, user, bmad]
qmd: "architecture: epic 12   gap ui/filament modulo user user"

# Architecture: epic 12: gap UI/Filament modulo User

**Track:** BMad Method (feature di qualità UI con requisiti e architettura da allineare)  
**Brainstorming:** [filament-ux-brainstorming.md](./filament-ux-brainstorming.md)

## 1. Overview

Ripristinare la conformità del layer `Filament` di `Modules/User` alle regole progetto
(XotBase inheritance, i18n, zero debug in produzione, SSoT risorse Passport, igiene fs,
policies collegate). Nessuna tabella nuova, nessuna API nuova, nessun provider nuovo.

**In:** `app/Filament/**` (classi, schemi, tabelle, relazioni, widget), `lang/it/**`, risorse fs module.
**Out:** RBAC seed, auth FO/Volt, Persisten

### `bmad/filament-ux-brainstorming.md` — Brainstorming: gap UI/Filament emersi dall'audit (evidenze su disco 2026-09-22)


# Brainstorming: gap UI/Filament emersi dall'audit (evidenze su disco 2026-09-22)

## Idea

Audit read-only sul layer Filament di `Modules/User`: inventario classi + verifica regole
XotBase/Lang/debug/duplicazione. Nessuna struttura nuova: si ripristina la conformità
alle regole progetto con interventi localizzati, tutto in `app/Filament`.

## Opzioni per i 6 gap rilevati

### G1 — Ereditarietà XotBase violata in `BaseEditUser`

### G1: Ereditarietà XotBase violata in `BaseEditUser`

`Resources/UserResource/Pages/BaseEditUser.php:22` → `abstract class BaseEditUser extends EditRecord`.
I tre fratelli (`BaseCreateUser` che estende `XotBaseCreateRecord`, `BaseListUsers`
`XotBaseListRecords`, `BaseViewUser` `XotBaseViewRecord`) sono già conformi.

- (1) `extends XotBaseEditRecord` — esiste in

### `bmad/guest-login-italian-translation.md` — Login guest in italiano — correzione


# Login guest in italiano — correzione

## Comportamento atteso e osservato

Il visitatore guest che apre `/it/auth/login`, o viene reindirizzato al login da una pagina protetta, deve ottenere una pagina 200 con form e testi italiani. Prima della correzione, `Modules/User/lang/it/login.php` conteneva solo `declare(strict_types=1)` e il `require` restituiva `1`; il loader Laravel passava quindi un intero a `array_replace_recursive()` e rispondeva 500.

## Correzione e verifica

- Aggiunto il catalogo italiano `fields/actions/messages` e le etichette usate dalla pagina Sixteen.
- `AuthComponentsTest` verifica 200, etichetta “Ricordami”, CTA di registrazione e redirect guest della pagina profilo al login. I riferimenti alle view sono qualificati col namespace owner `user::`.
- Verifica: `APP

### `bmad/livewire-inventory.md` — Inventario piattaforma: Livewire HTTP → Filament widget


# Inventario piattaforma: Livewire HTTP → Filament widget

**SSoT cross-modulo.** Fonte canonica unica per la campagna di conversione Livewire HTTP → widget Filament.
Ogni modulo mantiene il proprio inventario locale in `docs/bmad/livewire-inventory.md`; questo file
coordina le decisioni di piattaforma e il verdetto per ogni componente.

## Metodo

Per ogni classe in `Modules/<Mod>/app/Http/Livewire` (e `Modules/<Mod>/app/Livewire`) sono stati
verificati, sull’intero repository:

```bash
find Modules/<Mod> -path '*/vendor/*' -prune -o -name '*.php' -path '*Livewire*' -print
grep -rn "@livewire(" Modules/<Mod> --include="*.blade.php"
grep -rn "<livewire:" Modules/<Mod> --include="*.blade.php"
grep -rn "Livewire::component" Modules/<Mod>
grep -rn "Http\\Livewire\\" Modules/<Mod>
grep -rnE "

### `bmad/perfection-architecture.md` — Architecture: Perfezione assoluta del modulo User


# Architecture: Perfezione assoluta del modulo User

**Track:** Perfection campaign (Epic 11-16)
**PRD:** [perfection-prd.md](./perfection-prd.md)

## 1. Overview

Questo documento non introduce nuova architettura di prodotto: il modulo User
resta un modular-monolith Laraxot, identity module, XotBase su tutto il layer
Filament (confermato conforme, vedi brainstorming §2.5/3.4). Il lavoro descritto
qui e' **debito da colmare dentro il pattern esistente**, non un redesign.

**In scope:** ADR per le decisioni architetturali aperte emerse dall'audit (dove
esistono piu' soluzioni valide, serve una decisione esplicita prima che una story
diventi `ready-for-dev`).
**Out of scope:** redesign di Tenant/morph map (confermato corretto), redesign
Filament chrome (coperto da Epic 9/10).

## 2. Stato a

### `bmad/perfection-brainstorming.md` — Brainstorming: audit a 360 gradi, modulo User verso la perfezione assoluta


# Brainstorming: audit a 360 gradi, modulo User verso la perfezione assoluta

## Metodo

Audit read-only, 7 dimensioni indipendenti, eseguito da agenti `general-purpose` con
tool reali (Bash/Read/Grep, verificati `tool_uses > 0` in ogni notifica). Nessun file
modificato, nessuna scrittura su DB, nessuna migration eseguita. Ogni finding qui sotto
è citato a `file:riga` con il comando/verifica reale che lo ha prodotto — dove un claim

è citato a `file:riga` con il comando/verifica reale che lo ha prodotto: dove un claim
di documentazione preesistente non era riproducibile nel codice attuale, l'ho segnalato
esplicitamente (git/codice batte la doc, standing order #3).

Copre l'intero modulo (112 model, 357 file Filament, 57 Actions, 310 test, 103
migration, 3832 file `docs/`), non solo la cam

### `bmad/perfection-decision-log.md` — Decision log: audit "perfezione assoluta" — 2026-09-22


# Decision log: audit "perfezione assoluta" — 2026-09-22

updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "decision log: audit 'perfezione assoluta'   2026-09-22 user"

# Decision log: audit "perfezione assoluta": 2026-09-22

## [2026-09-22] Scope: audit dell'intero modulo, non solo la campagna widget

**Decision:** richiesta utente ("studia a fondo il modulo User... porta alla
perfezione assoluta... solo documentare") coperta con un audit a 7 dimensioni
indipendenti (sicurezza, architettura, qualita' codice/Filament, test, performance,
schema/migrazioni, documentazione), separato dalla campagna Epic 9/10 gia' in
corso (SuperAdmin widget + ritiro Livewire), che resta autonoma e non viene
toccata.

**Rationale:** Epic 9/10 copre solo il chrome UI del toggle SuperAdmin e la
migrazione Liv

### `bmad/perfection-epics.md` — Epics: Perfezione assoluta del modulo User


# Epics: Perfezione assoluta del modulo User

**Track:** Perfection campaign — continua la numerazione dopo Epic 9
(SuperAdmin widget), Epic 10 (ritiro Livewire) ed Epic 12-14
(`module-excellence`, campagna gemella scoperta in corso d'opera — vedi

**Track:** Perfection campaign: continua la numerazione dopo Epic 9
(`module-excellence`, campagna gemella scoperta in corso d'opera: vedi
[perfection-decision-log.md](./perfection-decision-log.md), entry
2026-09-22 "Riconciliazione numerazione con campagna module-excellence").
**Numerazione:** Epic 11 (questa campagna) + Epic 15-19 (questa campagna).
Epic 12-14 sono di **module-excellence** ([epics.md](./epics.md)), non di
questa campagna — referenziate qui solo per cross-link.

questa campagna: referenziate qui solo per cross-link.
**Sources:

### `bmad/perfection-plan.md` — Perfection Plan — Module User Absolute Perfection


# Perfection Plan — Module User Absolute Perfection

updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "perfection plan   module user absolute perfection user"

# Perfection Plan: Module User Absolute Perfection

## Purpose

This document captures **everything** needed to bring the User module to **absolute perfection** from a BMAD documentation perspective. It is the canonical reference for all perfection work, covering:

- Current state audit
- Quality gates (PHPStan, Pest, Filament)
- Missing/outstanding perfection epics and stories
- Code quality remediation
- Documentation completeness
- Testing coverage targets
- Performance and security hardening

### `bmad/perfection-prd.md` — PRD: Perfezione assoluta del modulo User


# PRD: Perfezione assoluta del modulo User

**Track:** Perfection campaign (Epic 11-16, continua la numerazione dopo Epic 9/10).
**Source of truth per il *cosa* e il *perche'*.** Il *come* e' in
[perfection-architecture.md](./perfection-architecture.md), i findings grezzi in
[perfection-brainstorming.md](./perfection-brainstorming.md).

## Executive summary

**Problema:** il modulo User (identity, 112 model, 357 file Filament, 59 migration
attive, 310 test) ha superato una campagna di audit a 360 gradi (7 dimensioni
indipendenti, tool reali verificati) che ha trovato **2 vulnerabilita' critiche di
sicurezza attive** (bypass totale di autorizzazione, nessun rate limiting login),
debito architetturale (duplicazione Actions, codice morto), gap di test sulla parte
piu' sensibile (Policy), N+1

### `bmad/piano-miglioramento.md` — Piano di miglioramento — User


# Piano di miglioramento — User

Derivato dall'[audit](./audits/user-audit.md).

## P0

1. Bonificare marker/conflict se presenti (ora: 0).
2. Chiudere policy troppo permissive (`return true` ≈ 8) con matrice ruolo×ability.
3. Blocchi sicurezza runtime (auth panel, mass assignment, export) con test negativi.

## P1

1. Portare Services (0) ad Actions Queueable dove applicabile.
2. Alzare copertura test (attuale 233 test / 713 app PHP).
3. Allineare Filament (resources=26) a XotBase* e traduzioni Lang.
4. Spezzare dipendenze inverse verso verticali peer se rilevate con `rg`.

## P2


### `bmad/prd.md` — User Module PRD (Product Requirements Document)

# User Module PRD (Product Requirements Document)

**Status**: ✅ Finalized
**Version**: 2.5.0
**Last Update**: 2026-09-21
**Method**: BMAD PRD Creation

## 🎯 Product Vision

The User module is the **foundational identity layer** for PTVX, providing authentication, authorization, user management, team collaboration, and multi-tenancy. It must be **secure by default**, **performant**, **developer-friendly**, and **maintainable** with minimal technical debt.

## 📋 Requirements

### Functional Requirements

#### FR-1: Authentication System
- **FR-1.1**: Multi-factor authentication (credentials, OAuth, SSO, 2FA)
- **FR-1.2**: Secure password handling (bcrypt, expiration, reset flows)
- **FR-1.3**: Session management (creation, validation, expiration, device tracking)
- **FR-1.4**: Token managem

### `bmad/product-brief.md` — Product brief: SuperAdmin nel menu Filament


# Product brief: SuperAdmin nel menu Filament

## 1. Executive summary

L’operatore che *è già* super-admin (o in stato “negato”) deve poter invertire quel privilegio dal menu utente del panel, con un click. Oggi il controllo è un Livewire `Http/Livewire/Profile/SuperAdmin` agganciato a un render hook. Va portato a **Filament widget** (`XotBaseWidget`) perché il chrome del panel appartiene a Filament, non al namespace Livewire “generico”.

**Punti:**
- Problema: UI admin in un contenitore sbagliato (Livewire HTTP), fragile rispetto al panel.
- Soluzione: stesso comportamento, widget Filament montato nello stesso hook.
- Utenti: operatori del panel `admin` con quei due ruoli.
- Metrica: `/admin` mostra l’icona corona; un click inverte il ruolo e ricarica la pagina.

## 2. Problem statement

### `bmad/project-context.md` — Project context — SuperAdmin nel user menu


# Project context — SuperAdmin nel user menu

updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "project context   superadmin nel user menu user"

# Project context: SuperAdmin nel user menu

Costituzione di **questo slice**, non del modulo User intero. Non contraddice la religione User (Actions, PHPStan max, Spatie ruoli, XotBase*).

## Perché esiste

Nel pannello Filament (`GET /admin`) un utente con ruolo `super-admin` o `negate-super-admin` deve **vedere e invertire** quel ruolo dal menu utente (icona corona), senza aprire una Resource. La logica di business vive sul profilo (`ProfileContract::toggleSuperAdmin()`). L’UI oggi è un Livewire in `Http/Livewire`, montato con un render hook: è chrome Filament, non un form pubblico.

## Utenti

- Operatore autenticato nel panel `admin`.
- So

### `bmad/purpose.md` — User — perche' esiste


# User — perche' esiste

## Lo scopo in una frase

**User centralizza l'autenticazione, l'autorizzazione RBAC e la gestione della multi-tenancy, fornendo modelli e trait condivisi che tutti gli altri moduli usano per identificare chi agisce e in quale contesto.**

## L'evidenza

- `User`, `Team`, `Tenant`: modelli base per identity, gruppi, isolamento
- `HasTeams`, `HasTenants`, `HasAuthenticationLog`: trait di autenticazione e autorizzazione
- 666 file PHP, 57 Action, 26 Widget: qui l'interfaccia conta — login, profilo, gestione team sono superfici che l'utente tocca davvero
- OAuth completo (`OauthClient`, `OauthAccessToken`, `OauthRefreshToken`, `OauthAuthCode`, `OauthPersonalAccessClient`)
- `AuthenticationLog`, `Device`: tracciamento accessi e dispositivi
- `Feature` (Pennant): funzi

### `bmad/quick-reference.md` — User — BMAD Quick Reference


# User — BMAD Quick Reference

## Comandi Rapidi

### Help
```bash
bmad-help
```

### Workflow User

```bash
# Phase 1
bmad-domain-research      # Studio dominio identità
bmad-technical-research   # Fattibilità architettura

# Phase 2
bmad-create-prd           # PRD modulo User
bmad-create-architecture  # Architettura DB separata

### `bmad/readme-en.md` — 👤 User — English presentation


# 👤 User — English presentation

[![Domain-Auth](https://img.shields.io/badge/Domain-Auth%20%26%20Teams-1565C0.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://im

### `bmad/readme-fullcalendar-scheduler.md` — FullCalendar Scheduler Documentation - README


# FullCalendar Scheduler Documentation - README

## 🎯 Obiettivo

Questa documentazione è stata creata per risolvere i problemi comuni relativi alle licenze FullCalendar Scheduler nel progetto SaluteOra, basandosi sulla ricerca approfondita della documentazione ufficiale di FullCalendar e dei problemi noti nella community.

## 📚 Documenti Creati

### 1. **Troubleshooting Completo** 
📄 `fullcalendar-scheduler-license-troubleshooting-3.md`
- **400+ righe** di documentazione dettagliata
- Copertura completa di tutti i problemi noti
- Soluzioni specifiche per Laravel/Filament
- Best practices per ambiente sanitario SaluteOra

### 2. **Riferimento Rapido**
📄 `fullcalendar-scheduler-quick-reference-4.md`
- **200+ righe** di soluzioni immediate
- Fix rapidi per errori comuni

### `bmad/readme-new.md` — User Module - Authentication & Authorization


# User Module - Authentication & Authorization

**Last Update**: 2025-12-05
**Status**: ✅ Production Ready
**PHPStan Level**: 10
**Maintainers**: Laraxot Team

---

## 📋 Table of Contents

- [Business Overview](#-business-overview)
- [Architecture](#-architecture)
- [Core Components](#-core-components)
- [Quick Start](#-quick-start)
- [Development Guide](#-development-guide)
- [Security](#-security)
- [API & Integration](#-api--integration)
- [Testing](#-testing)

### `bmad/register-mobile-form-width.md` — Registrazione mobile — larghezza del form


# Registrazione mobile — larghezza del form

## Comportamento osservato

Con viewport 390 px la card di registrazione occupava 318 px, mentre il form si restringeva a 116 px. I campi e le etichette andavano a capo e la compilazione diventava impraticabile.

## Correzione

Il form del widget di registrazione ora dichiara `w-full min-w-0`: espande il layout alla larghezza disponibile e permette ai contenuti flessibili di restringersi senza forzare la card. La regola è limitata alla view owner Sixteen della registrazione.

## Verifica

- Aggiunto test Playwright mobile a 390 px: il form deve superare il 70% della larghezza card e la pagina non deve avere overflow orizzontale.
- Suite `AuthComponentsTest`: 8 test / 19 asserzioni passati; `view:cache`, `node --check` e `git diff --check` passa

### `bmad/setup-guide.md` — User — BMAD Setup Guide


# User — BMAD Setup Guide

## Scopo

Rendere ripetibile e verificabile l'uso del BMAD Method per il modulo User.

## Cosa è "BMAD" qui (Business Logic)

In questo modulo, BMAD serve a:
- **Centralizzare le decisioni di identità**: provider auth, social, 2FA sono definiti in PRD
- **Abilitare l'audit trail**: ogni azione utente viene tracciata in AuthenticationLog
- **Supportare la sicurezza**: PHPStan level 10, code review, test coprono la sicurezza
- **Facilitare la multi-tenancy**: configurazioni tenant isolate

## Struttura Directory (Canonical)

- **`_bmad/`**: moduli/agent/skills + configurazione
- **`_bmad-output/`**: artefatti generati (contesto, prd, architettura, ui spec, ecc.)
- **`docs/bmad/`**: questa documentazione

### `bmad/socialite-separation.md` — Decision: Separate Socialite logic


# Decision: Separate Socialite logic

SocialiteServiceProvider (SocialiteProviders\Manager\ServiceProvider base) exists separately.
UserServiceProvider still references SocialLoginWidget / mergeSocialProviderCredentialsFromEnv.
Next: remove references from UserServiceProvider, keep in SocialiteServiceProvider.
DB: trade_data / trade_user created; connection 'user' added in config/database.php.
2026-10-05: profile id fix to be placed in Trade/migrations (not User). DB trade_user profiles.id char(36) NULL DEFAULT missing.

### `bmad/status.md` — status


BMAD STATUS — User
- Inventario docs: docs/architecture/, docs/stories/, docs/wiki/
- PHPStan: 0 errori (OK)
- Wiki aggiornata: docs/wiki/scope.md (scopo: utenti/profili/auth/GDPR decoupling)

### `bmad/stories/01.35.profile-migration-deleted.story.md` — Cancellazione migrazione errata per profiles (User)


# Cancellazione migrazione errata per profiles (User)

## Errore riscontrato

```
SQLSTATE[42000]: Incorrect table definition; there can be only one auto column and it must be defined as a key
SQL: alter table profiles drop primary key
```

## Causa

La migrazione `2026_10_01_180000_fix_profiles_id_auto_increment.php` tentava di modificare `profiles.id` con `drop primary key` — operazione illegale per una chiave primaria auto-increment.

## Regola BMAD

**1 migrazione per modello**, nomi seguono convenzione (`docs/bmad/` in moduli). Non creare migrazioni ad-hoc per correzioni su chiavi primarie esistenti.

## Azione


### `bmad/stories/citizen-registration-email.story.md` — Registrazione cittadino: UX accessibile e verifica email locale


# Registrazione cittadino: UX accessibile e verifica email locale

## Contesto

La registrazione `/it/auth/register` usa il widget User dentro il tema Sixteen.
Le traduzioni arrivano dal LangServiceProvider; la posta locale è già fornita da
Postfix e sendmail.

## Acceptance criteria

- [x] La pagina usa copy italiano senza chiavi grezze.
- [x] Password e conferma restano leggibili in colonna su mobile.
- [x] Errori e suggerimenti sono annunciabili da tecnologie assistive.
- [x] Laravel usa `/usr/sbin/sendmail` tramite Postfix locale.
- [x] `AUTH_MUST_VERIFY_EMAIL=true` abilita l'invio della verifica per utenti
      compatibili con `MustVerifyEmail`.
- [ ] Browser smoke test su HTTPS con database e mail sink disponibili.
- [ ] Test di consegna verso provider esterno dopo la configurazion

### `bmad/stories/continuazione-domani.md` — User — Continuazione Domani


# User — Continuazione Domani

  - ../../stories/user-nested-conflict-marker-cleanup.story.md
updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "user   continuazione domani user"

# User: Continuazione Domani

## Stato verificato ora (sessione 2026-09-22)

- Riconciliazione divergenza `dev`/`laraxot-dev` (`db4ea2a9`, "ahead 60/behind
  80"): **fatta e pushata**. `git branch -vv` oggi: `dev` == `[laraxot/dev]`
  in punta (`6a799fb1`), `git rev-list --left-right --count dev...laraxot/dev`
  → `0 0`. Documentata in
  `docs/stories/user-nested-conflict-marker-cleanup-2026-09-22.story.md`

  `docs/stories/user-nested-conflict-marker-cleanup.story.md`
  (addendum "riconciliazione completata").

### `bmad/stories/continuazione-domani.story.md` — Continuazione domani


# Continuazione domani

TODO: story description

### `bmad/stories/docs-md-filename-date-debt.story.md` — Docs md filename date debt — User


# Docs md filename date debt — User

## GateGuard facts (first touch)

1. **Does not supersede an existing User doc**: nessun `docs-md-filename-date-debt*.md` sotto `User/docs` (Glob 0). Companion diary della story Xot canonica `Modules/Xot/docs/bmad/stories/docs-md-filename-date-debt.story.md`, non duplicato di contenuto business.
2. **Linked from**: story Xot (diario wave User) + istruzione parent swarm docs-guardian.
3. **Why new file**: l'utente richiede esplicitamente diary/story sotto `User/docs/bmad/stories/` (cartella già esistente); non esiste ancora file omonimo da editare.
4. **User instruction (verbatim excerpt)**: «Also write/append diary in laravel/Modules/User/docs/bmad/stories/ if docs/bmad/stories exists, else create docs-md-filename-date-debt.story.md under User docs/bma

### `bmad/stories/english-login-localization.story.md` — Login inglese senza fallback italiano


# Login inglese senza fallback italiano

## Problema

`/en/auth/login` impostava correttamente la lingua URL ma mancavano le chiavi
`user::auth.login_page.*` e alcuni link `user::login.*` in inglese. Laravel quindi
usava il fallback italiano, producendo una pagina ibrida.

## Correzione

Completate le chiavi inglesi nel modulo User. Sixteen continua a consumare le
traduzioni namespaced del modulo, senza etichette hardcoded nel tema.

## Acceptance criteria

- [x] Titolo, heading, descrizione e supporto di `/en/auth/login` sono inglesi.
- [x] Link registrazione e reset password sono inglesi.
- [x] `/it/auth/login` resta italiano.
- [ ] Smoke test browser automatizzato su HTTPS quando il runtime Playwright è disponibile.

### `bmad/stories/livewire-residual-conversion-cluster-c.story.md` — 10.4 — residui Livewire Cluster C


# 10.4 — residui Livewire Cluster C

  - ../livewire-inventory.md
  - ../advantages-filament-only.md
  - ../livewire-widget-admin-panel-provider.md
updated: 2026-10-13
tags: [docs, user, bmad]

# 10.4: residui Livewire Cluster C

## Perche'

Epic 9 done (SuperAdmin widget ecc.), ma restano componenti HTTP Livewire
da convertire/eliminare verso il target "solo Filament widget" — vantaggi

da convertire/eliminare verso il target "solo Filament widget": vantaggi
documentati in `advantages-filament-only.md` (SPOF 500 su /admin, doppia
manutenzione, no `canView()`/lazy).


### `bmad/stories/login-validation-feedback.story.md` — Feedback delle credenziali di accesso errate


# Feedback delle credenziali di accesso errate

Il login deve mostrare un errore generico tradotto accanto al campo email quando
le credenziali sono errate, senza rivelare se un account esiste.

## Criteri di accettazione

- [x] Errore associato a `data.email`, coerente con lo schema Filament.
- [x] Messaggio scalare disponibile in italiano e inglese tramite traduzioni esistenti.
- [x] Pest verde su `login` e sull'alias `save`, senza database.
- [x] Lint, stile e analisi statica focalizzata verificati.

## Ownership e task

- Agente audit-ux: LoginWidget, AuthLoginFeedbackTest e questa story, con lock esclusivi.
- Coordinatore: sprint e second brain.
- [x] Audit in sola lettura e verifica del percorso di stato.
- [x] Test di regressione prima/dopo e modifica minima di una riga.


### `bmad/stories/module-bmad-audit-user-baseline-analisi-completa.story.md` — Story — User: baseline BMAD

# Story — User: baseline BMAD

Come manutentore del modulo User, voglio una baseline BMAD verificabile, così da poter pianificare lavoro senza confondere ipotesi, WIP e comportamento osservato.

## Acceptance criteria

- [ ] Confermare API pubblica e confini con riferimenti a codice reale.
- [ ] Inventariare i flussi critici e collegarli a test Pest.
- [ ] Misurare PHPStan/Pest nel contesto stabile del modulo.
- [ ] Registrare dipendenze, rischi e decisioni nel modulo.
- [ ] Aggiornare lo stato reale in `docs/sprint-status.yaml`.

## Task

- [ ] Revisione architettura.
- [ ] Brainstorming con stakeholder.
- [ ] Decomposizione epic in story più piccole.
- [ ] Quality gate e second-brain write-back.


### `bmad/stories/navigation-translations-audit.story.md` — Audit traduzioni `.navigation` — modulo User


# Audit traduzioni `.navigation` — modulo User

Task utente 2026-09-29: trovare tutti i file di traduzione con la sottostringa
`.navigation` o una chiave `'navigation'`, completare/migliorare per ogni
lingua, senza mai togliere contenuto esistente. Dettaglio completo, metodo e
tabelle nel documento di sintesi cross-modulo:
`docs/wiki/i18n/navigation-translations-audit.md` (inventario pre-intervento in `docs/wiki/i18n/navigation-translations-inventory-2026-09-29.md`).

## Esito

Target esplicito dell'utente: unico file con `.navigation` letterale come
segmento di chiave (`user::auth.navigation.*`) è `lang/it/auth.php`, già
completo. Le altre 4 lingue con lo stesso file (`en`, `fr`, `es`, `ru`)
avevano `navigation.label`/`plural_label`/`group` a placeholder: tradotti
sulla base del riferime

### `bmad/stories/passport-oauth-docs-dedup.story.md` — Story — Dedup documentazione "passport/oauth cluster"


# Story — Dedup documentazione "passport/oauth cluster"

## Obiettivo

`laravel/Modules/User/docs/` conteneva ~29 file quasi-duplicati sul tema
"passport cluster / oauth cluster", scritti in sessioni diverse nel tempo
(2026-07 → 2026-09), con contenuto sovrapposto e spesso contraddittorio
("✅ COMPLETATO" in un file, "🔴 IN LAVORO"/directory vuota nel file successivo).
Obiettivo: consolidare in un unico documento canonico verificato sul codice
reale, senza perdere nessuna decisione o problema documentato, e senza
toccare il codice applicativo (fuori scope).

## Cosa e' stato trovato

1. **Ridondanza documentale severa**: 23 file `passport-cluster*.md` + 6
   `oauth-cluster*.md`, molti con contenuto quasi identico (stesso template,
   stesse frasi "Metodologia Super Mucca", stesso elenco "20

### `bmad/stories/phpstan-filter-form-schema.story.md` — Scopo


# Scopo

Verificare il residuale PHPStan su
`RoleResource/RelationManagers/UsersRelationManager` (filtro `created_at`).

## Acceptance criteria

- [x] `Filter::make(...)->form([...])` conservato (API corretta tables ≥ 5.11.2).
- [x] Nessun passaggio a `->schema()` (deprecato su `BaseFilter`).
- [x] Story collegata a Xot `phpstan-filterbuilder-schema`.

## Root cause

Report che chiede `form()` → `schema()` è invertito rispetto a
`Filament\Tables\Filters\Concerns\HasForm` su filament/tables v5.12.0.
Il call-site User era già corretto; nessuna patch applicativa.

## Gate


### `bmad/stories/phpstan-l10-user-lang-fix.story.md` — PHPStan L10 User + Lang Modules Fix


# PHPStan L10 User + Lang Modules Fix

## Status: DONE

Parallel subagent analysis completed with findings and partial implementation.

## Summary

### User Module (Story 8.1)
**✅ VERIFIED CLEAN**

Confirmation that 77 offsetAccess errors from Story 8.1 remain resolved:
- Migration file `2026_10_05_174817_create_permission_tables.php`: PHPStan L10 `[OK] No errors`
- Type casting pattern: `(array) config('permission.table_names')`
- Type narrowing: `/** @var string $varname */` on extracted variables
- Conditional narrowing: @var tags in conditional blocks for team_foreign_key
- No regressions, no suppressions needed

### Lang Module (Story 8.10/8.11)

### `bmad/stories/phpstan-l10-user-phase2.story.md` — PHPStan L10 User Module — Phase 2


# PHPStan L10 User Module — Phase 2

**Status: IN PROGRESS** — Resource constraints (WSL2 memory) prevent full-module analysis; using targeted file-by-file review.

## Findings (Session 2026-10-06)

### Fix 1: HasModules trait — Malformed PHPDoc (READY)

**File**: `Modules/User/app/Models/Traits/HasModules.php`
**Line**: 39
**Issue**: `/* @var ... */` (single-asterisk comment) should be `/** @var ... */` (double-asterisk PHPDoc)
**Impact**: PHPStan L10 may not recognize the type hint
**Fix**: Change line 39

```php
// BEFORE
/* @var array<string, Module> $result */

// AFTER

### `bmad/stories/pulse-login-backfill-key-hash.story.md` — Pulse login metric: fix schema key_hash e backfill


# Pulse login metric: fix schema key_hash e backfill

## Obiettivo (cosa voleva fare l'utente)

- `LoginWidget` (Filament ChartWidget) disegna `user_login` da
  `Pulse::graph(['user_login'], 'count', ...)`; `LoginCard` usa
  `GetLoginStatsAction` su `authentication_logs`.
- `RecordLoginPulseAction` esiste ma non ha call site. `LoginListener` scrive
  `AuthenticationLog` dei login riusciti, senza registrare la metrica Pulse.
- `user:pulse-backfill-logins` ricostruisce la metrica da
  `authentication_logs` (connessione `user`, DB `ptv_user`).
- Goal utente: **importare in Pulse tutto `authentication_logs`** (169 righe
  nel periodo, non solo 7 giorni).

## Root cause del fallimento

`BackfillLoginPulseCommand` (e OGNI scrittura Pulse, live inclusa) fallisce con:

```

### `bmad/stories/socialite-provider-boundary.story.md` — Story: move Socialite config to SocialiteServiceProvider


# Story: move Socialite config to SocialiteServiceProvider

## Context

The User module already has a dedicated `SocialiteServiceProvider`, but `UserServiceProvider` still contains Socialite-specific configuration merge logic. This blurs provider responsibilities and makes the generic User bootstrap aware of OAuth provider details.

## Scope

Move the `services.*` → `user.social-providers.*` credential merge from `UserServiceProvider` to `SocialiteServiceProvider` without changing config keys or runtime behavior.

## Acceptance criteria

- [x] `UserServiceProvider` has no Socialite-specific provider list or credential merge method.
- [x] `SocialiteServiceProvider` loads both admin socialite config and credentials from `config/services.php`.
- [x] `php artisan package:discover --ansi` succ

### `bmad/stories/team-permissions-sqlite-migration.story.md` — Story: team_permissions migration on SQLite


# Story: team_permissions migration on SQLite

## Context

The `2026_08_06_150000_create_team_permissions_table` migration queried
MySQL's `information_schema.table_constraints` while running against the
project's SQLite test/development database. SQLite consequently aborted the
migration before the schema could be completed.

## Acceptance criteria

- [x] Foreign-key existence checks use Laravel's connection-independent schema
      builder API.
- [x] No migration code queries `information_schema` for this check.
- [x] The migration passes PHP syntax validation.
- [x] The configured database reports the migration as applied and `migrate`
      has no pending migrations.

## Implementation

### `bmad/stories/xot-base-resource-navigation-icon-translation.story.md` — Story


# Story

Come utente del modulo User, voglio che le Resource basate su `XotBaseResource` usino la navigazione centralizzata e tradotta, senza dichiarazioni statiche `navigationIcon` ridondanti.

## Acceptance criteria

- [ ] Censire le Resource del modulo che estendono direttamente o indirettamente `XotBaseResource` e verificare ogni `navigationIcon` rispetto alla configurazione tradotta.
- [ ] Rimuovere solo le dichiarazioni ridondanti, preservando le voci e il comportamento della navigazione.
- [ ] Validare il modulo con PHPStan e test mirati; aggiornare la documentazione tematica con l’esito.

## Dipendenza

La regola comune e il censimento fleet sono definiti in `laravel/Modules/Xot/docs/bmad/stories/xot-base-resource-navigation-icon-translation.story.md`.

### `bmad/tech-spec-superadmin-widget.md` — Project context: SuperAdmin nel user menu


# Project context: SuperAdmin nel user menu

Costituzione di **questo slice**, non del modulo User intero. Non contraddice la religione User (Actions, PHPStan max, Spatie ruoli, XotBase*).

## Perché esiste

Nel pannello Filament (`GET /admin`) un utente con ruolo `super-admin` o `negate-super-admin` deve **vedere e invertire** quel ruolo dal menu utente (icona corona), senza aprire una Resource. La logica di business vive sul profilo (`ProfileContract::toggleSuperAdmin()`). L’UI oggi è un Livewire in `Http/Livewire`, montato con un render hook: è chrome Filament, non un form pubblico.

## Utenti

- Operatore autenticato nel panel `admin`.
- Solo chi ha già `super-admin` o `negate-super-admin` vede il controllo. Chi non ha nessuno dei due vede vuoto.

## Vincoli non negoziabili

1. Estend

### `bmad/tech-spec.md` — Technical specification: SuperAdmin widget


# Technical specification: SuperAdmin widget

**Track:** Quick Flow (4 story)  
Questo file è il *come* operativo. **Non implementare da questo documento in questa sessione:** è il contratto per lo sviluppatore successivo.

## Problem & solution

Oggi `SuperAdmin` è `Livewire\Component` in `Http/Livewire/Profile`. Il panel lo monta con un alias stringa. Si converte in `XotBaseWidget` nello stesso hook.

## Scope

**In:** classe widget, vista Filament, lang, `AdminPanelProvider`, rimozione Livewire, test.  
**Out:** altri hook del provider; trait `toggleSuperAdmin`; FilamentJet.

## Stack

| Layer | Tecnologia | Note |
|-------|------------|------|
| Panel | Filament 5 / `XotBasePanelProvider` | `discoverWidgets` su `Filament/Widgets` |

### `bmad/user-architecture-gap-analysis.md` — User — Analisi architetturale e gap (BMAD, 2026-09-22)

# User — Analisi architetturale e gap (BMAD, 2026-09-22)

---
title: "User: Analisi architetturale e gap (BMAD, 2026-09-22)"
type: note
status: draft
updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "user   analisi architetturale e gap (bmad, 2026-09-22) user"
---
# User — Analisi architetturale e gap (BMAD, 2026-09-22)

# User: Analisi architetturale e gap (BMAD, 2026-09-22)

Ricerca a sola lettura condotta sul modulo `laravel/Modules/User` (Laravel 13 + Filament 5, architettura Laraxot/Xot).

## 1. Inventario sintetico

| Area | Conteggio | Note |
|---|---|---|

### `bmad/ux-design.md` — UX design: emblema hero nel user menu


# UX design: emblema hero nel user menu

## Scopo

Un controllo **silenzioso** accanto al menu account Filament. Non un form, non una pagina, non un banner.

## Posizione

Hook `USER_MENU_BEFORE`. A sinistra del menu utente, distinto dal team switcher.

## Stati visivi

| Stato profilo | Metafora | File SVG | Icona Blade Icons | Colore Filament | Tooltip (lang) |
|---------------|----------|----------|-------------------|-----------------|----------------|
| `super-admin` | identità svelata | `superman.svg` | `user::superman` | `warning` | attivo |
| `negate-super-admin` | identità nascosta | `clark-kent.svg` | `user::clark-kent` | `danger` | negato |
| nessuno dei due | — | — | nessun bottone | — | — |

| nessuno dei due |: |: | nessun bottone |: |: |

### `bmad-brainstorming.md` — Domanda guida


# Domanda guida

Come tenere chrome Filament (user menu/widget) senza reintrodurre Livewire HTTP legacy?

## 5 Whys (sintesi)

1. L'utente sente frizione o opacita sul valore di **User**.
2. La frizione nasce da confini poco chiari tra owner e consumer.
3. I confini si offuscano quando UI, persistenza e policy vivono nello stesso file "comodo".
4. Senza contratto, ogni fix locale crea una seconda verita.
5. Serve planning BMAD + blueprint Filament + docs owner come unica memoria operativa.

## Starbursting

- **Chi:** cittadino, operatore PA, super-admin
- **Cosa:** Identita e autorizzazione permettono a cittadini e PA di agire in sicurezza nel proprio tenant.
- **Quando:** a ogni incremento che tocca questo owner; decisioni in decision-log.
- **Dove:** `laravel/Modules/User/docs/` (+ `do

### `bmad-second-brain.md` — BMAD + Second Brain: Fix Log

# BMAD + Second Brain: Fix Log

## Diagnosi
- `main_module=''` → `XotData::getProfileClass()` falliva (`InvalidArgumentException`)
- `IsProfileTrait.php`: duplicato `use UserContract`
- `BaseProfile.php`: `id` UUID mancante (`PDOException` 1364)
- PHPStan: 309 `class.notFound` (mancanti `User`/`Profile` nei test, Riferimenti `<nome progetto>`)

## Fix applicati (SSoT)
- `Modules\Xot\Contracts\UserContract` / `ProfileContract`
- `XotData.php:31` → `main_module = 'User'`
- `IsProfileTrait.php`: rimosso duplicato
- `Profile.php:50` → `@property-read UserContract|null $user`
- `BaseProfile.php`: `$incrementing=false`, `$keyType='string'`, UUID `booted()`
- Gdpr actions: `UserContract $user` (nessun modello concreto in public type-hints)

## Docs aggiornati
- `Modules/User/docs/` → SSoT contrat

### `boost-skill-fix-summary.md` — Boost Skill Fix Summary - User Module


# Boost Skill Fix Summary - User Module

**Date**: 2026-03-02  
**Module**: User (Authentication & Management)

## Issue Overview

The `boost:add-skill` command failure prevented all Laravel functionality, including the User module's authentication and management systems.

## Root Cause

Missing Laravel framework dependencies due to `_comment` sections in `composer.json`.

## Impact on User Module

The User module was completely non-functional:
- Authentication system couldn't load
- User models couldn't be instantiated
- User management interfaces were inaccessible

### `bug-fixes/make-filament-user-crash-loop.md` — Bug Fix: Crash durante creazione utenti con make:filament-user


# Bug Fix: Crash durante creazione utenti con make:filament-user

## 🐛 Problema Identificato

### Sintomo
Il comando `php artisan make:filament-user` crasha o va in loop infinito quando tenta di creare un nuovo utente.

### Data Identificazione
14 Ottobre 2025

### Severità
🔴 **CRITICA** - Blocca completamente la creazione di utenti da console

## 🔍 Analisi Causa Radice

### Stack Trace del Problema

```
InteractsWithTenant::bootInteractsWithTenant()

### `bug-fixes/parse-orphan-methods.md` — Bug Fix: ParseError - Metodi Orfani Fuori dalla Classe


# Bug Fix: ParseError - Metodi Orfani Fuori dalla Classe

## Data

2025-01-27

## Problema

**ParseError**: `syntax error, unexpected token "protected", expecting end of file` nel file `RegisterWidget.php` alla riga 364.

## Causa Root

Durante il refactoring del `RegisterWidget.php`, un metodo (probabilmente `getUserTypeOptions()`) è rimasto **fuori dal blocco della classe** dopo la parentesi graffa di chiusura `}`. Questo ha creato un metodo "orfano" che PHP non riesce a interpretare correttamente.

## Risoluzione (2025-06-24)

- Ricostruito il file `RegisterWidget.php` con la corretta struttura di classe
- Verificato che tutti i metodi siano correttamente racchiusi all'interno della classe
- Corretto l'encoding del file da US-ASCII a UTF-8

### `bugfix/deviceuser-hasxotfactory-fix.md` — Bugfix: DeviceUser e HasXotFactory


# Bugfix: DeviceUser e HasXotFactory

## Contesto

Durante il login utente, si verificava un Fatal Error causato dalla mancanza del trait `HasXotFactory` utilizzato dal modello `DeviceUser`.

## Problema

Il modello `DeviceUser` estende `BasePivot`, che a sua volta estende `Illuminate\Database\Eloquent\Relations\Pivot`. 

```php
class DeviceUser extends BasePivot
{
    use \Modules\Xot\Models\Traits\HasXotFactory;  // ❌ Trait mancante
}
```

## Causa


### `bugfix/deviceuser-hasxotfactory.md` — Bugfix: DeviceUser e HasXotFactory


# Bugfix: DeviceUser e HasXotFactory

## Contesto

Durante il login utente, si verificava un Fatal Error causato dalla mancanza del trait `HasXotFactory` utilizzato dal modello `DeviceUser`.

## Problema

Il modello `DeviceUser` estende `BasePivot`, che a sua volta estende `Illuminate\Database\Eloquent\Relations\Pivot`. 

```php
class DeviceUser extends BasePivot
{
    use \Modules\Xot\Models\Traits\HasXotFactory;  // ❌ Trait mancante
}
```

## Causa


### `bugfix/multiple-bugs-resolution.md` — Multiple Bugs Resolution - 16 Dicembre 2025


# Multiple Bugs Resolution - 16 Dicembre 2025

**Data Fix**: 16 Dicembre 2025
**Status**: ✅ Tutti i bug risolti
**Metodologia**: Fix Forward (NEVER go back to previous versions)

---

## 🐛 Bug Risolti

### Bug 1: Conflitti Git nei PHPDoc

**File Coinvolti**:
- `app/Actions/Socialite/CreateUserAction.php`
- `app/Contracts/TeamContract.php`
- `app/Contracts/UserContract.php`

**Problema**: Marker Git `
 */

### `bugfix-permission-table-names-singular.md` — spatie/laravel-permission — `table_names` è la fonte di verità fissa, mai la schema


# spatie/laravel-permission — `table_names` è la fonte di verità fissa, mai la schema

## Regola finale (stabilita direttamente dall'utente, non negoziabile)

> "il file laravel/config/permission.php non devi modificare le table_names! io ho scelto
> quelle convenzioni e te devi rispettarle, sono le query che devono andare a prendere la
> tabella configurata non il contrario!"

`config/permission.php` (root) e ogni suo overlay tenant (`config/local/{tenant}/permission.php`)
sono **immutabili per un agente**. I valori `table_names.*` sono una scelta deliberata
dell'utente, fissata una volta. **Non si "correggono" mai in base a quali tabelle esistono
sul DB in un dato momento.**

Se c'è un mismatch tra config e schema fisico, è **la schema che deve essere allineata alla
config** — mai il co

### `bugfix-phpmd-cleanup.md` — Bug fix + cleanup phpmd (Modules/User, 2026-07-12)


# Bug fix + cleanup phpmd (Modules/User, 2026-07-12)

## Bug reali corretti

- **`Filament/Widgets/EditUserWidget.php::updateUser()`**: il metodo
  raccoglieva `$data`/`$record` dal form e ritornava subito
  `redirect()->back()` senza mai delegare all'action (`$this->action`,
  costruita in `mount()` seguendo lo stesso pattern documentato in
  `docs/filament/widgets/edit-user-widget.md`). Il salvataggio non avveniva
  mai. Aggiunta la chiamata `app($this->action)->execute($record, $data)`,
  stesso pattern già usato in `RegistrationWidget::register()`.
- **`Filament/Clusters/Passport/Resources/OauthAccessTokenResource.php`**:
  l'azione bulk `revoke_all_for_user` calcolava `$count` (token revocati) ma
  la notifica di successo non lo passava mai al placeholder `:count` della
  traduzione 

### `bugfix-profile-uuid-id-missing-default.md` — Bugfix — Profile `firstOrCreate()` fatal: "Field 'id' doesn't have a default value"

# Bugfix — Profile `firstOrCreate()` fatal: "Field 'id' doesn't have a default value"

## Sintomo (produzione, 2026-07-27)

```
SQLSTATE[HY000]: General error: 1364 Field 'id' doesn't have a default value
insert into `profiles` (`user_id`, `uuid`, `updated_at`, `created_at`) values (...)
```

Scatenato da `XotData::getProfileModelByUserId()` → `Profile::firstOrCreate(['user_id' => ...])`,
chiamato da `XotComposer` su ogni pagina (view composer globale).

## Causa

La tabella `profiles` (connection `user`, db `workorder_user`) aveva `id` come
`char(36)` UUID primary key legacy (creata dalla prima di 5 migrazioni
`create_profiles_table.php` mai consolidate — violazione "1 model = 1 migration").
`Modules\User\Models\BaseProfile::casts()` dichiara `'id' => 'integer'` e nessun
codice generava u

### `bugs/make-filament-user-infinite-loop.md` — Bug: Infinite Loop in make:filament-user Command


# Bug: Infinite Loop in make:filament-user Command

## Problema Identificato

Il comando `php artisan make:filament-user` va in crash con un loop infinito quando si cerca di creare un nuovo utente.

## Causa Root

Il problema è localizzato nel trait `HasTeams` nel metodo `currentTeam()` alle righe 243-244:

```php
// File: Modules/User/app/Models/Traits/HasTeams.php
public function currentTeam(): BelongsTo
{
    $xot = XotData::make();
    if ($this->current_team_id === null && $this->id) {
        $this->switchTeam($this->personalTeam());  // ⚠️ PROBLEMA QUI
    }


### `case-conflicts.md` — Case-Insensitive File Conflicts


# Case-Insensitive File Conflicts

Nel modulo `User` sono presenti i seguenti file duplicati per sola differenza di maiuscole/minuscole:

- `Modules/User/.devcontainer`: `README.md`, `README.md`
- `Modules/User/.github`: `CONTRIBUTING.md`, `CONTRIBUTING.md`
- `Modules/User/.github`: `SECURITY.md`, `SECURITY.md`
- `Modules/User/docs`: `index.md`, `index.md`

Correggere mantenendo una sola variante coerente con le convenzioni del progetto e aggiornare gli eventuali riferimenti.

### `case-variant-collisions.md` — Collisioni di nome per sola differenza di maiuscole

# Collisioni di nome per sola differenza di maiuscole

**Misurato**: 2026-08-31
**Regola violata**: `no-case-variations`, `case_sensitive_naming_critical`
**Quadro generale**: [Modules/Xot/docs/stato-qualita-progetto-2026-08-31.md](../../Xot/docs/stato-qualita-progetto-2026-08-31.md)

## Il problema

In questo modulo esistono percorsi che differiscono solo per maiuscole. Su Linux
convivono. Su filesystem case-insensitive, cioe' macOS di default e Windows, i due
percorsi sono lo stesso percorso: al clone uno dei due file sovrascrive l'altro, in
modo non deterministico. Il repository risulta corrotto senza che nulla segnali
l'errore.

Riproduzione:

```bash
cd laravel && find Modules/User -name '*.php' -not -path '*/vendor/*' \
  | awk '{print tolower($0)}' | sort | uniq -d
```

### `cases.md` — cases


See canonical documentation: ../../../Themes/docs/shared-components/case-conflicts.md

### `chartjsatalabels-user-integration.md` — Chart.js Datalabels Plugin for User Module Charts


# Chart.js Datalabels Plugin for User Module Charts

## Overview

This guide explains how to implement the Chart.js datalabels plugin in User module charts, such as user registration trends, role distribution, and activity statistics. The datalabels plugin enhances user data visualization by displaying values, percentages, or other information directly on chart elements.

## Implementation in User Module ChartWidgets

### Basic User Registration Chart with Datalabels

```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseChartWidget;
use Modules\User\Models\User;

### `charts-implementation.md` — User Module - Charts Implementation


# User Module - Charts Implementation

## 📋 Panoramica

Il modulo **User** implementa chart widget per visualizzare statistiche utenti, autenticazioni, registrazioni e trend. Questa documentazione copre l'implementazione esistente e best practices.

**Modulo:** User
**Framework:** Laraxot/PTVX
**Filament:** 4.x
**Chart.js:** 4.x

---

## 📊 Widget Implementati

### 1. UsersChartWidget

**Path:** `Modules/User/app/Filament/Widgets/UsersChartWidget.php`


### `clusters/passport-actions.md` — Passport Administrative Actions in Filament


# Passport Administrative Actions in Filament

> Riferimenti ufficiali: [Laravel Passport 12.x Docs](https://laravel.com/docs/12.x/passport) e [laravel/passport GitHub](https://github.com/laravel/passport).

Questo documento elenca le operazioni **obbligatorie** che il cluster `Passport` nel modulo **User** deve rendere disponibili da Filament per evitare l’utilizzo manuale del terminale. Ogni azione riporta il comando/articolo di riferimento e la pagina/risorsa Filament responsabile dell’implementazione.

## 1. Resource Actions (CRUD + operazioni mirate)

### 1.1 `OauthClientResource`

| Azione | Fonte ufficiale | Dettagli implementativi |
| --- | --- | --- |
| Creazione Client standard | Docs § "Managing Clients" | Page `ListOauthClients` → header action che richiama `CreateClientAction

### `code-conventions-2.md` — code-conventions-2


See canonical documentation: ../../Geo/docs/sushi-command-2.md

### `code-conventions.md` — code-conventions



### `code-optimization.md` — user module code and documentation optimization analysis


# user module code and documentation optimization analysis

## comprehensive analysis

### current state overview
- **documentation files**: 390 md files with significant duplication
- **code files**: complex authentication and user management system
- **structural issues**: mixed patterns, duplicate functionality
- **maintenance challenges**: difficult to navigate authentication flows

## documentation optimization

### documentation problems identified
1. **authentication duplication**: 18+ files covering logout functionality
2. **mixed patterns**: underscore and hyphen naming conventions
3. **scattered best practices**: security guidelines across multiple files
4. **outdated content**: mixed current and legacy approaches

### documentation optimization strategy

### `code-redundancy-audit.md` — Code redundancy audit — User


# Code redundancy audit — User

## Scopo

Ridurre rumore, duplicazione e ambiguita' nel codice di questo module, senza perdere conoscenza storica.

## Metriche

| Voce | Valore |
|---|---:|
| File PHP analizzati | 918 |
| Rischio ridondanza | high |
| Basename duplicati locali | 12 |
| Hash normalizzati duplicati cross-owner | 19 |
| Class/trait/interface name ripetuti nel monorepo | 12 |
| File grandi >=350 righe | 6 |
| File PHP con marker Git | 0 |

## Evidenze

### `codebase-overview.md` — Panoramica codebase User


# Panoramica codebase User

## Responsabilità

Autenticazione, utenti, ruoli, team, tenant e OAuth.

## Fotografia verificata

- File PHP applicativi: **642**
- Queueable Actions: **48**
- Modelli: **104**
- Test PHP: **148**
- Documenti Markdown rilevati: **1690**

Directory e contesti principali: Actions, Application, Contracts, Datas, Events, Filament, Livewire, Models, Notifications e Providers.

I conteggi sono una fotografia del repository, non obiettivi architetturali. Prima di aggiungere codice va cercata e riusata l'implementazione già presente, soprattutto nelle Actions e nelle classi base Xot.

## Confini

### `codex-error-fix.md` — codex-error-fix


See canonical documentation: ../../../Themes/docs/shared-components/codex-error-fix.md

### `commands/assign-module-command.md` — AssignModuleCommand - Gestione Moduli Utente


# AssignModuleCommand - Gestione Moduli Utente

## Descrizione
Il comando `user:assign-module` permette di assegnare o revocare moduli a/da un utente tramite un'interfaccia interattiva con multiselect.

## Funzionalità

### Caratteristiche Principali
- **Multiselect Interattivo**: Mostra tutti i moduli disponibili con checkbox
- **Stato Corrente**: I moduli già assegnati all'utente sono pre-checked
- **Assegnazione/Revoca**: Permette di assegnare nuovi moduli e revocare quelli esistenti
- **Feedback Visivo**: Mostra chiaramente le operazioni eseguite
- **Gestione Errori**: Controlli preventivi per utenti non trovati

### Comportamento
1. **Input Email**: Richiede l'email dell'utente
2. **Verifica Utente**: Controlla che l'utente esista
3. **Mostra Stato Corrente**: Visualizza i moduli att

### `commands/change-password-command.md` — ChangePasswordCommand


# ChangePasswordCommand

## Panoramica
Il comando `ChangePasswordCommand` permette di cambiare la password di un utente esistente tramite interfaccia console interattiva o parametri da riga di comando.

## Comando
```bash
php artisan user:change-password [--email=user@example.com]
```

## Funzionalità

### Caratteristiche Principali
- **Interfaccia Interattiva**: Utilizzo di Laravel Prompts per input utente
- **Validazione Email**: Controllo formato email prima del processing
- **Controllo Esistenza**: Verifica che l'utente esista e sia persistente
- **Gestione Password**: Hash sicuro e aggiornamento scadenza
- **Reset OTP**: Disattivazione automatica del flag OTP
- **Eventi**: Dispatched dell'evento NewPasswordSet

### `completion-status.md` — User: cosa manca per completare


# User: cosa manca per completare

Fotografia misurata il 2026-10-28 (sola lettura). Si rigenera con gli stessi controlli: story nel frontmatter,
PHPStan livello 10, blade troncate, traduzioni, test. Riepilogo di progetto: `Modules/Xot/docs/project-completion-status.md`.

## Indicatori

| Indicatore | Valore |
|---|---|
| File PHP in `app/` | 676 |
| Errori PHPStan livello 10 | 0 |
| Blade (troncate in testa) | 156 (0) |
| File di test (`*Test.php`) | 172 |
| TODO/FIXME nel codice | 6 |
| Traduzioni it / en (solo in it) | 227 / 90 (138) |
| Story/epic BMAD (aperte) | 155 (101) |

## Problemi noti e prossimi passi


### `components/blade-component-registration.md` — Registrazione dei componenti Blade


# Registrazione dei componenti Blade

> **NOTA IMPORTANTE**: Questo documento è un riferimento specifico per il modulo User.
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/docs/components/blade-component-registration.md).
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/project_docs/components/blade-component-registration.md).
## Automatic Blade Component Registration
In moduli che estendono `XotBaseServiceProvider`, **non è necessario** registrare manualmente i componenti Blade con `Blade::component()` o `Blade::componentNamespace()`.
Il provider base si occupa automaticamente di scansionare la directory `Modules/User/View/Components` e di esporre i componenti con il prefisso `user` e lo schema dash-case.
### Usage
Utilizzare 

### `composer-dependencies.md` — Composer Dependencies - Modulo User


# Composer Dependencies - Modulo User

## Regola Fondamentale

**Le dipendenze specifiche del modulo User (auth, login, OAuth, Socialite) vanno in `Modules/User/composer.json`, MAI nel root `laravel/composer.json`.**

## Motivazione

- **Encapsulation**: Il modulo User è responsabile della propria logica di autenticazione
- **Modularità**: Il root composer.json gestisce solo dipendenze core (Laravel, Filament, nwidart)
- **wikimedia/composer-merge-plugin**: Merge automatico dei composer.json dei moduli

## Package che Appartengono al Modulo User

| Package | Motivo |
|---------|--------|
| `socialiteproviders/microsoft` | OAuth Microsoft per login |
| `socialiteproviders/auth0` | OAuth Auth0 per login |
| `laravel/passport` | API OAuth |

### `concepts/models-contracts-placement.md` — Models/Contracts (User)


# Models/Contracts (User)

## Regola

Contratti che descrivono **solo capacità Eloquent** (`getKey`, morph, notifiche su Model) vivono in `app/Models/Contracts/`, **mai** in `app/Contracts/`.

`app/Contracts/` resta per boundary cross-modulo (`UserContract`, team, passport).

## CanComment

- **Owner SSOT:** `Modules\Comment\Models\Contracts\CanComment`
- `BaseUser implements CanComment` + `InteractsWithComments`
- Rimosso `app/Contracts/CanComment.php` → archivio `app/Models/Contracts/CanComment.php.old`

## Checklist nuovo contratto User

1. È solo per Model? → `Models/Contracts/`
2. Serve a Filament/service/provider? → `app/Contracts/`
3. Owner dominio in altro modulo? → implementa il contratto owner, non duplicare

### `concepts/xotbase-never-extend-filament.md` — Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`


# Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`

Bridge on-demand. Contenuto canonico: [docs/wiki/rules/xotbase-critical-rules.md](../../../../../docs/wiki/rules/xotbase-critical-rules.md).

## Zen (riassunto)

Nessuna classe in `Modules/User` estende una classe `Filament\...` direttamente.
Si estende sempre lo "specchio" in `Modules\Xot\Filament\...` allo stesso
percorso relativo (es. `Filament\Tables\Columns\ViewColumn` ->
`Modules\Xot\Filament\Tables\Columns\XotBaseViewColumn`). Se manca il
mirror, va creato in Xot prima di usarlo qui, mai come scorciatoia nel modulo.

Non pre-caricare questo file: leggi la fonte canonica solo quando il task lo richiede.

### `confidence-guidelines.md` — Massimizzare il livello di confidenza


# Massimizzare il livello di confidenza

1. **Test automatizzati**: copertura >90%, includi test unitari, integrazione, e fine‑to‑end.
2. **CI/CD**: esegui tutti i test su ogni commit, blocca merge se falliscono.
3. **Analisi statica**: PHPStan, Psalm e Laravel Pint al livello massimo.
4. **Revisione del codice**: code‑review obbligatoria con checklist di qualità.
5. **Monitoraggio in produzione**: New Relic / Sentry per errori e performance.
6. **Documentazione**: mantieni aggiornati doc e changelog.
7. **Rollback rapido**: feature flags e versioni per tornare indietro.

### `conflicts-analysis.md` — Analisi Conflitti - module.json


# Analisi Conflitti - module.json


## Obiettivi Funzionali

## Decisioni Architetturali

## Impatto


## Collegamenti correlati
- [[conflicts_overview]]

### `conflicts.md` — Risoluzione Conflitti - User


# Risoluzione Conflitti - User

## File modificati
- app/Filament/Widgets/Auth/LoginWidget.php

## Decisioni adottate
- Verificato e uniformato il namespace di tutti i widget Auth a `Modules\User\Filament\Widgets\Auth`, rimuovendo ogni occorrenza del segmento `App` e garantendo la conformità PSR-4.
- Confermata la presenza di una sola definizione di classe per file e la correttezza degli use/import.
- Intervento eseguito secondo le regole di progetto e la documentazione globale.

Per ulteriori dettagli sulle regole, vedi anche la documentazione globale del progetto.

### `console_commands/change-password-command.md` — ChangePasswordCommand


# ChangePasswordCommand

## Panoramica
Il comando `ChangePasswordCommand` permette di cambiare la password di un utente esistente tramite interfaccia console interattiva o parametri da riga di comando.

## Comando
```bash
php artisan user:change-password [--email=user@example.com]
```

## Funzionalità

### Caratteristiche Principali
- **Interfaccia Interattiva**: Utilizzo di Laravel Prompts per input utente
- **Validazione Email**: Controllo formato email prima del processing
- **Controllo Esistenza**: Verifica che l'utente esista e sia persistente
- **Gestione Password**: Hash sicuro e aggiornamento scadenza
- **Reset OTP**: Disattivazione automatica del flag OTP
- **Eventi**: Dispatched dell'evento NewPasswordSet

### `contracts/analyze-socialite-email-domain-action.md` — AnalyzeSocialiteEmailDomainAction


# AnalyzeSocialiteEmailDomainAction

Dice se la email di un utente SSO appartiene al dominio di primo livello (`first_party`) o a quello cliente (`client`) configurati per il provider. Codice: `app/Actions/Socialite/AnalyzeSocialiteEmailDomainAction.php`.

## Input

- `SocialiteUserContract $oauthUser`: utente restituito dal provider.
- `string $provider`: chiave in `config/services.php`; non può essere vuota.

## Output

- `SocialiteEmailDomainAnalysisData`: `hasFirstPartyDomain` e `hasClientDomain`, entrambi `bool`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-DOMAIN-INV-1` | Provider vuoto: `InvalidArgumentException`. | `execute()` | `tests/Unit/Actions/Socialite/AnalyzeSocialiteEmailDomainActionTest.php:30` |
| `SOCIALITE-DOMAIN-INV-2` | Il 

### `contracts/authentication-log-query-action.md` — AuthenticationLogQueryAction


# AuthenticationLogQueryAction

Costruisce la query dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Activity/AuthenticationLogQueryAction.php:15-25`.

## Input

- `Model $authenticatable`: il modello di cui si cercano i log (`execute`, riga 20).

## Output

- `Builder<AuthenticationLog>` non eseguito: filtra `authenticatable_type` = `getMorphClass()` e `authenticatable_id` = `getKey()` (righe 22-24).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `AUTH-LOG-QUERY-INV-1` | Il filtro usa solo morph class e chiave del modello passato; nessun altro vincolo. | righe 22-24 | Test: nessuno (nessun riferimento alla classe in `tests/`). |
| `AUTH-LOG-QUERY-INV-2` | Il builder non viene eseguito: la query parte solo al consumo del chiamante.

### `contracts/build-active-user-provider-action.md` — BuildActiveUserProviderAction


# BuildActiveUserProviderAction

Costruisce il provider utenti che esclude gli account cancellati dal titolare (SEC-05). Codice: `app/Actions/Auth/BuildActiveUserProviderAction.php`; registrazione: `app/Providers/UserServiceProvider.php:157-175`.

## Input

- `Hasher $hasher`, `string $model`: classe del modello utente (`execute`).

## Output

- Un `EloquentUserProvider` con una query di base che applica il filtro `deleted_at IS NULL`.

## Invarianti

| ID | Regola | Prova nel codice | Test esistente (senza group) |
|---|---|---|---|
| `USER-PROVIDER-INV-1` | Il filtro `whereNull(deleted_at)` si applica solo se il modello è un `UserContract` e ha la colonna `deleted_at`. | `BuildActiveUserProviderAction.php:36-42` | `tests/Feature/Auth/DeletedAccountAccessTest.php:36,52` |
| `USER-PROVIDE

### `contracts/build-api-login-limit-action.md` — BuildApiLoginLimitAction


# BuildApiLoginLimitAction

Costruisce il limite di frequenza del `POST /api/user/login` (D-08, DCP-282), registrato come limiter `user-login` in `UserServiceProvider`. Codice: `app/Actions/Auth/BuildApiLoginLimitAction.php:19-42`.

## Input

- `Request $request`: legge `email` (se stringa) e l'IP del client (`execute`, riga 27).

## Output

- `Illuminate\Cache\RateLimiting\Limit` con chiave `email|IP` (email in minuscolo e traslitterata), 5 richieste per 60 secondi, e una risposta 429 personalizzata (righe 32-41).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `API-LOGIN-LIMIT-INV-1` | Il limite è `MAX_ATTEMPTS = 5` richieste per `DECAY_SECONDS = 60` secondi. | righe 21-25, 32 | Test: nessuno (il docblock cita un test di coerenza con `LoginWidget` non trova

### `contracts/build-password-reset-url-action.md` — BuildPasswordResetUrlAction


# BuildPasswordResetUrlAction

Costruisce l'URL assoluto del link di reset password inserito nell'email (SEC-007). Codice: `app/Actions/Auth/BuildPasswordResetUrlAction.php:16-42`.

## Input

- `string $token`: token di reset (`execute`, riga 21).
- `?string $email`: se non vuoto viene aggiunto come query `?email=` (precompilazione della pagina).

## Output

- `string`: `config('app.url')` senza slash finale, più il percorso `password.reset` relativo, con la lingua della richiesta e l'eventuale `email` (righe 23-40).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PWD-URL-INV-1` | La radice dell'URL viene da `config('app.url')`, mai dall'header `Host` della richiesta. | righe 23, 40 | Test: nessuno. |
| `PWD-URL-INV-2` | Se la lingua della richiesta è tra qu

### `contracts/consume-auth-submission-slot-action.md` — ConsumeAuthSubmissionSlotAction


# ConsumeAuthSubmissionSlotAction

Sorgente: `app/Actions/Auth/ConsumeAuthSubmissionSlotAction.php`. Perché: [ADR](../adr/auth-submission-throttle-before-validation.md).

## Input

- `AuthThrottleScope $scope`: `Register` o `ForgotPassword`.
- `string $email`: quanto digitato (anche vuoto o non valido).
- `?string $ip`: IP della richiesta; null diventa `unknown`.

## Output

- `int`: 0 = invio consentito (e già conteggiato); > 0 = secondi da attendere.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-AUTH-THROTTLE-INV-1 | Ogni chiamata con esito 0 conta un tentativo, qualunque sia l'esito della validazione che segue. | `USER-AUTH-THROTTLE-INV-1` |

### `contracts/create-client-action.md` — CreateClientAction


# CreateClientAction

Crea e salva un client OAuth2 Passport (`oauth_clients`). Codice: `app/Actions/Passport/CreateClientAction.php`.

## Input

- `string $name`, `string $redirect`: nome e URI di redirect del client; nessuna validazione nell'Action.
- `?UserContract $user = null`: proprietario; se assente `user_id` non viene valorizzato.
- `bool $personalAccess = false`, `bool $password = false`: flag del tipo di client, passati senza controlli incrociati.
- `?string $provider = null`: se assente vale `'users'`.

## Output

- `OauthClient`: il modello appena salvato, con `id` (UUID v4) e `secret` (40 caratteri casuali) in chiaro.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|

### `contracts/create-generic-client-action.md` — CreateGenericClientAction


# CreateGenericClientAction

Crea e salva un client OAuth2 Passport con i flag di tipo passati dal chiamante. È la base usata da `CreatePasswordClientAction` e `CreatePersonalAccessClientAction`. Codice: `app/Actions/Passport/CreateGenericClientAction.php`.

## Input

- `string $name`, `string $redirect`.
- `bool $personalAccess`, `bool $password`: obbligatori, passati senza controlli.
- `?UserContract $user = null`, `?string $provider = null` (default `'users'`).

## Output

- `OauthClient`: modello salvato, con `id` UUID e `secret` di 40 caratteri in chiaro.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-GENERIC-CLIENT-INV-1` | `personal_access_client` e `password_client` riflettono esattamente i due argomenti. | `execute()` | `tests/Unit/Actions

### `contracts/create-password-client-action.md` — CreatePasswordClientAction


# CreatePasswordClientAction

Crea un client OAuth2 di tipo *password grant* delegando a `CreateGenericClientAction` con `password: true` e `personalAccess: false`. Codice: `app/Actions/Passport/CreatePasswordClientAction.php`.

## Input

- `string $name`, `string $redirect`, `?UserContract $user = null`, `?string $provider = null`.

## Output

- `OauthClient`: il valore restituito da `CreateGenericClientAction::execute()`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-PWD-CLIENT-INV-1` | Il client restituito ha `password_client = true` e `personal_access_client = false`. | `execute()`, argomenti fissi | `tests/Unit/Actions/Passport/CreateSpecificClientActionsTest.php:29` |
| `PASSPORT-PWD-CLIENT-INV-2` | Nessun comportamento proprio: tutto il res

### `contracts/create-personal-access-client-action.md` — CreatePersonalAccessClientAction


# CreatePersonalAccessClientAction

Crea un client OAuth2 di tipo *personal access* delegando a `CreateGenericClientAction` con `personalAccess: true` e `password: false`. Codice: `app/Actions/Passport/CreatePersonalAccessClientAction.php`.

## Input

- `string $name`, `string $redirect`, `?UserContract $user = null`, `?string $provider = null`.

## Output

- `OauthClient`: il valore restituito da `CreateGenericClientAction::execute()`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-PAT-CLIENT-INV-1` | Il client restituito ha `personal_access_client = true` e `password_client = false`. | `execute()`, argomenti fissi | `tests/Unit/Actions/Passport/CreateSpecificClientActionsTest.php:45` |

## Effetti collaterali

### `contracts/create-socialite-user-action.md` — CreateSocialiteUserAction


# CreateSocialiteUserAction

Crea il record `SocialiteUser` che collega un utente locale a un'identità del provider OAuth. Codice: `app/Actions/Socialite/CreateSocialiteUserAction.php`.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`, `UserContract $user`.

## Output

- `SocialiteUser`: il record creato da `create()`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-CREATE-SU-INV-1` | Il record ha `user_id`, `provider`, `provider_id`, `name`, `email`, `avatar` presi da input e provider. | `execute()`, array attributi | `tests/Unit/Actions/Socialite/SocialiteCoreActionsCoverageTest.php:133` |
| `SOCIALITE-CREATE-SU-INV-2` | Il nickname non è salvato (riga commentata). | `execute()` | nessuno |


### `contracts/create-user-action.md` — CreateUserAction


# CreateUserAction

Crea un nuovo utente con nome, email e password hashata; include due passi che oggi sono solo log. Codice: `app/Actions/CreateUserAction.php` (namespace `Modules\User\Actions`), righe 22-77. Non è il `execute()` standard: l'entrypoint è `handle()`.

## Input

- Costruttore: `string $name`, `string $email`, `string $password`, `?array $data` (righe 29-34).

## Output

- `User` appena creato (`handle()`, riga 45).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `CREATE-USER-INV-1` | Nome e email non vuoti ed email valida, altrimenti `InvalidArgumentException` alla costruzione. | righe 36-42 | Test: riferimenti per nome in `tests/Unit/Actions/AdditionalActionsTest.php`, `tests/Unit/Actions/User/CreateUserActionTest.php`, `tests/Unit/QuickWins

### `contracts/delete-user-action.md` — DeleteUserAction


# DeleteUserAction

Cancella l'account dopo la verifica della password di conferma. Codice: `app/Actions/User/DeleteUserAction.php:12-50`.

## Input

- `UserContract $user` (`execute`, riga 26).
- `string $confirmPassword`: password in chiaro da verificare.

## Output

- `array{success: bool, message: string}` (righe 24, 30-48).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `DELETE-USER-INV-1` | Senza password corrispondente l'utente non viene cancellato e non si esegue il logout. | righe 28-34 | `tests/Unit/Actions/User/DeleteUserActionTest.php`, `tests/Unit/Actions/AdditionalActionsTest.php` (riferimenti alla classe) |
| `DELETE-USER-INV-2` | Il logout della guard precede la cancellazione. | righe 37-38 | come sopra |

### `contracts/ensure-reset-password-mail-template-action.md` — EnsureResetPasswordMailTemplateAction


# EnsureResetPasswordMailTemplateAction

Garantisce il template `reset-password` della mail di reimpostazione password, in tutte le lingue del sito (DCP-285, D-05). Codice: `app/Actions/Auth/EnsureResetPasswordMailTemplateAction.php:20-78`.

## Input

- Nessuno.

## Output

- `MailTemplate` esistente o appena creato (riga 53).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `MAIL-TPL-INV-1` | Il template è identificato da `mailable` = `SpatieEmail` e `slug` = `reset-password`; se manca viene creato con layout `base.html`. | righe 24, 38-41 | Test: nessuno. |
| `MAIL-TPL-INV-2` | Per ogni lingua in `it`, `en`, `de`, `es` il testo è scritto solo se la lingua è vuota oppure contiene ancora il default legacy e non il segnaposto URL. | righe 27-30, 43-45, 56-65 | 

### `contracts/get-authentication-log-query-action.md` — GetAuthenticationLogQueryAction


# GetAuthenticationLogQueryAction

Restituisce il query builder dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Auth/GetAuthenticationLogQueryAction.php:15-27`.

## Input

- `Model $authenticatable` (`execute`, riga 22).

## Output

- `Builder<AuthenticationLog>` non eseguito, filtrato su `authenticatable_type` (morph class) e `authenticatable_id` (riga 24-26).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `GET-AUTH-LOG-INV-1` | Il filtro è esattamente morph class e chiave del modello; nessun altro vincolo. | righe 24-26 | Test: nessuno (nessun riferimento alla classe in `tests/`). |

## Effetti collaterali

### `contracts/get-authentication-log-query-for-authenticatable-action.md` — GetAuthenticationLogQueryForAuthenticatableAction


# GetAuthenticationLogQueryForAuthenticatableAction

Restituisce il query builder dei log di autenticazione di un modello autenticabile. Codice: `app/Actions/Authentication/GetAuthenticationLogQueryForAuthenticatableAction.php:12-25`.

## Input

- `Model $authenticatable` (`execute`, riga 19).

## Output

- `Builder<AuthenticationLog>` non eseguito, filtrato su morph class e chiave (righe 21-23).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `GET-AUTH-LOG-FOR-AUTH-INV-1` | Il filtro è esattamente morph class e chiave del modello. | righe 21-23 | Test: nessuno (nessun riferimento alla classe in `tests/`). |

## Effetti collaterali

### `contracts/get-current-device-action.md` — GetCurrentDeviceAction


# GetCurrentDeviceAction

Trova o crea la riga `Device` del dispositivo che sta facendo la richiesta, e ne aggiorna browser e versione. Codice: `app/Actions/GetCurrentDeviceAction.php:14-92`.

## Input

- `?string $mobileId`: identificativo del dispositivo mobile, se disponibile (`execute`, riga 26).
- Dipendenze iniettate: `Agent` (user agent) e `Device` (modello).

## Output

- `Device` (riga 42 con `mobile_id`, riga 51 senza).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `DEVICE-INV-1` | Con `$mobileId` non null il dispositivo si cerca per `mobile_id`; con stringa vuota (anche `"0"`) lancia `InvalidArgumentException`. | righe 31-36 | `tests/Unit/Actions/GetCurrentDeviceActionTest.php`, `tests/Unit/Actions/User/UserMiscActionsTest.php` (riferimento alla 

### `contracts/get-domain-allow-list-action.md` — GetDomainAllowListAction


# GetDomainAllowListAction

Restituisce la lista dei domini ammessi al login SSO da `config('socialite.domain_allowlist')`, normalizzata. Codice: `app/Actions/Socialite/GetDomainAllowListAction.php`.

## Input

- Nessuno. Riceve per iniezione `Illuminate\Support\Arr`, usato per `wrap()`.

## Output

- `array<int, string>`: lista indicizzata. Vuota se la config è assente o di tipo non gestito.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-ALLOW-INV-1` | Una stringa diventa lista di un elemento. | `execute()`, ramo `is_string` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:31` |
| `SOCIALITE-ALLOW-INV-2` | Elementi non scalari né `Stringable` sono scartati; resta una lista indicizzata. | `execute()`, `array_filter` | `SocialiteUtil

### `contracts/get-guard-action.md` — GetGuardAction


# GetGuardAction

Restituisce il guard di autenticazione indicato da `config('filament.auth.guard')`. Codice: `app/Actions/Socialite/GetGuardAction.php`.

## Input

- Nessuno.

## Output

- `StatefulGuard|Guard`: il guard risolto con `auth()->guard()`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-GUARD-INV-1` | Il nome del guard deve essere una stringa. | `Assert::string()` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:102` |

## Effetti collaterali

### `contracts/get-missing-provider-settings-action.md` — GetMissingProviderSettingsAction


# GetMissingProviderSettingsAction

Elenca le variabili d'ambiente che mancano, o sono segnaposto, perché un provider OAuth sia utilizzabile. Codice: `app/Actions/Socialite/GetMissingProviderSettingsAction.php`.

## Input

- `string $provider`: chiave di `config/services.php`.

## Output

- `list<string>`: nomi delle variabili da impostare, nell'ordine `CLIENT_ID`, `CLIENT_SECRET`, `REDIRECT_URI` con prefisso del provider in maiuscolo (es. `GOOGLE_CLIENT_ID`). Vuota se il provider è configurato.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-MISSING-ENV-INV-1` | Una chiave è "reale" solo se è stringa, non vuota dopo `trim` e non corrisponde al pattern segnaposto. | `isRealValue()` | `tests/Unit/Actions/Socialite/ProviderSettingsActionsTest.php:27,

### `contracts/get-new-password-action.md` — GetNewPasswordAction


# GetNewPasswordAction

Genera una nuova password temporanea pronunciabile, ne salva l'hash sull'utente e restituisce il valore in chiaro da comunicare una sola volta. Codice: `app/Actions/User/GetNewPasswordAction.php:14-34`.

## Input

- `UserContract $record`: deve essere un `Model` (riga 24).

## Output

- `string`: la password in chiaro, lunga 12 caratteri (riga 26).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `NEW-PWD-INV-1` | Sul modello è salvato solo l'hash `Hash::make`, mai il valore in chiaro. | righe 28-30 | `tests/Unit/Actions/User/GetNewPasswordActionTest.php` (riferimento alla classe) |
| `NEW-PWD-INV-2` | Il valore restituito è quello generato da `GetPronounceablePasswordAction` (Xot) con lunghezza 12. | riga 26 | come sopra |
| `NEW-PWD-I

### `contracts/get-permission-model-action.md` — GetPermissionModelAction


# GetPermissionModelAction

Restituisce il nome della classe modello dei permessi, da config, con default Spatie. Codice: `app/Actions/GetPermissionModelAction.php:11-24`.

## Input

- Nessuno: legge `permission.models.permission`.

## Output

- `class-string`: il valore configurato o `Spatie\Permission\Models\Permission` (righe 20-23).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PERM-MODEL-INV-1` | Senza config il risultato è `Spatie\Permission\Models\Permission`. | riga 20 | Test: nessuno. |
| `PERM-MODEL-INV-2` | Il valore deve essere una stringa e una classe esistente, altrimenti eccezione Webmozart. | righe 20-21 | Test: nessuno. |


### `contracts/get-post-login-url-action.md` — GetPostLoginUrlAction


# GetPostLoginUrlAction

Restituisce la pagina d'arrivo dopo login e registrazione quando nessuna pagina l'ha richiesta: l'area personale localizzata. Codice: `app/Actions/Auth/GetPostLoginUrlAction.php:21-39`.

## Input

- Nessuno: legge la lingua corrente e la config.

## Output

- `string`: URL localizzato con `LaravelLocalization::localizeURL` (riga 37).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `POST-LOGIN-INV-1` | Se la lingua corrente non è tra quelle supportate si usa `app.locale` (default `it`). | righe 28-31 | `tests/Feature/Auth/AuthFlowRedirectsTest.php` e `tests/Unit/Filament/Widgets/Auth/LoginWidgetLocalizationTest.php` (riferimento alla classe) |
| `POST-LOGIN-INV-2` | Il percorso è letto da `auth.post_login_path`, con default `/area-pers

### `contracts/get-user-model-attributes-from-socialite-action.md` — GetUserModelAttributesFromSocialiteAction


# GetUserModelAttributesFromSocialiteAction

Traduce l'identità OAuth in un DTO di attributi per il modello utente, con validazioni esplicite. Codice: `app/Actions/Socialite/GetUserModelAttributesFromSocialiteAction.php`.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`.

## Output

- `SocialiteUserAttributesData`: `name`, `firstName`, `lastName`, `email`, `provider`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-USER-ATTR-INV-1` | `provider` vuoto: `InvalidArgumentException`. | `execute()` | `tests/Unit/Actions/Socialite/SocialiteCoreActionsCoverageTest.php:44` |
| `SOCIALITE-USER-ATTR-INV-2` | Nome o cognome non stringa: `RuntimeException`. | `execute()` | `SocialiteCoreActionsCoverageTest.php:58` |
| `SOCIALITE-USER-ATTR-INV

### `contracts/get-user-teams-option-action.md` — GetUserTeamsOptionAction


# GetUserTeamsOptionAction

Costruisce le opzioni di una Select con i team dell'utente corrente. Codice: `app/Actions/Team/GetUserTeamsOptionAction.php:10-31`.

## Input

- Nessuno: usa l'utente della richiesta tramite `authId()` (riga 19).

## Output

- `array<int|string, string>`: placeholder `'' => '--- Select ---'` seguito da `id team => nome team` (righe 22-29).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `TEAMS-OPT-INV-1` | Il placeholder è sempre la prima voce. | riga 22 | `tests/Unit/Actions/Team/GetUserTeamsOptionActionTest.php` (riferimento alla classe) |
| `TEAMS-OPT-INV-2` | Compaiono solo i team collegati tramite `team_user` all'utente corrente. | riga 19 | come sopra |
| `TEAMS-OPT-INV-3` | Le righe orfane (team cancellato) sono saltate. | r

### `contracts/has-verified-identity-action.md` — HasVerifiedIdentityAction


# HasVerifiedIdentityAction

## Input
- Utente autenticabile opzionale.
## Output
- `true` per email verificata o metodo `spid`/`cie`; `false` per utente assente o non verificato.
## Invarianti
- SPID/CIE attestano l'identità applicativa, ma non impostano `email_verified_at`.
## Effetti collaterali
- Nessuno: legge sessione e attributi grezzi.
## Errori
- Nessun errore applicativo per utente nullo: restituisce `false`.
## Non fa
- Non invia email, non modifica l'utente e non concede ruoli o permessi.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|

### `contracts/hash-otp-value-action.md` — HashOtpValueAction


# HashOtpValueAction

Calcola l'hash di un valore OTP con l'hasher Illuminate. Codice: `app/Actions/Otp/HashOtpValueAction.php:10-21`.

## Input

- `string $value`: il valore in chiaro (`execute`, riga 18).

## Output

- `string`: l'hash prodotto da `Hasher::make()` (riga 20).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `HASH-OTP-INV-1` | Il risultato è esattamente `make()` dell'hasher iniettato (contratto Illuminate, non il wrapper `Otp\Hasher`). | righe 14-20 | `tests/Unit/Actions/Otp/OtpHashActionsTest.php` (riferimento alla classe) |

## Effetti collaterali

### `contracts/hasteamsandusercontract.md` — HasTeamsAndUserContract


# HasTeamsAndUserContract

L'interfaccia `HasTeamsAndUserContract` estende sia `HasTeamsContract` che `UserContract`, fornendo un'unica interfaccia che combina le funzionalità di entrambe.

## Metodi

### Team Management

- `teamRole(Team $team): ?string`
  - Ottiene il ruolo dell'utente nel team specificato
  - Restituisce `null` se l'utente non appartiene al team
  - Restituisce `'owner'` se l'utente è il proprietario del team
  - Restituisce il ruolo specifico altrimenti

- `canRemoveTeamMember(Team $team, HasTeamsContract $user): bool`
  - Determina se l'utente può rimuovere un membro del team
  - Richiede che l'utente sia proprietario del team o abbia il permesso 'remove-member'

- `canUpdateTeamMember(Team $team, HasTeamsContract $user): bool`

### `contracts/is-notification-schema-readable-action.md` — IsNotificationSchemaReadableAction


# IsNotificationSchemaReadableAction

Verifica che la tabella `notifications` esista sulla connessione del modello prima di interrogarla dal front office. Codice: `app/Actions/Notification/IsNotificationSchemaReadableAction.php:14-30`.

## Input

- Nessuno.

## Output

- `bool`: `hasTable` della tabella del modello `Notification` (riga 28).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `NOTIF-SCHEMA-INV-1` | Se il modello non dichiara connessione si usa la connessione di default (`mysql` se la config non è una stringa). | righe 22-26 | `tests/Unit/UserExecuteCoverage50Test.php` (riferimento alla classe) |
| `NOTIF-SCHEMA-INV-2` | Restituisce solo l'esistenza della tabella, non le colonne. | riga 28 | come sopra |


### `contracts/is-provider-configured-action.md` — IsProviderConfiguredAction


# IsProviderConfiguredAction

Dice se un provider OAuth ha tutte le impostazioni reali. Codice: `app/Actions/Socialite/IsProviderConfiguredAction.php`.

## Input

- `string $provider`.

## Output

- `bool`: `true` se `GetMissingProviderSettingsAction` non ritorna variabili mancanti.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-IS-CONFIGURED-INV-1` | `true` se e solo se la lista delle mancanti è vuota. | `execute()` | `tests/Unit/Actions/Socialite/ProviderSettingsActionsTest.php:65,68` |

## Effetti collaterali

### `contracts/is-registration-enabled-action.md` — IsRegistrationEnabledAction


# IsRegistrationEnabledAction

Dice se la registrazione di nuovi utenti via SSO è abilitata. Codice: `app/Actions/Socialite/IsRegistrationEnabledAction.php`.

## Input

- Nessuno.

## Output

- `bool`: `true` se `config('socialite.registration')` è null o assente; altrimenti `(bool)` del valore.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-REG-ENABLED-INV-1` | Config assente o null: registrazione attiva. | `execute()` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:55,63` |

## Effetti collaterali

### `contracts/is-user-allowed-action.md` — IsUserAllowedAction


# IsUserAllowedAction

Decide se l'utente SSO può accedere, controllando il dominio della sua email contro `GetDomainAllowListAction`. Codice: `app/Actions/Socialite/IsUserAllowedAction.php`.

## Input

- `SocialiteUserContract $user`.

## Output

- `bool`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-ALLOWED-INV-1` | Allowlist vuota: accesso consentito a tutti. | `execute()`, `count < 1` | `tests/Unit/Actions/IsUserAllowedActionTest.php:29` |
| `SOCIALITE-ALLOWED-INV-2` | Con allowlist, vale il dominio della email (parte dopo l'ultimo `@`, in minuscolo) presente nella lista. | `execute()` | `IsUserAllowedActionTest.php:36` |


### `contracts/is-user-database-configured-action.md` — IsUserDatabaseConfiguredAction


# IsUserDatabaseConfiguredAction

Dice se la connessione `user` ha un database configurato, senza aprirla. Codice: `app/Actions/Database/IsUserDatabaseConfiguredAction.php:23-33`.

## Input

- Nessuno: legge `database.connections.user.database`.

## Output

- `bool`: `true` se il valore è una stringa non vuota dopo `trim` (riga 31).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `USER-DB-CONFIGURED-INV-1` | Non apre la connessione né interroga lo schema. | righe 27-32 | `tests/Unit/Actions/Database/IsUserDatabaseConfiguredActionTest.php` (riferimento alla classe) |
| `USER-DB-CONFIGURED-INV-2` | Un valore non stringa o vuoto dà `false`. | riga 31 | come sopra |


### `contracts/log-registration-action.md` — LogRegistrationAction


# LogRegistrationAction

Scrive nel log di attività la registrazione di un nuovo utente. Codice: `app/Actions/Activity/LogRegistrationAction.php:10-28`.

## Input

- `User $user`: l'utente appena registrato (usato solo per `type`).
- `array<string, mixed> $properties`: proprietà extra (default `[]`).

## Output

- `void`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `LOG-REG-INV-1` | Le proprietà registrate sono `type` dell'utente, `ip_address` e `user_agent` della richiesta, unite con `$properties`; in caso di chiave uguale vince `$properties`. | righe 22-26 | `tests/Unit/Actions/Activity/LogRegistrationActionTest.php` (riferimento alla classe) |
| `LOG-REG-INV-2` | La descrizione del log è fissa: `User registered via GDPR-compliant RegisterWidget`. | rig

### `contracts/login-user-action.md` — LoginUserAction


# LoginUserAction

Accede al pannello con l'utente collegato all'identità SSO, dopo aver scartato gli account eliminati. Codice: `app/Actions/Socialite/LoginUserAction.php`.

## Input

- `SocialiteUser $socialiteUser`: la relazione `user` è usata se caricata, altrimenti letta dal database.

## Output

- `RedirectResponse`: `redirect()->intended('/')` in caso di successo; redirect al login con messaggio `auth.user-not-allowed` se l'account ha `deleted_at`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-LOGIN-INV-1` | Senza utente collegato: `InvalidArgumentException`. | `execute()` | nessuno |
| `SOCIALITE-LOGIN-INV-2` | Utente non `Authenticatable` né `UserContract`: `LogicException`. | `execute()` | nessuno |
| `SOCIALITE-LOGIN-INV-3` | Account c

### `contracts/logout-user-action.md` — LogoutUserAction


# LogoutUserAction

Chiude l'accesso di un utente: revoca il suo access token Passport e i refresh token collegati, e marca il logout sui dispositivi. Codice: `app/Actions/Socialite/LogoutUserAction.php`.

## Input

- `UserContract $user`: deve avere un token attivo (`$user->token()`).

## Output

- `void`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-LOGOUT-INV-1` | Senza token: `AssertionFailedException`. | `Assert::notNull` | nessuno |
| `SOCIALITE-LOGOUT-INV-2` | I refresh token con `access_token_id` del token sono revocati (non cancellati). | `execute()` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:152` (chiamata) |
| `SOCIALITE-LOGOUT-INV-3` | I `DeviceUser` dell'utente hanno `logout_at` = ora. | `execute()` | stesso rif

### `contracts/otp-hash-needs-rehash-action.md` — OtpHashNeedsRehashAction


# OtpHashNeedsRehashAction

Dice se un hash OTP va ricalcolato con l'algoritmo corrente. Codice: `app/Actions/Otp/OtpHashNeedsRehashAction.php:10-21`.

## Input

- `string $hashedValue`: l'hash salvato (`execute`, riga 18).

## Output

- `bool`: esito di `needsRehash()` dell'hasher iniettato (riga 20).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `OTP-REHASH-INV-1` | Il risultato è esattamente `needsRehash()` dell'hasher Illuminate. | riga 20 | `tests/Unit/Actions/Otp/OtpHashActionsTest.php` (riferimento alla classe) |

## Effetti collaterali

### `contracts/process-callback-action.md` — ProcessCallbackAction


# ProcessCallbackAction

Gestisce il ritorno dal provider OAuth: valida il provider, recupera l'utente, applica le regole di accesso e registrazione, poi autentica. È la logica dietro la pagina Folio del callback. Codice: `app/Actions/Socialite/ProcessCallbackAction.php`.

## Input

- `string $lang`: lingua della pagina di ingresso (fallback).
- `string $provider`.

## Output

- `RedirectResponse`: verso il dashboard, o verso il login con un messaggio di errore.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-CALLBACK-INV-1` | La lingua è quella salvata in sessione (`ProcessCallbackSession::KEY`) se supportata, altrimenti `$lang`. | `execute()`, `session()->pull` | `tests/Feature/Socialite/OauthCallbackFolioPageTest.php:35` (solo `class_exists`) |


### `contracts/record-authentication-log-action.md` — RecordAuthenticationLogAction


# RecordAuthenticationLogAction

Sorgente: `app/Actions/Auth/RecordAuthenticationLogAction.php`. Chiamata da `LoginListener` e `FailedLoginListener`.
Perché: [ADR](../adr/authentication-log-never-breaks-login.md).

## Input

- `UserContract&HasAuthentications $user`.
- `$attributes`: `ip_address`, `user_agent`, `login_at`, `login_successful`, `location`.
Scrive una riga in `authentication_logs` sulla connessione `user` per ogni tentativo di accesso. Codice: `app/Actions/Auth/RecordAuthenticationLogAction.php:25-58`.

## Input

- `UserContract&HasAuthentications $user`: l'utente (`execute`, riga 30).
- `array $attributes`: `ip_address`, `user_agent`, `login_at`, `login_successful`, `location` (riga 28).

## Output

- `void`.

### `contracts/record-login-pulse-action.md` — RecordLoginPulseAction


# RecordLoginPulseAction

Registra un accesso nel contatore aggregato di Laravel Pulse. Codice: `app/Actions/Login/RecordLoginPulseAction.php:10-22`.

## Input

- `DateTimeInterface $loginAt`: momento dell'accesso (`execute`, riga 12).

## Output

- `void`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PULSE-LOGIN-INV-1` | Registra il tipo `user_login` con chiave `all`, come conteggio. | righe 14-19 | `tests/Unit/Actions/Auth/RecordAuthenticationLogActionTest.php` (riferimento alla classe, non dedicato) |
| `PULSE-LOGIN-INV-2` | Scrive solo bucket aggregati (`onlyBuckets`), nessuna riga di dettaglio. | riga 20 | come sopra |


### `contracts/redirect-to-login-action.md` — RedirectToLoginAction


# RedirectToLoginAction

Riporta l'utente alla pagina di login FO con un messaggio di errore, mostrato sia come notifica Filament sia come errore sul campo `email`. Codice: `app/Actions/Socialite/RedirectToLoginAction.php`.

## Input

- `string $message`: chiave di traduzione relativa a `user::`.
- `array<string, string> $replace = []`: segnaposto `:chiave`.

## Output

- `RedirectResponse` verso `/{lang}/auth/login` con `withErrors(['email' => [testo]])`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-REDIRECT-LOGIN-INV-1` | L'URL di login è localizzato nella lingua corrente. | `execute()`, `localizeURL` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:166` (chiamata) |
| `SOCIALITE-REDIRECT-LOGIN-INV-2` | Il testo ha i segnaposti 

### `contracts/regenerate-client-secret-action.md` — RegenerateClientSecretAction


# RegenerateClientSecretAction

Sostituisce il `secret` di un client OAuth2 con uno nuovo casuale e lo restituisce in chiaro. Codice: `app/Actions/Passport/RegenerateClientSecretAction.php`.

## Input

- `OauthClient|string $client`: istanza, oppure id da cercare con `findOrFail`.

## Output

- `string`: il nuovo secret di 40 caratteri, in chiaro. È l'unico punto in cui il valore è disponibile.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-REGEN-SECRET-INV-1` | Il secret precedente è sovrascritto: dopo il `save()` non è più valido. | `execute()`, assegnazione e `save()` | riferimento in `tests/Unit/Actions/Passport/PassportActionsCoverageBatch2Test.php:107` (verifica asserzioni non eseguita) |
| `PASSPORT-REGEN-SECRET-INV-2` | Un id inesistente pr

### `contracts/register-oauth-user-action.md` — RegisterOauthUserAction


# RegisterOauthUserAction

Crea in una sola transazione l'utente locale e il collegamento SSO per un'identità OAuth sconosciuta, poi dispatcha l'evento `Registered`. Codice: `app/Actions/Socialite/RegisterOauthUserAction.php`.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`.

## Output

- `SocialiteUser`: il collegamento creato.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-REGISTER-OAUTH-INV-1` | Utente e collegamento vengono creati nella stessa transazione: se uno fallisce, nessuno dei due resta. | `execute()`, `DatabaseManager::transaction` | `tests/Unit/Actions/RegisterOauthUserActionTest.php:29,50` (istanziazione e chiamata) |
| `SOCIALITE-REGISTER-OAUTH-INV-2` | `Registered` è dispatchato dopo la transazione, con il `Soc

### `contracts/register-socialite-user-action.md` — RegisterSocialiteUserAction


# RegisterSocialiteUserAction

Collega un utente locale già esistente a un'identità OAuth, assegna i ruoli di default se applicabili e dispatcha `SocialiteUserConnected`. Codice: `app/Actions/Socialite/RegisterSocialiteUserAction.php`.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`, `UserContract $user` (già esistente).

## Output

- `SocialiteUser`: il collegamento creato.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-REGISTER-SU-INV-1` | Crea sempre un nuovo `SocialiteUser` per l'utente fornito. | `execute()` | nessuno |
| `SOCIALITE-REGISTER-SU-INV-2` | Ruoli default: delegati a `SetDefaultRolesBySocialiteUserAction`, che non fa nulla se l'utente ha già ruoli. | `execute()` | nessuno |
| `SOCIALITE-REGISTER-SU-INV-3` | Dis

### `contracts/remember-login-return-url-action.md` — RememberLoginReturnUrlAction


# RememberLoginReturnUrlAction

Ricorda la pagina che ha mandato l'utente al login, così che `redirectIntended()` lo riporti indietro. Codice: `app/Actions/Auth/RememberLoginReturnUrlAction.php:22-79`.

## Input

- `Request $request`: query `redirect` e header `Referer` (`execute`, riga 26).

## Output

- `void`. Effetto: eventuale scrittura di `url.intended` in sessione.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `REMEMBER-RET-INV-1` | Sono accettati solo URL http/https sullo stesso host della richiesta; `//`, backslash, caratteri di controllo e altri schemi sono rifiutati. | righe 46-78 | `tests/Feature/Auth/AuthFlowRedirectsTest.php` (riferimento alla classe) |
| `REMEMBER-RET-INV-2` | Percorsi che contengono un segmento `auth` non sono mai memorizzat

### `contracts/resend-email-verification-action.md` — ResendEmailVerificationAction


# ResendEmailVerificationAction

Reinvia la mail di verifica dell'indirizzo, senza verificare nulla (DCP-285, D-04). Codice: `app/Actions/Auth/ResendEmailVerificationAction.php:16-33`.

## Input

- `MustVerifyEmail $user` (`execute`, riga 23).

## Output

- `bool`: `true` se la notifica è stata inviata, `false` se l'indirizzo era già verificato (righe 25-31).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `RESEND-VERIFY-INV-1` | Un indirizzo già verificato non riceve alcuna notifica. | righe 25-27 | Test: nessuno. |
| `RESEND-VERIFY-INV-2` | L'Action non emette l'evento `Verified`: lo emettono solo i controller che hanno validato id e hash. | docblock righe 13-14, nessun dispatch nel corpo | Test: nessuno. |


### `contracts/resolve-exclusions-configuration-action.md` — ResolveExclusionsConfigurationAction


# ResolveExclusionsConfigurationAction

Legge da `config/filament-shield.php` la configurazione delle esclusioni (generale, risorse, pagine, widget) e la normalizza. Codice: `app/Actions/Shield/ResolveExclusionsConfigurationAction.php`.

## Input

- Nessuno in `execute()`. I metodi pubblici `enableGeneralExclude()` e `disableGeneralExclude()` non hanno parametri.

## Output

- `execute()`: array con `general_exclude_enabled` (bool), `excluded_resources`, `excluded_pages`, `excluded_widgets` (`list<string>`).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-EXCL-INV-1` | Un valore non booleano di `exclude.enabled` diventa `true`. | `isGeneralExcludeEnabled()` | nessuno |
| `SHIELD-EXCL-INV-2` | Liste non-array diventano `[]`; gli elementi non stringa so

### `contracts/resolve-filament-user-configuration-action.md` — ResolveFilamentUserConfigurationAction


# ResolveFilamentUserConfigurationAction

Riassume la configurazione del ruolo "filament user" di Shield, leggendola da `FilamentShieldData`. Codice: `app/Actions/Shield/ResolveFilamentUserConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{enabled: bool, name: string}`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-FILAMENT-USER-INV-1` | `enabled` è `false` se la proprietà manca o è null. | `execute()`, `?? false` | nessuno |
| `SHIELD-FILAMENT-USER-INV-2` | `name` vale `'Filament User'` se la proprietà manca. | `execute()`, `?? 'Filament User'` | nessuno |


### `contracts/resolve-notifiable-email-action.md` — ResolveNotifiableEmailAction


# ResolveNotifiableEmailAction

Risolve l'indirizzo a cui spedire le email di autenticazione (reset password, verifica email). Codice: `app/Actions/Auth/ResolveNotifiableEmailAction.php:18-40`.

## Input

- `Model $notifiable` (`execute`, riga 22).

## Output

- `?string`: l'indirizzo, oppure `null` se il modello non ne ha.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `RESOLVE-EMAIL-INV-1` | Se il modello espone `getEmailForPasswordReset()` il suo valore ha la precedenza sull'attributo `email`. | righe 24-29 | `tests/Unit/Actions/Auth/ResolveNotifiableEmailActionTest.php` (riferimento alla classe) |
| `RESOLVE-EMAIL-INV-2` | Un valore non stringa lancia un'eccezione (`Webmozart Assert`) e la mail non parte. | righe 26, 36 | come sopra |
| `RESOLVE-EMAIL-IN

### `contracts/resolve-permissions-configuration-action.md` — ResolvePermissionsConfigurationAction


# ResolvePermissionsConfigurationAction

Raccoglie in un array la configurazione di permessi ed entità di Filament Shield (prefissi, flag di entità, modelli Role/Permission) e fornisce due helper per i permessi delle singole risorse. Codice: `app/Actions/Shield/ResolvePermissionsConfigurationAction.php`.

## Input

- `execute()`: nessuno.
- `doesResourceHaveCustomPermissions(string $resourceClass)`, `getResourcePermissionPrefixes(string $resourceFQCN)`: FQCN di una risorsa Filament.

## Output

- `execute()`: array con 13 chiavi (prefissi `list<string>`, prefissi page/widget `string`, flag entità `bool`, `generator_option`, `role_policy_registered`, `role_model`, `permission_model`, `role_resource_exists`).
- `doesResourceHaveCustomPermissions()`: `bool`; `false` se la classe non esiste.


### `contracts/resolve-shield-authentication-configuration-action.md` — ResolveShieldAuthenticationConfigurationAction


# ResolveShieldAuthenticationConfigurationAction

Riassume guard e modello di autenticazione usati da Filament Shield. Codice: `app/Actions/Shield/ResolveShieldAuthenticationConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{auth_guard: string, auth_provider_fqcn: string, auth_provider_configured: bool}`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-AUTH-CFG-INV-1` | `auth_guard` è sempre `'web'`. | `getFilamentAuthGuard()` | nessuno |
| `SHIELD-AUTH-CFG-INV-2` | `auth_provider_configured` è `true` solo se la classe esiste e usa direttamente il trait `HasRoles`. | `isAuthProviderConfigured()` | nessuno |
| `SHIELD-AUTH-CFG-INV-3` | Se `fqcn` non è stringa, vale `Illuminate\Foundation\Auth\User`. | `getAuthProviderFQCN()` | nessuno

### `contracts/resolve-shield-resource-configuration-action.md` — ResolveShieldResourceConfigurationAction


# ResolveShieldResourceConfigurationAction

Riassume la configurazione della risorsa Shield (slug, navigazione, ricerca globale) e verifica se la RoleResource è pubblicata. Codice: `app/Actions/Shield/ResolveShieldResourceConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{slug: string, published: bool, navigation_registered: bool, navigation_sort: int, navigation_badge: bool, navigation_group: bool, globally_searchable: bool}`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-RES-CFG-INV-1` | `slug` vale `'shield'` se la configurazione non è stringa. | `execute()` | nessuno |
| `SHIELD-RES-CFG-INV-2` | `published` è vero se il file `app/Filament/Resources/Shield/RoleResource.php` esiste. | `isResourcePublished()` | nessuno |
| `SHIELD

### `contracts/resolve-super-admin-configuration-action.md` — ResolveSuperAdminConfigurationAction


# ResolveSuperAdminConfigurationAction

Riassume la configurazione del super admin di Filament Shield (abilitazione, nome, definizione via gate, stato di intercettazione del gate). Codice: `app/Actions/Shield/ResolveSuperAdminConfigurationAction.php`.

## Input

- Nessuno.

## Output

- `array{enabled: bool, name: string, defined_via_gate: bool, gate_interception_status: string}`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-SUPER-ADMIN-INV-1` | I valori mancanti valgono: `enabled` e `defined_via_gate` `false`, `name` `'Super Admin'`, `gate_interception_status` `'block'`. | `execute()`, operatori `??` | nessuno |

## Effetti collaterali

### `contracts/resolve-user-name-fields-from-socialite-action.md` — ResolveUserNameFieldsFromSocialiteAction


# ResolveUserNameFieldsFromSocialiteAction

Ricava nome e cognome da un'identità OAuth, con tre fonti in ordine: attributo `name`, campo `name` dei dati grezzi, parte locale dell'email. Codice: `app/Actions/Socialite/ResolveUserNameFieldsFromSocialiteAction.php`.

## Input

- `Laravel\Socialite\Contracts\User $oauthUser`.

## Output

- `SocialiteNameFieldsData`: `name`, `firstName` (uguale a `name`), `lastName`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-NAME-FIELDS-INV-1` | Il nome viene dall'attributo `name` se produce un risultato non vuoto. | `determineNameField()` | `tests/Unit/Actions/Socialite/ResolveUserNameFieldsFromSocialiteActionTest.php:24,32,40` |
| `SOCIALITE-NAME-FIELDS-INV-2` | Il campo grezzo `name` è scartato se sembra un'ema

### `contracts/retrieve-oauth-user-action.md` — RetrieveOauthUserAction


# RetrieveOauthUserAction

Completa lo scambio OAuth con il provider e restituisce l'utente. Su `InvalidStateException` dispatcha `InvalidState` e ritorna `null`. Codice: `app/Actions/Socialite/RetrieveOauthUserAction.php`.

## Input

- `string $provider`.

## Output

- `?SocialiteUserContract`: utente del provider, oppure `null` in caso di stato OAuth non valido.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-RETRIEVE-OAUTH-INV-1` | `InvalidStateException` produce evento `InvalidState` e `null`. | `execute()`, `handleInvalidStateException()` | `tests/Unit/Actions/Socialite/SocialiteCoreActionsCoverageTest.php:86,115` |
| `SOCIALITE-RETRIEVE-OAUTH-INV-2` | Ogni altra eccezione si propaga. | `execute()` | nessuno |


### `contracts/retrieve-socialite-user-action.md` — RetrieveSocialiteUserAction


# RetrieveSocialiteUserAction

Cerca il collegamento SSO per provider e id esterno e ne aggiorna il campo `token` con il token ricevuto dal provider. Codice: `app/Actions/Socialite/RetrieveSocialiteUserAction.php`.

## Input

- `string $provider` (non vuoto), `SocialiteUserContract $user`.

## Output

- `?SocialiteUser`: il collegamento con `user` caricato e `token` aggiornato, oppure `null` se non esiste.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-RETRIEVE-SU-INV-1` | Provider vuoto: `InvalidArgumentException`. | `execute()` | nessuno |
| `SOCIALITE-RETRIEVE-SU-INV-2` | ID non stringa né intero: `RuntimeException`. | `execute()` | nessuno |
| `SOCIALITE-RETRIEVE-SU-INV-3` | Senza token leggibile, il campo riceve `'no_token_'.time()`. | `execu

### `contracts/revoke-all-user-tokens-action.md` — RevokeAllUserTokensAction


# RevokeAllUserTokensAction

Revoca in blocco gli access token Passport ancora attivi di un utente. Codice: `app/Actions/Passport/RevokeAllUserTokensAction.php`.

## Input

- `UserContract|string $user`: istanza o id utente.

## Output

- `int`: numero di righe aggiornate (token che erano `revoked = false`).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-REVOKE-ALL-INV-1` | Sono toccati solo i token dell'utente con `revoked = false`. | `execute()`, doppio `where` | `tests/Feature/Actions/RevokeAllUserTokensActionTest.php:58,67`; `tests/Feature/Actions/Passport/RevokeAllUserTokensActionTest.php` |
| `PASSPORT-REVOKE-ALL-INV-2` | Il valore di ritorno è il numero di righe della UPDATE. | `execute()` | stesso file |


### `contracts/revoke-client-action.md` — RevokeClientAction


# RevokeClientAction

Marca un client OAuth2 come revocato e, se richiesto, revoca in blocco i suoi access token. Codice: `app/Actions/Passport/RevokeClientAction.php`.

## Input

- `OauthClient|string $client`: istanza o id.
- `bool $revokeTokens`: se `true` revoca anche i token del client.

## Output

- `bool`: `true` se il client è stato trovato e marcato; `false` se non esiste (nessuna eccezione).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-REVOKE-CLIENT-INV-1` | Con id inesistente ritorna `false` senza scritture. | `execute()`, controllo `instanceof` | `tests/Unit/Actions/Passport/PassportActionsCoverageBatch2Test.php:282` |
| `PASSPORT-REVOKE-CLIENT-INV-2` | Con `$revokeTokens = true` i token non revocati del client sono revocati prima del

### `contracts/revoke-refresh-token-action.md` — RevokeRefreshTokenAction


# RevokeRefreshTokenAction

Revoca un singolo refresh token Passport. Codice: `app/Actions/Passport/RevokeRefreshTokenAction.php`.

## Input

- `OauthRefreshToken|string $token`: istanza o id.

## Output

- `bool`: `true` se trovato e marcato; `false` se l'id non esiste.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-REVOKE-REFRESH-INV-1` | Il token trovato finisce con `revoked = true` tramite `save()`. | `execute()` | `tests/Unit/Actions/Passport/PassportActionsCoverageBatch2Test.php:163` |
| `PASSPORT-REVOKE-REFRESH-INV-2` | Id inesistente: `false`, nessuna scrittura. | `execute()`, controllo `instanceof` | nessuno |


### `contracts/revoke-token-action.md` — RevokeTokenAction


# RevokeTokenAction

Revoca un access token Passport e, se presente, il suo refresh token. Codice: `app/Actions/Passport/RevokeTokenAction.php`.

## Input

- `OauthToken|string $token`: istanza o id.

## Output

- `bool`: `true` se il token è stato trovato; `false` se l'id non esiste.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `PASSPORT-REVOKE-TOKEN-INV-1` | L'access token è revocato tramite `OauthToken::revoke()`. | `execute()` | riferimento in `tests/Unit/Actions/AdditionalActionsTest.php:76-79` (solo istanziazione) |
| `PASSPORT-REVOKE-TOKEN-INV-2` | Se la relazione `refreshToken` esiste, anche il refresh token è revocato tramite `revoke()`. | `execute()`, ramo `if ($token->refreshToken)` | nessuno |
| `PASSPORT-REVOKE-TOKEN-INV-3` | Id inesistente: `

### `contracts/revoke-user-access-action.md` — RevokeUserAccessAction


# RevokeUserAccessAction

Sorgente: `app/Actions/Auth/RevokeUserAccessAction.php`. Chiamata da `Modules/Gdpr/app/Actions/Account/DeleteAccountAction.php`.
Perché: [ADR](../adr/deleted-account-blocked-in-user-provider.md).

## Input

- `BaseUser $user`: l'utente a cui togliere ogni accesso già concesso.

## Output

- `int`: numero di token di accesso Passport revocati (quelli ancora attivi prima della chiamata).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-REVOKE-INV-1 | Revoca tutti i token di accesso non revocati dell'utente, e solo i suoi. | — |
| USER-REVOKE-INV-2 | Revoca i refresh token di **tutti** i token dell'utente, anche di quelli già revocati. | — |

### `contracts/send-otp-by-user-action.md` — SendOtpByUserAction


# SendOtpByUserAction

Sorgente: `app/Actions/Otp/SendOtpByUserAction.php`.

## Input

- `UserContract $user`: destinatario; dipendenze iniettate `PasswordData` (scadenza), `Str`, `Otp\Hasher`.
Genera una password temporanea (OTP), la salva come hash con scadenza e la invia all'utente via email. Codice: `app/Actions/Otp/SendOtpByUserAction.php:21-103`.

## Input

- `UserContract $user`: destinatario (`execute`, riga 36).
- Dipendenze: `PasswordData` (scadenza in minuti), `Str` (generatore casuale), `Otp\Hasher` (wrapper dello stesso namespace, righe 25-29).

## Output

- `void`.

## Invarianti

### `contracts/set-default-roles-by-socialite-user-action.md` — SetDefaultRolesBySocialiteUserAction


# SetDefaultRolesBySocialiteUserAction

Assegna ruoli iniziali a un utente SSO in base al dominio della sua email, se non ha già ruoli e il dominio è riconosciuto. Codice: `app/Actions/Socialite/SetDefaultRolesBySocialiteUserAction.php`.

## Input

- `string $provider`, `UserContract $userModel`, `SocialiteUserContract $oauthUser`.

## Output

- `void`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-DEFAULT-ROLES-INV-1` | Se l'utente ha già almeno un ruolo, nessuna modifica. | `execute()`, `roles()->count()` | `tests/Feature/Actions/Socialite/SetDefaultRolesBySocialiteUserActionTest.php:33,45` |
| `SOCIALITE-DEFAULT-ROLES-INV-2` | Dominio non riconosciuto (né first party né client): nessun ruolo assegnato. | `execute()`, `hasUnrecognizedDomain()` 

### `contracts/shield-get-permission-model-action.md` — GetPermissionModelAction


# GetPermissionModelAction

Restituisce il FQCN del modello Permission da usare, letto da `config('permission.models.permission')` con default `Spatie\Permission\Models\Permission`. Codice: `app/Actions/Shield/GetPermissionModelAction.php`. Esiste anche una `GetPermissionModelAction` in `app/Actions/` radice: il nome è duplicato, questo contract copre solo la versione Shield.

## Input

- Nessuno.

## Output

- `string`: FQCN del modello Permission.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-PERM-MODEL-INV-1` | Il valore restituito è sempre una stringa. | `Assert::string()` | nessuno (0 riferimenti per nome classe nei test) |
| `SHIELD-PERM-MODEL-INV-2` | Se la chiave è assente, vale il default Spatie. | `config(..., Permission::class)` | nessuno

### `contracts/shield-utils-action.md` — ShieldUtilsAction


# ShieldUtilsAction

Contenitore legacy di una cinquantina di metodi statici che leggono la configurazione di Filament Shield. Il `execute()` d'istanza non fa nulla. Il docblock annuncia la suddivisione in Action granulari (quelle `Resolve*` del modulo). Codice: `app/Actions/Shield/ShieldUtilsAction.php`.

## Input

- Metodi statici con parametri solo per: `doesResourceHaveCustomPermissions(string)`, `getResourcePermissionPrefixes(string)`, `showModelPath(string)`.

## Output

- Valori scalari, array `list<string>` o `void` (gli `enable*`/`disable*`), secondo il metodo.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SHIELD-UTILS-INV-1` | Gli accessi a configurazione usano `Assert::*`: un tipo errato solleva eccezione. | metodi `get*`/`is*` con `Assert` | `t

### `contracts/socialite-create-user-action.md` — CreateUserAction (Socialite)


# CreateUserAction (Socialite)

Crea un utente locale a partire dagli attributi dell'identità OAuth, gli assegna i ruoli di default e restituisce l'istanza aggiornata. Codice: `app/Actions/Socialite/CreateUserAction.php`. Il basename `CreateUserAction` esiste anche in `app/Actions/` e in `app/Actions/User/`: questo contract copre solo la versione Socialite.

## Input

- `string $provider`, `SocialiteUserContract $oauthUser`.

## Output

- `UserContract`: l'utente ricaricato con `refresh()`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-CREATE-USER-INV-1` | `first_name` riceve il nome completo risolto, non il solo primo nome. | `execute()`, array di `create()` | nessuno sul valore |
| `SOCIALITE-CREATE-USER-INV-2` | Il modello creato deve essere `

### `contracts/store-intended-url-action.md` — StoreIntendedUrlAction


# StoreIntendedUrlAction

Ricorda la pagina a cui tornare dopo il login, per gli ospiti che non passano dal middleware `auth` (CMT-022). Codice: `app/Actions/Auth/StoreIntendedUrlAction.php:19-41`.

## Input

- `mixed $target`: atteso un percorso interno, per esempio `/it/blog/...` (`execute`, riga 23).

## Output

- `bool`: `true` se `url.intended` è stato scritto, `false` altrimenti (righe 25-31).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `STORE-INTENDED-INV-1` | Sono accettati solo stringhe che iniziano con un singolo `/`, senza `\` e senza spazi o caratteri di controllo. | righe 25, 34-40 | Test: nessuno. |
| `STORE-INTENDED-INV-2` | Un input rifiutato non tocca la sessione. | righe 25-27 | Test: nessuno. |
| `STORE-INTENDED-INV-3` | Il valore salva

### `contracts/teamcontract.md` — TeamContract


# TeamContract

L'interfaccia `TeamContract` definisce il contratto per i team nel sistema.

## Metodi

### Gestione Utenti

- `users(): BelongsToMany<Model&UserContract>` - Ottiene tutti gli utenti che appartengono al team
- `owner(): BelongsTo` - Ottiene il proprietario del team
- `hasUser(UserContract $user): bool` - Verifica se un utente appartiene al team
- `addUser(UserContract $user, ?string $role = null): void` - Aggiunge un utente al team
- `removeUser(UserContract $user): void` - Rimuove un utente dal team
- `allUsers(): Collection<int, Model&UserContract>` - Ottiene tutti gli utenti del team, incluso il proprietario
- `members(): Collection<int, Model&UserContract>` - Ottiene tutti i membri del team
- `hasUserWithEmail(string $email): bool` - Verifica se il team ha un utente co

### `contracts/template.md` — <operazione> — contratto comportamentale


# <operazione> — contratto comportamentale

Classe o superficie: `<FQCN>`  
Riferimento nel codice: `@contract docs/contracts/<file>.md`

## Input

- <input e validazione>

## Output

- <risultato osservabile>

## Invarianti

| ID | Regola | Verifica |
|---|---|---|
| `<MODULE>-INV-1` | <regola che deve restare vera> | <test o controllo ripetibile> |


### `contracts/update-user-action.md` — UpdateUserAction


# UpdateUserAction

Aggiorna un utente dentro una transazione: esclude i campi di sistema, gestisce password ed email, valida l'unicità dell'email e rilegge il modello. Codice: `app/Actions/User/UpdateUserAction.php:15-161`.

## Input

- `Model $user`: utente da aggiornare (`execute`, riga 28).
- `array<string, mixed> $data`: campi da aggiornare.

## Output

- `Model`: l'utente riletto con `fresh()` dopo il commit (righe 59-64).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `UPDATE-USER-INV-1` | Non si aggiornano `id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`. | righe 87-95 | `tests/Unit/Actions/User/UpdateUserActionTest.php`, `tests/Unit/Actions/AdditionalActionsTest.php` (riferimenti alla classe) |
| `UPDATE-USER-INV-2` | Una pass

### `contracts/upsert-user-from-digital-identity-action.md` — UpsertUserFromDigitalIdentityAction


# UpsertUserFromDigitalIdentityAction

Sorgente: `app/Actions/Auth/UpsertUserFromDigitalIdentityAction.php`. Perché: [ADR](../adr/digital-identity-upsert-by-fiscal-code.md).

## Input

- `$authMethod`: `spid` o `cie`.
- `$attributes`: chiavi usate `fiscal_code` (obbligatoria), `name`, `surname`, `email`; le altre si ignorano.
- `$emailVerified`: se l'IdP garantisce l'email.
- `$identityProvider` (facoltativo): nome dell'IdP; default = `$authMethod`.

## Output

- Il modello utente (`XotData::make()->getUserClass()`), salvato, `UserContract&Model`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|

### `contracts/user-create-user-action.md` — User/CreateUserAction


# User/CreateUserAction

Crea un utente dal form di registrazione, riempiendo il campo `name` quando manca (NOT NULL senza default). Codice: `app/Actions/User/CreateUserAction.php:10-36`.

Nota: esiste anche una `CreateUserAction` nella radice di `Actions/` con altro contratto. Questo file prende il prefisso `user-` per evitare la collisione di nome.

## Input

- `array<string, mixed> $data` (`execute`, riga 19). Chiavi lette per il fallback: `name`, `first_name`, `last_name`, `email`.

## Output

- `User` creato con `User::create` (righe 33-35).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `USER-CREATE-INV-1` | Se `name` manca o è vuoto: nome = `first_name last_name` (trim); se vuoto, la parte prima di `@` dell'email; se anche quella manca, l'email intera

### `contracts/validate-provider-action.md` — ValidateProviderAction


# ValidateProviderAction

Si assicura che il provider OAuth sia configurato, altrimenti lancia `ProviderNotConfigured`. Codice: `app/Actions/Socialite/ValidateProviderAction.php`.

## Input

- `string $provider`.

## Output

- `void`.

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `SOCIALITE-VALIDATE-PROVIDER-INV-1` | Con variabili mancanti o segnaposto: `ProviderNotConfigured` con provider e elenco. | `execute()` | `tests/Unit/Actions/Socialite/SocialiteUtilityActionsTest.php:93` |
| `SOCIALITE-VALIDATE-PROVIDER-INV-2` | Provider configurato: nessuna eccezione. | `execute()` | `SocialiteUtilityActionsTest.php:88` |


### `contracts/verify-otp-hash-action.md` — VerifyOtpHashAction


# VerifyOtpHashAction

Verifica che un valore OTP in chiaro corrisponda all'hash salvato. Codice: `app/Actions/Otp/VerifyOtpHashAction.php:10-21`.

## Input

- `string $value`: valore inserito dall'utente.
- `string $hashedValue`: hash salvato (`execute`, riga 18).

## Output

- `bool`: esito di `check()` dell'hasher iniettato (riga 20).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `VERIFY-OTP-INV-1` | Il risultato è esattamente `check()` dell'hasher Illuminate. | riga 20 | `tests/Unit/Actions/Otp/OtpHashActionsTest.php` (riferimento alla classe) |


### `contracts-naming.md` — Contracts Naming & Placement in User


# Contracts Naming & Placement in User

> A contract is an **agreement**, not a PHP keyword. We name it `*Contract` and place it under `app/Contracts/`.

## Rule

- ✅ `app/Contracts/ExampleContract.php`
- ❌ `app/Interfaces/ExampleInterface.php`

## Why

- `Contract` describes the domain concept (a pact between components).
- `interface` describes a PHP implementation detail.
- One folder (`app/Contracts/`) keeps the module language consistent and reduces cognitive noise.
- Aligned with Laravel `Illuminate\Contracts\*` convention.

## Verification

```bash

### `cosa-migliorare.md` — Cosa migliorare — modulo User


# Cosa migliorare — modulo User

Ogni affermazione qui sotto viene da un comando eseguito il 1 settembre 2026, dopo il
ripristino di `vendor/` a 330 pacchetti. Le misure precedenti a quella data giravano su
un autoloader dimezzato e non valgono.

## I numeri

| | |
|---|---:|
| Errori PHPStan (modulo isolato) | 0 |
| Rilievi PHPMD su `app/` | 471 |
| PHPInsights — Code | 90.6 % |
| PHPInsights — Architecture | 78.6 % |
| PHPInsights — Style | 95.1 % |
| File PHP | 1752 |
| Casi di test | 1137 |
| Casi di test per file | 0.65 |
| Coverage di riga | 70,1 |

### `coverage-clean.md` — coverage-clean


  at Modules/User/tests/Feature/AuthComponentsTest.php:16
  1   Modules/User/tests/Feature/AuthComponentsTest.php:16

### `coverage-full.md` — 0 /var/www/_bases/base_app_fila5_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/Vit



   FAIL  Modules\User\tests\Feature\AuthComponentsTest
  ⨯ Auth Components Tests → auth components exist and work correctly     0.41s  
  ⨯ Auth Components Tests → auth layout components exist and work corre… 0.23s  
  ⨯ Auth Components Tests → login page loads correctly                   1.14s  
  ⨯ Auth Components Tests → register page loads correctly                0.73s  
  ⨯ Auth Components Tests → auth-session-status component renders corre… 0.23s  
  ⨯ Auth Components Tests → auth header component exists and renders     0.23s  
  ⨯ Authentication Flow with Reorganized Components → login form compon… 0.75s  
  ⨯ Authentication Flow with Reorganized Components → password confirma… 0.50s  
  ⨯ User Profile Components Tests → profile pages use reorganized compo… 0.81s  

   FAIL  Modu

### `coverage.md` — Coverage — User

# Coverage — User

---
title: "Coverage: User"
type: note
status: draft
updated: 2026-10-07
tags: [docs, user]
qmd: "coverage   user user"
---
# Coverage — User

# Coverage: User

Stato onesto (2026-09-22), campagna git-hygiene/marker-cleanup.

- PHPStan `analyse Modules/User`: 1678 file, **0 errori** (level max, config repo).
- PHPMD (`tools/phpmd.phar Modules/User`): **crash pre-esistente**, fatal error
  `Call to a member function getParent() on null` in
  `PHPMD/Rule/AbstractLocalVariable.php:297` (bug noto phpmd.phar su costrutti del

### `critical-filament-rule-getinfolistschema-string-keys.md` — Critical Filament Rule: getInfolistSchema String Keys


# Critical Filament Rule: getInfolistSchema String Keys

## The Rule
The `getInfolistSchema()` method must ALWAYS return an array with string keys. This is a fundamental requirement in the Filament + Laraxot architecture.

## Why This Rule Exists
- Filament's schema processing expects named components with string keys
- Component identification and lifecycle management depend on named keys
- Proper rendering and functionality require string-keyed arrays
- The XotBase architecture enforces this pattern for consistency

## Correct Implementation Pattern
```php
protected function getInfolistSchema(): array
{
    return [
        // String keys for sections
        'section_name' => Section::make('Section Title')
            ->schema([

### `crossatabase-relations.md` — Cross Database Relations Issue - belongsToManyX SQLite Problem


# Cross Database Relations Issue - belongsToManyX SQLite Problem

## Problema Identificato

**Errore**: `SQLSTATE[HY000]: General error: 1 no such table: <nome progetto>_data.customer_user`

**Contesto**: Il trait `HasTenants` utilizza `belongsToManyX` per creare relazioni cross-database tra User (<nome progetto>_user) e Customer (<nome progetto>_data).

## Analisi del Trait HasTenants

### Codice Problematico
```php
// In HasTenants.php, riga 62
return $this->belongsToManyX($tenant_class);
```

### Flusso di Esecuzione
1. `User::tenants()` chiama `belongsToManyX(Customer::class)`
2. `belongsToManyX` rileva che User è in `<nome progetto>_user` e Customer è in `<nome progetto>_data`

### `cursor-rules.md` — Regola Cursor: Migrazioni XotBaseMigration

# Regola Cursor: Migrazioni XotBaseMigration

## Regola
- Usare SEMPRE `$this->hasColumn('nome_colonna')` nelle migrazioni che estendono XotBaseMigration.
- NON usare mai `Schema::hasColumn`.

## Esempio
```php
if (! $this->hasColumn('state')) {
    $this->tableUpdate(function (Blueprint $table) {
        $table->string('state')->nullable();
    });
}
```

## Motivazione
- Compatibilità multi-db
- Coerenza tra i moduli
- Evita errori dovuti a override custom


### `cursor.md` — Regola Cursor: Migrazioni XotBaseMigration

# Regola Cursor: Migrazioni XotBaseMigration

## Regola
- Usare SEMPRE `$this->hasColumn('nome_colonna')` nelle migrazioni che estendono XotBaseMigration.
- NON usare mai `Schema::hasColumn`.

## Esempio
```php
if (! $this->hasColumn('state')) {
    $this->tableUpdate(function (Blueprint $table) {
        $table->string('state')->nullable();
    });
}
```

## Motivazione
- Compatibilità multi-db
- Coerenza tra i moduli
- Evita errori dovuti a override custom


### `custom-login-implementazione-personalizzato.md` — Versione HEAD


https://ajaxray.com/blog/lets-beautify-filament-3-login-page/

https://www.codef.site/blog/laravel/how-to-customize-laravel-filament-login-page

https://v2.filamentphp.com/tricks/customizing-filament-breezy-registration-profile-page

### Versione HEAD

# Implementazione Login Personalizzato

> **Collegamenti Correlati:**
> - [Passport Integration](passport.md) - Integrazione OAuth2 con Passport
> - [Socialite Integration](socialite.txt) - Integrazione con provider social
> - [Two Factor Authentication](two_factor.txt) - Autenticazione a due fattori
> - [Filament Best Practices](filament-best-practices-2.md) - Best practices Filament
> - [User Profile Models](user_profile_models.md) - Modelli del profilo utente

## Implementazione con Filament


### `custom-login.md` — Versione HEAD


https://ajaxray.com/blog/lets-beautify-filament-3-login-page/

https://www.codef.site/blog/laravel/how-to-customize-laravel-filament-login-page


https://v2.filamentphp.com/tricks/customizing-filament-breezy-registration-profile-page

### Versione HEAD

# Implementazione Login Personalizzato

> **Collegamenti Correlati:**
> - [Passport Integration](passport.md) - Integrazione OAuth2 con Passport
> - [Socialite Integration](socialite.txt) - Integrazione con provider social
> - [Two Factor Authentication](two_factor.txt) - Autenticazione a due fattori
> - [Filament Best Practices](filament-best-practices-2.md) - Best practices Filament
> - [User Profile Models](user_profile_models.md) - Modelli del profilo utente

## Implementazione con Filament

### `cyclomatic-complexity-report.md` — Cyclomatic Complexity Report - Module: User


# Cyclomatic Complexity Report - Module: User

**Generated:** 2025-10-01 19:44:12  
**Analyzer:** Super Mucca 🐮

---

## 📊 Summary Statistics

| Metric | Value |
|--------|-------|
| Total PHP Files | 876 |
| Total Lines of Code | 62405 |
| Total Classes/Traits/Interfaces | 533 |
| Total Methods | 2184 |
| High Complexity Methods (>10) | 5 |

---


### `cyclomatic-complexity.md` — Cyclomatic Complexity Report - Module: User


# Cyclomatic Complexity Report - Module: User

**Analyzer:** Super Mucca 🐮

---

## 📊 Summary Statistics

| Metric | Value |
|--------|-------|
| Total PHP Files | 876 |
| Total Lines of Code | 62405 |
| Total Classes/Traits/Interfaces | 533 |
| Total Methods | 2184 |
| High Complexity Methods (>10) | 5 |

---

## 🎯 Cyclomatic Complexity Overview

### `database/migration-safety-rules-never-destroy-data.md` — Migration Safety Rules - NEVER Destroy Data


# Migration Safety Rules - NEVER Destroy Data

## Regola ASSOLUTA

**🚨 MAI E POI MAI eseguire questi comandi:**

```bash
❌ php artisan migrate:fresh
❌ php artisan migrate --force
❌ php artisan db:wipe
❌ php artisan db:fresh
❌ php artisan migrate:refresh
❌ php artisan migrate:reset
```

**🚨 MAI usare trait in produzione:**

```php
❌ use RefreshDatabase;  // Solo in tests!

### `database/migration-safety-rules.md` — Migration Safety Rules - NEVER Destroy Data

# Migration Safety Rules - NEVER Destroy Data

## Regola ASSOLUTA

**🚨 MAI E POI MAI eseguire questi comandi:**

```bash
❌ php artisan migrate:fresh
❌ php artisan migrate --force
❌ php artisan db:wipe
❌ php artisan db:fresh
❌ php artisan migrate:refresh
❌ php artisan migrate:reset
```

**🚨 MAI usare trait in produzione:**

```php
❌ use RefreshDatabase;  // Solo in tests!
❌ use DatabaseMigrations; // Solo in tests!

### `database/migrations/model-has-roles.md` — Model Has Roles Migration Documentation


# Model Has Roles Migration Documentation

## Overview
La migrazione `2024_12_05_000034_create_model_has_roles_table.php` crea la tabella pivot per la relazione polimorfica tra modelli e ruoli nel sistema di autorizzazione.

## Struttura

### Colonne Principali
- `id`: Chiave primaria auto-incrementante
- `role_id`: Chiave esterna per il ruolo (integer, nullable)
- `model_type`: Tipo del modello polimorfico
- `model_id`: ID del modello polimorfico
- `team_id`: Chiave esterna per il team (nullable)

### Indici
- Indice su `role_id`
- Indice su `model_id`
- Indice su `team_id`


### `database/profile-uuid-philosophy.md` — Profile UUID Philosophy - Zen Approach

# Profile UUID Philosophy - Zen Approach

## Il Problema (What)

**Errore**: `SQLSTATE[42S22]: Column not found: 1054 Unknown column 'uuid' in 'field list'`

**Query Fallita**:
```sql
INSERT INTO `profiles` (`user_id`, `uuid`, `updated_at`, `created_at`) 
VALUES (...)
```

**Tabella Attuale**:
```
profiles:
- id: INT UNSIGNED AUTOINCREMENT ✅ (PRIMARY KEY)
- user_id: VARCHAR(191) ✅
- first_name, last_name, email, slug, extra, timestamps ✅
- MANCA: uuid column ❌
```

### `database-errors.md` — Database Errors in User Module


# Database Errors in User Module

## Missing `doctor_team` Table

**Error Description:** An `Internal Server Error` was encountered due to the missing `doctor_team` table in the database. This table is necessary for the many-to-many relationship between users (doctors) and teams as defined in the `BaseUser` model. The error occurs when trying to fetch all teams for a user via the `allTeams()` method.

**Resolution:** A migration was created to add the `doctor_team` pivot table. The migration file `2025_05_17_000001_create_doctor_team_table.php` defines the structure for this table with foreign keys to `users` and `teams` tables.

## Error: Missing Model Class in Migration

**Error Message**: `Target class [\Modules\User\Models\DoctorTeam] does not exist.`

**Context**: This error occurred

### `database-issues.md` — Database Issues in User Module


# Database Issues in User Module

## Missing `doctor_team` Table

**Issue**: An `Internal Server Error` was encountered due to the missing `doctor_team` table when fetching team data for a user in the `BaseUser` model.

**Resolution**: A migration file `2025_05_16_000001_create_doctor_team_table.php` was created to establish the relationship between users (doctors) and teams. The migration was run to apply the changes to the database.

**Latest Update (Conflict Resolution)**: Identified a conflict with the migration for `doctor_team` table. The table appears to exist in the database, but migrations are marked as pending. Updated the migration file to check for table existence before creation and attempted to run the migration again on 2025-05-16.

**Latest Update (Migration Analysis and R

### `database-population.md` — Popolamento Database - Modulo User


# Popolamento Database - Modulo User

## Panoramica

Questo documento descrive come popolare il database del modulo User utilizzando le factories e i seeders disponibili. Il popolamento è essenziale per:
- Testing e sviluppo
- Popolamento dati iniziali
- Generazione di dataset per performance testing
- Verifica della coerenza dei dati

## Factories Disponibili

### 1. UserFactory
**File**: `database/factories/UserFactory.php`
**Scopo**: Generazione di utenti base con dati realistici

```php
// Generazione singola
$user = \Modules\User\Models\User::factory()->create();

### `database-schema.md` — User Module — Database Schema


# User Module — Database Schema

## Core Tables

### users
```sql
id UUID PRIMARY KEY
email VARCHAR(255) UNIQUE NOT NULL
password VARCHAR(255) NOT NULL
name VARCHAR(255)
email_verified_at TIMESTAMP NULL
created_at, updated_at TIMESTAMP
deleted_at TIMESTAMP NULL (soft delete)
```

### teams
```sql
id UUID PRIMARY KEY
user_id UUID NOT NULL (team owner)

### `databases.md` — Database Errors in User Module


# Database Errors in User Module

## Missing `doctor_team` Table

**Error Description:** An `Internal Server Error` was encountered due to the missing `doctor_team` table in the database. This table is necessary for the many-to-many relationship between users (doctors) and teams as defined in the `BaseUser` model. The error occurs when trying to fetch all teams for a user via the `allTeams()` method.

**Resolution:** A migration was created to add the `doctor_team` pivot table. The migration file `2025_05_17_000001_create_doctor_team_table.php` defines the structure for this table with foreign keys to `users` and `teams` tables.

## Error: Missing Model Class in Migration

**Error Message**: `Target class [\Modules\User\Models\DoctorTeam] does not exist.`

**Context**: This error occurred

### `datas-not-dtos-convention.md` — Datas, non DTOs


# Datas, non DTOs

Vedi `Modules/UI/docs/datas-not-dtos-convention.md` per la regola completa.

## Storia in questo modulo

`laravel/app/DTOs/UserContextDto.php` (root, non modulare, zero utilizzatori)
è stato convertito e spostato in `Modules\User\Datas\UserContextData`
(estende `Spatie\LaravelData\Data`, stesso comportamento — `fromUserModel()`,
`hasRole()`).

Segue lo stile già presente in `Modules\User\Datas\SuperAdminData` (proprietà
pubbliche/`readonly`, nessun getter manuale).

### `decision-log.md` — Decision Log — User

# Decision Log — User

## Decisions

### 2026-10-08: Eliminata la migrazione `2026_10_05_174817_create_permission_tables.php`
- **Choose**: Eliminare la migrazione aggiunta il 06/10 (`87b58a20d`).
- **Over**: Segnarla come eseguita solo in locale, o riscriverla con `XotBaseMigration`.
- **Because**: `php artisan migrate` (e quindi `composer go`) si fermava su `Table 'permissions' already exists`: era l'unica migrazione in attesa e `permissions` era gia' creata dalle migrazioni precedenti del modulo (`2023_01_22_000007`, `2026_09_01_150112`, ...). Confronto con `vendor/spatie/laravel-permission/database/migrations/create_permission_tables.php.stub` (Spatie 8.3.0): schema identico (tabelle, colonne, indici, chiavi esterne, pulizia cache); cambiavano solo la connessione `user` e la lettura ti

### `dentist-moderation-approach.md` — Dentist Moderation Approach in User Module


# Dentist Moderation Approach in User Module

## Overview
This document outlines the strategy for implementing dentist moderation within the existing `User` module. While a separate `Moderation` module was initially considered, the decision has been made to integrate this functionality into the `User` module to streamline development and leverage existing user management infrastructure.

## Rationale for Using User Module
- **Centralized User Management**: The `User` module already handles user data, authentication, and roles. Integrating moderation here keeps related functionality together.
- **Efficiency**: Utilizing existing structures reduces development time compared to creating a new module.
- **Complexity Management**: Although dentist moderation is more intricate, the `User` modul

### `dependencies.md` — Dependencies (Module User)


# Dependencies (Module User)

Canonical dependency map:

- [../../../../docs/dependencies.md](../../../../docs/dependencies.md)

Module/theme specific notes:

- (add notes here when a dependency is directly used by this module/theme)

Installed packages index:

- [../../../../docs/packages/index.md](../../../../docs/packages/index.md)

### `dependency-intelligence.md` — Dependency Intelligence - Module User


# Dependency Intelligence - Module User

Aggiornato da `composer show` il 2026-03-02.

## Runtime dependencies (`require`)

| Package | Constraint | Installed | Area |
|---|---|---|---|
| `flowframe/laravel-trend` | `*` | `v0.4.0` | `application-support` |
| `jenssegers/agent` | `*` | `v2.6.4` | `application-support` |
| `laravel/passport` | `*` | `v13.4.4` | `laravel-core` |
| `socialiteproviders/auth0` | `*` | `4.2.0` | `oauth-social` |
| `socialiteproviders/microsoft` | `^4.8` | `not-installed` | `oauth-social` |
| `spatie/laravel-personal-data-export` | `*` | `4.3.1` | `spatie-ecosystem` |

## Dev dependencies (`require-dev`)

| Package | Constraint | Installed | Area |
|---|---|---|---|

### `dependency.md` — dependency-rules


# dependency-rules

## Principle (MANDATORY)
- Base modules MUST NOT depend on specific/domain modules.
- Allowed dependencies for `Modules/User`: `Modules/Xot`, `Modules/UI`, other base/intermediate modules.
- Forbidden: any import from `Modules/<nome progetto>`, `Modules/Patient`, `Modules/Doctor`, etc.

## Symptoms of violations
- `use Modules\<nome progetto>\...` inside `Modules/User/...`
- Widgets/Resources/Providers in `User` referencing domain types like `Patient`, `Appointment`, etc.

## Remediation options
- Option A (move): Move feature-specific classes into the domain module (e.g., `<nome progetto>`) and update namespaces.
- Option B (contract): Define a contract in `Modules\User\Contracts\...` (e.g., `UserTypeStatProvider`) and implement/bind it inside the domain module’s Serv

### `development/roadmap/features/autenticazione.md` — Autenticazione


# Autenticazione

## Overview
**Status**: Completed (100%)
**Priority**: High
**Target Date**: 2024-04-01

## Feature Description
Sistema di autenticazione completo con supporto per multiple strategie di login, 2FA e gestione sessioni.

## Current Progress
- Login system: 100%
- 2FA implementation: 100%
- Session management: 100%
- Security features: 100%

## Technical Requirements
- Sistema di login
- Implementazione 2FA

### `development/roadmap/features/gestione-teams.md` — Gestione Teams


# Gestione Teams

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di gestione dei team utente con supporto per ruoli, permessi e multi-tenancy.

## Obiettivi
- [x] Implementazione HasTeams trait (100%)
- [x] Gestione ruoli per team (100%)
- [x] Multi-tenancy support (100%)
- [x] Validazione dati (100%)
- [x] Logging e monitoring (100%)

## Guida Step-by-Step


### `development/roadmap/features/legacy-code-cleanup.md` — Legacy Code Cleanup


# Legacy Code Cleanup

## Overview
Clean up and modernize the User module codebase by removing legacy code and updating to current standards.

## Current Issues

### Legacy Directories
1. app_old/
   - Contains outdated implementations
   - May contain deprecated functionality
   - Potential security risks

2. config_old/
   - Outdated configuration files
   - May conflict with current settings

3. database_old/
   - Old migrations

### `development/roadmap/features/user-traits.md` — User Traits Implementation


# User Traits Implementation

## Overview
Implementation of core traits for user management, authentication, and authorization.

## Technical Implementation

### HasTeams Trait
#### Requirements
- Must only be used in models extending Authenticatable
- Requires HasRoles trait
- Required database tables:
  - teams (with specified columns)
  - team_user (with specified columns)

#### Implementation Details
```php
/**
 * @property-read Collection<Team> $teams

### `docs/filament-version.md` — Filament Version Declaration — {ModuleOrThemeName}

# Filament Version Declaration — {ModuleOrThemeName}

**Current Version**: Filament v5 (Livewire v4 + Schemas)

This module/theme is developed against **Filament v5**.

All resources, forms, tables, infolists, widgets and actions must follow the v5 + XotBase patterns documented in:

- `docs/wiki/rules/filament-rules-summary.md`
- `docs/wiki/memories/filament-version-policy.md`
- `laravel/Modules/Xot/docs/filament-5-laraxot-rules.md`

**Legacy v4 documents** in this folder (if any) are historical only and must not be used as current reference.

**Last verified**: 2026-05-21

**Firmato:** Cursor Agent (Composer) — template propagato ai package `docs/`

### `docs-archive-policy.md` — Docs archive policy

# Docs archive policy

`docs/archive/` is local-only scratch/history and must not be used as a canonical documentation source.

Active module knowledge belongs in normal `docs/*.md`, `docs/wiki/**`, or a precise topical subdirectory. This keeps QMD ingestion deterministic and prevents stale duplicates from outranking current documentation.

The module `.gitignore` ignores `docs/archive/`; when a useful archived note is still valid, promote it into a live document outside `archive` and link it from the local docs index.

### `docs-health.md` — Docs Health - User


# Docs Health - User

## Snapshot

- Scope directory: laravel/Modules/User/docs
- Markdown files (top-level in this docs folder): 896
- Has canonical index 00-index.md: yes
- Has README.md: yes

## Confidence Checklist

- [ ] 00-index links only canonical docs (no obsolete duplicates)
- [ ] README and 00-index are coherent and do not diverge
- [ ] New docs use stable names (no dates in filename)
- [ ] Deprecated docs are explicitly marked and linked to canonical replacements
- [ ] Every technical decision has one canonical reference doc

## Canonical Rules


### `docs-location-policy.md` — Documentazione: Policy Posizione Docs (Modulo User)


# Documentazione: Policy Posizione Docs (Modulo User)

## Regola
- Vietato usare `/docs` in root del repository.
- Usare esclusivamente `laravel/Modules/<ModuleName>/docs/` per la documentazione.

## Motivazioni
- Evita duplicazioni e inconsistenze.
- Facilita responsabilità e reperibilità per modulo.

## Azioni Esecutive
- Aggiunta regola in `.cursor/rules/docs-location-policy.mdc` che blocca la root `docs`.
- Verificare PR che includano solo file in `Modules/*/docs`.

## Come Migrare
1. Identifica file sotto `/docs` root.
2. Spostali nel modulo pertinente in `laravel/Modules/<Module>/docs/`.
3. Aggiorna backlink tra moduli se necessario.


### `documentation-standards.md` — Standard di Documentazione


# Standard di Documentazione

## Convenzioni di Naming
- Tutti i file e le cartelle nella documentazione devono essere in minuscolo
- L'unica eccezione è il file `README.md`
- Utilizzare lo script [fix_docs_case](../../../../../bashscripts/docs/docs/fix_docs_case.md) per la standardizzazione automatica

## Organizzazione
- Ogni modulo ha la sua cartella `docs`
- La documentazione specifica va nel modulo pertinente
- Collegamenti bidirezionali tra documenti correlati
- Evitare duplicazione della documentazione

## Manutenzione
- Aggiornare la documentazione contestualmente alle modifiche del codice
- Verificare regolarmente i collegamenti
- Mantenere la coerenza dello stile e del formato
- Eseguire periodicamente gli script di manutenzione automatica

### `dor-registration-widget.md` — Widget di Registrazione del Dottore


# Widget di Registrazione del Dottore

## Panoramica

Il widget di registrazione del dottore (`RegistrationWidget.php`) è un componente fondamentale nel processo di registrazione degli odontoiatri in <nome progetto>. Questo documento descrive la sua implementazione corretta e come deve essere integrato con il sistema di gestione degli stati tramite `spatie/laravel-model-states`.

## Posizione del File

```
Modules/User/app/Filament/Widgets/RegistrationWidget.php
```

## Architettura

Il widget estende `XotBaseWidget` e implementa l'interfaccia `HasForms` per gestire i form di registrazione. È progettato per funzionare in modo modulare, adattandosi al tipo di utente che si sta registrando (in questo caso, un dottore).

## Implementazione Corretta

L'implementazione attuale del widget è inc

### `dor-registration.md` — Registrazione Odontoiatra (Doctor)


# Registrazione Odontoiatra (Doctor)

## Panoramica
Il sistema utilizza il pattern "parental" di tighten per gestire i diversi tipi di utenti. L'odontoiatra è implementato come un tipo specifico di utente (Doctor) che estende il modello base User.

## Architettura

### Modello Doctor
```php
// /laravel/Modules/Patient/app/Models/Doctor.php
namespace Modules\Patient\Models;

use Tightenco\Parental\HasParent;
use Modules\User\Models\User;

class Doctor extends User
{
    use HasParent;


### `dry-violation-fix.md` — Correzione Violazione DRY: safeStringCast


# Correzione Violazione DRY: safeStringCast

## Problema Identificato
La funzione `safeStringCast()` era duplicata in **15+ file** del progetto, violando gravemente il principio DRY (Don't Repeat Yourself).
## File Coinvolti
- `Modules/User/app/Filament/Widgets/PasswordExpiredWidget.php`
- `Modules/User/app/Filament/Widgets/Auth/RegisterWidget.php`
- `Modules/User/app/Filament/Widgets/Auth/ResetPasswordWidget.php`
- `Modules/User/app/Actions/User/UpdateUserAction.php`
- `Modules/TechPlanner/app/Filament/Resources/ClientResource/Pages/ListClients.php`
- `Modules/TechPlanner/app/Models/Worker.php`
- `Modules/Geo/app/Console/Commands/SushiCommand.php`
- `Modules/Geo/app/Services/GeoDataService.php`
- `Modules/Geo/app/Filament/Forms/Components/AddressesField.php`
- `Modules/Geo/database/facto

### `dry-violation.md` — Correzione Violazione DRY: safeStringCast


# Correzione Violazione DRY: safeStringCast

## Problema Identificato
La funzione `safeStringCast()` era duplicata in **15+ file** del progetto, violando gravemente il principio DRY (Don't Repeat Yourself).
## File Coinvolti
- `Modules/User/app/Filament/Widgets/PasswordExpiredWidget.php`
- `Modules/User/app/Filament/Widgets/Auth/RegisterWidget.php`
- `Modules/User/app/Filament/Widgets/Auth/ResetPasswordWidget.php`
- `Modules/User/app/Actions/User/UpdateUserAction.php`
- `Modules/TechPlanner/app/Filament/Resources/ClientResource/Pages/ListClients.php`
- `Modules/TechPlanner/app/Models/Worker.php`
- `Modules/Geo/app/Console/Commands/SushiCommand.php`
- `Modules/Geo/app/Services/GeoDataService.php`
- `Modules/Geo/app/Filament/Forms/Components/AddressesField.php`
- `Modules/Geo/database/facto

### `eav.md` — eav


See canonical documentation: ../../../Themes/docs/shared-components/eav.txt

### `eloquent-properties-best-practices.md` — eloquent-properties-best-practices


See canonical documentation: ../../../Themes/docs/shared-components/eloquent-properties-best-practices.md

### `email/best-practices.md` — 📧 Email Deliverability Best Practices – User Module

# 📧 Email Deliverability Best Practices – User Module

**Module**: User (owner)  
**Status**: ✅ CONFIGURATO E OPERATIVO  
**Data**: 2026-11-12  

> **Obiettivo**: Garantire che le email di verifica e notifica del modulo User non finiscano nella cartella Spam.

---

## 📌 Panoramica

Le email di verifica account, reset password e notifiche utente devono raggiungere la casella di posta principale dell'utente. Se finiscono in Spam, l'utente non può verificare l'account o ricevere comunicazioni critiche.

---

## 📋 Best Practices Implemented

### 1. Dominio Mittente


### `email/email-setup.md` — Email Infrastructure Setup — FixCity / Laraxot (User Module)

# Email Infrastructure Setup — FixCity / Laraxot (User Module)

**Data**: 2026-11-12  
**Modulo**: User (owner)  
**Stato**: ✅ CONFIGURATO E OPERATIVO

---

## Panoramica

Il server FixCity (`fixcity.eu`) è configurato per **inviare** e **ricevere** email tramite:

1. **Sendmail** (locale, Postfix) — per consegna diretta dal server
2. **Mailtrap SDK** (API) — per test/sandbox
3. **Symfony Mailer** (Laravel Mail) — orchestratore centrale
4. **Spatie Laravel Database Mail Templates** — template persistenti

---

## Architettura

### `email-infrastructure-integration.md` — Autenticazione e posta email


# Autenticazione e posta email

La verifica email, il reset password e gli inviti dipendono dal modulo Notify e
dal mailer Laravel configurato nell’ambiente. Il server di sviluppo dispone di
Postfix locale, ma non di una casella IMAP pubblica: questo non è sufficiente per
ricevere posta dagli utenti.

## Contratto operativo

- il mittente applicativo deve appartenere a `fixcity.eu`;
- gli invii di verifica devono passare dal mailer Laravel configurato, senza
  credenziali nel codice;
- gli errori del provider devono essere visibili nei log e non trasformarsi in
  conferme false all’utente;
- la ricezione delle risposte è responsabilità dell’infrastruttura IMAP/MX, non
  dell’azione `ResendEmailVerificationAction`.

Il completamento della posta pubblica richiede l’attivazione documentata n

### `email-verification-delivery.md` — Email verification delivery


# Email verification delivery

The User module owns the verification flow, but not the transport. The resend
action and Laravel's `MustVerifyEmail` notification delegate to the Notify mail
configuration. Templates are rendered by `Modules\Notify\Emails\SpatieEmail`.

## Production contract

- `MAIL_MAILER` must select an operational transactional transport.
- `MAIL_FROM_ADDRESS` must use the verified `fixcity.eu` domain.
- Laravel config cache must be rebuilt after changing production variables.
- Queue workers must be restarted after a mailer/configuration change.
- Mailtrap pending-account restrictions are provider-side; changing the User
  action cannot make Gmail delivery work before provider approval.
- Verification mail is transactional: it must not contain marketing content or
  be

### `emailor-registration.md` — Invio Email per la Continuazione della Registrazione del Dottore


# Invio Email per la Continuazione della Registrazione del Dottore

## Panoramica del Processo

Nel sistema <nome progetto>, l'invio dell'email al dottore con il link per continuare la registrazione è un passaggio cruciale che avviene dopo la moderazione della richiesta iniziale. Questo documento descrive in dettaglio dove e come avviene questo processo utilizzando `SpatieEmail` e `spatie/laravel-model-states`.

## Architettura del Sistema

### 1. Gestione degli Stati con Spatie Model States

Il sistema utilizza `spatie/laravel-model-states` per gestire gli stati del processo di registrazione del dottore in modo type-safe e orientato agli oggetti:

```php
// Definizione degli stati base
abstract class DoctorRegistrationState extends State
{
    public static function config(): StateConfig

### `error-handling.md` — Gestione degli Errori nelle Blade di Autenticazione


# Gestione degli Errori nelle Blade di Autenticazione

## Introduzione

La gestione degli errori nelle blade di autenticazione deve seguire un pattern coerente che garantisca:
- Feedback immediato all'utente
- Logging appropriato per il debugging
- Sicurezza nella gestione delle informazioni sensibili

## Pattern di Gestione Errori

### 1. Try-Catch nei Metodi Volt

```php
public function action()
{
    try {
        // Logica principale
        $this->validate([...]);

### `errori/class-page-not-found.md` — Errore: Class Page Not Found in Cluster Pages


# Errore: Class Page Not Found in Cluster Pages

## Descrizione dell'Errore

```
Error - Internal Server Error
Class "Modules\User\Filament\Clusters\Appearance\Pages\Page" not found
```

Errore che si verifica quando il namespace di una classe importata non esiste.

## Causa Radice

### Violazione Doppia Regola Laraxot

**Errore #1**: Import errato di `Page`
```php
// ❌ ERRORE in alcuni file Cluster Pages
use Filament\Pages\Page;  // Viola regola: MAI estendere Filament direttamente!

### `external-packages-inheritance-pattern.md` — Pattern di Ereditarietà per Pacchetti Esterni


# Pattern di Ereditarietà per Pacchetti Esterni

## 📋 Panoramica

Questo documento descrive il pattern corretto per estendere modelli di pacchetti esterni (Spatie, Laravel, etc.) invece di estendere `BaseModel`.

## 🎯 Principio Fondamentale

**Quando un pacchetto esterno fornisce un modello completo con logica interna complessa, estendere direttamente quel modello, NON `BaseModel`.**

## ✅ Casi Corretti Attuali

### 1. Permission e Role (Spatie Permission)

**File**: `Modules/User/app/Models/Permission.php` e `Modules/User/app/Models/Role.php`

```php
<?php


### `external-packages-inheritance.md` — Pattern di Ereditarietà per Pacchetti Esterni


# Pattern di Ereditarietà per Pacchetti Esterni

## 📋 Panoramica

Questo documento descrive il pattern corretto per estendere modelli di pacchetti esterni (Spatie, Laravel, etc.) invece di estendere `BaseModel`.

## 🎯 Principio Fondamentale

**Quando un pacchetto esterno fornisce un modello completo con logica interna complessa, estendere direttamente quel modello, NON `BaseModel`.**

## ✅ Casi Corretti Attuali

### 1. Permission e Role (Spatie Permission)

**File**: `Modules/User/app/Models/Permission.php` e `Modules/User/app/Models/Role.php`

```php
<?php


### `external-resources.md` — Risorse e Link Utili - Modulo User


# Risorse e Link Utili - Modulo User

Raccolta di link e risorse esterne per lo sviluppo del modulo User.

## EAV (Entity-Attribute-Value)
- [Laravel Custom Fields (JSON / EAV / Same Table)](https://laraveldaily.com/post/laravel-custom-fields-json-eav-model-same-table)

## Filament Integration
- [Filament Custom Fields](https://github.com/yemenpoint/filament-custom-fields)
- [Filament Extras](https://github.com/tanthammar/filament-extras)
- [Setting Page with Filament](https://blog.moonguard.dev/setting-page-with-filament)
- [Filament Registration Form Extra Fields](https://laraveldaily.com/post/filament-registration-form-extra-fields-choose-user-role)
- [Filament Spatie Roles Permissions](https://github.com/Althinect/filament-spatie-roles-permissions)
- [Filament Profile](https://github.

### `factory-audit-lessons-learned.md` — Factory Audit Lessons Learned - User Module


# Factory Audit Lessons Learned - User Module

## ERRORE GRAVISSIMO RISOLTO NEL MODULO USER

Il modulo User aveva **16 factory mancanti** su 31 modelli totali - il 52% dei modelli non era testabile!

## 🎓 LEZIONI SPECIFICHE APPRESE

### 1. **Modelli Pivot Complessi**
- **TeamUser, TenantUser, ProfileTeam**: Necessitano factory per relazioni many-to-many
- **Pattern**: Stati per ruoli (owner, admin, member)
- **Relazioni**: Metodi forUser(), forTeam() per test specifici

### 2. **OAuth Models Pattern**
```php
// OAuth models necessitano dati realistici
'expires_at' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
'scopes' => $this->faker->randomElements(['read', 'write'], 2),
'revoked' => $this->faker->boolean(5), // 5% revoked

### `factory-creation-status.md` — Factory Creation Status - User Module


# Factory Creation Status - User Module

## ERRORE GRAVISSIMO IDENTIFICATO E RISOLUZIONE IN CORSO

Il modulo User aveva **16 factory mancanti** su 31 modelli totali. Questo è un errore architetturale critico che compromette:
- Testing completo del sistema
- Seeding realistico dei dati
- Sviluppo e debugging
- Integrità del sistema modulare

## STATO CREAZIONE FACTORY

### ✅ COMPLETATE
1. **Authentication.php** → AuthenticationFactory.php ✅
2. **DeviceUser.php** → DeviceUserFactory.php ✅  
3. **DeviceProfile.php** → DeviceProfileFactory.php ✅
4. **Membership.php** → MembershipFactory.php ✅

### 🔄 IN PROGRESS

### `factory-creation.md` — Factory Creation Status - User Module


# Factory Creation Status - User Module

## ERRORE GRAVISSIMO IDENTIFICATO E RISOLUZIONE IN CORSO

Il modulo User aveva **16 factory mancanti** su 31 modelli totali. Questo è un errore architetturale critico che compromette:
- Testing completo del sistema
- Seeding realistico dei dati
- Sviluppo e debugging
- Integrità del sistema modulare

## STATO CREAZIONE FACTORY

### ✅ COMPLETATE
1. **Authentication.php** → AuthenticationFactory.php ✅
2. **DeviceUser.php** → DeviceUserFactory.php ✅  
3. **DeviceProfile.php** → DeviceProfileFactory.php ✅
4. **Membership.php** → MembershipFactory.php ✅

### 🔄 IN PROGRESS

### `factory-lessons-learned.md` — Lezioni Apprese dall'Errore Gravissimo delle Factory


# Lezioni Apprese dall'Errore Gravissimo delle Factory

## L'Errore Gravissimo

**Data**: 2025-01-06  
**Problema**: 35+ factory mancanti su 13 moduli  
**Gravità**: CRITICA - Sistema di testing compromesso

## Lezioni Fondamentali

### 1. Factory Obbligatorie per Ogni Model
- **REGOLA ASSOLUTA**: Ogni model DEVE avere la sua factory
- **NESSUNA ECCEZIONE**: Non è opzionale, è obbligatorio
- **CONSEGUENZE**: Senza factory = testing impossibile, seeding fallimentare, sviluppo locale bloccato

### 2. PHPStan Livello 9 Obbligatorio
- **SEMPRE** validare ogni factory con PHPStan livello 9
- **TIPIZZAZIONE RIGOROSA**: Cast espliciti `(string)`, `/** @var string */`
- **SPRINTF**: Usare `sprintf()` invece di concatenazione per sicurezza tipi

### `features.md` — Funzionalità del Modulo User


# Funzionalità del Modulo User

## Cambio Password

Il modulo User fornisce una funzionalità di cambio password che può essere utilizzata sia per gli utenti che per i profili.

### Cambio Password Utente

Il cambio password utente è gestito attraverso l'azione `ChangePasswordAction` che permette di modificare la password di un utente specifico.

#### Test

I test per il cambio password utente verificano:

1. La possibilità di cambiare la password con credenziali corrette
2. L'impossibilità di cambiare la password con la password corrente errata
3. La corretta validazione dei campi del form

### Cambio Password Profilo

### `filament/errors/static-instance-method-incompatibility.md` — Incompatibilità tra metodi statici e di istanza in Filament


# Incompatibilità tra metodi statici e di istanza in Filament

> **NOTA IMPORTANTE**: Questo documento è un riferimento specifico per il modulo User.
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/docs/filament/errors/static-instance-method-incompatibility.md).
> La documentazione principale e completa si trova nel [modulo UI](../../../ui/project_docs/filament/errors/static-instance-method-incompatibility.md).
## Errori incontrati
### Errore 1: Metodo statico in RelationManager
Nel file `Modules/User/app/Filament/Resources/UserResource/RelationManagers/TeamsRelationManager.php` è stato rilevato il seguente errore:
```
Cannot make non static method Filament\Resources\RelationManagers\RelationManager::getTableColumns() static in class Modules\User\Filament\Re

### `filament/widgets/dashboard-filters-integration.md` — Dashboard Filters Integration per Widget Filament


# Dashboard Filters Integration per Widget Filament

## Problema Risolto
### Descrizione del Bug
Il widget `UserTypeRegistrationsChartWidget` non riceveva correttamente i filtri dalla Dashboard, causando errori di accesso a `$this->filters` che risultava `null` nel metodo `getData()`.
### Causa Tecnica
- **Dashboard**: Estende `XotBaseDashboard` che usa il trait `HasFiltersForm`
- **Widget**: Estende `XotBaseChartWidget` che usa il trait `InteractsWithPageFilters`
- **Problema**: La propagazione automatica dei filtri tra Dashboard e Widget non funzionava correttamente
### Sintomi
```php
// Nel metodo getData() del widget
$startDate = $this->filters['startDate']; // ❌ $this->filters era null
$endDate = $this->filters['endDate'];     // ❌ Causava errori PHP
```
## Soluzione Implementata
###

### `filament/widgets/edit-user-widget.md` — EditUserWidget: Widget generico per la modifica dati utente


# EditUserWidget: Widget generico per la modifica dati utente

## Scopo e filosofia
Il widget `EditUserWidget` è progettato per essere **completamente generico e riutilizzabile** in qualsiasi progetto che utilizza il modulo User. È il complemento del `RegistrationWidget` per la modifica dei dati utente esistenti. Non contiene logica di dominio specifica (es. Doctor, Patient, ecc.), ma si limita a:
- raccogliere i dati dal form di modifica,
- determinare dinamicamente la risorsa, il modello e l'action da eseguire,
- delegare la logica di aggiornamento a una UpdateUserAction specifica del modulo che implementa il tipo di utente.
## Pattern di delega
- Il widget riceve il tipo di utente (`$type`) e opzionalmente un `$userId` per identificare l'utente da modificare.
- Se non viene fornito un 

### `filament/widgets-responsive-layout.md` — Widget Responsivi per Form di Registrazione


# Widget Responsivi per Form di Registrazione

> **NOTA IMPORTANTE**: Questo documento è un riferimento specifico per il modulo User.
> La documentazione principale e completa si trova nel [modulo UI](../../../UI/docs/blocks/filament-component-integration.md#layout-responsivo-dei-widget-filament).
> La documentazione principale e completa si trova nel [modulo UI](../../../UI/project_docs/blocks/filament-component-integration.md#layout-responsivo-dei-widget-filament).
## Problema
Il form di registrazione alla rotta `/it/auth/patient/register` appare troppo stretto orizzontalmente, con un'esperienza utente non ottimale sui dispositivi desktop e altri schermi ampi.
## Causa
Il template `Themes/One/resources/views/filament/widgets/registration.blade.php` utilizzato dal `RegistrationWidget` ut

### `filament-5-panel-governance-rule.md` — Filament 5 Panel Governance Rule


# Filament 5 Panel Governance Rule

## Fonte

Studio basato su:

- repository ufficiale `filamentphp/filament` ramo `5.x`
- plugin ufficiale `filamentphp/spatie-laravel-google-fonts-plugin`

## Regole operative

### 1. Panel provider come punto di governo

Config di panel, plugin, branding, font, auth e navigation devono restare nel `PanelProvider`.

### 2. Form, Table, Action, Schema nei contratti Filament

Se una schermata admin appartiene al panel, va espressa tramite i costrutti Filament previsti dal framework, non con soluzioni parallele improvvisate.


### `filament-5x-compatibility.md` — Filament 5.x compatibility - modulo User


# Filament 5.x compatibility - modulo User

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo User è **compatibile** con Filament 5.x. Nessun breaking change funzionale rispetto a Filament 4.x.

## Note specifiche modulo

- I fix PHPStan per type safety (abstract methods, type comparisons, traits) da Filament 4.x restano validi
- `RegisterWidget` e `LoginWidget` seguono i pattern Livewire/Volt e non dipendono direttamente da API Filament modificate
- Il `BaseUser Model` con alias di estensione resta compatibile

## Regole architetturali

Tutte le classi Filament **devono** estendere le classi `XotBase*`:

| Tipo | Classe base |

### `filament-auth-pages-exceptions.md` — Eccezioni Regola XotBase - Pagine Autenticazione


# Eccezioni Regola XotBase - Pagine Autenticazione

## Scopo

Questo documento spiega quando e perché è giustificato estendere direttamente le classi Filament invece di usare XotBase per le pagine di autenticazione.

## Regola Generale

**REGOLA FONDAMENTALE**: MAI estendere classi Filament direttamente. SEMPRE usare classi XotBase.

## Eccezioni Giustificate

### Pagine di Autenticazione Filament Standard

Le seguenti pagine estendono direttamente le classi Filament perché sono pagine di autenticazione standard che non necessitano delle funzionalità aggiuntive di XotBase:

#### 1. Login

```php

### `filament-best-practices.md` — filament-best-practices


See canonical documentation: ../../../Themes/docs/shared-components/filament-best-practices.md

### `filament-charts-implementation.md` — Filament Installation and Chart Widget Implementation Guide


# Filament Installation and Chart Widget Implementation Guide

## Overview

This document provides guidance on implementing Filament 5.x components and ChartWidgets in the User module, following Laraxot architectural patterns and best practices.

## Filament Installation Requirements

The User module follows the standard Filament 5.x installation requirements:
- PHP 8.2+
- Laravel v11.28+
- Tailwind CSS v4.1+
- Filament v5.0+

### Required Dependencies

Install core Filament components:
```bash
composer require filament/filament:"^5.0"

### `filament-components-reference.md` — Riferimento Componenti Filament Verificati


# Riferimento Componenti Filament Verificati

## ⚠️ REGOLA CRITICA: Verificare SEMPRE l'esistenza dei componenti

**IMPORTANTE**: Prima di usare qualsiasi componente Filament, verificare SEMPRE che esista nella documentazione ufficiale o nel codebase esistente.

### Errori da evitare ASSOLUTAMENTE
- ❌ `x-filament::layouts.card` - NON ESISTE
- ❌ `x-filament::section` - NON VERIFICATO
- ❌ `x-filament::input.wrapper` - NON VERIFICATO
- ❌ `x-filament::input` - NON VERIFICATO

## Componenti Filament Verificati e Funzionanti

### Componenti Base
- ✅ `x-filament::page` - Layout principale per pagine
- ✅ `x-filament::button` - Pulsanti
- ✅ `x-filament::icon-button` - Pulsanti con icona
- ✅ `x-filament::icon` - Icone

### `filament-filters-and-widgets.md` — Filament 4 — filtri pagina e widget (lezioni apprese)


# Filament 4 — filtri pagina e widget (lezioni apprese)

- Pagina: usare `HasFiltersForm` e renderizzare lo schema in Blade con `{{ $this->getFiltersForm() }}`.
- Widget: usare `InteractsWithPageFilters` e impostare `protected static bool $isLazy = false`.
- Proprietà `$view` del Widget: NON statica in Filament 4 (il parent ha `$view` non static).
- In Blade del widget leggere i valori con `data_get($this->pageFilters, 'startDate')` e `data_get($this->pageFilters, 'endDate')`.
- Evitare `HasFiltersSchema` in questo caso (serve ai chart widget), e niente `->label()` / `->helperText()`.
- Table filter (`BaseFilter`): su Filament tables ≥ 5.11.2 usare `->form([...])`, non `->schema([...])`
  (vedi story `docs/bmad/stories/phpstan-filter-form-schema.story.md` e nota Xot
  `filament-filter-sch

### `filament-nesting-opportunities.md` — Filament 5.x Nested Resources - Opportunità di Applicazione


# Filament 5.x Nested Resources - Opportunità di Applicazione

**Data Analisi**: [DATE]  
**Versione Filament**: 5.x  
**Documentazione Upstream**: https://filamentphp.com/docs/5.x/resources/nesting

## Scopo del Documento

Questo documento identifica dove e perché applicare il nesting nativo di Filament 5.x nel modulo User per gestire relazioni gerarchiche (User → Team, Team → TeamInvitation, User → Role/Permission).

## Panoramica Filament 5.x Nesting

### Cos'è il Nesting

Il nesting in Filament 5.x permette di creare risorse figlie con pagine complete invece di essere gestite solo tramite modal nei relation managers.

**Vantaggi per User Module**:
- **Gerarchia Chiara**: Riflette relazioni User → Team → Invitations
- **Navigazione Logica**: URL che seguono la gerarchia organizzativa

### `filament-version.md` — Filament Version Declaration — User


# Filament Version Declaration — User

**Current Version**: Filament v5 (Livewire v4 + Schemas)

This module/theme is developed against **Filament v5**.

All resources, forms, tables, infolists, widgets and actions must follow the v5 + XotBase patterns documented in:

- `docs/wiki/rules/filament-rules-summary.md`
- `docs/wiki/memories/filament-version-policy.md`
- `laravel/Modules/Xot/docs/filament-5-laraxot-rules.md`

**Legacy v4 documents** in this folder (if any) are historical only and must not be used as current reference.

**Last verified**: 2026-05-21

**Firmato:** Cursor Agent (Composer) — template propagato ai package `docs/`

### `filament.md` — Filament nel Modulo User


# Filament nel Modulo User

## Documentazione

1. [Migrazione Filament 4](filament4-migration.md) - Guida completa alla migrazione da v3 a v4
2. [Errori Comuni](filament-errors.md) - Documentazione degli errori comuni e delle loro soluzioni
3. [Struttura delle Risorse](structure.md#filament-resources) - Come sono strutturate le risorse Filament
4. [Best Practices](filament-errors.md#best-practices) - Best practices per lo sviluppo con Filament

## Risorse

- UserResource
  - TeamsRelationManager
  - RolesRelationManager
  - PermissionsRelationManager
- TeamResource
- RoleResource
- PermissionResource


### `filament4-migration.md` — 🔄 Migrazione da Filament 3 a Filament 4


# 🔄 Migrazione da Filament 3 a Filament 4

## Panoramica

Questo documento descrive le modifiche apportate durante la migrazione da Filament 3 a Filament 4, con particolare attenzione ai problemi di layout e visualizzazione.

## 🚨 Problemi Risolti

### 1. Logo Duplicato nella Pagina di Login

**Problema**: Dopo la migrazione, il logo appariva due volte nella pagina di login (`/admin/login`).

**Causa**: 
- Filament 4 ha cambiato la struttura delle pagine di autenticazione
- Il sistema aveva sia il logo nativo di Filament che un logo personalizzato
- La configurazione del pannello non era aggiornata per Filament 4

**Soluzione**:
1. **Creata view personalizzata**: `resources/views/vendor/filament-panels/auth/pages/login.blade.php`

### `filaments.md` — Errori Comuni Filament nel Modulo User


# Errori Comuni Filament nel Modulo User

## Errori di Metodi Statici

### 1. getTableColumns() non può essere statico in RelationManager

**Errore:**
```php
Cannot make non static method Filament\Resources\RelationManagers\RelationManager::getTableColumns() static in class Modules\User\Filament\Resources\UserResource\RelationManagers\TeamsRelationManager
```

**Causa:**
Il metodo `getTableColumns()` è definito come non statico nella classe base `RelationManager` di Filament, quindi non può essere dichiarato come statico nelle classi che lo estendono.

**Soluzione:**
Rimuovere il modificatore `static` dal metodo:

```php
// ❌ ERRATO

### `file-naming-rules.md` — file-naming-rules


See canonical documentation: ../../../Themes/docs/shared-components/file-naming-rules.md

### `file-naming.md` — Regole di Naming per File


# Regole di Naming per File

## 🎯 Regola Fondamentale: NO Duplicati Case-Insensitive

### Problema

Su filesystem case-insensitive (Windows, macOS default), file con nomi che differiscono solo per maiuscole/minuscole causano conflitti:

```
❌ ERRATO - Duplicati case-insensitive:
- README.md e README.md
- Activity.php e activity.php
- listrecords.md e listrecords.md
```

### Soluzione

**Mantenere SOLO la versione con naming corretto secondo le convenzioni:**


### `filosofia-modulo-user.md` — Analisi Approfondita del Modulo User


# Analisi Approfondita del Modulo User

> **Generato**: 2025-12-24
> **Scopo**: Documentare la filosofia, logica, business logic e architettura del modulo User

---

## 1. LOGICA - Come Funziona il Sistema

### Sistema di Autenticazione

**Laravel Passport Integration**
- Token OAuth2 per API authentication
- Token expiration: 1 giorno (access), 30 giorni (refresh), 6 mesi (personal access)
- Scopes definiti: `view-user`, `core-technicians`
- Modelli OAuth: `OauthAccessToken`, `OauthClient`, `OauthRefreshToken`, `OauthAuthCode`, `OauthPersonalAccessClient`

**Multi-Guard Authentication**
- Guard principale: `web` (coerente con Spatie Permission)

### `final-summary.md` — Final Summary - User Module Passport Integration & Architecture Refactoring


# Final Summary - User Module Passport Integration & Architecture Refactoring

> **Date**: 2026-01-07
> **Status**: ✅ COMPLETED
> **PHPStan**: Level MAX (22 minor errors in Filament array keys - cosmetic)
> **Documentation**: 119,067 lines total

---

## 📊 Executive Summary

Completed comprehensive analysis, refactoring, and documentation of the User module's Laravel Passport integration and ServiceProvider architecture. All work follows the **Module-First**, **DRY**, and **Single Responsibility Principle** philosophies.

---

## 🎯 Objectives Achieved

### 1. ✅ Passport Integration Documentation
- Created `PASSPORT_INTEGRATION.md` (569 lines)

### `final.md` — Final Summary - User Module Passport Integration & Architecture Refactoring


# Final Summary - User Module Passport Integration & Architecture Refactoring

> **Date**: [DATE]
> **Status**: ✅ COMPLETED
> **PHPStan**: Level MAX (22 minor errors in Filament array keys - cosmetic)
> **Documentation**: 119,067 lines total

---

## 📊 Executive Summary

Completed comprehensive analysis, refactoring, and documentation of the User module's Laravel Passport integration and ServiceProvider architecture. All work follows the **Module-First**, **DRY**, and **Single Responsibility Principle** philosophies.

---

## 🎯 Objectives Achieved

### 1. ✅ Passport Integration Documentation
- Created `PASSPORT_INTEGRATION.md` (569 lines)

### `fix-ide-helper-relation-errors.md` — Fix IDE Helper Relation Errors


# Fix IDE Helper Relation Errors

## Scopo

Allineare i wrapper Passport del modulo User a `php artisan ide-helper:models` **senza** introdurre relazioni synthetic o violare il model canonico `OauthToken`.

## Problem Statement (wave 2026-07-15)

```bash
cd laravel && php artisan ide-helper:models --no-interaction
```

Segnalazioni:

- `Error resolving relation model of Modules\User\Models\OauthAccessToken:user() : Attempt to read property "provider" on null`
- `Error resolving relation model of Modules\User\Models\OauthToken:user() : Attempt to read property "provider" on null`

### Perché accade (scopo Passport)


### `fix-profile-id-uuid.md` — Profile: id autoincrement + colonna uuid


# Profile: id autoincrement + colonna uuid

## Regola architetturale
- **id**: bigint autoincrement (uso interno, join, performance MySQL)
- **uuid**: char(36) unique (Android, PostgreSQL, API esterne, sync multi-DB)

L'uuid evita di esporre id sequenziali nelle API e permette identificazione stabile tra MySQL e PostgreSQL.

## Schema
```php
$table->id();
$table->uuid('uuid')->unique()->after('id');
```

## Modello BaseProfile
- `id` non in fillable (autoincrement)
- `uuid` generato in `booted()` con `Str::uuid()` alla creazione
- Per API/Android: usare `Profile::where('uuid', $uuid)->first()`


### `fixes/phpstanes.md` — phpstanes


See canonical documentation: ../../../../Themes/docs/shared-components/phpstan-fixes-Modules.md

### `fixes-user-module-phpstan.md` — Correzioni PHPStan per il Modulo User


# Correzioni PHPStan per il Modulo User

## Panoramica

Questo documento descrive le correzioni implementate per risolvere gli errori PHPStan livello 9 nel modulo User, riducendo gli errori da migliaia a 94 errori specifici.

## Errori Risolti

### 1. Eventi con Costruttori che Hanno Tipo di Ritorno

**Problema**: Tutti gli eventi del modulo User avevano costruttori con tipo di ritorno `void`, che non è permesso in PHP.

**File Corretti**:
- `app/Events/AddingTeam.php`
- `app/Events/AddingTeamMember.php`
- `app/Events/InvalidState.php`
- `app/Events/InvitingTeamMember.php`
- `app/Events/Login.php`
- `app/Events/NewPasswordSet.php`

### `folio-volt-best-practices.md` — folio-volt-best-practices


See canonical documentation: ../../../Themes/docs/shared-components/folio-volt-best-practices-Modules.md

### `form-column-parity.md` — Parita' Forms/Components ↔ Tables/Columns (User)


# Parita' Forms/Components ↔ Tables/Columns (User)

Regola piattaforma: vedi [Ptv/form-column-parity.md](../../Ptv/docs/form-column-parity.md).

## Mappa corrente

| Forms/Components | Tables/Columns |
|---|---|
| `UserSection` | `UserColumn` |
| `SingleRoleSelect` | `SingleRoleSelectColumn` |

## Verifica

`Modules/User/tests/Unit/Filament/Tables/Columns/FormColumnParityTest.php`

### `front-office-auth-production-audit.md` — User front-office authentication production audit


# User front-office authentication production audit

The User module owns login, registration, email verification, password recovery, OAuth callbacks, logout and the authenticated session boundary used by Sixteen.

## Current evidence

- The verification page uses a reusable loading state on the resend action: disabled button, `aria-busy`, scoped Livewire target, visible status text and a Filament loading indicator.
- OAuth callback persistence queries `socialite_users` on the `user` connection. Deployment must run the User migrations against that connection before enabling Google or other providers.
- Email verification and password recovery must be tested with the configured non-placeholder sender domain; Mailtrap pending accounts reject cross-domain recipients.
- The isolated authentic

### `front-office-privacy-avatar-password-reset.md` — Front office: avatar senza siti terzi, profilo pubblico, reset password

# Front office: avatar senza siti terzi, profilo pubblico, reset password

Decisioni prese con l'audit del front office di LaravelPizza (12/11/2026). Valgono per ogni progetto che usa
il modulo; quelle legate a un'impostazione si attivano dalla configurazione del tenant.

## Avatar: Gravatar si può spegnere

`BaseProfile::getAvatarUrl()` restituisce, in ordine: la foto caricata (media `avatar`), l'URL Gravatar
dell'email, oppure stringa vuota. Gravatar è una richiesta a un sito terzo che riceve l'IP del visitatore a
ogni pagina: con

```php
// config/local/<tenant>/xra.php
'gravatar' => false,
```

il metodo restituisce stringa vuota e le viste mostrano le **iniziali** (generate in Blade, nessuna
richiesta). LaravelPizza lo tiene spento perché la cookie policy promette zero richieste a ter

### `fullcalendar-schedulerocumentation.md` — FullCalendar Scheduler - Documentazione Completa


# FullCalendar Scheduler - Documentazione Completa

## Panoramica
Questa documentazione fornisce una guida completa per la gestione delle licenze FullCalendar Scheduler nel progetto , basata sulla ricerca approfondita della documentazione ufficiale e dei problemi comuni riscontrati nella community.
Questa documentazione fornisce una guida completa per la gestione delle licenze FullCalendar Scheduler nel progetto <nome progetto>, basata sulla ricerca approfondita della documentazione ufficiale e dei problemi comuni riscontrati nella community.
## Documenti Disponibili
### 📚 Documentazione Principale
#### 1. [FullCalendar Scheduler Troubleshooting](./fullcalendar-scheduler-license-troubleshooting.md)
**Documento principale** - Guida completa e dettagliata che copre:
- Tipi di licenza dispon

### `gdpr/compliance.md` — GDPR Compliance


# GDPR Compliance

## Cookie Consent Plugins

- [Laravel Cookies Consent Plugin - Make your Laravel app compliant with the EU GDPR cookie law](https://github.com/scify/laravel-cookies-consent)
- [Make your Laravel app compliant with the EU GDPR cookie law](https://codebrisk.com/blog/make-your-laravel-app-compliant-with-the-eu-gdpr-cookie-law)

## Example Pages

### Privacy Policy Examples

- <https://laravel.io/privacy>
- <https://laravelarticle.com/page/privacy-policy>
- <https://www.laravelecommerce.com/privacypolicy.php>
- <https://www.laravelwizard.com/privacy-policy>
- <https://backpackforlaravel.com/privacy-policy>
- <https://flareapp.io/privacy-cookie-policy>
- <https://procontent.renewedvision.com/privacy>


### `gdpr-register-enhancement.md` — GDPR Register Widget Enhancement 2025


# GDPR Register Widget Enhancement 2025

## 🎯 Overview

Enhanced the RegisterWidget with full GDPR compliance following 2025 best practices, implementing granular consent, privacy by design, and comprehensive audit trails.

## 📋 Implemented Features

### 1. **Granular Consent System**
- **Required Consents**: Privacy Policy, Terms & Conditions, Data Processing
- **Optional Consents**: Marketing, Profiling, Analytics, Third Party sharing
- **Clear Separation**: Required consents in dedicated section, optional in separate section
- **Individual Tracking**: Each consent stored separately with timestamps

### 2. **Privacy by Design & Default**
- **Opt-in Only**: No pre-ticked checkboxes (GDPR requirement)
- **Clear Labels**: Detailed explanations for each consent type
- **Helper Text**: Legal

### `gdpr.md` — gdpr


See canonical documentation: ../../../Themes/docs/shared-components/gdpr.txt

### `get-new-password-action-business-logic.md` — GetNewPasswordAction - Business Logic Analysis


# GetNewPasswordAction - Business Logic Analysis

## Overview
Analisi della business logic per la generazione automatica di nuove password utente nel sistema.

## File Analizzato
`Modules/User/app/Actions/User/GetNewPasswordAction.php`

## Business Logic

### Scopo Principale
L'`GetNewPasswordAction` è responsabile della generazione sicura di nuove password per gli utenti, utilizzando algoritmi di generazione pronunciabili e aggiornamento sicuro nel database.

### Funzionalità Core

#### 1. **Generazione Password Sicura**
```php
[$password, $password_hash] = once(function () {
    $password = app(\Modules\Xot\Actions\String\GetPronounceablePasswordAction::class)->execute();

### `git-conflict-resolution-1.md` — git_conflict_resolution - User


# git_conflict_resolution - User

## Overview

Documentazione per git_conflict_resolution nel modulo User.

## Dettagli

[Da completare]

## Collegamenti

- [Modulo Principale](../README.md)


### `git-multi-org-sync-handoff.md` — Handoff — multi-org sync (STORY-003)


# Handoff — multi-org sync (STORY-003)

## Scopo

Allineare questo owner ai remote raggiungibili (**0 0**, working tree clean) e documentare decisioni di sessione 2026-07-21.

## Perché

Un tree dirty o un remote dietro/avanti **non** è sincronizzato, anche se l’altro org è a posto. Su PTVX i path vivono in `gitmodules.ini` con org `provtv` (+ `laraxot` se esiste).

## Link

| Tipo | URL |
|------|-----|
| Issue owner | https://github.com/provtv/module_user_fila5/issues/16 |
| Discussion | https://github.com/provtv/base_ptv_fila5/discussions/204 |
| Hub base issue | https://github.com/provtv/base_ptv_fila5/issues/203 |
| Hub base discussion | https://github.com/provtv/base_ptv_fila5/discussions/204 |
| Story monorepo | `docs/stories/STORY-003-multi-org-sync-geo-boundary-bashscripts.md` |

### `git-path-does-not-have-our-version-fix.md` — Fix: path does not have our version (rebase/merge)


# Fix: path does not have our version (rebase/merge)

## Stato: ✅ RISOLTO

I file sono stati aggiunti correttamente nel commit `43418fb`:
- `OauthAccessTokenResource.php`
- `Pages/CreateOauthAccessToken.php`
- `Pages/EditOauthAccessToken.php`
- `Pages/ListOauthAccessTokens.php`
- `Pages/ViewOauthAccessToken.php`

## Errore (storico)

```
error: path 'app/Filament/Clusters/Passport/Resources/OauthAccessTokenResource/Pages/EditOauthAccessToken.php' does not have our version
error: path 'app/Filament/Clusters/Passport/Resources/OauthAccessTokenResource/Pages/ListOauthAccessTokens.php' does not have our version
error: path 'app/Filament/Clusters/Passport/Resources/OauthAccessTokenResource/Pages/ViewOauthAccessToken.php' does not have our version
```


### `git-reset.md` — !/bin/sh


#!/bin/sh
set -e
git config -f .gitmodules --get-regexp '^submodule\..*\.path$' |
    while read path_key path
    do
        url_key=$(echo $path_key | sed 's/\.path/.url/')
        url=$(git config -f .gitmodules --get "$url_key")
        echo $path
        echo $url
        
        
        
        git submodule add -f $url $path  
    done
    

### `git-resolution.md` — Gestione Avanzata dei Conflitti Git


# Gestione Avanzata dei Conflitti Git

## Approccio Sicuro alla Risoluzione dei Conflitti

### 1. Strategie di Prevenzione

```bash

# Pre-commit hook per verificare conflitti potenziali
git diff --check

# Aggiornamento regolare del branch
git fetch origin
git rebase origin/main

# Verifica dello stato prima del merge
git status
git diff origin/main...HEAD
```

### `glossary.md` — Glossario di dominio User

# Glossario di dominio User

<!-- Le parole del dominio e dove stanno nel codice. Topology di AGENTS.md punta qui.
     Un termine per riga; se glossario e codice non coincidono, vale il codice e si corregge il glossario. -->

| Termine | Significato | Nel codice |
|---|---|---|
| <!-- termine --> | <!-- cosa vuol dire per il business, con unità e stati se servono --> | <!-- classe, colonna, rotta --> |
---
title: "Glossario di dominio User"
type: glossary
owner: User
updated: 2026-11-24
qmd: "glossario User identità SPID CIE ruolo permesso team tenant token Passport OTP"
---

# Glossario di dominio User

Se glossario e codice divergono vale il codice. Percorsi relativi a `laravel/Modules/User/` salvo indicazione.


### `guida-migrazione-step-by-step.md` — Guida Migrazione Step-by-Step: Modulo User - Filament 4


# Guida Migrazione Step-by-Step: Modulo User - Filament 4

## Panoramica Migrazione
**Modulo**: User (Modulo Critico)
**Complessità**: ⭐⭐⭐⭐⭐ MASSIMA
**Tempo Stimato**: 35-45 giorni
**Rischio**: CRITICO (autenticazione di sistema)
**Priorità**: 1 (PRIMO modulo da migrare - base per tutti gli altri)

## Pre-requisiti Assoluti
- [x] Backup completo database utenti
- [x] Ambiente di staging identico a produzione
- [x] Team dedicato (3+ developer senior)
- [x] Piano rollback testato
- [x] Finestra di manutenzione approvata

## Fase 1: Analisi Rischi e Backup Completo (Giorni 1-3)

### 1.1 Audit Completo Sistema Autenticazione

### `hasteams-traituplicate-methods.md` — Analisi metodi duplicati in HasTeams (trait)


# Analisi metodi duplicati in HasTeams (trait)

## Introduzione
Nel trait `HasTeams` sono presenti diversi metodi con lo stesso nome ma implementazioni differenti. Questo documento elenca i metodi in ordine alfabetico, individua i duplicati e fornisce criteri oggettivi per decidere quale versione mantenere in fase di refactor.

## Elenco metodi (in ordine alfabetico)

- allTeams()
- belongsToTeam()
- belongsToTeams()
- canAddTeamMember()
- canCreateTeam()
- canDeleteTeam()
- canLeaveTeam()
- canManageTeam()
- canRemoveTeamMember()
- canUpdateTeam()
- canUpdateTeamMember()
- canViewTeam()

### `header-auth-button.md` — Header Auth Button - User Module


# Header Auth Button - User Module

## Overview

Il bottone di autenticazione nell'header deve essere dinamico:
- **Guest**: Mostra bottone "Accedi" che porta alla pagina login
- **Authenticated**: Mostra dropdown con profilo/logout

## Posizione

```
Modules/User/resources/views/components/ui/app/
└── auth-button.blade.php
```

## Struttura Componente

```blade
@php

### `header-components-componenti.md` — Componenti Header


# Componenti Header

## Struttura e Convenzioni

### 1. Posizione dei Componenti
```laravel/Themes/One/resources/views/components/blocks/
├── navigation/
│   ├── language-switcher.blade.php    # Selettore lingua
│   ├── user-dropdown.blade.php        # Dropdown utente
│   └── avatar.blade.php              # Componente avatar
```

### 2. Convenzioni di Naming
- I componenti devono seguire il pattern `kebab-case`
- I nomi dei file devono essere descrittivi e in inglese
- I componenti devono essere autocontenuti e riutilizzabili

### 3. Struttura Componenti


### `header-components.md` — Componenti Header


# Componenti Header

## Struttura e Convenzioni

### 1. Posizione dei Componenti
```laravel/Themes/One/resources/views/components/blocks/
├── navigation/
│   ├── language-switcher.blade.php    # Selettore lingua
│   ├── user-dropdown.blade.php        # Dropdown utente
│   └── avatar.blade.php              # Componente avatar
```

### 2. Convenzioni di Naming
- I componenti devono seguire il pattern `kebab-case`
- I nomi dei file devono essere descrittivi e in inglese
- I componenti devono essere autocontenuti e riutilizzabili

### 3. Struttura Componenti


### `html2pdf/advanced.md` — advanced


See canonical documentation: ../../../../Themes/docs/shared-components/advanced.md

### `html2pdf/laravel.md` — laravel


See canonical documentation: ../../../../Themes/docs/shared-components/laravel-Modules.md

### `html2pdf/security.md` — security


See canonical documentation: ../../../../Themes/docs/shared-components/security-Modules.md

### `html2pdf/styling.md` — styling


See canonical documentation: ../../../../Themes/docs/shared-components/styling.md

### `html2pdf/usage.md` — usage


See canonical documentation: ../../../../Themes/docs/shared-components/usage-Modules.md

### `ide-helper-models-wave.md` — IDE Helper Models Wave


# IDE Helper Models Wave

## Wave 2026-03-10

### Contesto

```bash
cd laravel && php artisan ide-helper:models -W
```

Il primo run nel sandbox mostrava errori di connessione per model multi-connessione come `Modules\Activity\Models\Activity` e `Modules\Xot\Models\Session`.

### Diagnosi corretta

Il problema iniziale non era nel codice dei model ma nell'accesso al database locale dal sandbox.

Dopo il rerun con accesso DB reale, la wave `ide-helper` ha completato la rigenerazione dei PHPDoc senza classi `Could not analyze`.

### Impatto

### `img/create-user.jpg.md` — create-user.jpg


See canonical documentation: ../../../../Themes/docs/shared-components/create-user.jpg

### `img/create-user.md` — create_user


# create_user

Placeholder per lo screenshot della pagina di creazione utente.

L'asset canonico è previsto in `../../../../Themes/docs/shared-components/create-user.jpg` (ancora da creare).

## Collegamenti

- [Documentazione User](../../README.md)

### `img/roles-list.jpg.md` — roles-list.jpg


See canonical documentation: ../../../../Themes/docs/shared-components/roles-list.jpg

### `img/roles-list.md` — roles_list


# roles_list

Placeholder per lo screenshot della pagina di gestione ruoli.

L'asset canonico è previsto in `../../../../Themes/docs/shared-components/roles-list.jpg` (ancora da creare).

## Collegamenti

- [Documentazione User](../../README.md)

### `img/set-password.jpg.md` — set-password.jpg


See canonical documentation: ../../../../Themes/docs/shared-components/set-password.jpg

### `img/set-password.md` — set_password


# set_password

Placeholder per lo screenshot della pagina di impostazione password.

L'asset canonico è previsto in `../../../../Themes/docs/shared-components/set-password.jpg` (ancora da creare).

## Collegamenti

- [Documentazione User](../../README.md)

### `implementation-plan.md` — Piano di Implementazione Componenti Header


# Piano di Implementazione Componenti Header

## Fase 1: Setup Struttura

### 1.1 Creazione Directory
```bash
mkdir -p laravel/Themes/One/resources/views/components/blocks/navigation
```

### 1.2 File da Creare
- `navigation/index.blade.php`
- `navigation/language-switcher.blade.php`
- `navigation/user-dropdown.blade.php`
- `navigation/avatar.blade.php`

## Fase 2: Implementazione Componenti

### 2.1 Language Switcher
```blade

### `implementation.md` — Implementation Summary - User Module Type Safety Improvements


# Implementation Summary - User Module Type Safety Improvements

## Overview

This document summarizes the comprehensive type safety improvements implemented in the User module to resolve PHPStan errors and enhance code reliability.

## Issues Identified and Resolved

### 1. View-String Type Issues

**Problem**: PHPStan was reporting errors for static properties `$view` in Widget classes:
```
Static property Modules\User\Filament\Widgets\EditUserWidget::$view (view-string) does not accept default value of type string.
```

**Root Cause**: The Filament Widget base class uses `view-string` in PHPDoc annotations but declares the property as `string`.

**Solution**:
- Added proper PHPDoc annotations to maintain type safety

### `import-status.md` — Fix base 2026-08-30 — proprietà `$pivot` che oscurava la relation pivot

## Fix base 2026-08-30 — proprietà `$pivot` che oscurava la relation pivot

`BaseUser` dichiarava `public ?Pivot $pivot = null;`: una proprietà PHP reale
oscura il magic `__get` di Eloquent, quindi **ogni** `belongsToMany` verso User
restituiva modelli con `->pivot === null` (e l'eager loading esplodeva in
`BelongsToMany::buildDictionary` con "Attempt to read property ... on null").
La proprietà è stata rimossa (resta il PHPDoc `@property Pivot|null $pivot`).

Regola generale: mai dichiarare proprietà PHP reali con lo stesso nome di
attributi/relazioni Eloquent — vale per `pivot` come per le colonne.

## Fix suite test User in locale (2026-08-30)

- TestCase: `prepareSharedFixcitySqliteForTesting()` in setUp (ambiente senza
  MariaDB dedicato) + `connectionsToTransact = ['user']` quando de

### `index-2.md` — index-2


See canonical documentation: ../../../Themes/docs/shared-components/00-index-Modules.md

### `index-conflict.md` — User Module Documentation


# User Module Documentation

## Overview
This document serves as the central index for the User module, providing guidance on managing user-related functionality within a Laravel application. The User module handles authentication, authorization, profile management, and related features in a modular and reusable way.

## Key Principles
1. **Modularity**: The User module is designed to be reusable across different projects, maintaining generic functionality.
2. **Extensibility**: Allows for customization and extension to meet specific project needs without altering core code.
3. **Security**: Implements best practices for authentication, session management, and data protection.

## Core Features
- **Authentication**: Handles user login, logout, and session management.
- **Authorization**: 

### `intelligent-login-redirect.md` — Redirect Intelligente dopo Login - Soluzione Implementata


# Redirect Intelligente dopo Login - Soluzione Implementata

## 🚨 Problema Risolto

**Errore**: `Route [filament.admin.pages.dashboard] not defined`
**Causa**: `redirect()->intended()` tentava di reindirizzare a una route inesistente
**Soluzione**: Implementato redirect intelligente basato sui ruoli dell'utente

## 📋 Analisi del Problema

### Errore Originale
```php
// ❌ PROBLEMATICO - Route inesistente
return redirect()->intended();
```

### Problemi Identificati
1. **Route Inesistente**: `filament.admin.pages.dashboard` non definita
2. **Redirect Generico**: Non considerava i ruoli dell'utente

### `investigation/investigation.md` — Investigation: Teams & Roles

# Investigation: Teams & Roles

## Problem Statement
Analisi delle feature mancanti nel modulo User.

## Current State
- Documentazione esistente: 101 stories
- Architettura: Actions,Adapters,Application,Console,Contracts,Datas,Enums,Events,Exceptions,Facades,Filament,Http,Listeners,Livewire,Mail,Models,Notifications,Observers,Policies,Providers,Rules,Support,Traits,View,helpers.php,

## Feature Missing
1. Feature A - descrizione
2. Feature B - descrizione
3. Feature C - descrizione

## Proposed Solution
- Implementare le feature A/B/C usando le regole BMAD
- Seguire: no controller, no services layer, module providers manifest

## Acceptance Criteria
- [ ] APCA contrast ≥75 body, ≥45 large-bold

### `jetstream-vs-laraxot.md` — Jetstream vs Laraxot: Filosofia, Religione e Politica dei Team


# Jetstream vs Laraxot: Filosofia, Religione e Politica dei Team

## 🌟 **LA RELIGIONE JETSTREAM**

### Principi Fondamentali di Jetstream
1. **Semplicità Elegante**: "Convention over Configuration" al massimo livello
2. **Ownership Chiaro**: Ogni team ha un proprietario (`owner`) e membri (`users`)
3. **Context Switching**: L'utente può cambiare contesto tra team (`current_team_id`)
4. **Personal Team**: Ogni utente ha automaticamente un team personale
5. **Role-Based Access**: Sistema di ruoli e permessi granulare
6. **Action-Driven**: Logica business separata in Actions dedicate

### Architettura Jetstream
```php
// JETSTREAM PHILOSOPHY: Semplice ed Elegante
public function teams()
{
    return $this->belongsToMany(Jetstream::teamModel(), Jetstream::membershipModel())
                ->

### `jpgraph-integration.md` — Integrazione di JpGraph nel Modulo User


# Integrazione di JpGraph nel Modulo User

## Installazione Composer e namespace

L’installazione di JpGraph e l’uso dei namespace sono documentati nel **modulo Chart**. Nel progetto si usa il pacchetto **amenadiel/jpgraph** con namespace **Amenadiel\JpGraph\*** (non `JpGraph\*`).

- [Chart: JpGraph Composer e namespace](../../chart/docs/jpgraph-composer-and-namespaces.md)
- [Chart: JpGraph Installation](../../chart/docs/jpgraph-installation.md)

In sintesi: dalla root Laravel `cd laravel && composer require amenadiel/jpgraph` (o `composer update`); nelle classi usare `Amenadiel\JpGraph\Graph\Graph`, `Amenadiel\JpGraph\Plot\BarPlot`, ecc. Il modulo User non dichiara JpGraph in `composer.json`; usa le Actions del modulo Chart per la generazione grafici.

## Indice

1. [Panoramica](#panoram

### `json.md` — json


See canonical documentation: ../../../Themes/docs/shared-components/json.md

### `jss.md` — Risoluzione dei Conflitti nei File JavaScript del Modulo User


# Risoluzione dei Conflitti nei File JavaScript del Modulo User

## Problema

Sono stati identificati conflitti Git nei seguenti file JavaScript del modulo User:

1. `resources/js/bootstrap.js`
2. `resources/js/app.js`

Questi file presentano multiple occorrenze di marker di conflitto Git  che rendono il codice non utilizzabile e causano errori di sintassi.

## Analisi dei Conflitti

### bootstrap.js

Il file presenta conflitti tra diverse versioni del bootstrap JavaScript:

1. Una versione minima che importa solo Axios
2. Una versione completa che include anche i commenti e la configurazione per Laravel Echo (commentata)

### `label-hardcoded-prevention.md` — Prevenzione ->label() Hardcoded - Modulo User


# Prevenzione ->label() Hardcoded - Modulo User

## 🚨 **REGOLA ASSOLUTA**

**MAI** usare `->label()` con stringhe hardcoded. **SEMPRE** usare le traduzioni.

## ❌ **VIETATO - MAI FARE**

```php
// ❌ ERRORE CRITICO - MAI FARE
TextInput::make('name')
    ->label('Nome'),

Select::make('status')
    ->label('Stato'),

Toggle::make('active')
    ->label('Attivo'),
```

### `lang/en/auth.md` — File di Traduzione Inglese per l'Autenticazione


# File di Traduzione Inglese per l'Autenticazione

## Panoramica
Questo file contiene le traduzioni in inglese per tutte le stringhe relative al sistema di autenticazione dell'applicazione.
## Sezioni Principali
### Login
- Titolo e sottotitolo della pagina di accesso
- Campi per email e password
- Opzioni per "Ricordami" e "Password dimenticata"
- Link per la registrazione
### Registrazione
- Titolo e sottotitolo della pagina di registrazione
- Campi per nome completo, email e password
- Conferma password
- Link per il login se già registrati
### Recupero Password
- Titolo e sottotitolo della pagina di recupero
- Campo per l'email
- Pulsante per inviare il link di reset

### `laravel-13-auth-composer-notes.md` — Laravel 13 auth Composer notes


# Laravel 13 auth Composer notes

## Purpose

Document the User module ownership rules for Laravel 13 Composer migration.

## Ownership

Authentication, OAuth, Passport, teams, permissions, and user-account packages belong in `Modules/User/composer.json`, not in `laravel/composer.json`.

The root composer remains minimal and only coordinates Laravel, Laravel Modules, and the merge plugin.

## Laravel 13 constraints

`laravel/passport` should be constrained to a Laravel 13 compatible line. The current second-brain note for Passport uses:

```bash
composer require laravel/passport "^13.4"
```

### `laravel-13-upgrade.md` — Upgrade Laravel 13 - User 🐄✨


# Upgrade Laravel 13 - User 🐄✨

## 🎯 Visione Architetturale
L'upgrade a Laravel 13 per il modulo **User** non è un mero aggiornamento tecnico, ma un atto di purificazione zen. Seguendo i dettami della **Super Mucca**, ogni riga di codice è stata meditata per raggiungere la massima indipendenza.

## 🧘 Principi Applicati
1.  **Isolamento (SOLID)**: Il modulo dichiara ora esplicitamente le proprie dipendenze, riducendo l'accoppiamento con il core.
2.  **Semplicità (KISS)**: Rimossi i wrapper obsoleti e le dipendenze ridondanti.
3.  **Memoria (Documentation)**: Questo documento funge da memoria persistente dell'evoluzione del modulo.

## 🛠️ Modifiche Eseguite
- [x] **PHP ^8.4**: Allineamento ai requisiti di Laravel 13.
- [x] **composer.json**: Aggiornato con `laravel/framework: ^13.0` e `nwid

### `launch-plan.md` — Product Launch Plan: User Module v1.0


# Product Launch Plan: User Module v1.0

## 🚀 Launch Overview
- **Launch Date:** March 2026
- **Launch Lead:** @CoreTeam

## 🎯 Launch Goals
- Deploy a stable auth system that integrates with all 34 Laraxot modules.
- Complete the migration of legacy user data.

## 📣 Messaging & Positioning
- **Value Proposition:** Secure, centralized identity management for modular applications.
- **Key Pillars:** Spatie Integration, Granular Permissions, Ready-to-use.

## 📈 Post-Launch Tracking
Monitor login success rates and permission check latency.

### `lfs-resolution-28.md` — LFS Corruption Resolution (2026-07-28)


# LFS Corruption Resolution (2026-07-28)

## Problem

Git push failed with error:
```
remote: error: GH008: Your push referenced at least 11 unknown Git LFS objects
```

### Root Cause
- 11 image files were tracked via Git LFS (Large File Storage)
- LFS objects were missing from local filesystem (not downloaded/synced)
- GitHub pre-receive hook rejected push because LFS objects couldn't be verified
- Files affected: docs/img/*.jpg, docs/screenshots/*.png, resources/favicon.png, resources/img/*.png

### Why LFS Objects Were Corrupted
LFS objects can become missing when:
1. Working tree is fresh-cloned but LFS objects not downloaded (missing `git lfs pull`)
2. LFS tracking rules changed but objects not migrated

### `lfs-resolution.md` — LFS Corruption Resolution (2026-07-28)


# LFS Corruption Resolution (2026-07-28)

## Problem

Git push failed with error:
```
remote: error: GH008: Your push referenced at least 11 unknown Git LFS objects
```

### Root Cause
- 11 image files were tracked via Git LFS (Large File Storage)
- LFS objects were missing from local filesystem (not downloaded/synced)
- GitHub pre-receive hook rejected push because LFS objects couldn't be verified
- Files affected: docs/img/*.jpg, docs/screenshots/*.png, resources/favicon.png, resources/img/*.png

### Why LFS Objects Were Corrupted
LFS objects can become missing when:
1. Working tree is fresh-cloned but LFS objects not downloaded (missing `git lfs pull`)
2. LFS tracking rules changed but objects not migrated

### `limesurvey-database-commands.md` — limesurvey-database-commands


See canonical documentation: ../../../Themes/docs/shared-components/limesurvey-database-commands.md

### `limesurveyatabase-commands.md` — Database Analysis Commands and Tools for app_survey


# Database Analysis Commands and Tools for app_survey
# Database Analysis Commands and Tools for quaeris_survey
# Database Analysis Commands and Tools for <nome progetto>_survey

## Essential Database Queries

### 1. Survey Structure Analysis
```sql
-- List all active surveys in the database
SELECT sid, surveyls_title, startdate, expires 
FROM lime_surveys 
WHERE active = 'Y';

-- Get all questions for a specific survey
SELECT q.qid, q.type, q.title, q.question, ql.question as text
FROM lime_questions q
LEFT JOIN lime_question_l10ns ql ON ql.qid = q.qid
WHERE q.sid = [SURVEY_ID]
ORDER BY q.group_order, q.question_order;

### `links.md` — links


See canonical documentation: ../../../Themes/docs/shared-components/links-Modules.txt

### `livewire-filament-parameter-passing.md` — livewire-filament-parameter-passing


See canonical documentation: ../../../Themes/docs/shared-components/livewire-filament-parameter-passing.md

### `livewire-form-statepath-issue.md` — livewire-form-statepath-issue


See canonical documentation: ../../../Themes/docs/shared-components/livewire-form-statepath-issue.md

### `livewire-form-statepath.md` — Problema di Binding nei Componenti Livewire con statePath('data')


# Problema di Binding nei Componenti Livewire con statePath('data')

## Descrizione del Problema
Nel componente di login Livewire (`Modules/User/app/Http/Livewire/Auth/Login.php`), esiste un problema di binding dei dati quando si utilizza `statePath('data')` insieme a campi definiti sia nello schema del form che come input HTML separati.

## Causa Radice
- Il componente utilizza `statePath('data')` per organizzare i dati del form
- I campi sono accessibili come `data.email`, `data.password`, etc.
- Un campo come "remember" era definito sia nello schema del form Filament che come input HTML separato con `wire:model="remember"`
- Questo crea un conflitto nel binding dei dati e può causare errori di validazione

## Esempio di Codice Problema
```php
// Nel componente Livewire
public function 

### `livewire-namespace-2.md` — livewire-namespace-2


See canonical documentation: ../../../Themes/docs/shared-components/livewire-namespace.md

### `livewire-namespace.md` — Regole per i componenti Livewire in Windsurf/Xot


# Regole per i componenti Livewire in Windsurf/Xot

## Namespace corretto

I namespace dei componenti Livewire **NON DEVONO MAI** includere il segmento `app` anche se i file sono fisicamente posizionati nella directory app:

### ✅ CORRETTO
```php
namespace Modules\User\Http\Livewire\Auth;
```

### ❌ ERRATO
```php
namespace Modules\User\App\Http\Livewire\Auth;
```

## Sintesi della regola
La directory `app` è un contenitore fisico, NON un elemento logico del namespace. Questa regola è fondamentale per l'autoloading PSR-4 e la compatibilità con PHPStan.


### `livewire-to-filament-widget-migration.md` — livewire-to-filament-widget-migration


See canonical documentation: ../../../Themes/docs/shared-components/livewire-to-filament-widget-migration.md

### `llm-wiki/_templates/concept.md` — concept


See canonical documentation: ../../../../../Themes/docs/shared-components/concept.md

### `llm-wiki/_templates/entity.md` — entity


See canonical documentation: ../../../../../Themes/docs/shared-components/entity-Modules.md

### `llm-wiki/_templates/source.md` — source


See canonical documentation: ../../../../../Themes/docs/shared-components/source.md

### `logging-performance.md` — Logging Performance Optimization


# Logging Performance Optimization

## Rule: NEVER USE Log::info()

### Impact of Log::info()
- Slows down requests by 30-50%
- Wastes disk space with useless information
- Makes debugging harder with noise
- Each call blocks execution with disk I/O

### What to Use Instead

#### For Errors
```php
Log::error('Payment failed', [
    'order_id' => $order->id,
    'error' => $e->getMessage(),
]);
```

### `login-filament-widget-error.md` — Risoluzione Errori LoginWidget Filament


# Risoluzione Errori LoginWidget Filament

## Introduzione

Questo documento analizza e risolve i problemi comuni riscontrati con il LoginWidget di Filament nel contesto dell'architettura Windsurf/Xot. È essenziale seguire queste linee guida per garantire il corretto funzionamento del widget sia all'interno dei pannelli Filament che quando utilizzato direttamente nelle viste Blade.

## Problema Principale: View Not Found

L'errore più comune è:

```
View [filament.widgets.auth.login] not found.
```

Questo errore si verifica quando il sistema non riesce a trovare la vista del widget nel percorso specificato.

## Cause e Soluzioni

### 1. Dichiarazione Errata della Vista nel Widget

### `login-filament-widget.md` — login-filament-widget


See canonical documentation: ../../../Themes/docs/shared-components/login-filament-widget-error.md

### `login-issue-resolution-report.md` — login-issue-resolution-report


See canonical documentation: ../../../Themes/docs/shared-components/login-issue-resolution-report.md

### `login-resolution.md` — Risoluzione Problema Login - Report Finale (Aggiornato)


# Risoluzione Problema Login - Report Finale (Aggiornato)

## Prologo: La Sfida degli Agenti
Durante il lavoro coordinato tra più agenti AI, è emersa una discrepanza nell'analisi. Un precedente agente ha analizzato il componente `Modules/User/Http/Livewire/Auth/Login.php`, che risultava correttamente configurato. Tuttavia, il problema segnalato dall'utente riguardava la pagina `/it/auth/login` del tema **Sixteen**, che utilizza invece `Modules\User\Filament\Widgets\Auth\LoginWidget::class`.

## Problema Identificato
Il widget `LoginWidget` (e più in generale la classe base `XotBaseWidget`) presentava il metodo `mount()` commentato o assente.

### Analisi Tecnica
In Filament 4 (e v3), i componenti che usano `InteractsWithForms` necessitano di una chiamata a `$this->form->fill()` durante la

### `loginwidget-error-analysis.md` — Analisi Errore LoginWidget: Problema Logico e Soluzione


# Analisi Errore LoginWidget: Problema Logico e Soluzione

## Problema Identificato

Il `LoginWidget` non mostrava errori di credenziali errate a causa di un **errore logico critico** nel metodo `login()` (poi rinominato `save()`).

## Analisi del Problema

### ❌ Codice Problematico (PRIMA)
```php
public function login(): void
{
    $data = $this->form->getState();

    if (Auth::attempt($data)) {
        session()->regenerate();
        redirect()->intended(route('filament.admin.pages.dashboard'));
    }


### `loginwidget.md` — loginwidget


See canonical documentation: ../../../Themes/docs/shared-components/loginwidget-error-analysis.md

### `logout-analysis-1.md` — logout-analysis-1


See canonical documentation: ../../../Themes/docs/shared-components/logout-analysis.md

### `logout-analysis.md` — Analisi del File Logout.blade.php


# Analisi del File Logout.blade.php

## Analisi Attuale

Il file `logout.blade.php` attualmente implementa un componente Volt per la gestione del logout. Ecco un'analisi dettagliata:

### 1. Struttura Attuale
```blade
@volt('auth.logout')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-lg">
        <!-- Contenuto -->
    </div>
</div>
@endvolt

@php
use function Livewire\Volt\{mount};
use Illuminate\Support\Facades\Auth;

### `logout-security-1.md` — logout-security-1


See canonical documentation: ../../../Themes/docs/shared-components/logout-security.md

### `logout-security.md` — Sicurezza nel Processo di Logout


# Sicurezza nel Processo di Logout

## Analisi della Sicurezza

### 1. Vulnerabilità Identificate
- Mancanza di validazione CSRF
- Nessun controllo dell'autenticazione
- Gestione delle eccezioni incompleta
- Possibili attacchi di session hijacking

### 2. Contromisure Implementate

#### 2.1. Validazione CSRF
```php
rules([
    '_token' => ['required', 'string'],
]);
```
- Verifica del token CSRF per ogni richiesta

### `logout.md` — Analisi Errore Logout


# Analisi Errore Logout

## Problema Identificato

Il file `Themes/One/resources/views/pages/auth/logout.blade.php` presenta un errore fondamentale nella sua implementazione:

1. **Errore di Sintassi**:
   - Uso errato della direttiva `@volt` quando il file dovrebbe essere una semplice blade template
   - Il file dovrebbe iniziare con `<?php` per la logica PHP
   - La sintassi Volt non è appropriata per una pagina di logout statica

2. **Errore di Implementazione Widget**:
   - Tentativo di sovrascrivere il metodo `form()` che è dichiarato come `final` in `XotBaseWidget`
   - Implementazione errata dell'estensione del widget base
   - Violazione del principio di ereditarietà

3. **Problemi di Sicurezza**:
   - Gestione manuale delle sessioni non necessaria
   - Validazione CSRF implementa

### `manuale-uso-attori.md` — Manuale d'uso per attori — User

# Manuale d'uso per attori — User

## Scopo e perimetro

Il modulo User gestisce identità, autenticazione web, profilo, ruoli, permessi,
team, tenant associati e accesso ai pannelli Filament. Questo manuale descrive
solo capacità verificabili nel codice installato. Un ruolo, un permesso e
l'accesso a un pannello sono controlli distinti: avere un nome di ruolo seedato
non implica automaticamente la possibilità di eseguire ogni operazione.

## Attori e capacità effettive

| Attore | Capacità verificabili |
|---|---|
| Ospite | Può raggiungere login, registrazione, recupero password e verifica email, secondo configurazione e stato delle rotte. Può avviare il social login solo quando il provider è configurato. Non dispone di profilo, team o permessi autenticati. |
| Utente autenticato | Può ef

### `manuals/manuale-utente.md` — Manuale d'uso per attori — User


> Screenshot reale della pagina di login FixCity, verificato il 23 novembre 2026.

![Screenshot reale](assets/auth-login.png)

# Manuale d'uso per attori — User

## Scopo e perimetro

Il modulo User gestisce identità, autenticazione web, profilo, ruoli, permessi,
team, tenant associati e accesso ai pannelli Filament. Questo manuale descrive
solo capacità verificabili nel codice installato. Un ruolo, un permesso e
l'accesso a un pannello sono controlli distinti: avere un nome di ruolo seedato
non implica automaticamente la possibilità di eseguire ogni operazione.

## Attori e capacità effettive

| Attore | Capacità verificabili |
|---|---|
| Ospite | Può raggiungere login, registrazione, recupero password e verifica email, secondo configurazione e stato delle rotte. Può avviare il social l

### `manuals/user-manual.md` — Manuale utente User


# Manuale utente User

Integra il [manuale actor-oriented](../manuale-uso-attori.md). User gestisce identità, autenticazione, ruoli, permessi e team.

## Attori e uso

| Attore | Uso verificato |
|---|---|
| Utente normale | Accede, aggiorna il profilo e usa le funzioni concesse. |
| Membro/team owner | Usa o amministra il team secondo membership e ruolo. |
| Admin | Gestisce utenti e ruoli nelle risorse autorizzate. |
| Super-admin | Governa l'amministrazione globale secondo policy. |

Il tema non deve duplicare redirect o autorizzazioni di User.

## Evidenza visuale reale

![Pagina reale di login User](../assets/auth-login.png)


### `mcp-configuration.md` — MCP Server Configuration - User Module


# MCP Server Configuration - User Module


**Status**: ✅ Configured
**MCP Servers**: Asana, ClickUp, Filesystem, Database, Redmine (Planned)

---

## 📋 Overview

The User module's MCP configuration enables AI assistants to interact with:
- **Asana Work Graph** - Authentication and authorization task tracking
- **ClickUp Workspace** - Advanced task workflows and time tracking
- **Redmine** - Project management (planned, requires self-hosted instance)
- **Filesystem** - User model and policy file access
- **Database** - User, Role, Permission, Team data inspection

---


### `mcp-database-tools.md` — MCP (Management Control Panel) Tools for Database Analysis


# MCP (Management Control Panel) Tools for Database Analysis

## Overview
MCP (Model Context Protocol) tools provide enhanced capabilities for database analysis, including access to the survey database used in the Limesurvey integration.

## Available MCP Tools for Database Work

### 1. MySQL MCP Server
**Purpose**: Direct MySQL database access using credentials from Laravel .env file
**Configuration**:
```json
{
  "command": "node",
  "args": [
    "/var/www/_bases/base_techplanner_fila5_mono/bashscripts/mcp/mysql-db-connector.js"
  ]
}
```


### `mcp-integration-1.md` — mcp-integration-1


See canonical documentation: ../../../Themes/docs/shared-components/mcp-integration-Modules.md

### `mcp-integration.md` — Integrazione dei Server MCP con il Modulo User


# Integrazione dei Server MCP con il Modulo User

## Panoramica

Questo documento fornisce linee guida per l'integrazione dei server MCP (Model Context Protocol) con il modulo User, seguendo le regole di sviluppo e le convenzioni di codice stabilite per i progetti base_<nome progetto>_fila5_mono.

## Server MCP Consigliati

Per il modulo User, si consigliano i seguenti server MCP:

### 1. Memory

**Scopo**: Memorizzazione delle preferenze degli utenti, sessioni e dati temporanei.

**Casi d'uso**:
- Memorizzazione delle preferenze dell'interfaccia utente
- Gestione delle sessioni utente
- Memorizzazione di dati temporanei dell'utente
- Caching delle informazioni del profilo

### `mcp-server-recommended-2.md` — mcp-server-recommended-2


See canonical documentation: ../../../Themes/docs/shared-components/mcp-server-recommended-Modules.md

### `mcp-server-recommended.md` — MCP Server Consigliati per il Modulo User


# MCP Server Consigliati per il Modulo User

## Scopo del Modulo
Gestione utenti, autenticazione, profili e permessi.

## Server MCP Consigliati
- `memory`: Per sessioni utente e stato temporaneo.
- `filesystem`: Per gestione avatar, documenti e file utente.
- `fetch`: Per integrazione con servizi esterni (es. SSO, OAuth).

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] },
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] }
  }
}

### `mcpatabase-tools.md` — mcpatabase-tools


See canonical documentation: ../../../Themes/docs/shared-components/mcp-database-tools.md

### `membership-autoincrement-fix.md` — membership-autoincrement-fix


See canonical documentation: ../../../Themes/docs/shared-components/membership-autoincrement-fix.md

### `membership-autoincrement.md` — Fix: Duplicate Entry Error in team_user Table - Conversione UUID a Autoincrement


# Fix: Duplicate Entry Error in team_user Table - Conversione UUID a Autoincrement

## Data Intervento
**[DATE]** - Conversione PRIMARY KEY da UUID a autoincrement nella tabella pivot team_user

## Problema Identificato

Errore: `SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '' for key 'PRIMARY'` quando si cerca di associare un team a un utente tramite `AttachAction` di Filament.

### Causa Radice

La tabella `team_user` ha `id` come PRIMARY KEY di tipo UUID (`char(36)`), ma quando Filament `AttachAction` cerca di inserire un nuovo record, Laravel non genera automaticamente l'UUID perché il modello `Membership` ha `$incrementing = true` (default da `BasePivot`), causando un conflitto:

```php
// ❌ ERRATO - Prima della correzione
class Membership extends BasePivot
{

### `membership-uuid-fix.md` — membership-uuid-fix


See canonical documentation: ../../../Themes/docs/shared-components/membership-uuid-fix.md

### `membership-uuid.md` — Fix: Duplicate Entry Error in team_user Table (DEPRECATO)


# Fix: Duplicate Entry Error in team_user Table (DEPRECATO)

> ⚠️ **DEPRECATO**: Questa soluzione è stata sostituita dalla conversione UUID → autoincrement.
> Vedi [membership-autoincrement-fix.md](./membership-autoincrement-fix.md) per la soluzione corretta.

## Data Intervento
**[DATE]** - Correzione gestione UUID nella tabella pivot team_user (SOLUZIONE DEPRECATA)

## Problema Identificato

Errore: `SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '' for key 'PRIMARY'` quando si cerca di associare un team a un utente tramite `AttachAction` di Filament.

### Causa Radice

La tabella `team_user` ha `id` come PRIMARY KEY di tipo UUID (`char(36)`), ma il modello `Membership` aveva `$incrementing = true`, causando un conflitto:

```php
// ❌ ERRATO - Prima della correzio

### `memory-optimization-summary.md` — memory-optimization-summary


See canonical documentation: ../../../Themes/docs/shared-components/memory-optimization-summary.md

### `memory-optimization.md` — User Module - Memory Optimization Summary


# User Module - Memory Optimization Summary

## Problema Risolto
Il pannello admin User (`/user/admin`) aveva elevato utilizzo di memoria, particolarmente a causa dei widget di charts e degli hook Livewire multipli.

## Ottimizzazioni Implementate

### 1. AdminPanelProvider Essenziali
```php
// Modules/User/app/Providers/Filament/AdminPanelProvider.php

/**
 * Risorse essenziali User per ridurre memory usage in production
 */
protected function getEssentialResources(): array
{
    return [
        \Modules\User\Filament\Resources\UserResource::class,
        \Modules\User\Filament\Resources\TeamResource::class,

### `merge-conflict-files-list.md` — merge-conflict-files-list


See canonical documentation: ../../../Themes/docs/shared-components/merge-conflict-files-list.md

### `merge-conflicts-list.md` — merge-conflicts-list


See canonical documentation: ../../../Themes/docs/shared-components/merge-conflicts-list.md

### `metodi-duplicati-analisi.md` — Metodi Duplicati — Analisi User


# Metodi Duplicati — Analisi User

Elenco dei metodi duplicati (cross-file e cross-modulo) che coinvolgono il modulo **User**, estratti dal report globale generato da `/tmp/metodi_duplicati_domain_report.md`.

## Metodo: `via` (14 occorrenze)

**Moduli coinvolti:** Job, Notify, Progressioni, Ptv, User

**File in User:**

- `./laravel/Modules/User/app/Notifications/Auth/Otp.php`

[Riflessione: Presente in 5 moduli diversi — forte candidato per refactoring in trait/modulo Xot o helper condiviso]

---

## Metodo: `getUser` (14 occorrenze)

**Moduli coinvolti:** Notify, User, Xot

### `metodiuplicati-analisi.md` — metodiuplicati-analisi


See canonical documentation: ../../../Themes/docs/shared-components/metodi-duplicati-analisi-Modules.md

### `metrics-dashboard.md` — User Module Metrics Dashboard

# User Module Metrics Dashboard

## Overview
- **Completamento Modulo**: 85%
- **Ultimo Aggiornamento**: 2024-04-01
- **PHPStan Level**: 7 (Target)
- **Coverage Target**: 95%

## Core Features (100%)
| Feature | Status | Coverage | PHPStan | Tests |
|---------|---------|-----------|----------|--------|
| Gestione Utenti | ✅ | 98% | Level 7 | 45/45 |
| Autenticazione | ✅ | 97% | Level 7 | 40/40 |
| Autorizzazione | ✅ | 96% | Level 7 | 35/35 |
| Profili Utente | ✅ | 95% | Level 7 | 30/30 |

## Admin Interface (90%)
| Feature | Status | Coverage | PHPStan | Tests |
|---------|---------|-----------|----------|--------|
| User Management | ✅ | 95% | Level 7 | 25/25 |

### `metricsashboard.md` — User Module Metrics Dashboard


# User Module Metrics Dashboard

## Overview
- **Completamento Modulo**: 85%
- **Ultimo Aggiornamento**: [DATE]
- **PHPStan Level**: 7 (Target)
- **Coverage Target**: 95%

## Core Features (100%)
| Feature | Status | Coverage | PHPStan | Tests |
|---------|---------|-----------|----------|--------|
| Gestione Utenti | ✅ | 98% | Level 7 | 45/45 |
| Autenticazione | ✅ | 97% | Level 7 | 40/40 |
| Autorizzazione | ✅ | 96% | Level 7 | 35/35 |
| Profili Utente | ✅ | 95% | Level 7 | 30/30 |

## Admin Interface (90%)
| Feature | Status | Coverage | PHPStan | Tests |
|---------|---------|-----------|----------|--------|

### `microsoft-oauth-socialite.md` — Microsoft OAuth/Socialite - Analisi e Implementazione


# Microsoft OAuth/Socialite - Analisi e Implementazione

## Riferimenti Studiati

- [Laravel 12 Socialite Login with Microsoft](https://www.itsolutionstuff.com/post/laravel-12-socialite-login-with-microsoft-account-exampleexample.html)
- [Filament Socialite Plugin](https://filamentphp.com/plugins/dododedodonl-socialite)
- [Laravel Socialite Documentation](https://laravel.com/docs/12.x/socialite)
- [Socialite Providers Microsoft](https://socialiteproviders.com/Microsoft/)
- [Laravel Socialite Configure Microsoft Azure](https://dev.to/judicaelg/laravel-socialite-configure-microsoft-azure-16hj)
- [Filament Socialite GitHub](https://github.com/DutchCodingCompany/filament-socialite)
- [Socialment Plugin](https://filamentphp.com/plugins/chrisreedio-socialment)
- [Socialment GitHub](https://gith

### `migration-best-practices.md` — MIGRATION_BEST_PRACTICES - Modulo User


# MIGRATION_BEST_PRACTICES - Modulo User

## Scopo

Definire le regole Laraxot per **tutte le migrazioni del modulo User**, in particolare per tabelle come `users`, `teams`, `team_user`, SSO, permessi, ecc.

Questo documento specializza gli standard generali di `Modules/Xot/docs/migration-standards.md` per la connessione `user`.

## Regole fondamentali

- **Usare sempre `XotBaseMigration`**
  - Tutte le migration devono `return new class extends XotBaseMigration { ... }`.
- **Impostare esplicitamente le proprietà chiave**
  - `protected string $table = 'nome_tabella';`
  - `protected ?string $connection = 'user';`
  - `protected ?string $model_class = Model::class;` (es. `Team::class`, `User::class`)
- **Usare i metodi helper di `XotBaseMigration`**
  - `tableCreate()` per creare tabelle


### `migration-dry-violations-report.md` — User Module Migration Policy - DRY Violations Report


# User Module Migration Policy - DRY Violations Report

## Issue Summary
The User module contains multiple migration violations of the Laraxot philosophy:
- Multiple migrations creating the same table (violates "ONE migration per table" rule)
- DRY principle violations with duplicate table structure definitions

## Affected Tables
The following tables have multiple creation migrations in `/Modules/User/database/migrations/`:

### 1. teams_table
- 2023_01_01_000006_create_teams_table.php
- 2023_01_01_000007_create_teams_table.php
- 2025_05_16_221811_create_teams_table.php
- 2025_05_16_221811_add_owner_id_to_teams_table.php

### 2. roles_table
- 2023_01_01_000011_create_role_has_permissions_table.php
- 2023_01_01_000012_create_roles_table.php

### `migration-duplicate-resolution.md` — migration-duplicate-resolution


See canonical documentation: ../../../Themes/docs/shared-components/migration-duplicate-resolution.md

### `migration-execution-safety.md` — Migration Execution Safety Rule


# Migration Execution Safety Rule

For this repository, migration execution must be non-destructive.

Never use:

- `migrate:fresh`
- `RefreshDatabase`
- `migrate --force`

The correct approach is:

1. identify the canonical `create_<table>_table` migration;
2. modify that file if the schema contract changes;
3. bump the timestamp in the filename;
4. run only the specific migration needed for the target table/database.

This preserves local state, avoids collateral damage across modules, and keeps debugging reproducible.

### `migration-filament.md` — migration-filament


See canonical documentation: ../../../Themes/docs/shared-components/migrazione-filament-4.md

### `migration-fix-tenants.md` — migration-fix-tenants


See canonical documentation: ../../../Themes/docs/shared-components/migration-fix-tenants.md

### `migration-internal.md` — Internal Analysis: Migration Philosophy Approaches


# Internal Analysis: Migration Philosophy Approaches

## 🥊 Philosophical Battle: Two Approaches Clash

### Approach 1: "Comprehensive Cleanup" (The Perfectionist)
**Philosophy**: "Every single duplicate must be found and removed!"
- **Logic**: Scan every file meticulously to find all possible duplicates
- **Business Logic**: Complete migration compliance at all costs
- **Politics**: Zero tolerance for any violations
- **Religion**: Every migration must be perfect
- **Zen**: Perfect code, perfect architecture

### Approach 2: "Pragmatic Resolution" (The Pragmatist) ✅ **WINNER**
- **Logic**: Focus on actual violations, not theoretical ones
- **Business Logic**: Address real issues that impact functionality
- **Politics**: Practical, results-oriented approach
- **Religion**: "If it works and

### `migration-lang-column.md` — Migration Lang Column - User Module


# Migration Lang Column - User Module

## Aggiunta Colonna lang alla Tabella users

La colonna `lang` memorizza la preferenza linguistica dell'utente.

### ✅ Pattern Corretto

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void

### `migration-primary-key-fix.md` — migration-primary-key-fix


See canonical documentation: ../../../Themes/docs/shared-components/migration-primary-key-fix.md

### `migration-priy-key.md` — Fix Primary Key Constraint - team_user Table


# Fix Primary Key Constraint - team_user Table

## Data
[DATE]

## Problema Identificato

### Errore MySQL
```
SQLSTATE[42000]: Syntax error or access violation: 1171
All parts of a PRIMARY KEY must be NOT NULL;
if you need NULL in a key, use UNIQUE instead
```

### Causa Root
Nella migrazione `2023_01_01_000004_create_team_user_table.php`, la colonna `user_id` era definita come `nullable()` ma faceva parte della PRIMARY KEY composita `['team_id', 'user_id']`.

In MySQL, **tutte le colonne che fanno parte di una PRIMARY KEY devono essere NOT NULL**.


### `migration-strategy.md` — migration-strategy


See canonical documentation: ../../../Themes/docs/shared-components/migration-philosophy-strategy.md

### `migration-tenants.md` — 🔧 Migration Fix: create_tenants_table


# 🔧 Migration Fix: create_tenants_table

**File**: `database/migrations/2023_01_01_000008_create_tenants_table.php`
**Module**: User
**Date**: [DATE]
**Status**: ✅ FIX READY

---

## 🚨 LE 4 VIOLAZIONI

### 1. ❌ Extends Migration (NON XotBaseMigration)

```php
// BEFORE - Line 5-9
use Illuminate\Database\Migrations\Migration;
return new class extends Migration
```


### `migration-unicity-rule.md` — migration-unicity-rule


See canonical documentation: ../../../Themes/docs/shared-components/migration-unicity-rule.md

### `migration.md` — migration


See canonical documentation: ../../../Themes/docs/shared-components/migration-philosophy.md

### `migrationry-violations.md` — migrationry-violations


See canonical documentation: ../../../Themes/docs/shared-components/migration-dry-violations-report.md

### `migrations.md` — User Module — Migrations & Schema Parity


# User Module — Migrations & Schema Parity

## Philosophy

**One model → One migration → One seeder → One factory**

All models in User module must maintain 1:1:1:1 parity with migrations, seeders, and factories. This ensures:
- Single source of truth for schema
- Forward-only migrations (no rollbacks)
- Complete audit trail (created_by, updated_by, deleted_by)
- Consistent data generation (seeder/factory pair)

---

## Models & Migrations (1:1 Parity)

| Model | Migration | Status | Notes |
|-------|-----------|--------|-------|
| User | 2026_11_12_120000_create_users_table.php | ✅ | Main users table, Jetstream-based; owner migration timestamp refreshed for schema repair |

### `migrationuplicate-resolution.md` — 📋 RISOLUZIONE COMPLETA DUPLICATI MIGRATION ROLES


# 📋 RISOLUZIONE COMPLETA DUPLICATI MIGRATION ROLES

## 🚨 PROBLEMA IDENTIFICATO

**Violazione**: MULTIPLI migration duplicate per tabella `roles` nel modulo User

```text
❌ VIOLAZIONE TROVATA:
Modules/User/database/migrations/2023_01_01_000011_create_roles_table.php
Modules/User/database/migrations/2023_01_01_000012_create_roles_table.php
Modules/User/database/migrations/2024_01_01_000011_create_roles_table.php
Modules/User/database/migrations/2024_12_05_000034_create_model_has_roles_table.php
Modules/User/database/migrations/2024_12_05_000035_create_model_has_roles_table.php
Modules/User/database/migrations/2025_09_18_000000_create_roles_table.php
```

## 🏛️ ANALISI FILOSOFICA - VIOLAZIONE SISTEMICA

### Violazione Filosofia Laraxot

### `migrazione-filament.md` — User Module - Migrazione a Filament 4


# User Module - Migrazione a Filament 4

## Panoramica User Module
Il modulo User è **critico** per sicurezza, autenticazione e autorizzazione. La migrazione a Filament 4 deve essere gestita con **massima cautela** per non compromettere l'accesso al sistema.

## 🔄 Modifiche Richieste per la Migrazione

### 1. UserResource - Schema Unificato con Security Focus
**Problemi attuali**: LanguageEnum rimosso, test coverage perduti

**Filament 4 - Enhanced UserResource:**

```php
<?php

namespace Modules\User\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Schema\Schema;

### `missing-factories-audit.md` — Factory Mancanti - Modulo User


# Factory Mancanti - Modulo User

## Situazione Critica Identificata

**Data audit**: 2025-01-06  
**Gravità**: CRITICA - 17 factory mancanti su 33 models

## Models senza Factory

### 1. AuthenticationFactory.php
- **Model**: Authentication.php
- **Scopo**: Gestione autenticazioni utenti
- **Priorità**: ALTA

### 2. DeviceProfileFactory.php  
- **Model**: DeviceProfile.php
- **Scopo**: Profili dispositivi utenti
- **Priorità**: MEDIA


### `missing-factories.md` — Factory Mancanti - Modulo User


# Factory Mancanti - Modulo User

## Situazione Critica Identificata

**Data audit**: [DATE]  
**Gravità**: CRITICA - 17 factory mancanti su 33 models

## Models senza Factory

### 1. AuthenticationFactory.php
- **Model**: Authentication.php
- **Scopo**: Gestione autenticazioni utenti
- **Priorità**: ALTA

### 2. DeviceProfileFactory.php  
- **Model**: DeviceProfile.php
- **Scopo**: Profili dispositivi utenti
- **Priorità**: MEDIA


### `missing-features-analysis.md` — Analisi Funzionalità Mancanti - Modulo User


# Analisi Funzionalità Mancanti - Modulo User

**Data Analisi**: 2026-01-22  
**Versione LimeSurvey Upstream**: 5.4.x+  
**Repository Upstream**: https://github.com/LimeSurvey/LimeSurvey

## Scopo del Modulo

Il modulo **User** fornisce:

- Sistema autenticazione multi-metodo (credentials, OAuth, SSO)
- Sistema autorizzazione avanzato (Spatie Laravel Permission)
- Gestione multi-tenant completa
- Gestione team e ruoli
- Tracciamento sessioni e dispositivi
- Integrazione social authentication

**Architettura**: Modulo infrastrutturale per autenticazione e autorizzazione; utilizzato da tutti gli altri moduli.


### `missing-features.md` — Analisi Funzionalità Mancanti - Modulo User


# Analisi Funzionalità Mancanti - Modulo User

**Data Analisi**: [DATE]  
**Versione LimeSurvey Upstream**: 5.4.x+  
**Repository Upstream**: https://github.com/LimeSurvey/LimeSurvey

## Scopo del Modulo

Il modulo **User** fornisce:

- Sistema autenticazione multi-metodo (credentials, OAuth, SSO)
- Sistema autorizzazione avanzato (Spatie Laravel Permission)
- Gestione multi-tenant completa
- Gestione team e ruoli
- Tracciamento sessioni e dispositivi
- Integrazione social authentication

**Architettura**: Modulo infrastrutturale per autenticazione e autorizzazione; utilizzato da tutti gli altri moduli.


### `missing-filament-resources-analysis.md` — Missing Filament Resources Analysis - User Module


# Missing Filament Resources Analysis - User Module

## 📋 Executive Summary

After comprehensive analysis of the User module, we identified several entity models that lack Filament resources and relation managers. This document analyzes the current state and recommends which models should have resources based on their business importance and usage patterns.

## 🔍 Current Resource Status

### Models WITH Filament Resources

- `AuthenticationLog.php` → `AuthenticationLogResource.php`
- `Device.php` → `DeviceResource.php`
- `Feature.php` → `FeatureResource.php`
- `OauthAccessToken.php` → `OauthAccessTokenResource.php`
- `OauthAuthCode.php` → `OauthAuthCodeResource.php`
- `OauthRefreshToken.php` → `OauthRefreshTokenResource.php`
- `PasswordReset.php` → `PasswordResetResource.php`
- `Permissio

### `missing-filament-resources.md` — missing-filament-resources


See canonical documentation: ../../../Themes/docs/shared-components/missing-filament-resources-analysis.md

### `model-classification.md` — model-classification


See canonical documentation: ../../../Themes/docs/shared-components/model-classification-Modules.md

### `model-inheritancees.md` — Correzioni Ereditarietà Modelli - Modulo User


# Correzioni Ereditarietà Modelli - Modulo User

## Data Implementazione
15 Ottobre 2025

## Obiettivo
Correggere tutti i modelli del modulo User che estendevano direttamente `Illuminate\Database\Eloquent\Model` per farli estendere le classi base corrette del modulo.

## Modelli Corretti

### 1. Tenant.php
**Prima:**
```php
class Tenant extends Model
```

**Dopo:**
```php
class Tenant extends BaseModel

### `models/baseuser.md` — BaseUser


# BaseUser

## Descrizione
Classe base per il modello User che implementa le interfacce `UserContract` e `HasTeamsContract`.
## Proprietà
### Attributi del Modello
- `id` (string): UUID dell'utente
- `name` (string|null): Nome completo dell'utente
- `first_name` (string|null): Nome dell'utente
- `last_name` (string|null): Cognome dell'utente
- `email` (string|null): Email dell'utente
- `password` (string|null): Password criptata
- `lang` (string|null): Lingua preferita
- `current_team_id` (string|null): ID del team corrente
- `is_active` (bool|null): Stato di attivazione dell'account
- `is_otp` (bool|null): Flag per One Time Password
- `password_expires_at` (DateTime|null): Data di scadenza della password
- `email_verified_at` (DateTime|null): Data di verifica email
- `remember_token` (st

### `models/teampermission.md` — TeamPermission


# TeamPermission

Il modello `TeamPermission` rappresenta i permessi specifici di un utente all'interno di un team.

## Proprietà

- `id` - UUID del permesso
- `team_id` - ID del team
- `user_id` - ID dell'utente
- `permission` - Nome del permesso
- `created_at` - Data di creazione
- `updated_at` - Data di ultimo aggiornamento

## Relazioni

- `team` - BelongsTo con `Team`, rappresenta il team a cui appartiene il permesso
- `user` - BelongsTo con `User`, rappresenta l'utente a cui è assegnato il permesso

## Note Importanti

### `models/xotbaivot-migration.md` — User Module - XotBasePivot Migration


# User Module - XotBasePivot Migration

## 📊 Overview

Il modulo User è il modulo **più impattato** dalla migration a XotBasePivot.

**Statistiche:**
- 🔴 **7 Pivot concreti** da aggiornare
- 📉 **~180 righe** di codice duplicate eliminate
- ⏱️ **45 minuti** effort stimato
- 🎯 **Priorità: ALTA**

---

## 🔧 Pivot Models Impattati

### 1. DeviceUser

**File:** `Modules/User/app/Models/DeviceUser.php`

### `models/xotbasepivot-migration.md` — xotbasepivot-migration


See canonical documentation: ../../../../Themes/docs/shared-components/xotbaivot-migration.md

### `models-analysis.md` — Models Analysis - User Module


# Models Analysis - User Module

## Factory e Seeder Status

### Models con Factory ✅ (33/56) - Excellent Coverage
Core business models have factories. Missing factories are mainly abstract base classes and policies.

### Models senza Factory ❌ (23/56) - Correctly Missing
- All `Base*` classes (abstract infrastructure)
- All `*Policy` classes (authorization logic) 
- `UserBasePolicy` (base authorization)
- Infrastructure models that don't need testing

## Models Business Logic Analysis

### 🟢 Core Business Models (CRITICAL)
1. **User** - Core user entity ✅
2. **Profile** - User profiles ✅
3. **Team** - User teams ✅

### `models.md` — models


See canonical documentation: ../../../Themes/docs/shared-components/models-analysis.md

### `moderation-actions.md` — Azioni di Moderazione (Action class)

# Azioni di Moderazione (Action class)

## Introduzione
Tutte le operazioni di business logic relative alla moderazione sono implementate tramite Action class secondo [spatie/laravel-queueable-action](mdc:https:/github.com/spatie/laravel-queueable-action), mai tramite Service class.

## Pattern Consigliati
- Ogni azione (approvazione, rifiuto, richiesta integrazione, ecc.) deve essere una Action class
- Le action devono essere queueable per gestire carichi elevati
- Ogni action deve loggare l'attività tramite activitylog
- Le action devono accettare come parametro ModeratableUser

## Esempio di Action
```php
use Spatie\QueueableAction\QueueableAction;
use Spatie\Activitylog\Traits\LogsActivity;

class ApproveUserAction
{
    use QueueableAction;
    use LogsActivity;

### `moderation-contracts.md` — Contratti e Interfacce per la Moderazione Utenti

# Contratti e Interfacce per la Moderazione Utenti

## Introduzione
Per garantire la riusabilità e la neutralità del modulo User, tutte le entità moderabili devono implementare un contract/interfaccia comune.

## Esempio di Interfaccia
```php
interface ModeratableUser
{
    public function getModerationData(): array;
    public function setState(string $state): void;
    public function getType(): string;
}
```

## Motivazione
- Permette di gestire la moderazione in modo generico e centralizzato
- Facilita l'estensione a nuovi tipi di utente
- Consente l'integrazione con action, policy, notifiche e activitylog


### `moderation-doctor-1.md` — moderation-doctor-1


See canonical documentation: ../../../Themes/docs/shared-components/moderation-doctor.md

### `moderation-notifications.md` — Notifiche Moderazione

# Notifiche Moderazione

## Introduzione
Tutte le notifiche relative alla moderazione (approvazione, rifiuto, richiesta integrazione, ecc.) devono essere implementate come Notification class Laravel, localizzate e prive di riferimenti hard-coded.

## Pattern Consigliati
- Ogni evento di moderazione deve generare una notifica specifica
- Le notifiche devono essere localizzate tramite i file lang
- Le notifiche devono essere inviate tramite action
- Le notifiche devono essere tracciate tramite activitylog

## Esempio di Notifica
```php
use Illuminate\Notifications\Notification;

class UserApprovedNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];

### `moderation-wizard-generic.md` — Moderazione e Wizard di Registrazione Generici per User

# Moderazione e Wizard di Registrazione Generici per User

## Premessa
Nel contesto di un modulo User riutilizzabile in più progetti, ogni "tipo" di utente (es. paziente, dentista, operatore, admin) è rappresentato da un model che estende/parente il modello base User tramite pattern Single Table Inheritance (STI) o Parental. Di conseguenza, sia il wizard di registrazione che la moderazione devono essere progettati in modo generico, senza riferimenti a domini specifici.

## Analisi e Ragionamento
- **User è la radice di tutti i tipi di utente**: ogni flusso di registrazione e moderazione deve essere agnostico rispetto al tipo.
- **Il wizard di registrazione** deve essere configurabile (schema dinamico, step dinamici) in base al tipo di utente, ma la logica di base (validazione, salvataggio,

### `moderationor.md` — Moderazione Dentista dal Modulo User


# Moderazione Dentista dal Modulo User

## Premessa
La moderazione del dentista, pur essendo più articolata rispetto ad altri utenti, può essere gestita direttamente dal modulo User, centralizzando la logica e mantenendo la coerenza con il sistema di autenticazione e gestione utenti.

## Flusso Proposto
1. **Registrazione Dentista**
   - Il dentista compila il form di registrazione (wizard multi-step).
   - Al termine del primo step, lo stato viene impostato su `pending_moderation`.
   - I dati vengono salvati in una tabella di workflow (es. `doctor_registration_workflows`).

2. **Moderazione**
   - Un moderatore riceve una notifica (email/dashboard) di nuova richiesta.
   - Il moderatore accede a una dashboard Filament (User Panel) e visualizza i dettagli del dentista.
   - Può approvare

### `module-analysis-complete.md` — module-analysis-complete


See canonical documentation: ../../../Themes/docs/shared-components/module-analysis-complete.md

### `module-analysis.md` — User Module - Comprehensive Analysis


# User Module - Comprehensive Analysis

## Module Overview
**Module Name**: User  
**Type**: Authentication & Authorization Module  
**Status**: ✅ Active  
**Framework**: Laravel 12.x + Filament 4.x  
**Language**: Multi-language (IT/EN/DE)  

## Purpose
The User module provides comprehensive user management functionality:

- Advanced authentication system with multi-type support
- Role-based access control with permissions
- Team management and organization
- User profiles and personalization
- Multi-tenant user isolation
- GDPR compliance for user data


### `module-structure-user.md` — module_structure - User


# module_structure - User

## Overview

Documentazione per module_structure nel modulo User.

## Dettagli

[Da completare]

## Collegamenti

- [Modulo Principale](../README.md)


### `module-structure.md` — module-structure


See canonical documentation: ../../../Themes/docs/shared-components/module-structure.md

### `module-user.md` — module-user


See canonical documentation: ../../../Themes/docs/shared-components/module-user.md

### `module.md` — module


See canonical documentation: ../../../Themes/docs/shared-components/module-analysis-Modules.md

### `multi-org-sync-laraxot-provtv.md` — Sincronizzazione multi-organizzazione (laraxot + provtv)


# Sincronizzazione multi-organizzazione (laraxot + provtv)

## Cosa è stato fatto

Questo repository è tracciato da due remote GitHub (`laraxot` = org upstream canonica,
`provtv` = org operativa del progetto ptvx). Il 2026-07-21 è stata eseguita una
sincronizzazione completa seguendo `bashscripts/tools/prompts/02-gitmodules-sync.md`:
fetch di tutti i remote, quality gates (PHPStan L10, PHPMD), risincronizzazione dopo ogni modifica.

## Problemi riscontrati e risolti

- **Clone shallow**: il repo era stato clonato con storia troncata, causando push
  respinti (`did not receive expected object`). Fix: `git fetch --unshallow` su tutti i remote.
- **Storie scollegate ("unrelated histories")**: root commit diversi tra org.
  **2026-07-23:** `laraxot` = tip `3ea7273a` (`0 0`); `provtv` = unrela

### `namespace/psr4-namespace-correction.md` — Correzione Namespace PSR-4


# Correzione Namespace PSR-4

## Problema

Il sistema rileva errori di autoloading PSR-4 in diversi file del progetto:

```
Class Modules\User\Enums\LanguageEnum located in ./Modules/User/app/Enums/Enums/LanguageEnum.php does not comply with psr-4 autoloading standard
Class App\Filament\Blocks\Page located in ./Modules/UI/app/Filament/Blocks/Page.php does not comply with psr-4 autoloading standard
```

## Cause dell'errore

Esistono due problemi principali:

1. **Directory duplicata**: Il file LanguageEnum.php è posizionato erroneamente in una directory `Enums/Enums` anziché in `Enums`
2. **Namespace errato**: I file Blocks in Modules/UI hanno namespace `App\Filament\Blocks` invece del corretto `Modules\UI\Filament\Blocks`

## Soluzione

### `navigation-groups.md` — Gruppi di navigazione del modulo User


# Gruppi di navigazione del modulo User

## Perché esiste questa pagina

Il modulo User espone molte risorse e pagine Filament. Il gruppo di navigazione di ognuna
arriva da `navigation.group` nel file di traduzione corrispondente. Prima della
normalizzazione i valori erano incoerenti: `Missing Group` (133 occorrenze), `General` (41),
stringa vuota (22), più una decina di varianti sinonime tra italiano e inglese nello stesso
menu. Il risultato erano gruppi duplicati e voci sparse senza criterio.

## Come Filament legge il gruppo

`Modules\Xot\Filament\Traits\NavigationLabelTrait::getNavigationGroup()` delega a
`TransFuncTrait::transFunc()`, che risolve la chiave `<modulo>::<file>.navigation.group`.
Se il valore è un array, `formatTransFuncResult()` restituisce il **primo elemento**. Per
qu

### `navigation-translationses.md` — Correzioni Traduzioni Navigation - Modulo User


# Correzioni Traduzioni Navigation - Modulo User

## Data Intervento
**[DATE]** - Sistemazione traduzioni secondo regole DRY + KISS

## Problemi Identificati

### File: `lang/it/device.php`
**Problema**: Chiavi hardcoded con ".navigation" nella sezione navigation
```php
// ❌ PRIMA (Problematico)
'navigation' => [
    'label' => 'device.navigation',
    'group' => 'device.navigation', 
    'icon' => 'device.navigation',
]
```

**Soluzione**: Traduzioni localizzate e appropriate

### `nested-resources.md` — nested-resources


See canonical documentation: ../../../Themes/docs/shared-components/nested-resources.md

### `nestedset-migration-best-practices.md` — nestedset-migration-best-practices


See canonical documentation: ../../../Themes/docs/shared-components/nestedset-migration-best-practices-Modules.md

### `no-ai-tool-scaffold-dirs.md` — Perché queste cartelle non devono esistere qui


# Perché queste cartelle non devono esistere qui

Estende la regola canonica [module-theme-root-cleanup.md — Rule 5](../../../../docs/wiki/rules/module-theme-root-cleanup.md).

## Rimosse in questo modulo (2026-07-16)

- `bashscripts/`, `scripts/ci/`, `.claude-audit/`, `test-results/` — scaffold di
  agenti/CI, copie locali di automazione già presente alla root del monorepo.
- `docs/scripts/` e le archivi/legacy annidate: `docs/{bug-fixes,performance,bugs,
  console_commands,filament,fixes,_integration}/{archive,legacy}` e `docs/roadmap/legacy`.

Le archivi contenevano duplicati (coppie `nome.md` + `nome-archive-1.md`/`nome-.md`) di
documentazione già viva nella cartella genitore. Nessun contenuto unico da migrare.

Pattern consolidati nel `.gitignore` del modulo, incluse le varianti anni

### `no-git-lfs.md` — Git LFS non si usa in questo progetto


# Git LFS non si usa in questo progetto

Vale per il repo root, per `bashscripts/` e per ogni modulo e tema. Questo modulo non fa
eccezione.

## La regola

I binari — immagini, font, PDF, archivi — si versionano come **blob git normali**.

Vietato:

- aggiungere `filter=lfs diff=lfs merge=lfs` in un qualunque `.gitattributes`;
- eseguire `git lfs install` o `git lfs track` dentro questo repo;
- committare come contenuto di un file il testo `version https://git-lfs.github.com/spec/v1`.

## Perche'

Non e' una preferenza di stile, e' il risultato di incidenti ripetuti.


### `no-log-in-production.md` — No Log calls in production PHP code


# No Log calls in production PHP code

## Rule

Never use `Log::info()`, `Log::debug()`, `Log::warning()`, or `Log::error()` in production PHP code.

This applies to: Actions, Models, Services, Widgets, Filament resources, and all other production classes.

## Violation found and fixed

**File**: `Modules/User/app/Filament/Widgets/Auth/RegisterWidget.php`

The widget contained:
- `Log::info()` calls inside registration logic
- `Log::debug()` calls for parameter tracing
- `Log::error()` calls inside catch blocks
- A dedicated method `logRegistrationAttempt()` wrapping log calls

All were removed. The `handleRegistrationError()` method was simplified to re-throw the exception directly.

### `oauth/github.md` — Versione HEAD


### Versione HEAD

# Configurazione OAuth con GitHub

## Prerequisiti

- Account GitHub attivo
- Applicazione Laravel con [Laravel Passport](../passport.md) configurato correttamente
- Modulo User installato e configurato

## Procedura di Configurazione

1. Accedere a [GitHub Developer Settings](https://github.com/settings/developers)
2. Fare clic su "New OAuth App"
3. Compilare i dettagli richiesti:
   - **Application Name**: Nome della tua applicazione
   - **Homepage URL**: URL della tua applicazione (es. `https://<nome progetto>.it`)
   - **Authorization callback URL**: URL di callback per GitHub (es. `https://<nome progetto>.it/{locale}/auth/callback/github`)
4. Fare clic su "Register Application"

### `oauth/oauth-architecture.md` — OAuth Architecture - User Module


# OAuth Architecture - User Module

> **Last Updated**: 2026-03-18  
> **Status**: ✅ Consolidated - Single Client Model

---

## 📋 Overview

Il modulo User implementa OAuth 2.0 tramite **Laravel Passport** con un'architettura personalizzata che estende i modelli base di Passport per aggiungere:

- **Authorization** (Spatie Permission)
- **Role-based access control** per client
- **Factory pattern** per testing
- **Connection multi-tenant** (database `user`)

---

## 🏗️ Architecture

### `oauth-access-token-removal.md` — Rimozione OauthAccessToken - Consolidamento su OauthToken


# Rimozione OauthAccessToken - Consolidamento su OauthToken

## Contesto

`OauthAccessToken` era un modello ridondante nel modulo User. Il nome suggeriva una relazione con `Laravel\Passport\AccessToken`, ma:

- **Laravel\Passport\AccessToken** non è un modello Eloquent: è un DTO (ScopeAuthorizable, Arrayable, Jsonable) usato durante le richieste HTTP
- **Laravel\Passport\Token** è il modello Eloquent per la tabella `oauth_access_tokens`

## Soluzione applicata

1. **Rinominato** `OauthAccessToken.php` → `OauthAccessToken.php.old` (backup)
2. **Sostituiti** tutti i riferimenti con `OauthToken`, modello canonico già configurato in Passport
3. **Rinominata** `OauthAccessTokenPolicy` → `OauthTokenPolicy` (Laravel policy discovery per OauthToken)

## Mapping finale

| Passport vendor | Wrapper

### `oauth-client-authorizable.md` — OauthClient - Authorizable e HasRoles


# OauthClient - Authorizable e HasRoles

**Riferimento**: [aurmich/sample_passport Client.php](https://github.com/aurmich/sample_passport/blob/develop/app/Models/Client.php)

## Scopo

Estendere `OauthClient` con `AuthorizableContract` e `HasRoles` per permettere ai client OAuth (machine-to-machine, app terze) di avere permessi propri tramite Spatie Permission.

## Implementazione

- **AuthorizableContract** + **Authorizable**: interfaccia `can()`, `cant()`, `cannot()`, `canAny()`
- **HasRoles**: trait Spatie per ruoli/permessi sul client
- **guard_name = 'api'**: guard dedicato (non `web`)
- **user() override**: `XotData::make()->getUserClass()` invece di `config()`
- **checkPermission()**: catch `PermissionDoesNotExist` per permessi non esistenti

## Test

- [OauthClientTest](../tests/U

### `oauth-passport-model-wrappers.md` — OAuth Passport Model Wrappers


# OAuth Passport Model Wrappers

## Pattern

Every Laravel Passport model that extends `Model` must have a corresponding wrapper class in `Modules/User/app/Models/` with the `Oauth` prefix.

## Mapping

| Passport vendor class | Wrapper in User module |
|----------------------|----------------------|
| `Laravel\Passport\AuthCode` | `Modules\User\Models\OauthAuthCode` |
| `Laravel\Passport\Client` | `Modules\User\Models\OauthClient` |
| `Laravel\Passport\DeviceCode` | `Modules\User\Models\OauthDeviceCode` |
| `Laravel\Passport\RefreshToken` | `Modules\User\Models\OauthRefreshToken` |
| `Laravel\Passport\Token` | `Modules\User\Models\OauthToken` (+ `OauthAccessToken`) |

Additionally, `OauthPersonalAccessClient` extends `BaseModel` because no Passport vendor class exists for `oauth_personal

### `oauth-token-relations-ide-helper.md` — OAuth Token: Relazioni Nullable e IDE Helper


# OAuth Token: Relazioni Nullable e IDE Helper

## Problema

Durante `php artisan ide-helper:models`:

```
Error resolving relation model of Modules\User\Models\OauthAccessToken:user() : 
  Attempt to read property "provider" on null
  
Error resolving relation model of Modules\User\Models\OauthToken:user() : 
  Attempt to read property "provider" on null
```

Entrambi i modelli ereditano da `Laravel\Passport\Token`.

## Root Cause: relazione `user()` assume client populated

**In Passport** (`vendor/laravel/passport/src/Token.php`):

### `optimization.md` — optimization


See canonical documentation: ../../../Themes/docs/shared-components/optimization-analysis-Modules.md

### `optimizationry-kiss.md` — Analisi Ottimizzazioni Modulo User - DRY + KISS


# Analisi Ottimizzazioni Modulo User - DRY + KISS

## 🎯 Obiettivo Analisi
Identificazione sistematica di codice replicato e opportunità di ottimizzazione nel modulo User, seguendo principi DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid).

## 🔍 Aree di Ottimizzazione Identificate

### 1. **Policy Pattern Duplication - CRITICO** 🚨

#### Problema Attuale
- **35+ policy classes** con logica di autorizzazione simile
- Pattern `hasPermissionTo` + `super-admin` duplicato in ogni policy
- Logica di controllo ownership replicata (`user_id`, `team_id`, `tenant_id`)

#### Pattern Replicato Identificato
```php
// RIPETUTO IN 35+ FILES
public function view(UserContract $user, $model): bool
{

### `optimizations.md` — optimizations


See canonical documentation: ../../../Themes/docs/shared-components/optimizations.md

### `ottimizzazioni-approfondite-modulo-user.md` — ottimizzazioni-approfondite-modulo-user


See canonical documentation: ../../../Themes/docs/shared-components/ottimizzazioni-approfondite-modulo-user.md

### `ottimizzazioni-correzioni.md` — ottimizzazioni-correzioni


See canonical documentation: ../../../Themes/docs/shared-components/ottimizzazioni-correzioni.md

### `ottimizzazioni-dry-kiss.md` — ottimizzazioni-dry-kiss


See canonical documentation: ../../../Themes/docs/shared-components/ottimizzazioni-dry-kiss-Modules.md

### `ottimizzazioni-modulo-user.md` — ottimizzazioni-modulo-user


See canonical documentation: ../../../Themes/docs/shared-components/ottimizzazioni-modulo-user.md

### `ottimizzazioni-super-dry-kiss.md` — Ottimizzazioni Super DRY + KISS - Modulo User


# Ottimizzazioni Super DRY + KISS - Modulo User

## 🎯 Panoramica
Documento completo di ottimizzazioni per il modulo User seguendo i principi **SUPER DRY** (Don't Repeat Yourself) e **KISS** (Keep It Simple, Stupid). Include ottimizzazioni per documentazione, codice, struttura e configurazione.

## 🚨 Problemi Critici Identificati

### 1. **Duplicazione Struttura Cartelle (CRITICO)**
**Problema:** Cartella `app/app/` che duplica la struttura
**Impatto:** CRITICO - Confusione struttura e possibili conflitti

**Struttura problematica identificata:**
```
app/
├── app/          # ❌ DUPLICAZIONE CRITICA
│   ├── Models/
│   ├── Http/
│   └── ...
├── Models/       # ❌ DUPLICAZIONE

### `ottimizzazioni-superry-kiss.md` — ottimizzazioni-superry-kiss


See canonical documentation: ../../../Themes/docs/shared-components/ottimizzazioni-super-dry-kiss-Modules.md

### `ottimizzazioni-user.md` — ottimizzazioni-user


See canonical documentation: ../../../Themes/docs/shared-components/ottimizzazioni-user.md

### `ottimizzazioniry-kiss.md` — Ottimizzazioni DRY + KISS - Modulo User


# Ottimizzazioni DRY + KISS - Modulo User

## Panoramica del Modulo
Il modulo User è il cuore dell'autenticazione e gestione utenti del sistema PTVX, con funzionalità avanzate di autenticazione, autorizzazione e gestione profili.

## Analisi Attuale Dettagliata

### Problemi Identificati (ANALISI APPROFONDITA)

#### 1. **Documentazione MASSIVA e FRAMMENTATA**
- **Totale file**: 80+ file di documentazione
- **Duplicazioni critiche**: 15+ file con contenuto simile
- **Struttura caotica**: File sparsi senza organizzazione logica

#### 2. **Duplicazioni EVIDENTI e CRITICHE**

##### A. **Logout Analysis (12+ file duplicati)**
```
❌ DUPLICAZIONI CRITICHE:

### `overview-extended.md` — User Module - Authentication & Authorization


# User Module - Authentication & Authorization

**Last Update**: 2025-12-05
**Status**: ✅ Production Ready
**PHPStan Level**: 10
**Maintainers**: Laraxot Team

---

## 📋 Table of Contents

- [Business Overview](#-business-overview)
- [Architecture](#-architecture)
- [Core Components](#-core-components)
- [Quick Start](#-quick-start)
- [Development Guide](#-development-guide)
- [Security](#-security)
- [API & Integration](#-api--integration)
- [Testing](#-testing)

### `packages.md` — packages


See canonical documentation: ../../../Themes/docs/shared-components/packages.md

### `pandoc-guide.md` — Pandoc Documentation Generation


# Pandoc Documentation Generation

This guide explains how to generate distributable documentation for this module using Pandoc.

## Installation

Pandoc is installed at `~/.local/bin/pandoc`. Verify:

```bash
pandoc --version
# pandoc 3.10.1
# Features: +server +lua
```

## Generate HTML

Convert markdown files to standalone HTML:

```bash

### `parental-inheritance.md` — parental-inheritance


See canonical documentation: ../../../Themes/docs/shared-components/parental-inheritance.md

### `parental.md` — parental


See canonical documentation: ../../../Themes/docs/shared-components/parental.md

### `passport-admin-actions.md` — Passport Administrative Actions in UI

# Passport Administrative Actions in UI

This document describes the administrative actions for Laravel Passport available directly within the Filament admin panel, reducing the need for terminal access.

## Passport Dashboard

The Passport Dashboard (`/admin/user/passport/passport-dashboard`) provides high-level administrative tasks:

- **Generate Keys**: Executes `php artisan passport:keys`. Generates the encryption keys required to issue access tokens.
- **Purge Tokens**: Executes `php artisan passport:purge`. Removes expired and revoked tokens from the database.
- **Hash Secrets**: Executes `php artisan passport:hash`. Hashes all existing client secrets. **Warning: This is a one-way operation.**
- **Install Passport**: Executes `php artisan passport:install --uuids`. Performs the initi

### `passport-complete-implementation.md` — passport-complete-implementation


See canonical documentation: ../../../Themes/docs/shared-components/passport-complete-implementation.md

### `passport-complete-management-debate.md` — passport-complete-management-debate


See canonical documentation: ../../../Themes/docs/shared-components/passport-complete-management-debate.md

### `passport-filament-cluster-proposal.md` — Passport Filament Cluster Proposal - User Module


# Passport Filament Cluster Proposal - User Module

**Data**: 2025-01-22
**Filosofia**: DRY + KISS + Organizzazione Logica
**Obiettivo**: Raggruppare tutte le risorse Passport/OAuth in un cluster Filament

---

## 🎯 Analisi Situazione Attuale

### Risorse Passport/OAuth Esistenti
Attualmente le risorse sono sparse nella navigazione:

1. **OauthClientResource** - Gestione client OAuth
2. **OauthAccessTokenResource** - Token di accesso
3. **OauthRefreshTokenResource** - Token di refresh
4. **OauthAuthCodeResource** - Authorization codes
5. **OauthPersonalAccessClientResource** - Personal access clients
6. **ClientResource** - Client generici (se diverso da OauthClient)

### `passport-implementation-summary-1.md` — passport-implementation-summary-1


See canonical documentation: ../../../Themes/docs/shared-components/passport-implementation-summary.md

### `passport-implementation.md` — Laravel Passport Implementation Summary - User Module


# Laravel Passport Implementation Summary - User Module

## Overview
This document summarizes the complete Laravel Passport implementation in the User module, highlighting all the improvements and optimizations made for complete OAuth management.

## Key Improvements Made

### 1. Fixed Redundant Interface Implementation
**Issue**: User model was implementing OAuthenticatable interface redundantly since BaseUser already implements it.
**Fix**: Removed redundant `implements OAuthenticatable` from User model.

**Before:**
```php
class User extends BaseUser implements OAuthenticatable
```

**After:**
```php
class User extends BaseUser

### `passport-integration.md` — Laravel Passport Integration - Architettura Completa


# Laravel Passport Integration - Architettura Completa

> **Generato**: [DATE]
> **Filosofia**: L'Architetto Laraxot (Vincitore del Dibattito Interno)
> **PHPStan Status**: ✅ Modulo `User` verificato pulito il 2026-03-10

---

## 🏆 Filosofia Vincente: L'Approccio Laraxot

### Il Dibattito Interno

Durante l'analisi dell'integrazione Passport, sono emerse tre posizioni:

#### Posizione A - "Il Purista PHPStan"
"Correggere TUTTI i type hints per PHPStan max! Nessun compromesso sulla type safety!"

#### Posizione B - "Il Pragmatico Laravel"
"Laravel Passport usa `mixed` per motivi validi. Non rompere la compatibilità!"

### `passport-managementebate.md` — Passport Complete Management - Internal Debate & Decision


# Passport Complete Management - Internal Debate & Decision

> **Data**: [DATE]  
> **Scopo**: Documentare il dibattito interno e la decisione finale per una gestione completa di Passport

---

## 🎯 Obiettivo

Implementare una gestione completa di Laravel Passport nel modulo User, seguendo la filosofia Laraxot (DRY, KISS, SOLID, Robust).

---

## 📊 Situazione Attuale

### ✅ Cosa Esiste Già

1. **PassportServiceProvider**: Configurazione base funzionante
2. **Modelli OAuth Completi**: 

### `passport-model-wrappers.md` — Passport Model Wrappers


# Passport Model Wrappers

## Regola

Ogni classe di `Laravel\Passport` che estende direttamente `Illuminate\Database\Eloquent\Model`
deve avere un wrapper omonimo con prefisso `Oauth` in:

`Modules/User/app/Models`

## Mapping richiesto

| Vendor Passport | Wrapper modulo User |
|---|---|
| `Laravel\Passport\AuthCode` | `Modules\User\Models\OauthAuthCode` |
| `Laravel\Passport\Client` | `Modules\User\Models\OauthClient` |
| `Laravel\Passport\DeviceCode` | `Modules\User\Models\OauthDeviceCode` |
| `Laravel\Passport\RefreshToken` | `Modules\User\Models\OauthRefreshToken` |
| `Laravel\Passport\Token` | `Modules\User\Models\OauthToken` |


### `passport-vs-socialite-clarification.md` — Passport vs Socialite - Distinzione Critica


# Passport vs Socialite - Distinzione Critica

**Data**: 2025-01-22
**Status**: ✅ Documentazione Critica
**Scopo**: Chiarire la differenza fondamentale tra Laravel Passport e Laravel Socialite

---

## 🎯 La Distinzione Fondamentale

### Laravel Passport (OAuth2 Server)
**Scopo**: Fornire un server OAuth2 completo per autenticazione API

**Componenti**:
- `OauthClient` - Client OAuth che richiedono token
- `OauthAccessToken` - Token di accesso per API
- `OauthRefreshToken` - Token per rinnovare access token
- `OauthAuthCode` - Authorization codes per OAuth flow
- `OauthPersonalAccessClient` - Client per personal access tokens

### `password-translation-completion-1.md` — password-translation-completion-1


See canonical documentation: ../../../Themes/docs/shared-components/password-translation-completion.md

### `password-translation-completion.md` — Completamento Traduzioni Password - 2025


# Completamento Traduzioni Password - 2025

## Problema Identificato
Durante l'audit delle traduzioni del modulo User, sono state identificate traduzioni incomplete per il campo `new_password_confirmation` in diversi file di traduzione.

## Analisi del Problema

### Pattern di Errore
- **Errore**: Traduzioni incomplete per `new_password_confirmation`
- **Esempio**: Mancanza di campi `tooltip`, `icon`, `color` in alcuni file
- **Impatto**: Incoerenza nell'interfaccia utente e mancanza di informazioni di sicurezza

### File Corretti

#### ✅ File Completati con Tutti i Campi

1. **change_profile_password.php**
   - **IT**: ✅ Completo con tooltip, icon, color
   - **EN**: ✅ Completo con tooltip, icon, color

### `password.md` — password


See canonical documentation: ../../../Themes/docs/shared-components/password.md

### `path-conventions-user.md` — path_conventions - User


# path_conventions - User

## Overview

Documentazione per path_conventions nel modulo User.

## Dettagli

[Da completare]

## Collegamenti

- [Modulo Principale](../README.md)


### `path-conventions.md` — path-conventions


See canonical documentation: ../../../Themes/docs/shared-components/path-conventions.md

### `payment.md` — payment


See canonical documentation: ../../../Themes/docs/shared-components/payment.md

### `perfection-audit.md` — Perfection Audit — User Module

# Perfection Audit — User Module

**Data**: 2026-09-01
**Scope**: `laravel/Modules/User/docs/`
**Metodo**: BMAD document-project + fix_docs_naming_convention.sh

---

## TL;DR

User ha **1,465 file .md** (100% uppercase) con **48 stub vuoti**. Terzo modulo per bloat. Tutti i file violano `kebab-case.md`.

**Stato attuale**: lontano dalla perfezione. Bonifica urgente.

---

## Numeri

| Metrica | Valore | Soglia salute |
|---------|--------|---------------|

### `performance/archive/authentication-performance-optimization.md` — Authentication Performance Optimization - User Module

# Authentication Performance Optimization - User Module

## 🚨 Critical Issues Identified

Based on the comprehensive performance analysis, the User module has **HIGH** priority performance issues affecting authentication and session management.

### Issue #1: Authentication Log Cleanup (HIGH)
**Location**: `Modules/User/app/Listeners/OtherDeviceLogoutListener.php:42`
**Impact**: Login operations can take 10+ seconds for active users

#### Problem
```php
// PROBLEMATIC CODE - Individual updates in loop
foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
    if ($log->getKey() !== $authenticationLog->getKey()) {
        $log->update([
            'cleared_by_user' => true,
            'logout_at' => now(),
        ]); // 💀 INDIVIDUAL UPDATE

### `performance/authentication-performance-optimization.md` — Authentication Performance Optimization - User Module

# Authentication Performance Optimization - User Module

## 🚨 Critical Issues Identified

Based on the comprehensive performance analysis, the User module has **HIGH** priority performance issues affecting authentication and session management.

### Issue #1: Authentication Log Cleanup (HIGH)
**Location**: `Modules/User/app/Listeners/OtherDeviceLogoutListener.php:42`
**Impact**: Login operations can take 10+ seconds for active users

#### Problem
```php
// PROBLEMATIC CODE - Individual updates in loop
foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
    if ($log->getKey() !== $authenticationLog->getKey()) {
        $log->update([
            'cleared_by_user' => true,
            'logout_at' => now(),
        ]); // 💀 INDIVIDUAL UPDATE

### `performance-issues.md` — 🐌 user module - performance issues


# 🐌 user module - performance issues

> analisi sprechi memoria, query inefficienti, bottlenecks auth/authorization

---

## 🔍 sprechi identificati

### sprechi di memoria

#### 1. caricamento password hash inutilmente
**location**: ovunque si usa `User::all()` o `User::get()`

**problema**:
```php
// carica password hash bcrypt (60+ bytes per user)
$users = User::all();  // ❌
```


### `performances.md` — performances


See canonical documentation: ../../../Themes/docs/shared-components/performance-issues.md

### `permissions.md` — Gestione dei Permessi


# Gestione dei Permessi

## Panoramica
Il modulo User utilizza il pacchetto `spatie/laravel-permission` per gestire i permessi e i ruoli degli utenti.
## Permessi Disponibili
### Moderazione Medici
- `moderate_doctors`: Può moderare le registrazioni dei medici
- `view_doctors`: Può visualizzare i medici
- `create_doctors`: Può creare medici
- `edit_doctors`: Può modificare i medici
- `delete_doctors`: Può eliminare i medici
## Ruoli Disponibili
### Moderatore
Il ruolo `moderator` ha i seguenti permessi:
- `moderate_doctors`
- `view_doctors`
## Implementazione
### Seeder
I permessi e i ruoli vengono creati tramite il seeder `PermissionsSeeder`:

### `philosophy-complete.md` — philosophy-complete


See canonical documentation: ../../../Themes/docs/shared-components/philosophy-complete.md

### `philosophy.md` — User: Philosophy: The Identity Foundation


# User: Philosophy: The Identity Foundation

**The Grand Vision**: User is not a user management system. It is the identity spine of FixCity: the answer to three questions and only three: **who are you, what are you allowed to do, and for which organization.** Everything else belongs elsewhere.

---

## RELIGIONE: The Non-Negotiable Commandments

### 1. Single Table Inheritance is Sacred

All user types: User, Doctor, Patient, Client, Admin: live in one `users` table with a `type` column. STI via `Parental\HasChildren` is not optional; it's the foundational pattern.

```php
class BaseUser extends Authenticatable {
    use HasChildren;
    protected string $childColumn = 'type';
}

class Doctor extends User {

### `phpinsights-report.md` — phpinsights-report


See canonical documentation: ../../../Themes/docs/shared-components/phpinsights-report.md

### `phpinsights.md` — phpinsights report


# phpinsights report

## stato [DATE] (sessione corrente)
- **scope analizzato**: `Modules/User/app`
- **esecuzione**: `./vendor/bin/phpinsights analyse Modules/User/app --no-interaction --format=json`
- **esito generale**: punteggi qualità/architettura/stile sotto soglia a causa di
  - classi non final / non abstract richieste dalla regola `ForbiddenNormalClasses`
  - funzioni con lunghezza e complessità oltre i limiti (es. `RetrieveSocialiteUserAction::execute`, `PasswordExpired::getFormSchema`)
  - formattazione: parentesi, ordine proprietà/metodi e importazioni in widget/risorse Filament
  - linee > 120 caratteri e uso di snake_case in proprietà/variabili punctual

## correlazione con phpmd
- comando: `./vendor/bin/phpmd Modules/User/app text phpmd.xml`
- warning tipici: `CamelCaseVar

### `phpinsightss.md` — phpinsightss


See canonical documentation: ../../../Themes/docs/shared-components/phpinsights-errors.md

### `phpmd-errors.md` — phpmd-errors


Modules/User/app/Actions/GetCurrentDeviceAction.php:23                                                              CyclomaticComplexity    The method execute() has a Cyclomatic Complexity of 11. The configured cyclomatic complexity threshold is 10.
Modules/User/app/Actions/GetCurrentDeviceAction.php:23                                                              NPathComplexity         The method execute() has an NPath complexity of 640. The configured NPath complexity threshold is 200.
Modules/User/app/Actions/GetCurrentDeviceAction.php:23                                                              CamelCaseParameterName  The parameter $mobile_id is not named in camelCase.
Modules/User/app/Actions/GetCurrentDeviceAction.php:43                                                            

### `phpmd-phpinsights-corrections-php-insights.md` — PHPMD e PHP Insights Corrections - 2025-01-22


# PHPMD e PHP Insights Corrections - 2025-01-22

## Obiettivo
Correggere warning PHPMD e PHP Insights nel modulo User, mantenendo PHPStan a 0 errori.

## Correzioni Implementate

### Variabili Inutilizzate
1. ✅ **TeamPermissionResource.php**: Rimosse `$userClass` e `$teamClass` non utilizzate
2. ✅ **RolesRelationManager.php**: Rimossa `$xotData` non utilizzata

### Naming Conventions (CamelCase)
1. ✅ **CreateProfile.php**:
   - `$user_data` → `$userData`
   - `$user_class` → `$userClass`
2. ✅ **ListProfiles.php**: Rimossa `$user_class` non utilizzata

### Parametri Non Utilizzati
1. ✅ **ViewOauthRefreshToken.php**: `$state` → `$_state` (prefisso `_` per parametri non utilizzati)

### `phpmd-phpinsights-corrections.md` — PHPMD e PHP Insights Corrections - [DATE]


# PHPMD e PHP Insights Corrections - [DATE]

## Obiettivo
Correggere warning PHPMD e PHP Insights nel modulo User, mantenendo PHPStan a 0 errori.

## Correzioni Implementate

### Variabili Inutilizzate
1. ✅ **TeamPermissionResource.php**: Rimosse `$userClass` e `$teamClass` non utilizzate
2. ✅ **RolesRelationManager.php**: Rimossa `$xotData` non utilizzata

### Naming Conventions (CamelCase)
1. ✅ **CreateProfile.php**:
   - `$user_data` → `$userData`
   - `$user_class` → `$userClass`
2. ✅ **ListProfiles.php**: Rimossa `$user_class` non utilizzata

### Parametri Non Utilizzati
1. ✅ **ViewOauthRefreshToken.php**: `$state` → `$_state` (prefisso `_` per parametri non utilizzati)

### `phpmd-report.md` — phpmd-report


Modules/User/app/Actions/GetCurrentDeviceAction.php:23                                         CyclomaticComplexity      The method execute() has a Cyclomatic Complexity of 10. The configured cyclomatic complexity threshold is 10.
Modules/User/app/Actions/GetCurrentDeviceAction.php:23                                         NPathComplexity           The method execute() has an NPath complexity of 320. The configured NPath complexity threshold is 200.
Modules/User/app/Actions/GetCurrentDeviceAction.php:42                                         ShortVariable             Avoid variables with short names like $up. Configured minimum length is 3.
Modules/User/app/Actions/Socialite/GetUserModelAttributesFromSocialiteAction.php:11            LongClassName             Avoid excessively long clas

### `phpmd.md` — phpmd


See canonical documentation: ../../../Themes/docs/shared-components/phpmd-report.md

### `phpmds.md` — phpmds


See canonical documentation: ../../../Themes/docs/shared-components/phpmd-errors.md

### `phpstan-analysis-user.md` — phpstan-analysis-user


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-analysis-user.md

### `phpstan-array-types-fixes.md` — phpstan-array-types-fixes

- [Xot - PHPStan Missing Array Types](../Xot/docs/phpstan-missing-array-types-fixes.md)
- [Xot - PHPStan Critical Rules](../Xot/docs/phpstan-critical-rules.md)
- [docs_project - PHPStan Intouchable Rule](../../../docs_project/phpstan-intouchable-rule.md)

---

**Data Analisi**: Gennaio 2025  
**Errori Identificati**: ~45 errori nel modulo User  
**phpstan.neon**: ✅ INTOCCATO  
**Stato**: 📋 Analisi Completata - Pronto per Correzioni
---
module: theme
topic: phpstan-array-types-fixes
canonical: ../../../Themes/docs/shared-components/phpstan-array-types-fixes-Modules.md
related:
  - "./00-index-indice-documentazione-modulo-user.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"

### `phpstan-array-typeses.md` — PHPStan Array Types Fixes - Modulo User


# PHPStan Array Types Fixes - Modulo User

## 🚨 REGOLA CRITICA RISPETTATA 🚨

**NON è stato modificato** `phpstan.neon`

## Problema Identificato

Il modulo User presenta numerosi errori PHPStan `missingType.iterableValue` per parametri e proprietà di tipo `array` senza specificazione del tipo degli elementi contenuti.

## Errori Identificati per Categoria

### 1. **Console Commands** (3 errori)
- `RemoveRoleCommand.php` - `getOptions()` return type
- `SetCurrentTeamCommand.php` - `getOptions()` return type  
- `SuperAdminCommand.php` - `getOptions()` return type

### 2. **Contracts** (14 errori)
- `CreatesNewUsers.php` - parametro `$input`

### `phpstan-complete-success.md` — phpstan-complete-success


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-complete-success.md

### `phpstan-compliance-status.md` — PHPStan Level 10 Compliance Status


# PHPStan Level 10 Compliance Status

**Last Updated**: 2026-07-06
**Status**: ✅ `Modules/User` fully compliant including `tests/` (0 errors, level max).

Baseline STORY-288: 234 → 0. Pattern: social-providers env in ServiceProvider, Contracts Model generics, AuthenticationLogQuery typed.

Baseline sessione 2026-07-06: 48 → 0 (chiude il debito Pest residuo). Fix principali: `Role`/`Permission::factory()->create()` sostituiti con `RoleFactory::new()->createOne()`/`PermissionFactory::new()->createOne()` (tipizzati, `::factory()` restituiva `mixed`); nullable narrowing con `\assert($user instanceof User)` dopo `expect(...)->not->toBeNull()`; `UserMigrationSyntaxTest.php` e `RegisterWidgetTest.php` mancavano `uses(TestCase::class)`/chiamavano `$this->assertDatabaseHas()` (protetto) invece del

### `phpstan-compliance.md` — PHPStan Compliance - User Module


# PHPStan Compliance - User Module

## Status: ✅ FULLY COMPLIANT

**Analysis Date:** September 22, 2025
**PHPStan Level:** 9 (Maximum)
**Files Analyzed:** 772
**Errors Found:** 0

## Compliance Summary

The User module is fully compliant with PHPStan level 9 analysis, demonstrating:

- ✅ Rigorous type hints implementation
- ✅ Proper null handling
- ✅ Correct array structure definitions
- ✅ Filament 4.x compatibility
- ✅ Safe function usage
- ✅ Strict types declaration

### `phpstan-error-roadmap.md` — phpstan-error-roadmap


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-error-roadmap.md

### `phpstan-final-progress.md` — PHPStan Level 10 - Progresso Finale


# PHPStan Level 10 - Progresso Finale

**Data**: 2025-01-22
**Status**: In Progress
**Versione**: 1.0.0

## 📊 Statistiche Progresso

### Errori Totali
- **Iniziale**: ~221 errori
- **Dopo correzioni OAuth**: 115 errori
- **Dopo correzioni namespace**: 34 errori
- **Dopo correzioni ActionInterface**: 17 errori
- **Attuale**: 15 errori
- **Riduzione Totale**: 206 errori risolti (93% di progresso)

## ✅ Correzioni Applicate

### Categoria 1: Namespace Filament 4

### `phpstan-fixes.deprecated.md` — phpstan-fixes.deprecated


<<<<<<< .merge_file_agqCrL
<<<<<<< .merge_file_aKt9IO
<<<<<<< .merge_file_rXbUVw
=======
>>>>>>> .merge_file_7aJ3UK
> Questo file è stato rinominato in [phpstan-fixes-2.deprecated.md](phpstan-fixes-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
> Questo file è stato rinominato in [phpstan-fixes-2.deprecated.md](./phpstan-fixes.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
<<<<<<< .merge_file_agqCrL
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
>>>>>>> .merge_file_Ok7aw7
=======
> Questo file è stato rinominato in [phpstan-fixes-.deprecated.md](phpstan-fixes-.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
>>>>>>> .merge_file_MJHz1P
=======
>>>>>>> .merge_file_

### `phpstan-furious-debate-1.md` — phpstan-furious-debate-1


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-furious-debate-2.md

### `phpstan-furious-debate.md` — Il Grande Dibattito Furioso: PHPStan Level 10 - La Verità Assoluta


# Il Grande Dibattito Furioso: PHPStan Level 10 - La Verità Assoluta

**Data**: 2025-01-22
**Status**: Dibattito Risolto - Il Purista Ha Vinto
**Versione**: 2.0.0

## 🥊 Il Dibattito Furioso

### 🎭 Personaggio 1: Il Purista (Type Safety Assoluta)

**"PHPStan Level 10 è la Verità Assoluta! Zero errori è l'unico obiettivo accettabile!"**

**Argomenti**:
1. **Prevenzione Bug**: Errori catturati a compile-time, non runtime
2. **Manutenibilità**: Codice auto-documentato attraverso i tipi
3. **Refactoring Sicuro**: Cambiamenti guidati dai tipi
4. **Team Confidence**: Sviluppatori fiduciosi nel codice
5. **Qualità**: Standard elevato = codice professionale
6. **Filosofia Laraxot**: "La type safety è sacra. Non profanarla mai."

### `phpstan-furiousebate.md` — Il Grande Dibattito Furioso: PHPStan Level 10 - La Verità Assoluta


# Il Grande Dibattito Furioso: PHPStan Level 10 - La Verità Assoluta

**Status**: Dibattito Risolto - Il Purista Ha Vinto
**Versione**: 2.0.0

## 🥊 Il Dibattito Furioso

### 🎭 Personaggio 1: Il Purista (Type Safety Assoluta)

**"PHPStan Level 10 è la Verità Assoluta! Zero errori è l'unico obiettivo accettabile!"**

**Argomenti**:
1. **Prevenzione Bug**: Errori catturati a compile-time, non runtime
2. **Manutenibilità**: Codice auto-documentato attraverso i tipi
3. **Refactoring Sicuro**: Cambiamenti guidati dai tipi
4. **Team Confidence**: Sviluppatori fiduciosi nel codice
5. **Qualità**: Standard elevato = codice professionale
6. **Filosofia Laraxot**: "La type safety è sacra. Non profanarla mai."


### `phpstan-generic-types.md` — phpstan-generic-types


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-generic-types.md

### `phpstan-level-10-fixes.md` — PHPStan Level 10 Fixes - User Module


# PHPStan Level 10 Fixes - User Module

## Duplicate Method Declaration Fix

### Issue
- **File**: `Modules/User/app/Models/BaseUser.php`
- **Error**: `Cannot redeclare Modules\User\Models\BaseUser::token()`
- **Problem**: Two identical method declarations for `token()` at lines 179 and 197
- **Impact**: Fatal error preventing PHPStan analysis from completing

### Solution
- Removed the duplicate `token()` method declaration at line 197
- Kept the properly overridden method with correct return type and annotation
- Preserved the functionality while eliminating the syntax conflict

### Before
```php
#[\Override]
public function token(): Token|TransientToken|null

### `phpstan-level-10es.md` — phpstan-level-10es


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-level-10-fixes-Modules.md

### `phpstan-level10es.md` — Correzioni PHPStan Livello 10 - Modulo User


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-level10-fixes.md
# Correzioni PHPStan Livello 10 - Modulo User

Questo documento traccia gli errori PHPStan di livello 10 identificati nel modulo User e le relative soluzioni implementate.

## Errori Identificati e Correzioni Effettuate

### 1. Uso del tipo mixed in CheckOtpExpiredRule.php

```php
public function validate(string $attribute, mixed $value, \Closure $fail): void
```

**Problema**: Utilizzo del tipo `mixed` senza ulteriori specifiche sul tipo effettivo del valore. Inoltre, il metodo `message()` non aveva un tipo di ritorno esplicito.

**Soluzione**:
1. Aggiunta di documentazione PHPDoc per specificare che `$value` è un `string|int`:
   ```php
   /**

### `phpstan-level9-fixes.md` — phpstan-level9-fixes


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-level9-fixes-Modules.md

### `phpstan-level9es.md` — Correzione conflitto e miglioramento PHPStan livello 9 in Filament/Resources/UserResource.php


# Correzione conflitto e miglioramento PHPStan livello 9 in Filament/Resources/UserResource.php

**Data:** [DATE]

## Problema
Sono stati rilevati conflitti Git non risolti nel file `app/Filament/Resources/UserResource.php` del modulo User. Il conflitto riguardava principalmente:
- Differenze nella gestione degli import e delle dipendenze
- Diversi approcci alla definizione del form schema (array associativi vs. array semplici)
- Gestione della visibilità e delle convenzioni Laraxot/Xot

## Analisi
- Versioni in conflitto tra array associativi (corretto secondo Laraxot/Xot e PHPStan 9) e array semplici (NON conforme)
- Alcuni use duplicati o inutilizzati
- Possibile presenza di codice/commenti legacy

## Soluzione Applicata
- Risolto il conflitto scegliendo la versione con array associati

### `phpstan-patterns.md` — PHPStan Level 10 Patterns - User Module


# PHPStan Level 10 Patterns - User Module

**Last Updated**: 2026-02-16  
**Related Issue**: #77

---

## Dynamic Method Call Type Safety

### ❌ Anti-Pattern: Dynamic Method Invocation
```php
// PHPStan cannot infer return type
return $this->stringHelper->of($email)
    ->before('@')
    ->$searchMethod('.') // ❌ Returns mixed
    ->trim();
```

###✅ Correct Pattern: Explicit Conditional Logic

### `phpstan-philosophy-debate.md` — phpstan-philosophy-debate


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-philosophy-debate.md

### `phpstan-plan.md` — PHPStan Analysis - User Module (Jan 2026)


# PHPStan Analysis - User Module (Jan 2026)

## Current Status
- **Errors**: 7 errors in `OauthClientResource.php`.
- **Primary Issue**: `Class Filament\Forms\Components\Grid` not found.

## Analysis
The user attempted to fix imports by switching to `Filament\Forms\Components\Grid`.
However, `find_by_name` confirmed that `Filament\Forms\Components\Grid` does not exist in `vendor/filament`.
Instead, `Filament\Schemas\Components\Grid` exists.
This confirms that the project is using a version of Filament where Forms seem to be integrated into Schemas? Or at least Grid is in Schemas.

## Detailed Plan
1.  **Modify `OauthClientResource.php`**:
    - Change `Filament\Forms\Components\Grid` to `Filament\Schemas\Components\Grid`.
    - Ensure `getFormSchema` returns an array with string keys (Use

### `phpstan-report-initial.md` — phpstan-report-initial


See canonical documentation: ../../../Themes/docs/shared-components/phpstan_report.txt

 [OK] No errors        

### `phpstan-resolution-debate.md` — phpstan-resolution-debate


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-resolution-debate.md

### `phpstan-resolutionebate.md` — Dibattito Filosofico: Risoluzione Errori PHPStan


# Dibattito Filosofico: Risoluzione Errori PHPStan

**Data Creazione**: [DATE]
**Status**: Analisi Critica Completa
**Versione**: 1.0.0

## 🥊 Il Grande Dibattito: Type Safety vs Pragmatismo

### 🎭 Personaggio 1: "Il Purista del Tipo"

**Tesi**: "Ogni errore PHPStan Level 10 DEVE essere risolto. Zero compromessi. La type safety è sacra."

**Argomenti**:
- Type safety previene bug a compile-time
- Codice auto-documentato
- Refactoring sicuro
- Team confidence

**Strategia**: Correggere TUTTI gli errori, anche quelli apparentemente innocui.

### `phpstan-roadmap.md` — PHPStan Roadmap: User Module

# PHPStan Roadmap: User Module

**Date**: 2026-01-12
**Errors**: 13

## 1. Filament Resource Typing
**Files**:
- `app/Filament/Clusters/Passport/Resources/OauthClientResource.php`
- `app/Filament/Resources/ClientResource.php`

**Issue**: `getModel()` returns `string` or `class-string`, but contract expects `class-string<Model>`.
**Plan**: Ensure explicit casting or strict return type in `getModel()`. Verify `XotBaseResource` inheritance.

## 2. API Resource properties
**Files**:
- `app/Http/Resources/ClientResource.php`

**Issue**: Access to undefined property `$this->owner`.
**Plan**: `JsonResource` proxies to the underlying model, but PHPStan doesn't know the model type. Add `@mixin` or `@property` PHPDoc to the Resource class.


### `phpstan-success.md` — PHPStan Level 10 - Successo Completo


# PHPStan Level 10 - Successo Completo

## 🎉 Risultato Finale

**0 errori PHPStan livello 10 nel modulo User!**

## Progresso

- **Errori iniziali**: ~221 errori
- **Errori finali**: 0 errori
- **Riduzione**: 100% ✅

## Correzioni Principali

### 1. getFormSchema() - Array con Chiavi Stringhe
- ✅ `ClientResource::getFormSchema()` - Aggiunte chiavi stringhe
- ✅ `OauthAuthCodeResource::getFormSchema()` - Corretto tipo di ritorno union
- ✅ `OauthRefreshTokenResource::getFormSchema()` - Corretto tipo di ritorno union
- ✅ `SocialiteUserResource::getFormSchema()` - Corretto tipo di ritorno union

### `phpstan-syntax-blockers.md` — PHPStan — stato modulo User (2026-07-08)


# PHPStan — stato modulo User (2026-07-08)

## Stato attuale: risolto

Il cluster di **syntax error** da merge conflict e factory corrotte è stato eliminato.

Verifica:

```bash
cd laravel
XDEBUG_MODE=off ./vendor/bin/phpstan analyse Modules/User/app --level=10
```

Esito atteso: `[OK] No errors`.

## Storia (archivio)

### 1. Factory OAuth corrotte (risolto)


### `phpstan-syntax-fixes.md` — PHPStan Syntax Fixes - Modulo User


# PHPStan Syntax Fixes - Modulo User

**Data**: 2025-01-11  
**Versione PHPStan**: 1.12.x  
**Livello**: max  
**Status**: ✅ NAMESPACE ORDERING FIXATO

## 🔧 Correzione Implementata

### BaseUserTest.php - Namespace Declaration Order

**Problema**:
```
Namespace declaration statement has to be the very first statement in the script on line 6
```

**Causa**: `use function` statement dichiarato PRIMA del namespace invece che dopo.

**Impatto**:

### `phpstan-syntaxes.md` — PHPStan Syntax Fixes - Modulo User


# PHPStan Syntax Fixes - Modulo User

**Versione PHPStan**: 1.12.x  
**Livello**: max  
**Status**: ✅ NAMESPACE ORDERING FIXATO

## 🔧 Correzione Implementata

### BaseUserTest.php - Namespace Declaration Order

**Problema**:
```
Namespace declaration statement has to be the very first statement in the script on line 6
```

**Causa**: `use function` statement dichiarato PRIMA del namespace invece che dopo.

**Impatto**:
- ❌ Syntax error bloccante

### `phpstan.md` — Analisi PHPStan del Modulo User


# Analisi PHPStan del Modulo User

## Stato Attuale
Il modulo User è attualmente in fase di analisi con PHPStan. Questo documento traccia i problemi rilevati e le soluzioni implementate.

## Problemi e Soluzioni

### Team e BaseTeam
- [Dettagli completi](phpstan-fixes.md#team-php-e-baseteam-php)
- Stato: ✅ Risolto
- Commit: N/A

### TeamInvitation
- [Dettagli completi](phpstan-fixes.md#teaminvitation-php)
- Stato: ✅ Risolto
- Commit: N/A

### TeamUser e BasePivot
- [Dettagli completi](phpstan-fixes.md#teamuser-php-e-basepivot-php)

### `phpstanebate.md` — Filosofia Laraxot: Il Grande Dibattito Interno - PHPStan Level 10


# Filosofia Laraxot: Il Grande Dibattito Interno - PHPStan Level 10

**Data Creazione**: [DATE]
**Status**: Documentazione Filosofica Completa
**Versione**: 1.0.0

## 🥊 Il Grande Dibattito: Type Safety vs Pragmatismo

### 🎭 Personaggio 1: Il Purista (Type Safety Assoluta)

**"PHPStan Level 10 è la Verità Assoluta! Zero errori è l'unico obiettivo accettabile!"**

**Argomenti**:
1. **Prevenzione Bug**: Errori catturati a compile-time, non runtime
2. **Manutenibilità**: Codice auto-documentato attraverso i tipi
3. **Refactoring Sicuro**: Cambiamenti guidati dai tipi
4. **Team Confidence**: Sviluppatori fiduciosi nel codice
5. **Qualità**: Standard elevato = codice professionale


### `phpstanes-276dc0.md` — User Module - PHPStan Fixes Session [DATE]


# User Module - PHPStan Fixes Session [DATE]

## ⚠️ Stato: IN PROGRESS - 95 errori rimanenti

**Data correzione**: 1 Ottobre 2025
**Analizzati**: ~400 file
**Errori iniziali**: ~100+ (bloccavano analisi)
**Errori attuali**: 95
**Errori critici risolti**: 7 (syntax errors)

---

## 🛠️ Correzioni Implementate

### 1. BaseUser.php - Rimozione Codice Orfano (CRITICO)

**File**: `app/Models/BaseUser.php`
**Linee**: 377-419
**Problema**: Blocchi di codice senza dichiarazione di metodo che causavano 7 errori di sintassi e bloccavano l'intera analisi PHPStan

### `phpstanes-passport.md` — phpstanes-passport


See canonical documentation: ../../../Themes/docs/shared-components/phpstan-fixes-passport.md

### `phpstanes.md` — Correzioni PHPStan - Modulo User


# Correzioni PHPStan - Modulo User

Questo documento traccia gli errori PHPStan identificati nel modulo User e le relative soluzioni implementate.

## Errori Risolti - Gennaio 2025

### 1. Return Type Compatibility - BaseListUsers

**Problema**: Il metodo `getTableActions()` restituiva tipi non compatibili con la signature del parent.

**Errore PHPStan**:

```text
Method BaseListUsers::getTableActions() should return array<string, Action|ActionGroup> but returns non-empty-array<string, ActionGroup|ChangePasswordAction|Action>.
```

**Analisi**:

1. Il metodo restituisce correttamente un array associativo con chiavi stringa

### `phpstanry-kiss-improvements.md` — PHPStan Level 10 + DRY/KISS Improvements - User Module


# PHPStan Level 10 + DRY/KISS Improvements - User Module

## Summary

Il modulo User è stato analizzato e migliorato per conformità PHPStan Level 10, principi DRY e KISS.

### Risultati User Module

- ✅ **PHPStan Level 10**: 0 errori (da 16)
- ✅ **Duplicate $connection rimosse**: 7 file
- ✅ **PHPDoc corretti**: 8 file
- ✅ **Code reduction**: ~20 righe eliminate

---

## Fixes Applied

### 1. PHPDoc References Fixed


### `phpstans-resolution.md` — PHPStan Level 10 Errors Resolution Roadmap - User Module


# PHPStan Level 10 Errors Resolution Roadmap - User Module

**Modulo**: User  
**Livello PHPStan**: 10  
**Status**: ✅ **COMPLETATO**  
**Errori Totali**: 15 → 0 (100% risolti)

---

## 📊 Errori Identificati

### 1. PassportServiceProvider.php (6 errori)

#### Errore 1-3: Type hints per class-string
- **Linee**: 106, 108, 110
- **Problema**: `Passport::useRefreshTokenModel()`, `useAuthCodeModel()`, `useClientModel()` si aspettano `class-string<...>` ma ricevono `string`
- **Causa**: Le variabili vengono lette da config e sono tipizzate come `string`, ma Passport richiede `class-string`
- **Soluzione**: Aggiungere cast esplicito o PHPDoc `@var class-string<...>`


### `phpstans.md` — Filosofia Laraxot: Risoluzione Errori PHPStan


# Filosofia Laraxot: Risoluzione Errori PHPStan

**Data Creazione**: [DATE]
**Status**: Documentazione Filosofica Completa
**Versione**: 1.0.0

## 🏛️ Comandamento Sacro: Type Safety Assoluta

### Principio Fondamentale

**"PHPStan Level 10 è la Verità Assoluta - Zero Errori è l'Unico Obiettivo"**

Questo non è un suggerimento, è un **COMANDAMENTO** della religione Laraxot.

## 🧠 Logica (Logic)

### Perché Type Safety è Essenziale

1. **Prevenzione Bug**: Errori catturati a compile-time, non runtime

### `placeholder.md` — placeholder


See canonical documentation: ../../../Themes/docs/shared-components/placeholder.txt
https://jsonplaceholder.typicode.com/users

### `policies.md` — User Module Policies Documentation


# User Module Policies Documentation

## Overview

The User module implements comprehensive policies for all its models to control access and authorization throughout the system. This document outlines the policy structure, implementation, and usage patterns.

## Base Policy

All User module policies extend `UserBasePolicy`:

```php
abstract class UserBasePolicy
{
    use HandlesAuthorization;

    public function before(UserContract $user, string $ability): ?bool
    {
        $xotData = XotData::make();
        if ($user->hasRole('super-admin')) {

### `policy-phpstan-errors.md` — Errori PHPStan nelle Policy del Modulo User


# Errori PHPStan nelle Policy del Modulo User

## Problema Identificato (2025-01-06)

**ERRORE CRITICO**: Tutte le policy del modulo User presentano errori PHPStan relativi al metodo `hasPermissionTo()` non definito nel contratto `UserContract`.

### Descrizione Tecnica
Le policy chiamano `$user->hasPermissionTo()` su istanze di `Modules\Xot\Contracts\UserContract`, ma questo metodo non è definito nell'interfaccia.

**Errore PHPStan**: `Call to an undefined method Modules\Xot\Contracts\UserContract::hasPermissionTo()`

### File Coinvolti
Tutte le policy del modulo User in `app/Models/Policies/`:
- `ExtraPolicy.php`
- `FeaturePolicy.php`
- `MembershipPolicy.php`
- `ModelHasPermissionPolicy.php`
- `ModelHasRolePolicy.php`
- `NotificationPolicy.php`

### `policy-phpstans.md` — Errori PHPStan nelle Policy del Modulo User


# Errori PHPStan nelle Policy del Modulo User

## Problema Identificato ([DATE])

**ERRORE CRITICO**: Tutte le policy del modulo User presentano errori PHPStan relativi al metodo `hasPermissionTo()` non definito nel contratto `UserContract`.

### Descrizione Tecnica
Le policy chiamano `$user->hasPermissionTo()` su istanze di `Modules\Xot\Contracts\UserContract`, ma questo metodo non è definito nell'interfaccia.

**Errore PHPStan**: `Call to an undefined method Modules\Xot\Contracts\UserContract::hasPermissionTo()`

### File Coinvolti
Tutte le policy del modulo User in `app/Models/Policies/`:
- `ExtraPolicy.php`
- `FeaturePolicy.php`
- `MembershipPolicy.php`
- `ModelHasPermissionPolicy.php`
- `ModelHasRolePolicy.php`
- `NotificationPolicy.php`

### `ponytail-audit.deprecated.md` — ponytail-audit.deprecated


<<<<<<< .merge_file_55AIa5
<<<<<<< .merge_file_b1CiY0
<<<<<<< HEAD
=======
>>>>>>> .merge_file_hzZRQy
> Questo file è stato rinominato in [ponytail-audit-2.deprecated.md](ponytail-audit-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
> Questo file è stato rinominato in [ponytail-audit-2.deprecated.md](./ponytail-audit.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
<<<<<<< .merge_file_55AIa5
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
> Questo file è stato rinominato in [ponytail-audit-.deprecated.md](ponytail-audit-.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
>>>>>>> .merge_file_pHCG08
=======
>>>>>>> .merge_file_hzZRQy

### `prd.md` — PRD: User Module


# PRD: User Module

## 📋 Overview
- **Author:** Gemini CLI
- **Status:** Approved
- **Target Release:** 1.0.0

## ❓ Problem Statement
Managing complex roles and permissions (e.g., HR Manager vs. Employee vs. System Admin) across 30+ modules requires a centralized, robust authorization engine.

## 🎯 Goals & Success Metrics
- **Goal 1:** Secure Auth -> **Metric:** Zero unauthorized access incidents.
- **Goal 2:** Granular Control -> **Metric:** Support for 500+ unique permissions.
- **Goal 3:** Performance -> **Metric:** < 10ms for permission check.

## 👤 User Stories
- As a **User**, I want to reset my password securely so I can regain access to my account.
- As an **Admin**, I want to assign multiple roles to a user so they can perform different duties.


### `product-launch-plan-user-module.md` — User Module - Product Launch Plan


# User Module - Product Launch Plan

**Module:** User  
**Version:** 1.0.0  
**Last Updated:** March 12, 2026  
**Owner:** Product Team

---

## Launch Objectives

1. **Product:** Deploy user authentication system
2. **Security:** Zero security incidents
3. **Experience:** <2 minute registration flow
4. **Adoption:** 1K registered users in month 1

---

## Pre-Launch Checklist

### `product-launch-plan.md` — User - Product Launch Plan


# User - Product Launch Plan

> Piano di lancio. Modulo.
> Launch readiness stimata: 73%.

## Obiettivo del lancio

Rilasciare **User** in modo controllato, misurabile e coerente con il suo ruolo: utenti, autenticazione, ruoli e profili.

## Audience interna

- owner di modulo o tema
- admin/operatori
- sviluppatori che dipendono dal componente

## Criteri di readiness

- PRD e roadmap aggiornati
- test critici verdi

### `product-requirements.md` — Policy globale (puntatore)


# Policy globale (puntatore)

Contenuto in wiki di progetto — non duplicare nei moduli ([#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [docs/wiki/rules/00-TRIGGER_MAP.md](../../../../docs/wiki/rules/00-TRIGGER_MAP.md)

### `product-roadmap-1.md` — product-roadmap-1


See canonical documentation: ../../../Themes/docs/shared-components/PRODUCT_ROADMAP-Modules.md

### `product-roadmap.md` — User Module - Product Roadmap

# User Module - Product Roadmap

**Module:** User  
**Version:** 1.0.0  
**Last Updated:** March 12, 2026  
**Owner:** Product Team  
**Status:** In Development

---

## Vision Statement

To build a **comprehensive user management system** that provides secure authentication, rich user profiles, and seamless identity management while respecting privacy and enabling personalized experiences.

### Vision Pillars

1. **Security:** Enterprise-grade authentication and authorization
2. **Privacy:** User data protection and control
3. **Flexibility:** Extensible user profiles
4. **Experience:** Smooth onboarding and management

### `profile-management-2.md` — Profile Management in Laravel Modules


# Profile Management in Laravel Modules

## Overview
This document outlines the best practices for managing user profiles within a Laravel module, allowing users to view and update their personal information.

## Key Principles
1. **User Control**: Enable users to manage their profile data securely and easily.
2. **Data Integrity**: Ensure profile updates are validated to maintain data quality.
3. **Privacy**: Protect sensitive user information with appropriate access controls.

## Implementation Guidelines
### 1. Profile View
- Provide a dedicated page or section for users to view their profile information.
  ```blade
  <!-- Example Blade Profile View -->
  <div>
      <h1>{{ auth()->user()->name }}</h1>
      <p>Email: {{ auth()->user()->email }}</p>
  </div>

### `profile-management.md` — Profile Management in Laravel Modules


# Profile Management in Laravel Modules

## Overview
This document outlines the best practices for managing user profiles within a Laravel module, allowing users to view and update their personal information.

## Key Principles
1. **User Control**: Enable users to manage their profile data securely and easily.
2. **Data Integrity**: Ensure profile updates are validated to maintain data quality.
3. **Privacy**: Protect sensitive user information with appropriate access controls.

## Implementation Guidelines
### 1. Profile View
- Provide a dedicated page or section for users to view their profile information.
  ```blade
  <!-- Example Blade Profile View -->
  <div>
      <h1>{{ auth()->user()->name }}</h1>
      <p>Email: {{ auth()->user()->email }}</p>
  </div>

### `profile.md` — profile


See canonical documentation: ../../../Themes/docs/shared-components/profile.md

### `profiles-id-uuid-policy.md` — Profiles Id/Uuid Policy


# Profiles Id/Uuid Policy

## Contract

The `profiles` table must follow this identity contract:

- `id`: primary key, integer, auto-increment
- `uuid`: separate stable external identifier

`id` is the relational database key.
`uuid` is the portable public/application identifier.

## Why

- integer primary keys keep joins, indexes, and legacy relations simpler;
- `uuid` remains available for external references, APIs, imports, and cross-system correlation;
- mixing both responsibilities into a single `id` column creates migration drift between legacy installs and current models;
- `BaseProfile` already generates `uuid` on create, so the schema must expose the column consistently.


### `prompts/01.md` — 01

adesso documenta e non implementa la conversione del compoente livewire laravel/Modules/User/app/Http/Livewire/Profile/SuperAdmin.php  a filament widget , devi documentare anche le modifiche da fare dentro laravel/Modules/User/app/Providers/Filament/AdminPanelProvider.php , ripeto solo documentare e non implementare, e creazione di tutti i documenti bmad

gh e' autenticato, adesso documenta tutti i componenti livewire che potremmo convertire in filament widget , ripeto solo documentare e non implementare, e creazione di tutti i documenti bmad  e documenta anche i vantaggi di avere solo filament widget e non anche livewire component e perche' e' cosi' importante e urgente fare questa conversione

studia https://filamentphp.com/docs/5.x/styling/icons  e https://filamentphp.com/docs/5.x/compo

### `prompts/02.md` — 02

studia
laravel/Modules/User/app/Filament/Widgets/Pulse/LoginWidget.php
laravel/Modules/User/app/Console/Commands/BackfillLoginPulseCommand.php
laravel/Modules/User/app/Actions/Login/RecordLoginPulseAction.php
laravel/Modules/User/app/Actions/Login/GetLoginStatsAction.php
cerca di capire cosa volevo fare, l'obiettivo, il senso e fa tutto con bmad + ecc + second brain e devi capire perche BackfillLoginPulseCommand non funziona , e a me interessa importare in pulse tutto AuthenticationLog, cerca di capire anche perche' cosa sto cercando di fare

### `prompts/fix01.md` — fix01


in /home/ploi/sottana.com/laravel/Modules/User/app/Filament/Widgets/Auth/LoginWidget.php
hai usato piu' volte ->label(  e ->placeholder( ti ho gia' detto molte volte di non utilizzarli ! perche' gestiamo tutto con i files di traduzione tramite il service provider LangServiceProvider, percio' aggiorna le tue cartelle docs , le tue rules, le tue memories , le tue skills

[RISOLTO 2026-02] Rimossi tutti i ->label() e ->placeholder() da LoginWidget. Traduzioni da user::login_widget (lang/it/login_widget.php). Vedi login-widget-fix.md e widgets/translation-guidelines.md.

### `prompts/fix02.md` — fix02


[COMPLETATO] OauthAccessToken rimosso, consolidato su OauthToken.

[COMPLETATO] OauthClient: Authorizable + HasRoles (ref aurmich/sample_passport), user() con XotData, test OauthClientTest.

Laravel\Passport\AccessToken non è un modello Eloquent (è un DTO).
OauthAccessToken.php rinominato in OauthAccessToken.php.old.
Tutti i riferimenti aggiornati a OauthToken.
Policy rinominata OauthAccessTokenPolicy → OauthTokenPolicy.
Vedi docs/oauth-access-token-removal.md


controlla tutti i modelli dentro laravel/vendor/laravel/passport/src  che abbiamo una classe dentro laravel/Modules/User/app/Models  che abbia lo stesso nome con il suffisso Oauth  che estenda la classe di passport, percio' che abbia anche le policy , e tutto il corredo di filament (resources, widget, relationmanager etc etc ),

u

### `prompts/push.md` — push


va nella cartella laravel/Modules/User e fa git push , capisci gli errori sistameli e documenta come hai risolto dentro laravel/Modules/User/docs ti ricordo che con git andiamo solo in avanti, percio' non puoi fare checkout revert rollback, ma puoi anzi devi studiare le vecchie versioni e ti ricordo che il tuo lavoro non e' finito finche' non supera anche il controllo di phpstan phpmd, phpinisghts tutta la cartella laravel/Modules/User

### `pulse-login-monitoring.md` — Monitoraggio login


# Monitoraggio login

## Sorgente di verità

`authentication_logs` (connessione `user`, DB `ptv_user`) è lo storico completo dei
login. Il modello è `Modules\User\Models\AuthenticationLog`.

## Due percorsi, due scopi

| Percorso | Dati | Orizzonte |
|----------|------|-----------|
| Pulse (`user_login`, key `all`) | `RecordLoginPulseAction` live + `user:pulse-backfill-logins` | max 7 giorni |
| `GetLoginStatsAction` | legge `authentication_logs` | tutto lo storico |
| `GetLoginHistoryAction` | serie giorno/mese da `authentication_logs` | tutto lo storico |

Semantica condivisa: si contano **tutte** le righe con timestamp valorizzato,
anche `login_successful = false` (tentativi falliti). `LoginListener` e
`FailedLoginListener` chiamano `RecordLoginPulseAction` con lo stesso `$loginAt`
di 

### `purpose.md` — User — perche' esiste


# User — perche' esiste

## Lo scopo in una frase

**User risponde a tre domande e non ad altre: chi sei, cosa puoi fare, per conto di
chi. Tutto il resto che si sa di una persona appartiene al dominio, non a User.**

## L'evidenza

- 666 file PHP, 57 Action, **20 Widget**: il numero di widget dice che qui l'interfaccia
  conta — login, profilo, gestione team sono superfici che l'utente tocca davvero.
- OAuth completo (`OauthClient`, `OauthAccessToken`, `OauthRefreshToken`,
  `OauthAuthCode`, `OauthPersonalAccessClient`): non solo login web, anche accesso
  programmatico.
- `AuthenticationLog`, `Device`: chi e' entrato, da dove. In una pubblica
  amministrazione non e' un lusso, e' un requisito.
- `Feature` (Pennant): funzionalita' attivabili per utente o per contesto.
- `BaseUser`, `Base

### `quality-audit.md` — Audit di qualita — modulo User


# Audit di qualita — modulo User

Misurato il 1 settembre 2026 a tree fermo. Ogni numero viene da un comando
eseguito, non da una stima; i comandi sono in fondo, cosi la misura si puo
rifare e contestare.

## Stato misurato

| Metrica | Valore |
|---|---:|
| File PHP | 1799 |
| Righe di codice | 122101 |
| File di test `*Test.php` | 137 |
| Casi di test | 1134 |
| Casi di test per file PHP | 0.63 |
| `@phpstan-ignore` nel codice | 1 |
| Rilievi PHPMD su `app/` | 471 |
| PHPInsights — Code | 91.8 % |
| PHPInsights — Complexity | 100.0 % |

### `quality-improvements-summary.md` — quality-improvements-summary


See canonical documentation: ../../../Themes/docs/shared-components/quality-improvements-summary.md

### `quality-improvements.md` — Quality Improvements Summary - PHPStan, PHPMD, PHP Insights


# Quality Improvements Summary - PHPStan, PHPMD, PHP Insights

## Data: [DATE]

## Riepilogo Risultati

### PHPStan Level 10
**Status**: ✅ **COMPLETATO - 0 errori in tutti i moduli!**

- Modulo User: 0 errori (da ~221 iniziali)
- Tutti i moduli: 0 errori
- Conformità: 100% PHPStan Level 10

### PHPMD (PHP Mess Detector)
**Status**: ✅ **Warning principali risolti**

#### Problemi Risolti
1. **Collisione trait method `trans`** in `CreateSchedule.php` - RISOLTO
2. **Variabili inutilizzate** rimosse:

### `quality-report.md` — Quality Report — User


# Quality Report — User

Aggiornato: 2026-08-24. Rigenera con: `bashscripts/tools/quality-report.sh User`

| Metrica | Valore |
|---|---|
| File PHP (app/) | 664 |
| LOC app/ | 38321 |
| File test | 164 |
| LOC test | 20860 |
| Test/App LOC ratio | 54.4% |
| PHPStan (level max) |  |

## Come misurare la coverage Pest

```bash
cd laravel
XDEBUG_MODE=coverage php -d memory_limit=2G ./vendor/bin/pest Modules/User/tests \
  --coverage-text --colors=never

### `quality-roadmap.md` — Quality roadmap — User


# Quality roadmap — User

Modulo **foundation** — non è un modulo GC importato ma è prerequisito di perfezione globale.

## Stato perfezione (2026-08-31)

| Dimensione | Stato |
|------------|-------|
| PHPStan | Documentato in `quality-status.md` |
| Pest | Ampio; `MigrateDbTest` skip dati sacri |
| `import-status.md` | **Atipico** (log fix, non checklist GC) |
| Spatie roles | **Blocco D17** per tutti i test admin |

---

## Azioni ordinate

1. **D17** — tabella `roles` + permission su DB test (sblocca tutta la piattaforma).
2. **D12** — ownership migrazione `users` vs Auth.

### `quality-tooling.md` — quality-tooling


See canonical documentation: ../../../Themes/docs/shared-components/quality-tooling.md

### `quality.md` — User Module - Quality Status (November 2025)


# User Module - Quality Status (November 2025)

## 🎯 Overview

Modulo critico per autenticazione ridotto da 13 errori a ~5 errori PHPStan livello max.

## 📊 Static Analysis Results

### PHPStan Level MAX ⚠️
```bash
Status: IMPROVED (13 → ~5 errors)
Priority: CRITICAL (authentication/authorization module)
```

## ✅ Fixes Applied

### 1. ChangeTypeCommand.php
**Issue**: Access to undefined method `BackedEnum::getLabel()` + mixed type operations


### `quick-start.md` — User Module — Quick Start


# User Module — Quick Start

## Installation

```bash
php artisan migrate --path=Modules/User/database/migrations
```

## Create First User

```php
use Modules\Xot\Contracts\UserContract;
use Illuminate\Support\Facades\Hash;

$user = User::create([
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'name' => 'Admin User',
]);

### `r1-form-fields-self-validate.md` — R1 religion — form fields self-validate, widget thin conductor (User module)


# R1 religion — form fields self-validate, widget thin conductor (User module)

> Modulo: `User` · Autore code: opencode (MiniMax-M3) · Issue tracking: base #264

## La regola

**I campi del form si auto-validano e si auto-deidratano. Il widget è un conduttore sottile (5-10 LOC).**

❌ Vietato nel widget:
- `validateForm()` method
- `Hash::make` / `SafeStringCastAction` / `cast` in `submit()`
- wrapper Action per `Model::create()`
- `'type' => 'standard'` o altri magic values che parental/HasChildren cerca di istanziare

✅ Obbligatorio nella Form class:
- `->dehydrateStateUsing(static fn($s) => Hash::make($s))` sul campo `password`
- `->dehydrated(false)` su `password_confirmation`
- `->rules(['required', 'email', 'confirmed'])` oppure conferma via `password_confirmation` field


### `readme-en.md` — 👤 User — English presentation


# 👤 User — English presentation

[![Domain-Auth](https://img.shields.io/badge/Domain-Auth%20%26%20Teams-1565C0.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://im

### `readme-fullcalendar-scheduler.md` — FullCalendar Scheduler Documentation - README

# FullCalendar Scheduler Documentation - README

## 🎯 Obiettivo

Questa documentazione è stata creata per risolvere i problemi comuni relativi alle licenze FullCalendar Scheduler nel progetto SaluteOra, basandosi sulla ricerca approfondita della documentazione ufficiale di FullCalendar e dei problemi noti nella community.

## 📚 Documenti Creati

### 1. **Troubleshooting Completo** 
📄 `fullcalendar-scheduler-license-troubleshooting.md`
- **400+ righe** di documentazione dettagliata
- Copertura completa di tutti i problemi noti
- Soluzioni specifiche per Laravel/Filament
- Best practices per ambiente sanitario SaluteOra

### 2. **Riferimento Rapido**
📄 `fullcalendar-scheduler-quick-reference.md`
- **200+ righe** di soluzioni immediate
- Fix rapidi per errori comuni
- Checklist di verifica

### `readme-new.md` — User Module - Authentication & Authorization


# User Module - Authentication & Authorization

**Last Update**: 2025-12-05
**Status**: ✅ Production Ready
**PHPStan Level**: 10
**Maintainers**: Laraxot Team

---

## 📋 Table of Contents

- [Business Overview](#-business-overview)
- [Architecture](#-architecture)
- [Core Components](#-core-components)
- [Quick Start](#-quick-start)
- [Development Guide](#-development-guide)
- [Security](#-security)
- [API & Integration](#-api--integration)
- [Testing](#-testing)

### `redundancy-analysis.md` — redundancy-analysis


See canonical documentation: ../../../Themes/docs/shared-components/redundancy-analysis.md

### `redundancy-audit.deprecated.md` — redundancy-audit.deprecated


<<<<<<< .merge_file_FjMgwE
<<<<<<< .merge_file_j9WrGJ
<<<<<<< HEAD
=======
>>>>>>> .merge_file_OGrhYN
> Questo file è stato rinominato in [redundancy-audit-2.deprecated.md](redundancy-audit-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
> Questo file è stato rinominato in [redundancy-audit-2.deprecated.md](./redundancy-audit.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
<<<<<<< .merge_file_FjMgwE
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
> Questo file è stato rinominato in [redundancy-audit-.deprecated.md](redundancy-audit-.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.
>>>>>>> .merge_file_Rr6zcI
=======
>>>>>>> .merge_file_OGrhYN

### `redundancy-report.md` — Redundancy Report — Modulo User


# Redundancy Report — Modulo User

> Generato: 2026-05-21 | Analisi automatica deep-scan

## Problemi Trovati

### 1. 🔴 Oauth Resources — 5 risorse duplicate (Cluster vs Standalone)

Il modulo User contiene **due copie complete** delle risorse Oauth: una nel Cluster `Passport` e una standalone in `Resources/`.

| Resource | Cluster (`Clusters/Passport/Resources/`) | Standalone (`Resources/`) |
|----------|------------------------------------------|--------------------------|
| OauthAccessTokenResource | ✅ | ✅ duplicato |
| OauthAuthCodeResource | ✅ | ✅ duplicato |
| OauthClientResource | ✅ | ✅ duplicato |
| OauthPersonalAccessClientResource | ✅ | ✅ duplicato |
| OauthRefreshTokenResource | ✅ | ✅ duplicato |
| OauthDeviceCodeResource | ✅ | ❌ solo nel Cluster |


### `redundancyes.md` — Correzioni Ridondanze - Gennaio 2026


# Correzioni Ridondanze - Gennaio 2026

## Problema Identificato

Durante l'implementazione della gestione completa di Passport, sono state introdotte due ridondanze critiche che violano il principio DRY:

1. **HasXotTable ridondante** in RelationManager
2. **Passport policies** registrate in `UserServiceProvider` invece che in `PassportServiceProvider`

## Correzioni Applicate

### 1. Rimozione HasXotTable Ridondante

**Problema**: `UsersRelationManager` aveva `use HasXotTable;` anche se `XotBaseRelationManager` già lo include.

**Correzione**: Rimosso `use HasXotTable;` da `UsersRelationManager` (non era presente nel file, ma era stato aggiunto in precedenza).

**File**: `laravel/Modules/User/app/Filament/Resources/SsoProviderResource/RelationManagers/UsersRelationManager.php`


### `relazioni-utenti-team.md` — Relazione utenti-team: tabella pivot `doctor_team`

# Relazione utenti-team: tabella pivot `doctor_team`

## Contesto
Questa documentazione descrive la relazione many-to-many tra utenti e team nel modulo User. La tabella pivot `doctor_team` è necessaria per collegare utenti e team secondo le convenzioni del progetto.

## Errore riscontrato
**Errore:** Tabella `doctor_team` mancante nel database, causava QueryException nelle relazioni Eloquent.

## Soluzione
- Creata la migrazione per la tabella `doctor_team` estendendo `XotBaseMigration`.
- Seguite le best practice documentate in [docs/database-migrations.md](mdc:../../../../docs/database-migrations.md).

## Collegamenti
- [Documentazione generale sulle migrazioni](mdc:../../../../docs/database-migrations.md)
<<<<<<< .merge_file_UwZDMS
=======
- [Best practice XotBaseMigration](mdc:../../xo

### `release-marketing-standard.md` — Release e README marketing — User


# Release e README marketing — User

## Scopo

Ogni modulo/tema deve essere pubblicabile, comprensibile e desiderabile: workflow release, changelog automatico e README vetrina.

## File canonici locali

- `../README.md`
- `../.github/workflows/semantic-release.yml`
- `../.releaserc.json`
- `../CHANGELOG.md`

## Confidenza

La configurazione usa semantic-release con Conventional Commits, changelog, GitHub release e commit automatico del changelog.

### `repos.md` — repos


# repos

<!-- Contenuto migrato da _docs/repos.txt -->

https://github.com/solutionforest/filament-access-management

### `repositories.md` — repositories


See canonical documentation: ../../../Themes/docs/shared-components/repositories.md

### `resource-implementation-philosophy.md` — Internal Analysis: Approaches to Missing Filament Resources


# Internal Analysis: Approaches to Missing Filament Resources

## 🥊 Philosophical Battle: Two Approaches Clash

### Approach 1: "Comprehensive Coverage" (The Optimist)
**Philosophy**: "Every model deserves a resource!"
- **Logic**: All models should have resources for complete admin control
- **Business Logic**: Full CRUD access to all entities
- **Politics**: Democratic approach - all models are equal
- **Religion**: Every model has inherent value
- **Zen**: Complete visibility and control

### Approach 2: "Strategic Implementation" (The Strategist) ✅ **WINNER**
- **Logic**: Not all models need direct admin interfaces
- **Business Logic**: Focus on high-value business operations
- **Politics**: Prioritize based on actual business needs
- **Religion**: Quality over quantity in admin inter

### `resource-implementation.md` — resource-implementation


See canonical documentation: ../../../Themes/docs/shared-components/resource-implementation-philosophy.md

### `resource-translation-violation-critical-fix.md` — resource-translation-violation-critical-fix


See canonical documentation: ../../../Themes/docs/shared-components/resource-translation-violation-critical-fix.md

### `resource-translation-violation-critical.md` — CRITICAL VIOLATION: Hardcoded Labels in XotBaseResource Extensions


# CRITICAL VIOLATION: Hardcoded Labels in XotBaseResource Extensions

**Agente AI**: Claude Code (Sonnet 4.5)
**Severity**: 🔴 **CRITICAL** - Violates Laraxot translation architecture
**Status**: 🔥 **REQUIRES IMMEDIATE FIX**

---

## 🚨 THE VIOLATION

### Resources Have Hardcoded Label Methods That Bypass Translation System

**Affected Resources**:
- `User/Filament/Resources/AuthenticationLogResource.php`
- `User/Filament/Resources/PasswordResetResource.php`
- `User/Filament/Resources/TeamPermissionResource.php`
- `User/Filament/Clusters/Passport/Resources/OauthAccessTokenResource.php`

**Violation Type**: Override methods from `NavigationLabelTrait` with hardcoded strings

### `resources-array-keys-philosophy.md` — resources-array-keys-philosophy


See canonical documentation: ../../../Themes/docs/shared-components/resources-array-keys-philosophy.md

### `resources-array-keys.md` — Resources Array Keys Philosophy: String Keys Always


# Resources Array Keys Philosophy: String Keys Always

## Data: [DATE]

## Il Dibattito Feroce

### 🎭 Protagonisti

**Il Purista** (Type Safety e Coerenza)
vs
**Il Pragmatico** (Semplice e Funziona)

---

## Round 1: Array Keys: String o Int?

### 🔴 Il Purista Attacca

> "Tutti i metodi che restituiscono array di componenti Filament DEVONO usare chiavi stringhe! È richiesto da Filament e XotBaseResource! `array<int, Component>` è SBAGLIATO!"

### `resources-corrections-summary.md` — Resources Corrections Summary - 2025-01-22


# Resources Corrections Summary - 2025-01-22

## Obiettivo
Correggere errori PHPStan livello 10, PHPMD e PHP Insights nelle Resources Filament del modulo User, seguendo rigorosamente le regole Laraxot e la filosofia DRY + KISS.

## Filosofia Applicata

### DRY (Don't Repeat Yourself)
- **XotBaseResource getPages() Automatic**: Rimossi metodi `getPages()` duplicati da Resources che seguono le convenzioni di naming
- **Convenzioni Standard**: `List{Plural}`, `Create{Name}`, `Edit{Name}`, `View{Name}`

### KISS (Keep It Simple, Stupid)
- **Late Static Binding**: Usato `self::` invece di `static::` per classi `final`
- **Import Corretti**: Rimossi import non utilizzati
- **Tipi Corretti**: Usato tipi base (`BaseFilter`, `Action`) invece di sottotipi specifici

### Type Safety
- **Array Keys**

### `resources-corrections.md` — Resources Corrections Summary - [DATE]


# Resources Corrections Summary - [DATE]

## Obiettivo
Correggere errori PHPStan livello 10, PHPMD e PHP Insights nelle Resources Filament del modulo User, seguendo rigorosamente le regole Laraxot e la filosofia DRY + KISS.

## Filosofia Applicata

### DRY (Don't Repeat Yourself)
- **XotBaseResource getPages() Automatic**: Rimossi metodi `getPages()` duplicati da Resources che seguono le convenzioni di naming
- **Convenzioni Standard**: `List{Plural}`, `Create{Name}`, `Edit{Name}`, `View{Name}`

### KISS (Keep It Simple, Stupid)
- **Late Static Binding**: Usato `self::` invece di `static::` per classi `final`
- **Import Corretti**: Rimossi import non utilizzati
- **Tipi Corretti**: Usato tipi base (`BaseFilter`, `Action`) invece di sottotipi specifici

### Type Safety
- **Array Keys**: Se

### `roadmap/00-overview.md` — Roadmap overview (Module User)


# Roadmap overview (Module User)

## Scope

## Goals

## Non-goals

### `roadmap/01-current-state.md` — Current State - User


# Current State - User

## Baseline

- Stato attuale documentato nei file `docs/` del Modulo.
- Presenza di roadmap strutturata in sotto-file.
- Necessita verifica periodica di coerenza tra codice e documentazione.

## Immediate checks

1. Coerenza tra regole architetturali e implementazione runtime.
2. Coerenza tra naming, namespace e percorsi view/traduzioni.
3. Copertura test minima per i flussi critici.

### `roadmap/01-now.md` — Now (Module User)


# Now (Module User)

## Stabilization

## Bugfixes

## Quality gates

### `roadmap/02-goals.md` — Goals - User


# Goals - User

## Short Term

1. Allineare documentazione e stato reale del codice.
2. Ridurre i punti di fragilita piu frequenti.
3. Consolidare checklist operative per incident response.

## Medium Term

1. Aumentare test di regressione sui flussi critici.
2. Migliorare osservabilita e diagnosi errori.
3. Ridurre duplicazioni tra documenti e tra componenti.

## Long Term

1. Stabilita sotto fault randomizzati (chaos testing).
2. Manutenibilita alta con onboarding rapido.

### `roadmap/02-next.md` — Next (Module User)


# Next (Module User)

## Features

## Refactors

### `roadmap/03-later.md` — Later (Module User)


# Later (Module User)

## Longer-term ideas

### `roadmap/03-workstreams.md` — Workstreams - User


# Workstreams - User

## WS1 Architecture

- Verifica confini e responsabilita dei componenti.
- Aggiornamento pattern e guardrail.

## WS2 Reliability

- Hardening dei flussi principali.
- Miglioramento fallback e recovery path.

## WS3 Documentation

- Consolidamento documenti canonici.
- Eliminazione drift documentale.

## WS4 Testing


### `roadmap/04-milestones.md` — Milestones - User


# Milestones - User

## M1 Documentation Baseline

- `roadmap.md` allineato e `docs/roadmap/` completo.
- Link relativi verificati.

## M2 Operational Readiness

- Checklist incident response disponibile.
- Procedure di recovery validate sui casi principali.

## M3 Regression Safety

- Test minimi sui flussi critici in esecuzione regolare.
- Riduzione regressioni ricorrenti.

### `roadmap/04-risks.md` — Risks and dependencies (Module User)


# Risks and dependencies (Module User)

## Risks

## Dependencies

### `roadmap/05-risks.md` — Risks - User


# Risks - User

## Top Risks

1. Drift tra documentazione e comportamento runtime.
2. Regressioni introdotte da fix rapidi non verificati.
3. Dipendenze incrociate non documentate.

## Mitigations

1. Aggiornare docs insieme ai fix di codice.
2. Usare checklist pre-merge e post-fix.
3. Mantenere un set di file canonici per diagnosi rapida.

### `roadmap/2fa.md` — Two-Factor Authentication - 70% Completato


# Two-Factor Authentication - 70% Completato

## Descrizione
Implementazione dell'autenticazione a due fattori per aumentare la sicurezza degli account utente.

## Funzionalità

### Metodi 2FA [75%]
- [✓] Google Authenticator
- [✓] Email OTP
- [-] SMS OTP [60%]
- [-] Backup Codes [70%]

### Setup Process [80%]
- [✓] Enable/Disable 2FA
- [✓] QR Code Generation
- [✓] Secret Key Backup
- [-] Recovery Options [70%]


### `roadmap/chaos-readiness.md` — User Chaos Readiness - 2026-03-02


# User Chaos Readiness - 2026-03-02

## Scope
- Authentication/provider robustness after static analysis hardening.

## Completed
- Fixed provider/widget-level issues discovered by module analysis.
- Verified `Modules/User` passes PHPStan.

## Next Chaos Steps
- Inject missing OAuth provider classes and validate graceful degradation.
- Add regression tests for register widget logging/error paths.

### `roadmap/current-state.md` — current-state


See canonical documentation: ../../../../Themes/docs/shared-components/01-current-state-Modules.md

### `roadmap/features/audit-logging.md` — Audit Logging


# Audit Logging

## Overview
**Status**: In Progress (35%)
**Priority**: Medium
**Target Date**: Q3 2025

## Feature Description
Sistema completo di logging per audit delle attività degli utenti, con supporto per tracciamento dettagliato e reportistica.

## Current Progress
- Activity tracking: 40%
- Data storage: 35%
- Reporting system: 30%
- Search functionality: 35%

## Technical Requirements
- Sistema di tracciamento attività
- Storage ottimizzato

### `roadmap/features/autenticazione.md` — Autenticazione


# Autenticazione

## Overview
**Status**: Completed (100%)
**Priority**: High
**Target Date**: 2024-04-01
## Feature Description
Sistema di autenticazione completo con supporto per multiple strategie di login, 2FA e gestione sessioni.
## Current Progress
- Login system: 100%
- 2FA implementation: 100%
- Session management: 100%
- Security features: 100%
## Technical Requirements
- Sistema di login
- Implementazione 2FA
- Gestione sessioni
- Sicurezza avanzata
## Metrics

### `roadmap/features/autorizzazione.md` — Autorizzazione


# Autorizzazione

## Overview
**Status**: Completed (100%)
**Priority**: High
**Target Date**: 2024-04-01

## Feature Description
Sistema di autorizzazione basato su ruoli e permessi, con supporto per politiche personalizzate e caching.

## Current Progress
- Role-based access: 100%
- Permission system: 100%
- Policy implementation: 100%
- Cache system: 100%

## Technical Requirements
- Sistema RBAC
- Gestione permessi

### `roadmap/features/gestione-teams.md` — Gestione Teams


# Gestione Teams

⬅️ [Torna alla Roadmap](../../roadmap.md)

## Stato Attuale
**Completamento: 100%**

## Overview
Sistema di gestione dei team utente con supporto per ruoli, permessi e multi-tenancy.

## Obiettivi
- [x] Implementazione HasTeams trait (100%)
- [x] Gestione ruoli per team (100%)
- [x] Multi-tenancy support (100%)
- [x] Validazione dati (100%)
- [x] Logging e monitoring (100%)

## Guida Step-by-Step


### `roadmap/features/gestione-utenti.md` — Gestione Utenti


# Gestione Utenti

## Overview
**Status**: Completed (100%)
**Priority**: High
**Target Date**: 2024-04-01

## Feature Description
Sistema completo per la gestione degli utenti, inclusi CRUD, validazione e integrazione con il sistema di autorizzazione.

## Current Progress
- CRUD operations: 100%
- Data validation: 100%
- Authorization integration: 100%
- API endpoints: 100%

## Technical Requirements
- Sistema CRUD utenti
- Validazione dati

### `roadmap/features/legacy-code-cleanup.md` — Legacy Code Cleanup


# Legacy Code Cleanup

## Overview
Clean up and modernize the User module codebase by removing legacy code and updating to current standards.
## Current Issues
### Legacy Directories
1. app_old/
   - Contains outdated implementations
   - May contain deprecated functionality
   - Potential security risks
2. config_old/
   - Outdated configuration files
   - May conflict with current settings
3. database_old/
   - Old migrations
   - Outdated seeders
   - Legacy factory definitions
## Implementation Plan
### Phase 1: Analysis

### `roadmap/features/user-analytics.md` — User Analytics


# User Analytics

## Overview
**Status**: In Progress (45%)
**Priority**: Medium
**Target Date**: Q3 2025

## Feature Description
Sistema di analisi e monitoraggio degli utenti, inclusi pattern di utilizzo, metriche di sicurezza e statistiche di accesso.

## Current Progress
- Usage patterns: 50%
- Security metrics: 40%
- Access statistics: 45%
- Reporting system: 40%

## Technical Requirements
- Sistema di raccolta metriche
- Dashboard analitica

### `roadmap/features/user-traits.md` — User Traits Implementation


# User Traits Implementation

## Overview
Implementation of core traits for user management, authentication, and authorization.
## Technical Implementation
### HasTeams Trait
#### Requirements
- Must only be used in models extending Authenticatable
- Requires HasRoles trait
- Required database tables:
  - teams (with specified columns)
  - team_user (with specified columns)
#### Implementation Details
```php
/**
 * @property-read Collection<Team> $teams
 */
trait HasTeams
{

### `roadmap/goals.md` — goals


See canonical documentation: ../../../../Themes/docs/shared-components/02-goals-Modules.md

### `roadmap/later.md` — later


See canonical documentation: ../../../../Themes/docs/shared-components/03-later-Modules.md

### `roadmap/milestones.md` — milestones


See canonical documentation: ../../../../Themes/docs/shared-components/04-milestones.md

### `roadmap/next.md` — next


See canonical documentation: ../../../../Themes/docs/shared-components/02-next.md

### `roadmap/now.md` — now


See canonical documentation: ../../../../Themes/docs/shared-components/01-now-Modules.md

### `roadmap/overview.md` — overview


See canonical documentation: ../../../../Themes/docs/shared-components/00-overview-Modules.md

### `roadmap/phases.md` — Fasi di sviluppo - User Module


# Fasi di sviluppo - User Module

## Fase 1: Stability & Security (In Progress)

- [x] PHPStan Level 10 Compliance
- [x] Standardizzazione del pattern ID (autoincrement) e UUID per i profili
- [ ] Rimozione definitiva dei 550+ file obsoleti
- [ ] Implementazione del **Security Cluster** in Filament v5
- [ ] Supporto completo per **Laravel 12 Authentication Features**

## Fase 2: Modern Identity (Planned)

- [ ] Integrazione **WebAuthn** per login biometrici (TouchID, FaceID)
- [ ] Socialite Cluster: aggiunta facile di nuovi provider OAuth (Google, Apple, etc.)
- [ ] Sistema di "Impersonation" sicuro per il supporto tecnico (SuperAdmin)

## Fase 3: AI Moderation (Future)

- [ ] **AI Identity Verification**: Verifica automatica dei documenti caricati (es. tesserini medici)

### `roadmap/q4-roadmap.md` — User Module Roadmap (2025 Q4)


# User Module Roadmap (2025 Q4)

## Vision & Scope
- Ensure `Modules/User/` is the canonical identity, auth, roles/permissions, teams, and profile layer.
- Full compliance with Laraxot rules (Xot base classes, Filament 4 patterns, translations, strict types).

## Key Outcomes
- PHPStan 0 errors for `Modules/User/`.
- Filament v4 stable migration completed (no deprecated APIs).
- Contracts alignment with `Modules\Xot\Contracts\*` and consistent relations.

## References
- Filament v4: https://filamentphp.com/docs/4.x/upgrade-guide
- What’s new in v4: https://filamentphp.com/content/leandrocfe-whats-new-in-filament-v4
- Stable: https://filamentphp.com/content/alexandersix-filament-v4-is-stable
- Examples: https://filamentexamples.com/tutorial/filament-v3-v4-upgrade
- Forms v4: https://filam

### `roadmap/quality.md` — Checklist qualità - User Module


# Checklist qualità - User Module

- [x] PHPStan Level 10
- [ ] 100% test coverage sui flussi critici di Auth
- [ ] Auditing delle chiavi segrete e dei token (Passport/Sanctum)

### `roadmap/risks-1.md` — risks-1


See canonical documentation: ../../../../Themes/docs/shared-components/05-risks-Modules.md

### `roadmap/risks.md` — risks


See canonical documentation: ../../../../Themes/docs/shared-components/04-risks-Modules.md

### `roadmap/technical-debt.md` — Technical Debt - User Module


# Technical Debt - User Module

| Area | Stato | Target |
|------|-------|--------|
| File obsoleti | 550+ | 0 |
| Security Cluster | Da implementare | Filament v5 Cluster |
| Test Auth | Parziale | 100% flussi critici |
| Passport/Sanctum | In uso | Auditing token |

## Dipendenze

- **Xot**: XotBaseResource, XotBasePage
- **Gdpr**: Consensi registrazione
- **Tenant**: Multi-tenant (se attivo)

### `roadmap/vision.md` — Visione - User Module


# Visione - User Module

Diventare un identity provider completo (IdP) che supporta:

- Standard moderni come Passkeys (WebAuthn)
- Esperienza di login fluida e sicura
- Modelli di moderazione proattiva basati su AI

### `roadmap/workstreams.md` — workstreams


See canonical documentation: ../../../../Themes/docs/shared-components/03-workstreams-Modules.md

### `roadmap-1-1.md` — roadmap-1-1


See canonical documentation: ../../../Themes/docs/shared-components/roadmap.md

### `roadmap-and-issues.md` — User Module - Roadmap, Issues & Optimization


# User Module - Roadmap, Issues & Optimization

**Modulo**: User (Authentication, Authorization, Profiles)  
**Data Analisi**: 1 Ottobre 2025  
**Maintainer**: Team FixCity  
**Status PHPStan**: ⚠️ 95 errori (Level 10)

---

## 📊 STATO ATTUALE

### Completezza Funzionale: 85%

| Area | Completezza | Note |
|------|-------------|------|
| Authentication | 100% | Login, Register, Password Reset |
| Authorization | 90% | Spatie Permissions integrato |
| Profiles | 80% | Base implementato |
| Teams | 70% | Appena aggiunto |

### `roadmap-ands.md` — User Module - Roadmap, Issues & Optimization


# User Module - Roadmap, Issues & Optimization

**Modulo**: User (Authentication, Authorization, Profiles)  
**Data Analisi**: 1 Ottobre 2025  
**Maintainer**: Team FixCity  
**Status PHPStan**: ⚠️ 95 errori (Level 10)

---

## 📊 STATO ATTUALE

### Completezza Funzionale: 85%

| Area | Completezza | Note |
|------|-------------|------|
| Authentication | 100% | Login, Register, Password Reset |
| Authorization | 90% | Spatie Permissions integrato |
| Profiles | 80% | Base implementato |
| Teams | 70% | Appena aggiunto |

### `roadmap-complete.md` — 🗺️ ROADMAP COMPLETA - Modulo User


# 🗺️ ROADMAP COMPLETA - Modulo User

## 📊 Business Logic

### Scopo Principale
Il modulo **User** è il cuore dell'autenticazione, autorizzazione e gestione utenti della piattaforma FixCity. Gestisce cittadini, operatori, amministratori con permessi granulari e profili personalizzabili.

### Responsabilità
- ✅ Autenticazione (Laravel Auth + Socialite)
- ✅ Autorizzazione (Spatie Permissions)
- ✅ Gestione profili utente e ruoli
- ✅ Multi-tenancy (HasTeams)
- ✅ Tracciamento attività utente
- 🚧 2FA / Two-Factor Authentication
- 🚧 Password policies avanzate
- 🚧 Session management e security

---


### `roadmap-conflict.md` — 👥 USER MODULE - ROADMAP 2025


# 👥 USER MODULE - ROADMAP 2025

**Modulo**: User (Authentication & Authorization)
**Status**: 90% COMPLETATO
**Priority**: HIGH
**PHPStan**: ✅ level 10 (0 errori)
**Filament**: ✅ 4.x Compatibile

---

## 🎯 MODULE OVERVIEW

Il modulo **User** è il fondamento dell'architettura, gestendo autenticazione, autorizzazione, profili utente e sistema di ruoli e permessi.

### 🏗️ Architettura Modulo
```
User Module
├── 🔐 Authentication (Core)
│   ├── Models: User, BaseUser

### `roadmap-miglioramenti.md` — User — cosa migliorerei se questo modulo fosse mio per un mese

# User — cosa migliorerei se questo modulo fosse mio per un mese

> I numeri misurati sono in [`docs/cosa-migliorare.md`](cosa-migliorare.md),
> rilevati da un'altra sessione il 2026-09-01: PHPStan 0, PHPMD `app/` **471**,
> Code 90.6, Arch 78.6, **1137 casi test — il più alto dei cinque moduli qui
> analizzati**, coverage 70,1%. Questo file non rimisura: legge quei numeri e
> ci mette sopra la lente.

666 file in `app/`, secondo modulo più grande del monorepo dopo Xot — e con
`require-dev` ridotto a due righe: `phpstan/phpstan` e
`phpstan/phpstan-deprecation-rules`. Niente `larastan`. Un modulo che gestisce
autenticazione (`laravel/passport`), 2FA, social login (Auth0, Microsoft) e
export di dati personali (`spatie/laravel-personal-data-export` — GDPR, non
un dettaglio) sta girando PHPSta

### `roles-migration-philosophy-fix.md` — Fix della Migration Roles - Allineamento con la Filosofia Laraxot


# Fix della Migration Roles - Allineamento con la Filosofia Laraxot

## Problema Identificato

Il file `@Modules/User/database/migrations/2025_09_18_000000_create_roles_table.php` non rispettava la "filosofia, religione, politica di laraxot" per i seguenti motivi:

1. **Duplicazione di funzionalità esistente**: Creava una nuova tabella `roles` quando il pacchetto Spatie Laravel Permission già fornisce la sua implementazione standard.

2. **Viola il principio DRY (Don't Repeat Yourself)**: Il modulo User utilizza già il pacchetto Spatie Laravel Permission che include una propria tabella dei ruoli, ma la migration creava una seconda tabella con colonne simili ma non identiche.

3. **Incompatibilità con il sistema esistente**: Le colonne aggiuntive e la struttura personalizzata potevano caus

### `roles-migration.md` — roles-migration


See canonical documentation: ../../../Themes/docs/shared-components/roles-migration-philosophy-fix.md

### `roles-permissions.md` — Gestione coerente di roles, permissions e guard_name

# Gestione coerente di roles, permissions e guard_name

## Regola fondamentale
Tutti i ruoli e permessi devono avere `guard_name = 'web'` (o quello specificato dal modello utente). Il modello utente deve dichiarare esplicitamente:
```php
protected $guard_name = 'web';
```

## Motivazione
La coerenza del guard_name è essenziale per evitare errori di runtime, escalation di privilegi e problemi di sicurezza (es. `GuardDoesNotMatch`).

## Esempio pratico
- Tabella `roles` e `permissions`: tutti i record devono avere `guard_name = 'web'`.
- Modello utente:
```php
class BaseUser extends Authenticatable
{
    use HasRoles;
    protected $guard_name = 'web';
    // ...

### `root-file-policy.md` — Root file policy


# Root file policy

Updated: 2026-07-08

Root hygiene for this owner follows the project rule: no root .txt files, at most four root .md files, and at most one root .code-workspace named after the module or theme.

Archived root files live in:

- docs/root-txt-files/ (0 files)
- docs/root-md-files/ (2 files)
- docs/root-code-workspace-files/ (1 files)

Current root counts after normalization: 2 markdown files, 0 workspace files.

### `root-files-hygiene.md` — Root files hygiene


# Root files hygiene

## 2026-07-08 16:48

Root normalized to keep no `.txt` files, at most four Markdown files, and a single module/theme workspace file named after the directory.

- moved `git-reset.md` to `docs/root-md-files/git-reset.md` (root markdown limit is four files)

## 2026-07-08 16:51

- created `User.code-workspace` as the single canonical root workspace file.

### `routing-error-solution-2.md` — routing-error-solution-2


See canonical documentation: ../../../Themes/docs/shared-components/routing-error-solution.md

### `routing-solution.md` — Soluzione Errori di Routing nel Frontoffice


# Soluzione Errori di Routing nel Frontoffice

In un modulo User che usa Volt + Folio + Filament, **non** definire mai rotte in `routes/web.php`. Se incappi in un errore di tipo “Route not found” o conflitti di middleware dovuti a rotte imperative, ecco come risolvere:

## 1. Filament (Admin Panel)
**Errore comune:**
```php
// routes/web.php (ERRATO)
Route::get('/admin/users', [UserController::class, 'index']);
```
**Soluzione:**
- Crea o aggiorna la resource Filament:
  ```php
  // Modules/User/app/Filament/Resources/UserResource.php
  class UserResource extends XotBaseResource {
      // Filament gestisce automaticamente le rotte /admin/users
  }
  ```
- Rimuovi la rotta da `web.php`.

### `rules-index.md` — rules-index


See canonical documentation: ../../../Themes/docs/shared-components/rules-index.md

### `rules-testing-no-migrate-fresh.md` — rules-testing-no-migrate-fresh


See canonical documentation: ../../../Themes/docs/shared-components/rules-testing-no-migrate-fresh.md

### `scheduler-license-key-1.md` — scheduler-license-key-1


See canonical documentation: ../../../Themes/docs/shared-components/scheduler-license-key.md

### `scheduler-license-key.md` — FullCalendar Scheduler License Key


# FullCalendar Scheduler License Key

## Overview
The `schedulerLicenseKey` setting is essential for enabling premium features in FullCalendar. It requires a valid license key which you must enter into your calendar configuration.

### Example Usage
```javascript
// a premium plugin
import resourceTimelinePlugin from '@fullcalendar/resource-timeline';

var calendar = new Calendar(calendarEl, {
  schedulerLicenseKey: '<YOUR-LICENSE-KEY-GOES-HERE>',
  plugins: [resourceTimelinePlugin],
  initialView: 'resourceTimelineWeek'
});
```

## Common Issues


### `schema-org-enhancements.md` — schema-org-enhancements


See canonical documentation: ../../../Themes/docs/shared-components/schema-org-enhancements.md

### `schema.md` — User Module Schema


# User Module Schema

> **Purpose:** Defines folder rules, frontmatter standards, and workflows for AI agents.

## Module Identity

- **Name:** User
- **Type:** Laravel Module (Laraxot)
- **Location:** `laravel/Modules/User/`
- **Docs:** `laravel/Modules/User/docs/`

## Wiki Rules

### raw/ Rules
- ✅ Immutable — AI reads but never modifies or deletes
- ✅ Drop liberally — articles, code snippets, decisions
- ✅ Subdivide by type: `articles/`, `papers/`, `code-examples/`, `decisions/`

### wiki/ Rules

### `scopo.md` — User — scopo, confini e come servirlo meglio


# User — scopo, confini e come servirlo meglio

## Lo scopo, dedotto dal codice

Tre domande, un modulo solo che risponde: **chi sei, cosa ti è permesso, per conto
di quale organizzazione.** Non è una descrizione presa dal README: è quello che si
legge nell'elenco delle 34 migrazioni di `database/migrations/`, che non contengono
un solo concetto di dominio del cliente.

| Gruppo | Tabelle | Cosa risponde |
|---|---|---|
| Identità | `users`, `profiles`, `devices`, `device_user`, `authentications`, `authentication_log`, `password_resets` | chi sei, e da dove sei entrato |
| Autorizzazione | `roles`, `permissions`, `model_has_roles`, `model_has_permissions`, `role_has_permissions`, `permission_role`, `team_permissions` | cosa ti è permesso |
| Organizzazione | `teams`, `team_user`, `team_in

### `screenshots/event-detail-page.md` — event-detail-page


# event-detail-page

Placeholder per lo screenshot della pagina di dettaglio evento.

L'asset canonico è previsto in `../../../../Themes/docs/shared-components/event-detail-page.png` (ancora da creare).

## Collegamenti

- [Documentazione User](../../README.md)

### `scripts/fix-module-structure.sh.md` — !/bin/bash


See canonical documentation: ../../../../Themes/docs/shared-components/fix-module-structure.sh
#!/bin/bash

# Configurazione
MODULE_ROOT="/var/www/html/_bases/base_predict_fila3_mono/laravel/Modules"
LOG_FILE="./module_structure_fix.log"

# Funzioni di utilità
log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" | tee -a "$LOG_FILE"
}

fix_directory_case() {
    local module_path="$1"
    
    # Lista di cartelle da controllare
    declare -A dir_mapping=(
        ["Resources"]="resources"
        ["Lang"]="lang"

### `scripts/fix-paths.sh.md` — !/bin/bash


See canonical documentation: ../../../../Themes/docs/shared-components/fix-paths.sh
#!/bin/bash

# Configurazione
MODULE_ROOT="/var/www/html/_bases/base_predict_fila3_mono/laravel/Modules"
LOG_FILE="./path_fix.log"

# Logging
log() {
    local level=$1
    local message=$2
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] [$level] $message" | tee -a "$LOG_FILE"
}

# Funzione per correggere i path di un modulo
fix_module_paths() {
    local module_path="$1"
    local module_name=$(basename "$module_path")
    

### `second-brain.md` — second-brain


See canonical documentation: ../../../Themes/docs/shared-components/second-brain.md

### `services-support-to-actions.md` — Migrazione `app/Support/` → `app/Actions/`


# Migrazione `app/Support/` → `app/Actions/`

`app/Support/` non esiste più in questo modulo (tutti i file archiviati `.bak`, forward-only, mai `git rm`).

## Mapping

| Legacy (`.bak`) | Metodo/i live | Nuova Action |
|---|---|---|
| `Support/AuthenticationLogQuery.php` | `forAuthenticatable()` | `Actions/Authentication/GetAuthenticationLogQueryForAuthenticatableAction` |
| `Support/NotificationSchema.php` | `isReadable()` | `Actions/Notification/IsNotificationSchemaReadableAction` |
| `Support/Utils.php` | solo `getPermissionModel()` era usato (2 riferimenti: 1 reale in `EditRole.php`, 1 in un commento di `CreateRole.php`) | `Actions/Shield/GetPermissionModelAction` |

## Nota: `Utils.php` — 27/28 metodi erano dead code

Verifica `rg`/`grep` su ogni metodo pubblico: solo `getPermissionM

### `setup-super-admin.md` — setup-super-admin


See canonical documentation: ../../../Themes/docs/shared-components/setup-super-admin.md

### `social-auth-architecture.md` — Social Authentication Architecture


# Social Authentication Architecture

## Overview
This document describes the implementation of social login (Google, Microsoft, GitHub) in the Fixcity User module using Laravel Socialite and Filament, without adding provider‑specific columns to the `users` table.

## Models
- **SocialProvider**: Stores provider configuration (client_id, client_secret, scopes, parameters, active flag). One row per provider.
- **SocialiteUser**: Stores the social login record linking a user account to a social provider. Contains `user_id`, `provider`, `provider_id`, `token`, `name`, `email`, `avatar`.

## Flow
1. User clicks a social button in the login widget.
2. The button routes to `socialite.oauth.redirect` which redirects to the provider's OAuth endpoint.
3. After provider authentication, Socialite re

### `social-login-icons.md` — Social Login - Guida all'Integrazione


# Social Login - Guida all'Integrazione

## Panoramica

Il sistema di social login permette agli utenti di autenticarsi tramite provider OAuth (Google, Microsoft, GitHub).

## Icone SVG

Le icone dei provider sono già presenti in `Modules/UI/resources/svg/brands/`:

| Provider | File SVG | Icon Name |
|----------|----------|------------|
| Google | `brands/google.svg` | `ui-brands.google` |
| Microsoft | `brands/microsoft.svg` | `ui-brands.microsoft` |
| GitHub | `brands/github.svg` | `ui-brands.github` |

## Utilizzo nei Widget

### SocialLoginWidget

### `socialite-integration.md` — socialite-integration


---
name: socialite-integration-guide
description: **Guide**: Implementing social authentication without cluttering User table
**Applies to**: laravel/Modules/User
**Enforced by**: Modular architecture and DRY principles

**Key Decisions**:
- No google_id/facebook_id columns in User table
- SocialiteUser model handles provider-specific IDs
- SocialProvider model maps providers to user
- Filament admin handles credential storage

**Implementation Steps**:
1. Use SocialiteUser.php to store:
   - provider_id
   - auth_token
   - refresh_token
   - expires_in
   - uid

### `socialite-microsoft-integration.md` — 🔐 **Laravel Socialite + Microsoft OAuth Integration Guide**


# 🔐 **Laravel Socialite + Microsoft OAuth Integration Guide**

**Last Update**: 23 Febbraio 2026
**Status**: ✅ PHPStan Level 10 Compliant
**Module**: User
**Dependencies**: Laravel Socialite, Microsoft Azure AD

## 📋 **Table of Contents**

1. [Overview](#overview)
2. [Installation & Configuration](#installation-configuration)
3. [Microsoft Azure AD Setup](#microsoft-azure-setup)
4. [Filament Socialite Plugin Analysis](#filament-socialite-analysis)
5. [Implementation Steps](#implementation-steps)
6. [Security Best Practices](#security-best-practices)
7. [Testing Strategy](#testing-strategy)
8. [Troubleshooting](#troubleshooting)

---

### `socialite-study.md` — Studio: Laravel Socialite + Filament Integration


# Studio: Laravel Socialite + Filament Integration

## Riferimenti Documentazione

- [Laravel Socialite](https://laravel.com/docs/12.x/socialite)
- [Filament Socialite Plugin](https://github.com/DutchCodingCompany/filament-socialite)
- [Socialite Providers Microsoft](https://socialiteproviders.com/Microsoft/)
- [Socialite Providers](https://socialiteproviders.com/)
- [Microsoft Azure App Registration](https://portal.azure.com/#view/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps)

## Laravel Socialite - Concetti Base

### Installazione
```bash
composer require laravel/socialite
```

### Configurazione (config/services.php)
```php

### `spatie-models-verification.md` — spatie-models-verification


See canonical documentation: ../../../Themes/docs/shared-components/spatie-models-verification.md

### `sso-guide.md` — sso-guide


See canonical documentation: ../../../Themes/docs/shared-components/sso-guide.md

### `sso.md` — 🔑 SINGLE SIGN-ON (SSO) - GUIDA IMPLEMENTAZIONE


# 🔑 SINGLE SIGN-ON (SSO) - GUIDA IMPLEMENTAZIONE

**Versione**: 1.0  
**Status**: 📋 Pianificato Q1 2026  

---

## 🎯 OVERVIEW

Implementazione Single Sign-On (SSO) per FixCity con supporto SAML 2.0 e OpenID Connect (OIDC), permettendo l'integrazione con provider enterprise come Azure AD, Google Workspace, Okta.

---

## 🏗️ ARCHITETTURA

### Protocolli Supportati

```
SSO Implementation

### `stats.md` — stats


See canonical documentation: ../../../Themes/docs/shared-components/stats.md

### `status-blockers-28.md` — User Module — Status & Critical Blockers (2026-07-28)


# User Module — Status & Critical Blockers (2026-07-28)

## Executive Summary

User module has **2 critical infrastructure blockers** preventing completion of quality gates:

1. **Git Push Blocked** — Git LFS infrastructure inconsistency between remotes
2. **PHPStan L10 Incomplete** — 48 type errors require deeper investigation or framework updates

Both require escalation beyond forward-only git discipline.

---

## Blocker 1: Git LFS Object Storage Failure ⛔

**Status:** BLOCKED_ON_INFRASTRUCTURE  
**Impact:** Cannot push code to remote (provtv/module_user_fila5)  
**Severity:** CRITICAL


### `status-blockers.md` — User Module — Status & Critical Blockers (2026-07-28)


# User Module — Status & Critical Blockers (2026-07-28)

## Executive Summary

User module has **2 critical infrastructure blockers** preventing completion of quality gates:

1. **Git Push Blocked** — Git LFS infrastructure inconsistency between remotes
2. **PHPStan L10 Incomplete** — 48 type errors require deeper investigation or framework updates

Both require escalation beyond forward-only git discipline.

---

## Blocker 1: Git LFS Object Storage Failure ⛔

**Status:** BLOCKED_ON_INFRASTRUCTURE  
**Impact:** Cannot push code to remote (provtv/module_user_fila5)  
**Severity:** CRITICAL


### `stories/01.user-phpstan-fix.story.md` — BMAD Story - User PHPStan Fix

# BMAD Story - User PHPStan Fix
Date: Sun Sep  6 04:36:00 PM CEST 2026
Status: Done (2026-09-07, sessione pomeriggio)

## Aggiornamento 2026-09-07

Ripresa dello swarm PHPStan sul modulo `User` (foundation module,
`UserContract`/`XotData` invariati — nessuna firma pubblica toccata).

**Errori**: recon indicava ~19, verifica reale a cache pulita ne trovava 12,
poi 9 (2 erano falsi positivi da `tmpDir: /tmp/phpstan` condiviso fra sessioni
swarm concorrenti). **Esito finale: 9 -> 0.**

File toccati (7, tutti in `Modules/User`, nessuna modifica fuori modulo,
nessun tocco a `Modules/Xot`):
- `app/Filament/Resources/OauthAuthCodeResource.php`
- `app/Filament/Resources/OauthRefreshTokenResource.php`
- `app/Filament/Resources/TeamUserResource.php`
- `app/Filament/Resources/TenantUserResource.php`


### `stories/06-phpstan-cleanup-user.story.md` — [STORY] PHPStan cleanup modulo User


# [STORY] PHPStan cleanup modulo User

## User Request

> «sistema tutte le segnalazioni di phpstan [...] concentrati sullo scopo/funzionalita', non sull'errore;
> aumenta la qualita' del codice; usa enum al posto delle costanti».

Gruppo: `User` — 108 errori in 43 file (`laravel/Modules/User/**`), livello `max`.

## Analysis

Ogni segnalazione e' stata letta come sintomo dello *scopo* del codice, non come riga da zittire.

| Area | Scopo del codice | Cosa diceva l'errore davvero |
|------|------------------|------------------------------|
| Migrazione `2026_10_05_174817_create_permission_tables` (+ 2 copie legacy) | Creare le tabelle Spatie **con i nomi di `config/permission.php`** (immutabili: `model_has_permission`, ...) | `config()` e' `mixed`: i `@var` inline erano finti e PHPStan (`

### `stories/10.1.team-change-widget.story.md` — 10.1: TeamChangeWidget + hook user-menu


# 10.1: TeamChangeWidget + hook user-menu

**Story ID:** 10.1  
**Epic:** 10 — Http/Livewire restante → widget  

**Epic:** 10: Http/Livewire restante → widget  
**Slug:** team-change-widget  
**Status:** ready-for-dev

> Planning locked. **Non implementata in questa sessione di docs.** Serializzare dopo 9.2 sullo stesso provider.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#100](https://github.com/laraxot/module_user_fila5/issues/100) | Campagna padre |
| [discussions/101](https://github.com/laraxot/module_user_fila5/discussions/101) | Architettura widget-only |

## Story

### `stories/10.2.socialite-buttons-widget.story.md` — 10.2: Socialite Buttons → SocialLoginWidget esistente


# 10.2: Socialite Buttons → SocialLoginWidget esistente

**Story ID:** 10.2  
**Epic:** 10 — Http/Livewire restante → widget  

**Epic:** 10: Http/Livewire restante → widget  
**Slug:** socialite-buttons-widget  
**Status:** ready-for-dev

> **Non creare** un terzo widget. **Non implementare ora.**

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#100](https://github.com/laraxot/module_user_fila5/issues/100) | Campagna padre |
| [discussions/101](https://github.com/laraxot/module_user_fila5/discussions/101) | Architettura widget-only |

## Story

### `stories/10.3.retire-auth-livewire-twins.story.md` — 10.3: Ritiro auth Livewire HTTP (gemelli)


# 10.3: Ritiro auth Livewire HTTP (gemelli)

**Story ID:** 10.3  
**Epic:** 10 — Http/Livewire restante → widget  

**Epic:** 10: Http/Livewire restante → widget  
**Slug:** retire-auth-livewire-twins  
**Status:** done

> **Non implementare ora.** Non toccare `AdminPanelProvider`.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#100](https://github.com/laraxot/module_user_fila5/issues/100) | Campagna padre |
| [discussions/101](https://github.com/laraxot/module_user_fila5/discussions/101) | Architettura widget-only |

## Story

### `stories/10.4.retire-gdpr-profile-livewire.story.md` — 10.4: DeleteAccount Filament + Privacy/Terms fuori User


# 10.4: DeleteAccount Filament + Privacy/Terms fuori User

**Story ID:** 10.4  
**Epic:** 10 — Http/Livewire restante → widget  
**Slug:** retire-gdpr-profile-livewire  
**Status:** blocked (vedi Dev Agent Record — 2026-09-21)

**Epic:** 10: Http/Livewire restante → widget  
**Status:** blocked (vedi Dev Agent Record: 2026-09-21)

> **Non implementare ora.** `DeleteUserAction` locked.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#100](https://github.com/laraxot/module_user_fila5/issues/100) | Campagna padre |
| [discussions/101](https://github.com/laraxot/module_user_fila5/discussions/101) | Architettura widget-only |


### `stories/11.1-fix-userpolicy-authorization-bypass.story.md` — Story 11.1: fix UserPolicy authorization bypass


# Story 11.1: fix UserPolicy authorization bypass

## Contesto (audit BMAD "perfezione assoluta", 2026-09-22)

`laravel/Modules/User/app/Models/Policies/UserPolicy.php` estende
`UserBasePolicy` (pass-through vuoto verso `XotBasePolicy`), non
`BaseUserPolicy.php` (classe sorella quasi omonima, gia' scritta correttamente con
controllo ruolo `hasRole(['super-admin','admin','hr-manager'])` ma mai estesa da
nessuno — `grep -rln "extends BaseUserPolicy"` → 0 risultati).

nessuno: `grep -rln "extends BaseUserPolicy"` → 0 risultati).

```php
class UserPolicy extends UserBasePolicy
{
    public function view(Post $_user, Post $_post): bool   { return true; }
    public function create(Post $_user): bool               { return true; }
    public function update(Post $_user, Post $_post): bool   { r

### `stories/11.2-login-rate-limiting.story.md` — Story 11.2: rate limiting sul login


# Story 11.2: rate limiting sul login

## Contesto (audit BMAD "perfezione assoluta", 2026-09-22)

`grep -rn "throttle"` in tutto `Modules/User` restituisce un solo risultato,
dentro `laravel/Modules/User/routes/auth.php` — il cui intero contenuto (righe

dentro `laravel/Modules/User/routes/auth.php`: il cui intero contenuto (righe
4-26) e' avvolto in un blocco di commento (`/* ... */`), quindi morto/inattivo.
`grep -rn "RateLimiter::\|tooManyAttempts\|hit("` in `app/` → 0 risultati.
`LoginWidget.php`/`BaseAuthWidget.php` (i componenti Filament che gestiscono
davvero il login, essendo `routes/auth.php` disattivo) non contengono
`HasRateLimitedForms` ne' logica di throttling propria.

**Impatto:** nessuna protezione contro tentativi di login ripetuti (brute-force,
credential stuffing) sul 

### `stories/11.3-gdpr-cascade-delete-user.story.md` — Story 11.3: cascade delete GDPR-compliant


# Story 11.3: cascade delete GDPR-compliant

## Contesto (audit BMAD "perfezione assoluta", 2026-09-22)

Nessun modulo `Gdpr` esiste in questo repo (`find laravel/Modules -iname
"*gdpr*"` → vuoto). L'unico punto di cancellazione e'
`laravel/Modules/User/app/Actions/User/DeleteUserAction.php`:

```php
$this->authGuard->logout();   // solo il guard/sessione corrente
$user->delete();               // SoftDeletes commentato in BaseUser.php → hard delete
```

Le migration di `oauth_access_tokens`, `oauth_auth_codes`, `socialite_user` usano
`$table->foreignIdFor($userClass,'user_id')` **senza** `.constrained()`/
`.cascadeOnDelete()` — nessun vincolo FK reale. `UserObserver::deleting()` pulisce

`.cascadeOnDelete()`: nessun vincolo FK reale. `UserObserver::deleting()` pulisce
solo il personal te

### `stories/11.4-encrypt-socialite-token.story.md` — Story 11.4: cifrare il token Socialite a riposo


# Story 11.4: cifrare il token Socialite a riposo

## Contesto (audit BMAD "perfezione assoluta", 2026-09-22)

`laravel/Modules/User/app/Models/SocialiteUser.php`: la proprieta' `token` e'
`fillable` ma **nessun cast** (`grep -n "casts\|token\|encrypted"` → solo docblock
e fillable, nessun `'token' => 'encrypted'`). La colonna `socialite_user.token`
(TEXT) contiene quindi il token OAuth del provider esterno in chiaro.

**Impatto:** chiunque abbia accesso in lettura al database (dump, backup,
accesso diretto, injection SQL residua altrove) ottiene token OAuth validi
utilizzabili per impersonare l'utente presso il provider esterno.

## User story

Come utente che effettua login social,
voglio che il mio token OAuth non sia leggibile in chiaro nel database,
cosi' che un accesso non autorizza

### `stories/11.5-guard-privileged-fields-createuserdata.story.md` — Story 11.5: guardia sui campi privilegiati di CreateUserData


# Story 11.5: guardia sui campi privilegiati di CreateUserData

## Contesto (audit BMAD "perfezione assoluta", 2026-09-22)

`laravel/Modules/User/app/Actions/CreateUserAction.php` (top-level) fa
`User::create([...$attributes, ...($this->data ?? [])])`. `Modules\User\Datas\
CreateUserData` espone come proprieta' settabili `is_active`,
`email_verified_at`, `password_expires_at`, `is_otp`, `type`, `state`, incluso
`id` — tutti `fillable` su `BaseUser`. `grep -rn "CreateUserData::from\|new

`id`: tutti `fillable` su `BaseUser`. `grep -rn "CreateUserData::from\|new
CreateUserData"` e ricerca dei chiamanti del top-level `CreateUserAction` → nessun
caller reale oggi, solo test.

**Impatto:** oggi nessuno (dead code), ma se qualcuno collega questo DTO/Action a
un endpoint di registrazione self-se

### `stories/12.1.filament-xotbase-inheritance.story.md` — 12.1: BaseEditUser e UserColumn conformi a XotBase


# 12.1: BaseEditUser e UserColumn conformi a XotBase

**Story ID:** 12.1  
**Epic:** 12 — Audit UI/Filament modulo User  

**Epic:** 12: Audit UI/Filament modulo User  
**Slug:** filament-xotbase-inheritance  
**Status:** backlog

## Story

Come **sviluppatore/modulo User**,
voglio **che le classi Filament di `app/Filament` estendano le basi Xot come da regola progetto**,
così che **i fix/patch Xot vengano raccolti ovunque, senza eccezioni ad hoc**.

## Evidenza

- `app/Filament/Resources/UserResource/Pages/BaseEditUser.php:22` → `abstract class BaseEditUser extends EditRecord` (unico Base* non Xot).
- `app/Filament/Tables/Columns/UserColumn.php:25` → `class UserColumn extends GroupColumn`.

### `stories/12.1.phpstan-docs-corruption-cleanup.story.md` — 12.1: Consolidare cluster docs/*phpstan*.md corrotto


# 12.1: Consolidare cluster docs/*phpstan*.md corrotto

**Story ID:** 12.1
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** phpstan-docs-corruption-cleanup
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#105](https://github.com/laraxot/module_user_fila5/issues/105) | Cluster docs/*phpstan*.md corrotto |

## Story

### `stories/12.2.gitignore-archive-legacy-bug-fix.story.md` — 12.2: Fix pattern bare archive/legacy in docs/.gitignore


# 12.2: Fix pattern bare archive/legacy in docs/.gitignore

**Story ID:** 12.2
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** gitignore-archive-legacy-bug-fix
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#106](https://github.com/laraxot/module_user_fila5/issues/106) | docs/.gitignore pattern bare archive/legacy |

## Story

### `stories/12.2.hardcoded-labels-translation.story.md` — 12.2: Label e testi hardcoded → lang `user::`


# 12.2: Label e testi hardcoded → lang `user::`

**Story ID:** 12.2  
**Epic:** 12 — Audit UI/Filament modulo User  

**Epic:** 12: Audit UI/Filament modulo User  
**Slug:** hardcoded-labels-translation  
**Status:** backlog

## Story

Come **utente/amministratore multiplo**,
voglio **vedere la UI in italiano coerente anche su resource OAuth/team/tenant**,
così che **nessuna stringa inglese o hardcoded compaia nel panel**.

## Evidenza (23 label + testi, grep `->label(` del 2026-09-22)

- `app/Filament/Clusters/Passport/Resources/OauthClientResource/RelationManagers/TokensRelationManager.php` — Revocati, Scaduti, Validi, Visualizza, Revoca.
- `app/Filament/Clusters/Passport/Resources/OauthPersonalAccessClientResource.php` — ID, Client, Created At, Updated At (+ Client).

### `stories/12.3.archive-folders-consolidation.story.md` — 12.3: Unificare le cartelle archive/fixes/bug-* sovrapposte


# 12.3: Unificare le cartelle archive/fixes/bug-* sovrapposte

**Story ID:** 12.3
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** archive-folders-consolidation
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#107](https://github.com/laraxot/module_user_fila5/issues/107) | 6+ cartelle archive/fixes/bug-* sovrapposte |

## Story

### `stories/12.4.docs-index-curated-map.story.md` — 12.4: Sostituire docs/index.md con mappa curata a 6 voci


# 12.4: Sostituire docs/index.md con mappa curata a 6 voci

**Story ID:** 12.4
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** docs-index-curated-map
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#108](https://github.com/laraxot/module_user_fila5/issues/108) | docs/index.md: 30% link rotti |

## Story

### `stories/12.4.oauth-dup-resources-ssot.story.md` — 12.4: Resource Passport SSoT nel cluster (fine doppioni radice)


# 12.4: Resource Passport SSoT nel cluster (fine doppioni radice)

**Story ID:** 12.4  
**Epic:** 12 — Audit UI/Filament modulo User  

**Epic:** 12: Audit UI/Filament modulo User  
**Slug:** oauth-dup-resources-ssot  
**Status:** backlog

## Story

Come **sviluppatore User**,
voglio **una sola resource Filament per ogni entità Passport (OAuth)**,
così che **non esistano più tre copie divergenti dello stesso schema/table col rischio di una UI che non valida davvero**.

## Evidenza (sha confrontati sul disco 2026-09-22)

- `OauthClientForm` in 3 namespace con contenuti **diversi**:
  `Resources/ClientResource/Schemas/OauthClientForm.php` (67 righe), `Resources/OauthClientResource/Schemas/OauthClientForm.php` (41), `Clusters/Passport/Resources/OauthClientResource/Schemas/OauthClientForm.php

### `stories/12.5.filament-artifacts-cleanup.story.md` — 12.5: Igiene fs del modulo: no junk committato


# 12.5: Igiene fs del modulo: no junk committato

**Story ID:** 12.5  
**Epic:** 12 — Audit UI/Filament modulo User  

**Epic:** 12: Audit UI/Filament modulo User  
**Slug:** filament-artifacts-cleanup  
**Status:** backlog

## Story

Come **maintainer del repo**,
voglio **che il modulo non contenga dipendenze node, backup e file tooling/spazzatura dentro i namespace applicativi**,
così che **clone, scan di sicurezza e code search restino leggibili e la taglia del repo non cresca di decine di MB**.

## Evidenza (2026-09-22)

- `resources/views/node_modules/` — **92 MB** di vite/swiper/postcss/tailwind ecc. committati.
- `lang/it/` — **98 file** `*.backup_20260216_*` orfani (es. `actions.php.backup_20260216_092226`).

### `stories/12.5.permissions-doc-wrong-module-content.story.md` — 12.5: Sostituire docs/permissions.md (contenuto del modulo sbagliato)


# 12.5: Sostituire docs/permissions.md (contenuto del modulo sbagliato)

**Story ID:** 12.5
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** permissions-doc-wrong-module-content
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#109](https://github.com/laraxot/module_user_fila5/issues/109) | docs/permissions.md contenuto del modulo sbagliato |

## Story

### `stories/12.6.policies-resources-linking.story.md` — 12.6: Policy collegate ai Resource Filament


# 12.6: Policy collegate ai Resource Filament

**Story ID:** 12.6  
**Epic:** 12 — Audit UI/Filament modulo User  

**Epic:** 12: Audit UI/Filament modulo User  
**Slug:** policies-resources-linking  
**Status:** backlog

## Story

Come **amministratore del sistema**,
voglio **che ogni Resource Filament dichiari la propria policy**,
così che **le autorizzazioni siano applicate dalla UI (hidden/disabled) e non solo da un Gate centrale nel provider**.

## Evidenza

- `app/Models/Policies/` espone ~30 policy: `UserPolicy`, `ProfilePolicy`, `TeamPolicy`, `TenantPolicy`, `RolePolicy`, `PermissionPolicy`, `OauthClientPolicy`, `OauthAccessTokenPolicy`, `SocialProviderPolicy`, `SocialiteUserPolicy`, `SsoProviderPolicy`, `DevicePolicy`, `FeaturePolicy`, `PasswordResetPolicy`, `TeamInvitationPolicy

### `stories/12.6.purpose-scopo-duplicate-and-stale.story.md` — 12.6: Unificare purpose.md/scopo.md e correggere i claim stale


# 12.6: Unificare purpose.md/scopo.md e correggere i claim stale

**Story ID:** 12.6
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** purpose-scopo-duplicate-and-stale
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#110](https://github.com/laraxot/module_user_fila5/issues/110) | purpose.md/scopo.md duplicati, purpose.md stale |

## Story

### `stories/12.7.readme-frontmatter-qmd-and-issue-consolidation.story.md` — 12.7: Consolidare le issue duplicate PHPStan/coverage


# 12.7: Consolidare le issue duplicate PHPStan/coverage

**Story ID:** 12.7
**Epic:** 12 — Docs hygiene & consolidamento SSoT

**Epic:** 12: Docs hygiene & consolidamento SSoT
**Slug:** readme-frontmatter-qmd-and-issue-consolidation
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#93](https://github.com/laraxot/module_user_fila5/issues/93) | README frontmatter QMD — cluster issue collegato |

| [laraxot/module_user_fila5#93](https://git

### `stories/13.1.xotbaseresourcetable-model-audit-verification.story.md` — 13.1: Riaudit reale $model su 30 classi Table (contraddice #91)


# 13.1: Riaudit reale $model su 30 classi Table (contraddice #91)

**Story ID:** 13.1
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** xotbaseresourcetable-model-audit-verification
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#91](https://github.com/laraxot/module_user_fila5/issues/91) | XotBaseResourceTable audit — discrepanza da riverificar

### `stories/13.2.oauthclientresource-wrong-model.story.md` — 13.2: Allineare OauthClientResource al modello custom del modulo


# 13.2: Allineare OauthClientResource al modello custom del modulo

**Story ID:** 13.2
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** oauthclientresource-wrong-model
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#90](https://github.com/laraxot/module_user_fila5/issues/90) | OauthClientResource modello sbagliato |

## Story

### `stories/13.3.retire-gdpr-profile-livewire-completion.story.md` — 13.3: Completare la story bloccata 10.4 (ritiro Livewire GDPR/ToS/Privacy)


# 13.3: Completare la story bloccata 10.4 (ritiro Livewire GDPR/ToS/Privacy)

**Story ID:** 13.3
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** retire-gdpr-profile-livewire-completion
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence — completamento

### `stories/13.4.login-logout-widget-duplication.story.md` — 13.4: Chiarire la duplicazione LoginWidget/LogoutWidget vs Auth/*


# 13.4: Chiarire la duplicazione LoginWidget/LogoutWidget vs Auth/*

**Story ID:** 13.4
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** login-logout-widget-duplication
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#111](https://github.com/laraxot/module_user_fila5/issues/111) | Duplicazione LoginWidget/LogoutWidget vs Auth/* |

## Story

### `stories/13.5.pest-coverage-resources-widgets-gap.story.md` — 13.5: Copertura test Resource/Widget scoperti + causa bootstrap lento


# 13.5: Copertura test Resource/Widget scoperti + causa bootstrap lento

**Story ID:** 13.5
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** pest-coverage-resources-widgets-gap
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#31](https://github.com/laraxot/module_user_fila5/issues/31) | Improve Pest Test Coverage for User Module |

## Story

### `stories/13.6.playwright-e2e-plan.story.md` — 13.6: Piano suite E2E Playwright oltre la registrazione


# 13.6: Piano suite E2E Playwright oltre la registrazione

**Story ID:** 13.6
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** playwright-e2e-plan
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#112](https://github.com/laraxot/module_user_fila5/issues/112) | tests/Playwright: serve un piano E2E |

## Story

### `stories/13.7.fortify-jetstream-contract-audit.story.md` — 13.7: Audit contratti Fortify/Jetstream e policy stub


# 13.7: Audit contratti Fortify/Jetstream e policy stub

**Story ID:** 13.7
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** fortify-jetstream-contract-audit
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#44](https://github.com/laraxot/module_user_fila5/issues/44) | Audit contratti Fortify/Jetstream |

## Story

### `stories/13.8.socialite-buttons-renderhook-dead-code.story.md` — 13.8: Risolvere o rimuovere il RenderHook socialite.buttons morto


# 13.8: Risolvere o rimuovere il RenderHook socialite.buttons morto

**Story ID:** 13.8
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** socialite-buttons-renderhook-dead-code
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#43](https://github.com/laraxot/module_user_fila5/issues/43) | RenderHook socialite.buttons morto |

## Story

### `stories/13.9.baseuser-trait-consolidation.story.md` — 13.9: Decisione di design: consolidamento trait su BaseUser


# 13.9: Decisione di design: consolidamento trait su BaseUser

**Story ID:** 13.9
**Epic:** 13 — Code quality, architettura Filament, test coverage

**Epic:** 13: Code quality, architettura Filament, test coverage
**Slug:** baseuser-trait-consolidation
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [discussions/46](https://github.com/laraxot/module_user_fila5/discussions/46) | Trait su BaseUser — decisione di design |

| [discussions/46](https://github.com/lara

### `stories/14.1.permissions-matrix-silent-deny-gap.story.md` — 14.1: Matrice permessi reale: coprire le ~30 Policy scoperte


# 14.1: Matrice permessi reale: coprire le ~30 Policy scoperte

**Story ID:** 14.1
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** permissions-matrix-silent-deny-gap
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#113](https://github.com/laraxot/module_user_fila5/issues/113) | ~30 Policy senza permesso nel seeder (silent-de

### `stories/14.2.team-vs-tenant-boundary-doc.story.md` — 14.2: Documentare il confine Team vs Tenant


# 14.2: Documentare il confine Team vs Tenant

**Story ID:** 14.2
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** team-vs-tenant-boundary-doc
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#114](https://github.com/laraxot/module_user_fila5/issues/114) | Confine Team vs Tenant mai scritto |

## Story

### `stories/14.3.auth-log-device-anomaly-view.story.md` — 14.3: Euristica di anomalia su AuthenticationLog/Device


# 14.3: Euristica di anomalia su AuthenticationLog/Device

**Story ID:** 14.3
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** auth-log-device-anomaly-view
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#115](https://github.com/laraxot/module_user_fila5/issues/115) | Manca euristica anomalia su AuthenticationLog/Device |

##

### `stories/14.4.passport-dashboard-missing-buttons.story.md` — 14.4: Ripristinare i bottoni Passport dashboard regrediti


# 14.4: Ripristinare i bottoni Passport dashboard regrediti

**Story ID:** 14.4
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** passport-dashboard-missing-buttons
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#98](https://github.com/laraxot/module_user_fila5/issues/98) | Bottone Nuove credenziali Passport Dashboard scompar

### `stories/14.5.oauth-client-user-association-incomplete.story.md` — 14.5: Completare l'associazione OAuth client <-> user


# 14.5: Completare l'associazione OAuth client <-> user

**Story ID:** 14.5
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** oauth-client-user-association-incomplete
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#97](https://github.com/laraxot/module_user_fila5/issues/97) | Associazione OAuth client<->utente incompleta |

#

### `stories/14.6.google-oauth-fo-routing-decision.story.md` — 14.6: Decisione di design: routing login Google per cittadini FO


# 14.6: Decisione di design: routing login Google per cittadini FO

**Story ID:** 14.6
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** google-oauth-fo-routing-decision
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [discussions/42](https://github.com/laraxot/module_user_fila5/discussions/42) | Routing login Google FO — decisione di design |

| [disc

### `stories/14.7.lang-stub-corruption-audit-scope.story.md` — 14.7: Verificare l'ampiezza reale del commit che ha svuotato i lang stub


# 14.7: Verificare l'ampiezza reale del commit che ha svuotato i lang stub

**Story ID:** 14.7
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** lang-stub-corruption-audit-scope
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#102](https://github.com/laraxot/module_user_fila5/issues/102) | Lang stub svuotati — verificare ampie

### `stories/14.8.provtv-remote-issue-tracker-divergence.story.md` — 14.8: Decisione di governance: remote laraxot vs provtv


# 14.8: Decisione di governance: remote laraxot vs provtv

**Story ID:** 14.8
**Epic:** 14 — Completezza dominio: permessi, team/tenant, OAuth, audit log

**Epic:** 14: Completezza dominio: permessi, team/tenant, OAuth, audit log
**Slug:** provtv-remote-issue-tracker-divergence
**Status:** backlog

> Sola documentazione (campagna module-excellence, 2026-09-22). Nessuna implementazione in questa sessione: questa story cataloga il gap e i passi, non li esegue.

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#103](https://github.com/laraxot/module_user_fila5/issues/103) | Campagna padre module-excellence |
| [laraxot/module_user_fila5#116](https://github.com/laraxot/module_user_fila5/issues/116) | Remote laraxot vs provtv divergenti |

## Story

### `stories/14.9.user-sync-marker-repair.story.md` — 14.9: Marcatori di conflitto nei PHP di lingua e test del modulo User


# 14.9: Marcatori di conflitto nei PHP di lingua e test del modulo User

> Numerazione: prosegue la sequenza dopo 14.8. La story e' igiene del repository, non un criterio di dominio
> dell'epic 14. Le story esistenti non sono toccate; i `.md` di User sono un altro lavoro
> (`docs-merge-conflict-markers-cleanup.story.md`).

## Obiettivo

`phpstan analyse Modules` non parte finche' i file PHP committati contengono `<<<<<<<` / `=======` / `>>>>>>>`.
Il lavoro non e' scegliere un lato a caso: per ogni file si e' capito a cosa serve e si e' lasciato un file che lo fa,
con i miglioramenti reali di entrambi i lati. Pagina di riferimento: [sync-marker-repair-php-lang-tests.md](../sync-marker-repair-php-lang-tests.md).

## Perimetro

File `*.php` e `*.blade.php` di `laravel/Modules/User` con marca

### `stories/2.1.profile-contract-migration.story.md` — Story 2.1: User/Profile Contract Migration — User Module

# Story 2.1: User/Profile Contract Migration — User Module

**Status**: awaiting-analysis  
**Module**: User (core, used by Lang + others)  
**Pattern**: Replace Quaeris\Profile with Xot\Contracts\ProfileContract  
**Effort**: TBD (depends on scope)  
<<<<<<< .merge_file_ONwuDc
=======
**Pattern**: Replace <nome progetto>\Profile with Xot\Contracts\ProfileContract
**Status**: awaiting-analysis
**Module**: User (core, used by Lang + others)
**Pattern**: Replace <nome progetto>\Profile with Xot\Contracts\ProfileContract
**Effort**: TBD (depends on scope)
>>>>>>> .merge_file_cCKizU
**Owned by**: TBD (high priority)

## Rationale

User module contains ProfileContract. Earlier session (Lang fix 2026-09-06) replaced Quaeris\Profile with XotContract globally. Need to verify User module itself exp

### `stories/3.1.rbac-evaluator-role.story.md` — 3.1: RBAC: Evaluator role (create/edit own Scheda)


# 3.1: RBAC: Evaluator role (create/edit own Scheda)

**Story ID:** 3.1
**Epic:** 3 — Access Control & Security
**Slug:** rbac-evaluator-role
**Status:** backlog

## Story

As an evaluator,
I want to create and edit Scheda evaluation records via a permission I hold (not ad-hoc admin access),
so that I can complete evaluations for my PA without needing pa_admin privileges, and without being able to approve, delete, or manage users.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. A migration seeds all five roles required by FR-005 — `staff`, `evaluator`, `hr_admin`, `finance`, `pa_admin` — plus the base permission matrix, using Spatie Permissions. [Source: prd.md#FR-005 — "Setup: role seeding + permission matrix in migration"]
2. `evaluato

### `stories/3.10.login-audit.story.md` — 3.10: Login audit: log all auth events


# 3.10: Login audit: log all auth events

**Story ID:** 3.10
**Epic:** 3 — Access Control & Security
**Slug:** login-audit
**Status:** backlog

## Story

As a PA admin,
I want every authentication event (login success, login failure, logout) recorded in the audit log,
so that suspicious access patterns can be investigated and the PA can demonstrate GDPR-required audit coverage of access to personal data.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. A successful login by any user (Filament or staff portal) creates an Activity log entry recording the user, action (`login`), IP address, and timestamp. [Source: prd.md#FR-006 — "Triggered by: ...user login (optional)"; Source: prd.md#NFR-SEC-001 — "Audit: Activity log tracks all access to 

### `stories/3.11.admin-manual-email-verification.story.md` — 3.11: Admin — verifica manuale email account (nessuna mail inviata)


# 3.11: Admin — verifica manuale email account (nessuna mail inviata)

**Story ID:** 3.11
**Epic:** 3 — Access Control & Security
**Slug:** admin-manual-email-verification
**Status:** done

## Story

Come amministratore del pannello Filament,
voglio un bottone/azione su ogni account (in `EditUser` e/o nella tabella `ListUsers`) che marchi l'email come verificata con un click,
così da poter sbloccare un account bloccato da `email-verification/prompt` senza dover inviare (o far inviare) nessuna email di verifica reale.

## Contesto / trigger

<<<<<<< .merge_file_uLa4jM
=======
In produzione (manager.quaeris.it), dopo aver configurato il driver SMS in Impostazioni ed essere loggato come admin, l'utente è stato reindirizzato a `/quaeris/admin/email-verification/prompt` mentre tentava di lanci

### `stories/3.2.rbac-staff-role.story.md` — 3.2: RBAC: Staff role (read-only own Scheda)


# 3.2: RBAC: Staff role (read-only own Scheda)

**Story ID:** 3.2
**Epic:** 3 — Access Control & Security
**Slug:** rbac-staff-role
**Status:** backlog

## Story

As a staff member,
I want to view only my own Scheda evaluation records in read-only mode,
so that my personal evaluation data stays private from other staff and I cannot accidentally modify a record I do not own.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. `staff` role is granted `view scheda` permission scoped to records where the Scheda's employee matches the authenticated user; `SchedaPolicy::viewAny()` and `SchedaPolicy::view()` return `true` only for the staff member's own record(s). [Source: prd.md#FR-005 — "staff (read own Scheda)"]
2. `SchedaPolicy::create()`, `::u

### `stories/3.3.rbac-admin-role.story.md` — 3.3: RBAC: Admin role (all CRUD, user mgmt)


# 3.3: RBAC: Admin role (all CRUD, user mgmt)

**Story ID:** 3.3
**Epic:** 3 — Access Control & Security
**Slug:** rbac-admin-role
**Status:** backlog

## Story

As a PA admin,
I want full CRUD access to Scheda records and the ability to manage users and role assignments,
so that I can administer my PA's tenant end-to-end without needing database access.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. `pa_admin` role is granted full CRUD on Scheda — `SchedaPolicy::create()`, `::update()`, `::delete()`, `::restore()` all return `true` for `pa_admin`. [Source: prd.md#FR-005 — "pa_admin (all access)"]
2. `Modules/User/app/Filament/Resources/UserResource.php` exists, letting `pa_admin` create/edit users and assign one or more of the 5 seeded

### `stories/3.4.rbac-senior-mgmt-role.story.md` — 3.4: RBAC: Senior Mgmt role (approve Progressioni)


# 3.4: RBAC: Senior Mgmt role (approve Progressioni)

**Story ID:** 3.4
**Epic:** 3 — Access Control & Security
**Slug:** rbac-senior-mgmt-role
**Status:** backlog

## Story

As a senior manager (director-level approver),
I want a narrowly-scoped permission to approve Progressioni career-progression records,
so that approval authority stays restricted to designated decision-makers without granting me full admin access.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. A new Spatie role, `senior_mgmt`, is seeded via an additive migration with exactly one permission: `approve progressioni`. [Inference — see Dev Notes: FR-005's formal role list (`staff`, `evaluator`, `hr_admin`, `finance`, `pa_admin`) does not name this role verbatim; it is d

### `stories/3.9.verify-data-residency.story.md` — 3.9: Data residency: verify EU-only deployment


# 3.9: Data residency: verify EU-only deployment

**Story ID:** 3.9
**Epic:** 3 — Access Control & Security
**Slug:** verify-data-residency
**Status:** backlog

## Story

As a compliance-responsible PA admin,
I want an automated check confirming the application and its logging/storage dependencies are deployed only within the EU,
so that personal data never leaves EU jurisdiction and the PA stays compliant with GDPR and Italian public-sector law without a manual audit each release.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. A verification routine (artisan command or test) checks that the application's configured deployment region is an EU region (Vercel EU region, per architecture) and fails loudly if a non-EU region is configured. 

### `stories/5.1.user-lang-phpstan-debt.story.md` — 5.1: PHPStan Level 10: resolve remaining User/Lang type debt


# 5.1: PHPStan Level 10: resolve remaining User/Lang type debt

> Questa story combinata resta come storico. La consegna canonica è stata separata per ownership in `7.1-USER` e `7.1-LANG`; le sezioni LOCKED sottostanti non sono state riscritte.

**Story ID:** 5.1
**Epic:** 5 — Code Quality & Infrastructure
**Slug:** user-lang-phpstan-debt
**Status:** backlog

## Story

As the tech lead accountable for the PHPStan Level 10 gate,
I want the `User` and `Lang` modules to pass `phpstan analyse` at Level 10 with zero errors,
so that these two modules stop being the largest blockers to the "0 errors across 35/35 modules" quality bar that every other epic depends on.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->


### `stories/6.2.user-invite-workflow.story.md` — 6.2: User invite workflow: admin creates staff + evaluators


# 6.2: User invite workflow: admin creates staff + evaluators

**Story ID:** 6.2
**Epic:** 6 — Setup & Operations
**Slug:** user-invite-workflow
**Status:** backlog

## Story

As a PA admin or HR admin,
I want to invite individual users or upload a CSV batch of staff and evaluators,
so that new PA employees get pending accounts without me manually creating each one in Filament.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. `pa_admin` or `hr_admin` can invite a single user via a Filament form (email, name, intended role, department) from the Setup module. [Source: prd.md#FR-010]
2. The Setup module accepts a CSV upload (columns: email, name, role, department) and creates one pending user invite per valid row. [Source: prd.md#FR-010]

### `stories/6.3.permission-seeding-invite-batch.story.md` — 6.3: Permission seeding: auto-assign roles to invite batch


# 6.3: Permission seeding: auto-assign roles to invite batch

**Story ID:** 6.3
**Epic:** 6 — Setup & Operations
**Slug:** permission-seeding-invite-batch
**Status:** backlog

## Story

As a PA admin,
I want the invite batch's requested roles automatically validated and assigned once I confirm them,
so that invited staff and evaluators land in the system already permissioned, without a separate manual RBAC pass.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. For an invite batch created by story 6.2, an action reads each invited user's stored `intended_role` string and validates it against the five roles seeded in 6.1 (`staff`, `evaluator`, `hr_admin`, `finance`, `pa_admin`). [Source: prd.md#FR-005] [Source: prd.md#FR-010]
2. Unrecognize

### `stories/7.1.phpstan-application-contracts.story.md` — Story 7.1-USER — Contratti applicativi PHPStan


# Story 7.1-USER — Contratti applicativi PHPStan

## Story

Come maintainer User, voglio correggere i contratti applicativi PHPStan separatamente dai test, affinché API e modelli siano affidabili e il lavoro resti entro una giornata.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. PHPStan su `Modules/User/app` non riporta errori applicativi con config invariata.
2. API Filament deprecate, Socialite, Data e relazioni Eloquent sono corrette con tipi concreti e API Filament correnti.
3. Nessun comportamento auth/RBAC, schema DB o API pubblica è alterato.
4. Nessun ignore, baseline, config, Service nuovo o `mixed` evitabile è introdotto.
5. La doc canonica `docs/phpstan.md` registra pattern e decisioni, non un nuovo duplicato.

## Tasks / Su

### `stories/7.2.phpstan-test-harness-contracts.story.md` — Story 7.2-USER — Harness e test PHPStan


# Story 7.2-USER — Harness e test PHPStan

## Story

Come maintainer User, voglio correggere alla fonte i test Team/User/2FA, affinché il gate analizzi test semanticamente validi senza coverage farming.

## Acceptance Criteria

<!-- LOCKED. External dev tools must not edit Acceptance Criteria. -->

1. Dopo 7.1-USER, PHPStan su `Modules/User` termina con zero errori.
2. I cluster TeamManagement, UserModel, TwoFactor e Resource usano TestCase/helper reali e valori tipizzati; funzioni o proprietà inesistenti non sono simulate.
3. Le asserzioni restano semanticamente utili; test tautologici o coverage-only sono riscritti o rimossi alla fonte secondo owner.
4. Nessun ignore, stub locale, `tests/Support`, config o `mixed` evitabile viene introdotto.
5. Pest mirato dei file toccati è verde sul m

### `stories/7.3.test-mai-eseguiti-suffisso-mancante.story.md` — 7.3: due test di User non venivano eseguiti da nessuno


# 7.3: due test di User non venivano eseguiti da nessuno

**Status:** done — **Created:** 2026-08-27

## Il difetto

`Modules/User/phpunit.xml` seleziona i test così:

```xml
<directory suffix="Test.php">./tests</directory>
```

Un file sotto `tests/` che chiama `test(...)` o `it(...)` ma **non** finisce in
`Test.php` non viene caricato da nessuno. PHPStan lo analizza — e conta i suoi errori —
mentre il runner non lo vede: protezione zero, rumore pieno.

| File | Diagnosi | Azione |
|---|---|---|
| `tests/Feature/user-management-business-logic.php` | duplicato di `UserManagementBusinessLogicTest.php`, **zero righe proprie** su 407 | rimosso |

### `stories/7.4.phpstan-paramtype-coverage.story.md` — USER-7.4 — Param type mancanti nel modulo User


# USER-7.4 — Param type mancanti nel modulo User

## GitHub (tracciamento)

| Artefatto | URL |
|---|---|
| Issue (base) | https://github.com/laraxot/base_techplanner_fila5/issues/55 |
| Issue (module_user_fila5) | https://github.com/laraxot/module_user_fila5/issues/86 |

## User story

Come **maintainer del modulo User**,
voglio **ogni parametro di metodo e closure tipizzato nativamente**,
così che **il gate full-tree `phpstan analyse Modules` torni verde senza toccare i `.neon`**.

## Contesto

Story coordinatrice: `Modules/Xot/docs/stories/17.17.phpstan-modules-typecoverage-zero.story.md`.


### `stories/7.5.mixed-type-reduction.story.md` — USER-7.5 — Ridurre `mixed` dove possibile


# USER-7.5 — Ridurre `mixed` dove possibile

## User story

Come **maintainer del modulo User**,
voglio **che `mixed` compaia solo dove il valore è genuinamente polimorfico o
imposto da una firma vendor**,
così che **PHPStan possa inferire tipi reali invece di rinunciare, e i bug di
narrowing (vedi `7.4`) siano più rari**.

## Contesto

Convenzione di progetto (root `CLAUDE.md`): "cerchiamo di non usare mixed,
quando lo troviamo cerchiamo di sostituirlo con qualcosa di adeguato". Non è
il gate `typeCoverage.paramTypeCoverage` di `7.4` (quello impone un tipo
*qualsiasi*, `mixed` incluso, e non lo conta — vedi memoria
`type-coverage-non-conta-mixed`): qui l'obiettivo è la qualità del tipo, non
la sua sola presenza.


### `stories/8.1-phpstan-l10-user-config-offset-access.story.md` — Story 8.1: PHPStan L10 User Module — Config offsetAccess Resolution


# Story 8.1: PHPStan L10 User Module — Config offsetAccess Resolution

> **Aggiornamento 2026-10-06 (secondo giro)**: la soluzione sotto basata su `@var` inline NON regge con la config corrente
> (`treatPhpDocTypesAsCertain: false`): PHPStan segnala di nuovo `mixed given`. La migrazione ora restringe i tipi a runtime
> (`config()->boolean()/array()`, helper `configString()`): vedi
> [2026-10-06-phpstan-cleanup-user.dev](./2026-10-06-phpstan-cleanup-user.dev.md). I nomi tabella restano sempre quelli di `config/permission.php`.

**Date**: 2026-10-06  
**Owner**: User module  
**Status**: RESOLVED  
**Goal**: Eliminate 77 offsetAccess.nonOffsetAccessible errors in User module migration

## Context

The User module's migration file (`2026_10_05_174817_create_permission_tables.php`) had 77 PHP

### `stories/8.1.module-remote-git-object-corruption.story.md` — 8.1: module_user_fila5 remote git object corruption


# 8.1: module_user_fila5 remote git object corruption

## Story

As a maintainer, I want the `module_user_fila5` GitHub remote's missing commit object restored,
so that local commits (already correct, already fixing today's PHPStan zero campaign work) can
finally push to `laraxot/dev`.

## Root Cause (verified on code, not docs, 2026-09-07)

- `git push laraxot dev` from `laravel/Modules/User` fails: `error: Could not read
  c7892391780616a206fa0508dc1f1f23cc90f2c6`.
- Confirmed NOT a local-only shallow-clone boundary: even a plain `git status` in the module fails
  with `error: Could not read c7892391...` / `fatal: Failed to traverse parents of commit
  9af40070...` — the local repo's own object graph is missing this object too, and `git fetch
  --unshallow` does not recover it (ran it, 

### `stories/8.2.phpstan-pest-void-chain-false-positives.story.md` — 8.2 — PHPStan: falsi positivi `it()->todo()` / `uses()->group()` (void chain)


# 8.2 — PHPStan: falsi positivi `it()->todo()` / `uses()->group()` (void chain)

## Contesto

Task da coordinatore fleet phpstan-swarm: 38 errori PHPStan in 16 file di
`Modules/User/tests/`, tutti dello stesso pattern:

```
[method.nonObject] Cannot call method todo() on null.
[function.void] Result of function it (void) is used.
```

(idem per `uses(...)->group(...)`).

## Causa radice

`laravel/phpstan.neon` ha **deliberatamente** disabilitato l'extension Pest
per PHPStan:


### `stories/8.3-uppercase-root-folders-and-changelog-dup.story.md` — 8.3 — Cartelle maiuscole in root (`Application/`, `Database/`)

# 8.3 — Cartelle maiuscole in root (`Application/`, `Database/`)

## Contesto

Trovato durante l'audit fleet-wide `phpstan analyse Modules` (story root
`docs/stories/5.130-quality-gates-residuals.story.md`, sessione
claude-16515-fila5, 2026-09-15). Riportato qui per la regola: un finding
specifico di un modulo vive nella documentazione del modulo, non solo nella
story cross-modulo che lo ha scoperto.

Pillar 6 dello standing order: nessuna cartella con iniziale maiuscola nella
root del modulo (il codice sta in `app/`, non in `Application/`/`Database/`).

## Stato verificato

`ls -d Modules/User/[A-Z]*` (2026-09-15 ~21:15): `Application/`, `Database/`
esistono in root. Contenuto non ancora ispezionato — **prima di spostare
qualunque cosa, verificare ogni riferimento namespace/autoload** (no

### `stories/8.4.phpstan-bootstrap-import-stripping-corruption.story.md` — Contesto


## Contesto

Richiesta utente: eseguire `phpstan analyse Modules`, analizzare e sistemare TUTTE le segnalazioni, coordinandosi con altri agenti AI concorrenti sullo stesso repository (lavoro multi-agente attivo), senza mai fermarsi.

PHPStan/Larastan effettua il bootstrap completo dell'applicazione Laravel (tutti i service provider, tutti i moduli) prima di analizzare qualsiasi path. Un singolo file PHP con sintassi/riferimenti rotti in QUALSIASI punto dell'albero blocca l'intera analisi, indipendentemente dal path passato a `analyse`.

## Problema riscontrato

Durante tentativi ripetuti di ottenere un run pulito (9 tentativi consecutivi), ogni run falliva su un file diverso in `Modules/User`, tutti con la stessa firma: righe `use ...;` rimosse dal blocco import, mentre il corpo della cla

### `stories/9.1.super-admin-widget.story.md` — 9.1: SuperAdmin XotBaseWidget + vista + lang


# 9.1: SuperAdmin XotBaseWidget + vista + lang

**Story ID:** 9.1  
**Epic:** 9 — SuperAdmin user-menu widget  

**Epic:** 9: SuperAdmin user-menu widget  
**Slug:** super-admin-widget  
**Status:** done

> Planning locked. Sized to one session. No story points. Implementata e verificata (vedi Dev Agent Record).

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| [laraxot/module_user_fila5#100](https://github.com/laraxot/module_user_fila5/issues/100) | Campagna Http/Livewire → widget (padre Epic 9) |
| [discussions/101](https://github.com/laraxot/module_user_fila5/discussions/101) | Perché solo Filament widget |

## Story

### `stories/9.2.admin-panel-provider-hook.dev.md` — 9.2 development record


# 9.2 development record

## Reproduction

On 2026-09-27, the read-only PA smoke logged in as `operatore@fixcity.demo` and
requested `/fixcity/admin/tickets`. The response was HTTP 500:
`InvalidArgumentException: No hint path defined for [filament-jet]`. The stack
identified `Modules/User/Http/Livewire/Profile/SuperAdmin::render()` and the
stale `filament-jet::livewire.profile.super-admin` view. The prior browser test
passed falsely because it only searched the exception page for `tickets`.

## Expected state and correction

`SuperAdminWidget` and its `user::filament.widgets.profile.super-admin` view
already exist and pass widget unit/feature contracts. Mount the widget class in
`PanelsRenderHook::USER_MENU_BEFORE`, per the existing User module architecture.
The canonical provider map spe

### `stories/9.2.admin-panel-provider-hook.story.md` — 9.2: AdminPanelProvider — hook SuperAdmin sul widget


# 9.2: AdminPanelProvider — hook SuperAdmin sul widget

**Story ID:** 9.2  
**Epic:** 9 — SuperAdmin user-menu widget  

# 9.2: AdminPanelProvider: hook SuperAdmin sul widget

**Epic:** 9: SuperAdmin user-menu widget  
**Slug:** admin-panel-provider-hook  
**Status:** done

> Unico file PHP di questa story: `AdminPanelProvider.php`. **Non implementare ora.**

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| DA CREARE | issue `laraxot/module_user_fila5` |
| DA CREARE | discussion |

### `stories/9.3.remove-livewire-superadmin.story.md` — 9.3: Rimuovere Livewire HTTP SuperAdmin


# 9.3: Rimuovere Livewire HTTP SuperAdmin

**Story ID:** 9.3  
**Epic:** 9 — SuperAdmin user-menu widget  

**Epic:** 9: SuperAdmin user-menu widget  
**Slug:** remove-livewire-superadmin  
**Status:** done

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| DA CREARE | issue `laraxot/module_user_fila5` |
| DA CREARE | discussion |

```bash
gh -R laraxot/module_user_fila5 issue create --title "9.3 remove Http Livewire SuperAdmin" --body "Canon: laravel/Modules/User/docs/stories/9.3.remove-livewire-superadmin.story.md"
```

### `stories/9.4.super-admin-widget-tests.story.md` — 9.4: Test Pest SuperAdmin widget


# 9.4: Test Pest SuperAdmin widget

**Story ID:** 9.4  
**Epic:** 9 — SuperAdmin user-menu widget  

**Epic:** 9: SuperAdmin user-menu widget  
**Slug:** super-admin-widget-tests  
**Status:** ready-for-dev

## GitHub (tracciamento)

| Risorsa | Ruolo |
|---------|-------|
| DA CREARE | issue `laraxot/module_user_fila5` |
| DA CREARE | discussion |

```bash
gh -R laraxot/module_user_fila5 issue create --title "9.4 Pest SuperAdminWidget" --body "Canon: laravel/Modules/User/docs/stories/9.4.super-admin-widget-tests.story.md"
```

### `stories/9.5.super-admin-widget-icons.story.md` — 9.5: Icone semantiche SuperAdmin widget


# 9.5: Icone semantiche SuperAdmin widget

**Richiesta utente**: "sul filament widget superuser devi migliorare le 2 icone,
magari qualcosa di piu' adeguato".

## B (business)

Il widget nel chrome Filament (`SuperAdminWidget`) mostra un'icona diversa a
seconda dello stato corrente dell'utente e permette di fare toggle cliccandola.
Le icone devono comunicare a colpo d'occhio lo stato attuale (privilegio
elevato attivo vs rinunciato), non solo essere decorative.

## M (analisi stato precedente)

File: `Modules/User/resources/views/filament/widgets/profile/super-admin.blade.php`.

Stato precedente:
- `isSuperAdmin()` (privilegio ATTIVO ora) -> `heroicon-o-shield-check` colore
  `warning`. Problema: "shield-check" nel linguaggio icone standard significa

### `stories/9.6.super-admin-widget-marvel-icons.story.md` — 9.6: icone crown Marvel-style animate per SuperAdmin widget


# 9.6: icone crown Marvel-style animate per SuperAdmin widget

**Richiesta utente**: "metti una icona stile marvel per superadmin, qualcosa se
vuoi divertente elegante stile outline, con leggera animazione fatti i 2 svg".

## B (business)

Sostituisce gli `heroicon-o-shield-*` della story 9.5 (che a sua volta aveva
sostituito il vecchio `fas-chess-king` + CSS `rotate-180`, story 9.1) con 2 SVG
custom del modulo, coerenti con l'estetica "corona" storica del widget ma
disegnati da zero in stile outline, con micro-animazione hover.

## M (analisi)

**Come funziona il set icone custom `user-*`** (non ovvio, verificato leggendo
il codice, non per sentito dire): `Modules\Xot\app\Providers\XotBaseServiceProvider::registerBladeIcons()`
registra automaticamente `Modules/<Nome>/resources/svg/` come

### `stories/9.7.super-admin-widget-icons-final.story.md` — 9.7: SuperAdminWidget, stato finale icone + regressione risolta


# 9.7: SuperAdminWidget, stato finale icone + regressione risolta

**Richiesta utente**: "migliora le 2 icone" -> "stile Marvel, outline, animazione,
fatti i 2 svg" -> "le icone non si vedono, studia i doc Filament icons/icon-button,
gli svg li autoregistriamo".

## Race multi-sessione (stesso prompt, piu' sessioni parallele)

Working tree condivisa, 3 file (`super-admin.blade.php`,
`superadmin.svg`, `negate-superadmin.svg`) riscritti 6+ volte in un
pomeriggio da sessioni concorrenti. Storia gia' raccontata in dettaglio da:
`9.5` (heroicon-shield, bug `heroicon-o-crown` inesistente catturato),
`9.6` e `superadmin-widget-crown-icons-2026-09-21` (design crown+gemma,
bug reale `@svg('modulo::svg.file')` sintassi invalida trovato e corretto),
`superadmin-widget-negate-icon-fix-2026-09-21` (re

### `stories/9.9.super-admin-widget-docs-verification.story.md` — 9.9: verifica documentazione campagna + diagnosi residua icone


# 9.9: verifica documentazione campagna + diagnosi residua icone

**Richiesta utente** (2026-09-21): documentare (non implementare) la conversione
`Http/Livewire/Profile/SuperAdmin.php` → Filament widget, le modifiche a
`AdminPanelProvider`, l'inventario dei componenti Livewire convertibili, i
vantaggi widget-only; poi "migliora SuperAdminWidget che le icone non si
vedono" + "sistema tutte le segnalazioni phpstan".

## Esito — parte documentale

## Esito: parte documentale

**Tutta la documentazione richiesta esisteva gia' ed e' stata riverificata
contro il disco** (nessun file riscritto, solo verifica):

| Richiesta | Documento canonico | Stato |
|-----------|--------------------|-------|
| Conversione SuperAdmin → widget | stories 9.1→9.4 + `bmad/tech-spec.md` | ✅ done, verificato |
| M

### `stories/area-personale-servizi-cms-page.story.md` — Area personale /servizi: pagina CMS mancante (404)


# Area personale /servizi: pagina CMS mancante (404)

## Contesto

Audit front office (guest + authenticated): `GET /it/area-personale/servizi` risponde **404**.
Le altre quattro pagine dell'area personale (`pratiche`, `seguite`, `notifiche`, `impostazioni`)
sono pagine CMS JSON in `config/local/fixcity/database/content/pages/area-personale/` con
`layout: design-comuni` e `middleware: ["auth"]`.

Esiste anche un blade Volt `Modules/User/resources/views/pages/area-personale/servizi.blade.php`
(route Folio `area-personale.servizi`), ma e' irraggiungibile: la catch-all del tema
`[container0]/[slug0]` risolve prima via `ResolvePageAction` e, non trovando la pagina CMS
`area-personale.servizi`, abortisce 404. Lo stesso vale per i blade Volt delle altre pagine:
il JSON CMS e' la SSoT, il blade 

### `stories/auth-i18n-all-locales.story.md` — Pagine auth e segnalazioni in tutte le lingue (it, en, de, es)

# Pagine auth e segnalazioni in tutte le lingue (it, en, de, es)

- Stato: done (2026-10-07)
- Fase BMAD: Quick Flow (audit sistematico, fix, test di regressione)
- Owner: Modules/User (lang auth), Modules/Fixcity (lang ticket/global), tema Sixteen (lang navigation, view logout)

## Problema

`/en/auth/login` era in italiano. Causa strutturale: `fallback_locale = it`, quindi una chiave mancante in en/de/es mostra l'italiano
senza errori. Il difetto riguardava tutte le lingue e piu' pagine.

## Metodo

`bashscripts/tools/i18n/audit-locales.py` (vedi `bashscripts/docs/i18n-locale-audit.md`): per ogni pagina e lingua confronta le righe
visibili con la stessa pagina in italiano (identiche = non tradotte) e cerca chiavi grezze `ns::gruppo.chiave`.

## Trovato e corretto

- `/auth/password/reset

### `stories/auth-pages-i18n-en-de-es-07.story.md` — Login e registrazione in inglese, tedesco e spagnolo

# Login e registrazione in inglese, tedesco e spagnolo

- Stato: done (2026-10-07), con aperti elencati sotto
- Fase BMAD: Quick Flow (analisi, fix, verifica a browser e test)
- Owner: Modules/User (lang), Themes/Sixteen (view)
- Collegata a: [login-page-it-translations-fix-2026-10-07.story.md](./login-page-it-translations-fix-2026-10-07.story.md)
  (la sua voce "Aperto" sui locali non italiani e' chiusa qui)

## Problema

`/en/auth/login` mostrava titolo e tutti i testi in italiano, e le etichette dei campi come chiavi
grezze minuscole (`email*`, `password*`, `remember` due volte). `de` e `es` avevano lo stesso difetto.

## Cause radice

1. `login_page.*` mancava in en/de/es e `register_page.*` in de/es: Laravel ricade sul locale
   di fallback (`it`).
2. Le 4 chiavi `login.no_account`, `

### `stories/auth-pages-i18n-en-de-es.story.md` — Login e registrazione in inglese, tedesco e spagnolo

# Login e registrazione in inglese, tedesco e spagnolo

- Stato: done (2026-10-07), con aperti elencati sotto
- Fase BMAD: Quick Flow (analisi, fix, verifica a browser e test)
- Owner: Modules/User (lang), Themes/Sixteen (view)
- Collegata a: [login-page-it-translations-fix-2026-10-07.story.md](./login-page-it-translations-fix-2026-10-07.story.md)
  (la sua voce "Aperto" sui locali non italiani e' chiusa qui)

## Problema

`/en/auth/login` mostrava titolo e tutti i testi in italiano, e le etichette dei campi come chiavi
grezze minuscole (`email*`, `password*`, `remember` due volte). `de` e `es` avevano lo stesso difetto.

## Cause radice

1. `login_page.*` mancava in en/de/es e `register_page.*` in de/es: Laravel ricade sul locale
   di fallback (`it`).
2. Le 4 chiavi `login.no_account`, `

### `stories/auth-verify-confirm-design-comuni-shell.story.md` — Auth verify e password/confirm: allineamento al guscio Design Comuni


# Auth verify e password/confirm: allineamento al guscio Design Comuni

## Contesto

Segnalazione utente: `/{lang}/auth/verify` non e' coerente con Design Comuni.
Causa: `Modules/User/resources/views/pages/auth/verify.blade.php` e
`auth/password/confirm.blade.php` usano ancora `<x-layouts.main>` (layout legacy
pre-DCP-290): niente header/footer CMS, card Tailwind grigia, testo inglese residuo.

DCP-290 ha convertito login, register, password/reset e password/[token] al pattern
`<x-layouts.app>` + `<div data-dc>` + `<x-auth.shell>` (breadcrumb, card, h1 unico,
classi `.auth-login-*` di `14-auth-login.css`). Queste due pagine sono sfuggite
perche' non sono pagine CMS JSON: sono blade Volt del modulo, quindi non compaiono
negli audit basati su `content/pages/*.json`.

## Pagina sfuggite — in

### `stories/auth-verify-resend-loading.story.md` — Verify page — spinner su "richiedine un altro"


# Verify page — spinner su "richiedine un altro"

## Contesto

Su `/it/auth/verify` il click su "clicca qui per richiederne un altro" parte una
chiamata Livewire (`resend()`) che può richiedere secondi (invio SMTP reale).
Senza feedback l'utente può cliccare di nuovo o pensare che la pagina sia
bloccata. Richiesta esplicita: loading state sempre, senza chiedere.

## Decisione

Nel parziale condiviso
`Themes/Sixteen/resources/views/components/pages/auth/verify.blade.php`:

- `wire:loading.attr="disabled"` + `wire:target="resend"` sul bottone
  (impedisce il doppio invio e tiene coerenza con `login.blade.php`).
- `<x-filament::loading-indicator wire:loading wire:target="resend">` inline +
  testo "invio in corso…" al posto della label, via `wire:loading.remove` /
  `wire:loading` — stesso p

### `stories/cache-store-env-var-test-infra-21.story.md` — phpunit.xml: CACHE_DRIVER non ha effetto, serve CACHE_STORE


# phpunit.xml: CACHE_DRIVER non ha effetto, serve CACHE_STORE

## Contesto

Durante verifica del fix concorrente su `HasSpatiePermission::hasPermissionToOrCreate()`
(vedi sezione "Feature verificata" sotto), i test in
`Modules/User/tests/Feature/HasSpatiePermissionAutoCreateTest.php` fallivano con:

```
QueryException: SQLSTATE[42S02]: Base table or view not found:
1146 Table 'quaeris_data_test.cache' doesn't exist
```

## Causa radice

- `config/cache.php:19` → `'default' => env('CACHE_STORE', 'database')`. Legge **solo**
  `CACHE_STORE`. Non legge `CACHE_DRIVER` (nome deprecato, pre-Laravel 11).
- `phpunit.xml` impostava `<env name="CACHE_DRIVER" value="array" />` — nessun effetto,
  var mai letta.

### `stories/cache-store-env-var-test-infra.story.md` — phpunit.xml: CACHE_DRIVER non ha effetto, serve CACHE_STORE


# phpunit.xml: CACHE_DRIVER non ha effetto, serve CACHE_STORE

## Contesto

Durante verifica del fix concorrente su `HasSpatiePermission::hasPermissionToOrCreate()`
(vedi sezione "Feature verificata" sotto), i test in
`Modules/User/tests/Feature/HasSpatiePermissionAutoCreateTest.php` fallivano con:

```
QueryException: SQLSTATE[42S02]: Base table or view not found:
<<<<<<< .merge_file_9qIvAB
=======
1146 Table '<nome progetto>_data_test.cache' doesn't exist
>>>>>>> .merge_file_aaKYCe
1146 Table 'quaeris_data_test.cache' doesn't exist
```

## Causa radice


### `stories/continuation.story.md` — User Module — Continuation Task

# User Module — Continuation Task

## Stato
Modulo con modifiche non ancora sincronizzate nel proprio .git.

## Task
1. Aggiungere `protected static string $model =` a tutte le table class mancanti
2. Audit `getTableColumns()` — verificare campi modello
3. Migliorare UI/UX (badge, toggleable, sortable)
4. `php -l` su tutti i file toccati
5. `git commit -m "BMAD: table audit"`

## Modelli attesi (da verificare)
- Tabella: `Modules\$m\Filament\Resources\*`
- Modello: `Modules\$m\Models\*`

### `stories/dashboard-lang-collateral-damage.story.md` — STORY — 500 reale su /user/admin da file lang troncato, audit blast radius commit 0701a777a


# STORY — 500 reale su /user/admin da file lang troncato, audit blast radius commit 0701a777a

## Contesto

Utente ha riportato un `TypeError` reale (report Laravel/Filament completo:
stack trace, request, query log) su `GET /user/admin`,
`192.168.1.35:8000`, PHP 8.4.25, Laravel 13.26.1:

```
array_replace_recursive(): Argument #2 must be of type array, int given
```

`vendor/laravel/framework/.../Translation/FileLoader.php:129`, dentro
`loadNamespaceOverrides()`, chiamato da
`Modules/Lang/app/Actions/Filament/AutoLabelAction.php:113` (`trans($label_key)`),
agganciato via `Action::configureUsing()` in `LangServiceProvider` a OGNI
Filament Action — incluse le action del menu utente sulla Dashboard, da cui il 500.

## Root cause

### `stories/dcp-138-limite-di-tentativi-su-login-registrazione-e-azioni-costose.story.md` — DCP-138: il login e le azioni costose hanno un tetto


# DCP-138: il login e le azioni costose hanno un tetto

Nata da DCP-112 (matrice normativa N-13).

## Lacuna e prova (2026-10-13)
- Alle 17:08, Playwright su `/it/auth/login`: 9 tentativi consecutivi con una email inesistente, nessun blocco. `Modules/User/app/Filament/Widgets/Auth/LoginWidget.php::login()` non aveva `RateLimiter`; `App\Http\Middleware\ThrottleAuthentication` esiste ma nessun codice lo registra (grep su `laravel/` esclusi vendor e docs), legge `auth.rate_limit.*` (chiave non definita in `config/auth.php`) e la sezione `rate_limit` di `config/security.php` non e' letta da alcun codice.
- Alle 17:28 un'altra sessione (G-07 di DCP-54) ha aggiunto in `LoginWidget::login()` un `RateLimiter` (5 tentativi in 60 s, chiave email+IP, messaggio `user::login.actions.login.throttle`) c

### `stories/dcp-144-accesso-del-cittadino-con-spid-cie-o-decisione-motivata.story.md` — DCP-144: come si identifica il cittadino che segnala


# DCP-144: come si identifica il cittadino che segnala

Nata da DCP-112 (matrice normativa N-24, N-25, N-26, N-31).

## Lacuna e prova (2026-10-13)
- Il login e la registrazione sono con email e password (`Modules/User/app/Filament/Widgets/Auth/LoginWidget.php`, `Modules/Gdpr/.../RegisterWidget.php`). Nessuna traccia di SPID o CIE: `grep -riE 'spid|cie|agid|saml|oidc'` su `Modules/*/app` e `config` trova solo i tipi generici del form `SsoProviderResource` (DCP-48); `sso_providers` e `socialite_users` hanno 0 righe.
- La creazione della segnalazione richiede il login (DCP-42, D17), quindi il servizio richiede identificazione.

## Norma (testo vigente letto su Normattiva, registro fonti 03)
CAD art. 64 c. 2-quater: «L'accesso ai servizi in rete erogati dalle pubbliche amministrazioni che ri

### `stories/dcp-446-reset-password-con-la-policy-della-registrazione.story.md` — DCP-446: il reset password applica la stessa policy della registrazione


# DCP-446: il reset password applica la stessa policy della registrazione

Status: **done con decisioni aperte** (codice chiuso il 2026-11-11 nell'audit L-11, riga E-01; documentato qui il 2026-11-12). La correzione chiude
il punto 7 di DCP-290 («password policy di reset… DA DECIDERE, non cambiati») **solo per la parte di coerenza**; il valore della regola e il
controllo con servizio esterno restano al titolare (vedi «Cosa non ho deciso»). Confronto con le altre decisioni dell'audit: discussion
[#94](https://github.com/laraxot/theme_sixteen_fila5/discussions/94), riga R-5.

## Richiesta

Utente, 2026-11-11: controllare integralmente il front office, da loggato e da non loggato, per andare in produzione; correggere ciò che non si vede
come dovrebbe.

## Misurato (prima)

Nella pagina di re

### `stories/docs-index-audit.story.md` — Story: audit indice documentazione (Modules/User/docs)


# Story: audit indice documentazione (Modules/User/docs)

## User story

Come manutentore del modulo User, voglio un `docs/index.md` organizzato per argomento su tutti i ~3238 file `.md` presenti, cosi' da poter trovare la documentazione corrente senza scorrere manualmente le cartelle `archive/`, `legacy/`, `wiki-archive/` e le decine di varianti duplicate (`-1`, `_underscore`, `.deprecated`, snapshot datati).

## Acceptance criteria

- [x] `docs/index.md` creato/aggiornato con 26 sezioni tematiche e link relativi a 1170 file attivi (root + sottocartelle)
- [x] Nessun file `.md` esistente rinominato, spostato o cancellato
- [x] Duplicati e contenuto storico raggruppati sotto "Storico / da consolidare" (cartelle di archivio in blocco con conteggio, varianti root/sottocartella per cluster, 

### `stories/docs-merge-conflict-markers-cleanup.story.md` — User: marker di conflitto git residui in docs/ — pulizia + aggiornamento indice


# User: marker di conflitto git residui in docs/ — pulizia + aggiornamento indice

<<<<<<< .merge_file_I1gHYz
=======
# User: marker di conflitto git residui in docs/: pulizia + aggiornamento indice
>>>>>>> .merge_file_S1Xs9B
## Coordinamento

- Scope: solo `laravel/Modules/User/docs/**/*.md` (auth, RBAC Spatie, Filament
  widgets login/register, pattern XotBase — business logic User, non codice PHP).
- Storia correlata: [user-nested-conflict-marker-cleanup.story.md](./user-nested-conflict-marker-cleanup.story.md)
  (marker annidati daemon `87273113`/`f548be94`); questa story resta il canone per
  le ondate di pulizia marker in `docs/`.
- Sessione 2026-11-23 (docs-guardian): recidiva con **154 file** / ~1409 aperture
  `<<<<<<<` (quasi tutte annidate `.merge_file_*`). Risoluzione ricorsiv

### `stories/docs-user-studio-e-ingressi.story.md` — User: studio del modulo, ingressi docs e cause dei link rotti


# User: studio del modulo, ingressi docs e cause dei link rotti

Fase BMAD: documentazione e qualita' (DOC-010 e DOC-002 del piano `bmad-output/stories/docs-organization/`).

## Richiesta

Studiare `laravel/Modules/User`, confrontare codice e `docs/`, correggere gli ingressi con fatti verificati e spiegare perche' i link
sono rotti in massa (audit di partenza: 3360 file `.md`, 1538 nella radice, 16149 link, 56% rotti, 632 stub, 1100 corpi duplicati).
Vietato spostare, rinominare o cancellare file e lanciare `dups --fix`.

## Analisi

**Il modulo.** `Modules\User`: 50 modelli e 39 policy, 14 trait, 59 Actions, 232 file Filament (26 risorse), 14 componenti Livewire,
16 comandi Artisan, 102 migrazioni, 32 cartelle `lang/`, 316 file in `tests/` (185 `.php`). Rotte caricate: `POST /logout`,
`P

### `stories/form-column-parity.story.md` — Story: parita' Forms/Components ↔ Tables/Columns (User)


# Story: parita' Forms/Components ↔ Tables/Columns (User)

## User story

Come sviluppatore del modulo User,
voglio `UserColumn` e `SingleRoleSelectColumn` come gemelli di `UserSection` e `SingleRoleSelect`,
allineandomi alla regola piattaforma gia' applicata in Ptv.

## Acceptance criteria

- [x] `UserColumn` raggruppa `first_name`, `last_name`, `email`
- [x] `SingleRoleSelectColumn` riusa le stesse opzioni di `SingleRoleSelect`
- [x] Test `FormColumnParityTest` verde
- [x] Documentazione [form-column-parity.md](../form-column-parity.md)

## Riferimenti

- [form-column-parity.md](../form-column-parity.md)
<<<<<<< .merge_file_9rMEQz

### `stories/lang-files-empty-stub-corruption.story.md` — Story: file di lingua User svuotati a stub senza return

# Story: file di lingua User svuotati a stub senza return

Status: done

## GitHub (tracciamento)

| Artefatto | URL |
|---|---|
| Issue (module_user_fila5) | https://github.com/laraxot/module_user_fila5/issues/102 |

## Story

Come utente di `/user/admin`, voglio che il pannello si apra senza `TypeError`, cosi'
posso gestire utenti, ruoli e viste invece di vedere una schermata di errore.

## Acceptance Criteria

1. I 4 file `Modules/User/lang/it/{client,role,login,view_user}.php` contengono un
   `return [...]` reale e restituiscono un array, verificato con `include()`.
2. Provenienza dichiarata per byte: contenuto ripreso da un commit reale via

### `stories/login-page-it-translations-fix.story.md` — Login FO /it/auth/login: traduzioni mancanti e copy errato

# Login FO /it/auth/login: traduzioni mancanti e copy errato

- Stato: done (2026-10-07)
- Fase BMAD: Quick Flow (analisi, fix, verifica)
- Owner: Modules/User (lang, UserForm), tema Sixteen (view widget)

## Problema

La pagina mostrava 12 chiavi grezze (`user::login.no_account`, `user::auth.login_page.*`),
il bottone in inglese ("Login"), "Parola d'ordine" al posto di "Password" e la regola
di registrazione ("Minimo 12 caratteri...") sotto la password del login.

## Cause radice

1. `lang/it/login.php` svuotato nel commit 6c1a42617: persi `no_account`, `register_now`,
   `forgot_password_text`, `reset_it`.
2. `user::auth.login_page.*` non esisteva in nessun lang file.
3. `Modules/Fixcity/lang/it.json`: `"Password": "Parola d'ordine"` (override globale).
4. `UserForm` e' condiviso da logi

### `stories/login-unknown-database-fixcity-user.story.md` — Login FO: Unknown database 'fixcity_user'

# Login FO: Unknown database 'fixcity_user'

- Stato: parziale (2026-10-07)
- Fase BMAD: Quick Flow (investigate, fix, verifica)
- Owner: Modules/User (connessione `user`), toccati Media, Rating, Fixcity (migrazioni)

## Problema

`POST /livewire/update` da `/it/auth/login`: `SQLSTATE[1049] Unknown database 'fixcity_user'`
in `LoginWidget::login()` (`Auth::attempt`).

## Causa radice

I database `fixcity_user` e `fixcity_data` non esistevano su MariaDB locale (solo `fixcity_data_test`).
Non e' un bug di codice. Lo script citato dalla wiki (`provision-local-mysql.sh`) non esiste piu'.

## Azioni

- `CREATE DATABASE IF NOT EXISTS` per `fixcity_user` e `fixcity_data` (utf8mb4_unicode_ci, come `trade_*`).
- `php artisan migrate --database=user`: su DB fresco falliva per migrazioni raw (`Schema

### `stories/logout-post-localized-route.story.md` — Logout: POST /{lang}/auth/logout rispondeva 405

# Logout: POST /{lang}/auth/logout rispondeva 405

- Stato: done (2026-10-07)
- Fase BMAD: Quick Flow (errore da trace, causa, fix, verifica HTTP)
- Owner: Modules/User (`LogoutAction`), route dell'app (`laravel/routes/web.php`)

## Problema

`MethodNotAllowedHttpException`: "The POST method is not supported for route it/auth/logout.
Supported methods: GET, HEAD." Gli header del tema inviano un form POST con CSRF a `route('logout')`.

## Cause radice

1. `route('logout')` e' la pagina Folio `auth/logout`, che accetta solo GET/HEAD.
2. L'handler POST esisteva ma in `Modules/User/routes/web.php`, che **non viene mai caricato**:
   `XotBaseRouteServiceProvider::map()` e' disabilitato di proposito ("Folio + Volt").
3. `LogoutAction` faceva `redirect()->route('home')`, route inesistente: avrebb

### `stories/oauth-access-token-permission-self-heal-permissiondoesnotexist-deve-piu-produrre.story.md` — Permission self-heal: PermissionDoesNotExist non deve piu' produrre 500

# Permission self-heal: PermissionDoesNotExist non deve piu' produrre 500

Status: done
Data: 2026-09-21
Modulo owner: User

## Bug

`GET /user/admin/users` -> 500. `Spatie\Permission\Exceptions\PermissionDoesNotExist`: "There is no permission
named `oauth-access-token.view.any` for guard `web`." Origine: `OauthAccessTokenPolicy::viewAny()` ->
`$user->hasPermissionTo('oauth-access-token.view.any')`. Ambiente: 192.168.1.35:8000, PHP 8.4.25, Laravel 13.26.1.

## Analisi BMAD

**B (business)**: un permesso mancante in DB non deve mai rompere una pagina Filament con 500; deve negare
l'accesso (comportamento sicuro di default) e potersi auto-riparare dove esplicitamente richiesto.

**M (model/architettura)**: ~230+ Policy nel repo chiamano `hasPermissionTo('<risorsa>.<abilita>')` con stringa
le

### `stories/oauth-access-token-permission-self-heal.story.md` — Permission self-heal: PermissionDoesNotExist non deve piu' produrre 500

# Permission self-heal: PermissionDoesNotExist non deve piu' produrre 500

Status: done
Data: 2026-09-21
Modulo owner: User

## Bug

`GET /user/admin/users` -> 500. `Spatie\Permission\Exceptions\PermissionDoesNotExist`: "There is no permission
named `oauth-access-token.view.any` for guard `web`." Origine: `OauthAccessTokenPolicy::viewAny()` ->
`$user->hasPermissionTo('oauth-access-token.view.any')`. Ambiente: 192.168.1.35:8000, PHP 8.4.25, Laravel 13.26.1.

## Analisi BMAD

**B (business)**: un permesso mancante in DB non deve mai rompere una pagina Filament con 500; deve negare
l'accesso (comportamento sicuro di default) e potersi auto-riparare dove esplicitamente richiesto.

**M (model/architettura)**: ~230+ Policy nel repo chiamano `hasPermissionTo('<risorsa>.<abilita>')` con stringa
le

### `stories/phpstan-cleanup-user.dev.md` — [DEV] PHPStan cleanup modulo User


# [DEV] PHPStan cleanup modulo User

## Technical Plan

1. Leggere file, chiamanti (`grep`), doc modulo e history; capire lo scopo prima di toccare.
2. Dove l'errore indica logica mancante => implementarla (conteggio revoche, ramo "User not found", assert dei test).
3. Dove e' codice morto confermato dai chiamanti => rimuoverlo (variabili/query inutili), mai file.
4. Insiemi di valori => backed enum in `app/Enums/`; costanti di configurazione => costanti tipizzate.
5. Config `mixed` => restringere a runtime (`config()->boolean()/array()/string()` o `is_string`), mai `@var`.

## Files to Modify

Codice (`laravel/Modules/User/`):
- `app/Enums/NameSearchEnum.php` (nuovo), `DefaultRoleId.php` (nuovo), `FetchUserApiTokenExitCode.php` (nuovo), `UserType.php`
- `app/Actions/Socialite/ResolveUser

### `stories/phpstan-cleanup-user.story.md` — [STORY] PHPStan cleanup modulo User


# [STORY] PHPStan cleanup modulo User

## User Request

> «sistema tutte le segnalazioni di phpstan [...] concentrati sullo scopo/funzionalita', non sull'errore;
> aumenta la qualita' del codice; usa enum al posto delle costanti».

Gruppo: `User` — 108 errori in 43 file (`laravel/Modules/User/**`), livello `max`.

## Analysis

Ogni segnalazione e' stata letta come sintomo dello *scopo* del codice, non come riga da zittire.

| Area | Scopo del codice | Cosa diceva l'errore davvero |
|------|------------------|------------------------------|
| Migrazione `2026_10_05_174817_create_permission_tables` (+ 2 copie legacy) | Creare le tabelle Spatie **con i nomi di `config/permission.php`** (immutabili: `model_has_permission`, ...) | `config()` e' `mixed`: i `@var` inline erano finti e PHPStan (`

### `stories/phpstan-fix-user.story.md` — phpstan-fix-user.story



### `stories/phpstan-merge-bootstrap.story.md` — User: PHP merge-marker bootstrap


# User: PHP merge-marker bootstrap

## GateGuard (first touch)

1. **Existing related docs (not duplicates of this scope):**
   - `docs-merge-conflict-markers-cleanup.story.md` — solo `docs/`, già done
   - `resolve-conflict-markers-user-app-tests.story.md` — 10 file storici, status blocked-verification; inventory attuale è 150 PHP
   - `resolve-conflict-markers-user-lang.story.md` — 6 file lang storici
   - `user-nested-conflict-marker-cleanup.story.md` — cleanup nested docs/markers legacy
2. **Linked from:** claim table di questa lane swarm; riferimenti crociati nelle story `supersedes`/`related` sopra; write-back progress in questa story.
3. **Perché nuovo file:** nome canonico richiesto dal task multi-agente (`phpstan-merge-bootstrap.story.md`) con claim table su **tutti** i PHP User 

### `stories/placeholder-translations-cleanup.story.md` — Via le traduzioni segnaposto dai file di lingua


# Via le traduzioni segnaposto dai file di lingua

Rimosse le voci `helper_text`, `placeholder`, `description`, `tooltip`, `label`, `heading` e `hint` uguali al nome del
campo. Le aveva scritte il salvataggio automatico delle chiavi mancanti (`AutoLabelAction`, solo in locale) e
comparivano in produzione come testo sotto e dentro i campi. Eliminati anche i file `.php` senza nome.

Strumento: `php artisan lang:clean-placeholders {Modulo} [--dry-run]` (modulo Lang). Tocca solo i file di soli
dati: quelli che chiamano funzioni restano come sono.

### `stories/register-logout-verify-email.story.md` — Registrazione, logout e verifica email (FO)

# Registrazione, logout e verifica email (FO)

- Stato: done (2026-10-07)
- Fase BMAD: Quick Flow (investigate, fix, verifica nel browser reale)
- Owner: Modules/User; toccati Notify (mail), Themes/Sixteen (Folio, header)

## Problemi trovati

1. Logout: gli header POSTano a `route('logout')`, che e la pagina Folio `auth/logout` (solo GET): `405 Method Not Allowed`.
   `LogoutAction` esisteva ma non era collegata a nessuna route e rimandava a `route('home')`, inesistente.
2. Da `/en` il form di logout puntava a `/it/auth/logout` (la route Folio risolve sempre il locale di default).
3. Registrazione: utente creato ma risposta 500, nessuna mail: `verification.verify` non definita; poi layout mail rotto
   (`html_layout_path` NULL, sintassi Handlebars in un motore Mustache), poi template di v

### `stories/register-page-ui-ux.story.md` — Registrazione FO /it/auth/register: traduzioni, struttura card, mobile

# Registrazione FO /it/auth/register: traduzioni, struttura card, mobile

- Stato: done (2026-10-07). Parte posta: vedi `../auth-register-email.md`
- Fase BMAD: Quick Flow (analisi, fix, verifica nel browser)
- Owner: Modules/User (lang, widget), tema Sixteen (view e CSS)

## Problema

9 chiavi `user::...` grezze (titolo, sottotitolo, sidebar, pulsante, "hai gia' un account"), quattro riquadri annidati,
contenuto tagliato su mobile, campo password senza larghezza per colpa del pulsante "Mostra password",
CTA come contorno bianco mentre il login ha il CTA pieno.

## Cause radice

1. Chiavi mai definite in `lang/it` (`auth.register_page.*` e `registration.actions.register.*`, `registration.already_registered`).
2. `register.blade.php` del widget annidava `x-filament::section` e padding dentr

### `stories/roles-teams-scoping-disabled-by-override.md` — Story: il team scoping dei ruoli e' disattivato da un override di `roles()`


# Story: il team scoping dei ruoli e' disattivato da un override di `roles()`

## GitHub (tracciamento)

Repository letto con `cd laravel/Modules/User && git remote -v`:
**`laraxot/module_user_fila5`**.

| Risorsa | Stato | URL |
|---|---|---|
| Issue | DA CREARE | https://github.com/laraxot/module_user_fila5/issues |
| Discussion | DA CREARE | https://github.com/laraxot/module_user_fila5/discussions |

`gh` non e' autenticato in questa sessione e i repository sono privati.

## Story

Come **responsabile della sicurezza di una piattaforma multi-tenant**, voglio
**che un ruolo assegnato a un utente dentro un tenant valga solo dentro quel
tenant**, cosi' che **l'isolamento fra clienti non dipenda da quale schermata si

### `stories/scritture-dentro-accessor-nei-moduli-condivisi.story.md` — Sei accessor nei moduli condivisi scrivono a database quando vengono letti


# Sei accessor nei moduli condivisi scrivono a database quando vengono letti

Fase BMAD: Analisi fatta, sviluppo **non** iniziato di proposito. Vedi "Perche'
non e' stato corretto subito".

## Scopo

Un accessor Eloquent (`get...Attribute`) e' una lettura. Quando dentro ci sta
una `update()`, leggere una proprieta' scrive a database: una query in piu' per
ogni riga disegnata in una tabella, per ogni elemento di una collection, per
ogni contatto dentro un job.

Il difetto e' gia' stato trovato e corretto due volte nel modulo Quaeris:

- `Contact::getSurveyIdAttribute()`, il 2026-11-05 — scattava dentro il job del
  token, una UPDATE per contatto;
- `Contact::getDuplicateCountAttribute()`, il 2026-11-10 — scattava dentro
  `SendInviteAction` e su ogni riga di `ContactsTable`, una COUNT piu'

### `stories/story-501-personal-ticket-detail-link.md` — STORY-501 — Dettaglio dalla lista “Le mie pratiche”


# STORY-501 — Dettaglio dalla lista “Le mie pratiche”

## User story

Come cittadino autenticato voglio aprire il dettaglio di una mia segnalazione dall'area
personale, anche se lo stato non è ancora pubblico, così posso consultare i dati e seguire gli
aggiornamenti senza cercare un link esterno.

## Stato verificato

La pagina `area-personale/pratiche.blade.php` già interroga
`BuildAuthenticatedUserTicketsQueryAction` e mostra titolo, data e stato. Il titolo non è un
link e non c'è un'azione esplicita per aprire `/tickets/{id}`. Il dettaglio Fixcity già consente
la visibilità al proprietario autenticato tramite `isVisibleOnPublicFrontoffice()`.

## Acceptance criteria

- [ ] Ogni pratica ha un link localizzato al dettaglio della stessa pratica.
- [ ] Il proprietario può aprire il proprio

### `stories/superadmin-widget-crown-icons.story.md` — SuperAdminWidget: icone corona + fix bug reale @svg()


# SuperAdminWidget: icone corona + fix bug reale @svg()

## Richiesta

"metti una icona stile marvel per superadmin, qualcosa se vuoi divertente elegante
stile outline, con leggera animazione fatti i 2 svg" — evoluzione della story
precedente (`superadmin-widget-icons-2026-09-21.story.md`).

Nota copyright: nessun logo Marvel riprodotto (rischio trademark). Direzione presa:
corona outline generica (tema "super"-admin), non un personaggio specifico.

## Bug reale trovato e corretto

Durante l'ennesima riscrittura concorrente del file (5a+ versione della stessa
sessione pomeridiana), e' comparsa questa chiamata:

```blade
@svg('user::svg.super-admin', 'w-7 h-7 ...')
```

### `stories/superadmin-widget-icons.story.md` — SuperAdminWidget: icone piu' adeguate


# SuperAdminWidget: icone piu' adeguate

## Richiesta

"sul filament widget superuser devi migliorare le 2 icone .. magari qualcosa di piu'
adeguato" — icone originali (`git diff` verso HEAD): `fas-chess-king` (FontAwesome)
usata due volte, seconda copia ruotata 180 gradi via CSS (`rotate-180`) per
rappresentare lo stato "negato". Design fragile: stessa icona, trucco CSS, nessun
significato visivo immediato.

## Race multi-agente sullo stesso file (5+ versioni in pochi minuti)

`Modules/User/resources/views/filament/widgets/profile/super-admin.blade.php` e'
stato riscritto da una sessione concorrente mentre lavoravo, in sequenza:

1. `user-superadmin` / `user-negate-superadmin` (icon set custom, mai registrato in
   `config/blade-icons.php` — nomi morti, probabile 404 icona)
2. `heroicon-

### `stories/superadmin-widget-negate-icon-fix.story.md` — SuperAdminWidget: icona "negato" ambigua, ripristinata a simbolo di divieto standard

# SuperAdminWidget: icona "negato" ambigua, ripristinata a simbolo di divieto standard

Status: done
Data: 2026-09-21
Modulo owner: User

## Richiesta

"sul filament widget superuser devi migliorare le 2 icone .. magari qualcosa di piu' adeguato".

## Analisi BMAD

**B (business)**: il widget `SuperAdminWidget` mostra un solo toggle icona, stato attivo (corona,
`color="warning"`) o negato (corona sbarrata, `color="danger"`). L'icona negata deve comunicare
"accesso vietato" a colpo d'occhio, non un'astrazione ambigua.

**M (model)**: icone risolte via `blade-ui-kit/blade-icons`, set `user` (prefix `user`, path
`Modules/User/resources/svg/`) — vedi `config/blade-icons.php` (sets vuoto in config, il set
`user` e' registrato altrove nel bootstrap Filament del modulo, confermato via
`app(\Blade

### `stories/uppercase-root-dirs-database-application.story.md` — Contesto


## Contesto

Audit repo-wide (2026-09-22): nessuna cartella con caratteri maiuscoli deve stare
nella root di un modulo — root ammette solo `app/`, `config/`, `database/`,

nella root di un modulo: root ammette solo `app/`, `config/`, `database/`,
`resources/`, `routes/`, `tests/`, `docs/` ecc. (lowercase); il PascalCase è
riservato alle classi PSR-4 dentro `app/`. Trovate due violazioni nella root di
`Modules/User`: `Database/` e `Application/`.

## Investigazione

### `Modules/User/Database/`

- Contenuto: 8 migration in `Migrations/` (users, password_resets, permission,
  model_has_roles x2, device_user, socialite_user) + 1 factory
  (`factories/DeviceProfileFactory.php`).
- Confronto con l'equivalente lowercase `Modules/User/database/migrations/`:
  stessi nomi file, ma contenuto **div

### `stories/user-gap-analysis.story.md` — Story — Gap analysis utente + clean-up fase 1 (2026-09-22)


# Story — Gap analysis utente + clean-up fase 1 (2026-09-22)

- **Epic**: USER-GAP-2026
- **Status**: done
- **Ambito**: `laravel/Modules/User` — analisi architetturale a sola lettura (report BMAD) + fase 1 di igiene (rimozione artefatti morti).

# Story: Gap analysis utente + clean-up fase 1 (2026-09-22)

- **Ambito**: `laravel/Modules/User`: analisi architetturale a sola lettura (report BMAD) + fase 1 di igiene (rimozione artefatti morti).
- **AC**:
  - Report prodotto in `laravel/Modules/User/docs/bmad/user-architecture-gap-analysis.md` (inventario, top gap, punti sani, work item).
  - Rimozione di soli file morti verificati: 0 riferimenti in produzione (rg su `laravel/`, escluso il file stesso).
  - Nessuna modifica a logica viva; unico edit `tests/Unit/Datas/UserDatasAndEnumsCoverage

### `stories/user-hash-password-solo-nelle-actions.story.md` — Password hashate solo in un'Action


# Password hashate solo in un'Action

Fase BMAD: Dev (analisi chiusa, pronta per l'implementazione senza DB).

## Richiesta

Come maintainer del modulo User voglio che l'hash della password si calcoli in un solo posto (una Action piu' il mutator del model come rete di sicurezza), cosi' che widget, pagine e form Filament non decidano da soli come si cambia una password.

Il brief temeva un doppio hash per un cast `'password' => 'hashed'`. Quel cast non e' attivo. Il rischio vero e' un altro, ed e' piu' grave: vedi "Stato misurato".

## Scopo

Cambiare, reimpostare o creare una password deve sempre: hashare una volta sola, rinnovare la scadenza (`password_expires_at`), azzerare `is_otp`, ruotare il `remember_token` e lanciare `NewPasswordSet`. Oggi ogni sito lo fa a modo suo (alcuni dimenti

### `stories/user-module-closure.story.md` — User: chiusura modulo 2026-09-11


# User: chiusura modulo 2026-09-11

## Story

Come manutentore, voglio chiudere il modulo User secondo il protocollo
standard (pillar 5: phpstan + phpmd + phpinsights + pest, coverage.md,
commit+push su tutti i remote) dopo le modifiche fatte oggi in questo
modulo durante la saga `XotBaseManageRelatedRecords` (migrazione
`ManageRolePermissions` ai 5 hook, fix conflitto `git stash` in
`BaseProfilesTable.php`), così che l'utente non debba chiedermelo di nuovo
e le cose "da risolvere" restanti (root+User non ancora committati) siano
gestite subito, non rimandate con una domanda.

## Contesto / Baseline

`git status --porcelain` nel modulo User mostra un diff MOLTO più ampio
delle mie sole modifiche: ~50 file `Tables/*.php` toccati, 20 file
`.github/workflows/*` CANCELLATI, `.codeclimate.yml`

### `stories/user-nested-conflict-marker-cleanup-22.story.md` — User: marker di conflitto annidati residui + disposizione .wip/.corrected


# User: marker di conflitto annidati residui + disposizione .wip/.corrected

## Contesto

Audit richiesto dall'utente il 2026-09-22 sul repo indipendente
`laravel/Modules/User` (remote `laraxot` = `git@github.com:laraxot/module_user_fila5.git`,
branch `dev`). `git status` all'apertura: 9 file `M` non staged (nessun rebase attivo),
branch **diverged da laraxot/dev: 58 commit avanti, 79 indietro**.

Firma nota (memoria second brain `project-local-autocommit-daemon-per-module.md`):
uno script della famiglia `merge_remote_repo_2.sh`/`dummy_push()` ha eseguito merge
automatici che hanno committato marker letterali non risolti — **gia' presenti anche
sul remote `laraxot/dev`** (verificato con `git show laraxot/dev:<path>`, non solo
locale). Commit-hash ricorrenti nei marker: `87273113 (.)` (qua

### `stories/user-nested-conflict-marker-cleanup.story.md` — User: marker di conflitto annidati residui + disposizione .wip/.corrected


# User: marker di conflitto annidati residui + disposizione .wip/.corrected

## Contesto

Audit richiesto dall'utente il 2026-09-22 sul repo indipendente
`laravel/Modules/User` (remote `laraxot` = `git@github.com:laraxot/module_user_fila5.git`,
branch `dev`). `git status` all'apertura: 9 file `M` non staged (nessun rebase attivo),
branch **diverged da laraxot/dev: 58 commit avanti, 79 indietro**.

Firma nota (memoria second brain `project-local-autocommit-daemon-per-module.md`):
uno script della famiglia `merge_remote_repo_2.sh`/`dummy_push()` ha eseguito merge
automatici che hanno committato marker letterali non risolti — **gia' presenti anche
sul remote `laraxot/dev`** (verificato con `git show laraxot/dev:<path>`, non solo
locale). Commit-hash ricorrenti nei marker: `87273113 (.)` (qua

### `stories/user-pagine-appearance-salvataggio-o-nascondi.story.md` — Pagine Appearance di User: implementare il salvataggio o nasconderle


# Pagine Appearance di User: implementare il salvataggio o nasconderle

Fase BMAD: Analisi chiusa, in attesa della decisione dell'utente; poi Dev.

## Richiesta
Come maintainer del pannello `user::admin` voglio che ogni voce di menu faccia qualcosa di vero, cosi' che chi preme "Salva" non trovi un errore.
Oggi sei pagine del cluster Appearance sono nel menu e "Salva" lancia `LogicException`: il salvataggio non e' mai stato scritto e nessun codice legge quei valori.

## Scopo
Le sei pagine (Logo, Colors, Background, Alignment, Favicon, CustomCss) erano il pannello "aspetto" copiato da uno scaffold di terze parti (ipotesi, non verificabile: nessun pacchetto in `vendor`; i campi sono quelli tipici di un pannello auth: logo chiaro/scuro, 5 colori, sfondo con overlay, allineamento, favicon, CS

### `stories/user-passport-create-client-credentials-button.md` — STORY — Pulsante "Nuovo cliente OAuth" nella Passport Dashboard


# STORY — Pulsante "Nuovo cliente OAuth" nella Passport Dashboard

## Contesto

Emerso durante il ripristino del servizio invii automatici dopo il trasloco
server (vedi
[quaeris-bulk-invite-job-resilience.md](../../laravel/Modules/Quaeris/docs/stories/quaeris-bulk-invite-job-resilience.md)):
[<nome progetto>-bulk-invite-job-resilience.md](../../laravel/Modules/<nome progetto>/docs/stories/<nome progetto>-bulk-invite-job-resilience.md)):
l'amministratore di questo server **non ha accesso SSH**. Onboardare un
nuovo cliente (es. un quinto cliente oltre ad ATS/Clara/Smat/Vivaservizi)
richiede oggi 3 passi, di cui uno bloccato:

1. Creare l'account utente — già possibile via UI, nessun problema
2. **Creare le credenziali OAuth con `php artisan passport:client --client`
   — BLOCCATO, richiede 

### `stories/user-passport-new-credentials-button-lost-in-large-commit.md` — STORY — Il bottone "Nuove credenziali" è scomparso dalla Passport Dashboard


# STORY — Il bottone "Nuove credenziali" è scomparso dalla Passport Dashboard

## Contesto

L'utente ha chiesto l'URL della Passport Dashboard per usare il bottone
"Nuove credenziali" (story `user-passport-create-client-credentials-button.md`,
`module_user_fila5#85`, implementato e verificato dal vivo il 2026-09-03).
Aperta la pagina, il bottone non c'era: solo i 4 bottoni originari
(`passport_install`, `passport_keys`, `passport_purge`, `passport_hash`).

## Cosa è successo, verificato nel git log (non un'ipotesi)

```
git log --all -p -S "new_credentials" -- laravel/Modules/User/app/Filament/Clusters/Passport/Pages/PassportDashboard.php
```

**Aggiunto**: commit `78575b2c85fe0f629141630ba17ddf8bd815d236`, 2026-09-03,
autore **Malebestia** (l'utente stesso) — `feat+fix: pulsante Nuove
cr

### `stories/user-quality-gate-04.story.md` — Story: Quality-gate closure — Modules/User (2026-09-04)

<<<<<<< .merge_file_3SrsYJ
<<<<<<< .merge_file_tyOdP9
<<<<<<< .merge_file_MSoBS0
=======
>>>>>>> .merge_file_eKjTq0
=======
>>>>>>> .merge_file_iqkfAh
---
title: "Story: Quality-gate closure — Modules/User (2026-09-04)"
type: story
qmd: "user quality gate 04 story qualitygate"
---
<<<<<<< .merge_file_3SrsYJ
<<<<<<< .merge_file_tyOdP9
=======
>>>>>>> .merge_file_CNjqXL
=======
>>>>>>> .merge_file_eKjTq0
=======
>>>>>>> .merge_file_iqkfAh

### `stories/user-quality-gate.story.md` — Story: Quality-gate closure — Modules/User (2026-09-04)

<<<<<<< .merge_file_8PQCNc
<<<<<<< .merge_file_e7bzaQ
<<<<<<< .merge_file_ojZcZv
=======
>>>>>>> .merge_file_LSmFY6
=======
>>>>>>> .merge_file_sO2ZWk
---
title: "Story: Quality-gate closure — Modules/User (2026-09-04)"
type: story
qmd: "user quality gate story qualitygate closure"
---
<<<<<<< .merge_file_8PQCNc
<<<<<<< .merge_file_e7bzaQ
=======
>>>>>>> .merge_file_41Qx9n
=======
>>>>>>> .merge_file_LSmFY6
=======
>>>>>>> .merge_file_sO2ZWk

### `stories/user-stringhe-ui-tradotte.story.md` — Stringhe UI del Filament User tradotte


# Stringhe UI del Filament User tradotte

Fase BMAD: Dev (inventario completo, lavoro diviso in 5 tranche con PHPStan).

## Richiesta

Come utente o amministratore che usa il pannello in italiano, inglese o tedesco voglio che ogni etichetta, segnaposto, suggerimento e titolo di notifica del modulo User venga da `lang/`, cosi' che non compaiano testi in una lingua sola o inglese dentro un'interfaccia italiana.

La story 12.2 ha fatto l'inventario di 23 etichette in 8 file ed e' ancora in backlog. Questa ne misura l'intero perimetro (83 righe, 19 file) e lo spezza in tranche eseguibili.

## Scopo

Le stringhe scritte nel codice (`->label('Nome')`) scavalcano il sistema di chiavi di Xot: la chiave attesa e' `user::<classe_in_snake>.fields.<campo>.label` (regola in `Modules/Xot/app/Actions/Ge

### `stories/user-tenant-fillable-cast-e-colonne.story.md` — Tenant User: fillable, cast e colonne allineati alla migration


# Tenant User: fillable, cast e colonne allineati alla migration

Fase BMAD: Dev (verifica dei fatti fatta, pronta per l'implementazione senza DB).

## Richiesta

Come maintainer del modulo User voglio che `Modules\User\Models\Tenant` dichiari `$fillable`, `casts()` e `@property` coerenti con le colonne che la migration crea davvero, cosi' che form, tabelle e test leggano e scrivano `domain`, `is_active`, `trial_ends_at` e `settings` con il tipo giusto.

Oggi il model non casta nulla: `is_active` torna come intero, `trial_ends_at` come stringa e `settings` come JSON grezzo. I test lo aggirano a mano.

## Scopo

La tabella `tenants` (connessione `user`) descrive i clienti multi-tenant: nome, slug, dominio, database dedicato, attivo si/no, fine prova e impostazioni. Chi la usa sono la `Tena

### `stories/user-test-igiene-phpunit-testcase-e-svuotati.story.md` — Igiene dei test User: file non eseguiti, tautologie, stile PHPUnit


# Igiene dei test User: file non eseguiti, tautologie, stile PHPUnit

Fase BMAD: Dev (story pronta; i test non si lanciano finche' la guardia DB non e' dentro).

## Richiesta
Come maintainer del modulo User voglio che ogni test scritto giri davvero e possa fallire, cosi' che il verde significhi qualcosa.
Oggi due file con test veri non sono mai caricati, 26 test non possono fallire e 7 classi sono in stile PHPUnit mentre il progetto usa Pest.

## Scopo
I test servono a proteggere il comportamento di User (auth, team, ruoli, OAuth). Un test dentro un `try` con `catch` vuoto, o in un file che `phpunit.xml` non vede, da' copertura apparente: la regola e' "riscritti o rimossi alla fonte" (`7.2.phpstan-test-harness-contracts.story.md`, criterio 3). Il lavoro sul database (`RefreshDatabase`, `T

### `stories/user-test-senza-refresh-database.story.md` — Test User senza RefreshDatabase


# Test User senza RefreshDatabase

Fase BMAD: Dev (story pronta, esecuzione dei test bloccata fino alla guardia e al verdetto utente).

## Richiesta

Come maintainer del modulo User voglio che nessun test del modulo possa lanciare `migrate:fresh`, cosi' che un agente o un CI che esegue Pest non possa mai cancellare lo schema di un database.

Il 2026-10-20 un agente ha eseguito Pest su file User con `RefreshDatabase`. La regola di progetto lo vieta (`bashscripts/ai/wiki/rules/data-sacred-no-destructive-db.md`, sezione "Cosa fare invece / Test"): l'isolamento si ottiene con `DatabaseTransactions` nel `TestCase` del modulo.

## Scopo

I test dei model User (Device, Permission, Profile, Team, Tenant, BaseUser), dell'action `GetCurrentDeviceAction` e della logica utente/ruoli/permessi devono v

### `stories/users-migration-owner-convention.story.md` — User migration owner convention


# User migration owner convention

The `User` model has one canonical owner migration:
`2026_11_12_120000_create_users_table.php`.

When the owner schema needs a column correction, update that migration and refresh
its timestamp. Do not add a parallel `repair_*`, `add_*`, or `update_*` migration
for the same model/table. This preserves the module rule:

> one model → one migration → one seeder → one factory

The migration remains forward-only and idempotent through `XotBaseMigration`,
`tableCreate()`, `tableUpdate()`, `hasColumn()` and `updateTimestamps()` guards.
The `deleted_at` repair is therefore part of the User owner migration, not a
second migration.

### `stories/users-migrations-consolidation.story.md` — Migrazioni users: consolidamento in create_users_table


# Migrazioni users: consolidamento in create_users_table

## Contesto

In produzione `users` è una tabella legacy senza `deleted_at`: l'auth va in 500
(`Unknown column 'users.deleted_at'`). La prima correzione aveva introdotto la migrazione
`2026_11_12_000002_repair_users_deleted_at_column.php`, che **non rispettava le
convenzioni**:

- nome file: dopo la data deve essere `<azione>_<modello_plurale>_table`
  (`create_users_table` / `update_users_table`), non `repair_*_column`;
- **una migrazione per modello**: i cambi colonna si fanno nella migrazione del
  modello, modificandola e cambiandone il timestamp — non in file `repair_*` /
  `add_*_to_*` separati.

Stessa violazione per le due migrazioni sorelle su `users`:
`2026_10_22_000001_repair_users_type_state_columns.php` e
`2026_11_11_00

### `stories/xotbaseresourcetable-suspect-columns-user-module-followup.story.md` — Follow-up — colonne sospette e bug reale (modulo User)


# Follow-up — colonne sospette e bug reale (modulo User)

## Story

Durante l'audit `$model`+colonne (epic root
`xotbaseresourcetable-model-property-and-column-audit`, workflow
2026-09-11), i batch User-A/B/C hanno segnalato — senza correggerli,
fuori `owned_scope` del batch — questi elementi. Il primo e' un bug
reale con rischio di errore SQL a runtime, gli altri sono drift di
migrazione da verificare.

## Bug reale (priorita' alta)

**`OauthClientResource.php`** e' rimasto configurato sul model Passport
vanilla (`Laravel\Passport\Client`, connessione default) invece del
model custom del progetto (`Modules\User\Models\OauthClient`, connessione
`user`). Conseguenza verificata: `grant_types`, `redirect_uris`,
`owner_id`, `owner_type` — colonne dichiarate in
`OauthClientResource/Tables/Oaut

### `strategy.md` — Product Strategy: User Module


# Product Strategy: User Module

## 🌍 Market Context
Identity is the core of every system. PTVX needs a "plug-and-play" auth module that can handle complex PA roles.

## 💎 Unique Value Proposition
Native integration with XotBase classes ensuring that permissions are automatically respected in Filament resources.

## 🏛️ Strategic Pillars
1. **Security First:** Standard Laravel security patterns (Fortify, Spatie).
2. **Scalability:** Optimized DB queries for permission checking.
3. **Modular Ready:** Each module can define its own permissions without core modifications.

## 🗺️ Strategic Roadmap (1-2 Years)
Transition to an OAuth2/OIDC provider role to allow external applications to authenticate via the User module.

### `structure.md` — Modulo User


# Modulo User

Data: 2025-04-23 19:09:56
## Informazioni generali
- **Namespace principale**: Modules\\User
Modules\\User\\Database\\Factories
Modules\\User\\Database\\Seeders
- **Pacchetto Composer**: laraxot/module_user_fila5
Marco Sottana
- **Dipendenze**: flowframe/laravel-trend * jenssegers/agent * laravel/passport * socialiteproviders/auth0 * spatie/laravel-personal-data-export * repositories type path url ../Xot type path url ../Tenant type path url ../UI
- **Totale file PHP**: 673
- **Totale classi/interfacce**: 300
## Struttura delle directory
```
.devcontainer
.git
.git/branches
.git/hooks
.git/info

### `sushi-schema-fix.md` — sushi-schema-fix


See canonical documentation: ../../../Themes/docs/shared-components/sushi-schema-fix.md

### `sushi-schema.md` — User Module - Sushi Schema Fix (`SocialProvider` Model)


# User Module - Sushi Schema Fix (`SocialProvider` Model)

This document details the resolution of an SQL syntax error encountered during the analysis of the `SocialProvider` model, which utilizes the `calebporzio/sushi` package.

## **Issue: `SQLSTATE[HY000]: General error: 1 near ")": syntax error`**

- **Problem:** During static analysis (e.g., by Laravel IDE Helper, which inspects models for schema generation), the `Modules\User\Models\SocialProvider` model was causing a fatal SQL error: `create table "social_providers" ()`. This indicated that `Sushi` was attempting to create an in-memory table without any column definitions, resulting in invalid SQL syntax.
- **Root Cause:** The `SocialProvider` model relied on `Sushi` row inference to build the table schema. When `getSushiRows()` r

### `sync-marker-repair-php-lang-tests.md` — Riparazione dei marcatori di conflitto nei PHP del modulo User


# Riparazione dei marcatori di conflitto nei PHP del modulo User

## Perché esiste questa pagina

Lo script di sync `bashscripts/git/subtrees/merge_remote_repo_2.sh` fa il merge di `laraxot/dev` in ogni modulo e
committa con `commit -am .`. Quando i due lati divergono lascia nei file i marcatori `<<<<<<<`, `=======`, `>>>>>>>`,
a volte annidati (un conflitto dentro un conflitto già committato). Un file PHP con i marcatori non si compila:
PHPStan non parte, Pest non carica il file di test e, per i file di lingua, ogni schermata che usa quelle chiavi si
rompe a runtime.

Questa pagina documenta come sono stati ripuliti i file PHP di `Modules/User` (lingua e test; i `.md` sono un altro
lavoro) e **perché** ogni scelta, così il prossimo agente non rifà il ragionamento da zero.

## Regole appl

### `syntax-errors-to-fix.md` — Syntax Errors da Fixare - Modulo User


# Syntax Errors da Fixare - Modulo User

## 🚨 File con Errori Attivi

### 1. PasswordResetConfirmWidget.php

**Path**: `Modules/User/app/Filament/Widgets/Auth/PasswordResetConfirmWidget.php`

**Errore**: `syntax error, unexpected token "catch"` alla linea 179

**Causa**: Conflitto Git mal risolto - manca corrispondente `try {` o parentesi chiuse male

**Linea problematica**: 179
```php
} catch (Exception $e) {  // ← catch orfano, manca try
```

**Contesto** (linee 125-182):
```php

### `syntaxs-to.md` — syntaxs-to


See canonical documentation: ../../../Themes/docs/shared-components/syntax-errors-to-fix.md

### `tailwind.md` — tailwind


See canonical documentation: ../../../Themes/docs/shared-components/tailwind.md

### `task-completare-2fa.md` — Task: Completare 2FA Implementation - User


# Task: Completare 2FA Implementation - User

**Modulo**: User
**Priorita'**: Media
**Completamento**: 40%

---

## Descrizione

L'interfaccia e i contratti per 2FA esistono (`TwoFactorAuthenticatableContract`, `TwoFactorAuthenticationProvider`) ma l'implementazione completa necessita verifica e test end-to-end.

## Stato Attuale

- [x] Contratti definiti
- [x] Modello base preparato
- [ ] Provider TOTP implementato e testato
- [ ] UI Filament per setup 2FA
- [ ] Recovery codes

### `task-consolidare-documentazione.md` — Task: Consolidare Documentazione - User


# Task: Consolidare Documentazione - User

**Modulo**: User
**Priorita'**: Media
**Completamento**: 20%
**Data**: 2026-01-30

---

## Descrizione

664 file di documentazione necessitano consolidamento. Molti sono duplicati storici.

## Azioni

1. Rimuovere duplicati e file obsoleti in `archive/`
2. Unificare guide auth in un singolo `auth-guide.md`
3. Creare indice navigabile in README.md
4. Rinominare file che violano naming conventions

### `task-consolidareocumentazione.md` — Task: Consolidare Documentazione - User


# Task: Consolidare Documentazione - User

**Modulo**: User
**Priorita'**: Media
**Completamento**: 20%

---

## Descrizione

664 file di documentazione necessitano consolidamento. Molti sono duplicati storici.

## Azioni

1. Rimuovere duplicati e file obsoleti in `archive/`
2. Unificare guide auth in un singolo `auth-guide.md`
3. Creare indice navigabile in README.md
4. Rinominare file che violano naming conventions


### `task-ottimizzare-baseuser.md` — Task: Ottimizzare BaseUser Model - User


# Task: Ottimizzare BaseUser Model - User

**Modulo**: User
**Priorita'**: Bassa
**Completamento**: 60%

---

## Descrizione

Il modello BaseUser usa molti traits che aggiungono complessita'. Verificare che tutti siano necessari e ottimizzare le query N+1.

## Stato Attuale

Traits in uso: HasUuids, HasApiTokens, Notifiable, SoftDeletes, HasAuthenticationLogTrait, HasTeams, HasTenants, HasSpatiePermission, HasModules, HasSocialite, HasDevices, HasChildren, HasXotFactory.

## Azioni

1. Verificare che tutti i traits siano effettivamente utilizzati

### `task-ridurre-phpstan-suppressioni.md` — Task: Ridurre Suppressioni PHPStan Inline - User


# Task: Ridurre Suppressioni PHPStan Inline - User

**Modulo**: User
**Priorita'**: Alta
**Completamento**: 0%

---

## Descrizione

39 suppressioni `@phpstan-ignore` inline nel codice app/. Le principali aree:

## File Coinvolti

| File | Suppressioni | Tipo |
|------|-------------|------|
| `app/Models/BaseUser.php` | 6 | mixed type su relazioni Eloquent |
| `app/Models/Traits/IsProfileTrait.php` | 4 | collection type covariance |
| `app/Filament/Widgets/UserTypeRegistrationsChartWidget.php` | 2 | return type |

### `task-schema-org-person-enhancement.md` — Task: Schema.org Person Enhancement - [DATE]


# Task: Schema.org Person Enhancement - [DATE]

**Module**: User  
**Status**: Pending  
**Priority**: Medium  

## Research Summary

Based on comprehensive research of Schema.org documentation, I've identified key areas for enhancement in the User module:

### 1. Enhanced Person Schema
- **URL**: https://schema.org/Person
- **Implementation**: Add comprehensive profile support
- **Files to modify**: 
  - `laravel/Modules/User/app/Models/User.php`

### 2. Address Integration
- **URL**: https://schema.org/address
- **Implementation**: Add address support to Person schema

### `task-test-socialite-actions.md` — Task: Test Copertura Socialite Actions - User


# Task: Test Copertura Socialite Actions - User

**Modulo**: User
**Priorita'**: Alta
**Completamento**: 30%

---

## Descrizione

Le 13 Socialite Actions gestiscono il flusso OAuth social login ma hanno copertura test limitata. Queste sono critiche per la sicurezza.

## Actions da Testare

| Action | Test Esistente | Priorita' |
|--------|---------------|-----------|
| `CreateSocialiteUserAction` | Parziale | Critica |
| `LoginUserAction` | No | Critica |
| `RegisterOauthUserAction` | No | Alta |

### `tasks/001-user-management-system.md` — Task 001: Implement User Management and Authentication System

<<<<<<< .merge_file_4nXBB4
<<<<<<< .merge_file_FFiI1H
<<<<<<< .merge_file_79UVIF
=======
>>>>>>> .merge_file_MREu6L
---
title: "Task 001: Implement User Management and Authentication System"
type: note
qmd: "001 user management system task implement"
---
<<<<<<< .merge_file_4nXBB4
=======
>>>>>>> .merge_file_AQsJCL
=======
>>>>>>> .merge_file_noO5Di
=======
>>>>>>> .merge_file_MREu6L
# Task 001: Implement User Management and Authentication System

## Description

### `tasks/audit-dipendenze-user.md` — Task: Audit Completo Dipendenze User

<<<<<<< .merge_file_2a2mBE
<<<<<<< .merge_file_lERbOr
<<<<<<< .merge_file_Z3ouFO
=======
>>>>>>> .merge_file_ahRt5x
---
title: "Task: Audit Completo Dipendenze User"
type: audit
qmd: "audit dipendenze user task completo"
---
<<<<<<< .merge_file_2a2mBE
=======
>>>>>>> .merge_file_mb4S1r
=======
>>>>>>> .merge_file_7tq397
=======
>>>>>>> .merge_file_ahRt5x
# Task: Audit Completo Dipendenze User

**Modulo**: User  

### `tasks/auditipendenze-user.md` — auditipendenze-user


See canonical documentation: ../../../../Themes/docs/shared-components/audit-dipendenze-user.md

### `tasks/aumentare-copertura-test-user.md` — Task: Aumentare Copertura Test User

<<<<<<< .merge_file_h3a8Hd
<<<<<<< .merge_file_KVtqhm
<<<<<<< .merge_file_dSemCt
=======
>>>>>>> .merge_file_qiIzRM
---
title: "Task: Aumentare Copertura Test User"
type: note
qmd: "aumentare copertura test user task"
---
<<<<<<< .merge_file_h3a8Hd
=======
>>>>>>> .merge_file_BcP4NL
=======
>>>>>>> .merge_file_yor4M8
=======
>>>>>>> .merge_file_qiIzRM
# Task: Aumentare Copertura Test User

**Modulo**: User  

### `tasks/fix-doc-merge-markers.md` — Task: Fix Documentation Merge Markers (User Module)

<<<<<<< .merge_file_t8XiPf
<<<<<<< .merge_file_e0MsTQ
<<<<<<< .merge_file_08y4DL
=======
>>>>>>> .merge_file_Maro4n
---
title: "Task: Fix Documentation Merge Markers (User Module)"
type: note
qmd: "fix merge markers task user"
---
<<<<<<< .merge_file_t8XiPf
=======
>>>>>>> .merge_file_NKngK8
=======
>>>>>>> .merge_file_RtW4pT
=======
>>>>>>> .merge_file_Maro4n
# Task: Fix Documentation Merge Markers (User Module)

## 📋 Obiettivo

### `tasks/fixoc-merge-kers.md` — fixoc-merge-kers


See canonical documentation: ../../../../Themes/docs/shared-components/fix-doc-merge-markers.md

### `tasks/query-optimization-user.md` — Task: Query Optimization User

<<<<<<< .merge_file_F3K46T
<<<<<<< .merge_file_NLhk4U
<<<<<<< .merge_file_ty6JZ3
=======
>>>>>>> .merge_file_Ami1Vm
---
title: "Task: Query Optimization User"
type: note
qmd: "query optimization user task"
---
<<<<<<< .merge_file_F3K46T
=======
>>>>>>> .merge_file_UuT7E7
=======
>>>>>>> .merge_file_JRFO5z
=======
>>>>>>> .merge_file_Ami1Vm
# Task: Query Optimization User

**Modulo**: User  

### `tasks/spostamento-widget-violante.md` — Task: Spostamento Widget Violante

<<<<<<< .merge_file_2oaE5q
<<<<<<< .merge_file_5zdCHM
<<<<<<< .merge_file_F0omTV
=======
>>>>>>> .merge_file_duBfYl
---
title: "Task: Spostamento Widget Violante"
type: note
qmd: "spostamento widget violante task"
---
<<<<<<< .merge_file_2oaE5q
=======
>>>>>>> .merge_file_ZOSvxf
=======
>>>>>>> .merge_file_BBaUey
=======
>>>>>>> .merge_file_duBfYl
# Task: Spostamento Widget Violante

**Modulo**: User  

### `tasks/tasks-index.md` — Indice task - Modulo User

<<<<<<< .merge_file_Qg3nJI
<<<<<<< .merge_file_9yiU9I
<<<<<<< .merge_file_GwOf6F
=======
>>>>>>> .merge_file_VQt6y1
---
title: "Indice task - Modulo User"
type: note
qmd: "tasks indice task user"
---
<<<<<<< .merge_file_Qg3nJI
=======
>>>>>>> .merge_file_2QSvyb
=======
>>>>>>> .merge_file_lJ30NW
=======
>>>>>>> .merge_file_VQt6y1
# Indice task - Modulo User

Lista dei task del modulo con link ai file .md separati. Ogni task è un file nella cartella `tasks/`.

### `tasks/user-cleanup-docs.md` — Task: User Docs Cleanup

<<<<<<< .merge_file_oVpwVK
<<<<<<< .merge_file_nluyRt
<<<<<<< .merge_file_2pz136
=======
>>>>>>> .merge_file_g7cCqG
=======
>>>>>>> .merge_file_ObQQdl
---
title: "Task: User Docs Cleanup"
type: note
qmd: "user cleanup task"
---
<<<<<<< .merge_file_oVpwVK
<<<<<<< .merge_file_nluyRt
=======
>>>>>>> .merge_file_lxRTSt
=======

>>>>>>> .merge_file_g7cCqG
=======

### `tasks/user-cleanupocs.md` — user-cleanupocs


See canonical documentation: ../../../../Themes/docs/shared-components/user-cleanup-docs.md

### `tasks/user-filament-v5-alignment.md` — Task: User Filament v5 Alignment (Clusters)

<<<<<<< .merge_file_J0RNHs
<<<<<<< .merge_file_Rox4U3
<<<<<<< .merge_file_5xuGdU
=======
>>>>>>> .merge_file_RUQkju
---
title: "Task: User Filament v5 Alignment (Clusters)"
type: note
qmd: "user filament v5 alignment task clusters"
---
<<<<<<< .merge_file_J0RNHs
=======
>>>>>>> .merge_file_4Cm1lG
=======
>>>>>>> .merge_file_SYWq0W
=======
>>>>>>> .merge_file_RUQkju
# Task: User Filament v5 Alignment (Clusters)

## 📋 Obiettivo

### `tasks/user-filament-v5.md` — Task: User Filament v5 Alignment (Clusters)

<<<<<<< .merge_file_S1CGbS
<<<<<<< .merge_file_PhnGLI
<<<<<<< .merge_file_DZ1zDE
=======
>>>>>>> .merge_file_Vtss2Y
---
title: "Task: User Filament v5 Alignment (Clusters)"
type: note
qmd: "user filament v5 task alignment clusters"
---
<<<<<<< .merge_file_S1CGbS
=======
>>>>>>> .merge_file_YP509M
=======
>>>>>>> .merge_file_IOR7v9
=======
>>>>>>> .merge_file_Vtss2Y
# Task: User Filament v5 Alignment (Clusters)

## 📋 Obiettivo

### `tasks/user-management-system.md` — user-management-system


See canonical documentation: ../../../../Themes/docs/shared-components/001-user-management-system.md

### `tasks-schema-org-person.md` — Task: Schema.org Person (profilo utente e speaker)


# Task: Schema.org Person (profilo utente e speaker)

**Priority**: MEDIUM
**Status**: TODO
**Estimated Effort**: 1-2 days
**Reference**: [Schema.org Person](https://schema.org/Person)

---

## Objective

Implement Schema.org **Person** type for user profiles, speakers, and attendees to improve SEO, knowledge graph presence, and author attribution.

**Reference Links:**
- [schema-org-enhancements](schema-org-enhancements.md)
- [Schema.org Person](https://schema.org/Person)
- [Meetup schema-org-enhancement-recommendations](../../meetup/docs/schema-org-enhancement-recommendations.md)
- [Meetup schema-org-research-comprehensive](../../meetup/docs/schema-org-research-comprehensive.md)


### `team-contract-usage-reasoning.md` — TeamContract Usage Reasoning

<<<<<<< .merge_file_CWZ6wZ
<<<<<<< .merge_file_tf2K9f
<<<<<<< .merge_file_jTrAlG
=======
>>>>>>> .merge_file_9OmX6Y
=======
>>>>>>> .merge_file_srKeuc
---
title: "TeamContract Usage Reasoning"
type: contract
qmd: "team contract usage reasoning teamcontract"
---
<<<<<<< .merge_file_CWZ6wZ
<<<<<<< .merge_file_tf2K9f
=======
>>>>>>> .merge_file_PiKZRE
=======
>>>>>>> .merge_file_9OmX6Y
=======
>>>>>>> .merge_file_srKeuc

### `teams.md` — Relazione utenti-team: tabella pivot `doctor_team`

# Relazione utenti-team: tabella pivot `doctor_team`

## Contesto
Questa documentazione descrive la relazione many-to-many tra utenti e team nel modulo User. La tabella pivot `doctor_team` collega utenti e team secondo le convenzioni del progetto.

## Struttura della tabella
- `id`: PK
- `user_id`: string(36)
- `team_id`: string(36)
- `timestamps`: tracciamento creazione/modifica

## Motivazione
Permette di assegnare più team a uno stesso utente (es. dottori in più team) e gestire i permessi in modo flessibile.

## Migrazione
La migrazione estende `XotBaseMigration` e utilizza i metodi helper per garantire compatibilità multi-tenant e sicurezza. La tabella viene creata con chiave primaria `id` e campi `user_id` e `team_id` come stringhe di 36 caratteri, senza chiave composta.

## Collegame

### `terms-conditions.md` — Versione HEAD


https://julienboyer.re/en/posts/how-to-add-terms-and-conditions-checkbox-on-filament-registration-page

### Versione HEAD


## Collegamenti tra versioni di terms-conditions-2.md
* [terms-conditions-2.md](../../../gdpr/docs/terms-conditions-2.md)
* [terms-conditions-2.md](../../../user/docs/terms-conditions-2.md)


### Versione Incoming


---


### `testcase-hasusertestcase-property-conflict-fixed.md` — Fatal error risolto: `TestCase` vs `HasUserTestCase` — conflitto proprietà `$user`


# Fatal error risolto: `TestCase` vs `HasUserTestCase` — conflitto proprietà `$user`

## Sintomo

`./vendor/bin/pest Modules/User` falliva con `PHP Fatal error: ... define the same property ($user) ... considered incompatible` — bloccava **l'intera suite Pest del modulo User** (non solo il file coinvolto), impedendo di verificare qualunque fix con `pest` come richiesto dal workflow del progetto.

## Causa

`Modules/User/tests/Feature/Authentication/UserAuthenticationTest.php` usava:
```php
uses(TestCase::class, HasUserTestCase::class);
```
`TestCase` dichiara già `public ?User $user = null;` (riga 82). `HasUserTestCase` (trait) dichiara `protected User $user;` — tipo non-nullable e visibilità diversa. Comporre le due nella stessa classe di test è illegale in PHP (property redeclaration in

### `testcase-sqlite-to-mysql-fix.md` — testcase-sqlite-to-mysql-fix


See canonical documentation: ../../../Themes/docs/shared-components/testcase-sqlite-to-mysql-fix.md

### `testcase-sqlite-to-mysql.md` — TestCase SQLite to MySQL Fix - User Module


# TestCase SQLite to MySQL Fix - User Module

## Problema Identificato

Il TestCase del modulo User (102 righe) forza SQLite su TUTTE le connessioni, ignorando .env.testing.

### ❌ Cosa Fa di Sbagliato

```php
protected function setUp(): void
{
    parent::setUp();

    // ❌ SBAGLIATO: Crea database SQLite shared
    $dbName = 'file:memdb_'.Str::random(10).'?mode=memory&cache=shared';

    $connections = [
        'sqlite', 'mysql', 'mariadb', 'pgsql',
        'user', 'xot', 'activity', 'geo', 'cms',

### `testing/remaining-tenant-failures.md` — Remaining TenantTest Failures - Analysis


# Remaining TenantTest Failures - Analysis

## Current Status
- **14 passed, 2 failed** (out of 16 total)
- Progress: 87.5% passing rate

## Remaining Failures

### 1. ID Mismatch in "tenant can be found by slug"

**Error**:
```
Failed asserting that two strings are identical.
-'1'
+'4b7864f3-b8a4-3889-8895-bff6119a5c6e'
```

**Analysis**:
- Test creates tenant with UUID: `'4b7864f3-b8a4-3889-8895-bff6119a5c6e'`

### `testing/tenant-test-fixes.md` — TenantTest Fixes - Reasoning


# TenantTest Fixes - Reasoning

## Problem Analysis

The `TenantTest.php` has several failing assertions:

### Issue 1: Slug Mismatch
**Test Expectation**: `expect($tenant->slug)->toBe('test-tenant')`  
**Actual Value**: Random slug generated by factory (e.g., `'rutherford-ltd'`)

**Root Cause**: The test creates a Tenant with `name => 'Test Tenant'`, but the factory's `definition()` method generates a random company name and slug from it. When the test specifies `name`, the factory still uses its own random name for the slug generation.

**Why This Happens**: The factory definition runs BEFORE the test's specified attributes are merged, so the slug is generated from the factory's random name, not the test's specified name.

**Solution**: The test should NOT expect a specific slug value. 

### `testing/tenantfactory-fix.md` — TenantFactory Fix - Reasoning


# TenantFactory Fix - Reasoning

## Problem

The `TenantFactory` is generating a random `slug` from a random company name, even when the test specifies a `name` attribute. This causes tests to fail because:

1. Test creates tenant with `name => 'Test Tenant'`
2. Factory generates random company name (e.g., 'Rutherford Ltd')
3. Factory generates slug from random name: `Str::slug('Rutherford Ltd')` = `'rutherford-ltd'`
4. Test expects slug to be `Str::slug('Test Tenant')` = `'test-tenant'`
5. **Mismatch!**

## Root Cause

In Laravel factories, the `definition()` method runs FIRST, then the attributes passed to `create()` are merged. However, the slug is being generated from the factory's random `$name`, not from the merged attributes.

## Solution

The factory should NOT generate the slug i

### `testing/tenantfactory.md` — tenantfactory


See canonical documentation: ../../../../Themes/docs/shared-components/tenantfactory-fix.md

### `testing/tenanttest-fixes.md` — tenanttest-fixes


See canonical documentation: ../../../../Themes/docs/shared-components/tenant-test-fixes.md

### `testing-coverage-floor.md` — Coverage floor 50% — perimetro offline User


# Coverage floor 50% — perimetro offline User

Esclusioni in `Modules/User/phpunit.xml` (solo path non eseguibili offline):

- Console, Http, View, Listeners, Livewire, Events, Observers, Notifications
- Models/Traits (HasTeams), Support, Adapters
- Pagine Filament Socialite/Passport/Widgets (Livewire full stack)
- ShieldUtilsAction (Spatie Shield runtime)

Si preferisce testare: policies, actions execute, Filament schema keyed, enums, datas.

### `testing-phpstan-progress.md` — User Module - PHPStan Testing Progress


# User Module - PHPStan Testing Progress

**Date**: 2025-12-15
**Objective**: Fix PHPStan errors in test files
**Priority**: Tier 1 Critical (Authentication & Authorization)

---

## Philosophy Reminder

> **"The site works. If a test references missing elements, FIX THE TEST, not create the elements."**

This is the core principle: tests must reflect ACTUAL production code, not imaginary constructs.

---

## Work in Progress

### Current Status

### `testing-rules.md` — Testing Rules & Strategy

<<<<<<< .merge_file_Vn5UVu
<<<<<<< .merge_file_DbcsFQ
<<<<<<< .merge_file_Jeo3nP
=======
>>>>>>> .merge_file_msdh6a
=======
>>>>>>> .merge_file_uSbgGh
---
title: "Testing Rules & Strategy"
type: rule
qmd: "testing rules strategy"
---
<<<<<<< .merge_file_Vn5UVu
<<<<<<< .merge_file_DbcsFQ
=======
>>>>>>> .merge_file_5LgLpK
=======
>>>>>>> .merge_file_msdh6a
=======
>>>>>>> .merge_file_uSbgGh

### `testing-strategy.md` — Testing Strategy for the User Module and Laraxot Applications


# Testing Strategy for the User Module and Laraxot Applications

This document outlines the core testing strategy adopted across the User module and by extension, other modules within the Laraxot application framework. It emphasizes a robust, isolated, and efficient testing methodology designed to ensure high code quality and maintainability.

## Core Principles

The testing approach is built upon the following foundational principles, elaborated further in individual module `TestCase.php` files (e.g., `Modules/Gdpr/tests/TestCase.php`):

1.  **Pest as the Testing Framework:** All tests are written using the Pest PHP testing framework, leveraging its expressive syntax and intuitive features for cleaner and more readable test code.

2.  **Explicit Environment Configuration (`.env.testing`)

### `testing-structure.md` — Struttura dei Tests del Modulo User


# Struttura dei Tests del Modulo User

## Panoramica
Questo documento descrive la struttura dei tests per il modulo User, seguendo le best practice Laraxot e le convenzioni di testing moderne.

## Architettura dei Tests

### Separazione per Responsabilità
- **LoginTest.php**: Testa SOLO la pagina `/it/auth/login` (rendering, layout, middleware, localizzazione)
- **LoginVoltTest.php**: Testa SOLO il componente Volt `auth.login` (state management, validation, authentication)
- **LoginWidgetTest.php**: Testa SOLO il widget Filament (form logic, validation)

### Pattern Implementato
```php
// LoginTest.php - Test della pagina
class LoginTest extends TestCase
{
    public function test_login_page_renders_correctly()
    {

### `testing-user-command-integration-fix.md` — testing-user-command-integration-fix


See canonical documentation: ../../../Themes/docs/shared-components/testing-user-command-integration-fix.md

### `testing-user-command-integration.md` — Fix: UserCommandIntegrationTest - Application and Config Issues


# Fix: UserCommandIntegrationTest - Application and Config Issues

**Problema**: Test fallisce con "Too few arguments" e "Target class [config] does not exist"
**Principio**: Il sito funziona, quindi il test deve riflettere il comportamento reale

## 🔍 Analisi del Problema

### Errore Originale 1
- `Too few arguments to function Illuminate\Console\Application::__construct()`
- Test crea `new Application()` senza argomenti
- Application richiede: `Container $laravel, Dispatcher $events, string $version`

### Errore Originale 2
- `BindingResolutionException: Target class [config] does not exist`
- Test chiama `app(ChangeTypeCommand::class)` che causa problemi con container
- `app()->basePath()` chiamato durante istanziazione causa errore

### Errore Originale 3
- `Failed asserting that fals

### `theme-translation-conflicts-resolution-user.md` — theme_translation_conflicts_resolution - User


# theme_translation_conflicts_resolution - User

## Overview

Documentazione per theme_translation_conflicts_resolution nel modulo User.

## Dettagli

[Da completare]

## Collegamenti

- [Modulo Principale](../README.md)


### `theme-translation-conflicts-resolution.md` — Risoluzione Conflitti Traduzioni Tema Two - Modulo User


# Risoluzione Conflitti Traduzioni Tema Two - Modulo User

## Data: 2025-01-06

## Contesto
I file di traduzione del tema Two presentavano conflitti Git che coinvolgevano stati di utenti (doctor_states.php e patient_states.php) in tutte e tre le lingue (IT, EN, DE).

## File Corretti

### 1. doctor_states.php
**Percorsi**:
- `laravel/Themes/Two/lang/it/doctor_states.php`
- `laravel/Themes/Two/lang/en/doctor_states.php`
- `laravel/Themes/Two/lang/de/doctor_states.php`

**Conflitti Risolti**:
- Rimossa duplicazione delle chiavi `integration_approved`, `integration_rejected`, `integration_pending`
- Mantenuta struttura corretta senza ripetizioni
- Aggiunto `declare(strict_types=1);` dove mancante

### `theme-translations-resolution.md` — Risoluzione Conflitti Traduzioni Tema Two - Modulo User


# Risoluzione Conflitti Traduzioni Tema Two - Modulo User

## Data: [DATE]

## Contesto
I file di traduzione del tema Two presentavano conflitti Git che coinvolgevano stati di utenti (doctor_states.php e patient_states.php) in tutte e tre le lingue (IT, EN, DE).

## File Corretti

### 1. doctor_states.php
**Percorsi**:
- `laravel/Themes/Two/lang/it/doctor_states.php`
- `laravel/Themes/Two/lang/en/doctor_states.php`
- `laravel/Themes/Two/lang/de/doctor_states.php`

**Conflitti Risolti**:
- Rimossa duplicazione delle chiavi `integration_approved`, `integration_rejected`, `integration_pending`
- Mantenuta struttura corretta senza ripetizioni
- Aggiunto `declare(strict_types=1);` dove mancante

### `third-party-model-patterns.md` — User Module - Third-Party Model Patterns


# User Module - Third-Party Model Patterns

## Spatie Permission Package Integration

### Current Implementation

The User module integrates with `spatie/laravel-permission` package through direct model extension:

```php
// ✅ CORRECT - Direct Spatie model extension
class Permission extends SpatiePermission
{
    protected $connection = 'user';
    use RelationX;
}

class Role extends SpatieRole
{
    protected $connection = 'user';

### `third-party-models.md` — third-party-models


See canonical documentation: ../../../Themes/docs/shared-components/third-party-model-patterns.md

### `timestamps-rule.md` — User Module Timestamps Rule


# User Module Timestamps Rule

## Quick Reference

**Pattern canonico per migrazioni User:**

```php
// In User migrations, always do:
$this->updateTimestamps(table: $table, hasSoftDeletes: true|false);
```

Eliminare qualsiasi uso combinato di:
- `$table->timestamps()`
- `$table->softDeletes()`
- `$table->foreignIdFor($userClass, 'created_by')` (manuale)
- `$table->foreignIdFor($userClass, 'updated_by')` (manuale)
- `$table->foreignIdFor($userClass, 'deleted_by')` (manuale)

## Rationale

### `tips.md` — tips


See canonical documentation: ../../../Themes/docs/shared-components/tips.md

### `todo.md` — todo


See canonical documentation: ../../../Themes/docs/shared-components/todo.md

### `traits/has-authentication-log.md` — Trait HasAuthenticationLogTrait


# Trait HasAuthenticationLogTrait

## Descrizione
Il trait `HasAuthenticationLogTrait` fornisce funzionalità per il logging degli eventi di autenticazione. Permette di tracciare i tentativi di login, gli IP, i timestamp e altre informazioni relative all'autenticazione.

## Proprietà
- `$authentications`: Collection di log di autenticazione
- `$login_at`: Timestamp dell'ultimo login
- `$ip_address`: Indirizzo IP dell'ultimo login

## Metodi Principali

### Relazioni
- `authentications()`: Restituisce la relazione one-to-many con i log di autenticazione

### Log di Autenticazione
- `latestAuthentication()`: Restituisce l'ultimo tentativo di autenticazione
- `notifyAuthenticationLogVia()`: Specifica i canali di notifica per i log di autenticazione


### `traits/has-teams.md` — Trait HasTeams


# Trait HasTeams

## Descrizione
Il trait `HasTeams` fornisce funzionalità per la gestione dei team nell'applicazione. Permette agli utenti di appartenere a più team, gestire i ruoli all'interno dei team e controllare le autorizzazioni.

## Proprietà
- `$currentTeam`: Team attualmente selezionato dall'utente
- `$current_team_id`: ID del team corrente
- `$teams`: Collection di team a cui l'utente appartiene
- `$ownedTeams`: Collection di team di cui l'utente è proprietario

## Metodi Principali

### Relazioni
- `currentTeam()`: Restituisce la relazione con il team corrente
- `teams()`: Restituisce la relazione many-to-many con i team
- `ownedTeams()`: Restituisce la relazione one-to-many con i team posseduti

### Gestione Team

### `traits/has-tenants.md` — Trait HasTenants


# Trait HasTenants

## Descrizione
Il trait `HasTenants` fornisce funzionalità per la gestione dei tenant nell'applicazione. Permette agli utenti di appartenere a più tenant e gestire le autorizzazioni a livello di tenant.

## Proprietà
- `$tenants`: Collection di tenant a cui l'utente appartiene
- `$ownedTenants`: Collection di tenant di cui l'utente è proprietario

## Metodi Principali

### Relazioni
- `tenants()`: Restituisce la relazione many-to-many con i tenant
- `ownedTenants()`: Restituisce la relazione one-to-many con i tenant posseduti

### Gestione Tenant
- `createTenant(array $input)`: Crea un nuovo tenant
- `updateTenant(Tenant $tenant, array $input)`: Aggiorna un tenant esistente
- `deleteTenant(Tenant $tenant)`: Elimina un tenant

### `traits.md` — User Module Traits


# User Module Traits

## HasTeams

Gestisce l'appartenenza a team multipli.

```php
use Modules\User\Models\Traits\HasTeams;

class User extends Authenticatable
{
    use HasTeams;
}
```

## HasTenants

Gestione multi-tenant Filament.


### `translation-architecture.md` — Translation Architecture - Filament Navigation Best Practices


# Translation Architecture - Filament Navigation Best Practices

> **Generated**: 2026-01-07
> **Philosophy**: Direct Translation vs Translation Keys
> **Scope**: All Modules Translations

---

## 🔥 The Internal Debate: Translation Key vs Direct Translation

### The Problem Discovered

Found 2 files with incorrect navigation translation pattern:
- `Modules/Employee/lang/it/time_entries.php`
- `Modules/Notify/lang/it/test_smtp.php`

Both had translation **keys** instead of **actual translations**:

```php

### `translation-best-practices-1.md` — translation-best-practices-1


See canonical documentation: ../../../Themes/docs/shared-components/translation-best-practices.md

### `translation-best-practices.md` — Best Practices per le Traduzioni


# Best Practices per le Traduzioni

## Principi Generali

1. **Coerenza**: Mantenere una nomenclatura coerente per le chiavi di traduzione
2. **Completezza**: Tradurre tutte le chiavi in tutte le lingue supportate
3. **Struttura**: Mantenere una struttura gerarchica chiara e logica
4. **Manutenibilità**: Organizzare le traduzioni in file separati per ogni contesto
5. **Riusabilità**: Evitare duplicazioni di chiavi e contenuti

## Struttura dei File

### Organizzazione

- `lang/{locale}/auth.php`: Autenticazione e autorizzazione
- `lang/{locale}/registration.php`: Registrazione utenti
- `lang/{locale}/change_password.php`: Gestione password
- `lang/{locale}/password.php`: Configurazione password
- `lang/{locale}/user.php`: Gestione utenti

### `translation-conflict-resolution-prototype.md` — Translation Conflict Resolution Prototype


# Translation Conflict Resolution Prototype

## Overview
This document describes the prototype for resolving Git conflicts in Laravel translation files while preserving all translation content.

## Conflict Types Identified

### Type 1: Complete Structure Conflicts
**Example**: `Modules/User/lang/it/device.php`
- One version has rich structure with `tooltip`, `helper_text`, `actions`, `navigation`, etc.
- Other version has minimal structure with basic `label`, `placeholder`, `help` fields
- **Resolution Strategy**: Merge both structures, prioritizing the richer version while preserving unique content from minimal version

### Type 2: Partial Key Conflicts
**Example**: `Modules/User/lang/it/edit_role.php`, `permission.php`
- Some keys exist in one version but not in another
- **Resolution 

### `translation-fields-key-importance.md` — Understanding Translation Structure in Laraxot Framework


# Understanding Translation Structure in Laraxot Framework

## 2026-01-09 - Translation Key Analysis

### Context
During analysis of translation files in the User module, specifically `/laravel/Modules/User/lang/fr/authentication_log.php`, it was observed that the 'fields' key is present and functioning correctly.

### Philosophy and Logic
The 'fields' key in translation files is essential for the Filament translation system. It follows the pattern `modulo::risorsa.fields.campo.label` as documented in the Laraxot architecture. This structure allows automatic translation of form fields, table columns, and other UI elements without requiring explicit `->label()` calls in the component definitions.

### Business Logic
- The 'fields' key contains translations for all model fields
- Each field

### `translation-fixes.md` — 2. Sintassi Array Inconsistente


See canonical documentation: ../../../Themes/docs/shared-components/translation-fixes.md
- `>>>>>>> 199538c (.)`

**Soluzione**: Rimossi tutti i marcatori di conflitto e mantenuto solo il contenuto corretto.

### 2. Sintassi Array Inconsistente
**Problema**: Il file utilizzava una sintassi mista:
- Sintassi breve `[]` (corretta)
- Sintassi lunga `array()` (deprecata)

**Soluzione**: Standardizzata tutta la sintassi utilizzando la sintassi breve `[]` conforme alle regole Laraxot.

### 3. Struttura Espansa Incompleta
**Problema**: Le azioni non seguivano la struttura espansa obbligatoria per le regole Laraxot.

**Soluzione**: Completata la struttura espansa per tutte le azioni includendo:
- `modal_heading`
- `modal_description`
- `success`

### `translation-guidelines.md` — translation-guidelines


---
name: translation-guidelines-user-module
description: **Guide**: Structure translations in User module with 5-element standard
**Applies to**: All language files in laravel/Modules/User/lang/
**Enforced by**: Translation 5-Elements Rule

**Structure Requirements**:
1. Each translation must be an array with 5 elements:
   - key: Unique string (e.g. auth.email_address)
   - text: Base language string (e.g. Email address)
   - description: Usage context (e.g. 'Login form label')
   - context: Optional usage scenario (e.g. login_form)
   - placeholder: Input field example (e.g. you@example.com)

**File Structure Example**:
```php
// resources/lang/en/user.php
return [
    'auth.email_address' => [

### `translation-key-prototype.md` — translation-key-prototype


Translation key prototype

Project convention: '<namespace>::<context>.<collection>.<item>.<type>'

Examples:
- user::auth.register.actions.submit.label -> label for the submit button in registration form
- user::auth.login.page.meta_title.label -> page meta title label for login

Why:
- Ensures predictable namespacing across modules and themes
- Easier to programmatically find translation entries
- Prevents collisions and improves maintainability

Action performed:
- Replaced occurrences of __('user::auth.register.submit') with __('user::auth.register.actions.submit.label') and added corresponding entry to Modules/User/lang/it/auth.php

Follow-ups:
- Run a repo-wide grep for occurrences of less-structured keys and standardize them.
- Add CI check to enforce prototype for new keys.

### `translation-maintenance-log.md` — Translation Maintenance Log - User Module


# Translation Maintenance Log - User Module

## Overview
Questo documento traccia tutti gli interventi di manutenzione e audit delle traduzioni nel modulo User, seguendo i principi di refactoring costante e studio della documentazione come memoria del sistema.

## 2025-01-25: LoginWidget Translation Audit

### Problema Identificato
Il `LoginWidget` utilizzava 4 chiavi di traduzione che non esistevano:
- `user::messages.credentials_incorrect`
- `user::messages.login_success` 
- `user::messages.validation_error`
- `user::messages.login_error`

### Soluzione Implementata
1. **Creazione file messages.php** per 3 lingue (IT, EN, DE)
2. **60+ chiavi di traduzione** per copertura completa
3. **Documentazione completa** dell'audit process


### `translation-resolution-prototype.md` — translation-resolution-prototype


See canonical documentation: ../../../Themes/docs/shared-components/translation-conflict-resolution-prototype.md

### `translation-syntax-fixes-historical.md` — translation-syntax-fixes-historical


See canonical documentation: ../../../Themes/docs/shared-components/translation-syntax-fixes-3.md

### `translation-syntax-fixes.md` — Correzioni Errori di Sintassi nei File di Traduzione - 2025


# Correzioni Errori di Sintassi nei File di Traduzione - 2025

## Data
2025-01-15

## Problema Identificato
Errori di sintassi PHP nei file di traduzione del modulo User che impedivano il corretto funzionamento dell'applicazione.

## Errori Risolti

### 1. File `user-resource.php` (Italiano)
- **Errore**: Mancanza di parentesi di chiusura per l'array `permissions`
- **Riga**: 132
- **Causa**: Struttura di array annidati non chiusa correttamente
- **Soluzione**: Aggiunta parentesi di chiusura mancante per l'array `permissions`

### 2. File `registration.php` (Italiano e Inglese)
- **Errore**: Nessun errore di sintassi rilevato
- **Stato**: Verificato e confermato corretto

### `translation-syntaxes.md` — Correzioni Errori di Sintassi nei File di Traduzione - 2025


# Correzioni Errori di Sintassi nei File di Traduzione - 2025

## Data
[DATE]

## Problema Identificato
Errori di sintassi PHP nei file di traduzione del modulo User che impedivano il corretto funzionamento dell'applicazione.

## Errori Risolti

### 1. File `user-resource.php` (Italiano)
- **Errore**: Mancanza di parentesi di chiusura per l'array `permissions`
- **Riga**: 132
- **Causa**: Struttura di array annidati non chiusa correttamente
- **Soluzione**: Aggiunta parentesi di chiusura mancante per l'array `permissions`

### 2. File `registration.php` (Italiano e Inglese)
- **Errore**: Nessun errore di sintassi rilevato
- **Stato**: Verificato e confermato corretto

### `translationes.md` — Correzioni File di Traduzione User Module


# Correzioni File di Traduzione User Module

## Problemi Identificati e Risolti

### 1. Conflitti di Merge Git
**Problema**: Il file `Modules/User/lang/it/user.php` conteneva marcatori di conflitto Git non risolti:
- `=======`
- `>>>>>>> 42fc572 (.)`
- `>>>>>>> 199538c (.)`

**Soluzione**: Rimossi tutti i marcatori di conflitto e mantenuto solo il contenuto corretto.

### 2. Sintassi Array Inconsistente
**Problema**: Il file utilizzava una sintassi mista:
- Sintassi breve `[]` (corretta)
- Sintassi lunga `array()` (deprecata)

**Soluzione**: Standardizzata tutta la sintassi utilizzando la sintassi breve `[]` conforme alle regole Laraxot.


### `translations.md` — translations


See canonical documentation: ../../../Themes/docs/shared-components/translations.md

### `troubleshooting-login-component.md` — Troubleshooting: Login Component Not Found


# Troubleshooting: Login Component Not Found

## Regola architetturale
**I form di autenticazione (login, register, reset password) si gestiscono solo con Filament widget** (LoginWidget, RegisterWidget, ecc.). Vietato usare form HTML tradizionali (`<form method="POST" action="{{ route('login') }}">` con @csrf e input raw) nelle pagine tema. Vedere `.cursor/rules/filament-login-widget.mdc`.

**VIETATO ->label(), ->placeholder(), ->helperText():** Le traduzioni sono gestite automaticamente da LangServiceProvider tramite i file in `Modules/User/lang/`. Mai usare questi metodi nei widget auth. Vedere `.cursor/rules/no-filament-labels.mdc`.

## Errore 1: ComponentNotFoundException
Unable to find component: [user::filament.widgets.auth.login-widget] su GET /it/auth/login (Folio, Theme Two).

**

### `troubleshooting.md` — troubleshooting


See canonical documentation: ../../../Themes/docs/shared-components/troubleshooting.md

### `type-safety-improvements.md` — type-safety-improvements


See canonical documentation: ../../../Themes/docs/shared-components/type-safety-improvements.md

### `type-safety-refactoring.md` — Type Safety Refactoring: Elimination of `mixed` Types

# Type Safety Refactoring: Elimination of `mixed` Types

**Session Date**: 2026-09-04  
**Status**: In Progress (Phase 2/5 Complete, Phases 3-5 In Progress)  
**Target**: Achieve 100% type safety across all Modules by replacing `mixed` with proper type hints

## Overview

This document tracks the systematic elimination of `mixed` type usage across Laravel Modules to improve type safety and enable PHPStan Level 10 compliance.

## Executive Summary

### Completed Work

**Phase 1: Discovery & Analysis**
- Identified 36 files across Modules with `mixed` usage
- Categorized by type: parameter types, return types, docblocks, collection items
- Found 4 occurrences in User module (all fixable)
- Found 21 occurrences in Xot module (9 fixable, 12 architectural/API)


### `updates.md` — User Module Updates - December 2025


# User Module Updates - December 2025

## Refactoring Translations
- **Removed hardcoded labels**: Calls to `->label()` and `->placeholder()` have been removed from `Login.php` and `PasswordData.php`.
- **Automatic Translation**: Labels are now automatically resolved via `LangServiceProvider` using the key structure `user::resource.fields.field_name` (e.g., `user::login.fields.email.label`).
- **Updated Language Files**: `modules/User/lang/it/login.php` and `password.php` have been updated with capitalized labels ("Email", "Password") to match UI standards.
- **Verification**: A new feature test `Modules/User/tests/Feature/PasswordDataLabelsTest.php` verifies that labels are correctly translated.

## PHPStan Fixes
- **DocBlock Updates**: Fixed `class.notFound` errors in `User` and `Tenant

### `user-contract-haspermissiontoorcreate.md` — hasPermissionToOrCreate — implementazione


# hasPermissionToOrCreate — implementazione

updated: 2026-10-08
qmd: "haspermissiontoorcreate   implementazione user"
status: superseded
superseded_by: user-contract-has-permission-to-or-create.md

# hasPermissionToOrCreate: implementazione

Metodo richiesto da `Modules\Xot\Contracts\UserContract::hasPermissionToOrCreate()`. Se il permesso non esiste in DB viene creato al volo via `Permission::firstOrCreate()` invece di esplodere `PermissionDoesNotExist`.

Implementato in `BaseUser` (modulo User), quindi disponibile anche a Predict.

Workflow BMAD + Second Brain applicato: consultati `docs/tools/bmad-method.md`, `wiki/concepts/second-brain-max-power.md`, `../../Xot/docs/consolidated/phpstan/phpstan-workflow-2.md`.

### `user-invitation.md` — user-invitation


https://filamentapps.dev/blog/filament-invite-only-registration-via-email-invitations


### `user-management.md` — user-management


See canonical documentation: ../../../Themes/docs/shared-components/user-management.md

### `user-moderation-strategy-2.md` — User Moderation Strategy


# User Moderation Strategy

## Overview
In the Quaeris system, and across various projects utilizing the `User` module, users can have different roles or types, each potentially requiring specific verification or moderation processes before full access to platform functionalities is granted. This document analyzes the integration of a unified moderation strategy within the `User` module, ensuring it remains generic and applicable to all user types, mirroring the approach of a unified registration wizard.

## Rationale for Moderation within User Module
Given that the `User` module serves as the central hub for user management across multiple projects, it is logical to embed moderation functionalities within this module. This approach ensures:
- **Consistency**: A single point of truth for 

### `user-moderation-strategy.md` — User Moderation Strategy


# User Moderation Strategy

## Overview
In the healthcare_app system, and across various projects utilizing the `User` module, users can have different roles or types, each potentially requiring specific verification or moderation processes before full access to platform functionalities is granted. This document analyzes the integration of a unified moderation strategy within the `User` module, ensuring it remains generic and applicable to all user types, mirroring the approach of a unified registration wizard.

## Rationale for Moderation within User Module
Given that the `User` module serves as the central hub for user management across multiple projects, it is logical to embed moderation functionalities within this module. This approach ensures:
- **Consistency**: A single point of tru

### `user-research-1.md` — user-research-1


See canonical documentation: ../../../Themes/docs/shared-components/USER_RESEARCH-Modules.md

### `user-research.md` — User Module - User Research


# User Module - User Research

**Module:** User  
**Version:** 1.0.0  
**Last Updated:** March 12, 2026  
**Owner:** Product Team

---

## Research Goals

1. Understand registration barriers
2. Identify authentication preferences
3. Validate profile needs
4. Determine privacy expectations

---

## Research Questions

### `user-states.md` — Configurazione Stati Utente (state)

# Configurazione Stati Utente (state)

## Introduzione
La gestione dello stato degli utenti avviene tramite [spatie/laravel-model-states](mdc:https:/spatie.be/docs/laravel-model-states/v2/working-with-states/01-configuring-states), utilizzando la colonna `state`.

## Pattern Consigliati
- Definire una state class astratta (es. UserState) e le sue varianti (Pending, Approved, Active, Rejected, ecc.)
- Configurare le transizioni consentite tramite il metodo `config()`
- Usare sempre la colonna `state` (mai moderation_status)
- Le action devono usare le transizioni di stato

## Esempio di State
```php
use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class UserState extends State
{
    public static function config(): StateConfig
    {

### `user-vs-profile.md` — User vs Profile Models: Guida Completa


# User vs Profile Models: Guida Completa

## Panoramica

Questo documento analizza quando usare il modello **User** rispetto al modello **Profile** nel progetto <nome progetto>, basandosi su best practice di settore e architettura specifica del progetto.

---

## 1. Principi Fondamentali

### 1.1 Single Responsibility Principle

```
┌─────────────────────────────────────────────────────────────────┐
│                         USER MODEL                               │
├─────────────────────────────────────────────────────────────────┤
│ Responsabilità: AUTENTICAZIONE e AUTORIZZAZIONE               │
│                                                                 │
│ ✓ email, password, token                                      │

### `uuid-trait-conflict-resolution.md` — uuid-trait-conflict-resolution


See canonical documentation: ../../../Themes/docs/shared-components/uuid-trait-conflict-resolution.md

### `uuid-trait-resolution.md` — User Module - UUID Trait Conflict Resolution


# User Module - UUID Trait Conflict Resolution

**Status**: Critical System Error Resolution
**Methodology**: Super Mucca (DRY + KISS + Deep Understanding)

---

## 🚨 **CRITICAL ERROR ANALYSIS**

### **The Conflict**

```
Declaration of Illuminate\Database\Eloquent\Concerns\HasUuids::initializeHasUniqueStringIds()
must be compatible with Laravel\Passport\Client::initializeHasUniqueStringIds(): void
```

### **Root Cause: Trait Method Signature Conflict**

In `BaseUser.php` (lines 132-134):

### `vendor-extension-pattern.md` — 🏛️ PATTERN ESTENSIONE CLASSI VENDOR IN LARAXOT


# 🏛️ PATTERN ESTENSIONE CLASSI VENDOR IN LARAXOT

## 📋 PRINCIPIO FONDAMENTALE

Quando si integra un pacchetto esterno (vendor) che fornisce modelli Eloquent, **NON si estende mai `BaseModel`**, ma si estende **direttamente la classe del vendor**.

## 🎯 ESEMPI NEL CODEBASE

### Spatie Permission (Modulo User)

```php
<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Modules\Xot\Models\Traits\RelationX;

### `vendor-extension.md` — vendor-extension


See canonical documentation: ../../../Themes/docs/shared-components/vendor-extension-pattern.md

### `viewclient-infolist-implementation-philosophy.md` — Internal Analysis: Approaches to ViewClient Infolist Implementation


# Internal Analysis: Approaches to ViewClient Infolist Implementation

## 🥊 Philosophical Battle: Two Approaches Clash

### Approach 1: "Quick Fix" (The Rushed Developer)
**Philosophy**: "Just get it working, fix later!"
- **Logic**: Copy-paste existing infolist schema and modify quickly
- **Business Logic**: Immediate functionality over architecture
- **Politics**: Deliver fast, worry about standards later
- **Religion**: Working code > perfect code
- **Zen**: Ship first, iterate later

### Approach 2: "Architectural Compliance" (The Systematic Developer) ✅ **WINNER**
- **Logic**: Understand the base architecture first
- **Business Logic**: Follow Laraxot patterns for long-term maintainability
- **Politics**: Maintain system consistency across modules
- **Religion**: Architecture > immed

### `viewclient-infolist-implementation.md` — viewclient-infolist-implementation


See canonical documentation: ../../../Themes/docs/shared-components/viewclient-infolist-implementation-philosophy.md

### `volt-errors.md` — Errori Comuni in Volt e Soluzioni


# Errori Comuni in Volt e Soluzioni

## VoltDirectiveMissingException

### Descrizione dell'Errore
```
Livewire\Volt\Exceptions\VoltDirectiveMissingException
The [@volt] directive is required when using Volt anonymous components in Folio pages.
```

### Causa
Questo errore si verifica quando si tenta di utilizzare un componente Volt in una pagina Folio senza la direttiva `@volt`. La direttiva `@volt` è obbligatoria per definire un componente Volt anonimo.

### Soluzione
Per risolvere questo errore, è necessario:

1. Aggiungere la direttiva `@volt` all'inizio del file Blade
2. Definire la classe del componente Volt
3. Implementare la logica necessaria

### `volt-missing-directive.md` — Errore VoltDirectiveMissingException

<<<<<<< .merge_file_kSTXG5
<<<<<<< .merge_file_59iViG
<<<<<<< .merge_file_rU8nWc
=======
>>>>>>> .merge_file_LOUUmX
=======
>>>>>>> .merge_file_5mw5Qc
---
title: "Errore VoltDirectiveMissingException"
type: note
qmd: "volt missing directive errore voltdirectivemissingexception"
---
<<<<<<< .merge_file_kSTXG5
<<<<<<< .merge_file_59iViG
=======
>>>>>>> .merge_file_V75Kp4
=======
>>>>>>> .merge_file_LOUUmX
=======
>>>>>>> .merge_file_5mw5Qc

### `volt-missingirective.md` — Errore VoltDirectiveMissingException


# Errore VoltDirectiveMissingException

## Descrizione
In una pagina Folio con componenti Volt anonimi, è obbligatorio includere la direttiva `@volt` all'inizio del file Blade. L'assenza di questo directive genera:

```
Livewire\Volt\Exceptions\VoltDirectiveMissingException
The [@volt] directive is required when using Volt anonymous components in Folio pages.
```

## Dove correggere
File: `Themes/TwentyOne/resources/views/pages/auth/logout.blade.php`

## Soluzione
Aggiungere la direttiva `@volt` in testa al file, prima di qualsiasi codice Blade o HTML:

```blade
@volt
@php

### `volts.md` — volts


See canonical documentation: ../../../Themes/docs/shared-components/volt-errors.md

### `widget-form-schema-hierarchy.md` — Widget del modulo `User`: il form sta su `getFormSchema()`


# Widget del modulo `User`: il form sta su `getFormSchema()`

> Il rename `getFormSchema` → `getFormSchemaOld` vale **solo** per chi estende
> `XotBaseResource`. Sui widget il metodo rinominato non viene mai invocato: il form si
> svuota in silenzio e nessun test di tipo se ne accorge.

## Chi chiama cosa

| Classe base | Metodo invocato | Dove |
|---|---|---|
| `XotBaseWidget` | `$this->getFormSchema()` | `XotBaseWidget.php:84` |
| `XotBaseSchemaWidget` | `$this->getFormSchema()` oppure `formClass()::{schemaMethod()}` | `XotBaseSchemaWidget.php:94` |
| `XotBaseRelationManager` | `$this->getFormSchema()` (`form()` è `final`) | `XotBaseRelationManager.php:96` |

Nessuna delle tre dichiara `getFormSchemaOld()`. Un widget che lo definisce sta scrivendo
un metodo morto. `#[Override]` su quel 

### `widgets/edit-user-widget.md` — EditUserWidget Documentation


# EditUserWidget Documentation

## Overview
The `EditUserWidget` is a comprehensive Filament widget designed for editing user profile information within the User module. This widget provides a structured interface for modifying user data including personal information, preferences, security settings, and administrative configurations.
## Purpose
The widget serves as a reusable component for user profile editing across different parts of the application, maintaining consistency in user experience and following the project's architectural patterns.
## Analysis of Related Files
### Registration Widget Pattern
Based on the analysis of `RegistrationWidget` in the same module, the following patterns were identified:
* Extension of `XotBaseWidget` as the base class
* Implementation of `HasForms`

### `widgets/implementation-summary.md` — EditUserWidget Implementation Summary


# EditUserWidget Implementation Summary

## Project Status: COMPLETED ✅
The EditUserWidget development and localization has been successfully completed with all requirements met and documentation finalized.
## Completed Components
### 1. Translation Files ✅
- **Italian translations**: `Modules/User/lang/it/widgets.php`
- **English translations**: `Modules/User/lang/en/widgets.php`
- **Structure**: Complete expanded structure with fields, actions, messages, and validation
- **Coverage**: All widget text elements properly translated
### 2. Widget PHP Class ✅
- **Location**: `Modules/User/app/Filament/Widgets/EditUserWidget.php`
- **Base Class**: Correctly extends `XotBaseWidget`
- **Namespace**: Proper `Modules\User\Filament\Widgets` namespace
- **Translation Integration**: No hardcoded lab

### `widgets/implementation.md` — implementation


See canonical documentation: ../../../../Themes/docs/shared-components/implementation-summary-Modules.md

### `widgets/translation-guidelines.md` — Widget Translation Guidelines


# Widget Translation Guidelines

## Overview
This document outlines the translation structure and guidelines for widgets in the User module, specifically focusing on the EditUserWidget implementation.
## Translation File Structure
### Location
```text
Modules/User/lang/{locale}/widgets.php
```
### Supported Locales
- `it` (Italian) - Primary language
- `en` (English) - Secondary language
## Translation Key Structure
### Widget Structure
```php
return [
    'widget_name' => [
        'title' => 'Widget Title',
        'description' => 'Widget Description',

### `widgets/translationlines.md` — Widget Translation Guidelines


# Widget Translation Guidelines

## Overview
This document outlines the translation structure and guidelines for widgets in the User module, specifically focusing on the EditUserWidget implementation.
## Translation File Structure
### Location
```text
Modules/User/lang/{locale}/widgets.php
```
### Supported Locales
- `it` (Italian) - Primary language
- `en` (English) - Secondary language
## Translation Key Structure
### Widget Structure
```php
return [
    'widget_name' => [
        'title' => 'Widget Title',
        'description' => 'Widget Description',

### `widgets-structure-user.md` — widgets_structure - User


# widgets_structure - User

## Overview

Documentazione per widgets_structure nel modulo User.

## Dettagli

[Da completare]

## Collegamenti

- [Modulo Principale](../README.md)


### `widgets-structure.md` — widgets-structure


See canonical documentation: ../../../Themes/docs/shared-components/widgets-structure.md

### `wiki/_templates/concept.md` — {{title}}


# {{title}}

## Summary

_One-sentence description of this concept._

## Context

_Why this concept exists, what problem it addresses._

## Details

_Main content explaining the concept with examples and code snippets._

## Implementation

_How this concept is implemented in our codebase (with file references)._

## Benefits

### `wiki/_templates/entity.md` — {{title}}


# {{title}}

## Summary

_One-sentence description of this entity (person, organization, module, etc.)._

## Type

_Person | Organization | Module | Technology_

## Description

_Detailed description of the entity._

## Role in Project

_How this entity relates to the project, what role it plays._

## Key Contributions

### `wiki/_templates/source.md` — {{title}}


# {{title}}

## Source

- **URL**: _[original URL if applicable]_
- **Author**: _Author name_
- **Date**: _Publication date_
- **Type**: _Article | Paper | Documentation | Book Chapter_

## Summary

_2-3 sentence summary of what this source covers._

## Key Takeaways

1. **Takeaway 1**: Brief explanation
2. **Takeaway 2**: Brief explanation
3. **Takeaway 3**: Brief explanation


### `wiki/concepts/ai-harness-user-discipline.md` — AI harness — User


# AI harness — User

Estensione di [ai-harness-module-discipline](../../../../docs/wiki/concepts/ai-harness-module-discipline.md).

## Scope

Auth widgets, UserForm, ruoli/permessi, Socialite.

## Regole agenti

| Tip | User |
|-----|------|
| 004/015 | Widget auth → `XotBaseSchemaWidget` + `formClass()`/`schemaMethod()` |
| 008 | STORY prima di refactor Register/Login |
| 010 | grep `Filament/Widgets/Auth` prima di nuovi widget |
| 020 | [r1-form-fields-self-validate.md](../../r1-form-fields-self-validate.md) |

## Collegamenti


### `wiki/concepts/baseuser-hierarchy.md` — BaseUser Hierarchy and Extension Pattern


# BaseUser Hierarchy and Extension Pattern

## Overview

The User module provides a two-level hierarchy for user models:

1. **BaseUser** (abstract) - Core authentication and authorization
2. **User** (concrete) - Default user implementation

This design allows downstream modules to extend BaseUser while adding their own capabilities.

## Class Hierarchy

```
Illuminate\Foundation\Auth\User (Laravel)
    ↑
Modules\User\Models\BaseUser (abstract - this module)
    ↑
Modules\User\Models\User (concrete - default)

### `wiki/concepts/code-redundancy-user.md` — Ridondanza: User


# Ridondanza: User

## Scopo

Identità, ruoli/permessi (Spatie teams), Passport OAuth, widget login/registrazione, profilo. È il **owner** dell’auth: ogni duplicato qui si propaga a tutti i temi.

## P0: LoginWidget doppio

| File | Uso |
|------|-----|
| `Filament/Widgets/Auth/LoginWidget.php` | **Canonico**: registrato in `UserServiceProvider`, temi `@livewire` |
| `Filament/Widgets/LoginWidget.php` | Test (`LoginWidgetTest`): **non** nel provider |

**Consiglio:** deprecare `Widgets/LoginWidget.php`; spostare test su `Auth\LoginWidget`. **Religione:** un solo widget login.

## P0: alberi Filament duplicati

Risorse presenti sia in `Filament/Resources/` sia in `Filament/Clusters/Passport/` o `Clusters/Socialite/`:


### `wiki/concepts/context-mode-user-discipline.md` — User Module — Context-Mode Discipline


# User Module — Context-Mode Discipline

> User module context-mode per traduzioni Filament e LangServiceProvider.

## File Wiki Limits

```
laravel/Modules/User/docs/wiki/
├── index.md                           # ≤30 righe
├── rules/
│   ├── index.md                       # ≤20 righe → root trigger map
│   └── filament-user-labels.md        # ≤150 righe
├── skills/
│   ├── index.md                       # ≤20 righe
│   └── filament-translation-audit.md  # ≤100 righe
└── concepts/
    └── langserviceprovider-pattern.md  # ≤150 righe
```


### `wiki/concepts/context-overflow-prevention.md` — context-overflow-prevention


See canonical documentation: ../../../../../Themes/docs/shared-components/context-overflow-prevention-Modules.md

### `wiki/concepts/duplicate-method-bodies.md` — Corpi metodo duplicati — User


# Corpi metodo duplicati — User

> **152** gruppi con corpo identico coinvolgono User (su 790 totali progetto).
> Omonimo con corpo **diverso** = configurazione, e' nel [censimento omonimi](./method-name-homonyms.md); qui solo corpi **identici**.

## Riepilogo (solo User)

| Categoria | Gruppi | ~Righe duplicate |
|-----------|--------|------------------|
| `A_config_identical` | 53 | 1818 |
| `B_business_duplicate` | 52 | 347 |
| `C_cross_name` | 13 | 407 |
| `M_database_layer` | 12 | 132 |
| `S_trivial_stub` | 22 | 20245 |

## Dettaglio

### B — Business logic con corpo identico (consolidare: 1 owner)


### `wiki/concepts/filament-langserviceprovider-governance.md` — filament langserviceprovider governance


# filament langserviceprovider governance

## regola non negoziabile

Nei componenti Filament del modulo `User` non si devono usare `->label()` e `->tooltip()` hardcoded o con traduzioni inline.

La label deve essere risolta dal `LangServiceProvider` e dai file lingua del modulo.

## motivo tecnico

- evita drift tra UI e traduzioni
- riduce duplicazione e regressioni
- mantiene i temi sottili e i moduli come fonte di verita della copy

## anti-regressione operativa

Prima di chiudere una modifica su Filament:

1. cercare `->label(` e `->tooltip(` nei file toccati

### `wiki/concepts/folio-app-pages-owner.md` — Folio app pages — owner `User`


# Folio app pages — owner `User`

  - ../../../../../Themes/Sixteen/docs/page-directory-structure.md
  - ../../../../../Themes/Sixteen/docs/wiki/concepts/folio-volt-app-pages.md
  - ../../../../../Themes/Sixteen/docs/page-directory-structure.md
  - ../../../../../Themes/Sixteen/docs/wiki/concepts/folio-volt-app-pages.md
status: draft

# Folio app pages: owner `User`

## Perché non nel tema

`Themes/Sixteen/resources/views/pages/` accetta solo `auth/`, `[container0]/`, `tests/` (+ `index.blade.php` home).

Pagine con **logica utente** (dashboard, area personale) vivono qui:

```text
Modules/User/resources/views/pages/
├── dashboard/index.blade.php

### `wiki/concepts/folio-pages-owner-pattern.md` — Modulo User — owner pagine Folio, zero web.php


# Modulo User — owner pagine Folio, zero web.php

## Religione

| Ruolo | Modulo | Cosa fa |
|-------|--------|---------|
| **Owner pagine** | **User** | File in `resources/views/pages/` + `name()` + `middleware()` |
| **Mount rotte** | **Cms** | `FolioVoltServiceProvider` → `Folio::path()->uri($locale)` |
| **Link UI** | **Sixteen** | `route('<name>')` nel dropdown — non registra rotte |

Il modulo User **non** aggiunge `Route::get()` in `routes/web.php` per il FO.

## Pagine owner (header dropdown)

| File | `name()` | URL |
|------|----------|-----|
| `dashboard/index.blade.php` | `dashboard` | `/it/dashboard` |
| `notifications/index.blade.php` | `notifications` | `/it/notifications` |
| `profile/edit.blade.php` | `profile.edit` | `/it/profile/edit` |

### `wiki/concepts/lang-backup-in-place.md` — Backup traduzioni User — in-place


# Backup traduzioni User — in-place

## Problema

~281 file `*.backup_*` sparsi sotto `lang/{locale}/` — rumore ponytail. Tentativo errato wave 4: cartella `lang/archive.bak/` (**anti-pattern** — vedi regola generale).

## Regola canonica

- **Mai** cartelle `archive.bak`, `Legacy`, `Old` sotto `lang/`
- Backup → `lang/{locale}/nome.php.bak` **stesso path** del file attivo
- Cronologia → Git, non albero parallelo

## Stato (2026-06-30)

281 backup spostati da `archive.bak/` (rimossa) → `lang/{locale}/*.php.bak`.

File attivi: solo `lang/{locale}/*.php` (no `.bak`).

## Verifica

### `wiki/concepts/legacy-docs-duplication-pattern.md` — Pattern ridondanza in `Modules/User/docs/legacy`


# Pattern ridondanza in `Modules/User/docs/legacy`

## Business reason

Cartella **`docs/legacy`** conserva **storia progettuale**: decisioni Volt/Filament/widget, fix translation, refactor routing. Nel tempo più agenti/note hanno prodotto **varianti nominative dello stesso argomento** (`auth-performance` vs `authentication-performance-optimization.md`, `-1`, snake_case vs kebab-case), generando migliaia di file sovrapposti.

## Rischi operativi

1. Ricerca inconsistente (“quale nome è canonico?”).
2. Contenuti **contraddittori** se solo uno dei twin viene aggiornato.
3. Tempo lettura LLM/umano sprecato quando il concetto vivo è stato spostato in **wiki/concepts** più recente.

## Fonti “vive” da preferire

- **`docs/wiki/concepts/`** per policy attuali modulo User.
- **`docs/redundancy-r

### `wiki/concepts/local-mysql-user-provision.md` — Connessione `user` e login FO


# Connessione `user` e login FO

## Errore tipico

`Unknown database 'fixcity_user'` → database non creato (vedi setup sotto).

`Access denied for user 'marco'@'localhost'` sulla connessione `user` → credenziali/host MySQL.

`Table 'fixcity_user.users' doesn't exist` → migrazioni non eseguite su `--database=user`.

## Setup locale (idempotente)

```bash
mysql -umarco -pmarco -e "CREATE DATABASE IF NOT EXISTS fixcity_user CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; CREATE DATABASE IF NOT EXISTS fixcity_data CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
cd laravel && php artisan migrate --database=user
./bashscripts/tools/sync-env-testing.sh
```

`provision-local-mysql.sh` non esiste piu'. `Unknown database 'fixcity_user'` (1049) = DB mai creato.

### `wiki/concepts/login-invalid-credentials-copy-rule.md` — Login invalid credentials copy rule


# Login invalid credentials copy rule

## Regola

Per il login pubblico non usare:

- `__('auth.failed')`
- chiavi ad hoc tipo `__('user::auth.failed.text')`

Usare invece una chiave conforme alla struttura minima:

- `__('user::login.actions.login.error')`

## Motivazione

- resta dentro il contesto/attore `login`
- usa la collezione `actions`
- identifica l'elemento `login`
- usa il tipo `error`

### `wiki/concepts/login-page-design-comuni.md` — Login Page - Design Comuni Italiani Alignment


# Login Page - Design Comuni Italiani Alignment

## The Rule

**Login page MUST follow the Italian Municipalities Design System (Bootstrap Italia) for consistent, accessible public administration UX.**

---

## Architecture Pattern: Template as Wrapper

The login page uses a **separation of concerns** pattern where:

| Layer | Role | Analogy |
|-------|------|---------|
| **Template** (Page) | Presentation wrapper, layout, styling | **Vestito** (clothes) |
| **Widget** | Form logic, validation, submission | **Corpo** (body/form) |

```
URL: http://127.0.0.1:8000/it/auth/login

### `wiki/concepts/mariadb-create-table-after-rule.md` — MariaDB create table `after()` rule


# MariaDB create table `after()` rule

## Scopo

Evitare errori SQL in migrazione quando si crea una tabella nuova con Laravel Schema Builder.

Nel percorso `Schema::create(...)` / `tableCreate(...)`, il modificatore `->after('...')`
non deve essere usato.

## Regola operativa

- In `CREATE TABLE`: definire solo colonne, indici, vincoli.
- In `ALTER TABLE` (`Schema::table(...)` / `tableUpdate(...)`): usare `->after(...)` se serve ordine visivo.

## Best practices

- Nel blocco create, usare ordine naturale dichiarativo delle colonne.
- Usare `tableUpdate()` idempotente per patch additive su installazioni esistenti.
- Mantenere una sola migrazione owner per tabella (modello ↔ migrazione canonica).

### `wiki/concepts/method-name-homonyms.md` — Censimento omonimi metodi — User


# Censimento omonimi metodi — User

> **147** nomi metodo omonimi coinvolgono questo modulo (su 689 totali progetto).

## Riepilogo categoria (solo User)

| Categoria | Metodi |
|-----------|--------|
| `A_filament_framework` | 35 |
| `E_scheda_stack` | 8 |
| `F_trait_name_collision` | 1 |
| `G_module_local` | 37 |
| `H_cross_module_homonym` | 66 |

## Dettaglio

### `A_filament_framework` (35 metodi)

Hook Filament/Laravel ripetuti — **non** debito. Elenco omesso.

### `wiki/concepts/migration-naming-religion-user.md` — Migrazioni User — logica, politica, zen


# Migrazioni User — logica, politica, zen

## Zen

Un modello, un file `create_*`, zero `$connection` — la tabella parla tramite il Model.

## Naming file

```
{data}_{create}_{tabella_snake}_table.php
```

| Segmento | Regola | Esempio |
|----------|--------|---------|
| data | `YYYY_MM_DD_HHMMSS` | `2026_07_27_102200` |
| create | sempre `create_` | — |
| tabella | snake_case dal model | `teams` ← `Team` |
| suffisso | `_table.php` | — |


### `wiki/concepts/migrations-users-inventory.md` — Inventario migration User


# Inventario migration User

Percorso attivo: `database/migrations/`. ~~Copia legacy `Database/Migrations/`~~ rimossa 2026-06-18.

Pattern dominante: `XotBaseMigration` con blocco **create** (`tableCreate`) + **update** (`tableUpdate`) nello stesso file.

## Legenda ruoli

| Ruolo | Significato |
|-------|-------------|
| create+update | Tabella nuova + colonne/idempotenza su DB esistente |
| create | Solo creazione tabella |
| update | Solo alter (es. colonna `lang` su `users`) |
| altro | Schema builder diretto o file non standard |
| non attivo | Suffisso `.fortify`, `.wip`, `.old` — Laravel non li carica |

## Duplicati noti (non archiviati)

Più file per la stessa tabella; da consolidare in futuro nella migration con timestamp più recente.

### `wiki/concepts/model-migration-seeder-rule.md` — Regola: 1 Modello = 1 Migrazione + 1 Seeder


# Regola: 1 Modello = 1 Migrazione + 1 Seeder

## Principio Base
Ogni **modello concreto** che rappresenta un'entità persistabile deve avere:
1. Una **migrazione** per definire la tabella del database
2. Uno **seeder** per popolare i dati di esempio

## Classificazione Modelli

### ✅ Modelli Concrete (1:1:1 obbligatorio)
- `User.php` → `users` table
- `Profile.php` → `profiles` table
- `Role.php` → `roles` table
- `Team.php` → `teams` table

### ⚠️ Eccezioni Valide

#### 1. Classi Astratte
```php

### `wiki/concepts/module-root-folder-violations.md` — Violazioni struttura root — modulo User (risolto)


# Violazioni struttura root — modulo User (risolto)

> **Stato:** ✅ Bonifica completata 2026-06-18. Cartelle root `Actions/`, `Application/`, `Database/`, `Events/`, `Listeners/` rimosse.

## Regola (canon)

[architecture-module-directory-structure.md](../../../../../../docs/wiki/bmad/architecture-module-directory-structure.md) — tutto il PHP sotto `app/`, DB sotto `database/` minuscolo.

## Storico

Il modulo User aveva copie legacy nella root (non PSR-4). I file attivi vivono in:

- `app/Actions/`, `app/Application/`, `app/Events/`, `app/Listeners/`
- `database/migrations/`, `database/factories/`

Inventario migration: [migrations-users-inventory.md](./migrations-users-inventory.md).

## Verifica


### `wiki/concepts/no-app-support-queueable-actions.md` — no `app/Support/` — business logic in QueueableAction


# no `app/Support/` — business logic in QueueableAction

## Scopo

Nel modulo User **non** esiste più `app/Support/`. Ogni helper con comportamento di dominio è una **Spatie QueueableAction** sotto `app/Actions/`.

## Migrazione (2026-07-12)

| Legacy `app/Support/` | Action / Data |
|----------------------|-------------|
| `Otp/Hasher` | `HashOtpValueAction`, `VerifyOtpHashAction`, `OtpHashNeedsRehashAction` |
| `Socialite/Utils/UserNameFieldsResolver` | `ResolveUserNameFieldsFromSocialiteAction` → `SocialiteNameFieldsData` |
| `Socialite/Utils/EmailDomainAnalyzer` | `AnalyzeSocialiteEmailDomainAction` → `SocialiteEmailDomainAnalysisData` |
| `NotificationSchema` | `IsNotificationSchemaReadableAction` |
| `AuthenticationLogQuery` | `GetAuthenticationLogQueryForAuthenticatableAction` |
| 

### `wiki/concepts/no-comment-module-dependency.md` — User non dipende da Comment


# User non dipende da Comment

## GitHub (tracciamento)

| Tipo | Link |
|------|------|
| Issue | [#13 — User must never depend on Comment](https://github.com/laraxot/base_techplanner_fila5/issues/13) |
| Discussion | [#14 — Architecture User ↔ Comment](https://github.com/laraxot/base_techplanner_fila5/discussions/14) |

## Regola (legge operativa)

Il modulo **User** è infrastruttura identity/auth: **non deve** importare classi, trait, contratti o provider dal modulo **Comment** (né da moduli opzionali non presenti nel progetto).

## Vietato in User

- `use Modules\Comment\...`
- `implements CanComment`
- `use InteractsWithComments`
- `require` Comment in `composer.json` / `module.json`

### `wiki/concepts/no-services-no-support-queueable-actions.md` — User — Services/Support vietati: solo Actions


# User — Services/Support vietati: solo Actions

## Regola

- **Mai** creare file in `app/Services/` o `app/Support/`
- **Sempre** `app/Actions/{Contexto}/FooAction.php`
- **Trait**: `use Spatie\QueueableAction\QueueableAction;`
- **Entrypoint**: unico metodo `execute(...)`
- **Chiamata**: `app(FooAction::class)->execute(...)`
- **Gruppi**: sottocartelle per attore/contesto (es. `Actions/Otp/`, `Actions/Socialite/`)

## Conversione

Vedi [no-app-support-queueable-actions.md](no-app-support-queueable-actions.md) per il mapping legacy → Action.

### `wiki/concepts/notifications-folio-page.md` — Pagina Folio notifiche — centro in-app


# Pagina Folio notifiche — centro in-app

## Scopo

Centro notifiche per utenti autenticati nel FO. **Owner UI**: modulo User. **Link header**: tema Sixteen.

La rotta non si definisce in `web.php` — esiste perché esiste il file sotto `pages/`.

## Contratto Folio

| Campo | Valore |
|-------|--------|
| File | `resources/views/pages/notifications/index.blade.php` |
| `name()` | `notifications` (inglese) |
| URL | `/it/notifications` |
| Middleware | `web`, `auth` |
| Widget | `NotificationsCenterWidget` |

```php

### `wiki/concepts/notifications-folio-route.md` — notifications — named route Folio FO


# notifications — named route Folio FO

Quick reference — dettaglio pagina: [notifications-folio-page.md](notifications-folio-page.md).

## Mapping

| Vietato | Corretto |
|---------|----------|
| `route('area-personale.notifiche')` | `route('notifications')` |
| `/it/area-personale/notifiche` | `/it/notifications` |

## Definizione rotta (Folio, non web.php)

File: `Modules/User/resources/views/pages/notifications/index.blade.php`

```php
name('notifications');
```


### `wiki/concepts/notifications-runtime-model.md` — notifications — modello runtime User


# notifications — modello runtime User

## Ruolo

`Modules\User\Models\Notification` estende `Illuminate\Notifications\DatabaseNotification`.

- Connessione: `user` (`fixcity_user`)
- Usato da `BaseUser::notifications()` e `unreadNotifications()` nel FO/header

## Schema owner (non qui)

**Vietato** `create_notifications_table` in User. Owner = **Notify** (`XotBaseMigration`).

- Regola: [no-notifications-migration-in-user-module](../rules/no-notifications-migration-in-user-module.md)
- Canon Notify: [notifications-database-contract](../../../../Notify/docs/wiki/concepts/notifications-database-contract.md)

## Guard schema FO

`Modules\User\Support\NotificationSchema::isReadable()` verifica `Schema::connection(...)->hasTable('notifications')` prima di query nel header.

### `wiki/concepts/one-migration-consolidamento-wave2.md` — User — consolidamento migrazioni


# User — consolidamento migrazioni

Wave 2: un solo `create_*` top-level per tabella (`users`, `profiles`, `teams`, …).
Duplicati e `add_*`: **`git rm`**. Nessuna cartella `_archive_redundant` / `_bak`.

Owner esempi: `2026_11_12_120000_create_users_table.php`,
`2026_09_01_150108_create_profiles_table.php`,
`2026_09_01_150109_create_teams_table.php`.

### `wiki/concepts/organizzativa-money.md` — organizzativa-money


See canonical documentation: ../../../../../Themes/docs/shared-components/organizzativa-money-Modules.md

### `wiki/concepts/pest-helpers-bootfiles.md` — Helper di dominio in `tests/Helpers.php`


# Helper di dominio in `tests/Helpers.php`

`Modules/User` è il primo modulo del monorepo ad adottare lo strato 2 del bootstrap descritto
in [pest5-configuring-tests](../../../../Xot/docs/wiki/concepts/pest5-configuring-tests.md).
Questa pagina racconta il caso concreto, perché il numero che ne è uscito è la ragione
migliore per adottarlo anche altrove.

## Il meccanismo

`Pest\Bootstrappers\BootFiles` (vendor/pestphp/pest, righe 30-31) carica dalla test directory
esattamente due file, in quest'ordine:

```php
'Helpers.php',
'Pest.php',
```

Sono nomi cablati nel framework. Mettere gli helper di dominio in `tests/Helpers.php` non è
quindi una convenzione locale: è il posto che Pest 5 prevede. Ne discendono tre cose:

### `wiki/concepts/policy-base-choice.md` — Policy Base Choice


# Policy Base Choice

## Scopo

Definire linee guida chiare su quando estendere `UserBasePolicy` vs `XotBasePolicy` nel modulo User.

## Principio

`UserBasePolicy` estende `XotBasePolicy` aggiungendo un layer semantico specifico per il dominio identity/utente. Le due basi devono rimanere separate per mantenere una chiara separation of concerns.

## Quando usare `UserBasePolicy`

Estendi `UserBasePolicy` quando:

- La policy riguarda modelli di autenticazione, identità, team, ruoli o permessi specifici del dominio User
- La policy rappresenta regole del dominio User con semantica chiaramente centrata sull'actor utente
- Si desidera un layer di autorizzazione che eredita il comportamento di super-admin override da `XotBasePolicy` ma aggiunge controlli specifici per il contesto User
- Esemp

### `wiki/concepts/policy-hierarchy.md` — Policy Hierarchy in Laraxot


# Policy Hierarchy in Laraxot

> Documentation of the policy inheritance architecture and usage guidelines

---

## Overview

Laraxot uses a two-tier policy architecture:

```
XotBasePolicy (Modules/Xot)           ← Foundation
    ↑
UserBasePolicy (Modules/User)         ← Application Layer
    ↑
ActivityPolicy, CmsPolicy, etc.       ← Domain Specific
```

---

### `wiki/concepts/policy-inheritance-boundary.md` — Policy Inheritance Boundary


# Policy Inheritance Boundary

> Quando estendere `UserBasePolicy` vs `XotBasePolicy` - Decisione architetturale documentata

---

## Contesto Decisionale

**Data**: 2026-04-27  
**Trigger**: Discussione architetturale su policy inheritance  
**Moduli Interessati**: User, Xot, tutti i moduli domain-specific

---

## Domanda Architetturale

> "Le policy devono estendere `UserBasePolicy` o `XotBasePolicy`? Meglio tenerle separate? Quando usare una e quando usare l'altra?"

---

### `wiki/concepts/policy-inheritance-strategy.md` — Policy Inheritance Strategy in Laraxot


# Policy Inheritance Strategy in Laraxot

## REGOLA PERMANENTE: Gerarchia corretta delle Policy Base

### Panoramica

Nel sistema Laraxot esistono due policy base che servono scopi diversi:

1. **`Modules\Xot\Models\Policies\XotBasePolicy`** - Base universale per tutti i moduli
2. **`Modules\User\Models\Policies\UserBasePolicy`** - Base specifica per il modulo User

### Vincolo assoluto

```
UserBasePolicy DEVE estendere XotBasePolicy
NON duplicare la logica di super-admin in entrambe le classi
```

### Perché

### `wiki/concepts/policy-structure.md` — User vs Xot Policy Structure

# User vs Xot Policy Structure

## Overview
The project follows a **separation-of-concerns** approach for authorization policies:
- **`UserBasePolicy`** (`laravel/Modules/User/app/Models/Policies/UserBasePolicy.php`) contains rules that are *specific to the `users` table* and to `User`‑related features (login, socialite linking, profile privacy, etc.).
- **`XotBasePolicy`** (located in the Xot module) defines *generic, cross-module policies* that operate on Xot-wid concepts such as **roles**, **capabilities**, and **global resources**.

## When to extend which policy
| Situation | Extend | Reason |
|-----------|--------|--------|
| Logic dealing with **user credentials**, **profile fields**, **socialite connections**, **password reset**, etc. | `UserBasePolicy` | Keeps user-centric rules c

### `wiki/concepts/profile-id-bigint-uuid-fix.md` — Profiles — errore 1364 `id` senza default


# Profiles — errore 1364 `id` senza default

## Sintomo

```
Field 'id' doesn't have a default value
insert into profiles (user_id, uuid, ...) — senza id
```

## Causa

- DB legacy: `id` char(36) PK (migrazione `uuid('id')->primary()`)
- Model: `incrementing=true` → Laravel non invia `id`
- **5 file** `create_profiles_table` duplicati, nessuno chiamava `convertIdFromUuidToBigintIfNeeded()`

## Fix (2026-07-27)

Owner **WorkOrder** (`main_module`): `2026_07_27_111500_create_profiles_table.php`


### `wiki/concepts/profile-migration-uuid-contract.md` — Profile Migration UUID Contract


# Profile Migration UUID Contract

## Regola (runtime User)

`BaseProfile` genera `uuid` in `creating`. Il contratto richiede colonna `uuid` nella tabella `profiles` del DB usato dal modello concreto.

## Owner schema (workorder — connessione `user`)

**Owner migrazione = modulo WorkOrder** (`main_module`):

- [profile-schema-ownership](../../../WorkOrder/docs/profile-schema-ownership.md)
- `laravel/Modules/WorkOrder/database/migrations/2026_07_27_111500_create_profiles_table.php`

Duplicati User in `database/migrations/_bak/*.merged` (violazione 1 modello = 1 migrazione owner).

Vedi [profile-id-bigint-uuid-fix](./profile-id-bigint-uuid-fix.md) per errore 1364 `id` senza default.

## Regola id + uuid


### `wiki/concepts/profiles-ownership-boundary-rule.md` — Profiles ownership boundary rule


# Profiles ownership boundary rule

## Regola

Nel contesto Laraxot di questo repository, il contratto schema di `profiles` e' owner del modulo Fixcity.

## Implicazioni

- il modulo User non deve introdurre migrazioni additive su `profiles`
- non sono ammessi file con naming `add_*_to_profiles_table.php`
- eventuali cambi al contratto `profiles` passano dalla migrazione canonica `create_profiles_table` owner

## Rationale

- DRY: una sola fonte di verita' per il modello
- KISS: evitare catene additive e ownership ambigua tra moduli
- anti-regressione: prevenire conflitti e rollback complessi

## Riferimenti

### `wiki/concepts/ridondanze-docs-legacy-cluster.md` — Ridondanza documentazione `Modules/User/docs`


# Ridondanza documentazione `Modules/User/docs`

## Scopo

Il modulo User accumula anni di note agent/PHPStan; molte sono **near-duplicate** o differiscono solo per **`_`/`-`/maiuscole** nel nome file. Qui non si ricopia il contenuto: si lista **cosa collide** così gli editor possono gradualmente **fusionare/archiviare** senza perdere storicità nei path `legacy/`.

## Volume (audit 2026-05-22)

- **`docs/` totale:** ~3077 file `.md`
- **`docs/legacy/`** e **`docs/archive/`:** ~**723** file ciascuno (~**6.1M** — contenuto quasi speculare)
- **`docs/legacy/`:** ~**723** file (~24% del modulo) — snapshot agent multi-sessione
- **`phpstan` nel path nome:** ~293 file — log fix ripetuti, non regole viventi

## Cluster logout / Volt / auth UI

Stesso flusso documentato con varianti `logout-*`, `

### `wiki/concepts/second-brain-local-discipline.md` — Contratto wiki locale — stub User


# Contratto wiki locale — stub User

| Risorsa | Link |
|---------|------|
| **Canon** | [Xot second-brain-local-discipline.md](../../../../Xot/docs/wiki/concepts/second-brain-local-discipline.md) |
| **Harness moduli** | [ai-harness-module-discipline.md](../../../../docs/wiki/concepts/ai-harness-module-discipline.md) |
| **Tips 001–022** | [hackernoon map](../../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md) |
| **Prompt router** | [llm-wiki.txt](../../../../../../bashscripts/tools/prompts/llm-wiki.txt) |

**Harness locale:** [ai-harness-user-discipline](./ai-harness-user-discipline.md)

Solo decisioni specifiche di **User** in `docs/wiki/`; contratto generico in Xot.

### `wiki/concepts/socialite-admin-configuration.md` — Socialite Admin Configuration


# Socialite Admin Configuration

## The Goal

Allow administrators to configure OAuth provider credentials (`GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, etc.) via Filament backoffice UI, **without editing .env files or redeploying**.

---

## The Problem

**Current State:**
```bash
# .env file (requires deploy to change)
GOOGLE_CLIENT_ID=xxx.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=GOCSPX-xxx
```

**Problems:**
1. Non-technical admins can't edit .env

### `wiki/concepts/socialite-admin-tutorial.md` — Tutorial: Configurare Google OAuth nel Backoffice


# Tutorial: Configurare Google OAuth nel Backoffice

## Prerequisiti

1. Account Google Cloud Console con progetto creato
2. Accesso al backoffice Filament come admin
3. Accesso al file `.env` del server

---

## Step 1: Creare credenziali Google Cloud

1. Vai su [console.cloud.google.com](https://console.cloud.google.com)
2. Seleziona il progetto → **API e Servizi** → **Credenziali**
3. Clicca **+ Crea credenziali** → **ID client OAuth**
4. Tipo applicazione: **Applicazione web**
5. Nome: `Fixcity Production` (o simile)
6. URI di reindirizzamento autorizzati: aggiungi `https://tuodominio.it/auth/google/callback`
7. Clicca **Crea**

### `wiki/concepts/socialite-backoffice-google-setup.md` — socialite backoffice google setup


# socialite backoffice google setup

## obiettivo

Configurare Google OAuth da backoffice Filament 5 senza sporcare la tabella `users`, mantenendo il login social nel modulo `User`.

## prerequisiti

- provider Google configurato in Google Cloud Console (OAuth Web App)
- redirect URI registrata correttamente verso callback applicativa
- route callback attiva nel progetto: `socialite.oauth.callback`

Riferimento Google:
- [Google OAuth2 Web Server Flow](https://developers.google.com/identity/protocols/oauth2/web-server?hl=it)

## percorso amministrazione

Backoffice Filament:


### `wiki/concepts/teams-owner-id-in-create-migration.md` — Teams — `owner_id` nella create (non in `add_*`)


# Teams — `owner_id` nella create (non in `add_*`)

## Anti-pattern rimosso (2026-07-27)

`2025_05_16_221811_add_owner_id_to_teams_table.php` violava:

| Violazione | Dettaglio |
|------------|-----------|
| Naming | `add_*_to_*` invece di `create_{table}_table` |
| One-model-one-migration | secondo file sulla stessa tabella owner |
| FK errata | `foreignIdFor(Team::class, 'owner_id')` — self-FK; owner è **User** |
| `$connection` | vietato (non serviva, ma pattern sbagliato) |

## Canon attuale

File unico: `database/migrations/2026_07_27_102200_create_teams_table.php`

- `extends XotBaseMigration`
- `protected ?string $model_class = Team::class`

### `wiki/concepts/trait-alias-conflict-resolution.md` — Trait conflict — `teams()` Spatie vs Laraxot


# Trait conflict — `teams()` Spatie vs Laraxot

## Problema

`BaseUser` usa `HasSpatiePermission` → `HasRoles::teams()` (standard Spatie) e `HasTeams` (membership Laraxot/Jetstream). Stesso nome `teams()` → fatal PHP.

## Soluzione canonica — standard Spatie rigido

**Non** aliasare o nascondere `teams()` Spatie. Il package resta API-first.

| Metodo | Origine | Scopo |
|--------|---------|--------|
| `teams()` | Spatie `HasRoles` | Pivot permission team-scoped roles |
| `membershipTeams()` | `HasTeams` | Membership Laraxot (`belongsToManyX` su Team) |

### `HasSpatiePermission` — nessun wrapper

```php
trait HasSpatiePermission

### `wiki/concepts/translation-5-level-structure.md` — Translation 5-Level Structure Rule


# Translation 5-Level Structure Rule

## The Golden Rule

**NEVER use full sentences or text content as translation keys. ALWAYS use the 5-level structure.**

---

## ❌ WRONG - NEVER DO THIS

```blade
<!-- In theme or module view -->
<p>{{ __('Usa l\'indirizzo email con cui hai creato l\'account.') }}</p>
<p>{{ __('Sign in to your account') }}</p>
<p>{{ __('Enter your credentials to continue') }}</p>

<!-- This is WRONG because: -->
<!-- 1. Full sentence as key -->
<!-- 2. Cannot be reused across themes -->

### `wiki/concepts/translation-convention.md` — Translation Convention - User Module

<<<<<<< .merge_file_bMHf0E
<<<<<<< .merge_file_sNAXD7
<<<<<<< .merge_file_Lnk62d
=======
>>>>>>> .merge_file_zhw04S
=======
>>>>>>> .merge_file_X7SWdG
---
title: "Translation Convention - User Module"
type: concept
qmd: "translation convention user"
---
<<<<<<< .merge_file_bMHf0E
<<<<<<< .merge_file_sNAXD7
=======
>>>>>>> .merge_file_V0udny
=======
>>>>>>> .merge_file_zhw04S
=======
>>>>>>> .merge_file_X7SWdG

### `wiki/concepts/user-auth-visibility.md` — Admin – User List Visibility


# Admin – User List Visibility

## Current Issue
The admin UI for users (`/fixcity/admin/users`) shows entries but the list is hidden by CSS rules applied to the datatable wrapper. The rows appear as text nodes without actual row styling, making the list unreadable.

## Root Cause
- Bootstrap Italia datatable CSS expects a specific DOM structure (`.table` wrapper).
- A custom wrapper with `display: contents` or missing table classes causes the browser to not render the rows properly.
- The component renders user entries but the CSS grid/tables fail to lay them out.

## Fix Applied
- Updated `UserList.vue` to wrap rows in `<table class="table table-striped table-hover">`.
- Added a scoped CSS rule in `UserList.vue` to enforce `display: contents` on the wrapper table so Bootstrap styles app

### `wiki/concepts/user-support-to-actions.md` — User Support → Actions migration


# User Support → Actions migration

Legacy `app/Support/` files converted to QueueableAction or confirmed dead code.

| Legacy `app/Support/` | Status | Action / Notes |
|----------------------|--------|----------------|
| `AuthenticationLogQuery` | Migrated | `Authentication\GetAuthenticationLogQueryForAuthenticatableAction` |
| `NotificationSchema` | Migrated | `Notification\IsNotificationSchemaReadableAction` |
| `Utils` (Shield) | Dead code | No callers; deleted |

## Caller updates

- `Themes/Sixteen/resources/views/components/sections/header/v1.blade.php` — switched from `NotificationSchema::isReadable()` to `app(IsNotificationSchemaReadableAction::class)->execute()`.

## Verification

- phpstan: `Modules/User` clean.
- pest: `Modules/User` tests passing.

### `wiki/concepts/xotbase-table-columns-enforcement.md` — User Module: XotBaseResourceTable Columns


# User Module: XotBaseResourceTable Columns

24 Table files populated with columns derived from User module Models and Passport migrations.

Resources: AuthenticationLog, Client, Device, Feature, OauthAccessToken, OauthAuthCode, OauthClient, OauthPersonalAccessClient, OauthRefreshToken, PasswordReset, Permission, PersonalAccessToken, Profile, Role, SocialProvider, SocialiteUser, SsoProvider, TeamInvitation, TeamPermission, Team, TeamUser, Tenant, TenantUser, User

Key conventions applied:
- Models use `BaseModel` / `BasePivot` casts (id as string, uuid, datetime)
- SoftDeletes models include `deleted_at` (toggleable)
- Boolean columns use `->badge()`
- Passport models follow standard Laravel Passport schema

### `wiki/concepts/xotbasefield-view-rule.md` — XotBaseField View Calculation Rule


# XotBaseField View Calculation Rule

## Rule
Any Filament form field class that extends `XotBaseField` **must not** declare a protected property `$view` (or any other static view identifier). The view file path is computed at runtime using the Spatie Queryable actions pattern, typically via a method like `getViewBy*()`.

## Why
- **Dynamic resolution**: Views depend on component context (module, theme, locale) and are built from reusable snippets.
- **Consistency**: Centralises view selection logic, avoiding duplicate hard‑coded paths across modules.
- **Maintainability**: Changing the view location only requires updating the Queryable action, not every field class.

## How to Apply
1. Remove any `protected string $view` declaration from the field class.
2. Ensure the class uses the `Xot

### `wiki/concepts/xotbasepage-inheritance-rules.md` — XotBasePage Inheritance Rules


# XotBasePage Inheritance Rules

## The Rule

**Pages extending `XotBasePage` MUST NOT override `getNavigationLabel()` or `getTitle()`.**

**TransTrait handles these automatically via translation files.**

---

## ❌ WRONG - Never Do This

```php
namespace Modules\User\Filament\Pages;

class MySettingsPage extends XotBasePage
{
    // These methods should NOT be here!
    

### `wiki/concepts/xotbasepage-inheritance.md` — XotBasePage Inheritance Architecture


# XotBasePage Inheritance Architecture

## Overview
This document explains the inheritance pattern for Filament pages in the User module when extending `Modules\Xot\Filament\Pages\XotBasePage`.

## Core Rule: No Property Redefinition
**CRITICAL**: Never declare properties like `$view`, `$navigationIcon`, `$navigationGroup`, or `$navigationSort` in classes extending `XotBasePage`. These are already handled by the base class.

## Architecture Pattern

### XotBasePage Responsibilities
- Centralized view management via `$view` property
- Standardized navigation configuration
- Automatic translation resolution via LangServiceProvider
- Common form handling patterns

### Inheritance Best Practices

#### ✅ Correct Implementation

### `wiki/context-compression.md` — Context Compression - User Module


# Context Compression - User Module

## Overview
Documentation for context compression implementation in the User module.

## Implementation Details
- Uses kilocode compression plugin
- Integrates with context-mode v1.0.103
- Compression threshold: 1000 tokens
- Algorithm: Brotli (level 8)

## Configuration
See root wiki for full configuration: `docs/wiki/context-compression-kilocode.md`

### `wiki/entities/socialite-user.md` — SocialiteUser


# SocialiteUser

**Path**: `Modules/User/app/Models/SocialiteUser.php`
**Tabella**: `socialite_users`
**Estende**: `BaseModel` → `XotBaseModel`

## Schema

| Colonna | Tipo | Note |
|---------|------|------|
| `id` | int PK | |
| `user_id` | string | FK → users.id |
| `provider` | string | 'google', 'facebook', 'github', ... |
| `provider_id` | string | ID univoco del provider |
| `token` | string\|null | OAuth access token |
| `name` | string\|null | Nome dal provider |
| `email` | string\|null | Email dal provider |
| `avatar` | string\|null | URL avatar |


### `wiki/how-to/gitmodules-sync-session.md` — Gitmodules sync session


# Gitmodules sync session

Sessione orchestrata dal prompt `bashscripts/tools/prompts/02-gitmodules-sync.md` (v5.1) e da **STORY-003**.

User (e ogni altro path in `gitmodules.ini`) è una **repository Git autonoma**,
non un submodule. Lo status si legge con `git -C laravel/Modules/User`, mai
dalla root e mai tramite Shell `working_directory`. Verificare
`rev-parse --show-toplevel`. Canon: [no-git-submodules-module-repos.md](../../../../../../docs/wiki/memories/no-git-submodules-module-repos.md).

## Cosa fare su questo owner

1. `git -C . remote -v` — remote reale del modulo (`laraxot/module_user_fila5`), non la root.
2. Quality gates da `laravel/`: phpstan → phpmd → phpinsights (`--composer=composer.lock`).
3. Marker Git: risoluzione manuale forward-only (no `git restore`).

## Canon

- 

### `wiki/integrations/_da-riconciliare/index.divergenza.md` — Divergenza: `index.md`


# Divergenza: `index.md`

Questo file veniva da `docs/wiki/integrations/modules/user/index.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/User/docs/archive/index.md`
- versione recuperata: `laravel/Modules/User/docs/wiki/integrations/_da-riconciliare/index.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/phpinsights-errors.divergenza.md` — Divergenza: `phpinsights-errors.md`


# Divergenza: `phpinsights-errors.md`

Questo file veniva da `docs/wiki/integrations/modules/user/phpinsights-errors.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/User/docs/phpinsights-errors.md`
- versione recuperata: `laravel/Modules/User/docs/wiki/integrations/_da-riconciliare/phpinsights-errors.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/phpinsights-errors.md` — phpinsights-errors





[[DATE] 21:05:06] `Modules/User/app`

                                                                                                    
              82.0%                 91.9%                 76.5%                 88.0%               
                                                                                                    
                                                                                                    
               Code               Complexity           Architecture             Style               


Score scale: ◼ 1-49 ◼ 50-79 ◼ 80-100

[CODE] 82 pts within 14237 lines

Comments ...................................................... 53.7 %
Classes ....................................................... 23.7 %
Functions ...........................

### `wiki/integrations/_da-riconciliare/project-structure.divergenza.md` — Divergenza: `project-structure.md`


# Divergenza: `project-structure.md`

Questo file veniva da `docs/wiki/integrations/modules/user/project-structure.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/User/docs/project-structure.md`
- versione recuperata: `laravel/Modules/User/docs/wiki/integrations/_da-riconciliare/project-structure.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/project-structure.md` — Project Structure — Module **User**


# Project Structure — Module **User**

## Directory Structure

### ❌ Forbidden Root Folders

At module root level, these folders MUST NOT exist:
- ❌ `Actions/` (move to `app/Actions/`)
- ❌ `Application/` (move to `app/Application/`)
- ❌ `Events/` (move to `app/Events/`)
- ❌ `Listeners/` (move to `app/Listeners/`)
- ❌ `Database/` (rename to lowercase `database/`)

\`\`\`
./laravel/Modules/User/docs/
├── wiki/                          # Knowledge base locale (LLM Wiki)
│   ├── index.md                  # Master catalog
│   ├── log.md                    # Activity log
│   ├── concepts/                 # Topic/theme pages

### `wiki/integrations/_da-riconciliare/testing.divergenza.md` — Divergenza: `testing.md`


# Divergenza: `testing.md`

Questo file veniva da `docs/wiki/integrations/modules/user/testing.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/User/docs/bugs/archive/testing.md`
- versione recuperata: `laravel/Modules/User/docs/wiki/integrations/_da-riconciliare/testing.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/baseuser-consolidated.md` — baseuser — Consolidated Documentation


# baseuser — Consolidated Documentation

Consolidated from **12** individual files.

## Table of Contents

- [---](#baseuser-conflicts)
- [---](#baseuser-dry-violation-analysis)
- [---](#baseuser-refactoring-completed-.deprecated)
- [---](#baseuser-refactoring-completed-)
- [---](#baseuser-refactoring-completed-3)
- [---](#baseuser-refactoring-completed.deprecated)
- [---](#baseuser-refactoring-completed)
- [---](#baseuser-refactoringd)
- [---](#baseuser-spatieuplicates)
- [---](#baseuser)
- [---](#baseuserry-violation)
- [---](#baseusers)


### `wiki/integrations/business-consolidated.md` — business — Consolidated Documentation


# business — Consolidated Documentation

Consolidated from **12** individual files.

## Table of Contents

- [---](#business-logic-analysis-3)
- [---](#business-logic-analysis-4)
- [---](#business-logic-analysis-5)
- [---](#business-logic-analysis)
- [---](#business-logic-deep-dive-3)
- [---](#business-logic-deep-dive-4)
- [---](#business-logic-deep-dive-5)
- [---](#business-logic-deep-dive)
- [---](#business-logic)
- [---](#business-logiceepive)
- [User Module - Business Logic Analysis](#business_logic_analysis)
- [User Module - Business Logic Deep Dive](#business_logic_deep_dive)


### `wiki/integrations/code-consolidated.md` — code — Consolidated Documentation


# code — Consolidated Documentation

Consolidated from **14** individual files.

## Table of Contents

- [---](#code-conventions)
- [---](#code-optimization-analysis)
- [---](#code-optimization)
- [---](#code-quality-analysis-3)
- [---](#code-quality-analysis-4)
- [---](#code-quality-analysis-5)
- [---](#code-quality-analysis)
- [---](#code-quality-tools)
- [---](#code-quality)
- [ ](#code_conventions)
- [user module code and documentation optimization analysis](#code_optimization_analysis)
- [Code Quality Analysis - User Module](#code_quality_analysis)
- [---](#codebase-overview)

### `wiki/integrations/dry-consolidated.md` — dry — Consolidated Documentation


# dry — Consolidated Documentation

Consolidated from **13** individual files.

## Table of Contents

- [---](#dry-kiss-018b09)
- [---](#dry-kiss-analysis-.deprecated)
- [---](#dry-kiss-analysis-)
- [---](#dry-kiss-analysis-3)
- [---](#dry-kiss-analysis-4)
- [---](#dry-kiss-analysis-conflict-018b09)
- [---](#dry-kiss-analysis-conflict)
- [---](#dry-kiss-analysis.deprecated)
- [---](#dry-kiss-analysis)
- [---](#dry-kiss-improvements)
- [---](#dry-kiss)
- [---](#dry-violation-fix)
- [---](#dry-violation)

### `wiki/integrations/fullcalendar-consolidated.md` — fullcalendar — Consolidated Documentation


# fullcalendar — Consolidated Documentation

Consolidated from **13** individual files.

## Table of Contents

- [---](#fullcalendar-scheduler-documentation-summary-3)
- [---](#fullcalendar-scheduler-documentation-summary)
- [---](#fullcalendar-scheduler-license-key-invalid)
- [---](#fullcalendar-scheduler-license-troubleshooting)
- [---](#fullcalendar-scheduler-license)
- [---](#fullcalendar-scheduler-quick-reference-3)
- [---](#fullcalendar-scheduler-quick-reference)
- [---](#fullcalendar-schedulerocumentation)
- [FullCalendar Scheduler - Documentazione Completa](#fullcalendar_scheduler_documentation_summary)
- [FullCalendar Scheduler License Configuration](#fullcalendar_scheduler_license)
- [ ](#fullcalendar_scheduler_license_key_invalid)
- [FullCalendar Scheduler License - Troubleshoo

### `wiki/integrations/git-consolidated.md` — git — Consolidated Documentation


# git — Consolidated Documentation

Consolidated from **21** individual files.

## Table of Contents

- [---](#git-conflict-resolution)
- [---](#git-conflicts-models-phpdoc)
- [---](#git-conflicts-resolution-.deprecated)
- [---](#git-conflicts-resolution-)
- [---](#git-conflicts-resolution-3)
- [---](#git-conflicts-resolution-4)
- [---](#git-conflicts-resolution-5)
- [---](#git-conflicts-resolution-6)
- [---](#git-conflicts-resolution-conflict-06cb77)
- [---](#git-conflicts-resolution-conflict)
- [---](#git-conflicts-resolution-local-swarm-backup)
- [---](#git-conflicts-resolution-summary)
- [---](#git-conflicts-resolution.deprecated)

### `wiki/integrations/graphify-map.md` — User Module — Mappa Graphify


# User Module — Mappa Graphify

**Versione:** 2.0.0 | **Modulo:** User | **Data:** 2026-08-02 | **Autore:** @marco76tv

---

## 📌 Cosa fa il modulo User

Il modulo **User** è il **cuore dell'autenticazione e autorizzazione** del sistema Laraxot. Gestisce:

- **Gestione Utenti:** Registrazione, login, profili, account management (`User`, `Profile`)
- **Ruoli e Permessi:** Spatie Permission integration per RBAC (`Role`, `Permission`, `ModelHasRole`, `ModelHasPermission`)
- **Teams/Organizzazioni:** Multi-team support per utente (`Team`, `TeamUser`, `TeamInvitation`, `TeamPermission`)
- **Autenticazione:** Sessioni, dispositivi, device tracking, 2FA (`AuthenticationLog`, `Device`, `DeviceUser`, `DeviceProfile`)
- **OAuth & Passport:** Client management, token lifecycle, SSO (`OauthClient`, `

### `wiki/integrations/hasteams-consolidated.md` — hasteams — Consolidated Documentation


# hasteams — Consolidated Documentation

Consolidated from **10** individual files.

## Table of Contents

- [---](#hasteams-currentteam-method-choice-3)
- [---](#hasteams-currentteam-method-choice)
- [---](#hasteams-trait-analysis)
- [---](#hasteams-trait-filosofia-e-correzione-completa-3)
- [---](#hasteams-trait-filosofia-e-correzione-completa)
- [---](#hasteams-trait)
- [---](#hasteams-traituplicate-methods)
- [Choice of currentTeam() Method in HasTeams Trait](#hasteams_currentteam_method_choice)
- [HasTeams Trait Analysis](#hasteams_trait_analysis)
- [HasTeams Trait - Filosofia Laraxot e Strategia di Correzione Completa](#hasteams_trait_filosofia_e_correzione_completa)

---


### `wiki/integrations/login-consolidated.md` — login — Consolidated Documentation


# login — Consolidated Documentation

Consolidated from **12** individual files.

## Table of Contents

- [---](#login-resolution)
- [---](#login-widget-analysis)
- [---](#login-widget-conversion)
- [---](#login-widget-fix)
- [---](#login-widget-livewire-binding-fix)
- [---](#login-widget-livewire-binding)
- [---](#login-widget-translation)
- [---](#login-widget)
- [Analisi Dettagliata di LoginWidget](#login_widget_analysis)
- [Conversione Livewire Auth/Login a Filament LoginWidget](#login_widget_conversion)
- [---](#loginwidget-error-analysis)
- [---](#loginwidget)


### `wiki/integrations/logout-consolidated.md` — logout — Consolidated Documentation


# logout — Consolidated Documentation

Consolidated from **42** individual files.

## Table of Contents

- [---](#logout-analysis)
- [---](#logout-blade-analysis-3)
- [---](#logout-blade-analysis)
- [---](#logout-blade-conclusions)
- [---](#logout-blade-corrected-analysis-3)
- [---](#logout-blade-corrected-analysis)
- [---](#logout-blade-corrected)
- [---](#logout-blade-error-analysis-3)
- [---](#logout-blade-error-analysis)
- [---](#logout-blade-implementation)
- [---](#logout-blade-structure)
- [---](#logout-blade)
- [---](#logout-error-analysis)

### `wiki/integrations/model-consolidated.md` — model — Consolidated Documentation


# model — Consolidated Documentation

Consolidated from **18** individual files.

## Table of Contents

- [---](#model-classification)
- [---](#model-inheritance-analysis-3)
- [---](#model-inheritance-analysis-4)
- [---](#model-inheritance-analysis-5)
- [---](#model-inheritance-analysis)
- [---](#model-inheritance-fixes-3)
- [---](#model-inheritance-fixes-4)
- [---](#model-inheritance-fixes-5)
- [---](#model-inheritance-fixes)
- [---](#model-inheritance-rules)
- [---](#model-inheritance)
- [---](#model-inheritancees)
- [Analisi Ereditarietà Modelli - Modulo User](#model_inheritance_analysis)

### `wiki/integrations/moderation-consolidated.md` — moderation — Consolidated Documentation


# moderation — Consolidated Documentation

Consolidated from **8** individual files.

## Table of Contents

- [---](#moderation-actions)
- [---](#moderation-contracts)
- [---](#moderation-doctor)
- [---](#moderation-notifications)
- [---](#moderation-wizard-generic)
- [Moderazione Dentista dal Modulo User](#moderation_doctor)
- [Moderazione e Wizard di Registrazione Generici per User](#moderation_wizard_generic)
- [---](#moderationor)

---

## moderation-actions


### `wiki/integrations/navigation-consolidated.md` — navigation — Consolidated Documentation


# navigation — Consolidated Documentation

Consolidated from **6** individual files.

## Table of Contents

- [---](#navigation-structure)
- [---](#navigation-translations-completion)
- [---](#navigation-translations-fixes-january)
- [---](#navigation-translations-fixes)
- [---](#navigation-translationses)
- [Struttura Navigazione](#navigation_structure)

---

## navigation-structure

*Consolidated from: `navigation-structure-3.md`*


### `wiki/integrations/on-demand-pattern.md` — On-Demand Pattern — Module **User**


# On-Demand Pattern — Module **User**

**Fonte canonica**: [../../docs/wiki/rules/on-demand-pattern.md](../../docs/wiki/rules/on-demand-pattern.md)

## Principio

Questo module segue il **pattern on-demand** per rules, skills, commands e memories:

- ✅ **Vivono solo nel wiki** — ../../docs/wiki/
- ✅ **Caricati on-demand** — via trigger map o `qmd search`
- ❌ **NON pre-caricati** — mai embeddare nei bootstrap files
- ❌ **Nessuna duplicazione** — wiki = sorgente di verità unica

## Perché On-Demand?

1. **Contesto minimo** — Carico solo le regole pertinenti al task corrente
2. **Token efficient** — Nessun carico inutile all'avvio (~50K → ~2K token)
3. **Scalabile** — Aggiungere nuove rules non richiede modifiche ai bootstrap
4. **Manutenibile** — Una sola fonte di verità (wiki)

### `wiki/integrations/ottimizzazioni-consolidated.md` — ottimizzazioni — Consolidated Documentation


# ottimizzazioni — Consolidated Documentation

Consolidated from **8** individual files.

## Table of Contents

- [---](#ottimizzazioni-approfondite-modulo-user)
- [---](#ottimizzazioni-correzioni)
- [---](#ottimizzazioni-dry-kiss)
- [---](#ottimizzazioni-modulo-user)
- [---](#ottimizzazioni-super-dry-kiss)
- [---](#ottimizzazioni-superry-kiss)
- [---](#ottimizzazioni-user)
- [---](#ottimizzazioniry-kiss)

---

## ottimizzazioni-approfondite-modulo-user


### `wiki/integrations/passport-consolidated.md` — passport — Consolidated Documentation


# passport — Consolidated Documentation

Consolidated from **34** individual files.

## Table of Contents

- [---](#passport-admin-actions)
- [---](#passport-cluster-completion-status)
- [---](#passport-cluster-completion)
- [---](#passport-cluster-current-status)
- [---](#passport-cluster-current)
- [---](#passport-cluster-implementation-completed)
- [---](#passport-cluster-implementation-needed)
- [---](#passport-cluster-implementation-status)
- [---](#passport-cluster-implementation)
- [---](#passport-cluster-implementationd)
- [---](#passport-cluster-inner-debate)
- [---](#passport-cluster-innerebate)
- [---](#passport-cluster-litigation)

### `wiki/integrations/phpstan-l10.md` — PHPStan Level 10 Compliance — User Module


# PHPStan Level 10 Compliance — User Module

## Summary

| Aspect | Value |
|--------|-------|
| **PHPStan L10** | ✅ 0 errors |
| **Status** | Complete |
| **Last verified** | 2026-08-02 |

## Patterns Applied

### 1. User Model Types
```php
/** @return Collection<User> */
public function users(): Collection { }

/** @var class-string<User> */
protected $modelClass = User::class;

### `wiki/integrations/phpstan-status.md` — PHPStan Status — User Module


# PHPStan Status — User Module

## Latest Analysis

- **Updated:** 2026-08-02
- **Status:** See `build/phpstan-final-2026-08-02.txt` for full results
- **Strategy:** See `build/PHPSTAN_102_ERRORS_CONSOLIDATED.md` for remediation plan

## Progress

- Fixed errors in this module are tracked in `docs/chat/`
- Lock coordination: Check `docs/chat/multi-agent-standing-coordination.md`

## Next Steps

Use BMAD orchestration per `build/PHPSTAN_102_ERRORS_CONSOLIDATED.md` Phase 1-3.

---
*This file is auto-generated. Do not edit manually.*

### `wiki/integrations/quality-consolidated.md` — quality — Consolidated Documentation


# quality — Consolidated Documentation

Consolidated from **10** individual files.

## Table of Contents

- [---](#quality-11)
- [---](#quality-improvements-summary)
- [---](#quality-improvements)
- [---](#quality-status-11)
- [---](#quality-status-nov)
- [---](#quality-status)
- [---](#quality-tooling)
- [---](#quality-tools-final)
- [---](#quality-tools)
- [---](#quality)

---


### `wiki/integrations/query-consolidated.md` — query — Consolidated Documentation


# query — Consolidated Documentation

Consolidated from **6** individual files.

## Table of Contents

- [---](#query-optimization-analysis-3)
- [---](#query-optimization-analysis-4)
- [---](#query-optimization-analysis-5)
- [---](#query-optimization-analysis)
- [---](#query-optimization)
- [User Module - Query Optimization Analysis](#query_optimization_analysis)

---

## query-optimization-analysis-3

*Consolidated from: `query-optimization-analysis.md`*


### `wiki/integrations/query-optimization-analysis.md` — User Module - Query Optimization Analysis


# User Module - Query Optimization Analysis

## Overview
The User module has several critical performance issues related to authentication, authorization, and user management. As the foundation for all user operations, these inefficiencies cascade throughout the entire application.

## Critical Query Issues Identified

### 1. Authentication Log Processing (CRITICAL IMPACT)

**File**: `Modules/User/app/Listeners/OtherDeviceLogoutListener.php:42`
**Current Implementation**:
```php
foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
    if ($log->getKey() !== $authenticationLog->getKey()) {
        $log->update([
            'cleared_by_user' => true,
            'logout_at' => now(),
        ]);
    }

### `wiki/integrations/registration-consolidated.md` — registration — Consolidated Documentation


# registration — Consolidated Documentation

Consolidated from **8** individual files.

## Table of Contents

- [---](#registration-widget-3)
- [---](#registration-widget-fileupload-fix)
- [---](#registration-widget-fileupload)
- [---](#registration-widget-update)
- [---](#registration-widget)
- [Registration Widget Documentation](#registration_widget)
- [RegistrationWidget FileUpload Fix](#registration_widget_fileupload_fix)
- [Aggiornamento relativo a DoctorResource.php](#registration_widget_update)

---

## registration-widget-3


### `wiki/integrations/resources-consolidated.md` — resources — Consolidated Documentation


# resources — Consolidated Documentation

Consolidated from **5** individual files.

## Table of Contents

- [---](#resources-array-keys-philosophy)
- [---](#resources-array-keys)
- [---](#resources-corrections-summary-)
- [---](#resources-corrections-summary)
- [---](#resources-corrections)

---

## resources-array-keys-philosophy

*Consolidated from: `resources-array-keys-philosophy.md`*

module: theme

### `wiki/integrations/spatie-consolidated.md` — spatie — Consolidated Documentation


# spatie — Consolidated Documentation

Consolidated from **12** individual files.

## Table of Contents

- [---](#spatie-models-verification)
- [---](#spatie-permission-philosophy)
- [---](#spatie-permission-teams-laravel-13)
- [---](#spatie-permission-teams-laravel)
- [---](#spatie-permission)
- [---](#spatie-permissions-methods-3)
- [---](#spatie-permissions-methods-4)
- [---](#spatie-permissions-methods-5)
- [---](#spatie-permissions-methods)
- [---](#spatie-permissions)
- [https://jaydeepamethiya.medium.com/spatie-roles-and-permissions-in-laravel-10-a-comprehensive-guide-536d099d40ae](#spatie_permissions)
- [User Module - Spatie Permission Methods Reference](#spatie_permissions_methods)


### `wiki/integrations/sso-consolidated.md` — sso — Consolidated Documentation


# sso — Consolidated Documentation

Consolidated from **7** individual files.

## Table of Contents

- [---](#sso-guide)
- [---](#sso-providers-implementation-3)
- [---](#sso-providers-implementation-4)
- [---](#sso-providers-implementation-5)
- [---](#sso-providers-implementation)
- [---](#sso)
- [User Module - SSO Providers Implementation](#sso_providers_implementation)

---

## sso-guide

*Consolidated from: `sso-guide.md`*

### `wiki/integrations/team-consolidated.md` — team — Consolidated Documentation


# team — Consolidated Documentation

Consolidated from **11** individual files.

## Table of Contents

- [---](#team-bindings-fix-3)
- [---](#team-bindings-fix)
- [---](#team-bindings)
- [---](#team-contract-usage-reasoning)
- [---](#team-user-composite-primary-key-fix)
- [---](#team-user-composite-priy-key)
- [---](#team-user-permissions-fix)
- [---](#team-user-permissions)
- [Fix Binding Team Models nel Modulo User](#team_bindings_fix)
- [TeamContract Usage Reasoning](#team_contract_usage_reasoning)
- [---](#teams)

---

### `wiki/integrations/traits-consolidated.md` — traits — Consolidated Documentation


# traits — Consolidated Documentation

Consolidated from **10** individual files.

## Table of Contents

- [---](#traits-complete-guide)
- [---](#traits-hasteams-analisi-corretta-3)
- [---](#traits-hasteams-analisi-corretta)
- [---](#traits-hasteams-analysis-corrected)
- [---](#traits-hasteams-analysis-corretta)
- [---](#traits-hasteams-corrected)
- [---](#traits-hasteams-corretta)
- [---](#traits)
- [Guida Completa ai Trait del Modulo User - AGGIORNATO POST-IMPLEMENTAZIONE](#traits_complete_guide)
- [Analisi Corretta del Trait HasTeams - Filosofia Laraxot](#traits_hasteams_analisi_corretta)

---


### `wiki/integrations/translation-consolidated.md` — translation — Consolidated Documentation


# translation — Consolidated Documentation

Consolidated from **22** individual files.

## Table of Contents

- [---](#translation-best-practices)
- [---](#translation-city-field-refactor-.deprecated)
- [---](#translation-city-field-refactor-)
- [---](#translation-city-field-refactor-3)
- [---](#translation-city-field-refactor-conflict)
- [---](#translation-city-field-refactor.deprecated)
- [---](#translation-city-field-refactor)
- [---](#translation-conflict-resolution-prototype)
- [---](#translation-fields-key-importance)
- [---](#translation-fixes)
- [---](#translation-key-prototype)
- [---](#translation-keys-rules)
- [---](#translation-keys)

### `wiki/integrations/user-consolidated.md` — user — Consolidated Documentation


# user — Consolidated Documentation

Consolidated from **21** individual files.

## Table of Contents

- [---](#user-factory-advanced-integration-3)
- [---](#user-factory-advanced-integration)
- [---](#user-factory-complete-ecosystem-integration)
- [---](#user-factory-ecosystem-integration)
- [---](#user-factory-integration)
- [---](#user-invitation)
- [---](#user-management)
- [---](#user-profile-aration)
- [---](#user-profile-models)
- [---](#user-profile-separation)
- [---](#user-profile)
- [---](#user-research)
- [---](#user-states)

### `wiki/integrations/volt-consolidated.md` — volt — Consolidated Documentation


# volt — Consolidated Documentation

Consolidated from **27** individual files.

## Table of Contents

- [---](#volt-blade-implementation-3)
- [---](#volt-blade-implementation-error-3)
- [---](#volt-blade-implementation-error)
- [---](#volt-blade-implementation)
- [---](#volt-errors)
- [---](#volt-folio-error)
- [---](#volt-folio-logout-debug)
- [---](#volt-folio-logout-error-3)
- [---](#volt-folio-logout-error)
- [---](#volt-folio-logout)
- [---](#volt-folio-logoutebug)
- [---](#volt-folio)
- [---](#volt-logout-action)

### `wiki/integrations/widget-consolidated.md` — widget — Consolidated Documentation


# widget — Consolidated Documentation

Consolidated from **12** individual files.

## Table of Contents

- [---](#widget-rendering-analysis-3)
- [---](#widget-rendering-analysis-4)
- [---](#widget-rendering-analysis-5)
- [---](#widget-rendering-analysis)
- [---](#widget-rendering)
- [---](#widget-translation-rules-3)
- [---](#widget-translation-rules)
- [---](#widget-translation)
- [🔍 Analisi Rendering LoginWidget - Docs.Italia.it Style](#widget_rendering_analysis)
- [Widget Translation Rules - SaluteOra Project](#widget_translation_rules)
- [---](#widgets-structure)
- [widgets_structure - User](#widgets_structure)


### `wiki/integrations/widget-rendering-analysis.md` — 🔍 Analisi Rendering LoginWidget - Docs.Italia.it Style


# 🔍 Analisi Rendering LoginWidget - Docs.Italia.it Style

## 📋 Problema Analizzato

Il login dovrebbe apparire come in https://docs.italia.it/accounts/login/ - design pulito, professionale, conforme Bootstrap Italia.

### 🎯 Requisiti

1. **Design Conforme**: Seguire le linee guida Bootstrap Italia / Design Comuni
2. **Widget Filament 4**: Incorporare correttamente il widget Filament
3. **Form Rendering**: Il form deve renderizzarsi dentro il widget

## 🔍 Analisi Architetturale

### Componenti Coinvolti

#### 1. LoginWidget (PHP)
**Path**: `Modules/User/Filament/Widgets/Auth/LoginWidget.php`


### `wiki/redundancy/duplicated-auth-widgets.md` — LoginWidget e LogoutWidget duplicati


# LoginWidget e LogoutWidget duplicati

## Problema

Due path per lo stesso widget nel modulo User:

| Widget | Path A | Path B |
|--------|--------|--------|
| Login | `app/Filament/Widgets/LoginWidget.php` | `app/Filament/Widgets/Auth/LoginWidget.php` |
| Logout | `app/Filament/Widgets/LogoutWidget.php` | `app/Filament/Widgets/Auth/LogoutWidget.php` |

`RegisterWidget` compare anche in **Gdpr** (`Modules/Gdpr/.../Auth/RegisterWidget.php`) — dominio GDPR vs User da chiarire.

## Impatto

- Discovery Filament / autoload può registrare **due widget** con intento uguale.
- Fix auth (Filament v5, traduzioni) va applicato in doppio.

## Fix suggerito

### `wiki/redundancy/duplicated-profile-form.md` — Duplicated ProfileForm and OAuth Forms (User Module)


# Duplicated ProfileForm and OAuth Forms (User Module)

## Problem
The User module contains multiple near-identical Filament form schemas:

- `ProfileForm.php` (appears 4 times across different contexts)
- Multiple OAuth-related forms duplicated between `User/` and `User/Clusters/Passport/` and `User/Clusters/Socialite/`:
  - `SocialProviderForm.php`
  - `SsoProviderForm.php`
  - `SocialiteUserForm.php`
  - All OAuth token/client forms (`Oauth*Form.php`)

These forms are almost byte-for-byte copies with only minor field differences.

## Impact
- Maintenance nightmare (change in one place, forget the others)
- Inconsistent UX and validation rules across similar resources
- Violates DRY and the "one canonical schema" principle


### `wiki/redundancy/duplicated-ratings-relation-manager.md` — Duplicated RatingsRelationManager


# Duplicated RatingsRelationManager

## Problem
`RatingsRelationManager.php` appears in at least 3 different places.

## Impact
- Same rating attachment logic duplicated
- Risk of inconsistent rating behavior across different entities
- Maintenance burden

## Recommended Fix
- Centralize in `Modules/Rating` (or a shared place) and make other modules consume it via relation manager or reusable component.

## Related
- Issue #90

### `wiki/redundancy/duplicated-users-relation-manager.md` — Duplicated UsersRelationManager


# Duplicated UsersRelationManager

## Problem
`UsersRelationManager.php` appears **6 times** across the codebase.

This is the highest duplication count found for any RelationManager.

## Locations (from static scan)
- Multiple clusters inside `Modules/User` (Passport, Socialite, main User)
- Possibly re-used or copied in other modules that have user relationships

## Impact
- Same user-relation logic maintained in 6 places
- High risk of divergence when user model or Filament API changes
- Violates the principle of having canonical relation managers in the User module

## Recommended Fix
1. Keep only **one** canonical `UsersRelationManager` in `Modules/User/app/Filament/RelationManagers/`
2. Make all other places import / use the canonical one via namespace or published stub

### `wiki/redundancy/oauth-dual-resource-trees.md` — OAuth: cluster vs `Filament/Resources/` root


# OAuth: cluster vs `Filament/Resources/` root

## Scopo

Il modulo User espone **due alberi** per le stesse risorse OAuth: standalone in `app/Filament/Resources/` e cluster in `Clusters/Passport/` e `Clusters/Socialite/`.

## Passport (5+1 risorse)

| Risorsa | Standalone | Cluster |
|---------|------------|---------|
| OauthClient | `Resources/OauthClientResource.php` | `Clusters/Passport/Resources/...` |
| OauthAccessToken | idem | idem |
| OauthAuthCode | idem | idem |
| OauthRefreshToken | idem | idem |
| OauthPersonalAccessClient | idem | idem |
| OauthDeviceCode | — | solo cluster |

Ogni coppia include **Form, Table, Infolist** duplicati sotto `Schemas/` e `Tables/`.


### `wiki/root-md-files/analyst-report.md` — User Module — Analyst Report


# User Module — Analyst Report

**Date**: 2026-07-09  
**Analyst**: BMAD Workflow - Analyst Role  
**Baseline**: 2046 PHP lines, 632 PHP files, 120 test files  
**Audit Score**: 80/100 (Grade: B)  
**Dependencies**: Xot (983 references), Spatie Laravel Permissions  

---

## Audit Results Summary

| Category | Score | Grade | Status |
|----------|-------|-------|--------|
| **Security** | 80 | B | No critical vulns |
| **Quality** | 80 | B | Code duplication issues |
| **Performance** | 80 | B | Migration patterns, N+1 risks |
| **Architecture** | 80 | B | SOLID principle violations |
| **Dependencies** | 80 | B | Healthy, no outdated deps |

### `wiki/root-md-files/pest-test-report.md` — <nome progetto> User Module - Pest Test Implementation Report


# <nome progetto> User Module - Pest Test Implementation Report

## Executive Summary

Successfully implemented comprehensive Pest PHP tests for 5 critical User module Actions in <nome progetto>. All tests are now **PASSING** with high code coverage and comprehensive test scenarios. (.)
# <nome progetto> User Module - Pest Test Implementation Report

## Executive Summary

Successfully implemented comprehensive Pest PHP tests for 5 critical User module Actions in <nome progetto>. All tests are now **PASSING** with high code coverage and comprehensive test scenarios.

### Test Results
- **Total Tests Created**: 32
- **Total Assertions**: 80
- **Pass Rate**: 100%
- **Execution Time**: ~12.5 seconds

## Actions Tested


### `wiki/root-md-files/story-user-audit-improvements.md` — BMAD Story: User Module Audit Improvements


# BMAD Story: User Module Audit Improvements

**Story ID**: USER-2026-AUDIT-001  
**Status**: Ready for Backlog  
**Priority**: High  
**Epic**: Technical Debt — Code Quality & Performance  
**Team**: Backend + Infrastructure  

---

## Title
**User module audit improvements: fix critical architecture and performance issues**

---

## User Story

As a **developer maintaining the User module**,  
I want to **fix architectural violations and performance bottlenecks**,  

### `wiki/rules/can-comment-retired-wrong-placement.md` — CanComment — non più in User


# CanComment — non più in User

`CanComment` era capability **solo Model** ma finì in `app/Contracts/` — viola [models-contracts-placement](../../../../../../docs/wiki/rules/models-contracts-placement.md).

- Ritirato: `app/Contracts/CanComment.php` → `app/Contracts/CanComment.php.old`
- Precedente archivio: `app/Models/Contracts/CanComment.php.old`
- Nessuna SSOT attiva in `User`: il modulo identity non espone contratti o trait di Comment.
- `BaseUser` non deve implementare `CanComment` né usare trait/comment relations di moduli opzionali.

## Verifica

- `grep -rn "Modules\\\\Comment" laravel/Modules/User/app/` → 0 risultati
- `grep -rn "CanComment" laravel/Modules/User/app/` → 0 risultati (solo `.old` archived)
- Test `NoCommentModuleDependencyTest.php` passa

Non reintrodurre alias at

### `wiki/rules/frontend-stack-canonical.md` — Stack frontend — modulo User


# Stack frontend — modulo User

## Mantra progetto

```
Tailwind CSS v4 + Alpine.js v3 + Lit v3 + DaisyUI v5 + Flowbite + Filament v5 + Vite
```

UI auth/profile FO e widget Filament: **Filament v5** + componenti tema Sixteen. **NO** Bootstrap runtime.

## SSoT

- [Themes/Sixteen/docs/wiki/rules/frontend-stack-canonical.md](../../../../../Themes/Sixteen/docs/wiki/rules/frontend-stack-canonical.md)
- [docs/wiki/rules/frontend-stack-canonical.md](../../../../../../docs/wiki/rules/frontend-stack-canonical.md)

## Story

[STORY-133](../../../../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md)

### `wiki/rules/header-auth-flow.md` — Rule Overview


## Rule Overview

**Dynamic Header Content Based on Authentication State**  

The header of pages within the User module must display different content based on whether the user is authenticated:

### Unauthenticated State
- Shows "Accedi all'area personale"
- May include "Login" or "Register" calls-to-action

### Authenticated State
- Displays user avatar (avatar image)
- Shows nickname (username or display name)
- Provides dropdown menu with personalized actions:
  - Access to user's services
  - Access to practices
  - Access to notifications
  - Access to settings
  - Logout option

### `wiki/rules/header-design-colors.md` — Rule Overview


## Rule Overview

The **User module** header contains two dropdown menus:
1. **Language selector**
2. **User profile** (avatar, nickname, personal-services dropdown)

Both dropdowns must **exactly match** the visual style defined in the Design’Comuni specification:
https://italia.github.io/design-comuni-pagine-statiche/servizi/graduatoria-area-personale.html

### Visual Requirements
- **Background colour**: `#0066CC` (primary Blue from Design Comuni palette)
- **Hover/active state**: `#004C99` (darker Blue)
- **Text colour**: `#FFFFFF` (white) for both the selected item and menu items
- **Icon colour**: use the same white colour for SVG icons inside the dropdown
- **Border**: none – dropdown is rendered as a flat button with a subtle bottom-border only on focus (`1px solid #005B99`).
- **

### `wiki/rules/module-commit-push-after-change.md` — Commit & push dopo modifiche al modulo


# Commit & push dopo modifiche al modulo

## Regola

Quando modifichi file dentro `laravel/Modules/User/` devi:

1. Entrare nella cartella del modulo (`cd laravel/Modules/User`)
2. Fare `git pull --rebase` sul remote di tracking (`laraxot` o `origin`) se il push è rifiutato
3. Fare `git commit` con messaggio descrittivo
4. Fare `git push -u laraxot dev` (o `origin dev` per provtv)

## Perché

`Modules/User` è un repository Git separato dal monorepo. Modifiche non committate o non pushate rompono tracciabilità e sincronizzazione tra ambienti.

## Push rifiutato

| Errore | Azione |
|--------|--------|

### `wiki/rules/navigation-properties.md` — Rule Overview


## Rule Overview

**Do not use static navigation properties from non-XotBasePage classes.**  

In the User module, classes that extend `XotBasePage` should **not** define the following static properties:

```php
protected static ?string $navigationIcon = 'heroicon-o-key';
protected static ?string $navigationGroup = 'User';
protected static ?int $navigationSort = 90;
```

### Why This Rule Exists

- **Separation of Concerns**: Navigation configuration belongs to the page class itself, not to its extending classes.
- **Automatic Detection**: `XotBasePage` automatically discovers navigation settings from the child class, making explicit static declarations redundant.
- **Consistency**: Ensures all navigation properties are resolved through the same mechanism across the module.

### Correct U

### `wiki/rules/no-filament-labels.md` — No Filament Labels Rule


# No Filament Labels Rule

**REGOLA PERMANENTE**: Nessun utilizzo di `->label()`, `->placeholder()`, o `->helperText()` nei widget Filament.

### Come funziona
- Le traduzioni devono essere gestite tramite `LangServiceProvider` con chiavi a 5 elementi structure
- Esempio di chiave corretta: `user::socialite.providers.google.client_secret`
- Ogni chiave deve contenere:
  1. Modulo (`user`)<br>
  2. Composizione (`socialite.providers.google.client_secret`)<br>
  3. Azione (`login`/`register`/`profile`)
  4. Tipologia (`client_id`/`client_secret`/`scopes`)
  5. Lingua (`it`/`en`/`es`)

### Perché
- Evita duplicazione di software transazioni
- Permette reapplicazione automatica degli aggiornamenti traduzioni
- Facilita gestione centralizzata delle stringhe


### `wiki/rules/no-notifications-migration-in-user-module.md` — Vietato `create_notifications_table` in User


# Vietato `create_notifications_table` in User

## Perché

- **Schema owner** = modulo **Notify** (dominio canale/persistenza notifiche)
- **Runtime** = `Modules\User\Models\Notification` + `BaseUser::unreadNotifications()` (notifiable)
- Mettere la migrazione in User confonde owner e rompe la regola **1 modello = 1 create_*** nel modulo giusto

## Anti-pattern (vietato)

```php
// ❌ Modules/User/database/migrations/2026_07_02_000000_create_notifications_table.php
return new class extends Migration { ... };
```

| Errore | Corretto |
|--------|----------|
| File in `User/database/migrations/` | Solo in `Notify/database/migrations/` |
| `extends Migration` | `extends XotBaseMigration` |

### `wiki/skills/filament-translation-audit.md` — Skill — Audit traduzioni Filament User


# Skill — Audit traduzioni Filament User

> Procedura on-demand per verificare che le UI Filament del modulo `User` rispettino ownership delle traduzioni e regole XotBase.

## Trigger

Usa questa skill quando:

- tocchi page, resource o widget Filament del modulo `User`
- trovi `->label()`, `->placeholder()`, `->tooltip()` o testi inline sospetti
- devi capire se una stringa appartiene al tema o al modulo

## Checklist

- [ ] cercare `->label(`, `->placeholder(`, `->helperText(` e `->tooltip(` nei file toccati
- [ ] confermare che le traduzioni vivano nel modulo `User`, non nel tema
- [ ] verificare che le chiavi seguano la struttura `user::context.collection.element.type`
- [ ] controllare se la page/resource deve estendere classi `XotBase*`
- [ ] aggiornare log wiki modulo/root se la re

### `wiki/sources/user-architecture-sources.md` — User Architecture Sources


# User Architecture Sources

> Source summary for the highest-signal User module docs.

## Source Cluster

- `README.md`
- `product-strategy-user-module.md`
- `architecture/architecture-rules.md`
- `advanced-user-architecture.md`

## Main Signals

- User is the repository's identity and access-management module.
- Security, privacy, compliance, and user experience all shape the module simultaneously.
- Xot architectural discipline still applies even when the docs propose richer identity features.

## Main Risks


### `wiki/topics/actions-structure.md` — Topic actions-structure


# Topic actions-structure

Sintesi automatica di 3 documenti (chiave `actions-structure`).

## Actions Structure

_Fonte: `actions-structure-2.md`_

# Actions Structure 

## Directory Structure

, le Actions devono essere collocate nella directory `app/Actions/` del modulo, seguendo la struttura PSR-4 per l'autoloading:

- **Percorso Corretto**: `Modules/{ModuleName}/app/Actions/`
- **Namespace Corretto**: `Modules\{ModuleName}\Actions\`

### Esempi di percorsi corretti:
- `Modules/User/app/Actions/User/DeleteUserAction.php`

### `wiki/topics/agent-confidence.md` — Topic agent-confidence


# Topic agent-confidence

Sintesi automatica di 3 documenti (chiave `agent-confidence`).

## Disciplina agenti per massimizzare la confidenza

_Fonte: `agent-confidence-discipline.md`_

# Disciplina agenti per massimizzare la confidenza

Regola canonica: [../../Xot/docs/wiki/concepts/agent-confidence-discipline.md](../../Xot/docs/wiki/concepts/agent-confidence-discipline.md).

Sintesi: verificare prima di affermare; riprodurre prima di correggere; documentare prove, dubbi e rischio residuo; rispondere in italiano sintetico.

## Massima confidenza agente

_Fonte: `agent-confidence-protocol.md`_

# Massima confidenza agente

### `wiki/topics/architecture-rules.md` — Topic architecture-rules


# Topic architecture-rules

Sintesi automatica di 3 documenti (chiave `architecture-rules`).

## Architectural Rules & Guidelines

_Fonte: `architecture/architecture-rules.md`_

# Architectural Rules & Guidelines

This module adheres to the **Laraxot Architecture** and **Super Cow Methodology**.

For strict coding standards, Filament extension rules, and PHPStan guidelines, please refer to the central documentation in the **Xot Module**:

-   [Super Cow Methodology](../../Xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../Xot/docs/php_quality_guide.md)
-   [Filament Extension Rules](../../Xot/docs/filament-extension-rules-2.md)
-   [Super Cow Methodology](../../xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../xot/docs/php_quality_guide.md)

### `wiki/topics/architecture.md` — Topic architecture


# Topic architecture

Sintesi automatica di 6 documenti (chiave `architecture`).

## Architectural Rules & Guidelines

_Fonte: `architecture/architecture.md`_

# Architectural Rules & Guidelines

This module adheres to the **Laraxot Architecture** and **Super Cow Methodology**.

For strict coding standards, Filament extension rules, and PHPStan guidelines, please refer to the central documentation in the **Xot Module**:

- [Super Cow Methodology](../../xot/docs/super-cow-methodology.md)
- [PHP Quality Guide](../../xot/docs/php-quality-guide.md)
- [Filament Extension Rules](../../xot/docs/filament-extension-rules.md)

**Key Principles:**

### `wiki/topics/auth-components.md` — Topic auth-components


# Topic auth-components

Sintesi automatica di 4 documenti (chiave `auth-components`).

## Best Practices per i Componenti di Autenticazione

_Fonte: `auth-components-best-practices-1.md`_

# Best Practices per i Componenti di Autenticazione

## Collegamenti correlati
- [README modulo User](./README.md)
- [Best Practices Chiavi di Traduzione](/laravel/modules/lang/docs/translation-keys-best-practices-2.md)
- [Utilizzo di Laravel Localization](/laravel/modules/lang/docs/laravel-localization-usage-2.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)

## Panoramica

Questo documento descrive le best practices per implementare e utilizzare i componenti di autenticazione , con particolare attenzione alle chiavi di traduzione e alla struttura dei componenti.

### `wiki/topics/auth-login.md` — Topic auth-login


# Topic auth-login

Sintesi automatica di 3 documenti (chiave `auth-login`).

## Implementazione Corretta della Pagina di Login

_Fonte: `auth-login-implementation-2.md`_

# Implementazione Corretta della Pagina di Login 

## Collegamenti correlati
- [Documentazione centrale](/docs/readme.md)
- [Collegamenti documentazione](/docs/collegamenti-documentazione.md)
- [Regole Traduzioni](/laravel/modules/lang/docs/translation-keys-rules-2.md)
- [Implementazione Auth Pages](/laravel/Modules/User/docs/auth-pages-implementation-3.md)
- [Volt Folio Auth](/laravel/modules/user/docs/volt-folio-auth-implementation-3.md)
- [Documentazione centrale](/docs/README.md)
- [Collegamenti documentazione](/docs/collegamenti-documentazione.md)
- [Regole Traduzioni](/laravel/modules/lang/docs/translation-keys-ru

### `wiki/topics/auth-logout.md` — Topic auth-logout


# Topic auth-logout

Sintesi automatica di 7 documenti (chiave `auth-logout`).

## Implementazione Corretta di logout.blade.php

_Fonte: `auth-logout-blade-1.md`_

# Implementazione Corretta di logout.blade.php

## Collegamenti correlati
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-2.md)
- [Struttura moduli](../../../../docs/architecture/modules-structure.md)
- [Logout Page Fix](./logout-page-fix-2.md)

## Posizione Corretta

### `wiki/topics/auth-pages.md` — Topic auth-pages


# Topic auth-pages

Sintesi automatica di 5 documenti (chiave `auth-pages`).

## Implementazione Corretta delle Pagine Auth

_Fonte: `auth-pages-implementation-1-1.md`_

# Implementazione Corretta delle Pagine Auth 

## Collegamenti correlati
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions.md)
- [Volt Errors](./volt-errors.md)
- [Volt Folio Logout](./volt-folio-logout.md)
- [Volt Logout Action](./volt-logout-action.md)


### `wiki/topics/avatar-implementation.md` — Topic avatar-implementation


# Topic avatar-implementation

Sintesi automatica di 4 documenti (chiave `avatar-implementation`).

## Implementazione degli Avatar

_Fonte: `avatar-implementation-1-1.md`_

# Implementazione degli Avatar 

## Collegamenti correlati
- [README modulo User](./README.md)
- [Implementazione Header con Selettore Lingua](/laravel/Modules/User/docs/header-language-selector-with-flags-3.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)

## Panoramica

Questo documento descrive l'implementazione degli avatar utente , con particolare attenzione agli avatar SVG predefiniti utilizzati quando l'utente non ha un'immagine del profilo personalizzata.


### `wiki/topics/base-classes.md` — Topic base-classes


# Topic base-classes

Sintesi automatica di 7 documenti (chiave `base-classes`).

## Correzione Estensioni Classi Base - Modulo User

_Fonte: `bug-tracking/base-classes-corrections.md`_

# Correzione Estensioni Classi Base - Modulo User

**Data:** 15 Ottobre 2025  
**Tipo:** Bug Fix / Refactoring Architetturale  
**Severità:** Alta  
**Stato:** ✅ Completato

## Problema Identificato

Diversi modelli nel modulo User estendevano direttamente `Illuminate\Database\Eloquent\Model` invece delle classi base appropriate del modulo, violando il principio architetturale fondamentale di Laraxot.


### `wiki/topics/baseuser-refactoring.md` — Topic baseuser-refactoring


# Topic baseuser-refactoring

Sintesi automatica di 5 documenti (chiave `baseuser-refactoring`).

## BaseUser Refactoring - Completato

_Fonte: `baseuser-refactoring-completed-1.md`_

# BaseUser Refactoring - Completato

**Data**: 15 Ottobre 2025  
**File**: `Modules/User/app/Models/BaseUser.php`  
**Stato**: ✅ COMPLETATO

## Refactoring Eseguito

Il refactoring del modello `BaseUser` è stato completato con successo, rimuovendo tutti i metodi duplicati che erano già forniti dal trait `Spatie\Permission\Traits\HasRoles`.

### Risultati

### `wiki/topics/bottlenecks.md` — Topic bottlenecks


# Topic bottlenecks

Sintesi automatica di 3 documenti (chiave `bottlenecks`).

## Colli di Bottiglia e Soluzioni - Modulo User

_Fonte: `bottlenecks.md`_

# Colli di Bottiglia e Soluzioni - Modulo User

## Panoramica
Questo documento identifica i principali colli di bottiglia nel modulo User e fornisce soluzioni dettagliate passo per passo per risolverli.
## 1. Autenticazione Inefficiente
### Problema
Il modulo User utilizza un processo di autenticazione non ottimizzato, con troppi controlli e query al database durante ogni richiesta autenticata.
### Impatto
- Aumento del tempo di risposta per ogni richiesta autenticata
- Carico eccessivo sul database
- Scalabilità limitata con l'aumento degli utenti

### `wiki/topics/business-logic.md` — Topic business-logic


# Topic business-logic

Sintesi automatica di 6 documenti (chiave `business-logic`).

## business-logic-analysis-1

_Fonte: `business-logic-analysis-1.md`_

See canonical documentation: ../../../Themes/docs/shared-components/BUSINESS_LOGIC_ANALYSIS-Modules.md

## User Module - Business Logic Analysis

_Fonte: `business-logic-analysis-2.md`_

# User Module - Business Logic Analysis

## Overview
The User module provides comprehensive user management, authentication, authorization, and team-based access control for the Quaeris platform. It serves as the foundation for all user-related operations across the entire application.


### `wiki/topics/case-sensitivity.md` — Topic case-sensitivity


# Topic case-sensitivity

Sintesi automatica di 4 documenti (chiave `case-sensitivity`).

## Case Sensitivity Rules - User Module

_Fonte: `best-practices/case-sensitivity-rules.md`_

# Case Sensitivity Rules - User Module

## Problema / Problem

**NON possono esistere file con lo stesso nome che differiscono solo per maiuscole/minuscole nella stessa directory.**

Riferimento completo: [Xot Module Case Sensitivity Rules](../../Xot/docs/case-sensitivity-rules.md)
Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)

## File/Directory Rimossi da User Module


### `wiki/topics/code-quality.md` — Topic code-quality


# Topic code-quality

Sintesi automatica di 5 documenti (chiave `code-quality`).

## Code Quality Improvement Report — User

_Fonte: `code-quality-improvement-report.md`_

# Code Quality Improvement Report — User

> Baseline statica riproducibile per orientare il miglioramento. I conteggi sono segnali, non sostituiscono PHPStan, Pest o la review del flusso reale.

## Baseline

| Indicatore | Valore |
|---|---:|
| File PHP applicativi/database/route | 785 |
| File di test PHP | 148 |
| Rapporto test/file PHP | 18% |

### `wiki/topics/component-verification.md` — Topic component-verification


# Topic component-verification

Sintesi automatica di 3 documenti (chiave `component-verification`).

## Regole per la Verifica dei Componenti Blade

_Fonte: `best-practices/component-verification-rules.md`_

# Regole per la Verifica dei Componenti Blade

## ERRORE CRITICO DA NON RIPETERE MAI

**NON usare mai componenti Blade senza verificarne l'esistenza nella documentazione ufficiale!**

### Errore Commesso

```blade
{{-- ERRORE GRAVE: Componenti inesistenti --}}
<x-filament::layouts.card>

### `wiki/topics/conflict-resolution.md` — Topic conflict-resolution


# Topic conflict-resolution

Sintesi automatica di 8 documenti (chiave `conflict-resolution`).

## Risoluzione Conflitti PasswordResetWidget.php

_Fonte: `conflict-resolution-passwordresetwidget-1.md`_

# Risoluzione Conflitti PasswordResetWidget.php

## Contesto del Conflitto
**File**: `/var/www/html/ptvx/laravel/Modules/User/app/Filament/Widgets/Auth/PasswordResetWidget.php`
**Linee**: 47-63
**Tipo**: Conflitto di funzionalità (aggiunta componente error display)

## Descrizione del Conflitto
Il conflitto riguarda l'aggiunta di un componente per la visualizzazione degli errori nel form di reset password:

### Versione HEAD

### `wiki/topics/console-commands.md` — Topic console-commands


# Topic console-commands

Sintesi automatica di 10 documenti (chiave `console-commands`).

## Filosofia dei Comandi Console - Modulo User

_Fonte: `commands/console-commands-philosophy-1-1.md`_

# Filosofia dei Comandi Console - Modulo User

## Principi Fondamentali

### 1. Interattività Moderna
I comandi console del modulo User seguono la filosofia di **interattività moderna** utilizzando esclusivamente Laravel Prompts invece delle API legacy di Laravel Console.

**✅ CORRETTO**:
```php
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;

### `wiki/topics/contracts-and.md` — Topic contracts-and


# Topic contracts-and

Sintesi automatica di 4 documenti (chiave `contracts-and`).

## contracts-and-lang-backup-archival-30.deprecated

_Fonte: `wiki/decisions/contracts-and-lang-backup-archival-30.deprecated.md`_

> Questo file è stato rinominato in [contracts-and-lang-backup-archival-2.deprecated.md](contracts-and-lang-backup-archival-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Archiviazione Contracts orfani e backup lang (ponytail audit)

_Fonte: `wiki/decisions/contracts-and-lang-backup-archival-30.md`_

# Archiviazione Contracts orfani e backup lang (ponytail audit)

## Contesto

L'audit ponytail (`docs/audit/ponytail-audit.md`) segnalava in `Modules/User/`:

### `wiki/topics/copilot-redundancy.md` — Topic copilot-redundancy


# Topic copilot-redundancy

Sintesi automatica di 4 documenti (chiave `copilot-redundancy`).

## copilot-redundancy-audit-1

_Fonte: `copilot-redundancy-audit-1.md`_

> Questo file è stato rinominato in [copilot-redundancy-audit-1.md](copilot-redundancy-audit-1.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## copilot-redundancy-audit-25

_Fonte: `copilot-redundancy-audit-25.md`_

Copilot Redundancy Audit — 2026-05-25

Sintesi
- Scansione preliminare mostra ridondanze documentali e duplicatione di traduzioni e config (es.: README.md, index.md, validation.php).


### `wiki/topics/cross-database.md` — Topic cross-database


# Topic cross-database

Sintesi automatica di 3 documenti (chiave `cross-database`).

## Cross Database Relations Issue - belongsToManyX SQLite Problem

_Fonte: `cross-database-relations-issue-1.md`_

# Cross Database Relations Issue - belongsToManyX SQLite Problem

## Problema Identificato

**Errore**: `SQLSTATE[HY000]: General error: 1 no such table: Quaeris_data.customer_user`

**Contesto**: Il trait `HasTenants` utilizza `belongsToManyX` per creare relazioni cross-database tra User (Quaeris_user) e Customer (Quaeris_data).

## Analisi del Trait HasTenants

### Codice Problematico

### `wiki/topics/directory-structure.md` — Topic directory-structure


# Topic directory-structure

Sintesi automatica di 3 documenti (chiave `directory-structure`).

## directory_structure_checklist - User

_Fonte: `directory-structure-checklist-1.md`_

# directory_structure_checklist - User

## Overview

Documentazione per directory_structure_checklist nel modulo User.

## Dettagli

[Da completare]

## Collegamenti

### `wiki/topics/duplicate-methods.md` — Topic duplicate-methods


# Topic duplicate-methods

Sintesi automatica di 4 documenti (chiave `duplicate-methods`).

## Analisi Metodi Duplicati - Modulo User

_Fonte: `duplicate-methods-analysis.md`_

# Analisi Metodi Duplicati - Modulo User

**Data Generazione**: 2025-10-15 06:41:17
**Totale Gruppi di Duplicati**: 

## Sommario Esecutivo

Questo documento identifica i metodi duplicati nel modulo **User** che potrebbero beneficiare di refactoring.

### Statistiche


### `wiki/topics/filament-4.md` — Topic filament-4


# Topic filament-4

Sintesi automatica di 3 documenti (chiave `filament-4`).

## Filament 4: Namespace Actions - Filosofia Laraxot

_Fonte: `filament-4-actions-namespace.md`_

# Filament 4: Namespace Actions - Filosofia Laraxot

**Data Creazione**: 2025-01-22
**Status**: Documentazione Completa
**Versione**: 1.0.0

## 🏛️ Comandamento Sacro: Namespace Filament 4

### Principio Fondamentale

**"In Filament 4, tutte le Actions sono in `Filament\Actions\*`, NON in `Filament\Tables\Actions\*`"**

### `wiki/topics/filament-4x.md` — Topic filament-4x


# Topic filament-4x

Sintesi automatica di 5 documenti (chiave `filament-4x`).

## Compatibilità Filament 4.x - Modulo User

_Fonte: `filament-4x-compatibility-1-1.md`_

# Compatibilità Filament 4.x - Modulo User

**Data**: 2025-01-27  
**Status**: ✅ COMPLETATO  
**Versione Filament**: 4.0.17  

## 🔧 Correzioni Implementate

### 1. ChangeTypeCommand
**Problema**: Operazione binaria non valida tra string e Htmlable|string  
**Soluzione**: Cast esplicito per gestire Htmlable

### `wiki/topics/filament-namespace.md` — Topic filament-namespace


# Topic filament-namespace

Sintesi automatica di 4 documenti (chiave `filament-namespace`).

## Regole per i Namespace Filament

_Fonte: `best-practices/filament-namespace-rules.md`_

# Regole per i Namespace Filament

## Regola 1: Namespace Modulare
- Il namespace dei componenti Filament deve sempre essere `Modules\{ModuleName}\Filament`
- NON includere mai `App` nel namespace, anche se i file sono fisicamente in `app/Filament`
- Esempio corretto: `namespace Modules\User\Filament\Widgets\Auth;`
- Esempio errato: `namespace Modules\User\App\Filament\Widgets\Auth;`
## Regola 2: Struttura Directory
- I file possono essere fisicamente in `app/Filament`
- Ma il namespace deve sempre essere `Modules\{ModuleName}\Filament`
- Questo mantiene la coerenza con l'architettura modulare

### `wiki/topics/filament-relation.md` — Topic filament-relation


# Topic filament-relation

Sintesi automatica di 3 documenti (chiave `filament-relation`).

## Filament Relation Managers nel Modulo User

_Fonte: `filament-relation-managers-1-1.md`_

# Filament Relation Managers nel Modulo User

## Struttura dei Relation Managers

I Relation Managers nel modulo User devono seguire una struttura specifica che estende le classi base di Xot.

### TeamsRelationManager

Gestisce la relazione tra Users e Teams.

```php

### `wiki/topics/filament-resources.md` — Topic filament-resources


# Topic filament-resources

Sintesi automatica di 8 documenti (chiave `filament-resources`).

## Filament Resources Coverage Analysis - Modulo User

_Fonte: `bmad/filament-resources-coverage-analysis.md`_

# Filament Resources Coverage Analysis - Modulo User

## Data: 2025-01-02

## Scopo
Analizzare la copertura completa delle Filament Resources per tutti i modelli del modulo User, identificare cosa manca e decidere cosa implementare seguendo la filosofia DRY + KISS.

## Filosofia e Business Logic

### Principi Fondamentali
1. **DRY (Don't Repeat Yourself)**: Non duplicare logica già presente

### `wiki/topics/filament-table.md` — Topic filament-table


# Topic filament-table

Sintesi automatica di 5 documenti (chiave `filament-table`).

## Convenzione Metodo getTableColumns per Filament Table

_Fonte: `filament/archive/filament-table-columns-2.md`_

# Convenzione Metodo getTableColumns per Filament Table

## Motivazione della Modifica
Per uniformarsi allo standard Filament e migliorare la coerenza del codice, il metodo precedentemente chiamato `getListTableColumns` è stato rinominato in `getTableColumns` su tutte le risorse Filament del modulo User.

- **Vecchio nome:** `getListTableColumns`
- **Nuovo nome:** `getTableColumns`

Questa modifica:
- Migliora la leggibilità e la manutenibilità
- Facilita l'upgrade di Filament e l'adozione di best practice

### `wiki/topics/filament-widget.md` — Topic filament-widget


# Topic filament-widget

Sintesi automatica di 3 documenti (chiave `filament-widget`).

## RegisterWidget KISS persist

_Fonte: `llm-wiki/concepts/filament-widget-no-validate-form.md`_

# RegisterWidget KISS persist

`$data = $this->form->getState();` then `XotData::make()->getUserClass()::create($data)`.

No `validateForm()`. No thin Action wrapper. Password hash in `UserForm` dehydrate.

## Persistenza register — `::create($data)`

_Fonte: `wiki/concepts/filament-widget-linear-crud-model-create.md`_

# Persistenza register — `::create($data)`

### `wiki/topics/fullcalendar-scheduler.md` — Topic fullcalendar-scheduler


# Topic fullcalendar-scheduler

Sintesi automatica di 13 documenti (chiave `fullcalendar-scheduler`).

## FullCalendar Scheduler - Documentazione Completa

_Fonte: `fullcalendar-scheduler-documentation-summary-2.md`_

# FullCalendar Scheduler - Documentazione Completa

## Panoramica

Questa documentazione fornisce una guida completa per la gestione delle licenze FullCalendar Scheduler nel progetto Quaeris, basata sulla ricerca approfondita della documentazione ufficiale e dei problemi comuni riscontrati nella community.

## Documenti Disponibili

### 📚 Documentazione Principale

#### 1. [FullCalendar Scheduler Troubleshooting](./fullcalendar-scheduler-license-troubleshooting.md)

### `wiki/topics/gdpr-compliance.md` — Topic gdpr-compliance


# Topic gdpr-compliance

Sintesi automatica di 3 documenti (chiave `gdpr-compliance`).

## GDPR Compliance - User Registration Module

_Fonte: `gdpr-compliance-complete.md`_

# GDPR Compliance - User Registration Module

## Overview

Questo documento definisce i requisiti GDPR (General Data Protection Regulation - Regolamento UE 2016/679) per il sistema di registrazione utenti nel modulo User di LaravelPizza.com, implementato secondo D.Lgs. 101/2018 (adeguamento italiano al GDPR) e le best practices AGID.

## Legal Framework

### 1. GDPR 2016/679 (General Data Protection Regulation)

Il Regolamento (UE) 2016/679 del Parlamento europeo e del Consiglio del 27 aprile 2016 è la normativa europea sulla protezione dei dati personali.

### `wiki/topics/generic-user.md` — Topic generic-user


# Topic generic-user

Sintesi automatica di 3 documenti (chiave `generic-user`).

## Generic User Moderation Strategy in User Module

_Fonte: `generic-user-moderation-strategy-1-1.md`_

# Generic User Moderation Strategy in User Module

## Overview
This document outlines a comprehensive strategy for implementing a generic moderation system within the `User` module. The approach is designed to be flexible and reusable across different projects, accommodating various user types without specific references to roles such as 'dentist' or 'patient'. The goal is to create a unified moderation framework that complements the unique registration wizard used for all user types.

## Analysis and Rationale

### Understanding User Types as Variants of User
- **User as a Base Entity**: In this system, a

### `wiki/topics/get-login.md` — Topic get-login


# Topic get-login

Sintesi automatica di 3 documenti (chiave `get-login`).

## GetLoginHistoryAction

_Fonte: `contracts/get-login-history-action.md`_

# GetLoginHistoryAction

Serie storica degli accessi, bucket per giorno o per mese, letta da `authentication_logs`. Codice: `app/Actions/Login/GetLoginHistoryAction.php:23-113`.

## Input

- `?CarbonImmutable $since`: inizio della serie; se nullo parte dal giorno del primo log (righe 46-55).
- `string $granularity`: `day` o `month` (riga 36).

## Output


### `wiki/topics/get-provider.md` — Topic get-provider


# Topic get-provider

Sintesi automatica di 4 documenti (chiave `get-provider`).

## GetProviderButtonsAction

_Fonte: `contracts/get-provider-buttons-action.md`_

# GetProviderButtonsAction

Dovrebbe restituire i pulsanti di login per i provider. Oggi restituisce sempre una lista vuota. Codice: `app/Actions/Socialite/GetProviderButtonsAction.php`.

## Input

- Nessuno.

## Output

- `array<int, never>`: sempre `[]`.

### `wiki/topics/git-conflicts.md` — Topic git-conflicts


# Topic git-conflicts

Sintesi automatica di 10 documenti (chiave `git-conflicts`).

## Git Conflicts Resolution - 16 Dicembre 2025

_Fonte: `bugfix/git-conflicts-resolution.md`_

# Git Conflicts Resolution - 16 Dicembre 2025

**Data Fix**: 16 Dicembre 2025
**Status**: ✅ Tutti i conflitti risolti
**Metodologia**: Fix Forward (NEVER go back to previous versions)

---

## 🐛 Problema Identificato

**Issue**: Multiple Git merge conflicts presenti nel codebase

### `wiki/topics/git-merge.md` — Topic git-merge


# Topic git-merge

Sintesi automatica di 5 documenti (chiave `git-merge`).

## git-merge-conflict-inventory-1

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory-1.md`_

> Questo file è stato rinominato in [git-merge-conflict-inventory-1.md](git-merge-conflict-inventory-1.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## git-merge-conflict-inventory-28.deprecated

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory-28.deprecated.md`_

> Questo file è stato rinominato in [git-merge-conflict-inventory-2.deprecated.md](git-merge-conflict-inventory-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Git Conflict Inventory

_Fonte: `wiki/troubleshooting/git-merge-conflict-inventory-28.md`_

### `wiki/topics/gits-resolution.md` — Topic gits-resolution


# Topic gits-resolution

Sintesi automatica di 3 documenti (chiave `gits-resolution`).

## gits-resolution

_Fonte: `bugfix/gits-resolution.md`_

See canonical documentation: ../../../../Themes/docs/shared-components/git-conflicts-resolution.md

## Risoluzione Conflitti Git - Modulo User ([DATE])

_Fonte: `gits-resolution-06cb77.md`_

# Risoluzione Conflitti Git - Modulo User ([DATE])

## Data
[DATE]


### `wiki/topics/hasteams-currentteam.md` — Topic hasteams-currentteam


# Topic hasteams-currentteam

Sintesi automatica di 4 documenti (chiave `hasteams-currentteam`).

## Choice of currentTeam() Method in HasTeams Trait

_Fonte: `hasteams-currentteam-method-choice-2.md`_

# Choice of currentTeam() Method in HasTeams Trait

## Analysis and Decision

In the `HasTeams.php` trait, there are two definitions of the `currentTeam()` method. After analysis, the following decision was made:

- **Chosen Method**: The second definition (lines 223-243) was retained as the active method. This version is more comprehensive, including logic for default team switching if no team is selected and handling edge cases like empty team lists. It also uses `TeamContract` for return type hinting, which aligns with the project's preference for abstraction via contracts/interfaces.



### `wiki/topics/hasteams-trait.md` — Topic hasteams-trait


# Topic hasteams-trait

Sintesi automatica di 7 documenti (chiave `hasteams-trait`).

## HasTeams Trait Analysis

_Fonte: `hasteams-trait-analysis.md`_

# HasTeams Trait Analysis

## Overview
This document analyzes the `HasTeams` trait located in `Modules/User/app/Models/Traits/HasTeams.php`. The purpose is to review duplicate methods within the trait, determine which versions to retain, and justify the decisions based on functionality, usage, and project conventions.

## Duplicate Methods Analysis

### 1. `addTeamMember` and `addTeamMemberDuplicate`
- **Method Signature Comparison**:
  - `addTeamMember($user, $role = null)`: Original method for adding a user to a team with an optional role.
  - `addTeamMemberDuplicate($user, $role = null)`: Duplicate method with identical functionality.

### `wiki/topics/header-language.md` — Topic header-language


# Topic header-language

Sintesi automatica di 8 documenti (chiave `header-language`).

## Implementazione del Selettore di Lingua e Avatar Utente nell'Header

_Fonte: `header-language-avatar-implementation-1.md`_

# Implementazione del Selettore di Lingua e Avatar Utente nell'Header

## Collegamenti correlati
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-2.md)
- [Volt Folio Logout](./volt-folio-logout-2.md)
- [Implementazione Logout](./logout-blade-implementation-2.md)

## Panoramica

Questo documento descrive come implementare nell'header di <nome progetto>:

### `wiki/topics/lang-link.md` — Topic lang-link


# Topic lang-link

Sintesi automatica di 3 documenti (chiave `lang-link`).

## Collegamento alle Traduzioni del Modulo User

_Fonte: `lang-link-1.md`_

# Collegamento alle Traduzioni del Modulo User

Questo modulo utilizza le traduzioni centralizzate nella cartella [Lang](../../Lang/docs/).

Consulta la documentazione delle traduzioni:
- [Introduzione alle Traduzioni](../../Lang/docs/introduction.md)
- [Struttura delle Traduzioni](../../Lang/docs/structure.md)
- [Gestione dei File di Lingua](../../lang/docs/module_lang.md)

## Collegamento Bidirezionale


### `wiki/topics/laraxot-migration.md` — Topic laraxot-migration


# Topic laraxot-migration

Sintesi automatica di 3 documenti (chiave `laraxot-migration`).

## Filosofia, Religione e Politica di Laraxot: Regole di Migrazione

_Fonte: `laraxot-migration-philosophy.md`_

# Filosofia, Religione e Politica di Laraxot: Regole di Migrazione

## Regola Fondamentale: Una Tabella = Una Migration per Modulo

La filosofia Laraxot stabilisce con chiarezza che **non devono mai esistere più migration files per la stessa tabella all'interno dello stesso modulo**. Questo principio è fondamentale per mantenere:

- **Ordine architettonico**: Ogni tabella ha una sola fonte di verità per la sua struttura
- **Chiarezza evolutiva**: La storia della tabella è raccontata in un unico file
- **Facilità di manutenzione**: Nessun rischio di conflitti o duplicazioni
- **Coerenza d

### `wiki/topics/legacy-roadmap.md` — Topic legacy-roadmap


# Topic legacy-roadmap

Sintesi automatica di 7 documenti (chiave `legacy-roadmap`).

## User Module - Roadmap, Issues & Optimization

_Fonte: `roadmap/legacy/legacy-roadmap-and-issues.md`_

# User Module - Roadmap, Issues & Optimization

**Modulo**: User (Authentication, Authorization, Profiles)  
**Data Analisi**: 1 Ottobre 2025  
**Maintainer**: Team FixCity  
**Status PHPStan**: ⚠️ 95 errori (Level 9)

---

## 📊 STATO ATTUALE


### `wiki/topics/livewire-widget.md` — Topic livewire-widget


# Topic livewire-widget

Sintesi automatica di 21 documenti (chiave `livewire-widget`).

## `AdminPanelProvider`: ogni hook del chrome → il suo widget

_Fonte: `bmad/livewire-widget-admin-panel-provider.md`_

# `AdminPanelProvider`: ogni hook del chrome → il suo widget

**Solo documentazione.** Questo file è la mappa canonica del punto in cui il chrome del panel User
passa da alias Livewire HTTP a widget Filament. File di riferimento:
`Modules/User/app/Providers/Filament/AdminPanelProvider.php` (42 righe, verificato 2026-09-21).

## Stato verificato (2026-09-21)

Il provider contiene **solo tre `FilamentView::registerRenderHook` su FQCN** e nessun altro codice
attivo oltre a `parent::panel($panel)` (r. 23). Zero alias stringa nel chrome.


### `wiki/topics/login-widget.md` — Topic login-widget


# Topic login-widget

Sintesi automatica di 15 documenti (chiave `login-widget`).

## Analisi Dettagliata di LoginWidget

_Fonte: `login-widget-analysis.md`_

# Analisi Dettagliata di LoginWidget

**File**: `Modules/User/app/Filament/Widgets/LoginWidget.php`
**Namespace**: `Modules\User\Filament\Widgets`

## Estensione e Imports
- Estende `XotBaseWidget`.
- Import attuali:
  - `Filament\Forms\Components\TextInput`
  - `Filament\Forms\Components\Checkbox`
  - `Filament\Forms\Components\Actions\Button`

### `wiki/topics/logout-blade.md` — Topic logout-blade


# Topic logout-blade

Sintesi automatica di 21 documenti (chiave `logout-blade`).

## Analisi del File logout.blade.php

_Fonte: `logout-blade-analysis-2.md`_

# Analisi del File logout.blade.php

## Collegamenti correlati
- [README modulo User](./README.md)
- [Volt Folio Logout](./volt-folio-logout-2.md)
- [Auth Pages Implementation](./auth-pages-implementation.md)
- [Logout Blade Implementation](./logout-blade-implementation-2.md)
- [Convenzioni Path](./path-conventions-2.md)
- [Analisi dell'Errore di Implementazione](./volt-blade-implementation-error-3.md)

## Panoramica

### `wiki/topics/logout-error.md` — Topic logout-error


# Topic logout-error

Sintesi automatica di 3 documenti (chiave `logout-error`).

## logout-error-analysis-2

_Fonte: `logout-error-analysis-2.md`_

- [Best Practices di Sicurezza](./SECURITY_BEST_PRACTICES.md)
- [Gestione Sessione](./session-management.md)
- [Documentazione Blade](https://laravel.com/docs/10.x/blade) 
---
module: theme
topic: logout_error_analysis
canonical: ../../../Themes/docs/shared-components/logout-error-analysis-2.md
---

See canonical documentation: ../../../Themes/docs/shared-components/logout-error-analysis-2.md


### `wiki/topics/logout-event.md` — Topic logout-event


# Topic logout-event

Sintesi automatica di 3 documenti (chiave `logout-event`).

## Errore Identificato

_Fonte: `logout-event-error-2.md`_

- [Documentazione centrale](/docs/README.md)
- [Collegamenti documentazione](/docs/collegamenti-documentazione.md)
- [Implementazione Auth Pages](auth-pages-implementation-3.md)
- [Implementazione Logout](logout-blade-implementation-3.md)
- [Analisi Errore Logout](logout-blade-error-analysis-2.md)
- [Widget Filament Corretto](logout-filament-widget-corrected-4.md)
- [Documentazione Auth Tema One](/laravel/Themes/One/docs/AUTH.md)

## Errore Identificato

L'implementazione attuale del file `/var/www/html/saluteora/laravel/Themes/One/resources/views/pages/auth/logout.blade.php` causa un errore quando viene eseguito il logout:

### `wiki/topics/logout-filament.md` — Topic logout-filament


# Topic logout-filament

Sintesi automatica di 7 documenti (chiave `logout-filament`).

## Introduzione

_Fonte: `logout-filament-widget-3.md`_

- [Documentazione centrale](/docs/README.md)
- [Collegamenti documentazione](/docs/collegamenti-documentazione.md)
- [Implementazione Auth Pages](auth-pages-implementation-3.md)
- [Implementazione Logout](logout-blade-implementation-3.md)
- [Analisi Errore Logout](logout-implementation-error-4.md)
- [Struttura Widget](widgets-structure-2.md)
- [Documentazione Auth Tema One](/laravel/Themes/One/docs/AUTH.md)

## Introduzione

Questo documento descrive l'implementazione del logout utilizzando un widget Filament, un approccio che offre maggiore flessibilità e riutilizzabilità rispetto a un'implementazione Volt personalizzata. Questo approccio è part

### `wiki/topics/logout-implementation.md` — Topic logout-implementation


# Topic logout-implementation

Sintesi automatica di 13 documenti (chiave `logout-implementation`).

## Best Practices per l'Implementazione del Logout

_Fonte: `best-practices/logout-implementation-best-practices.md`_

# Best Practices per l'Implementazione del Logout

## Collegamenti correlati
- [README modulo User](./README.md)
- [Best Practices Componenti di Autenticazione](./auth-components-best-practices.md)
- [Utilizzo di Laravel Localization](/laravel/Modules/Lang/docs/laravel-localization-usage-2.md)
- [README modulo User](./README.md)
- [Best Practices Componenti di Autenticazione](./auth-components-best-practices.md)
- [Utilizzo di Laravel Localization](/laravel/Modules/Lang/docs/laravel-localization-usage-2.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.

### `wiki/topics/logout-page.md` — Topic logout-page


# Topic logout-page

Sintesi automatica di 5 documenti (chiave `logout-page`).

## Correzione Logout Page nel Theme TwentyOne

_Fonte: `logout-page-fix.md`_

# Correzione Logout Page nel Theme TwentyOne

## Errore Riscontrato
Il file `resources/views/pages/auth/logout.blade.php`:
- Contiene la definizione di una classe `LogoutPage` senza il tag PHP `<?php`.
- Usa `@endvolt` e `@livewire('auth.logout')`, ma non è un componente Volt né un Livewire registrato.
- Genera errori 500 (`Internal Server Error`) e `VoltDirectiveMissingException`.

## Causa
Mix errato di:
- Volt anonymous component (senza `@volt` e senza PHP tags)

### `wiki/topics/migration-consolidation.md` — Topic migration-consolidation


# Topic migration-consolidation

Sintesi automatica di 3 documenti (chiave `migration-consolidation`).

## migration-consolidation-philosophy

_Fonte: `migration-consolidation-philosophy.md`_

See canonical documentation: ../../../Themes/docs/shared-components/migration-consolidation-philosophy.md

## migration-consolidation-plan

_Fonte: `migration-consolidation-plan.md`_

See canonical documentation: ../../../Themes/docs/shared-components/migration-consolidation-plan.md

## Migration Consolidation Strategy - User Module

_Fonte: `migration-consolidation.md`_

### `wiki/topics/migration-philosophy.md` — Topic migration-philosophy


# Topic migration-philosophy

Sintesi automatica di 5 documenti (chiave `migration-philosophy`).

## migration-philosophy-internal-analysis

_Fonte: `migration-philosophy-internal-analysis.md`_

See canonical documentation: ../../../Themes/docs/shared-components/migration-philosophy-internal-analysis.md

## Laraxot Migration Philosophy & Strategy

_Fonte: `migration-philosophy-strategy.md`_

# Laraxot Migration Philosophy & Strategy

## Core Principles

### 1. ONE Migration Per Table Rule

### `wiki/topics/migration-teams.md` — Topic migration-teams


# Topic migration-teams

Sintesi automatica di 3 documenti (chiave `migration-teams`).

## Teams — `owner_id`: fold-in fix

_Fonte: `migration-teams-owner-id-fix.md`_

# Teams — `owner_id`: fold-in fix

## Cosa c'era di sbagliato

`Modules/User/database/migrations/2025_05_16_221811_add_owner_id_to_teams_table.php`
violava la [religione XotBaseMigration](../../Xot/docs/wiki/concepts/xotbase-migration-religion.md):
una migrazione separata per aggiungere una colonna a una tabella che ha già il suo
`create_teams_table.php`. Inoltre il codice stesso conteneva un bug funzionale:
`foreignIdFor(Team::class, 'owner_id')` — riferiva `Team::class` invece di `User::class`
per una colonna che semanticamente rappresenta il proprietario (`User`) del team
(vedi `@property User|null $owner` in `Modules/Us

### `wiki/topics/migration-violations.md` — Topic migration-violations


# Topic migration-violations

Sintesi automatica di 4 documenti (chiave `migration-violations`).

## Migration Violations Analysis - User Module

_Fonte: `migration-violations-analysis.md`_

# Migration Violations Analysis - User Module

## Executive Summary

The User module contains multiple violations of the Laraxot migration philosophy "ONE TABLE, ONE MIGRATION, ONE MODULE". This document catalogues all duplicate migrations and their specific violations.

## Duplicate Migration Analysis

### 1. Devices Table Violations
**Files:**
- `2023_01_01_000000_create_devices_table.php`

### `wiki/topics/model-inheritance.md` — Topic model-inheritance


# Topic model-inheritance

Sintesi automatica di 11 documenti (chiave `model-inheritance`).

## Regole di Ereditarietà dei Modelli - Modulo User

_Fonte: `best-practices/model-inheritance-rules.md`_

# Regole di Ereditarietà dei Modelli - Modulo User

**Data**: 2025-10-15
**Contesto**: Refactoring per garantire la corretta gerarchia di ereditarietà dei modelli

## Regola Fondamentale

**NESSUN modello all'interno dei moduli deve estendere `Illuminate\Database\Eloquent\Model` direttamente.**

Tutti i modelli devono estendere una delle seguenti classi base:


### `wiki/topics/modelli-factory.md` — Topic modelli-factory


# Topic modelli-factory

Sintesi automatica di 3 documenti (chiave `modelli-factory`).

## modelli-factory-seeder-analisi-2

_Fonte: `modelli-factory-seeder-analisi-2.md`_

- [SaluteOra Module](../../SaluteOra/docs/modelli-factory-seeder-analisi-2.md)
- [Tenant Module](../../Tenant/docs/modelli-factory-seeder-analisi-2.md)
- [Notify Module](../../Notify/docs/modelli-factory-seeder-analisi-2.md)

*Ultimo aggiornamento: Gennaio 2025*
*Analisi completa di 35+ modelli attivi, sistema completo authentication/authorization*
---
module: theme
topic: modelli_factory_seeder_analisi
canonical: ../../../Themes/docs/shared-components/modelli_factory_seeder_analisi-Modules.md
---

### `wiki/topics/module-excellence.md` — Topic module-excellence


# Topic module-excellence

Sintesi automatica di 4 documenti (chiave `module-excellence`).

## Architecture: User module — stato attuale vs target

_Fonte: `bmad/module-excellence-architecture.md`_

# Architecture: User module — stato attuale vs target

updated: 2026-10-07
tags: [docs, user, bmad]
qmd: "architecture: user module   stato attuale vs target user"

# Architecture: User module: stato attuale vs target

Questo documento confronta lo stato verificato (2026-09-22, ricerca a 5
fork paralleli, sola lettura) con il target implicito dal PRD
[module-excellence-prd.md](./module-excellence-prd.md). Non propone un

### `wiki/topics/namespace-conventions.md` — Topic namespace-conventions


# Topic namespace-conventions

Sintesi automatica di 3 documenti (chiave `namespace-conventions`).

## Convenzioni di Namespace nel Modulo User

_Fonte: `best-practices/namespace-conventions.md`_

# Convenzioni di Namespace nel Modulo User

## Principi Fondamentali

### Regola d'Oro: Separazione Modulo vs Tema

**I widget e componenti del modulo User DEVONO sempre usare il namespace `user::`**

```php
// ✅ CORRETTO - Widget del modulo User
class PasswordResetWidget extends XotBaseWidget

### `wiki/topics/navigation-structure.md` — Topic navigation-structure


# Topic navigation-structure

Sintesi automatica di 3 documenti (chiave `navigation-structure`).

## Struttura Navigazione

_Fonte: `navigation-structure-1.md`_

# Struttura Navigazione

## Overview

La navigazione è composta da tre componenti principali:
1. Language Switcher
2. User Dropdown
3. Avatar

## Struttura File


### `wiki/topics/navigation-translations.md` — Topic navigation-translations


# Topic navigation-translations

Sintesi automatica di 5 documenti (chiave `navigation-translations`).

## navigation-translations-completion-roadmap

_Fonte: `navigation-translations-completion-roadmap.md`_

See canonical documentation: ../../../Themes/docs/shared-components/navigation-translations-completion-roadmap.md

## Navigation Translations Completion Roadmap - User Module

_Fonte: `navigation-translations-completion.md`_

# Navigation Translations Completion Roadmap - User Module

**Modulo**: User  
**Status**: 📝 **ROADMAP CREATA**


### `wiki/topics/oauth-cluster.md` — Topic oauth-cluster


# Topic oauth-cluster

Sintesi automatica di 6 documenti (chiave `oauth-cluster`).

## oauth-cluster-decision-making

_Fonte: `oauth-cluster-decision-making.md`_

See canonical documentation: ../../../Themes/docs/shared-components/oauth-cluster-decision-making.md

## oauth-cluster-error-analysis

_Fonte: `oauth-cluster-error-analysis.md`_

See canonical documentation: ../../../Themes/docs/shared-components/oauth-cluster-error-analysis.md

## oauth-cluster-implementation-summary

_Fonte: `oauth-cluster-implementation-summary.md`_

### `wiki/topics/optimization-analysis.md` — Topic optimization-analysis


# Topic optimization-analysis

Sintesi automatica di 3 documenti (chiave `optimization-analysis`).

## optimization-analysis-dry-kiss

_Fonte: `optimization-analysis-dry-kiss.md`_

See canonical documentation: ../../../Themes/docs/shared-components/optimization-analysis-dry-kiss.md

## user module documentation optimization analysis

_Fonte: `optimization-analysis-user-module-documentation.md`_

# user module documentation optimization analysis

## current state analysis
- **total md files**: 390
- **extreme duplication**: multiple files for same topics with underscore/hyphen variations

### `wiki/topics/optimization-recommendations.md` — Topic optimization-recommendations


# Topic optimization-recommendations

Sintesi automatica di 4 documenti (chiave `optimization-recommendations`).

## Raccomandazioni di Ottimizzazione - Modulo User

_Fonte: `optimization-recommendations-1.md`_

# Raccomandazioni di Ottimizzazione - Modulo User

## 🎯 Stato Attuale e Problemi Critici

### ❌ PROBLEMI CRITICI IDENTIFICATI

#### 1. Documentazione Gigantesca e Frammentata
- **README.md**: 955 righe (troppo lungo per essere utile)
- **Duplicazioni**: Versioni HEAD/Incoming multiple
- **Collegamenti**: 500+ link nel README (confusione)
- **Struttura**: Informazioni sparse senza organizzazione logica

### `wiki/topics/parse-error.md` — Topic parse-error


# Topic parse-error

Sintesi automatica di 7 documenti (chiave `parse-error`).

## parse-error-orphan-methods-2

_Fonte: `bug-fixes/archive/parse-error-orphan-methods-2.md`_



## parse-error-orphan-methods-2025-01-27 - User

_Fonte: `bug-fixes/archive/parse-error-orphan-methods.md`_

# parse-error-orphan-methods-2025-01-27 - User

## Overview

Documentazione per parse-error-orphan-methods-2025-01-27 nel modulo User.

### `wiki/topics/passport-cluster.md` — Topic passport-cluster


# Topic passport-cluster

Sintesi automatica di 23 documenti (chiave `passport-cluster`).

## passport-cluster-completion-status

_Fonte: `passport-cluster-completion-status.md`_

See canonical documentation: ../../../Themes/docs/shared-components/passport-cluster-completion-status.md

## Passport Cluster - Status Completamento

_Fonte: `passport-cluster-completion.md`_

# Passport Cluster - Status Completamento

**Status**: ✅ Completato e Verificato
**Metodologia**: Super Mucca


### `wiki/topics/passport-oauth.md` — Topic passport-oauth


# Topic passport-oauth

Sintesi automatica di 3 documenti (chiave `passport-oauth`).

## Audit Passport OAuth - Modelli e Corredo Filament

_Fonte: `passport-oauth-audit.md`_

# Audit Passport OAuth - Modelli e Corredo Filament

**Scopo**: Verificare che ogni modello Passport abbia wrapper Oauth* completo con policy, Filament resource, traduzioni e test.

**Data audit**: 2025-03

---

## Modelli Passport (vendor)

| Classe Passport | Tabella | Wrapper | Policy | Resource | Traduzioni | Test |

### `wiki/topics/phpstan-belongstomany.md` — Topic phpstan-belongstomany


# Topic phpstan-belongstomany

Sintesi automatica di 4 documenti (chiave `phpstan-belongstomany`).

## phpstan-belongstomany-covariance-06.deprecated

_Fonte: `wiki/memories/phpstan-belongstomany-covariance-06.deprecated.md`_

> Questo file è stato rinominato in [phpstan-belongstomany-covariance-2.deprecated.md](phpstan-belongstomany-covariance-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## PHPStan: BelongsToMany covarianza — HasTeams / UserContract

_Fonte: `wiki/memories/phpstan-belongstomany-covariance-06.md`_

# PHPStan: BelongsToMany covarianza — HasTeams / UserContract

## Problema

`HasTeams::teams()` (aliasato come `membershipTeams()` in `BaseUser`) chiama

### `wiki/topics/phpstan-corrections.md` — Topic phpstan-corrections


# Topic phpstan-corrections

Sintesi automatica di 4 documenti (chiave `phpstan-corrections`).

## PHPStan Corrections - OAuth Resources

_Fonte: `phpstan-corrections-oauth-resources.md`_

# PHPStan Corrections - OAuth Resources

**Data**: 2025-01-22
**Status**: In Progress
**Versione**: 1.0.0

## Correzioni Applicate

### OauthAccessTokenResource.php

#### Correzioni Namespace Filament 4

### `wiki/topics/phpstan-dry.md` — Topic phpstan-dry


# Topic phpstan-dry

Sintesi automatica di 6 documenti (chiave `phpstan-dry`).

## phpstan-dry-kiss-improvements-17.deprecated

_Fonte: `phpstan-dry-kiss-improvements-17.deprecated.md`_

> Questo file è stato rinominato in [phpstan-dry-kiss-improvements-2.deprecated.md](phpstan-dry-kiss-improvements-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## PHPStan Level 10 + DRY/KISS Improvements - User Module

_Fonte: `phpstan-dry-kiss-improvements-17.md`_

# PHPStan Level 10 + DRY/KISS Improvements - User Module

## Summary

Il modulo User è stato analizzato e migliorato per conformità PHPStan Level 10, principi DRY e KISS.

### `wiki/topics/phpstan-errors.md` — Topic phpstan-errors


# Topic phpstan-errors

Sintesi automatica di 3 documenti (chiave `phpstan-errors`).

## phpstan-errors-philosophy

_Fonte: `phpstan-errors-philosophy.md`_

- [Filament 4 Migration Guide](../../Xot/docs/filament-4-migration-guide.md)
- [Type Safety Best Practices](../../Xot/docs/type-safety-best-practices.md)

---

*Ricorda: La type safety è sacra. Non profanarla mai.*
---
module: theme
topic: phpstan-errors-philosophy
canonical: ../../../Themes/docs/shared-components/phpstan-errors-philosophy.md
related:

### `wiki/topics/phpstan-fix.md` — Topic phpstan-fix


# Topic phpstan-fix

Sintesi automatica di 3 documenti (chiave `phpstan-fix`).

## User Module - PHPStan Level 10 Fix Plan

_Fonte: `phpstan-fix-plan-user.md`_

# User Module - PHPStan Level 10 Fix Plan

## Analysis Date
2026-03-02

## Error Summary
**Total Errors**: 7+ errors across 10+ files

## Error Analysis

### 1. UserContract Property/Method Access (Major Impact)

### `wiki/topics/phpstan-fixes.md` — Topic phpstan-fixes


# Topic phpstan-fixes

Sintesi automatica di 20 documenti (chiave `phpstan-fixes`).

## Correzioni PHPStan nel Modulo User

_Fonte: `bug-tracking/phpstan-fixes.md`_

# Correzioni PHPStan nel Modulo User

## Team.php
### Problema 1: Metodo Mancante
Il modello `Team` implementava l'interfaccia `TeamContract` ma mancava l'implementazione del metodo `addUser`.

### Soluzione 1
È stato aggiunto il metodo `addUser` che permette di aggiungere un utente al team con un ruolo specifico.

### Problema 2: Incompatibilità di Metodi
Sono stati rilevati problemi di compatibilità tra i metodi del modello `Team` e quelli definiti nell'interfaccia `TeamContract`:

### `wiki/topics/phpstan-level10.md` — Topic phpstan-level10


# Topic phpstan-level10

Sintesi automatica di 5 documenti (chiave `phpstan-level10`).

## phpstan-level10-analysis

_Fonte: `phpstan-level10-analysis.md`_

- [Passport Documentation](file:///var/www/_bases/base_ptvx_fila4_mono/laravel/Modules/User/docs/passport.md)

---

**Status**: 📋 Ready for Implementation  
**Estimated Time**: 25 minutes  
**Complexity**: ⭐⭐ Simple  
**Priority**: 🟡 Medium
---
module: theme
topic: phpstan-level10-analysis

### `wiki/topics/phpstan-progress.md` — Topic phpstan-progress


# Topic phpstan-progress

Sintesi automatica di 3 documenti (chiave `phpstan-progress`).

## phpstan-progress-report

_Fonte: `phpstan-progress-report.md`_

*Ultimo aggiornamento: 2025-01-22*
---
module: theme
topic: phpstan-progress-report
canonical: ../../../Themes/docs/shared-components/phpstan-progress-report.md
related:
  - "./00-index-indice-documentazione-modulo-user.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"

### `wiki/topics/phpstan-relationship.md` — Topic phpstan-relationship


# Topic phpstan-relationship

Sintesi automatica di 3 documenti (chiave `phpstan-relationship`).

## Correzione PHPStan - Relationship Type Hints

_Fonte: `phpstan-relationship-fix-correzione-type-hints.md`_

# Correzione PHPStan - Relationship Type Hints

## 🚨 Errore PHPStan Risolto

**File**: `User/app/Models/Traits/HasAuthenticationLogTrait.php`  
**Errore**: Type mismatch per relazioni MorphMany/MorphOne

### Problema
```php
// ❌ ERRORE PHPStan
@return MorphMany<AuthenticationLog, static>

### `wiki/topics/phpstan-user.md` — Topic phpstan-user


# Topic phpstan-user

Sintesi automatica di 3 documenti (chiave `phpstan-user`).

## PHPStan User — chiusura

_Fonte: `bmad/phpstan-user-contract-fix.md`_

# PHPStan User — chiusura

Gate: `cd laravel && vendor/bin/phpstan analyse Modules/User` (livello **max** da `phpstan.neon`, mai `--level`).

## Perché

Il leaf auth è `XotData::make()->getUserClass()` (spesso `Modules\Quaeris\Models\User`). I trait e i test del modulo User non possono chiudere i tipi su `Modules\User\Models\User`.

## Cosa è stato allineato

| Gruppo | File | Fix |

### `wiki/topics/phpstan-widget.md` — Topic phpstan-widget


# Topic phpstan-widget

Sintesi automatica di 5 documenti (chiave `phpstan-widget`).

## phpstan-widget-property-types-06.deprecated

_Fonte: `wiki/troubleshooting/phpstan-widget-property-types-06.deprecated.md`_

> Questo file è stato rinominato in [phpstan-widget-property-types-2.deprecated.md](phpstan-widget-property-types-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## PHPStan widget property types

_Fonte: `wiki/troubleshooting/phpstan-widget-property-types-06.md`_

<<<<<<< .merge_file_kOAf3u
<<<<<<< .merge_file_ZWB2Ct
<<<<<<< .merge_file_SvbV8s
=======
>>>>>>> .merge_file_jwZ5Ei

### `wiki/topics/ponytail-audit.md` — Topic ponytail-audit


# Topic ponytail-audit

Sintesi automatica di 6 documenti (chiave `ponytail-audit`).

## ponytail-audit-02.deprecated

_Fonte: `ponytail-audit-02.deprecated.md`_

> Questo file è stato rinominato in [ponytail-audit-2.deprecated.md](ponytail-audit-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Ponytail-audit 2026-07-02: User module findings

_Fonte: `ponytail-audit-02.md`_

# Ponytail-audit 2026-07-02: User module findings

Source: repo-wide ponytail-audit follow-up, published in module_user_fila5 discussion
(see Related section below).


### `wiki/topics/product-strategy.md` — Topic product-strategy


# Topic product-strategy

Sintesi automatica di 3 documenti (chiave `product-strategy`).

## product-strategy-1

_Fonte: `product-strategy-1.md`_

See canonical documentation: ../../../Themes/docs/shared-components/PRODUCT_STRATEGY-Modules.md

## User Module - Product Strategy

_Fonte: `product-strategy-user-module.md`_

# User Module - Product Strategy

**Module:** User  
**Version:** 1.0.0  
**Last Updated:** March 12, 2026  

### `wiki/topics/quality-gates.md` — Topic quality-gates


# Topic quality-gates

Sintesi automatica di 3 documenti (chiave `quality-gates`).

## User quality gate audit

_Fonte: `audits/quality-gates.md`_

# User quality gate audit

Conditional tenant-default tests use PHPUnit's supported skip API and remain
explicit about why the fixture cannot be observed in a tenant-configured run.

## Quality Gates Analysis — laravel/Modules/User

_Fonte: `quality-gates-28.md`_

# Quality Gates Analysis — laravel/Modules/User


### `wiki/topics/quality-status.md` — Topic quality-status


# Topic quality-status

Sintesi automatica di 3 documenti (chiave `quality-status`).

## quality-status-1

_Fonte: `quality-status-1.md`_

See canonical documentation: ../../../Themes/docs/shared-components/quality-status-11-Modules.md

## quality-status-nov

_Fonte: `quality-status-nov.md`_

See canonical documentation: ../../../Themes/docs/shared-components/quality-status-11.md

## Modulo User — Stato Qualità

_Fonte: `quality-status.md`_

### `wiki/topics/quality-tools.md` — Topic quality-tools


# Topic quality-tools

Sintesi automatica di 4 documenti (chiave `quality-tools`).

## Quality Tools Final Report - 2025-01-22

_Fonte: `quality-tools-final-report.md`_

# Quality Tools Final Report - 2025-01-22

## Obiettivo
Completare la correzione di tutti gli errori PHPStan, PHPMD e PHP Insights nel modulo User, seguendo rigorosamente le regole Laraxot e la filosofia DRY + KISS.

## Risultati Finali

### ✅ PHPStan Level 10
- **0 errori** nel modulo User
- Tutti i tipi di ritorno corretti
- Tutti i PHPDoc completi e corretti

### `wiki/topics/redundancy-audit.md` — Topic redundancy-audit


# Topic redundancy-audit

Sintesi automatica di 4 documenti (chiave `redundancy-audit`).

## redundancy-audit-1

_Fonte: `redundancy-audit-1.md`_

> Questo file è stato rinominato in [redundancy-audit-1.md](redundancy-audit-1.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## redundancy-audit-21.deprecated

_Fonte: `redundancy-audit-21.deprecated.md`_

> Questo file è stato rinominato in [redundancy-audit-2.deprecated.md](redundancy-audit-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## User redundancy audit 2026-05-21

_Fonte: `redundancy-audit-21.md`_

### `wiki/topics/redundancy-fixes.md` — Topic redundancy-fixes


# Topic redundancy-fixes

Sintesi automatica di 3 documenti (chiave `redundancy-fixes`).

## redundancy-fixes-january-1

_Fonte: `redundancy-fixes-january-1.md`_

See canonical documentation: ../../../Themes/docs/shared-components/redundancy-fixes-january-2026.md

## Correzioni Ridondanze - Gennaio 2026

_Fonte: `redundancy-fixes-january.md`_

# Correzioni Ridondanze - Gennaio 2026

## Problema Identificato

Durante l'implementazione della gestione completa di Passport, sono state introdotte due ridondanze critiche che violano il principio DRY:

### `wiki/topics/registration-widget.md` — Topic registration-widget


# Topic registration-widget

Sintesi automatica di 13 documenti (chiave `registration-widget`).

## RegistrationWidget FileUpload Error Fix

_Fonte: `filament/widgets/registration-widget-fileupload-fix.md`_

# RegistrationWidget FileUpload Error Fix

## Problema Identificato
### Errore
```
ErrorException
foreach() argument must be of type array|object, string given
### Causa
Il problema si verifica quando:
1. Un utente già registrato accede alla pagina di registrazione con email e token validi
2. Il `RegistrationWidget.getFormFill()` carica i dati dal database tramite `$model->toArray()`

### `wiki/topics/routing-best.md` — Topic routing-best


# Topic routing-best

Sintesi automatica di 3 documenti (chiave `routing-best`).

## Best Practices per il Routing in Architettura Volt + Folio + Filament

_Fonte: `best-practices/routing-best-practices.md`_

# Best Practices per il Routing in Architettura Volt + Folio + Filament

## Il Principio Fondamentale

In un'architettura che utilizza Volt + Folio + Filament, il routing tradizionale attraverso `web.php` è sostituito da un approccio più moderno e dichiarativo. Questo documento spiega come gestire correttamente il routing in questa architettura.

## I Tre Livelli del Routing

### 1. Filament (Admin Panel)
```php
// ✅ CORRETTO: Routing dichiarativo nelle risorse Filament

### `wiki/topics/service-provider.md` — Topic service-provider


# Topic service-provider

Sintesi automatica di 5 documenti (chiave `service-provider`).

## Lo Zen della Separazione dei ServiceProviders: Filosofia della Responsabilità Unica

_Fonte: `philosophy/service-provider-aration-zen.md`_

# Lo Zen della Separazione dei ServiceProviders: Filosofia della Responsabilità Unica

## La Storia

Nel progetto Laraxot, ogni ServiceProvider ha una **responsabilità unica e ben definita**. Questa filosofia deriva dal **Single Responsibility Principle (SRP)** dei SOLID principles e dal pattern architetturale **Modular Monolith**.

## Il Problema Rilevato

### Situazione Attuale (ANTI-PATTERN)

```php

### `wiki/topics/session-management.md` — Topic session-management


# Topic session-management

Sintesi automatica di 3 documenti (chiave `session-management`).

## session-management-1

_Fonte: `session-management-1.md`_

See canonical documentation: ../../../Themes/docs/shared-components/session-management.md

## Gestione delle Sessioni

_Fonte: `session-management-2.md`_

# Gestione delle Sessioni

## Panoramica
Questo documento fornisce linee guida per la gestione delle sessioni utente all'interno di un modulo Laravel, garantendo una gestione sicura ed efficiente dello stato utente.


### `wiki/topics/socialite-architecture.md` — Topic socialite-architecture


# Topic socialite-architecture

Sintesi automatica di 3 documenti (chiave `socialite-architecture`).

## Socialite Architecture Analysis

_Fonte: `wiki/concepts/socialite-architecture-analysis.md`_

# Socialite Architecture Analysis

## The Golden Rule

**NO social columns (google_id, facebook_id, etc.) in users table. EVER.**

Instead: Use separate `SocialiteUser` model with `user_id` foreign key.

---

## Architecture Overview

### `wiki/topics/socialite-provider.md` — Topic socialite-provider


# Topic socialite-provider

Sintesi automatica di 5 documenti (chiave `socialite-provider`).

## Socialite provider boundary — architecture

_Fonte: `bmad/socialite-provider-boundary-architecture.md`_

# Socialite provider boundary — architecture

## Stato verificato

`module.json` registra sia `Modules\\User\\Providers\\UserServiceProvider` sia `Modules\\User\\Providers\\SocialiteServiceProvider`.

`UserServiceProvider` gestisce bootstrap generale: widget Livewire auth, password rules, Pulse, notifiche mail e policy.

`SocialiteServiceProvider` estende `SocialiteProviders\\Manager\\ServiceProvider` e registra l'estensione Microsoft tramite `SocialiteWasCalled`.

## Decisione

### `wiki/topics/socialite.md` — Topic socialite


# Topic socialite

Sintesi automatica di 4 documenti (chiave `socialite`).

## socialite

_Fonte: `-integration/socialite.md`_

# socialite

<!-- Contenuto migrato da _docs/socialite.txt -->

-------------------------------------------------------------------------------------------------------------
How to customize Laravel filament login page
https://dev.to/mfazail/how-to-customize-laravel-filament-login-page-455n
-------------------------------------------------------------------------------------------------------------

https://github.com/DutchCodingCompany/filament-socialite


### `wiki/topics/spatie-permission.md` — Topic spatie-permission


# Topic spatie-permission

Sintesi automatica di 6 documenti (chiave `spatie-permission`).

## spatie-permission-philosophy

_Fonte: `spatie-permission-philosophy.md`_

See canonical documentation: ../../../Themes/docs/shared-components/spatie-permission-philosophy.md

## Spatie Permission teams on Laravel 13

_Fonte: `spatie-permission-teams-laravel.md`_

# Spatie Permission teams on Laravel 13

## Root cause

After the Laravel 13 upgrade the project resolves `spatie/laravel-permission` 7.x. In this line, when `permission.teams` is enabled, the package asks `PermissionRegistrar` for `permission.models.team`.

### `wiki/topics/spatie-permissions.md` — Topic spatie-permissions


# Topic spatie-permissions

Sintesi automatica di 6 documenti (chiave `spatie-permissions`).

## spatie_permissions

_Fonte: `-integration/spatie-permissions.md`_

# spatie_permissions

<!-- Contenuto migrato da _docs/spatie_permissions.txt -->

https://jaydeepamethiya.medium.com/spatie-roles-and-permissions-in-laravel-10-a-comprehensive-guide-536d099d40ae

## spatie-permissions-2

_Fonte: `_integration/spatie-permissions-2.md`_

See canonical documentation: ../../../../Themes/docs/shared-components/spatie-permissions.md

### `wiki/topics/sprint-planning.md` — Topic sprint-planning


# Topic sprint-planning

Sintesi automatica di 3 documenti (chiave `sprint-planning`).

## sprint-planning-1

_Fonte: `sprint-planning-1.md`_

See canonical documentation: ../../../Themes/docs/shared-components/SPRINT_PLANNING-Modules.md

## User - Sprint Planning Meeting

_Fonte: `sprint-planning-meeting.md`_

# User - Sprint Planning Meeting

> Documento operativo per sprint planning. Modulo.
> Preparazione stimata: 73%.


### `wiki/topics/sso-providers.md` — Topic sso-providers


# Topic sso-providers

Sintesi automatica di 3 documenti (chiave `sso-providers`).

## User Module - SSO Providers Implementation

_Fonte: `sso-providers-implementation-2.md`_

# User Module - SSO Providers Implementation

## Overview

Il modulo User include il supporto completo per Single Sign-On (SSO) tramite provider esterni. Questa documentazione descrive l'implementazione della tabella `sso_providers` e le relative funzionalità.

## Database Schema

### Tabella: `sso_providers`

**Migration**: `2025_10_15_153835_create_sso_providers_table.php`

### `wiki/topics/stories:xotbaseresourcetable-mod.md` — Topic stories:xotbaseresourcetable-mod


# Topic stories:xotbaseresourcetable-mod

Sintesi automatica di 3 documenti (chiave `stories:xotbaseresourcetable-mod`).

## Audit $model + schema colonne su 13 XotBaseResourceTable (OAuth/Passport/Permission)

_Fonte: `stories/xotbaseresourcetable-model-audit-batch-user-oauth.story.md`_

# Audit $model + schema colonne su 13 XotBaseResourceTable (OAuth/Passport/Permission)

## Story

Come sviluppatore che mantiene le Resource Filament del modulo User, voglio che ogni
classe `XotBaseResourceTable` dichiari esplicitamente il proprio `$model` (copiato
dalla Resource sorella, mai indovinato dal nome del file) e che le colonne in
`getTableColumns()` siano verificate contro lo schema reale della connessione
corretta, cosi' che non si scoprano a runtime colonne inesistenti o Table duplicate
mai

### `wiki/topics/team-bindings.md` — Topic team-bindings


# Topic team-bindings

Sintesi automatica di 4 documenti (chiave `team-bindings`).

## team-bindings-fix-3

_Fonte: `team-bindings-fix-3.md`_

- [Critical Errors Documentation](../../SaluteOra/docs/critical-errors-resolved.md)

---

**Autore**: AI Assistant  
**Data**: Gennaio 2025  
**Versione**: 1.0  
---
module: theme
topic: team_bindings_fix
canonical: ../../../Themes/docs/shared-components/team-bindings-fix-3.md

### `wiki/topics/team-user.md` — Topic team-user


# Topic team-user

Sintesi automatica di 4 documenti (chiave `team-user`).

## team-user-composite-primary-key-fix

_Fonte: `team-user-composite-primary-key-fix.md`_

See canonical documentation: ../../../Themes/docs/shared-components/team-user-composite-primary-key-fix.md

## Fix: team_user Composite Primary Key Implementation

_Fonte: `team-user-composite-priy-key.md`_

# Fix: team_user Composite Primary Key Implementation

## Data Intervento

**[DATE]** - Implementazione chiave primaria composita per tabella pivot team_user

### `wiki/topics/teams-migration.md` — Topic teams-migration


# Topic teams-migration

Sintesi automatica di 4 documenti (chiave `teams-migration`).

## teams-migration-laraxot-compliance-2

_Fonte: `teams-migration-laraxot-compliance-2.md`_

> Questo file è stato rinominato in [teams-migration-laraxot-compliance-2.md](teams-migration-laraxot-compliance-2.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Teams Migration - Laraxot Compliance Fix

_Fonte: `teams-migration-laraxot-compliance-fix.md`_

<<<<<<< .merge_file_Ya27kN
<<<<<<< .merge_file_T4I7GX
<<<<<<< .merge_file_OAV7Dr
=======
>>>>>>> .merge_file_TusCCZ

### `wiki/topics/teams-relation.md` — Topic teams-relation


# Topic teams-relation

Sintesi automatica di 3 documenti (chiave `teams-relation`).

## TeamsRelationManager in User Module

_Fonte: `filament/archive/teams-relation-manager.md`_

# TeamsRelationManager in User Module

## Panoramica

Il `TeamsRelationManager` gestisce la relazione many-to-many tra utenti e team all'interno del modulo User, fornendo funzionalità per l'associazione, la visualizzazione e la gestione dei team associati a un utente.

## REGOLA FONDAMENTALE

**MAI usare ->label(), ->placeholder(), ->helperText() nei componenti Filament.**
La traduzione è automatica tramite la struttura espansa dei file di traduzione. Ogni override nel codice è un errore grave e va corretto subito.


### `wiki/topics/terms-and.md` — Topic terms-and


# Topic terms-and

Sintesi automatica di 6 documenti (chiave `terms-and`).

## terms_and_conditions

_Fonte: `-integration/terms-and-conditions.md`_

# terms_and_conditions

<!-- Contenuto migrato da _docs/terms_and_conditions.txt -->

https://github.com/nowendwell/laravel-terms
https://github.com/nowendwell/laravel-terms


https://dev.to/filamentmastery/adding-terms-and-conditions-acceptance-to-filament-registration-2nhc

## terms-and-conditions-1

### `wiki/topics/traits-complete.md` — Topic traits-complete


# Topic traits-complete

Sintesi automatica di 3 documenti (chiave `traits-complete`).

## Guida Completa ai Trait del Modulo User - AGGIORNATO POST-IMPLEMENTAZIONE

_Fonte: `traits-complete-guide-1-1.md`_

# Guida Completa ai Trait del Modulo User - AGGIORNATO POST-IMPLEMENTAZIONE

## Stato Implementazione ✅ COMPLETATO

**Data implementazione:** 10 giugno 2025
**Trait corretto:** HasTeams
**Filosofia applicata:** Jetstream + Laraxot Evolution

## Correzioni Implementate

### 1. ✅ Errori Critici Risolti

### `wiki/topics/traits-hasteams.md` — Topic traits-hasteams


# Topic traits-hasteams

Sintesi automatica di 6 documenti (chiave `traits-hasteams`).

## Analisi Corretta del Trait HasTeams - Filosofia Laraxot

_Fonte: `traits-hasteams-analisi-corretta-2.md`_

# Analisi Corretta del Trait HasTeams - Filosofia Laraxot

## Comprensione della Filosofia `belongsToManyX`

### **Religione Laraxot**: Convention over Configuration
- **Auto-Discovery**: Il sistema "indovina" le configurazioni corrette
- **Zero Boilerplate**: Eliminare codice ripetitivo  
- **Smart Defaults**: Convenzioni intelligenti automatiche

### **Logica di `belongsToManyX`**:
1. **`guessPivot()`**: Indovina automaticamente il modello pivot dai nomi delle classi

### `wiki/topics/translation-city.md` — Topic translation-city


# Topic translation-city

Sintesi automatica di 9 documenti (chiave `translation-city`).

## translation-city-field-refactor-08.deprecated

_Fonte: `translation-city-field-refactor-08.deprecated.md`_

> Questo file è stato rinominato in [translation-city-field-refactor-2.deprecated.md](translation-city-field-refactor-2.deprecated.md). Non aggiungere date nel filename; usare `created/updated` nel front matter.

## Refactor Completo Campi "Città" - Modulo User

_Fonte: `translation-city-field-refactor-08.md`_

<<<<<<< .merge_file_itITiz
<<<<<<< .merge_file_EHZ43R
<<<<<<< .merge_file_o5df8B
=======
>>>>>>> .merge_file_T8UYvu

### `wiki/topics/translation-keys.md` — Topic translation-keys


# Topic translation-keys

Sintesi automatica di 4 documenti (chiave `translation-keys`).

## Regole per le Chiavi di Traduzione

_Fonte: `best-practices/translation-keys-rules.md`_

# Regole per le Chiavi di Traduzione

## Principi Fondamentali

1. **Chiavi in Inglese**
   - Le chiavi di traduzione DEVONO essere sempre in inglese
   - Esempio corretto: `__('login')` invece di `__('Accedi')`
   - Le traduzioni effettive vengono gestite nei file di lingua

2. **Struttura delle Chiavi**
   - Utilizzare il formato `namespace.key` per chiavi complesse

### `wiki/topics/two-factor.md` — Topic two-factor


# Topic two-factor

Sintesi automatica di 6 documenti (chiave `two-factor`).

## two_factor

_Fonte: `-integration/two-factor.md`_

# two_factor

<!-- Contenuto migrato da _docs/two_factor.txt -->

https://engineering.teknasyon.com/two-factor-authentication-in-laravel-applications-dbee2c8eab98

## two-factor-1

_Fonte: `_integration/two-factor-1.md`_

See canonical documentation: ../../../../Themes/docs/shared-components/two-factor.md

### `wiki/topics/user-factory.md` — Topic user-factory


# Topic user-factory

Sintesi automatica di 9 documenti (chiave `user-factory`).

## UserFactory Advanced Integration - Modulo User & Quaeris

_Fonte: `user-factory-advanced-integration-2.md`_

# UserFactory Advanced Integration - Modulo User & Quaeris

## Post Deep-Study Analysis 

Dopo uno studio approfondito dei modelli User, Patient, Doctor e Admin, l'integrazione UserFactory ha raggiunto un livello di eccellenza enterprise-grade con supporto completo per:

## 🎯 STI Architecture Completamente Implementata

### Hierarchy Mapping
```
BaseUser (User Module)

### `wiki/topics/user-module.md` — Topic user-module


# Topic user-module

Sintesi automatica di 4 documenti (chiave `user-module`).

## Analisi Qualità - Modulo User

_Fonte: `quality-analysis/user-module-quality-report.md`_

# Analisi Qualità - Modulo User

**Data Analisi**: 2025-01-22
**Analista**: AI Assistant
**Status**: In Progress

## 📊 Risultati Strumenti Qualità

### PHPStan Livello 10 ✅
- **Errori**: **0** ✅
- **Status**: Perfetto

### `wiki/topics/user-profile.md` — Topic user-profile


# Topic user-profile

Sintesi automatica di 6 documenti (chiave `user-profile`).

## STORY — ProfileEditVoltComponent controllava instanceof contro la classe User sbagliata

_Fonte: `stories/user-profile-volt-instanceof-wrong-user-class.md`_

# STORY — ProfileEditVoltComponent controllava instanceof contro la classe User sbagliata

## Contesto

Emersa due volte, in modo indipendente, in due sessioni concorrenti lo stesso
giorno (2026-09-03/04): un `phpstan analyse Modules` di routine segnalava 4
errori `cast.string` / `argument.type` / `method.nonObject` su
`ProfileEditVoltComponent.php` (mount/updateProfile/updatePassword/deleteAccount).

## Problema


### `wiki/topics/userfactory-advanced.md` — Topic userfactory-advanced


# Topic userfactory-advanced

Sintesi automatica di 5 documenti (chiave `userfactory-advanced`).

## UserFactory Advanced Implementation - COMPLETE ✅

_Fonte: `userfactory-advanced-implementation-complete-1.md`_

# UserFactory Advanced Implementation - COMPLETE ✅

## 🎉 Mission Accomplished

L'implementazione **avanzata** della UserFactory del modulo Quaeris è stata **completata con successo**, elevando la factory da ottima a **eccellenza enterprise-grade**.

## 📊 Results Summary

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| **States Supported** | 5 basic | 7 complete + transitions | +40% |

### `wiki/topics/volt-blade.md` — Topic volt-blade


# Topic volt-blade

Sintesi automatica di 8 documenti (chiave `volt-blade`).

## Implementazione dei Form con Widget Filament

_Fonte: `volt-blade-implementation-2.md`_

# Implementazione dei Form con Widget Filament

## Collegamenti correlati
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-2.md)
- [Best Practices Volt e Folio](../../xot/docs/volt_folio_best_practices.md)
- [Analisi dell'Errore di Implementazione](./volt-blade-implementation-error-3.md)

## Introduzione

Questo documento descrive l'implementazione corretta dei form nel tema One utilizzando widget Filament invece di form personalizzati. Questo approccio garantisce coerenza, riutilizzabilità e adattabilità a diverse grafiche, evitando di "reinventare la ruota".

### `wiki/topics/volt-folio.md` — Topic volt-folio


# Topic volt-folio

Sintesi automatica di 15 documenti (chiave `volt-folio`).

## Implementazione Corretta delle Pagine di Autenticazione con Volt e Folio

_Fonte: `volt-folio-auth-implementation-2.md`_

# Implementazione Corretta delle Pagine di Autenticazione con Volt e Folio

## Collegamenti correlati
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-2.md)
- [Volt Errors](./volt-errors-2.md)
- [Volt Folio Logout](./volt-folio-logout-2.md)

## Introduzione

Questo documento descrive l'implementazione corretta delle pagine di autenticazione (login, logout, registrazione, ecc.) utilizzando Laravel Folio e Volt . Seguendo queste linee guida, garantirai che le tue implementazioni siano conformi alle convenzioni del progetto e sfruttino al meglio le capacità di Volt

### `wiki/topics/volt-logout.md` — Topic volt-logout


# Topic volt-logout

Sintesi automatica di 4 documenti (chiave `volt-logout`).

## Implementazione del Logout con Volt

_Fonte: `volt-logout-1.md`_

# Implementazione del Logout con Volt

## Il Problema

L'errore `Route [logout] not defined` si verifica perché stiamo cercando di utilizzare una rotta tradizionale in un'architettura Volt + Folio + Filament. Invece di definire la rotta in `web.php`, implementeremo il logout usando Volt.

## La Soluzione

### 1. Creare il Componente Volt per il Logout

```php

### `wiki/topics/widget-translation.md` — Topic widget-translation


# Topic widget-translation

Sintesi automatica di 7 documenti (chiave `widget-translation`).

## Widget Translation Rules - FixCity Project

_Fonte: `best-practices/widget-translation-rules.md`_

# Widget Translation Rules - FixCity Project

## Core Principles
### Translation File Structure
- All widget translations MUST be in `Modules/{ModuleName}/lang/{locale}/widgets.php`
- Use expanded structure with `label`, `placeholder`, `help` for all fields
- Never use hardcoded strings in widgets or views
### Widget Implementation Rules
- NEVER use `->label()`, `->placeholder()`, or `->help()` in form components
- NEVER use `__()` or `trans()` functions directly in form components
- Let LangServiceProvider handle automatic translation loading

### `wiki/troubleshooting/filament-user-creation-pty-error.md` — Filament User Creation PTY Error


# Filament User Creation PTY Error

## Context
When running `php artisan make:filament-user` in environments without standard TTY support (like CI/CD pipelines, Docker containers without `-it`, or AI agent environments like Qwen/Claude/Gemini), Laravel Prompts may throw a `RuntimeException` with the message: `stty: invalid argument`.

## Problem
Laravel Prompts attempts to read terminal configuration using `stty`. In non-interactive environments, this fails, preventing the interactive setup wizard from running.

## Solution

### Best Practices
- **Use Non-Interactive Flags:** Always use `--no-interaction` (or `-n`) when automating artisan commands.
- **Pass Arguments Explicitly:** Provide all required data via command-line arguments.
  ```bash
  php artisan make:filament-user --name="Admi

### `wiki/troubleshooting/git-lfs-orphan-pointer-svg-fix.md` — Git LFS Orphan Pointer SVG Fix


# Git LFS Orphan Pointer SVG Fix

## Symptom

`git push laraxot dev` failed with:

```
remote: error: GH008: Your push referenced at least 31 unknown Git LFS objects:
remote:     0f96265cdbcae7120002387f235a8dfe5f105ce7c06eb018695174471582294a
remote:     ...
remote: Try to push them with 'git lfs push --all'.
 ! [remote rejected]   dev -> dev (pre-receive hook declined)
```

`git lfs push --all` / `git lfs fetch` confirmed the objects existed **nowhere**
(not locally in `.git/lfs/objects`, not on `laraxot` remote, not on `provtv` remote):

```
git lfs fsck

### `wiki/troubleshooting/phpstan-module-analysis-memory.md` — PHPStan User module analysis memory


# PHPStan User module analysis memory

> Nota operativa per distinguere errori reali del modulo User da OOM/cache PHPStan.

## Sintomo

Il primo run:

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/User
```

puo' fallire con:

```text
Child process error: PHPStan process crashed because it reached configured PHP memory limit: 512M
while running parallel worker
```

### `wiki/twofactorauthentication.md` — Two-Factor Authentication (2FA)


# Two-Factor Authentication (2FA)

The User module implements a robust 2FA system based on TOTP (Time-based One-Time Password), compatible with apps like Google Authenticator and Authy.

## 1. Core Architecture

The system uses the following packages:
- `pragmarx/google2fa-laravel`: Core logic for secret generation and verification.
- `bacon/bacon-qr-code`: Generating QR codes for easy setup.

## 2. Implementation Flow

1. **Enable**: User requests to enable 2FA. The system generates a secret key and 10 recovery codes.
2. **Scan**: User scans the provided QR code with their authenticator app.
3. **Verify**: User enters the 6-digit TOTP code to confirm the connection.
4. **Recovery**: If the device is lost, the user can use one of the one-time-use recovery codes.

## 3. Mandatory Model Fie

### `wiki-archive/wiki/skills/filament-translation-audit.md` — Skill — Audit traduzioni Filament User


# Skill — Audit traduzioni Filament User

> Procedura on-demand per verificare che le UI Filament del modulo `User` rispettino ownership delle traduzioni e regole XotBase.

## Trigger

Usa questa skill quando:

- tocchi page, resource o widget Filament del modulo `User`
- trovi `->label()`, `->placeholder()`, `->tooltip()` o testi inline sospetti
- devi capire se una stringa appartiene al tema o al modulo

## Checklist

- [ ] cercare `->label(`, `->placeholder(`, `->helperText(` e `->tooltip(` nei file toccati
- [ ] confermare che le traduzioni vivano nel modulo `User`, non nel tema
- [ ] verificare che le chiavi seguano la struttura `user::context.collection.element.type`
- [ ] controllare se la page/resource deve estendere classi `XotBase*`
- [ ] aggiornare log wiki modulo/root se la re

### `windsurf-rules.md` — Regola Windsurf: Migrazioni XotBaseMigration

# Regola Windsurf: Migrazioni XotBaseMigration

## Regola
- Usare SEMPRE `$this->hasColumn('nome_colonna')` nelle migrazioni che estendono XotBaseMigration.
- NON usare mai `Schema::hasColumn`.

## Esempio
```php
if (! $this->hasColumn('state')) {
    $this->tableUpdate(function (Blueprint $table) {
        $table->string('state')->nullable();
    });
}
```

## Motivazione
- Compatibilità multi-db
- Coerenza tra i moduli
- Evita errori dovuti a override custom


### `windsurf.md` — Regola Windsurf: Migrazioni XotBaseMigration

# Regola Windsurf: Migrazioni XotBaseMigration

## Regola
- Usare SEMPRE `$this->hasColumn('nome_colonna')` nelle migrazioni che estendono XotBaseMigration.
- NON usare mai `Schema::hasColumn`.

## Esempio
```php
if (! $this->hasColumn('state')) {
    $this->tableUpdate(function (Blueprint $table) {
        $table->string('state')->nullable();
    });
}
```

## Motivazione
- Compatibilità multi-db
- Coerenza tra i moduli
- Evita errori dovuti a override custom


### `xotbase-resource-getpages-automatic.md` — XotBaseResource getPages() Automatic: Filosofia DRY


# XotBaseResource getPages() Automatic: Filosofia DRY

## Data: 2025-01-22

## Il Dibattito Feroce

### 🎭 Protagonisti

**Il Pragmatico** (DRY - Don't Repeat Yourself)
vs
**Il Purista** (Explicit is Better than Implicit)

---

## Round 1: Devo Sovrascrivere getPages()?

### 🟢 Il Pragmatico Attacca

> "XotBaseResource ha già un metodo `getPages()` che genera automaticamente le pagine basandosi su convenzioni di naming! Non serve sovrascriverlo! È violazione DRY!"

### `xotbasemigration-best-practices.md` — Best Practice: XotBaseMigration

# Best Practice: XotBaseMigration

## Introduzione
Per tutte le migrazioni dei moduli, si utilizza la classe base personalizzata `XotBaseMigration` invece delle classi standard Laravel. Questo garantisce coerenza, estendibilità e compatibilità con le regole del progetto.

## Pattern Consigliati
- **Controllo colonne**: Usare sempre `$this->hasColumn('nome_colonna')` invece di `Schema::hasColumn()`.
- **Controllo tabelle**: Usare `$this->hasTable()` invece di `Schema::hasTable()`.
- **Creazione/aggiornamento**: Usare i metodi helper `tableCreate()` e `tableUpdate()`.
- **Mai usare direttamente Schema::**

## Esempio Corretto
```php
if (! $this->hasColumn('state')) {
    $this->tableUpdate(function (Blueprint $table) {
        $table->string('state', 32)->nullable();
    });
}
```


### `xotbasemigration-laraxot-philosophy.md` — xotbasemigration-laraxot-philosophy


See canonical documentation: ../../../Themes/docs/shared-components/xotbasemigration-laraxot-philosophy.md

### `xotbasemigration-laraxot.md` — XotBaseMigration - La Filosofia Laraxot nel Modulo User


# XotBaseMigration - La Filosofia Laraxot nel Modulo User

## Panoramica

Questo documento spiega la filosofia Laraxot per le migrazioni nel modulo User, basata su XotBaseMigration. Ogni migrazione DEVE seguire questi principi per mantenere coerenza e qualità nel progetto.

## La Filosofia Laraxot

### Logica
- **Single Source of Truth**: XotBaseMigration è l'unica fonte di verità per le migrazioni
- **Separazione CREATE/UPDATE**: Ogni migrazione ha due blocchi distinti per sicurezza
- **Controlli di esistenza**: Sempre verificare l'esistenza prima di aggiungere colonne

### Filosofia
- **DRY**: Non ripetere mai la logica di migrazione
- **KISS**: Mantieni le migrazioni semplici e leggibili
- **Consistenza**: Tutte le migrazioni seguono lo stesso pattern

### Politica

### `xotbaseresource-violations-removal.md` — Rimozione Proprietà/Metodi Vietati da XotBaseResource - [DATE]


# Rimozione Proprietà/Metodi Vietati da XotBaseResource - [DATE]

**Status**: ✅ Completato  

## Violazioni Corrette

### Modulo User

1. **OauthAccessTokenResource**
   - ❌ Rimosso: `protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-key'`
   - ❌ Rimosso: `protected static ?int $navigationSort = 5`
   - ❌ Rimosso: `public static function getNavigationLabel(): string`
   - ❌ Rimosso: `public static function getPluralLabel(): string`
   - ❌ Rimosso: `public static function getModelLabel(): string`
   - ✅ Verificato: File traduzione `oauth_access_token.php` ha tutte le chiavi richieste

2. **OauthAuthCodeResource**
   - ❌ Rimosso: `protected static ?string $recordTitleAttribute = 'id'`
   - ✅ Verificato: File traduzione `oauth_auth_code.php` ha tutte le chiavi richieste
