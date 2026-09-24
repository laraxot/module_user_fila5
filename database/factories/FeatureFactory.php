<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\Feature;

/**
 * @extends Factory<Feature>
=======

/**
 * @extends Factory<\Modules\User\Models\Feature>
>>>>>>> 350420cb (Check & fix styling)
 */
class FeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = Feature::class;
=======
    protected $model = \Modules\User\Models\Feature::class;
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
