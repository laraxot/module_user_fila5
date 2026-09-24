<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use Laravel\Passport\PersonalAccessTokenResult;
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\DeviceUser;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var TestCase $this */
<<<<<<< HEAD
    TestCase::skipUnlessUserTable('device_user');
    TestCase::skipUnlessUserTable('devices');

    Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));

    TestCase::$user = UserFactory::new()->createOne([
=======
    $this->skipUnlessUserTable('device_user');
    $this->skipUnlessUserTable('devices');

    Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));

    $this->user = UserFactory::new()->createOne([
>>>>>>> 350420cb (Check & fix styling)
        'email' => 'api-logout-'.uniqid('', true).'@example.com',
        'email_verified_at' => now(),
        'is_active' => true,
    ]);

<<<<<<< HEAD
    TestCase::$device = DeviceFactory::new()->createOne();

    $userKey = TestCase::requireUser()->getKey();
    $deviceKey = TestCase::requireDevice()->getKey();

    DeviceUser::query()->create([
        'user_id' => (is_int($userKey) || is_string($userKey)) ? (string) $userKey : '',
        'device_id' => (is_int($deviceKey) || is_string($deviceKey)) ? (string) $deviceKey : '',
=======
    $this->device = DeviceFactory::new()->createOne();

    DeviceUser::query()->create([
        'user_id' => (string) $this->requireUser()->getKey(),
        'device_id' => (string) $this->requireDevice()->getKey(),
>>>>>>> 350420cb (Check & fix styling)
        'login_at' => now()->subHour(),
        'logout_at' => null,
    ]);
});

describe('Api Logout Controller', function (): void {
    test('api logout revokes current personal access token and marks device logout time', function (): void {
        /** @var TestCase $this */
<<<<<<< HEAD
        $user = TestCase::requireUser();
        $userKey = $user->getKey();
        $userKeyString = (is_int($userKey) || is_string($userKey)) ? (string) $userKey : '';
=======
        $user = $this->requireUser();
>>>>>>> 350420cb (Check & fix styling)
        $privateKey = storage_path('oauth-private.key');
        $publicKey = storage_path('oauth-public.key');

        if (! is_readable($privateKey) || ! is_readable($publicKey)) {
            $this->skipTest('Passport OAuth keys not configured for test environment.');
        }

        ensurePersonalAccessClient();

        $personalAccessToken = null;
<<<<<<< HEAD
        $personalAccessToken = null;
=======
>>>>>>> 350420cb (Check & fix styling)
        try {
            $personalAccessToken = $user->createToken('Api Logout Test');
        } catch (\Exception $exception) {
            $this->skipTest('Passport token creation unavailable: '.$exception->getMessage());
        }

<<<<<<< HEAD
=======
        if (null === $personalAccessToken) {
            $this->skipTest('Passport token creation unavailable.');
        }

        if (! $personalAccessToken instanceof PersonalAccessTokenResult) {
            $this->fail('Passport token creation returned unexpected type.');
        }

>>>>>>> 350420cb (Check & fix styling)
        $tokenResult = $personalAccessToken;

        $accessTokenModel = $user->tokens()->latest('id')->first();
        Assert::assertNotNull($accessTokenModel);

        Assert::assertTrue(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->exists());
<<<<<<< HEAD
        Assert::assertTrue(DeviceUser::query()->where('user_id', $userKeyString)->whereNull('logout_at')->exists());
=======
        Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNull('logout_at')->exists());
>>>>>>> 350420cb (Check & fix styling)
        $response = $this->withHeader('Authorization', 'Bearer '.$tokenResult->accessToken)
            ->getJson('/api/v2/logout');

        $response->assertOk()
            ->assertJsonPath('message', 'Successfully logged out.')
<<<<<<< HEAD
            ->assertJsonPath('data.user_id', $userKeyString);

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', $userKeyString)->whereNotNull('logout_at')->exists());
=======
            ->assertJsonPath('data.user_id', (string) $user->getKey());

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNotNull('logout_at')->exists());
>>>>>>> 350420cb (Check & fix styling)
    });
});
