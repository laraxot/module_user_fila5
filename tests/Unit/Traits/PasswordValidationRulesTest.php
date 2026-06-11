<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use PHPUnit\Framework\Assert;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesFixture;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesMockableFixture;
use Modules\User\Traits\PasswordValidationRules;
use ReflectionClass;

test('PasswordValidationRules trait can be used', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    Assert::assertTrue(trait_exists(PasswordValidationRules::class));
    Assert::assertInstanceOf(PasswordValidationRulesFixture::class, new PasswordValidationRulesFixture());
});

test('PasswordValidationRules trait provides passwordRules method', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $reflection = new ReflectionClass(PasswordValidationRules::class);

    Assert::assertTrue($reflection->hasMethod('passwordRules'));
    $fixture = new PasswordValidationRulesMockableFixture();
    $rules = $fixture->getPasswordRules();

    Assert::assertCount(3, $rules);
    Assert::assertSame(['required', 'string', 'confirmed'], $rules);
});
