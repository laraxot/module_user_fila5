<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\TeamInvitation;

/**
 * @extends Factory<TeamInvitation>
 */
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\TeamInvitation;

>>>>>>> f548be94 (.)
class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
>>>>>>> f548be94 (.)
     */
    protected $model = TeamInvitation::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
=======
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'role' => $this->faker->word,
        ];
>>>>>>> f548be94 (.)
    }
}
