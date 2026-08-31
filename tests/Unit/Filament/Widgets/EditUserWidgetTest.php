<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> laraxot/dev
use Modules\User\Filament\Widgets\EditUserWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class)->group('no-user-db');
=======
uses(TestCase::class);
>>>>>>> laraxot/dev

describe('EditUserWidget', function (): void {
    test('edit user widget can be instantiated', function (): void {
        $widget = new EditUserWidget();

        Assert::assertInstanceOf(EditUserWidget::class, $widget);
    });

    test('edit user widget extends xot base widget', function (): void {
        $widget = new EditUserWidget();

        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
    });

<<<<<<< HEAD
    test('edit user widget defaults type resource and model properties', function (): void {
        $widget = new EditUserWidget();
        $ref = new ReflectionClass($widget);

        Assert::assertTrue($ref->hasProperty('type'));
        Assert::assertTrue($ref->hasProperty('resource'));
        Assert::assertTrue($ref->hasProperty('model'));
        Assert::assertSame('', $widget->type);
        Assert::assertSame(Model::class, $widget->model);
=======
    test('edit user widget has type property', function (): void {
        $widget = new EditUserWidget();
    });

    test('edit user widget has resource property', function (): void {
        $widget = new EditUserWidget();
    });

    test('edit user widget has model property', function (): void {
        $widget = new EditUserWidget();
>>>>>>> laraxot/dev
    });
});
