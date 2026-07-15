<?php

declare(strict_types=1);

use Modules\User\Database\Seeders\RoleSeeder;
use Modules\User\Models\Role;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

/**
 * @covers \Modules\User\Database\Seeders\RoleSeeder
 */
it('creates expected roles', function (): void {
    $expectedRoles = [
        'super-admin',
        'admin',
        'moderator',
        'editor',
        'user',
        'guest',
    ];

    $seeder = new RoleSeeder();
    $seeder->setContainer($this->app);
    $seeder->run();

    foreach ($expectedRoles as $roleName) {
        $this->assertDatabaseHasRow('roles', [
            'name' => $roleName,
            'guard_name' => 'web',
        ], 'user');
    }

    $roleCount = Role::where('guard_name', 'web')->count();
    $this->assertGreaterThanOrEqual(count($expectedRoles), $roleCount);
});

it('is idempotent when run multiple times', function (): void {
    $seeder = new RoleSeeder();
    $seeder->setContainer($this->app);

    $seeder->run();
    $countAfterFirstRun = Role::where('guard_name', 'web')->count();

    $seeder->run();
    $countAfterSecondRun = Role::where('guard_name', 'web')->count();

    $this->assertSame($countAfterFirstRun, $countAfterSecondRun);
});
