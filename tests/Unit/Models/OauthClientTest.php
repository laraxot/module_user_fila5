<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\OauthClient;
use PHPUnit\Framework\Assert;

use function Safe\json_encode;

beforeEach(function () {
    /* @var \Modules\User\Tests\TestCase $this */
    config(['passport.connection' => 'user']);

    if (! Illuminate\Support\Facades\Schema::connection('user')->hasTable('oauth_clients')) {
        $this->markTestSkipped('oauth_clients table missing on user connection.');
    }
});

/**
 * @param array<string, mixed> $overrides
 */
function oauthClientTestPersistedClient(array $overrides = []): OauthClient
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

    if (Illuminate\Support\Facades\Schema::connection('user')->hasColumn('oauth_clients', 'owner_id')) {
        $payload['owner_id'] = $payload['owner_id'] ?? $payload['user_id'] ?? null;
        $payload['owner_type'] = $payload['owner_type'] ?? null;
    }

    DB::connection('user')->table('oauth_clients')->insert($payload);

    return OauthClient::query()->findOrFail($clientId);
}

test('oauth client can be instantiated', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $client = new OauthClient();

    Assert::assertInstanceOf(OauthClient::class, $client);
    Assert::assertInstanceOf(Client::class, $client);
});

test('oauth client has connection user', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $client = new OauthClient();

    Assert::assertSame('user', $client->getConnectionName());
});

test('oauth client user relation uses xot data', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $user = UserFactory::new()->createOne();
    $client = oauthClientTestPersistedClient(['user_id' => (string) $user->getKey()]);

    Assert::assertNotNull($client->user);
    Assert::assertSame($user->getKey(), $client->user->getKey());
});

test('oauth client is confidential when secret is present', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $client = oauthClientTestPersistedClient(['secret' => 'hashed-secret']);

    Assert::assertTrue($client->confidential());
});

test('oauth client is not confidential when secret is empty', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $client = oauthClientTestPersistedClient(['secret' => null]);

    Assert::assertFalse($client->confidential());
});

test('oauth client has grant type check', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $client = oauthClientTestPersistedClient([
        'grant_types' => json_encode(['authorization_code', 'refresh_token']),
    ]);

    Assert::assertTrue($client->hasGrantType('authorization_code'));
    Assert::assertFalse($client->hasGrantType('client_credentials'));
});

test('oauth client has scope check', function (): void {
    /** @var Modules\User\Tests\TestCase $this */
    $client = oauthClientTestPersistedClient();

    Assert::assertTrue($client->hasScope('read'));
});
