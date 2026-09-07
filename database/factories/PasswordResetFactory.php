<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\PasswordReset;

=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\PasswordReset;

/**
 * @extends Factory<PasswordReset>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $model = PasswordReset::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return array<(DateTime|string)>
     *
     * @psalm-return array{email: string, token: string, created_at: DateTime}
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'token' => $this->faker->word,
            'created_at' => $this->faker->dateTime,
        ];
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
