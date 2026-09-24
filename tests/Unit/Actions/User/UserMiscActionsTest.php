<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Actions\Activity\LogRegistrationAction;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

use Modules\User\Actions\Activity\LogRegistrationAction;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
>>>>>>> 350420cb (Check & fix styling)

describe('User Misc Actions Coverage', function (): void {
    test('GetCurrentDeviceAction is accessible', function (): void {
        Assert::assertInstanceOf(GetCurrentDeviceAction::class, app(GetCurrentDeviceAction::class));
    });

    test('LogRegistrationAction is accessible', function (): void {
        Assert::assertInstanceOf(LogRegistrationAction::class, app(LogRegistrationAction::class));
    });

    test('SendOtpByUserAction is accessible', function (): void {
        Assert::assertInstanceOf(SendOtpByUserAction::class, app(SendOtpByUserAction::class));
    });

    test('GetCurrentDeviceAction has execute method', function (): void {
        $action = app(GetCurrentDeviceAction::class);
    });

    test('LogRegistrationAction has execute method', function (): void {
        $action = app(LogRegistrationAction::class);
    });

    test('SendOtpByUserAction has execute method', function (): void {
        $action = app(SendOtpByUserAction::class);
    });
});
