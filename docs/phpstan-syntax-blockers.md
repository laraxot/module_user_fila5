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

- `database/factories/OauthClientFactory.php`
- `database/factories/OauthAccessTokenFactory.php`
- `database/factories/OauthAuthCodeFactory.php`
- `database/factories/OauthRefreshTokenFactory.php`

### 2. Migration con marker di merge (risolto)

Le migration in `database/migrations/` non contengono più marker `<<<<<<<`, `=======`, `>>>>>>>`.

Protezione: `tests/Feature/Database/Migrations/UserMigrationSyntaxTest.php`.

## Residui type-level (non bloccanti)

Wrapper Passport e risorse Filament possono ancora generare warning PHPStan su scope globale `Modules/`; su scope `Modules/User/app` il livello 10 è pulito.

## Collegamenti

- [QUALITY_STATUS.md](../QUALITY_STATUS.md)
- [module-commit-push-after-change](wiki/rules/module-commit-push-after-change.md)
