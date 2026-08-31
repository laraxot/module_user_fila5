<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
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
    public $data = [];

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
                    ->autofocus(),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique('users', 'email'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->rules([PasswordRule::defaults()])
                    ->revealable(),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
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

        /** @var UserContract $user */
        $user = $user_class::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);

        Assert::isInstanceOf($user, Authenticatable::class);
        event(new Registered($user));
        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    /**
     * Render the component.
     */
    public function render(): View
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

        // `extends()` passa da __call sul factory: il tipo va riportato a View
        // con un'asserzione runtime, come in Verify::render().
        $result = view($view)->extends('pub_theme::layouts.auth');
        Assert::isInstanceOf($result, View::class);

        return $result;
    }
}
