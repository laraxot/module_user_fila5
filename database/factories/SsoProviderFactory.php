<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\SsoProvider;

/**
 * @extends Factory<SsoProvider>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = \Modules\User\Models\SsoProvider::class;
=======
    protected $model = SsoProvider::class;
>>>>>>> 2024e2e7 (.)
=======
    protected $model = SsoProvider::class;
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
