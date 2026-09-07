<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Override;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
=======
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\User\Filament\Resources\RoleResource;
>>>>>>> 2024e2e7 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRoles extends XotBaseListRecords
{
    protected static string $resource = RoleResource::class;

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
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name')->searchable()->sortable(),
            // Tables\Columns\TextColumn::make('role'),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'team_id' => TextColumn::make('team.name')->searchable()->sortable(),
        ];
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
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
