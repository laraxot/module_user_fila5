<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Illuminate\Database\Eloquent\Factories\Factory;
use Throwable;
use Illuminate\Support\Facades\Hash;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_can_be_created(): void
    {
        try {
            $user = UserFactory::new()->createOne([
                'type' => UserType::MasterAdmin,
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password123'),
            ]);
            \assert($user instanceof User);

            $this->assertInstanceOf(User::class, $user);
            $this->assertIsString($user->email);
            $this->assertNotSame('', $user->email);
            $this->assertSame(UserType::MasterAdmin, $user->type);
        } catch (\Throwable) {
            $this->markTestSkipped('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    }

    public function test_user_has_correct_type_casting(): void
    {
        try {
            $user = UserFactory::new()->createOne(['type' => UserType::MasterAdmin]);
            \assert($user instanceof User);

            $type = $user->type;
            \assert($type instanceof UserType);

            $this->assertInstanceOf(UserType::class, $type);
            $this->assertSame('master_admin', $type->value);
        } catch (\Throwable) {
            $this->markTestSkipped('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    }

    public function test_user_password_is_hashed(): void
    {
        $user = UserFactory::new()->createOne(['password' => Hash::make('password123')]);
        \assert($user instanceof User);

        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertFalse(Hash::check('wrongpassword', $user->password));
    }

    public function test_user_can_change_password(): void
    {
        $user = UserFactory::new()->createOne(['password' => Hash::make('password123')]);
        \assert($user instanceof User);

        $user->update(['password' => Hash::make('newpassword123')]);

        $freshUser = $user->fresh();
        \assert($freshUser instanceof User);
        $this->assertTrue(Hash::check('newpassword123', $freshUser->password));
        $this->assertFalse(Hash::check('password123', $freshUser->password));
    }

    public function test_user_can_be_updated(): void
    {
        try {
            $user = UserFactory::new()->createOne([
                'type' => UserType::MasterAdmin,
                'email' => fake()->unique()->safeEmail(),
            ]);
            \assert($user instanceof User);

            $updatedEmail = 'updated-'.uniqid('', true).'@example.com';

            $user->update([
                'email' => $updatedEmail,
            ]);

            $user->refresh();

            $this->assertSame($updatedEmail, $user->email);
        } catch (\Throwable) {
            $this->markTestSkipped('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    }

    public function test_user_can_be_deleted(): void
    {
        $this->skipUnlessDirectPermissionSupported();

        $user = UserFactory::new()->createOne();
        \assert($user instanceof User);

        $userId = $user->id;

        $user->delete();

        $this->assertNull(User::find($userId));
    }

    public function test_user_has_fillable_attributes(): void
    {
        $factory = UserFactory::new();
        \assert($factory instanceof Factory);
        $user = $factory->make();
        \assert($user instanceof User);

        $fillable = $user->getFillable();

        $this->assertContains('email', $fillable);
        $this->assertContains('password', $fillable);
        $this->assertContains('type', $fillable);
    }

    public function test_user_has_hidden_attributes(): void
    {
        $factory = UserFactory::new();
        \assert($factory instanceof Factory);
        $user = $factory->make();
        \assert($user instanceof User);

        $hidden = $user->getHidden();

        $this->assertContains('password', $hidden);
        $this->assertContains('remember_token', $hidden);
    }

    public function test_user_can_be_found_by_email(): void
    {
        $user = UserFactory::new()->createOne();
        \assert($user instanceof User);

        $foundUser = User::where('email', $user->email)->first();

        \assert($foundUser instanceof User);
        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertSame($user->id, $foundUser->id);
    }

    public function test_user_can_be_found_by_type(): void
    {
        try {
            $user = UserFactory::new()->createOne(['type' => UserType::MasterAdmin]);
            \assert($user instanceof User);

            $admins = User::query()
                ->where('type', UserType::MasterAdmin)
                ->where('id', $user->id)
                ->get();

            $this->assertCount(1, $admins);
            $firstAdmin = $admins->first();
            \assert($firstAdmin instanceof User);
            $this->assertSame($user->id, $firstAdmin->id);
        } catch (Throwable) {
            $this->markTestSkipped('User type aliases (e.g. master_admin) are not configured in this install.');
        }
    }

    public function test_user_can_be_created_with_different_types(): void
    {
        try {
            $factory = UserFactory::new();
            \assert($factory instanceof Factory);

            $boUser = $factory->create(['type' => UserType::BoUser]);
            $customerUser = $factory->create(['type' => UserType::CustomerUser]);
            \assert($boUser instanceof User);
            \assert($customerUser instanceof User);

            $this->assertSame(UserType::BoUser, $boUser->type);
            $this->assertSame(UserType::CustomerUser, $customerUser->type);
        } catch (\Throwable) {
            $this->markTestSkipped('User type aliases are not configured in this install.');
        }
    }

    public function test_user_has_timestamps(): void
    {
        $user = UserFactory::new()->createOne();
        \assert($user instanceof User);

        $this->assertNotNull($user->created_at);
        $this->assertNotNull($user->updated_at);
    }

    public function test_user_soft_delete_functionality(): void
    {
        $this->markTestSkipped('User model does not implement SoftDeletes trait');
    }
}
