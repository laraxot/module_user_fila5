<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\SocialiteUser;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SocialiteUsersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<SocialiteUser>
     */
    protected static string $model = SocialiteUser::class;

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
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'provider' => TextColumn::make('provider')->searchable()->sortable(),
            'provider_id' => TextColumn::make('provider_id')->searchable()->sortable(),
            'user_id' => TextColumn::make('user_id')->sortable(),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'user_id' => TextColumn::make('user_id'),
            'provider' => TextColumn::make('provider'),
            'provider_id' => TextColumn::make('provider_id'),
            'name' => TextColumn::make('name'),
            'nickname' => TextColumn::make('nickname'),
            'email' => TextColumn::make('email')->searchable(),
            'avatar' => TextColumn::make('avatar'),
            'token' => TextColumn::make('token'),
            'refresh_token' => TextColumn::make('refresh_token'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
