<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\PageRegistration;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
=======
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Builder;
>>>>>>> 350420cb (Check & fix styling)
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

<<<<<<< HEAD
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
=======
    /**
     * Get the form schema for the resource.
     *
     * @return array<string, \Filament\Schemas\Components\Component>
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

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('id')
>>>>>>> 350420cb (Check & fix styling)
                    ->searchable()
                    ->sortable()
                    ->copyable(),

<<<<<<< HEAD
                TextColumn::make('access_token_id')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                TextColumn::make('expires_at')
=======
                \Filament\Tables\Columns\TextColumn::make('access_token_id')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                \Filament\Tables\Columns\TextColumn::make('expires_at')
>>>>>>> 350420cb (Check & fix styling)
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
<<<<<<< HEAD
                // Add filters for revoked status, expiration
            ])
            ->recordActions([
                Action::make('revoke')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Model|array|null $record): void {
=======
                \Filament\Tables\Filters\Filter::make('revoked')
                    ->label(static::trans('filters.revoked'))
                    ->query(fn (Builder $query) => $query->where('revoked', true)),
                \Filament\Tables\Filters\Filter::make('expired')
                    ->label(static::trans('filters.expired'))
                    ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),
                \Filament\Tables\Filters\Filter::make('valid')
                    ->label(static::trans('filters.valid'))
                    ->query(fn (Builder $query) => $query->where('revoked', false)->where('expires_at', '>', now())),
            ])
            ->recordActions([
                \Filament\Actions\Action::make('revoke')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (mixed $record) {
>>>>>>> 350420cb (Check & fix styling)
                        if ($record instanceof OauthRefreshToken && app(RevokeRefreshTokenAction::class)->execute($record)) {
                            Notification::make()
                                ->title(static::trans('actions.revoke.success'))
                                ->success()
                                ->send();
                        }
                    })
<<<<<<< HEAD
                    ->visible(fn (Model|array|null $record) => $record instanceof OauthRefreshToken && ! (bool) $record->getAttribute('revoked')),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
=======
                    ->visible(fn (mixed $record) => $record instanceof OauthRefreshToken && ! (bool) $record->getAttribute('revoked')),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
>>>>>>> 350420cb (Check & fix styling)
                ]),
            ])
            ->defaultSort('expires_at', 'desc');
    }

    /**
<<<<<<< HEAD
     * @return array<string, PageRegistration>
=======
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
>>>>>>> 350420cb (Check & fix styling)
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
