<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\ProfileTeam;

/**
 * @extends Factory<ProfileTeam>
=======

/**
 * @extends Factory<\Modules\User\Models\ProfileTeam>
>>>>>>> 350420cb (Check & fix styling)
 */
class ProfileTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = ProfileTeam::class;
=======
    protected $model = \Modules\User\Models\ProfileTeam::class;
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
