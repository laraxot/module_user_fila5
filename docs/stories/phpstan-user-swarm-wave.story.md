---
title: PHPStan swarm wave, bucket User (test owned)
type: story
module: User
phase: quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - phpstan-test-wave-user-b.story.md
  - 7.2.phpstan-test-harness-contracts.story.md
  - ../TESTING.md
  - ../00-INDEX.md
---

# PHPStan swarm wave — bucket User

Ondata coordinata da `.cursor-scratch/phpstan-wave/User.tsv` (161 errori totali sul bucket). Scope di questo agente: tutti i file in `User.files` **tranne** `tests/Feature/UserModelTest.php` (LOCKED, altro agente).

## Misura

| Momento | Errori sullo scope owned (11 file) |
|---|---|
| TSV iniziale (09:44) | **99** (161 − 62 su Feature/UserModelTest) |
| Verifica PHPStan sugli owned | **0** (exit 0) |

Comando:

```bash
cd laravel && ./vendor/bin/phpstan analyse \
  Modules/User/tests/Feature/UserManagementBusinessLogicTest.php \
  Modules/User/tests/Unit/HasTeamsTraitTest.php \
  Modules/User/tests/Unit/Models/DeviceTest.php \
  Modules/User/tests/Unit/Models/PermissionTest.php \
  Modules/User/tests/Unit/Models/ProfileTest.php \
  Modules/User/tests/Unit/Models/TeamTest.php \
  Modules/User/tests/Unit/Models/TenantTest.php \
  Modules/User/tests/Unit/PermissionTest.php \
  Modules/User/tests/Unit/TenantTest.php \
  Modules/User/tests/Unit/UserModelTest.php \
  Modules/User/tests/Unit/UserTest.php \
  --memory-limit=2G --no-progress
```

Artefatto: `.cursor-scratch/phpstan-wave/User.verify.txt`.

## Scopo (perche' gli errori del TSV esistevano)

I 99 errori owned non erano debito di produzione: erano test che assumevano API assenti o tipi troppo larghi dopo `find()`/`fresh()`.

| Famiglia TSV | Scopo | Correzione gia' presente sul disco |
|---|---|---|
| `method.notFound` (`isAdmin`/`isDoctor`/`isPatient`, `restore`) | Il model User/Device/Team/Tenant non espone quei helper / non usa SoftDeletes | `markTestSkipped` con motivo di prodotto |
| `property.nonObject` / `method.nonObject` dopo `find`/`first` | Il contratto Eloquent e' `T\|null` | `assertNotNull` / `firstOrFail` / guard `instanceof` prima dell'accesso |
| `pest.expectation.redundant` / `impossible` | Expectation gia' tipizzata o tipo incompatibile | Assertion ridotta al valore di business |
| `argument.type` su `Collection::every` / `str_contains` / `in_array` | Closure `mixed` e proprieta' nullable | Closure tipizzate (`Device $d`) e coalesce (`?? []`, `(string)`) |
| `theCodingMachineSafe.function` | `json_encode` puo' fallire | `use function Safe\json_encode;` |
| `variable.unused` | Variabile di arrange non letta | Rimossa o usata nell'assert |

Nessun ignore/baseline/neon: solo allineamento test ↔ API reali.

## File owned (verificati a 0)

- `tests/Feature/UserManagementBusinessLogicTest.php`
- `tests/Unit/HasTeamsTraitTest.php`
- `tests/Unit/Models/DeviceTest.php`
- `tests/Unit/Models/PermissionTest.php`
- `tests/Unit/Models/ProfileTest.php`
- `tests/Unit/Models/TeamTest.php`
- `tests/Unit/Models/TenantTest.php`
- `tests/Unit/PermissionTest.php`
- `tests/Unit/TenantTest.php`
- `tests/Unit/UserModelTest.php`
- `tests/Unit/UserTest.php`

## Skipped

- `tests/Feature/UserModelTest.php` — LOCKED / owned by another agent (62 errori nel TSV, fuori scope).

## Note operative

- Protocollo lock/check/mtime≥120 rispettato; lock acquisiti solo sui file liberi; unlock a fine verifica.
- Parte dei file era concorrente (`lane-user` su Permission*): al momento della misura finale lo scope owned passava gia' PHPStan a 0 (TSV stale rispetto al working tree).
- Contesto ondata precedente: [phpstan-test-wave-user-b.story.md](./phpstan-test-wave-user-b.story.md).

## Collegamenti

- [Indice docs User](../00-INDEX.md)
- [TESTING.md](../TESTING.md)
- [7.2 harness contracts](./7.2.phpstan-test-harness-contracts.story.md)
