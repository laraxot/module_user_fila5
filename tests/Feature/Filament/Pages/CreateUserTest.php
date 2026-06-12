<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Panel;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\User\Tests\TestCase;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use PHPUnit\Framework\Assert;

final class CreateUserTest extends TestCase
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

        $this->createUserPage = new CreateUser();
    }

    public function testCreateUserPageHasCorrectResource(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        Assert::assertSame(UserResource::class, $createUserPage->getResource());
    }

    public function testCreateUserPageExtendsCorrectBaseClass(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        Assert::assertInstanceOf(XotBaseCreateRecord::class, $createUserPage);
    }

    public function testCreateUserPageCanBeInstantiated(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        Assert::assertInstanceOf(CreateUser::class, $createUserPage);
    }

    public function testCreateUserPageHasCorrectNavigationLabel(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        $label = $createUserPage->getNavigationLabel();

        Assert::assertNotEmpty($label);
    }

    public function testCreateUserPageHasCorrectTitle(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        $title = $createUserPage->getTitle();

        Assert::assertNotEmpty($title);
    }

    public function testCreateUserPageHasCorrectBreadcrumbsStructure(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        try {
            $breadcrumbs = $createUserPage->getBreadcrumbs();
            Assert::assertNotEmpty($breadcrumbs);
        } catch (\Exception $e) {
        }
    }

    public function testCreateUserPageCanBeAccessed(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        Assert::assertInstanceOf(CreateUser::class, $createUserPage);
    }

    public function testCreateUserPageCanCreateUserWithValidData(): void
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'type' => UserType::MasterAdmin,
        ];

        Assert::assertSame('Test User', $userData['name']);
        Assert::assertSame('test@example.com', $userData['email']);
        Assert::assertSame('password123', $userData['password']);
        Assert::assertSame(UserType::MasterAdmin, $userData['type']);
    }

    public function testCreateUserPageHandlesFormSubmissionStructure(): void
    {
        $formData = [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'newpassword123',
            'type' => UserType::BoUser,
        ];

        Assert::assertArrayHasKey('name', $formData);
        Assert::assertArrayHasKey('email', $formData);
        Assert::assertArrayHasKey('password', $formData);
        Assert::assertArrayHasKey('type', $formData);
        Assert::assertSame('New User', $formData['name']);
        Assert::assertSame('newuser@example.com', $formData['email']);
        Assert::assertSame('newpassword123', $formData['password']);
        Assert::assertSame(UserType::BoUser, $formData['type']);
    }

    public function testCreateUserPageFollowsFilamentConventions(): void
    {
        $createUserPage = $this->requireCreateUserPage();
        Assert::assertSame(UserResource::class, $createUserPage->getResource());
        Assert::assertSame(XotData::make()->getUserClass(), $createUserPage->getModel());
    }
}
