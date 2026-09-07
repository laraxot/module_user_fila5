<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    protected $model = Profile::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public function definition(): array
    {
        return [];
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
