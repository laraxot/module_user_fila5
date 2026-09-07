<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\DeviceResource;
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

class DevicesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'devices';

<<<<<<< HEAD
<<<<<<< HEAD
    public static function extendTableCallback(): array
    {
        return [
            'login_at' => TextColumn::make('login_at'),
            'logout_at' => TextColumn::make('logout_at'),
        ];
    }

    /**
     * @return array<string, Component>
     */
    #[Override]
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, Component>
     */
    #[\Override]
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    public function getFormSchema(): array
    {
        return [
            'device' => TextInput::make('device')->required()->maxLength(255),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function table(Table $table): Table
    {
        $table = DeviceResource::table($table);

        $columns = array_merge($table->getColumns(), static::extendTableCallback());

        $table = $table->columns($columns);

        return $table;
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
            'uuid' => TextColumn::make('uuid'),
            'mobile_id' => TextColumn::make('mobile_id'),
            'device' => TextColumn::make('device'),
            'platform' => TextColumn::make('platform'),
            'browser' => TextColumn::make('browser'),
            'version' => TextColumn::make('version'),
            'login_at' => TextColumn::make('login_at'),
            'logout_at' => TextColumn::make('logout_at'),
        ];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
