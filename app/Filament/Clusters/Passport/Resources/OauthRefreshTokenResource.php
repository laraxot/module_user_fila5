<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Resources\Pages\PageRegistration;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Actions\Passport\RevokeRefreshTokenAction;
use Modules\User\Filament\Clusters\Passport;
use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Pages\ListOauthRefreshTokens;
use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Pages\ViewOauthRefreshToken;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

class OauthRefreshTokenResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

    protected static ?string $model = OauthRefreshToken::class;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f589f9b2 (.)
     * Get the form schema for the resource.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'oauth_refresh_token_info' => Section::make(static::trans('label'))
                ->schema([
                    'grid_1' => Grid::make(2)
                        ->schema([
                            'access_token_id' => Select::make('access_token_id')
                                ->relationship('accessToken', 'id')
                                ->searchable()
                                ->required(),
                            'revoked' => TextInput::make('revoked')
                                ->numeric()
                                ->required(),
                            'expires_at' => DateTimePicker::make('expires_at'),
                        ]),
                ]),
        ];
    }

<<<<<<< HEAD
    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('id')
=======
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
>>>>>>> f589f9b2 (.)
                    ->searchable()
                    ->sortable()
                    ->copyable(),

<<<<<<< HEAD
                \Filament\Tables\Columns\TextColumn::make('access_token_id')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                \Filament\Tables\Columns\TextColumn::make('expires_at')
=======
                TextColumn::make('access_token_id')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                TextColumn::make('expires_at')
>>>>>>> f589f9b2 (.)
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Add filters for revoked status, expiration
            ])
            ->recordActions([
<<<<<<< HEAD
                \Filament\Actions\Action::make('revoke')
                    ->label(static::trans('actions.revoke.label'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading(static::trans('actions.revoke.label'))
                    ->action(function (mixed $record) {
=======
                Action::make('revoke')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (mixed $record): void {
>>>>>>> f589f9b2 (.)
                        if ($record instanceof OauthRefreshToken && app(RevokeRefreshTokenAction::class)->execute($record)) {
                            Notification::make()
                                ->title(static::trans('actions.revoke.success'))
                                ->success()
                                ->send();
                        }
                    })
<<<<<<< HEAD
                    ->visible(fn (mixed $record) => $record instanceof OauthRefreshToken && ! $record->revoked),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
=======
                    ->visible(fn (mixed $record) => $record instanceof OauthRefreshToken && ! (bool) $record->getAttribute('revoked')),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
>>>>>>> f589f9b2 (.)
                ]),
            ])
            ->defaultSort('expires_at', 'desc');
    }

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
=======
     * @return array<string, PageRegistration>
>>>>>>> 2024e2e7 (.)
=======
     * @return array<string, PageRegistration>
>>>>>>> f589f9b2 (.)
     */
    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListOauthRefreshTokens::route('/'),
            'view' => ViewOauthRefreshToken::route('/{record}'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['accessToken']);
    }
}
