<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\Permission;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class PermissionsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<Permission>
     */
    protected static string $model = Permission::class;

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
            // NOTA: 'display_name' non esiste nello schema reale (tabella `permissions`,
            // connessione `user`; confermato via Schema::getColumnListing() e dalla
            // migration owner 2026_09_01_150112_create_permissions_table.php, che
            // dichiara esplicitamente nessuna colonna aggiuntiva). ->searchable()/
            // ->sortable() generavano una query SQL su colonna inesistente: rimossi.
            // Vedi https://github.com/laraxot/module_user_fila5/issues/90.
            'display_name' => TextColumn::make('display_name'),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'description' => TextColumn::make('description')->limit(60)->wrap()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'guard_name' => TextColumn::make('guard_name'),
            'display_name' => TextColumn::make('display_name'),
            'description' => TextColumn::make('description'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
