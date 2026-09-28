<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Filament\Widgets\Auth\NotificationsCenterWidget;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Pest\Laravel\get;

=======

use Modules\User\Filament\Widgets\Auth\NotificationsCenterWidget;
use Modules\User\Tests\TestCase;

use function Pest\Laravel\get;

use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
uses(TestCase::class);

it('redirects guests from notifiche page', function (): void {
    $response = get('/it/area-personale/notifications');

    $response->assertRedirect();
});

it('uses notifications center widget view', function (): void {
<<<<<<< HEAD
    $widget = new NotificationsCenterWidget;
=======
    $widget = new NotificationsCenterWidget();
>>>>>>> laraxot/dev
    $reflection = new ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);

    Assert::assertSame('user::widgets.auth.notifications-center-widget', $view);
});
