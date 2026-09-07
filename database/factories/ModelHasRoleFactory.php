<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\ModelHasRole;

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\ModelHasRole;

/**
 * @extends Factory<ModelHasRole>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class ModelHasRoleFactory extends Factory
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
    protected $model = ModelHasRole::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return array<int|string>
     *
     * @psalm-return array{role_id: int, model_type: string, model_id: int}
     */
    public function definition(): array
    {
        return [
            'role_id' => $this->faker->randomNumber(5, false),
            'model_type' => $this->faker->word,
            'model_id' => $this->faker->randomNumber(5, false),
        ];
=======
=======
>>>>>>> f589f9b2 (.)
     */
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
