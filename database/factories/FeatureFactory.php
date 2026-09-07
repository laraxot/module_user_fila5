<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Feature;

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\Feature;

/**
 * @extends Factory<Feature>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class FeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $model = Feature::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function definition(): array
    {
        return [
            // 'user_id' => $this->faker->randomNumber(5),
            'name' => $this->faker->name,
            'personal_team' => $this->faker->boolean,
        ];
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
