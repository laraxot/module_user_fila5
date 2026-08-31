<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use Laravel\Passport\PersonalAccessTokenResult;
>>>>>>> laraxot/dev
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\DeviceUser;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use Webmozart\Assert\Assert as WebmozartAssert;

final class ApiLogoutControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        skipUnlessUserTable('device_user');
        skipUnlessUserTable('devices');

        Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));

        $this->user = UserFactory::new()->createOne([
            'email' => 'api-logout-'.uniqid('', true).'@example.com',
            'email_verified_at' => now(),
            'is_active' => true,
        ]);

        $this->device = DeviceFactory::new()->createOne();

        DeviceUser::query()->create([
            'user_id' => (string) WebmozartAssert::scalar($this->requireUser()->getKey()),
            'device_id' => (string) WebmozartAssert::scalar($this->requireDevice()->getKey()),
            'login_at' => now()->subHour(),
            'logout_at' => null,
        ]);
    }

    public function test_api_logout_revokes_current_personal_access_token_and_marks_device_logout_time(): void
    {
=======

uses(TestCase::class);

beforeEach(function (): void {
    /* @var TestCase $this */
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

describe('Api Logout Controller', function (): void {
    test('api logout revokes current personal access token and marks device logout time', function (): void {
        /** @var TestCase $this */
>>>>>>> laraxot/dev
        $user = $this->requireUser();
        $privateKey = storage_path('oauth-private.key');
        $publicKey = storage_path('oauth-public.key');

        if (! is_readable($privateKey) || ! is_readable($publicKey)) {
            $this->skipTest('Passport OAuth keys not configured for test environment.');
        }

        ensurePersonalAccessClient();

<<<<<<< HEAD
=======
        $personalAccessToken = null;
>>>>>>> laraxot/dev
        try {
            $personalAccessToken = $user->createToken('Api Logout Test');
        } catch (\Exception $exception) {
            $this->skipTest('Passport token creation unavailable: '.$exception->getMessage());
        }

<<<<<<< HEAD
        $tokenResult = $personalAccessToken;
        $userId = (string) WebmozartAssert::scalar($user->getKey());
=======
        if (null === $personalAccessToken) {
            $this->skipTest('Passport token creation unavailable.');
        }

        if (! $personalAccessToken instanceof PersonalAccessTokenResult) {
            $this->fail('Passport token creation returned unexpected type.');
        }

        $tokenResult = $personalAccessToken;
>>>>>>> laraxot/dev

        $accessTokenModel = $user->tokens()->latest('id')->first();
        Assert::assertNotNull($accessTokenModel);

        Assert::assertTrue(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->exists());
<<<<<<< HEAD
        Assert::assertTrue(DeviceUser::query()->where('user_id', $userId)->whereNull('logout_at')->exists());
=======
        Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNull('logout_at')->exists());
>>>>>>> laraxot/dev
        $response = $this->withHeader('Authorization', 'Bearer '.$tokenResult->accessToken)
            ->getJson('/api/v2/logout');

        $response->assertOk()
            ->assertJsonPath('message', 'Successfully logged out.')
<<<<<<< HEAD
            ->assertJsonPath('data.user_id', $userId);

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', $userId)->whereNotNull('logout_at')->exists());
    }
}
=======
            ->assertJsonPath('data.user_id', (string) $user->getKey());

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNotNull('logout_at')->exists());
    });
});
>>>>>>> laraxot/dev
