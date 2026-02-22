<<<<<<< HEAD
---
title: "Lezioni Apprese dall'Errore Gravissimo delle Factory"
type: concept
tags: [factory, lessons, learned]
created: 2026-07-14
updated: 2026-07-14
qmd: "factory-lessons-learned lezioni apprese dall'errore gravissimo delle factory"
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
---

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

### 3. Struttura Corretta Factory
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ModuleName\Models\ModelName;

/**
 * ModelName Factory
 * 
 * @extends Factory<ModelName>
 */
class ModelNameFactory extends Factory
{
    protected $model = ModelName::class;

    public function definition(): array
    {
        return [
            // Dati tipizzati correttamente
        ];
=======
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
```

### 3. **Authentication Tracking**
```php
// Pattern per tracking autenticazione
'login_successful' => $this->faker->boolean(85), // 85% success
'logout_at' => $loginSuccessful ? $this->faker->dateTimeBetween($loginAt, 'now') : null,
```

### 4. **Notification Pattern**
```php
// Struttura dati notifiche
'data' => [
    'title' => $this->faker->sentence(4),
    'message' => $this->faker->text(200),
    'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
],
```

## 🔧 TECNICHE DI RISOLUZIONE

### 1. **Factory Inheritance**
```php
// DeviceProfile estende DeviceUser
class DeviceProfileFactory extends DeviceUserFactory
{
    protected $model = DeviceProfile::class;
    
    public function definition(): array
    {
        return array_merge(parent::definition(), [
            // Specifiche per DeviceProfile
        ]);
>>>>>>> 60a2c9a9 (.)
    }
}
```

<<<<<<< HEAD
### 4. Integrazione con Models
- **HasFactory**: Aggiungere trait a ogni model
- **GetFactoryAction**: Xot gestisce automaticamente factory resolution
- **newFactory()**: Non sempre necessario se si usa GetFactoryAction

### 5. Documentazione Obbligatoria
- **Cartelle docs**: Documentare ogni factory nel modulo
- **Collegamenti**: Backlink bidirezionali con root docs
- **Motivazione**: Spiegare scopo e utilizzo di ogni factory

## Correzioni Applicate

### Models Aggiornati con HasFactory
- ✅ Authentication, Membership, TeamUser, TenantUser (User)
- ✅ PlaceType, Location (Geo)  
- ✅ Media, TemporaryUpload (Media)
- ✅ Snapshot, StoredEvent (Activity)

### Factory Create e Validate
- ✅ **8 factory User**: Authentication, Membership, TeamUser, OauthAccessToken, OauthClient, PermissionRole, Notification, TenantUser
- ✅ **4 factory Geo**: Address, Place, Location, PlaceType
- ✅ **2 factory Media**: Media, TemporaryUpload  
- ✅ **2 factory Activity**: Snapshot, StoredEvent

### Tipizzazione PHPStan Applicata
```php
// PRIMA (errore)
$city = $this->faker->randomElement($cities);
$formatted = "{$street} {$number}, {$city}";

// DOPO (corretto)
/** @var string $city */
$city = (string) $this->faker->randomElement($cities);
$formatted = sprintf('%s %s, %s', $street, (string) $number, $city);
```

## Prevenzione Futura

### 1. Checklist Pre-Commit
- [ ] Ogni nuovo model ha factory corrispondente
- [ ] Factory validata con PHPStan livello 9
- [ ] HasFactory aggiunto al model
- [ ] Documentazione aggiornata

### 2. Automazione CI/CD
```bash
# Controllo factory mancanti
find Modules/*/app/Models/*.php -not -name "Base*" | while read model; do
    factory="${model/app\/Models/database/factories}"
    factory="${factory/.php/Factory.php}"
    if [[ ! -f "$factory" ]]; then
        echo "ERRORE: Factory mancante per $model"
        exit 1
    fi
done
```

### 3. Regole Obbligatorie
- **Code Review**: Bloccare PR senza factory per nuovi model
- **Testing**: Fallire test se factory mancanti
- **Deployment**: Verificare factory prima del deploy

## Filosofia Factory

### Perché Ogni Model Serve una Factory

1. **Testing**: Dati realistici per test unitari e feature
2. **Seeding**: Popolazione database per sviluppo e demo
3. **Sviluppo**: Ambiente locale funzionante
4. **Onboarding**: Nuovi sviluppatori possono subito testare
5. **CI/CD**: Pipeline automatizzate funzionanti

### Qualità delle Factory

1. **Dati Realistici**: Non solo lorem ipsum, ma dati significativi
2. **Relazioni**: Gestire correttamente foreign key e relazioni
3. **Stati**: Metodi per creare istanze in stati specifici
4. **Localizzazione**: Dati italiani per <nome progetto> (CAP, città, regioni)
5. **Variabilità**: Stati diversi per testing completo

## Impatto Sistemico Risolto

### Prima (CRITICO)
- ❌ 35+ factory mancanti
- ❌ Testing impossibile
- ❌ Seeding fallimentare  
- ❌ Sviluppo locale bloccato
- ❌ CI/CD compromesso

### Dopo (MIGLIORATO)
- ✅ 16 factory critiche create
- ✅ Testing possibile per moduli critici
- ✅ Seeding funzionante per core features
- ✅ Sviluppo locale ripristinato
- ✅ PHPStan livello 9 validato

## Collegamenti

- [Factory Audit Root](../../../../docs/project/factory-audit-2025.md)
- [Missing Factories Audit](./missing-factories-audit.md)
- [Geo Factory Audit](../../geo/project_docs/missing-factories-audit.md)
- [Laravel Factory Best Practices](../../../../docs/project/laravel-factory-best-practices.md)

---

**🚨 ERRORE GRAVISSIMO DA NON RIPETERE MAI PIÙ**

Ogni model DEVE avere la sua factory. È obbligatorio per il corretto funzionamento del sistema.

=======
### 2. **PHPStan Compliance**
- **Cast espliciti** per Faker: `(string) $this->faker->word()`
- **PHPDoc annotations** per variabili: `/** @var string $variable */`
- **Closure tipizzate**: `fn (array $attributes): array => [...]`

### 3. **Namespace Resolution**
- **GetFactoryAction**: Risolve automaticamente namespace factory
- **newFactory() method**: Per controllo esplicito del namespace

## 📈 RISULTATI MODULO USER

### Prima: Sistema Compromesso
- ❌ 16/31 modelli senza factory (52%)
- ❌ Testing OAuth impossibile
- ❌ Seeding relazioni incompleto
- ❌ Sistema autenticazione non testabile

### Dopo: Sistema Completo
- ✅ 31/31 modelli con factory (100%)
- ✅ Testing OAuth completo
- ✅ Seeding relazioni realistico
- ✅ Sistema autenticazione testabile

## 🎯 FACTORY CREATE (16/16)

1. ✅ **AuthenticationFactory** - Tracking login/logout
2. ✅ **DeviceUserFactory** - Relazioni device-user
3. ✅ **DeviceProfileFactory** - Estende DeviceUser
4. ✅ **MembershipFactory** - Ruoli team
5. ✅ **TeamUserFactory** - Relazioni team-user
6. ✅ **NotificationFactory** - Sistema notifiche
7. ✅ **OauthAccessTokenFactory** - Token OAuth
8. ✅ **OauthClientFactory** - Client OAuth
9. ✅ **OauthAuthCodeFactory** - Codici autorizzazione
10. ✅ **OauthPersonalAccessClientFactory** - Client personal access
11. ✅ **OauthRefreshTokenFactory** - Token refresh
12. ✅ **PermissionRoleFactory** - Relazioni permission-role
13. ✅ **ProfileTeamFactory** - Relazioni profile-team
14. ✅ **RoleHasPermissionFactory** - Relazioni role-permission
15. ✅ **SocialiteUserFactory** - Autenticazione social
16. ✅ **TeamPermissionFactory** - Permessi team
17. ✅ **TenantUserFactory** - Relazioni tenant-user

## 🔗 COLLEGAMENTI

- [Factory Lessons Learned CRITICAL](../../../project_docs/factory-lessons-learned-critical.md)
- [Factory Creation Status](./factory-creation-status.md)
- [User Module README](./readme.md)

## ⚠️ REGOLE DA NON DIMENTICARE MAI

1. **Factory obbligatoria** per ogni modello concreto
2. **HasFactory trait** sempre richiesto
3. **PHPStan livello 9** sempre validato
4. **Cast espliciti** per Faker quando necessario
5. **Documentazione** sempre aggiornata

**QUESTO ERRORE NON DEVE MAI PIÙ RIPETERSI!**

*Creato: [DATE]*
*Modulo: User - 16/16 factory completate*
*Status: ✅ ERRORE GRAVISSIMO RISOLTO*
>>>>>>> 60a2c9a9 (.)
