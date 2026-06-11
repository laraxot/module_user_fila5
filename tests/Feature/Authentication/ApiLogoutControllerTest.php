<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Passport;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\DeviceUser;
use PHPUnit\Framework\Assert;

beforeEach(function () {
    /* @var \Modules\User\Tests\TestCase $this */
    $this->skipUnlessUserTable('device_user');
    $this->skipUnlessUserTable('devices');

    Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));

    $this->user = UserFactory::new()->createOne([
        'email' => 'api-logout-'.uniqid('', true).'@example.com',
        'email_verified_at' => now(),
        'is_active' => true,
    ]);

    $this->device = DeviceFactory::new()->createOne();

    DeviceUser::query()->create([
        'user_id' => (string) $this->requireUser()->getKey(),
        'device_id' => (string) $this->requireDevice()->getKey(),
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
    /** @var Modules\User\Tests\TestCase $this */
    $user = $this->requireUser();
    $privateKey = storage_path('oauth-private.key');
    $publicKey = storage_path('oauth-public.key');

    if (! is_readable($privateKey) || ! is_readable($publicKey)) {
        $this->markTestSkipped('Passport OAuth keys not configured for test environment.');
    }

    ensurePersonalAccessClient();

    $personalAccessToken = null;
    try {
        $personalAccessToken = $user->createToken('Api Logout Test');
    } catch (LogicException $exception) {
        $this->markTestSkipped('Passport token creation unavailable: '.$exception->getMessage());
    }

    if (null === $personalAccessToken) {
        $this->markTestSkipped('Passport token creation unavailable.');
    }

    if (! $personalAccessToken instanceof Laravel\Passport\PersonalAccessTokenResult) {
        $this->fail('Passport token creation returned unexpected type.');
    }

    $tokenResult = $personalAccessToken;

    $accessTokenModel = $user->tokens()->latest('id')->first();
    Assert::assertNotNull($accessTokenModel);

    Assert::assertTrue(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->exists());
    Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNull('logout_at')->exists());
    $response = $this->withHeader('Authorization', 'Bearer '.$tokenResult->accessToken)
        ->getJson('/api/v2/logout');

    $response->assertOk()
        ->assertJsonPath('message', 'Successfully logged out.')
        ->assertJsonPath('data.user_id', (string) $user->getKey());

    Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
    Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNotNull('logout_at')->exists());
});
