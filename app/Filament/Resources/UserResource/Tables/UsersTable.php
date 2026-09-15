<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\User;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class UsersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<User>
     */
    protected static string $model = User::class;

    /**
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'first_name' => TextColumn::make('first_name')->searchable(),
            'last_name' => TextColumn::make('last_name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
            'email_verified_at' => TextColumn::make('email_verified_at')->dateTime(),
            'is_active' => TextColumn::make('is_active')->badge(),
            'is_otp' => TextColumn::make('is_otp')->badge(),
            'lang' => TextColumn::make('lang'),
            'current_team_id' => TextColumn::make('current_team_id'),
            'type' => TextColumn::make('type'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
=======
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'first_name' => TextColumn::make('first_name')->searchable()->sortable(),
            'last_name' => TextColumn::make('last_name')->searchable()->sortable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'email_verified_at' => TextColumn::make('email_verified_at')->dateTime()->sortable()->placeholder('—'),
            'is_otp' => IconColumn::make('is_otp')->boolean()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'lang' => TextColumn::make('lang')->toggleable(isToggledHiddenByDefault: true),
            'current_team_id' => TextColumn::make('current_team_id')->toggleable(isToggledHiddenByDefault: true),
            'type' => TextColumn::make('type')->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
        ];
    }
}
