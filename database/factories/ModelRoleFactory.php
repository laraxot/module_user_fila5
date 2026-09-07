<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\ModelRole;

/**
 * @extends Factory<ModelRole>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class ModelRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = \Modules\User\Models\ModelRole::class;
=======
    protected $model = ModelRole::class;
>>>>>>> 2024e2e7 (.)
=======
    protected $model = ModelRole::class;
>>>>>>> f589f9b2 (.)

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> f589f9b2 (.)
    public function definition(): array
    {
        return [];
    }
}
