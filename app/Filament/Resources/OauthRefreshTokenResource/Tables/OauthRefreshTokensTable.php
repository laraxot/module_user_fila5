<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthRefreshTokenResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Models\OauthRefreshToken;
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class OauthRefreshTokensTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<OauthRefreshToken>
     */
    protected static string $model = OauthRefreshToken::class;

    /**
=======
>>>>>>> 350420cb (Check & fix styling)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'access_token_id' => TextColumn::make('access_token_id')->sortable()->copyable(),
            'revoked' => IconColumn::make('revoked')->boolean()->sortable(),
            'expires_at' => TextColumn::make('expires_at')->dateTime()->sortable()->placeholder('—'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'access_token_id' => TextColumn::make('access_token_id'),
            'revoked' => TextColumn::make('revoked')->badge(),
            'expires_at' => TextColumn::make('expires_at')->dateTime(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
