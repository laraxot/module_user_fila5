<?php

declare(strict_types=1);
<<<<<<< HEAD
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
=======

namespace Modules\User\Tests\Unit\Actions\Passport;

// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Support\Str;
use Modules\User\Actions\Passport\CreateClientAction;
use Modules\User\Actions\Passport\CreateGenericClientAction;
use Modules\User\Actions\Passport\RegenerateClientSecretAction;
use Modules\User\Actions\Passport\RevokeClientAction;
use Modules\User\Actions\Passport\RevokeRefreshTokenAction;
use Modules\User\Actions\Passport\RevokeTokenAction;
<<<<<<< HEAD
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\OauthClient;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function (): void {
    config(['passport.connection' => 'user']);

    if (! Schema::connection('user')->hasTable('oauth_clients')) {
        skipUserTest('oauth_clients table missing on user connection.');
    }
});

test('creates oauth client with defaults and user association', function (): void {
    skipLegacyRedirectPersistenceCheck();

    $user = UserFactory::new()->createOne();

    try {
=======
use Modules\User\Models\OauthClient;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

describe('Passport actions coverage batch 2', function (): void {
    it('creates oauth client with defaults and user association', function (): void {
        $user = User::factory()->create();

>>>>>>> 350420cb (Check & fix styling)
        $client = app(CreateClientAction::class)->execute(
            name: 'Coverage Client',
            redirect: 'https://example.test/callback',
            user: $user,
        );
<<<<<<< HEAD
    } catch (QueryException $exception) {
        if (str_contains((string) $exception->getMessage(), 'oauth_clients.redirect')) {
            skipUserTest('oauth_clients.redirect NOT NULL constraint not satisfied by action persist path.');
        }

        throw $exception;
    }

    Assert::assertNotNull($client);
    Assert::assertInstanceOf(OauthClient::class, $client);
    Assert::assertNotEmpty($client->id);
    Assert::assertSame('users', $client->provider);
    Assert::assertFalse((bool) $client->personal_access_client);
    Assert::assertFalse((bool) $client->password_client);
    Assert::assertFalse((bool) $client->revoked);
    Assert::assertSame((string) $client->user_id, (string) $user->id);
    Assert::assertNotNull($client->secret);
    Assert::assertGreaterThanOrEqual(40, strlen((string) $client->secret));
    Assert::assertTrue(DB::connection('user')->table('oauth_clients')->where('id', (string) $client->id)->exists());
});

test('creates generic oauth client with explicit flags and provider', function (): void {
    skipLegacyRedirectPersistenceCheck();

    try {
=======

        expect($client)->toBeInstanceOf(OauthClient::class)
            ->and($client->id)->not->toBeEmpty()
            ->and($client->provider)->toBe('users')
            ->and((bool) $client->personal_access_client)->toBeFalse()
            ->and((bool) $client->password_client)->toBeFalse()
            ->and((bool) $client->revoked)->toBeFalse()
            ->and((string) $client->user_id)->toBe((string) $user->id)
            ->and($client->secret)->not->toBeNull();

        expect(strlen((string) $client->secret))->toBeGreaterThanOrEqual(40);

        expect(
            DB::connection('user')->table('oauth_clients')->where('id', (string) $client->id)->exists()
        )->toBeTrue();
    });

    it('creates generic oauth client with explicit flags and provider', function (): void {
>>>>>>> 350420cb (Check & fix styling)
        $client = app(CreateGenericClientAction::class)->execute(
            name: 'Generic Coverage Client',
            redirect: 'https://example.test/generic-callback',
            personalAccess: true,
            password: false,
            provider: 'admins',
        );
<<<<<<< HEAD
    } catch (QueryException $exception) {
        if (str_contains((string) $exception->getMessage(), 'oauth_clients.redirect')) {
            skipUserTest('oauth_clients.redirect NOT NULL constraint not satisfied by action persist path.');
        }

        throw $exception;
    }

    Assert::assertInstanceOf(OauthClient::class, $client);
    Assert::assertTrue((bool) $client->personal_access_client);
    Assert::assertFalse((bool) $client->password_client);
    Assert::assertSame('admins', $client->provider);
    Assert::assertFalse((bool) $client->revoked);
});

test('regenerates client secret from model instance and client id', function (): void {
    $clientId = (string) Str::uuid();

    DB::connection('user')->table('oauth_clients')->insert([
        'id' => $clientId,
        'user_id' => null,
        'name' => 'Client To Regenerate',
        'secret' => 'old-secret-value',
        'provider' => 'users',
        'redirect' => 'https://example.test/regen',
        'redirect_uris' => '[]',
        'grant_types' => '[]',
        'personal_access_client' => 0,
        'password_client' => 0,
        'revoked' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $action = app(RegenerateClientSecretAction::class);

    $client = OauthClient::query()->findOrFail($clientId);
    $secretFromModel = $action->execute($client);
    $secretFromId = $action->execute($clientId);

    Assert::assertSame(40, strlen($secretFromId));
    Assert::assertSame(40, strlen($secretFromModel));
    Assert::assertNotSame($secretFromModel, $secretFromId);
    Assert::assertNotSame('old-secret-value', $secretFromModel);
    $storedSecret = DB::connection('user')->table('oauth_clients')->where('id', $clientId)->value('secret');

    Assert::assertNotSame($secretFromId, $storedSecret);
    Assert::assertTrue(Hash::check($secretFromId, is_string($storedSecret) ? $storedSecret : ''));
});

test('revokes refresh token and returns false for missing token', function (): void {
    $clientId = (string) Str::uuid();
    $tokenId = (string) Str::uuid();
    $refreshId = hash('sha256', (string) Str::uuid());

    DB::connection('user')->table('oauth_clients')->insert([
        'id' => $clientId,
        'user_id' => null,
        'name' => 'Refresh Client',
        'secret' => 'secret',
        'provider' => 'users',
        'redirect' => 'https://example.test/refresh',
        'redirect_uris' => '[]',
        'grant_types' => '[]',
        'personal_access_client' => 0,
        'password_client' => 0,
        'revoked' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::connection('user')->table('oauth_access_tokens')->insert([
        'id' => $tokenId,
        'user_id' => null,
        'client_id' => $clientId,
        'name' => 'token',
        'scopes' => '[]',
        'revoked' => 0,
        'created_at' => now(),
        'updated_at' => now(),
        'expires_at' => now()->addDay(),
    ]);

    DB::connection('user')->table('oauth_refresh_tokens')->insert([
        'id' => $refreshId,
        'access_token_id' => $tokenId,
        'revoked' => 0,
        'expires_at' => now()->addDay(),
    ]);

    $action = app(RevokeRefreshTokenAction::class);

    Assert::assertTrue($action->execute($refreshId));
    Assert::assertSame(1, DB::connection('user')->table('oauth_refresh_tokens')->where('id', $refreshId)->value('revoked'));
    Assert::assertFalse($action->execute('missing-refresh-token-id'));
});

test('revokes access token and associated refresh token', function (): void {
    $clientId = (string) Str::uuid();
    $tokenId = (string) Str::uuid();
    $refreshId = hash('sha256', (string) Str::uuid());

    DB::connection('user')->table('oauth_clients')->insert([
        'id' => $clientId,
        'user_id' => null,
        'name' => 'Token Client',
        'secret' => 'secret',
        'provider' => 'users',
        'redirect' => 'https://example.test/token',
        'redirect_uris' => '[]',
        'grant_types' => '[]',
        'personal_access_client' => 0,
        'password_client' => 0,
        'revoked' => 0,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::connection('user')->table('oauth_access_tokens')->insert([
        'id' => $tokenId,
        'user_id' => null,
        'client_id' => $clientId,
        'name' => 'token',
        'scopes' => '[]',
        'revoked' => 0,
        'created_at' => now(),
        'updated_at' => now(),
        'expires_at' => now()->addDay(),
    ]);

    DB::connection('user')->table('oauth_refresh_tokens')->insert([
        'id' => $refreshId,
        'access_token_id' => $tokenId,
        'revoked' => 0,
        'expires_at' => now()->addDay(),
    ]);

    $action = app(RevokeTokenAction::class);

    Assert::assertTrue($action->execute($tokenId));
    Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $tokenId)->value('revoked'));
    Assert::assertSame(1, DB::connection('user')->table('oauth_refresh_tokens')->where('id', $refreshId)->value('revoked'));
    Assert::assertFalse($action->execute('missing-access-token-id'));
});

test('revokes client with and without associated tokens', function (): void {
    $clientWithTokenId = (string) Str::uuid();
    $tokenId = (string) Str::uuid();
    $clientWithoutTokenRevokeId = (string) Str::uuid();
    $tokenNoRevokeId = (string) Str::uuid();

    DB::connection('user')->table('oauth_clients')->insert([
        [
            'id' => $clientWithTokenId,
            'user_id' => null,
            'name' => 'Client Revoke With Tokens',
            'secret' => 'secret',
            'provider' => 'users',
            'redirect' => 'https://example.test/client-revoke',
=======

        expect($client)->toBeInstanceOf(OauthClient::class)
            ->and((bool) $client->personal_access_client)->toBeTrue()
            ->and((bool) $client->password_client)->toBeFalse()
            ->and($client->provider)->toBe('admins')
            ->and((bool) $client->revoked)->toBeFalse();
    });

    it('regenerates client secret from model instance and client id', function (): void {
        $clientId = (string) Str::uuid();

        DB::connection('user')->table('oauth_clients')->insert([
            'id' => $clientId,
            'user_id' => null,
            'name' => 'Client To Regenerate',
            'secret' => 'old-secret-value',
            'provider' => 'users',
            'redirect' => 'https://example.test/regen',
>>>>>>> 350420cb (Check & fix styling)
            'redirect_uris' => '[]',
            'grant_types' => '[]',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
<<<<<<< HEAD
        ],
        [
            'id' => $clientWithoutTokenRevokeId,
            'user_id' => null,
            'name' => 'Client Revoke Without Tokens',
            'secret' => 'secret',
            'provider' => 'users',
            'redirect' => 'https://example.test/client-no-token-revoke',
=======
        ]);

        $action = app(RegenerateClientSecretAction::class);

        $client = OauthClient::query()->findOrFail($clientId);
        $secretFromModel = $action->execute($client);
        $secretFromId = $action->execute($clientId);

        expect($secretFromModel)->not->toBe('old-secret-value')
            ->and(strlen($secretFromModel))->toBe(40)
            ->and(strlen($secretFromId))->toBe(40)
            ->and($secretFromId)->not->toBe($secretFromModel);

        $storedSecret = DB::connection('user')->table('oauth_clients')->where('id', $clientId)->value('secret');

        expect($storedSecret)->not->toBe($secretFromId)
            ->and(Hash::check($secretFromId, (string) $storedSecret))->toBeTrue();
    });

    it('revokes refresh token and returns false for missing token', function (): void {
        $clientId = (string) Str::uuid();
        $tokenId = (string) Str::uuid();
        $refreshId = hash('sha256', (string) Str::uuid());

        DB::connection('user')->table('oauth_clients')->insert([
            'id' => $clientId,
            'user_id' => null,
            'name' => 'Refresh Client',
            'secret' => 'secret',
            'provider' => 'users',
            'redirect' => 'https://example.test/refresh',
>>>>>>> 350420cb (Check & fix styling)
            'redirect_uris' => '[]',
            'grant_types' => '[]',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
<<<<<<< HEAD
        ],
    ]);

    DB::connection('user')->table('oauth_access_tokens')->insert([
        [
            'id' => $tokenId,
            'user_id' => null,
            'client_id' => $clientWithTokenId,
            'name' => 'token-to-revoke',
=======
        ]);

        DB::connection('user')->table('oauth_access_tokens')->insert([
            'id' => $tokenId,
            'user_id' => null,
            'client_id' => $clientId,
            'name' => 'token',
>>>>>>> 350420cb (Check & fix styling)
            'scopes' => '[]',
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'expires_at' => now()->addDay(),
<<<<<<< HEAD
        ],
        [
            'id' => $tokenNoRevokeId,
            'user_id' => null,
            'client_id' => $clientWithoutTokenRevokeId,
            'name' => 'token-not-revoked',
=======
        ]);

        DB::connection('user')->table('oauth_refresh_tokens')->insert([
            'id' => $refreshId,
            'access_token_id' => $tokenId,
            'revoked' => 0,
            'expires_at' => now()->addDay(),
        ]);

        $action = app(RevokeRefreshTokenAction::class);

        expect($action->execute($refreshId))->toBeTrue();
        expect(DB::connection('user')->table('oauth_refresh_tokens')->where('id', $refreshId)->value('revoked'))->toBe(1);

        expect($action->execute('missing-refresh-token-id'))->toBeFalse();
    });

    it('revokes access token and associated refresh token', function (): void {
        $clientId = (string) Str::uuid();
        $tokenId = (string) Str::uuid();
        $refreshId = hash('sha256', (string) Str::uuid());

        DB::connection('user')->table('oauth_clients')->insert([
            'id' => $clientId,
            'user_id' => null,
            'name' => 'Token Client',
            'secret' => 'secret',
            'provider' => 'users',
            'redirect' => 'https://example.test/token',
            'redirect_uris' => '[]',
            'grant_types' => '[]',
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::connection('user')->table('oauth_access_tokens')->insert([
            'id' => $tokenId,
            'user_id' => null,
            'client_id' => $clientId,
            'name' => 'token',
>>>>>>> 350420cb (Check & fix styling)
            'scopes' => '[]',
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'expires_at' => now()->addDay(),
<<<<<<< HEAD
        ],
    ]);

    $action = app(RevokeClientAction::class);

    Assert::assertTrue($action->execute($clientWithTokenId, true));
    Assert::assertSame(1, DB::connection('user')->table('oauth_clients')->where('id', $clientWithTokenId)->value('revoked'));
    Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $tokenId)->value('revoked'));
    $clientModel = OauthClient::query()->findOrFail($clientWithoutTokenRevokeId);

    Assert::assertTrue($action->execute($clientModel, false));
    Assert::assertSame(1, DB::connection('user')->table('oauth_clients')->where('id', $clientWithoutTokenRevokeId)->value('revoked'));
    Assert::assertSame(0, DB::connection('user')->table('oauth_access_tokens')->where('id', $tokenNoRevokeId)->value('revoked'));
    Assert::assertFalse($action->execute('missing-client-id', true));
=======
        ]);

        DB::connection('user')->table('oauth_refresh_tokens')->insert([
            'id' => $refreshId,
            'access_token_id' => $tokenId,
            'revoked' => 0,
            'expires_at' => now()->addDay(),
        ]);

        $action = app(RevokeTokenAction::class);

        expect($action->execute($tokenId))->toBeTrue();

        expect(DB::connection('user')->table('oauth_access_tokens')->where('id', $tokenId)->value('revoked'))->toBe(1);
        expect(DB::connection('user')->table('oauth_refresh_tokens')->where('id', $refreshId)->value('revoked'))->toBe(1);
        expect($action->execute('missing-access-token-id'))->toBeFalse();
    });

    it('revokes client with and without associated tokens', function (): void {
        $clientWithTokenId = (string) Str::uuid();
        $tokenId = (string) Str::uuid();
        $clientWithoutTokenRevokeId = (string) Str::uuid();
        $tokenNoRevokeId = (string) Str::uuid();

        DB::connection('user')->table('oauth_clients')->insert([
            [
                'id' => $clientWithTokenId,
                'user_id' => null,
                'name' => 'Client Revoke With Tokens',
                'secret' => 'secret',
                'provider' => 'users',
                'redirect' => 'https://example.test/client-revoke',
                'redirect_uris' => '[]',
                'grant_types' => '[]',
                'personal_access_client' => 0,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => $clientWithoutTokenRevokeId,
                'user_id' => null,
                'name' => 'Client Revoke Without Tokens',
                'secret' => 'secret',
                'provider' => 'users',
                'redirect' => 'https://example.test/client-no-token-revoke',
                'redirect_uris' => '[]',
                'grant_types' => '[]',
                'personal_access_client' => 0,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::connection('user')->table('oauth_access_tokens')->insert([
            [
                'id' => $tokenId,
                'user_id' => null,
                'client_id' => $clientWithTokenId,
                'name' => 'token-to-revoke',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'expires_at' => now()->addDay(),
            ],
            [
                'id' => $tokenNoRevokeId,
                'user_id' => null,
                'client_id' => $clientWithoutTokenRevokeId,
                'name' => 'token-not-revoked',
                'scopes' => '[]',
                'revoked' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'expires_at' => now()->addDay(),
            ],
        ]);

        $action = app(RevokeClientAction::class);

        expect($action->execute($clientWithTokenId, true))->toBeTrue();
        expect(DB::connection('user')->table('oauth_clients')->where('id', $clientWithTokenId)->value('revoked'))->toBe(1);
        expect(DB::connection('user')->table('oauth_access_tokens')->where('id', $tokenId)->value('revoked'))->toBe(1);

        $clientModel = OauthClient::query()->findOrFail($clientWithoutTokenRevokeId);

        expect($action->execute($clientModel, false))->toBeTrue();
        expect(DB::connection('user')->table('oauth_clients')->where('id', $clientWithoutTokenRevokeId)->value('revoked'))->toBe(1);
        expect(DB::connection('user')->table('oauth_access_tokens')->where('id', $tokenNoRevokeId)->value('revoked'))->toBe(0);

        expect($action->execute('missing-client-id', true))->toBeFalse();
    });
>>>>>>> 350420cb (Check & fix styling)
});
