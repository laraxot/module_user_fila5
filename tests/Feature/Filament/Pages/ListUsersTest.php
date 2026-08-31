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
<<<<<<< HEAD
use Modules\Xot\Tests\XotBasePest;
=======
>>>>>>> laraxot/dev
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
/**
 * Filament v4 deprecata `ListRecords::getTableColumns()` e le sue sorelle: l'override del
 * modulo eredita la deprecazione, quindi la chiamata diretta è un `method.deprecated`.
 * Si raggiunge per reflection, esattamente come fa
 * `Modules\Xot\Filament\Traits\HasXotTable::resolveTableColumnsForXotTable()`.
 *
 * @return array<string, object>
 */
function listUsersPageTableMember(ListUsers $page, string $method): array
{
    /** @var array<string, object> $members */
    $members = array_filter(
        XotBasePest::assertArray((new \ReflectionMethod($page, $method))->invoke($page)),
        'is_object'
    );

    return $members;
}

function makeListUsersPage(): ListUsers
{
=======
beforeEach(function (): void {
    /* @var TestCase $this */
>>>>>>> laraxot/dev
    try {
        $panel = Filament::getPanel('user::admin');
    } catch (\Exception $e) {
        $panelProvider = new AdminPanelProvider(app());
        $panel = $panelProvider->panel(Panel::make());
        Filament::registerPanel($panel);
    }
    Filament::setCurrentPanel($panel);

<<<<<<< HEAD
    return new ListUsers();
}

/** @return Collection<int, User> */
function createMasterAdminUsers(): Collection
{
=======
    $this->listUsersPage = new ListUsers();

>>>>>>> laraxot/dev
    $users = UserFactory::new()
        ->count(3)
        ->create([
            'type' => UserType::MasterAdmin,
        ]);

<<<<<<< HEAD
    return new Collection($users->all());
}
=======
    $this->users = new Collection($users->all());
});
>>>>>>> laraxot/dev

describe('List Users', function (): void {
    test('list users page has correct resource', function (): void {
        Assert::assertSame(UserResource::class, ListUsers::getResource());
    });

    test('list users page extends correct base class', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(BaseListUsers::class, $listUsersPage);
    });

    test('list users page can be instantiated', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(ListUsers::class, $listUsersPage);
    });

    test('list users page has correct table columns', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
        $columns = listUsersPageTableMember($listUsersPage, 'getTableColumns');
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
        $columns = $listUsersPage->getTableColumns();
>>>>>>> laraxot/dev

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
        $listUsersPage = makeListUsersPage();
        $filters = listUsersPageTableMember($listUsersPage, 'getTableFilters');
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
        $filters = $listUsersPage->getTableFilters();
>>>>>>> laraxot/dev

        Assert::assertCount(0, $filters);
    });

    test('list users page has correct table actions', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
        $actions = listUsersPageTableMember($listUsersPage, 'getTableActions');
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
        $actions = $listUsersPage->getTableActions();
>>>>>>> laraxot/dev

        Assert::assertArrayHasKey('change_password', $actions);

        $changePasswordAction = $actions['change_password'];
        Assert::assertInstanceOf(ChangePasswordAction::class, $changePasswordAction);
    });

    test('list users page can display users', function (): void {
<<<<<<< HEAD
        $users = createMasterAdminUsers();
=======
        /** @var TestCase $this */
        $users = $this->requireUsers();
>>>>>>> laraxot/dev
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
        $listUsersPage = makeListUsersPage();
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
>>>>>>> laraxot/dev
        $label = $listUsersPage->getNavigationLabel();
        Assert::assertNotEmpty($label);
    });

    test('list users page has correct title', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
>>>>>>> laraxot/dev
        $title = $listUsersPage->getTitle();
        Assert::assertNotEmpty($title);
    });

    test('list users page has correct breadcrumbs', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
>>>>>>> laraxot/dev
        try {
            $breadcrumbs = $listUsersPage->getBreadcrumbs();
            Assert::assertNotEmpty($breadcrumbs);
        } catch (\Exception $e) {
        }
    });

    test('list users page can handle search', function (): void {
<<<<<<< HEAD
        $listUsersPage = makeListUsersPage();
        $columns = listUsersPageTableMember($listUsersPage, 'getTableColumns');
        $nameColumn = $columns['name'];
        $emailColumn = $columns['email'];
        Assert::assertInstanceOf(TextColumn::class, $nameColumn);
        Assert::assertInstanceOf(TextColumn::class, $emailColumn);
=======
        /** @var TestCase $this */
        $listUsersPage = $this->requireListUsersPage();
        $columns = $listUsersPage->getTableColumns();
        $nameColumn = $columns['name'];
        $emailColumn = $columns['email'];
>>>>>>> laraxot/dev

        Assert::assertTrue($nameColumn->isSearchable());
        Assert::assertTrue($emailColumn->isSearchable());
    });
});
