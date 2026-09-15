<?php

declare(strict_types=1);

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\BaseUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('User Business Logic', function () {
    test('user extends base user', function () {
<<<<<<< .merge_file_jJHsUy
        Assert::assertInstanceOf(BaseUser::class, new User());
    });

    test('user has authentication capabilities', function () {
        $user = new User();
=======
<<<<<<< HEAD
        Assert::assertInstanceOf(BaseUser::class, new User);
    });

    test('user has authentication capabilities', function () {
        $user = new User;
=======
        Assert::assertInstanceOf(BaseUser::class, new User());
    });

    test('user has authentication capabilities', function () {
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->email = 'test@example.com';
        $user->password = 'hashed-password';

        Assert::assertSame('test@example.com', $user->email);
        Assert::assertTrue(Hash::check('hashed-password', $user->password));
    });

    test('user can have name components', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->first_name = 'Mario';
        $user->last_name = 'Rossi';
        $user->name = 'Mario Rossi';

        Assert::assertSame('Mario', $user->first_name);
        Assert::assertSame('Rossi', $user->last_name);
        Assert::assertSame('Mario Rossi', $user->name);
    });

    test('user has activation status', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->is_active = true;

        Assert::assertSame(true, $user->is_active);
    });

    test('user has otp capability', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->is_otp = true;

        Assert::assertSame(true, $user->is_otp);
    });

    test('user can have language preference', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->lang = 'it';

        Assert::assertSame('it', $user->lang);
    });

    test('user has email verification tracking', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $verifiedAt = Carbon::parse('2023-01-01 12:00:00');
        $user->email_verified_at = $verifiedAt;

        Assert::assertNotNull($user->email_verified_at);
        Assert::assertSame('2023-01-01 12:00:00', $user->email_verified_at->format('Y-m-d H:i:s'));
    });

    test('user has password expiry tracking', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $expiresAt = Carbon::parse('2023-12-31 23:59:59');
        $user->password_expires_at = $expiresAt;

        Assert::assertNotNull($user->password_expires_at);
        Assert::assertSame('2023-12-31 23:59:59', $user->password_expires_at->format('Y-m-d H:i:s'));
    });

    test('user can have current team', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->current_team_id = 1;

        Assert::assertSame(1, $user->current_team_id);
    });

    test('user can have profile photo', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->profile_photo_path = '/storage/profile-photos/user.jpg';

        Assert::assertSame('/storage/profile-photos/user.jpg', $user->profile_photo_path);
    });

    test('user can have remember token', function () {
<<<<<<< .merge_file_jJHsUy
        $user = new User();
=======
<<<<<<< HEAD
        $user = new User;
=======
        $user = new User();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_mXvzbW
        $user->remember_token = 'abc123def456';

        Assert::assertSame('abc123def456', $user->remember_token);
    });
});
