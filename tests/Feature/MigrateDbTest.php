<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('migrates the test database', function () {
    $this->markTestSkipped('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');

    $this->artisan('migrate:fresh', [
        '--force' => true,
        '--env' => 'testing',
        '--path' => [
            'database/migrations',
            'Modules/Xot/database/migrations',
            'Modules/User/database/migrations',
        ],
    ])->assertExitCode(0);
});
