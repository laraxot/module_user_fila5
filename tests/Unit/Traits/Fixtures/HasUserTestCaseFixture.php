<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits\Fixtures;

use Modules\User\Models\User;
use Modules\User\Tests\Traits\HasUserTestCase;

final class HasUserTestCaseFixture
{
    use HasUserTestCase;

    public function __construct()
    {
<<<<<<< HEAD
        $this->user = new User();
=======
<<<<<<< HEAD
        $this->user = new User;
=======
        $this->user = new User();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    }
}
