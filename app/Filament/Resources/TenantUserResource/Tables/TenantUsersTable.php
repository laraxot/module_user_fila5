<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\TenantUser;
=======
<<<<<<< HEAD
=======
use Modules\User\Models\TenantUser;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TenantUsersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<TenantUser>
     */
    protected static string $model = TenantUser::class;

    /**
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'user_id' => TextColumn::make('user_id'),
            'tenant_id' => TextColumn::make('tenant_id'),
            'role' => TextColumn::make('role'),
            'permissions' => TextColumn::make('permissions'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
            'deleted_by' => TextColumn::make('deleted_by')->toggleable(),
=======
>>>>>>> laraxot/dev
            'user_id' => TextColumn::make('user_id')->sortable(),
            'tenant_id' => TextColumn::make('tenant_id')->sortable(),
            'role' => TextColumn::make('role'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'uuid' => TextColumn::make('uuid')->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
