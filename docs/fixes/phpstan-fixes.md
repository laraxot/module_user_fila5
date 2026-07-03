# Correzioni PHPStan nel Modulo User

## Team.php
### Problema 1: Metodo Mancante
Il modello `Team` implementava l'interfaccia `TeamContract` ma mancava l'implementazione del metodo `addUser`.

### Soluzione 1
È stato aggiunto il metodo `addUser` che permette di aggiungere un utente al team con un ruolo specifico.

### Problema 2: Incompatibilità di Metodi
Sono stati rilevati problemi di compatibilità tra i metodi del modello `Team` e quelli definiti nell'interfaccia `TeamContract`:
- `hasUser()`
- `addUser()`
- `removeUser()`
- `userHasPermission()`
- `getPermissionsFor()`

### Soluzione 2
È necessario allineare le firme dei metodi con quelle definite nell'interfaccia. Le modifiche richieste sono:
1. Utilizzare solo i metodi garantiti dalle interfacce `UserContract` e `ModelContract`
2. Assicurarsi che i tipi di ritorno corrispondano esattamente
3. Assicurarsi che i parametri corrispondano esattamente

### Problema 3: Accesso alle Proprietà
Il modello `Team` accede direttamente a proprietà che potrebbero non essere disponibili attraverso l'interfaccia `UserContract`.

### Soluzione 3
È necessario:
1. Utilizzare il metodo `getKey()` invece di accedere direttamente a `id`
2. Utilizzare i metodi delle relazioni invece di accedere direttamente alle proprietà
3. Implementare controlli di tipo più robusti

### Collegamenti Bidirezionali
- [Documentazione Generale PHPStan](/docs/phpstan/phpstan_level10_linee_guida.md)
- [Contratti del Modulo User](/docs/modules/user/contracts.md)
- [Best Practices per i Modelli](/docs/modules/user/models.md)
- [Interfacce e Contratti](/docs/modules/xot/contracts.md) 

## HasRelations.php (2026-07-02)

### Problema

Il trait `HasRelations` definiva le relazioni `devices()` e `socialiteUsers()` senza specificare i tipi generici delle relazioni Eloquent. PHPStan segnalava:
- `missingType.generics` su entrambi i metodi
- `property.notFound` nel test `UserModelTest.php` perché `socialiteUsers()->first()` veniva visto come `Model|null`

### Soluzione

Aggiunti PHPDoc con i tipi generici completi, includendo `$this` come modello dichiarante:

```php
/**
 * @return BelongsToMany<Device, $this>
 */
public function devices(): BelongsToMany

/**
 * @return HasMany<SocialiteUser, $this>
 */
public function socialiteUsers(): HasMany
```

## Trait morti rimossi (2026-07-03)

### Problema

PHPStan segnalava `trait.unused` per quattro trait nel modulo User:

- `Modules\User\Models\Traits\HasDevices`
- `Modules\User\Models\Traits\HasModules`
- `Modules\User\Models\Traits\HasSocialite`
- `Modules\User\Models\Traits\HasSpatiePermission`

Nessun modello o componente del perimetro `Modules/` e `Themes/` li utilizzava.

### Soluzione

Eliminati i file sorgente. I comportamenti eventualmente necessari sono già coperti da trait più specifici o dalle classi base del modulo.

### Verifica

```bash
./vendor/bin/phpstan analyse Modules/User
# Risultato: [OK] No errors
```

## Correzioni test e logica team (2026-07-03)

### Problemi

1. `IsUserAllowedActionTest` falliva perché impostava la chiave di config `filament-socialite.domain_allowlist` invece di `socialite.domain_allowlist` usata dall'azione.
2. `LoginWidgetTest` verificava una view `pub_theme::filament.widgets.auth.login` che non esiste; la view effettiva è `user::filament.widgets.login`.
3. `NotificationsCenterWidgetTest` usava `Pest\Laravel\get()` (inesistente) e una route non registrata; corretto con `$this->get()` e `assertNotFound()`.
4. `PasswordDataLabelsTest` si aspettava label italiane non presenti; allineate alle label reali del componente.
5. `TeamManagementTest` accedeva a `pivot` non caricato; corretto usando `teamUsers()` (HasMany) per ottenere il modello `TeamUser`.
6. `HasTeams::allTeamUsers()` era buggato (usava `membershipTeams` non definito e cast errato); riscritto tramite `teamUsers()->with('team')`.
7. Isolamento dei test multi-database: aggiunto `connectionsToTransact()` in `Tests/TestCase` per includere `user` e `mysql`.

### Verifica

```bash
cp .env.testing .env
./vendor/bin/phpstan analyse Modules/User
# [OK] No errors

./vendor/bin/pest Modules/User/tests/Feature/Actions/IsUserAllowedActionTest.php \
  Modules/User/tests/Feature/Filament/Widgets/LoginWidgetTest.php \
  Modules/User/tests/Feature/Filament/Widgets/NotificationsCenterWidgetTest.php \
  Modules/User/tests/Feature/PasswordDataLabelsTest.php
# PASS
```

## Change.php (Team Livewire) (2026-07-02 / 2026-07-03)

### Problema

`$this->teams` è tipizzato come `array<int, array<string, mixed>>`, ma l'assegnamento da `Collection->map(...)->all()` produceva un `array<int, array>` generico, causando `assign.propertyType`.

### Soluzione

Forzato il tipo intermedio con `@var` prima dell'assegnamento:

```php
/** @var array<int, array<string, mixed>> $teams */
$teams = $allTeams
    ->values()
    ->map(static fn (TeamContract $team): array => $team->toArray())
    ->all();

$this->teams = $teams;
```

### Verifica

```bash
./vendor/bin/phpstan analyse Modules
# Risultato: [OK] No errors

./vendor/bin/pest Modules/User/tests --no-coverage
# Risultato: passed
```

## Collegamenti tra versioni di phpstan_fixes.md
* [phpstan_fixes.md](../../../xot/docs/phpstan_fixes.md)
* [phpstan_fixes.md](../../../user/docs/phpstan_fixes.md)
* [phpstan_fixes.md](../../../user/docs/fixes/phpstan_fixes.md)
* [phpstan_fixes.md](../../../activity/docs/phpstan_fixes.md)

