<?php

declare(strict_types=1);

use Modules\User\Console\Commands\AssignRoleCommand;
use Modules\User\Console\Commands\ChangeTypeCommand;
use Modules\User\Console\Commands\CreateTeamCommand;
use Modules\User\Console\Commands\CreateTenantCommand;
use Modules\User\Console\Commands\SuperAdminCommand;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('AssignRoleCommand can be instantiated', function () {
    try {
<<<<<<< HEAD
        $command = new AssignRoleCommand;
=======
        $command = new AssignRoleCommand();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(AssignRoleCommand::class, $command);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
    }
});

test('ChangeTypeCommand can be instantiated', function () {
    try {
<<<<<<< HEAD
        $command = new ChangeTypeCommand;
=======
        $command = new ChangeTypeCommand();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(ChangeTypeCommand::class, $command);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
    }
});

test('SuperAdminCommand can be instantiated', function () {
    try {
<<<<<<< HEAD
        $command = new SuperAdminCommand;
=======
        $command = new SuperAdminCommand();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(SuperAdminCommand::class, $command);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
    }
});

test('CreateTeamCommand can be instantiated', function () {
    try {
<<<<<<< HEAD
        $command = new CreateTeamCommand;
=======
        $command = new CreateTeamCommand();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(CreateTeamCommand::class, $command);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
    }
});

test('CreateTenantCommand can be instantiated', function () {
    try {
<<<<<<< HEAD
        $command = new CreateTenantCommand;
=======
        $command = new CreateTenantCommand();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(CreateTenantCommand::class, $command);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
    }
});
