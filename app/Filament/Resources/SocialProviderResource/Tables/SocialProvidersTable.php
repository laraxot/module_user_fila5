<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\SocialProvider;
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SocialProvidersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<SocialProvider>
     */
    protected static string $model = SocialProvider::class;

    /**
=======
>>>>>>> 350420cb (Check & fix styling)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean()->sortable(),
            'socialite' => IconColumn::make('socialite')->boolean()->sortable(),
            'stateless' => IconColumn::make('stateless')->boolean()->sortable(),
            'scopes' => TextColumn::make('scopes')->badge()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug'),
            'provider' => TextColumn::make('provider'),
            'active' => TextColumn::make('active')->badge(),
            'socialite' => TextColumn::make('socialite')->badge(),
            'stateless' => TextColumn::make('stateless')->badge(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
