<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======
<<<<<<< HEAD
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
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
=======
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
=======
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords;

class ManageRolePermissions extends XotBaseManageRelatedRecords
{
    protected static string $resource = RoleResource::class;

    protected static string $relationship = 'permissions';

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * @return array<int, TextInput>
=======
>>>>>>> laraxot/dev
     * Override esplicito, volutamente minimale (solo `name`): senza questo
     * override il form userebbe `PermissionResource::form()` per intero —
     * comportamento diverso da quello di questa pagina, pensata solo per
     * associare permessi esistenti a un ruolo, non per editarne tutti i
     * campi. `getFormSchema()` (non piu' `form()`, `final` nel padre dal
     * 2026-09-11): stesso hook usato da ogni altra pagina che vuole
     * sostituire il form di default.
     *
     * @return array<\Filament\Schemas\Components\Component>
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
        ];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
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
=======
>>>>>>> laraxot/dev
    /**
     * Migrato dal precedente override completo di `table()` (`final` nel
     * padre dal 2026-09-11: nessuna pagina puo' piu' sovrascriverlo) ai 5
     * hook di contenuto — stesso identico contenuto, un hook per concetto.
     *
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name'),
        ];
    }

    /**
     * Esplicitamente vuoto: preserva il comportamento del precedente
     * `->filters([])` invece di ereditare in silenzio i filtri di default
     * di `PermissionResource`, se ne avesse.
     *
     * @return array<string, \Filament\Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [];
    }

    /** @return array<string, Action|ActionGroup> */
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'associate' => AssociateAction::make(),
        ];
    }

    /** @return array<int|string, Action|ActionGroup> */
    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            DissociateAction::make(),
            DeleteAction::make(),
        ];
    }

    /** @return array<int|string, Action|ActionGroup> */
    public function getTableBulkActions(): array
    {
        return [
            BulkActionGroup::make([
                DissociateBulkAction::make(),
                DeleteBulkAction::make(),
            ]),
        ];
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    }
}
