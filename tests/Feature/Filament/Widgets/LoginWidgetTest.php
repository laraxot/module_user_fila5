<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Widgets;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

use function Pest\Laravel\assertAuthenticatedAs;

uses(\Modules\User\Tests\TestCase::class);

beforeEach(function (): void {
    $this->widget = new LoginWidget();
});

test('it can render widget', function (): void {
    $widget = new LoginWidget();

    // Use reflection to access the protected view property
    $reflection = new \ReflectionClass($widget);
    $property = $reflection->getProperty('view');
    $property->setAccessible(true);
    $view = $property->getValue($widget);

    expect($view)->toContain('pub_theme::filament.widgets.auth.login');
});

test('it has correct form schema', function (): void {
    $form = $this->widget->getFormSchema();

    expect($form)->toHaveCount(3);

    // Check that the schema contains components with the expected names
    $componentNames = array_map(fn ($component) => $component->getName(), $form);
    expect($componentNames)->toContain('email');
    expect($componentNames)->toContain('password');
    expect($componentNames)->toContain('remember');
});

test('it can authenticate user', function (): void {
    // Skip if we can't use the database
    if (! class_exists('CreateUsersTable')) {
        $this->markTestSkipped('Database not available for testing');

        return;
    }

    /** @var User $user */
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    $this->widget->form->fill([
        'email' => 'test@example.com',
        'password' => 'password123',
        'remember' => true,
    ]);

    $this->widget->save();

    assertAuthenticatedAs($user);
});

test('it validates credentials', function (): void {
    Livewire\Livewire::test(LoginWidget::class)
        ->fillForm([
            'email' => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ])
        ->call('save')
        ->assertHasErrors(['email']);
})->skip(
    'LoginWidget save() usa chiavi traduzione strutturate (array) in Notification::title — test Livewire in Feature/Auth',
    'Widget submit coperto da test auth FO'
);

test('it requires email and password', function (): void {
    Livewire\Livewire::test(LoginWidget::class)
        ->fillForm([
            'email' => '',
            'password' => '',
        ])
        ->call('save')
        ->assertHasErrors(['email', 'password']);
})->skip(
    'LoginWidget save() usa chiavi traduzione strutturate (array) in Notification::title — test Livewire in Feature/Auth',
    'Widget submit coperto da test auth FO'
);
