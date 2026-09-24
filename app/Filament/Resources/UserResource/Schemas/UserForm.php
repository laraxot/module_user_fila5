<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Schemas;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component as SchemaComponent;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Modules\User\Filament\Forms\Components\UserSection;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

/**
 * SSoT form User — backoffice (`getFormSchema`) + auth FO (`get*FormSchema`).
 *
 * Religione: un solo UserForm per modulo User. I widget auth delegano qui via
 * `formClass()` + `schemaMethod()` su {@see XotBaseSchemaWidget}.
 * Vietato `Widgets/Auth/Schemas/UserForm.php` (duplicato).
 */
class UserForm extends XotBaseResourceForm
{
    /**
     * Backoffice UserResource — schema CRUD admin.
     *
     * @return array<int|string, SchemaComponent>
     */
    public static function getFormSchema(): array
    {
        return [
            'worker' => UserSection::make('worker'),
            'section01' => Section::make()
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(function ($state): ?string {
                            if (! is_string($state) || '' === $state) {
                                return null;
                            }

                            return Hash::make($state);
                        })
                        ->required(fn ($livewire) => $livewire instanceof CreateUser),
                ])
                ->columnSpan(8),
            'section02' => Section::make()
                ->schema([
                    Placeholder::make('created_at')->content(static function ($record) {
                        if (! $record instanceof Model) {
                            return new HtmlString('&mdash;');
                        }

                        if (! $record->hasAttribute('created_at')) {
                            return new HtmlString('&mdash;');
                        }

                        /** @var Carbon|null $createdAt */
                        $createdAt = $record->getAttribute('created_at');

                        if (null === $createdAt) {
                            return new HtmlString('&mdash;');
                        }
                        if ($createdAt instanceof CarbonInterface) {
                            return $createdAt->diffForHumans();
                        }
                        if ($createdAt instanceof \DateTimeInterface) {
                            return $createdAt->format('Y-m-d H:i:s');
                        }

                        return new HtmlString('&mdash;');
                    }),
                ])
                ->columnSpan(4),
        ];
    }

    /**
     * FO auth login — SSoT campi per `LoginWidget`.
     *
     * @return array<string, SchemaComponent>
     */
    public static function getLoginFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autofocus()
                ->autocomplete('username')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
            'password' => TextInput::make('password')
                ->password()
                ->revealable()
                ->required()
                ->autocomplete('current-password')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
            'remember' => Checkbox::make('remember')
                ->extraInputAttributes(['class' => 'fo-auth-checkbox']),
        ];
    }

    /**
     * FO auth register — SSoT campi per `RegisterWidget`.
     *
     * @return array<string, SchemaComponent>
     */
    public static function getRegisterFormSchema(): array
    {
        return [
            'first_name' => TextInput::make('first_name')
                ->label(__('user::registration.fields.first_name.label'))
                ->required()
                ->string()
                ->minLength(2)
                ->maxLength(255)
                ->autocomplete('given-name')
                ->autofocus()
                ->extraInputAttributes(['class' => 'fo-auth-input']),
            'last_name' => TextInput::make('last_name')
                ->label(__('user::registration.fields.last_name.label'))
                ->required()
                ->string()
                ->minLength(2)
                ->maxLength(255)
                ->autocomplete('family-name')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
            'email' => TextInput::make('email')
                ->label(__('user::registration.fields.email.label'))
                ->required()
                ->email()
                ->maxLength(255)
                ->unique(User::class, 'email')
                ->autocomplete('email')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
            'password' => TextInput::make('password')
                ->label(__('user::registration.fields.password.label'))
                ->password()
                ->revealable()
                ->required()
                ->string()
                ->minLength(12)
                ->maxLength(255)
                ->rules([
                    'required',
                    'string',
                    'min:12',
                    'regex:/[A-Z]/',
                    'regex:/[a-z]/',
                    'regex:/[0-9]/',
                    'regex:/[^A-Za-z0-9]/',
                ])
                ->validationMessages([
                    'password.regex' => __('user::registration.sidebar.help_password'),
                ])
                ->autocomplete('new-password')
                ->confirmed()
                ->dehydrateStateUsing(static function (?string $state): ?string {
                    if (null === $state || '' === $state) {
                        return null;
                    }

                    return Hash::make($state);
                })
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->label(__('user::registration.fields.password_confirmation.label'))
                ->password()
                ->revealable()
                ->required()
                ->string()
                ->minLength(12)
                ->maxLength(255)
                ->autocomplete('new-password')
                ->dehydrated(false)
                ->same('password')
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
        ];
    }

    /**
     * FO auth forgot-password — SSoT campi per `ForgotPasswordWidget`.
     *
     * @return array<string, SchemaComponent>
     */
    public static function getForgotPasswordFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255)
                ->autocomplete('email')
                ->autofocus()
                ->extraInputAttributes(['class' => 'fo-auth-input']),
        ];
    }

    /**
     * FO auth password-reset (send link) — SSoT campi per `PasswordResetWidget`.
     *
     * @return array<string, SchemaComponent>
     */
    public static function getPasswordResetFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
                ->autofocus()
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--centered']),
        ];
    }

    /**
     * FO auth reset-password (token) — SSoT campi per `ResetPasswordWidget`.
     *
     * ponytail: `Password::reset()` valida password in chiaro — niente `Hash::make` in dehydrate;
     * l'hash avviene nel callback del widget.
     *
     * @return array<string, SchemaComponent>
     */
    public static function getResetPasswordFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
            'password' => TextInput::make('password')
                ->password()
                ->revealable()
                ->required()
                ->minLength(8)
                ->same('password_confirmation')
                ->autocomplete('new-password')
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->revealable()
                ->required()
                ->autocomplete('new-password')
                ->dehydrated(false)
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
        ];
    }

    /**
     * FO auth password-reset-confirm — SSoT campi per `PasswordResetConfirmWidget`.
     *
     * ponytail: come `getResetPasswordFormSchema` — password in chiaro per il broker Laravel.
     *
     * @return array<string, SchemaComponent>
     */
    public static function getPasswordResetConfirmFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')
                ->email()
                ->required()
                ->autocomplete('email')
                ->maxLength(255)
                ->suffixIcon('heroicon-o-envelope')
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--centered']),
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->revealable()
                ->minLength(8)
                ->suffixIcon('heroicon-o-key')
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
            'password_confirmation' => TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password')
                ->suffixIcon('heroicon-o-key')
                ->dehydrated(false)
                ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
        ];
    }
}
