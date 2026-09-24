<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\ModelRole;

/**
 * @extends Factory<ModelRole>
=======

/**
 * @extends Factory<\Modules\User\Models\ModelRole>
>>>>>>> 350420cb (Check & fix styling)
 */
class ModelRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = ModelRole::class;
=======
    protected $model = \Modules\User\Models\ModelRole::class;
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
