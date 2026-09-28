<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

class UserExecuteCoverage50Test extends \Modules\User\Tests\TestCase
{
    public function testSomething(): void
    {
        Assert::assertInstanceOf(User::class, new User());
    }
}
