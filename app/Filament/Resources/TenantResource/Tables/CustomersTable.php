<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\Tenant;
=======
<<<<<<< HEAD
=======
use Modules\User\Models\Tenant;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class CustomersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<Tenant>
     */
    protected static string $model = Tenant::class;

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
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug'),
            'domain' => TextColumn::make('domain'),
            'email_address' => TextColumn::make('email_address'),
            'phone' => TextColumn::make('phone'),
            'is_active' => TextColumn::make('is_active')->badge(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
=======
>>>>>>> laraxot/dev
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'mobile_phone' => TextColumn::make('mobile_phone'),
            'slug' => TextColumn::make('slug')->searchable()->sortable(),
            'team_id' => TextColumn::make('team_id')->sortable(),
            'user_id' => TextColumn::make('user_id')->sortable(),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
