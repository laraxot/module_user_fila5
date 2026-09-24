<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\PermissionUser;

/**
 * @extends Factory<PermissionUser>
=======

/**
 * @extends Factory<\Modules\User\Models\PermissionUser>
>>>>>>> 350420cb (Check & fix styling)
 */
class PermissionUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = PermissionUser::class;
=======
    protected $model = \Modules\User\Models\PermissionUser::class;
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
