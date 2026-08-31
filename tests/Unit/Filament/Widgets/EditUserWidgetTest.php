<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Widgets\EditUserWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-user-db');

describe('EditUserWidget', function (): void {
    test('edit user widget can be instantiated', function (): void {
        $widget = new EditUserWidget();

        Assert::assertInstanceOf(EditUserWidget::class, $widget);
    });

    test('edit user widget extends xot base widget', function (): void {
        $widget = new EditUserWidget();

        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
    });

    test('edit user widget defaults type resource and model properties', function (): void {
        $widget = new EditUserWidget();
        $ref = new ReflectionClass($widget);

        Assert::assertTrue($ref->hasProperty('type'));
        Assert::assertTrue($ref->hasProperty('resource'));
        Assert::assertTrue($ref->hasProperty('model'));
        Assert::assertSame('', $widget->type);
        Assert::assertSame(Model::class, $widget->model);
    });
});
