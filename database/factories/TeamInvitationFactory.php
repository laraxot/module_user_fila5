<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\TeamInvitation;

/**
 * @extends Factory<TeamInvitation>
=======

/**
 * @extends Factory<\Modules\User\Models\TeamInvitation>
>>>>>>> 350420cb (Check & fix styling)
 */
class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = TeamInvitation::class;
=======
    protected $model = \Modules\User\Models\TeamInvitation::class;
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
