<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Override;
=======
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> 2024e2e7 (.)
=======
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> f589f9b2 (.)

class RolesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    // }
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
            TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('team_id'),
=======
=======
>>>>>>> f589f9b2 (.)
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name'),
            'team_id' => TextColumn::make('team_id'),
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        ];
    }

    /**
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function getTableHeaderActions(): array
    {
        $xotData = XotData::make();

        return [

            ...parent::getTableHeaderActions(),
            'attach' => AttachRoleAction::make(),

        ];
=======
=======
>>>>>>> f589f9b2 (.)
    #[\Override]
    public function getTableHeaderActions(): array
    {
        /** @var array<string, Action> $parentActions */
        $parentActions = parent::getTableHeaderActions();

        return array_merge(
            $parentActions,
            [
                'attach' => AttachRoleAction::make(),
            ]
        );
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
