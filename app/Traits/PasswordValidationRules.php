<?php

declare(strict_types=1);

namespace Modules\User\Traits;

<<<<<<< HEAD
use Illuminate\Contracts\Validation\Rule;
use Modules\User\Rules\Password;

=======
use Illuminate\Validation\Rules\Password;

/**
 * Shared password validation rules for forms and Livewire components.
 */
>>>>>>> 2024e2e7 (.)
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
<<<<<<< HEAD
     * @return array<int, (Rule|array|string)>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password(), 'confirmed'];
=======
     * @return array<int, Password|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
>>>>>>> 2024e2e7 (.)
    }
}
