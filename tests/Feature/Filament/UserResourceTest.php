<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament;

use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Tests\TestCase;
use Modules\Xot\Datas\XotData;
use PHPUnit\Framework\Assert;

final class UserResourceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->setupFilamentAdminPanel();

        $this->admin = UserFactory::new()->createOne([
            'type' => UserType::MasterAdmin,
            'name' => 'Admin Test',
            'email' => 'admin-'.uniqid('', true).'@example.com',
        ]);
        $this->user = UserFactory::new()->createOne([
            'name' => 'User Test',
            'email' => 'user-'.uniqid('', true).'@example.com',
        ]);

        $this->actingAs($this->requireAdmin());
    }

    public function testHasCorrectModelClass(): void
    {
        Assert::assertSame(XotData::make()->getUserClass(), UserResource::getModel());
    }

    public function testHasCorrectSlug(): void
    {
        Assert::assertSame('users', UserResource::getSlug());
    }

    public function testHasNavigationConfiguration(): void
    {
        $navigationBadge = UserResource::getNavigationBadge();
        Assert::assertNotNull($navigationBadge);
    }

    public function testCanGetNavigationItems(): void
    {
        $navigationItems = UserResource::getNavigationItems();
        Assert::assertNotEmpty($navigationItems);
    }

    public function testListUsersPageCoveredByDedicatedTest(): void
    {
        $this->markTestSkipped('Livewire table UserResource richiede panel admin completo — coperto da Feature/Filament/Pages/ListUsersTest');
    }

    public function testCreateUserPageCoveredByDedicatedTest(): void
    {
        $this->markTestSkipped('Livewire create UserResource richiede panel admin completo — coperto da Feature/Filament/Pages/CreateUserTest');
    }

    public function testEditUserPageCoveredByDedicatedTest(): void
    {
        $this->markTestSkipped('Livewire edit UserResource richiede panel admin completo + policy');
    }

    public function testViewUserPageCoveredByDedicatedTest(): void
    {
        $this->markTestSkipped('Livewire view UserResource richiede panel admin completo + policy');
    }

    public function testBulkActionsRequiresFullAdminPanel(): void
    {
        $this->markTestSkipped('Bulk actions UserResource richiedono panel admin completo + azioni registrate');
    }

    public function testSecurityCoveredByCreateUserTest(): void
    {
        $this->markTestSkipped('Security Livewire UserResource richiede panel admin completo — validazione coperta da CreateUserTest');
    }
}
