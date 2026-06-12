<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits;

use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesFixture;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesMockableFixture;
use Modules\User\Traits\PasswordValidationRules;
use ReflectionClass;

class PasswordValidationRulesTest extends TestCase
{
    public function test_password_validation_rules_trait_can_be_used(): void
    {
        $this->assertTrue(trait_exists(PasswordValidationRules::class));
        $this->assertInstanceOf(PasswordValidationRulesFixture::class, new PasswordValidationRulesFixture());
    }

    public function test_password_validation_rules_trait_provides_password_rules_method(): void
    {
        $reflection = new ReflectionClass(PasswordValidationRules::class);

        $this->assertTrue($reflection->hasMethod('passwordRules'));
        $fixture = new PasswordValidationRulesMockableFixture();
        $rules = $fixture->getPasswordRules();

        $this->assertCount(3, $rules);
        $this->assertSame(['required', 'string', 'confirmed'], $rules);
    }
}
