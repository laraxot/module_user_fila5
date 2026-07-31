<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Authentication;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\DeviceUser;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Webmozart\Assert\Assert as WebmozartAssert;

final class ApiLogoutControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        skipUnlessUserTable('device_user');
        skipUnlessUserTable('devices');

<<<<<<< .merge_file_ggJknb
        Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));
=======
<<<<<<< HEAD
beforeEach(function (): void {
    /* @var TestCase $this */
    $this->skipUnlessUserTable('device_user');
    $this->skipUnlessUserTable('devices');
=======
        Config::set('app.key', config('app.key') ?: 'base64:'.base64_encode(random_bytes(32)));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_JYhiBJ

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

<<<<<<< .merge_file_ggJknb
    public function test_api_logout_revokes_current_personal_access_token_and_marks_device_logout_time(): void
    {
=======
<<<<<<< HEAD
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
=======
    public function test_api_logout_revokes_current_personal_access_token_and_marks_device_logout_time(): void
    {
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_JYhiBJ
        $user = $this->requireUser();
        $privateKey = storage_path('oauth-private.key');
        $publicKey = storage_path('oauth-public.key');

        if (! is_readable($privateKey) || ! is_readable($publicKey)) {
            $this->skipTest('Passport OAuth keys not configured for test environment.');
        }

        ensurePersonalAccessClient();

        try {
            $personalAccessToken = $user->createToken('Api Logout Test');
        } catch (\Exception $exception) {
            $this->skipTest('Passport token creation unavailable: '.$exception->getMessage());
        }

<<<<<<< .merge_file_ggJknb
=======
<<<<<<< HEAD
        if (null === $personalAccessToken) {
            $this->skipTest('Passport token creation unavailable.');
        }

        if (! $personalAccessToken instanceof PersonalAccessTokenResult) {
            $this->fail('Passport token creation returned unexpected type.');
        }

=======
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_JYhiBJ
        $tokenResult = $personalAccessToken;
        $userId = (string) WebmozartAssert::scalar($user->getKey());

        $accessTokenModel = $user->tokens()->latest('id')->first();
        Assert::assertNotNull($accessTokenModel);

        Assert::assertTrue(DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->exists());
        Assert::assertTrue(DeviceUser::query()->where('user_id', $userId)->whereNull('logout_at')->exists());
        $response = $this->withHeader('Authorization', 'Bearer '.$tokenResult->accessToken)
            ->getJson('/api/v2/logout');

        $response->assertOk()
            ->assertJsonPath('message', 'Successfully logged out.')
            ->assertJsonPath('data.user_id', $userId);

        Assert::assertSame(1, DB::connection('user')->table('oauth_access_tokens')->where('id', $accessTokenModel->getKey())->value('revoked'));
        Assert::assertTrue(DeviceUser::query()->where('user_id', $userId)->whereNotNull('logout_at')->exists());
    }
}
