<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\PasswordReset;

/**
 * @extends Factory<PasswordReset>
=======

/**
 * @extends Factory<\Modules\User\Models\PasswordReset>
>>>>>>> 350420cb (Check & fix styling)
 */
class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = PasswordReset::class;
=======
    protected $model = \Modules\User\Models\PasswordReset::class;
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Define the model's default state.
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
