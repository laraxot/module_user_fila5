<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAccessToken;
<<<<<<< HEAD
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthRefreshToken;

/**
 * OauthRefreshToken Factory.
=======
use Modules\User\Models\OauthRefreshToken;

/**
 * OauthRefreshToken Factory
>>>>>>> f548be94 (.)
 *
 * @extends Factory<OauthRefreshToken>
 */
class OauthRefreshTokenFactory extends Factory
{
    protected $model = OauthRefreshToken::class;

<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> f548be94 (.)
    public function definition(): array
    {
        return [
            'id' => $this->faker->sha256(),
<<<<<<< HEAD
            'access_token_id' => fn (): string => $this->newAccessTokenId(),
=======
            'access_token_id' => fn() => OauthAccessToken::create([
                'id' => $this->faker->sha256(),
                'user_id' => null,
                'client_id' => $this->faker->sha256(),
                'name' => 'Test Token',
                'scopes' => [],
                'revoked' => false,
                'expires_at' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
            ])->id,
>>>>>>> f548be94 (.)
            'revoked' => $this->faker->boolean(5),
            'expires_at' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
        ];
    }

<<<<<<< HEAD
    protected function newAccessTokenId(): string
    {
        /** @var OauthAccessToken $token */
        $token = (new OauthAccessTokenFactory())->create([
            'id' => $this->faker->uuid(),
            'user_id' => null,
            'client_id' => OauthClient::factory(),
            'name' => 'Test Token',
            'scopes' => [],
            'revoked' => false,
            'expires_at' => $this->faker->dateTimeBetween('+1 month', '+6 months'),
        ]);

        return (string) $token->id;
    }

=======
>>>>>>> f548be94 (.)
    public function revoked(): static
    {
        return $this->state(['revoked' => true]);
    }

    public function expired(): static
    {
<<<<<<< HEAD
        return $this->state([
            'expires_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ]);
=======
        return $this->state(['expires_at' => $this->faker->dateTimeBetween('-1 month', 'now')]);
>>>>>>> f548be94 (.)
    }
}
