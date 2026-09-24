<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Models\PasswordReset;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class PasswordResetsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<PasswordReset>
     */
    protected static string $model = PasswordReset::class;

    /**
=======
>>>>>>> 350420cb (Check & fix styling)
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
            'id' => TextColumn::make('id')->sortable(),
            'email' => TextColumn::make('email')->searchable(),
            'token' => TextColumn::make('token'),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
