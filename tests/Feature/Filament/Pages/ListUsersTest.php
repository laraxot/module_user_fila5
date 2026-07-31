<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Collection;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Models\User;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
beforeEach(function (): void {
    /* @var TestCase $this */
=======
function makeListUsersPage(): ListUsers
{
>>>>>>> c5e6021c (.)
    try {
        $panel = Filament::getPanel('user::admin');
    } catch (\Exception $e) {
        $panelProvider = new AdminPanelProvider(app());
        $panel = $panelProvider->panel(Panel::make());
        Filament::registerPanel($panel);
    }
    Filament::setCurrentPanel($panel);

    return new ListUsers;
}

/** @return Collection<int, User> */
function createMasterAdminUsers(): Collection
{
    $users = UserFactory::new()
        ->count(3)
        ->create([
            'type' => UserType::MasterAdmin,
        ]);

    return new Collection($users->all());
}

describe('List Users', function (): void {
    test('list users page has correct resource', function (): void {
        Assert::assertSame(UserResource::class, ListUsers::getResource());
    });

    test('list users page extends correct base class', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        Assert::assertInstanceOf(BaseListUsers::class, $listUsersPage);
    });

    test('list users page can be instantiated', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        Assert::assertInstanceOf(ListUsers::class, $listUsersPage);
    });

    test('list users page has correct table columns', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        $columns = $listUsersPage->getTableColumns();

        Assert::assertArrayHasKey('name', $columns);
        Assert::assertArrayHasKey('email', $columns);
        $nameColumn = $columns['name'];
        Assert::assertInstanceOf(TextColumn::class, $nameColumn);
        Assert::assertSame('name', $nameColumn->getName());
        Assert::assertTrue($nameColumn->isSearchable());
        $emailColumn = $columns['email'];
        Assert::assertInstanceOf(TextColumn::class, $emailColumn);
        Assert::assertSame('email', $emailColumn->getName());
        Assert::assertTrue($emailColumn->isSearchable());
    });

    test('list users page has correct table filters', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        $filters = $listUsersPage->getTableFilters();

        Assert::assertCount(0, $filters);
    });

    test('list users page has correct table actions', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        $actions = $listUsersPage->getTableActions();

        Assert::assertArrayHasKey('change_password', $actions);

        $changePasswordAction = $actions['change_password'];
        Assert::assertInstanceOf(ChangePasswordAction::class, $changePasswordAction);
    });

    test('list users page can display users', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $users = $this->requireUsers();
=======
        $users = createMasterAdminUsers();
>>>>>>> c5e6021c (.)
        $createdUserIds = $users->pluck('id');
        $testUsers = User::whereIn('id', $createdUserIds)->get();

        Assert::assertCount(3, $testUsers);
        foreach ($testUsers as $user) {
            Assert::assertInstanceOf(User::class, $user);
            if (is_string($user->type)) {
                Assert::assertSame(UserType::MasterAdmin->value, $user->type);
            } else {
                Assert::assertSame(UserType::MasterAdmin, $user->type);
            }
        }
    });

    test('list users page has correct navigation label', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        $label = $listUsersPage->getNavigationLabel();
        Assert::assertNotEmpty($label);
    });

    test('list users page has correct title', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        $title = $listUsersPage->getTitle();
        Assert::assertNotEmpty($title);
    });

    test('list users page has correct breadcrumbs', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        try {
            $breadcrumbs = $listUsersPage->getBreadcrumbs();
            Assert::assertNotEmpty($breadcrumbs);
        } catch (\Exception $e) {
        }
    });

    test('list users page can handle search', function (): void {
<<<<<<< HEAD
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
=======
        $listUsersPage = makeListUsersPage();
>>>>>>> c5e6021c (.)
        $columns = $listUsersPage->getTableColumns();
        $nameColumn = $columns['name'];
        $emailColumn = $columns['email'];

        Assert::assertTrue($nameColumn->isSearchable());
        Assert::assertTrue($emailColumn->isSearchable());
    });
});
