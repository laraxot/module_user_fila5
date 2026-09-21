<?php

declare(strict_types=1);

use Modules\User\Filament\Widgets\Profile\SuperAdminWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('SuperAdminWidget', function (): void {
    test('extends xot base widget not filament widget directly', function (): void {
        $reflection = new ReflectionClass(SuperAdminWidget::class);

        Assert::assertTrue($reflection->isSubclassOf(XotBaseWidget::class));
    });

    test('is not auto-discovered on the dashboard', function (): void {
        Assert::assertFalse(SuperAdminWidget::isDiscovered());
    });

    test('exposes toggle super admin', function (): void {
        $reflection = new ReflectionMethod(SuperAdminWidget::class, 'toggleSuperAdmin');

        Assert::assertTrue($reflection->isPublic());
    });

    test('mount method loads profile and current url', function (): void {
        $reflection = new ReflectionMethod(SuperAdminWidget::class, 'mount');

        Assert::assertTrue($reflection->isPublic());
        Assert::assertSame(0, $reflection->getNumberOfParameters());
    });

    test('resolves to the user module filament view, not pub_theme', function (): void {
        $view = app(GetViewByClassAction::class)->execute(SuperAdminWidget::class);

        Assert::assertSame('user::filament.widgets.profile.super-admin', $view);
    });
});
