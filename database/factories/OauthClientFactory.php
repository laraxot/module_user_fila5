<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * OauthClient Factory
=======
 * OauthClient Factory.
>>>>>>> 2024e2e7 (.)
=======
 * OauthClient Factory.
>>>>>>> f589f9b2 (.)
 *
 * Factory for creating OauthClient model instances for testing and seeding.
 *
 * @extends Factory<OauthClient>
 */
class OauthClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<OauthClient>
     */
    protected $model = OauthClient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
            'id' => $this->faker->uuid(),
<<<<<<< HEAD
<<<<<<< HEAD
            'user_id' => $this->faker->optional()->randomElement([User::factory(), null]),
            'name' => $this->faker->company() . ' App',
            'secret' => $this->faker->sha256(),
            'provider' => $this->faker->optional()->randomElement(['users', 'admins']),
            'redirect' => $this->faker->url(),
            'personal_access_client' => $this->faker->boolean(20), // 20% personal access clients
            'password_client' => $this->faker->boolean(30), // 30% password clients
            'revoked' => $this->faker->boolean(5), // 5% revoked
            'grant_types' => $this->faker->optional()->randomElements(
                [
                    'authorization_code',
                    'client_credentials',
                    'password',
                    'refresh_token',
                ],
                $this->faker->numberBetween(1, 3),
            ),
            'scopes' => $this->faker->optional()->randomElements(
                [
                    'read',
                    'write',
                    'admin',
                    'user',
                ],
=======
=======
>>>>>>> f589f9b2 (.)
            'user_id' => User::factory(),
            'name' => $this->faker->company(),
            'secret' => $this->faker->sha256(),
            'provider' => $this->faker->optional()->randomElement(['users', null]),
            'redirect' => $this->faker->url(),
            'personal_access_client' => $this->faker->boolean(20),
            'password_client' => $this->faker->boolean(30),
            'revoked' => $this->faker->boolean(5),
            'grant_types' => $this->faker->randomElements(
                ['authorization_code', 'client_credentials', 'password', 'refresh_token'],
                $this->faker->numberBetween(1, 3),
            ),
            'scopes' => $this->faker->randomElements(
                ['read', 'write', 'admin', 'user'],
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                $this->faker->numberBetween(1, 3),
            ),
        ];
    }

    /**
     * Create a personal access client.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return static
     */
    public function personalAccess(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function personalAccess(): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'personal_access_client' => true,
            'password_client' => false,
            'name' => 'Personal Access Client',
        ]);
    }

    /**
     * Create a password client.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return static
     */
    public function password(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function password(): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'password_client' => true,
            'personal_access_client' => false,
            'name' => 'Password Grant Client',
        ]);
    }

    /**
     * Create a revoked client.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return static
     */
    public function revoked(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function revoked(): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'revoked' => true,
        ]);
    }

    /**
     * Create an active client.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return static
     */
    public function active(): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function active(): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'revoked' => false,
        ]);
    }

    /**
     * Create client for a specific user.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create client with specific redirect URI.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param string $redirectUri
     * @return static
     */
    public function withRedirectUri(string $redirectUri): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function withRedirectUri(string $redirectUri): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'redirect' => $redirectUri,
        ]);
    }

    /**
     * Create client with specific scopes.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param array<string> $scopes
     * @return static
     */
    public function withScopes(array $scopes): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     * @param  array<string>  $scopes
     */
    public function withScopes(array $scopes): static
    {
        return $this->state(fn (): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'scopes' => $scopes,
        ]);
    }
}
