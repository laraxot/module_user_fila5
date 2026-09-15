<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthAuthCode;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthAuthCode;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class OauthAuthCodesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<OauthAuthCode>
     */
    protected static string $model = OauthAuthCode::class;

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
            'expires_at' => TextColumn::make('expires_at')->dateTime()->sortable()->placeholder('—'),
            'scopes' => TextColumn::make('scopes')->badge()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
