<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits;

use Modules\User\Models\Device;
use Modules\User\Tests\TestCase;

uses(TestCase::class)->group('user-db');

it('exposes a belongsToMany devices relation on the user model', function (): void {
    $user = TestCase::createTestUser();

    $relation = $user->devices();

    expect($relation->getRelated()::class)->toBe(Device::class);
    expect($relation->getRelationName())->toBe('devices');
});

it('attaches and retrieves devices for a user', function (): void {
    $user = TestCase::createTestUser();

    $device = Device::factory()->createOne();

    $user->devices()->attach($device->getKey());

    $devices = $user->refresh()->devices;

    expect($devices)->toHaveCount(1);
    expect($devices->first()?->getKey())->toBe($device->getKey());
});

it('detaches devices from a user', function (): void {
    $user = TestCase::createTestUser();
    $device = Device::factory()->createOne();

    $user->devices()->attach($device->getKey());
    expect($user->refresh()->devices)->toHaveCount(1);

    $user->devices()->detach($device->getKey());
    expect($user->refresh()->devices)->toHaveCount(0);
});
