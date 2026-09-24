<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\PersonalAccessToken;

/**
 * @extends Factory<PersonalAccessToken>
=======

/**
 * @extends Factory<\Modules\User\Models\PersonalAccessToken>
>>>>>>> 350420cb (Check & fix styling)
 */
class PersonalAccessTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = PersonalAccessToken::class;
=======
    protected $model = \Modules\User\Models\PersonalAccessToken::class;
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
