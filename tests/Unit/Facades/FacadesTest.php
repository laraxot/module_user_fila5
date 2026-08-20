<?php

declare(strict_types=1);

use Modules\User\Facades\FilamentShield;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class)->group('no-user-db');

test('FilamentShield facade can be accessed', function () {
    Assert::assertTrue(class_exists(FilamentShield::class));
});

test('FilamentShield facade has expected methods', function () {
    Assert::assertTrue(class_exists(FilamentShield::class));
    Assert::assertTrue((new ReflectionClass(FilamentShield::class))->hasMethod('getFacadeAccessor'));
});
