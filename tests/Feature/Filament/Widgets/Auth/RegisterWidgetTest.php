<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Widgets\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;
use Modules\User\Filament\Widgets\Auth\RegisterWidget;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use ReflectionClass;

class RegisterWidgetTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config(['activitylog.enabled' => false]);

        if (! Schema::connection('user')->hasTable('users')) {
            $this->markTestSkipped('users table missing on user connection (run migrations for testing)');
        }
    }

    public function test_register_page_loads_with_livewire_widget(): void
    {
        $this->get('/it/auth/register')->assertSuccessful();
        Livewire::test(RegisterWidget::class)->assertSuccessful();
    }

    public function test_delegates_form_schema_to_user_form_via_form_class(): void
    {
        $reflection = new ReflectionClass(RegisterWidget::class);

        $formClass = $reflection->getMethod('formClass');
        $formClass->setAccessible(true);
        $this->assertSame(UserForm::class, $formClass->invoke(null));
        $schemaMethod = $reflection->getMethod('schemaMethod');
        $schemaMethod->setAccessible(true);
        $this->assertSame('getRegisterFormSchema', $schemaMethod->invoke(null));
    }

    public function test_can_register_user_via_submit(): void
    {
        $email = 'pest-register-'.uniqid('', true).'@example.test';

        Livewire::test(RegisterWidget::class)
            ->fillForm([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
                'email' => $email,
                'password' => 'Password1!Secure',
                'password_confirmation' => 'Password1!Secure',
            ])
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertAuthenticated();

        $this->assertDatabaseHasRow(User::class, ['email' => $email]);
    }

    public function test_rejects_invalid_email_without_creating_user(): void
    {
        Livewire::test(RegisterWidget::class)
            ->fillForm([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
                'email' => 'not-an-email',
                'password' => 'Password1!Secure',
                'password_confirmation' => 'Password1!Secure',
            ])
            ->call('submit')
            ->assertHasErrors();

        $this->assertFalse(Auth::check());
    }

    public function test_save_delegates_to_submit(): void
    {
        $email = 'pest-save-'.uniqid('', true).'@example.test';

        Livewire::test(RegisterWidget::class)
            ->fillForm([
                'first_name' => 'Luigi',
                'last_name' => 'Verdi',
                'email' => $email,
                'password' => 'Password1!Secure',
                'password_confirmation' => 'Password1!Secure',
            ])
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHasRow(User::class, ['email' => $email]);
    }
}
