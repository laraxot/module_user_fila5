<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use ReflectionClass;
use PHPUnit\Framework\Assert;
use Modules\User\Database\Factories\UserFactory;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;

beforeEach(function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->widget = new UserOverview();
    $this->user = UserFactory::new()->createOne([
        'type' => UserType::MasterAdmin,
        'email' => 'admin-'.Str::lower(Str::random(10)).'@example.com',
    ]);
});

test('user overview widget extends correct base class', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
$widget = $this->requireWidget();
    Assert::assertInstanceOf(Widget::class, $widget);
});

test('user overview widget has correct view', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
$widget = $this->requireWidget();
    $reflection = new \ReflectionClass(UserOverview::class);
    $viewProperty = $reflection->getProperty('view');
    $viewProperty->setAccessible(true);

    Assert::assertSame('user::filament.resources.user-resource.widgets.user-overview', $viewProperty->getValue($widget));
});

test('user overview widget has record property', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $widget = $this->requireWidget();
    Assert::assertInstanceOf(UserOverview::class, $widget);
    Assert::assertNull($widget->record);
});

test('user overview widget can set record', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $widget = $this->requireWidget();
    Assert::assertInstanceOf(UserOverview::class, $widget);
    $user = $this->requireUser();
    $widget->record = $user;

    Assert::assertSame($user, $widget->record);
    Assert::assertInstanceOf(Model::class, $widget->record);
});

test('user overview widget record property is nullable', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $reflection = new \ReflectionClass(UserOverview::class);
    $recordProperty = $reflection->getProperty('record');

    Assert::assertTrue($recordProperty->getType()?->allowsNull() ?? false);
});

test('user overview widget has correct namespace', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    Assert::assertStringContainsString((string) 'Modules\User\Filament\Resources\UserResource\Widgets', (string) UserOverview::class);
});

test('user overview widget can be instantiated', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
$widget = $this->requireWidget();
    Assert::assertInstanceOf(UserOverview::class, $widget);
});

test('user overview widget has correct static properties', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $reflection = new \ReflectionClass(UserOverview::class);
    $viewProperty = $reflection->getProperty('view');
    $viewProperty->setAccessible(true);

    Assert::assertFalse($viewProperty->isStatic());
});

test('user overview widget view path is correct', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
$widget = $this->requireWidget();
    $reflection = new \ReflectionClass(UserOverview::class);
    $viewProperty = $reflection->getProperty('view');
    $viewProperty->setAccessible(true);

    $viewPath = $viewProperty->getValue($widget);
    Assert::assertStringContainsString((string) 'user::', (string) $viewPath);
    Assert::assertStringContainsString((string) 'widgets.user-overview', (string) $viewPath);
});
