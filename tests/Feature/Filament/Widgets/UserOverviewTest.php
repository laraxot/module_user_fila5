<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

final class UserOverviewTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->widget = new UserOverview();
        $this->user = UserFactory::new()->createOne([
            'type' => UserType::MasterAdmin,
            'email' => 'admin-'.Str::lower(Str::random(10)).'@example.com',
        ]);
    }

    public function testUserOverviewWidgetExtendsCorrectBaseClass(): void
    {
        $widget = $this->requireWidget();
        Assert::assertInstanceOf(Widget::class, $widget);
    }

    public function testUserOverviewWidgetHasCorrectView(): void
    {
        $widget = $this->requireWidget();
        $reflection = new ReflectionClass(UserOverview::class);
        $viewProperty = $reflection->getProperty('view');
        $viewProperty->setAccessible(true);

        Assert::assertSame('user::filament.resources.user-resource.widgets.user-overview', $viewProperty->getValue($widget));
    }

    public function testUserOverviewWidgetHasRecordProperty(): void
    {
        $widget = $this->requireWidget();
        Assert::assertInstanceOf(UserOverview::class, $widget);
        Assert::assertNull($widget->record);
    }

    public function testUserOverviewWidgetCanSetRecord(): void
    {
        $widget = $this->requireWidget();
        Assert::assertInstanceOf(UserOverview::class, $widget);
        $user = $this->requireUser();
        $widget->record = $user;

        Assert::assertSame($user, $widget->record);
        Assert::assertInstanceOf(Model::class, $widget->record);
    }

    public function testUserOverviewWidgetRecordPropertyIsNullable(): void
    {
        $reflection = new ReflectionClass(UserOverview::class);
        $recordProperty = $reflection->getProperty('record');

        Assert::assertTrue($recordProperty->getType()?->allowsNull() ?? false);
    }

    public function testUserOverviewWidgetHasCorrectNamespace(): void
    {
        Assert::assertStringContainsString((string) 'Modules\User\Filament\Resources\UserResource\Widgets', (string) UserOverview::class);
    }

    public function testUserOverviewWidgetCanBeInstantiated(): void
    {
        $widget = $this->requireWidget();
        Assert::assertInstanceOf(UserOverview::class, $widget);
    }

    public function testUserOverviewWidgetHasCorrectStaticProperties(): void
    {
        $reflection = new ReflectionClass(UserOverview::class);
        $viewProperty = $reflection->getProperty('view');
        $viewProperty->setAccessible(true);

        Assert::assertFalse($viewProperty->isStatic());
    }

    public function testUserOverviewWidgetViewPathIsCorrect(): void
    {
        $widget = $this->requireWidget();
        $reflection = new ReflectionClass(UserOverview::class);
        $viewProperty = $reflection->getProperty('view');
        $viewProperty->setAccessible(true);

        $viewPath = $viewProperty->getValue($widget);
        Assert::assertStringContainsString((string) 'user::', (string) $viewPath);
        Assert::assertStringContainsString((string) 'widgets.user-overview', (string) $viewPath);
    }
}
