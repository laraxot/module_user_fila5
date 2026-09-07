<?php

/**
 * @see https://github.com/Althinect/filament-spatie-roles-permissions/blob/2.x/src/resources/PermissionResource/RelationManager/RoleRelationManager.php
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\RelationManager;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class RoleRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $recordTitleAttribute = 'name';
=======
    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> 2024e2e7 (.)
=======
    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> f589f9b2 (.)

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name'),
            'guard_name' => TextInput::make('guard_name'),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('guard_name')->searchable(),
        ])->filters([]);
    }

    protected static function getModelLabel(): null|string
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable(),
            'guard_name' => TextColumn::make('guard_name')->searchable(),
        ];
    }

    protected static function getModelLabel(): ?string
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    {
        // return __('filament-spatie-roles-permissions::filament-spatie.section.role');
        return __('filament-spatie-roles-permissions::filament-spatie.section.role');
    }

    protected static function getPluralModelLabel(): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.roles');
    }
}
