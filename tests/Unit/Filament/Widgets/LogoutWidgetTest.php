<?php

declare(strict_types=1);

use Modules\User\Filament\Widgets\LogoutWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('LogoutWidget', function (): void {
    test('logout widget can be instantiated', function (): void {
<<<<<<< HEAD
        $widget = new LogoutWidget();
=======
<<<<<<< HEAD
        $widget = new LogoutWidget;
=======
        $widget = new LogoutWidget();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

        Assert::assertInstanceOf(LogoutWidget::class, $widget);
    });

    test('logout widget extends xot base widget', function (): void {
<<<<<<< HEAD
        $widget = new LogoutWidget();
=======
<<<<<<< HEAD
        $widget = new LogoutWidget;
=======
        $widget = new LogoutWidget();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
    });

    test('logout widget has is logging out flag', function (): void {
<<<<<<< HEAD
        $widget = new LogoutWidget();
=======
<<<<<<< HEAD
        $widget = new LogoutWidget;
=======
        $widget = new LogoutWidget();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev

        Assert::assertFalse($widget->isLoggingOut);
    });

    test('logout widget has protected get view data method', function (): void {
<<<<<<< HEAD
        $widget = new LogoutWidget();
=======
<<<<<<< HEAD
        $widget = new LogoutWidget;
=======
        $widget = new LogoutWidget();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        $reflection = new ReflectionMethod($widget, 'getViewData');

        Assert::assertTrue($reflection->isProtected());
    });
});
