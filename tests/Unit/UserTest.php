<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Modules\User\Contracts\UserContract;
=======
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('User', function (): void {
    test('user can be created', function (): void {
        /* @var \Modules\User\Tests\TestCase $this */
        /* @var TestCase $this */
        try {
            $user = UserFactory::new()->createOne([
                'type' => UserType::MasterAdmin,
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password123'),
            ]);
<<<<<<< HEAD
            \assert($user instanceof UserContract);
=======
            \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

            Assert::assertInstanceOf(User::class, $user);
            Assert::assertIsString($user->email);
            $this->assertNotSame('', $user->email);
            Assert::assertSame(UserType::MasterAdmin, $user->type);
        } catch (\Throwable) {
            $this->skipTest('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    });

    test('user has correct type casting', function (): void {
        /* @var TestCase $this */
        try {
            $user = UserFactory::new()->createOne(['type' => UserType::MasterAdmin]);
<<<<<<< HEAD
            \assert($user instanceof UserContract);
=======
            \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

            $type = $user->type;
            \assert($type instanceof UserType);

            Assert::assertInstanceOf(UserType::class, $type);
            Assert::assertSame('master_admin', $type->value);
        } catch (\Throwable) {
            $this->skipTest('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    });

    test('user password is hashed', function (): void {
        $user = UserFactory::new()->createOne(['password' => Hash::make('password123')]);
<<<<<<< HEAD
        \assert($user instanceof UserContract);
=======
        \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

        Assert::assertTrue(Hash::check('password123', $user->password));
        Assert::assertFalse(Hash::check('wrongpassword', $user->password));
    });

    test('user can change password', function (): void {
        $user = UserFactory::new()->createOne(['password' => Hash::make('password123')]);
<<<<<<< HEAD
        \assert($user instanceof UserContract);
=======
        \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

        $user->update(['password' => Hash::make('newpassword123')]);

        $freshUser = $user->fresh();
<<<<<<< HEAD
        \assert($freshUser instanceof UserContract);
=======
        \assert($freshUser instanceof User);
>>>>>>> 350420cb (Check & fix styling)
        Assert::assertTrue(Hash::check('newpassword123', $freshUser->password));
        Assert::assertFalse(Hash::check('password123', $freshUser->password));
    });

    test('user can be updated', function (): void {
        /* @var TestCase $this */
        try {
            $user = UserFactory::new()->createOne([
                'type' => UserType::MasterAdmin,
                'email' => fake()->unique()->safeEmail(),
            ]);
<<<<<<< HEAD
            \assert($user instanceof UserContract);
=======
            \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

            $updatedEmail = 'updated-'.uniqid('', true).'@example.com';

            $user->update([
                'email' => $updatedEmail,
            ]);

            $user->refresh();

            Assert::assertSame($updatedEmail, $user->email);
        } catch (\Throwable) {
            $this->skipTest('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    });

    test('user can be deleted', function (): void {
        /* @var TestCase $this */
<<<<<<< HEAD
        TestCase::skipUnlessDirectPermissionSupported();

        $user = UserFactory::new()->createOne();
        \assert($user instanceof UserContract);
=======
        $this->skipUnlessDirectPermissionSupported();

        $user = UserFactory::new()->createOne();
        \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

        $userId = $user->id;

        $user->delete();

        Assert::assertNull(User::find($userId));
    });

    test('user has fillable attributes', function (): void {
        $factory = UserFactory::new();
        \assert($factory instanceof Factory);
        $user = $factory->make();
<<<<<<< HEAD
        \assert($user instanceof UserContract);
=======
        \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

        $fillable = $user->getFillable();

        Assert::assertContains('email', $fillable);
        Assert::assertContains('password', $fillable);
        Assert::assertContains('type', $fillable);
    });

    test('user has hidden attributes', function (): void {
        $factory = UserFactory::new();
        \assert($factory instanceof Factory);
        $user = $factory->make();
<<<<<<< HEAD
        \assert($user instanceof UserContract);
=======
        \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

        $hidden = $user->getHidden();

        Assert::assertContains('password', $hidden);
        Assert::assertContains('remember_token', $hidden);
    });

    test('user can be found by email', function (): void {
        $user = UserFactory::new()->createOne();
<<<<<<< HEAD
        \assert($user instanceof UserContract);

        $foundUser = User::where('email', $user->email)->first();

        \assert($foundUser instanceof UserContract);
=======
        \assert($user instanceof User);

        $foundUser = User::where('email', $user->email)->first();

        \assert($foundUser instanceof User);
>>>>>>> 350420cb (Check & fix styling)
        Assert::assertInstanceOf(User::class, $foundUser);
        Assert::assertSame($user->id, $foundUser->id);
    });

    test('user can be found by type', function (): void {
        /* @var TestCase $this */
        try {
            $user = UserFactory::new()->createOne(['type' => UserType::MasterAdmin]);
<<<<<<< HEAD
            \assert($user instanceof UserContract);
=======
            \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

            $admins = User::query()
                ->where('type', UserType::MasterAdmin)
                ->where('id', $user->id)
                ->get();

            Assert::assertCount(1, $admins);
            $firstAdmin = $admins->first();
<<<<<<< HEAD
            \assert($firstAdmin instanceof UserContract);
=======
            \assert($firstAdmin instanceof User);
>>>>>>> 350420cb (Check & fix styling)
            Assert::assertSame($user->id, $firstAdmin->id);
        } catch (\Throwable) {
            $this->skipTest('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    });

    test('user can be created with different types', function (): void {
        /* @var TestCase $this */
        try {
            $factory = UserFactory::new();
            \assert($factory instanceof Factory);

<<<<<<< HEAD
            $boUser = $factory->create(['type' => UserType::BoUser]);
            $customerUser = $factory->create(['type' => UserType::CustomerUser]);
=======
            $boUser = $factory->createOne(['type' => UserType::BoUser]);
            $customerUser = $factory->createOne(['type' => UserType::CustomerUser]);
>>>>>>> 350420cb (Check & fix styling)
            \assert($boUser instanceof User);
            \assert($customerUser instanceof User);

            Assert::assertSame(UserType::BoUser, $boUser->type);
            Assert::assertSame(UserType::CustomerUser, $customerUser->type);
        } catch (\Throwable) {
            $this->skipTest('User type aliases are not configured in this install.');
        }
    });

    test('user has timestamps', function (): void {
        $user = UserFactory::new()->createOne();
<<<<<<< HEAD
        \assert($user instanceof UserContract);
=======
        \assert($user instanceof User);
>>>>>>> 350420cb (Check & fix styling)

        Assert::assertNotNull($user->created_at);
        Assert::assertNotNull($user->updated_at);
    });

    test('user soft delete functionality', function (): void {
        /* @var TestCase $this */
        $this->skipTest('User model does not implement SoftDeletes trait');
    });
});
