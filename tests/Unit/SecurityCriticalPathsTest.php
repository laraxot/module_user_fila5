<?php

declare(strict_types=1);

use Filament\Panel;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Fixtures\AdminPanelAccessUserFixture;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use Modules\Xot\Tests\XotBasePest;
=======
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
>>>>>>> laraxot/dev
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('admin panel requires admin or super-admin role', function (): void {
<<<<<<< HEAD
    $user = new AdminPanelAccessUserFixture();
=======
    $user = new class extends BaseUser {
        public bool $superAdmin = false;

        public bool $hasAdminRole = false;

        public function isSuperAdmin(): bool
        {
            return $this->superAdmin;
        }

        /**
         * @param array<int, string>|Collection<int, string> $roles
         */
        public function hasRole($roles, ?string $guard = null): bool
        {
            return $this->hasAdminRole;
        }
    };
>>>>>>> laraxot/dev

    $panel = app(Panel::class)->id('admin');

    Assert::assertFalse($user->canAccessPanel($panel));

    $user->hasAdminRole = true;
    Assert::assertTrue($user->canAccessPanel($panel));
});

test('password mutator hashes long passphrases instead of storing plaintext', function (): void {
<<<<<<< HEAD
    $user = new TestBaseUser();
=======
    $user = new class extends BaseUser {
    };
>>>>>>> laraxot/dev
    $longPassphrase = 'this-is-a-very-long-passphrase-that-exceeds-thirty-two-characters';

    $user->password = $longPassphrase;

<<<<<<< HEAD
    Assert::assertTrue(Hash::check($longPassphrase, XotBasePest::assertString($user->getAttributes()['password'])));
=======
    Assert::assertTrue(Hash::check($longPassphrase, (string) $user->getAttributes()['password']));
>>>>>>> laraxot/dev
});
