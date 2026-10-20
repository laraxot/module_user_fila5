---
title: PHPStan wave lane — User (con Job/Notify)
type: story
module: User
phase: quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - phpstan-user-swarm-wave.story.md
  - phpstan-test-wave-user.story.md
  - ../../../Job/docs/stories/phpstan-wave-lane.story.md
  - ../../../Notify/docs/stories/phpstan-wave-lane.story.md
---

# PHPStan wave lane — User

Lane disgiunta `User + Job + Notify` su TSV `.cursor-scratch/phpstan-wave/User.tsv`.

## Scopo

Gli errori TSV (27) non erano debito di prodotto su route oauth/login lang: erano (1) docblock/`void` vs return `?RedirectResponse` su reset/login Livewire già allineati, (2) `new.resultUnused` nei test Events dove `new Event` non veniva asserito. Non toccare le route lang oauth già sistemate.

## Misura

| Momento | Errori sui path TSV |
|---|---|
| Baseline TSV | **27** in 7 file |
| Dopo (flock + path TSV) | **0** |

## File TSV

- `app/Filament/Widgets/Auth/ResetPasswordWidget.php`
- `app/Http/Livewire/Auth/Login.php`
- `tests/Unit/Events/EventClassesTest.php`
- `tests/Unit/Events/EventsTest.php`
- `tests/Unit/Events/UserEventsCoverageTest.php`
- `tests/Unit/Rules/CheckOtpExpiredRuleTest.php`
- `tests/Unit/UserModulePhpstanFixesTest.php`

## Verifica

```bash
cd laravel && flock -w 1800 /tmp/phpstan-gate.lock nice -n 10 \
  ./vendor/bin/phpstan analyse <path TSV> --memory-limit=2G --no-progress --error-format=raw
```

Artefatto: `.cursor-scratch/phpstan-wave/User.verify.raw` (exit 0).
Nessun ignore/neon. Nessun commit.
