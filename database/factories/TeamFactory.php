<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Str;
use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
 * @extends Factory<Team>
=======

/**
 * @extends Factory<\Modules\User\Models\Team>
>>>>>>> 350420cb (Check & fix styling)
 */
class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<Team>
     */
    protected $model = Team::class;

    /**
     * @return array<string, mixed>
=======
     */
    protected $model = \Modules\User\Models\Team::class;

    /**
     * Define the model's default state.
>>>>>>> 350420cb (Check & fix styling)
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [
            'name' => fake()->unique()->company(),
            'personal_team' => 0,
            'user_id' => User::factory(),
            'uuid' => (string) Str::uuid(),
        ];
=======
        return [];
>>>>>>> 350420cb (Check & fix styling)
    }
}
