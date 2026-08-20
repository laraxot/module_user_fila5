<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;

/**
 * OauthClient Factory.
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
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Colonne di Passport 12: `owner_type`/`owner_id` al posto di `user_id`,
        // `redirect_uris` al posto di `redirect`, e i flag booleani
        // `personal_access_client`/`password_client` assorbiti in `grant_types`.
        // La factory ne mescolava le due generazioni e scriveva colonne inesistenti.
        return [
            'id' => $this->faker->uuid(),
            'owner_type' => User::class,
            'owner_id' => User::factory(),
            'name' => $this->faker->company(),
            'secret' => $this->faker->sha256(),
            'provider' => $this->faker->optional()->randomElement(['users', null]),
            'redirect_uris' => [$this->faker->url()],
            'revoked' => $this->faker->boolean(5),
            'grant_types' => $this->faker->randomElements(
                ['authorization_code', 'client_credentials', 'password', 'refresh_token'],
                $this->faker->numberBetween(1, 3),
            ),
        ];
    }

    /**
     * Create a personal access client.
     */
    public function personalAccess(): static
    {
        return $this->state(fn (): array => [
            'grant_types' => ['personal_access'],
            'name' => 'Personal Access Client',
        ]);
    }

    /**
     * Create a password client.
     */
    public function password(): static
    {
        return $this->state(fn (): array => [
            'grant_types' => ['password', 'refresh_token'],
            'name' => 'Password Grant Client',
        ]);
    }

    /**
     * Create a revoked client.
     */
    public function revoked(): static
    {
        return $this->state(fn (): array => [
            'revoked' => true,
        ]);
    }

    /**
     * Create an active client.
     */
    public function active(): static
    {
        return $this->state(fn (): array => [
            'revoked' => false,
        ]);
    }

    /**
     * Create client for a specific user.
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (): array => [
            'owner_type' => $user::class,
            'owner_id' => $user->id,
        ]);
    }

    /**
     * Create client with specific redirect URI.
     */
    public function withRedirectUri(string $redirectUri): static
    {
        return $this->state(fn (): array => [
            'redirect_uris' => [$redirectUri],
        ]);
    }

    /**
     * Create client with specific scopes.
     *
     * @param  array<string>  $scopes
     */
    public function withScopes(array $scopes): static
    {
        return $this->state(fn (): array => [
            'scopes' => $scopes,
        ]);
    }
}
