<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use PHPUnit\Framework\Assert;

/**
 * @return TestBaseUser
 */
function baseUserFixture(): TestBaseUser
{
    return new TestBaseUser();
}

test('base user extends eloquent model', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $baseUser = baseUserFixture();
    Assert::assertInstanceOf(Model::class, $baseUser);
});

test('base user has correct table name', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $baseUser = baseUserFixture();
    Assert::assertSame('test_users', $baseUser->getTable());
});

test('base user can be instantiated', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $baseUser = baseUserFixture();
    Assert::assertInstanceOf(BaseUser::class, $baseUser);
});

test('base user has proper inheritance chain', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $baseUser = baseUserFixture();
    Assert::assertInstanceOf(BaseUser::class, $baseUser);
    Assert::assertInstanceOf(Model::class, $baseUser);
});

test('base user has authentication traits', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $baseUser = baseUserFixture();
    Assert::assertInstanceOf(User::class, $baseUser);
    $traits = \class_uses_recursive($baseUser);

    Assert::assertContains(Notifiable::class, $traits);
});
