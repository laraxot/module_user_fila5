<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\DeviceProfile;

/**
 * @extends Factory<DeviceProfile>
=======

/**
 * @extends Factory<\Modules\User\Models\DeviceProfile>
>>>>>>> 350420cb (Check & fix styling)
 */
class DeviceProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = DeviceProfile::class;
=======
    protected $model = \Modules\User\Models\DeviceProfile::class;
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
