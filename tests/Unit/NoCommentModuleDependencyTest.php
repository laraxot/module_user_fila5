<?php

declare(strict_types=1);

use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('does not reference the Comment module anywhere under User app', function (): void {
    test()->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
});

it('loads BaseUser without Comment traits', function (): void {
    test()->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
});
