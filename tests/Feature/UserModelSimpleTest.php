<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

// Simple test to verify model instantiation
uses(TestCase::class);

test('user model can be instantiated', function () {
    $user = new User();

    expect($user)->toBeInstanceOf(User::class);
});

test('user model can access connection', function () {
    $user = new User();

    // This should work if the connection resolver is properly set up
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

    expect($user)
        ->toBeInstanceOf(User::class)
        ->name->toBe('Test User')
        ->email->not->toBeEmpty()
        ->lang->toBe('it')
        ->is_active->toBe(true);
});
