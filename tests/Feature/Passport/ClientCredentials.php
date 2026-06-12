<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Passport;

use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Tests\TestCase;

/**
 * @return array{client: Client, secret: string}
 */
function createPassportClient(): array
{
    $repository = app(ClientRepository::class);

    $client = $repository->createClientCredentialsGrantClient('Flow Test Client');

    $secret = $client->plainSecret ?? (string) $client->getAttribute('secret');

    return ['client' => $client, 'secret' => $secret];
}

class ClientCredentials extends TestCase
{
    public function testClientCredentialsGrantReturnsToken(): void
    {
        ['client' => $client, 'secret' => $secret] = createPassportClient();

        $response = $this->post('/oauth/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $client->id,
            'client_secret' => $secret,
            'scope' => '',
        ]);

        $response->assertOk()
            ->assertJsonStructure(['token_type', 'expires_in', 'access_token'])
            ->assertJsonPath('token_type', 'Bearer');
    }

    public function testClientCredentialsCanBeAssociatedToASpecificUser(): void
    {
        ['client' => $client] = createPassportClient();
        $user = UserFactory::new()->createOne();

        $client->owner()->associate($user);
        $client->forceFill([
            'user_id' => $user->getKey(),
            'owner_id' => (string) $user->getKey(),
            'owner_type' => $user::class,
        ]);
        $client->save();
        $client->refresh();

        $this->assertNotNull($client->owner);
        $this->assertTrue($client->owner->is($user));
        $this->assertSame($user->getKey(), $client->getAttribute('user_id'));
    }
}
