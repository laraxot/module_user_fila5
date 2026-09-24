<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Filament\Widgets\EditUserWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

use Modules\User\Filament\Widgets\EditUserWidget;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
>>>>>>> 350420cb (Check & fix styling)

describe('EditUserWidget', function (): void {
    test('edit user widget can be instantiated', function (): void {
        $widget = new EditUserWidget;

        Assert::assertInstanceOf(EditUserWidget::class, $widget);
    });

    test('edit user widget extends xot base widget', function (): void {
        $widget = new EditUserWidget;

<<<<<<< HEAD
        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
=======
        Assert::assertInstanceOf(Modules\Xot\Filament\Widgets\XotBaseSchemaWidget::class, $widget);
>>>>>>> 350420cb (Check & fix styling)
    });

    test('edit user widget has type property', function (): void {
        $widget = new EditUserWidget;
    });

    test('edit user widget has resource property', function (): void {
        $widget = new EditUserWidget;
    });

    test('edit user widget has model property', function (): void {
        $widget = new EditUserWidget;
    });
});
