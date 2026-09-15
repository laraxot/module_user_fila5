<?php

declare(strict_types=1);

use Modules\User\Models\Authentication;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\DeviceProfile;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Extra;
use Modules\User\Models\Feature;
use Modules\User\Models\Notification;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthDeviceCode;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\User\Models\OauthToken;
use Modules\User\Models\PasswordReset;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\SocialProvider;
use Modules\User\Models\SsoProvider;
use Modules\User\Models\TeamInvitation;
use Modules\User\Models\TeamPermission;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('Notification model can be instantiated', function () {
<<<<<<< HEAD
    $model = new Notification();
=======
<<<<<<< HEAD
    $model = new Notification;
=======
    $model = new Notification();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(Notification::class, $model);
});

test('OauthAccessToken model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthAccessToken();
=======
<<<<<<< HEAD
    $model = new OauthAccessToken;
=======
    $model = new OauthAccessToken();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthAccessToken::class, $model);
});

test('OauthClient model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthClient();
=======
<<<<<<< HEAD
    $model = new OauthClient;
=======
    $model = new OauthClient();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthClient::class, $model);
});

test('OauthAuthCode model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthAuthCode();
=======
<<<<<<< HEAD
    $model = new OauthAuthCode;
=======
    $model = new OauthAuthCode();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthAuthCode::class, $model);
});

test('OauthRefreshToken model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthRefreshToken();
=======
<<<<<<< HEAD
    $model = new OauthRefreshToken;
=======
    $model = new OauthRefreshToken();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthRefreshToken::class, $model);
});

test('OauthPersonalAccessClient model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthPersonalAccessClient();
=======
<<<<<<< HEAD
    $model = new OauthPersonalAccessClient;
=======
    $model = new OauthPersonalAccessClient();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthPersonalAccessClient::class, $model);
});

test('OauthToken model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthToken();
=======
<<<<<<< HEAD
    $model = new OauthToken;
=======
    $model = new OauthToken();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthToken::class, $model);
});

test('OauthDeviceCode model can be instantiated', function () {
<<<<<<< HEAD
    $model = new OauthDeviceCode();
=======
<<<<<<< HEAD
    $model = new OauthDeviceCode;
=======
    $model = new OauthDeviceCode();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthDeviceCode::class, $model);
});

test('TeamPermission model can be instantiated', function () {
<<<<<<< HEAD
    $model = new TeamPermission();
=======
<<<<<<< HEAD
    $model = new TeamPermission;
=======
    $model = new TeamPermission();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(TeamPermission::class, $model);
});

test('TeamInvitation model can be instantiated', function () {
<<<<<<< HEAD
    $model = new TeamInvitation();
=======
<<<<<<< HEAD
    $model = new TeamInvitation;
=======
    $model = new TeamInvitation();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(TeamInvitation::class, $model);
});

test('AuthenticationLog model can be instantiated', function () {
<<<<<<< HEAD
    $model = new AuthenticationLog();
=======
<<<<<<< HEAD
    $model = new AuthenticationLog;
=======
    $model = new AuthenticationLog();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(AuthenticationLog::class, $model);
});

test('Authentication model can be instantiated', function () {
<<<<<<< HEAD
    $model = new Authentication();
=======
<<<<<<< HEAD
    $model = new Authentication;
=======
    $model = new Authentication();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(Authentication::class, $model);
});

test('SocialiteUser model can be instantiated', function () {
<<<<<<< HEAD
    $model = new SocialiteUser();
=======
<<<<<<< HEAD
    $model = new SocialiteUser;
=======
    $model = new SocialiteUser();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(SocialiteUser::class, $model);
});

test('SocialProvider model can be instantiated', function () {
<<<<<<< HEAD
    $model = new SocialProvider();
=======
<<<<<<< HEAD
    $model = new SocialProvider;
=======
    $model = new SocialProvider();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(SocialProvider::class, $model);
});

test('SsoProvider model can be instantiated', function () {
<<<<<<< HEAD
    $model = new SsoProvider();
=======
<<<<<<< HEAD
    $model = new SsoProvider;
=======
    $model = new SsoProvider();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(SsoProvider::class, $model);
});

test('Feature model can be instantiated', function () {
<<<<<<< HEAD
    $model = new Feature();
=======
<<<<<<< HEAD
    $model = new Feature;
=======
    $model = new Feature();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(Feature::class, $model);
});

test('Extra model can be instantiated', function () {
<<<<<<< HEAD
    $model = new Extra();
=======
<<<<<<< HEAD
    $model = new Extra;
=======
    $model = new Extra();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(Extra::class, $model);
});

test('Device model can be instantiated', function () {
<<<<<<< HEAD
    $model = new Device();
=======
<<<<<<< HEAD
    $model = new Device;
=======
    $model = new Device();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(Device::class, $model);
});

test('DeviceProfile model can be instantiated', function () {
<<<<<<< HEAD
    $model = new DeviceProfile();
=======
<<<<<<< HEAD
    $model = new DeviceProfile;
=======
    $model = new DeviceProfile();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(DeviceProfile::class, $model);
});

test('DeviceUser model can be instantiated', function () {
<<<<<<< HEAD
    $model = new DeviceUser();
=======
<<<<<<< HEAD
    $model = new DeviceUser;
=======
    $model = new DeviceUser();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(DeviceUser::class, $model);
});

test('PasswordReset model can be instantiated', function () {
<<<<<<< HEAD
    $model = new PasswordReset();
=======
<<<<<<< HEAD
    $model = new PasswordReset;
=======
    $model = new PasswordReset();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(PasswordReset::class, $model);
});
