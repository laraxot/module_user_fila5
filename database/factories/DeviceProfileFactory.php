<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Modules\User\Models\DeviceProfile;

/**
 * DeviceProfile Factory
 *
 * Factory for creating DeviceProfile model instances for testing and seeding.
 * Extends DeviceUserFactory since DeviceProfile extends DeviceUser.
 *
 */
class DeviceProfileFactory extends DeviceUserFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<DeviceProfile>
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\DeviceProfile;

/**
 * @extends Factory<DeviceProfile>
 */
class DeviceProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $model = DeviceProfile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
     * Inherits from DeviceUserFactory and adds profile-specific attributes.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function definition(): array
    {
        return array_merge(
            parent::definition(),
            [
                // DeviceProfile-specific attributes can be added here if needed
            ],
        );
=======
=======
>>>>>>> f589f9b2 (.)
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
