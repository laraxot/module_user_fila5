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
                        ->default(self::configString('app.name').' '.static::trans('actions.create_personal.label'))
                        ->required()
                        ->maxLength(255),
                ])
                ->action(
                    /** @param array<string, mixed> $data */
                    function (array $data): void {
                        app(CreatePersonalAccessClientAction::class)->execute(
                            name: self::dataString($data, 'name'),
                            redirect: self::configString('app.url'),
                            user: null,
                            provider: null,
                        );
                        Notification::make()
                            ->title(static::trans('actions.create_personal.success'))
                            ->success()
                            ->send();
                    }
                ),
=======
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_personal.label'))
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data) {
                    app(CreatePersonalAccessClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        user: null,
                        provider: null,
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_personal.success'))
                        ->success()
                        ->send();
                }),
>>>>>>> 350420cb (Check & fix styling)

            'create_password_grant_client' => Action::make('create_password_grant_client')
                ->label(static::trans('actions.create_password.label'))
                ->icon('heroicon-o-lock-closed')
<<<<<<< HEAD
                ->schema([
                    TextInput::make('name')
                        ->default(self::configString('app.name').' '.static::trans('actions.create_password.label'))
=======
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_password.label'))
>>>>>>> 350420cb (Check & fix styling)
                        ->required()
                        ->maxLength(255),
                    TextInput::make('provider')
                        ->default('users')
                        ->required()
                        ->maxLength(255),
                ])
<<<<<<< HEAD
                ->action(
                    /** @param array<string, mixed> $data */
                    function (array $data): void {
                        app(CreatePasswordClientAction::class)->execute(
                            name: self::dataString($data, 'name'),
                            redirect: self::configString('app.url'),
                            user: null,
                            provider: self::dataString($data, 'provider'),
                        );
                        Notification::make()
                            ->title(static::trans('actions.create_password.success'))
                            ->success()
                            ->send();
                    }
                ),
=======
                ->action(function (array $data) {
                    app(CreatePasswordClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
                        user: null,
                        provider: (string) $data['provider'],
                    );
                    Notification::make()
                        ->title(static::trans('actions.create_password.success'))
                        ->success()
                        ->send();
                }),
>>>>>>> 350420cb (Check & fix styling)

            'create_client_credentials_client' => Action::make('create_client_credentials_client')
                ->label(static::trans('actions.create_client_credentials.label'))
                ->icon('heroicon-o-server')
<<<<<<< HEAD
                ->schema([
                    TextInput::make('name')
                        ->default(self::configString('app.name').' '.static::trans('actions.create_client_credentials.label'))
                        ->required()
                        ->maxLength(255),
                ])
                ->action(
                    /** @param array<string, mixed> $data */
                    function (array $data): void {
                        app(CreateGenericClientAction::class)->execute(
                            name: self::dataString($data, 'name'),
                            redirect: self::configString('app.url'),
                            personalAccess: false,
                            password: false,
                            user: null,
                            provider: 'users',
                        );
                        Notification::make()
                            ->title(static::trans('actions.create_client_credentials.success'))
                            ->success()
                            ->send();
                    }
                ),
        ];
    }

    private static function configString(string $key, string $default = ''): string
    {
        $value = config($key);

        return is_string($value) ? $value : $default;
    }

    /**
     * @param array<array-key, mixed> $data
     */
    private static function dataString(array $data, string $key, string $default = ''): string
    {
        $value = $data[$key] ?? null;

        return is_string($value) ? $value : $default;
    }
=======
                ->form([
                    TextInput::make('name')
                        ->default((string) config('app.name').' '.static::trans('actions.create_client_credentials.label'))
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data) {
                    app(CreateGenericClientAction::class)->execute(
                        name: (string) $data['name'],
                        redirect: (string) config('app.url'),
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
>>>>>>> 350420cb (Check & fix styling)
}
