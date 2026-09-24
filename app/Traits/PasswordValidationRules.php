<?php

declare(strict_types=1);

namespace Modules\User\Traits;

use Illuminate\Validation\Rules\Password;

<<<<<<< HEAD
/**
 * Shared password validation rules for forms and Livewire components.
 */
=======
>>>>>>> 350420cb (Check & fix styling)
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, Password|string>
     */
    protected function passwordRules(): array
    {
<<<<<<< HEAD
        return ['required', 'string', Password::default(), 'confirmed'];
=======
        return ['required', 'string', Password::min(8), 'confirmed'];
>>>>>>> 350420cb (Check & fix styling)
    }
}
