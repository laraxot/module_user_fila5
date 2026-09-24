<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'user_name' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->text(200),
            'avatar' => '/avatars/'.$this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
            'status' => 'active',
=======
            'bio' => $this->faker->text(200),
            'avatar' => '/avatars/'.$this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'date_of_birth' => $this->faker->date(),
            'location' => $this->faker->city(),
            'website' => $this->faker->url(),
            'twitter' => $this->faker->userName(),
            'facebook' => $this->faker->userName(),
            'linkedin' => $this->faker->userName(),
            'github' => $this->faker->userName(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
