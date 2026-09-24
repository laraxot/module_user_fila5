<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\DeviceUser;

/**
 * @extends Factory<DeviceUser>
=======

/**
 * @extends Factory<\Modules\User\Models\DeviceUser>
>>>>>>> 350420cb (Check & fix styling)
 */
class DeviceUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = DeviceUser::class;
=======
    protected $model = \Modules\User\Models\DeviceUser::class;
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
