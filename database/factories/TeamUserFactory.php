<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\TeamUser;

/**
 * @extends Factory<TeamUser>
=======

/**
 * @extends Factory<\Modules\User\Models\TeamUser>
>>>>>>> 350420cb (Check & fix styling)
 */
class TeamUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = TeamUser::class;
=======
    protected $model = \Modules\User\Models\TeamUser::class;
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
