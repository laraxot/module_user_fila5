<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\User\Models\TeamInvitation;

/**
 * @extends Factory<TeamInvitation>
 */
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\TeamInvitation;

>>>>>>> f548be94 (.)
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\TeamInvitation;

=======
use Modules\User\Models\TeamInvitation;

/**
 * @extends Factory<TeamInvitation>
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class TeamInvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
>>>>>>> f548be94 (.)
=======
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
     */
    protected $model = TeamInvitation::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'role' => $this->faker->word,
        ];
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    }
}
