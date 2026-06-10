<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits;

use Modules\User\Tests\TestCase;
use Modules\User\Traits\PasswordValidationRules;

uses(TestCase::class);

test('PasswordValidationRules trait can be used', function (): void {
    expect(trait_exists(PasswordValidationRules::class))->toBeTrue();

    $reflection = new \ReflectionClass(PasswordValidationRules::class);

    expect($reflection->hasMethod('passwordRules'))->toBeTrue();
});

test('PasswordValidationRules has expected methods', function (): void {
    $reflection = new \ReflectionClass(PasswordValidationRules::class);

    expect($reflection->getMethod('passwordRules')->isProtected())->toBeTrue();
});
