<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\PasswordReset;

=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\PasswordReset;

/**
 * @extends Factory<PasswordReset>
 */
>>>>>>> 2024e2e7 (.)
class PasswordResetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $model = PasswordReset::class;

    /**
     * Define the model's default state.
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
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
>>>>>>> 2024e2e7 (.)
    }
}
