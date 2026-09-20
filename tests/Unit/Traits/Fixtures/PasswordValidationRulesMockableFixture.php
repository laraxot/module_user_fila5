<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits\Fixtures;

use Illuminate\Validation\Rules\Password;
use Modules\User\Traits\PasswordValidationRules;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

/**
 * Mockable stand-in for password rule consumers in unit tests.
 */
final class PasswordValidationRulesMockableFixture
{
    use PasswordValidationRules;

    /**
     * @return array<int, Password|string>
     */
    public function getPasswordRules(): array
    {
        return $this->passwordRules();
    }
}
