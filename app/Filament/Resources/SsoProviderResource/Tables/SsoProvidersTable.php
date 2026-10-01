<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SsoProviderResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\SsoProvider;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\User\Filament\Resources\SsoProviderResource;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SsoProvidersTable extends XotBaseResourceTable
{
<<<<<<< HEAD
    /**
     * @var class-string<SsoProvider>
     */
    protected static string $model = SsoProvider::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'display_name' => TextColumn::make('display_name')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'type' => TextColumn::make('type')->badge()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'entity_id' => TextColumn::make('entity_id')->toggleable(isToggledHiddenByDefault: true),
            'redirect_url' => TextColumn::make('redirect_url')->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
    protected static ?string $resource = SsoProviderResource::class;

    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable()->wrap(),
            'display_name' => TextColumn::make('display_name')->searchable()->sortable()->wrap(),
            'type' => TextColumn::make('type')->searchable()->sortable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'type' => SelectFilter::make('type')->options(['saml' => 'SAML', 'oidc' => 'OIDC', 'oauth' => 'OAuth']),
            'is_active' => SelectFilter::make('is_active')->options([true => 'Active', false => 'Inactive']),
>>>>>>> laraxot/dev
        ];
    }
}
