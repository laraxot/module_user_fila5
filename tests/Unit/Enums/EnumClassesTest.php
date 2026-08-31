<?php

declare(strict_types=1);

use Modules\User\Enums\SocialProviderEnum;
use Modules\User\Enums\SystemRole;
use Modules\User\Enums\UserType;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('UserType enum has all cases', function (): void {
    $cases = UserType::cases();

    Assert::assertCount(5, $cases);
    foreach ($cases as $case) {
        Assert::assertInstanceOf(UserType::class, $case);
    }
});

test('UserType enum cases have correct values', function (): void {
    Assert::assertSame('master_admin', UserType::MasterAdmin->value);
    Assert::assertSame('backoffice_user', UserType::BoUser->value);
    Assert::assertSame('customer_user', UserType::CustomerUser->value);
    Assert::assertSame('system', UserType::System->value);
    Assert::assertSame('technician', UserType::Technician->value);
});

test('UserType getDefaultGuard method works', function (): void {
    Assert::assertSame('web', UserType::MasterAdmin->getDefaultGuard());
    Assert::assertSame('web', UserType::BoUser->getDefaultGuard());
    Assert::assertSame('web', UserType::CustomerUser->getDefaultGuard());
    Assert::assertSame('web', UserType::System->getDefaultGuard());
    Assert::assertSame('api', UserType::Technician->getDefaultGuard());
});

test('UserType getLabel method returns translation keys', function (): void {
    Assert::assertSame('Master admin', UserType::MasterAdmin->getLabel());
    Assert::assertSame('Backoffice', UserType::BoUser->getLabel());
    Assert::assertSame('Customer', UserType::CustomerUser->getLabel());
    Assert::assertSame('System', UserType::System->getLabel());
    Assert::assertSame('Technician', UserType::Technician->getLabel());
});

test('UserType getColor method returns translation keys', function (): void {
    Assert::assertSame('danger', UserType::MasterAdmin->getColor());
    Assert::assertSame('warning', UserType::BoUser->getColor());
    Assert::assertSame('success', UserType::CustomerUser->getColor());
    Assert::assertSame('gray', UserType::System->getColor());
    Assert::assertSame('info', UserType::Technician->getColor());
});

test('UserType getIcon method returns translation keys', function (): void {
    Assert::assertSame('heroicon-o-shield-check', UserType::MasterAdmin->getIcon());
    Assert::assertSame('heroicon-o-briefcase', UserType::BoUser->getIcon());
});

test('SystemRole enum can be instantiated', function (): void {
    foreach (SystemRole::cases() as $case) {
        Assert::assertInstanceOf(SystemRole::class, $case);
    }
});

test('SocialProviderEnum can be instantiated', function (): void {
    foreach (SocialProviderEnum::cases() as $case) {
        Assert::assertInstanceOf(SocialProviderEnum::class, $case);
    }
});
