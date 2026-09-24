<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\PageRegistration;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
=======
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Filament\Clusters\Passport;
use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Pages\ListOauthDeviceCodes;
use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Pages\ViewOauthDeviceCode;
use Modules\User\Models\OauthDeviceCode;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * Class OauthDeviceCodeResource.
 *
 * Resource Filament per i codici dispositivo OAuth (RFC8628 Device Authorization Grant).
 */
class OauthDeviceCodeResource extends XotBaseResource
{
    protected static ?string $cluster = Passport::class;

    protected static ?string $model = OauthDeviceCode::class;

<<<<<<< HEAD
=======
    /**
     * Get the form schema for the resource.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'oauth_device_code_info' => Section::make(static::trans('label'))
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
                            'user_code' => TextInput::make('user_code')
                                ->maxLength(8)
                                ->required(),
                        ]),
                    'grid_2' => Grid::make(2)
                        ->schema([
                            'scopes' => TextInput::make('scopes'),
                            'revoked' => TextInput::make('revoked')
                                ->numeric()
                                ->required(),
                            'user_approved_at' => TextInput::make('user_approved_at'),
                            'last_polled_at' => TextInput::make('last_polled_at'),
                            'expires_at' => TextInput::make('expires_at'),
                        ]),
                ]),
        ];
    }

>>>>>>> 350420cb (Check & fix styling)
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
<<<<<<< HEAD
                TextColumn::make('id')
=======
                \Filament\Tables\Columns\TextColumn::make('id')
>>>>>>> 350420cb (Check & fix styling)
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->limit(20),

<<<<<<< HEAD
                TextColumn::make('user_code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user_id')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('client_id')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('scopes')
                    ->limit(30),

                IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                TextColumn::make('user_approved_at')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('expires_at')
=======
                \Filament\Tables\Columns\TextColumn::make('user_code')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('user_id')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('client_id')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('scopes')
                    ->limit(30),

                \Filament\Tables\Columns\IconColumn::make('revoked')
                    ->boolean()
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                \Filament\Tables\Columns\TextColumn::make('user_approved_at')
                    ->dateTime()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('expires_at')
>>>>>>> 350420cb (Check & fix styling)
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
<<<<<<< HEAD
                Filter::make('revoked')
                    ->label(static::trans('filters.revoked'))
                    ->query(fn (Builder $query) => $query->where('revoked', true)),
                Filter::make('expired')
                    ->label(static::trans('filters.expired'))
                    ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),
                Filter::make('valid')
=======
                \Filament\Tables\Filters\Filter::make('revoked')
                    ->label(static::trans('filters.revoked'))
                    ->query(fn (Builder $query) => $query->where('revoked', true)),
                \Filament\Tables\Filters\Filter::make('expired')
                    ->label(static::trans('filters.expired'))
                    ->query(fn (Builder $query) => $query->where('expires_at', '<', now())),
                \Filament\Tables\Filters\Filter::make('valid')
>>>>>>> 350420cb (Check & fix styling)
                    ->label(static::trans('filters.valid'))
                    ->query(fn (Builder $query) => $query->where('revoked', false)->where('expires_at', '>', now())),
            ])
            ->recordActions([
<<<<<<< HEAD
                Action::make('revoke')
=======
                \Filament\Actions\Action::make('revoke')
>>>>>>> 350420cb (Check & fix styling)
                    ->label(static::trans('actions.revoke.label'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading(static::trans('actions.revoke.label'))
<<<<<<< HEAD
                    ->action(function (Model|array|null $record): void {
                        if ($record instanceof OauthDeviceCode) {
                            $record->revoked = true;
=======
                    ->action(function (mixed $record) {
                        if ($record instanceof OauthDeviceCode) {
                            $record->setAttribute('revoked', true);
>>>>>>> 350420cb (Check & fix styling)
                            $record->save();
                            Notification::make()
                                ->title(static::trans('actions.revoke.success'))
                                ->success()
                                ->send();
                        }
                    })
<<<<<<< HEAD
                    ->visible(fn (Model|array|null $record) => $record instanceof OauthDeviceCode && ! $record->revoked),
                DeleteAction::make(),
=======
                    ->visible(fn (mixed $record) => $record instanceof OauthDeviceCode && ! (bool) $record->getAttribute('revoked')),
                \Filament\Actions\DeleteAction::make(),
>>>>>>> 350420cb (Check & fix styling)
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
            'index' => ListOauthDeviceCodes::route('/'),
            'view' => ViewOauthDeviceCode::route('/{record}'),
        ];
    }

    /**
     * Modify the Eloquent query used to retrieve the records.
     */
    #[\Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user', 'client']);
    }
}
