<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use PHPUnit\Framework\Assert;
use Modules\User\Models\User;

// Simple test to verify basic functionality
test('user model can be created', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $user = new User();

    Assert::assertInstanceOf(User::class, $user);
});

test('user model can access connection', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $user = new User();

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
    Assert::assertSame('Test User', $user->name);
    Assert::assertNotEmpty($user->email);
    Assert::assertSame('it', $user->lang);
    Assert::assertSame(true, $user->is_active);
});

test('user model can query records', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->skipUnlessUsersTableReady();

    $user1 = createTestUser(['name' => 'User 1']);
    $user2 = createTestUser(['name' => 'User 2']);

    $users = User::query()->whereIn('id', [$user1->id, $user2->id])->get();

    Assert::assertCount(2, $users);
});

test('user model can filter records', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->skipUnlessUsersTableReady();

    $activeUser = createTestUser([
        'name' => 'Active User',
        'is_active' => true,
    ]);
    $inactiveUser = createTestUser([
        'name' => 'Inactive User',
        'is_active' => false,
    ]);

    $activeUsers = User::query()
        ->whereIn('id', [$activeUser->id, $inactiveUser->id])
        ->where('is_active', true)
        ->get();

    Assert::assertCount(1, $activeUsers);
    Assert::assertSame('Active User', $activeUsers->first()?->name);
});

test('user model can update records', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->skipUnlessUsersTableReady();

    $user = createTestUser(['name' => 'Original Name']);

    $user->name = 'Updated Name';
    $user->save();

    Assert::assertSame('Updated Name', $user->name);
});
