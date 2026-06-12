<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Tests\TestCase;

class MigrateDbTest extends TestCase
{
    public function testItMigratesTheTestDatabase(): void
    {
        $this->markTestSkipped('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');
    }
}
