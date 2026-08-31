<?php

declare(strict_types=1);

use Filament\Panel;
use Illuminate\Support\Facades\Hash;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Fixtures\AdminPanelAccessUserFixture;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('admin panel requires admin or super-admin role', function (): void {
    $user = new AdminPanelAccessUserFixture();

    $panel = app(Panel::class)->id('admin');

    Assert::assertFalse($user->canAccessPanel($panel));

    $user->hasAdminRole = true;
    Assert::assertTrue($user->canAccessPanel($panel));
});

test('password mutator hashes long passphrases instead of storing plaintext', function (): void {
    $user = new TestBaseUser();
    $longPassphrase = 'this-is-a-very-long-passphrase-that-exceeds-thirty-two-characters';

    $user->password = $longPassphrase;

    Assert::assertTrue(Hash::check($longPassphrase, XotBasePest::assertString($user->getAttributes()['password'])));
});
