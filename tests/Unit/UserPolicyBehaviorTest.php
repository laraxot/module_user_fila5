<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Mockery;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use Modules\User\Models\Policies\UserPolicy;
use Modules\User\Tests\TestCase;

class UserPolicyBehaviorTest extends \Modules\User\Tests\TestCase
{
    protected UserPolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new UserPolicy();
        $this->actingAs(UserFactory::new()->createOne());
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testCreate(): void
    {
        $user = UserFactory::new()->createOne();
        $this->assertTrue($this->policy->create($user));
    }
}
