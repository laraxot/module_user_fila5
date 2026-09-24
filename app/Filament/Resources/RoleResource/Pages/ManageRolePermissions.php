<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords;

/**
 * `table()` è `final` su {@see XotBaseManageRelatedRecords}: qui si usano
 * solo i 5 hook di contenuto (colonne, azioni header/riga/bulk, filtri),
 * mai un override di `table()` per intero.
 */
=======
use Modules\User\Filament\Resources\RoleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords;

>>>>>>> laraxot/dev
class ManageRolePermissions extends XotBaseManageRelatedRecords
{
    protected static string $resource = RoleResource::class;

    protected static string $relationship = 'permissions';

    /**
<<<<<<< HEAD
     * @return array<int, TextInput>
=======
     * Override esplicito, volutamente minimale (solo `name`): senza questo
     * override il form userebbe `PermissionResource::form()` per intero —
     * comportamento diverso da quello di questa pagina, pensata solo per
     * associare permessi esistenti a un ruolo, non per editarne tutti i
     * campi. `getFormSchema()` (non piu' `form()`, `final` nel padre dal
     * 2026-09-11): stesso hook usato da ogni altra pagina che vuole
     * sostituire il form di default.
     *
     * @return array<\Filament\Schemas\Components\Component>
>>>>>>> laraxot/dev
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
        ];
    }

    /**
<<<<<<< HEAD
=======
     * Migrato dal precedente override completo di `table()` (`final` nel
     * padre dal 2026-09-11: nessuna pagina puo' piu' sovrascriverlo) ai 5
     * hook di contenuto — stesso identico contenuto, un hook per concetto.
     *
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name'),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
     */
=======
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
>>>>>>> laraxot/dev
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'associate' => AssociateAction::make(),
        ];
    }

<<<<<<< HEAD
    /**
     * @return array<int|string, Action|ActionGroup>
     */
=======
    /** @return array<int|string, Action|ActionGroup> */
>>>>>>> laraxot/dev
    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            DissociateAction::make(),
            DeleteAction::make(),
        ];
    }

<<<<<<< HEAD
    /**
     * @return array<int|string, Action|ActionGroup>
     */
=======
    /** @return array<int|string, Action|ActionGroup> */
>>>>>>> laraxot/dev
    public function getTableBulkActions(): array
    {
        return [
            BulkActionGroup::make([
                DissociateBulkAction::make(),
                DeleteBulkAction::make(),
            ]),
        ];
    }
<<<<<<< HEAD

    /**
     * @return array<string, BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [];
    }
=======
>>>>>>> laraxot/dev
}
