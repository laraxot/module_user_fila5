<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD

=======
use Modules\User\Models\ModelRole;

/**
 * @extends Factory<ModelRole>
 */
>>>>>>> 2024e2e7 (.)
class ModelRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = \Modules\User\Models\ModelRole::class;
=======
    protected $model = ModelRole::class;
>>>>>>> 2024e2e7 (.)

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
    public function definition(): array
    {
        return [];
    }
}
