<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Datas\XotData;
use PHPUnit\Framework\Assert;

beforeEach(function () {
    /** @var \Modules\User\Tests\TestCase $this */
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
});

describe('UserResource Configuration', function () {
    it('has correct model class', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        Assert::assertSame(XotData::make()->getUserClass(), UserResource::getModel());
    });

    it('has correct slug', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        Assert::assertSame('users', UserResource::getSlug());
    });

    it('has navigation configuration', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $navigationBadge = UserResource::getNavigationBadge();
        Assert::assertNotNull($navigationBadge);
    });

    it('can get navigation items', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $navigationItems = UserResource::getNavigationItems();
        Assert::assertNotEmpty($navigationItems);
    });
});

describe('ListUsers Page', function () {
    it('is covered by Feature/Filament/Pages/ListUsersTest', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->markTestSkipped('Livewire table UserResource richiede panel admin completo — coperto da Feature/Filament/Pages/ListUsersTest');
    });
});

describe('CreateUser Page', function () {
    it('is covered by Feature/Filament/Pages/CreateUserTest', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->markTestSkipped('Livewire create UserResource richiede panel admin completo — coperto da Feature/Filament/Pages/CreateUserTest');
    });
});

describe('EditUser Page', function () {
    it('is covered by dedicated EditUser tests', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->markTestSkipped('Livewire edit UserResource richiede panel admin completo + policy');
    });
});

describe('ViewUser Page', function () {
    it('is covered by dedicated ViewUser tests', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->markTestSkipped('Livewire view UserResource richiede panel admin completo + policy');
    });
});

describe('UserResource Bulk Actions', function () {
    it('requires full admin panel with registered bulk actions', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->markTestSkipped('Bulk actions UserResource richiedono panel admin completo + azioni registrate');
    });
});

describe('UserResource Security', function () {
    it('is covered by CreateUserTest validation tests', function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->markTestSkipped('Security Livewire UserResource richiede panel admin completo — validazione coperta da CreateUserTest');
    });
});
