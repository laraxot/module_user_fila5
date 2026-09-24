<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamPermissionResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\TeamPermission;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TeamPermissionsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<TeamPermission>
     */
    protected static string $model = TeamPermission::class;

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
            'permission' => TextColumn::make('permission')->searchable()->sortable(),
            'team_id' => TextColumn::make('team_id')->sortable(),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'team_id' => TextColumn::make('team_id'),
            'permission_id' => TextColumn::make('permission_id'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
            'deleted_by' => TextColumn::make('deleted_by')->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
