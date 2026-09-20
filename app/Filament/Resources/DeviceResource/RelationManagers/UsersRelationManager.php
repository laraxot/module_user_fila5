<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\UserResource;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
=======
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    #[\Override]
>>>>>>> laraxot/dev
    public function getFormSchema(): array
    {
        return [
            'device' => TextInput::make('device')->required()->maxLength(255),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable(),
        ];
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
    #[Override]
    public function table(Table $table): Table
    {
        $table = UserResource::table($table);

        return $table;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable(),
        ];
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    }
}
