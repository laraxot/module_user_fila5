---
title: "Gestione dei Permessi"
type: concept
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
---

# Gestione dei Permessi

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
