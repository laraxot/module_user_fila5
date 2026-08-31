<?php

declare(strict_types=1);

use Modules\User\Facades\FilamentShield;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use ReflectionClass;

uses(TestCase::class)->group('no-user-db');
=======

uses(TestCase::class);
>>>>>>> laraxot/dev

test('FilamentShield facade can be accessed', function () {
    Assert::assertTrue(class_exists(FilamentShield::class));
});

test('FilamentShield facade has expected methods', function () {
<<<<<<< HEAD
    Assert::assertTrue(class_exists(FilamentShield::class));
    Assert::assertTrue((new ReflectionClass(FilamentShield::class))->hasMethod('getFacadeAccessor'));
=======
    if (class_exists(FilamentShield::class)) {
        // Check if static methods exist (these would be the facade methods)
        // assertTrue(true) removed — tautology // Just confirm class exists
    }
>>>>>>> laraxot/dev
});
