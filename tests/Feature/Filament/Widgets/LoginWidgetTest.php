<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use ReflectionClass;
use PHPUnit\Framework\Assert;
use Modules\User\Database\Factories\UserFactory;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\User;



beforeEach(function () {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->widget = new LoginWidget();
});

test('it can render widget', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $widget = new LoginWidget();

    // Use reflection to access the protected view property
    $reflection = new \ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);

    Assert::assertStringContainsString((string) 'pub_theme::filament.widgets.auth.login', (string) $view);
});

test('it has correct form schema', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $widget = $this->requireLoginWidget();
    $form = $widget->getFormSchema();

    Assert::assertCount(3, $form);
    $names = [];
    foreach ($form as $component) {
        if (method_exists($component, 'getName')) {
            $names[] = $component->getName();
        }
    }

    Assert::assertContains('email', $names);
    Assert::assertContains('password', $names);
    Assert::assertContains('remember', $names);
});

test('it can authenticate user', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
$widget = $this->requireLoginWidget();
    // Skip if we can't use the database
    if (! class_exists('CreateUsersTable')) {
        $this->markTestSkipped('Database not available for testing');
    }

    /** @var \Modules\User\Models\User $user */
    $user = UserFactory::new()->createOne([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    $widget->form->fill([
        'email' => 'test@example.com',
        'password' => 'password123',
        'remember' => true,
    ]);

    $widget->save();

    $this->assertAuthenticatedAs($user);
});

test('it validates credentials', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('LoginWidget Livewire validation — coperto da test auth FO');
});

test('it requires email and password', function (): void {
    /** @var \Modules\User\Tests\TestCase $this */
    $this->markTestSkipped('LoginWidget Livewire validation — coperto da test auth FO');
});
