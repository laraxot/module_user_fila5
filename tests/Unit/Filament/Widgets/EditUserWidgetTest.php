<?php

declare(strict_types=1);

use Modules\User\Filament\Widgets\EditUserWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-user-db');

describe('EditUserWidget', function (): void {
    test('edit user widget can be instantiated', function (): void {
        $widget = new EditUserWidget;

        Assert::assertInstanceOf(EditUserWidget::class, $widget);
    });

    test('edit user widget extends xot base widget', function (): void {
        $widget = new EditUserWidget;

        Assert::assertInstanceOf(XotBaseSchemaWidget::class, $widget);
    });

    test('edit user widget defaults type resource and model properties', function (): void {
<<<<<<< .merge_file_EDkYQ7
        $widget = new EditUserWidget;
=======
        $widget = new EditUserWidget();
>>>>>>> .merge_file_5Iy0S0
        $ref = new ReflectionClass($widget);

        Assert::assertTrue($ref->hasProperty('type'));
        Assert::assertTrue($ref->hasProperty('resource'));
        Assert::assertTrue($ref->hasProperty('model'));
        Assert::assertSame('', $widget->type);
<<<<<<< .merge_file_EDkYQ7
        Assert::assertSame(\Illuminate\Database\Eloquent\Model::class, $widget->model);
=======
        Assert::assertSame(Illuminate\Database\Eloquent\Model::class, $widget->model);
>>>>>>> .merge_file_5Iy0S0
    });
});
