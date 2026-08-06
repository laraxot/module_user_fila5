<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Widgets;

use Illuminate\Support\Facades\Hash;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use PHPUnit\Framework\Assert;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var TestCase $this */
<<<<<<< HEAD
    $this->widget = new LoginWidget;
=======
    $this->widget = new LoginWidget();
>>>>>>> laraxot/dev
});

describe('Login Widget', function (): void {
    test('it can render widget', function (): void {
<<<<<<< HEAD
        $widget = new LoginWidget;
=======
        $widget = new LoginWidget();
>>>>>>> laraxot/dev

        $reflection = new \ReflectionClass($widget);
        $property = $reflection->getProperty('view');
        $property->setAccessible(true);
        $view = $property->getValue($widget);

<<<<<<< HEAD
        Assert::assertStringContainsString(SafeStringCastAction::cast('pub_theme::filament.widgets.auth.login'), SafeStringCastAction::cast($view));
=======
        Assert::assertStringContainsString((string) 'pub_theme::filament.widgets.auth.login', (string) $view);
>>>>>>> laraxot/dev
    });

    test('it has correct form schema', function (): void {
        /** @var TestCase $this */
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
        /** @var TestCase $this */
        $widget = $this->requireLoginWidget();
        if (! class_exists('CreateUsersTable')) {
            $this->skipTest('Database not available for testing');
        }

        /** @var User $user */
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
});
