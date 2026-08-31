<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Filament\Facades\Filament;
use Filament\Schemas\SchemasServiceProvider;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Filament\Pages\MyProfilePage;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\User\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

use function Pest\Laravel\actingAs;

uses(TestCase::class);

beforeEach(function (): void {
    /** @var TestCase $this */
=======

use function Pest\Laravel\actingAs;

use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var TestCase $this */
>>>>>>> laraxot/dev
    $this->skipUnlessUsersTableReady();
    $this->skipUnlessUserColumn('profiles', 'uuid', 'profiles.uuid column is not available in the test database.');

    app()->register(AdminPanelProvider::class);
    app()->register(SchemasServiceProvider::class);
    Filament::setCurrentPanel(Filament::getPanel('user::admin'));
});

describe('Change Profile Password', function (): void {
    test('can change profile password', function (): void {
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('old_password'),
        ]);

        actingAs($user);

        Livewire::test(MyProfilePage::class)
            ->fill([
                'passwordData.current_password' => 'old_password',
                'passwordData.new_password' => 'new_password',
                'passwordData.password_confirmation' => 'new_password',
            ])
            ->call('updatePassword')
            ->assertHasNoFormErrors();

<<<<<<< HEAD
        Assert::assertTrue(Hash::check('new_password', $user->fresh()->password ?? ''));
=======
        Assert::assertTrue(Hash::check('new_password', (string) $user->fresh()?->password));
>>>>>>> laraxot/dev
    });

    test('cannot change password with wrong current password', function (): void {
        $user = UserFactory::new()->createOne([
            'password' => Hash::make('old_password'),
        ]);

        actingAs($user);

        $testable = Livewire::test(MyProfilePage::class)
            ->fill([
                'passwordData.current_password' => 'wrong_password',
                'passwordData.new_password' => 'new_password',
                'passwordData.password_confirmation' => 'new_password',
            ])
            ->call('updatePassword');

        $testable->assertHasErrors();

        $errors = $testable->errors();
        Assert::assertIsArray($errors);
        $hasCurrentPasswordError = false;
        foreach (array_keys($errors) as $errorKey) {
<<<<<<< HEAD
            if (str_contains($errorKey, 'current_password')) {
=======
            if (str_contains((string) $errorKey, 'current_password')) {
>>>>>>> laraxot/dev
                $hasCurrentPasswordError = true;
                break;
            }
        }
        Assert::assertTrue($hasCurrentPasswordError);
<<<<<<< HEAD
        Assert::assertTrue(Hash::check('old_password', $user->fresh()->password ?? ''));
=======
        Assert::assertTrue(Hash::check('old_password', (string) $user->fresh()?->password));
>>>>>>> laraxot/dev
    });
});
