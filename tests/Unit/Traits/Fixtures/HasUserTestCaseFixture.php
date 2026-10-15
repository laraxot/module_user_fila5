<?php

declare(strict_types=1);

namespace Tests\Modules\User\Unit\Traits\Fixtures;

use Modules\User\Models\User;
use Tests\Modules\User\Traits\HasUserTestCase;

final class HasUserTestCaseFixture
{
    use HasUserTestCase;

    public function __construct()
    {
        $this->user = new User;
    }
}
