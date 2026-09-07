<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Device;

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\Device;

/**
 * @extends Factory<Device>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @var class-string<Model>
=======
     * @var class-string<Device>
>>>>>>> 2024e2e7 (.)
=======
     * @var class-string<Device>
>>>>>>> f589f9b2 (.)
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)
     *
     * @return array<string, mixed>
     */
    /**
     * @return array<string, mixed>
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            // 'id' => $this->faker->randomNumber(5),
            // 'mobile_id' => $this->faker->randomNumber(5),
            'device' => $this->faker->word,
            'platform' => $this->faker->word,
            'browser' => $this->faker->word,
            'version' => $this->faker->word,
            'is_robot' => $this->faker->boolean,
            'robot' => $this->faker->word,
            'is_desktop' => $this->faker->boolean,
            'is_mobile' => $this->faker->boolean,
            'is_tablet' => $this->faker->boolean,
            'is_phone' => $this->faker->boolean,
=======
=======
>>>>>>> f589f9b2 (.)
            'uuid' => fake()->uuid(),
            'mobile_id' => fake()->uuid(),
            'languages' => [fake()->languageCode(), fake()->languageCode()],
            'device' => fake()->randomElement(['iPhone', 'Android', 'Desktop']),
            'platform' => fake()->randomElement(['iOS', 'Android', 'Windows', 'macOS', 'Linux']),
            'browser' => fake()->randomElement(['Safari', 'Chrome', 'Firefox', 'Edge']),
            'version' => fake()->numerify('#.#.#'),
            'is_robot' => false,
            'robot' => null,
            'is_desktop' => false,
            'is_mobile' => true,
            'is_tablet' => false,
            'is_phone' => true,
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        ];
    }
}
