<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * OauthAuthCode Factory.
=======
 * OauthAuthCode Factory
>>>>>>> f548be94 (.)
=======
 * OauthAuthCode Factory
=======
 * OauthAuthCode Factory.
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
 * OauthAuthCode Factory.
>>>>>>> laraxot/dev
 *
 * @extends Factory<OauthAuthCode>
 */
class OauthAuthCodeFactory extends Factory
{
    protected $model = OauthAuthCode::class;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> f548be94 (.)
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
        return [
            'id' => $this->faker->sha256(),
            'user_id' => User::factory(),
            'client_id' => OauthClient::factory(),
            'scopes' => $this->faker->randomElements(['read', 'write'], $this->faker->numberBetween(1, 2)),
            'revoked' => $this->faker->boolean(5),
            'expires_at' => $this->faker->dateTimeBetween('now', '+10 minutes'),
        ];
    }

    public function expired(): static
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->state([
            'expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ]);
=======
        return $this->state(['expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now')]);
>>>>>>> f548be94 (.)
=======
        return $this->state(['expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now')]);
=======
        return $this->state([
            'expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ]);
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
        return $this->state([
            'expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ]);
>>>>>>> laraxot/dev
    }

    public function revoked(): static
    {
        return $this->state(['revoked' => true]);
    }
}
