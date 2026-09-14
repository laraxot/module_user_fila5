<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamInvitationResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
=======
use Modules\User\Models\TeamInvitation;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TeamInvitationsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<TeamInvitation>
     */
    protected static string $model = TeamInvitation::class;

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
            'team_id' => TextColumn::make('team_id'),
            'email' => TextColumn::make('email')->searchable(),
            'role' => TextColumn::make('role'),
            'accepted_at' => TextColumn::make('accepted_at')->dateTime(),
            'declined_at' => TextColumn::make('declined_at')->dateTime(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->toggleable(),
            'updated_by' => TextColumn::make('updated_by')->toggleable(),
            'created_by' => TextColumn::make('created_by')->toggleable(),
            'deleted_by' => TextColumn::make('deleted_by')->toggleable(),
=======
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'team_id' => TextColumn::make('team_id')->sortable(),
            'role' => TextColumn::make('role')->badge()->sortable(),
            'accepted_at' => TextColumn::make('accepted_at')->dateTime()->sortable()->placeholder('—'),
            'declined_at' => TextColumn::make('declined_at')->dateTime()->sortable()->placeholder('—'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
            'deleted_at' => TextColumn::make('deleted_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
        ];
    }
}
