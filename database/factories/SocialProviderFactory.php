<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\SocialProvider;

/**
 * @extends Factory<SocialProvider>
 */
<<<<<<< HEAD
=======
use Modules\User\Models\SocialProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

>>>>>>> f548be94 (.)
=======
use Modules\User\Models\SocialProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\SocialProvider;

/**
 * @extends Factory<SocialProvider>
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class SocialProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = SocialProvider::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> f548be94 (.)
=======
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> laraxot/dev
    public function definition(): array
    {
        return [];
    }
}
