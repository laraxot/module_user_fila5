<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\FeatureResource\Pages;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Filament\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\FeatureResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListFeatures extends XotBaseListRecords
{
    protected static string $resource = FeatureResource::class;

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'type' => TextColumn::make('type')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
