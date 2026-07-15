<?php

declare(strict_types=1);

use Modules\User\Database\Seeders\UserDatabaseSeeder;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

/*
 * @covers \Modules\User\Database\Seeders\UserDatabaseSeeder
 */
it('runs UserDatabaseSeeder successfully', function (): void {
    $seeder = new UserDatabaseSeeder();
    $seeder->setContainer($this->app);

    $seeder->run();

    $this->assertDatabaseHasRow('roles', [
        'name' => 'super-admin',
        'guard_name' => 'web',
    ], 'user');

    $permissionCount = Permission::where('guard_name', 'web')->count();
    $this->assertGreaterThan(0, $permissionCount, 'Expected at least one permission to be created');
});

it('gives super-admin role all permissions after seeding', function (): void {
    $seeder = new UserDatabaseSeeder();
    $seeder->setContainer($this->app);

    $seeder->run();

    $superAdmin = Role::where('name', 'super-admin')
        ->where('guard_name', 'web')
        ->first();

    $this->assertNotNull($superAdmin, 'Super-admin role should exist');

    $allPermissions = Permission::all();
    $superAdminPermissions = $superAdmin->permissions;

    $this->assertGreaterThan(0, $allPermissions->count(), 'Expected permissions to exist');
    $this->assertGreaterThan(0, $superAdminPermissions->count(), 'Super-admin should have permissions');
});
