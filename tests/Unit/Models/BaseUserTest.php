<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Base User', function (): void {
    test('base user extends eloquent model', function (): void {
<<<<<<< HEAD
        $baseUser = new TestBaseUser;
=======
        $baseUser = new TestBaseUser();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(Model::class, $baseUser);
    });

    test('base user has correct table name', function (): void {
<<<<<<< HEAD
        $baseUser = new TestBaseUser;
=======
        $baseUser = new TestBaseUser();
>>>>>>> laraxot/dev
        Assert::assertSame('test_users', $baseUser->getTable());
    });

    test('base user can be instantiated', function (): void {
<<<<<<< HEAD
        $baseUser = new TestBaseUser;
=======
        $baseUser = new TestBaseUser();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(BaseUser::class, $baseUser);
    });

    test('base user has proper inheritance chain', function (): void {
<<<<<<< HEAD
        $baseUser = new TestBaseUser;
=======
        $baseUser = new TestBaseUser();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(BaseUser::class, $baseUser);
        Assert::assertInstanceOf(Model::class, $baseUser);
    });

    test('base user has authentication traits', function (): void {
<<<<<<< HEAD
        $baseUser = new TestBaseUser;
=======
        $baseUser = new TestBaseUser();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(User::class, $baseUser);
        $traits = \class_uses_recursive($baseUser);

        Assert::assertContains(Notifiable::class, $traits);
    });
});
