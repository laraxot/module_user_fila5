<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Passport;
use Modules\User\Models\Device;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    $this->skipUnlessUserTable('device_user');
    $this->skipUnlessUserTable('devices');

    Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));

    $this->user = User::factory()->create([
        'email' => 'api-logout-'.uniqid('', true).'@example.com',
        'email_verified_at' => now(),
        'is_active' => true,
    ]);

    $this->device = Device::factory()->create();

    DeviceUser::query()->create([
        'user_id' => (string) $this->user->getKey(),
        'device_id' => (string) $this->device->getKey(),
        'login_at' => now()->subHour(),
        'logout_at' => null,
    ]);
});

function ensurePersonalAccessClient(): void
{
    $clientModel = Passport::client();

    if ($clientModel->newQuery()->where('revoked', false)->exists()) {
        return;
    }

    $repository = app(ClientRepository::class);
    $repository->createPersonalAccessGrantClient('Test Personal Access Client');
}

test('api logout revokes current personal access token and marks device logout time', function (): void {
    $privateKey = storage_path('oauth-private.key');
    $publicKey = storage_path('oauth-public.key');

    if (! is_readable($privateKey) || ! is_readable($publicKey)) {
        test()->markTestSkipped('Passport OAuth keys not configured for test environment.');
    }

    ensurePersonalAccessClient();

    try {
        $personalAccessToken = $this->user->createToken('Api Logout Test');
    } catch (\LogicException $exception) {
        test()->markTestSkipped('Passport token creation unavailable: '.$exception->getMessage());
    }
    $accessToken = $personalAccessToken->token;

    expect(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessToken->getKey())->exists())->toBeTrue();
    expect(DeviceUser::query()->where('user_id', (string) $this->user->getKey())->whereNull('logout_at')->exists())->toBeTrue();

    $response = $this->withHeader('Authorization', 'Bearer '.$personalAccessToken->accessToken)
        ->getJson('/api/v2/logout');

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully logged out.')
        ->assertJsonPath('data.user_id', (string) $this->user->getKey());

    expect(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessToken->getKey())->value('revoked'))->toBe(1);
    expect(DeviceUser::query()->where('user_id', (string) $this->user->getKey())->whereNotNull('logout_at')->exists())->toBeTrue();
});
