<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Database\Seeders\RolesSeeder;
use Modules\User\Models\Role;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/*
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

    $seeder = new RolesSeeder;
    $seeder->setContainer(app());
    $seeder->run();

    foreach ($expectedRoles as $roleName) {
        Assert::assertTrue(Role::where('name', $roleName)->where('guard_name', 'web')->exists());
    }

    $roleCount = Role::where('guard_name', 'web')->count();
    Assert::assertGreaterThanOrEqual(count($expectedRoles), $roleCount);
});

it('is idempotent when run multiple times', function (): void {
    $seeder = new RolesSeeder;
    $seeder->setContainer(app());

    $seeder->run();
    $countAfterFirstRun = Role::where('guard_name', 'web')->count();

    $seeder->run();
    $countAfterSecondRun = Role::where('guard_name', 'web')->count();

    Assert::assertSame($countAfterFirstRun, $countAfterSecondRun);
});
=======

namespace Modules\User\Tests\Unit\Database\Seeders;

use Modules\User\Database\Seeders\RolesSeeder;
use Modules\User\Models\Role;
use Modules\User\Tests\TestCase;

/**
 * Tests for RolesSeeder.
 *
 * @covers \Modules\User\Database\Seeders\RolesSeeder
 */
final class RolesSeederTest extends TestCase
{
    /**
     * Test that RolesSeeder creates all expected roles.
     */
    public function testRolesSeederCreatesExpectedRoles(): void
    {
        // Arrange
        $expectedRoles = [
            'super-admin',
            'admin',
            'moderator',
            'editor',
            'user',
            'guest',
        ];

        // Act
        $seeder = new RolesSeeder();
        $seeder->setContainer($this->app);
        $seeder->run();

        // Assert
        foreach ($expectedRoles as $roleName) {
            $this->assertDatabaseHasRow('roles', [
                'name' => $roleName,
                'guard_name' => 'web',
            ], 'user');
        }

        // Verify exact count
        $roleCount = Role::where('guard_name', 'web')->count();
        $this->assertGreaterThanOrEqual(count($expectedRoles), $roleCount);
    }

    /**
     * Test that RolesSeeder is idempotent (can run multiple times without duplication).
     */
    public function testRolesSeederIsIdempotent(): void
    {
        // Arrange
        $seeder = new RolesSeeder();
        $seeder->setContainer($this->app);

        // Act - Run twice
        $seeder->run();
        $countAfterFirstRun = Role::where('guard_name', 'web')->count();

        $seeder->run();
        $countAfterSecondRun = Role::where('guard_name', 'web')->count();

        // Assert - Count should be the same
        $this->assertSame($countAfterFirstRun, $countAfterSecondRun);
    }
}
>>>>>>> laraxot/dev
