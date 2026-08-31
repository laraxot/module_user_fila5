<?php

declare(strict_types=1);

use Modules\User\Actions\Activity\LogRegistrationAction;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Actions\Otp\SendOtpByUserAction;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class)->group('no-user-db');
=======
uses(TestCase::class);
>>>>>>> laraxot/dev

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
<<<<<<< HEAD

        Assert::assertTrue(method_exists($action, 'execute'));
=======
>>>>>>> laraxot/dev
    });

    test('LogRegistrationAction has execute method', function (): void {
        $action = app(LogRegistrationAction::class);
<<<<<<< HEAD

        Assert::assertTrue(method_exists($action, 'execute'));
=======
>>>>>>> laraxot/dev
    });

    test('SendOtpByUserAction has execute method', function (): void {
        $action = app(SendOtpByUserAction::class);
<<<<<<< HEAD

        Assert::assertTrue(method_exists($action, 'execute'));
=======
>>>>>>> laraxot/dev
    });
});
