---
title: "Gestione dei Permessi"
type: concept
<<<<<<< HEAD
tags: [permissions, roles, teams, spatie, authorization]
created: 2026-09-24
updated: 2026-09-24
qmd: "permissions roles teams guard Spatie authorization"
related:
  - "./00-INDEX.md"
  - "./SPATIE_PERMISSIONS_METHODS.md"
  - "../../Xot/docs/roles-permissions.md"
  - "../../Xot/docs/permission.md"
  - "../../../Themes/TwentyOne/docs/wiki/concepts/authorization-boundary.md"
=======
tags: [permissions]
created: 2026-07-14
updated: 2026-07-14
qmd: "permissions gestione dei permessi"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index-1.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
>>>>>>> laraxot/dev
---

# Gestione dei Permessi

<<<<<<< HEAD
## Scopo e ownership

Il modulo `User` è il proprietario del dominio autorizzazione: utenti, ruoli,
permessi, team e memberships. Xot espone i contratti condivisi; i moduli che
consumano l'autorizzazione devono riusare questi producer e non definire modelli
Spatie paralleli.

La configurazione applicativa usa:

- `Modules\User\Models\Permission` come modello dei permessi;
- `Modules\User\Models\Role` come modello dei ruoli;
- `Modules\User\Models\Team` come modello dei team;
- `permission.teams = true`;
- `guard_name = 'web'` come default del modello utente.

La configurazione è definita dal provider e dal package Spatie. Non va duplicata
nei moduli consumer.

## Modello e trait

`Modules\User\Models\BaseUser` usa `HasSpatiePermission`, che delega a
`HasRoles` e aggiunge l'estensione `hasPermissionToOrCreate()`:

```php
$user->hasPermissionTo('reports.view');
```

Il metodo standard di Spatie cerca un permesso già esistente e solleva
`PermissionDoesNotExist` quando il nome non è presente.

```php
$allowed = $user->hasPermissionToOrCreate('reports.view');
```

`hasPermissionToOrCreate()` chiama `Permission::findOrCreate()` usando il guard
richiesto o il guard predefinito, quindi verifica il permesso con
`hasPermissionTo()`. Il metodo crea il record quando manca, ma **non assegna**
automaticamente il permesso all'utente o al ruolo: il risultato booleano resta
la verifica autorizzativa effettiva.

Per la creazione e l'assegnazione iniziale dei dati usare i seeder del modulo
User, per esempio `PermissionSeeder`, `RoleSeeder` e i seeder di relazione. La
creazione on-demand è pensata per rendere sicura una Policy che deve valutare
un permesso non ancora materializzato, non per sostituire il provisioning dei
ruoli.

## Team e guard

Quando il contesto di team è attivo, il consumer deve impostare il team
corrente prima della verifica:

```php
$user->setPermissionsTeamId($team->getKey());

return $user->hasPermissionToOrCreate('reports.view');
```

Il cambio di team e il suo lifecycle restano nel modulo User. I controller,
widget e Blade non devono cambiare `permission.teams` o il modello Team per
mascherare un problema di autorizzazione.

## Gate, Policy e API

Le Policy Laravel sono il punto di controllo per l'accesso a una risorsa. Il
modello `User` fornisce i permessi; Xot fornisce contratti e convenzioni; il
consumer deve dichiarare le Policy che proteggono le proprie azioni.

Esempio:

```php
final class ReportPolicy
{
    public function view(User $user, Report $report): bool
    {
        return $user->hasPermissionToOrCreate('reports.view');
    }
}
```

Per una decisione che usa un ruolo, combinare il controllo del permesso con
`hasRole()` o con la Policy gerarchica prevista dal dominio. Non introdurre
liste di nomi di permessi hard-coded nei template: il controllo di sicurezza
deve essere eseguito dal Gate o dalla Policy.

## Verifica del confine

- I contratti del tema e i widget devono assumere il modello User/Xot e il
  team context già stabilito.
- I consumer non devono creare modelli `Permission`, `Role` o `Team` propri.
- `hasPermissionToOrCreate()` deve essere usato solo dove è accettabile creare
  il permesso mancante; per un controllo fail-closed che non deve scrivere,
  usare il normale Gate o `hasPermissionTo()` con il percorso di errore
  previsto.
- Non usare probe, baseline, ignore PHPStan o configurazioni locali per
  aggirare la verifica del contratto.

## Test e riferimenti

Il comportamento è coperto da
`tests/Feature/HasSpatiePermissionAutoCreateTest.php`: permesso esistente,
permesso mancante, mancata auto-creazione del metodo standard, assegnazione
successiva e Policy che non devono più esplodere.

- [Metodi Spatie e estensione User](./SPATIE_PERMISSIONS_METHODS.md)
- [Contratto e regole Xot](../../Xot/docs/roles-permissions.md)
- [Snapshot configurazione Spatie](../../Xot/docs/permission.md)
- [Confine di autorizzazione TwentyOne](../../../Themes/TwentyOne/docs/wiki/concepts/authorization-boundary.md)
- [Test auto-create](../tests/Feature/HasSpatiePermissionAutoCreateTest.php)
- [Trait HasSpatiePermission](../app/Models/Traits/HasSpatiePermission.php)
=======
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
```php
class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Crea i permessi
        $permissions = [
            'moderate_doctors' => 'Può moderare le registrazioni dei medici',
            'view_doctors' => 'Può visualizzare i medici',
            'create_doctors' => 'Può creare medici',
            'edit_doctors' => 'Può modificare i medici',
            'delete_doctors' => 'Può eliminare i medici',
        ];
        foreach ($permissions as $name => $description) {
            Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
                'description' => $description,
            ]);
        }
        // Assegna i permessi ai ruoli
        $role = Role::firstOrCreate([
            'name' => 'moderator',
            'guard_name' => 'web',
        ]);
        $role->givePermissionTo([
            'moderate_doctors',
            'view_doctors',
    }
}
```
### Utilizzo
Per verificare se un utente ha un determinato permesso:
if ($user->hasPermissionTo('moderate_doctors')) {
    // L'utente può moderare i medici
Per verificare se un utente ha un determinato ruolo:
if ($user->hasRole('moderator')) {
    // L'utente è un moderatore
### Filament
I permessi vengono utilizzati nel modulo Patient per controllare l'accesso alle funzionalità di moderazione:
Forms\Components\View::make('patient::filament.doctor-moderation-summary')
    ->visible(fn () => Auth::user()->hasPermissionTo('moderate_doctors')),
Forms\Components\Textarea::make('moderation_notes')
    ->label('Note Moderazione')
    ->visible(fn () => Auth::user()->hasPermissionTo('moderate_doctors'))
## Migrazione
La tabella `permissions` include il campo `description` per una migliore documentazione dei permessi:
$table->id();
$table->string('name');
$table->string('guard_name');
$table->string('description')->nullable();
$table->timestamps();
## Interfaccia di Amministrazione
I permessi possono essere gestiti tramite l'interfaccia di amministrazione di Filament:
- Lista dei permessi: `/admin/permissions`
- Creazione permesso: `/admin/permissions/create`
- Modifica permesso: `/admin/permissions/{id}/edit`
## Vedi Anche
- [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)
- [Filament](https://filamentphp.com)
- [Doctor Registration Workflow](../patient/docs/doctor-registration-workflow.md)
## Collegamenti tra versioni di permissions.md
* [permissions.md](../../gdpr/docs/packages/permissions.md)
* [permissions.md](../../patient/docs/permissions.md)
- [Spatie Laravel Permission](https://spatie.be/project_docs/laravel-permission)
- [Doctor Registration Workflow](../patient/project_docs/doctor-registration-workflow.md)
* [permissions.md](../../gdpr/project_docs/packages/permissions.md)
* [permissions.md](../../patient/project_docs/permissions.md)
>>>>>>> laraxot/dev
