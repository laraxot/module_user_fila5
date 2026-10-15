<?php

declare(strict_types=1);

namespace Tests\Modules\User\Unit\Traits;

use Tests\Modules\User\TestCase;
use Tests\Modules\User\Unit\Traits\Fixtures\CreatesApplicationFixture;
use Tests\Modules\User\Unit\Traits\Fixtures\HasPassportConfigurationFixture;
use Tests\Modules\User\Unit\Traits\Fixtures\HasPasswordExpiryFixture;
use Tests\Modules\User\Unit\Traits\Fixtures\HasRolesTraitFixture;
use Tests\Modules\User\Unit\Traits\Fixtures\HasUserTestCaseFixture;
use Tests\Modules\User\Unit\Traits\Fixtures\PasswordValidationRulesMockableFixture;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('phpstan fixtures reference dormant traits', function (): void {
    Assert::assertInstanceOf(PasswordValidationRulesMockableFixture::class, new PasswordValidationRulesMockableFixture);
    Assert::assertInstanceOf(HasRolesTraitFixture::class, new HasRolesTraitFixture);
    Assert::assertInstanceOf(HasPasswordExpiryFixture::class, new HasPasswordExpiryFixture);
    Assert::assertTrue(class_exists(HasPassportConfigurationFixture::class));
    Assert::assertInstanceOf(CreatesApplicationFixture::class, new CreatesApplicationFixture);
    Assert::assertInstanceOf(HasUserTestCaseFixture::class, new HasUserTestCaseFixture);
});
