<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\AuthenticationLogResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\AuthenticationLog;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class AuthenticationLogsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<AuthenticationLog>
     */
    protected static string $model = AuthenticationLog::class;

    /**
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'id' => TextColumn::make('id')->sortable(),
            'uuid' => TextColumn::make('uuid'),
            'authenticatable_id' => TextColumn::make('authenticatable_id'),
            'ip_address' => TextColumn::make('ip_address'),
            'user_agent' => TextColumn::make('user_agent'),
            'login_at' => TextColumn::make('login_at')->dateTime(),
            'login_successful' => TextColumn::make('login_successful')->badge(),
            'logout_at' => TextColumn::make('logout_at')->dateTime(),
            'cleared_by_user' => TextColumn::make('cleared_by_user')->badge(),
            'location' => TextColumn::make('location'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
=======
            'authenticatable_id' => TextColumn::make('authenticatable_id')->sortable()->copyable(),
            'ip_address' => TextColumn::make('ip_address')->searchable()->sortable(),
            'login_at' => TextColumn::make('login_at')->dateTime()->sortable()->placeholder('—'),
            'login_successful' => IconColumn::make('login_successful')->boolean()->sortable(),
            'logout_at' => TextColumn::make('logout_at')->dateTime()->sortable()->placeholder('—'),
            'cleared_by_user' => IconColumn::make('cleared_by_user')->boolean()->sortable(),
            'user_agent' => TextColumn::make('user_agent')->limit(60)->wrap()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
        ];
    }
}
