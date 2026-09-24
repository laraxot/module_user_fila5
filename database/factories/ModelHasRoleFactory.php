<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\ModelHasRole;

/**
 * @extends Factory<ModelHasRole>
=======

/**
 * @extends Factory<\Modules\User\Models\ModelHasRole>
>>>>>>> 350420cb (Check & fix styling)
 */
class ModelHasRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = ModelHasRole::class;
=======
    protected $model = \Modules\User\Models\ModelHasRole::class;
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
