<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\User\Models\SsoProvider;

/**
 * @extends Factory<SsoProvider>
 */
<<<<<<< HEAD
=======

>>>>>>> 60a2c9a9 (.)
=======

=======
use Modules\User\Models\SsoProvider;

/**
 * @extends Factory<SsoProvider>
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class SsoProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = SsoProvider::class;
=======
    protected $model = \Modules\User\Models\SsoProvider::class;
>>>>>>> 60a2c9a9 (.)
=======
    protected $model = \Modules\User\Models\SsoProvider::class;
=======
    protected $model = SsoProvider::class;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    protected $model = SsoProvider::class;
>>>>>>> laraxot/dev

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
>>>>>>> 60a2c9a9 (.)
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
