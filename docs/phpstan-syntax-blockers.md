<<<<<<< HEAD
---
title: "PHPStan — stato modulo User (2026-07-08)"
type: concept
tags: [phpstan, syntax, blockers]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan-syntax-blockers phpstan — stato modulo user (2026-07-08)"
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

Pattern corretti: `$this->faker`, array e closure `state()` integre.

File ripristinati:
=======
# PHPStan Syntax Blockers - 2026-03-10

## Contesto

Il run completo `./vendor/bin/phpstan analyse Modules` evidenzia nel modulo `User` un cluster di severe syntax errors prima ancora dei type errors.

## Due cause principali osservate

### 1. Factory corrotte

Pattern visto nelle factory OAuth:

- `$faker` usato invece di `$this->faker`;
- virgole mancanti negli array;
- callback `state(fn (...)` mutilate;
- parentesi quadre/tonde chiuse male.

File ripristinati in questo passaggio:
>>>>>>> 350420cb (Check & fix styling)

- `database/factories/OauthClientFactory.php`
- `database/factories/OauthAccessTokenFactory.php`
- `database/factories/OauthAuthCodeFactory.php`
- `database/factories/OauthRefreshTokenFactory.php`

<<<<<<< HEAD
### 2. Migration con marker di merge (risolto)

Le migration in `database/migrations/` non contengono più marker `<<<<<<<`, `=======`, `>>>>>>>`.

Protezione: `tests/Feature/Database/Migrations/UserMigrationSyntaxTest.php`.

## Residui type-level (non bloccanti)

Wrapper Passport e risorse Filament possono ancora generare warning PHPStan su scope globale `Modules/`; su scope `Modules/User/app` il livello 10 è pulito.

## Collegamenti

- [quality-status-2.md](../quality-status-2.md)
- [module-commit-push-after-change](wiki/rules/module-commit-push-after-change.md)
=======
### 2. Migration con marker di merge

Molte migration del modulo contengono marker tipo:

- `<<<<<<< HEAD`
- `=======`
- `>>>>>>> 74e589dbb (.)`

Questi file non sono ancora tutti ripristinati e restano la causa principale per cui il run globale di PHPStan resta incompleto.

## Conclusione operativa

Prima di parlare di level 10 compliance nel modulo `User`, va ripristinata la parsabilita' delle migration infette da merge conflict.

## Azione operativa 2026-03-10

- Prima correzione obbligatoria: rimuovere tutti i marker `<<<<<<<`, `=======`, `>>>>>>>` dalle migration del modulo `User`.
- In caso di conflitto banale tra closure tipizzate e closure non tipizzate, la variante canonica resta quella Laraxot gia' usata nel modulo:
  `static function (Blueprint $table): void`.
- Dopo la pulizia sintattica bisogna rilanciare:
  `XDEBUG_MODE=off ./vendor/bin/phpstan analyse Modules --memory-limit=-1 --debug --no-progress`
  per distinguere i severe syntax errors dai type errors reali.
- La regressione va protetta anche con un test Pest che scorra le migration `Modules/User/database/migrations` e fallisca se trova merge marker o syntax error PHP.

## Progresso effettivo di questo passaggio

- il run globale e' sceso da `171` a `106` errori;
- le factory OAuth ripristinate ora passano PHPStan su scope mirato;
- aggiunto test Pest sulle factory OAuth, con esito verde;
- corretti anche `database/seeders/UserMassSeeder.php`, `database/seeders/RolesSeeder.php` e `database/factories/TenantFactory.php`, che ora passano PHPStan su scope mirato.

## Cluster User residui piu' importanti

- wrapper Passport ancora poco descritti a livello PHPDoc (`OauthAccessToken`, `OauthRefreshToken`, `OauthClient`);
- risorse Filament con `$model` su wrapper Passport che PHPStan non riconosce bene come `Model`;
- `OauthPersonalAccessClient` estende una classe Passport che in questo ambiente non viene risolta da PHPStan;
- restano diversi punti in cui mancano proprieta' annotate sui modelli Passport wrapper.
>>>>>>> 350420cb (Check & fix styling)
