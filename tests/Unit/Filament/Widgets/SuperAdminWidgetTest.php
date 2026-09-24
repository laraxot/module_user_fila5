<?php

declare(strict_types=1);
use Modules\User\Filament\Widgets\Profile\SuperAdminWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_tF7QND
<<<<<<< HEAD
<<<<<<< .merge_file_61EQsE
=======

>>>>>>> .merge_file_oaLrbS
=======

>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_ZPRmJM
use function Safe\file_get_contents;

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

    test('resolves to the convention super-admin view used by render()', function (): void {
        $reflection = new ReflectionProperty(SuperAdminWidget::class, 'view');
        $reflection->setAccessible(true);
<<<<<<< .merge_file_tF7QND
<<<<<<< HEAD
<<<<<<< .merge_file_61EQsE
        $widget = new SuperAdminWidget;
=======
        $widget = new SuperAdminWidget();
>>>>>>> .merge_file_oaLrbS
=======
        $widget = new SuperAdminWidget();
>>>>>>> df2ba808 (.)
=======
        $widget = new SuperAdminWidget;
>>>>>>> .merge_file_ZPRmJM

        Assert::assertSame(
            'user::filament.widgets.profile.super-admin',
            $reflection->getValue($widget),
        );
    });

    test('super-admin view uses filament icon-button with auto-registered blade icons', function (): void {
        $path = module_path('User', 'resources/views/filament/widgets/profile/super-admin.blade.php');
        $contents = file_get_contents($path);

        Assert::assertStringContainsString('x-filament::icon-button', $contents);
        Assert::assertStringContainsString('icon="user-superman"', $contents);
        Assert::assertStringContainsString('icon="user-clark-kent"', $contents);
        Assert::assertStringNotContainsString('icon="super-admin"', $contents);
        Assert::assertStringNotContainsString('icon="heroicon', $contents);
    });
});
