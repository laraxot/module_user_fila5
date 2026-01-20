<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\PermissionUser;

/**
 * @extends Factory<PermissionUser>
 */
=======
use Modules\User\Models\PermissionUser;
use Illuminate\Database\Eloquent\Factories\Factory;

>>>>>>> f548be94 (.)
class PermissionUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = PermissionUser::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> f548be94 (.)
    public function definition(): array
    {
        return [];
    }
}
