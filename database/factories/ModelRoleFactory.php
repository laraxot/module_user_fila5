<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\User\Models\ModelRole;

/**
 * @extends Factory<ModelRole>
 */
<<<<<<< HEAD
=======

>>>>>>> 60a2c9a9 (.)
=======

=======
use Modules\User\Models\ModelRole;

/**
 * @extends Factory<ModelRole>
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class ModelRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = ModelRole::class;
=======
    protected $model = \Modules\User\Models\ModelRole::class;
>>>>>>> 60a2c9a9 (.)
=======
    protected $model = \Modules\User\Models\ModelRole::class;
=======
    protected $model = ModelRole::class;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    protected $model = ModelRole::class;
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
