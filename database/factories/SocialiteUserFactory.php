<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\SocialiteUser;

/**
 * @extends Factory<SocialiteUser>
=======

/**
 * @extends Factory<\Modules\User\Models\SocialiteUser>
>>>>>>> 350420cb (Check & fix styling)
 */
class SocialiteUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = SocialiteUser::class;
=======
    protected $model = \Modules\User\Models\SocialiteUser::class;
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
