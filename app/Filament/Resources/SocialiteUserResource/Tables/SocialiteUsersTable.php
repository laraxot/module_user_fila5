<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\SocialiteUser;
=======
<<<<<<< HEAD
=======
use Modules\User\Models\SocialiteUser;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SocialiteUsersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<SocialiteUser>
     */
    protected static string $model = SocialiteUser::class;

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
=======
>>>>>>> laraxot/dev
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'provider' => TextColumn::make('provider')->searchable()->sortable(),
            'provider_id' => TextColumn::make('provider_id')->searchable()->sortable(),
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
