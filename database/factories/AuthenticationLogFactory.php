<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\AuthenticationLog;
use Illuminate\Database\Eloquent\Factories\Factory;

=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\AuthenticationLog;

/**
 * @extends Factory<AuthenticationLog>
 */
>>>>>>> 2024e2e7 (.)
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
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
    public function definition(): array
    {
        return [];
    }
}
