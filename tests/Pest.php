<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Bootstrap Pest del modulo User
|--------------------------------------------------------------------------
|
| Gli helper di dominio stanno in Modules/User/tests/Helpers.php, che
| Pest\Bootstrappers\BootFiles carica da solo prima di questo file: nessun
| require_once, nessuna cartella tests/Support.
|
| `pest()->extend(TestCase::class)->in(__DIR__.'/Unit', __DIR__.'/Feature')` è la forma
| **fortemente consigliata** (XOT-5.41). I file hanno ancora `uses(TestCase::class)` — XOR:
| aggiungere `extend()` qui **solo** dopo aver rimosso gli `uses()` per-file (migrazione
| directory per directory). Vedi pest5-configuring-tests.md, strato 3.
|
*/
