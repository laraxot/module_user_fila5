<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\OauthClient;
use Modules\User\Tests\TestCase;

use function Safe\json_encode;

class OauthClientTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['passport.connection' => 'user']);

        if (! Schema::connection('user')->hasTable('oauth_clients')) {
            $this->markTestSkipped('oauth_clients table missing on user connection.');
        }
    }

    /**
     * @param array<string, mixed> $overrides
     */
    private function oauthClientTestPersistedClient(array $overrides = []): OauthClient
    {
        $clientId = (string) Str::uuid();
        $redirect = 'https://example.test/callback/'.uniqid('', true);

        $payload = array_merge([
            'id' => $clientId,
            'user_id' => null,
            'name' => 'Test OAuth Client '.uniqid('', true),
            'secret' => 'test-secret',
            'provider' => 'users',
            'redirect' => $redirect,
            'redirect_uris' => json_encode([$redirect]),
            'grant_types' => json_encode(['authorization_code', 'refresh_token']),
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], $overrides);

        if (Schema::connection('user')->hasColumn('oauth_clients', 'owner_id')) {
            $payload['owner_id'] = $payload['owner_id'] ?? $payload['user_id'] ?? null;
            $payload['owner_type'] = $payload['owner_type'] ?? null;
        }

        DB::connection('user')->table('oauth_clients')->insert($payload);

        return OauthClient::query()->findOrFail($clientId);
    }

    public function test_oauth_client_can_be_instantiated(): void
    {
        $client = new OauthClient();

        $this->assertInstanceOf(OauthClient::class, $client);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function test_oauth_client_has_connection_user(): void
    {
        $client = new OauthClient();

        $this->assertSame('user', $client->getConnectionName());
    }

    public function test_oauth_client_user_relation_uses_xot_data(): void
    {
        $user = UserFactory::new()->createOne();
        $client = $this->oauthClientTestPersistedClient(['user_id' => (string) $user->getKey()]);

        $this->assertNotNull($client->user);
        $this->assertSame($user->getKey(), $client->user->getKey());
    }

    public function test_oauth_client_is_confidential_when_secret_is_present(): void
    {
        $client = $this->oauthClientTestPersistedClient(['secret' => 'hashed-secret']);

        $this->assertTrue($client->confidential());
    }

    public function test_oauth_client_is_not_confidential_when_secret_is_empty(): void
    {
        $client = $this->oauthClientTestPersistedClient(['secret' => null]);

        $this->assertFalse($client->confidential());
    }

    public function test_oauth_client_has_grant_type_check(): void
    {
        $client = $this->oauthClientTestPersistedClient([
            'grant_types' => json_encode(['authorization_code', 'refresh_token']),
        ]);

        $this->assertTrue($client->hasGrantType('authorization_code'));
        $this->assertFalse($client->hasGrantType('client_credentials'));
    }

    public function test_oauth_client_has_scope_check(): void
    {
        $client = $this->oauthClientTestPersistedClient();

        $this->assertTrue($client->hasScope('read'));
    }
}
