<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\User\Models\PersonalAccessToken;

/**
 * @extends Factory<PersonalAccessToken>
 */
<<<<<<< HEAD
=======

>>>>>>> 60a2c9a9 (.)
=======

=======
use Modules\User\Models\PersonalAccessToken;

/**
 * @extends Factory<PersonalAccessToken>
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class PersonalAccessTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected $model = PersonalAccessToken::class;
=======
    protected $model = \Modules\User\Models\PersonalAccessToken::class;
>>>>>>> 60a2c9a9 (.)
=======
    protected $model = \Modules\User\Models\PersonalAccessToken::class;
=======
    protected $model = PersonalAccessToken::class;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    protected $model = PersonalAccessToken::class;
>>>>>>> laraxot/dev

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> 60a2c9a9 (.)
=======
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> laraxot/dev
    public function definition(): array
    {
        return [];
    }
}
