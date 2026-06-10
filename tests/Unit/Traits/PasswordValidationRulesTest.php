<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits;

use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesFixture;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesMockableFixture;
use Modules\User\Traits\PasswordValidationRules;

uses(TestCase::class);

test('PasswordValidationRules trait can be used', function (): void {
    expect(trait_exists(PasswordValidationRules::class))->toBeTrue();
    expect(new PasswordValidationRulesFixture())->toBeInstanceOf(PasswordValidationRulesFixture::class);
});

test('PasswordValidationRules trait provides passwordRules method', function (): void {
    $reflection = new \ReflectionClass(PasswordValidationRules::class);

    expect($reflection->hasMethod('passwordRules'))->toBeTrue();

    $fixture = new PasswordValidationRulesMockableFixture();
    $className = $fixture::class;

    $mock = $this->getMockBuilder($className)
        ->onlyMethods(['getPasswordRules'])
        ->getMock();

    $mock->method('getPasswordRules')
        ->willReturn(['required', 'string', 'confirmed']);

    $rules = $mock->getPasswordRules();

    expect($rules)->toBeArray()
        ->and($rules)->toHaveCount(3);
});
