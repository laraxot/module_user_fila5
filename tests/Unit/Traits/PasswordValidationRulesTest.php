<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits;

use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesFixture;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesMockableFixture;
use Modules\User\Traits\PasswordValidationRules;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Password Validation Rules', function (): void {
    test('password validation rules trait can be used', function (): void {
        Assert::assertTrue(trait_exists(PasswordValidationRules::class));
        Assert::assertInstanceOf(
            PasswordValidationRulesFixture::class,
<<<<<<< HEAD
            new PasswordValidationRulesFixture,
=======
            new PasswordValidationRulesFixture(),
>>>>>>> laraxot/dev
        );
    });

    test('password validation rules trait provides password rules method', function (): void {
        $reflection = new \ReflectionClass(PasswordValidationRules::class);

        Assert::assertTrue($reflection->hasMethod('passwordRules'));
<<<<<<< HEAD
        $fixture = new PasswordValidationRulesMockableFixture;
=======
        $fixture = new PasswordValidationRulesMockableFixture();
>>>>>>> laraxot/dev
        $rules = $fixture->getPasswordRules();

        Assert::assertCount(4, $rules);
        Assert::assertSame('required', $rules[0]);
        Assert::assertSame('string', $rules[1]);
        Assert::assertSame('confirmed', $rules[3]);
    });
});
