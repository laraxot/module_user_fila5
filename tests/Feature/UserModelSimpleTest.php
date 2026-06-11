<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use PHPUnit\Framework\Assert;
use Modules\User\Models\User;

// Simple test to verify model instantiation
test('user model can be instantiated', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $user = new User();

    Assert::assertInstanceOf(User::class, $user);
});

test('user model can access connection', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $user = new User();

    // This should work if the connection resolver is properly set up
    Assert::assertSame('user', $user->getConnectionName());
});

test('user model can create basic record', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->skipUnlessUsersTableReady();

    $user = createTestUser([
        'name' => 'Test User',
        'first_name' => 'Test',
        'last_name' => 'User',
        'lang' => 'it',
        'is_active' => true,
    ]);

    Assert::assertInstanceOf(User::class, $user);
});
