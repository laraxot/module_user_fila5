<?php

declare(strict_types=1);

namespace Modules\User\Traits;

<<<<<<< HEAD
use Illuminate\Validation\Rules\Password;

/**
 * Shared password validation rules for forms and Livewire components.
 */
=======
use Illuminate\Contracts\Validation\Rule;
use Modules\User\Rules\Password;

>>>>>>> f548be94 (.)
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
<<<<<<< HEAD
     * @return array<int, Password|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
=======
     * @return array<int, (Rule|array|string)>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password(), 'confirmed'];
>>>>>>> f548be94 (.)
    }
}
