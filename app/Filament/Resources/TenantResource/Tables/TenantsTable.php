<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\Tenant;
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TenantsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<Tenant>
     */
    protected static string $model = Tenant::class;

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
            'slug' => TextColumn::make('slug')->searchable()->sortable(),
            'domain' => TextColumn::make('domain')->searchable()->sortable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'trial_ends_at' => TextColumn::make('trial_ends_at')->dateTime()->sortable()->placeholder('—'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug'),
            'domain' => TextColumn::make('domain'),
            'email_address' => TextColumn::make('email_address'),
            'phone' => TextColumn::make('phone'),
            'is_active' => TextColumn::make('is_active')->badge(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
