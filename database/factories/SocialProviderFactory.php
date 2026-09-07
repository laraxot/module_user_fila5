<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\SocialProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\SocialProvider;

/**
 * @extends Factory<SocialProvider>
 */
>>>>>>> 2024e2e7 (.)
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
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
    public function definition(): array
    {
        return [];
    }
}
