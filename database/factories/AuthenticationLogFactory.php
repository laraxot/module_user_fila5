<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\AuthenticationLog;

/**
 * @extends Factory<AuthenticationLog>
=======

/**
 * @extends Factory<\Modules\User\Models\AuthenticationLog>
>>>>>>> 350420cb (Check & fix styling)
 */
class AuthenticationLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = AuthenticationLog::class;
=======
    protected $model = \Modules\User\Models\AuthenticationLog::class;
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Define the model's default state.
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
