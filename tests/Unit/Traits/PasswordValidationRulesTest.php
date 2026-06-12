<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits;

use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesFixture;
use Modules\User\Tests\Unit\Traits\Fixtures\PasswordValidationRulesMockableFixture;
use Modules\User\Traits\PasswordValidationRules;

class PasswordValidationRulesTest extends TestCase
{
    public function testPasswordValidationRulesTraitCanBeUsed(): void
    {
        $this->assertTrue(trait_exists(PasswordValidationRules::class));
        $this->assertInstanceOf(PasswordValidationRulesFixture::class, new PasswordValidationRulesFixture());
    }

    public function testPasswordValidationRulesTraitProvidesPasswordRulesMethod(): void
    {
        $reflection = new \ReflectionClass(PasswordValidationRules::class);

        $this->assertTrue($reflection->hasMethod('passwordRules'));
        $fixture = new PasswordValidationRulesMockableFixture();
        $rules = $fixture->getPasswordRules();

        $this->assertCount(3, $rules);
        $this->assertSame(['required', 'string', 'confirmed'], $rules);
    }
}
