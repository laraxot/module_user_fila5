<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\SsoProvider;

/**
 * @extends Factory<SsoProvider>
=======

/**
 * @extends Factory<\Modules\User\Models\SsoProvider>
>>>>>>> 350420cb (Check & fix styling)
 */
class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = SsoProvider::class;
=======
    protected $model = \Modules\User\Models\SsoProvider::class;
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
