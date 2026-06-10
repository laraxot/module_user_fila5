<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

// Simple test to verify basic functionality
uses(\Modules\User\Tests\TestCase::class);

test('user model can be created', function () {
    $user = new User();

    expect($user)->toBeInstanceOf(User::class);
});

test('user model can access connection', function () {
    $user = new User();

    expect($user->getConnectionName())->toBe('user');
});

test('user model can create basic record', function () {
    test()->skipUnlessUsersTableReady();

    $user = test()->createTestUser([
        'name' => 'Test User',
        'first_name' => 'Test',
        'last_name' => 'User',
        'lang' => 'it',
        'is_active' => true,
    ]);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->name)->toBe('Test User');
    expect($user->email)->not->toBeEmpty();
    expect($user->lang)->toBe('it');
    expect($user->is_active)->toBe(true);
});

test('user model can query records', function () {
    test()->skipUnlessUsersTableReady();

    $user1 = test()->createTestUser(['name' => 'User 1']);
    $user2 = test()->createTestUser(['name' => 'User 2']);

    $users = User::query()->whereIn('id', [$user1->id, $user2->id])->get();

    expect($users)->toHaveCount(2);
});

test('user model can filter records', function () {
    test()->skipUnlessUsersTableReady();

    $activeUser = test()->createTestUser([
        'name' => 'Active User',
        'is_active' => true,
    ]);
    $inactiveUser = test()->createTestUser([
        'name' => 'Inactive User',
        'is_active' => false,
    ]);

    $activeUsers = User::query()
        ->whereIn('id', [$activeUser->id, $inactiveUser->id])
        ->where('is_active', true)
        ->get();

    expect($activeUsers)->toHaveCount(1);
    expect($activeUsers->first()?->name)->toBe('Active User');
});

test('user model can update records', function () {
    test()->skipUnlessUsersTableReady();

    $user = test()->createTestUser(['name' => 'Original Name']);

    $user->name = 'Updated Name';
    $user->save();

    expect($user->name)->toBe('Updated Name');
});
