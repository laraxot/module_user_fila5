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
 * OauthAuthCode Factory
=======
 * OauthAuthCode Factory.
>>>>>>> 2024e2e7 (.)
=======
 * OauthAuthCode Factory.
>>>>>>> f589f9b2 (.)
 *
 * @extends Factory<OauthAuthCode>
 */
class OauthAuthCodeFactory extends Factory
{
    protected $model = OauthAuthCode::class;

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> f589f9b2 (.)
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
        return $this->state(['expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now')]);
=======
        return $this->state([
            'expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ]);
>>>>>>> 2024e2e7 (.)
=======
        return $this->state([
            'expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now'),
        ]);
>>>>>>> f589f9b2 (.)
    }

    public function revoked(): static
    {
        return $this->state(['revoked' => true]);
    }
}
