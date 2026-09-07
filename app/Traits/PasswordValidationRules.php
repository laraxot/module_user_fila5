<?php

declare(strict_types=1);

namespace Modules\User\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Validation\Rule;
use Modules\User\Rules\Password;

=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Validation\Rules\Password;

/**
 * Shared password validation rules for forms and Livewire components.
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<int, (Rule|array|string)>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password(), 'confirmed'];
=======
=======
>>>>>>> f589f9b2 (.)
     * @return array<int, Password|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
