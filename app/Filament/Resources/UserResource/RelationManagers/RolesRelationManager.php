<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Actions\Header\AttachRoleAction;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Override;
>>>>>>> f548be94 (.)

class RolesRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    // protected static ?string $inverseRelationship = 'section'; // Since the inverse related model is `Category`, this is normally `category`, not `section`.
    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    // }
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
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
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name'),
            'team_id' => TextColumn::make('team_id'),
=======
    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('team_id'),
>>>>>>> f548be94 (.)
        ];
    }

    /**
     * @return array<string, Action>
     */
<<<<<<< HEAD
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
=======
    #[Override]
    public function getTableHeaderActions(): array
    {
        $xotData = XotData::make();

        return [

            ...parent::getTableHeaderActions(),
            'attach' => AttachRoleAction::make(),

        ];
>>>>>>> f548be94 (.)
    }
}
