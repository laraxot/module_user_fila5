---
title: "Correzioni PHPStan — Modulo User"
type: concept
tags: [phpstan, user, fixes]
updated: 2026-11-17
related:
  - ./stories/phpstan-zero-errors-user.story.md
  - ./stories/phpstan-ignore-removal.story.md
  - ../../../../docs/stories/all-modules-phpstan-zero-errors.story.md
  - ../../../../bashscripts/docs/prompts/11-phpstan.md
---

# Correzioni PHPStan — Modulo User

## Scopo

Il modulo User gestisce autenticazione, ruoli, team, tenant e OAuth. Gli errori PHPStan qui non sono "tipi da zittire": indicano contratti Filament/Livewire/lang corrotti o test che non tipizzano la pagina sotto test.

## Canonico (SSoT)

- Story operativa: [phpstan-zero-errors-user.story.md](./stories/phpstan-zero-errors-user.story.md)
- Gate: `cd laravel && ./vendor/bin/phpstan analyse Modules` (neon immutabile)
- Prompt: [11-phpstan.md](../../../../bashscripts/docs/prompts/11-phpstan.md)

## Fix sessione ripresa (2026-11-17)

| File | Scopo | Fix |
|------|-------|-----|
| `lang/it/recent_logins.php` | Label UI accessi recenti | Tolte chiavi `label` duplicate che sovrascrivevano l'italiano con il nome chiave |
| `Http/Livewire/Team/Change.php` | Cambio team Livewire | `list<array<…>>` su `$teams`; `view-string` su render |
| `Http/Livewire/Auth/Passwords/Reset.php` | Reset password | Rimosso `@phpstan-ignore`; `Assert::string` su status + `trans()` |
| `tests/.../CreateUserTest.php` | Contratto pagina CreateUser | `TestCase::$createUserPage` + `Assert` (niente `$this->page` mistyped) |

## Ridondanza docs

Esistono decine di `phpstan*.md` storici in questa cartella (UPPERCASE, date nei nomi, duplicati). **Non crearne altri.** Aggiorna questa pagina o la story. I legacy restano come archivio finché un lint wiki non li consolida.

## Vincoli

- Mai `@phpstan-ignore` / baseline / edit `phpstan.neon`
- `mixed` solo ultima spiaggia
- Pest solo con DB `*_test`
