<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;

class BaseUserTest extends TestCase
{
    public function testBaseUserExtendsEloquentModel(): void
    {
        $baseUser = new TestBaseUser();
        $this->assertInstanceOf(Model::class, $baseUser);
    }

    public function testBaseUserHasCorrectTableName(): void
    {
        $baseUser = new TestBaseUser();
        $this->assertSame('test_users', $baseUser->getTable());
    }

    public function testBaseUserCanBeInstantiated(): void
    {
        $baseUser = new TestBaseUser();
        $this->assertInstanceOf(BaseUser::class, $baseUser);
    }

    public function testBaseUserHasProperInheritanceChain(): void
    {
        $baseUser = new TestBaseUser();
        $this->assertInstanceOf(BaseUser::class, $baseUser);
        $this->assertInstanceOf(Model::class, $baseUser);
    }

    public function testBaseUserHasAuthenticationTraits(): void
    {
        $baseUser = new TestBaseUser();
        $this->assertInstanceOf(User::class, $baseUser);
        $traits = \class_uses_recursive($baseUser);

        $this->assertContains(Notifiable::class, $traits);
    }
}
