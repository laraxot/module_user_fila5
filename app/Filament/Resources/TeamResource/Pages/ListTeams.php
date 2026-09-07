<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

<<<<<<< HEAD
use Override;
=======
>>>>>>> 2024e2e7 (.)
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTeams extends XotBaseListRecords
{
    // //
    protected static string $resource = TeamResource::class;

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->wrap(),
            'users_count' => TextColumn::make('users_count')
                ->counts('users')
                ->numeric()
                ->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
        ];
    }
}
