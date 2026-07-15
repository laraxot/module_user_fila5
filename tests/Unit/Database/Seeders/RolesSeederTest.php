<?php

declare(strict_types=1);

use Modules\User\Database\Seeders\RolesSeeder;
use Modules\User\Models\Role;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
/*
=======
/**
>>>>>>> a550648f (.)
 * @covers \Modules\User\Database\Seeders\RolesSeeder
 */
it('creates all expected roles', function (): void {
    $expectedRoles = [
        'super-admin',
        'admin',
        'moderator',
        'editor',
        'user',
        'guest',
    ];

    $seeder = new RolesSeeder();
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
    $seeder = new RolesSeeder();
    $seeder->setContainer($this->app);

    $seeder->run();
    $countAfterFirstRun = Role::where('guard_name', 'web')->count();

    $seeder->run();
    $countAfterSecondRun = Role::where('guard_name', 'web')->count();

    $this->assertSame($countAfterFirstRun, $countAfterSecondRun);
});
