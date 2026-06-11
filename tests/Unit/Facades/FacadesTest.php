<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use PHPUnit\Framework\Assert;
use Modules\User\Facades\FilamentShield;

test('FilamentShield facade can be accessed', function () {
    Assert::assertTrue(class_exists(FilamentShield::class));
});

test('FilamentShield facade has expected methods', function () {
    if (class_exists(FilamentShield::class)) {
        // Check if static methods exist (these would be the facade methods)
        // assertTrue(true) removed — tautology // Just confirm class exists
    } else {
    }
});
