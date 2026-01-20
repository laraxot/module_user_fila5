<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\PasswordReset;

/**
 * @extends Factory<PasswordReset>
 */
=======
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\PasswordReset;

>>>>>>> f548be94 (.)
class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
>>>>>>> f548be94 (.)
     */
    protected $model = PasswordReset::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
=======
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
>>>>>>> f548be94 (.)
    }
}
