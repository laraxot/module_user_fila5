<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\SsoProvider;

/**
 * @extends Factory<SsoProvider>
 */
=======

>>>>>>> 60a2c9a9 (.)
class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = SsoProvider::class;
=======
    protected $model = \Modules\User\Models\SsoProvider::class;
>>>>>>> 60a2c9a9 (.)

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> 60a2c9a9 (.)
    public function definition(): array
    {
        return [];
    }
}
