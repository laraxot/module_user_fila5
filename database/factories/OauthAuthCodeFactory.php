<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
 * OauthAuthCode Factory.
 *
 * @extends Factory<OauthAuthCode>
 */
class OauthAuthCodeFactory extends Factory
{
    protected $model = OauthAuthCode::class;

    public function definition(): array
    {
        return [
            'id' => // @var mixed faker->sha256(
            'user_id' => User::factory(),
            'client_id' => OauthClient::factory(),
            'scopes' => // @var mixed faker->randomElements(['read', 'write'], $this->faker->numberBetween(1, 2
            'revoked' => // @var mixed faker->boolean(5
            'expires_at' => // @var mixed faker->dateTimeBetween('now', '+10 minutes'
        ];
    }

    public function expired(): static
    {
        return // @var mixed state(['expires_at' => $this->faker->dateTimeBetween('-1 hour', 'now';
    }

    public function revoked(): static
    {
        return // @var mixed state(['revoked' => true];
    }
}
