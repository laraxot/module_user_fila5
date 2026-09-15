<?php

declare(strict_types=1);

use Filament\Panel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('admin panel requires admin or super-admin role', function (): void {
<<<<<<< HEAD
    $user = new class extends BaseUser {
=======
<<<<<<< HEAD
    $user = new class extends BaseUser
    {
=======
    $user = new class extends BaseUser {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        public bool $superAdmin = false;

        public bool $hasAdminRole = false;

        public function isSuperAdmin(): bool
        {
            return $this->superAdmin;
        }

        /**
<<<<<<< HEAD
         * @param array<int, string>|Collection<int, string> $roles
=======
<<<<<<< HEAD
         * @param  array<int, string>|Collection<int, string>  $roles
=======
         * @param array<int, string>|Collection<int, string> $roles
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
         */
        public function hasRole($roles, ?string $guard = null): bool
        {
            return $this->hasAdminRole;
        }
    };

    $panel = app(Panel::class)->id('admin');

    Assert::assertFalse($user->canAccessPanel($panel));

    $user->hasAdminRole = true;
    Assert::assertTrue($user->canAccessPanel($panel));
});

test('password mutator hashes long passphrases instead of storing plaintext', function (): void {
<<<<<<< HEAD
    $user = new class extends BaseUser {
    };
=======
<<<<<<< HEAD
    $user = new class extends BaseUser {};
=======
    $user = new class extends BaseUser {
    };
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    $longPassphrase = 'this-is-a-very-long-passphrase-that-exceeds-thirty-two-characters';

    $user->password = $longPassphrase;

    $storedPassword = $user->getAttributes()['password'];
    Assert::assertTrue(Hash::check($longPassphrase, is_string($storedPassword) ? $storedPassword : ''));
});
