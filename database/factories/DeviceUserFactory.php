<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Device;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\User;

/**
 * DeviceUser Factory
 *
 * Factory for creating DeviceUser model instances for testing and seeding.
 *
=======
use Modules\User\Models\DeviceUser;

/**
>>>>>>> 2024e2e7 (.)
=======
use Modules\User\Models\DeviceUser;

/**
>>>>>>> f589f9b2 (.)
 * @extends Factory<DeviceUser>
 */
class DeviceUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var class-string<DeviceUser>
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $model = DeviceUser::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     */
    /**
>>>>>>> 2024e2e7 (.)
=======
     */
    /**
>>>>>>> f589f9b2 (.)
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $loginAt = $this->faker->optional(0.8)->dateTimeBetween('-1 year', 'now');

        return [
            'device_id' => Device::factory(),
            'user_id' => User::factory(),
            'login_at' => $loginAt,
            'logout_at' => $loginAt && $this->faker->boolean(60)
                ? $this->faker->dateTimeBetween($loginAt, 'now')
                : null,
        ];
    }

    /**
     * Create a device-user relationship for a specific user.
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(array $_attributes): array => [
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create a device-user relationship for a specific device.
     *
     * @param Device $device
     * @return static
     */
    public function forDevice(Device $device): static
    {
        return $this->state(fn(array $_attributes): array => [
            'device_id' => $device->id,
        ]);
    }

    /**
     * Indicate that the user is currently logged in.
     *
     * @return static
     */
    public function loggedIn(): static
    {
        return $this->state(fn(array $_attributes): array => [
            'login_at' => $this->faker->dateTimeBetween('-1 day', 'now'),
            'logout_at' => null,
        ]);
    }

    /**
     * Indicate that the user is logged out.
     *
     * @return static
     */
    public function loggedOut(): static
    {
        $loginAt = $this->faker->dateTimeBetween('-1 month', '-1 day');

        return $this->state(fn(array $_attributes): array => [
            'login_at' => $loginAt,
            'logout_at' => $this->faker->dateTimeBetween($loginAt, 'now'),
        ]);
=======
        return [];
>>>>>>> 2024e2e7 (.)
=======
        return [];
>>>>>>> f589f9b2 (.)
    }
}
