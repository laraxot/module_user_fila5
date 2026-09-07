<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\PersonalAccessToken;

/**
 * @extends Factory<PersonalAccessToken>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class PersonalAccessTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = \Modules\User\Models\PersonalAccessToken::class;
=======
    protected $model = PersonalAccessToken::class;
>>>>>>> 2024e2e7 (.)
=======
    protected $model = PersonalAccessToken::class;
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
