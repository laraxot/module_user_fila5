<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Widgets;

use Modules\User\Filament\Widgets\Auth\NotificationsCenterWidget;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('redirects guests from notifiche page', function (): void {
    $response = $this->get('/it/area-personale/notifiche');

    $response->assertRedirect();
});

it('uses notifications center widget view', function (): void {
    $widget = new NotificationsCenterWidget();
    $reflection = new \ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);

    expect($view)->toBe('user::widgets.auth.notifications-center-widget');
});
