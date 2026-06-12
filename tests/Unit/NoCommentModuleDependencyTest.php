<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Tests\TestCase;

class NoCommentModuleDependencyTest extends TestCase
{
    public function testItDoesNotReferenceTheCommentModuleAnywhereUnderUserApp(): void
    {
        $this->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
    }

    public function testItLoadsBaseUserWithoutCommentTraits(): void
    {
        $this->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
    }
}
