<?php

declare(strict_types=1);

require_once __DIR__.'/Support/helpers.php';

/*
 * Bootstrap Pest — modulo User.
 * Helper globali: tests/Support/helpers.php (composer autoload-dev files).
 * Ogni file Pest dichiara uses(\Modules\User\Tests\TestCase::class).
 */

// Vietato expect()->extend() qui (PHPStan method.internalClass su PestExpectation).
