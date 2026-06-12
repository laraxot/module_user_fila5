<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Tests\TestCase;

class MigrateDbTest extends TestCase
{
    public function test_it_migrates_the_test_database(): void
    {
        $this->markTestSkipped('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');
    }
}
