<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Http\Livewire\Auth;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
<<<<<<< .merge_file_qlMlmD
use Mockery;
=======
>>>>>>> .merge_file_gi7jOK
use Modules\User\Http\Livewire\Auth\Login;
use Modules\User\Tests\TestCase;
use Modules\Xot\Datas\XotData;
use PHPUnit\Framework\Assert;
use Spatie\Permission\Models\Role;

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
<<<<<<< .merge_file_qlMlmD
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> .merge_file_gi7jOK
});

/**
 * @return list<TextInput|Checkbox>
 */
function loginFormSchema(Login $component): array
{
    $method = new \ReflectionMethod($component, 'getFormSchema');
    $method->setAccessible(true);

    /** @var list<TextInput|Checkbox> $schema */
    $schema = $method->invoke($component);

    return $schema;
}

/**
<<<<<<< .merge_file_qlMlmD
 * @param  list<string>  $roleNames
=======
 * @param list<string> $roleNames
>>>>>>> .merge_file_gi7jOK
 */
function loginRedirectForRoles(array $roleNames): string
{
    app()->setLocale('it');
    /** @var class-string<\Illuminate\Database\Eloquent\Model> $userClass */
    $userClass = XotData::make()->getUserClass();
<<<<<<< .merge_file_qlMlmD
    $user = new $userClass;
=======
    $user = new $userClass();
>>>>>>> .merge_file_gi7jOK
    $user->forceFill(['id' => 'redirect-user']);

    /** @var \Illuminate\Support\Collection<int, Role> $roles */
    $roles = collect(array_map(
        static fn (string $name): Role => new Role(['name' => $name, 'guard_name' => 'web']),
        $roleNames
    ));

<<<<<<< .merge_file_qlMlmD
    $relation = Mockery::mock(BelongsToMany::class);
    $relation->shouldReceive('get')->andReturn($roles);

    $userMock = Mockery::mock($user)->makePartial();
=======
    $relation = \Mockery::mock(BelongsToMany::class);
    $relation->shouldReceive('get')->andReturn($roles);

    $userMock = \Mockery::mock($user)->makePartial();
>>>>>>> .merge_file_gi7jOK
    $userMock->shouldReceive('roles')->andReturn($relation);

    Auth::shouldReceive('user')->andReturn($userMock);

<<<<<<< .merge_file_qlMlmD
    $component = new Login;
=======
    $component = new Login();
>>>>>>> .merge_file_gi7jOK
    $method = new \ReflectionMethod($component, 'getRedirectUrl');
    $method->setAccessible(true);

    $redirect = $method->invoke($component);
    Assert::assertInstanceOf(RedirectResponse::class, $redirect);

    return $redirect->getTargetUrl();
}

describe('Login Livewire component', function (): void {
    test('mount initializes component without throwing', function (): void {
<<<<<<< .merge_file_qlMlmD
        $component = new Login;
=======
        $component = new Login();
>>>>>>> .merge_file_gi7jOK
        $component->mount();

        Assert::assertIsArray($component->data);
    });

    test('form schema exposes email password remember fields', function (): void {
<<<<<<< .merge_file_qlMlmD
        $schema = loginFormSchema(new Login);
=======
        $schema = loginFormSchema(new Login());
>>>>>>> .merge_file_gi7jOK

        Assert::assertCount(3, $schema);
        Assert::assertInstanceOf(TextInput::class, $schema[0]);
        Assert::assertSame('email', $schema[0]->getName());
        Assert::assertSame('password', $schema[1]->getName());
        Assert::assertSame('remember', $schema[2]->getName());
    });

    test('render returns login view', function (): void {
<<<<<<< .merge_file_qlMlmD
        $view = (new Login)->render();
=======
        $view = (new Login())->render();
>>>>>>> .merge_file_gi7jOK

        Assert::assertInstanceOf(View::class, $view);
        Assert::assertSame('user::livewire.auth.login', $view->name());
    });

    test('getRedirectUrl sends single module admin to module panel', function (): void {
        Assert::assertStringEndsWith('/notify/admin', loginRedirectForRoles(['notify::admin']));
    });

    test('getRedirectUrl sends multi-admin user to global admin', function (): void {
        Assert::assertStringEndsWith('/admin', loginRedirectForRoles(['notify::admin', 'user::admin']));
    });

    test('getRedirectUrl sends non-admin to localized home', function (): void {
        Assert::assertStringEndsWith('/it', loginRedirectForRoles([]));
    });
});
