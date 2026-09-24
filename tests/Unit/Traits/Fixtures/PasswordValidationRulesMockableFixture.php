<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits\Fixtures;

<<<<<<< HEAD
use Illuminate\Validation\Rules\Password;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Traits\PasswordValidationRules;

/**
 * Mockable stand-in for password rule consumers in unit tests.
 */
final class PasswordValidationRulesMockableFixture
{
    use PasswordValidationRules;

    /**
<<<<<<< HEAD
     * @return array<int, Password|string>
=======
     * @return array<int, \Illuminate\Validation\Rules\Password|array|string>
>>>>>>> 350420cb (Check & fix styling)
     */
    public function getPasswordRules(): array
    {
        return $this->passwordRules();
    }
}
