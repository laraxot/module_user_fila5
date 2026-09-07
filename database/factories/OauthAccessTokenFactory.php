<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
<<<<<<< HEAD
 * OauthAccessToken Factory
=======
 * OauthAccessToken Factory.
>>>>>>> 2024e2e7 (.)
 *
 * Factory for creating OauthAccessToken model instances for testing and seeding.
 *
 * @extends Factory<OauthAccessToken>
 */
class OauthAccessTokenFactory extends Factory
{
<<<<<<< HEAD
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<OauthAccessToken>
     */
=======
>>>>>>> 2024e2e7 (.)
    protected $model = OauthAccessToken::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
=======
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'client_id' => OauthClient::factory(),
            'name' => $this->faker->optional()->words(2, true),
<<<<<<< HEAD
            'scopes' => $this->faker->optional()->randomElements(
                [
                    'read',
                    'write',
                    'admin',
                    'user',
                ],
                $this->faker->numberBetween(1, 3),
            ),
            'revoked' => $this->faker->boolean(10), // 10% revoked
=======
            'scopes' => $this->faker->randomElements(
                ['read', 'write', 'admin', 'user'],
                $this->faker->numberBetween(1, 3),
            ),
            'revoked' => $this->faker->boolean(10),
>>>>>>> 2024e2e7 (.)
            'expires_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }

    /**
     * Create a revoked token.
<<<<<<< HEAD
     *
     * @return static
     */
    public function revoked(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
     */
    public function revoked(): static
    {
        return $this->state(fn (): array => [
>>>>>>> 2024e2e7 (.)
            'revoked' => true,
        ]);
    }

    /**
     * Create an active token.
<<<<<<< HEAD
     *
     * @return static
     */
    public function active(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
     */
    public function active(): static
    {
        return $this->state(fn (): array => [
>>>>>>> 2024e2e7 (.)
            'revoked' => false,
            'expires_at' => $this->faker->dateTimeBetween('+1 day', '+1 year'),
        ]);
    }

    /**
     * Create token for a specific user.
<<<<<<< HEAD
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (): array => [
>>>>>>> 2024e2e7 (.)
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create token for a specific client.
<<<<<<< HEAD
     *
     * @param OauthClient $client
     * @return static
     */
    public function forClient(OauthClient $client): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
     */
    public function forClient(OauthClient $client): static
    {
        return $this->state(fn (): array => [
>>>>>>> 2024e2e7 (.)
            'client_id' => $client->id,
        ]);
    }

    /**
     * Create token with specific scopes.
     *
<<<<<<< HEAD
     * @param array<string> $scopes
     * @return static
     */
    public function withScopes(array $scopes): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): static
    {
        return $this->state(fn (): array => [
>>>>>>> 2024e2e7 (.)
            'scopes' => $scopes,
        ]);
    }
}
