<?php

declare(strict_types=1);
<<<<<<< HEAD
use Filament\Panel;
use Illuminate\Support\Collection;
=======

>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\BaseUser;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('admin panel requires admin or super-admin role', function (): void {
    $user = new class extends BaseUser
    {
        public bool $superAdmin = false;

        public bool $hasAdminRole = false;

        public function isSuperAdmin(): bool
        {
            return $this->superAdmin;
        }

<<<<<<< HEAD
        /**
         * @param  array<int, string>|Collection<int, string>  $roles
         */
=======
>>>>>>> 350420cb (Check & fix styling)
        public function hasRole($roles, ?string $guard = null): bool
        {
            return $this->hasAdminRole;
        }
    };

<<<<<<< HEAD
    $panel = app(Panel::class)->id('admin');
=======
    $panel = Mockery::mock(Filament\Panel::class);
    $panel->shouldReceive('getId')->andReturn('admin');
>>>>>>> 350420cb (Check & fix styling)

    Assert::assertFalse($user->canAccessPanel($panel));

    $user->hasAdminRole = true;
    Assert::assertTrue($user->canAccessPanel($panel));
});

test('password mutator hashes long passphrases instead of storing plaintext', function (): void {
<<<<<<< .merge_file_HRYX6t
<<<<<<< HEAD
    $user = new class extends BaseUser {
    };
=======
    $user = new BaseUser();
>>>>>>> 350420cb (Check & fix styling)
=======
    $user = new class extends BaseUser {};
>>>>>>> .merge_file_T1gf2a
    $longPassphrase = 'this-is-a-very-long-passphrase-that-exceeds-thirty-two-characters';

    $user->password = $longPassphrase;

<<<<<<< HEAD
    $storedPassword = $user->getAttributes()['password'];
    Assert::assertTrue(Hash::check($longPassphrase, is_string($storedPassword) ? $storedPassword : ''));
=======
    Assert::assertTrue(Hash::check($longPassphrase, (string) $user->getAttributes()['password']));
>>>>>>> 350420cb (Check & fix styling)
});
