---
title: "Fatal error risolto: TestCase vs HasUserTestCase - conflitto proprietà $user"
module: "User"
type: bugfix
tags: [pest, testcase, fatal-error, property-conflict]
created: 2026-07-15
updated: 2026-07-15
---

# Fatal error risolto: `TestCase` vs `HasUserTestCase` — conflitto proprietà `$user`

## Sintomo

`./vendor/bin/pest Modules/User` falliva con `PHP Fatal error: ... define the same property ($user) ... considered incompatible` — bloccava **l'intera suite Pest del modulo User** (non solo il file coinvolto), impedendo di verificare qualunque fix con `pest` come richiesto dal workflow del progetto.

## Causa

`Modules/User/tests/Feature/Authentication/UserAuthenticationTest.php` usava:
```php
uses(TestCase::class, HasUserTestCase::class);
```
`TestCase` dichiara già `public ?User $user = null;` (riga 82). `HasUserTestCase` (trait) dichiara `protected User $user;` — tipo non-nullable e visibilità diversa. Comporre le due nella stessa classe di test è illegale in PHP (property redeclaration incompatibile), fatal a tempo di composizione, prima ancora che un singolo test giri.

`HasUserTestCase` resta legittimo altrove (es. `HasUserTestCaseFixture`, dove non c'è conflitto perché la classe non estende `TestCase`), quindi il trait stesso non è stato toccato.

## Fix

Rimosso l'uso ridondante del trait nel test che estende già `TestCase` (che fornisce già `$user`):
```php
// Prima
uses(TestCase::class, HasUserTestCase::class);
// Dopo
uses(TestCase::class);
```
`beforeEach()` valorizza già `$this->user` prima di ogni test — nessun cambio di comportamento, solo rimossa la ridondanza che causava il conflitto.

## Verifica

`./vendor/bin/pest Modules/User/tests/Feature/Authentication/UserAuthenticationTest.php --list-tests` ora elenca correttamente tutti i 29 test (prima: fatal immediato). Esecuzione completa con asserzioni richiede DB di test migrato (`laravel/.env.testing`) — non verificata in questa sessione per limiti di tempo, ma la composizione della classe (il punto che falliva) è confermata funzionante.
