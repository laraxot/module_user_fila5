<?php

declare(strict_types=1);

use Modules\User\Filament\Widgets\Auth\NotificationsCenterWidget;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('returns not found for guests when notifications route is not registered', function (): void {
    /** @var TestCase $this */
    $response = $this->get('/it/area-personale/notifications');

    /* @var \Illuminate\Testing\TestResponse<\Symfony\Component\HttpFoundation\Response> $response */
    $response->assertNotFound();
});

it('uses notifications center widget view', function (): void {
    $widget = new NotificationsCenterWidget();
    $reflection = new ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);

    Assert::assertSame('user::widgets.auth.notifications-center-widget', $view);
});
