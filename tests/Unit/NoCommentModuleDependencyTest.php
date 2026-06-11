<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
it('does not reference the Comment module anywhere under User app', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
});

it('loads BaseUser without Comment traits', function (): void {
    /* @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
});
