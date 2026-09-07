<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
namespace Modules\User\Tests\Feature;

>>>>>>> 2024e2e7 (.)
=======
namespace Modules\User\Tests\Feature;

>>>>>>> f589f9b2 (.)
use Modules\User\Tests\TestCase;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> f589f9b2 (.)
describe('Migrate Db', function (): void {
    test('it migrates the test database', function (): void {
        /* @var TestCase $this */
        $this->skipTest('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');
    });
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
});
