<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
it('migrates the test database', function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('Destructive migrate:fresh is not run in module tests — use forward-only migrate externally.');
});
