<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

namespace Modules\User\Tests\Unit\Database\Seeders;

>>>>>>> laraxot/dev
use Modules\User\Database\Seeders\UserDatabaseSeeder;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/*
 * @covers \Modules\User\Database\Seeders\UserDatabaseSeeder
 */
it('runs UserDatabaseSeeder successfully', function (): void {
    $seeder = new UserDatabaseSeeder;
    $seeder->setContainer(app());

    $seeder->run();

    Assert::assertTrue(Role::where('name', 'super-admin')->where('guard_name', 'web')->exists());

    $permissionCount = Permission::where('guard_name', 'web')->count();
    Assert::assertGreaterThan(0, $permissionCount);
});

it('gives super-admin role all permissions after seeding', function (): void {
    $seeder = new UserDatabaseSeeder;
    $seeder->setContainer(app());

    $seeder->run();

    $superAdmin = Role::where('name', 'super-admin')
        ->where('guard_name', 'web')
        ->firstOrFail();

    $allPermissions = Permission::all();
    $superAdminPermissions = $superAdmin->permissions;

    Assert::assertGreaterThan(0, $allPermissions->count());
    Assert::assertGreaterThan(0, $superAdminPermissions->count());
});
=======

/**
 * Tests for UserDatabaseSeeder.
 *
 * @covers \Modules\User\Database\Seeders\UserDatabaseSeeder
 */
final class UserDatabaseSeederTest extends TestCase
{
    /**
     * Test that UserDatabaseSeeder runs without errors.
     */
    public function testUserDatabaseSeederRunsSuccessfully(): void
    {
        // Arrange
        $seeder = new UserDatabaseSeeder();
        $seeder->setContainer($this->app);

        // Act & Assert - Should not throw any exceptions
        $seeder->run();

        // Verify that roles were created
        $this->assertDatabaseHasRow('roles', [
            'name' => 'super-admin',
            'guard_name' => 'web',
        ], 'user');

        // Verify that at least one permission exists
        $permissionCount = Permission::where('guard_name', 'web')->count();
        $this->assertGreaterThan(0, $permissionCount, 'Expected at least one permission to be created');
    }

    /**
     * Test that super-admin role has all permissions after seeding.
     */
    public function testSuperAdminRoleHasAllPermissions(): void
    {
        // Arrange
        $seeder = new UserDatabaseSeeder();
        $seeder->setContainer($this->app);

        // Act
        $seeder->run();

        // Assert
        $superAdmin = Role::where('name', 'super-admin')
            ->where('guard_name', 'web')
            ->first();

        $this->assertNotNull($superAdmin, 'Super-admin role should exist');

        $allPermissions = Permission::all();
        $superAdminPermissions = $superAdmin->permissions;

        $this->assertGreaterThan(0, $allPermissions->count(), 'Expected permissions to exist');
        $this->assertGreaterThan(0, $superAdminPermissions->count(), 'Super-admin should have permissions');
    }
}
>>>>>>> laraxot/dev
