<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\FeatureResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
=======
use Modules\User\Models\Feature;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class FeaturesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<Feature>
     */
    protected static string $model = Feature::class;

    /**
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'name' => TextColumn::make('name')->searchable(),
            'scope' => TextColumn::make('scope'),
            'description' => TextColumn::make('description'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
            'deleted_by' => TextColumn::make('deleted_by')->toggleable(),
=======
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'scope' => TextColumn::make('scope')->searchable()->sortable(),
            'value' => TextColumn::make('value')->limit(60)->wrap(),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
        ];
    }
}
