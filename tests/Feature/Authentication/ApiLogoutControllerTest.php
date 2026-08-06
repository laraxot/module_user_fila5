<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\PersonalAccessTokenResult;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\DeviceUser;
use Modules\User\Tests\TestCase;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use PHPUnit\Framework\Assert;

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
<<<<<<< HEAD
        'user_id' => SafeStringCastAction::cast($this->requireUser()->getKey()),
        'device_id' => SafeStringCastAction::cast($this->requireDevice()->getKey()),
=======
        'user_id' => (string) $this->requireUser()->getKey(),
        'device_id' => (string) $this->requireDevice()->getKey(),
>>>>>>> laraxot/dev
        'login_at' => now()->subHour(),
        'logout_at' => null,
    ]);
});

describe('Api Logout Controller', function (): void {
    test('api logout revokes current personal access token and marks device logout time', function (): void {
        /** @var TestCase $this */
        $user = $this->requireUser();
        $privateKey = storage_path('oauth-private.key');
        $publicKey = storage_path('oauth-public.key');

        if (! is_readable($privateKey) || ! is_readable($publicKey)) {
            $this->skipTest('Passport OAuth keys not configured for test environment.');
        }

        ensurePersonalAccessClient();

        $personalAccessToken = null;
        try {
            $personalAccessToken = $user->createToken('Api Logout Test');
        } catch (\Exception $exception) {
            $this->skipTest('Passport token creation unavailable: '.$exception->getMessage());
        }

<<<<<<< HEAD
        if ($personalAccessToken === null) {
=======
        if (null === $personalAccessToken) {
>>>>>>> laraxot/dev
            $this->skipTest('Passport token creation unavailable.');
        }

        if (! $personalAccessToken instanceof PersonalAccessTokenResult) {
            $this->fail('Passport token creation returned unexpected type.');
        }

        $tokenResult = $personalAccessToken;

        $accessTokenModel = $user->tokens()->latest('id')->first();
        Assert::assertNotNull($accessTokenModel);

        Assert::assertTrue(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->exists());
<<<<<<< HEAD
        Assert::assertTrue(DeviceUser::query()->where('user_id', SafeStringCastAction::cast($user->getKey()))->whereNull('logout_at')->exists());
=======
        Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNull('logout_at')->exists());
>>>>>>> laraxot/dev
        $response = $this->withHeader('Authorization', 'Bearer '.$tokenResult->accessToken)
            ->getJson('/api/v2/logout');

        $response->assertOk()
            ->assertJsonPath('message', 'Successfully logged out.')
<<<<<<< HEAD
            ->assertJsonPath('data.user_id', SafeStringCastAction::cast($user->getKey()));

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', SafeStringCastAction::cast($user->getKey()))->whereNotNull('logout_at')->exists());
=======
            ->assertJsonPath('data.user_id', (string) $user->getKey());

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', (string) $user->getKey())->whereNotNull('logout_at')->exists());
>>>>>>> laraxot/dev
    });
});
