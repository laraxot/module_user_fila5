<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\TeamInvitation;

=======
use Modules\User\Models\TeamInvitation;

/**
 * @extends Factory<TeamInvitation>
 */
>>>>>>> 2024e2e7 (.)
class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $model = TeamInvitation::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'role' => $this->faker->word,
        ];
=======
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
>>>>>>> 2024e2e7 (.)
    }
}
