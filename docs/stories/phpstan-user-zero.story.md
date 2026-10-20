---
title: PHPStan User a zero (solo tests)
type: story
module: User
phase: quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - ../bmad/phpstan-user-contract-fix.md
  - phpstan-test-wave-user-b.story.md
  - ../testing-phpstan-progress.md
  - ../TESTING.md
---

# PHPStan User a zero (solo tests)

## Scopo

Portare a **0** gli errori PHPStan del modulo User. Inventario di partenza: 56 errori, tutti in `tests/**` (`/tmp/phpstan_by_module/User.txt`). Nessun silenziatore (`ignore` / baseline / `@var` / cast finti).

Il contratto production (`TeamContract`, `switchTeam(TeamContract)`, SoftDeletes commentato su `Team`) e' corretto: i test si allineano al contratto, non il contrario.

## Misura

| Momento | Errori `Modules/User` |
|---|---|
| Inventario | 56 (solo tests) |
| Verifica | **0** |

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/User --no-progress
```

## Famiglie e fix

| Famiglia | File | Scopo | Fix |
|---|---|---|---|
| `pest.expectation.redundant` | `HasTeamsTraitTest`, `UserTest`, `UserModelTest`, `TenantTest`, `PermissionTest` | Il tipo e' gia' noto a PHPStan | Rimossi `toBeInstanceOf` / `toBeString` / `toBeBool` ridondanti; assert sul comportamento |
| `pest.expectation.impossible` | `HasTeamsTraitTest`, `UserTest` | Aspettativa sul tipo sbagliato (`toBeNull` su `string`, `toBeInstanceOf` su `string\|null`) | Aspettativa allineata al tipo reale (`teamRoleName` → `'Unknown'`; `type` → enum) |
| `property.nonObject` / `argument.type` su `TeamContract\|null` | `HasTeamsTraitTest` | `personalTeam()` / `teamRole()` possono essere null | Guard `instanceof` + `RuntimeException` prima di accedere a `$id` / `$name`; niente `switchTeam(null)` |
| `property.nonObject` su model\|null | `UserTest`, `ProfileTest`, `TenantTest`, `TeamTest`, `PermissionTest` | `first()` e' nullable | `firstOrFail()` o `assertNotNull` / early fail prima della property |
| `property.protected` | `Models/PermissionTest` | `$connection` / `$keyType` protetti | API pubbliche `getConnectionName()` / `getKeyType()` |
| `function.impossibleType` / `alreadyNarrowedType` | `Models/PermissionTest` | `method_exists(newFactory)` sempre false; `getTable` sempre true | Assert su `Permission::factory()` e `getTable()` reali |
| SoftDeletes / `restore` | `Models/TeamTest` | Trait SoftDeletes **commentato** su `Team` | Test delete = hard delete (`assertDatabaseMissing`); restore skipped |
| `missingType.iterableValue` | `UserModelTest` | `stubUser($attributes)` senza value type | `@param array<string, mixed> $attributes` |
| `assign.propertyType` Carbon | `UserModelTest` | `Carbon\Carbon` vs `Illuminate\Support\Carbon` | Uso di `Illuminate\Support\Carbon` |

## File toccati (scope)

- `tests/Unit/HasTeamsTraitTest.php`
- `tests/Unit/UserTest.php`
- `tests/Unit/UserModelTest.php`
- `tests/Unit/TenantTest.php`
- `tests/Unit/PermissionTest.php`
- `tests/Unit/Models/TeamTest.php`
- `tests/Unit/Models/ProfileTest.php`
- `tests/Unit/Models/PermissionTest.php`
- `docs/stories/phpstan-user-zero.story.md` (questa story)

Production `app/` non modificato: il contratto e' gia' corretto.

## Decisioni

1. **Null safety vera**: early assert / `instanceof` / `firstOrFail`, non `@var` ne' cast.
2. **SoftDeletes**: su `Team` il trait e' commentato → i test non devono chiamare `restore()` ne' `assertSoftDeleted`.
3. **Permission**: proprietà protette solo via getter pubblici (o reflection se servisse ispezionare la dichiarazione, non usato qui).
