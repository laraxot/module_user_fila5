<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\SocialProvider;
=======
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\User\Filament\Resources\SocialProviderResource;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SocialProvidersTable extends XotBaseResourceTable
{
<<<<<<< HEAD
    /**
     * @var class-string<SocialProvider>
     */
    protected static string $model = SocialProvider::class;

    /**
     * @return array<string, Column>
     */
=======
    protected static ?string $resource = SocialProviderResource::class;

>>>>>>> laraxot/dev
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean()->sortable(),
<<<<<<< HEAD
            'socialite' => IconColumn::make('socialite')->boolean()->sortable(),
            'stateless' => IconColumn::make('stateless')->boolean()->sortable(),
            'scopes' => TextColumn::make('scopes')->badge()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'stateless' => IconColumn::make('stateless')->boolean()->sortable(),
            'socialite' => IconColumn::make('socialite')->boolean()->sortable(),
            'scopes' => TextColumn::make('scopes')->searchable()->wrap(),
            'parameters' => TextColumn::make('parameters')->searchable()->wrap(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * @return array<string, SelectFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'active' => SelectFilter::make('active')->options([
                true => 'Active',
                false => 'Inactive',
            ]),
        ];
    }

    /**
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make()->requiresConfirmation(),
>>>>>>> laraxot/dev
        ];
    }
}
