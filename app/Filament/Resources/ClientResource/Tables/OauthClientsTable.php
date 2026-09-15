<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthClient;
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthClient;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class OauthClientsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<OauthClient>
     */
    protected static string $model = OauthClient::class;

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
            'user_id' => TextColumn::make('user_id'),
            'name' => TextColumn::make('name')->searchable(),
            'provider' => TextColumn::make('provider'),
            'redirect' => TextColumn::make('redirect'),
            'personal_access_client' => TextColumn::make('personal_access_client')->badge(),
            'password_client' => TextColumn::make('password_client')->badge(),
            'revoked' => TextColumn::make('revoked')->badge(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
=======
>>>>>>> laraxot/dev
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'provider' => TextColumn::make('provider')->searchable()->sortable(),
            'grant_types' => TextColumn::make('grant_types')->badge(),
            'redirect_uris' => TextColumn::make('redirect_uris')->limit(60)->wrap(),
            'revoked' => IconColumn::make('revoked')->boolean()->sortable(),
            'owner_id' => TextColumn::make('owner_id')->sortable()->toggleable(isToggledHiddenByDefault: true),
            'owner_type' => TextColumn::make('owner_type')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
