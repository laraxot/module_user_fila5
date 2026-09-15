<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
=======
<<<<<<< .merge_file_hDxpIB
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_oGfpea
>>>>>>> laraxot/dev
use Filament\Tables\Filters\SelectFilter;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRoles extends XotBaseListRecords
{
    protected static string $resource = RoleResource::class;

    #[\Override]
<<<<<<< HEAD
=======
<<<<<<< .merge_file_hDxpIB
=======
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name')->searchable()->sortable(),
            // Tables\Columns\TextColumn::make('role'),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'team_id' => TextColumn::make('team.name')->searchable()->sortable(),
        ];
    }

    #[\Override]
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_oGfpea
>>>>>>> laraxot/dev
    public function getTableFilters(): array
    {
        return [
            'guard_name' => SelectFilter::make('guard_name')
                ->options([
                    'web' => 'Web',
                    'api' => 'API',
                    'sanctum' => 'Sanctum',
                ])
                ->multiple(),
        ];
    }
}
