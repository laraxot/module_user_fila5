<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Filament\Widgets\LogoutWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

use Modules\User\Filament\Widgets\LogoutWidget;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
>>>>>>> 350420cb (Check & fix styling)

describe('LogoutWidget', function (): void {
    test('logout widget can be instantiated', function (): void {
        $widget = new LogoutWidget();

        Assert::assertInstanceOf(LogoutWidget::class, $widget);
    });

    test('logout widget extends xot base widget', function (): void {
        $widget = new LogoutWidget();

<<<<<<< HEAD
        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
=======
        Assert::assertInstanceOf(Modules\Xot\Filament\Widgets\XotBaseSchemaWidget::class, $widget);
>>>>>>> 350420cb (Check & fix styling)
    });

    test('logout widget has is logging out flag', function (): void {
        $widget = new LogoutWidget();

        Assert::assertFalse($widget->isLoggingOut);
    });

    test('logout widget has protected get view data method', function (): void {
        $widget = new LogoutWidget();
        $reflection = new ReflectionMethod($widget, 'getViewData');

        Assert::assertTrue($reflection->isProtected());
    });
});
