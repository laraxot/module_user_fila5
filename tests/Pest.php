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
| Qui NON si lega il TestCase con pest()->extend(...)->in('.'). I file di test
| del modulo dichiarano già `uses(TestCase::class);` singolarmente, e le due
| forme non convivono — Pest solleva TestCaseAlreadyInUse:
|
|   The test case [Modules\User\Tests\TestCase] may not be used here.
|   The folder [...] is already bound to the test case [...].
|
| Il binding globale torna utile solo quando si tolgono i `uses()` dai file,
| che è una migrazione a sé. Vedi
| Modules/Xot/docs/wiki/concepts/pest5-configuring-tests.md, strato 3.
|
*/
