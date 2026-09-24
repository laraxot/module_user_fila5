<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\SocialProvider;

/**
 * @extends Factory<SocialProvider>
=======

/**
 * @extends Factory<\Modules\User\Models\SocialProvider>
>>>>>>> 350420cb (Check & fix styling)
 */
class SocialProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = SocialProvider::class;
=======
    protected $model = \Modules\User\Models\SocialProvider::class;
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
