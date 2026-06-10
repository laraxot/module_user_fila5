<?php

declare(strict_types=1);

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Passport\Client;
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    config(['passport.connection' => 'user']);

    if (! Illuminate\Support\Facades\Schema::connection('user')->hasTable('oauth_clients')) {
        test()->markTestSkipped('oauth_clients table missing on user connection.');
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
    $client = new OauthClient();

    expect($client)->toBeInstanceOf(OauthClient::class)
        ->and($client)->toBeInstanceOf(Client::class);
});

test('oauth client has connection user', function (): void {
    $client = new OauthClient();

    expect($client->getConnectionName())->toBe('user');
});

test('oauth client user relation uses xot data', function (): void {
    $user = User::factory()->create();
    $client = oauthClientTestPersistedClient(['user_id' => (string) $user->getKey()]);

    expect($client->user)->not->toBeNull()
        ->and($client->user->getKey())->toBe($user->getKey());
});

test('oauth client is confidential when secret is present', function (): void {
    $client = oauthClientTestPersistedClient(['secret' => 'hashed-secret']);

    expect($client->confidential())->toBeTrue();
});

test('oauth client is not confidential when secret is empty', function (): void {
    $client = oauthClientTestPersistedClient(['secret' => null]);

    expect($client->confidential())->toBeFalse();
});

test('oauth client has grant type check', function (): void {
    $client = oauthClientTestPersistedClient([
        'grant_types' => json_encode(['authorization_code', 'refresh_token']),
    ]);

    expect($client->hasGrantType('authorization_code'))->toBeTrue()
        ->and($client->hasGrantType('client_credentials'))->toBeFalse();
});

test('oauth client has scope check', function (): void {
    $client = oauthClientTestPersistedClient();

    expect($client->hasScope('read'))->toBeTrue();
});
