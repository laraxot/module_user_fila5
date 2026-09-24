<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======
>>>>>>> 350420cb (Check & fix styling)
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords;

/**
 * `table()` è `final` su {@see XotBaseManageRelatedRecords}: qui si usano
 * solo i 5 hook di contenuto (colonne, azioni header/riga/bulk, filtri),
 * mai un override di `table()` per intero.
 */
class ManageRolePermissions extends XotBaseManageRelatedRecords
=======
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\RoleResource;

class ManageRolePermissions extends ManageRelatedRecords
>>>>>>> 350420cb (Check & fix styling)
{
    protected static string $resource = RoleResource::class;

    protected static string $relationship = 'permissions';

<<<<<<< HEAD
    /**
     * @return array<int, TextInput>
     */
=======
    /** @return array<int|string, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
        ];
    }

<<<<<<< HEAD
    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name'),
        ];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'associate' => AssociateAction::make(),
        ];
    }

    /**
     * @return array<int|string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            DissociateAction::make(),
            DeleteAction::make(),
        ];
    }

    /**
     * @return array<int|string, Action|ActionGroup>
     */
    public function getTableBulkActions(): array
    {
        return [
            BulkActionGroup::make([
                DissociateBulkAction::make(),
                DeleteBulkAction::make(),
            ]),
        ];
    }

    /**
     * @return array<string, BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [];
=======
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
>>>>>>> 350420cb (Check & fix styling)
    }
}
