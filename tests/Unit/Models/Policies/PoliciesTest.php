<?php

declare(strict_types=1);

use Modules\User\Models\Policies\AuthenticationLogPolicy;
use Modules\User\Models\Policies\AuthenticationPolicy;
use Modules\User\Models\Policies\DevicePolicy;
use Modules\User\Models\Policies\DeviceProfilePolicy;
use Modules\User\Models\Policies\ExtraPolicy;
use Modules\User\Models\Policies\FeaturePolicy;
use Modules\User\Models\Policies\NotificationPolicy;
use Modules\User\Models\Policies\OauthAccessTokenPolicy;
use Modules\User\Models\Policies\OauthAuthCodePolicy;
use Modules\User\Models\Policies\OauthClientPolicy;
use Modules\User\Models\Policies\OauthPersonalAccessClientPolicy;
use Modules\User\Models\Policies\OauthRefreshTokenPolicy;
use Modules\User\Models\Policies\SocialiteUserPolicy;
use Modules\User\Models\Policies\SocialProviderPolicy;
use Modules\User\Models\Policies\TeamInvitationPolicy;
use Modules\User\Models\Policies\TeamPermissionPolicy;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('OauthClientPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new OauthClientPolicy;
=======
    $policy = new OauthClientPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthClientPolicy::class, $policy);
});

test('OauthAccessTokenPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new OauthAccessTokenPolicy;
=======
    $policy = new OauthAccessTokenPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthAccessTokenPolicy::class, $policy);
});

test('OauthAuthCodePolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new OauthAuthCodePolicy;
=======
    $policy = new OauthAuthCodePolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthAuthCodePolicy::class, $policy);
});

test('OauthRefreshTokenPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new OauthRefreshTokenPolicy;
=======
    $policy = new OauthRefreshTokenPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthRefreshTokenPolicy::class, $policy);
});

test('OauthPersonalAccessClientPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new OauthPersonalAccessClientPolicy;
=======
    $policy = new OauthPersonalAccessClientPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(OauthPersonalAccessClientPolicy::class, $policy);
});

test('SocialiteUserPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new SocialiteUserPolicy;
=======
    $policy = new SocialiteUserPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(SocialiteUserPolicy::class, $policy);
});

test('SocialProviderPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new SocialProviderPolicy;
=======
    $policy = new SocialProviderPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(SocialProviderPolicy::class, $policy);
});

test('AuthenticationLogPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new AuthenticationLogPolicy;
=======
    $policy = new AuthenticationLogPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(AuthenticationLogPolicy::class, $policy);
});

test('AuthenticationPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new AuthenticationPolicy;
=======
    $policy = new AuthenticationPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(AuthenticationPolicy::class, $policy);
});

test('DevicePolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new DevicePolicy;
=======
    $policy = new DevicePolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(DevicePolicy::class, $policy);
});

test('DeviceProfilePolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new DeviceProfilePolicy;
=======
    $policy = new DeviceProfilePolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(DeviceProfilePolicy::class, $policy);
});

test('TeamInvitationPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new TeamInvitationPolicy;
=======
    $policy = new TeamInvitationPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(TeamInvitationPolicy::class, $policy);
});

test('TeamPermissionPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new TeamPermissionPolicy;
=======
    $policy = new TeamPermissionPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(TeamPermissionPolicy::class, $policy);
});

test('FeaturePolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new FeaturePolicy;
=======
    $policy = new FeaturePolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(FeaturePolicy::class, $policy);
});

test('ExtraPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new ExtraPolicy;
=======
    $policy = new ExtraPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(ExtraPolicy::class, $policy);
});

test('NotificationPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new NotificationPolicy;
=======
    $policy = new NotificationPolicy();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(NotificationPolicy::class, $policy);
});
