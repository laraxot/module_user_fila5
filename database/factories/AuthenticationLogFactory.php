<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\AuthenticationLog;
use Illuminate\Database\Eloquent\Factories\Factory;

=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\AuthenticationLog;

/**
 * @extends Factory<AuthenticationLog>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class AuthenticationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = AuthenticationLog::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> f589f9b2 (.)
    public function definition(): array
    {
        return [];
    }
}
