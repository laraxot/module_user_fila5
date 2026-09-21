<?php

declare(strict_types=1);
use Modules\User\Filament\Widgets\Profile\SuperAdminWidget;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use PHPUnit\Framework\Assert;
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

    test('resolves to the super-admin-toggle view actually used by render()', function (): void {
        $reflection = new ReflectionProperty(SuperAdminWidget::class, 'view');
        $reflection->setAccessible(true);
        $instance = (new ReflectionClass(SuperAdminWidget::class))->newInstanceWithoutConstructor();

        $view = $reflection->getValue($instance);

        Assert::assertSame('user::filament.widgets.profile.super-admin-toggle', $view);
    });

    test('super-admin-toggle view uses filament icon-button with auto-registered blade icons', function (): void {
        $path = module_path('User', 'resources/views/filament/widgets/profile/super-admin-toggle.blade.php');
        $contents = file_get_contents($path);

        Assert::assertStringContainsString('x-filament::icon-button', $contents);
        Assert::assertStringContainsString('icon="user-superadmin"', $contents);
        Assert::assertStringContainsString('icon="user-negate-superadmin"', $contents);
    });
});
