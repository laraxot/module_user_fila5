<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Widgets;

use Illuminate\Support\Facades\Hash;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

final class LoginWidgetTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->widget = new LoginWidget();
    }

    public function testItCanRenderWidget(): void
    {
        $widget = new LoginWidget();

        $reflection = new ReflectionClass($widget);
        $property = $reflection->getProperty('view');
        $property->setAccessible(true);
        $view = $property->getValue($widget);

        Assert::assertStringContainsString((string) 'pub_theme::filament.widgets.auth.login', (string) $view);
    }

    public function testItHasCorrectFormSchema(): void
    {
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
    }

    public function testItCanAuthenticateUser(): void
    {
        $widget = $this->requireLoginWidget();
        if (! class_exists('CreateUsersTable')) {
            $this->markTestSkipped('Database not available for testing');
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
    }
}
