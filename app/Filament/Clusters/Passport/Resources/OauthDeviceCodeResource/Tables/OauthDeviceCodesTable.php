<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthDeviceCode;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthDeviceCode;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class OauthDeviceCodesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<OauthDeviceCode>
     */
    protected static string $model = OauthDeviceCode::class;

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
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
>>>>>>> laraxot/dev
            'user_id' => TextColumn::make('user_id')->sortable(),
            'client_id' => TextColumn::make('client_id')->sortable()->copyable(),
            'revoked' => IconColumn::make('revoked')->boolean()->sortable(),
            'user_approved_at' => TextColumn::make('user_approved_at')->dateTime()->sortable()->placeholder('—'),
            'expires_at' => TextColumn::make('expires_at')->dateTime()->sortable()->placeholder('—'),
            'last_polled_at' => TextColumn::make('last_polled_at')->dateTime()->sortable()->placeholder('—'),
            'scopes' => TextColumn::make('scopes')->badge()->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
