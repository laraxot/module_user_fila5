<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthPersonalAccessClientResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\OauthPersonalAccessClient;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class OauthPersonalAccessClientsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<OauthPersonalAccessClient>
     */
    protected static string $model = OauthPersonalAccessClient::class;

    /**
=======
>>>>>>> 350420cb (Check & fix styling)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'client_id' => TextColumn::make('client_id')->sortable()->copyable(),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'client_id' => TextColumn::make('client_id'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
