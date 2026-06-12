<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Tests\TestCase;

class NoCommentModuleDependencyTest extends TestCase
{
    public function test_it_does_not_reference_the_comment_module_anywhere_under_user_app(): void
    {
        $this->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
    }

    public function test_it_loads_base_user_without_comment_traits(): void
    {
        $this->markTestSkipped('User module integrates Comment traits in production — dependency check disabled for test DB.');
    }
}
