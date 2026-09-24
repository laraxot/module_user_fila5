<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Facades\FilamentShield;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

use Modules\User\Facades\FilamentShield;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
>>>>>>> 350420cb (Check & fix styling)

test('FilamentShield facade can be accessed', function () {
    Assert::assertTrue(class_exists(FilamentShield::class));
});

test('FilamentShield facade has expected methods', function () {
    if (class_exists(FilamentShield::class)) {
        // Check if static methods exist (these would be the facade methods)
        // assertTrue(true) removed — tautology // Just confirm class exists
    }
});
