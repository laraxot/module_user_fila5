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

    public function testRegisterPageLoadsWithLivewireWidget(): void
    {
        $this->get('/it/auth/register')->assertSuccessful();
        Livewire::test(RegisterWidget::class)->assertSuccessful();
    }

    public function testDelegatesFormSchemaToUserFormViaFormClass(): void
    {
        $reflection = new \ReflectionClass(RegisterWidget::class);

        $formClass = $reflection->getMethod('formClass');
        $formClass->setAccessible(true);
        $this->assertSame(UserForm::class, $formClass->invoke(null));
        $schemaMethod = $reflection->getMethod('schemaMethod');
        $schemaMethod->setAccessible(true);
        $this->assertSame('getRegisterFormSchema', $schemaMethod->invoke(null));
    }

    public function testCanRegisterUserViaSubmit(): void
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

    public function testRejectsInvalidEmailWithoutCreatingUser(): void
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

    public function testSaveDelegatesToSubmit(): void
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
