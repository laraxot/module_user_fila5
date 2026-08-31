<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Modules\User\Actions\Passport\CreateGenericClientAction;
use Modules\User\Actions\Passport\CreatePasswordClientAction;
use Modules\User\Actions\Passport\CreatePersonalAccessClientAction;
use Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOauthClients extends XotBaseListRecords
{
    protected static string $resource = OauthClientResource::class;

    /**
     * @return array<string, Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create_personal_access_client' => Action::make('create_personal_access_client')
                ->label(static::trans('actions.create_personal.label'))
                ->icon('heroicon-o-key')
<<<<<<< HEAD
                ->schema([
                    TextInput::make('name')
                        ->default(SafeStringCastAction::cast(config('app.name')).' '.static::trans('actions.create_personal.label'))
=======
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_personal.label'))
>>>>>>> laraxot/dev
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data): void {
                    app(CreatePersonalAccessClientAction::class)->execute(
<<<<<<< HEAD
                        name: SafeStringCastAction::cast($data['name'] ?? null),
                        redirect: SafeStringCastAction::cast(config('app.url')),
=======
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
>>>>>>> laraxot/dev
                        user: null,
                        provider: null,
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_personal.success'))
                        ->success()
                        ->send();
                }),

            'create_password_grant_client' => Action::make('create_password_grant_client')
                ->label(static::trans('actions.create_password.label'))
                ->icon('heroicon-o-lock-closed')
<<<<<<< HEAD
                ->schema([
                    TextInput::make('name')
                        ->default(SafeStringCastAction::cast(config('app.name')).' '.static::trans('actions.create_password.label'))
=======
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_password.label'))
>>>>>>> laraxot/dev
                        ->required()
                        ->maxLength(255),
                    TextInput::make('provider')
                        ->default('users')
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data): void {
                    app(CreatePasswordClientAction::class)->execute(
<<<<<<< HEAD
                        name: SafeStringCastAction::cast($data['name'] ?? null),
                        redirect: SafeStringCastAction::cast(config('app.url')),
                        user: null,
                        provider: SafeStringCastAction::cast($data['provider'] ?? null),
=======
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        user: null,
                        provider: (string) $data['provider'],
>>>>>>> laraxot/dev
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_password.success'))
                        ->success()
                        ->send();
                }),

            'create_client_credentials_client' => Action::make('create_client_credentials_client')
                ->label(static::trans('actions.create_client_credentials.label'))
                ->icon('heroicon-o-server')
<<<<<<< HEAD
                ->schema([
                    TextInput::make('name')
                        ->default(SafeStringCastAction::cast(config('app.name')).' '.static::trans('actions.create_client_credentials.label'))
=======
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_client_credentials.label'))
>>>>>>> laraxot/dev
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data): void {
                    app(CreateGenericClientAction::class)->execute(
<<<<<<< HEAD
                        name: SafeStringCastAction::cast($data['name'] ?? null),
                        redirect: SafeStringCastAction::cast(config('app.url')),
=======
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
>>>>>>> laraxot/dev
                        personalAccess: false,
                        password: false,
                        user: null,
                        provider: 'users',
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_client_credentials.success'))
                        ->success()
                        ->send();
                }),
        ];
    }
}
