<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
>>>>>>> 2024e2e7 (.)
    protected $model = Profile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     */
    public function definition(): array
    {
        return [];
=======
     *
     * @return array<string, mixed>
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'user_name' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->text(200),
            'avatar' => '/avatars/'.$this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
            'status' => 'active',
        ];
>>>>>>> 2024e2e7 (.)
    }
}
