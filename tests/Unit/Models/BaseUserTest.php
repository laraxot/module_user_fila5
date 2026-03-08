<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    // @var mixed baseUser = new class extends BaseUser {
        protected $table = 'test_users';
    };
});

test('base user extends eloquent model', function () {
    expect(// @var mixed baseUser;
});

test('base user has correct table name', function () {
    expect(// @var mixed baseUser->getTable(;
});

test('base user can be instantiated', function () {
    expect(// @var mixed baseUser;
});

test('base user has proper inheritance chain', function () {
    expect(// @var mixed baseUser;
    expect(// @var mixed baseUser;
});

test('base user has authentication traits', function () {
    // BaseUser extends Authenticatable (Illuminate\Foundation\Auth\User)
    // which uses Notifiable. Use instanceof check instead of class_uses().
    expect(// @var mixed baseUser;

    // Verify Notifiable trait is present recursively
    $allTraits = [];
    $class = get_class(// @var mixed baseUser;
    while (false !== $class) {
        $allTraits = array_merge($allTraits, class_uses($class) ?: []);
        $class = get_parent_class($class);
    }

    expect($allTraits)->toHaveKey(Notifiable::class);
});
