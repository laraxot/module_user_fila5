<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\TeamPermission;

/**
 * @extends Factory<TeamPermission>
=======

/**
 * @extends Factory<\Modules\User\Models\TeamPermission>
>>>>>>> 350420cb (Check & fix styling)
 */
class TeamPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = TeamPermission::class;
=======
    protected $model = \Modules\User\Models\TeamPermission::class;
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
