<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
use Filament\Notifications\Notification;
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
>>>>>>> 350420cb (Check & fix styling)
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\User\Actions\Passport\RevokeAllUserTokensAction;
use Modules\User\Actions\Passport\RevokeTokenAction;
use Modules\User\Filament\Clusters\Passport;
<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Models\OauthAccessToken;
=======
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages\EditOauthAccessTokens;
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages\ListOauthAccessTokens;
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Pages\ViewOauthAccessToken;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Models\OauthToken;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\json_encode;

class OauthAccessTokenResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

<<<<<<< HEAD
    protected static ?string $model = OauthAccessToken::class;
=======
    protected static ?string $model = OauthToken::class;
>>>>>>> 350420cb (Check & fix styling)

    public static function table(Table $table): Table
    {
        return $table
<<<<<<< HEAD
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->url(function (Model|array|null $record): ?string {
                        if (! $record instanceof OauthAccessToken) {
                            return null;
                        }
                        $user = $record->user;
                        if ($user !== null && method_exists($user, 'exists') && $user->exists) {
                            return UserResource::getUrl('view', ['record' => $user]);
                        }

                        return null;
                    })
                    ->openUrlInNewTab(),

                TextColumn::make('client.name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('scopes')
                    ->limit(30)
                    ->tooltip(
                        /** @param array<array-key, mixed>|scalar|null $state Raw 'scopes' column state. */
                        function (mixed $state): ?string {
                            if ($state === null) {
                                return null;
                            }
                            if (is_array($state)) {
                                return json_encode($state);
                            }

                            return is_string($state) ? $state : null;
                        }
                    ),

                IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('expires_at')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(function (Carbon|string|null $state): string {
                        if ($state instanceof Carbon) {
                            $now = Carbon::now();
                            if ($state->lt($now)) {
                                return $state->format('Y-m-d H:i:s').' (Expired)';
                            }

                            return $state->format('Y-m-d H:i:s');
                        }

                        return 'N/A';
                    }),
            ])
            ->filters([
                Filter::make('revoked')
                    ->query(fn (Builder $query) => $query->where('revoked', true)),

                Filter::make('expired')
                    ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),

                Filter::make('valid')
                    ->query(fn (Builder $query) => $query->where('revoked', false)->where('expires_at', '>', now())),
            ])
            ->recordActions([
                Action::make('revoke')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Model|array|null $record): void {
                        if ($record instanceof Model) {
                            $key = $record->getKey();
                            if ((is_int($key) || is_string($key)) && app(RevokeTokenAction::class)->execute((string) $key)) {
                                Notification::make()
                                    ->title(static::trans('actions.revoke.success'))
                                    ->success()
                                    ->send();
                            }
                        }
                    })
                    ->visible(fn (Model|array|null $record) => $record instanceof OauthAccessToken && ! $record->revoked),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkAction::make('revoke_all_for_user')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Collection $records): void {
                        $users = $records->pluck('user_id')->unique();
                        $count = 0;
                        foreach ($users as $userId) {
                            if (is_string($userId) || is_int($userId)) {
                                $count += app(RevokeAllUserTokensAction::class)->execute((string) $userId);
                            }
                        }
                        Notification::make()
                            ->title(static::trans('actions.revoke_all_for_user.success'))
                            ->success()
                            ->send();
                    }),
                DeleteBulkAction::make(),
            ])
=======
            ->columns(static::getTableColumns())
            ->filters(static::getTableFilters())
            ->actions(static::getTableActions())
            ->bulkActions(static::getTableBulkActions())
>>>>>>> 350420cb (Check & fix styling)
            ->defaultSort('created_at', 'desc');
    }

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
    public function getTableColumns(): array
=======
    public static function getTableColumns(): array
>>>>>>> 350420cb (Check & fix styling)
    {
        return [
            'id' => TextColumn::make('id')
                ->searchable()
                ->sortable()
                ->copyable(),

            'user.name' => TextColumn::make('user.name')
                ->searchable()
                ->sortable()
<<<<<<< HEAD
                ->url(function (Model|array|null $record): ?string {
                    if (! $record instanceof OauthAccessToken) {
=======
                ->url(function (mixed $record): ?string {
                    if (! $record instanceof OauthToken) {
>>>>>>> 350420cb (Check & fix styling)
                        return null;
                    }
                    $user = $record->user;
                    if ($user !== null && method_exists($user, 'exists') && $user->exists) {
                        return UserResource::getUrl('view', ['record' => $user]);
                    }

                    return null;
                })
                ->openUrlInNewTab(),

            'client.name' => TextColumn::make('client.name')
                ->searchable()
                ->sortable(),

            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),

            'scopes' => TextColumn::make('scopes')
                ->limit(30)
<<<<<<< HEAD
                ->tooltip(
                    /** @param array<array-key, mixed>|scalar|null $state Raw 'scopes' column state. */
                    function (mixed $state): ?string {
                        if ($state === null) {
                            return null;
                        }
                        if (is_array($state)) {
                            return json_encode($state);
                        }

                        return is_string($state) ? $state : null;
                    }
                ),
=======
                ->tooltip(function (mixed $state): ?string {
                    if (null === $state) {
                        return null;
                    }
                    if (is_array($state)) {
                        /* @var array<string, mixed> $state */
                        return json_encode($state);
                    }

                    return is_string($state) ? $state : null;
                }),
>>>>>>> 350420cb (Check & fix styling)

            'revoked' => IconColumn::make('revoked')
                ->boolean()
                ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),

            'expires_at' => TextColumn::make('expires_at')
                ->dateTime()
                ->sortable()
<<<<<<< HEAD
                ->formatStateUsing(function (Carbon|string|null $state): string {
=======
                ->formatStateUsing(function (mixed $state): string {
>>>>>>> 350420cb (Check & fix styling)
                    if ($state instanceof Carbon) {
                        $now = Carbon::now();
                        if ($state->lt($now)) {
                            return $state->format('Y-m-d H:i:s').' (Expired)';
                        }

                        return $state->format('Y-m-d H:i:s');
                    }

                    return 'N/A';
                }),
        ];
    }

    /**
     * @return array<string, BaseFilter>
     */
    public static function getTableFilters(): array
    {
        return [
            'revoked' => Filter::make('revoked')
                ->query(fn (Builder $query) => $query->where('revoked', true)),

            'expired' => Filter::make('expired')
                ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),

            'valid' => Filter::make('valid')
                ->query(fn (Builder $query) => $query->where('revoked', false)->where('expires_at', '>', now())),
        ];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
    public static function getTableActions(): array
    {
        return [
            'revoke' => Action::make('revoke')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
<<<<<<< HEAD
                ->action(function (Model|array|null $record): void {
                    if ($record instanceof Model) {
                        $key = $record->getKey();
                        if ((is_int($key) || is_string($key)) && app(RevokeTokenAction::class)->execute((string) $key)) {
=======
                ->action(function (mixed $record) {
                    if ($record instanceof Model) {
                        if (app(RevokeTokenAction::class)->execute((string) $record->getKey())) {
>>>>>>> 350420cb (Check & fix styling)
                            Notification::make()
                                ->title(static::trans('actions.revoke.success'))
                                ->success()
                                ->send();
                        }
                    }
                })
<<<<<<< HEAD
                ->visible(fn (Model|array|null $record): bool => $record instanceof OauthAccessToken && ! $record->revoked),
=======
                ->visible(fn (mixed $record) => $record instanceof OauthToken && ! $record->revoked),
>>>>>>> 350420cb (Check & fix styling)
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * @return array<string, BulkAction|ActionGroup>
     */
    public static function getTableBulkActions(): array
    {
        return [
            'revoke_all_for_user' => BulkAction::make('revoke_all_for_user')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
<<<<<<< HEAD
                ->action(function (Collection $records): void {
=======
                ->action(function (Collection $records) {
>>>>>>> 350420cb (Check & fix styling)
                    $users = $records->pluck('user_id')->unique();
                    $count = 0;
                    foreach ($users as $userId) {
                        if (is_string($userId) || is_int($userId)) {
                            $count += app(RevokeAllUserTokensAction::class)->execute((string) $userId);
                        }
                    }
                    Notification::make()
<<<<<<< HEAD
                        ->title(static::trans('actions.revoke_all_for_user.success'))
=======
                        ->title(static::trans('actions.revoke_all_for_user.success', params: ['count' => $count]))
>>>>>>> 350420cb (Check & fix styling)
                        ->success()
                        ->send();
                }),
            'delete' => DeleteBulkAction::make(),
        ];
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListOauthAccessTokens::route('/'),
            'view' => ViewOauthAccessToken::route('/{record}'),
            'edit' => EditOauthAccessTokens::route('/{record}/edit'),
        ];
    }

    /**
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'oauth_access_token_info' => Section::make('OAuth Access Token Information')
                ->schema([
                    'grid_1' => Grid::make(2)
                        ->schema([
                            'user_id' => Select::make('user_id')
                                ->relationship('user', 'name')
                                ->searchable(),
                            'client_id' => Select::make('client_id')
                                ->relationship('client', 'name')
                                ->searchable()
                                ->required(),
                        ]),

                    'grid_2' => Grid::make(2)
                        ->schema([
                            'name' => TextInput::make('name')
                                ->maxLength(255),
                            'scopes' => TextInput::make('scopes'),
                        ]),
                ]),
        ];
    }

>>>>>>> 350420cb (Check & fix styling)
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'client']);
    }
}
