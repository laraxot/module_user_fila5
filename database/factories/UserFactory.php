<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\User\Models\User;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * @return array<string, mixed>
     */
    /**
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'lang' => fake()->randomElement(['it', 'en', 'de']),
            'is_active' => true,
            'is_otp' => false,
            'password_expires_at' => fake()->optional()->dateTimeBetween('now', '+1 year'),
        ];
    }

    /**
     * Indicate that the user should be active.
     */
    public function active(): static
    {
        return $this->state(fn(array $_attributes) => [
=======
=======
>>>>>>> f589f9b2 (.)
            'id' => (string) Str::uuid(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'lang' => 'it',
            'type' => 'customer_user',
            'state' => 'active',
        ];
    }

    public function active(): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'is_active' => true,
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Indicate that the user should be inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $_attributes) => [
=======
    public function inactive(): static
    {
        return $this->state(fn (): array => [
>>>>>>> 2024e2e7 (.)
=======
    public function inactive(): static
    {
        return $this->state(fn (): array => [
>>>>>>> f589f9b2 (.)
            'is_active' => false,
        ]);
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Indicate that the user's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $_attributes) => [
=======
=======
>>>>>>> f589f9b2 (.)
    public function verified(): static
    {
        return $this->state(fn (): array => [
            'email_verified_at' => now(),
        ]);
    }

    public function unverified(): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'email_verified_at' => null,
        ]);
    }
}
