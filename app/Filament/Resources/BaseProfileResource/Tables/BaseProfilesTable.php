<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Tables\Columns\UserColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class BaseProfilesTable extends XotBaseResourceTable
{
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'user' => UserColumn::make()->searchable(),
            'is_active' => IconColumn::make('is_active')->boolean(),
            'photo' => \\Filament\Tables\Columns\SpatieMediaLibraryImageColumn::make('photo')->collection('profile'),
        ];
    }
}
