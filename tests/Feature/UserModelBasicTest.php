<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class UserModelBasicTest extends TestCase
{
    public function testUserModelCanBeCreated(): void
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
        $this->assertSame('Test User', $user->name);
        $this->assertNotEmpty($user->email);
        $this->assertSame('it', $user->lang);
        $this->assertSame(true, $user->is_active);
    }

    public function testUserModelCanQueryRecords(): void
    {
        $this->skipUnlessUsersTableReady();

        $user1 = createTestUser(['name' => 'User 1']);
        $user2 = createTestUser(['name' => 'User 2']);

        $users = User::query()->whereIn('id', [$user1->id, $user2->id])->get();

        $this->assertCount(2, $users);
    }

    public function testUserModelCanFilterRecords(): void
    {
        $this->skipUnlessUsersTableReady();

        $activeUser = createTestUser([
            'name' => 'Active User',
            'is_active' => true,
        ]);
        $inactiveUser = createTestUser([
            'name' => 'Inactive User',
            'is_active' => false,
        ]);

        $activeUsers = User::query()
            ->whereIn('id', [$activeUser->id, $inactiveUser->id])
            ->where('is_active', true)
            ->get();

        $this->assertCount(1, $activeUsers);
        $this->assertSame('Active User', $activeUsers->first()?->name);
    }

    public function testUserModelCanUpdateRecords(): void
    {
        $this->skipUnlessUsersTableReady();

        $user = createTestUser(['name' => 'Original Name']);

        $user->name = 'Updated Name';
        $user->save();

        $this->assertSame('Updated Name', $user->name);
    }
}
