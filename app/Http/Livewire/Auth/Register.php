<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
use Livewire\Component;
use Filament\Schemas\Schema;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Contracts\HasSchemas;
use Modules\Xot\Actions\File\ViewCopyAction;
use Livewire\Features\SupportRedirects\Redirector;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Illuminate\Validation\Rules\Password as PasswordRule;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Modules\Xot\Actions\File\ViewCopyAction;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;
>>>>>>> 2024e2e7 (.)

/**
 * @property Schema $form
 */
class Register extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    /**
     * Data array for form state.
     *
     * @var array<string, mixed>
     */
<<<<<<< HEAD
    public array $data = [];
=======
    public $data = [];
>>>>>>> 2024e2e7 (.)

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Define the form schema.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
<<<<<<< HEAD
                    ->label(__('Name'))
                    ->placeholder(__('Enter your name'))
=======
>>>>>>> 2024e2e7 (.)
                    ->autofocus(),
                TextInput::make('email')
                    ->email()
                    ->required()
<<<<<<< HEAD
                    ->label(__('Email'))
                    ->placeholder(__('Enter your email'))
=======
>>>>>>> 2024e2e7 (.)
                    ->unique('users', 'email'),
                TextInput::make('password')
                    ->password()
                    ->required()
<<<<<<< HEAD
                    ->label(__('Password'))
                    ->placeholder(__('Enter your password'))
=======
>>>>>>> 2024e2e7 (.)
                    ->rules([PasswordRule::defaults()])
                    ->revealable(),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
<<<<<<< HEAD
                    ->label(__('Confirm Password'))
                    ->placeholder(__('Confirm your password'))
=======
>>>>>>> 2024e2e7 (.)
                    ->same('password')
                    ->revealable(),
            ])
            ->statePath('data');
    }

    /**
     * Execute the action.
     */
    public function register(): RedirectResponse|Redirector
    {
        $data = $this->form->getState();
        $user_class = XotData::make()->getUserClass();

        Assert::string($data['password']);

<<<<<<< HEAD
        /** @var UserContract */
=======
        /** @var UserContract $user */
>>>>>>> 2024e2e7 (.)
        $user = $user_class::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);

<<<<<<< HEAD
        event(new Registered($user));

=======
        Assert::isInstanceOf($user, Authenticatable::class);
        event(new Registered($user));
>>>>>>> 2024e2e7 (.)
        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    /**
     * Render the component.
     *
     * In Livewire components, the render method ultimately returns a view,
     * but it's processed through Livewire's component system.
     */
    public function render(): mixed
    {
        // Copy the view templates to the pub_theme location
        app(ViewCopyAction::class)
            ->execute('user::livewire.auth.register', 'pub_theme::livewire.auth.register');
        app(ViewCopyAction::class)->execute('user::layouts.auth', 'pub_theme::layouts.auth');
        app(ViewCopyAction::class)->execute('user::layouts.base', 'pub_theme::layouts.base');

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::livewire.auth.register';

        // Return view with layout - Livewire specific implementation
        return view($view)->extends('pub_theme::layouts.auth');
    }
}
