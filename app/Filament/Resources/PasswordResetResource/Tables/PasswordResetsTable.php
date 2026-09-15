<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\PasswordReset;
=======
<<<<<<< HEAD
=======
use Modules\User\Models\PasswordReset;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class PasswordResetsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
     * @var class-string<PasswordReset>
     */
    protected static string $model = PasswordReset::class;

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
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
=======
<<<<<<< HEAD
            'id' => TextColumn::make('id')->sortable(),
            'email' => TextColumn::make('email')->searchable(),
            'token' => TextColumn::make('token'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        ];
    }
}
