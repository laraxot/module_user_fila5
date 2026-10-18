---
title: "BMAD + Second Brain — Fix Log"
type: note
status: draft
updated: 2026-10-07
tags: [docs, user]
qmd: "bmad + second brain   fix log user"
---
# BMAD + Second Brain — Fix Log

## Diagnosi
- `main_module=''` → `XotData::getProfileClass()` falliva (`InvalidArgumentException`)
- `IsProfileTrait.php`: duplicato `use UserContract`
- `BaseProfile.php`: `id` UUID mancante (`PDOException` 1364)
- PHPStan: 309 `class.notFound` (mancanti `User`/`Profile` nei test, Riferimenti `Quaeris`)

## Fix applicati (SSoT)
- `Modules\Xot\Contracts\UserContract` / `ProfileContract`
- `XotData.php:31` → `main_module = 'User'`
- `IsProfileTrait.php`: rimosso duplicato
- `Profile.php:50` → `@property-read UserContract|null $user`
- `BaseProfile.php`: `$incrementing=false`, `$keyType='string'`, UUID `booted()`
- Gdpr actions: `UserContract $user` (nessun modello concreto in public type-hints)

## Docs aggiornati
- `Modules/User/docs/` → SSoT contratti
- `demo/` e `docs/` nei moduli: rifattorizzazione con `UserContract`

## Prossimi passi
- Eseguire `php artisan migrate` per DB `restaurant_data`
- Verificare `phpstan analyse Modules` con baseline/alias corretto

## Regola URL localizzati — 2026-10-18

`LaravelLocalization::getLocalizedURL()` ha firma
`getLocalizedURL($locale, $url, ...)`: il primo argomento non è l'URL.
Per localizzare il percorso corrente usare `localizeURL($url)`; in alternativa
passare sempre esplicitamente locale e URL. Questo evita che `/it` venga
interpretato come locale e causi `UnsupportedLocaleException`.
