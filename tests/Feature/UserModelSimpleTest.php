<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class UserModelSimpleTest extends TestCase
{
    public function testUserModelCanBeInstantiated(): void
    {
        $user = new User();

        $this->assertInstanceOf(User::class, $user);
    }

    public function testUserModelCanAccessConnection(): void
    {
        $user = new User();

        $this->assertSame('user', $user->getConnectionName());
    }

    public function testUserModelCanCreateBasicRecord(): void
    {
        $this->skipUnlessUsersTableReady();

        $user = createTestUser([
            'name' => 'Test User',
            'first_name' => 'Test',
            'last_name' => 'User',
            'lang' => 'it',
            'is_active' => true,
        ]);

        $this->assertInstanceOf(User::class, $user);
    }
}
