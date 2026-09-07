<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\TeamInvitation;

=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\TeamInvitation;

/**
 * @extends Factory<TeamInvitation>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $model = TeamInvitation::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'role' => $this->faker->word,
        ];
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
