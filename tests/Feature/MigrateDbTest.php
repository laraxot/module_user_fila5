<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\User\Tests\Feature;

use Modules\User\Tests\TestCase;
use Modules\User\Models\User;

uses(TestCase::class);

describe('Migrate Db', function (): void {
    test('it migrates the test database', function (): void {
        /* @var TestCase $this */
        $this->skipTest('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');
    });
=======
use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('migrates the test database', function () {
    $this->artisan('migrate:fresh', [
        '--force' => true,
        '--env' => 'testing',
        '--path' => [
            'database/migrations',
            'Modules/Xot/database/migrations',
            'Modules/User/database/migrations',
        ],
    ])->assertExitCode(0);
>>>>>>> 60a2c9a9 (.)
});
