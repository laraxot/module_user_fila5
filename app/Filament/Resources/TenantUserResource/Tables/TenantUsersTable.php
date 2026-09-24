<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\TenantUser;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TenantUsersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<TenantUser>
     */
    protected static string $model = TenantUser::class;

    /**
=======
>>>>>>> 350420cb (Check & fix styling)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'user_id' => TextColumn::make('user_id')->sortable(),
            'tenant_id' => TextColumn::make('tenant_id')->sortable(),
            'role' => TextColumn::make('role'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'uuid' => TextColumn::make('uuid')->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
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
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
