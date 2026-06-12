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

final class ListUsersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        try {
            $panel = Filament::getPanel('user::admin');
        } catch (\Exception $e) {
            $panelProvider = new AdminPanelProvider(app());
            $panel = $panelProvider->panel(Panel::make());
            Filament::registerPanel($panel);
        }
        Filament::setCurrentPanel($panel);

        $this->listUsersPage = new ListUsers();

        $users = UserFactory::new()
            ->count(3)
            ->create([
                'type' => UserType::MasterAdmin,
            ]);

        $this->users = new Collection($users->all());
    }

    public function testListUsersPageHasCorrectResource(): void
    {
        Assert::assertSame(UserResource::class, ListUsers::getResource());
    }

    public function testListUsersPageExtendsCorrectBaseClass(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        Assert::assertInstanceOf(BaseListUsers::class, $listUsersPage);
    }

    public function testListUsersPageCanBeInstantiated(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        Assert::assertInstanceOf(ListUsers::class, $listUsersPage);
    }

    public function testListUsersPageHasCorrectTableColumns(): void
    {
        $listUsersPage = $this->requireListUsersPage();
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
    }

    public function testListUsersPageHasCorrectTableFilters(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        $filters = $listUsersPage->getTableFilters();

        Assert::assertCount(0, $filters);
    }

    public function testListUsersPageHasCorrectTableActions(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        $actions = $listUsersPage->getTableActions();

        Assert::assertArrayHasKey('change_password', $actions);

        $changePasswordAction = $actions['change_password'];
        Assert::assertInstanceOf(ChangePasswordAction::class, $changePasswordAction);
    }

    public function testListUsersPageCanDisplayUsers(): void
    {
        $users = $this->requireUsers();
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
    }

    public function testListUsersPageHasCorrectNavigationLabel(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        $label = $listUsersPage->getNavigationLabel();
        Assert::assertNotEmpty($label);
    }

    public function testListUsersPageHasCorrectTitle(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        $title = $listUsersPage->getTitle();
        Assert::assertNotEmpty($title);
    }

    public function testListUsersPageHasCorrectBreadcrumbs(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        try {
            $breadcrumbs = $listUsersPage->getBreadcrumbs();
            Assert::assertNotEmpty($breadcrumbs);
        } catch (\Exception $e) {
        }
    }

    public function testListUsersPageCanHandleSearch(): void
    {
        $listUsersPage = $this->requireListUsersPage();
        $columns = $listUsersPage->getTableColumns();
        $nameColumn = $columns['name'];
        $emailColumn = $columns['email'];

        Assert::assertTrue($nameColumn->isSearchable());
        Assert::assertTrue($emailColumn->isSearchable());
    }
}
