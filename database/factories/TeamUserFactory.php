<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\Team;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;

/**
 * TeamUser Factory
 *
 * Factory for creating TeamUser model instances for testing and seeding.
 *
=======
use Modules\User\Models\TeamUser;

/**
>>>>>>> 2024e2e7 (.)
 * @extends Factory<TeamUser>
 */
class TeamUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<TeamUser>
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $model = TeamUser::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
=======
     */
    /**
>>>>>>> 2024e2e7 (.)
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [
            'team_id' => Team::factory(),
            'user_id' => User::factory(),
            'role' => $this->faker->randomElement(['owner', 'admin', 'editor', 'member']),
        ];
    }

    /**
     * Create team-user relationship for a specific team.
     *
     * @param Team $team
     * @return static
     */
    public function forTeam(Team $team): static
    {
        return $this->state(fn(array $_attributes): array => [
            'team_id' => $team->id,
        ]);
    }

    /**
     * Create team-user relationship for a specific user.
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(array $_attributes): array => [
            'user_id' => $user->id,
        ]);
    }

    /**
     * Set the role to owner.
     *
     * @return static
     */
    public function owner(): static
    {
        return $this->state(fn(array $_attributes): array => [
            'role' => 'owner',
        ]);
    }

    /**
     * Set the role to admin.
     *
     * @return static
     */
    public function admin(): static
    {
        return $this->state(fn(array $_attributes): array => [
            'role' => 'admin',
        ]);
    }

    /**
     * Set the role to member.
     *
     * @return static
     */
    public function member(): static
    {
        return $this->state(fn(array $_attributes): array => [
            'role' => 'member',
        ]);
=======
        return [];
>>>>>>> 2024e2e7 (.)
    }
}
