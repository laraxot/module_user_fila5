<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
=======
use Modules\User\Models\TeamUser;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TeamUsersTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<TeamUser>
     */
    protected static string $model = TeamUser::class;

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
            'role' => TextColumn::make('role'),
            'team_id' => TextColumn::make('team_id'),
            'user_id' => TextColumn::make('user_id'),
            'customer_id' => TextColumn::make('customer_id'),
            'joined_at' => TextColumn::make('joined_at')->dateTime(),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
=======
            'user_id' => TextColumn::make('user_id')->sortable(),
            'team_id' => TextColumn::make('team_id')->sortable(),
            'role' => TextColumn::make('role')->badge()->sortable(),
            'joined_at' => TextColumn::make('joined_at')->dateTime()->sortable()->placeholder('—'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'uuid' => TextColumn::make('uuid')->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
        ];
    }
}
