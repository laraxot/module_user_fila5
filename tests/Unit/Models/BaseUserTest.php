<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;

uses(TestCase::class);

beforeEach(function (): void {
    $this->baseUser = new TestBaseUser();
});

test('base user extends eloquent model', function (): void {
    expect($this->baseUser)->toBeInstanceOf(Model::class);
});

test('base user has correct table name', function (): void {
    expect($this->baseUser->getTable())->toBe('test_users');
});

test('base user can be instantiated', function (): void {
    expect($this->baseUser)->toBeInstanceOf(BaseUser::class);
});

test('base user has proper inheritance chain', function (): void {
    expect($this->baseUser)->toBeInstanceOf(BaseUser::class);
    expect($this->baseUser)->toBeInstanceOf(Model::class);
});

test('base user has authentication traits', function (): void {
    expect($this->baseUser)->toBeInstanceOf(User::class);

    $traits = class_uses_recursive($this->baseUser);

    expect($traits)->toContain(Notifiable::class);
});
