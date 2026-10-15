<?php

declare(strict_types=1);

namespace Tests\Modules\User\Feature;

use Tests\Modules\User\TestCase;

uses(TestCase::class);

describe('Migrate Db', function (): void {
    test('it migrates the test database', function (): void {
        /* @var TestCase $this */
        $this->skipTest('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');
    });
});
